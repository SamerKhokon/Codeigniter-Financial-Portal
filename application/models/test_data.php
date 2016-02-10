<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test_data extends CI_Model 
{
    public function total_share()
	{
	   $str = "select  COMPANY_CODE,
	   TOTAL_SHARE,FLOATING_PERCENTAGE
					from mkt_share_info";
	   return $this->db->query($str)->result();	
	}
	
	
	public function share_update($company_code,$total_share,$floating_percentage)
	{
	    $floating_no_share = $total_share  * $floating_percentage;
	    
		$str = "update mkt_share_info				 
				set FLOATING_NO_OF_SHARE=$floating_no_share 
				where company_code='$company_code'";
		$this->db->query($str);	
	}	
}
?>