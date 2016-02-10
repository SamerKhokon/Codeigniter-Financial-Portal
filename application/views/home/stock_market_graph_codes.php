		function todays_sector_changes_in_graph()		
		{
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_changes_graph_json"  , function(st)
			{
			    var category = st[0].cat;
				var d = [];				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_change_in_graph').highcharts({
				chart: {					
					type: 'column',
					text:'' 
					
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
		
		
		
		function todays_sector_no_of_trades_in_graph()		
		{
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_no_of_trades_graph_json"  , function(st)
			{
			    var category = st[0].cat;
				var d = [];				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_trades_in_graph').highcharts(
				{
				chart: {
					type: 'column'
				},
				title: {
					text: 'No of Trades'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90}
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
					pointFormat: '<tr><td style="color:{series.color};padding:0">LTP:  </td>' +
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
			});
		}
		
		
		
		function todays_sector_value_in_graph()		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_value_graph_json"  , function(st)
			{
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_value_in_graph').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'Turnover'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90}
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
					pointFormat: '<tr><td style="color:{series.color};padding:0">LTP:  </td>' +
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
			});
		}		

		
		
		
		function todays_sector_volume_in_graph()		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_volume_graph_json"  , function(st)
			{
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_volume_in_graph').highcharts({
				chart: {
					type: 'column'
				},
				title: {
					text: 'Volume'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90}
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
					pointFormat: '<tr><td style="color:{series.color};padding:0">LTP:  </td>' +
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
			});		   
		   
		}		
		
		
		function todays_sector_close_price_in_graph()		
		{
		   //sector_close_price_in_graph
		   //todays_sector_close_price_graph_json
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/todays_sector_close_price_graph_json"  , function(st)
			{
			    var category = st[0].cat;
				var d = [];
				
				$.each(st , function(k,v){
					d.push(v);
				});
				
				$('#sector_close_price_in_graph').highcharts({
				chart: {
					type: 'column',
					width: 700
				},
				title: {
					text: 'Close Price'
				},				
				xAxis: {
					categories:category , 
					labels:{rotation:-90}
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
					pointFormat: '<tr><td style="color:{series.color};padding:0">LTP:  </td>' +
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
			});
		   
		   
		}
		
		
	    function marketUpDownGraph()
		{
		   var d = [];
		    $.getJSON("<?php echo site_url();?>/stock_market_ui/market_updown_json" , function(st)
			{
		  
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
					type: 'column' 					
				},
				title: {
					text: 'Market UP Down'
				},
				xAxis: {
					categories: category,//['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
					labels:{rotation:-90}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Market UP Down'
					},
					stackLabels: {
						enabled: true,
						style: {
							fontWeight: 'bold',
							color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
						}
					}
				},
				legend: {
					align: 'right',
					x: -70,
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
							enabled: true,
							color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
						}
					}
				},
				series: d
				/*
				[{
					//name: 'John',
					data: [5, 3, 4, 7, 2]
				}, {
					//name: 'Jane',
					data: [2, 2, 3, 2, 1]
				}, {
					//name: 'Joe',
					data: [3, 4, 4, 2, 5]
				}]*/
				});
			
			});
		}
