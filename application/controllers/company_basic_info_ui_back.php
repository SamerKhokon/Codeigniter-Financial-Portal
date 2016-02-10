<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_basic_info_ui extends CI_Controller 
{
    public function index()
	{
	   $this->load->model("input_form_data");
	   $codes = $this->input_form_data->company_code_for_combo();
	   
	   $this->load->model("menu_data");
	   $data['menu_overview'] = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
	   
	   $data['submenu_overview'] = $this->menu_data->get_submenu_overview("company_basic_info_ui");
	   
	   $data['codes'] = $codes;	   
	   $this->load->vars($data);
	   $this->load->view("home/company_basic_info_ui_view");
	}
	
	
	public function ui()
	{
	    error_reporting(0);
	    $company_code = $this->input->post("company_code");
	   	//$this->load->model("input_form_data");


		$this->load->model("company_basic_info_data");
	   
	   	$high  = $this->input_form_data->get_day_high($company_code);
		$low   = $this->input_form_data->get_day_low($company_code);
	   
		$basics = $this->input_form_data->get_company_basic_info($company_code);		
        print_r($basics);
		/*
		$basics_parse 	    = explode("#" , $basics);
		$name               = $basics_parse[0]; 
		$category 		    = $basics_parse[1]; 
		$company_purpose    = $basics_parse[2]; 
		$establishing_date  = $basics_parse[3]; 
		$address            = $basics_parse[4]; 
		$telephone          = $basics_parse[5]; 
		$fax                = $basics_parse[6];
		$email              = $basics_parse[7];
		$website            = $basics_parse[8];
		$sector             = $basics_parse[9];			
		$week_52            = number_format($high,2,'.','') . '-' . number_format($low,2,'.','');//$basics_parse[10];
		$year_end           = $basics_parse[11];
		$market_lot         = $basics_parse[12];
		
		
		
	
		
		$subsidiaries = $this->input_form_data->get_subsidiaries($company_code);	

		$last_info 		         = $this->input_form_data->get_last_info($company_code);
		$last_info_parse   = explode("#" , $last_info);
		$Last_Traded_Price = $last_info_parse[0];
		$Open_Price            = $last_info_parse[1];
		$Close_Price            = $last_info_parse[2];
		$Prev_Close_Price  = $last_info_parse[3];
		$Volume                 = $last_info_parse[4];
		$Day_High              = $last_info_parse[5];
		$Day_Low               = $last_info_parse[6];		
		$last_updated          = date('Y-m-d h:i:s');
		
		
		$anualized_eps = $this->input_form_data->get_anualized_eps($company_code);
		if($anualized_eps>0){
			$forwarded_pe = ($Last_Traded_Price/ $anualized_eps);
		}else{
		   $forwarded_pe =0;
		}
		
		if($anualized_eps>0){
		   $last_audited_eps = $this->input_form_data->get_last_audited_eps($company_code);
		   $last_audited_pe_ratio = $Last_Traded_Price/$last_audited_eps;
		}else{
		$last_audited_eps =0;
		  $last_audited_pe_ratio = 0;
		}
		$Last_Traded_Price/$last_audited_eps;
		
		$price_diff  = $Last_Traded_Price - $Prev_Close_Price;
		$percent     = ($Last_Traded_Price/$Prev_Close_Price)/100;		
		$market_name       = "Chittagong Stock Exchange";
	
		$share_info            = $this->input_form_data->get_share_info($company_code);
		$share_info_parse  = explode("#" , $share_info);
	    $total_share           = $share_info_parse[0];
	    $market_cap          = $share_info_parse[1];
	    $equity                   = $share_info_parse[2];	
		
		
		$managements = $this->input_form_data->company_management_info_row($company_code);
		
		$divident_info = $this->input_form_data->get_divident_info($company_code);		
		$divident_info_parse = explode("#",$divident_info);
		$iterim_declare_date = $divident_info_parse[0];
		$final_declare_date = $divident_info_parse[1];
		$agm_date = $divident_info_parse[2];
		
		$paidup_cap = $this->input_form_data->get_paidup_info($company_code);
		
		
		
		$prev_day_turnover    = $this->input_form_data->get_last_day_turnover($company_code);
		$curent_day_turnover = $this->input_form_data->get_current_day_turnover($company_code);
		$turnover_growth = (($curent_day_turnover-$prev_day_turnover)/100);*/
	?>
	
		<div class="row">
				<div class="col-md-12">
					<h2><?php echo $name;?> (<?php echo $company_code;?>)</h2>
					<h5><?php echo $sector;?> - <?php echo $market_name;?></h5>
					<table class="table table-responsive">
						<tbody>
						<tr>
							<td><h5 class="pull-left"><?php echo number_format($Last_Traded_Price,2,'.','');?></h5>
							
							<?php if($price_diff<0){?>
							<span class="glyphicon glyphicon-play red-icon"></span>
							<?php }else{ ?>
							<span class="glyphicon glyphicon-play blue-icon"></span>
							<?php } ?>
							</td>
							<td>
							      <?php if($price_diff<0){?>
									<small class="red">-<?php echo number_format($price_diff,2,'.','');?></small><br>
								<?php }else{ ?>
									<small class="blue"><?php echo number_format($price_diff,2,'.','');?></small><br>
								 <?php }?>															
									<small>volume:</small><br><small>open:</small>
									
							</td>
							<td>
							 <?php if($price_diff<0){  ?>
									<small class="red">-<?php echo number_format($percent,2,'.','');?>%</small><br>
									<?php }else{ ?>
									<small class="blue"><?php echo number_format($percent,2,'.','');?>%</small><br>
							 <?php }?>
							<small><?php echo number_format($Volume,0,'.','');?></small><br><small><?php echo number_format($Open_Price,2,'.','');?></small></td>
							<td class="center"><br>Last Updated:<?php echo date("d M Y H:i:s",strtotime($last_updated));?></td>
							<td><small>Pre Close:</small><br><h5><?php echo number_format($Prev_Close_Price,2,'.','');?></h5></td>
							<td><small>High</small><br><small><?php echo number_format($Day_High,2,'.','');?></small><br><small>open:</small></td>
							<td><small>Low</small><br><small><?php echo number_format($Day_Low,2,'.','');?></small><br>
							<small><?php echo number_format($Open_Price,2,'.','');?></small></td>
						</tr>
						</tbody>
					</table>
				</div>
		</div>    

			
	
	
	<div class="row">

	
	<div class="col-md-12 styled-tab">        

					<ul class="nav nav-tabs">
						<li class=""><a href="#tables" data-toggle="tab">Management Info</a></li>
						<li class="active"><a href="#profile" data-toggle="tab">Basic Info</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
					
						<div class="tab-pane" id="tables">
							<div class="tabbed-padding">
								 
								<div class="row">
								
									<div class="col-md-6">
										<table width="100%" class="table table-responsive table-striped">
											<thead>
												<tr>
													<th colspan="2">Basic Information</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td style="width: 130px;">
													<span class="intIndexName">Company Name</span>
													</td>
													<td>
														<div class="oneHalfContent">
															<div class="verticalCenter">
																	<?php echo $name;?></div>
															</div>
														<div>
															<div>
																<img src="images/Beximco%2520Synthetics%2520Limited_company_logo.jpg" width="150px">
															</div>
															</div>
													</td>
												</tr>
												<tr>
													<td>Company Purpose</td>
													<td><?php echo $company_purpose;?>
													</td>
												</tr>
												<tr>
													<td>Establishing Date</td>
													<td><?php echo $establishing_date;?></td>
												</tr>
												<tr>
													<td>Financial Year End</td>
													<td><?php echo$year_end;?></td>
												</tr>
																							
												<tr>
													<td>Subsidiaries</td>
													<td><?php echo $subsidiaries;?></td>
												</tr>
												<tr>
												    <td>52 Week Range</td>
													<td><?php echo $week_52 ;?></td>
												</tr>
												
											</tbody>
										</table>	
									</div>

									<div class="col-md-6">
										<table class="table table-responsive table-striped">
										<thead>
										<tr>
											<th colspan="2">Board Members</th>
										</tr>
										</thead>
										<tbody>
											<tr>
												<td></td>
												<td><?php echo $managements;?></td>
											</tr>										
										</tbody>
										</table>

										<table class="table table-responsive table-striped">
											<thead>
												<tr>
													<th colspan="2">Contacts</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Address</td>
													<td><?php echo $address;?></td>
												</tr>
												<tr>
													<td>Telephone</td>
													<td><?php echo $telephone;?></td>
												</tr>
												<tr>
													<td>Fax</td>
													<td><?php echo $fax;?></td>
												</tr>
												<tr>
													<td>Web Site</td>
													<td><?php echo $website;?></td>
												</tr>
												<tr>
													<td>Email address</td>
													<td><?php echo $email;?></td>
												</tr>
											</tbody>
										</table>
									
									</div>
							
								</div>
							</div>	
						</div>     
						<!-- end 1st tab co ntent -->
					  
					  
					  
					  
						<div class="tab-pane active" id="profile">			
							<div class="tabbed-padding">
								<div class="row">			
							
									<div class="col-md-6">
										<table class="table table-responsive table-striped">
											<thead>
											<tr><th colspan="2">Stock Statistics</th></tr>
											</thead>
											<tbody>
												<tr>
													<td> Market Capitalization (BDT)</td>
													<td><?php echo $market_cap;?></td>
												</tr>
												<tr>
													<td>Shareholders Equity (BDT)</td>
													<td><?php echo $equity; ?></td>
												</tr>
												<tr>
													<td>Book Value Per Share (BDT)	</td>
													<td></td>
												</tr>												
												<tr>
													<td>Forward P/E</td>
													<td><?php echo $forwarded_pe;?></td>
												</tr>
												<tr>
													<td>Audited EPS (BDT)</td>
													<td><?php echo $last_audited_eps;?></td>
												</tr>

												<tr>
													<td>Last Audited P/E Ratio (x)	</td>
													<td><?php echo $last_audited_pe_ratio;?></td>
												</tr>
												<tr>
													<td>  Trading Currency	</td>
													<td>Bangladeshi Taka</td>
												</tr>
												<tr>
													<td>Market Category		</td>
													<td><?php echo $category;?></td>
												</tr>
												<tr>
													<td>  Market Lot</td>
													<td><?php echo $market_lot;?></td>
												</tr>
												
												<tr>
													<td>Last Dividend Declaration Date	</td>
													<td>
							<?php 
							if($iterim_declare_date!="" && $final_declare_date!="" )
							{
								echo date("d M Y",strtotime($final_declare_date));
							}else if($iterim_declare_date!="" && $final_declare_date==""){
								echo date("d M Y",strtotime($iterim_declare_date));
							} else{
							   echo "";
							} 
							?>
													</td>
												</tr>
												<tr>
													<td>AGM Date</td>
													<td><?php echo date("d M Y",strtotime($agm_date));?></td>
												</tr>
											</tbody>
										</table>
									</div>

						
						
									<div class="col-md-6">
										<table class="table table-responsive table-striped">
											<thead>
												<tr><th colspan="2">Company Statistics</th> </tr>
											</thead>
											<tbody>
											<tr>
												<td>Total Shares</td>
												<td><?php echo $total_share;?></td>
											</tr>
											<tr>
												<td> Paid Up Capital (BDT) </td>
												<td><?php echo $paidup_cap;?></td>
											</tr>
											</tbody>
										</table>

										
										
										<!--
										<table class="table table-responsive table-striped">
										<thead>
											<tr>
												<th>Events</th>
												</tr>
										</thead>
										</table>
										
										<table class="table table-responsive table-striped">
											<thead>
											<tr>
												<th>Announcements</th>
												<td>
													<a href="#" class="pull-right">More Announcements</a>
												</td>
											</tr>
											</thead>
											<tbody>
												<tr>
													<td>31 October</td>
													<td><a>	BXSYNTH Q3 Earnings </a>  </td>
												</tr>
												<tr>
													<td>30 July</td>
													<td><a>	BXSYNTH Q2 Earnings </a>  </td>
												</tr>
												<tr>
													<td>20 May</td>
													<td><a>	BXSYNTH Trading Resume after Record Date</a> </td>
												</tr>
												<tr>
													<td class="date">19 May</td>
													<td><a>BXSYNTH Trade Suspension on Record Date</a></td>
												</tr>
												<tr>
													<td>16 May</td>
													<td><a>	BXSYNTH Q1 Earnings</a> </td>
												</tr>
											</tbody>
										</table>
										
										-->
									</div>		
						
								</div>			
							
							</div>
						</div>
						<!-- end 2nd tab content -->				
					
					</div>
					<!-- end tab container -->
				
				</div>
				<!-- div tab end -->
	
						 
	</div>
	<!-- end tab row -->			  
	<?php  
	
	}
	
	
	
}	
?>