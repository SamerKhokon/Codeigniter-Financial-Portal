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
			<?php   $codes1 = $this->load->get_var('codes1');		?>				
		
			<div class="panel-group" id="accordion" style="width:100%;">
					<div class="panel panel-info">
						<div class="panel-heading" style="background-color:#efefef;" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
							<h4 class="panel-title accordion-toggle">
							  <a href="javascript:void(0);" style="text-decoration:underline;">Companies Divident Detail</a>
							</h4>
						</div>

						<div id="collapseOne" class="panel-collapse collapse">
							<div class="panel-body">   
								<table width="100%">
								<?php 
								$divident_years = $this->load->get_var("divident_years");
								if($divident_years ==0)
								{
									$currentYear = date('Y');
									$prevYear    = (int)$currentYear - 5 ;
								?>
								<tr>				
								<?php for($i=$prevYear;$i<=$currentYear;$i++) {	?>
										<td><input type="checkbox" id="divident_detailsyears" name="divident_details_years" value="<?php echo $i;?>"/></td>
								<?php }	?>
								</tr>
								<?php	
								}
								else
								{		
								?>					
									<tr>
									 <?php foreach( $divident_years as $divident_year ) { ?>
									  <td><input type="checkbox" name="divident_details_years" value="<?php echo $divident_year->year;?>"/>&nbsp;<?php echo $divident_year->year;?></td>
									<?php } ?>
									</tr> 
									
								<?php } ?>	
								</table>	
				
								<table width="60%">											
											<tr>
												<td>Select Company/Companies:</td>
												<td>&nbsp;</td>
												<td>Selected Company/Companies:</td>											
											</tr>
											<tr>
												<td>
											
													<select id="company_codes" multiple="multiple" style="width:200px;height:150px;">
														<?php 
														
														$companies = $this->load->get_var("codes1");
														foreach($companies as $company){ ?>
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
											<input type="button" class="btn btn-primary" id="dividend_details_option01_btn" value="Show Result"/>
											</td>
											</tr>
										</table>		
								
								
								
								
							</div>
						</div>	
					</div>
					
					
					<div class="panel panel-info">
						<div class="panel-heading" style="background-color:#efefef;" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo">
							<h4 class="panel-title accordion-toggle">
								<a href="javascript:void(0);"  style="text-decoration:underline;">Sector Divident Detail</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse">
							<div class="panel-body">
								
								<table width="100%">
								<?php if($divident_years ==0){	?>								
					<tr>
					<?php	for($i=$prevYear;$i<=$currentYear;$i++)	{ ?>
					<td><input type="checkbox" name="option_2" value="<?php echo $i;?>"/>&nbsp;<?php echo $i;?></td>
					<?php 	} ?>
					</tr>
					<tr>
					<?php 
						}else{
					?>
					<tr>
					 <?php 
					 foreach( $divident_years as $dividend_year ) 
					{
					?>
						<td><input type="checkbox" name="option_2" value="<?php echo $dividend_year->year;?>"/>&nbsp;<?php echo $dividend_year->year;?></td>
					<?php } ?>
					</tr>
					<?php }  ?>
									  <td colspan="6">Sector: 
								<?php  $sects = $this->load->get_var('sects');  ?>
										<select id="sector_id"   style="border:1px solid #999966;width:120px;">
										   <option value="">select sector</option>
										   <?php foreach($sects as $sect){?>
										   <option value="<?php echo $sect->sector_id;?>"><?php echo $sect->name;?></option>
										   <?php } ?>
										</select>						  
									  </td>
									 
									</tr>
									<tr>
									 <td><input type="button" class="btn btn-primary" id="option_two_search_result_btn" value="Show Result"/></td>
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
								
								<table width="100%">
									<!--<tr>
									  <td><input type="checkbox" name="all_index" id="all_index" value="all_index"/></td>					
									</tr>-->
									<tr>
									<td><input type="button" id="divident_search_result_option_03_btn" class="btn btn-primary" value="Show Result"/></td>
									</tr>
								</table>							
							</div>
						</div>
					</div>
			</div>
		
		    <br/>
			<ul class="nav nav-tabs">
				<li class="active"><a href="#dividend_detail_graph_table_tab" data-toggle="tab">Dividend Detail Data in Table</a></li>
				<li><a href="#dividend_detail_data_graph_tab" data-toggle="tab">Dividend Detail Data in Graph</a></li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane active" id="dividend_detail_graph_table_tab">
					<h4></h4>
					<div id="dividend_detail_common_search_result"></div>								
				</div>	
				
				<div class="tab-pane" id="dividend_detail_data_graph_tab">
					<h4></h4>
					<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
					<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
		
					<div id="dividend_detail_common_graph_result"></div>
				</div>
			</div>					
								
		
						
				
		<script type="text/javascript">
		$(document).ready(function(){
		/**
		** divident detail
		**/
		
		
		$('#company_codes_add').click(function(){
		    
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
		
		$("#option_01_start_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true, 
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});
		
		
		$("#dividend_details_option01_btn").click(function()
		{		    
			var checkedValues = $('input:checkbox:checked').map(function() {
				return this.value;
			}).get();
			var companies = [];
			var company_names = [];
			$('#selected_option01 option').each( function() {
			   companies.push($(this).val());
			   company_names.push($(this).text());
			});
			var dataStr = "years="+checkedValues+"&companies="+companies;
			var dataStr_4json = "years="+checkedValues+"&companies="+companies+"&company_names="+company_names;
			$.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/divident_details_ui/btn_one_event",
				data:dataStr , 
				async:true , 
				cache:false ,
				success:function(st)
				{
				   //alert(st);				   
				   $("#dividend_detail_common_search_result").empty();
				   $("#dividend_detail_common_search_result").html(st);
				}
			});
			//alert(dataStr);
			make_request_for_graph(dataStr_4json);			
            return false;			
		});
		
		
		function make_request_for_graph(dataStr_4json)
		{
		    //alert(dataStr_4json);
			$.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/divident_details_json/first_btn_json" ,
				data:dataStr_4json ,
				async:true ,
				cache:false,
				dataType:'json' ,
				success:function(st)
				{
				   //alert(st);
				   generate_graph(st)
				}
			});
		}


		
		
		
		function generate_graph(st)
		{
		    var cate = st[0].category;
			//alert(cate);
				var vl = [];
				$.each(st , function(k,v){
				  //if(k>=1) {
				   vl.push(v);
				   //}
				});
			
			
				$('#dividend_detail_common_graph_result').highcharts({
					chart: {
						type: 'column' ,
						width:400 ,
						height:400
					},
					title: {
						text: ''
					},
					xAxis: {
					    
						categories: cate//['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas', 'Pears', 'Grapes', 'Bananas']
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Dividend Details'
						},
						stackLabels: {
							enabled: false,
							style: {
								fontWeight: 'bold',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
							}
						}
					},
					legend: {
					    enabled:false
						/*align: 'right',
						x: -70,
						verticalAlign: 'right',
						y: 25,
						floating: true,
						backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
						borderColor: '#CCC',
						borderWidth: 1,
						shadow: false*/
					},
					tooltip: {
						formatter: function() {
							return 'Total: '+ this.point.stackTotal;
							/*
							'<b>'+ this.x +'</b><br/>'+
								this.series.name +': '+ this.y +'<br/>'+
								'Total: '+ this.point.stackTotal
							*/
						}
					},
					exporting:false,
					credits:false,					
					plotOptions: {
						column: {
							stacking: 'normal',
							dataLabels: {
								enabled: false,
								color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
							}
						}
					},
					series: vl
					
					
					/*[{
						name: 'John',
						data: [15, 13, 4, 7, 12]
					}, {
						name: 'Jane',
						data: [12, 22, 3, 2, 11]
					}, {
						name: 'Joe',
						data: [18, 44, 9, 2, 15]
					},{
						name: 'sgsdf',
						data: [12, 64, 9, 2, 8]
					},{
						name: 'ftryry',
						data: [16, 74, 89, 12, 5]
					},{
						name: 'ytrueue',
						data: [16, 74, 89, 12, 5]
					}]*/
				});		
		
		}
		
		
		
		
		
		

		
		
		$("#option_two_search_result_btn").click(function(){
		    
			$("input[name='divident_details_years']").each(function(){
			    $(this).attr('checked',false);
			});
		
		
		    var checkedValues = $('input:checkbox:checked').map(function() {
				return this.value;
			}).get();
			var sector_id = $("#sector_id").val();
			var dataStr = "years="+checkedValues+"&sector_id="+sector_id;
			
			$.ajax({
			   type:"post" ,
			   url:"<?php echo site_url();?>/divident_details_ui/btn_two_event" ,
			   data:dataStr ,
			   async:true,
			   cache:false,
			   success:function(st)
			   { 
			      //alert(st);
				   $("#dividend_detail_common_search_result").empty();
				   $("#dividend_detail_common_search_result").html(st);
			   }
			});			
			
			make_request_for_sector_graph(dataStr);			
		    return false;
		});
		
		
		function make_request_for_sector_graph(dataStr)
		{
		    $.ajax({
		      type:"post" ,
			  url: "<?php echo site_url();?>/divident_details_json/second_btn_json" ,
			  data:dataStr ,
			  async:true ,
			  cache:false ,
			  dataType:'json' ,
			  success:function(st)
			  {
			    // alert(st);
				 generate_sector_graph(st);
			  }			  
		    });		
		}
		
		
		function generate_sector_graph(st)
		{
		    var cat = st[0].cat;
			//alert(cate);
			var vl = [];
			$.each(st , function(k,v){
			   //if(k>=1) {
				vl.push(v);
			   //}
			});
			
			
				$('#dividend_detail_common_graph_result').highcharts({
					chart: {
						type: 'column' ,
						width:700 ,
						height:400
					},
					title: {
						text: ''
					},
					xAxis: {
						categories:  cat 
						//['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas', 'Pears', 'Grapes', 'Bananas']
					},
					yAxis: {
						min: 0,
						title: {
							text: 'Dividend Details'
						},
						stackLabels: {
							enabled: false,
							style: {
								fontWeight: 'bold',
								color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
							}
						}
					},
					legend: {
					    enabled:false 
						/*
						align: 'right',
						x: -70,
						verticalAlign: 'right',
						y: 25,
						floating: true,
						backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
						borderColor: '#CCC',
						borderWidth: 1,
						shadow: false*/
					},
					tooltip: {
						formatter: function() {
							return '<b>'+ this.x +'</b><br/>'+
								this.series.name +': '+ this.y +'<br/>'+
								'Total: '+ this.point.stackTotal;
						}
					},
					exporting:false,
					credits:false,					
					plotOptions: {
						column: {
							stacking: 'normal',
							dataLabels: {
								enabled: false,
								color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
							}
						}
					},
					series: vl 
					
					/*[{
						name: 'John',
						data: [15, 13, 4, 7, 12]
					}, {
						name: 'Jane',
						data: [12, 22, 3, 2, 11]
					}, {
						name: 'Joe',
						data: [18, 44, 9, 2, 15]
					},{
						name: 'sgsdf',
						data: [12, 64, 9, 2, 8]
					},{
						name: 'ftryry',
						data: [16, 74, 89, 12, 5]
					},{
						name: 'ytrueue',
						data: [16, 74, 89, 12, 5]
					}]*/
				});		
		
		}
		
		
		
		
		/*
		    $("#option_two_search_result_btn").bind("click",option_two_search_result_btn);
			
			function option_two_search_result_btn()
			{
			    var years = [];
				$("input[name='option_2']").each(function(){
					if($(this).is(':checked')==true){
						years.push($(this).val());
					}	
				}); 
				var sector_id= $("#sector_id").val();
				
				if(sector_id=="") {
				   alert("select sector");
				   return false;
				}else if(years.length==0){
				   alert("Select Year");
				   return false;
				}else{
					$.ajax({
						type:"post",
						url:"<?php echo site_url();?>/home/option_two_search_json",
						data:"years="+years+"&sector_id="+sector_id,
						dataType:'json' ,
						cache:false ,
						success:function(st){
						   
							var yrr = st[0].cats;
							var cm = st[st.length-1].coms;
							alert(cm);
							var t = [];
							$.each(st, function(k,v){
							    if(k>0 && k<st.length) {
								   t.push(v);
								}
							});
							
							
							var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_002'
								},
								title:'',								
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 [
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]
							});
											
							
						}
					});
				}
				
				$("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_two_search_result",
				{'years':years,'sector_id':sector_id},
				function(){});
				
				//alert(years+'  '+sector_id);
			}
		
		    $("#divident_search_result_option_03_btn").bind("click" , divident_search_result_option_03_btn);
		    function divident_search_result_option_03_btn()
		    {	        
			
			    $.ajax({ 
						type:"post",
						url:"<?php echo site_url();?>/home/all_companies_index_json" ,
						data:"1=1",
						cache:false,
						dataType:'json',
						success:function(st){
						    
							var cm = st[st.length-1].coms;
							var t = [];
							$.each(st , function(k,v){
							   if(k<st.length){
							     t.push(v);
							   }
							});
							
							
							var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_003'
								},
								title:'',								
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 [
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]
							});
							
							
							
						}
					});
			  
				$("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_three_search_result",
						function(){});
			}
		
		
		   $("#divident_detail_show_result_option_01").bind("click", divident_detail_show_result_option_01);
		    function divident_detail_show_result_option_01()
		    {
		        $("#divident_search_result_option_001").html("");
				 var company_code_01 = $("#company_code_01").val();
				 var company_code_02 = $("#company_code_02").val();
				 var company_code_03 = $("#company_code_03").val();
				 var company_code_04 = $("#company_code_04").val();
				 var company_code_05 = $("#company_code_05").val();
				 var company_code_06 = $("#company_code_06").val();
				 var company_code_07 = $("#company_code_07").val();
				 var company_code_08 = $("#company_code_08").val();
				 var company_code_09 = $("#company_code_09").val();
				 var company_code_10 = $("#company_code_10").val();
				 var company_code_11 = $("#company_code_11").val();
				 var company_code_12 = $("#company_code_12").val();
				 var company_code_13 = $("#company_code_13").val();
				 var company_code_14 = $("#company_code_14").val();
				 var company_code_15 = $("#company_code_15").val();
				 var company_code_16 = $("#company_code_16").val();
				 var company_code_17 = $("#company_code_17").val();
				 var company_code_18 = $("#company_code_18").val();
				 var company_code_19 = $("#company_code_19").val();
				 var company_code_20 = $("#company_code_20").val();			 	 
			  
			 
				var years = [];
				$("input[name='divident_details_years']").each(function(){
					if($(this).is(':checked')==true){
						years.push($(this).val());
					}	
				}); 
			 
				if(years.length>0)
				{	
					var dt = [];					
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/home/tt" ,
					   data:"years="+years+"&company_code_01="+company_code_01+
					   "&company_code_02="+company_code_02+
					   "&company_code_03="+company_code_03+
					   "&company_code_04="+company_code_04+
					   "&company_code_05="+company_code_05+
					   "&company_code_06="+company_code_06+
					   "&company_code_07="+company_code_07+
					   "&company_code_08="+company_code_08+
					   "&company_code_09="+company_code_09+
					   "&company_code_10="+company_code_10+
					   "&company_code_11="+company_code_11+
					   "&company_code_12="+company_code_12+
					   "&company_code_13="+company_code_13+
					   "&company_code_14="+company_code_14+
					   "&company_code_15="+company_code_15+
					   "&company_code_16="+company_code_16+
					   "&company_code_17="+company_code_17+
					   "&company_code_18="+company_code_18+
					   "&company_code_19="+company_code_19,
					   dataType:"json" ,
					   success:function(st){
					      var yrr = st[0].cats;
						  var cm = st[1].coms;
						  
					     
						  var t = [];
					      $.each(st,function(k,v){
						    if(k>1){
								t.push(v);
						    }
						  });
						  //alert(t);
						  
						  
						 
						   var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_001'
								},
								title:'',
								tooltip: {
									//pointFormat: "{point.cats}:{point.y}%"
									formatter: function() {
										return  'Company:'+ this.x	+ 
										'<br/>Year:'+ this.series.name +
										'<br/>Dividend:' +this.point.y + '%<br />' ;
									}
								},
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 [
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]
							});
											  
						  
						  //alert(t);
					   }					   
					});				
				}
				else
				{
					$("#divident_search_result_option_001").html("");	
				} 
			 
			 
		     $("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_one_search_result",
			 {"years":years,"company_code_01":company_code_01, "company_code_02":company_code_02,
			 "company_code_03":company_code_03, "company_code_04":company_code_04,
			 "company_code_05":company_code_05, "company_code_06":company_code_06,
			 "company_code_07":company_code_07, "company_code_08":company_code_08,
			 "company_code_09":company_code_09, "company_code_10":company_code_10,
			 "company_code_11":company_code_11, "company_code_12":company_code_12,
			 "company_code_13":company_code_13, "company_code_14":company_code_14,
			 "company_code_15":company_code_15, "company_code_16":company_code_16,
			 "company_code_17":company_code_17, "company_code_18":company_code_18 ,
			 "company_code_19":company_code_19, 
			 "company_code_20":company_code_20} , function(){});
			 
			 
		    }*/
		});
		</script>		
							
			
			
			
			
			
			

		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">
$(document).ready(function() {

    

	$('#example').dataTable( {
		"aaSorting": [[ 1, "ASC" ]],
		"bPaginate": false
	});	

    $('#accordion .panel-collapse').on('shown.bs.collapse', function () {
       $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
    });
    $('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
       $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
    });

				
	$('#dp3').datepicker({
    startDate: "24/09/2013",
    orientation: "bottom auto",
    autoclose: true
    });

	$(".input-group.date").datepicker({ autoclose: true, //todayHighlight: true
    startDate: "24/09/2013",
	orientation: "bottom auto",
	});

	$('#dp4').datepicker({
    autoclose: true
    });
} );
</script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>