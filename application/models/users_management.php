<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




class Users_management extends CI_Model 
{
    
	public function general_user_reg($user_type,$gen_username,$gen_email_id,$gen_password,
	$gen_fullname,$gen_mobileno)
	{
		$str = "INSERT INTO `iportal`.`web_users`( 
		`username`, `password`,	`group_id`, `creation_date`, 
		`user_type`, `email`, `fullname`, `university`, 
		`student_id`, `required_service`,`designation`, `department`, 
		`media_name`, `media_type`, `client_id`, `mobileno`,	`status`)
		VALUES('$gen_username', '$gen_password', '1', now(),	'$user_type', 
		'$gen_email_id', '$gen_fullname','none','none', 'none', 
		'none', 'none', 'none', 'none', 'none', '$gen_mobileno','Y')";
		$this->db->query($str);
		return 1;
	}
	
	
	public function student_reg($user_type,
		 $st_username,$st_email,$st_pass,$st_fullname,$st_mobileno,
		 $st_university,$st_ID,$st_req_service)
	{
	   $str = "INSERT INTO `iportal`.`web_users`( 
		`username`, `password`,	`group_id`, `creation_date`, 
		`user_type`, `email`, `fullname`, `university`, 
		`student_id`, `required_service`,`designation`, `department`, 
		`media_name`, `media_type`, `client_id`, `mobileno`,	`status`)
		VALUES('$st_username', '$st_pass', '1', now(),	'$user_type', 
		'$st_email', '$st_fullname','$st_university','$st_ID', '$st_req_service', 
		'none', 'none', 'none', 'none', 'none', '$st_mobileno','Y')";
		
		
		$this->db->query($str);
		return 1;
		
	}	 
	
	
	
	public function faculty_reg($user_type,$fc_username,
		  $fc_email,$fc_pass,$fc_fullname,$fc_mobileno,$fc_university,
		  $fc_designation,$fc_dept)
	{
	    $str = "INSERT INTO `iportal`.`web_users`( 
		`username`, `password`,	`group_id`, `creation_date`, 
		`user_type`, `email`, `fullname`, `university`, 
		`student_id`, `required_service`,`designation`, `department`, 
		`media_name`, `media_type`, `client_id`, `mobileno`,	`status`)
		VALUES('$fc_username', '$fc_pass', '1', now(),	'$user_type', 
		'$fc_email', '$fc_fullname','$fc_university','none','none','$fc_designation',
		'$fc_dept',  'none', 'none', 'none', '$fc_mobileno','Y')";
		
		$this->db->query($str);
		return 1;
	}	  
	
	
	
	
	public function media_reg($user_type,$mda_username,$mda_email,
		  $mda_password,$mda_fullname,$mda_mobileno,$mda_media_name,$mda_media_type)
	{
	    $str = "INSERT INTO `iportal`.`web_users`( 
		`username`, `password`,	`group_id`, `creation_date`, 
		`user_type`, `email`, `fullname`, `university`, 
		`student_id`, `required_service`,`designation`, `department`, 
		`media_name`, `media_type`, `client_id`, `mobileno`,`status`)
		VALUES('$mda_username', '$mda_password', '1', now(),'$user_type', 
		'$mda_email', '$mda_fullname','none','none','none','none',
		'none',  '$mda_media_name', '$mda_media_type', 
		'none', '$mda_mobileno','Y')";
		
		$this->db->query($str);
		return 1;
	}	  	
	
	
	
	public function capmalclient_reg($user_type,$capml_username,
				 $capml_email,$capml_password,$capml_fullname,$capml_mobileno,
				 $capml_client_id)
	{
	    $str = "INSERT INTO `iportal`.`web_users`( 
		`username`, `password`,	`group_id`, `creation_date`, 
		`user_type`, `email`, `fullname`, `university`, 
		`student_id`, `required_service`,`designation`, `department`, 
		`media_name`, `media_type`, `client_id`, `mobileno`,`status`)
		VALUES('$capml_username', '$capml_password', '1', now(),'$user_type', 
		'$capml_email', '$capml_fullname','none','none','none','none',
		'none',  'none', 'none', 
		'$capml_client_id', '$capml_mobileno','Y')";
		
		$this->db->query($str);
		return 1;
	}	 
	
	
	
	public function general_users_list($user_type)
	{
	   	$str = "SELECT userid,username,user_type,email,fullname,
				mobileno,STATUS FROM `web_users`
				WHERE user_type='$user_type'";
				
		return $this->db->query($str)->result();		
	}
	
}
?>