<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eps_npat_ui extends CI_Controller 
{
    public function index()
	{
		$this->load->model("eps_npat_data");
		$sectors = $this->eps_npat_data->get_sectors();
		
		$this->load->model("menu_data");
	   $data['menu_overview'] = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
	   $data['submenu_overview'] = $this->menu_data->get_submenu_overview("eps_npat_ui");
	
		$data['sectors'] = $sectors;
		$this->load->vars($data);
		
	    $this->load->view("home/eps_npat_ui_view");
	}
}
?>	