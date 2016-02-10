<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sector_index_graph_details_data extends CI_Model 
{
    public function get_companies()
	{
	   $str = "select `id`,`code` from company";
	   return  $this->db->query($str)->result();
	}

    public function get_sector_index_data($company_id)
    {
      $str = "SELECT (`entry_timestamp`*1000) AS `entry_timestamp`,
	  `open`,`high`,`low`,`ltp`,`total_volume` FROM eod_stock
	  where company_id=$company_id";
	  return $this->db->query($str)->result();
    }
}
?>