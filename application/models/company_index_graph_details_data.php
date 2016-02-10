<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_index_graph_details_data extends CI_Model 
{
    public function get_sectors()
	{
	   $str = "select `sector_id`,`name` from sector";
	   return  $this->db->query($str)->result();
	}

    public function get_company_index_data($sector_id)
    {
      $str = "SELECT (`timestamps`*1000) AS `timestamps`,
			`open`,`high`,`low`,`sector_price`,
			ROUND(`volume`) as `volume` FROM 
			sector_price WHERE sector_id=$sector_id";
	  return $this->db->query($str)->result();
    }
}
?>