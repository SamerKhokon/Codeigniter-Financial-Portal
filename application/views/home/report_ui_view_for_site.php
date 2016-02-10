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
							<li class="active"><a href="#anouncement_report_tab" style="padding:11px;" data-toggle="tab">Anouncement Report</a></li>
							<li><a href="#recomendation_report_tab" style="padding:11px;"	  data-toggle="tab">Recomendation Report</a></li>
							<li><a href="#sector_report_tab" 	style="padding:11px;"		  data-toggle="tab">Sector Report</a></li>
							<li><a href="#macro_report_tab" 	style="padding:11px;"		  data-toggle="tab">Macro Report</a></li>
							<li><a href="#article_interviews_report_tab" style="padding:11px;" data-toggle="tab">Article & Interviews</a></li>
							<li><a href="#ipo_watch_report_tab"   style="padding:11px;"        data-toggle="tab">IPO Watch</a></li>
							<li><a href="#daily_overview_report_tab" style="padding:11px;"     data-toggle="tab">Daily Overview</a></li>
							<li><a href="#weekly_overview_report_tab" style="padding:11px;"    data-toggle="tab">Weekly Overview</a></li>
						</ul>
						
						
						
						<div class="tab-content">
						
						     <div class="tab-pane active" id="anouncement_report_tab">
								<br/>
								<h4></h4>
                             
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									<?php $anouncements = $this->load->get_var("anouncements");
									foreach($anouncements as $anouncement){
									?>
									<tr>
										<td><?php echo $anouncement->report_date;?></td>
										<td ><?php echo $anouncement->category;?></td>
										<td><?php echo $anouncement->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/anouncement/'.$anouncement->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>
								</table>
								
							</div>
						
						    <div class="tab-pane" id="recomendation_report_tab">
								<br/>
								<h4></h4>
                             
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									<?php $recomendation = $this->load->get_var("recomendation");
									foreach($recomendation as $recomend){
									?>
									<tr>
										<td><?php echo $recomend->report_date;?></td>
										<td><?php echo $recomend->category;?></td>
										<td><?php echo $recomend->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/recomendation/'.$recomend->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>
								</table>
								
							</div>
							
							
							
							
						    <div class="tab-pane" id="sector_report_tab">
								<br/>
								<h4></h4>	
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									
									<?php $sectors = $this->load->get_var("sector");
									foreach($sectors as $sector){
									?>
									<tr>
										<td><?php echo $sector->report_date;?></td>
										<td><?php echo $sector->category;?></td>
										<td><?php echo $sector->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/sector/'.$sector->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>							
								</table>


								
							</div>
							
							
							
							
							<div class="tab-pane" id="macro_report_tab">
								<br/>
								<h4></h4>	
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									
									<?php $macros = $this->load->get_var("macro");
									foreach($macros as $macro){
									?>
									<tr>
										<td><?php echo $macro->report_date;?></td>
										<td><?php echo $macro->category;?></td>
										<td><?php echo $macro->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/macro/'.$macro->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>									
								</table>							
							</div>
							
							
							
							
							<div class="tab-pane" id="article_interviews_report_tab">
								<br/>
								<h4></h4>	
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									
									<?php $articles = $this->load->get_var("article");
									foreach($articles as $article){
									?>
									<tr>
										<td><?php echo $article->report_date;?></td>
										<td><?php echo $article->category;?></td>
										<td><?php echo $article->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/articles/'.$article->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>								
								</table>							
							</div>
							
							
							
							<div class="tab-pane" id="ipo_watch_report_tab">
								<br/>
								<h4></h4>

								
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Company</th>
										<th>Subscription Date</th>
										<th>IPO Type</th>
										<th>IPO Method</th>
										<th>Source</th>
										<th>Download Prospectus</th>
									</tr>
									<?php $ipos = $this->load->get_var("ipo");
									foreach($ipos as $ipo){
									?>
									<tr>
									    <td><?php echo $ipo->company_name;?></td>
										<td><?php echo $ipo->entry_date;?></td>
										<td><?php echo $ipo->ipo_type;?></td>
										<td><?php echo $ipo->ipo_method;?></td>											
										<td><?php echo $ipo->source;?></td>										
										
										<td><a target="_blank" href="<?php echo base_url().'reports/ipo/'.$ipo->file_name;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
							
										
									</tr>
									<?php } ?>
								</table>
								
								
								
								<!-- Modal -->
								<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								  <div class="modal-dialog">
									<div class="modal-content">
									  <div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel"></h4>
									  </div>
									  <div class="modal-body">
										 <div id="ipo_modal_div"></div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
									  </div>
									</div>
								  </div>
								</div>
								

								
							</div>
							
							
							
							<div class="tab-pane" id="daily_overview_report_tab">
								<br/>
								<h4></h4>	
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>
									
									<?php $dailys = $this->load->get_var("daily");
									foreach($dailys as $daily){
									?>
									<tr>
										<td><?php echo $daily->report_date;?></td>
										<td><?php echo $daily->category;?></td>
										<td><?php echo $daily->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/daily/'.$daily->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>								
								</table>							
							</div>
							
							
							
							<div class="tab-pane" id="weekly_overview_report_tab">
								<br/>
								<h4></h4>	
								<table class="display table-bordered table-striped table dataTable">
									<tr>
										<th>Date</th>
										<th>Category</th>
										<th>Source</th>
										<th>File</th>
									</tr>								
									<?php $weeklys = $this->load->get_var("weekly");
									foreach($weeklys as $weekly){
									?>
									<tr>
										<td><?php echo $weekly->report_date;?></td>
										<td><?php echo $weekly->category;?></td>
										<td><?php echo $weekly->source;?></td>
										<td><a target="_blank" href="<?php echo base_url().'reports/weekly/'.$weekly->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
									</tr>
									<?php } ?>								
								</table>							
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
	
	    $(".ipo_link").click(function(){
		   var slid = $(this).attr('id');
		   $.ajax({
		      type:"post" ,
			  url:"<?php echo site_url();?>/report_ui/ipo_title_story_search" ,
			  data:"row_id="+slid ,
			  cache:false ,
			  async:true ,
			  success:function(st){
			      //alert(st);
			    var s = st.split('#');
			    $("#myModalLabel").html(s[0]);
			    $("#ipo_modal_div").html(s[1]);
			  }
		   });
		   
		   
		});
	
	    $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
		
	});
	</script>	
</body>
</html>