<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_position_ui extends CI_Controller 
{
    public function index()
    {
	  $this->load->model("price_position_data");
	  //$data['companies'] = $this->price_position_data->get_companies();
	  //$this->load->vars($data);
      $this->load->view("home/price_position_ui_view");
    }
	
}
?>