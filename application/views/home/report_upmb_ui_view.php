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
							<ul class="nav nav-tabs" style="font-size:10px;">
								<li class="active"><a href="#anouncement_tab" style="padding:11px;" data-toggle="tab">Anouncement Report</a></li>
								<li><a href="#recomendation_tab" style="padding:11px;" data-toggle="tab">Recomendation Report</a></li>
								<li><a href="#sector_tab" 	   style="padding:11px;"  data-toggle="tab">Sector Report</a></li>
								<li><a href="#macro_tab" 	   style="padding:11px;"  data-toggle="tab">Macro Report</a></li>
								<li><a href="#article_tab"     style="padding:11px;"  data-toggle="tab">Article & Interviews</a></li>
								<li><a href="#ipo_tab"   style="padding:11px;"  data-toggle="tab">IPO Watch</a></li>
								<li><a href="#daily_tab"       style="padding:11px;"  data-toggle="tab">Daily Overview</a></li>
								<li><a href="#weekly_tab"      style="padding:11px;"  data-toggle="tab">Weekly Overview</a></li>
							</ul>
						
						
									<div class="tab-content">
									
										<div class="tab-pane active" id="anouncement_tab">
											<br/>
											<h4></h4>										
											<iframe src="<?php echo site_url();?>/report_ui/anouncement_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
											
										</div>
									
										<div class="tab-pane" id="recomendation_tab">
											<br/>
											<h4></h4>
										 
											
											<iframe src="<?php echo site_url();?>/report_ui/recomendation_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									
											
										</div>
										
										
										
										
										<div class="tab-pane" id="sector_tab">
											<br/>
											<h4></h4>	
											
											<iframe src="<?php echo site_url();?>/report_ui/sector_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									


											
										</div>
										
										
										
										
										<div class="tab-pane" id="macro_tab">
											<br/>
											<h4></h4>	
											
											<iframe src="<?php echo site_url();?>/report_ui/macro_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									
											
										</div>
										
										
										
										
										<div class="tab-pane" id="article_tab">
											<br/>
											<h4></h4>	
											
											<iframe src="<?php echo site_url();?>/report_ui/article_and_interview_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									
											
										</div>
										
										
										
										<div class="tab-pane" id="ipo_tab">
											<br/>
											<h4></h4>	
											
											<iframe src="<?php echo site_url();?>/report_ui/ipo_watch_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
										
											
										</div>
										
										
										
										<div class="tab-pane" id="daily_tab">
											<br/>
											<h4></h4>	
											
											<iframe src="<?php echo site_url();?>/report_ui/daily_overview_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									
											
										</div>
										
										
										
										<div class="tab-pane" id="weekly_tab">
											<br/>
											<h4></h4>											
											<iframe src="<?php echo site_url();?>/report_ui/weekly_overview_report_up" style="width:750px;height:450px;border:1px solid #fff;"> </iframe>
									
										</div>
									</div>	
									
									
										
										
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