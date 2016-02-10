<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fundamental_screener_data extends CI_Model 
{

    public function screener_query( $keyword , $min , $max)
	{
	
	    if($keyword=="cap") {
		  $where = " where (cap>= $min AND cap<= $max ) order by cap asc";
		}else if($keyword=="pe_ratio") {
		  $where = " where (pe_ratio>=$min AND pe_ratio<=$max) order by pe_ratio asc";
		}else if($keyword=="divident_yield") {
		  $where = " where (divident_yield>=$min AND divident_yield<=$max)  order by divident_yield asc";
		}else if($keyword=="price_change_52week") {
		  $where = " where (price_change_52week>=$min AND price_change_52week<=$max)  order by price_change_52week asc";
		}else{
		  $where = " where (cap>= $min AND cap<= $max ) order by cap asc";
		}
	    /*$str = "SELECT id,`code`,cur_ltp,ltp_1yback,annual_cash,q4,
			(cur_ltp/q4) AS pe_ratio,(annual_cash/cur_ltp) AS divident_yield,
			((cur_ltp-ltp_1yback)/ltp_1yback)*100 AS price_change_52week 
			
			FROM( 
				SELECT `id`,`code`,(SELECT ltp FROM eod_stock 
				WHERE company_id=c.id AND entry_date=(SELECT MAX(entry_date) 
				FROM eod_stock)) AS cur_ltp ,
				
				(SELECT ltp FROM eod_stock WHERE company_id=3 AND entry_date BETWEEN 
				(SELECT DATE_SUB((SELECT MAX(entry_date) FROM eod_stock),INTERVAL 1 YEAR)) 
				AND (SELECT MAX(entry_date) FROM eod_stock)  
				ORDER BY entry_date ASC LIMIT 1) AS ltp_1yback ,
				
				(SELECT annual_cash FROM dividend_info WHERE company_id=c.id 
				ORDER BY `year` DESC LIMIT 1) AS annual_cash ,
				(SELECT q4 FROM eps_continuing WHERE company_id=c.id ORDER 
				BY `eps_year` DESC LIMIT 1) AS q4 
				
				FROM company AS c 	
			) AS t  WHERE cur_ltp IS NOT NULL";	*/
			
			
			$str = "SELECT id,`code`,`name`,cap,pe_ratio,divident_yield,price_change_52week  FROM (
					SELECT id,`code`,`name`,cap,cur_ltp,ltp_1yback,annual_cash,q4,
					(cur_ltp/q4) AS pe_ratio,(annual_cash/cur_ltp) AS divident_yield,
					((cur_ltp-ltp_1yback)/ltp_1yback)*100 AS price_change_52week 
			
					FROM( 
						SELECT `id`,`code`,
						(SELECT `name` FROM company WHERE id=c.ID) AS `name`,
						(SELECT ltp FROM eod_stock 
						WHERE company_id=c.id AND entry_date=(SELECT MAX(entry_date) 
						FROM eod_stock)) AS cur_ltp ,
						
						(SELECT ltp FROM eod_stock WHERE company_id=3 AND entry_date BETWEEN 
						(SELECT DATE_SUB((SELECT MAX(entry_date) FROM eod_stock),INTERVAL 1 YEAR)) 
						AND (SELECT MAX(entry_date) FROM eod_stock)  
						ORDER BY entry_date ASC LIMIT 1) AS ltp_1yback ,
						
						(SELECT annual_cash FROM dividend_info WHERE company_id=c.id 
						ORDER BY `year` DESC LIMIT 1) AS annual_cash ,
						(SELECT q4 FROM eps_continuing WHERE company_id=c.id ORDER 
						BY `eps_year` DESC LIMIT 1) AS q4 ,
						(SELECT floating_cap FROM eod_stock WHERE company_id=c.id AND entry_date=
						(SELECT MAX(entry_date) FROM eod_stock WHERE company_id=c.id) LIMIT 1) AS cap
						
						FROM company AS c 	
					) AS t WHERE cur_ltp IS NOT NULL and cap is not null and cap>0) AS r
					
					$where";
			
		return $this->db->query($str)->result();	
	}

	
	public function get_caps()
	{
	    $str_cap = "SELECT MAX(floating_cap) as max_cap,
			MIN(floating_cap) as min_cap,(MAX(floating_cap)-MIN(floating_cap))/100 
			FROM (SELECT entry_date,floating_cap,company_id FROM eod_stock
           GROUP BY company_id
			ORDER BY entry_date DESC) AS t WHERE floating_cap!=0  
			ORDER BY floating_cap DESC"; 
		$sql_cap = $this->db->query($str_cap)->result();
		return $sql_cap[0]->max_cap .'#' . $sql_cap[0]->min_cap;
	}
	
	public function max_min_vals()
	{
	    $str = "SELECT MIN(pe_ratio) AS min_pe,MAX(pe_ratio) AS max_pe,
				MIN(divident_yield) AS divy_min,MAX(divident_yield) AS divy_max,
				MIN(price_change_52week) AS  min_52week,
				MAX(price_change_52week) AS max_52week 
				
				FROM (

				SELECT (cur_ltp/q4) AS pe_ratio,(annual_cash/cur_ltp) AS divident_yield,
				((cur_ltp-ltp_1yback)/ltp_1yback)*100 AS price_change_52week 
				FROM ( 
				SELECT `id`,`code`,(SELECT ltp FROM eod_stock 
				WHERE company_id=c.id AND entry_date=(SELECT MAX(entry_date) FROM eod_stock)) AS cur_ltp ,
				(SELECT ltp FROM eod_stock WHERE company_id=3 AND entry_date BETWEEN 
				(SELECT DATE_SUB((SELECT MAX(entry_date) FROM eod_stock),INTERVAL 1 YEAR)) 
				AND (SELECT MAX(entry_date) FROM eod_stock)  ORDER BY entry_date ASC LIMIT 1) AS ltp_1yback ,
					
				
				(SELECT annual_cash FROM dividend_info WHERE company_id=c.id ORDER BY `year` DESC LIMIT 1) AS annual_cash ,
				(SELECT q4 FROM eps_continuing WHERE company_id=c.id ORDER BY `eps_year` DESC LIMIT 1) AS q4 
				
				FROM company AS c 
				) AS t  WHERE cur_ltp IS NOT NULL) AS h";
		$res = $this->db->query($str)->result();
		
		return (float)$res[0]->min_pe .'#'. (float)$res[0]->max_pe .'#'.
        (float)$res[0]->divy_min .'#'. (float)$res[0]->divy_max .'#'.
		(float)$res[0]->min_52week .'#'. (float)$res[0]->max_52week	;	
	}

	
					
	
	public function fundamental_screener_search_data($cci_sel,$search_cci,
		$mfi_sel,$search_mfi,$rsi_sel,$search_rsi,
					$st_oscilator_sel,$search_st_oscilator,
					$ut_oscilator_sel,$search_ut_oscilator,
					$wr_sel,$search_wr)
	{
	    if($search_cci=="" && $search_mfi=="" && $search_rsi=="" && $search_st_oscilator==""
					&& $search_ut_oscilator=="" && $search_wr=="") {
            $where = " where 1=1";    					
		}else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
					&& $search_st_oscilator==""	&& $search_ut_oscilator=="" && $search_wr==""){
			$where = " where cci $cci_sel $search_cci ";		
		}else if($search_cci!="" && $search_mfi!="" && $search_rsi=="" 
					&& $search_st_oscilator=="" && $search_ut_oscilator=="" && $search_wr==""){
			$where = " where cci $cci_sel $search_cci AND mfi $mfi_sel $search_mfi";		
		}else if($search_cci!="" && $search_mfi!="" && $search_rsi!="" 
					&& $search_st_oscilator=="" && $search_ut_oscilator=="" && $search_wr==""){
			$where = " where cci $cci_sel $search_cci AND mfi $mfi_sel $search_mfi AND
			 rsi $rsi_sel $search_rsi";		
		}else if($search_cci!="" && $search_mfi!="" && $search_rsi!="" 
					&& $search_st_oscilator!="" && $search_ut_oscilator=="" && $search_wr==""){
			$where = " where cci $cci_sel $search_cci AND mfi $mfi_sel $search_mfi AND
			 rsi $rsi_sel $search_rsi AND sto_stc $st_oscilator_sel $search_st_oscilator
			 ";		
		}else if($search_cci!="" && $search_mfi!="" && $search_rsi!="" 
					&& $search_st_oscilator!="" && $search_ut_oscilator!="" && $search_wr==""){
			$where = " where cci $cci_sel $search_cci AND mfi $mfi_sel $search_mfi AND
			 rsi $rsi_sel $search_rsi AND sto_stc $st_oscilator_sel $search_st_oscilator
			 AND ult_osc $ut_oscilator_sel $search_ut_oscilator";		
		}else if($search_cci!="" && $search_mfi!="" && $search_rsi!="" 
					&& $search_st_oscilator!="" && $search_ut_oscilator!="" && $search_wr!=""){
			$where = " where cci $cci_sel $search_cci AND mfi $mfi_sel $search_mfi AND
			 rsi $rsi_sel $search_rsi AND sto_stc $st_oscilator_sel $search_st_oscilator
			 AND ult_osc $ut_oscilator_sel $search_ut_oscilator AND
			 wiliam_r $wr_sel $search_wr";		
		}else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
					&& $search_st_oscilator=="" && $search_ut_oscilator=="" 
					&& $search_wr!="") {
			$where = " where cci $cci_sel $search_cci AND
			 wiliam_r $wr_sel $search_wr";	
		}else if($search_cci!="" && $search_mfi=="" && $search_rsi!="" 
			&& $search_st_oscilator=="" && $search_ut_oscilator=="" 
					&& $search_wr=="") {
			$where = " where cci $cci_sel $search_cci AND
			 rsi $rsi_sel $search_rsi";	
		}else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
			&& $search_st_oscilator!="" && $search_ut_oscilator=="" 
					&& $search_wr=="") {
			$where = " where cci $cci_sel $search_cci 
			AND sto_stc $st_oscilator_sel $search_st_oscilator";	
		}
		else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator!="" && $search_wr=="") {
		
		   $where = " where cci $cci_sel $search_cci AND 
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}		
		else if($search_cci!="" && $search_mfi!="" && $search_rsi=="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator=="" && $search_wr=="") 
		{
		
		   $where = " where cci $cci_sel $search_cci AND 
		   mfi $mfi_sel $search_mfi AND
		   sto_stc $st_oscilator_sel $search_st_oscilator";
		}
		else if($search_cci!="" && $search_mfi!="" && $search_rsi=="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator!="" && $search_wr=="") 
		{
		
		   $where = " where cci $cci_sel $search_cci AND 
		   mfi $mfi_sel $search_mfi AND
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}
		else if($search_cci!="" && $search_mfi!="" && $search_rsi=="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator=="" && $search_wr!="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   mfi $mfi_sel $search_mfi AND
		   wiliam_r $wr_sel $search_wr";
		}
		
		
		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi!="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator=="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   rsi $rsi_sel $search_rsi AND
		   sto_stc $st_oscilator_sel $search_st_oscilator";
		}
		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi!="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator!="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   rsi $rsi_sel $search_rsi AND
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi!="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator=="" && $search_wr!="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   rsi $rsi_sel $search_rsi AND
		   wiliam_r $wr_sel $search_wr";
		}
		
		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator!="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   sto_stc $st_oscilator_sel $search_st_oscilator AND
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}
		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi=="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator=="" && $search_wr!="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   sto_stc $st_oscilator_sel $search_st_oscilator AND
		   wiliam_r $wr_sel $search_wr";
		}
		
		else if($search_cci!="" && $search_mfi!="" && $search_rsi!="" 
		&& $search_st_oscilator=="" && $search_ut_oscilator!="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   mfi $mfi_sel $search_mfi AND rsi $rsi_sel $search_rsi 
		   AND ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}
		
		else if($search_cci!="" && $search_mfi=="" && $search_rsi!="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator!="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   rsi $rsi_sel $search_rsi   AND 
		   sto_stc $st_oscilator_sel $search_st_oscilator AND
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}
		
		
		else if($search_cci!="" && $search_mfi!="" && $search_rsi=="" 
		&& $search_st_oscilator!="" && $search_ut_oscilator!="" && $search_wr=="") 
		{		
		   $where = " where cci $cci_sel $search_cci AND 
		   mfi $mfi_sel $search_mfi   AND 
		   sto_stc $st_oscilator_sel $search_st_oscilator AND
		   ult_osc $ut_oscilator_sel $search_ut_oscilator";
		}
		
		
		
			//echo $ut_oscilator_sel;
			/*$str = "SELECT (SELECT `code` FROM company WHERE id=t.`company_id`) AS `code`,
				`cci`,`mfi`,`rsi`,`sto_stc`,`ult_osc`,`wiliam_r` 
				FROM `technical_screener_table` AS t
				WHERE cci>3 AND mfi>40 AND rsi>60 AND sto_stc>20 AND ult_osc>40
				AND wiliam_r<0";
				*/
			
		$str = "SELECT (SELECT `code` FROM company WHERE id=t.`company_id`) AS `code`,
			`cci`,`mfi`,`rsi`,`sto_stc`,`ult_osc`,`wiliam_r`
		FROM `technical_screener_table` AS t ".$where;	
		//echo $str;	
		return $this->db->query($str)->result();	
	}
	
}
?>