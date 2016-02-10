<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stock_monitor_ui extends CI_Controller 
{
    public function index()
    {
       $this->load->model("stock_monitor_data");
       $data['companies'] = $this->stock_monitor_data->get_companies();	   
	   $this->load->vars($data);
       $this->load->view("home/stock_monitor_ui_view");
    }
	
	
	public function stock_monitor_json()
	{
	    $this->load->model("stock_monitor_data");
	   
	    //$companies_id   = $this->input->post("companies_id");
		//$companies_name = $this->input->post("companies_name");
		$indicating_times = 20;//$this->input->post("indicating_times");
	   	   
		$cat01 = array('10:40','10:45','10:50','10:55','11:00','11:05','11:10','11:15','11:20','11:25','11:30','11:35','11:40','11:45','12:00','12:05');
		$cat02 = array('10:40','10:50','11:00','11:10','11:20','11:30','11:40','11:50','12:00','12:10','12:20','12:30','12:40','12:50','13:00','13:10');
		$cat03 = array('10:40','11:00','11:20','11:40','12:00','13:00','13:20','13:40','14:00','14:20','14:40','15:00','15:20','15:40','16:00','16:20');
		
		if( $indicating_times == 5 )
		{
		  $t[0] = array('category' => $cat01);
		}
		else if($indicating_times == 10 )
		{
		  $t[0] = array('category' => $cat02 );
		}
		else if($indicating_times==20)
		{
		  $t[0] = array('category' => $cat03 );
		}
	   
	    $datas = $this->stock_monitor_data->get_stock_monitor($indicating_times);
	   	   
	    foreach($datas as $d)
	    {
	       $prices[] = (float)$d->ltp;
		   $volume[] = (int)$d->total_value;
	    }
	    $t[1] = array("prices" => $prices); 
		$t[2] = array("volume" => $volume); 
		echo json_encode($t);
	}
	
}
?>