<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_position_data extends CI_Model 
{
    public function get_companies()
	{
	   $str = "select `id`,`code` from `company`";
	   return $this->db->query($str)->result();
	}

    public function get_your_val( $interval , $company_id )
	{
	    $string = "SELECT MIN(low) as min_low,MAX(high) as max_high FROM 
			 `eod_stock` WHERE `company_id`=$company_id
			AND `entry_date` BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(entry_date) FROM `eod_stock`   WHERE company_id=$company_id),INTERVAL $interval))
			AND
			(SELECT MAX(entry_date) FROM `eod_stock`  WHERE company_id=$company_id)";
		$res = $this->db->query($string)->result();
		return (float)$res[0]->min_low.'#'.(float)$res[0]->max_high;	
			
	}
	
	
	public function get_your_ltp($interval , $company_id)
	{
	    $string = "SELECT `ltp`,`entry_date` FROM `eod_stock` WHERE 
		`company_id`=$company_id	AND `entry_date` BETWEEN 
		(SELECT DATE_SUB((SELECT MAX(entry_date) FROM eod_stock   WHERE company_id=$company_id),
		INTERVAL $interval)) AND (SELECT MAX(entry_date) FROM `eod_stock`   WHERE company_id=$company_id) 
		ORDER BY `entry_date` DESC LIMIT 1";
		
		$res = $this->db->query($string)->result();
		return (float)$res[0]->ltp;		
	}
}
?>