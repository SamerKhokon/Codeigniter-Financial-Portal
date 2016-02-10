<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

<?php $this->load->view("utility"); ?>

</head>
<body>
<div class="container"> 
 
    <!---header start----->	
    <div class="row">
		<?php $this->load->view("home/capm_header");?>
    </div>	
	
    <div class="row">
		<div class="col-md-12  placeholder">  </div>
	</div>

	<div class="row">
		<?php $this->load->view("home/capm_megamenu");?>
	</div> 
    <!---header end----> 

      

	  
	  
	  
    <!--body start---->
	<div class="row"> 

		<!--static sidebar menu---->
		<div class="col-md-3">
			<?php $this->load->view("home/company_fundamental_quantitative_left_menu");?>
		</div>
		<!--static sidebar menu end--->
		
		
		
		
		
		
		
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-12 placeholder">
					<?php $this->load->view("home/company_fundamental_quantitative_submenu_overview");?>
				</div>
			</div>

			
				<br/>		
					<input type="hidden" id="sel_flag" value=""/>
					
					    <table width="100%" >
						<tr>
						    <td>Select Weekly Top Gainer</td>
						    <td>&nbsp;</td>
						    <td>Select Weekly Top Looser</td>
						</tr>
						<tr>
							<td>
							  <select id="weeklytop_gainer" style="border:1px solid #999966;width:120px;">
								<option value="">Choose any one</option> 
								<option value="turnover">Turnover</option> 
								<option value="volume">Volume</option> 
								<option value="no_of_trades">No of Trades</option> 								
								<option value="changes">%Change</option> 
								<option value="turnover_growth">Turnover Growth</option>								
							  </select>						   
							</td>
							<td>&nbsp;</td>
							<td>
								<select id="weeklytop_looser" style="border:1px solid #999966;width:120px;">
									<option value="">Choose any one</option> 
									<option value="turnover">Turnover</option> 
									<option value="volume">Volume</option> 
									<option value="no_of_trades">No of Trades</option> 								
									<option value="changes">%Change</option>
									<option value="turnover_growth">Turnover Growth</option>									
								</select>	
						   </td>
						</tr>					
						</table>
						<div id="search_result"></div>   
								   
						
					<table width="100%" class="display table-bordered table-striped table dataTable">
					<tr>
						<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Price</th>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Price</th>
					</tr>
					<tr>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
							</tr>
							<?php  
							$g_prices = $this->load->get_var('g_prices');
							//= $this->weeklytop_gainer_data->dailytop_gainer_by_price();
								$i=0;
								foreach($g_prices as $price)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
									  <td style="<?php echo $css;?>">						    
										  <?php echo number_format($price->changes, 2, '.', '');?>%
									  </td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
							</tr>
							<?php  
							$l_prices = $this->load->get_var('l_prices');
							//= $this->weeklytop_looser_data->dailytop_looser_by_percent_change();
								$i=0;
								foreach($l_prices as $lprice)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($lprice->changes, 2, '.', '');?>%</td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>			
					</tr>
					
					
					
					<tr>
					<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
					</tr>
					<tr>
						<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Volume</th>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Volume</th>
					</tr>
					<tr>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
							</tr>
							<?php  
							$g_volume = $this->load->get_var('g_volume');
							//= $this->weeklytop_gainer_data->dailytop_gainer_by_volume_data();
								$i=0;
								foreach($g_volume as $price)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($price->volume, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
							</tr>
							<?php  
							$l_volume = $this->load->get_var('l_volume');
//							= $this->weeklytop_looser_data->dailytop_looser_by_volume_data();
								$i=0;
								foreach($l_volume as $lprice)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($lprice->volume, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>			
					</tr>		
					
					
					
					<tr>
					<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
					</tr>
					
					
					<tr>
						<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Turnover</th>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Turnover</th>
					</tr>
					<tr>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
							</tr>
							<?php  
							$g_turnover = $this->load->get_var('g_turnover');
							//= $this->weeklytop_gainer_data->dailytop_gainer_by_turnover_data();
								$i=0;
								foreach($g_turnover as $price)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($price->turnover, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
							</tr>
							<?php  
							$l_turnover = $this->load->get_var('l_turnover');
							//= $this->weeklytop_looser_data->dailytop_looser_by_turnover_data();
								$i=0;
								foreach($l_turnover as $lprice)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($lprice->turnover, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>			
					</tr>
					
					
						
					<tr>
					<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
					</tr>				
					<tr>
						<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by No of Trades</th>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by No of Trades</th>
					</tr>
					<tr>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trades</th>
							</tr>
							<?php  
							
							$g_no_of_trade  = $this->load->get_var('g_no_of_trade');
//							= $this->weeklytop_gainer_data->dailytop_gainer_by_no_of_trades_data();
								$i=0;
								foreach($g_no_of_trade as $price)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($price->no_of_trades, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trades</th>
							</tr>
							<?php  
							$l_no_of_trade  = $this->load->get_var('l_no_of_trade');
//							= $this->weeklytop_looser_data->dailytop_looser_by_no_of_trades_data();
								$i=0;
								foreach($l_no_of_trade as $lprice)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo number_format($lprice->no_of_trades, 2, '.', '');?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>			
					</tr>
					
	<tr>
					<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
					</tr>				
					<tr>
						<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Turnover Growth</th>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Turnover Growth</th>
					</tr>
					<tr>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover Growth</th>
							</tr>
							<?php  
							
							$g_tgrowth  = $this->load->get_var('g_tgrowth');
								$i=0;
								foreach($g_tgrowth as $gt)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $gt->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo $gt->turnover_growth;?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>
							<table width="100%" class="display table-bordered table-striped table dataTable">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover Growth</th>
							</tr>
							<?php  
							$l_tgrowth  = $this->load->get_var('l_tgrowth');
								$i=0;
								foreach($l_tgrowth as $lw)
								{ 
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
							?>
									<tr>
									  <td style="<?php echo $css;?>"><?php echo $lw->code;?></td>
									  <td style="<?php echo $css;?>"><?php echo $lw->turnover_growth;?></td>
									</tr> 
							<?php 
								}
							?>
							</table>
						</td>			
					</tr>					
					
					</table>
					
					
					
				 
					
					</td>
				</tr>
				</table>		

		</div><!---the bottom tens---->

    </div>
	</div>

<script type="text/javascript">
		$(document).ready(function(){
	        //alert(3);						
						
						$("#weeklytop_gainer").change(function()
						{
						    var  weeklytop_gainer = $("#weeklytop_gainer").val();
							if(weeklytop_gainer!="" ) 
							{
								//alert(weeklytop_gainer);
								$("#search_result").load("<?php echo site_url();?>/weekly_top_ui/weeklytrade_status_table",
								{'keyword':weeklytop_gainer+'#desc'},function(){});
							}
							else
							{
								$("#search_result").load("<?php echo site_url();?>/weekly_top_ui/weeklytrade_status_table",
								{'keyword':'#'},function(){});							
							}
						});
						
						
						$("#weeklytop_looser").change(function(){
						    var  weeklytop_looser = $("#weeklytop_looser").val();
							if(weeklytop_looser!="" ) 
							{
								//alert(weeklytop_looser);
								$("#search_result").load("<?php echo site_url();?>/weekly_top_ui/weeklytrade_status_table",
								{'keyword':weeklytop_looser+'#asc'},function(){});
							}
							else
							{
								$("#search_result").load("<?php echo site_url();?>/weekly_top_ui/weeklytrade_status_table",
								{'keyword':'#'},function(){});							
							}
						});
						
						$("#search_result").load("<?php echo site_url();?>/weekly_top_ui/weeklytrade_status_table",
						{'keyword':'#'},function(){});
								
								
								
								   $('#accordion .panel-collapse').on('shown.bs.collapse', function () {
       $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
    });
    $('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
       $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
    });

		
								
								
							});
						    </script> 
							 
    <!--main column end for body---> 
    <!--body end--> 

<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>