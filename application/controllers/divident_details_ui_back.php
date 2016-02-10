<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divident_details_ui extends CI_Controller 
{
	public function index()
	{		   		
		$this->load->model("menu_data");
		$this->load->model("divident_details_data");
		$codes1 = $this->divident_details_data->get_companies();		
	    $sects   = $this->divident_details_data->get_sectors();
		
	    //$data['menu_overview']    = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
	    //$data['submenu_overview'] = $this->menu_data->get_submenu_overview("divident_details_ui");	
	    $data['divident_years']   = $this->divident_details_data->dividend_years();
	
		$data['codes1'] = $codes1;
		$data['sects']  = $sects;
		$this->load->vars($data);
		
		$this->load->view("home/divident_details_ui_view");	
	}
	
	
	
	
	
	
	
	
	
	public function divident_detail_option_two_search_result()
	{
	    $sector_sel = $this->input->post("sector_id");
	    $years      = $this->input->post("years");
	   
	    $y = "";
	    foreach($years as $k=>$v){
		  if($v!=""){
			$y .= (int)$v .',';
		   }
		}
		$y = substr($y,0,strlen($y)-1);	   
		
		$this->load->model('divident_details_data');		
	    $dts = $this->divident_details_data->divident_cash_for_a_sector($sector_sel,$y);
		
		
		
		
		
	?>
	<table  width="100%">
		<tr>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="background-color:#669999;color:#fff;text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="background-color:#3399ff;color:#fff;text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="background-color:#999966;color:#fff;text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="background-color:#339900;color:#fff;text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="background-color:#993300;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="background-color:#E2A76F;color:#fff;text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="background-color:#FFA62F;color:#fff;text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		<?php
			foreach($dts as $or)
			{
				$interim 		= (float)$or->INTERIM_DIVIDEND_CASH;
				$final   		= (float)$or->FINAL_DIVIDEND_CASH;		   
				$interim_stock 	= (float)$or->INTERIM_DIVIDEND_STOCK;
				$final_stock   	= (float)$or->FINAL_DIVIDEND_STOCK;		   
				$div_year 		= (int)$or->YEAR;
				$company_code 	= $or->COMPANY_CODE;		   
				$interim_declare_date =  $or->INTERIM_DIVIDEND_DECLARATION_DATE;
				$final_declare_date   =  $or->FINAL_DIVIDEND_DECLARATION_DATE;
				
				
			$company_eps     	 = $this->divident_details_data->eps_of_a_company($div_year , $company_code);
		    $last_date_price = $this->divident_details_data->get_last_traded_price();		   
		    $vals 			 = $this->divident_details_data->get_sector_category($company_code);
		    $parse 				 = explode("#",$vals);
		   
		   $code     = $parse[0];
		   $category = $parse[1];
		   $sector   = $parse[2];		  
		   
		    if($final!="" && $interim!="") 
			{
			    if($company_eps=="" || $company_eps==0)
				{
				$payout_ratio     =0;
				}
				else
				{
				$payout_ratio     = $final /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0)
				{
				$divident_yield   = 0;
				}
				else
				{
				$divident_yield   = $final/$last_date_price;
				}
				
				$divident_cash    = $final;
				$divident_stock   = $final_stock;
				$declaration_date = $final_declare_date;
		    }
			else if($final=="" && $interim!="")
			{
			    if($company_eps=="" || $company_eps==0)
				{
					$payout_ratio     = 0;
				}else{
					$payout_ratio     = $interim /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0)
				{
					$divident_yield   =0;
				}else{
					$divident_yield   = $interim/$last_date_price;
				}
				
				$divident_cash    = $interim;
				$divident_stock   = $interim_stock;
				$declaration_date = $interim_declare_date;
		    }			
			
				
				
		?>		
			<tr>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $company_code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $sector_sel;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declaration_date;?></td>
			</tr>
		
		
		<?php } ?>
	</table>	
	<?php
	//echo 1;
	}		
	
	
}
?>