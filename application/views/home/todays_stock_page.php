<?php  if($this->session->userdata('usernames')){  ?>
	<!DOCTYPE html>
<html>
  <head>
    <title> :: iportal innerpage :: </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <?php $this->load->view("graph_view/utility"); ?> 
  
  </head> 
  <body>    
	
	<div class="container">
	    <div class="row">
		  <?php $this->load->view("graph_view/header");?>
	    </div>
	    <div class="row">
			<div class="col-md-12">
				<!-- stock market updater -->
				<marquee loop="-1">stock market prices will be placed here stock market prices will be placed here 
					 stock market prices will be placed herestock market prices 
					 will be placed here stock market prices will be placed here
				</marquee>
			</div>		   
	    </div>
	   
	   <script type="text/javascript">
	    $(document).ready(function(){
		   $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
		    $(".inner_left_menu").click(function(){
			   var sel_id = $(this).attr("id");
			   //alert(sel_id);
			   $("#ultimate_content").load("<?php echo site_url();?>/cfq/"+sel_id,
			   function(){});
		    });
		});
	    </script>
	    <br/>
		<div class="row">
			<div class="col-md-12">					  
				<?php $this->load->view("graph_view/todays_market_top_menu");?>	 
			</div>			  
			<div class="col-md-4">		    
				<!-- left menu will be load 
					 on mouse over	--> 
				<div id="left_menu_load"></div>
				<?php $this->load->view("graph_view/todays_market_left_menu");?>
			</div>
			
			<div class="col-md-8">		    
				<!-- 
				 menu overview will be load
				 on mouse over
				 -->
				 
				<div id="menu_overview_load"></div>
				<table border="0" cellpadding="0" cellspacing="0">
					<tr ><th style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">menu overview:</th><td style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">This menu is a composition of various quantitative data(i.e. beta, correlation, capital gain, volatility) and fundamental info(EPS, NPAT history, management info). Also under this menu you will get the daily and weekly top gainers and loosers trade details. </td></tr>
					<tr><th style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">submenu overview:</th><td style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">Here company and sector wise beta will be shown for four(4) different time frame. </td></tr>
					<tr><th style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;">Guide:</th><td style="border-left:1px solid #000;border-right:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;"></td></tr>
				</table>   
				
				<script type="text/javascript">
				$(document).ready(function(){			
				  $("li#sub").click(function(){
					 var sid = $(this).attr('name');				
					 $("#sb li").css({'background-color':'red'});				 
				  });			  
				  $("li#sub").mouseenter(function(){			  
					 var did = $(this).attr('name');
					 $("#hsbc").html(did);
				  });			  
				});
				</script>
				<!--<ul class="nav nav-pills" id="sb">
				  <li id="sub" name="1" class="active"><a href="javascript:void(0);" >A</a></li>
				  <li id="sub" name="2" ><a href="javascript:void(0);" >B</a></li>
				  <li id="sub" name="3" ><a href="javascript:void(0);" >C</a></li>
				</ul>
				<div id="hsbc"></div>-->
				<br/>
				<!-- contents will load here -->
				<div id="ultimate_content">
					<!-- ultimate content -->				
				</div>				
			</div>
		</div>
	</div>  
	
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	
  </body>
</html>
<?php }else{
	   echo "<script type='text/javascript'>location.href='../';</script>";
	}?>