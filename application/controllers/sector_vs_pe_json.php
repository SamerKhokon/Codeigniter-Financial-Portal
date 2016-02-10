<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sector_vs_pe_json extends CI_Controller 
{
    
	public function sector_vs()
	{
	  	$this->load->model("sector_vs_eps_data");
		
		
		$sector_id = $this->input->post("sector_id");
		
	    $datas = $this->sector_vs_eps_data->individual_sector_capitalization($sector_id);	   

	    $total_weight_avg = 0;
	    $total_eps_avg    = 0;
	   
	    foreach($datas as $data)
	    {	   
	      $pe[]             = (float)$data->company_pe;
		  $cm[]             = $data->code;
	      $total_weight_avg += (float)$data->weighted_avg_price;
		  $total_eps_avg    += (float)$data->weighter_eps_avg_price;
	    }	   
	    $sector_pe= (float)$total_weight_avg/(float)$total_eps_avg;

		for($i=0;$i<count($pe);$i++) 
		{
		   $industry_pe[] = (float)$sector_pe;
		}
		
		
		
		
		
		
		$t[0] = array("coms"=> $cm);
		$t[1] = array("pes" => $pe);
		$t[2] = array("sectors_pe"=>$industry_pe);
			
		echo json_encode($t);
	}
	
	
}
?>