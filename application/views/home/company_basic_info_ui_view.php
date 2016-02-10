<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home  <?php //$d = "2014-01-25";  echo date('D' , strtotime($d)); ?></title>

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
				
				
				
				
			
				<table>
					<tr><td>Company:&nbsp;</td>
						<td>
							<select id="comp_id" style="border:1px solid #999966;width:120px;">
								<option value="">select company</option>						 
								<?php  
								$codes = $this->load->get_var("codes");
								foreach($codes as $code)
								{
								?>			 
									<option value="<?php echo $code->CODE;?>"><?php echo $code->CODE;?></option>
								<?php     
								}
								?>
							</select>
						</td>
					</tr>
				</table>			
			
				<div id="basic_info_result"></div>

		</div><!---the bottom tens---->

    </div>
</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">
$(document).ready(function() {

    $("#comp_id").change(function()
	{	
	    var sid  = $(this).val();
	    //alert(sid);
		
	    if(sid!="")
	    {
			//$("#basic_info_result").load("<?php echo site_url();?>/company_basic_info_ui/ui",
			//{ "company_code":sid } , function(){});
			
			$.ajax({
			    type:"post" ,
			    url:"<?php echo site_url();?>/company_basic_info_ui/test" ,
			    
			    data:"company_code="+sid,
				async:true ,
			    cache:false ,			  
			    success:function(st){
			      $("#basic_info_result").empty();
				  $("#basic_info_result").html(st);
			      //alert(st);
			    }
			});
			
	    }
		else
		{
			$("#basic_info_result").empty();
	    }
	});

	$('#example').dataTable( {
		"aaSorting": [[ 1, "ASC" ]],
		"bPaginate": false
	});	

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

	$(".input-group.date").datepicker({ 
		autoclose: true, 
		//todayHighlight: true ,
		startDate: "24/09/2013",
		orientation: "bottom auto",
	});

	$('#dp4').datepicker({
		autoclose: true
    });
	
} );
</script>

<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!-- <script type="text/javascript" language="javascript" src="js/jquery.js"></script> -->

</body>
</html>