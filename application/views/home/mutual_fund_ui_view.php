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
					
					
		<table>					
			<tr>
				<td>					
					<ul class="nav nav-tabs" >
						<li class="active"><a href="#mututal_fund_data_tab" style="padding:11px;" data-toggle="tab">Mutual Fund Data</a></li>
						<li><a href="#fund_performance_tab" style="padding:11px;"	  data-toggle="tab">Fund Performance</a></li>
						<li><a href="#nav_graph_tab" 	style="padding:11px;"		  data-toggle="tab">NAV Graph</a></li>					
					</ul>

	
	
					<div class="tab-content">
						
						<div class="tab-pane active" id="mututal_fund_data_tab">
							<br/>
							<h4></h4>
						   
							<table width="80%" class="display table-bordered table-striped table dataTable">
								<tr>
									<th>Name</th>
									<th>Mutual Fund Manager</th>
									<th>Current Price</th>
									<th>NAV at Market Value</th>
									<th>Cost Price</th>
									<th>Price to NAV Ratio</th>
									<th>NAV at Market Value/Cost Price</th>
									<th>Weekly Portfolio Return(In terms of NAV)<br/>
									<span style="font-size:18px;">(in%)</span></th>
									<th>Weekly Change in Price<br/>
									<span style="font-size:18px;">(in%)</span></th>
									<th>Listing Year</th>
								</tr>

                                <?php 
								$per_datas = $this->load->get_var("per_datas");
								foreach($per_datas as $per_data)
								{
								?>
								<tr>
									<td><?php echo $per_data->code;?></td>
									<td><?php echo '';?></td>
									<td><?php echo $per_data->ltp;?></td>
									<td><?php echo number_format($per_data->nav_mpb,2,'.','');?></td>
									<td><?php echo number_format($per_data->nav_cpb,2,'.','');?></td>
									<td><?php echo number_format($per_data->price_to_nav,2,'.','');?></td>
									<td><?php echo number_format($per_data->nav_market_value,2,'.','');?></td>
									<td><?php echo number_format($per_data->weekly_portfolio,2,'.','');?></td>
									<td><?php echo number_format($per_data->weekly_change,2,'.','');?></td>
									<td><?php echo $per_data->listing_year;?></td>
								</tr>
								<?php } ?>
							</table>
							

							
						</div>
							
						
						<div class="tab-pane" id="fund_performance_tab">
							<br/>
							<h4></h4>
						    
							<table width="80%" class="display table-bordered table-striped table dataTable">
							<tr>
							   <th>Name</th>
							   <th>YTD <br/>(in %)</th>
							   <th>Three Years <br/>(in %)</th>
							   <th>Two Years <br/>(in %)</th>
							   <th>One Year <br/>(in %)</th>
							   <th>Six Month <br/>(in %)</th>
							   <th>Three Month <br/>(in %)</th>
							   <th>One Month <br/>(in %)</th>
							   <th>One Week <br/>(in %)</th>
							</tr>
							<?php $perdatas = $this->load->get_var('performs');
                             foreach($perdatas as $p){
							?>
							<tr>
							   <td><?php echo $p->code;?></td>
							   <td><?php echo number_format($p->ytp,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb3y,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb2y,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb1y,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb6m,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb3m,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb1m,2,'.','');?></td>
							   <td><?php echo number_format($p->mpb7m,2,'.','');?></td>
							</tr>
							<?php } ?>
							</table>
						  
						</div>					
							
							
						<div class="tab-pane" id="nav_graph_tab">
							<br/>
							<h4></h4>
                           	<table>
								<tr>
									<td>Company:</td>
									<td>
									<select id="company_id">
										<option value="">select company</option>
										<?php $companies = $this->load->get_var('companies'); 
											foreach($companies as $company){
										?>
											<option value="<?php echo $company->id;?>">
												<?php echo $company->code;?>
											</option>
										<?php } ?>
									</select>
									</td>
								</tr>
								<tr>
								  <td>&nbsp;</td>
								  <td><input type="button" class="btn btn-primary" id="btn_nav" value="Show Graph"/></td>
								</tr>
							</table>
							
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/highcharts-more.js"></script>									  				  					
					        <br/>
							<div id="nav_graph_div"></div>	
											
						</div>												
					</div>	
	
	
	
						
				</td>
			</tr> 
		</table>
				
				
		
	<script type="text/javascript">
	$(document).ready(function()
	{		
		$("#btn_nav").click(function(){
		
		    var company_id = $("#company_id").val();
			
			$.ajax({
			   type:"post" ,
			   url:"<?php echo site_url();?>/mutual_fund_ui/mutual_fund_nav_graph_json" ,
			   data:"company_id="+company_id ,
			   cache:false ,
			   async:true ,
			   dataType:"json" ,			   
			   success:function(st){
			      //alert(st);
					nav_graph_generate(st);
			   }
			});
		});
	
	
		function nav_graph_generate(st)
		{				
			var cat = st[0].cates;
			var data = [];
			$.each(st , function(k,v){
			   if(k>=1){
				data.push(v);
			   }
			});
			
			var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'nav_graph_div',
					defaultSeriesType: 'line',
					width:800,
					borderWidth:1,
					borderColor:'#ccc',
					marginLeft:110,
					marginRight:50,
					backgroundColor:'#eee',
					plotBackgroundColor:'#fff',
				},				
				title:{	text:''	},
				credits:{enabled:false},
				exporting:{enabled:false},				
				legend:{enabled:false} ,
				tooltip:{
					formatter:function()
					{
					    var str = '';
					    if(this.series.name=="Series 1") {
						  str = '<b>MPB:</b> ' + this.y +'<br/><b></b> ' + this.point.note+'</b></b></b><p></p>';
						}else if(this.series.name=="Series 2"){
						   str = '<b>CPB:</b> ' + this.y +'<br/><b></b> ' + this.point.note+'</b></b></b><p></p>';
						}else if(this.series.name=="Series 3"){
						    str = '<b>LTP:</b> ' + this.y +'<br/><b></b> ' + this.point.note+'</b></b></b><p></p>';
						}
						
						return str;
					}
				},
				plotOptions: {
					series: {
						shadow:false,
						cursor: 'pointer',
						point: {
							events: {
								click: function() {
									//location.href = this.options.url;
									window.open(this.options.url);
								}
							}
						}
					},
				},
				xAxis:{
					lineColor:'#999',
					lineWidth:1,
					tickColor:'#666',
					tickLength:3,
					title:{	text:''	},
					categories: cat ,
					labels:{ rotation:-90 }	
				},
				yAxis:{
					lineColor:'#999',
					lineWidth:1,
					tickColor:'#666',
					tickWidth:1,
					tickLength:3,
					gridLineColor:'#ddd',
					title:{
						text:'',
						rotation:0,
						margin:50,
					}
				},
				series: data 
				
			});		
		}
			

	
		$('#accordion .panel-collapse').on('shown.bs.collapse', function () {
		   $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
		});
		$('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
		   $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
		});
	});
	</script>	

		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>