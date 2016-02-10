<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu_data extends CI_Model
{
    public function get_menu_overview( $name )
	{
	    //$name = "Company Fundamentals & Quantitative";
	    $str = "SELECT menu_overview FROM 
				`web_main_menus` 
				WHERE NAME='$name'";
		$res = $this->db->query($str)->result();
		return $res[0]->menu_overview;
	}
	
    public function get_submenu_overview( $name )
	{
	    $str = "SELECT sub_menu_overview FROM 
				`web_sub_menus` WHERE content='$name'";
		$res = $this->db->query($str)->result();
		
		if( $this->db->query($str)->num_rows() > 0 )
			return $res[0]->sub_menu_overview;
		else
			return "" ;
	}	
	
}

?>