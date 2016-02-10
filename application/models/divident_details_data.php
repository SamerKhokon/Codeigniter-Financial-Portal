<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divident_details_data extends CI_Model 
{


    function get_sectors()
	{
	   $str = "select `sector_id`,`name` from sector";
	   return $this->db->query($str)->result();
	}
	
	function get_companies()
	{
	   $str = "select `id`,`code` from company";
	   return $this->db->query($str)->result();
	}	


    public function dividend_years()
	{	 
	    $str = "SELECT * FROM(SELECT DISTINCT `year` FROM 
				`dividend_info` ORDER BY `year` DESC 
				LIMIT 6) AS t ORDER BY `year` ASC";
				
		if($this->db->query($str)->num_rows()>0)			
			return $this->db->query($str)->result();
		else
			return 0;
	}


	public function option_one_data($years , $companies)
	{    
	
	  
	 
		 $str = "SELECT company_id,`year`,`code`,
		(SELECT `name` FROM sector WHERE sector_id=(SELECT sector_id FROM company WHERE id=`company_id`)) AS sector ,
		(SELECT `category`  FROM company WHERE id=`company_id`) AS category,
		annual_cash,annual_stock,annual_rec_date,eps,
		ltp,(annual_cash/eps) AS payout_ratio ,(annual_cash/ltp) AS dividend_yield
		FROM (SELECT company_id,`year`,(SELECT `code` FROM company WHERE id=a.company_id) AS `code`,
		annual_cash,annual_stock,annual_rec_date,
		
		(SELECT q4 FROM eps_continuing WHERE company_id=a.`company_id`  AND `year`=a.`year` LIMIT 1) AS eps,
		(SELECT ltp FROM eod_stock ORDER BY entry_date DESC LIMIT 1) AS ltp
		 FROM `dividend_info` 
		 
		 AS a	LEFT OUTER JOIN company AS b
		ON a.`company_id`=b.`ID`) AS t
		WHERE   `year` IN($years) AND company_id IN($companies)";
		
	    return $this->db->query($str)->result();
	}
	
	
	
	public function option_two_result($sector_id,$years)
	{
	   $str = "SELECT company_id,`year`,`code`,
		(SELECT `name` FROM sector WHERE sector_id=(SELECT sector_id FROM company WHERE id=`company_id`)) AS sector ,
		(SELECT `category`  FROM company WHERE id=`company_id`) AS category,
		annual_cash,annual_stock,annual_rec_date,eps,
		ltp,(annual_cash/eps) AS payout_ratio ,(annual_cash/ltp) AS dividend_yield
		FROM (SELECT company_id,`year`,(SELECT `code` FROM company WHERE id=a.company_id) AS `code`,
		annual_cash,annual_stock,annual_rec_date,
		(SELECT q4 FROM eps_continuing WHERE company_id=a.`company_id`  AND `year`=a.`year` LIMIT 1) AS eps,
		(SELECT ltp FROM eod_stock ORDER BY entry_date DESC LIMIT 1) AS ltp
		 FROM `dividend_info` AS a	LEFT OUTER JOIN company AS b
		ON a.`company_id`=b.`ID`) AS t
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id)
		AND `year` IN($years)";
	    return $this->db->query($str)->result();
	}
	
	
	
	
	
	
	
	

	public function divident_cash_find_for_all_index()
	{
		$str = "SELECT `COMPANY_CODE`,`INTERIM_DIVIDEND_CASH`,`FINAL_DIVIDEND_CASH`,`YEAR`,
	   `INTERIM_DIVIDEND_STOCK`,`FINAL_DIVIDEND_STOCK`,`INTERIM_DIVIDEND_DECLARATION_DATE`,
		`FINAL_DIVIDEND_DECLARATION_DATE`
		FROM `mkt_divident_info`";
		return $this->db->query($str)->result();	
	}

	
	public function divident_cash_for_a_sector($sector,$years)
	{
	    //$sector = "Bank";
	    //$years = 2000;
	    $str = "SELECT `COMPANY_CODE`,`INTERIM_DIVIDEND_CASH`,`FINAL_DIVIDEND_CASH`,
				`YEAR`,`INTERIM_DIVIDEND_STOCK`,`FINAL_DIVIDEND_STOCK`,
				`INTERIM_DIVIDEND_DECLARATION_DATE`,`FINAL_DIVIDEND_DECLARATION_DATE`
				FROM `mkt_divident_info` WHERE COMPANY_CODE 
				IN(SELECT CODE FROM `company`
				WHERE SECTOR='$sector') AND YEAR IN($years)";	
		return $this->db->query($str)->result();		
		//return $str;
	}
	
	

    public function divident_cash_find($years , $companies)
	{
	   $str = "SELECT `COMPANY_CODE`,`INTERIM_DIVIDEND_CASH`,`FINAL_DIVIDEND_CASH`,`YEAR`,
	   `INTERIM_DIVIDEND_STOCK`,`FINAL_DIVIDEND_STOCK`,`INTERIM_DIVIDEND_DECLARATION_DATE`,
		`FINAL_DIVIDEND_DECLARATION_DATE`
		FROM `divident_info` WHERE COMPANY_CODE IN($companies)
			AND YEAR IN($years)";
		return $this->db->query($str)->result();	
	}
	
	public function eps_of_a_company($year , $company_code)
	{
	    $str  = "SELECT `ANNUALIZED_EPS` FROM `mkt_company_gen_fin_info`
		WHERE COMPANY_CODE='$company_code' AND `YEAR`=$year";
		$res = $this->db->query($str)->result();
		if($res[0]->ANNUALIZED_EPS !="")
		return $res[0]->ANNUALIZED_EPS;
		else
		return 0; 
	}
	
	
	public function get_last_traded_price()
	{
		$str = "SELECT  Trade_Date,Last_Traded_Price
				FROM `v_instrument_trade_status_web`
				ORDER BY Trade_Date DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		return $res[0]->Last_Traded_Price;		
	}
	
	
	public function get_sector_category($company_code)
	{
	    $str = "SELECT CODE,CATEGORY,SECTOR FROM `company_basic_info`
				WHERE CODE='$company_code' order by SLNO desc limit 1";
		$res = $this->db->query($str)->result();		
		return $res[0]->CODE .'#' . $res[0]->CATEGORY .'#' . $res[0]->SECTOR;
	}
}	
?>