<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_change_data extends CI_Model 
{
    public function get_sectors()
	{
	    $str = "select `sector_id`,`name` from sector";
		return $this->db->query($str)->result();
	}
	
	public function get_all_dates()
	{
	   $str = "SELECT DISTINCT 
		   DATE_FORMAT(idx_date_time,'%Y-%m-%d') 
		   AS idx_date  FROM index_change";
		return $this->db->query($str)->result();   
	}
	
	
	public function get_capital_sector_index($sector_id,$date)
	{
		$str = "SELECT index_percent_deviation,index_capital_value FROM `sector_index` 
			WHERE index_date ='$date' and sector_id=$sector_id
				ORDER BY id DESC LIMIT 1";
		$res = $this->db->query($str)->result();		
		return $res[0]->index_percent_deviation;
	}
	
	public function get_capital_dsex_index($date)
	{
		 $str = "SELECT `idx_percentage_deviation`,`idx_capital_value` FROM `index_change` WHERE 
				DATE_FORMAT(`idx_date_time`,'%Y-%m-%d') = '$date'
				ORDER BY id DESC LIMIT 1";
		$res = $this->db->query($str)->result();		
		return $res[0]->idx_percentage_deviation;
	}
	
	
	
    public function get_index_change_graph_data()
	{
	    $str = "";
	}
}
?>