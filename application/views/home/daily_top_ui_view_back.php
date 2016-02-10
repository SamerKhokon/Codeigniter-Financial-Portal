<!-- main page -->
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
		<meta name="keywords"    content="Bootstrap Tutorial"/>
		<meta name="description" content="Custom template making with bootstrap framework."/>	  
		<meta name="author"      content="Samer Sarker Khokon. 01719347580"/>	  
	  
		<?php $this->load->view('utility');?>
		
		
	  <title>IP: <?php echo $_SERVER['REMOTE_ADDR'];?></title>
	</head>
<body>   
	
	<div class="well">	
		<table width="100%">	
			<tr>
				<td width="35%"><img src="<?php echo base_url();?>img/iPortal.png"/></td>
				<td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="btn btn-primary" value="Login"/>
				<input type="button" class="btn btn-primary" value="Register"/>
				&nbsp;&nbsp;&nbsp;&nbsp;				
				</td>				
				<td width="35%"><img src="<?php echo base_url();?>img/Pic1.png"/></td>
			</tr>
		</table>
		
			<span class="glyphicon glyphicon-home"></span><a href="javascript:void(0);">Home</a>
			<span class="glyphicon glyphicon-user"></span>Online: <?php echo $this->session->userdata("CAPM_USER");?> &nbsp;
			<a href="<?php echo site_url();?>/mains/logout/" ><span class="glyphicon glyphicon-off"></span>Logout</a>

			<?php $this->load->view("home/capm_megamenu"); ?>
			<!-- end megamenu -->			
	</div>	
	
	<div class="container"> 
	    <div class="row">
		    <div class="col-md-12">
			    <marquee loop="-1">stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here</marquee>
			</div>
		</div>
	    <div class="row">
	        <div class="col-md-3">
		      <!-- left menu -->
			  <?php $this->load->view("home/todays_market_left_menu");?>
			</div>			
			
			<div class="col-md-9">	
			
			
			    <table width="100%">
				<tr><td>
                <?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
				</td></tr>
				<tr>
					<td>
					
					
					
						     
							 
							 
							 
						<br/>		
						<input type="hidden" id="sel_flag" value=""/>
						<div id="search_result"></div>   
					   
						<?php 
						//$this->load->model("dailytop_gainer_data"); 
						//$this->load->model("dailytop_looser_data"); 		
						?>	
						<br/>		
						<table width="100%">
						<tr>
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Price</th>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Price</th>
						</tr>
						<tr>
							<td>
								<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
								</tr>
								<?php  
								$prices = $this->load->get_var('prices');
				//				= $this->dailytop_gainer_data->dailytop_gainer_by_price();
									$i=0;
									foreach($prices as $price)
									{ 
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
								?>
										<tr>
										  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->Prev_Close_Price, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->Close_Price, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>">						    
											  <?php echo number_format($price->Percent_Change, 2, '.', '');?>%
										  </td>
										</tr> 
								<?php 
									}
								?>
								</table>
							</td>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<td>
								<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
								</tr>
								<?php  
								$lprices = $this->load->get_var('lprices');
								//= $this->dailytop_looser_data->dailytop_looser_by_price();
								
									$i=0;
									foreach($lprices as $lprice)
									{ 
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
								?>
										<tr>
										  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Prev_Close_Price, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Close_Price, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Percent_Change, 2, '.', '');?>%</td>
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
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer by Volume</th>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser by Volume</th>
						</tr>
						
						<tr>
						<td>
							<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
								</tr>
								<?php 
								$gvolumes = $this->load->get_var('gvolumes');
								//= $this->dailytop_gainer_data->dailytop_gainer_by_volume_data();
								   $i=0;
								   foreach($gvolumes as $gvolume)
								   {
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   			   
								?>
								<tr>
									<td style="<?php echo $css;?>"><?php echo $gvolume->company_code;?></td>
									<td style="<?php echo $css;?>"><?php echo number_format($gvolume->volume, 2, '.', '');?></td>
								</tr>
								<?php } ?>
							</table>			
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>	
							<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
								</tr>			
								<?php 
								$lvolumes =$this->load->get_var('lvolumes');
								//= $this->dailytop_looser_data->dailytop_looser_by_volume_data();
								   $i=0;
								   foreach($lvolumes as $lvolume){
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   			   
								?>
								<tr>
									<td style="<?php echo $css;?>"><?php echo $lvolume->company_code;?></td>
									<td style="<?php echo $css;?>"><?php echo number_format($lvolume->volume, 2, '.', '');?></td>
								</tr>
								<?php } ?>			
							</table>
						</td>		
						</tr>
						
						
						<tr>
						<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
						</tr>
						<tr>
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer by Turnover</th>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser by Turnover</th>
						</tr>		
						<tr>
						<td>
							<table width="100%">
							<tr>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
								<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
							</tr>
							<?php 
							$gturnovers = $this->load->get_var('gturnovers');
							//= $this->dailytop_gainer_data->dailytop_gainer_by_turnover_data();
							   $i=0;
							   foreach($gturnovers as $gturnover){
								   $i++;
								   if($i%2==0)
								   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
								   else
								   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
							?>
							<tr>
								<td style="<?php echo $css;?>"><?php echo $gturnover->company_code;?></td>
								<td style="<?php echo $css;?>"><?php echo number_format($gturnover->turnover, 2, '.', '');?></td>
							</tr>
							<?php } ?>
							</table>			
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>	
							<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
								</tr>			
								<?php 
								$lturnovers = $this->load->get_var('lturnovers');
								//= $this->dailytop_looser_data->dailytop_looser_by_turnover_data();
								
								   $i=0;
								   foreach($lturnovers as $lturnover){
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
								?>
								<tr>
									<td style="<?php echo $css;?>"><?php echo $lturnover->company_code;?></td>
									<td style="<?php echo $css;?>"><?php echo number_format($lturnover->turnover, 2, '.', '');?></td>
								</tr>
								<?php } ?>			
							</table>
						</td>		
						</tr>	


						
						
						
						<tr>
						<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
						</tr>
						<tr>
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer by PE</th>
							<td>&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser by PE</th>
						</tr>		
						<tr>
						<td>
							<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">PE</th>
								</tr>
								<?php 
								$gpes = $this->load->get_var('gpes');
								//$this->dailytop_gainer_data->dailytop_gainer_by_pe_data();
								   $i=0;
								   foreach($gpes as $gpe){
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
								?>
								<tr>
									<td style="<?php echo $css;?>"><?php echo $gpe->company_code;?></td>
									<td style="<?php echo $css;?>"><?php echo number_format($gpe->pe, 2, '.', '');?></td>
								</tr>
								<?php } ?>
							</table>			
						</td>
						<td>&nbsp;&nbsp;&nbsp;</td>
						<td>	
							<table width="100%">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">PE</th>
								</tr>			
								<?php 
								//$lpes = $this->dailytop_looser_data->dailytop_looser_by_pe_data();
								   $i=0;
								   foreach($lpes as $lpe){
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
								?>
								<tr>
									<td style="<?php echo $css;?>"><?php echo $lpe->company_code;?></td>
									<td style="<?php echo $css;?>"><?php echo number_format($lpe->pe, 2, '.', '');?></td>
								</tr>
								<?php } ?>			
							</table>
						</td>		
						</tr>			
						</table>
						
						   <script type="text/javascript">
							$(document).ready(function(){
							
								$("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
								{'keyword':'#'},function(){});						
							
								$("#gainer_search_key").bind("change",gainer_Table_Ordering);
								$("#looser_search_key").bind("change",looser_Table_Ordering);
							
								function gainer_Table_Ordering()
								{
									var  gsel_id = $("#gainer_search_key").val();
									 $("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
									{'keyword':gsel_id},function(){});
									//alert(gsel_id);
								}
								
								function looser_Table_Ordering()
								{   
									var  lsel_id = $("#looser_search_key").val(); 
									 $("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
									{'keyword':lsel_id},function(){});
									//alert(lsel_id);
								}
								
								$("#gainer_search_key").attr('disabled',true);
								$("#looser_search_key").attr('disabled',true);
								
								$("input[name='chk']").click(function(){
									var len = $("input[name='chk']:checked").length;
									var sel_id = $(this).attr('id');
									if(len>0)
									{
										$(".chk").each(function()
										{
											if(sel_id == $(this).attr('id')) 
											{
											   $(this).attr('checked',true);
											   $("#"+sel_id+"_search_key").attr('disabled',false);
											}
											else
											{
												$(this).attr('checked',false);						
												$("#"+$(this).attr('id')+"_search_key").attr('disabled',true);
											}
										});
									}
									else
									{
									   $("input[name='chk']").attr('checked',false);				   
									   $("#gainer_search_key").attr('disabled',true);
									   $("#looser_search_key").attr('disabled',true);
									}
								});
								
								$("#looser_search_key").change(function(){
									var sid = $("#looser_search_key").val();
									if(sid!="") {
									$("#search_result").load("<?php echo site_url();?>/dailytop_looser/"+sid,function(){});
									}else{
										$("#search_result").html("");
									  alert("Please select anyone");
									}
								});
								
								$("#gainer_search_key").change(function(){
									var sid = $("#gainer_search_key").val();
									if(sid!="") {
									   //alert(sid);
										$("#search_result").load("<?php echo site_url();?>/dailytop_gainer/"+sid,function(){});
									}else{
									  $("#search_result").html("");				
									  alert("Please select anyone");
									}
								});	
								
							});
						   </script> 
							 
							 
							 
							 

						
					</td>
				</tr>
				</table>
				
				
				
				
				
				
				
				
				
				
				
				
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){
	    $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
	
	});
	</script>
	
</body>
</html>