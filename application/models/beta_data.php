<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beta_data extends CI_Model 
{
    public function get_beta_table()
	{
	    $str = "SELECT 	`id`,`sector_id`,`code`,`three_month_beta`, 
		`six_month_beta`,`one_year_beta`, `weighted_beta_3m`, 
		`weighted_beta_6m`, `weighted_beta_12m`	FROM `tbl_beta`";
		return $this->db->query($str)->result();
	}
	
	
	public function get_individual_companies_single_sector_beta($sector_id)
	{
	  $str = "SELECT 	`id`,`sector_id`,`code`,`three_month_beta`, 
		`six_month_beta`,`one_year_beta`, `weighted_beta_3m`, 
		`weighted_beta_6m`, `weighted_beta_12m`	FROM `tbl_beta`
		where sector_id=$sector_id";
	  return $this->db->query($str)->result();	
	}
	
	public function get_all_sector_data()
	{
	   $str = "SELECT `sector_ID`,`name`,
		`sector_price`,`sectoBeta_three_month`,
	`sectoBeta nine_month` AS sectoBeta_nine_month,
	`sectoBeta_twelve_month` FROM sector 
	   WHERE sectoBeta_three_month IS NOT NULL";
	   return $this->db->query($str)->result();
	}

	
	
	public function get_sector_beta($sector_id)
	{	    
	    $str = "SELECT SUM(`weighted_beta_3m`) AS beta_3month,
				SUM(`weighted_beta_6m`) AS beta_6month,
				SUM(`weighted_beta_12m`) AS beta_12month
				FROM `tbl_beta`
				WHERE sector_id=$sector_id";
		$res = $this->db->query($str)->result();		
		return $res[0]->beta_3month .'#'. $res[0]->beta_6month .'#'. $res[0]->beta_12month;
	}
	
}
?>