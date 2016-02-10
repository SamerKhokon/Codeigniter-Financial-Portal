			
		var scopes = [];	
		$.getJSON("<?php echo site_url();?>/mb/scope_to_pay_divident_json",function(json){
            $.each(json , function(k,v){
			  scopes.push(v);
			});		
			//alert(scopes);
			var chart_001 = new Highcharts.Chart({
				chart: {
					renderTo: 'container_001',
					width:400,					
					height:250,
					type: 'pie'					
				},
				title:{
					text: 'Scope to pay Divident(Stock,Right etc.)'
				},
				//xAxis:{ categories:['Public','Govt','Foreign','Institute']},
				//yAxis:{ max:10},
				plotOptions: {
					series: {
						allowPointSelect: true,
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
				series:	scopes
			});
		});	
			
			
			
		var eps_first_quarter = [];
		//var q2 = [];	
		$.getJSON("<?php echo site_url();?>/mb/eps_first_quarter_continuing_json",function(json){ 	
            var s = json[0].data;
			//alert(s);
			$.each(json , function(k,v){
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
		});	
			
			
		
		var net_profit = [];
		$.getJSON("<?php echo site_url();?>/mb/net_profit_first_quarter_continuing_json" , function(json){	
			var net_profit_years = json[0].data;
			$.each(json , function(k,v){
			    if(k>0)
				{
				   net_profit.push(v);
				}
			});
			
			var chart_03 = new Highcharts.Chart({
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
                    categories: net_profit_years,//['2000','2001','2002','2004','2005'],  				
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
				series: net_profit/*[{
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
		});	
			
			
		
		var total_eps = [];
		$.getJSON("<?php echo site_url();?>/mb/eps_all_quarter_continuing_json",function(json){	
		    var total_eps_years = json[0].data;
			
			$.each(json , function(k,v){
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
		});	
			
		
		var total_net_profit = [];
		$.getJSON("<?php echo site_url();?>/mb/net_profit_all_quarter_continuing_json" , function(json)
		{	
		    var yrs = json[0].data;
			$.each(json , function(k,v){
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
		});	
			
	
		
		$.getJSON("<?php echo site_url();?>/mb/yearly_nav_shares_json" , function(json)
		{
			var	navs_years = json[0].data;
			var yearly_navs = json[1].data; 	   
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
		});	
			
			
	    $.getJSON("<?php echo site_url();?>/mb/yealy_eps_json" , function(json)
		{
		    var yrs_eps = json[0].data; 
			var yrs_eps_val = json[1].data;
			
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
    
            }, {
                name: 'Yearly',
                color: '#89A54E',
                type: 'line',
                data: yrs_eps_val/*[7.0, 6.9]*/ ,
                tooltip: {
                    valueSuffix: ' '
                }
            }] ,
			credits:{enabled:false} ,
			exporting:{enabled:false} 
        });	
		});
	
		
		
		
		
		
		
		var Options = {
				chart: {
					renderTo: "container_08",
					zoomType: "x"
				},
				plotOptions: {
					line: {
						marker: {
							enabled: false
						},
						animation: true
					},
					column: {
						animation: false
					}
				},
				title: {
					text: "Sector Vs. EPS"
				},
				legend: {
					enabled: false
					//,layout: "vertical",
					//align: 'right',
					//verticalAlign: 'middle'
				},
				tooltip: {
					enabled: true,
				},
				yAxis: [{
					title: {
						text: 'Company P/E'
						}
						//,min: 35000,
					//max: 80000
				}, {
					title: {
						text: 'Industry Average'
					},
					min: 0,
					//max: 30000,
					opposite: true
				}],
				xAxis:[{
					categories:  ['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'],
					labels:{rotation:-90}
				}],
				series: [{
					"name": "Series1",
					"type": "spline",
					"data": [20000, 19000, 20002, 20005, 20006 , 20007
					, 20008, 20009, 20010, 20011 , 20012]
					},
					{
					"name": "Series2",
					"type": "spline",
					"data": [20000, 20001, 20002, 20005, 20006 , 20007
					, 20008, 20009, 20010, 20011 , 20012]
					}
				],
				exporting: {  enabled: false	},
				credits:{  enabled:false	}
		}
			myChart = new Highcharts.Chart(Options);
		
	
