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
						<script src="<?php echo base_url();?>js/charts/highstock.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
						<div id="intraday_area"></div>
					</td>
				</tr> 
			</table>
				
				
		
	<script type="text/javascript">
	$(document).ready(function()
	{		 
		var data = [];
		
	    $.getJSON("<?php echo site_url();?>/intraday_graph_ui/intraday_area_graph_json" , function(st)
		{
		    $.each(st , function(k,v){
				data.push(v);
			});
	 	    var ohlc = [];
			var dataLength = data.length;
			for (i = 0; i < dataLength; i++) 
			{		    
				ohlc.push([data[i][0],data[i][1],data[i][2],data[i][3],data[i][4]]);						
			} 
			 
			 
			$('#intraday_area').highcharts('StockChart', {
				title: {
					text: ''
				},			
				xAxis: {
					gapGridLineWidth: 0
				},			
				rangeSelector : {
					buttons : [{
						type : 'hour',
						count : 1,
						text : '1h'
					}, {
						type : 'day',
						count : 1,
						text : '1D'
					}, {
						type : 'all',
						count : 1,
						text : 'All'
					}],
					selected : 1,
					inputEnabled : false
				},
				
				/*********************************************
				** critical is over
				** tooltip data
				*************************************************/
				
				tooltip: {
				    useHTML:true ,
				    formatter:function(){
					   
					    var s ='';
					    $.each(this.points, function(i, series) {
						   for(i = 0; i < dataLength; i++)
						   {
						     if(ohlc[i][0] == series.point.x) //ohlc holds my main data
                             {
							   var month = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
							   var cr_date = new Date(ohlc[i][0]);
							   var dd = cr_date.getDate() +','+month[cr_date.getMonth()]+','+cr_date.getFullYear();
							  
							   
							   s += 'Stock<br/>'+dd+'<br/>Value(BDT mn): <span style="font-weight:bold">' +ohlc[i][1];
							  // +'Volume: <span style="font-weight:bold">'+ ohlc[i][5] +'</span>';
   						       break;
							 }
						   }
						    
						});
						return s;
					},
					valueDecimals: 2
				},
				credits:{enabled:false} ,
                exporting:{enabled:false},					
				series : [
						{
					name : 'Stock',
					type: 'area',
					data : ohlc,
					gapSize: 5,
					fillColor : {
						linearGradient : {
							x1: 0, 
							y1: 0, 
							x2: 0, 
							y2: 1
						},
						stops : [[0, Highcharts.getOptions().colors[0]], [1, 'rgba(0,0,0,0)']]
					},
					threshold: null
				}]			
				
			});
		});			
				
		
		
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