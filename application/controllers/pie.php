
[{data:[['M',50]]}]
var chart_01 = new Highcharts.Chart({
				chart: {
					renderTo: 'container_01',					
					height:280
					///type: 'pie'					
				},
				title:{
					text: 'Combinational Chart'
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
				series:				
					[{
						type:'pie',
						text:'Share Distribution',
						data: caps/*[
								['Sponsor: 20%', 20],
								['Intitute: 20%', 20], 
								['Public: 30%', 30], 
								['Govt: 10%', 10], 
								['Foreign: 20%', 20]
							]*/        
					},
					{
						type:'pie',
						text:'Share Distribution 2',						
						data: [
								['Market CAP: 70%', 70], 
								['Authorized CAP: 30%', 30]
							] ,
						center:[90,90],
						size:110
					}]
			});			
			
			[{ name:"Q1",data:[7,12,16,32,64]},
			{name:"Q2",data: [7,5,16,32,64]},
			{name:"Q3",data: [-7,12,16,32,64]},
			{name:"Q4",data: [7,10,14,25,50] }
			]
			
			[{ "name":"Q1","data":[7,12,16,32,64]},
			  {"name":"Q2","data":[7,5,16,32,64]}
			]