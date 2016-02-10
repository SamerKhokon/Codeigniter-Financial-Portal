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

			
			

				

			

	<table width="100%">
				<tr>
				  <td colspan="2">
					Select Company:  
					<select id="company_id" style="border:1px solid #999966;width:120px;">
					    <option value="">Select Company</option>
						<?php 
						foreach($sectors as $sector){
						?>
						<option value="<?php echo $sector->id;?>"><?php echo $sector->CODE;?></option>
						<?php } ?>
					</select>
				  </td>				  
				</tr>
				<!--
				<tr>
				<td><input type="button" id="company_id_btn" class="btn btn-primary" value="Show Result"/></td>
				</tr>-->
				<tr>
					<td >
						<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
						<div id="container_01"></div>
					</td>
					
					<td >
						<div id="container_001"></div>
					</td>
				</tr>
				<tr>
				    <td><div id="container_02"></div></td>
				
				
				    <td><div id="container_03"></div></td>
				</tr>
				<tr>
				    <td><div id="container_04"></div></td>
				
				    <td><div id="container_05"></div></td>
				</tr>
				<tr>
				    <td><div id="container_06"></div></td>
				
				    <td><div id="container_07"></div></td>
				</tr>
				<tr>
				    <td colspan="2"><div id="container_08"></div></td>				
				</tr>				
				</table>
			</div>
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    //alert(2);
			//e.preventDefault();
			
			
			$("#company_id").bind("change" , eps_graph_generate);
			
			function eps_graph_generate()
			{
			    var  company_id = $("#company_id").val();
			    $.ajax({
				   type:"post" ,
				   url:"<?php echo site_url();?>/eps_npat_json/share_distribution_json" ,
				   data:"company_id="+company_id ,
				   dataType:'json',
				   async:true ,
				   cache:false ,
				   success:function(st)
				   {				      
					  share_distribution_graph(st);
				   }
				});
				
				
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/scope_to_pay_divident_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {				      
					  scope_share_distribution_graph(st);
				    }
				});
				
				
				
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/eps_first_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
					async:true ,
				    success:function(st)
				    {				
                      //alert(st);					
					  eps_per_quarter_graph(st);
				    }
				});
			
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/net_profit_first_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {				      
					  net_profit_per_quarter_graph(st);
				    }
				});	
				
					
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/eps_all_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {				      
					  eps_all_quarter_graph(st);
				    }
				});	

			
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/net_profit_all_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {			
                       					
					  net_profit_all_quarter_graph(st);
				    }
				});					
				
					
				


				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/yealy_eps_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {				      
					  yearly_eps_graph(st);
				    }
				});	
/*

$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/yearly_nav_shares_json",
					data:"company_id="+company_id ,
					dataType:'json',
					async:true ,
				    cache:false ,
				    success:function(st)
				    {				      
					  yearly_nav_graph(st);
				    }
				});					
				*/
				
				
				//return false;
			}
			
			
			function yearly_eps_graph(st)
			{
				var yrs_eps = st[0].data; 
				var yrs_eps_val = st[1].data;
					
				var chart_06 = new Highcharts.Chart({
					chart: {
						renderTo:'container_06',
							width:400 ,
							height:250
						//zoomType: 'xy'
					}
					,
					title: {
						text: 'Yearly EPS'
					}
					,
					xAxis: [{
						categories: yrs_eps/*['2001', '2002']*/ ,
						labels:{	rotation:-90}
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							format: '{value}',
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: 'EPS',
							style: {
								color: '#89A54E'
							}
						}
					}			
					, 		
					{ // Secondary yAxis
						title: {
							text: '',
							style: {  color: '#4572A7'   }
						},
						labels: {
							format: '{value}',
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}
					
					],
					tooltip: {
						shared: true
					},
				   
					series: [{
						name: 'Yearly',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data: yrs_eps_val /*[49.9, 71.5]*/,
						tooltip: {
							valueSuffix: ' '
						}
			
					}] ,
					credits:{enabled:false} ,
					exporting:{enabled:false} 
				});	
			}
			
			
			
			function yearly_nav_graph(st)
			{
			    var	navs_years  = st[0].data;
				var yearly_navs = st[1].data; 	   
				//alert(yearly_navs);
				   
				var chart_07 = new Highcharts.Chart({
					chart: {
						renderTo:'container_07',
							width:400 ,
							height:250                //zoomType: 'xy'
					}
					,
					title: {
						text: 'Yearly NAV'
					}
					,
					xAxis: [{
						categories: navs_years/*['2000', '2001']*/ ,
						labels:{	rotation:0}
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							format: '{value}',
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: 'EPS',
							style: {
								color: '#89A54E'
							}
						}
					}			
					, 		
					{ // Secondary yAxis
						title: {
							text: '',
							style: {  color: '#4572A7'   }
						},
						labels: {
							format: '{value}',
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}
					
					],
					tooltip: {
						shared: true
					},           
					series: [{
						name: 'Yearly',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data:  yearly_navs //[49.9, 71.5]                   
					}] ,
					credits:{enabled:false} ,
					exporting:{enabled:false} 
				});		
			}
			
			
			function net_profit_all_quarter_graph(st)
			{
				var total_net_profit = [];
				
				var yrs = st[0].data;
				$.each(st , function(k,v){
					if(k>0)
					{
					   total_net_profit.push(v);
					}
				});
				
				var chart_05 = new Highcharts.Chart({
					chart: {
						renderTo:'container_05',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'Total Net Profit Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: yrs,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'Net Profit',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series: total_net_profit
					/*[{
						name:"Q1",				
						data: [7,12,16,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,32,64]
					},{			
						name:"Q3", 				
						data: [7,12,16,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});											
					    
			}
			
			
			function eps_all_quarter_graph(st)
			{
				var total_eps = [];
				var total_eps_years = st[0].data;
					
					$.each(st , function(k,v){
					   if(k>0) {
						 total_eps.push(v);
					   }
					});
					
					var chart_04 = new Highcharts.Chart({
						chart: {
							renderTo:'container_04',
							type:'column',
							width:400 ,
							height:250
						},
						title:{
							text:'Total EPS Per Quarter'
						},
						credits:{enabled:false},
						legend:{  enabled:true },
						plotOptions: {
							series: {
								shadow:false,
								borderWidth:0,
							}
						},
						xAxis:{	
							categories: total_eps_years, //['2000','2001','2002','2004','2005'],  				
							//labels:{rotation:-90},
							title:{
								text:'',						
							}
						},
						yAxis:[{
							title:{
								text:'EPS',
								rotation:-90,
								margin:10,
							}
						},
						{title:{
							text:""
							},					
							min:0,
							opposite:true
						}],    
						series: total_eps
						
						/*[{
							name:"Q1",				
							data: [7,12,16,32,64]
						},{	
							name:"Q2",  				
							data: [7,5,16,32,64]
						},{			
							name:"Q3", 				
							data: [7,12,16,32,64]
						},{			
							name:"Q4",				
							data: [7,10,14,25,50]
						}]*/,
						exporting:{   enabled:false	},
						credits:{   enabled:false	}
					});									
			}		
			
			
			function net_profit_per_quarter_graph(st)
			{
		   		var eps_first_quarter = [];
				var s = st[0].data;
				//alert(s);
				$.each(st , function(k,v){
				  if(k>0) {
					eps_first_quarter.push(v);
				  }
				});	
				//alert(q1);			
				var chart_02 = new Highcharts.Chart({
					chart: {
						renderTo:'container_03',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'Net Profit Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: s ,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'Net Profit',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series:eps_first_quarter
						
						/*[{
						name:"Q1",				
						data: [7,12,16,6,8,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,5,32,7,64]
					},{			
						name:"Q3", 				
						data: [-7,12,16,4,7,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});	

			}			
			
			
			
			function eps_per_quarter_graph(st)
			{
		   		var eps_first_quarter = [];
				var s = st[0].data;
				//alert(s);
				$.each(st , function(k,v){
				  if(k>0) {
					eps_first_quarter.push(v);
				  }
				});	
				//alert(q1);			
				var chart_02 = new Highcharts.Chart({
					chart: {
						renderTo:'container_02',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'EPS Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: s ,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'EPS',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series:eps_first_quarter
						
						/*[{
						name:"Q1",				
						data: [7,12,16,6,8,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,5,32,7,64]
					},{			
						name:"Q3", 				
						data: [-7,12,16,4,7,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});	

			}
			
			
			
			
			function scope_share_distribution_graph(st)
			{			
				var t = [];	
				$.each(st , function(k,v) 
				{
				   t.push(v);
				});	
				//alert(t);				
				var chart_01 = new Highcharts.Chart({
					chart: {
						renderTo: 'container_001',					
						width:400,
						height:250,
						type: 'pie'					
					},
					title:{
						text: 'Scope to pay Dividend'
					},
					//xAxis:{ categories:['Public','Govt','Foreign','Institute']},
					//yAxis:{ max:10},
					tooltip: {									
						formatter: function() {
							return   this.point.name	 ;
						}
					},
					
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						showInLegend: true,
						dataLabels: {
							enabled: true,
							//color: '#000000',
							connectorColor: '#000000',
							formatter: function() {
								return '<b>'+ this.point.name;
							}
						}
					}
				},
					
					credits:{enabled:false},
					exporting:{enabled:false},
					series:	t
				});
			}			
			
			
			function share_distribution_graph(st)
			{			
				var t = [];	
				$.each(st , function(k,v) 
				{
				   t.push(v);
				});									
				var chart_01 = new Highcharts.Chart({
					chart: {
						renderTo: 'container_01',					
						width:400,
						height:250,
						type: 'pie'					
					},
					title:{
						text: 'Distribution Chart'
					},
					//xAxis:{ categories:['Public','Govt','Foreign','Institute']},
					//yAxis:{ max:10},
					
					tooltip: {									
						formatter: function() {
							return   this.point.name	 ;
						}
					},
					plotOptions: {
						series: {
							allowPointSelect: true,
							showInLegend: true,
							marker: {
								states: {
									select: {
										radius: 0,
										fillColor: '#666'
									}
								}
							}
						}
					},
					credits:{enabled:false},
					exporting:{enabled:false},
					series: t
				});
			}
		});
		</script>	
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