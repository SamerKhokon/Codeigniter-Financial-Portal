<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sector_monitor_data extends CI_Model 
{

	function get_companies()
	{
	   $str = "select `id`,`code` from company";
	   return $this->db->query($str)->result();
	}

	function get_sectors()
	{
	   $str = "select `sector_id`,`name` from sector";
	   return $this->db->query($str)->result();
	}
	
	
    public function get_sector_monitor($days)
	{	    
	    $n = $this->randomNumber();
		if( $days == 5 )
		{		    
			$limit = " LIMIT  $n,16";
		}
		else if( $days == 10 )
		{
			$limit = " LIMIT  $n,16";
		}
		else if( $days == 20 )
		{
			$limit = " LIMIT $n,16";
		}
				
		$str = "SELECT  `entry_timestamp`,ltp,total_value FROM 
			`eod_stock` WHERE entry_date=(SELECT MAX(entry_date) 
			FROM eod_stock) $limit";
			
		return $this->db->query($str)->result();
	}
	
	
	
	public function randomNumber() 
	{
		$result = '';
		for($i = 0; $i < 15; $i++) 
		{
			$result .= (int)mt_rand(0, 9);
		}
		return  (int)$result[0];
	}
	
	
}
?>