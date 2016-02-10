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
						    <table>
							<tr>
								<td>Company:</td>
								<td>
									<?php 
									$companies = $this->load->get_var('companies');
									?>
									<select id="company_id">
									<option value="">select company</option>
									<?php 
										foreach($companies as $company)
										{
									?>
											<option value="<?php echo $company->id; ?>">
												<?php echo $company->code; ?>
											</option>
									<?php 
										} 
									?>
									</select>
								</td>
							</tr>
							</table>
						</td>
					</tr>				
				</table>
				
				<br/>
				<div id="price_position_result"></div>
				
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function(){
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
		
		$("#company_id").change(function(){
		   var company_id = $("#company_id").val();
		    if(company_id!="") {
		      
			  $.ajax({
			     type:"post" ,
				 url:"<?php echo site_url();?>/price_position_ui/price_position_result" ,
				 data:"company_id="+company_id ,
				 cache:false ,
				 async:true ,
				 success:function(st){
				    $("#price_position_result").empty();
				    $("#price_position_result").html(st);
				 }
			  });
			  
			  
			  
		    }else{
		      alert("Please select company!");
		    }
		});
		
	});
	</script>	
</body>
</html>