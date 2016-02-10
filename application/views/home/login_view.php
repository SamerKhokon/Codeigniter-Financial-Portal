<!DOCTYPE html>
<html>
	<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  
	  <meta name="keywords"    content="Bootstrap"/>
	  <meta name="description" content="Custom template making with bootstrap framework."/>	  
	  
	  <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet" media="screen">
  	 
	
	</head>
<body style="background:#efefef;">
    
	
	<br/><br/><br/>
	
	<div class="container">
	 
	  <div class="row">	    
	    <div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
		
		  <div class="panel panel-primary" id="headings">
            <div class="panel-heading">Iportal Sign In</div>
			<br/>
		    <table style="width:300px;margin-left:50px;" align="center">			
			<!-- <form style="width:400px;">-->
				<tr>
				<td><div class="form-group">
				  <label for="username">Username</label>
				  <input type="text" class="form-control" style="width:200px;" id="username" />
				</div>
				</td></tr>
				<tr><td>
				<div class="form-group">
				  <label for="password">Password</label>
				  <input type="password" class="form-control"  style="width:200px;" id="password"/>
				</div>
				</td></tr>
				<tr><td>
				<button type="button" class="btn btn-primary" id="signin">Login</button>
				&nbsp;<button type="button" class="btn btn-primary" id="signin_cancel">Cancel</button>
			    </td></tr>
				</table>
			<!-- </form>-->
			<br/>
		  </div>	
			
		</div> 
		<div class="col-md-4">&nbsp;</div>
		
		
	  </div>	   
	</div>
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	 <script src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
		   
            $(this).bind("contextmenu", function(e) {
                ///e.preventDefault();
            });
			
			$("#username").focus();
			$("#username").keypress(function(ex){
			  var username = $("#username").val();
			  if(ex.which == 13){
			   if(username==""){
				  alert("Enter Username");
					$("#username").focus();
					return false;
			   }else{
			     $("#password").focus(); 
			   }
			  }
			});
			
			$("#password").keypress(function(ex){
			  var password = $("#password").val();
			  if(ex.which == 13){
			   if(password==""){
				  alert("Enter Password");
					$("#password").focus();
					return false;
			   }else{
			     $("#signin").focus(); 
			   }
			  }
			});			
			
			$("#signin").click(function(){
			    var username = $("#username").val();
			    var password = $("#password").val();			   
		        var dataStr = "username="+username+"&password="+password;
					
			    if(username==""){
					alert("Enter Username");
					$("#username").focus();
					return false;
				}else if(password==""){
					alert("Enter Password");
					$("#password").focus();
					return false;
				}else{
				 //alert(dataStr);
					
					$.ajax({
					    type:"post" ,
					    url:"<?php echo site_url();?>/login/capm_login_check",
					    data:dataStr ,
						async:true ,
					    cache:false ,
					    success:function(st)
						{					       
						    //alert(st);
						    
							if(st==1)
							location.href="<?php echo site_url();?>/mains/";
						    else
							alert("Please check your username and password");
							$("#username").val("");
							$("#password").val("");
							$("#username").focus();
												   
					    }
					});
				}
			});
			
			$("#signin_cancel").click(function(){
				$("#username").val("");
				$("#password").val("");
				$("#username").focus();
			});
		});
	</script>	
</body>
</html>	     