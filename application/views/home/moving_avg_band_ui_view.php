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
						
						
						
							<table width="100%">
							<tr>
									<td>
									<?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
									</td>
							</tr>
							<tr>
								<td>
									<?php $companies = $this->load->get_var('companies'); ?>										
										<table width="60%">
											<tr>
												<td>Moving Avg Type:</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											</tr>		
												<tr>
												
												<td>
													<select id="moving_avg_type" style="width:200px;">
													   <option value="sma">Simple</option>
													   <option value="ema">Exponential</option>
													   <option value="wma">Weighted</option>
													</select>
												</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											</tr>													
											
											<tr>
												<td>Select Company/Companies:</td>
												<td>&nbsp;</td>
												<td>Selected Company/Companies:</td>											
											</tr>
											<tr>
												<td>
											
													<select id="company_codes" multiple="multiple" style="width:200px;height:150px;">
														<?php foreach($companies as $company){ ?>
														<option value="<?php echo $company->id;?>">
															<?php echo $company->code;?>
														</option>
														<?php }?>
													</select>
												</td>
												<td>												
													<ul  style="list-style:none;">
														<li><input type="button" style="padding:10px;margin-left:-48px;" value=">>" id="company_codes_add" value="Add Companies"/></li>
														<li><input type="button" style="padding:10px;margin-left:-48px;" value="<<" id="company_codes_remove" value="Add Companies"/></li>
													</ul>
												</td>
												<td >
												<select id="selected_option01" multiple="multiple" style="width:200px;height:150px;"></select>
												</td>												
											</tr>
											<tr>											
											<td colspan="2">
											<input type="button" class="btn btn-primary" id="moving_avg_result_btn" value="Show Result"/>
											</td>
											</tr>
										</table>

								<br/>
								<div id="moving_avg_band_result_table"></div>

										
						</div>
								
									
						<br/>	
											
					</td>
				</tr>
				</table>
			</div>
	   </div>
	</div>
				
	<input type="hidden" id="temp_comps" value=""/>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function()
	{
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
		$('#company_codes_add').click(function()
		{
		    $("#temp_comps").val('');
		    var vals = [];	
            var vs   = [];
			$('#company_codes option:selected').each( function() {
				$('#selected_option01').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
				$(this).remove();
			});
			return false;
		});
		
		$('#company_codes_remove').click(function()
		{
			$('#selected_option01 option:selected').each( function() {
				$('#company_codes').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
			
				$(this).remove();
			});
			return false;
		});
		
		
		
		$("#moving_avg_result_btn").click(function()
		{
		    var vals = [];
			var mns  = [];    
			$("#selected_option01 option").each(function(){
			    vals.push($(this).val());
				mns.push($(this).text());
			});
			var moving_avg_type  = $("#moving_avg_type").val();
			var dataStr = "companies="+vals+"&names="+mns+"&moving_avg_type="+moving_avg_type;
			
			$.ajax({
				type:"post" ,
				url:"<?php echo site_url();?>/moving_avg_band_ui/moving_avg_btn_event" ,
				data:dataStr ,
				cache:false,
				async:true ,
				success:function(st)
				{
				  //alert(st);				  
				  $("#moving_avg_band_result_table").empty();
				  $("#moving_avg_band_result_table").html(st);
				}			
			});			
			return false;
		});	
	});
	</script>
	
</body>
</html>