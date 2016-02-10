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
					<table>
					<tr>
					<td>Company</td>
					<td>	
						<select id="company_id" style="width:200px;">
						 <option value="">All companies</option>
						 <?php  $companies = $this->load->get_var("companies"); 
						 foreach($companies as $company){
						 ?>
						 <option value="<?php echo $company->id;?>"><?php echo $company->code;?></option>
						 <?php } ?>
						</select>
					</td>
					</tr>
					<tr>
						<td>Date:</td>					
						<td><input type="text" id="market_data_date" style="width:200px;"/></td>
						
					</tr>
					<tr><td>&nbsp;</td>
						<td><input type="button" class="btn btn-primary" id="market_data_download" value="Generate CSV"/></td>
						
					</tr>
					
					</table>
				</tr>				
				</table>
				<div id="donload_div"></div>
			</div>
	   </div>
	</div>
				
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	<script type="text/javascript">
	$(document).ready(function()
	{
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
		
		$("#market_data_download").click(function(){
		    var market_data_date =$("#market_data_date").val();
			var company_id =$("#company_id").val();
			
			if(market_data_date=="") {
			  alert("Please select any date");
			  return false;
			}else{
				$.ajax({
				   type:"post",
				   url:"<?php echo site_url();?>/market_data_download_ui/market_data_convert_into_csv" , 
				   data:"market_data_date="+market_data_date+"&company_id="+company_id ,
				   cache:false ,
				   async:true ,
				   success:function(st){
					  $("#donload_div").html(st);
				   }			   
				});
			}
		});
				
		$("#market_data_date").datepicker({ 
			dateFormat:"dd-mm-yy",
			changeMonth:true,
			changeYear:true,
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});				
			
				
	});
	</script>
	
</body>
</html>