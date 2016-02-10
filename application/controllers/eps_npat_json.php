<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eps_npat_json extends CI_Controller 
{

	public function yealy_eps_json()
	{
	   $company_code = $this->input->post("company_id");
	   $this->load->model("eps_npat_data");
	   $yeps = $this->eps_npat_data->yearly_eps_data($company_code);
	   
	   foreach($yeps as $yp)
	   {
	      $years[] = $yp->eps_year;
		  $yr_eps[] = (float)$yp->q4;
	   }
	   
	   $t[] = array("data"=>$years);	   
	   $t[] = array("data"=>$yr_eps);
	   echo json_encode($t);
	}


	public function yearly_nav_shares_json()
	{
	   $company_code = $this->input->post("company_id");
	   $this->load->model("eps_npat_data");
	   $year_datas = $this->eps_npat_data->yearly_nav_data($company_code);
	   foreach($year_datas as $year_data)
	   {
			$years[] = $year_data->YEAR;
	   }
	   
	   $eps_continue_data = $this->eps_npat_data->yearly_nav_shares_data($company_code);
	   foreach($eps_continue_data as $eps_cont_data)
	   {
			$shares[] = (float)$eps_cont_data->NAV_PERSHARE;
	   }
	   $t[0] = array("data"=>$years);
	   $t[1] = array("data"=>$shares);
	   echo json_encode($t);	   
	}	

	public function net_profit_all_quarter_continuing_json()
	{
	  $company_code = $this->input->post("company_id");
	  $this->load->model("eps_npat_data");	  
	  $firsts = $this->eps_npat_data->net_profit_year_continuing_data($company_code);
	  	  
	  foreach($firsts as $first)
	  {
	    $years[] = (int)$first->eps_year;
	  }	  
	  
	  $eps_continue_data = $this->eps_npat_data->net_profit_all_quarter_continuing_data($company_code);	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->q1 ;
		$q2_6m[] = (float)$eps_cont_data->q2_6m ;
		$q3_9m[] = (float)$eps_cont_data->q3_9m ;
		$q4_12m[] = (float)$eps_cont_data->q4_12m ;
	  }	    
	  
	  $t[0] = array("name"=>"categories", "data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_6m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_9m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_12m);
	  echo json_encode($t);
	}


	public function eps_all_quarter_continuing_json()
	{
	
	  $company_code = $this->input->post("company_id");
	  $this->load->model("eps_npat_data");
	  
	  $eps_years = $this->eps_npat_data->eps_continuing_years_data($company_code);
	  foreach($eps_years as $eps_year)
	  {
	    $years[] = (int)$eps_year->eps_year;
	  }	  
	  
	  $eps_continue_data = $this->eps_npat_data->eps_continuing_all_quarter_data($company_code);
	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->q1 ;
		$q2_6m[] = (float)$eps_cont_data->q1 + (float)$eps_cont_data->q2 ;
		$q3_9m[] = (float)$eps_cont_data->q1 + (float)$eps_cont_data->q2 + (float)$eps_cont_data->q3 ;
		$q4_12m[] =(float)$eps_cont_data->q1 + (float)$eps_cont_data->q2 + (float)$eps_cont_data->q3 + (float)$eps_cont_data->q4 ;
	  }	  
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_6m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_9m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_12m);
	  
	  echo json_encode($t);
	}	


	public function net_profit_first_quarter_continuing_json()
	{
		$company_code = 13;//$this->input->post("company_id");
		$this->load->model("eps_npat_data");	  
	    $firsts = $this->eps_npat_data->net_profit_year_continuing_data($company_code);
	  	  
	  foreach($firsts as $first)
	  {
	    $years[] = (int)$first->eps_year;
	  }
	  
	  
	  $eps_continue_data = $this->eps_npat_data->net_profit_first_quarter_continuing_data($company_code);	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->q1 ;
		$q2_3m[] = (float)$eps_cont_data->q2_3m ;
		$q3_3m[] = (float)$eps_cont_data->q3_3m ;
		$q4_3m[] = (float)$eps_cont_data->q4_3m ;
	  }	    
	  
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_3m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_3m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_3m);
	  echo json_encode($t);
	}




    public function eps_first_quarter_continuing_json()
	{
	  $company_code = $this->input->post("company_id");
	  
	  
	  $this->load->model("eps_npat_data");	
	  $eps_years = $this->eps_npat_data->eps_continuing_years_data($company_code);
	  foreach($eps_years as $eps_year)
	  {
	    $years[] = (float)$eps_year->eps_year;
	  }
	  
	  $eps_continue_data = $this->eps_npat_data->eps_continuing_first_quarter_data($company_code);
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->q1 ;
		$q2_3m[] = (float)$eps_cont_data->q2 ;
		$q3_3m[] = (float)$eps_cont_data->q3 ;
		$q4_3m[] = (float)$eps_cont_data->q4 ;
	  }	    
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_3m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_3m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_3m);
	  echo json_encode($t);
	}


    public function share_distribution_json()
	{
	    $company_code = $this->input->post("company_id");
		$this->load->model("eps_npat_data");
		$shares = $this->eps_npat_data->share_distribution_data($company_code);
		$parse  = explode("#" , $shares);
		
		$sponsor   = (float)$parse[0];
		$govt      = (float)$parse[1];
		$institute = (float)$parse[2];
		$foreign   = (float)$parse[3];
		$publics   = (float)$parse[4];
		
		$t[] =  array("data"=>
					array(	
						array("Sponsor:$sponsor%",$sponsor),
						array("Govt:$govt%",$govt),
						array("Institute:$institute%",$institute),
						array("Foreign:$foreign%",$foreign),
						array("Publics:$publics%",$publics)
					)
				);
		echo json_encode($t);		
	}
	
	public function scope_to_pay_divident_json()
	{
		//"ACI";//
	    $company_code = $this->input->post("company_id");
		$this->load->model("eps_npat_data");
		$shares = $this->eps_npat_data->scope_to_pay_divident_data($company_code);
		$parse  = explode("#" , $shares);
		
		$paidup_r =  number_format($parse[0],2,'.','');
		$scope_r   =  number_format($parse[1],2,'.','');
		
		$paidup   = (float)$paidup_r;
		$scope     = (float)$scope_r;
				
		$t[] =  array("data"=>
					array(	
						array("Dividend Possible:".$scope."%",$scope),
						array("Paidup:".$paidup."%",  $paidup  )						
					)
				);
		echo json_encode($t);	
		
	}
}
?>