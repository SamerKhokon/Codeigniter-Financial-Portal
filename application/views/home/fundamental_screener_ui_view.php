<!-- main page -->
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
		<meta name="keywords"    content="Bootstrap Tutorial"/>
		<meta name="description" content="Custom template making with bootstrap framework."/>	  
		<meta name="author"      content="Samer Sarker Khokon. 01719347580"/>	  
	  
		<?php $this->load->view('utility');?>
		<link rel="stylesheet" href="<?php echo base_url();?>css/jquery-ui.css">
		<script src="<?php echo base_url();?>js/jquery-1.9.1.js"></script>
		<script src="<?php echo base_url();?>js/jquery-ui.js"></script>

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
	<?php 
						  $caps = $this->load->get_var('caps');
						  $cparse = explode("#" , $caps);
						  $max_capitalization = (float)$cparse[0];
						  $min_capitalization = (float)$cparse[1];
						  
						  $max_mins = $this->load->get_var('max_mins');
						  $parse = explode("#" , $max_mins);
						  $lpe = (float)$parse[0];
						  $mpe = (float)$parse[1];
						  $ldy = (float)$parse[2];
						  $mdy = (float)$parse[3];
						  $l52 = (float)$parse[4];
						  $m52 = (float)$parse[5];
						?>
	   
		
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
			
			    <input type="hidden" id="highest_cap" value="<?php echo $max_capitalization;?>"/>
						<input type="hidden" id="lowest_cap"  value="<?php echo $min_capitalization;?>"/>
						
						<input type="hidden" id="highestpe" value="<?php echo $mpe;?>"/>
						<input type="hidden" id="lowestpe"  value="<?php echo $lpe;?>"/>
					

						<input type="hidden" id="highest_divy" value="<?php echo $mdy;?>"/>
						<input type="hidden" id="lowest_divy"  value="<?php echo $ldy;?>"/>

					
						<input type="hidden" id="52_max" value="<?php echo $m52;?>"/>
						<input type="hidden" id="52_min"  value="<?php echo $l52;?>"/>
					

				<table width="100%">
				<tr>
					<td>
						<?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
					</td>
				</tr>
				<tr>
					<td>																
					

						<p>
							<label for="amount"></label>
							<input type="text" id="amount" style="border:0; color:#f6931f; font-weight:bold;">
						</p>

						
						
						<table width="90%">
						<tr>
							<td>Market Cap:</td>							
							<td><input type="text" id="cap_max" value="<?php echo $min_capitalization;?>"/></td>
							<td><input type="text" id="cap_min" value="<?php echo $max_capitalization;?>"/></td>
						</tr>
						<tr>
							<td colspan="3"><div id="cap"></div></td>
						</tr>

						<tr><td><label for="peamount"></label></td></tr>
						<tr>
						    <td>PE Ratio(%):</td>	
							<td><input type="text" id="pe_max" value="<?php echo $lpe;?>"/></td>
							<td><input type="text" id="pe_min" value="<?php echo $mpe;?>"/></td>
						</tr>
						<tr>
							<td colspan="3"><div id="pe"></div></td>
						</tr>
						<tr><td><label for="divy_amount"></label></td></tr>
						<tr>
						    <td>Dividend Yield(%):</td>	
							<td><input type="text" id="divy__max" value="<?php echo $ldy;?>"/></td>
							<td><input type="text" id="divy__min" value="<?php echo $mdy;?>"/></td>
						</tr>
						<tr>
							<td colspan="3"><div id="divy"></div></td>
						</tr>


						<tr><td><label for="52amount"></label></td></tr>
						<tr>
						    <td>52w Price Change(%):</td>
							<td><input type="text" id="w52_max" value="<?php echo $l52;?>"/></td>
							<td><input type="text" id="w52_min" value="<?php echo $m52;?>"/></td>
						</tr>
						<tr>
							<td colspan="3"><div id="52"></div></td>
						</tr>
						<tr>
							<td colspan="3">&nbsp;&nbsp;</td>
						</tr>
						
						<!--
						<tr>
							<td colspan="3">
							<input type="button" class="btn btn-primary" id="fundamental_screener_btn" value="Show Result"/>
							</td>
						</tr>-->
						</table>

						
					</td>
				</tr>
				</table>
					<div id="fundamental_screener_result_table"></div>		
			</div>		
						
		</div>
	</div>
				
	<input type="hidden" id="temp_comps" value=""/>
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function()
	{
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
		do_something('cap',$("#cap_max").val(),$("#cap_min").val());
		
			function do_something(keyword,first_val,second_val)
			{			
				var dataStr = "keyword="+keyword+
					"&min="+first_val+"&max="+second_val;		
				
				$.ajax({
				   type:"post" ,
				   url:"<?php echo site_url();?>/fundamental_screener_ui/fundamental_screener_show_result"  ,
				   data:dataStr ,
				   async:true ,
				   cache:false ,				   
				   success:function(st){
				     $("#fundamental_screener_result_table").html(st);
				   }
				});
				
			
			}
		
		
		
		$( "#cap" ).slider({
			range: true,
			min: 705408.81,
			max: 28107655168,	
			values: [ 944595512.6634, 19823174689 ],
			step: ((28107655168-705408.81)/268),
			slide: function( event, ui ) {	
				var first_val  =  parseFloat(ui.values[0]);
				var second_val =  parseFloat(ui.values[1]);
			
				///alert(ui.values[0]);
				//$( "#amount" ).val( "" + first_val   + "-" + second_val );
				$("#cap_max").val(first_val);
				$("#cap_min").val(second_val);
				
				do_something('cap',first_val,second_val);
			}
		});

		$( "#pe" ).slider({
			range: true,
			min: -194.805195,
			max: 2983.333333,	
			values: [ 200 , 1500 ],
			step: ((2983.333333-194.805195)/286) ,
			slide: function( event, ui ) {	
				var first_valpe  =  parseFloat(ui.values[0]);
				var second_valpe =  parseFloat(ui.values[1]);
			
				///alert(ui.values[0]);
				//$( "#peamount" ).val( "" + first_valpe   + "-" + second_valpe );
				$("#pe_max").val(first_valpe);
				$("#pe_min").val(second_valpe);
				do_something('pe_ratio',first_valpe,second_valpe);
			}
		});

		$( "#divy" ).slider({
			range: true,
			min: 0.000000,
			max: 1.718494,
			step:(1.718494/286),
			values: [ 0.16824 , 1.11762 ],
			slide: function( event, ui ) {	
				var first_valdivy  =  parseFloat(ui.values[0]);
				var second_valdivy =  parseFloat(ui.values[1]);
			
				///alert(ui.values[0]);
				//$( "#peamount" ).val( "" + first_valpe   + "-" + second_valpe );
				$("#divy__max").val(first_valdivy);
				$("#divy__min").val(second_valdivy);
				do_something('divident_yield',first_valdivy,second_valdivy);
			}
		});
			
			$( "#52" ).slider({
				range: true,
				min: -66.037736,
				max: 14240.251572,
				values: [ 1108.35915, 9596.04571 ],
				step: ((14240.251572+66.037736)/268), 
				slide: function( event, ui ) {	
					var first_val52 =  parseFloat(ui.values[0]);
					var second_val52 =  parseFloat(ui.values[1]);
				
					//alert(ui.values[0]);
					//$( "#52amount" ).val( "" + first_val52   + "-" + second_val52 );
					$("#w52_max").val(first_val52);
					$("#w52_min").val(second_val52);
					do_something('price_change_52week',first_val52,second_val52);
				}
			});
			
			
			
		
			
			
			
				
				
				
				//alert(dataStr);
			
		
		
	});
	</script>
	
</body>
</html>