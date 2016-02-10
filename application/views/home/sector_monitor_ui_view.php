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

			<?php $companies = $this->load->get_var('companies');	?>
			
			<table width="70%">		
				<tr><td  colspan="4">Time Interval</td></tr>					
				<tr>					    
					<td colspan="4">
						<select id="indicating_times" style="width:220px;">
							<option value="5">5 Minutes</option>
							<option value="10">10 Minutes</option>
							<option value="20">20 Minutes</option>									
						</select>
					</td>								
				</tr>			
				<tr>
					<td colspan="4">Select Company/Companies:</td>
				</tr>
				<tr>
					<td>					
						<select id="company_codes"  style="width:220px;">
							<?php foreach($sectors as $sector){ ?>
							<option value="<?php echo $sector->sector_id;?>">
								<?php echo $sector->name;?>
							</option>
							<?php }?>
						</select>
					</td>
					
							
					
				</tr>
				<tr>
					<td><input type="button" class="btn btn-primary" id="sector_monitor_result" value="Show Result"/></td>
				</tr>

				</table>
				
				<br/>
				<table>
					<tr>
						<td>
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
							<div id="sector_monitor_graph_01"></div>
						</td>
						<td><div id="sector_monitor_graph_02"></div></td>
					</tr>
					<tr>
						<td><div id="sector_monitor_graph_03"></div></td>
						<td><div id="sector_monitor_graph_04"></div></td>
					</tr>
					<tr>
						<td><div id="sector_monitor_graph_05"></div></td>
						<td><div id="sector_monitor_graph_06"></div></td>
					</tr>
				</table>
					
			
			
		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">
$(document).ready(function() {
   
    function generate_graph(st ,names, i)
	{
	    var category= st[0].category;
		var prices= st[1].prices;
		var volume= st[2].volume;
		
	    $('#sector_monitor_graph_0'+i).highcharts({
            chart: {
                zoomType: 'xy' ,
				width:720 ,
				height:300
            },
            title: {
                text: ''
            },
            
            xAxis: [{
                categories: category ,
				labels:{
				   rotation:-90
				} ,
				style:	{
				  fontSize:'7px'
				}
				
				/*['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']*/
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    //format: '{value}°C',
                    style: { color: '#89A54E'  }
                },
                title: {
                    text: 'Price of '+names,
                    style: { color: '#89A54E'  }
                }
            }, { // Secondary yAxis
                title: {
                    text: 'Volume ',
                    style: { color: '#4572A7'  }
                },
                labels: {
                    format: '{value} mm',
                    style: {  color: '#4572A7' }
                },
                opposite: true
            }],
            tooltip: {
                //shared: true
            },
			exporting:{enabled:false} ,
			credits:{enabled:false} ,
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: '#FFFFFF'
            },
            series: [{
                name: 'Volume',
                color: '#4572A7',
                type: 'column',
                yAxis: 1,
                data: volume,
				//[49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                tooltip: {
                    //valueSuffix: ' mm'
                }
    
            }, {
                name: 'Price',
                color: '#89A54E',
                type: 'spline',
                data: prices,
				//[7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                tooltip: {
                   // valueSuffix: '°C'
                }
            }]
        });		
	}
   
     
    $("#sector_monitor_result").click(function()
	{
	    var companies_id     = $("#company_codes").val();
	    var indicating_times = $("#indicating_times").val(); 	    
		var companies_name   = $.trim($("#company_codes option:selected").text());	    
	   
	    var dataStr = "companies_id="+companies_id+
					"&companies_name="+companies_name+
					"&indicating_times="+indicating_times;	   
		generate_sector_monitor_graph_request( companies_id , indicating_times ,companies_name,1);
		
	    //alert(dataStr);
	});
   

    function generate_sector_monitor_graph_request(companies_id, indicating_times ,names ,i)
	{   
		$.ajax({
		    type:"post" ,
		    url: "<?php echo site_url();?>/sector_monitor_ui/sector_monitor_json" ,
		    data:"companies_id="+companies_id+"&indicating_times="+indicating_times ,
		    cache:false ,
		    dataType:'json',
		    success:function(st)
			{
				generate_graph(st,names,i );
		    }
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
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>