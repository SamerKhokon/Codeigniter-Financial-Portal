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
												 
				<table width="100%">
					<tr>
					   <td>Select Top Gainer:</td>
					   <td>&nbsp;</td>
					   <td>Select Top Looser:</td>
					</tr>
					<tr>		
						<td><select id="looser_search_cat" style="border:1px solid #999966;width:120px;">
								<option value="">choose anyone</option>										  
								  <option value="total_trade">No of Trades</option>										  										     
								  <option value="changes">% Price</option>
								  <option value="total_value">Turnover</option>
								  <option value="total_volume">Volume</option>										  
								  <option value="mcap">Market CAP</option>										  
								  <option value="turnover_growth">Turnover Growth</option>										  										  										  
								</select>
						</td>							   
						<td>&nbsp;</td>							   							 						
						<td><select id="gainer_search_cat" style="border:1px solid #999966;width:120px;">
								<option value="">choose anyone</option>										  
							  <option value="total_trade">No of Trades</option>										  										     
							  <option value="changes">% Price</option>
							  <option value="total_value">Turnover</option>
							  <option value="total_volume">Volume</option>										  
							  <option value="mcap">Market CAP</option>										  
							  <option value="turnover_growth">Turnover Growth</option>										  										  										  
							</select>
					   </td>							   
					</tr>
				</table>   
				<div id="search_result"></div>
						
						<br/>		
						<table width="100%">
						<tr>
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by %Change</th>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by %Change</th>
						</tr>
						<tr>
							<td>
								<table width="100%" class="display table-bordered table-striped table dataTable">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('prices');
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
										  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->ycp, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->ltp, 2, '.', '');?></td>
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
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
								</tr>
								<?php  
								$lprices = $this->load->get_var('lprices');
								
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
										  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->ycp, 2, '.', '');?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->ltp, 2, '.', '');?></td>
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
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('gvolumes');
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
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
								</tr>
								<?php  
								$lprices = $this->load->get_var('lvolumes');
								
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
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover(M)</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('gturnovers');
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
										  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->turnover);?></td>
										  
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
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover(M)</th>
								</tr>
								<?php  
								$lprices = $this->load->get_var('lturnovers');
								
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
										  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->turnover);?></td>
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
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Turnover</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Current Turnover</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover Growth</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('gtgrowth');
									
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
										  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->prev_total_val);?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->cur_total_val);?></td>
										  <td style="<?php echo $css;?>"><?php echo $price->turnover_growth;?></td>
										  
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
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Turnover</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Current Turnover</th>									
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover Growth</th>
								</tr>
								<?php  
								$ltgrowth = $this->load->get_var('ltgrowth');
								
									$i=0;
									foreach($ltgrowth as $ltgr)
									{ 
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
								?>
										<tr>
										  <td style="<?php echo $css;?>"><?php echo $ltgr->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($ltgr->prev_total_val);?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($ltgr->cur_total_val);?></td>										  
										  <td style="<?php echo $css;?>"><?php echo $ltgr->turnover_growth;?></td>
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
							<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Market CAP</th>
							<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
							<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Market CAP</th>
						</tr>
						<tr>
							<td>
								<table width="100%" class="display table-bordered table-striped table dataTable">
								<tr>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Market CAP</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('gmcap');
									
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
										  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->mcap);?></td>
										  
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
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Market CAP</th>
								</tr>
								<?php  
								$ltgrowth = $this->load->get_var('lmcap');
								
									$i=0;
									foreach($ltgrowth as $ltgr)
									{ 
									   $i++;
									   if($i%2==0)
									   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
									   else
									   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
								?>
										<tr>
										  <td style="<?php echo $css;?>"><?php echo $ltgr->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($ltgr->mcap);?></td>
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
									<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trade</th>
								</tr>
								<?php  
									$prices = $this->load->get_var('gtrades');
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
										  <td style="<?php echo $css;?>"><?php echo $price->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($price->total_trade, 2, '.', '');?></td>
										  
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
									<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trade</th>
								</tr>
								<?php  
								$lprices = $this->load->get_var('ltrades');
								
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
										  <td style="<?php echo $css;?>"><?php echo $lprice->code;?></td>
										  <td style="<?php echo $css;?>"><?php echo number_format($lprice->total_trade, 2, '.', '');?></td>
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


    <!--main column end for body---> 
    <!--body end--> 
	
<script type="text/javascript">
$(document).ready(function() {

		$('#accordion .panel-collapse').on('shown.bs.collapse', function () {
		   $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
		});
		$('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
		   $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
		});

		
		//$("#search_result").load("<?php echo site_url();?>/daily_top_ui/trade_status_table",
		//{'keyword':'#'},function(){});
							
	
	    function gainer_default_table(k)
		{
		   // alert(k);
		    $.ajax({
		      type:"post",			  
			  url:"<?php echo site_url();?>/daily_top_ui/trade_status_table" ,
			  data:'keyword='+k ,			  
			  cache:false,
			  async:true,			  			  			  
			  success:function(st){
			    //$("#search_result").empty();
				$("#search_result").html(st).fadeIn('slow');
			  }			  
		    });
			
			
		}
		
	    gainer_default_table('#');
		
		$("#gainer_search_cat").change(function(){
			var gainer_search_cat = $("#gainer_search_cat").val();
			if(gainer_search_cat!="") {
				//alert(gainer_search_cat);
				
				gainer_default_table(gainer_search_cat+'#asc');
				
				//$("#search_result").load("<?php echo site_url();?>/daily_top_ui/trade_status_table",
				//{'keyword':gainer_search_cat+'#asc'},function(){});						
	
			}else{
			
			    gainer_default_table('#');
				//$("#search_result").load("<?php echo site_url();?>/daily_top_ui/trade_status_table",
				//{'keyword':'#'},function(){});						
	
			}
		});
		 
		 
		$("#looser_search_cat").change(function(){
			 var looser_search_cat = $("#looser_search_cat").val();
			if(looser_search_cat!="") 
			{
				//alert(looser_search_cat);
				
				gainer_default_table(looser_search_cat+'#desc');
				
				//$("#search_result").load("<?php echo site_url();?>/daily_top_ui/trade_status_table",
				//{'keyword':looser_search_cat+'#desc'},function(){});						
	
			}
			else
			{
			    gainer_default_table('#');
				
				//$("#search_result").load("<?php echo site_url();?>/daily_top_ui/trade_status_table",
				//{'keyword':looser_search_cat+'#'},function(){});											 
			}
		});
});
</script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
</body>
</html>