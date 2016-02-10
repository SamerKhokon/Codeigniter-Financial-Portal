<?php $this->load->view("home/page_header_portion"); ?>
<?php  if($this->session->userdata('mb_usernames')){    ?>
<!-- main page -->
	
	<div class="well">	
			<h3 style="text-align:center;color:#428BCA;">Merchant Bank  Control Panel</h3>
			<span class="glyphicon glyphicon-user"></span>Online: <?php echo $this->session->userdata("mb_usernames");?> &nbsp;
			<a href="<?php echo site_url();?>/mb/logout/" ><span class="glyphicon glyphicon-off"></span>Logout</a>


				<?php //$this->load->view("mb/mb_megamenu"); ?>
				<!-- end megamenu -->
			
	</div>	
	
	<div class="container"> 
	    <div class="row">
	        <div class="col-md-3">
		      <!-- left menu -->
			  
					<!-- start accordion -->
                    <div class="accordion" id="myaccordion">                            
                        <div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#myaccordion" href="#first">
									Actions
								</a>
							</div>							
							<div id="first" class="accordion-body collapse in">
								<div class="accordion-inner">
									<!-- left menus -->
									<?php $this->load->view("mb/mb_leftmenu");?>
								</div>
							</div>                                
                        </div>
					</div>
					<!-- end accordion -->				  
			</div>
			<div class="col-md-9">
				
					<div id="user_list_table"></div>
				
			</div>
	   </div>
	</div>
				
	
	
	<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>		
	
	<script type="text/javascript">
		$(document).ready(function(){	
			var pg_ajax;	
            $(this).bind("contextmenu", function(e) {
                //e.preventDefault();
            });
        
			$("input[name='sub']").click(function(){
			    var sel_id= $(this).attr('id');
				$("#user_list_table").load("<?php echo site_url();?>/mb/"+sel_id,function(response , status , xhr){
				        xhr.abort();				    
				});
			});									
						
		});
	</script>	



<?php  }else{   ?>


	
	<br/><br/><br/>
	
	<div class="container">
	 
	  <div class="row">	    
	    <div class="col-md-4">&nbsp;</div>
		<div class="col-md-4">
		
		  <div class="panel panel-primary" id="headings">
            <div class="panel-heading">MB Iportal Control Panel</div>
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
				  <input type="password" class="form-control" style="width:200px;" id="password"/>
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
	
	<script type="text/javascript">
		$(document).ready(function(){
            var mb_ajx;
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
			   if(username==""){
					alert("Enter Username");
					$("#username").focus();
					return false;
				}else if(password==""){
					alert("Enter Password");
					$("#password").focus();
					return false;
				}else{
				   mb_ajx = $.ajax({
					  type:"post",
					  url:"<?php echo site_url();?>/mb/mb_login_check",
					  data:"username="+username+"&password="+password,
					  cache:false,
					  success:function(st)
					  {
					    //alert(st.substring(0,1)+ ' '+st);
					    if( st == 1){
							location.reload();
								//alert(st);
						}
						else
						{
						
						  alert("Please check your username or password");
						  
						  $("#username").val("");
						  $("#password").val("");
						  $("#username").focus();
						}
					  },complete:function(xhr , status){
					         mb_ajx = null;
					         mb_ajx.abort();
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
   
<?php }?>


</body>
</html>	  