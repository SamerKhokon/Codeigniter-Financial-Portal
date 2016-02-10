<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_vs_pe_ui extends CI_Controller 
{
    public function index()
	{
		$this->load->model("sector_vs_eps_data");
		$sectors = $this->sector_vs_eps_data->get_sectors();
		$this->load->model("menu_data");
	    $data['menu_overview'] = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
		$data['submenu_overview'] = $this->menu_data->get_submenu_overview("stock_vs_pe_ui");
	
		$data['sectors'] = $sectors;
		$this->load->vars($data);
		
	    $this->load->view("home/stock_vs_pe_ui_view");
	}
}
?>	