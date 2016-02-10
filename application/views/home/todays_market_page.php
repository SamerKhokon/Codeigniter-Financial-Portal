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
	
	<div class="well">	
		<table width="100%">	
			<tr>
				<td width="35%"><img src="<?php echo base_url();?>img/iPortal.png"/></td>
				<td width="30%">&nbsp;&nbsp;&nbsp;&nbsp;
				<input type="button" class="btn btn-primary" value="Login"/>
				<input type="button" class="btn btn-primary" value="Register"/>
				&nbsp;&nbsp;&nbsp;&nbsp;				
				</td>				
				<td width="35%"><img src="<?php echo base_url();?>img/Pic1.png"/></td>
			</tr>
		</table>
		
			<span class="glyphicon glyphicon-home"></span><a href="javascript:void(0);">Home</a>
			<span class="glyphicon glyphicon-user"></span>Online: <?php echo $this->session->userdata("CAPM_USER");?> &nbsp;
			<a href="<?php echo site_url();?>/home/logout/" ><span class="glyphicon glyphicon-off"></span>Logout</a>

			<?php $this->load->view("site/capm_megamenu"); ?>
			<!-- end megamenu -->			
	</div>	
	
	<div class="container"> 
	    <div class="row">
		    <div class="col-md-12">
			    <marquee loop="-1">stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here 
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here
				stock market prices scroll here</marquee>
			</div>
		</div>
	    <div class="row">
	        <div class="col-md-3">
		      <!-- left menu -->
			  <?php $this->load->view("site/todays_market_left_menu");?>
			</div>			
			
			<div class="col-md-9">	
			    <table width="100%">
				<tr><td>
                <?php $this->load->view("site/todays_market_submenu_overview");  ?>			
				</td></tr>
				<tr><td>
								
				<div id="user_list_table"></div>				
				
				
				
				</td></tr>
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
			$("a[name='inner_left_menu']").click(function(){
			    var sel_id= $(this).attr('id');
				//$("#user_list_table").load("<?php echo site_url();?>/mb/"+sel_id,function(){});
				//alert(sel_id);
			});									
						
		});
	</script>	
</body>
</html>
