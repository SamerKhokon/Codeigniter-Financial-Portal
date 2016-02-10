<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divident_details_ui extends CI_Controller 
{
	public function index()
	{		   		
		$this->load->model("menu_data");
		$this->load->model("divident_details_data");
		$codes1 = $this->divident_details_data->get_companies();		
	    $sects   = $this->divident_details_data->get_sectors();		
	    $data['divident_years']   = $this->divident_details_data->dividend_years();	
		$data['codes1'] = $codes1;
		$data['sects']  = $sects;
		$this->load->vars($data);		
		$this->load->view("home/divident_details_ui_view");	
	}
		
	
	/**********************************************
	** divident details for selected companies
	********************************************/	
	public function btn_one_event()
	{
	    $years 	  = trim($this->input->post("years"));
	    $companies = trim($this->input->post("companies"));
	   
	   $this->load->model("divident_details_data");
	   $dividend_datas = $this->divident_details_data->option_one_data($years , $companies);	
	   
	  //print_r($dividend_datas);
	?>
	   
	   
	   <table  width="100%" class="display table-bordered table-striped table dataTable">
		<tr>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		<?php
			foreach($dividend_datas as $or)
			{
				
				$divident_cash   = (float)$or->annual_cash;				
				$divident_stock  = (float)$or->annual_stock;	
				$div_year 		 = (int)$or->year;				
				$company_code 	 = $or->code;
				$sector 	     = $or->sector;	
                $category        = $or->category;				
				$annual_rec_date = $or->annual_rec_date;
				$dividend_yield  = (float)$or->dividend_yield;
				$payout_ratio 	 = (float)$or->payout_ratio;	
				
		?>		
			<tr>
				<td style="background-color:#FFF;color:#000;text-align:left;"><?php echo $company_code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:left;"><?php echo $sector;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $dividend_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $annual_rec_date;?></td>
			</tr>
		
		
		<?php } ?>
	</table>	
	   
	   <?php 
	   
	}
	
	
	/**********************************************
	** divident details for single sector
	********************************************/
	
	public function btn_two_event()
	{		
	    $years 	   = trim($this->input->post("years"));
	    $sector_id = trim($this->input->post("sector_id"));
	  
	    $this->load->model("divident_details_data");
	    $dividend_datas = $this->divident_details_data->option_two_result($sector_id,$years);
		
?>	
		<table  width="100%" class="display table-bordered table-striped table dataTable">
		<tr>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		<?php 	
		foreach($dividend_datas as $or)
		{
		    $divident_cash   = (float)$or->annual_cash;				
			$divident_stock  = (float)$or->annual_stock;	
			$div_year 		 = (int)$or->year;				
			$company_code 	 = $or->code;
			$sector 	 	 = $or->sector;	
			$category        = $or->category;				
			$annual_rec_date = $or->annual_rec_date;
			$dividend_yield  = (float)$or->dividend_yield;
			$payout_ratio 	 = (float)$or->payout_ratio;
		?>
			<tr>
				<td style="background-color:#FFF;color:#000;text-align:left;"><?php echo $company_code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:left;"><?php echo $sector;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $dividend_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $annual_rec_date;?></td>
			</tr>
		
		<?php 
		}
		?>
		</table>
		<?php 
	}
	
	
}
?>