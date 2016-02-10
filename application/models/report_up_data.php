<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_up_data extends CI_Model 
{
	public function report_entry($category_id,$entry_date,$title,$source,$filename)
	{
	    $str = "INSERT INTO `reports`(`category_id`,`report_date`,
             `title`,`source`,`content`,`filename`)
			VALUES ('$category_id','$entry_date',
					'$title','$source','','$filename');";
		$this->db->query($str);
		return 1;
	}
	
	public function ipo_report_entry($company_name,$subscription_date,$ipo_type,$ipo_method,$source,$filename)
	{
	   $str = "INSERT INTO `ipo_watch`(`company_name`,`ipo_type`,`ipo_method`,`entry_date`,
             `source`,`file_name`)	VALUES ('$company_name','$ipo_type',
        '$ipo_method','$subscription_date','$source','$filename')";
		$this->db->query($str);
		return   1;
	}

}
?>