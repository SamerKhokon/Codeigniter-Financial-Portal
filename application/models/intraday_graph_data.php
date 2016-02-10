<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Intraday_graph_data extends CI_Model 
{
    public function intraday_area()
	{
	    $str = "SELECT (UNIX_TIMESTAMP(`idx_date_time`)*1000) AS idx_date_time,`idx_capital_value`,
			`idx_percentage_deviation`,`idx_percentage_deviation`,`idx_percentage_deviation`
			 FROM `index_change`";
		return $this->db->query($str)->result();	 
	}
}
?>