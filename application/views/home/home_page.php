<!DOCTYPE html>
<html>
  <head>
    <title> :: iportal  :: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php $this->load->view("utility");//#D1D0CE;?> 
  
  </head> 
  <body  style="background-color:#fff;">   

  
<?php  //if(!$this->session->userdata('CAPM_USER')){  ?>

	
	<div class="container">
	    <div class="row">		
			<div class="col-md-3" style="border:1px solid #000;">			
				<table style="height:80px;">
					<tr><td><img src="<?php echo base_url();?>img/iPortal.png"/></td></tr>
					<tr><td><span style="font-family:Verdana;font-style:italic;font-size:12px;">Financial Information for Prosperity</span></td></tr>
				</table>				
			</div>			
			<div class="col-md-2" style="border:1px solid #000;">			
				<table style="height:80px;">
					<tr><td><a href="#"><img style="width:170px;" src="<?php echo base_url();?>img/search.jpg"/></a></td></tr>
					<tr><td><a href="#"><img style="width:170px;" src="<?php echo base_url();?>img/sign-up-&-explore.jpg"/></a></td></tr>				
				</table>
			</div>
			<div class="col-md-2" style="border:1px solid #000;">
				<table style="height:80px;">
					<tr><td><a href="#"><img style="width:150px;"  src="<?php echo base_url();?>img/iportal-log-in.jpg"></a></td></tr>
					<tr><td><input type="text" style="width:150;background-image:url('<?php echo base_url();?>img/box.png');" value="Student"/></td></tr>
					<tr><td><a href="#"><img style="width:150px;"  src="<?php echo base_url();?>img/log-in.jpg"/></a></td></tr>				
				</table>
			</div>
			<div class="col-md-5" style="border:1px solid #000;">
			    <img style="margin-left:-15px;width:486px;height:80px;" src="<?php echo base_url();?>img/pic1.png"/>	
			</div>
			<div class="row">
				<div class="col-md-12">					
					<div class="col-md-3" style="border:1px solid #000;">	
								<div class="accordion" id="accordion2" style="width:270px;border:1px solid #000;">
								
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" 
											href="#collapseOne" style="font-family:Verdana;">Today`s Market</a>
										</div>
										<div id="collapseOne" class="accordion-body collapse in">
											<div class="accordion-inner">
												<ul>
													<li><a href="<?php echo site_url();?>/stock_market_ui">Stock Market</a></li>
													<li><a href="<?php echo site_url();?>/market_mover_ui">Market Mover</a></li>												 
													<li><a href="<?php echo site_url();?>/daily_top_ui">Daily Top</a></li>
													<li><a href="<?php echo site_url();?>/weekly_top_ui">Weekly Top</a></li>
													<li><a href="<?php echo site_url();?>/capital_gain_ui">Capital Gain</a></li>
													<li><a href="<?php echo site_url();?>/volatality_ui">Volatality</a></li>
													<li><a href="<?php echo site_url();?>/betaui">Beta</a></li>
													<li><a href="<?php echo site_url();?>/corellation_ui">Corellation</a></li>
													<li><a href="<?php echo site_url();?>/moving_avg_band_ui">Moving Average Band</a></li>												 
													<li><a href="<?php echo site_url();?>/eps_npat_ui">EPS NPAT Data</a></li>												 
													<li><a href="<?php echo site_url();?>/stock_vs_pe_ui">Stock vs PE Chart</a></li>												 												 
													<li><a href="<?php echo site_url();?>/divident_details_ui">Divident Details</a></li>												 												 
													
																								

													<li><a href="<?php echo site_url();?>/index_depth_ui">Market Depth</a></li>
													<li><a href="<?php echo site_url();?>/index_change_ui">Index Change%</a></li>													
													<li><a href="<?php echo site_url();?>/stock_monitor_ui">Stock Monitor</a></li>		
													<li><a href="<?php echo site_url();?>/sector_monitor_ui">Sector Monitor</a></li>														 
													
													
													<li><a href="<?php echo site_url();?>/intraday_graph_ui">Index Graph Details</a></li>														
													<li><a href="<?php echo site_url();?>/sector_index_graph_details_ui">Sector Price Details</a></li>			
													<li><a href="<?php echo site_url();?>/company_index_graph_details_ui">Company Price Details</a></li>			
													<li><a href="<?php echo site_url();?>/index_mover_ui">Index Mover</a></li>	
													
													<li><a href="<?php echo site_url();?>/report_ui">Reports</a></li>															
													<li><a href="<?php echo site_url();?>/mutual_fund_ui">Mutual Fund</a></li>														
													<li><a href="<?php echo site_url();?>/market_data_download_ui" >Market Data Download</a></li>	
													
													
													<li><a href="<?php echo site_url();?>/fundamental_screener_ui">Fundamental Screener</a></li>															
													<li><a href="<?php echo site_url();?>/price_position_ui">Price Position</a></li>														
													<li><a href="<?php echo site_url();?>/technical_screener_ui" >Technical Screener</a></li>	
																						
													<li><a href="<?php echo site_url();?>/mains/logout">Logout</a></li>
											    </ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" 
											href="#collapseTwo" style="font-family:Verdana;"> Company Fundamental & Quantitative</a>
										</div>
										<div id="collapseTwo" class="accordion-body collapse">
											<div class="accordion-inner">
											   <ul>
											     <li><a href="<?php echo site_url();?>/stock_market_ui">Stock Market</a></li>
											     <li><a href="<?php echo site_url();?>/market_mover_ui">Market Mover</a></li>												 
												 <li><a href="<?php echo site_url();?>/daily_top_ui">Daily Top</a></li>
												 <li><a href="<?php echo site_url();?>/weekly_top_ui">Weekly Top</a></li>
												 <li><a href="<?php echo site_url();?>/capital_gain_ui">Capital Gain</a></li>
													<li><a href="<?php echo site_url();?>/mains/logout">Logout</a></li>
											   </ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" 
											href="#collapseThree" style="font-family:Verdana;"> All News & Reports </a>
										</div>
										<div id="collapseThree" class="accordion-body collapse">
											<div class="accordion-inner">---</div>
										</div>
									</div>
									
									<div class="accordion-group">
											<div class="accordion-heading">
												<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" 
											href="#collapseFour" style="font-family:Verdana;"> Company Financials </a>
										</div>
										<div id="collapseFour" class="accordion-body collapse">
											<div class="accordion-inner">---</div>
										</div>
									</div>									
								</div>
							<!-- advertisement -->
							<div class="row">
							   <div class="col-md-12">
							      <img style="width:270px;margin-left:-4px;" src="<?php echo base_url();?>img/box8.png"/>
							   </div>
							</div>
							<!-- advertisement -->
							<div class="row">
							   <div class="col-md-12">
							      <img style="width:270px;margin-left:-4px;" src="<?php echo base_url();?>img/box8.png"/>
							   </div>
							</div>
					</div>
					<div class="col-md-5" style="border:1px solid #000;">					  
						<table style="margin-left:-16px;height:124px;" cellpadding="0" cellspacing="0">
						  <tr>
							  <td>
								  <table>
								  <tr><td><img style="border:1px solid #000;" src="<?php echo base_url();?>img/financial-blog.png"></td></tr>
								  <!-- <tr><td>&nbsp;</td></tr> -->
								  <tr><td><img style="border:1px solid #000;" src="<?php echo base_url();?>img/fin-job-portal.png"></td></tr>					  
								  </table>
							  </td>
							  <td>
								  <table>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/stock-depth.jpg"/></a></td></tr>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/how-to-use-iportal.jpg"/></a></td></tr>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/dummy-trading.jpg"/></a></td></tr>					  
								  </table>
							  </td>
							  <td>
								  <table>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/call.jpg"  style="width:150px;"/></a></td></tr>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/rss-feed.jpg"  style="width:150px;height:28px;"/></a></td></tr>
									  <tr><td><a href="#"><img src="<?php echo base_url();?>img/free-subscribe.jpg" style="width:150px;height:29px;"/></a></td></tr>					  
								  </table>
							  </td>	
						  </tr>
						</table>						
						<div class="row">
							<div class="col-md-6">								
								<br/>
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Stock Exchange Statistics</div>
											<div class="panel-body">
												<ul class="nav nav-tabs">
												  <li class="active"><a href="#tab_a" data-toggle="tab">DSE</a></li>
												  <li><a href="#tab_b" data-toggle="tab">DSEX</a></li>
												  <li><a href="#tab_c" data-toggle="tab">DSEX30</a></li>
												  <li><a href="#tab_d" data-toggle="tab">CAPSI</a></li>
												</ul>
												<div class="tab-content">
														<div class="tab-pane active" id="tab_a">
															 <h4>Pane A</h4>
															<p>															
															http://www.ajdesigner.com/php_code_statistics/standard_deviation_population.php
															<br/>
															Pellentesque habitant morbi tristique senectus et netus et malesuada fames
																ac turpis egestas.</p>
														</div>
														<div class="tab-pane" id="tab_b">
															 <h4>Pane B</h4>
															<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
																ac turpis egestas.</p>
														</div>
														<div class="tab-pane" id="tab_c">
															 <h4>Pane C</h4>
															<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
																ac turpis egestas.</p>
														</div>
														<div class="tab-pane" id="tab_d">
															 <h4>Pane D</h4>
															<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
																ac turpis egestas.</p>
														</div>
												</div><!-- tab content -->
											</div>
										</div>							
									</div>	
											
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Exchange Trading Statistics</div>
											<div class="panel-body">
											</div>
										</div>							
									</div>	
									
									
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Recent Newspaper News & DSE Anouncement</div>
											<div class="panel-body">
											</div>
										</div>							
									</div>
									
									
									
									<div class="row"  style="width:486px;">	
										<div class="col-md-4">
											<table width="100%">
											<tr><td colspan="3" style="border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;background:#99CCFF;font-size:12px;text-align:center;">Divident History</td></tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Name</td>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Divident</td>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Dec. Date</td>
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">&nbsp;</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">&nbsp;</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">&nbsp;</td>												
											</tr>
											
											</table>
										</div>							
										<div class="col-md-3">
											<table width="100%">
											<tr><td  colspan="2" style="border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;background:#99CCFF;font-size:12px;text-align:center;">Lower Bound</td></tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Name</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Cat.</td>
											</tr>
											<tr>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">&nbsp;</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">&nbsp;</td>												
											</tr>											
											
											</table>
										</div>							
										<div class="col-md-4">
										    <?php //echo form_open('');  ?>
											<table width="100%">
											<tr><td colspan="3" style="border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;background:#99CCFF;font-size:12px;text-align:center;">Technical Screener</td></tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Indicator</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Lower/Higher Than</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Value</td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">CCI</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select id="cci_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="cci_val" type="text" style="width:25px;"/></td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">MFI</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select  id="mfi_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="mfi_val" type="text" style="width:25px;"/></td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">RSI</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select   id="rsi_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="rsi_val" type="text" style="width:25px;"/></td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Stochastic Oscillator</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select   id="st_oscillator_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="st_oscillator_val" type="text" style="width:25px;"/></td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">Ultimate Oscillator</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select   id="ut_oscillator_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="ut_oscillator_val"  type="text" style="width:25px;"/></td>												
											</tr>
											<tr>
												<td  style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">William`s %R</td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><select   id="wr_select"><option>greater</option><option>lower</option></select></td>
												<td  style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;"><input id="wr_val" type="text" style="width:25px;"/></td>												
											</tr>
											
											<tr>
												<td colspan="3" style="border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;font-size:12px;text-align:center;">
												<input type="button" id="technical_screener_search" value="Show Result>>"/></td>
											</tr>
											</table>
											
											
											
										</div>																	
									</div>
									
									<br/>
									
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Fundamental & Quantitative Screener</div>
											<div class="panel-body">
											</div>
										</div>							
									</div>
									
									<br/>
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Recent Blog Topic & Comments</div>
											<div class="panel-body">
											</div>
										</div>							
									</div>
									
									
									<br/>
									<div class="row"  style="width:486px;">	
										<div class="panel panel-default">
											<div class="panel-heading" style="background:#99CCFF;">Today`s Sector Performance</div>
											<div class="panel-body">
											</div>
										</div>							
									</div>
								    <br/>
								
								
								
								
								
									<ul class="nav nav-tabs" style="width:400px;">
									  <li class="active"><a href="#top_gainer" data-toggle="tab">Top Gainers</a></li>
									  <li><a href="#top_looser" data-toggle="tab">Top Loosers</a></li>
									  <li><a href="#top_turnover" data-toggle="tab">Top Turnover</a></li>
									 
									</ul>
									<div class="tab-content" style="width:400px;">
											<div class="tab-pane active" id="top_gainer" style="width:400px;border:1px solid #000;">
												 <h4>Pane A</h4>
												<p>
												
												http://www.ajdesigner.com/php_code_statistics/standard_deviation_population.php
												<br/>
												Pellentesque habitant morbi 												ac turpis egestas.</p>
											</div>
											<div class="tab-pane" id="top_looser"  style="width:400px;border:1px solid #000;">
												 <h4>Pane B</h4>
												
												
												
												
											</div>
											<div class="tab-pane" id="top_turnover"  style="width:450px;border:1px solid #000;">
												<h4></h4>
												
												
												
												<!--
												<p>Pellentesque habitant 
													ac turpis egestas.</p>-->
													
													
													
											</div>
											
									</div><!-- tab content -->
					
										
								<br/>
								
							</div>
							<div class="col-md-3"></div>
							<div class="col-md-3">
							    
							
							</div>
						</div>
					
						
						
						
					</div>
					
					<div class="col-md-4" style="border:1px solid #000;background-color:#ccc;">
					
					
						<table style="font-family:Arial;font-size:10px;height:105px;" width="100%" cellpadding="0" cellspacing="0">
						    <tr>
							    <td style="border:3px solid #99CCFF;">		   
								   
								   	<marquee   width="100%" height="33" align="top" behavior="scroll" direction="right" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="1" scrolldelay="10" truespeed bgcolor="#fffff4">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td valign="top" height="30">
										<table border="0" cellspacing="0" cellpadding="0">
										<tr>
										<td height="30" width="100%">
										<a href="#1JANATAMF%20" class="abhead" target="_top">1JANATAMF  6.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.67%</a><br>
										</td>
										</tr>
										</table>
										</td>
										<td valign="top" height="30">
										<table  border="0" cellspacing="0" cellpadding="0">
										<tr>
										<td height="30" width="100%">
											<a href="#" class="abhead" target="_top">1STPRIMFMF 25.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.77%</a><br>
										</td></tr>
										</table></td>
												<td valign="top" height="30">
													<table  border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="#" class="abhead" target="_top">2NDICB     275.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.18%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="#" class="abhead" target="_top">4THICB     207.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.90    -0.91%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="#" class="abhead" target="_top">6THICB     58.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.20    3.91%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="#" class="abhead" target="_top">8THICB     57.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    3.07%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanye817.html?name=AAMRATECH%20" class="abhead" target="_top">AAMRATECH  37.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    2.43%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanyda31.html?name=ABB1STMF%20%20" class="abhead" target="_top">ABB1STMF   7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.41%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanye514.html?name=ABBANK%20%20%20%20" class="abhead" target="_top">ABBANK     26.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.51%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanyd423.html?name=ACI%20%20%20%20%20%20%20" class="abhead" target="_top">ACI        174.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.06%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany64fc.html?name=ACIFORMULA" class="abhead" target="_top">ACIFORMULA 82.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.73%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanydf3c.html?name=ACIZCBOND%20" class="abhead" target="_top">ACIZCBOND  912.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    0.16%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany4631.html?name=ACTIVEFINE" class="abhead" target="_top">ACTIVEFINE 95.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    1.17%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany19df.html?name=AFTABAUTO%20" class="abhead" target="_top">AFTABAUTO  89.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.20    -1.32%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany0ce1.html?name=AGNISYSL%20%20" class="abhead" target="_top">AGNISYSL   24.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    4.31%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany1e75.html?name=AGRANINS%20%20" class="abhead" target="_top">AGRANINS   27.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -1.08%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany9380.html?name=AIBL1STIMF" class="abhead" target="_top">AIBL1STIMF 7.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.90%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanyd854.html?name=AIMS1STMF%20" class="abhead" target="_top">AIMS1STMF  43.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanye056.html?name=AL-HAJTEX%20" class="abhead" target="_top">AL-HAJTEX  75.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    2.17%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany749c.html?name=ALARABANK%20" class="abhead" target="_top">ALARABANK  19.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.03%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanydd33.html?name=ALLTEX%20%20%20%20" class="abhead" target="_top">ALLTEX     8.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    8.86%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany04de.html?name=AMBEEPHA%20%20" class="abhead" target="_top">AMBEEPHA   284.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -0.56%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany0b90.html?name=AMCL(PRAN)" class="abhead" target="_top">AMCL(PRAN) 197.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    0.82%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany6eb2.html?name=ANLIMAYARN" class="abhead" target="_top">ANLIMAYARN 26.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.38%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany857d.html?name=ANWARGALV%20" class="abhead" target="_top">ANWARGALV  32.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    4.92%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanyc93f.html?name=APEXADELFT" class="abhead" target="_top">APEXADELFT 547.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.07%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanydaec.html?name=APEXFOODS%20" class="abhead" target="_top">APEXFOODS  107.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.90    -3.49%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany53be.html?name=APEXSPINN%20" class="abhead" target="_top">APEXSPINN  75.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.80%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany59a8.html?name=APEXTANRY%20" class="abhead" target="_top">APEXTANRY  152.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.40    2.96%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany2c47.html?name=APOLOISPAT" class="abhead" target="_top">APOLOISPAT 40.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.09%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanye705.html?name=ARAMIT%20%20%20%20" class="abhead" target="_top">ARAMIT     340.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.60    -0.18%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany54e7.html?name=ARAMITCEM%20" class="abhead" target="_top">ARAMITCEM  63.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.00    -1.56%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany0205.html?name=ARGONDENIM" class="abhead" target="_top">ARGONDENIM 76.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.40    -1.80%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9110.html?name=ASIAINS%20%20%20" class="abhead" target="_top">ASIAINS    30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.33%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany28db.html?name=ASIAPACINS" class="abhead" target="_top">ASIAPACINS 32.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.23%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany0ca3.html?name=ATLASBANG%20" class="abhead" target="_top">ATLASBANG  161.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.19%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompanyfe92.html?name=AZIZPIPES%20" class="abhead" target="_top">AZIZPIPES  22.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.90%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table border="0" cellspacing="0" cellpadding="0">
													<tr><td height="30" width="100%">
												<a href="displayCompany499e.html?name=BANGAS%20%20%20%20" class="abhead" target="_top">BANGAS     550.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -0.54%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table border="0" cellspacing="0" cellpadding="0">
												<tr><td height="30" width="100%">
												<a href="displayCompany8788.html?name=BANKASIA%20%20" class="abhead" target="_top">BANKASIA   21.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    2.43%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table border="0" cellspacing="0" cellpadding="0">
												<tr><td height="30" width="100%">
												<a href="displayCompany1e79.html?name=BATASHOE%20%20" class="abhead" target="_top">BATASHOE   726.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.00    0.69%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="140" border="0" cellspacing="0" cellpadding="0">
												<tr><td height="30" width="100%">
												<a href="displayCompany3635.html?name=BATBC%20%20%20%20%20" class="abhead" target="_top">BATBC      1690.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-30.50    -1.77%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0">
												<tr><td height="30" width="100%">
												<a href="displayCompanybc50.html?name=BAYLEASING" class="abhead" target="_top">BAYLEASING 36.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.27%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0">
												<tr><td height="30" width="100%">
												<a href="displayCompany8a79.html?name=BDAUTOCA%20%20" class="abhead" target="_top">BDAUTOCA   29.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.42%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3d26.html?name=BDBUILDING" class="abhead" target="_top">BDBUILDING 73.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.40    -3.17%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybcc7.html?name=BDCOM%20%20%20%20%20" class="abhead" target="_top">BDCOM      29.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.34%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany4ef4.html?name=BDFINANCE%20" class="abhead" target="_top">BDFINANCE  18.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -1.58%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6947.html?name=BDLAMPS%20%20%20" class="abhead" target="_top">BDLAMPS    134.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.37%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany8a1d.html?name=BDTHAI%20%20%20%20" class="abhead" target="_top">BDTHAI     33.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    2.42%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyacd1.html?name=BDWELDING%20" class="abhead" target="_top">BDWELDING  24.40 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya2d6.html?name=BEACHHATCH" class="abhead" target="_top">BEACHHATCH 30.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.67%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6cf8.html?name=BEACONPHAR" class="abhead" target="_top">BEACONPHAR 14.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    7.58%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb385.html?name=BEDL%20%20%20%20%20%20" class="abhead" target="_top">BEDL       34.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.98%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6f01.html?name=BENGALWTL%20" class="abhead" target="_top">BENGALWTL  71.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.70    -3.66%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd4a2.html?name=BERGERPBL%20" class="abhead" target="_top">BERGERPBL  896.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>10.10    1.14%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6901.html?name=BEXIMCO%20%20%20" class="abhead" target="_top">BEXIMCO    35.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.85%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany74c0.html?name=BGIC%20%20%20%20%20%20" class="abhead" target="_top">BGIC       30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.69%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany23f9.html?name=BIFC%20%20%20%20%20%20" class="abhead" target="_top">BIFC       17.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.58%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyce01.html?name=BRACBANK%20%20" class="abhead" target="_top">BRACBANK   34.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany11f8.html?name=BSC%20%20%20%20%20%20%20" class="abhead" target="_top">BSC        431.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.25    0.06%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany54f9.html?name=BSCCL%20%20%20%20%20" class="abhead" target="_top">BSCCL      173.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -0.86%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany8be7.html?name=BSRMSTEEL%20" class="abhead" target="_top">BSRMSTEEL  79.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.76%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybb99.html?name=BXPHARMA%20%20" class="abhead" target="_top">BXPHARMA   51.60 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.96%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany30cd.html?name=BXSYNTH%20%20%20" class="abhead" target="_top">BXSYNTH    17.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany87e9.html?name=CENTRALINS" class="abhead" target="_top">CENTRALINS 30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.01%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany26fe.html?name=CENTRALPHL" class="abhead" target="_top">CENTRALPHL 47.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.30    -2.67%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya162.html?name=CITYBANK%20%20" class="abhead" target="_top">CITYBANK   20.80 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany001d.html?name=CITYGENINS" class="abhead" target="_top">CITYGENINS 28.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.82%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany321e.html?name=CMCKAMAL%20%20" class="abhead" target="_top">CMCKAMAL   34.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    2.65%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2909.html?name=CONFIDCEM%20" class="abhead" target="_top">CONFIDCEM  137.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.60    4.26%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany422f.html?name=CONTININS%20" class="abhead" target="_top">CONTININS  30.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.67%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7cab.html?name=CVOPRL%20%20%20%20" class="abhead" target="_top">CVOPRL     698.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.20    -0.31%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3db9.html?name=DACCADYE%20%20" class="abhead" target="_top">DACCADYE   24.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.82%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7b7e.html?name=DAFODILCOM" class="abhead" target="_top">DAFODILCOM 14.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    3.70%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd8b8.html?name=DBH%20%20%20%20%20%20%20" class="abhead" target="_top">DBH        66.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -4.33%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany15d2.html?name=DBH1STMF%20%20" class="abhead" target="_top">DBH1STMF   5.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.51%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyddcd.html?name=DELTALIFE%20" class="abhead" target="_top">DELTALIFE  269.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -1.10%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany8765.html?name=DELTASPINN" class="abhead" target="_top">DELTASPINN 42.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.93%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2c82.html?name=DESCO%20%20%20%20%20" class="abhead" target="_top">DESCO      62.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.16%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany36f5.html?name=DESHBANDHU" class="abhead" target="_top">DESHBANDHU 23.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    3.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybed5.html?name=DHAKABANK%20" class="abhead" target="_top">DHAKABANK  19.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.03%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany32db.html?name=DHAKAINS%20%20" class="abhead" target="_top">DHAKAINS   41.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.48%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyadac.html?name=DSHGARME%20%20" class="abhead" target="_top">DSHGARME   70.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    3.53%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyde75.html?name=DULAMIACOT" class="abhead" target="_top">DULAMIACOT 9.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    9.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyda91.html?name=DUTCHBANGL" class="abhead" target="_top">DUTCHBANGL 105.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0832.html?name=EASTERNINS" class="abhead" target="_top">EASTERNINS 37.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.07%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0947.html?name=EASTLAND%20%20" class="abhead" target="_top">EASTLAND   48.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    0.83%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany01e4.html?name=EASTRNLUB%20" class="abhead" target="_top">EASTRNLUB  316.10 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany8300.html?name=EBL%20%20%20%20%20%20%20" class="abhead" target="_top">EBL        29.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    2.83%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf12b.html?name=EBL1STMF%20%20" class="abhead" target="_top">EBL1STMF   7.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.43%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb91b.html?name=EBLNRBMF%20%20" class="abhead" target="_top">EBLNRBMF   8.10 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyeb11.html?name=ECABLES%20%20%20" class="abhead" target="_top">ECABLES    91.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.80    2.01%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf7ff.html?name=EHL%20%20%20%20%20%20%20" class="abhead" target="_top">EHL        51.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.18%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany80c1.html?name=ENVOYTEX%20%20" class="abhead" target="_top">ENVOYTEX   53.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    0.75%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanycd43.html?name=EXIMBANK%20%20" class="abhead" target="_top">EXIMBANK   12.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.79%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0175.html?name=FAMILYTEX%20" class="abhead" target="_top">FAMILYTEX  57.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.20%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany501d.html?name=FAREASTFIN" class="abhead" target="_top">FAREASTFIN 16.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.62%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanycd25.html?name=FAREASTLIF" class="abhead" target="_top">FAREASTLIF 102.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    2.41%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5776.html?name=FASFIN%20%20%20%20" class="abhead" target="_top">FASFIN     14.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.37%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
												<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybf8c.html?name=FEDERALINS" class="abhead" target="_top">FEDERALINS 25.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.79%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyea3f.html?name=FINEFOODS%20" class="abhead" target="_top">FINEFOODS  23.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd0ec.html?name=FIRSTSBANK" class="abhead" target="_top">FIRSTSBANK 15.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.31%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf9ea.html?name=FLEASEINT%20" class="abhead" target="_top">FLEASEINT  33.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.60%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2f7f.html?name=FUWANGCER%20" class="abhead" target="_top">FUWANGCER  20.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany36e0.html?name=FUWANGFOOD" class="abhead" target="_top">FUWANGFOOD 23.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    3.46%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye469.html?name=GBBPOWER%20%20" class="abhead" target="_top">GBBPOWER   31.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.32%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyecfa.html?name=GENNEXT%20%20%20" class="abhead" target="_top">GENNEXT    36.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.10%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya198.html?name=GHAIL%20%20%20%20%20" class="abhead" target="_top">GHAIL      47.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.84%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany548e.html?name=GHCL%20%20%20%20%20%20" class="abhead" target="_top">GHCL       63.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    3.93%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany11ee.html?name=GLAXOSMITH" class="abhead" target="_top">GLAXOSMITH 980.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-20.70    -2.07%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany17fd.html?name=GLOBALINS%20" class="abhead" target="_top">GLOBALINS  29.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.02%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanycc28.html?name=GOLDENSON%20" class="abhead" target="_top">GOLDENSON  64.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -2.26%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya469.html?name=GP%20%20%20%20%20%20%20%20" class="abhead" target="_top">GP         206.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.24%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanydf58.html?name=GPHISPAT%20%20" class="abhead" target="_top">GPHISPAT   54.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.73%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya4d3.html?name=GQBALLPEN%20" class="abhead" target="_top">GQBALLPEN  151.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.20%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2f42.html?name=GRAMEEN1%20%20" class="abhead" target="_top">GRAMEEN1   47.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    2.59%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0d78.html?name=GRAMEENS2%20" class="abhead" target="_top">GRAMEENS2  18.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.11%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany602c.html?name=GREENDELMF" class="abhead" target="_top">GREENDELMF 5.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.77%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5845.html?name=GREENDELT%20" class="abhead" target="_top">GREENDELT  93.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.30    -2.41%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2b2a.html?name=GSPFINANCE" class="abhead" target="_top">GSPFINANCE 30.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    4.04%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany158c.html?name=HAKKANIPUL" class="abhead" target="_top">HAKKANIPUL 35.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.72%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc9e7.html?name=HEIDELBCEM" class="abhead" target="_top">HEIDELBCEM 428.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>17.10    4.16%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany481f.html?name=HRTEX%20%20%20%20%20" class="abhead" target="_top">HRTEX      41.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.24%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd932.html?name=IBBLPBOND%20" class="abhead" target="_top">IBBLPBOND  983.25 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.00    0.20%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb5ef.html?name=IBNSINA%20%20%20" class="abhead" target="_top">IBNSINA    114.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.00    4.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="140" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5643.html?name=ICB%20%20%20%20%20%20%20" class="abhead" target="_top">ICB        1557.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>79.50    5.38%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany4e6c.html?name=ICB1STNRB%20" class="abhead" target="_top">ICB1STNRB  26.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    2.28%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany53c6.html?name=ICB2NDNRB%20" class="abhead" target="_top">ICB2NDNRB  10.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    4.08%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybc05.html?name=ICB3RDNRB%20" class="abhead" target="_top">ICB3RDNRB  5.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.92%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyda9e.html?name=ICBAMCL2ND" class="abhead" target="_top">ICBAMCL2ND 5.90 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany580d.html?name=ICBEPMF1S1" class="abhead" target="_top">ICBEPMF1S1 5.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.72%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5bfb.html?name=ICBIBANK%20%20" class="abhead" target="_top">ICBIBANK   6.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.33%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye6e0.html?name=ICBISLAMIC" class="abhead" target="_top">ICBISLAMIC 18.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    3.35%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb5d2.html?name=ICBSONALI1" class="abhead" target="_top">ICBSONALI1 8.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.44%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2bcf.html?name=IDLC%20%20%20%20%20%20" class="abhead" target="_top">IDLC       69.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    1.60%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyfe78.html?name=IFIC%20%20%20%20%20%20" class="abhead" target="_top">IFIC       36.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.12%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7b57.html?name=IFIC1STMF%20" class="abhead" target="_top">IFIC1STMF  6.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.03%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye885.html?name=IFILISLMF1" class="abhead" target="_top">IFILISLMF1 6.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    5.17%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybfe1.html?name=ILFSL%20%20%20%20%20" class="abhead" target="_top">ILFSL      15.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.65%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc49b.html?name=IMAMBUTTON" class="abhead" target="_top">IMAMBUTTON 10.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    9.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0dd5.html?name=INTECH%20%20%20%20" class="abhead" target="_top">INTECH     17.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    5.99%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany079f.html?name=IPDC%20%20%20%20%20%20" class="abhead" target="_top">IPDC       20.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.50%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany223b.html?name=ISLAMIBANK" class="abhead" target="_top">ISLAMIBANK 34.30 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyda94.html?name=ISLAMICFIN" class="abhead" target="_top">ISLAMICFIN 17.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6b71.html?name=ISLAMIINS%20" class="abhead" target="_top">ISLAMIINS  32.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.61%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd82b.html?name=ISNLTD%20%20%20%20" class="abhead" target="_top">ISNLTD     20.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    8.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb531.html?name=JAMUNABANK" class="abhead" target="_top">JAMUNABANK 16.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    3.09%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyea80.html?name=JAMUNAOIL%20" class="abhead" target="_top">JAMUNAOIL  213.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>6.50    3.14%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6c5e.html?name=JANATAINS%20" class="abhead" target="_top">JANATAINS  26.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.38%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf6d7.html?name=JMISMDL%20%20%20" class="abhead" target="_top">JMISMDL    212.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    1.15%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6fbc.html?name=JUTESPINN%20" class="abhead" target="_top">JUTESPINN  74.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    2.35%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7164.html?name=KARNAPHULI" class="abhead" target="_top">KARNAPHULI 25.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany804f.html?name=KAY&amp;QUE%20%20%20" class="abhead" target="_top">KAY&amp;QUE    22.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.00    10.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanydef5.html?name=KEYACOSMET" class="abhead" target="_top">KEYACOSMET 28.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.81%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb347.html?name=KOHINOOR%20%20" class="abhead" target="_top">KOHINOOR   386.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.80    0.99%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany374d.html?name=KPCL%20%20%20%20%20%20" class="abhead" target="_top">KPCL       54.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.20    -2.15%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany45ad.html?name=LAFSURCEML" class="abhead" target="_top">LAFSURCEML 37.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.40    10.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany61ea.html?name=LANKABAFIN" class="abhead" target="_top">LANKABAFIN 73.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -2.25%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9280.html?name=LEGACYFOOT" class="abhead" target="_top">LEGACYFOOT 41.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.47%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5c76.html?name=LIBRAINFU%20" class="abhead" target="_top">LIBRAINFU  420.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.05%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany457a.html?name=LINDEBD%20%20%20" class="abhead" target="_top">LINDEBD    673.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>9.70    1.46%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany4b13.html?name=LRGLOBMF1%20" class="abhead" target="_top">LRGLOBMF1  7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.86%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5414.html?name=MAKSONSPIN" class="abhead" target="_top">MAKSONSPIN 20.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    4.52%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3867.html?name=MALEKSPIN%20" class="abhead" target="_top">MALEKSPIN  30.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    3.77%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0195.html?name=MARICO%20%20%20%20" class="abhead" target="_top">MARICO     799.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.06%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3a27.html?name=MBL1STMF%20%20" class="abhead" target="_top">MBL1STMF   7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.86%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya0cd.html?name=MEGCONMILK" class="abhead" target="_top">MEGCONMILK 15.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.40    9.66%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5fd3.html?name=MEGHNACEM%20" class="abhead" target="_top">MEGHNACEM  150.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.10    2.80%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybaed.html?name=MEGHNALIFE" class="abhead" target="_top">MEGHNALIFE 121.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    1.25%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany86c9.html?name=MEGHNAPET%20" class="abhead" target="_top">MEGHNAPET  9.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    7.95%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd9b0.html?name=MERCANBANK" class="abhead" target="_top">MERCANBANK 17.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.18%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybcb5.html?name=MERCINS%20%20%20" class="abhead" target="_top">MERCINS    27.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.11%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany4627.html?name=METROSPIN%20" class="abhead" target="_top">METROSPIN  21.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyde4c.html?name=MICEMENT%20%20" class="abhead" target="_top">MICEMENT   85.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.90    2.29%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3c4e.html?name=MIDASFIN%20%20" class="abhead" target="_top">MIDASFIN   31.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.00    -3.05%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc73e.html?name=MIRACLEIND" class="abhead" target="_top">MIRACLEIND 24.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.90    8.52%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany4fa3.html?name=MITHUNKNIT" class="abhead" target="_top">MITHUNKNIT 81.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.40    1.75%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany781c.html?name=MJLBD%20%20%20%20%20" class="abhead" target="_top">MJLBD      79.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    1.54%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5788.html?name=MONNOCERA%20" class="abhead" target="_top">MONNOCERA  34.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.80%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5c98.html?name=MONNOSTAF%20" class="abhead" target="_top">MONNOSTAF  295.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-6.20    -2.06%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya095.html?name=MPETROLEUM" class="abhead" target="_top">MPETROLEUM 239.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.60    2.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany93bf.html?name=MTBL%20%20%20%20%20%20" class="abhead" target="_top">MTBL       17.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.74%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9354.html?name=NATLIFEINS" class="abhead" target="_top">NATLIFEINS 307.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-9.00    -2.85%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2804.html?name=NAVANACNG%20" class="abhead" target="_top">NAVANACNG  70.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -0.99%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7e88.html?name=NBL%20%20%20%20%20%20%20" class="abhead" target="_top">NBL        12.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.65%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany39a4.html?name=NCCBANK%20%20%20" class="abhead" target="_top">NCCBANK    13.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.53%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf539.html?name=NCCBLMF1%20%20" class="abhead" target="_top">NCCBLMF1   8.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.15%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany183e.html?name=NHFIL%20%20%20%20%20" class="abhead" target="_top">NHFIL      33.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc8fd.html?name=NITOLINS%20%20" class="abhead" target="_top">NITOLINS   34.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.80    -2.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2bf2.html?name=NLI1STMF%20%20" class="abhead" target="_top">NLI1STMF   9.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.15%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyff95.html?name=NORTHRNINS" class="abhead" target="_top">NORTHRNINS 42.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    1.69%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0f15.html?name=NPOLYMAR%20%20" class="abhead" target="_top">NPOLYMAR   60.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -2.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9e53.html?name=NTLTUBES%20%20" class="abhead" target="_top">NTLTUBES   93.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-4.90    -4.99%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany7ca4.html?name=OLYMPIC%20%20%20" class="abhead" target="_top">OLYMPIC    170.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.70    2.22%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyeb86.html?name=ONEBANKLTD" class="abhead" target="_top">ONEBANKLTD 16.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2eb6.html?name=ORIONINFU%20" class="abhead" target="_top">ORIONINFU  42.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.60    -1.39%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany8b12.html?name=ORIONPHARM" class="abhead" target="_top">ORIONPHARM 64.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -2.43%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9fbd.html?name=PADMALIFE%20" class="abhead" target="_top">PADMALIFE  66.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.15%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany80e1.html?name=PADMAOIL%20%20" class="abhead" target="_top">PADMAOIL   304.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>9.90    3.37%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany74f7.html?name=PARAMOUNT%20" class="abhead" target="_top">PARAMOUNT  25.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.61%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany97e2.html?name=PEOPLESINS" class="abhead" target="_top">PEOPLESINS 33.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya243.html?name=PF1STMF%20%20%20" class="abhead" target="_top">PF1STMF    5.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9dd3.html?name=PHARMAID%20%20" class="abhead" target="_top">PHARMAID   169.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.30    -0.76%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6bb8.html?name=PHENIXINS%20" class="abhead" target="_top">PHENIXINS  44.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.68%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybe07.html?name=PHOENIXFIN" class="abhead" target="_top">PHOENIXFIN 35.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.85%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2528.html?name=PHPMF1%20%20%20%20" class="abhead" target="_top">PHPMF1     5.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanycd82.html?name=PIONEERINS" class="abhead" target="_top">PIONEERINS 68.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    2.53%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb019.html?name=PLFSL%20%20%20%20%20" class="abhead" target="_top">PLFSL      25.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6be9.html?name=POPULAR1MF" class="abhead" target="_top">POPULAR1MF 6.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.64%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany424c.html?name=POPULARLIF" class="abhead" target="_top">POPULARLIF 239.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.50    1.49%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany037a.html?name=POWERGRID%20" class="abhead" target="_top">POWERGRID  56.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    2.74%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyeb76.html?name=PRAGATIINS" class="abhead" target="_top">PRAGATIINS 56.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.35%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya764.html?name=PRAGATILIF" class="abhead" target="_top">PRAGATILIF 198.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>14.40    7.84%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyad74.html?name=PREMIERBAN" class="abhead" target="_top">PREMIERBAN 11.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.90%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany238f.html?name=PREMIERCEM" class="abhead" target="_top">PREMIERCEM 105.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.30    2.24%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany41a3.html?name=PREMIERLEA" class="abhead" target="_top">PREMIERLEA 10.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.99%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany901b.html?name=PRIME1ICBA" class="abhead" target="_top">PRIME1ICBA 5.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.64%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany66af.html?name=PRIMEBANK%20" class="abhead" target="_top">PRIMEBANK  24.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -1.61%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany19cf.html?name=PRIMEFIN%20%20" class="abhead" target="_top">PRIMEFIN   27.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0dfb.html?name=PRIMEINSUR" class="abhead" target="_top">PRIMEINSUR 34.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.29%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd2b1.html?name=PRIMELIFE%20" class="abhead" target="_top">PRIMELIFE  110.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.55%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2ff0.html?name=PRIMETEX%20%20" class="abhead" target="_top">PRIMETEX   25.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.78%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanydb44.html?name=PROGRESLIF" class="abhead" target="_top">PROGRESLIF 122.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.50    2.08%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3654.html?name=PROVATIINS" class="abhead" target="_top">PROVATIINS 29.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.69%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6c4d.html?name=PTL%20%20%20%20%20%20%20" class="abhead" target="_top">PTL        56.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    2.93%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd4da.html?name=PUBALIBANK" class="abhead" target="_top">PUBALIBANK 33.80 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany69c9.html?name=PURABIGEN%20" class="abhead" target="_top">PURABIGEN  26.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.38%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany39cd.html?name=QSMDRYCELL" class="abhead" target="_top">QSMDRYCELL 43.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    3.82%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany25c0.html?name=RAHIMAFOOD" class="abhead" target="_top">RAHIMAFOOD 70.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.50    -4.74%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany363b.html?name=RAHIMTEXT%20" class="abhead" target="_top">RAHIMTEXT  231.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.70    -1.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyccae.html?name=RAKCERAMIC" class="abhead" target="_top">RAKCERAMIC 55.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.89%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb0dc.html?name=RANFOUNDRY" class="abhead" target="_top">RANFOUNDRY 102.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.29%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany782d.html?name=RDFOOD%20%20%20%20" class="abhead" target="_top">RDFOOD     27.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.73%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyae66.html?name=RECKITTBEN" class="abhead" target="_top">RECKITTBEN 900.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>30.00    3.45%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyae96.html?name=RELIANCE1%20" class="abhead" target="_top">RELIANCE1  9.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    4.55%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6caa.html?name=RELIANCINS" class="abhead" target="_top">RELIANCINS 77.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.13%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany31c6.html?name=RENATA%20%20%20%20" class="abhead" target="_top">RENATA     771.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.04%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyfd51.html?name=RENWICKJA%20" class="abhead" target="_top">RENWICKJA  161.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    0.94%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany317c.html?name=REPUBLIC%20%20" class="abhead" target="_top">REPUBLIC   44.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.22%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9536.html?name=RNSPIN%20%20%20%20" class="abhead" target="_top">RNSPIN     34.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany386b.html?name=RUPALIBANK" class="abhead" target="_top">RUPALIBANK 66.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.60%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany692b.html?name=RUPALIINS%20" class="abhead" target="_top">RUPALIINS  34.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany559e.html?name=RUPALILIFE" class="abhead" target="_top">RUPALILIFE 134.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.60    3.54%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5709.html?name=SAFKOSPINN" class="abhead" target="_top">SAFKOSPINN 30.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    2.02%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye0bf.html?name=SAIHAMCOT%20" class="abhead" target="_top">SAIHAMCOT  24.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyb2d3.html?name=SAIHAMTEX%20" class="abhead" target="_top">SAIHAMTEX  29.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.74%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya09c.html?name=SALAMCRST%20" class="abhead" target="_top">SALAMCRST  49.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany13d0.html?name=SALVOCHEM%20" class="abhead" target="_top">SALVOCHEM  25.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.59%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye787.html?name=SAMATALETH" class="abhead" target="_top">SAMATALETH 27.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.50    9.92%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany62f2.html?name=SAMORITA%20%20" class="abhead" target="_top">SAMORITA   91.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    0.89%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6083.html?name=SANDHANINS" class="abhead" target="_top">SANDHANINS 81.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.20    6.78%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya111.html?name=SAPORTL%20%20%20" class="abhead" target="_top">SAPORTL    32.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.57%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya40a.html?name=SAVAREFR%20%20" class="abhead" target="_top">SAVAREFR   61.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-5.00    -7.58%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3293.html?name=SEBL1STMF%20" class="abhead" target="_top">SEBL1STMF  8.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    3.70%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybcf3.html?name=SHAHJABANK" class="abhead" target="_top">SHAHJABANK 16.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.62%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc0fc.html?name=SHYAMPSUG%20" class="abhead" target="_top">SHYAMPSUG  9.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    5.88%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany521e.html?name=SIBL%20%20%20%20%20%20" class="abhead" target="_top">SIBL       13.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.72%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyd2e8.html?name=SINGERBD%20%20" class="abhead" target="_top">SINGERBD   208.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.14%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf305.html?name=SINOBANGLA" class="abhead" target="_top">SINOBANGLA 33.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    3.40%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyab37.html?name=SONALIANSH" class="abhead" target="_top">SONALIANSH 136.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -1.23%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2a99.html?name=SONARBAINS" class="abhead" target="_top">SONARBAINS 25.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.19%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanybb27.html?name=SONARGAON%20" class="abhead" target="_top">SONARGAON  20.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.52%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany191f.html?name=SOUTHEASTB" class="abhead" target="_top">SOUTHEASTB 18.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.63%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2597.html?name=SPCERAMICS" class="abhead" target="_top">SPCERAMICS 19.20 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2c3e.html?name=SPPCL%20%20%20%20%20" class="abhead" target="_top">SPPCL      70.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -2.22%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyfb9a.html?name=SQUARETEXT" class="abhead" target="_top">SQUARETEXT 95.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.31%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5746.html?name=SQURPHARMA" class="abhead" target="_top">SQURPHARMA 216.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>8.90    4.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany6d66.html?name=STANCERAM%20" class="abhead" target="_top">STANCERAM  39.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.26%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9730.html?name=STANDARINS" class="abhead" target="_top">STANDARINS 40.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.25%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany2aa5.html?name=STANDBANKL" class="abhead" target="_top">STANDBANKL 14.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.38%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3060.html?name=SUMITPOWER" class="abhead" target="_top">SUMITPOWER 42.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.61%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany81d7.html?name=SUNLIFEINS" class="abhead" target="_top">SUNLIFEINS 63.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.95%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
													<a href="displayCompany7835.html?name=TAKAFULINS" class="abhead" target="_top">TAKAFULINS 38.90 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany80e3.html?name=TALLUSPIN%20" class="abhead" target="_top">TALLUSPIN  39.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.03%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany05cf.html?name=TITASGAS%20%20" class="abhead" target="_top">TITASGAS   76.60 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -2.17%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany9252.html?name=TRUSTB1MF%20" class="abhead" target="_top">TRUSTB1MF  7.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.74%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany0791.html?name=TRUSTBANK%20" class="abhead" target="_top">TRUSTBANK  19.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    2.05%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc287.html?name=UCBL%20%20%20%20%20%20" class="abhead" target="_top">UCBL       27.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.63%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany14d6.html?name=ULC%20%20%20%20%20%20%20" class="abhead" target="_top">ULC        32.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.31%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanye36c.html?name=UNIONCAP%20%20" class="abhead" target="_top">UNIONCAP   33.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.30%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyc2c4.html?name=UNIQUEHRL%20" class="abhead" target="_top">UNIQUEHRL  85.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.12%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany62da.html?name=UNITEDAIR%20" class="abhead" target="_top">UNITEDAIR  16.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.59%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf0de.html?name=UNITEDINS%20" class="abhead" target="_top">UNITEDINS  45.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.88%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanyf8d6.html?name=USMANIAGL%20" class="abhead" target="_top">USMANIAGL  136.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.10    -2.22%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany3119.html?name=UTTARABANK" class="abhead" target="_top">UTTARABANK 32.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.20%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompanya781.html?name=UTTARAFIN%20" class="abhead" target="_top">UTTARAFIN  84.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.80    -0.93%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany1ad0.html?name=ZAHINTEX%20%20" class="abhead" target="_top">ZAHINTEX   27.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.83%</a><br>
												</td></tr></table></td>
												<td valign="top" height="30">
													<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
												<a href="displayCompany5d24.html?name=ZEALBANGLA" class="abhead" target="_top">ZEALBANGLA 9.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    3.41%</a><br>
												</td></tr></table></td>
										</tr></table>
										</marquee>
								   
								   
								   
								</td>   
							</tr>
						</table>
						<table style="height:105px;">
						    <tr>
							    <td style="border:3px solid #99CCFF;">						
									
								<marquee  style="font-family:Arial;font-size:12px;"  id="mq2" width="100%" height="33" align="top" behavior="scroll" direction="left" onmouseout="this.start();" onmouseover="this.stop();" scrollamount="1" scrolldelay="10" truespeed bgcolor="#fffff4">
									<table border="0" cellpadding="0" cellspacing="0" width="100%">
									<tr>
										<td valign="top" height="30">
										<table width="125" border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td height="30" width="100%">
										<a href="#1JANATAMF%20" class="abhead" target="_top">1JANATAMF  6.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.67%</a><br>
										</td>
										</tr>
										</table>
										</td>
										<td valign="top" height="30">
										<table width="130" border="0" cellspacing="0" cellpadding="0">
										<tr>
										 <td height="30" width="100%">
											<a href="#" class="abhead" target="_top">1STPRIMFMF 25.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.77%</a><br>
										</td></tr>
										</table></td>
								 <td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6424.html?name=2NDICB%20%20%20%20" class="abhead" target="_top">2NDICB     275.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.18%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3275.html?name=4THICB%20%20%20%20" class="abhead" target="_top">4THICB     207.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.90    -0.91%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb18b.html?name=6THICB%20%20%20%20" class="abhead" target="_top">6THICB     58.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.20    3.91%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyeaa7.html?name=8THICB%20%20%20%20" class="abhead" target="_top">8THICB     57.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    3.07%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye817.html?name=AAMRATECH%20" class="abhead" target="_top">AAMRATECH  37.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    2.43%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyda31.html?name=ABB1STMF%20%20" class="abhead" target="_top">ABB1STMF   7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.41%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye514.html?name=ABBANK%20%20%20%20" class="abhead" target="_top">ABBANK     26.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.51%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd423.html?name=ACI%20%20%20%20%20%20%20" class="abhead" target="_top">ACI        174.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.06%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany64fc.html?name=ACIFORMULA" class="abhead" target="_top">ACIFORMULA 82.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.73%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydf3c.html?name=ACIZCBOND%20" class="abhead" target="_top">ACIZCBOND  912.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    0.16%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4631.html?name=ACTIVEFINE" class="abhead" target="_top">ACTIVEFINE 95.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    1.17%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany19df.html?name=AFTABAUTO%20" class="abhead" target="_top">AFTABAUTO  89.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.20    -1.32%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0ce1.html?name=AGNISYSL%20%20" class="abhead" target="_top">AGNISYSL   24.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    4.31%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany1e75.html?name=AGRANINS%20%20" class="abhead" target="_top">AGRANINS   27.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -1.08%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9380.html?name=AIBL1STIMF" class="abhead" target="_top">AIBL1STIMF 7.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.90%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd854.html?name=AIMS1STMF%20" class="abhead" target="_top">AIMS1STMF  43.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye056.html?name=AL-HAJTEX%20" class="abhead" target="_top">AL-HAJTEX  75.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    2.17%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany749c.html?name=ALARABANK%20" class="abhead" target="_top">ALARABANK  19.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.03%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydd33.html?name=ALLTEX%20%20%20%20" class="abhead" target="_top">ALLTEX     8.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    8.86%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany04de.html?name=AMBEEPHA%20%20" class="abhead" target="_top">AMBEEPHA   284.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -0.56%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0b90.html?name=AMCL(PRAN)" class="abhead" target="_top">AMCL(PRAN) 197.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    0.82%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6eb2.html?name=ANLIMAYARN" class="abhead" target="_top">ANLIMAYARN 26.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.38%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany857d.html?name=ANWARGALV%20" class="abhead" target="_top">ANWARGALV  32.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    4.92%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc93f.html?name=APEXADELFT" class="abhead" target="_top">APEXADELFT 547.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.07%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydaec.html?name=APEXFOODS%20" class="abhead" target="_top">APEXFOODS  107.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.90    -3.49%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany53be.html?name=APEXSPINN%20" class="abhead" target="_top">APEXSPINN  75.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.80%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany59a8.html?name=APEXTANRY%20" class="abhead" target="_top">APEXTANRY  152.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.40    2.96%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2c47.html?name=APOLOISPAT" class="abhead" target="_top">APOLOISPAT 40.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.09%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye705.html?name=ARAMIT%20%20%20%20" class="abhead" target="_top">ARAMIT     340.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.60    -0.18%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany54e7.html?name=ARAMITCEM%20" class="abhead" target="_top">ARAMITCEM  63.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.00    -1.56%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0205.html?name=ARGONDENIM" class="abhead" target="_top">ARGONDENIM 76.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.40    -1.80%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9110.html?name=ASIAINS%20%20%20" class="abhead" target="_top">ASIAINS    30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.33%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany28db.html?name=ASIAPACINS" class="abhead" target="_top">ASIAPACINS 32.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.23%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0ca3.html?name=ATLASBANG%20" class="abhead" target="_top">ATLASBANG  161.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.19%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyfe92.html?name=AZIZPIPES%20" class="abhead" target="_top">AZIZPIPES  22.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.90%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany499e.html?name=BANGAS%20%20%20%20" class="abhead" target="_top">BANGAS     550.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -0.54%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8788.html?name=BANKASIA%20%20" class="abhead" target="_top">BANKASIA   21.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    2.43%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany1e79.html?name=BATASHOE%20%20" class="abhead" target="_top">BATASHOE   726.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.00    0.69%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="140" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3635.html?name=BATBC%20%20%20%20%20" class="abhead" target="_top">BATBC      1690.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-30.50    -1.77%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybc50.html?name=BAYLEASING" class="abhead" target="_top">BAYLEASING 36.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.27%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8a79.html?name=BDAUTOCA%20%20" class="abhead" target="_top">BDAUTOCA   29.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.42%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3d26.html?name=BDBUILDING" class="abhead" target="_top">BDBUILDING 73.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.40    -3.17%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybcc7.html?name=BDCOM%20%20%20%20%20" class="abhead" target="_top">BDCOM      29.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.34%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4ef4.html?name=BDFINANCE%20" class="abhead" target="_top">BDFINANCE  18.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -1.58%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6947.html?name=BDLAMPS%20%20%20" class="abhead" target="_top">BDLAMPS    134.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.37%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8a1d.html?name=BDTHAI%20%20%20%20" class="abhead" target="_top">BDTHAI     33.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    2.42%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyacd1.html?name=BDWELDING%20" class="abhead" target="_top">BDWELDING  24.40 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya2d6.html?name=BEACHHATCH" class="abhead" target="_top">BEACHHATCH 30.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.67%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6cf8.html?name=BEACONPHAR" class="abhead" target="_top">BEACONPHAR 14.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    7.58%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb385.html?name=BEDL%20%20%20%20%20%20" class="abhead" target="_top">BEDL       34.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.98%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6f01.html?name=BENGALWTL%20" class="abhead" target="_top">BENGALWTL  71.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.70    -3.66%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd4a2.html?name=BERGERPBL%20" class="abhead" target="_top">BERGERPBL  896.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>10.10    1.14%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6901.html?name=BEXIMCO%20%20%20" class="abhead" target="_top">BEXIMCO    35.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.85%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany74c0.html?name=BGIC%20%20%20%20%20%20" class="abhead" target="_top">BGIC       30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.69%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany23f9.html?name=BIFC%20%20%20%20%20%20" class="abhead" target="_top">BIFC       17.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.58%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyce01.html?name=BRACBANK%20%20" class="abhead" target="_top">BRACBANK   34.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany11f8.html?name=BSC%20%20%20%20%20%20%20" class="abhead" target="_top">BSC        431.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.25    0.06%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany54f9.html?name=BSCCL%20%20%20%20%20" class="abhead" target="_top">BSCCL      173.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -0.86%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8be7.html?name=BSRMSTEEL%20" class="abhead" target="_top">BSRMSTEEL  79.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.76%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybb99.html?name=BXPHARMA%20%20" class="abhead" target="_top">BXPHARMA   51.60 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.96%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany30cd.html?name=BXSYNTH%20%20%20" class="abhead" target="_top">BXSYNTH    17.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany87e9.html?name=CENTRALINS" class="abhead" target="_top">CENTRALINS 30.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.01%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany26fe.html?name=CENTRALPHL" class="abhead" target="_top">CENTRALPHL 47.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.30    -2.67%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya162.html?name=CITYBANK%20%20" class="abhead" target="_top">CITYBANK   20.80 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany001d.html?name=CITYGENINS" class="abhead" target="_top">CITYGENINS 28.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.82%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany321e.html?name=CMCKAMAL%20%20" class="abhead" target="_top">CMCKAMAL   34.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    2.65%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2909.html?name=CONFIDCEM%20" class="abhead" target="_top">CONFIDCEM  137.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.60    4.26%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany422f.html?name=CONTININS%20" class="abhead" target="_top">CONTININS  30.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.67%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7cab.html?name=CVOPRL%20%20%20%20" class="abhead" target="_top">CVOPRL     698.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.20    -0.31%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3db9.html?name=DACCADYE%20%20" class="abhead" target="_top">DACCADYE   24.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.82%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7b7e.html?name=DAFODILCOM" class="abhead" target="_top">DAFODILCOM 14.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    3.70%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd8b8.html?name=DBH%20%20%20%20%20%20%20" class="abhead" target="_top">DBH        66.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -4.33%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany15d2.html?name=DBH1STMF%20%20" class="abhead" target="_top">DBH1STMF   5.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.51%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyddcd.html?name=DELTALIFE%20" class="abhead" target="_top">DELTALIFE  269.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.00    -1.10%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8765.html?name=DELTASPINN" class="abhead" target="_top">DELTASPINN 42.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.93%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2c82.html?name=DESCO%20%20%20%20%20" class="abhead" target="_top">DESCO      62.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.16%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany36f5.html?name=DESHBANDHU" class="abhead" target="_top">DESHBANDHU 23.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    3.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybed5.html?name=DHAKABANK%20" class="abhead" target="_top">DHAKABANK  19.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.03%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany32db.html?name=DHAKAINS%20%20" class="abhead" target="_top">DHAKAINS   41.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.48%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyadac.html?name=DSHGARME%20%20" class="abhead" target="_top">DSHGARME   70.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    3.53%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyde75.html?name=DULAMIACOT" class="abhead" target="_top">DULAMIACOT 9.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    9.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyda91.html?name=DUTCHBANGL" class="abhead" target="_top">DUTCHBANGL 105.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0832.html?name=EASTERNINS" class="abhead" target="_top">EASTERNINS 37.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.07%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0947.html?name=EASTLAND%20%20" class="abhead" target="_top">EASTLAND   48.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    0.83%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany01e4.html?name=EASTRNLUB%20" class="abhead" target="_top">EASTRNLUB  316.10 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8300.html?name=EBL%20%20%20%20%20%20%20" class="abhead" target="_top">EBL        29.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    2.83%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf12b.html?name=EBL1STMF%20%20" class="abhead" target="_top">EBL1STMF   7.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.43%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb91b.html?name=EBLNRBMF%20%20" class="abhead" target="_top">EBLNRBMF   8.10 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyeb11.html?name=ECABLES%20%20%20" class="abhead" target="_top">ECABLES    91.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.80    2.01%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf7ff.html?name=EHL%20%20%20%20%20%20%20" class="abhead" target="_top">EHL        51.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.18%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany80c1.html?name=ENVOYTEX%20%20" class="abhead" target="_top">ENVOYTEX   53.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    0.75%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanycd43.html?name=EXIMBANK%20%20" class="abhead" target="_top">EXIMBANK   12.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.79%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0175.html?name=FAMILYTEX%20" class="abhead" target="_top">FAMILYTEX  57.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.20%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany501d.html?name=FAREASTFIN" class="abhead" target="_top">FAREASTFIN 16.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.62%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanycd25.html?name=FAREASTLIF" class="abhead" target="_top">FAREASTLIF 102.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    2.41%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5776.html?name=FASFIN%20%20%20%20" class="abhead" target="_top">FASFIN     14.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.37%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybf8c.html?name=FEDERALINS" class="abhead" target="_top">FEDERALINS 25.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.79%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyea3f.html?name=FINEFOODS%20" class="abhead" target="_top">FINEFOODS  23.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd0ec.html?name=FIRSTSBANK" class="abhead" target="_top">FIRSTSBANK 15.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.31%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf9ea.html?name=FLEASEINT%20" class="abhead" target="_top">FLEASEINT  33.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.60%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2f7f.html?name=FUWANGCER%20" class="abhead" target="_top">FUWANGCER  20.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany36e0.html?name=FUWANGFOOD" class="abhead" target="_top">FUWANGFOOD 23.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    3.46%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye469.html?name=GBBPOWER%20%20" class="abhead" target="_top">GBBPOWER   31.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.32%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyecfa.html?name=GENNEXT%20%20%20" class="abhead" target="_top">GENNEXT    36.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.10%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya198.html?name=GHAIL%20%20%20%20%20" class="abhead" target="_top">GHAIL      47.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.84%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany548e.html?name=GHCL%20%20%20%20%20%20" class="abhead" target="_top">GHCL       63.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    3.93%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany11ee.html?name=GLAXOSMITH" class="abhead" target="_top">GLAXOSMITH 980.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-20.70    -2.07%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany17fd.html?name=GLOBALINS%20" class="abhead" target="_top">GLOBALINS  29.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.02%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanycc28.html?name=GOLDENSON%20" class="abhead" target="_top">GOLDENSON  64.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -2.26%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya469.html?name=GP%20%20%20%20%20%20%20%20" class="abhead" target="_top">GP         206.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    0.24%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydf58.html?name=GPHISPAT%20%20" class="abhead" target="_top">GPHISPAT   54.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.73%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya4d3.html?name=GQBALLPEN%20" class="abhead" target="_top">GQBALLPEN  151.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.20%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2f42.html?name=GRAMEEN1%20%20" class="abhead" target="_top">GRAMEEN1   47.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    2.59%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0d78.html?name=GRAMEENS2%20" class="abhead" target="_top">GRAMEENS2  18.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.11%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany602c.html?name=GREENDELMF" class="abhead" target="_top">GREENDELMF 5.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.77%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5845.html?name=GREENDELT%20" class="abhead" target="_top">GREENDELT  93.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-2.30    -2.41%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2b2a.html?name=GSPFINANCE" class="abhead" target="_top">GSPFINANCE 30.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    4.04%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany158c.html?name=HAKKANIPUL" class="abhead" target="_top">HAKKANIPUL 35.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.72%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc9e7.html?name=HEIDELBCEM" class="abhead" target="_top">HEIDELBCEM 428.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>17.10    4.16%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany481f.html?name=HRTEX%20%20%20%20%20" class="abhead" target="_top">HRTEX      41.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.24%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd932.html?name=IBBLPBOND%20" class="abhead" target="_top">IBBLPBOND  983.25 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.00    0.20%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb5ef.html?name=IBNSINA%20%20%20" class="abhead" target="_top">IBNSINA    114.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.00    4.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="140" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5643.html?name=ICB%20%20%20%20%20%20%20" class="abhead" target="_top">ICB        1557.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>79.50    5.38%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4e6c.html?name=ICB1STNRB%20" class="abhead" target="_top">ICB1STNRB  26.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    2.28%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany53c6.html?name=ICB2NDNRB%20" class="abhead" target="_top">ICB2NDNRB  10.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    4.08%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybc05.html?name=ICB3RDNRB%20" class="abhead" target="_top">ICB3RDNRB  5.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.92%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyda9e.html?name=ICBAMCL2ND" class="abhead" target="_top">ICBAMCL2ND 5.90 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany580d.html?name=ICBEPMF1S1" class="abhead" target="_top">ICBEPMF1S1 5.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.72%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5bfb.html?name=ICBIBANK%20%20" class="abhead" target="_top">ICBIBANK   6.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.33%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye6e0.html?name=ICBISLAMIC" class="abhead" target="_top">ICBISLAMIC 18.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    3.35%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb5d2.html?name=ICBSONALI1" class="abhead" target="_top">ICBSONALI1 8.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.44%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2bcf.html?name=IDLC%20%20%20%20%20%20" class="abhead" target="_top">IDLC       69.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    1.60%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyfe78.html?name=IFIC%20%20%20%20%20%20" class="abhead" target="_top">IFIC       36.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.12%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7b57.html?name=IFIC1STMF%20" class="abhead" target="_top">IFIC1STMF  6.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.03%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye885.html?name=IFILISLMF1" class="abhead" target="_top">IFILISLMF1 6.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    5.17%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybfe1.html?name=ILFSL%20%20%20%20%20" class="abhead" target="_top">ILFSL      15.20 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.65%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc49b.html?name=IMAMBUTTON" class="abhead" target="_top">IMAMBUTTON 10.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    9.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0dd5.html?name=INTECH%20%20%20%20" class="abhead" target="_top">INTECH     17.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.00    5.99%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany079f.html?name=IPDC%20%20%20%20%20%20" class="abhead" target="_top">IPDC       20.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.50%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany223b.html?name=ISLAMIBANK" class="abhead" target="_top">ISLAMIBANK 34.30 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyda94.html?name=ISLAMICFIN" class="abhead" target="_top">ISLAMICFIN 17.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6b71.html?name=ISLAMIINS%20" class="abhead" target="_top">ISLAMIINS  32.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.61%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd82b.html?name=ISNLTD%20%20%20%20" class="abhead" target="_top">ISNLTD     20.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    8.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb531.html?name=JAMUNABANK" class="abhead" target="_top">JAMUNABANK 16.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    3.09%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyea80.html?name=JAMUNAOIL%20" class="abhead" target="_top">JAMUNAOIL  213.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>6.50    3.14%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6c5e.html?name=JANATAINS%20" class="abhead" target="_top">JANATAINS  26.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.38%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf6d7.html?name=JMISMDL%20%20%20" class="abhead" target="_top">JMISMDL    212.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.40    1.15%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6fbc.html?name=JUTESPINN%20" class="abhead" target="_top">JUTESPINN  74.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    2.35%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7164.html?name=KARNAPHULI" class="abhead" target="_top">KARNAPHULI 25.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany804f.html?name=KAY&amp;QUE%20%20%20" class="abhead" target="_top">KAY&amp;QUE    22.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.00    10.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydef5.html?name=KEYACOSMET" class="abhead" target="_top">KEYACOSMET 28.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.81%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb347.html?name=KOHINOOR%20%20" class="abhead" target="_top">KOHINOOR   386.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.80    0.99%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany374d.html?name=KPCL%20%20%20%20%20%20" class="abhead" target="_top">KPCL       54.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.20    -2.15%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany45ad.html?name=LAFSURCEML" class="abhead" target="_top">LAFSURCEML 37.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.40    10.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany61ea.html?name=LANKABAFIN" class="abhead" target="_top">LANKABAFIN 73.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -2.25%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9280.html?name=LEGACYFOOT" class="abhead" target="_top">LEGACYFOOT 41.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    1.47%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5c76.html?name=LIBRAINFU%20" class="abhead" target="_top">LIBRAINFU  420.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.05%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany457a.html?name=LINDEBD%20%20%20" class="abhead" target="_top">LINDEBD    673.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>9.70    1.46%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4b13.html?name=LRGLOBMF1%20" class="abhead" target="_top">LRGLOBMF1  7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.86%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5414.html?name=MAKSONSPIN" class="abhead" target="_top">MAKSONSPIN 20.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.90    4.52%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3867.html?name=MALEKSPIN%20" class="abhead" target="_top">MALEKSPIN  30.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    3.77%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0195.html?name=MARICO%20%20%20%20" class="abhead" target="_top">MARICO     799.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.06%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3a27.html?name=MBL1STMF%20%20" class="abhead" target="_top">MBL1STMF   7.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.86%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya0cd.html?name=MEGCONMILK" class="abhead" target="_top">MEGCONMILK 15.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.40    9.66%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5fd3.html?name=MEGHNACEM%20" class="abhead" target="_top">MEGHNACEM  150.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.10    2.80%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybaed.html?name=MEGHNALIFE" class="abhead" target="_top">MEGHNALIFE 121.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    1.25%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany86c9.html?name=MEGHNAPET%20" class="abhead" target="_top">MEGHNAPET  9.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    7.95%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd9b0.html?name=MERCANBANK" class="abhead" target="_top">MERCANBANK 17.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.18%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybcb5.html?name=MERCINS%20%20%20" class="abhead" target="_top">MERCINS    27.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.11%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4627.html?name=METROSPIN%20" class="abhead" target="_top">METROSPIN  21.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyde4c.html?name=MICEMENT%20%20" class="abhead" target="_top">MICEMENT   85.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.90    2.29%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3c4e.html?name=MIDASFIN%20%20" class="abhead" target="_top">MIDASFIN   31.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.00    -3.05%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc73e.html?name=MIRACLEIND" class="abhead" target="_top">MIRACLEIND 24.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.90    8.52%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany4fa3.html?name=MITHUNKNIT" class="abhead" target="_top">MITHUNKNIT 81.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.40    1.75%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany781c.html?name=MJLBD%20%20%20%20%20" class="abhead" target="_top">MJLBD      79.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.20    1.54%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5788.html?name=MONNOCERA%20" class="abhead" target="_top">MONNOCERA  34.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.80%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5c98.html?name=MONNOSTAF%20" class="abhead" target="_top">MONNOSTAF  295.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-6.20    -2.06%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya095.html?name=MPETROLEUM" class="abhead" target="_top">MPETROLEUM 239.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.60    2.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany93bf.html?name=MTBL%20%20%20%20%20%20" class="abhead" target="_top">MTBL       17.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.74%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9354.html?name=NATLIFEINS" class="abhead" target="_top">NATLIFEINS 307.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-9.00    -2.85%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2804.html?name=NAVANACNG%20" class="abhead" target="_top">NAVANACNG  70.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -0.99%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7e88.html?name=NBL%20%20%20%20%20%20%20" class="abhead" target="_top">NBL        12.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.65%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany39a4.html?name=NCCBANK%20%20%20" class="abhead" target="_top">NCCBANK    13.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.53%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf539.html?name=NCCBLMF1%20%20" class="abhead" target="_top">NCCBLMF1   8.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.15%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany183e.html?name=NHFIL%20%20%20%20%20" class="abhead" target="_top">NHFIL      33.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc8fd.html?name=NITOLINS%20%20" class="abhead" target="_top">NITOLINS   34.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.80    -2.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2bf2.html?name=NLI1STMF%20%20" class="abhead" target="_top">NLI1STMF   9.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.15%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyff95.html?name=NORTHRNINS" class="abhead" target="_top">NORTHRNINS 42.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    1.69%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0f15.html?name=NPOLYMAR%20%20" class="abhead" target="_top">NPOLYMAR   60.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.50    -2.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9e53.html?name=NTLTUBES%20%20" class="abhead" target="_top">NTLTUBES   93.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-4.90    -4.99%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany7ca4.html?name=OLYMPIC%20%20%20" class="abhead" target="_top">OLYMPIC    170.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.70    2.22%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyeb86.html?name=ONEBANKLTD" class="abhead" target="_top">ONEBANKLTD 16.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2eb6.html?name=ORIONINFU%20" class="abhead" target="_top">ORIONINFU  42.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.60    -1.39%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany8b12.html?name=ORIONPHARM" class="abhead" target="_top">ORIONPHARM 64.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -2.43%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9fbd.html?name=PADMALIFE%20" class="abhead" target="_top">PADMALIFE  66.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.15%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany80e1.html?name=PADMAOIL%20%20" class="abhead" target="_top">PADMAOIL   304.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>9.90    3.37%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany74f7.html?name=PARAMOUNT%20" class="abhead" target="_top">PARAMOUNT  25.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.61%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany97e2.html?name=PEOPLESINS" class="abhead" target="_top">PEOPLESINS 33.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya243.html?name=PF1STMF%20%20%20" class="abhead" target="_top">PF1STMF    5.60 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9dd3.html?name=PHARMAID%20%20" class="abhead" target="_top">PHARMAID   169.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.30    -0.76%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6bb8.html?name=PHENIXINS%20" class="abhead" target="_top">PHENIXINS  44.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.68%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybe07.html?name=PHOENIXFIN" class="abhead" target="_top">PHOENIXFIN 35.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    0.85%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2528.html?name=PHPMF1%20%20%20%20" class="abhead" target="_top">PHPMF1     5.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanycd82.html?name=PIONEERINS" class="abhead" target="_top">PIONEERINS 68.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.70    2.53%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb019.html?name=PLFSL%20%20%20%20%20" class="abhead" target="_top">PLFSL      25.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6be9.html?name=POPULAR1MF" class="abhead" target="_top">POPULAR1MF 6.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    1.64%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany424c.html?name=POPULARLIF" class="abhead" target="_top">POPULARLIF 239.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>3.50    1.49%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany037a.html?name=POWERGRID%20" class="abhead" target="_top">POWERGRID  56.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    2.74%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyeb76.html?name=PRAGATIINS" class="abhead" target="_top">PRAGATIINS 56.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.35%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya764.html?name=PRAGATILIF" class="abhead" target="_top">PRAGATILIF 198.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>14.40    7.84%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyad74.html?name=PREMIERBAN" class="abhead" target="_top">PREMIERBAN 11.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.90%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany238f.html?name=PREMIERCEM" class="abhead" target="_top">PREMIERCEM 105.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.30    2.24%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany41a3.html?name=PREMIERLEA" class="abhead" target="_top">PREMIERLEA 10.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.99%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany901b.html?name=PRIME1ICBA" class="abhead" target="_top">PRIME1ICBA 5.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    3.64%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany66af.html?name=PRIMEBANK%20" class="abhead" target="_top">PRIMEBANK  24.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -1.61%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany19cf.html?name=PRIMEFIN%20%20" class="abhead" target="_top">PRIMEFIN   27.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0dfb.html?name=PRIMEINSUR" class="abhead" target="_top">PRIMEINSUR 34.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.29%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd2b1.html?name=PRIMELIFE%20" class="abhead" target="_top">PRIMELIFE  110.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.55%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2ff0.html?name=PRIMETEX%20%20" class="abhead" target="_top">PRIMETEX   25.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.78%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanydb44.html?name=PROGRESLIF" class="abhead" target="_top">PROGRESLIF 122.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.50    2.08%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3654.html?name=PROVATIINS" class="abhead" target="_top">PROVATIINS 29.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.69%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6c4d.html?name=PTL%20%20%20%20%20%20%20" class="abhead" target="_top">PTL        56.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    2.93%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd4da.html?name=PUBALIBANK" class="abhead" target="_top">PUBALIBANK 33.80 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany69c9.html?name=PURABIGEN%20" class="abhead" target="_top">PURABIGEN  26.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.38%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany39cd.html?name=QSMDRYCELL" class="abhead" target="_top">QSMDRYCELL 43.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    3.82%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany25c0.html?name=RAHIMAFOOD" class="abhead" target="_top">RAHIMAFOOD 70.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.50    -4.74%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany363b.html?name=RAHIMTEXT%20" class="abhead" target="_top">RAHIMTEXT  231.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.70    -1.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyccae.html?name=RAKCERAMIC" class="abhead" target="_top">RAKCERAMIC 55.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.50    -0.89%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb0dc.html?name=RANFOUNDRY" class="abhead" target="_top">RANFOUNDRY 102.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.29%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany782d.html?name=RDFOOD%20%20%20%20" class="abhead" target="_top">RDFOOD     27.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.73%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyae66.html?name=RECKITTBEN" class="abhead" target="_top">RECKITTBEN 900.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>30.00    3.45%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyae96.html?name=RELIANCE1%20" class="abhead" target="_top">RELIANCE1  9.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    4.55%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6caa.html?name=RELIANCINS" class="abhead" target="_top">RELIANCINS 77.10 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.13%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany31c6.html?name=RENATA%20%20%20%20" class="abhead" target="_top">RENATA     771.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.04%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyfd51.html?name=RENWICKJA%20" class="abhead" target="_top">RENWICKJA  161.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.50    0.94%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany317c.html?name=REPUBLIC%20%20" class="abhead" target="_top">REPUBLIC   44.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.22%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9536.html?name=RNSPIN%20%20%20%20" class="abhead" target="_top">RNSPIN     34.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.20    -0.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany386b.html?name=RUPALIBANK" class="abhead" target="_top">RUPALIBANK 66.50 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.60%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany692b.html?name=RUPALIINS%20" class="abhead" target="_top">RUPALIINS  34.50 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany559e.html?name=RUPALILIFE" class="abhead" target="_top">RUPALILIFE 134.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>4.60    3.54%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5709.html?name=SAFKOSPINN" class="abhead" target="_top">SAFKOSPINN 30.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    2.02%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye0bf.html?name=SAIHAMCOT%20" class="abhead" target="_top">SAIHAMCOT  24.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyb2d3.html?name=SAIHAMTEX%20" class="abhead" target="_top">SAIHAMTEX  29.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.74%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya09c.html?name=SALAMCRST%20" class="abhead" target="_top">SALAMCRST  49.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    0.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany13d0.html?name=SALVOCHEM%20" class="abhead" target="_top">SALVOCHEM  25.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.59%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye787.html?name=SAMATALETH" class="abhead" target="_top">SAMATALETH 27.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>2.50    9.92%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany62f2.html?name=SAMORITA%20%20" class="abhead" target="_top">SAMORITA   91.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.80    0.89%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6083.html?name=SANDHANINS" class="abhead" target="_top">SANDHANINS 81.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>5.20    6.78%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya111.html?name=SAPORTL%20%20%20" class="abhead" target="_top">SAPORTL    32.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.57%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya40a.html?name=SAVAREFR%20%20" class="abhead" target="_top">SAVAREFR   61.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-5.00    -7.58%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3293.html?name=SEBL1STMF%20" class="abhead" target="_top">SEBL1STMF  8.40 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    3.70%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybcf3.html?name=SHAHJABANK" class="abhead" target="_top">SHAHJABANK 16.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.62%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc0fc.html?name=SHYAMPSUG%20" class="abhead" target="_top">SHYAMPSUG  9.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    5.88%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany521e.html?name=SIBL%20%20%20%20%20%20" class="abhead" target="_top">SIBL       13.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.72%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyd2e8.html?name=SINGERBD%20%20" class="abhead" target="_top">SINGERBD   208.70 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.14%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf305.html?name=SINOBANGLA" class="abhead" target="_top">SINOBANGLA 33.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.10    3.40%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyab37.html?name=SONALIANSH" class="abhead" target="_top">SONALIANSH 136.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -1.23%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2a99.html?name=SONARBAINS" class="abhead" target="_top">SONARBAINS 25.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.19%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanybb27.html?name=SONARGAON%20" class="abhead" target="_top">SONARGAON  20.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.52%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30"><table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany191f.html?name=SOUTHEASTB" class="abhead" target="_top">SOUTHEASTB 18.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    1.63%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2597.html?name=SPCERAMICS" class="abhead" target="_top">SPCERAMICS 19.20 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2c3e.html?name=SPPCL%20%20%20%20%20" class="abhead" target="_top">SPPCL      70.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.60    -2.22%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyfb9a.html?name=SQUARETEXT" class="abhead" target="_top">SQUARETEXT 95.30 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.30    -0.31%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5746.html?name=SQURPHARMA" class="abhead" target="_top">SQURPHARMA 216.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>8.90    4.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany6d66.html?name=STANCERAM%20" class="abhead" target="_top">STANCERAM  39.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>1.60    4.26%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9730.html?name=STANDARINS" class="abhead" target="_top">STANDARINS 40.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.25%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany2aa5.html?name=STANDBANKL" class="abhead" target="_top">STANDBANKL 14.70 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    1.38%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3060.html?name=SUMITPOWER" class="abhead" target="_top">SUMITPOWER 42.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.70    -1.61%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany81d7.html?name=SUNLIFEINS" class="abhead" target="_top">SUNLIFEINS 63.60 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.60    0.95%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
									<a href="displayCompany7835.html?name=TAKAFULINS" class="abhead" target="_top">TAKAFULINS 38.90 <img src="tkupdown.gif" border="0"><br>0.00    0.00%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany80e3.html?name=TALLUSPIN%20" class="abhead" target="_top">TALLUSPIN  39.20 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    1.03%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany05cf.html?name=TITASGAS%20%20" class="abhead" target="_top">TITASGAS   76.60 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-1.70    -2.17%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany9252.html?name=TRUSTB1MF%20" class="abhead" target="_top">TRUSTB1MF  7.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.20    2.74%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany0791.html?name=TRUSTBANK%20" class="abhead" target="_top">TRUSTBANK  19.90 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.40    2.05%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc287.html?name=UCBL%20%20%20%20%20%20" class="abhead" target="_top">UCBL       27.30 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.63%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany14d6.html?name=ULC%20%20%20%20%20%20%20" class="abhead" target="_top">ULC        32.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.31%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanye36c.html?name=UNIONCAP%20%20" class="abhead" target="_top">UNIONCAP   33.00 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.10    0.30%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyc2c4.html?name=UNIQUEHRL%20" class="abhead" target="_top">UNIQUEHRL  85.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.12%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany62da.html?name=UNITEDAIR%20" class="abhead" target="_top">UNITEDAIR  16.90 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.10    -0.59%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf0de.html?name=UNITEDINS%20" class="abhead" target="_top">UNITEDINS  45.00 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.40    -0.88%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="135" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanyf8d6.html?name=USMANIAGL%20" class="abhead" target="_top">USMANIAGL  136.40 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-3.10    -2.22%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany3119.html?name=UTTARABANK" class="abhead" target="_top">UTTARABANK 32.50 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.70    2.20%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompanya781.html?name=UTTARAFIN%20" class="abhead" target="_top">UTTARAFIN  84.80 <img src="<?php echo base_url();?>img/tkdown.gif" border="0"><br>-0.80    -0.93%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="130" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany1ad0.html?name=ZAHINTEX%20%20" class="abhead" target="_top">ZAHINTEX   27.80 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.50    1.83%</a><br>
								</td></tr></table></td>
								<td valign="top" height="30">
									<table width="125" border="0" cellspacing="0" cellpadding="0"><tr><td height="30" width="100%">
								<a href="displayCompany5d24.html?name=ZEALBANGLA" class="abhead" target="_top">ZEALBANGLA 9.10 <img src="<?php echo base_url();?>img/tkup.gif" border="0"><br>0.30    3.41%</a><br>
								</td></tr></table></td>
										</tr></table>
										</marquee>
									
									
									
									
									
									
								</td>   
							</tr>							
						</table>			
						
						
						<div class="row">
							<div class="col-md-6">
							    <br/>
								<table width="100%">
								<tr><td colspan="4" style="background:#99CCFF;text-align:center;border-left:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;">Index Mover</td></tr>
								<tr>
									<th style="font-size:11px;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;text-align:center;">Company</th>
									<th style="font-size:11px;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;text-align:center;">LTP</th>
									<th style="font-size:11px;border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;text-align:center;">YCP</th>
									<th style="font-size:11px;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;text-align:center;">Ind Chng.</th>
								</tr>
								
								<tr>
								  <td style="border-left:1px solid #000;">&nbsp;</td>
								  <td >&nbsp;</td>
								  <td >&nbsp;</td>
								  <td style="border-right:1px solid #000;">&nbsp;&nbsp;</td>
								</tr>
								<tr>
								  <td style="border-left:1px solid #000;">&nbsp;</td>
								  <td >&nbsp;</td>
								 
								  <td colspan="2" style="font-size:12px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;text-align:center;">
									Positive Impact
								</td>
								</tr>
								
								
								<tr>
								  <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;">MEGHNACEM</td>
								  <td style="border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
									  &nbsp;
								  </td>
								</tr>
								
								<tr>
								  <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
									  &nbsp;
								  </td>
								</tr>
								
								<tr>
									<td style="border-left:1px solid #000;">&nbsp;</td>
								  <td >&nbsp;</td>
								  <td >&nbsp;</td>
								  <td style="border-right:1px solid #000;">&nbsp;&nbsp;</td>
								</tr>									
								
								
								<tr>
									<td style="border-left:1px solid #000;">&nbsp;</td>
								    <td >&nbsp;</td>								 
								    <td colspan="2" style="font-size:12px;border-left:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;text-align:center;">
									   Negative Impact
									</td>
								</tr>
									
								
								<tr>
								  <td colspan="2" style="border-top:1px solid #000;border-left:1px solid #000;">GP</td>
								  <td style="border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
									  &nbsp;
								  </td>
								</tr>
								
								<tr>
								 <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">&nbsp;</td>
								  <td style="border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;border-left:1px solid #000;">
									  &nbsp;
								  </td>
								</tr>								
								
								
								</table>
								<br/>
							</div>
							<div class="col-md-6">
							    <br/> 
							    <table width="100%">
									<tr>
										<td style="background-color:#6600CC;color:#fff;text-align:center;">Watch List</td>
									</tr>
								</table>
							</div>
							
						</div>
						
						
						
					</div>
					
					
					
					
				</div>	
				
				
				
				
				
				
			</div>	
			
			
			
			
			
			
	    </div>
	    
	      
	    <br/>
		<div class="row">
			<div class="col-md-12">					  
				<?php //$this->load->view("graph_view/todays_market_top_menu");?>	 
			</div>			  
			<div class="col-md-4">		    
				<!-- left menu will be load 
					 on mouse over	--> 
				<!-- <div id="left_menu_load"></div> -->
				<?php //$this->load->view("graph_view/todays_market_left_menu");?>
			</div>
			
			<div class="col-md-8">		    
				<!-- 
				 menu overview will be load
				 on mouse over
				 -->
				 
				
				
				<!--
				<ul class="nav nav-pills" id="sb">
				  <li id="sub" name="1" class="active"><a href="javascript:void(0);" >A</a></li>
				  <li id="sub" name="2" ><a href="javascript:void(0);" >B</a></li>
				  <li id="sub" name="3" ><a href="javascript:void(0);" >C</a></li>
				</ul>
				<div id="hsbc"></div>
				-->
				<br/>
				<!-- contents will load here -->
				<div id="ultimate_content">
					<!-- ultimate content -->				
				</div>				
			</div>
		</div>
	</div>  
	
    <script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script>
	$(document).ready(function(){
		$("#technical_screener_search").click(function(){	  
			var cci_select 			 = $("#cci_select").val();
			var cci_val    			 = $("#cci_val").val();
			var mfi_select 			 = $("#mfi_select").val();
			var mfi_val    			 = $("#mfi_val").val();
			var rsi_select 			 = $("#rsi_select").val();
			var rsi_val    			 = $("#rsi_val").val();
			var st_oscillator_select = $("#st_oscillator_select").val();
			var st_oscillator_val    = $("#st_oscillator_val").val();
			var ut_oscillator_select = $("#ut_oscillator_select").val();
			var ut_oscillator_val    = $("#ut_oscillator_val").val();
			var wr_select   		 = $("#wr_select").val();
			var wr_val 	    		 = $("#wr_val").val();
			var trix_select 		 = $("#trix_select").val();
			var trix_val    		 = $("#trix_val").val();
		
		    var dataStr = "cci_select="+cci_select+"&cci_val="+cci_val
				+"&mfi_select="+mfi_select+"&mfi_val="+mfi_val+"&rsi_select="+
				rsi_select+"&rsi_val="+rsi_val+"&st_oscillator_select="+
				st_oscillator_select+"&st_oscillator_val="+st_oscillator_val+
				"&ut_oscillator_select="+ut_oscillator_select+"&ut_oscillator_val="+
				ut_oscillator_val+"&wr_select="+wr_select+"&wr_val="+wr_val;
			
			
			$.ajax({
			    type:"post" ,
			    url:"<?php echo site_url();?>/mains/technical_screener_home_page_search_vals" ,
			    data:dataStr ,
			    async:true ,
			    cache:false ,
			    success:function(st)
				{
			        location.href = "<?php echo site_url();?>/mains/technical_screener_ui_search";  
			    }
			});
			
			//alert(dataStr);
		
		});
	});
	</script>

	
	</body>
</html>	 