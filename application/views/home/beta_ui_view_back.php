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
						
						   	
									<table id="beta_table_div" class="display table-bordered table-striped table dataTable">
									<thead>
									<tr>
									   <?php $bt = $this->load->get_var('bt');
                                          $prs = explode("#" , $bt);
										  $s_01 = $prs[0];
										  $s_02 = $prs[1];
										  $s_03 = $prs[2];
									   ?>
									   <th><?php echo 'Ceramic';?></th>
									   <th><?php echo $s_01;?></th>
									   <th><?php echo $s_02;?></th>
									   <th><?php echo $s_03;?></th>
									</tr>
									<tr>
									   <th>Company</th>
									   <th>3 Month Beta</th>
									   <th>6 Month Beta</th>
									   <th>12 Month Beta</th>
									</tr>
									</thead>
									<tbody>
									    <?php $betas = $this->load->get_var('betas');
										foreach($betas as $beta){
										  if($beta->sector_id==1) 
										  {
										      $this-> get_sector_beta($beta->sector_id); 
										  }
										?>
										<tr>
										   <td><?php echo $beta->code;?></td>
										   <td><?php echo $beta->three_month_beta;?></td>
										   <td><?php echo $beta->six_month_beta;?></td>
										   <td><?php echo $beta->one_year_beta;?></td>
										</tr>
										<?php } ?>
									</tbody>
									</table>
									
									
									
									
							
							
							
						</td>
					</tr>				
				</table>
				
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){

       
		
	
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
	});
	</script>	
</body>
</html>