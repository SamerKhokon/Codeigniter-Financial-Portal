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
				<tr><td  colspan="4">Sector</td></tr>					
				<tr>					    
					<td colspan="4">
						<select id="index_change_sector" style="width:220px;">
							
							<option value="">choose sector</option>
							<?php $sectors = $this->load->get_var('sectors');  
							foreach($sectors as $sector)
							{
							?>
							
							<option value="<?php echo $sector->sector_id; ?>">
							<?php echo $sector->name; ?>
							</option>
							
							<?php } ?>							
						</select>
					</td>								
				</tr>			
				
				<tr>
					<td><input type="button" class="btn btn-primary" id="index_change_result" value="Show Result"/></td>
				</tr>
				</table>
				
				
				<br/>
				<table>
					<tr>
						<td>
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
							<div id="index_change_graph_1"></div>
						</td>
						<td><div id="index_change_graph_2"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_3"></div></td>
						<td><div id="index_change_graph_4"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_5"></div></td>
						<td><div id="index_change_graph_6"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_7"></div></td>
						<td><div id="index_change_graph_8"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_9"></div></td>
						<td><div id="index_change_graph_10"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_11"></div></td>
						<td><div id="index_change_graph_12"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_13"></div></td>
						<td><div id="index_change_graph_14"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_15"></div></td>
						<td><div id="index_change_graph_16"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_17"></div></td>
						<td><div id="index_change_graph_18"></div></td>
					</tr>
					<tr>
						<td><div id="index_change_graph_19"></div></td>
						<td><div id="index_change_graph_20"></div></td>
					</tr>
				</table>
					
			
			
		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">
$(document).ready(function() { 
	
	
	function generate_index_change_graph(sector_name,st)
	{
	    var cat    = st[0].cate;
		var sector = st[1].sector;
		var dsex   = st[2].dsex;
		
		//alert(cat);
		 $('#index_change_graph_1').highcharts({
            chart:{ type: 'areaspline'  },
            title:{ text: ''},
			credits:{enabled:false} ,
			exporting:{enabled:false} ,
            legend: {
                layout: 'vertical',
                align: 'left',
                verticalAlign: 'top',
                x: 120,
                y: 150,
                floating: true,
                borderWidth: 1,
                backgroundColor: '#FFFFFF'
            },
            xAxis: {
                categories: cat,				
				labels:{ rotation:-90 },
                plotBands: [{ // visualize the weekend
                    from: 4.5,
                    to: 6.5,
                    color: 'rgba(68, 170, 213, .2)'
                }]
            },
            yAxis: {
                
				labels: {
					formatter: function () {
						return this.value + '%';
					}
				},title: { text: '' }
            },
            tooltip: {
                shared: true,
                valueSuffix: ' '
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: { fillOpacity: 0.5  }
            },
            series: [{
                name: sector_name+' Sector Index% Change',
                data: sector //[3, 4, 3, 5, 4, 10, 12]
            }, {
                name: 'DSEX',
                data: dsex //[1, 3, 4, 3, 3, 5, 4]
            }]
        });
    
		
		
	}	
	
	
	
	
	$("#index_change_result").click(function()
	{
	    var sector_id = $("#index_change_sector").val();
	    var sector_name = $("#index_change_sector option:selected").text();
		//alert(sector_id);
		
		$.ajax({
		   type:"post" ,
		   url:"<?php echo site_url();?>/index_change_ui/indexchange_graph_json",
		   data:"sector_id="+sector_id ,		   
		   async:true ,
		   dataType:'json' ,
		   success:function(st){
		     // alert(st);
		     generate_index_change_graph(sector_name,st);
		   }
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
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>