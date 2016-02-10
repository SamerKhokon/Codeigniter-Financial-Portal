<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic_info_data extends CI_Model 
{

	public function get_company_basic_info($company_code)
	{
	    $trade_date = date('Y-m-d');
	    $str = "SELECT 	`ID`, `code`, `name`, `sector_id`,
			 (SELECT  NAME FROM sector WHERE sector_id=c.sector_id) AS sector,
			`dsex`, `dse30`, `dses`,`face_value`,`offer_price`, `category`, `electronic`, 
			`listing_year`, `establishing_date`, `tradingstart_date`,`year_end`, `market_lot`, 
			`cfi_code`, `gics`, `parent-company`, `address`, `telephone`, 
			`fax`, `email`, `website`, `purpose` FROM `company`  as c
			WHERE `code`='$company_code' limit 1";
		$res = $this->db->query($str)->result();	
		//return $res[0]->name;
		if($this->db->query($str)->num_rows()>0)
		return $res[0]->name .'#'.  $res[0]->category .'#'. $res[0]->purpose .'#'.
		$res[0]->establishing_date .'#'.	$res[0]->address .'#'.	$res[0]->telephone	.'#'.	
		$res[0]->fax  .'#'.	$res[0]->email .'#'. $res[0]->website .'#'. $res[0]->sector .'#'. 
		$res[0]->year_end .'#'. $res[0]->market_lot;
		else
		return '';
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
     
	 
	public function get_subsidiaries($company_code)
    {
       $str = "SELECT `name` FROM `subsidiary` WHERE 
			company_id=(SELECT id FROM company WHERE CODE='$company_code') 
			ORDER BY `subsidiary_ID` ASC LIMIT 1";
		$res = $this->db->query($str)->result();	
		return $res[0]->name;
    } 

    public function company_management_info_row($company_code)
	{
	   $str = "SELECT `director_name` FROM `directors` WHERE 
			company_id=(SELECT id FROM company WHERE CODE='$company_code') 
			ORDER BY `director_ID` DESC LIMIT 1";
		$res = $this->db->query($str)->result();
        if($this->db->query($str)->num_rows()>0)		
		return $res[0]->director_name;
		else
		return '';
	}
	
	public function get_divident_info($company_code)
	{
		$str = "SELECT `interim_dec_date`,`annual_dec_date`			
			FROM `dividend_info` WHERE company_id=
			(SELECT id FROM company WHERE CODE='$company_code')
			order by divident_ID desc limit 1";
		$res = $this->db->query($str)->result();
		if($this->db->query($str)->num_rows()>0)
		return $res[0]->interim_dec_date .'#'. $res[0]->annual_dec_date ;
		else
		return '';		
	}
	
	
	public function get_share_info($company_code)
	{
		$str = "SELECT `capitalization`,`total_share`,`sponsor` FROM `share_percentage`
		WHERE company_id=(SELECT id FROM company WHERE CODE='$company_code')";
		$res = $this->db->query($str)->result();
		if($this->db->query($str)->num_rows()>0)
		return $res[0]->total_share .'#'. $res[0]->capitalization .'#'. $res[0]->sponsor;
		else
		return '';		
	}
	
	public function get_last_trade_price()
	{
	    $str = "SELECT ltp FROM `eod_stock` WHERE entry_date=
			(SELECT MAX(entry_date) FROM eod_stock)
			ORDER BY company_id DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		return $res[0]->ltp;	
	}
	
	
    public function get_anualized_eps($company_code)
	{
	    $str = "SELECT q1,q2,q3,q4 FROM `eps_continuing`
		WHERE company_id=(SELECT id FROM company WHERE CODE='$company_code')
		ORDER BY `company_eps_continuing_id` DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		
		
		if($this->db->query($str)->num_rows()>0)
		return $res[0]->q4;
		else
		return 0;
	}

    public function get_last_audited_eps($company_code)
	{
	    $str = "SELECT q1,q2,q3,q4 FROM `eps_continuing`
		WHERE company_id=(SELECT id FROM company WHERE CODE='$company_code')
		ORDER BY `eps_year` DESC LIMIT 1,1";
		$res = $this->db->query($str)->result();	
		if($this->db->query($str)->num_rows()>0)
		return $res[0]->q4;
		else
		return 0;
	}	

    public function get_paidup_info($company_code)
	{
	  $str = "SELECT `paidup_capital` FROM `capital`
		WHERE company_id=(SELECT id FROM company WHERE CODE='$company_code')
			ORDER BY `capital_ID` DESC LIMIT 1";
	  $res = $this->db->query($str)->result();
	  return $res[0]->paidup_capital;
	}	
	
	public function get_last_info($company_code)
	{
	    $str = "SELECT `open`,`high`,`low`,`ltp`,`ycp`,
	   `total_volume`,`total_value`,`total_trade`,`changes`,
	   date_format(entry_date,'%d, %M,%Y') as entry_dated FROM
			`eod_stock` WHERE company_id=(SELECT id FROM company 
			WHERE CODE='$company_code')
		ORDER BY entry_date DESC LIMIT 1";
		$res = $this->db->query($str)->result();
	  return $res[0]->ltp .'#'. $res[0]->open .'#'.  $res[0]->ltp
	  .'#'. $res[0]->ycp .'#'. $res[0]->total_volume .'#'. $res[0]->high
	  .'#'. $res[0]->low .'#'. $res[0]->changes .'#'. $res[0]->entry_dated;
	}
	
}
?>