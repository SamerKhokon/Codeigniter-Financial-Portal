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
					<table>
					<tr>
						<td>From:</td>
						<td>&nbsp;</td>
						<td>To:</td>											
					</tr>
					<tr>
					<td><input type="text" id="option_01_start_date" style="width:200px;"/></td>
					<td>&nbsp;</td>
					<td><input type="text"  id="option_01_end_date" style="width:200px;"/></td>											
					</tr>
					</table>
				</tr>	
				<tr>
					<td>
					
						<div class="panel-group" id="accordion" style="width:100%;">
							<div class="panel panel-info">
								<div class="panel-heading" style="background-color:#efefef;" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
									<h4 class="panel-title accordion-toggle">
									  <a href="javascript:void(0);" style="text-decoration:underline;">Companies Capital gain</a>
									</h4>
								</div>

								<div id="collapseOne" class="panel-collapse collapse">
									<div class="panel-body">        
									<?php $companies = $this->load->get_var('companies'); ?>										
										<table width="60%">
											
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
											<input type="button" class="btn btn-primary" id="capital_gain_option_01_show_result_btn" value="Show Result"/>
											</td>
											</tr>
										</table>		
									</div>
								</div>
							</div>
						
						
							<div class="panel panel-info">
								<div class="panel-heading" style="background-color:#efefef;" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo">
								  <h4 class="panel-title accordion-toggle">
									  <a href="javascript:void(0);"  style="text-decoration:underline;">Sector capital gain</a>
								  </h4>
								</div>
								<div id="collapseTwo" class="panel-collapse collapse">
									<div class="panel-body">
										<table width="60%">
										<!--
											<tr>
												<td>From:</td>
												<td>To:</td>											
											</tr>										
											<tr>											
											<td><input type="text" id="option_02_start_date" style="width:200px;"/></td>
											<td><input type="text"  id="option_02_end_date" style="width:200px;"/></td>											
											</tr>
											-->
											<tr>
											    
												<td>Select Sector:</td>
												<td></td>											
											</tr>
											<tr>
											  
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
							</div>
						
						
							<div class="panel panel-info">
								<div class="panel-heading" style="background-color:#efefef;" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree">
									<h4 class="panel-title accordion-toggle">
									  <a href="javascript:void(0);"  style="text-decoration:underline;">DSEX</a>
									</h4>
								</div>
								<div id="collapseThree" class="panel-collapse collapse">
									<div class="panel-body">
										<table width="60%">
											<!--
											<tr>
												<td>From:</td>
												<td>To:</td>											
											</tr>
											<tr>
												<td><input type="text" id="option_03_start_date" style="width:200px;"/></td>
												<td><input type="text"  id="option_03_end_date" style="width:200px;"/></td>											
											</tr>
											-->
											<tr>
												<td><input type="button" class="btn btn-primary" id="option_three_result_btn" value="Show Result"/></td>
											</tr>											
										</table>       
									</div>
								</div>
							</div>
						</div>
																
										

										
						<br/>				
										
						<ul class="nav nav-tabs">
							<li class="active"><a href="#capital_gain_graph_table_tab" data-toggle="tab">Capital Gain Data in Table</a></li>
							  <li><a href="#capital_gain_data_graph_tab" data-toggle="tab">Capital Gain Data in Graph</a></li>
						</ul>
						<div class="tab-content">
						    <div class="tab-pane active" id="capital_gain_graph_table_tab">
								<h4></h4>
								<div id="capital_gain_common_search_result"></div>								
							</div>							
						    <div class="tab-pane" id="capital_gain_data_graph_tab">
								<h4></h4>
								<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
								<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
					
							    <div id="capital_gain_common_graph_result"></div>
							</div>
						</div>					
										
										
										
                        
										
						<!--						
						<div id="capital_gain_common_graph_result"></div>
						<br/>
						<div id="capital_gain_common_search_result"></div>
						-->
											
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
		
		$('#company_codes_add').click(function(){
		    $("#temp_comps").val('');
		    var vals = [];	
            var vs   = [];
			$('#company_codes option:selected').each( function() {
				$('#selected_option01').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
				$(this).remove();
			});
		});
		
		$('#company_codes_remove').click(function(){
			$('#selected_option01 option:selected').each( function() {
				$('#company_codes').append("<option value='"+$(this).val()+"'>"+$(this).text()+"</option>");
			
				$(this).remove();
			});
		});
		
		
		
		$("#capital_gain_option_01_show_result_btn").click(function(){
		    var option_01_start_date = $("#option_01_start_date").val();
			var option_01_end_date   = $("#option_01_end_date").val();
		    var vals = [];//$("#temp_comps").val();
			    
			$("#selected_option01 option").each(function(){
			    vals.push($(this).val());
			});
			var dataStr = "start="+option_01_start_date+"&end="+option_01_end_date+"&companies="+vals;
			//alert(dataStr);
			
			$.ajax({
			   type:"post" ,
			   url:"<?php  echo site_url();?>/capital_gain_ui/capital_gain_first_search_result",
			   data:dataStr , 
			   cache:false ,
			   async:true ,
			   success:function(st)
			   {
			      //alert(st);
			      $("#capital_gain_common_search_result").html(st);
			   }
			});
			
			make_first_search_json_request(dataStr);
		});
		
		
		function make_first_search_json_request(dataStr)
		{
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
		}
		
		
		function generate_capital_graph(st)
		{
		    //alert('cap '+st[1].data);	
			var category = st[0].categories;
			var d = [];				
			$.each(st , function(k,v){
				d.push(v);
			});
			
			$('#capital_gain_common_graph_result').highcharts({
				chart: {					
					type: 'column' ,
                    width:700					
				},
				title:{text:'Capital Gain'},
				colors:['#66CD00'],
				xAxis: {
					categories: category,//['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					labels:{rotation:-90 , style:{fontSize:'10px'}},
					title:'y'
				},
				yAxis:{ 					
					title:{
					   text:'Gain/Loss'
					}						
				},
				tooltip:{
				   formatter:function(){
				       return this.x+'<br/>Gain/Loss:'+this.y+'%';
				   }
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
			},function(chart){        
				//var max = 0;            
				$.each(chart.series[1].data,function(i,data)
				{                
					if( parseInt(data.y)  < 0 ){
						//data.graphic.attr({	fill:'red'});
						data.update({	color:'red'	});
					}else{
					   //data.graphic.attr({fill:'green'});
					   data.update({	color:'green'	});
					}
				});
        
			});
			
		}
		
		
		
		$("#option_two_result_btn").click(function(){
			var start = $("#option_01_start_date").val();
			var end = $("#option_01_end_date").val();
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
			make_second_search_json_request(dataStr);			
		});
		
		
		function make_second_search_json_request(dataStr)
		{
		   //alert(dataStr);
		    
		    $.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/capital_gain_ui/capital_gain_second_search_json",
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
		}
		
		
		
		$("#option_three_result_btn").click(function(){
		    var start   = $("#option_01_start_date").val();
		    var end     = $("#option_01_end_date").val();
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
		    //make_third_search_json_request(dataStr);
		});
		
		
		function make_third_search_json_request(dataStr)
		{
		   //alert(dataStr);
		    
		    $.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/capital_gain_ui/capital_gain_third_search_json",
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
		}		
		
		$("#option_01_start_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true, 
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});
		$("#option_01_end_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});				
		
		
		$("#option_02_start_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true		
		});
		
		$("#option_02_end_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true		
		});		
		
		
		$("#option_03_start_date").datepicker({ 
			dateFormat:"dd-mm-yy",changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true		
		});
		
		
		$("#option_03_end_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true		
		});			
	});
	</script>
	
</body>
</html>