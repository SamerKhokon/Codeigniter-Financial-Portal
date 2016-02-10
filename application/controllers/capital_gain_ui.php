<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capital_gain_ui extends CI_Controller 
{
    public function index()
	{
		$this->load->model("capital_gain_data");				
		$companies = $this->capital_gain_data->company_code_for_combo();
		$sectors   = $this->capital_gain_data->get_sectors();	
		$data['companies'] = $companies;
		$data['sectors']   = $sectors;
		$this->load->vars($data);		
	    $this->load->view("home/capital_gain_ui_view");
	}
	
		public function capital_gain_first_search_json()
	{
	    $start = $this->input->post("start");
		$end   = $this->input->post("end");
		$companies  = $this->input->post("companies");
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->first_search_data_for_json($start,$end,$companies);
		
		$cats = array();
		$capital_gains = array();
		
		foreach($datas as $data)
		{
			$cats[]			= $data->code;
			$capital_gains[] = (float) $data->capital_gain ;
		}
		$t[0] = array("categories"=>$cats); 
		$t[1] = array("data"=>$capital_gains); 
		echo json_encode($t);		   
	}
	
	
	public function capital_gain_second_search_json()
	{
	    $start = $this->input->post("start");
		$end   = $this->input->post("end");
		$sector  = $this->input->post("sector_id");
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->second_search_data($start,$end,$sector);
		
		$cats = array();
		$capital_gains = array();
		
		foreach($datas as $data)
		{
			$cats[]			= $data->code;
			$capital_gains[] = (float) $data->capital_gain ;
		}
		$t[0] = array("categories"=>$cats); 
		$t[1] = array("data"=>$capital_gains); 
		echo json_encode($t);		   
	}	
	
	
		
	
	public function capital_gain_third_search_json()
	{
	    $start = $this->input->post("start");
		$end   = $this->input->post("end");
		
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->third_search_json_data($start,$end);
		
		$cats = array();
		$capital_gains = array();
		
		foreach($datas as $data)
		{
			$cats[]			= $data->code;
			$capital_gains[] = (float) $data->capital_gain ;
		}
		$t[0] = array("categories"=>$cats); 
		$t[1] = array("data"=>$capital_gains); 
		echo json_encode($t);		   
	}		
	
	
	public function capital_gain_first_search_result()
	{
		$start = $this->input->post("start");
		$end   = $this->input->post("end");
		$companies  = $this->input->post("companies");
		
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->first_search_data($start,$end,$companies);
?>
		<table  width="100%" class="display table-bordered table-striped table dataTable">
				<tr>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Company Name</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Beg. Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">End Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Capital Gain</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Year</th>
				   <th colspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration Date</th>
				</tr>
				<tr>		  
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Stock</th>
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Cash</th>
				</tr>
<?php 		
		
		
				foreach($datas as $data)
				{
				   $code 			 = $data->code;
				   $beg_price 		 = $data->begning_price;
				   
				   $endprice          = $data->endprice;
				   $interim_rec_date = $data->interim_rec_date;
				   $interim_cash     = $data->interim_cash;
				   $interim_stock    = $data->interim_stock;				   
				   $annual_rec_date = $data->annual_rec_date;
				   $annual_cash     = $data->annual_cash;
				   $annual_stock    = $data->annual_stock;
				   $chng            = $data->capital_gain;
				  
				   
				   if($annual_rec_date==""){
				       if($interim_rec_date!=""){
					   $year = date("Y",strtotime($interim_rec_date));
					   }else{
					    $year = "";
					   }
					   $declare_date = $interim_rec_date;
					   $stock = $interim_stock;
					   $cash = $interim_cash;
				   }else{
				       if($annual_rec_date!=""){
					   $year = date("Y",strtotime($annual_rec_date));
					    }else{
					    $year = "";
					   }
					   $declare_date = $annual_rec_date;
					   $stock = $annual_stock;
					   $cash = $annual_cash;
				   }
?>


					<tr>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $code;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $beg_price;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $endprice;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $chng;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $year;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $stock;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $cash;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declare_date;?></td>
					</tr>
		
		   
		   
<?php 		  
				}
?>		
		</table>
	<?php	
		//capital_gain_first_search_result_json($cats,$capital_gains);
//second_search_data($start,$end,$sector)		
	}
	
	
	
	
	public function capital_gain_second_search_result()
	{
		$start = $this->input->post("start");
		$end   = $this->input->post("end");
		$sector  = $this->input->post("sector_id");
		
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->second_search_data($start,$end,$sector);
?>
		<table  width="100%" class="display table-bordered table-striped table dataTable">
				<tr>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Company Name</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Beg. Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">End Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Capital Gain</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Year</th>
				   <th colspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration Date</th>
				</tr>
				<tr>		  
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Stock</th>
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Cash</th>
				</tr>
<?php 		
		
		
				foreach($datas as $data)
				{
				   $code 			 = $data->code;
				   $beg_price 		 = $data->begning_price;
				   
				   $endprice          = $data->endprice;
				   $interim_rec_date = $data->interim_rec_date;
				   $interim_cash     = $data->interim_cash;
				   $interim_stock    = $data->interim_stock;				   
				   $annual_rec_date = $data->annual_rec_date;
				   $annual_cash     = $data->annual_cash;
				   $annual_stock    = $data->annual_stock;
				   $chng            = $data->capital_gain;
				  
				   
				   if($annual_rec_date==""){
					   if($interim_rec_date!=""){
					   $year = date("Y",strtotime($interim_rec_date));
					   }else{ $year="";}
					   $declare_date = $interim_rec_date;
					   $stock = $interim_stock;
					   $cash = $interim_cash;
				   }else{
					   if($annual_rec_date!=""){
					   $year = date("Y",strtotime($annual_rec_date));
					   }else{ $year="";}
					   $declare_date = $annual_rec_date;
					   $stock = $annual_stock;
					   $cash = $annual_cash;
				   }
?>


					<tr>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $code;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $beg_price;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $endprice;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $chng;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $year;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $stock;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $cash;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declare_date;?></td>
					</tr>
		
		   
		   
<?php 		  
				}
?>		
		</table>
	<?php	
		//capital_gain_first_search_result_json($cats,$capital_gains);
//second_search_data($start,$end,$sector)
//third_search_data($start,$end)		
	}
	
	
	
	
	
	public function capital_gain_third_search_result()
	{
		$start = $this->input->post("start");
		$end   = $this->input->post("end");
		
		$this->load->model("capital_gain_data");
		$datas = $this->capital_gain_data->third_search_data($start,$end);
?>
		<table  width="100%" class="display table-bordered table-striped table dataTable">
				<tr>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Company Name</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Beg. Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">End Price</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Capital Gain</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Year</th>
				   <th colspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration</th>
				   <th rowspan="2" style="font-family: tahoma,Arial;background-color:#ccc;">Declaration Date</th>
				</tr>
				<tr>		  
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Stock</th>
				  <th style="font-family: tahoma,Arial;background-color:#ccc;">Cash</th>
				</tr>
<?php 		
		
		
				foreach($datas as $data)
				{
				   $code 			 = $data->code;
				   $beg_price 		 = $data->begning_price;
				   
				   $endprice          = $data->endprice;
				   $interim_rec_date = $data->interim_rec_date;
				   $interim_cash     = $data->interim_cash;
				   $interim_stock    = $data->interim_stock;				   
				   $annual_rec_date = $data->annual_rec_date;
				   $annual_cash     = $data->annual_cash;
				   $annual_stock    = $data->annual_stock;
				   $chng            = $data->capital_gain;
				  
				   
				   if($annual_rec_date==""){
					   if($annual_rec_date!=""){
						$year = date("Y",strtotime($interim_rec_date));
					   }else{
						$year ="";
					   }
					   $declare_date = $interim_rec_date;
					   $stock = $interim_stock;
					   $cash = $interim_cash;
				   }else{
					   if($annual_rec_date!=""){
						$year = date("Y",strtotime($annual_rec_date));
					   }else
					   {$year="";}
					   
					   $declare_date = $annual_rec_date;
					   $stock = $annual_stock;
					   $cash = $annual_cash;
				   }
?>


					<tr>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $code;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $beg_price;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $endprice;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $chng;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $year;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $stock;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $cash;?></td>
						<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declare_date;?></td>
					</tr>
		
		   
		   
<?php 		  
				}
?>		
		</table>
	<?php	
		//capital_gain_first_search_result_json($cats,$capital_gains);
//second_search_data($start,$end,$sector)
//third_search_data($start,$end)		
	}
	
	

	
	
}
?>	