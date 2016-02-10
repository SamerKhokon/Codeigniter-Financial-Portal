<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{

   public function myhome()
   {
   
      $this->load->view("home/inner_home_page");
   
   }



    public function index()
	{
	   $this->load->view("site/capm_login_and_home_page");
	}
	
	public function getsubmenu_overview()
	{  error_reporting(0);
	    $content = $this->input->post("content");
		$this->load->model("mb_data");
		echo $this->mb_data->get_submenu_overview($content);
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
				  ,{ "company_code":company_code } , function(st){ });
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
        $basics_parse 	   = explode("#" , $basics);
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
		
		$week_52           = $basics_parse[10];
		$year_end          = $basics_parse[11];
		
		
		$subsidiaries = $this->input_form_data->get_subsidiaries($company_code);	     
   
   
   
		$last_info 		   = $this->input_form_data->get_last_info($company_code);
		$last_info_parse   = explode("#" , $last_info);
		$Last_Traded_Price = $last_info_parse[0];
		$Open_Price        = $last_info_parse[1];
		$Close_Price       = $last_info_parse[2];
		$Prev_Close_Price  = $last_info_parse[3];
		$Volume            = $last_info_parse[4];
		$Day_High          = $last_info_parse[5];
		$Day_Low           = $last_info_parse[6];		
		$last_updated      = date('Y-m-d h:i:s');
		 
		$price_diff  = $Last_Traded_Price - $Prev_Close_Price;
		$percent     = ($Last_Traded_Price/$Prev_Close_Price)/100;
		
		$market_name = "Chittagong Stock Exchange";
	
	
	
		$share_info = $this->input_form_data->get_share_info($company_code);
		$share_info_parse = explode("#" , $share_info);
	    $total_share = $share_info_parse[0];
	    $market_cap = $share_info_parse[1];
	    $equity = $share_info_parse[2];	
		
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
			if($logo!="") 
			{
			  $image_location = base_url()."company_logo/".$logo;
			  //echo "55";
			}
			else
			{
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
					   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Year End:</span> <?php echo $year_end; ?></td>
					</tr>
					<tr>
					   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">52 Week Range:</span> <?php echo $week_52; ?></td>
					</tr>
					<tr>
					   <td colspan="2" style="background-color:#fff;font-family: tahoma,Arial;"><span style="color:#4B64B5;">Subsidiaries:</span> <?php echo $subsidiaries; ?></td>
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
	?> 
	    <br/>		
	    <input type="hidden" id="sel_flag" value=""/>
	    <div id="search_result"></div>   
	   
	    <?php 
		$this->load->model("dailytop_gainer_data"); 
		$this->load->model("dailytop_looser_data"); 		
		?>	
        <br/>		
	    <table width="100%">
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Price</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Price</th>
		</tr>
	    <tr>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
				</tr>
				<?php  $prices = $this->dailytop_gainer_data->dailytop_gainer_by_price();
					$i=0;
					foreach($prices as $price)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Prev_Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>">						    
							  <?php echo number_format($price->Percent_Change, 2, '.', '');?>%
						  </td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
				</tr>
				<?php  $lprices = $this->dailytop_looser_data->dailytop_looser_by_price();
					$i=0;
					foreach($lprices as $lprice)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Prev_Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Percent_Change, 2, '.', '');?>%</td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>			
		</tr>
		
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer by Volume</th>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser by Volume</th>
		</tr>
		
		<tr>
		<td>
            <table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
				</tr>
				<?php $gvolumes = $this->dailytop_gainer_data->dailytop_gainer_by_volume_data();
				   $i=0;
				   foreach($gvolumes as $gvolume)
				   {
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   			   
				?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $gvolume->company_code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($gvolume->volume, 2, '.', '');?></td>
				</tr>
				<?php } ?>
			</table>			
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td>	
		    <table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
				</tr>			
				<?php $lvolumes = $this->dailytop_looser_data->dailytop_looser_by_volume_data();
				   $i=0;
				   foreach($lvolumes as $lvolume){
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   			   
				?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $lvolume->company_code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($lvolume->volume, 2, '.', '');?></td>
				</tr>
				<?php } ?>			
			</table>
		</td>		
		</tr>
		
		
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer by Turnover</th>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser by Turnover</th>
		</tr>		
		<tr>
		<td>
            <table width="100%">
			<tr>
				<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
				<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
			</tr>
			<?php $gturnovers = $this->dailytop_gainer_data->dailytop_gainer_by_turnover_data();
			   $i=0;
			   foreach($gturnovers as $gturnover){
				   $i++;
				   if($i%2==0)
				   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
				   else
				   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
			?>
			<tr>
				<td style="<?php echo $css;?>"><?php echo $gturnover->company_code;?></td>
				<td style="<?php echo $css;?>"><?php echo number_format($gturnover->turnover, 2, '.', '');?></td>
			</tr>
			<?php } ?>
			</table>			
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td>	
		    <table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
				</tr>			
				<?php $lturnovers = $this->dailytop_looser_data->dailytop_looser_by_turnover_data();
				   $i=0;
				   foreach($lturnovers as $lturnover){
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
				?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $lturnover->company_code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($lturnover->turnover, 2, '.', '');?></td>
				</tr>
				<?php } ?>			
			</table>
		</td>		
		</tr>	


		
		
		
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer by PE</th>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser by PE</th>
		</tr>		
		<tr>
		<td>
            <table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">PE</th>
				</tr>
				<?php $gpes = $this->dailytop_gainer_data->dailytop_gainer_by_pe_data();
				   $i=0;
				   foreach($gpes as $gpe){
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
				?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $gpe->company_code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($gpe->pe, 2, '.', '');?></td>
				</tr>
				<?php } ?>
			</table>			
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td>	
		    <table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">PE</th>
				</tr>			
				<?php $lpes = $this->dailytop_looser_data->dailytop_looser_by_pe_data();
				   $i=0;
				   foreach($lpes as $lpe){
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
				?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $lpe->company_code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($lpe->pe, 2, '.', '');?></td>
				</tr>
				<?php } ?>			
			</table>
		</td>		
		</tr>			
		</table>
	    
	   <script type="text/javascript">
		$(document).ready(function(){
		
		    $("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
			{'keyword':'#'},function(){});
		
		
		
		    $("#gainer_search_key").bind("change",gainer_Table_Ordering);
			$("#looser_search_key").bind("change",looser_Table_Ordering);
		
		    function gainer_Table_Ordering()
			{
			    var  gsel_id = $("#gainer_search_key").val();
				 $("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
				{'keyword':gsel_id},function(){});
				//alert(gsel_id);
			}
			
			function looser_Table_Ordering()
			{   
			    var  lsel_id = $("#looser_search_key").val(); 
				 $("#search_result").load("<?php echo site_url();?>/home/trade_status_table",
				{'keyword':lsel_id},function(){});
				//alert(lsel_id);
			}
			
			$("#gainer_search_key").attr('disabled',true);
			$("#looser_search_key").attr('disabled',true);
			
			$("input[name='chk']").click(function(){
				var len = $("input[name='chk']:checked").length;
				var sel_id = $(this).attr('id');
				if(len>0)
				{
					$(".chk").each(function()
					{
						if(sel_id == $(this).attr('id')) 
						{
						   $(this).attr('checked',true);
						   $("#"+sel_id+"_search_key").attr('disabled',false);
						}
						else
						{
							$(this).attr('checked',false);						
							$("#"+$(this).attr('id')+"_search_key").attr('disabled',true);
						}
					});
				}
				else
				{
				   $("input[name='chk']").attr('checked',false);				   
				   $("#gainer_search_key").attr('disabled',true);
				   $("#looser_search_key").attr('disabled',true);
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
	
	
	
	public function weekly_top_ui()
	{
	?> 
	    <br/>		
	    <input type="hidden" id="sel_flag" value=""/>
	    <div id="search_result"></div>   
	   
	    <?php 
		$this->load->model("weeklytop_gainer_data"); 
		$this->load->model("weeklytop_looser_data"); 		
		?>	
        <br/>		
	    <table width="100%">
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Price</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Price</th>
		</tr>
	    <tr>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
				</tr>
				<?php  $prices = $this->weeklytop_gainer_data->dailytop_gainer_by_price();
					$i=0;
					foreach($prices as $price)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Prev_Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>">						    
							  <?php echo number_format($price->Percent_Change, 2, '.', '');?>%
						  </td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th  style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Prev Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Close Price</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>
				</tr>
				<?php  $lprices = $this->weeklytop_looser_data->dailytop_looser_by_percent_change();
					$i=0;
					foreach($lprices as $lprice)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Prev_Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Close_Price, 2, '.', '');?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Percent_Change, 2, '.', '');?>%</td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>			
		</tr>
		
		
		
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Volume</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Volume</th>
		</tr>
	    <tr>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
				</tr>
				<?php  $prices = $this->weeklytop_gainer_data->dailytop_gainer_by_volume_data();
					$i=0;
					foreach($prices as $price)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Volume, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>
				</tr>
				<?php  $lprices = $this->weeklytop_looser_data->dailytop_looser_by_volume_data();
					$i=0;
					foreach($lprices as $lprice)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Volume, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>			
		</tr>		
		
		
		
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		
		
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by Turnover</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by Turnover</th>
		</tr>
	    <tr>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
				</tr>
				<?php  $prices = $this->weeklytop_gainer_data->dailytop_gainer_by_turnover_data();
					$i=0;
					foreach($prices as $price)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->Turnover, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
				</tr>
				<?php  $lprices = $this->weeklytop_looser_data->dailytop_looser_by_turnover_data();
					$i=0;
					foreach($lprices as $lprice)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->Turnover, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>			
		</tr>
		
		
			
		<tr>
		<td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td> 
		</tr>
		
		
		<tr>
			<th style="background-color:#123456;color:#fff;">Top 10 Gainer  by No of Trades</th>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<th  style="background-color:#123456;color:#fff;">Top 10 Looser  by No of Trades</th>
		</tr>
	    <tr>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trades</th>
				</tr>
				<?php  $prices = $this->weeklytop_gainer_data->dailytop_gainer_by_no_of_trades_data();
					$i=0;
					foreach($prices as $price)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $price->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($price->No_of_Trades, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			<td>
				<table width="100%">
				<tr>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
					<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">No of Trades</th>
				</tr>
				<?php  $lprices = $this->weeklytop_looser_data->dailytop_looser_by_no_of_trades_data();
					$i=0;
					foreach($lprices as $lprice)
					{ 
					   $i++;
					   if($i%2==0)
					   $css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
					   else
					   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   					
				?>
						<tr>
						  <td style="<?php echo $css;?>"><?php echo $lprice->Company_Code;?></td>
						  <td style="<?php echo $css;?>"><?php echo number_format($lprice->No_of_Trades, 2, '.', '');?></td>
						</tr> 
				<?php 
					}
				?>
				</table>
			</td>			
		</tr>
		
				
		</table>
	    
	   <script type="text/javascript">
		$(document).ready(function(){
		
		    $("#search_result").load("<?php echo site_url();?>/home/weeklytrade_status_table",
			{'keyword':'#'},function(){});
		});
	   </script>
	<?php 
	}	
	
	//weeklytrade_status_table
	public function weeklytrade_status_table()
	{  error_reporting(0);
		$user_keyword = $this->input->post("keyword");
		$parse = explode("#", $user_keyword); 
		
		$field = $parse[0];
		$order = $parse[1];
		
		$this->load->model("weeklytop_gainer_data");
		$trades = $this->weeklytop_gainer_data->trade_status_table_data($field,$order);
		$this->load->view('utility');
?>
        <br/>
        <script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			/*$('#example').dataTable({					    
				"aaSorting": [[ 1 , "asc" ]],
				"aaSorting": [[ 2 , "asc", "desc" ]],
				"aaSorting": [[ 3 , "asc", "desc" ]],
				"aaSorting": [[ 4 , "asc", "desc" ]],
				"aaSorting": [[ 5 , "asc", "desc" ]],
				"sPaginationType": "full_numbers"
			});*/
		});
		</script>
		<div id="demo">
		<table width="100%"  cellpadding="0" cellspacing="0" border="0" class="display" id="example">
		<thead>
		<tr>
			<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Company Code</th>
			<!-- <th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Price</th> -->
			<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Turnover</th>
			<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">Volume</th>			
			<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;text-align:center;">No of Trades</th>						
			<th style="background-color:#ABC;font-family: tahoma,Arial;font-size:12px;">%Change</th>			
		</tr>
		</thead>
		<tbody>
	<?php 	
	    $i=0;	
		foreach($trades as $trade)
		{
		    $i++;
			if($i%2==0)
			$css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
			else
			$css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
 
?>		
			<tr class="gradeA">
				<td style="<?php echo $css;?>"><?php echo $trade->Company_Code;?></td>
				<!-- <td style="<?php //echo $css;?>"><?php // echo number_format($trade->Last_Traded_Price, 2, '.', '');?></td> -->
				<td style="<?php echo $css;?>"><?php echo number_format($trade->Turnover, 2, '.', '') ;?></td>
				<td style="<?php echo $css;?>"><?php echo number_format($trade->Volume, 2, '.', '');?></td>
				<td style="<?php echo $css;?>text-align:center;"><?php echo number_format($trade->No_of_Trades, 0, '.', '');?></td>
				<td style="<?php echo $css;?>">
				   <?php if($trade->Percent_Change <0 ){?>	
					<span style="color:#B9000D;"><?php echo number_format($trade->Percent_Change, 2, '.', '');?>%</span>   
				   <?php }else{?>
					<span style="color:green;"><?php echo number_format($trade->Percent_Change, 2, '.', '');?>%</span>   
				   <?php }?>	
				</td>
			</tr>	
		<?php 	
		}
		?>
		</tbody>
		</table>
		</div>
		<br/><br/>		
	<?php 	
	}
	
	
	
	
	
	
	
	
	public function divident_details_ui()
	{
	    $this->load->model("input_form_data");
		$codes1 = $this->input_form_data->company_code_for_combo();
		
	?>	
	    
		<br/><br/>
		
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#999966;font-family: tahoma,Arial;">Option 1</div>
			<div class="panel-body">
				<table width="100%">
					<tr>
					  <td><input type="checkbox" name="divident_details_years" value="2000"/>&nbsp;2000</td>
					  <td><input type="checkbox" name="divident_details_years" value="2001" />&nbsp;2001</td>
					  <td><input type="checkbox" name="divident_details_years" value="2002" />&nbsp;2002</td>
					  <td><input type="checkbox" name="divident_details_years" value="2003" />&nbsp;2003</td>
					</tr> 
				</table>		
				<table width="100%">
					<tr>
					  <td><select id="company_code_01" class="form-control">
					      <option value="">select company</option>
						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_02" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_03" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_04" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					</tr> 
					<tr>
					  <td><select id="company_code_05" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_06" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_07" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_08" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					</tr> 
					<tr>
					  <td><select id="company_code_09" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_10" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_11" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_12" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					</tr> 
					<tr>
					  <td><select id="company_code_13" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_14" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_15" class="form-control">
					  <option value="">select company</option>
						  						  <?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					  <td><select id="company_code_16" class="form-control">
					  <option value="">select company</option>
						<?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select></td>
					</tr> 
					<tr>
						<td>
							<select id="company_code_17" class="form-control">	
							<option value="">select company</option>
							<?php foreach($codes1 as $code1){ ?>
						  <option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select>
						</td>
						<td>
							<select id="company_code_18" class="form-control">
							<option value="">select company</option>
						  	<?php foreach($codes1 as $code1){ ?>
							<option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select>
						</td>
						<td>
							<select id="company_code_19" class="form-control">
							<option value="">select company</option>
						  		<?php foreach($codes1 as $code1){ ?>
								<option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>						  
						  </select>
						</td>
						<td>
							<select id="company_code_20" class="form-control">
							<option value="">select company</option>
						  		<?php foreach($codes1 as $code1){ ?>
								<option value="<?php echo $code1->CODE;?>"><?php echo $code1->CODE;?></option>
						  <?php } ?>
						  </select>
						</td>
					</tr> 	
					<tr><td colspan="4">
					<input type="button" class="btn btn-primary" id="divident_detail_show_result_option_01" value="Show Result"/>
					</td></tr>
				</table>
		
			</div>
		</div>
		
		<div id="divident_search_result_option_001"></div>
		
		
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#999966;font-family: tahoma,Arial;">Option 2</div>
			<div class="panel-body">
			
			    <table width="100%">
					<tr>
					  <td><input type="checkbox" name="option_2" value="2000"/>&nbsp;2000</td>
					  <td><input type="checkbox" name="option_2" value="2001"/>&nbsp;2001</td>
					  <td><input type="checkbox" name="option_2" value="2002"/>&nbsp;2002</td>
					  <td><input type="checkbox" name="option_2" value="2003"/>&nbsp;2003</td>
					</tr>
					<tr>
					  <td>Sector:</td>
					  <td>
					  <?php  $sects = $this->input_form_data->get_sectors();?>
						<select id="sector_id" class="form-control">
						   <option value="">select sector</option>
						   <?php foreach($sects as $sect){?>
						   <option value="<?php echo $sect->SECTOR;?>"><?php echo $sect->SECTOR;?></option>
						   <?php } ?>
						</select>						  
					  </td>
					  <td colspan="2">&nbsp;</td>
					</tr>
					<tr>
					 <td><input type="button" class="btn btn-primary" id="option_two_search_result_btn" value="Show Result"/></td>
					</tr>
				</table>	  
			  
			</div>
		</div>
		
		<div id="divident_search_result_option_002"></div>
		
		<div class="panel panel-default">
			<div class="panel-heading"  style="background-color:#999966;font-family: tahoma,Arial;">Option 3</div>
			<div class="panel-body">
			
			    <table width="100%">
					<tr>
					  <td><input type="checkbox" name="all_index" id="all_index" value="all_index"/></td>					
					</tr>
					<tr>
					<td><input type="button" id="divident_search_result_option_03_btn" class="btn btn-primary" value="Show Result"/></td>
					</tr>
				</table>	  
			  
			</div>
		</div>
		
		<div id="divident_search_result_option_003"></div>
		
		
		<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
		<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
		<div id="divident_search_graph"></div>
		
		
		<div id="divident_common_result"></div>
		
		
		
		<script type="text/javascript">
		$(document).ready(function(){
		/**
		** divident detail
		**/
		
		
		
		    $("#option_two_search_result_btn").bind("click",option_two_search_result_btn);
			
			function option_two_search_result_btn()
			{
			    var years = [];
				$("input[name='option_2']").each(function(){
					if($(this).is(':checked')==true){
						years.push($(this).val());
					}	
				}); 
				var sector_id= $("#sector_id").val();
				
				if(sector_id=="") {
				   alert("select sector");
				   return false;
				}else if(years.length==0){
				   alert("Select Year");
				   return false;
				}else{
					$.ajax({
						type:"post",
						url:"<?php echo site_url();?>/home/option_two_search_json",
						data:"years="+years+"&sector_id="+sector_id,
						dataType:'json' ,
						cache:false ,
						success:function(st){
						   
							var yrr = st[0].cats;
							var cm = st[st.length-1].coms;
							alert(cm);
							var t = [];
							$.each(st, function(k,v){
							    if(k>0 && k<st.length) {
								   t.push(v);
								}
							});
							
							
							var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_002'
								},
								title:'',
								
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 /*[
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]*/
							});
											
							
						}
					});
				}
				
				$("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_two_search_result",
				{'years':years,'sector_id':sector_id},
				function(){});
				
				//alert(years+'  '+sector_id);
			}
		
		    $("#divident_search_result_option_03_btn").bind("click" , divident_search_result_option_03_btn);
		    function divident_search_result_option_03_btn()
		    {	        
			
			    $.ajax({ 
						type:"post",
						url:"<?php echo site_url();?>/home/all_companies_index_json" ,
						data:"1=1",
						cache:false,
						dataType:'json',
						success:function(st){
						    
							var cm = st[st.length-1].coms;
							var t = [];
							$.each(st , function(k,v){
							   if(k<st.length){
							     t.push(v);
							   }
							});
							
							
							var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_003'
								},
								title:'',
								
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 /*[
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]*/
							});
							
							
							
						}
					});
			  
				$("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_three_search_result",
						function(){});
			}
		
		
		   $("#divident_detail_show_result_option_01").bind("click", divident_detail_show_result_option_01);
		    function divident_detail_show_result_option_01()
		    {
		        $("#divident_search_result_option_001").html("");
				 var company_code_01 = $("#company_code_01").val();
				 var company_code_02 = $("#company_code_02").val();
				 var company_code_03 = $("#company_code_03").val();
				 var company_code_04 = $("#company_code_04").val();
				 var company_code_05 = $("#company_code_05").val();
				 var company_code_06 = $("#company_code_06").val();
				 var company_code_07 = $("#company_code_07").val();
				 var company_code_08 = $("#company_code_08").val();
				 var company_code_09 = $("#company_code_09").val();
				 var company_code_10 = $("#company_code_10").val();
				 var company_code_11 = $("#company_code_11").val();
				 var company_code_12 = $("#company_code_12").val();
				 var company_code_13 = $("#company_code_13").val();
				 var company_code_14 = $("#company_code_14").val();
				 var company_code_15 = $("#company_code_15").val();
				 var company_code_16 = $("#company_code_16").val();
				 var company_code_17 = $("#company_code_17").val();
				 var company_code_18 = $("#company_code_18").val();
				 var company_code_19 = $("#company_code_19").val();
				 var company_code_20 = $("#company_code_20").val();			 	 
			  
			 
				var years = [];
				$("input[name='divident_details_years']").each(function(){
					if($(this).is(':checked')==true){
						years.push($(this).val());
					}	
				}); 
			 
				if(years.length>0)
				{	
					var dt = [];					
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/home/tt" ,
					   data:"years="+years+"&company_code_01="+company_code_01+
					   "&company_code_02="+company_code_02+
					   "&company_code_03="+company_code_03+
					   "&company_code_04="+company_code_04+
					   "&company_code_05="+company_code_05+
					   "&company_code_06="+company_code_06+
					   "&company_code_07="+company_code_07+
					   "&company_code_08="+company_code_08+
					   "&company_code_09="+company_code_09+
					   "&company_code_10="+company_code_10+
					   "&company_code_11="+company_code_11+
					   "&company_code_12="+company_code_12+
					   "&company_code_13="+company_code_13+
					   "&company_code_14="+company_code_14+
					   "&company_code_15="+company_code_15+
					   "&company_code_16="+company_code_16+
					   "&company_code_17="+company_code_17+
					   "&company_code_18="+company_code_18+
					   "&company_code_19="+company_code_19,
					   dataType:"json" ,
					   success:function(st){
					      var yrr = st[0].cats;
						  var cm = st[1].coms;
						  
					     
						  var t = [];
					      $.each(st,function(k,v){
						    if(k>1){
								t.push(v);
						    }
						  });
						  //alert(t);
						  
						  
						 
						   var chart = new Highcharts.Chart({    
								chart: {
									type: 'column',
									renderTo: 'divident_search_result_option_001'
								},
								title:'',
								
								xAxis: {
									categories: cm,//['Jan', 'Feb', 'Mar'],
									labels:{rotation:-55},
								},								
								plotOptions: {
									series: {
										stacking: 'normal'
									}
								},
                                exporting:{enabled:false},
								credits:{enabled:false},
								series: t
								
								 /*[
									{
										name: 'base',
										data: [10, 20, 30]
									},
									{
										name: 'sec',
										data: [30, 20, 10]
									}
								]*/
							});
											  
						  
						  //alert(t);
					   }					   
					});				
				}
				else
				{
					$("#divident_search_result_option_001").html("");	
				} 
			 
			 
		     $("#divident_common_result").load("<?php echo site_url();?>/home/divident_detail_option_one_search_result",
			 {"years":years,"company_code_01":company_code_01, "company_code_02":company_code_02,
			 "company_code_03":company_code_03, "company_code_04":company_code_04,
			 "company_code_05":company_code_05, "company_code_06":company_code_06,
			 "company_code_07":company_code_07, "company_code_08":company_code_08,
			 "company_code_09":company_code_09, "company_code_10":company_code_10,
			 "company_code_11":company_code_11, "company_code_12":company_code_12,
			 "company_code_13":company_code_13, "company_code_14":company_code_14,
			 "company_code_15":company_code_15, "company_code_16":company_code_16,
			 "company_code_17":company_code_17, "company_code_18":company_code_18 ,
			 "company_code_19":company_code_19, 
			 "company_code_20":company_code_20} , function(){});
			 
			 
		    }
		});
		</script>
	<?php
	}
	
	
	public function tt()
	{
	   
		$years           =  $this->input->post("years");
		
		$company_code_01 =  $this->input->post("company_code_01");		
		$company_code_02 =  $this->input->post("company_code_02");
		$company_code_03 =  $this->input->post("company_code_03");
		$company_code_04 =  $this->input->post("company_code_04");
		$company_code_05 =  $this->input->post("company_code_05");
		
		
		$company_code_06 =  $this->input->post("company_code_06");
		$company_code_07 =  $this->input->post("company_code_07");
		$company_code_08 =  $this->input->post("company_code_08");
		$company_code_09 =  $this->input->post("company_code_09"); 
		$company_code_10 =  $this->input->post("company_code_10");
		
		$company_code_11 =  $this->input->post("company_code_11"); 
		$company_code_12 =  $this->input->post("company_code_12");
		$company_code_13 =  $this->input->post("company_code_13"); 
		$company_code_14 =  $this->input->post("company_code_14");
		$company_code_15 =  $this->input->post("company_code_15"); 
		$company_code_16 =  $this->input->post("company_code_16");
		$company_code_17 =  $this->input->post("company_code_17");
		$company_code_18 =  $this->input->post("company_code_18");
		$company_code_19 =  $this->input->post("company_code_19"); 
		$company_code_20 =  $this->input->post("company_code_20");
			
			
		
		$companies = array($company_code_01,
		$company_code_02,
		$company_code_03,
		$company_code_04,
		$company_code_05,
		$company_code_06,
		$company_code_07,
		$company_code_08,
		$company_code_09,
		$company_code_10,
		$company_code_11,
		$company_code_12,
		$company_code_13,
		$company_code_14,
		$company_code_15,
		$company_code_16,
		$company_code_17,
		$company_code_18,
		$company_code_19, 
		$company_code_20);
		
	
		
		
		$c = array();
		$cm = "";
		foreach($companies as $k=>$v)
		{
		    if($v!="") 
			{
				$c[] = $v;
				$cm .= "'".$v."',";
			}
		}
		$cm = substr($cm ,0,strlen($cm)-1);
		
	   
	    $t[] =  array("cats" => $years);	   
	    $t[] = 	array("coms" => $c);
				
		$p = explode(",",$years);

			for($i=0 ; $i < count($p) ; $i++ )
			{
				if($p[$i]!="") 
				{
				    $this->load->model('divident_details_json_data');
					$vals = $this->divident_details_json_data->ty($p[$i],$cm);
								
								
					  
					   $data = array();
					    foreach($vals as $r)
					    {
						   $int_cash  = (float)$r->INTERIM_DIVIDEND_CASH;
						   $int_stock = (float)$r->INTERIM_DIVIDEND_STOCK;
						   $total_int = $int_cash+$int_stock;
						   
						   $fin_cash  = (float)$r->FINAL_DIVIDEND_CASH;
						   $fin_stock = (float)$r->FINAL_DIVIDEND_STOCK;
						   $total_fin = $fin_cash+$fin_stock;
						   
							if($total_int!=0 && $total_fin!=0)
							{
								$data[] = $total_fin;
							}
							else if($total_int!=0 && $total_fin==0)
							{
								$data[] = $total_int;
							}
					    }			
								
                    //print_r($data);					
                  					$t[] = array( "name"=>$p[$i] , "data"=>$data );	
				}
			}
		
		//print_r(t);	
	    echo json_encode($t);
	}
	
	
	
	public function option_two_search_json()
	{
	    $years      =$this->input->post("years");
		$sector    = $this->input->post("sector_id");
		
		//$years      ="2000";
		//$sector    = "Bank";
	
	    $t[] =  array("cats" => $years);
	      
		  
		  
		  
		$p = explode(",",$years);
		for($i=0;$i<count($p);$i++) {
		   if($p[$i]!="")
		   {
			$this->load->model('divident_details_json_data');
			$vals = $this->divident_details_json_data->option_two_json_data($sector , $years);
			foreach($vals as $r)
			{
				$codes     = $r->COMPANY_CODE;
				$yr        = $r->YEAR;
				$int_cash  = (float)$r->INTERIM_DIVIDEND_CASH;
				$int_stock = (float)$r->INTERIM_DIVIDEND_STOCK;
				$total_int = $int_cash+$int_stock;
			   
				$fin_cash  = (float)$r->FINAL_DIVIDEND_CASH;
				$fin_stock = (float)$r->FINAL_DIVIDEND_STOCK;
				$total_fin = $fin_cash+$fin_stock;
			   
				$c[] = $codes;
				if($total_int!=0 && $total_fin!=0)
				{
					$t[] = array("name"=>array($p[$i]) ,"data"=> array($total_fin));
				}
				else if($total_int!=0 && $total_fin==0)
				{
					$t[] = array("name"=>array($p[$i]),"data"=>array($total_int));
				}		
			}
			}
		}	
			$t[] = array("coms"=>$c);
			
		echo json_encode($t);
	}
	


    public function all_companies_index_json()
    {
	    $this->load->model('divident_details_json_data');
	    $vals = $this->divident_details_json_data->option_three_json_data();
		foreach($vals as $r)
		{
			$codes     = $r->COMPANY_CODE;
			$yr        = $r->YEAR;
			$int_cash  = (float)$r->INTERIM_DIVIDEND_CASH;
			$int_stock = (float)$r->INTERIM_DIVIDEND_STOCK;
			$total_int = $int_cash+$int_stock;
		   
			$fin_cash  = (float)$r->FINAL_DIVIDEND_CASH;
			$fin_stock = (float)$r->FINAL_DIVIDEND_STOCK;
			$total_fin = $fin_cash+$fin_stock;
		   
			$c[] = $codes;
			if($total_int!=0 && $total_fin!=0)
			{
				$t[] = array("name"=>array($yr) ,"data"=> array($total_fin));
			}
			else if($total_int!=0 && $total_fin==0)
			{
				$t[] = array("name"=>array($yr),"data"=>array($total_int));
			}		
		}
		$t[] = array("coms"=>$c);
		
	    echo json_encode($t);
	}	

	
	
	public function divident_detail_option_two_search_result()
	{
	    $sector_sel = $this->input->post("sector_id");
	    $years      = $this->input->post("years");
	   
	    $y = "";
	    foreach($years as $k=>$v){
		  if($v!=""){
			$y .= (int)$v .',';
		   }
		}
		$y = substr($y,0,strlen($y)-1);	   
		
		$this->load->model('divident_details_data');		
	    $dts = $this->divident_details_data->divident_cash_for_a_sector($sector_sel,$y);
		
		
		
		
		
	?>
	<table  width="100%">
		<tr>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="background-color:#669999;color:#fff;text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="background-color:#3399ff;color:#fff;text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="background-color:#999966;color:#fff;text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="background-color:#339900;color:#fff;text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="background-color:#993300;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="background-color:#E2A76F;color:#fff;text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="background-color:#FFA62F;color:#fff;text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		<?php
			foreach($dts as $or)
			{
				$interim 		= (float)$or->INTERIM_DIVIDEND_CASH;
				$final   		= (float)$or->FINAL_DIVIDEND_CASH;		   
				$interim_stock 	= (float)$or->INTERIM_DIVIDEND_STOCK;
				$final_stock   	= (float)$or->FINAL_DIVIDEND_STOCK;		   
				$div_year 		= (int)$or->YEAR;
				$company_code 	= $or->COMPANY_CODE;		   
				$interim_declare_date =  $or->INTERIM_DIVIDEND_DECLARATION_DATE;
				$final_declare_date   =  $or->FINAL_DIVIDEND_DECLARATION_DATE;
				
				
			$company_eps     	 = $this->divident_details_data->eps_of_a_company($div_year , $company_code);
		    $last_date_price = $this->divident_details_data->get_last_traded_price();		   
		    $vals 			 = $this->divident_details_data->get_sector_category($company_code);
		    $parse 				 = explode("#",$vals);
		   
		   $code     = $parse[0];
		   $category = $parse[1];
		   $sector   = $parse[2];		  
		   
		    if($final!="" && $interim!="") 
			{
			    if($company_eps=="" || $company_eps==0)
				{
				$payout_ratio     =0;
				}
				else
				{
				$payout_ratio     = $final /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0)
				{
				$divident_yield   = 0;
				}
				else
				{
				$divident_yield   = $final/$last_date_price;
				}
				
				$divident_cash    = $final;
				$divident_stock   = $final_stock;
				$declaration_date = $final_declare_date;
		    }
			else if($final=="" && $interim!="")
			{
			    if($company_eps=="" || $company_eps==0)
				{
					$payout_ratio     = 0;
				}else{
					$payout_ratio     = $interim /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0)
				{
					$divident_yield   =0;
				}else{
					$divident_yield   = $interim/$last_date_price;
				}
				
				$divident_cash    = $interim;
				$divident_stock   = $interim_stock;
				$declaration_date = $interim_declare_date;
		    }			
			
				
				
		?>		
			<tr>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $company_code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $sector_sel;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declaration_date;?></td>
			</tr>
		
		
		<?php } ?>
	</table>	
	<?php
	//echo 1;
	}	
	
	
	
	
	
	
	
	public function divident_detail_option_three_search_result()
	{  
	error_reporting(0);
	?>
	   <table  width="100%">
		<tr>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="background-color:#669999;color:#fff;text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="background-color:#3399ff;color:#fff;text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="background-color:#999966;color:#fff;text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="background-color:#339900;color:#fff;text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="background-color:#993300;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="background-color:#E2A76F;color:#fff;text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="background-color:#FFA62F;color:#fff;text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		
		<?php  
		    $this->load->model('divident_details_data');
		    $dtas = $this->divident_details_data->divident_cash_find_for_all_index();	
			foreach($dtas as $or)
			{
				$interim 		= (float)$or->INTERIM_DIVIDEND_CASH;
				$final   		= (float)$or->FINAL_DIVIDEND_CASH;		   
				$interim_stock 	= (float)$or->INTERIM_DIVIDEND_STOCK;
				$final_stock   	= (float)$or->FINAL_DIVIDEND_STOCK;		   
				$div_year 		= (int)$or->YEAR;
				$company_code 	= $or->COMPANY_CODE;		   
				$interim_declare_date =  $or->INTERIM_DIVIDEND_DECLARATION_DATE;
				$final_declare_date   =  $or->FINAL_DIVIDEND_DECLARATION_DATE;
				
		    $company_eps     	 = $this->divident_details_data->eps_of_a_company($div_year , $company_code);
		    $last_date_price = $this->divident_details_data->get_last_traded_price();		   
		    $vals 			 = $this->divident_details_data->get_sector_category($company_code);
		   $parse 				 = explode("#",$vals);
		   
		   $code     = $parse[0];
		   $category = $parse[1];
		   $sector   = $parse[2];		  
		   
		    if($final!="" && $interim!="") 
			{
				$payout_ratio     = $final /$company_eps;
				$divident_yield   = $final/$last_date_price;
				$divident_cash    = $final;
				$divident_stock   = $final_stock;
				$declaration_date = $final_declare_date;
		    }
			else if($final=="" && $interim!="")
			{
				$payout_ratio     = $interim /$company_eps;
				$divident_yield   = $interim/$last_date_price;
				$divident_cash    = $interim;
				$divident_stock   = $interim_stock;
				$declaration_date = $interim_declare_date;
		    }			
				
		?>
		        
		<tr>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $company_code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $sector;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declaration_date;?></td>
			</tr>
		
		<?php } ?>
		</table>
	<?php
	}
	
	
	
	
	
	
	
	public function divident_detail_option_one_search_result()
	{
	    error_reporting(0);
		$years           =  $this->input->post("years");
		$company_code_01 =  $this->input->post("company_code_01");
		$company_code_02 =  $this->input->post("company_code_02");
		$company_code_03 =  $this->input->post("company_code_03");
		$company_code_04 =  $this->input->post("company_code_04");
		$company_code_05 =  $this->input->post("company_code_05");
		$company_code_06 =  $this->input->post("company_code_06");
		$company_code_07 =  $this->input->post("company_code_07");
		$company_code_08 =  $this->input->post("company_code_08");
		$company_code_09 =  $this->input->post("company_code_09"); 
		$company_code_10 =  $this->input->post("company_code_10");
		$company_code_11 =  $this->input->post("company_code_11"); 
		$company_code_12 =  $this->input->post("company_code_12");
		$company_code_13 =  $this->input->post("company_code_13"); 
		$company_code_14 =  $this->input->post("company_code_14");
		$company_code_15 =  $this->input->post("company_code_15"); 
		$company_code_16 =  $this->input->post("company_code_16");
		$company_code_17 =  $this->input->post("company_code_17");
		$company_code_18 =  $this->input->post("company_code_18");
		$company_code_19 =  $this->input->post("company_code_19"); 
		$company_code_20 =  $this->input->post("company_code_20");
			
			
		
		$companies = array($company_code_01,
		$company_code_02,
		$company_code_03,
		$company_code_04,
		$company_code_05,
		$company_code_06,
		$company_code_07,
		$company_code_08,
		$company_code_09,
		$company_code_10,
		$company_code_11,
		$company_code_12,
		$company_code_13,
		$company_code_14,
		$company_code_15,
		$company_code_16,
		$company_code_17,
		$company_code_18,
		$company_code_19, 
		$company_code_20);
		
			
		$y = "";	
		foreach($years as $k=>$v)
		{
		    if($v!="") 
			{
				$y .= (int)$v .',';
			}
		}	
		$y = substr($y,0,strlen($y)-1);
		
		
		$c = "";
		foreach($companies as $k=>$v)
		{
		    if($v!="") 
			{
				$c .= "'".$v ."',";
			}
		}
		$c = substr($c,0,strlen($c)-1);
		
		$this->load->model('divident_details_data');
		$one_res = $this->divident_details_data->divident_cash_find($y , $c);
		
	?>	
		<table  width="100%">
		<tr>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Company Name</th>
		   <th rowspan="2" style="background-color:#669999;color:#fff;text-align:center;font-family: tahoma,Arial;">Sector</th>
		   <th rowspan="2" style="background-color:#3399ff;color:#fff;text-align:center;font-family: tahoma,Arial;">Category</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">For the Year</th>
		   <th rowspan="2" style="background-color:#999966;color:#fff;text-align:center;font-family: tahoma,Arial;">Divident Yield</th>
		   <th rowspan="2" style="background-color:#339900;color:#fff;text-align:center;font-family: tahoma,Arial;">Payout</th>
		   <th colspan="2" style="background-color:#993300;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration</th>
		   <th rowspan="2" style="background-color:#123456;color:#fff;text-align:center;font-family: tahoma,Arial;">Declaration Date</th>
		</tr>
		<tr>		  
		  <th style="background-color:#E2A76F;color:#fff;text-align:center;font-family: tahoma,Arial;">Stock</th>
		  <th style="background-color:#FFA62F;color:#fff;text-align:center;font-family: tahoma,Arial;">Cash</th>
		</tr>
		
<?php	
		foreach($one_res as $or)
		{
		   $interim 		= (float)$or->INTERIM_DIVIDEND_CASH;
		   $final   		= (float)$or->FINAL_DIVIDEND_CASH;		   
		   $interim_stock 	= (float)$or->INTERIM_DIVIDEND_STOCK;
		   $final_stock   	= (float)$or->FINAL_DIVIDEND_STOCK;		   
		   $div_year 		= (int)$or->YEAR;
		   $company_code 	= $or->COMPANY_CODE;		   
		   $interim_declare_date =  $or->INTERIM_DIVIDEND_DECLARATION_DATE;
		   $final_declare_date   =  $or->FINAL_DIVIDEND_DECLARATION_DATE;
		   
		   $company_eps     	 = $this->divident_details_data->eps_of_a_company($div_year , $company_code);
		   $last_date_price		 = $this->divident_details_data->get_last_traded_price();		   
		   $vals 				 = $this->divident_details_data->get_sector_category($company_code);
		   $parse 				 = explode("#",$vals);
		   
		   $code     = $parse[0];
		   $category = $parse[1];
		   $sector   = $parse[2];		  
		   
		    if($final!="" && $interim!="") 
			{
			    if($company_eps=="" || $company_eps==0){
				$payout_ratio     =0;
				}else{
				$payout_ratio     = $final /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0){
				$divident_yield   = 0;
				}else{
				$divident_yield   = $final/$last_date_price;
				}
				$divident_cash    = $final;
				$divident_stock   = $final_stock;
				$declaration_date = $final_declare_date;
		    }
			else if($final=="" && $interim!="")
			{
			    if($company_eps=="" || $company_eps==0){
				$payout_ratio     =0;
				}else{
				$payout_ratio     = $interim /$company_eps;
				}
				
				if($last_date_price=="" || $last_date_price==0){
				$divident_yield   = 0;
				}else{
				$divident_yield   = $interim/$last_date_price;
				}
				
				$divident_cash    = $interim;
				$divident_stock   = $interim_stock;
				$declaration_date = $interim_declare_date;
		    }
?>	
			<tr>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $code;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $sector;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $category;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $div_year;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_yield;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $payout_ratio;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_cash;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $divident_stock;?></td>
				<td style="background-color:#FFF;color:#000;text-align:center;"><?php echo $declaration_date;?></td>
			</tr>
		<?php 	
		}
		?>
		</table>
		<?php		
	}
	
	
	
	
	
	public function stock_vs_pe_ui()
	{
	    $this->load->model("sector_vs_eps_data");
		$sectors = $this->sector_vs_eps_data->get_sectors();	
?>
        
		<div class="panel panel-default">
			<div class="panel-heading">Stock vs PE</div>
			<div class="panel-body">
				
				<table width="100%">				
					<tr>
					  <td colspan="2">
						Select Sector:  
						<select id="sector_id" class="form-control">
							<option value="">Select Sector</option>
						<?php 
							foreach($sectors  as   $sector) 
							{         
						?>
								<option value="<?php echo $sector->SECTOR; ?>">
									<?php echo $sector->SECTOR; ?>
								</option>
						<?php 
							} 
						?>
						</select>
					  </td>				  
					</tr>
					<tr>
					  <td><input type="button" id="sector_id_btn" class="btn btn-primary" value="Show Result" /></td>
					</tr>
					<tr>
						<td>
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
							<div id="container_x01"></div>
						</td>					
					</tr>
				</table>
				
		
			</div>
		</div> 
	<script type="text/javascript">
		$(document).ready(function()
		{		    
			$("#sector_id_btn").bind("click", sector_vs_pe_func );
			
				function sector_vs_pe_func()
				{					
					var sector_id = $("#sector_id").val();
					$.ajax({
						type:"post" ,
						url: "<?php echo site_url(); ?>/sector_vs_pe_json/sector_vs" ,
						data:"sector_id="+sector_id ,
						dataType:'json',
						cache:false ,
						success:function(st)
						{
						    //alert(st[0].coms);
							sector_vs_pe_graph(st);
						}
					});
				}
				
				
            function sector_vs_pe_graph(st)
			{			
			    var pe_s = st[1].pes;
			    var companies = st[0].coms;				
				var sectors_pes = st[2].sectors_pe;
				
				//alert(pe_s +'  '+sectors_pes);
					var Options = new Highcharts.Chart({
							chart: {
								renderTo: "container_x01",								
							},
							plotOptions: {
								line: {
									marker: {
										enabled: false
									},
									animation: true
								},
								column: {
									animation: false
								}
							},
							title: {
								text: "Sector Vs. EPS"
							},
							legend: {
								enabled: false
								//,layout: "vertical",
								//align: 'right',
								//verticalAlign: 'middle'
							},
							tooltip: {
								enabled: true,
							},
							yAxis: [{
								title: {
									text: 'Company P/E'
									}
									//,min: 35000,
								//max: 80000
							},{
								title: {
									text: 'Industry Average'
								},
								min: 0,
								//max: 30000,
								opposite: true
							}],
							xAxis:[{
								categories:  companies,//['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'],
								labels:{rotation:-90}
							}],
							//pe_s
							series: [{
								"name": "Series1",
								"type": "spline",
								"data": pe_s
								
									/*[20000, 19000, 20002, 20005, 20006 , 20007
									, 20008, 20009, 20010, 20011 , 20012]*/
								},
								{
								"name": "Series2",
								"type": "spline",
								"data": sectors_pes
								/*[20000, 20001, 20002, 20005, 20006 , 20007
								, 20008, 20009, 20010, 20011 , 20012]*/
								}
							],
							exporting: {  enabled: false	},
							credits:{  enabled:false	}
					});
					myChart = new Highcharts.Chart(Options);
								
			}			
		});
		</script>		
	<?php
	}
	
	
	
	public function eps_npat_ui()
	{
	     $this->load->model("eps_npat_data");
		 $sectors = $this->eps_npat_data->get_sectors();
	?>
	   
	    <div class="panel panel-default">
			<div class="panel-heading">EPS and NPAT</div>
			<div class="panel-body">
				
				<table width="100%">
				<tr>
				  <td colspan="2">
					Select Company:  
					<select id="company_id" class="form-control">
					    <option value="">Select Sector</option>
						<?php 
						foreach($sectors as $sector){
						?>
						<option value="<?php echo $sector->CODE;?>"><?php echo $sector->CODE;?></option>
						<?php } ?>
					</select>
				  </td>				  
				</tr>
				<tr>
				<td><input type="button" id="company_id_btn" class="btn btn-primary" value="Show Result"/></td>
				</tr>
				<tr>
					<td >
						<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
						<div id="container_01"></div>
					</td>
					
					<td >
						<div id="container_001"></div>
					</td>
				</tr>
				<tr>
				    <td><div id="container_02"></div></td>
				
				
				    <td><div id="container_03"></div></td>
				</tr>
				<tr>
				    <td><div id="container_04"></div></td>
				
				    <td><div id="container_05"></div></td>
				</tr>
				<tr>
				    <td><div id="container_06"></div></td>
				
				    <td><div id="container_07"></div></td>
				</tr>
				<tr>
				    <td colspan="2"><div id="container_08"></div></td>				
				</tr>				
				</table>
			</div>
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    //alert(2);
			//e.preventDefault();
			
			
			$("#company_id_btn").bind("click" , eps_graph_generate);
			
			function eps_graph_generate()
			{
			    var  company_id = $("#company_id").val();
			    $.ajax({
				   type:"post" ,
				   url:"<?php echo site_url();?>/eps_npat_json/share_distribution_json" ,
				   data:"company_id="+company_id ,
				   dataType:'json',
				   cache:false ,
				   success:function(st)
				   {				      
					  share_distribution_graph(st);
				   }
				});
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/scope_to_pay_divident_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  scope_share_distribution_graph(st);
				    }
				});
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/eps_first_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  eps_per_quarter_graph(st);
				    }
				});
				
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/net_profit_first_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  net_profit_per_quarter_graph(st);
				    }
				});		
				
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/eps_all_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  eps_all_quarter_graph(st);
				    }
				});	


				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/net_profit_all_quarter_continuing_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  net_profit_all_quarter_graph(st);
				    }
				});					
				
				
				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/yearly_nav_shares_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  yearly_nav_graph(st);
				    }
				});	


				$.ajax({
				    type:"post",
					url:"<?php echo site_url();?>/eps_npat_json/yealy_eps_json",
					data:"company_id="+company_id ,
					dataType:'json',
				    cache:false ,
				    success:function(st)
				    {				      
					  yearly_eps_graph(st);
				    }
				});					
				
				
			}
			
			
			function yearly_eps_graph(st)
			{
				var yrs_eps = st[0].data; 
				var yrs_eps_val = st[1].data;
					
				var chart_06 = new Highcharts.Chart({
					chart: {
						renderTo:'container_06',
							width:400 ,
							height:250
						//zoomType: 'xy'
					}
					,
					title: {
						text: 'Yearly EPS'
					}
					,
					xAxis: [{
						categories: yrs_eps/*['2001', '2002']*/ ,
						labels:{	rotation:-90}
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							format: '{value}',
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: 'EPS',
							style: {
								color: '#89A54E'
							}
						}
					}			
					, 		
					{ // Secondary yAxis
						title: {
							text: '',
							style: {  color: '#4572A7'   }
						},
						labels: {
							format: '{value}',
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}
					
					],
					tooltip: {
						shared: true
					},
				   
					series: [{
						name: 'Yearly',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data: yrs_eps_val /*[49.9, 71.5]*/,
						tooltip: {
							valueSuffix: ' '
						}
			
					}, {
						name: 'Yearly',
						color: '#89A54E',
						type: 'line',
						data: yrs_eps_val/*[7.0, 6.9]*/ ,
						tooltip: {
							valueSuffix: ' '
						}
					}] ,
					credits:{enabled:false} ,
					exporting:{enabled:false} 
				});	
			}
			
			
			
			function yearly_nav_graph(st)
			{
			    var	navs_years  = st[0].data;
				var yearly_navs = st[1].data; 	   
				//alert(yearly_navs);
				   
				var chart_07 = new Highcharts.Chart({
					chart: {
						renderTo:'container_07',
							width:400 ,
							height:250                //zoomType: 'xy'
					}
					,
					title: {
						text: 'Yearly NAV'
					}
					,
					xAxis: [{
						categories: navs_years/*['2000', '2001']*/ ,
						labels:{	rotation:0}
					}],
					yAxis: [{ // Primary yAxis
						labels: {
							format: '{value}',
							style: {
								color: '#89A54E'
							}
						},
						title: {
							text: 'EPS',
							style: {
								color: '#89A54E'
							}
						}
					}			
					, 		
					{ // Secondary yAxis
						title: {
							text: '',
							style: {  color: '#4572A7'   }
						},
						labels: {
							format: '{value}',
							style: {
								color: '#4572A7'
							}
						},
						opposite: true
					}
					
					],
					tooltip: {
						shared: true
					},           
					series: [{
						name: 'Yearly',
						color: '#4572A7',
						type: 'column',
						yAxis: 1,
						data:  yearly_navs //[49.9, 71.5]                   
					}] ,
					credits:{enabled:false} ,
					exporting:{enabled:false} 
				});		
			}
			
			
			function net_profit_all_quarter_graph(st)
			{
				var total_net_profit = [];
				
				var yrs = st[0].data;
				$.each(st , function(k,v){
					if(k>0)
					{
					   total_net_profit.push(v);
					}
				});
				
				var chart_05 = new Highcharts.Chart({
					chart: {
						renderTo:'container_05',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'Total Net Profit Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: yrs,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'Net Profit',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series: total_net_profit
					/*[{
						name:"Q1",				
						data: [7,12,16,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,32,64]
					},{			
						name:"Q3", 				
						data: [7,12,16,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});											
					    
			}
			
			
			function eps_all_quarter_graph(st)
			{
				var total_eps = [];
				var total_eps_years = st[0].data;
					
					$.each(st , function(k,v){
					   if(k>0) {
						 total_eps.push(v);
					   }
					});
					
					var chart_04 = new Highcharts.Chart({
						chart: {
							renderTo:'container_04',
							type:'column',
							width:400 ,
							height:250
						},
						title:{
							text:'Total EPS Per Quarter'
						},
						credits:{enabled:false},
						legend:{  enabled:true },
						plotOptions: {
							series: {
								shadow:false,
								borderWidth:0,
							}
						},
						xAxis:{	
							categories: total_eps_years, //['2000','2001','2002','2004','2005'],  				
							//labels:{rotation:-90},
							title:{
								text:'',						
							}
						},
						yAxis:[{
							title:{
								text:'EPS',
								rotation:-90,
								margin:10,
							}
						},
						{title:{
							text:""
							},					
							min:0,
							opposite:true
						}],    
						series: total_eps
						
						/*[{
							name:"Q1",				
							data: [7,12,16,32,64]
						},{	
							name:"Q2",  				
							data: [7,5,16,32,64]
						},{			
							name:"Q3", 				
							data: [7,12,16,32,64]
						},{			
							name:"Q4",				
							data: [7,10,14,25,50]
						}]*/,
						exporting:{   enabled:false	},
						credits:{   enabled:false	}
					});									
			}		
			
			
			function net_profit_per_quarter_graph(st)
			{
		   		var eps_first_quarter = [];
				var s = st[0].data;
				//alert(s);
				$.each(st , function(k,v){
				  if(k>0) {
					eps_first_quarter.push(v);
				  }
				});	
				//alert(q1);			
				var chart_02 = new Highcharts.Chart({
					chart: {
						renderTo:'container_03',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'Net Profit Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: s ,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'Net Profit',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series:eps_first_quarter
						
						/*[{
						name:"Q1",				
						data: [7,12,16,6,8,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,5,32,7,64]
					},{			
						name:"Q3", 				
						data: [-7,12,16,4,7,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});	

			}			
			
			
			
			function eps_per_quarter_graph(st)
			{
		   		var eps_first_quarter = [];
				var s = st[0].data;
				//alert(s);
				$.each(st , function(k,v){
				  if(k>0) {
					eps_first_quarter.push(v);
				  }
				});	
				//alert(q1);			
				var chart_02 = new Highcharts.Chart({
					chart: {
						renderTo:'container_02',
						type:'column',
						width:400 ,
						height:250
					},
					title:{
						text:'EPS Per Quarter'
					},
					credits:{enabled:false},
					legend:{  enabled:true },
					plotOptions: {
						series: {
							shadow:false,
							borderWidth:0,
						}
					},
					xAxis:{	
						categories: s ,//['2000','2001','2002','2004','2005'],  				
						//labels:{rotation:-90},
						title:{
							text:'',						
						}
					},
					yAxis:[{
						title:{
							text:'EPS',
							rotation:-90,
							margin:10,
						}
					},
					{title:{
						text:""
						},					
						min:0,
						opposite:true
					}],    
					series:eps_first_quarter
						
						/*[{
						name:"Q1",				
						data: [7,12,16,6,8,32,64]
					},{	
						name:"Q2",  				
						data: [7,5,16,5,32,7,64]
					},{			
						name:"Q3", 				
						data: [-7,12,16,4,7,32,64]
					},{			
						name:"Q4",				
						data: [7,10,14,25,50]
					}]*/,
					exporting:{   enabled:false	},
					credits:{   enabled:false	}
				});	

			}
			
			
			
			
			function scope_share_distribution_graph(st)
			{			
				var t = [];	
				$.each(st , function(k,v) 
				{
				   t.push(v);
				});									
				var chart_01 = new Highcharts.Chart({
					chart: {
						renderTo: 'container_001',					
						width:300,
						height:250,
						type: 'pie'					
					},
					title:{
						text: 'Scope to pay Divident'
					},
					//xAxis:{ categories:['Public','Govt','Foreign','Institute']},
					//yAxis:{ max:10},
					plotOptions: {
						series: {
							allowPointSelect: true,
							marker: {
								states: {
									select: {
										radius: 0,
										fillColor: '#666'
									}
								}
							}
						}
					},
					credits:{enabled:false},
					exporting:{enabled:false},
					series:	t
				});
			}			
			
			
			function share_distribution_graph(st)
			{			
				var t = [];	
				$.each(st , function(k,v) 
				{
				   t.push(v);
				});									
				var chart_01 = new Highcharts.Chart({
					chart: {
						renderTo: 'container_01',					
						width:400,
						height:250,
						type: 'pie'					
					},
					title:{
						text: 'Distribution Chart'
					},
					//xAxis:{ categories:['Public','Govt','Foreign','Institute']},
					//yAxis:{ max:10},
					plotOptions: {
						series: {
							allowPointSelect: true,
							marker: {
								states: {
									select: {
										radius: 0,
										fillColor: '#666'
									}
								}
							}
						}
					},
					credits:{enabled:false},
					exporting:{enabled:false},
					series:	t
				});
			}
			
			
			
		});
		</script>		
	<?php   
	}
	
	
	
	public function divident_detail_json()
	{
	   	$years           =  $this->input->post("years");
		$company_code_01 =  $this->input->post("company_code_01");
		$company_code_02 =  $this->input->post("company_code_02");
		$company_code_03 =  $this->input->post("company_code_03");
		$company_code_04 =  $this->input->post("company_code_04");
		$company_code_05 =  $this->input->post("company_code_05");
		$company_code_06 =  $this->input->post("company_code_06");
		$company_code_07 =  $this->input->post("company_code_07");
		$company_code_08 =  $this->input->post("company_code_08");
		$company_code_09 =  $this->input->post("company_code_09"); 
		$company_code_10 =  $this->input->post("company_code_10");
		$company_code_11 =  $this->input->post("company_code_11"); 
		$company_code_12 =  $this->input->post("company_code_12");
		$company_code_13 =  $this->input->post("company_code_13"); 
		$company_code_14 =  $this->input->post("company_code_14");
		$company_code_15 =  $this->input->post("company_code_15"); 
		$company_code_16 =  $this->input->post("company_code_16");
		$company_code_17 =  $this->input->post("company_code_17");
		$company_code_18 =  $this->input->post("company_code_18");
		$company_code_19 =  $this->input->post("company_code_19"); 
		$company_code_20 =  $this->input->post("company_code_20");
			
			
		
		$companies = array($company_code_01,
		$company_code_02,
		$company_code_03,
		$company_code_04,
		$company_code_05,
		$company_code_06,
		$company_code_07,
		$company_code_08,
		$company_code_09,
		$company_code_10,
		$company_code_11,
		$company_code_12,
		$company_code_13,
		$company_code_14,
		$company_code_15,
		$company_code_16,
		$company_code_17,
		$company_code_18,
		$company_code_19, 
		$company_code_20);
		
			
		$y = "";	
		foreach($years as $k=>$v)
		{
		    if($v!="") 
			{
				$y .= (int)$v .',';
			}
		}	
		$y = substr($y,0,strlen($y)-1);
		
		
		$c = "";
		foreach($companies as $k=>$v)
		{
		    if($v!="") 
			{
				$c .= "'".$v ."',";
			}
		}
		$c = substr($c,0,strlen($c)-1);
		
	}
	
	
	public function yjson()
	{	
	  
	  $y = $this->input->post("years");
	  $t[0] = array("name"=>"categories" , "data"=>array( 'ACI'.$y, 'ABBANK' ,'BRAC'));
	  
	  $t[1] = array("name"=>"2000" , "data"=>array( 10, 20 , 25));
	  $t[2] = array("name"=>"2001" , "data"=>array( 15, 10 , 14));
	  $t[3] = array("name"=>"2002" , "data"=>array( 14, 30 , 17 ));
	  $t[4] = array("name"=>"2003" , "data"=>array( 12, 25 , 19 ));
	  $t[5] = array("name"=>"2004" , "data"=>array( 18, 18 , 27));
	  echo json_encode($t);
	}
	
	
}	
?>