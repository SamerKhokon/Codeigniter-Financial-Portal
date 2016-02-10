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
					
					  				
						<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
						<div id="todays_sector_updown_ration_graph"></div>	
								
					</td>
				</tr>
				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>				
				</tr>
				<tr>
					<td>
					
					<div style="width:350px;margin-left:560px;">Sector:
					<select id="market_sector">
					<option value="">select anyone</option>
					<?php $sectors = $this->load->get_var('sectors');
					foreach($sectors as $sector){
					?>
					   <option value="<?php echo $sector->sector_id;?>"><?php echo $sector->name;?></option>
					   <?php  } ?>
					</select>
					</div>
					</td>
				</tr>
				<tr>	
					<td>
					<table align="right" width="100%">			
					<tr>
						<td width="20%">
						<?php
                            $market_brief = $this->load->get_var('market_brief');
						   //print_r($market_brief);
							$market_brief_parse = explode("#" , $market_brief);
							$total_trade = $market_brief_parse[0];
							$open = $market_brief_parse[1];
							$high = $market_brief_parse[2];
							$low = $market_brief_parse[3];
							$ycp = $market_brief_parse[4];							   
						?>	

                            <p>
							    <span style="font-size:24px;"><?php echo $total_trade;?></span><br/>
								<br style="border:1px solid #000;"/>
								Open: <?php echo $open;?> <br/>
								High:<?php echo $high;?><br/>
								Low:<?php echo $low;?><br/>
								Close Price:<?php echo $ycp;?><br/>
							</p>							
						</td>
						<td width="80%">							
							<iframe style="width:700px;height:450px;border:1px solid #fff;" src="<?php echo site_url();?>/stock_market_ui/market_highstock_graph"></iframe>
														
						</td>
					</tr>
					
					</table>
					</td>				
				</tr>				
				<tr>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>				
				</tr>
				
				<tr>
					<td>
					
					
					
					
					
					    <ul class="nav nav-tabs">
							<li class="active"><a href="#stock_data_graph_table_tab" data-toggle="tab">Stock Data in Table</a></li>
							  <li><a href="#stock_data_graph_tab" data-toggle="tab">Stock Data in Graph</a></li>
						</ul>
						<div class="tab-content">
						    <div class="tab-pane active" id="stock_data_graph_table_tab">
								<h4></h4>
								<div id="stock_data_table"></div>
							</div>
							
						    <div class="tab-pane" id="stock_data_graph_tab">
						    <br/>
							<ul class="nav nav-tabs">
							  <li class="active"><a href="#tab_a" data-toggle="tab">Close Price</a></li>
							  <li><a href="#tab_b" data-toggle="tab">Volume</a></li>
							  <li><a href="#tab_c" data-toggle="tab">Value</a></li>
							  <li><a href="#tab_d" data-toggle="tab">No of Trade</a></li>
							  <li><a href="#tab_e" data-toggle="tab">%Changes</a></li>
							</ul>
							<div class="tab-content">
									<div class="tab-pane active" id="tab_a">
										 <h4></h4>
											<div id="sector_close_price_in_graph"></div>
									</div>
									<div class="tab-pane" id="tab_b">
										 <h4></h4>
										<div id="sector_volume_in_graph"></div>
									</div>
									<div class="tab-pane" id="tab_c">
										 <h4></h4>
										<div id="sector_value_in_graph"></div>
									</div>
									<div class="tab-pane" id="tab_d">
										 <h4></h4>
										<div id="sector_trades_in_graph"></div>
									</div>
									<div class="tab-pane" id="tab_e">
										 <h4></h4>
										<div id="sector_change_in_graph"></div>
									</div>
							</div><!-- tab content -->
							</div>
						</div>	
						
						
						
						
											
					</td>				
				</tr>
				</table>
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){
	   
		default_market_up_down_graph();
		function default_market_up_down_graph()
		{
		    $.ajax({
			   type:"post" ,
			   url: "<?php echo site_url();?>/stock_market_ui/market_updown_json" ,
			   data:"1=1" ,
			   cache:false ,
			   async:true ,
			   dataType:'json' ,
			   success:function(st)
			   {
			     marketUpDownGraph(st);
			   }
			
			});
		
		}
		
		
		function stock_prices_in_table(sector)
		{
		    if(sector=='')
			var datastr = 'sector=1';
			else
			var datastr = 'sector='+sector;
			
			
			$.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/stock_market_data_in_table",
				data:datastr,
				cache:false ,
				async:true,
				dataType:'html' ,
				success:function(st)
				{				   
					//$("#stock_data_table").empty();				  
				  $("#stock_data_table").html(st);
				}
			});
		}	
	    
		stock_prices_in_table('');
		
	    /*****************************************
		** By default load market up/down ratio 
        ******************************************/
	    function marketUpDownGraph(st)
		{
		   var d = [];
		  //  $.getJSON("<?php echo site_url();?>/stock_market_ui/market_updown_json" , function(st)
			//{
		  
				var category = st[0].data;
				//alert(category);
				$.each(st , function(k,v)
				{ 
					if(k>0){
					d.push(v);   
					}
				});
			
		     //alert(d);
		    $('#todays_sector_updown_ration_graph').highcharts(
			{
				chart: {
					type: 'column',
                    width:800 					
				},
				colors:['#FF0000','#006400','#640063'],
				title: {
					text: 'Stock Market UP/Down Ratio'
				},
				xAxis: {
					categories: category,//['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
					labels:{rotation:-90,
					style:{ fontSize:'10px'}}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Market UP Down Ratio'
					}
					
					, 
					stackLabels: {
						enabled: false,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					//x: -70,
					verticalAlign: 'top',
					y: 20,
					floating: true,
					backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
					borderColor: '#CCC',
					borderWidth: 1,
					shadow: false
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.x +'</b><br/>'+
							this.series.name +': '+ 
							this.y +'<br/>'+
							'Total: '+ this.point.stackTotal;
					}
				},
				exporting:{enabled:false},
				credits:{enabled:false},
				plotOptions: {
					column: {
						stacking: 'normal',
						dataLabels: {
							enabled: false,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: d				
				});			
			//});
		}
		
		
		
 	
	    $("#market_sector").change(function(){
	        var market_sector = $("#market_sector").val();
		    if(market_sector!="") {	
                stock_prices_in_table(market_sector);			
				make_request_for_close_price_graph(market_sector);
				make_request_for_volume_graph(market_sector);
				make_request_for_value_graph(market_sector);
			    make_request_for_no_of_trades_graph(market_sector);
				make_request_for_changes_graph(market_sector);		
		    }
			else
			{
			    stock_prices_in_table('')
				make_request_for_close_price_graph(1);
				make_request_for_volume_graph(1);
				make_request_for_value_graph(1);
			    make_request_for_no_of_trades_graph(1);
				make_request_for_changes_graph(1);					
			}
	    });
	    
		
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });			
		/**********************************
		** Graph Loader Functions
		*********************************/	
        function make_request_for_close_price_graph(sector)
		{
		    $.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/todays_sector_close_price_graph_json",
				data:'sector='+sector,
				cache:false ,
				async:true,
				dataType:'json' ,
				success:function(st)
				{
				   todays_sector_close_price_in_graph(st);
				}
			});
		}
		
		
        function make_request_for_volume_graph(sector)
		{
		    $.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/todays_sector_volume_graph_json",
				data:'sector='+sector,
				cache:false ,
				async:true,
				dataType:'json' ,
				success:function(st)
				{
				   todays_sector_volume_in_graph(st);
				}
			});
		}		
		
		
        function make_request_for_value_graph(sector)
		{
		    $.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/todays_sector_value_graph_json",
				data:'sector='+sector,
				cache:false ,
				async:true,
				dataType:'json' ,
				success:function(st)
				{
				   todays_sector_value_in_graph(st);
				}
			});
		}				
		
		
        function make_request_for_no_of_trades_graph(sector)
		{
		    $.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/todays_sector_no_of_trades_graph_json",
				data:'sector='+sector,
				cache:false ,
				async:true,
				dataType:'json' ,
				success:function(st)
				{
				   todays_sector_no_of_trades_in_graph(st);
				}
			});
		}						
		
		
        function make_request_for_changes_graph(sector)
		{
		    $.ajax({
				type:"post",
				url:"<?php echo site_url();?>/stock_market_ui/todays_sector_changes_graph_json",
				data:'sector='+sector,
				cache:false ,
				async:true,
				dataType:'json' ,
				success:function(st)
				{
				   todays_sector_changes_in_graph(st);
				}
			});
		}								
				
		
		function todays_sector_changes_in_graph(st)		
		{
		    //$.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_changes_graph_json"  , function(st)		{
			    var category = st[0].cat;
				var d = [];				
				$.each(st , function(k,v){
					d.push(v);
				});
				
			$('#sector_change_in_graph').highcharts({
				chart: {					
					type: 'column',
					width:800
				},
				title:{ text:'%change'},
				colors:['#006400'],
				xAxis: {
					categories: category,//['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					labels:{rotation:-90,style:{ fontSize:'10px'}},
					title:'y'
				},
				tooltip:{
				    formatter:function(){
					   return this.x+'<br/> %Changes:'+this.y;
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
			}
			,function(chart){        
				//var max = 0;            
				$.each(chart.series[1].data,function(i,data)
				{                
					if(  parseInt(data.y)  < 0 ){
						//data.graphic.attr({	fill:'red'});
						data.update({	color:'red'	});
					}else{
					   //data.graphic.attr({fill:'green'});
					   data.update({	color:'green'	});
					}
				});
        
			});
			//});	
		}
		
		
		
		function todays_sector_no_of_trades_in_graph(st)		
		{
		    //$.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_no_of_trades_graph_json"  , function(st){
			    var category = st[0].cat;
				var d = [];				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_trades_in_graph').highcharts(
				{
				chart: {
					type: 'column',
					width:800
				},
				colors:['#006400'],
				title: {
					text: 'No of Trades'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90,style:{ fontSize:'10px'}}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'No of Trades'
					}
				},
				legend:false,
				credits:{enabled:false},
				exporting:{enabled:false},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">No of Trades:  </td>' +
						'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
					footerFormat: '</table>',
					//shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series:d
				});				
			//});
		}
		
		
		
		function todays_sector_value_in_graph(st)		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    //$.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_value_graph_json"  , function(st){
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_value_in_graph').highcharts({
				chart: {
					type: 'column',
					width:800
				},
				colors:['#006400'],
				title: {
					text: 'Turnover'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90,style:{ fontSize:'10px'}}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Turnover'
					}
				},
				legend:false,
				credits:{enabled:false},
				exporting:{enabled:false},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">Turnover:  </td>' +
						'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
					footerFormat: '</table>',
					//shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series:d
				
				});
			//});
		}		

		
		
		
		function todays_sector_volume_in_graph(st)		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    //$.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_volume_graph_json"  , function(st){
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_volume_in_graph').highcharts({
				chart: {
					type: 'column',
					width:800
				},
				colors:['#006400'],
				title: {
					text: 'Volume'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90,style:{ fontSize:'10px'}}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Volume'
					}
				},
				legend:false,
				credits:{enabled:false},
				exporting:{enabled:false},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">Volume:  </td>' +
						'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
					footerFormat: '</table>',
					//shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series:d
				
				});
			//});		   
		   
		}		
		
		
		function todays_sector_close_price_in_graph(st)		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    //$.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_close_price_graph_json"  , function(st){
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_close_price_in_graph').highcharts({
				chart: {
					type: 'column',
					width: 800
				},
				colors:['#006400'],
				title: {
					text: 'Close Price'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90,style:{ fontSize:'10px'}}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Last Trade Price'
					}
				},
				legend:false,
				credits:{enabled:false},
				exporting:{enabled:false},
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">Close Price:  </td>' +
						'<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
					footerFormat: '</table>',
					//shared: true,
					useHTML: true
				},
				plotOptions: {
					column: {
						pointPadding: 0.2,
						borderWidth: 0
					}
				},
				series:d
				
				});
			//});	   
		}
		
		
		
		
		/*********************************************
		*********** Highstock implementation
		**********************************************/
		
    
		
		
		
		
		

		
		
		
		
	});
	</script>	
</body>
</html>