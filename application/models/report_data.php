<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_data extends CI_Model 
{


   

    public function recomendation_data()
	{
	    $str = "SELECT `category_id`,(SELECT `category` FROM 
		`report_category` WHERE id=r.`category_id`) AS category,
			date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
			FROM `reports` AS r WHERE 
			`category_id`=
			(SELECT `id` FROM `report_category` WHERE `category`='Recomendation')
			ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	
	public function anouncements_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Anouncements')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	
	
	public function sector_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Sector/Industry')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	
	
	public function macro_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Macro')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	
	
	public function article_interviews_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Article & Interviews')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	
	
	public function ipo_watch_data()
	{
		/*$str = "SELECT `id`,`company_id`,
		(SELECT `code` FROM company WHERE id=i.`company_id`) AS `code`,
		`ipo_type`,`entry_date`,`title`,`story`,`source`
		FROM `ipo_watch` AS i ORDER BY entry_date DESC";*/
		
		$str = "SELECT company_name,ipo_type,ipo_method,
				entry_date,source,file_name 
				FROM `ipo_watch` order by id desc";
		
		
		return  $this->db->query($str)->result();			
	}
	
	
	
	public function daily_overview_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Daily Overview')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	
	public function weekly_overview_data()
	{
		$str = "SELECT `category_id`,
		(SELECT `category` FROM `report_category` WHERE id=r.`category_id`) AS category,
		date_format(`report_date`,'%d,%M %Y') as report_date,`title`,`source`,`content`,`filename`
		FROM `reports` AS r WHERE 
		`category_id`=
		(SELECT `id` FROM `report_category` WHERE `category`='Weekly Overview')
		ORDER BY id DESC";
		return  $this->db->query($str)->result();			
	}
	
	
	public function get_title_story($row_id)
	{
	    $str = "SELECT `title`,`story` 
	   FROM `ipo_watch` WHERE id=$row_id";
	   
	    $res = $this->db->query($str)->result();
		return $res[0]->title .'#'. $res[0]->story ;
	}
	
}
?>
