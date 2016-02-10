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
						Select Sector:  
						<select id="sector_id" style="border:1px solid #999966;width:120px;width:250px;">
							<option value="">Select Sector</option>
						<?php 
							foreach($sectors  as   $sector) 
							{         
						?>
								<option value="<?php echo $sector->sector_id; ?>">
									<?php echo $sector->sector; ?>
								</option>
						<?php 
							} 
						?>
						</select>
					  </td>				  
					</tr>
					<!--
					<tr>
					  <td><input type="button" id="sector_id_btn" class="btn btn-primary" value="Show Result" /></td>
					</tr>-->
					<tr>
						<td>
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
							<div id="container_x01"></div>
						</td>					
					</tr>
				</table>
				
		
		
		<script type="text/javascript">
		$(document).ready(function()
		{		    
				$("#sector_id").bind("change", sector_vs_pe_func );
			
				function sector_vs_pe_func()
				{					
					var sector_id = $("#sector_id").val();
					//alert(sector_id);
					
					$.ajax({
						type:"post" ,
						url: "<?php echo site_url(); ?>/sector_vs_pe_json/sector_vs" ,
						data:"sector_id="+sector_id ,
						async:true ,
						cache:false ,
						dataType:'json',						
						success:function(st)
						{		
                            // alert(st);						
							
							sector_vs_pe_graph(st);
						}
					}); 
					return false;
				}
				
				
            function sector_vs_pe_graph(st)
			{			
			    var pe_s           = st[1].pes;
			    var companies  = st[0].coms;				
				var sectors_pes = st[2].sectors_pe;
				
				    
					var chart = new Highcharts.Chart({
							chart: {
								renderTo: "container_x01",								
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
								text: "Stock Vs Sector P/E Graph"
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
							},{
								title: {
									text: 'Industry Average'
								},
								min: 0,
								//max: 30000,
								opposite: true
							}],
							xAxis:[{
								categories:  companies,//['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'],
								labels:{rotation:-90}
							}],
							//pe_s
							series: [{
								"name": "Company P/E",
								"type": "spline",
								"data": pe_s
								
									/*[20000, 19000, 20002, 20005, 20006 , 20007
									, 20008, 20009, 20010, 20011 , 20012]*/
								},
								{
								"name": "Industry P/E",
								"type": "spline",
								"data": sectors_pes
								/*[20000, 20001, 20002, 20005, 20006 , 20007
								, 20008, 20009, 20010, 20011 , 20012]*/
								}
							],
							exporting: {  enabled: false	},
							credits:{  enabled:false	}
					});
				
								
			}			
		});
		</script>	
				
				
				
				
							
			
			
			
			
			
			

		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">
$(document).ready(function() {

   

	
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