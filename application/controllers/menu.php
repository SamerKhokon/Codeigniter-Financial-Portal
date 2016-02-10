<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function search_submenu_overview()
	{
	     echo 'c '.$name = $this->input->post("sname");
		// $this->load->model("menu_data");
		//$submenu_overview = $this->menu_data->get_submenu_overview($name);
		//echo $submenu_overview;
	}
}
?>