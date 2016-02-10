<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Moving_avg_band_ui extends CI_Controller 
{
   public function index()
   {
      $this->load->model("moving_avg_band_data");
      $companies = $this->moving_avg_band_data->get_companies();
	  $data['companies'] = $companies;
	  $this->load->vars($data);
      $this->load->view("home/moving_avg_band_ui_view");
   }
      
   
   public function moving_avg_btn_event()
   {
      $company_ids     = $this->input->post("companies");
	  $names           = trim($this->input->post("names"));
      $moving_avg_type = $this->input->post("moving_avg_type");
	  $parse_company_ids = explode("," , $company_ids);
	  $parse_company_names = explode("," , $names);
	 
	  
	  if($moving_avg_type=="sma") 
	  {
		$this->get_sma_result_table($parse_company_names,$parse_company_ids);
	  }
	  else if($moving_avg_type=="ema")
	  {
	    $this->get_ema_result_table($parse_company_names,$parse_company_ids);
	  }
	  else if($moving_avg_type=="wma")
	  {
	    $this->get_ema_result_table($parse_company_names,$parse_company_ids);
	  } 
   }
   
   
   /*****************************************************
   *** simple moving average band
   ******************************************************/
   public function get_sma_result_table($companies, $companyids)
   {   
   ?>  <br/>
   <table width='100%' class="display table-bordered table-striped table dataTable" id='ljSortable'>
		<thead>
		<tr>
			<th>Code</th>
			<th>5 day</th>
			<th>15 day</th>
			<th>45 day</th>
			<th>100 day</th>
			<th>150 day</th>
			<th>200 day</th>
			<th>Ltp</th>
		</tr>
		</thead>
	<tbody>
	<?php 
	$this->load->model("moving_avg_band_data");	
	for($i=0;$i<count($companyids);$i++)
	{	   	
	    $company_id = $companyids[$i];
	    $vals = $this->moving_avg_band_data->get_sma_vals($company_id);
		$parse = explode("#" ,$vals);
		
		$day_5    = $parse[0];
		$day_15   = $parse[1];
		$day_45   = $parse[2];
		$day_100  = $parse[3];
		$day_150  = $parse[4];
		$day_200  = $parse[5];		
		$ltp      = $parse[6]; //get_day_ltp($companies[$i]);
	
	    $h = array($day_5,$day_15,$day_45,$day_100,$day_150,$day_200,$ltp);		
		echo "<tr>";
		echo "<td>".$companies[$i]."</td>". $this->get_sma_array_keys($h);   
		echo "</tr>";
	}
	?>
	<tbody>
	</table>	    
		
		<script src="<?php echo base_url();?>js/ljSortable.min.js"></script>
 
   <?php 
    }
    
    
 
	
	
		
	public function get_ema_result_table($companies, $companyids)
	{
	?><br/>
	<table width='100%' class="display table-bordered table-striped table dataTable" id='ljSortable'>
	<thead>
		<tr>
			<th>Code</th>
			<th>5 day</th>
			<th>15 day</th>
			<th>45 day</th>
			<th>100 day</th>
			<th>150 day</th>
			<th>200 day</th>
			<th>Ltp</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$this->load->model("moving_avg_band_data");
	for($i=0 ; $i < count($companyids) ; $i++)
	{	
		$company_id = $companyids[$i];
		$vals 		= $this->moving_avg_band_data->get_ema_vals($company_id);
		$parse 		= explode("#" , $vals);
		
		$sma_5   = $parse[0];
		$sma_15  = $parse[1];
		$sma_45  = $parse[2];
		$sma_100 = $parse[3];
		$sma_150 = $parse[4];
		$sma_200 = $parse[5];
		$ltp     = $parse[6];
					
		$prev_ema_5  = $sma_5;
		$sconst_5 	 = 2/6;
		$ema_5 		 = (($ltp- $prev_ema_5)*$sconst_5)+$prev_ema_5;
		$ema_5 		 = number_format($ema_5,2,'.','');
					
		$prev_ema_15 = $sma_15;
		$sconst_15 	 = 2/16;
		$ema_15 	 = (($ltp - $prev_ema_15)*$sconst_15)+$prev_ema_15;	
		$ema_15 	 = number_format($ema_15,2,'.','');
				
		$prev_ema_45 = $sma_45;
		$sconst_45   = 2/46;
		$ema_45      = (($ltp - $prev_ema_45)*$sconst_45)+$prev_ema_45;
		$ema_45      = number_format($ema_45,2,'.','');
				
		$prev_ema_100 = $sma_100;
		$sconst_100   = 2/101;
		$ema_100      = (($ltp - $prev_ema_100)*$sconst_100)+$prev_ema_100;	
		$ema_100      = number_format($ema_100,2,'.','');
				
		$prev_ema_150 = $sma_150;
		$sconst_150   = 2/151;
		$ema_150      = (($ltp - $prev_ema_150)*$sconst_150)+$prev_ema_150;	
		$ema_150      = number_format($ema_150,2,'.','');
				
		$prev_ema_200 = $sma_200;
		$sconst_200   = 2/201;
		$ema_200      = (($ltp - $prev_ema_200)*$sconst_200)+$prev_ema_200;	
		$ema_200      = number_format($ema_200,2,'.','');
		
		$h = array($ema_100,$ema_45,$ema_5,$ema_15,$ema_150,$ema_200,$ltp);
		
		echo "<tr>";
		echo "<td>".$companies[$i]."</td>". $this->get_ema_array_keys($h);		   
		echo "</tr>";
	}
?>
	<tbody>
	</table>
	<!-- <script src="//code.jquery.com/jquery.js"></script>-->
	<script src="<?php echo base_url();?>js/ljSortable.min.js"></script>
	<?php 	
	}	
	
	
	
	
	
	
	
	public function get_wma_result_table($companies, $companyids)
	{
	?><br/>
	<table width='100%' class="display table-bordered table-striped table dataTable" id='ljSortable'>
	<thead>
	<tr>
	    <th>Code</th>
		<th>5 day</th>
		<th>15 day</th>
		<th>45 day</th>
		<th>100 day</th>
		<th>150 day</th>
		<th>200 day</th>
		<th>Ltp</th>
	</tr>
	</thead>
	<tbody>	
	<?php
	$this->load->model("moving_avg_band_data");
	for($i=0;$i<count($companyids);$i++)
	{	
		$company_id = $companyids[$i];		
		$vals = $this->moving_avg_band_data->get_wma_vals($company_id);	
		$h = explode("#",$vals);		
		echo "<tr>";
		echo "<td>".$companies[$i]."</td>". $this->get_wma_array_keys($h);		   
		echo "</tr>";
	}
?>
	<tbody>
	</table>
		<script src="<?php echo base_url();?>js/ljSortable.min.js"></script>

	<?php 
	
	}
	
	
	
	

	
	
	public function get_wma_array_keys($h)
	{
		 $v = array();
		 foreach($h as $k=>$vl)
		 {
		   $hh[] = $vl; 	 
		 }	 
		 asort($h); 
		 $str = "";
		 foreach($h as $k=>$vl)
		 {
		   $str .=  "<td >". ($k+1)  ."</td>"; 	 
		 }	
		 return $str;
	}	
	
	
	public function get_ema_array_keys($h)
	{
		 $v = array();
		 foreach($h as $k=>$vl)
		 {
		   $hh[] = $vl; 	 
		 }	 
		 asort($h); 
		 $str = "";
		 foreach($h as $k=>$vl)
		 {
		   $str .=  "<td >". ($k+1)  ."</td>"; 	 
		 }
		return $str;
	}	
	

   public function get_sma_array_keys($h)
	{
		$v = array();
		foreach($h as $k => $vl)
		{
		   $hh[] = $vl; 	 
		}	 
		asort($h); 
		$str = "";
		foreach($h as $k => $vl)
		{
		   $str .=  "<td >". ($k+1)  ."</td>"; 	 
		}		 
		return $str;
	}
   
   	
		
   
}
?>