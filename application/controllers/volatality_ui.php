<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volatality_ui extends CI_Controller 
{

    public function index()
	{
		$this->load->model("eps_npat_data");
		
		$this->load->model("capital_gain_data");
		$companies = $this->capital_gain_data->company_code_for_combo();

		$this->load->model("menu_data");
	    $data['menu_overview']    = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
		$data['submenu_overview'] = $this->menu_data->get_submenu_overview("volatality_top_ui");	
	    $data['companies'] 		  = $companies;
	    $this->load->vars($data);
		
	    $this->load->view("home/volatality_ui_view");
	}
	
	
	
	/********************************************************
	** volatality show result 
	** button request
	*********************************************************/
	public function volatality_search_result()
	{	
		error_reporting(0);
		/*
		$start_date      = "10-02-2013";
		$end_date        = "10-03-2013";
		$indicating_days = 7;
		$company_id =13;*/
		
		
	    $start_date      = $this->input->post("volatality_start_date");
		$end_date        = $this->input->post("volatality_end_date");
		$indicating_days = $this->input->post("indicating_days");
		$company_id      = $this->input->post("companies");
		
		
	    $this->load->model("volatality_data");
		$datas = array();
		$cats  = array();
		
		
		$all_dates =  $this->volatality_data->all_dates_in_range($start_date,$end_date,$company_id);
		foreach($all_dates as $all_date)
		{
		   if($all_date->entry_date!="") {
		   $dts[] = $all_date->entry_date;
		   }
		}
		//print_r($dts);
		$total_values = count($dts);
		$n= $total_values/$indicating_days;
		$length = ceil($n);
		
		$cats[0] = $dts[$indicating_days];
		$datas[0] = $this->volatality_data->volatality_standard_deviation($dts[0],$dts[$indicating_days],$company_id);
		
		
		for($i=1 ; $i <= $total_values-1; $i++)
		{
			$st = $i;
			//$ed = $i+$indicating_days;
		    if(($st+$indicating_days) > $total_values){
			$ed = $total_values-1;
			}else{
			$ed = $st+$indicating_days;
			}
			
		    //echo $i." =".$ed . "<br/>";	
		    $cats[$i]  = $dts[$ed];
		    $datas[$i] = $this->volatality_data->volatality_standard_deviation($dts[$i],$dts[$ed],$company_id);
		}			
		
		for($j=0;$j< count($cats)-$indicating_days ; $j++){
		      $categories[] = $cats[$j];
			  $v_data[] = $datas[$j];
			  //echo $cats[$j] ."<br/>";
		}
			
			
		$t[0] = array("category"=>$categories);
		$t[1] = array("data"=>$v_data);
	    //print_r($v_data);
		echo json_encode($t);
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
    public function standard_deviation($start_date , $end_date ,$codes)
    {
		$this->load->model("volatality_data");
	  
	  
		$total_numbers = $this->volatality_data->get_total_numbers($start_date , $end_date,$codes);
		$total_sum       = $this->volatality_data->get_sum($start_date , $end_date,$codes);
		$all_numbers    = $this->volatality_data->get_all_numbers($start_date , $end_date,$codes);	  
		$mean             = (float)$total_sum/((float)$total_numbers-1);	  
	  
	    $total_squaring  = 0;
		$squaring          = array();
		
		foreach($all_numbers as $number)
		{
			$num = (float)$number->val;
			$sqr   = $num - $mean;
			$v      = pow($sqr,2);
			$total_squaring += $v;
			$squaring[]       = $v;			
		}
	  
	    
	    $variance = $total_squaring/($total_numbers-1);	  
	    $sdv        = sqrt($variance);
		return $sdv;	  
    }
	
	

    public function json_for_company_one()
	{	
	    $this->load->model("volatality_data");
	
    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date  = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_01      = $this->input->post("company_code_01");

        
		/*		
		$volatality_start_date= "2014-01-20";
		$volatality_end_date  = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_01      = "ACI";		
		*/	
		
		$dates  = $this->volatality_data->get_dates($volatality_start_date,
		                $volatality_end_date,$company_code_01);		
			
		$date_list = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;				
			}else {
				$last= count($date_list) - 1;				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
						
			$sdv = $this->standard_deviation($beg , $end,$company_code_01);
			
			$date_label[] = $beg ;
			$sd_label[]   = (float)$sdv;			
		}
		
		$t[0] = array('dates'      => $date_label);  
		$t[1] = array('sdeviation' => $sd_label);
		echo json_encode($t);
	}
	
	
	
	public function json_for_company_two()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_02 = $this->input->post("company_code_02");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_02 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_02);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_02);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_02."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label);
		 $t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);	
	}	
	
	
	
	
	public function json_for_company_three()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_03 = $this->input->post("company_code_03");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_03 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_03);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_03);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_03."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label) ;
		 $t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
		
	}		
	
	
	
	public function json_for_company_four()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_04 = $this->input->post("company_code_04");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_04 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_04);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
					
			$sdv = $this->standard_deviation($beg , $end,$company_code_04);			
			$date_label[] = $end ;
			$sd_label[]   = $sdv;
			
			//echo $company_code_04."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label) ;
		 $t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);	
	}			
	
	
	public function json_for_company_five()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_05 = $this->input->post("company_code_05");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_05 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_05);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_05);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_05."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		$t[0] = array('dates'=>$date_label) ;
		$t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
		
	}				
	
	
	
	public function json_for_company_six()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_06 = $this->input->post("company_code_06");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_06 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_06);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_06);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_06."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		
		$t[0] = array('dates'=>$date_label) ; 
		$t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);		
	}	


	public function json_for_company_seven()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_07 = $this->input->post("company_code_07");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_07 = "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_07);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_07);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_07."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label); 
		 $t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
		
	}		
	
	
	
	public function json_for_company_eight()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_08= $this->input->post("company_code_08");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_08= "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_08);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_08);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_08."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label);
		 $t[0] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
		
	}			
	
	
	
	public function json_for_company_nine()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_09 = $this->input->post("company_code_09");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_09= "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_09);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_09);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_09."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		 $t[0] = array('dates'=>$date_label) ;
		 $t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
		
	}				
	
	
	
	public function json_for_company_ten()
	{	
	    $this->load->model("volatality_data");
	    
		$volatality_start_date= $this->input->post("volatality_start_date");
		$volatality_end_date = $this->input->post("volatality_end_date");
		$indicating_days      = $this->input->post("indicating_days");		
		$company_code_10 = $this->input->post("company_code_10");

        /*
		$volatality_start_date= "2014-01-20";
		$volatality_end_date = "2014-04-28";
		$indicating_days      = 7;		
		$company_code_10= "ACI";*/
		
			
		$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$company_code_10);		
			
		$date_list  			 = array();
		foreach($dates as $date)
		{
		   $date_list[] = $date->dates;
		}
			
		//print_r( $date_list);
					
		for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
		{
			if( count($date_list) == 0 ){
				$last = 0;
				
			}else if( count($date_list)<=6){
				$last= count($date_list)-1;				
			}else if( $i == count($date_list) ){
				$last= $i-1;
				
			}else {
				$last= count($date_list) - 1;
				
			}	
			
						 
			$end = $date_list[$last];
			$beg = $date_list[$i];
			
		
			
			$sdv = $this->standard_deviation($beg , $end,$company_code_10);
			
			$date_label[] = $end ;
			$sd_label[]    = $sdv;
			
			//echo $company_code_10."   ".$beg ."   ". $end."    ".$sdv."<br/>";
		}
		$t[0] = array('dates'=>$date_label);
		$t[1] = array('sdeviation'=>$sd_label);
		echo json_encode($t);
		
	}					
	
	
	
	public function date_check()
	{
	    $this->load->model("volatality_data");		
		 
		$volatality_start_date = $this->input->post("volatality_start_date");
		$volatality_end_date  = $this->input->post("volatality_end_date");
		$indicating_days        = $this->input->post("indicating_days");		
		
		$company_code_01 = $this->input->post("company_code_01");
		$company_code_02 = $this->input->post("company_code_02");
		$company_code_03 = $this->input->post("company_code_03");
		$company_code_04 = $this->input->post("company_code_04");
		$company_code_05 = $this->input->post("company_code_05");
		$company_code_06 = $this->input->post("company_code_06");
		$company_code_07 = $this->input->post("company_code_07");
		$company_code_08 = $this->input->post("company_code_08");
		$company_code_09 = $this->input->post("company_code_09");
		$company_code_10 = $this->input->post("company_code_10");
		
		
		$company_codes = array( $company_code_01 , $company_code_02 ,
				$company_code_03 , $company_code_04 , $company_code_05 ,
				$company_code_06 , $company_code_07 , $company_code_08 ,
				$company_code_09 , $company_code_10 );		

		foreach($company_codes as $codes)
		{
			if($codes!= "")
			{
				$dates  = $this->volatality_data->get_dates($volatality_start_date,$volatality_end_date,$codes);		
				
				$indicating_dates = array();
				$date_list  			 = array();
				foreach($dates as $date)
				{
				   $date_list[] = $date->dates;
				}
					
				//print_r( $date_list);
							
				for( $i = 0 ;  $i < count($date_list) ; $i += $indicating_days)
				{
					if( count($date_list) == 0 )
					{
						$last = 0;						
					}
					else if( count($date_list)<=6)
					{
					    $last= count($date_list)-1;
						
					}
					else if( $i == count($date_list) )
					{
						$last= $i-1;
						
					}else {
						$last= count($date_list) - 1;
						
					}	
					
								 
					$end = $date_list[$last];
					$beg = $date_list[$i];
					
					$sdv = $this->standard_deviation($beg , $end,$codes);
					echo $codes."   ".$beg ."   ". $end."    ".$sdv."<br/>";
				}
				
				
				
			}		
		}
		
	}
	//echo array_search("2014-01-25",$date_list);
}
?>