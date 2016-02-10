<!-- main page -->
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport"    content="width=device-width, initial-scale=1.0"/>	  
		<meta name="keywords"    content="Bootstrap Tutorial"/>
		<meta name="description" content="Custom template making with bootstrap framework."/>	  
		<meta name="author"      content="Samer Sarker Khokon. 01719347580"/>	  
	  
		<?php 		$this->load->view('utility');			?>
		
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

						<input type="hidden"	id="cci_select" value="<?php echo $this->session->userdata('cci_select');?>"/>
						<input type="hidden"	id="cci_val"    value="<?php echo $this->session->userdata('cci_val');?>"/>
						<input type="hidden"	id="mfi_select" value="<?php echo $this->session->userdata('mfi_select');?>"/>
						<input type="hidden"	id="mfi_val"    value="<?php echo $this->session->userdata('mfi_val');?>"/>
						<input type="hidden"	id="rsi_select" value="<?php echo $this->session->userdata('rsi_select');?>"/>
						<input type="hidden"	id="rsi_val"    value="<?php echo $this->session->userdata('rsi_val');?>"/>
						<input type="hidden"	id="st_oscillator_select" value="<?php echo $this->session->userdata('st_oscillator_select');?>"/>
						<input type="hidden"	id="st_oscillator_val"    value="<?php echo $this->session->userdata('st_oscillator_val');?>"/>
						<input type="hidden"	id="ut_oscillator_select" value="<?php echo $this->session->userdata('ut_oscillator_select');?>"/>
						<input type="hidden"	id="ut_oscillator_val"    value="<?php echo $this->session->userdata('ut_oscillator_val');?>"/>
						<input type="hidden"	id="wr_select" 			  value="<?php echo $this->session->userdata('wr_select');?>"/>
						<input type="hidden"	id="wr_val" 			  value="<?php echo $this->session->userdata('wr_val');?>"/>
						
						<!--
						<input type="hidden"	id="trix_select" 		  value="<?php echo $this->session->userdata('trix_select');?>"/>
						<input type="hidden"	id="trix_val" 			  value="<?php echo $this->session->userdata('trix_val');?>"/>
						-->
		
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
						<?php //$this->load->view("home/todays_market_submenu_overview");  ?>			
					</td>
				</tr>
				<tr>
					<td>				
						<table width="80%" >
							<tr>
								<td width="20%" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td width="10%" style="font-family:Arial:font-size:15px;">&nbsp;&nbsp;CCI</td>								
								<td width="10%" style="font-family:Arial:font-size:15px;">&nbsp;&nbsp;MFI</td>
								<td width="10%" style="font-family:Arial:font-size:15px;">&nbsp;&nbsp;RSI</td>
								<td width="10%" style="font-family:Arial:font-size:15px;">Stochastic Oscillator</td>
								<td width="10%" style="font-family:Arial:font-size:15px;">Ultimate Oscillator</td>
								<td width="10%" style="font-family:Arial:font-size:15px;">William`s %R</td>						  
							</tr>
							<tr>
                                <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>							
								<td>
									<select id="cci_sel">
										<option value=">" <?php  if($this->session->userdata('cci_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('cci_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>
								
								</td>
								<td>
									<select id="mfi_sel">
										<option value=">" <?php  if($this->session->userdata('mfi_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('mfi_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>									
								</td>
								<td>
									<select id="rsi_sel">
										<option value=">" <?php  if($this->session->userdata('rsi_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('rsi_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>
								</td>
								<td>
									<select id="st_oscilator_sel">
										<option value=">" <?php  if($this->session->userdata('st_oscillator_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('st_oscillator_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>
								</td>
								<td>
									<select id="ut_oscilator_sel">
										<option value=">" <?php  if($this->session->userdata('ut_oscillator_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('ut_oscillator_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>
								</td>
								<td>
									<select  id="wr_sel">
										<option value=">" <?php  if($this->session->userdata('wr_select')=='greater'){ echo 'selected';} ?>>greater</option>
										<option value="<" <?php  if($this->session->userdata('wr_select')=='lower'){ echo 'selected';} ?>>lower</option>
									</select>
								</td>
							</tr>
							<tr>
							    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>									
								<td>
									<input style="width:74px;" id="search_cci" type="text" value="<?php echo $this->session->userdata('cci_val');?>"/>
								</td>								
								<td>
									<input style="width:74px;" id="search_mfi"  type="text" value="<?php echo $this->session->userdata('mfi_val');?>"/>
								</td>							
								<td>	
									<input style="width:74px;" id="search_rsi"  type="text" value="<?php echo $this->session->userdata('rsi_val');?>"/>
								</td>									
								<td>	
									<input style="width:74px;" id="search_st_oscilator"  type="text"  value="<?php echo $this->session->userdata('st_oscillator_val');?>"/>
								</td>
								
								<td>	
									<input style="width:74px;" id="search_ut_oscilator"  type="text"   value="<?php echo $this->session->userdata('ut_oscillator_val');?>"/>
								</td>
								
								<td>	
									<input style="width:74px;"  type="text" id="search_wr"  value="<?php echo $this->session->userdata('wr_val');?>"/>
								</td>												  
							</tr>
						</table>
										
					</td>
				</tr>
				</table>
			    <div id="technical_screener_result_table"></div>		
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
		
		var cci_sel  			= $('#cci_sel').val();
		var search_cci			= $('#search_cci').val();
		var mfi_sel				= $('#mfi_sel').val();
		var search_mfi			= $('#search_mfi').val();
		var rsi_sel				= $('#rsi_sel').val();
		var search_rsi			= $('#search_rsi').val();
		var st_oscilator_sel	= $('#st_oscilator_sel').val();
		var search_st_oscilator = $('#search_st_oscilator').val();	
		var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
		var search_ut_oscilator	= $('#search_ut_oscilator').val();
		var wr_sel				= $('#wr_sel').val();
		var search_wr			= $('#search_wr').val();
		
		function load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr )
		{
		    $.ajax({
			    type:"post" ,
				url:"<?php echo site_url();?>/mains/fundamental_search" ,
				data:"cci_sel="+cci_sel+"&search_cci="+search_cci+"&mfi_sel="+mfi_sel
						+"&search_mfi="+search_mfi+"&rsi_sel="+rsi_sel+"&search_rsi="+search_rsi
						+"&st_oscilator_sel="+st_oscilator_sel+"&search_st_oscilator="+search_st_oscilator
						+"&ut_oscilator_sel="+ut_oscilator_sel+"&search_ut_oscilator="+search_ut_oscilator
						+"&wr_sel="+wr_sel+"&search_wr="+search_wr,
				async:true ,
				cache:false,
				success:function(st)
				{
				    //alert(st);
					//$("#company_select option").html("");
					//$("#company_select").html(st);
					
					$("#technical_screener_result_table").empty();
					$("#technical_screener_result_table").html(st);
					
				}	
			});		
		}
		
		
		load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		$("#search_cci").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});	


		$("#search_mfi").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});		


		$("#search_rsi").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});			


		$("#search_st_oscilator").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});	


		$("#search_ut_oscilator").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});		



		$("#search_wr").keyup(function(){
		    var cci_sel  			= $('#cci_sel').val();
			var search_cci			= $('#search_cci').val();
			var mfi_sel				= $('#mfi_sel').val();
			var search_mfi			= $('#search_mfi').val();
			var rsi_sel				= $('#rsi_sel').val();
			var search_rsi			= $('#search_rsi').val();
			var st_oscilator_sel	= $('#st_oscilator_sel').val();
			var search_st_oscilator = $('#search_st_oscilator').val();	
			var ut_oscilator_sel	= $('#ut_oscilator_sel').val();
			var search_ut_oscilator	= $('#search_ut_oscilator').val();
			var wr_sel				= $('#wr_sel').val();
			var search_wr			= $('#search_wr').val();
			
			load_companies( cci_sel,search_cci,mfi_sel,search_mfi,
				rsi_sel,search_rsi,st_oscilator_sel,search_st_oscilator,
				ut_oscilator_sel,search_ut_oscilator,wr_sel,search_wr );
				
		});			
		
	});
	</script>
	
</body>
</html>