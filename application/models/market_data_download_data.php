<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market_data_download_data extends CI_Model 
{


    public function get_companies()
	{
	   $str = "select `id`,`code` from company";
	   return $this->db->query($str)->result();	
	}
	
	
    public function generate_data($company_id ,$market_data_date)
    {
	    $where  = "";
	    if($company_id=="")
		{
			$where = " entry_date=STR_TO_DATE('$market_data_date','%d-%m-%Y')";
		}
		else if($company_id!="" && $market_data_date!="")
		{
			$where = " company_id=$company_id and entry_date=STR_TO_DATE('$market_data_date','%d-%m-%Y')";
		}
		
		$str = "SELECT (SELECT `code` FROM `company` WHERE id=e.`company_id`) AS `code`,
				date_format(`entry_date`,'%d-%m-%Y') as entry_date,
				`open`,`high`,`low`,`ltp`,`ycp`,`total_volume`,
				`total_trade`,`total_value`,`changes` FROM `eod_stock` AS e WHERE 
				$where";
	    if($this->db->query($str)->num_rows()>0)
		return $this->db->query($str)->result();
		else		
		return 0;
	}	


	
}
?>
