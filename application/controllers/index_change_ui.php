<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_change_ui extends CI_Controller 
{
    public function index()
    { 
		$this->load->model("index_change_data");
		$data['sectors'] =  $this->index_change_data->get_sectors();
		$this->load->vars($data);
		$this->load->view("home/index_change_ui_view");
    }   
   
    public function indexchange_graph_json()
    {
	   //error_reporting(0);
		$sector_id = $this->input->post("sector_id");
		$this->load->model("index_change_data");
        $dates = $this->index_change_data->get_all_dates();

        		
		foreach($dates as $date)
		{
		   $date_category[]  = $date->idx_date ;
		   $sector_capital[] = (float)$this->index_change_data->get_capital_sector_index($sector_id,$date->idx_date);
		   $dsex_capital[]   = (float)$this->index_change_data->get_capital_dsex_index($date->idx_date);
		}

		$json[0] = array("cate"=> $date_category);
		$json[1] = array("sector"=>$sector_capital);
		$json[2] = array("dsex"=>$dsex_capital);
		//print_r($json);
		echo json_encode($json);	  
    }
}
?>