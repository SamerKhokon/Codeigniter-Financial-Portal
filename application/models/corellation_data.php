<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Corellation_data extends CI_Model 
{
    public function get_single_company_series($code , $start , $end)
	{
		$string = "SELECT ltp,(`ltp`*`ltp`) AS ltp_ltp,entry_date FROM 
		`eod_stock` AS t 
		WHERE `company_id`=(SELECT id FROM company WHERE `code`='".trim($code)."') 
		AND entry_date BETWEEN STR_TO_DATE('$start','%d-%m-%Y')
		AND STR_TO_DATE('$end','%d-%m-%Y')";
		return $this->db->query($string)->result();		
	}
	
	
	public function get_single_sector_series($code , $start , $end)
	{
		$string = "SELECT `sector_price` FROM sector_price WHERE sector_id
		=(SELECT sector_id FROM sector WHERE NAME='".trim($code)."') 
		AND entry_date BETWEEN STR_TO_DATE('$start','%d-%m-%Y')
		AND STR_TO_DATE('$end','%d-%m-%Y')";
		return $this->db->query($string)->result();		
	}	

    public function get_single_sectors_company_ids($sector_id)
	{
	   $str = "SELECT `code` FROM company WHERE sector_id=$sector_id";
	   $res = $this->db->query($str)->result();
	    $result ="";
	    foreach($res as $r){
	      $result .= $r->code .",";
	    }
		$result = substr($result,0,strlen($result)-1);
		return $result;
	}
	
	
	function get_floating_share($company_code)
	{
	    $str = "SELECT floating_number FROM `share_percentage` WHERE company_id=
			(SELECT id FROM company WHERE CODE='$company_code')";
			
		$res = $this->db->query($str)->result();
		return $res[0]->floating_number;
	}
	
	function get_all_data()
	{
	   $str = "SELECT `id`,`close`,`code`,`ltp` FROM `tbl_test_stock_beta`";
	   return $this->db->query($str)->result();	
	}
	
	
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
	
	function update_cap($id,$cap)
	{
	    return $update = "update `tbl_test_stock_beta` set capitalization='$cap' 
		where id=$id";
		//$this->db->query($update);
	}
	
}				
?>
				