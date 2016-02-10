<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_basic_info_data extends CI_Model 
{

	public function get_company_basic_info($company_code)
	{
	    $trade_date = date('Y-m-d');
	    $str = "SELECT 	`ID`, `code`, `name`, `sector_id`,
			 (SELECT  NAME FROM sector WHERE sector_id=c.sector_id) AS sector,
			`dsex`, `dse30`, `dses`,`face_value`,`offer_price`, `category`, `electronic`, 
			`listing_year`, `establishing_date`, `tradingstart_date`,`year_end`, `market_lot`, 
			`cfi_code`, `gics`, `parent-company`, `address`, `telephone`, 
			`fax`, `email`, `website`, `purpose` FROM `company` 
			WHERE `code`='$company_code' limit 1";
		$res = $this->db->query($str)->result();	
		return $res[0]->name;
		/*
		return $res[0]->name .'#'.  $res[0]->category .'#'. $res[0]->purpose .'#'. $res[0]->establishing_date .'#'.	$res[0]->address .'#'.	$res[0]->telephone	.'#'.	$res[0]->fax  .'#'.	$res[0]->email .'#'. $res[0]->website .'#'. $res[0]->sector .'#'. $res[0]->year_end .'#'. $res[0]->market_lot;*/
	}
	

   public function get_day_high($company_code)
   {
       $str = "SELECT high FROM eod_stock WHERE 
	   company_id=(SELECT id FROM company WHERE CODE='$company_code')
	   ORDER BY high desc LIMIT 1";
		$res = $this->db->query($str)->result();	
		return $res[0]->high;
   }
   
	public function get_day_low($company_code)
   {
       $str = "SELECT low FROM eod_stock WHERE 
				company_id=(SELECT id FROM company WHERE CODE='$company_code') 
				ORDER BY low ASC LIMIT 1";
		$res = $this->db->query($str)->result();	
		return $res[0]->low;
   }      
	
	
	public function get_last_updatetime($company_id)
	{
	   $str = "SELECT DATE_FORMAT(last_updatetime,'%d, %M , %Y') AS last_updatetime
	   FROM(SELECT MAX(entry_date) AS last_updatetime FROM 
	   eod_stock WHERE company_id=
	   (SELECT id FROM company WHERE CODE='$company_id')) AS t";
	   $res = $this->db->query($str)->result();
	   return $res[0]->last_updatetime;
	}
	
}
?>