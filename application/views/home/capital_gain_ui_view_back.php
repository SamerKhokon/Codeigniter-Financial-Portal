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
			  <?php $this->load->view("home/company_fundamental_quantitative_left_menu");?>
			</div>			
			
			<div class="col-md-9">	
			    <table width="100%">
				<tr><td>
                <?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
				</td></tr>
				<tr>
					<td>
					
				

								<div class="panel panel-default">
									<div class="panel-heading">Companies for capital gain</div>
										<div class="panel-body">
										
										
										<?php $companies = $this->load->get_var('companies'); ?>
										
										<table width="100%">
											<tr>
											<td><input type="text" id="option_01_start_date" style="width:200px;"/></td>
											<td>&nbsp;</td>
											<td><input type="text"  id="option_01_end_date" style="width:200px;"/></td>											
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
												<td><input type="button" value=">>" id="company_codes_add" value="Add Companies"/><br/>
												<input type="button" value="<<" id="company_codes_remove" value="Add Companies"/>
												</td>
												<td><select id="selected_option01" multiple="multiple" style="width:200px;height:150px;"></select></td>												
											</tr>
											<tr>											
											<td colspan="2">
											<input type="button" class="btn btn-primary" id="capital_gain_option_01_show_result_btn" value="Show Result"/>
											</td>
											</tr>
											
											
										</table>

										</div>
									</div>
										
										
										
								<div class="panel panel-default">
										<div class="panel-heading">Sector capital gain</div>
										<div class="panel-body">	
										
										<table width="100%">
										
											<tr>
											<td>From</td>
											<td><input type="text" id="option_02_start_date" style="width:200px;"/></td>
											<td>To</td>
											<td><input type="text"  id="option_02_end_date" style="width:200px;"/></td>											
											</tr>
										
											<tr>
											  <td>Select Sector:</td>
											  <td >
												  
												<select id="sector_id" style="width:200px;">
												<?php 
													foreach($sectors  as   $sector) 
													{         
												?>
														<option value="<?php echo $sector->sector_id; ?>">
															<?php echo $sector->name; ?>
														</option>
												<?php 
													} 
												?>
												</select>
											  </td>				  
											</tr>
											<tr>
											  <td><input type="button" id="option_two_result_btn" class="btn btn-primary" value="Show Result" /></td>
											</tr>
											
										</table>
										
								
									</div>
								</div> 
							
						
						    <div class="panel panel-default">
								<div class="panel-heading">DSEX</div>
								<div class="panel-body">	
										
										<table width="100%">										
											<tr>
											<td><input type="text" id="option_03_start_date" style="width:200px;"/></td>
											<td><input type="text"  id="option_03_end_date" style="width:200px;"/></td>											
											</tr>
											<tr>
											<td><input type="button" class="btn btn-primary" id="option_three_result_btn" value="Show Result"/></td>
											</tr>											
										</table>
								</div>			
							</div>
						<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
												
						<div id="capital_gain_common_graph_result"></div>
						<br/>
						<div id="capital_gain_common_search_result"></div>
						

						
					</td>
				</tr>
				</table>
			</div>
	   </div>
	</div>
				
	<input type="hidden" id="temp_comps" value=""/>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
		//add button
		$("#company_codes_add").click(function(){
		    $("#temp_comps").val('');
		    var vals = [];	
            var vs = [];			
		    $("#company_codes option:selected").each(function(){
			    vals.push($(this).text());
				if($.inArray($(this).text(),vals) != -1){
				  $("#selected_option01").append('<option value="'+$(this).val()+'">'+$(this).text()+'</option>');
				  vs.push($(this).val());
				}
				$("#temp_comps").val(vs);
			});					
		});		
		
		$("#company_codes_remove").click(function(){		    
			$("#selected_option01 option:selected").each(function(){
			    $(this).remove();  
			});			
		});
		
		
		
		function generate_capital_graph(st)
		{
		    //alert(st);
			$.getJSON("<?php echo site_url();?>/capital_gain_ui/capital_gain_first_search_json"  , function(st)
			{
			    var category = st[0].categories;
				var d = [];				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#capital_gain_common_graph_result').highcharts({
				chart: {					
					type: 'column',
					title:''
				},
				xAxis: {
					categories: category,//['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					labels:{rotation:-90},
					title:'y'
				},
				credits:{enabled:false},
				exporting:{enabled:false},
				legend:false,
				plotOptions: {
					series: {
						threshold: 0
					}
				},				
				series: d 				
				});
			});	
			
		}
		
		
		$("#capital_gain_option_01_show_result_btn").click(function(){
		    var option_01_start_date = $("#option_01_start_date").val();
			var option_01_end_date   = $("#option_01_end_date").val();
		    var vals = [];//$("#temp_comps").val();
			    
			$("#company_codes option:selected").each(function(){
			    vals.push($(this).val());
			});
			var dataStr = "start="+option_01_start_date+"&end="+option_01_end_date+"&companies="+vals;
			
			$.ajax({
			   type:"post" ,
			   url:"<?php  echo site_url();?>/capital_gain_ui/capital_gain_first_search_result",
			   data:dataStr , 
			   cache:false ,
			   async:true ,
			   success:function(st)
			   {
			      $("#capital_gain_common_search_result").html(st);
			   }
			});
			
			
			$.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/capital_gain_ui/capital_gain_first_search_json",
				data:dataStr , 
			    cache:false ,
			    async:true ,
				dataType:'json',
			    success:function(st)
				{
			      //alert(st[1].data);
				  generate_capital_graph(st);
			    }
			});
			
			//alert(dataStr);
		});
		
		
		
		$("#option_two_result_btn").click(function(){
		  var start = $("#option_02_start_date").val();
		  var end = $("#option_02_end_date").val();
		  var sector_id = $("#sector_id").val();
		  var dataStr = "start="+start+"&end="+end+"&sector_id="+sector_id;
		  $.ajax({
		    type:"post" ,
			url:"<?php echo site_url();?>/capital_gain_ui/capital_gain_second_search_result" ,
			data:dataStr ,
			cache:false ,
			async:true,
			success:function(st){
			   $("#capital_gain_common_search_result").html(st);
			}
		  });		  
		});
		
		
		
		$("#option_three_result_btn").click(function(){
		   var start = $("#option_03_start_date").val();
		   var end = $("#option_03_end_date").val();
		   var dataStr = "start="+start+"&end="+end;
		   $.ajax({
		    type:"post" ,
			url:"<?php echo site_url();?>/capital_gain_ui/capital_gain_third_search_result" ,
			data:dataStr ,
			cache:false ,
			async:true,
			success:function(st){
			   $("#capital_gain_common_search_result").html(st);
			}
		  });
		   
		});
		
		
		$("#option_01_start_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });
		$("#option_01_end_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });				
		
		
		$("#option_02_start_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });
		$("#option_02_end_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });		
		
		
		$("#option_03_start_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });
		$("#option_03_end_date").datepicker({ dateFormat:"dd-mm-yy",changeMonth:true,changeYear:true });				
		
	});
	</script>
	
</body>
</html>