<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

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

			<?php $companies = $this->load->get_var('companies');	?>
			
			<table width="100%" style="margin-left:30px;">		
				<tr><td  colspan="4">Company</td></tr>					
				<tr>					    
					<td colspan="4">
						<select id="index_depth_company" style="width:220px;">
							
							<option value="">choose company</option>
							<?php $companies = $this->load->get_var('companies');  
							foreach($companies as $company)
							{
							?>
							
							<option value="<?php echo $company->code; ?>">
							<?php echo $company->code; ?>
							</option>
							
							<?php } ?>							
						</select>
					</td>								
				</tr>			
				
				<tr>
					<td><input type="button" class="btn btn-primary" id="index_depth_result" value="Show Result"/></td>
				</tr>
				</table>
				
				
				<br/>
				<table width="100%" style="margin-left:-120px;">
					<tr>
						<td>
							<div id="index_depth_data" ></div>
						</td>
					</tr>
				</table>
					
			
			
		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script type="text/javascript">

var xmlHttp
function showHint(str)
{
	
	if(str.length==0)
	{
	document.getElementById("index_depth_data").innerHTML="";
	return;
	}
	xmlHttp = GetXmlHttpObjectwidth();

	if(xmlHttp==null)
	{
	alert("Your browser does not support AJAX!");
	return;
	}
	var urlw="http://dsebd.org/bshis_new1_old.php";
	urlw=urlw+"?w="+str;
	urlw=urlw+"&sid="+Math.random();
	
	alert(urlw);
	
	xmlHttp.onreadystatechange=stateChangedwidth;
	xmlHttp.open("GET",urlw,true);
	xmlHttp.send(null);
}
function stateChangedwidth()
{
	if(xmlHttp.readyState==4)
	{
	document.getElementById("index_depth_data").innerHTML=xmlHttp.responseText;
	}
}
function GetXmlHttpObjectwidth()
{
	var xmlHttp=null;
	try
	{
		xmlHttp=new XMLHttpRequest();
	}
	catch(e)
	{
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch(e)
		{
		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
return xmlHttp;
}


$(document).ready(function() { 
		

	
	$("#index_depth_result").click(function()
	{
	    var index_depth_company = $("#index_depth_company").val();
		
		
		//var urlw="http://dsebd.org/bshis_new1_old.php";
		//urlw=urlw+"?w="+ encodeURI(index_depth_company);
		//urlw= urlw+"&sid="+Math.random();
		
	    if(index_depth_company!="") 
		{	 
            	
		    $.ajax({
		       type:"post" ,
			   url: "<?php echo site_url();?>/index_depth_ui/get_index_depth_data" ,
			   data:"company_id="+ index_depth_company ,
			   cache:false ,
			   async:true ,
			   success:function(st){
			      // alert(st);
			      $("#index_depth_data").html(st);
			   }
		    });
	    }else{
	      alert("Please select any sector");
	    }
	});	
	
	
    $('#accordion .panel-collapse').on('shown.bs.collapse', function () {
       $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
    });
	
    $('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
       $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
    });

});
</script>
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
http://lankabangla.duinvest.com/portal/DSE/getOrderBookBySymbol.html?w=BATBC&sid=0.07765011650943696
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>