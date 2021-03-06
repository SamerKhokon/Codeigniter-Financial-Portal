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
						<div id="intraday_candlestick"></div>
					</td>
				</tr> 
			</table>
				
				
		
	<script type="text/javascript">
	$(document).ready(function()
	{		 //intraday_candlestick_json
		
					
		 var data = [];
	    $.getJSON("<?php echo site_url();?>/intraday_graph_candlestick_ui/intraday_candlestick_json" , function(st)
		{		    
		    $.each(st , function(k,v){
			     data.push(v);
			});
			
			// create the chart
			$('#intraday_candlestick').highcharts('StockChart', {
				title: {
					text: ''
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
				credits:{enabled:false} ,
                exporting:{enabled:false},				
				series : [{
					name : 'Stock',
					type: 'candlestick',
					data : data,
					tooltip: {
						valueDecimals: 2
					}
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

		</div><!---the bottom tens   intraday_graph_candlestick_ui_view.php---->

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