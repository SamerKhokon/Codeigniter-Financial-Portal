<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutual_fund_ui extends CI_Controller 
{

    public function index()
    {   
      $this->load->model("mutual_fund_data");
	  $data['companies'] = $this->mutual_fund_data->get_companies();	  
      $data['per_datas'] = $this->mutual_fund_data->mutual_fund_performance_data();	  
	  $data['performs']  = $this->mutual_fund_data->nav_mutual_fund_datas();
	  
	  $this->load->vars($data);
      $this->load->view("home/mutual_fund_ui_view");
    }
   
   
   
   
   
    public function mutual_fund_nav_graph_json()
    {
	    $company_id = $this->input->post("company_id");
		$this->load->model("mutual_fund_data");
		$lines = $this->mutual_fund_data->nav_graph_two_lines($company_id);
		$ltps  = $this->mutual_fund_data->nav_graph_ltp_lines($company_id);
			

         $mp = array();   
		$cp = array();
		$cats = array();			
		foreach($lines as $line)
		{
			$publish_date = $line->publish_date;
			$nav_mpb =(float)$line->nav_mpb;
			$nav_cpb = (float)$line->nav_cpb;
			$cats[] = $publish_date;
			$mp[] = array('y'=>$nav_mpb , 'note'=>$publish_date );
			$cp[] = array('y'=>$nav_cpb , 'note'=>$publish_date );
		}
		
		foreach($ltps as $lt)
		{
			$entry_date = $lt->entry_date;
			$ltp = (float)$lt->ltp;	   
			$ltpss[] = array('y'=>$ltp,'note'=>$entry_date);
			$cats[]  = "";
		}
		
		$json[0] = array('cates'=>$cats);	
		$json[1] = array('data'=>$mp); 
		$json[2] = array('data'=>$cp);
		$json[3] = array('data'=>$ltpss); 
		
		echo json_encode($json);
		//print_r($json);
    }
}
?>