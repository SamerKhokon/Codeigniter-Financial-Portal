<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divident_details_json extends CI_Controller 
{

	public function second_btn_json()
	{
		$years 	   = trim($this->input->post("years"));
		$sector_id = trim($this->input->post("sector_id"));
		
		//$years 	  = "2013,2014";
		//$sector_id = "3";	   
	   
		$this->load->model("divident_details_json_data");
		$dataas = $this->divident_details_json_data->get_single_sector_company_info($sector_id,$years);
		
		//print_r($dataas);
		$companies = "";
		foreach($dataas as $dt)
		{
		 $companies  .= trim($dt->code) .",";
		 $ids[] = $dt->company_id;
		} 
		$companies = substr($companies,0,strlen($companies)-1);
		
		$parse = explode(",",$companies);
		foreach($parse as $k=>$v){
		  $cmp[] = trim($v);
		}		
		$t[0] = array("cat"=>$cmp);
		$j = 1;
		
		//print_r($cmp);
		for($i=0;$i<count($ids);$i++)
		{
		  $company_id = $ids[$i];
		  $datas = $this->divident_details_json_data->get_years_of_single_company($company_id,$years);
		  $vals = array();	
		  foreach($datas as $k)
		  {
		     $vals[]= (float)$k->vl;
		  }
		  $x = array("data" => $vals);
          array_push($t , $x);
		}
		//print_r($t)."<br/>";
        echo json_encode($t);
	}


		public function first_btn_json()
		{		/*    
			$years 	       = trim($this->input->post("years"));
			$companies     = trim($this->input->post("companies"));
			$company_names = trim($this->input->post("company_names"));
			*/
			
			$years 	     = "2013,2014";
			$companies     = "63,13";
			$company_names = "BRACBANK,ACI";
				

			
			$this->load->model("divident_details_data");
			$dividend_datas = $this->divident_details_data->option_one_data($years , $companies);	
	   
	        $parses     = explode(",",$company_names);	   
	        $year_parse = explode(",",$years);
			$id_parses  = explode(",",$companies);
			
			
			//$cmps = "";
		    foreach($parses as $k=>$v) 
			{
			   $cmps[] =  trim($v) ;
			}
			$cmps = array_unique($cmps);
			$companies = "";
			foreach($cmps as $ki=>$vl) 
			{
			   $companies .=  trim($vl) ."," ;
			   $cmp[] = $vl;
			}
			$companies = substr($companies,0,strlen($companies)-1);
			//$cmp[0] = $companies;
			
			$yrs  = array_unique($year_parse);            			
			$t[0] = array("category"=>$cmp);		
			
			$xp = array();
			for($i=0;$i<count($id_parses);$i++)
			{
			    $cid = $id_parses[$i];
			    $this->load->model("divident_details_json_data");
				$datas = $this->divident_details_json_data->get_years_of_single_company($cid,$years);
				//print_r($datas);
				$xp = array();
				foreach($datas as $d) 
				{
					$xp[] = (float)$d->vl;
					
				}	
				$t[]  = array("data"=>$xp);				
		    }
            //print_r($t);			
			echo json_encode($t);				
		}
		
		
		
		public function get_my_data($datas)
		{
		    $pt = array();
		    foreach($datas as $d) 
			{
			   $pt[] = (float)$d->vl;
			}
			return $pt;
		}
		
		
		public function getData($company_id , $years)
		{
		   $this->load->model("divident_details_json_data");
		   $datas = $this->divident_details_json_data->get_single_company_info($company_id , $years);
		   $result = "";
		   foreach($datas as $data)
		   {
		       $result .= (float)$data->vl . ",";
		   }
		   return substr($result,0,strlen($result)-1);
		}
}		
?>