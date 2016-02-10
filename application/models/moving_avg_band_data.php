<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moving_avg_band_data extends CI_Model 
{
   public function get_companies()
   {
      $str  = "select id,code from company";
	  return $this->db->query($str)->result();
   }
   
   	public function get_sma_vals($company_id)
	{
	    $str = "SELECT sma_5,
			(SELECT (SUM(ltp)/15) AS sma_15 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 15) AS sma_15) AS sma_15 ,
			
			(SELECT (SUM(ltp)/45) AS sma_45 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 45) AS sma_45) AS sma_45 	 ,
			
			(SELECT (SUM(ltp)/100) AS sma_100 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 100) AS sma_100) AS sma_100 ,		
			
			(SELECT (SUM(ltp)/150) AS sma_150 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 150) AS sma_100) AS sma_150 ,
			
			(SELECT (SUM(ltp)/200) AS sma_200 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 200) AS sma_200) AS sma_200  ,
			
			(SELECT ltp FROM eod_stock WHERE entry_date=(SELECT MAX(entry_date) 
			FROM eod_stock) 
			ORDER BY entry_date DESC LIMIT 1) AS ltp				
			

			FROM (
			SELECT (SUM(ltp)/5) AS sma_5 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id 
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 5) AS sma_5
			) AS tp";
			
		
        $res = $this->db->query($str)->result();		
		return number_format($res[0]->sma_5,2,'.','') .'#' . number_format($res[0]->sma_15,2,'.','') .'#' . 
		number_format($res[0]->sma_45,2,'.','') .'#' . number_format($res[0]->sma_100,2,'.','') .'#' . 
		number_format($res[0]->sma_150,2,'.','') .'#' . number_format($res[0]->sma_200,2,'.','') .'#' . number_format($res[0]->ltp,2,'.','');
	}

	
	
	
	public function get_wma_vals($company_id)
	{
		$str = "SELECT wma_5,
				(SELECT (SUM(wltp)/SUM(rn)) AS wma_15  FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id
				ORDER BY entry_date ASC LIMIT 15) AS t) AS z) AS wqm_15 ,

				(SELECT (SUM(wltp)/SUM(rn)) AS wma_45  FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id
				ORDER BY entry_date ASC LIMIT 45) AS t) AS z) AS wqm_45 ,

				(SELECT (SUM(wltp)/SUM(rn)) AS wma_100  FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id
				ORDER BY entry_date ASC LIMIT 100) AS t) AS z) AS wqm_100 , 

				(SELECT (SUM(wltp)/SUM(rn)) AS wma_150  FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id
				ORDER BY entry_date ASC LIMIT 150) AS t) AS z) AS wqm_150 ,

				(SELECT (SUM(wltp)/SUM(rn)) AS wma_200  FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id
				ORDER BY entry_date ASC LIMIT 200) AS t) AS z) AS wqm_200 ,
				(SELECT ltp FROM eod_stock WHERE entry_date = 
				(SELECT MAX(entry_date) FROM eod_stock) ORDER BY entry_date DESC LIMIT 1) AS ltp

				FROM (SELECT (SUM(wltp)/SUM(rn)) AS wma_5
				FROM (SELECT rn , entry_date , ltp , (rn*ltp) AS wltp FROM(
				SELECT @rownum:=@rownum+1 AS rn, p.entry_date,p.ltp FROM eod_stock p , 
				(SELECT @rownum:=0) AS r WHERE p.company_id=$company_id 
				ORDER BY entry_date ASC LIMIT 5) AS t) AS Y) AS tp";
			
		//$sql = mysql_query($str);		
        $res = $this->db->query($str)->result();
		return number_format($res[0]->wma_5,2,'.','') .'#' . number_format($res[0]->wma_15,2,'.','') .'#' .
		number_format($res[0]->wma_45,2,'.','') .'#' . number_format($res[0]->wma_100,2,'.','') .'#' .
		number_format($res[0]->wma_150,2,'.','') .'#' . number_format($res[0]->wma_200,2,'.','') .'#' . 
		number_format($res[0]->ltp,2,'.','');
	}

   
   
    public function get_ema_vals($company_id)
	{
	    $str = "SELECT sma_5,
			(SELECT (SUM(ltp)/15) AS sma_15 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 15) AS t) AS sma_15 ,

			(SELECT (SUM(ltp)/45) AS sma_45 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 45) AS t) AS sma_45  ,

			(SELECT (SUM(ltp)/100) AS sma_100 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 100) AS t) AS sma_100 ,

			(SELECT (SUM(ltp)/150) AS sma_150 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 150) AS t) AS sma_150 ,

			(SELECT (SUM(ltp)/200) AS sma_200 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 200) AS t) AS sma_200 ,

			(SELECT ltp FROM eod_stock WHERE
			 entry_date=(SELECT MAX(entry_date) FROM eod_stock)
			 ORDER BY entry_date DESC LIMIT 1) AS ltp
			 
			 FROM (SELECT (SUM(ltp)/5) AS sma_5 FROM (
			SELECT ltp FROM eod_stock WHERE company_id=$company_id
			AND entry_date<=(SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY entry_date ASC LIMIT 5) AS t) AS pr";
				
		
		$res = $this->db->query($str)->result();
		return number_format($res[0]->sma_5,2,'.','') .'#' . number_format($res[0]->sma_15,2,'.','') .'#' . 
		number_format($res[0]->sma_45,2,'.','') .'#' . number_format($res[0]->sma_100,2,'.','') .'#' . 
		number_format($res[0]->sma_150,2,'.','') .'#' . number_format($res[0]->sma_200,2,'.','') .'#' . 
		number_format($res[0]->ltp,2,'.','');
	}
	
   
   
   
}
?>