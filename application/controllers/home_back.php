<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
    public function index()
	{
	   $this->load->view("site/capm_login_and_home_page");
	}
	
	public function capm_login_check()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		
		if($username=="capm" && $password == "capm@bd")
		{
			$this->session->set_userdata("CAPM_USER",$username);
			$this->session->set_userdata("IP",$_SERVER["REMOTE_ADDR"]);
			$this->session->set_userdata("LOGIN_TIME",date("Y-m-d h:i:s"));
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	
	public function logout()
	{
	   $this->session->unset_userdata("CAPM_USER");
	   $this->session->unset_userdata("IP");
	   $this->session->unset_userdata("LOGIN_TIME");
	   redirect("/home","refresh");
	}
	
	
	
	public function company_basic_info_ui()
	{
	    $this->load->model("input_form_data");
		$codes = $this->input_form_data->company_code_for_combo();
	?>   <br/>
			<table>
			<tr>		  
				<td>Select Company:&nbsp;
					<select id="basic_company_code" class="form-control">
					  <option value="">Select company</option>
					  <?php foreach($codes as $code){ ?>
						<option value="<?php echo $code->CODE;?>"><?php echo $code->CODE;?></option>
					  <?php } ?>
					</select>
				</td> 			
			</tr>
		   </table>
	     
		<br/>
		
		<div id="basic_info_result"></div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    $("#basic_company_code").bind("change",company_code_change);
			function company_code_change()
			{
			   var company_code = $("#basic_company_code").val();
			   if(company_code != "")
			   {
			      $("#basic_info_result").load("<?php echo site_url();?>/home/company_basic_info_load_by_ajax" 
				  ,{"company_code":company_code},function(st){ });
			   }
			   else
			   {
			      alert("Please select company!");
			   }
			}
			
		});
		</script>
	   
	<?php	
	}
	
	
	public function company_basic_info_load_by_ajax()
	{
	    error_reporting(0);
		$company_code = $this->input->post("company_code");
		$this->load->model("input_form_data");
	   
	
	   
		$basics = $this->input_form_data->get_company_basic_info($company_code);		
        $basics_parse = explode("#" , $basics);
		$name              = $basics_parse[0]; 
		$category 		   = $basics_parse[1]; 
		$company_purpose   = $basics_parse[2]; 
		$establishing_date = $basics_parse[3]; 
		$address           = $basics_parse[4]; 
		$telephone         = $basics_parse[5]; 
		$fax               = $basics_parse[6];
		$email             = $basics_parse[7];
		$website           = $basics_parse[8];
		$sector            = $basics_parse[9];	
		
		
		
		//echo $basics."<br/>";       
   
		$last_info = $this->input_form_data->get_last_info($company_code);
		$last_info_parse   = explode("#" , $last_info);
		$Last_Traded_Price = $last_info_parse[0];
		$Open_Price        = $last_info_parse[1];
		$Close_Price       = $last_info_parse[2];
		$Prev_Close_Price  = $last_info_parse[3];
		$Volume            = $last_info_parse[4];
		$Day_High          = $last_info_parse[5];
		$Day_Low           = $last_info_parse[6];		
		$last_updated      = date('Y-m-d h:i:s');
		 
		$price_diff = $Last_Traded_Price - $Prev_Close_Price;
		$percent    = ($Last_Traded_Price/$Prev_Close_Price)/100;
		$market_name = "Chittagong Stock Exchange";
		//echo $last_info."<br/>";
		
		$managements = $this->input_form_data->company_management_info_row($company_code);
		
?>

            <table>
			<tr>
				<td >
					<span style="font-family: tahoma,Arial;font-size:26px;"><?php echo $name.' ('.$company_code.')';?></span>				  
				</td>
			</tr>
			<tr>
				<td >
					<span style="font-family: tahoma,Arial;font-size:15px;"><?php echo $sector.' - '.$market_name ;?></span>				  
				</td>
			</tr>			
			</table>
			<table width="100%" style="font-family: tahoma,Arial;font-size:11px;">
				<tr>
					<td  style="border-left:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-top:1px solid #f1f1f1;">
						<span style="font-size:25px;">
							<?php							    
								echo number_format($Last_Traded_Price, 2, '.', '');
								if($price_diff<0)
								{
								  $color_class = "color:#B9000D;";
								  $sign = '-';
							?>	
							      <img src="<?php echo base_url();?>/img/arrow_red.gif"/>
							<?php	   
								}else{								   
								   $color_class = "color:#009441;";
								   $sign = '';
							?>
							      <img src="<?php echo base_url();?>/img/arrow_green.png"/>
							<?php
								}
							?>
						</span>
					</td>
					<td  style="border-bottom:1px solid #f1f1f1;border-top:1px solid #f1f1f1;">
					    <?php 
								
						?>
						<table>
						    <tr>
								<td><span style="<?php echo $color_class;?>"><?php echo number_format($price_diff, 2, '.', '');?>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
								<td><span style="<?php echo $color_class;?>"><?php echo $sign.''.number_format($percent, 2, '.', '').'%'; ?></span></td>
							</tr>							
							<tr>
								<td>Volume:&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><?php echo number_format($Volume, 2, '.', '');?></td>
							</tr>
							<tr>
							    <td>Open:&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td><?php echo number_format($Open_Price, 2, '.', '');?></td>
							</tr>	
						</table>
					</td>
					<td style="border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-right:1px solid #f1f1f1;"><br/>
						Last Updated : <?php echo $last_updated;?>
					</td>
					<td style="border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-right:1px solid #f1f1f1;"> Pre Close:<br/>
					    <span style="font-size:22px;"><?php echo number_format($Prev_Close_Price, 2, '.', '');?></span>
					</td>
					<td style="border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;border-right:1px solid #f1f1f1;"> 
						<table>
							<tr>
								<td>High<br/><?php echo number_format($Day_High, 2, '.', '');?></td>
								<td>&nbsp;&nbsp;&nbsp;</td>
								<td>Low<br/><?php echo number_format($Day_Low, 2, '.', '');?></td>
							</tr>
							<tr>
							    <td colspan="3">Open: <?php echo number_format($Open_Price, 2, '.', '');?></td>
							</tr>
						</table>	
					</td>
				</tr>
			</table>
			<br/>
			
			
			
		<?php
			
			$logo = $this->input_form_data->company_logo_finder($company_code);
			if($logo!="") {
			  $image_location = base_url()."company_logo/".$logo;
			  //echo "55";
			}else{
			  //echo "56";
			  $image_location = base_url()."company_logo/CompanyLogo.gif"; 
			}
			?>	
		<table width="100%" style="font-family:tahoma,Arial;font-size:11px;">	
		<tr>
			<td style="background-color:#f1f1f1;font-weight:bold;color:#009241;">&nbsp;Basic Information</td>
			<td>&nbsp;</td>
			<td style="background-color:#f1f1f1;font-weight:bold;color:#009241;">&nbsp;&nbsp;Management Information</td>
		</tr>
		<tr>
			<td>
			<table width="100%" style="font-family: tahoma,Arial;">

				<tr>
					<td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;">
					   <table width="100%">
					     <tr>
							<td><span style="color:#4B64B5;">Company Name:</span><?php echo $name; ?></td>
							<td><img src="<?php echo $image_location;?>"/></td>
						  </tr>	
					   </table>
					</td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#F6FAFD;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Company Purpose:</span> <?php echo $company_purpose; ?></td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Establishing Date:</span> <?php echo $establishing_date; ?></td>
				</tr>	
				<tr>
				   <td colspan="2" style="background-color:#F6FAFD;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Address:</span> <?php echo $address; ?></td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Phone:</span> <?php echo $telephone; ?></td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#F6FAFD;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Fax:</span> <?php echo $fax; ?></td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Email: <?php echo $email; ?></td>
				</tr>
				<tr>
				   <td colspan="2" style="background-color:#F6FAFD;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Website: <?php echo $website; ?></td>
				</tr>				
			</table>
			</td>
			<td>&nbsp;</td>
			<td>
			<table width="100%">
			  <tr>

			  </tr>
			  <tr>
				   <td colspan="2" style="background-color:#F6FAFD;font-family: tahoma,Arial;">
				    <?php 
						if($managements!=""){ 
							echo $managements; 
						}else{
						   echo "&nbsp;";
						}
					?>
				   </td>
			  </tr>
			</table>
		    </td>
		</tr>
		</table>
		<?php
	}
	
	public function management_info_ui()
	{
	
	     $this->load->model("input_form_data");
		 $codes = $this->input_form_data->company_code_for_combo();
	?>
	   <br/>
	   <table>
	    <tr>		  
			<td>Select Company:&nbsp;
				<select id="mng_company_code" class="form-control">
				  <option value="">Select company</option>
				  <?php foreach($codes as $code){ ?>
					<option value="<?php echo $code->CODE;?>"><?php echo $code->CODE;?></option>
				  <?php } ?>
				</select>
			</td> 			
		</tr>
	   </table>
	   <div id="mng_result"></div>
	   <script type="text/javascript">
		$(document).ready(function(){
		    $("#mng_company_code").change(function(){
				var sid = $("#mng_company_code").val();
				if(sid!="") {
					$("#mng_result").load("<?php echo site_url();?>/home/company_management_info_search",
					{"company_code":sid},function(){});
					//alert(sid);
				}else{			   
				   $("#mng_result").html("");
				   alert("Please select company");
				}
			});
		});
		</script>
	<?php 
	}
	
	
	public function company_management_info_search()
	{
	   $company_code = $this->input->post("company_code");
	   $this->load->model("input_form_data");
	   echo $tables = $this->input_form_data->company_management_info_row($company_code);	   
	}
	
	public function daily_top_ui()
	{
	?> <br/>
	   <table width="60%">
		<tr>
			
			<td><input type="checkbox" name="chk" class="chk" id="gainer" value="gainer"/>Select Top Gainer By</td>
				<td>&nbsp;</td>			
			<td><input type="checkbox" name="chk" class="chk" id="looser" value="looser"/>Select Top Looser By</td>		  		    
				
		</tr>
        <tr>	   
		<td >
				<table id="gainer_table" class="tbl"  style="display:none;">
				<tr>
					<td>	
						<select id="gainer_search_key" class="form-control">
						  <option value="">Select anyone</option>
						  <option value="dailytop_gainer_by_change">Change%</option>
						  <option value="dailytop_gainer_by_volume">Volume</option>
						  <option value="dailytop_gainer_by_value">Value</option>
						  <option value="dailytop_gainer_by_no_of_trades">No of Trades</option>
						  <option value="dailytop_gainer_by_pe">P/E</option>
						</select>
					</td> 
				</tr>
				</table>		  
		</td>
		<td >
			<table id="looser_table" class="tbl" style="display:none;">
			<tr>
			  <td>	
					<select id="looser_search_key" class="form-control">
					  <option value="">Select anyone</option>
					  <option value="dailytop_looser_by_change">Change%</option>
					  <option value="dailytop_looser_by_volume">Volume</option>
					  <option value="dailytop_looser_by_value">Value</option>
					  <option value="dailytop_looser_by_no_of_trades">No of Trades</option>
					  <option value="dailytop_looser_by_pe">P/E</option>
					</select>
			  </td> 
			</tr>
			</table>				
		</td>
	   </tr>
	    
	   </table>
	   <input type="hidden" id="sel_flag" value=""/>
	   <div id="search_result"></div>
	    
	   <script type="text/javascript">
		$(document).ready(function(){
			$("input[name='chk']").click(function(){
		      var len = $("input[name='chk']:checked").length;
			  var sel_id = $(this).attr('id');
				if(len>0){
					$(".chk").each(function(){
						if(sel_id == $(this).attr('id')) {
						  $(this).attr('checked',true);
						  $(".tbl").css({"display":"none"});
						  $("#"+sel_id+"_table").show();
						  //alert(sel_id+"_table");
						  $("#gainer_search_key").val("");
						  $("#looser_search_key").val("");						  
						  $("#search_result").html("");
						  $("#sel_flag").val(sel_id);
						  
						}
						else
						{
							$(this).attr('checked',false);						
						}
					});
				}else{
				   $("input[name='chk']").attr('checked',false);
				   $(".tbl").css({"display":"none"});
				   $("#sel_flag").val("");
				   $("#search_result").html("");
				   $("#gainer_search_key").val("");
				   $("#looser_search_key").val("");
				}
		    });
			
			
			
			
			
			$("#looser_search_key").change(function(){
			    var sid = $("#looser_search_key").val();
				if(sid!="") {
				$("#search_result").load("<?php echo site_url();?>/dailytop_looser/"+sid,function(){});
				}else{
					$("#search_result").html("");
				  alert("Please select anyone");
				}
			});
			
			$("#gainer_search_key").change(function(){
			    var sid = $("#gainer_search_key").val();
				if(sid!="") {
				   //alert(sid);
					$("#search_result").load("<?php echo site_url();?>/dailytop_gainer/"+sid,function(){});
				}else{
				  $("#search_result").html("");				
				  alert("Please select anyone");
				}
			});
			
			
		});
	   </script>
	<?php 
	}
	
	
	
}	
?>