<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mb extends CI_Controller 
{
	
	
	// login UI + home page
   	public function index()
	{
		$this->load->view("mb/mb_login_and_home_page");	
	}
	
	
	
	/****************************
	** merchant bank iportal 
	** control panel login check
	******************************/
	public function mb_login_check()
	{
	  $username = trim($this->input->post("username"));
	  $password = trim($this->input->post("password"));	  
	  if($username == "mb@bd" && $password == "#006#")
	  {
	    $this->session->set_userdata("mb_usernames"  ,$username);
	    $this->session->set_userdata("mb_login_ip"   ,$_SERVER['REMOTE_ADDR']);
	    $this->session->set_userdata("mb_loing_time" ,date('Y-m-d h:i:s'));
	    echo 1;
	  }
	  else
	  {
	    echo 0;
	  }
	}
	
	
	
	/********************************
	*** session killer
	*********************************/
	public function logout()
	{
	   $this->session->unset_userdata("mb_usernames");
	   $this->session->unset_userdata("mb_login_ip");
	   $this->session->unset_userdata("mb_loing_time");	   
	   redirect("mb/","refresh");
	}
	
	
	
	public function sub_menu_add_ui()
	{
	   $this->load->view("editor_utility");
	?>
	
	    <div class="panel panel-primary">
			<div class="panel-heading">Add Submenu</div>
		<div class="panel-body">
			<table>
				<tr>
					<td><label>Menu</label></td>
					<td>
						<div class="form-group">
						 <select class="form-control" id="menu_page">
						   <?php 
							 $this->load->model("mb_data");
							 $lists = $this->mb_data->menu_list();
							 foreach($lists as $list){
						   ?>				 
							<option value="<?php echo $list->id;?>"><?php echo $list->name;?></option>									
						   <?php } ?>
						 </select>
						</div>
					</td>   
				</tr>
				<tr>
				   <td><label>Sub Menu Name</label></td>
				   <td><div class="form-group">
					 <input class="form-control" id="submenu_name" type="text"/>
				   </div></td>   
				</tr>		
				<tr>		
				   <td><label>Sub Menu Overview</label></td>
				   <td><div class="form-group">
					 <textarea class="summernote" id="submenu_overview" ></textarea>
				   </div></td>   
				</tr>
				
				<tr>
				   <td><label>Page For</label></td>
				   <td><div class="form-group">
					 <select class="form-control" id="submenu_page_for">
						<option value="Home">Home</option>
						<option value="Inner">Inner</option>
						<option value="Blog">Blog</option>
					 </select>
				   </div></td>   
				</tr>
				<tr>
				   <td><label>&nbsp;</label></td>
				   <td><div class="form-group">
					 <input class="btn btn-primary" id="submenu_add_ui_btn" value="Save" type="button"/>
				   </div></td>   
				</tr>		
			</table>
		
			<div id="submenu_list_datatable"></div>
		</div>
		</div>
		<script type="text/javascript">
		$(document).ready(function(){
		
		
		    $("#submenu_list_datatable").load("<?php echo site_url();?>/mb/submenu_datatable",function(){});
		    //$("#submenu_name").datepicker(); 	
		    $("#submenu_add_ui_btn").click(function(){
				var menu_id = $("#menu_page").val();
				var submenu_name = $("#submenu_name").val();
				var submenu_overview = $("#submenu_overview").code();
			    var submenu_page_for    = $("#submenu_page_for").val();
				
				var dataStr = "menu_id="+menu_id+"&submenu_name="+submenu_name
				+"&submenu_overview="+submenu_overview+
				"&submenu_page_for="+submenu_page_for;
				if(menu_id==""){
				  alert("Select Menu");
				  return false
				}else if(submenu_name==""){
				  alert("Enter submenu name");
				  $("#submenu_name").focus();
				  return false;
				}else if(submenu_overview==""){
				  alert("Enter submenu overview");
				  $("#submenu_overview").focus();
				  return false;
				}else if(submenu_page_for=="") {
				  alert("Select submenu page for");
				  return false;
				}else{				
					/*
					$.ajax({
					  type:"post",
					  url:"<?php echo site_url();?>/mb/submenu_add_by_ajax",
					  data:dataStr ,
					  cache:false,
					  success:function(st)
					  {
					    alert(st);
						$("#submenu_list_datatable").load("<?php echo site_url();?>/mb/submenu_datatable",function(){}); 
					  }
					});
					*/
				}	
	        });
		});
        </script>		
		
    <?php 
	}

	
	
	public function submenu_datatable()
	{
	    $this->load->model('mb_data');
		$tables = $this->mb_data->submenu_table();
	?>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {
			$('#example').dataTable( {
				"sPaginationType": "full_numbers"
			});
		});
		</script>
		<div id="demo">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th>Name</th>
					<th>Content</th>
					<th>Overview</th>
					<th>Date</th>
					<th>Page For</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>		
			<?php foreach($tables as $table){ ?> 
				<tr class="gradeA">
					<td align="center"><?php echo $table->sub_menu_name;?></td>
					<td align="center"><?php echo $table->content;?></td>
					<td align="center"><?php echo $table->sub_menu_overview; ?></td>
					<td align="center"><?php echo $table->creation_date;?></td>
					<td align="center"><?php echo $table->page_for;?></td>
					<td align="center"><?php echo $table->status;?></td>							  
				</tr>		 
			<?php } ?>	 		 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>												
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
				</tr>
			</tfoot>
		</table>
		</div>
	<?php		
	}
	
	
	public function upload_form()
	{	
		$this->load->view('utility');
	    $this->load->helper(array('url','form'));
		echo form_open_multipart('mb/do_upload');
	?>
			<table>
				<tr>
					<td><input type="file" name="file_importer"  /></td>
				</tr>
				<tr>
					<td><input type="submit" class="btn btn-primary" value="Import CSV" /></td>
				</tr>
			</table>
			
		</form>
		
		
	<?php 
	}
	
	
	public function importer_add_ui()
	{
	   
	?>
		<div class="panel panel-primary">
			<div class="panel-heading">Company Information Importer</div>
			<div class="panel-body">
			   
			   <iframe style="width:700px;border:1px solid #fff;" src="<?php echo site_url();?>/mb/upload_form">			   
			   </iframe>	
			   <br/>
			   
			   
			</div>
		</div>
		
		<script type="text/javascript" >
		$(document).ready(function(){
		   
		   $("#company_info_pt").load("<?php echo site_url();?>/mb/company_information_datatable",function(){});
		});	
		</script>
		<div id="company_info_pt"></div>
	<?php	
	}
	
	
	
	public function do_upload()
	{	
	    
		
	    $filename = $_FILES['file_importer']['name'];
		$base_url = base_url();
		$location = "./uploads/".$filename;
		if(!file_exists($location))
		{
			if(move_uploaded_file($_FILES['file_importer']['tmp_name'],"uploads/".$_FILES['file_importer']['name']))
			{
				echo "Successfully uploaded your file $filename!<br/>";		  
				
				$handle   = fopen($location , "r");
				$row      = 0;
				while (($data = fgetcsv($handle, 1000, ","))
							  !== FALSE) 
				{
					$CODE           				= addslashes($data[0]);
					$NAME            			= addslashes($data[1]);
					$FACE_VALUE      		= $data[2];
					$CATEGORY        		= $data[3];
					$ELECTRONIC      		= $data[4]; 
					$MARKET_LOT      		= $data[5]; 
					$TOTAL_SHARE     		= $data[6]; 
					$PE              					= $data[7];
					$LOW_52WEEKS     		= $data[8];
					$MARKET_CAP      		= $data[9];
					$AUTHORIZED_CAP  = $data[10];
					$PAID_UP_CAP     		= $data[11];
					$SECTOR    		 		   = $data[12];
					$LISTING_YEAR        = $data[13];
					$SPONSOR    	           = $data[14];
					$GOVT    		               = $data[15];
					$INSTITUTE    	       = $data[16];
					$FOREIGN	               = $data[17];
					$PUBLIC    		           = $data[18];
					$LAST_AGM    	       = $data[19];
					$YEAR_END    	       = $data[20];
					$RESERVE_SURPLUS = $data[21];
				
				    $floating_percentage = $INSTITUTE +$PUBLIC;
				    $floating_no_of_share = ($TOTAL_SHARE*$floating_percentage);
				    //$market_cap = $TOTAL_SHARE
				    $this->load->model("importer_data");
					
					$last_trade_price = $this->importer_data->get_last_price();
					
					if($MARKET_CAP==""){
						$MARKET_CAP = $TOTAL_SHARE*$last_trade_price;
					}else{
						$MARKET_CAP =$MARKET_CAP;
					}
					
					
				
					if($CODE != "CODE")	
					{			
						
						
						
						if($CODE!="")
						{
						
						$couter = $this->importer_data->is_company_basic_info_exist($company_code);
						if($couter == 0 ){
							$this->importer_data->company_basic_info_data_insert_by_importer(
							$CODE,$NAME,$FACE_VALUE,$CATEGORY,$ELECTRONIC,$MARKET_LOT,
							$LOW_52WEEKS,$SECTOR,$LISTING_YEAR,$YEAR_END);
						}
						
							
							
						//$this->importer_data->pe_info_data_insert_by_importer($CODE,$PE);					
						
						
						$this->importer_data->share_info_data_insert_by_importer(
						$CODE,$TOTAL_SHARE,$MARKET_CAP,$AUTHORIZED_CAP,
						$SPONSOR,$GOVT,$INSTITUTE,$SPONSOR,$GOVT,
						$INSTITUTE,$FOREIGN,$PUBLIC,$RESERVE_SURPLUS,
						$floating_percentage,$floating_no_of_share);	
						
						
						$this->importer_data->agm_info_data_insert_by_importer($CODE, $LAST_AGM);
						
											
						$this->importer_data->paidup_cap_info_data_insert_by_importer($CODE,$PAID_UP_CAP);
						
						$row++;
						}
						
					}
					
				}
				//echo "<br/>Total Row:".$row."<br/>";
				
				
				fclose($handle);
	?>	
				<script type="text/javascript" >
				$(document).ready(function(){
				   $("#company_info_pt").load("<?php echo site_url();?>/mb/company_information_datatable",function(){});
				});	
				</script>
	
	<?php		
			}
			else
			{
			  echo "upload error!";
			}	
		}else{
		  echo "File already exist!";
		}
	}
	
	
	
	public function company_information_datatable()
	{
	    $this->load->view("utility");
	    $this->load->model("mb_data");
	    $tables = $this->mb_data->company_information_table();
	?>
		<script type="text/javascript" charset="utf-8">
		$(document).ready(function(){
			$('#example').dataTable({
				"sPaginationType": "full_numbers"
			});
			
			$(".company_basic_info_edit_link").click(function(){
			  var sel_id = $(this).attr("id");
			  alert(sel_id);
			});
		});
		</script>
		<div id="demo">
		<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
			<thead class="tab_head">
				<tr>
					<th style="text-align:center;">Code</th>
					<th style="text-align:left;">Name</th>
					<th style="text-align:center;">Face Value</th>
					<th style="text-align:center;">Market Lot</th>
					<th style="text-align:center;">Sector</th>
					<th style="text-align:center;">52Week Range</th>
					<!-- <th align="center">&nbsp;</th> -->
				</tr>
			</thead>
			<tbody>		
			<?php foreach($tables as $table){ ?> 
				<tr class="gradeA">
					<td align="center"><?php echo $table->CODE;?></td>
					<td align="left"><?php echo $table->NAME;?></td>
					<td align="center"><?php echo $table->FACE_VALUE; ?></td>
					<td align="center"><?php echo $table->MARKET_LOT;?></td>
					<td align="center"><?php echo $table->SECTOR;?></td>
					<td align="center"><?php echo $table->_52WEEK_RANGE;?></td>
					
					<!-- <td align="center">
					<a href="javascript:void(0);" class="company_basic_info_edit_link" id="<?php  echo $table->CODE;?>">
					<span class="glyphicon glyphicon-pencil"></span>					
					</a>
					</td> -->
				</tr>		 
			<?php } ?>	 		 
			</tbody>
			<tfoot class="tab_fot">				
				<tr>
					<th>&nbsp;</th>												
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<th>&nbsp;</th>
					<!-- <th>&nbsp;</th> -->
				</tr>
			</tfoot>
		</table>
		</div>
	<?php 
	}
	
	
	
	
	

	public function company_info_ui()
	{
	?>
	    <div class="panel panel-primary">
			<div class="panel-heading">Company Information </div>
			<div class="panel-body">
			   <br/>
			   <div id="company_info_data_table"></div>
			  <?php 
			   //$this->load->model("mb_data");
				//$tables = $this->mb_data->company_information_table();
				//print_r($tables );
			   ?>
			</div>
		</div>
		
		<script type="text/javascript" >
		$(document).ready(function(){
		   
		   $("#company_info_data_table").load("<?php echo site_url();?>/mb/company_information_datatable",function(){});
		});	
		</script>
		
	<?php	
	}
	
	
	public function company_sector_finder()
	{		
		$company_code = $this->input->post("company_code");
		$this->load->model("input_form_data");
		$str = $this->input_form_data->company_sector_by_code_for_combo($company_code);
		$parse = explode("#" , $str);
		$code = $parse[0];
		if($parse[1]!=""){
		$last_update_date = date("d,M Y H:i:s",strtotime($parse[1]));
		}else{
		$last_update_date = 'no records found';
		}
		echo "&nbsp;<label >Sector:</label>&nbsp;&nbsp;$code &nbsp;&nbsp;
		<label style='color:#428BCA;'>Last Update Date:&nbsp;&nbsp; $last_update_date </label> ";
	}
	
	
	
	
	
	/******************************************************************************  
	**************** Manual Entry Forms	
	*******************************************************************************/
		
	public function manual_entry_form_ui()
	{	    
	?>
	   <table cellpadding="0" cellspacing="0" >
		<tr>
			<th>Company Code:</th><td>
				<select id="company_code" class="form-control">
					<option value="">Select Company</option>
					<?php 
						$this->load->model("input_form_data"); 
						$codes = $this->input_form_data->company_code_for_combo();
						foreach($codes as $code)
						{
					?>
							<option value="<?php echo $code->CODE;?>">
								 <?php echo $code->CODE;?></option>
					<?php 
						} 
					?>
				</select>
			</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
			<td><span id="company_sector"></span></td>
		</tr>
		</table>
		
	   <div class="panel panel-primary">
			<div class="panel-heading">Turnover/Revenue Manual Entry Form</div>
			<div class="panel-body">
			
				<table id="turnover_entry_table" cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
						<th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select class="form-control" name="turnover_year" id="turnover_year">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="turnover_q1_3m" id="turnover_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="turnover_q2_3m" readonly="readonly" id="turnover_q2_3m" /></th>
						<th ><input type="text" class="form-control" name="turnover_q2_6m" id="turnover_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="turnover_q3_3m" readonly="readonly" id="turnover_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="turnover_q3_9m" id="turnover_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="turnover_q4_3m" readonly="readonly" id="turnover_q4_3m" /></th>
						<th ><input type="text" class="form-control" name="turnover_q4_12m" id="turnover_q4_12m"/></th>
						<th ><input type="button" class="btn btn-warning" id="turnover_save" value="Save"/></th>							
					</tr>
					
					<?php						  
						  $turnover_tables = $this->input_form_data->turnover_entry_form_datatable();
					      foreach($turnover_tables as $turnover_table){	
					?>
					<tr id="<?php echo $turnover_table->ID;?>">
					    <td ><?php echo $turnover_table->YEAR;?></td>
						<td ><?php echo $turnover_table->QUARTER_1_3M;?></td>
						<td ><?php echo $turnover_table->QUARTER_2_3M;?></td>
						<td ><?php echo $turnover_table->QUARTER_2_6M;?></td>
						<td ><?php echo $turnover_table->QUARTER_3_3M;?></td>
						<td ><?php echo $turnover_table->QUARTER_3_9M;?></td>
						<td ><?php echo $turnover_table->QUARTER_4_3M;?></td>
						<td ><?php echo $turnover_table->QUARTER_4_12M;?></td>
						<td >&nbsp;
						    <span class="glyphicon glyphicon-edit"  name="turnover_btnEdit">
							</span><span class="glyphicon glyphicon-ok" name="turnover_btnSave"></span>
						</td>							
					</tr>
					<?php } ?>	
					
				</table>

				<br/>
			</div>
		</div>
       
		<script >
		$(document).ready(function(){
		
		    $("span[name='turnover_btnEdit']").bind("click",TurnoverEdit);
			$("span[name='turnover_btnSave']").bind("click",TurnoverSave);
			
			function TurnoverEdit()
			{
			   var par = $(this).parent().parent();
			   var txtTurnoverYear  = par.children("td:nth-child(1)");
   			   var txtQ1_3M   = par.children("td:nth-child(2)");
   			   var txtQ2_3M   = par.children("td:nth-child(3)");
			   var txtQ2_6M   = par.children("td:nth-child(4)");
   			   var txtQ3_3M   = par.children("td:nth-child(5)");
   			   var txtQ3_9M   = par.children("td:nth-child(6)");
   			   var txtQ4_3M   = par.children("td:nth-child(7)");
   			   var txtQ4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtTurnoverYear.html("<input type='text' class='form-control' value='"+txtTurnoverYear.text()+"'>");	
			   txtQ1_3M.html("<input type='text'  class='form-control'  value='"+txtQ1_3M.text()+"'>");	
   			   txtQ2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtQ2_3M.text()+"'>");	
			   txtQ2_6M.html("<input type='text'  class='form-control'  value='"+txtQ2_6M.text()+"'>");	
			   txtQ3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtQ3_3M.text()+"'>");	
   			   txtQ3_9M.html("<input type='text'  class='form-control' value='"+txtQ3_9M.text()+"'>");	
			   txtQ4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtQ4_3M.text()+"'>");	
			   txtQ4_12M.html("<input type='text' class='form-control'  value='"+txtQ4_12M.text()+"'>");
			   

			}
			
			function TurnoverSave()
			{
			   //alert(4);
			   var par              = $(this).parent().parent();
			   var txtTurnoverYear  = par.children("td:nth-child(1)");
   			   var txtQ1_3M   = par.children("td:nth-child(2)");
   			   var txtQ2_3M   = par.children("td:nth-child(3)");
			   var txtQ2_6M   = par.children("td:nth-child(4)");
   			   var txtQ3_3M   = par.children("td:nth-child(5)");
   			   var txtQ3_9M   = par.children("td:nth-child(6)");
   			   var txtQ4_3M   = par.children("td:nth-child(7)");
   			   var txtQ4_12M  = par.children("td:nth-child(8)");
			   
			   
			   
			   var txtTurnoverYear_val = txtTurnoverYear.children("input[type='text']").val();
			   var txtQ1_3M_val  = txtQ1_3M.children("input[type='text']").val();
			   var txtQ2_3M_val  = txtQ2_3M.children("input[type='text']").val();
			   var txtQ2_6M_val  = txtQ2_6M.children("input[type='text']").val();
			   var txtQ3_3M_val  = txtQ3_3M.children("input[type='text']").val();
			   var txtQ3_9M_val  = txtQ3_9M.children("input[type='text']").val();
			   var txtQ4_3M_val  = txtQ4_3M.children("input[type='text']").val();
			   var txtQ4_12M_val = txtQ4_12M.children("input[type='text']").val();			   
			   var company_code  = $("#company_code").val();
			   var rowid = par.attr('id');
			   
			   
			   var dataStrs = "company_code="+company_code+
				"&txtTurnoverYear_val="+txtTurnoverYear_val+
			   "&txtQ1_3M_val="+txtQ1_3M_val+"&txtQ2_3M_val="+txtQ2_3M_val
			   +"&txtQ2_6M_val="+txtQ2_6M_val+"&txtQ3_3M_val="+txtQ3_3M_val+
			   "&txtQ3_9M_val="+txtQ3_9M_val+"&txtQ4_3M_val="+txtQ4_3M_val+
			   "&txtQ4_12M_val="+txtQ4_12M_val+"&rowid="+rowid;
			   
			   
			   txtTurnoverYear.html(txtTurnoverYear.children("input[type='text']").val());
			   txtQ1_3M.html(txtQ1_3M.children("input[type='text']").val());
			   txtQ2_3M.html(txtQ2_3M.children("input[type='text']").val());
			   txtQ2_6M.html(txtQ2_6M.children("input[type='text']").val());
			   txtQ3_3M.html(txtQ3_3M.children("input[type='text']").val());
			   txtQ3_9M.html(txtQ3_9M.children("input[type='text']").val());
			   txtQ4_3M.html(txtQ4_3M.children("input[type='text']").val());
			   txtQ4_12M.html(txtQ4_12M.children("input[type='text']").val());			   
			   
			   //alert(dataStrs);
			    if(company_code!="") {
					$.ajax({
						type:"post" ,
						url:"<?php echo site_url();?>/input_form_mb/turnover_edit_data_by_ajax",
						data:dataStrs ,
						cache:false,
						success:function(st)
						{
						   alert("Data saved successfully");
						}
					});
				}else{
				  alert("Please select company code");
				}
			   
			}
			
		    $("#company_code").change(function()
			{
				var company_code = $("#company_code").val();
			    if(company_code!="")
				{
					$.ajax({
						type: "post",
						url: "<?php echo site_url();?>/mb/company_sector_finder",
						data: "company_code="+company_code,
						cache: false,
						success: function(st){
							$("#company_sector").html(st);
							//alert(st);
						}
					});
				}
			});
			
			
			$("input[name='turnover_year']").keyup(function(ex){
			    var turnover_year = $("input[name='turnover_year']").val();
				var num = /^([0-9]{4})$/;
				
				if(turnover_year!="") 
				{
				   $("input[name='npat_year']").val(turnover_year);
				   $("input[name='npat_extra_year']").val(turnover_year);
				   $("input[name='eps_year']").val(turnover_year);
				   $("input[name='gen_fin_year']").val(turnover_year);
				   $("input[name='diluted_eps_year']").val(turnover_year);
				   $("input[name='diluted_eps_extra_year']").val(turnover_year);
				   $("input[name='eps_extra_income_year']").val(turnover_year);
				   $("input[name='divident_mutual_year']").val(turnover_year);
				}else if(turnover_year.length <4 || turnover_year.length >4){
				   alert("Year must be 4 digit");
				   $("#turnover_year").focus();
				   $("input[name='npat_year']").val("");
				   $("input[name='npat_extra_year']").val("");
				   $("input[name='eps_year']").val("");
				   $("input[name='gen_fin_year']").val("");
				   $("input[name='diluted_eps_year']").val("");
				   $("input[name='diluted_eps_extra_year']").val("");
				   $("input[name='eps_extra_income_year']").val("");
				   $("input[name='divident_mutual_year']").val("");
				   return false;
				}else if(!num.test(turnover_year_)  ){
				   alert("Year must be numeric");
				   $("#turnover_year").focus();
				   $("input[name='npat_year']").val("");
				   $("input[name='npat_extra_year']").val("");
				   $("input[name='eps_year']").val("");
				   $("input[name='gen_fin_year']").val("");
				   $("input[name='diluted_eps_year']").val("");
				   $("input[name='diluted_eps_extra_year']").val("");
				   $("input[name='eps_extra_income_year']").val("");
				   $("input[name='divident_mutual_year']").val("");
				   return false;
				}
				else
				{
				   $("input[name='npat_year']").val("");
				   $("input[name='npat_extra_year']").val("");
				   $("input[name='eps_year']").val("");
				   $("input[name='gen_fin_year']").val("");
				   $("input[name='diluted_eps_year']").val("");
				   $("input[name='diluted_eps_extra_year']").val("");
				   $("input[name='eps_extra_income_year']").val("");
				   $("input[name='divident_mutual_year']").val("");
				}			  
			});
			
			$("input[name='turnover_q2_6m']").keyup(function(ex){
				var turnover_q2_6m_tmp = $("input[name='turnover_q2_6m']").val();
				if(turnover_q2_6m_tmp!="")			{
					var turnover_q2_3m     = $("input[name='turnover_q1_3m']").val();
					
					var turnover_q2_6m     = parseFloat(turnover_q2_6m_tmp)- parseFloat(turnover_q2_3m);
					$("input[name='turnover_q2_3m']").val(turnover_q2_6m);
					//alert(turnover_q2_6m);
				}else{
				   $("input[name='turnover_q2_3m']").val("");
				   $("input[name='turnover_q6_6m']").val("");
				}
			});
			
			
			$("input[name='turnover_q3_9m']").keyup(function(ex){
				var turnover_q3_9m_tmp = $("input[name='turnover_q3_9m']").val();
				if(turnover_q3_9m_tmp!="")			{
					var turnover_q2_6m     = $("input[name='turnover_q2_6m']").val();

					var turnover_q3_9m     = parseFloat(turnover_q3_9m_tmp)- parseFloat(turnover_q2_6m);
					$("input[name='turnover_q3_3m']").val(turnover_q3_9m);
					//alert(turnover_q2_6m);
				}else{
				   $("input[name='turnover_q3_3m']").val("");
				   $("input[name='turnover_q3_9m']").val("");
				}
			});
			
			
			$("input[name='turnover_q4_12m']").keyup(function(ex){
				var turnover_q4_12m_tmp = $("input[name='turnover_q4_12m']").val();
				
				if(turnover_q4_12m_tmp!="")	
				{
					var turnover_q3_9m     = $("input[name='turnover_q3_9m']").val();
					//alert(turnover_q3_9m);
					var turnover_q4_3m     = parseFloat(turnover_q4_12m_tmp)- parseFloat(turnover_q3_9m);
					$("input[name='turnover_q4_3m']").val(turnover_q4_3m);
					//alert(turnover_q2_6m);
				}
				else
				{
				   $("input[name='turnover_q4_3m']").val("");
				   $("input[name='turnover_q4_12m']").val("");
				}
			});			
			
			
		    $("#turnover_save").click(function(){
			   var company_code = $("#company_code").val();
			   var turnover_year_ = $("#turnover_year").val();
			   var turnover_year_con  = [];
			   var turnover_q1_3m_con = [];
			   
			   var turnover_q2_3m_con = [];
			   var turnover_q2_6m_con = [];
			   
			   var turnover_q3_3m_con = [];			   
			   var turnover_q3_9m_con = [];
			   
			   var turnover_q4_3m_con = [];			   
			   var turnover_q4_12m_con = [];
			   
			   $("input[name='turnover_year']").each(function(){
			      turnover_year_con.push($(this).val());
			   }); 
			   $("input[name='turnover_q1_3m']").each(function(){
			      turnover_q1_3m_con.push($(this).val());
			   });
			   
			   $("input[name='turnover_q2_3m']").each(function(){
			      turnover_q2_3m_con.push($(this).val());
			   });			   
			   $("input[name='turnover_q2_6m']").each(function(){
			      turnover_q2_6m_con.push($(this).val());
			   }); 	
			   
			   $("input[name='turnover_q3_3m']").each(function(){
			      turnover_q3_3m_con.push($(this).val());
			   }); 	
			   $("input[name='turnover_q3_9m']").each(function(){
			      turnover_q3_9m_con.push($(this).val());
			   }); 				   
			   
			   $("input[name='turnover_q4_3m']").each(function(){
			      turnover_q4_3m_con.push($(this).val());
			   }); 		
			   $("input[name='turnover_q4_12m']").each(function(){
			      turnover_q4_12m_con.push($(this).val());
			   }); 					   
			   var num = /^([0-9]{4})$/;
				
				var dataStr = "company_code="+company_code+"&turnover_year_con="+turnover_year_con+
					"&turnover_q1_3m_con="+turnover_q1_3m_con+
					"&turnover_q2_3m_con="+turnover_q2_3m_con+
					"&turnover_q2_6m_con="+turnover_q2_6m_con+
					"&turnover_q3_3m_con="+turnover_q3_3m_con+
					"&turnover_q3_9m_con="+turnover_q3_9m_con+
					"&turnover_q4_3m_con="+turnover_q4_3m_con+
					"&turnover_q4_12m_con="+turnover_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else if(turnover_year_.length<4 || turnover_year.length >4){					
					alert("Year must be 4 digit");
					$("#turnover_year").focus();
					return false;
				}
				else if(!num.test(turnover_year_) ){
					var num = /^([0-9]{4})$/;
				
					alert("Year must be numeric value");
					$("#turnover_year").focus();
					return false;
				}
				else
				{
					$.ajax({
						type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/turnover_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						    alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>
		
		
		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Net Profit After Tax (Continuing Operation) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table id="net_profit_after_tax_continuing" cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
						<th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#FFA62F;">12 Month</th>						
					</tr>
					
					
					<tr>
					    <th >
						  
						<select class="form-control" name="npat_year"  id="npat_year">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select>
						
						</th>
						<th ><input type="text" class="form-control" name="npat_q1_3m" id="npat_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_q2_3m" readonly="readonly" id="npat_q2_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_q2_6m" id="npat_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="npat_q3_3m" readonly="readonly" id="npat_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_q3_9m" id="npat_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="npat_q4_3m" readonly="readonly" id="npat_q4_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_q4_12m" id="npat_q4_12m"/></th>						
						<th >
							<input type="button" class="btn btn-warning" id="npat_save" value="Save"/>
						</th>													
					</tr>	
					<?php  						
					    $net_profit_after_tax_continuing_datas = $this->input_form_data->net_profit_after_tax_continuing_operation_entry_datatable();	
						foreach($net_profit_after_tax_continuing_datas as $npat_1){
					?>
					<tr id="<?php echo $npat_1->ID;?>">
					    <td ><?php echo $npat_1->YEAR;?></td>
						<td ><?php echo $npat_1->QUARTER_1_3M;?></td>
						<td ><?php echo $npat_1->QUARTER_2_3M;?></td>
						<td ><?php echo $npat_1->QUARTER_2_6M;?></td>
						<td ><?php echo $npat_1->QUARTER_3_3M;?></td>
						<td ><?php echo $npat_1->QUARTER_3_9M;?></td>
						<td ><?php echo $npat_1->QUARTER_4_3M;?></td>
						<td ><?php echo $npat_1->QUARTER_4_12M;?></td>						
						<td >&nbsp;
						    <span class="glyphicon glyphicon-edit"  name="napat1_btnEdit">
							</span><span class="glyphicon glyphicon-ok" name="napat1_btnSave"></span></td>													
					</tr>
					<?php } ?>
				</table>
				<br/>
			</div>
		</div>		
		
		<script >
		$(document).ready(function(){
		
		    $("span[name='napat1_btnEdit']").bind("click",napat1_Edit);
			$("span[name='napat1_btnSave']").bind("click",napat1_Save);
		
		
		    $("input[name='npat_q2_6m']").keyup(function(ex){
			    var  npat_q1_3m = $("input[name='npat_q1_3m']").val();
				var  npat_q2_6m = $("input[name='npat_q2_6m']").val();
				
				if(npat_q2_6m!=""){
					var  npat_q2_3m = parseFloat(npat_q2_6m)-parseFloat(npat_q1_3m);
					$("input[name='npat_q2_3m']").val(npat_q2_3m);
				}else{
					$("input[name='npat_q2_3m']").val("");
					$("input[name='npat_q2_6m']").val("");
				}
			});
			
			
			$("input[name='npat_q3_9m']").keyup(function(ex){
			    var  npat_q2_6m = $("input[name='npat_q2_6m']").val();
				var  npat_q3_9m = $("input[name='npat_q3_9m']").val();
				
				if(npat_q3_9m!=""){
					var  npat_q3_3m = parseFloat(npat_q3_9m)-parseFloat(npat_q2_6m);
					$("input[name='npat_q3_3m']").val(npat_q3_3m);
				}else{
					$("input[name='npat_q3_3m']").val("");
					$("input[name='npat_q3_9m']").val("");
				}
			});
		
		
		
			$("input[name='npat_q4_12m']").keyup(function(ex){
			    var  npat_q3_9m = $("input[name='npat_q3_9m']").val();
				var  npat_q4_12m = $("input[name='npat_q4_12m']").val();
				
				if(npat_q4_12m!=""){
					var  npat_q4_3m = parseFloat(npat_q4_12m)-parseFloat(npat_q3_9m);
					$("input[name='npat_q4_3m']").val(npat_q4_3m);
				}else{
					$("input[name='npat_q4_3m']").val("");
					$("input[name='npat_q4_12m']").val("");
				}
			});
				
		
		    function napat1_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtNpat1Year    = par.children("td:nth-child(1)");
   			   var txtNpat1Q1_3M   = par.children("td:nth-child(2)");
   			   var txtNpat1Q2_3M   = par.children("td:nth-child(3)");
			   var txtNpat1Q2_6M   = par.children("td:nth-child(4)");
   			   var txtNpat1Q3_3M   = par.children("td:nth-child(5)");
   			   var txtNpat1Q3_9M   = par.children("td:nth-child(6)");
   			   var txtNpat1Q4_3M   = par.children("td:nth-child(7)");
   			   var txtNpat1Q4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtNpat1Year.html("<input type='text' class='form-control' value='"+txtNpat1Year.text()+"'>");	
			   txtNpat1Q1_3M.html("<input type='text'  class='form-control'  value='"+txtNpat1Q1_3M.text()+"'>");	
   			   txtNpat1Q2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtNpat1Q2_3M.text()+"'>");	
			   txtNpat1Q2_6M.html("<input type='text'  class='form-control'  value='"+txtNpat1Q2_6M.text()+"'>");	
			   txtNpat1Q3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtNpat1Q3_3M.text()+"'>");	
   			   txtNpat1Q3_9M.html("<input type='text'  class='form-control' value='"+txtNpat1Q3_9M.text()+"'>");	
			   txtNpat1Q4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtNpat1Q4_3M.text()+"'>");	
			   txtNpat1Q4_12M.html("<input type='text' class='form-control'  value='"+txtNpat1Q4_12M.text()+"'>");
			   

			  
			  //alert('napat1_Edit '+rowid);
			}
		    function napat1_Save()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtNpat1Year    = par.children("td:nth-child(1)");
   			   var txtNpat1Q1_3M   = par.children("td:nth-child(2)");
   			   var txtNpat1Q2_3M   = par.children("td:nth-child(3)");
			   var txtNpat1Q2_6M   = par.children("td:nth-child(4)");
   			   var txtNpat1Q3_3M   = par.children("td:nth-child(5)");
   			   var txtNpat1Q3_9M   = par.children("td:nth-child(6)");
   			   var txtNpat1Q4_3M   = par.children("td:nth-child(7)");
   			   var txtNpat1Q4_12M  = par.children("td:nth-child(8)");			   
			   
			   
			   var txtNpat1Year_val   = txtNpat1Year.children("input[type='text']").val();
			   var txtNpat1Q1_3M_val  = txtNpat1Q1_3M.children("input[type='text']").val();
			   var txtNpat1Q2_3M_val  = txtNpat1Q2_3M.children("input[type='text']").val();
			   var txtNpat1Q2_6M_val  = txtNpat1Q2_6M.children("input[type='text']").val();
			   var txtNpat1Q3_3M_val  = txtNpat1Q3_3M.children("input[type='text']").val();
			   var txtNpat1Q3_9M_val  = txtNpat1Q3_9M.children("input[type='text']").val();
			   var txtNpat1Q4_3M_val  = txtNpat1Q4_3M.children("input[type='text']").val();
			   var txtNpat1Q4_12M_val = txtNpat1Q4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   			   
			   
			   txtNpat1Year.html(txtNpat1Year_val);
			   txtNpat1Q1_3M.html(txtNpat1Q1_3M_val);
			   txtNpat1Q2_3M.html(txtNpat1Q2_3M_val);
			   txtNpat1Q2_6M.html(txtNpat1Q2_6M_val);
			   txtNpat1Q3_3M.html(txtNpat1Q3_3M_val);
			   txtNpat1Q3_9M.html(txtNpat1Q3_9M_val);
			   txtNpat1Q4_3M.html(txtNpat1Q4_3M_val);
			   txtNpat1Q4_12M.html(txtNpat1Q4_12M_val);			   
			  
				
			   var dataStr_npat1 = "company_code="+company_code+
				"&txtNpat1Year_val="+txtNpat1Year_val+
			   "&txtNpat1Q1_3M_val="+txtNpat1Q1_3M_val
			   +"&txtNpat1Q2_3M_val="+txtNpat1Q2_3M_val
			   +"&txtNpat1Q2_6M_val="+txtNpat1Q2_6M_val
			   +"&txtNpat1Q3_3M_val="+txtNpat1Q3_3M_val+
			   "&txtNpat1Q3_9M_val="+txtNpat1Q3_9M_val+
			   "&txtNpat1Q4_3M_val="+txtNpat1Q4_3M_val+
			   "&txtNpat1Q4_12M_val="+txtNpat1Q4_12M_val+
			   "&rowid="+rowid;
			   
			  
			    if(company_code !="") 
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/napat_continuing_edit_data_by_ajax",
					   data:dataStr_npat1,
					   cache:false,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});  
			    }
				else
				{
					alert("Please select company code");
				}		   
			   
			}			
		
		    $("#npat_save").click(function(){
			   var company_code = $("#company_code").val();
			   var npat_year_con  = [];			   
			   var npat_q1_3m_con = [];
			   
			   var npat_q2_3m_con = [];
			   var npat_q2_6m_con = [];
			   
			   var npat_q3_3m_con = [];
			   var npat_q3_9m_con = [];
			   
			   var npat_q4_3m_con = [];
			   var npat_q4_12m_con = [];
			   
			   $("input[name='npat_year']").each(function(){
			      npat_year_con.push($(this).val());
			   }); 
			   $("input[name='npat_q1_3m']").each(function(){
			      npat_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='npat_q2_3m']").each(function(){
			      npat_q2_3m_con.push($(this).val());
			   });
 			   $("input[name='npat_q2_6m']").each(function(){
			      npat_q2_6m_con.push($(this).val());
			   });
			   
			   $("input[name='npat_q3_3m']").each(function(){
			      npat_q3_3m_con.push($(this).val());
			   }); 			   			   
			   $("input[name='npat_q3_9m']").each(function(){
			      npat_q3_9m_con.push($(this).val());
			   }); 			   			   			   
			   
			   
			   $("input[name='npat_q4_3m']").each(function(){
			      npat_q4_3m_con.push($(this).val());
			   }); 
			   $("input[name='npat_q4_12m']").each(function(){
			      npat_q4_12m_con.push($(this).val());
			   }); 			   
			   
				var dataStr = "company_code="+company_code+"&npat_year_con="+npat_year_con+
					"&npat_q1_3m_con="+npat_q1_3m_con+
					"&npat_q2_3m_con="+npat_q2_3m_con+
					"&npat_q2_6m_con="+npat_q2_6m_con+
					"&npat_q3_3m_con="+npat_q3_3m_con+
					"&npat_q3_9m_con="+npat_q3_9m_con+
					"&npat_q4_3m_con="+npat_q4_3m_con+
					"&npat_q4_12m_con="+npat_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/npat_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						   alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>
		
		
		
		
		
		
		
		
		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Net Profit After Tax (Including Extraordinary Income) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table id="net_profit_extra" cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
						<th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select class="form-control" name="npat_extra_year"  id="npat_extra_year">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="npat_extra_q1_3m"  id="npat_extra_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q2_3m" readonly="readonly" id="npat_extra_q2_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q2_6m"  id="npat_extra_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q3_3m" readonly="readonly"  id="npat_extra_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q3_9m"  id="npat_extra_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q4_3m" readonly="readonly"  id="npat_extra_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="npat_extra_q4_12m"  id="npat_extra_q4_12m"/></th>						
						<th ><input type="button" class="btn btn-warning" id="npat_extra_save" value="Save"/></th>																								
					</tr>
					
					<?php 
					 
					$npat_extra_tables = $this->input_form_data->net_profit_after_tax_continuing_extra_operation_entry_datatable();
					
					foreach($npat_extra_tables as $npat_extra_table)
					{
					?>
					
					<tr id="<?php echo $npat_extra_table->ID;?>">
					    <td ><?php echo $npat_extra_table->YEAR;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_1_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_2_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_2_6M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_3_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_3_9M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_4_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_4_12M;?></td>					
						<td >&nbsp;<span class="glyphicon glyphicon-edit"  name="napat2_extra_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="napat2_extra_btnSave"></span>
						</td>
					</tr>
					
					<?php } ?>
														
				</table>
			   	<br/>
			    <p></p>			   
			</div>
		</div>				
		<script >
		$(document).ready(function(){
		
		
		    $("span[name='napat2_extra_btnEdit']").bind("click" , napat2_extra_Edit);
		    $("span[name='napat2_extra_btnSave']").bind("click" , napat2_extra_Save);			
		
		    function napat2_extra_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtNpatExtra1Year    = par.children("td:nth-child(1)");
   			   var txtNpatExtra1Q1_3M   = par.children("td:nth-child(2)");
   			   var txtNpatExtra1Q2_3M   = par.children("td:nth-child(3)");
			   var txtNpatExtra1Q2_6M   = par.children("td:nth-child(4)");
   			   var txtNpatExtra1Q3_3M   = par.children("td:nth-child(5)");
   			   var txtNpatExtra1Q3_9M   = par.children("td:nth-child(6)");
   			   var txtNpatExtra1Q4_3M   = par.children("td:nth-child(7)");
   			   var txtNpatExtra1Q4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtNpatExtra1Year.html("<input type='text' class='form-control' value='"+txtNpatExtra1Year.text()+"'>");	
			   txtNpatExtra1Q1_3M.html("<input type='text'  class='form-control'  value='"+txtNpatExtra1Q1_3M.text()+"'>");	
   			   txtNpatExtra1Q2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtNpatExtra1Q2_3M.text()+"'>");	
			   txtNpatExtra1Q2_6M.html("<input type='text'  class='form-control'  value='"+txtNpatExtra1Q2_6M.text()+"'>");	
			   txtNpatExtra1Q3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtNpatExtra1Q3_3M.text()+"'>");	
   			   txtNpatExtra1Q3_9M.html("<input type='text'  class='form-control' value='"+txtNpatExtra1Q3_9M.text()+"'>");	
			   txtNpatExtra1Q4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtNpatExtra1Q4_3M.text()+"'>");	
			   txtNpatExtra1Q4_12M.html("<input type='text' class='form-control'  value='"+txtNpatExtra1Q4_12M.text()+"'>");
			   			
			
			   //alert('napat2_extra_Edit');
			}
			
			function napat2_extra_Save()
			{
			
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtNpatExtra1Year    = par.children("td:nth-child(1)");
   			   var txtNpatExtra1Q1_3M   = par.children("td:nth-child(2)");
   			   var txtNpatExtra1Q2_3M   = par.children("td:nth-child(3)");
			   var txtNpatExtra1Q2_6M   = par.children("td:nth-child(4)");
   			   var txtNpatExtra1Q3_3M   = par.children("td:nth-child(5)");
   			   var txtNpatExtra1Q3_9M   = par.children("td:nth-child(6)");
   			   var txtNpatExtra1Q4_3M   = par.children("td:nth-child(7)");
   			   var txtNpatExtra1Q4_12M  = par.children("td:nth-child(8)");			   
			   
			   
			   var txtNpatExtra1Year_val   = txtNpatExtra1Year.children("input[type='text']").val();
			   var txtNpatExtra1Q1_3M_val  = txtNpatExtra1Q1_3M.children("input[type='text']").val();
			   var txtNpatExtra1Q2_3M_val  = txtNpatExtra1Q2_3M.children("input[type='text']").val();
			   var txtNpatExtra1Q2_6M_val  = txtNpatExtra1Q2_6M.children("input[type='text']").val();
			   var txtNpatExtra1Q3_3M_val  = txtNpatExtra1Q3_3M.children("input[type='text']").val();
			   var txtNpatExtra1Q3_9M_val  = txtNpatExtra1Q3_9M.children("input[type='text']").val();
			   var txtNpatExtra1Q4_3M_val  = txtNpatExtra1Q4_3M.children("input[type='text']").val();
			   var txtNpatExtra1Q4_12M_val = txtNpatExtra1Q4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   			   
			   
			   txtNpatExtra1Year.html(txtNpatExtra1Year_val);
			   txtNpatExtra1Q1_3M.html(txtNpatExtra1Q1_3M_val);
			   txtNpatExtra1Q2_3M.html(txtNpatExtra1Q2_3M_val);
			   txtNpatExtra1Q2_6M.html(txtNpatExtra1Q2_6M_val);
			   txtNpatExtra1Q3_3M.html(txtNpatExtra1Q3_3M_val);
			   txtNpatExtra1Q3_9M.html(txtNpatExtra1Q3_9M_val);
			   txtNpatExtra1Q4_3M.html(txtNpatExtra1Q4_3M_val);
			   txtNpatExtra1Q4_12M.html(txtNpatExtra1Q4_12M_val);			   
			  
			  
			    var dataStr_npat1_extra = "company_code="+company_code+
				"&txtNpatExtra1Year_val="+txtNpatExtra1Year_val+
			   "&txtNpatExtra1Q1_3M_val="+txtNpatExtra1Q1_3M_val
			   +"&txtNpatExtra1Q2_3M_val="+txtNpatExtra1Q2_3M_val
			   +"&txtNpatExtra1Q2_6M_val="+txtNpatExtra1Q2_6M_val
			   +"&txtNpatExtra1Q3_3M_val="+txtNpatExtra1Q3_3M_val+
			   "&txtNpatExtra1Q3_9M_val="+txtNpatExtra1Q3_9M_val+
			   "&txtNpatExtra1Q4_3M_val="+txtNpatExtra1Q4_3M_val+
			   "&txtNpatExtra1Q4_12M_val="+txtNpatExtra1Q4_12M_val+
			   "&rowid="+rowid;
			  
			  
			    if(company_code !="") 
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/napat_extra_continuing_edit_data_by_ajax",
					   data:dataStr_npat1_extra,
					   cache:false,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});  
			    }
				else
				{
					alert("Please select company code");
				}	
			}
			
			
			$("input[name='npat_extra_q2_6m']").keyup(function(ex){
			    var npat_extra_q1_3m = $("input[name='npat_extra_q1_3m']").val();
				var npat_extra_q2_6m = $("input[name='npat_extra_q2_6m']").val();
				if(npat_extra_q2_6m!="")
				{
				  var npat_extra_q2_3m = parseFloat(npat_extra_q2_6m)-parseFloat(npat_extra_q1_3m);
				  $("input[name='npat_extra_q2_3m']").val(npat_extra_q2_3m);
				}else{
				   $("input[name='npat_extra_q2_3m']").val("");
				   $("input[name='npat_extra_q2_6m']").val("");
				}
			});
			
			
			$("input[name='npat_extra_q3_9m']").keyup(function(ex){
			    var npat_extra_q2_6m = $("input[name='npat_extra_q2_6m']").val();
				var npat_extra_q3_9m = $("input[name='npat_extra_q3_9m']").val();
				if(npat_extra_q3_9m!="")
				{
				  var npat_extra_q3_3m = parseFloat(npat_extra_q3_9m)-parseFloat(npat_extra_q2_6m);
				  $("input[name='npat_extra_q3_3m']").val(npat_extra_q3_3m);
				}else{
				   $("input[name='npat_extra_q3_3m']").val("");
				   $("input[name='npat_extra_q3_9m']").val("");
				}
			});			
			
			
			$("input[name='npat_extra_q4_12m']").keyup(function(ex){
			    var npat_extra_q3_9m = $("input[name='npat_extra_q3_9m']").val();
				var npat_extra_q4_12m = $("input[name='npat_extra_q4_12m']").val();
				if(npat_extra_q4_12m!="")
				{
				  var npat_extra_q4_3m = parseFloat(npat_extra_q4_12m)-parseFloat(npat_extra_q3_9m);
				  $("input[name='npat_extra_q4_3m']").val(npat_extra_q4_3m);
				}else{
				   $("input[name='npat_extra_q4_3m']").val("");
				   $("input[name='npat_extra_q4_12m']").val("");
				}
			});						
		
		
		    $("#npat_extra_save").click(function(){
			   var company_code = $("#company_code").val();
			   var npat_extra_year_con  = [];
			   var npat_extra_q1_3m_con = [];
			   
			   var npat_extra_q2_3m_con = [];
			   var npat_extra_q2_6m_con = [];
			   
			   var npat_extra_q3_3m_con = [];
			   var npat_extra_q3_9m_con = [];
			   
			   var npat_extra_q4_3m_con = [];
			   var npat_extra_q4_12m_con = [];
			   
			   $("input[name='npat_extra_year']").each(function(){
			      npat_extra_year_con.push($(this).val());
			   }); 
			   $("input[name='npat_extra_q1_3m']").each(function(){
			      npat_extra_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='npat_extra_q2_3m']").each(function(){
			      npat_extra_q2_3m_con.push($(this).val());
			   }); 
			   $("input[name='npat_extra_q2_6m']").each(function(){
			      npat_extra_q2_6m_con.push($(this).val());
			   }); 			   
			   
			   $("input[name='npat_extra_q3_3m']").each(function(){
			      npat_extra_q3_3m_con.push($(this).val());
			   }); 
			   $("input[name='npat_extra_q3_9m']").each(function(){
			      npat_extra_q3_9m_con.push($(this).val());
			   }); 			   
			   
			   $("input[name='npat_extra_q4_3m']").each(function(){
			      npat_extra_q4_3m_con.push($(this).val());
			   }); 		
			   $("input[name='npat_extra_q4_12m']").each(function(){
			      npat_extra_q4_12m_con.push($(this).val());
			   }); 					   
			   
				var dataStr = "company_code="+company_code+"&npat_extra_year_con="+npat_extra_year_con+
					"&npat_extra_q1_3m_con="+npat_extra_q1_3m_con+
					"&npat_extra_q2_3m_con="+npat_extra_q2_3m_con+
					"&npat_extra_q2_6m_con="+npat_extra_q2_6m_con+
					"&npat_extra_q3_3m_con="+npat_extra_q3_3m_con+
					"&npat_extra_q3_9m_con="+npat_extra_q3_9m_con+
					"&npat_extra_q4_3m_con="+npat_extra_q4_3m_con+
					"&npat_extra_q4_12m_con="+npat_extra_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/npat_extra_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						    alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>
		
		
		
		
		
		
		
		<!--- EPS Calculation here --->
		<div class="panel panel-primary">
			<div class="panel-heading">EPS (Continuing Operation) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
					    <th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select class="form-control" name="eps_year"   id="eps_year">
						     <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						
						</select></th>
						<th ><input type="text" class="form-control" name="eps_q1_3m"  id="eps_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_q2_3m" readonly="readonly"  id="eps_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_q2_6m"  id="eps_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="eps_q3_3m" readonly="readonly"   id="eps_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_q3_9m"  id="eps_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="eps_q4_3m" readonly="readonly"   id="eps_q4_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_q4_12m" id="eps_q4_12m"/></th>						
						<th ><input type="button" class="btn btn-warning" id="eps_save" value="Save"/></th>																														
					</tr>
					
					
					<?php 
						$eps_tables = $this->input_form_data->eps_entry_form_datatable();
						foreach($eps_tables as $eps_table){
					?>
					<tr id="<?php echo $eps_table->ID;?>">
					    <td ><?php echo $eps_table->YEAR;?></td>
						<td ><?php echo $eps_table->QUARTER_1_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_2_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_2_6M;?></td>
						<td ><?php echo $eps_table->QUARTER_3_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_3_9M;?></td>
						<td ><?php echo $eps_table->QUARTER_4_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_4_12M;?></td>						
						<td >
							&nbsp;<span class="glyphicon glyphicon-edit"  name="eps_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="eps_btnSave"></span>
						</td>																														
					</tr>
					
					<?php } ?>
														
				</table>

			   	<br/>
			    <p></p>			   
				
			</div>
		</div>						
		<script >
		$(document).ready(function(){
		
		    $("span[name='eps_btnEdit']").bind("click",eps_Edit);
		    $("span[name='eps_btnSave']").bind("click",eps_Save);		   
		
		
			function eps_Edit()
			{			  
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtEpsYear    = par.children("td:nth-child(1)");
   			   var txtEpsQ1_3M   = par.children("td:nth-child(2)");
   			   var txtEpsQ2_3M   = par.children("td:nth-child(3)");
			   var txtEpsQ2_6M   = par.children("td:nth-child(4)");
   			   var txtEpsQ3_3M   = par.children("td:nth-child(5)");
   			   var txtEpsQ3_9M   = par.children("td:nth-child(6)");
   			   var txtEpsQ4_3M   = par.children("td:nth-child(7)");
   			   var txtEpsQ4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtEpsYear.html("<input type='text' class='form-control' value='"+txtEpsYear.text()+"'>");	
			   txtEpsQ1_3M.html("<input type='text'  class='form-control'  value='"+txtEpsQ1_3M.text()+"'>");	
   			   txtEpsQ2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtEpsQ2_3M.text()+"'>");	
			   txtEpsQ2_6M.html("<input type='text'  class='form-control'  value='"+txtEpsQ2_6M.text()+"'>");	
			   txtEpsQ3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtEpsQ3_3M.text()+"'>");	
   			   txtEpsQ3_9M.html("<input type='text'  class='form-control' value='"+txtEpsQ3_9M.text()+"'>");	
			   txtEpsQ4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtEpsQ4_3M.text()+"'>");	
			   txtEpsQ4_12M.html("<input type='text' class='form-control'  value='"+txtEpsQ4_12M.text()+"'>");
			   			
						  
			  //alert('eps_Edit');
			}
			
			function eps_Save()
			{
			  
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtEpsYear    = par.children("td:nth-child(1)");
   			   var txtEpsQ1_3M   = par.children("td:nth-child(2)");
   			   var txtEpsQ2_3M   = par.children("td:nth-child(3)");
			   var txtEpsQ2_6M   = par.children("td:nth-child(4)");
   			   var txtEpsQ3_3M   = par.children("td:nth-child(5)");
   			   var txtEpsQ3_9M   = par.children("td:nth-child(6)");
   			   var txtEpsQ4_3M   = par.children("td:nth-child(7)");
   			   var txtEpsQ4_12M  = par.children("td:nth-child(8)");			
			   
			   var txtEpsYear_val   = txtEpsYear.children("input[type='text']").val();
			   var txtEpsQ1_3M_val  = txtEpsQ1_3M.children("input[type='text']").val();
			   var txtEpsQ2_3M_val  = txtEpsQ2_3M.children("input[type='text']").val();
			   var txtEpsQ2_6M_val  = txtEpsQ2_6M.children("input[type='text']").val();
			   var txtEpsQ3_3M_val  = txtEpsQ3_3M.children("input[type='text']").val();
			   var txtEpsQ3_9M_val  = txtEpsQ3_9M.children("input[type='text']").val();
			   var txtEpsQ4_3M_val  = txtEpsQ4_3M.children("input[type='text']").val();
			   var txtEpsQ4_12M_val = txtEpsQ4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   					   
			   txtEpsYear.html(txtEpsYear_val);
			   txtEpsQ1_3M.html(txtEpsQ1_3M_val);
			   txtEpsQ2_3M.html(txtEpsQ2_3M_val);
			   txtEpsQ2_6M.html(txtEpsQ2_6M_val);
			   txtEpsQ3_3M.html(txtEpsQ3_3M_val);
			   txtEpsQ3_9M.html(txtEpsQ3_9M_val);
			   txtEpsQ4_3M.html(txtEpsQ4_3M_val);
			   txtEpsQ4_12M.html(txtEpsQ4_12M_val);			   
			  
			   var dataStr_eps = "company_code="+company_code+
				"&txtEpsYear_val="+txtEpsYear_val+
			   "&txtEpsQ1_3M_val="+txtEpsQ1_3M_val
			   +"&txtEpsQ2_3M_val="+txtEpsQ2_3M_val
			   +"&txtEpsQ2_6M_val="+txtEpsQ2_6M_val
			   +"&txtEpsQ3_3M_val="+txtEpsQ3_3M_val+
			   "&txtEpsQ3_9M_val="+txtEpsQ3_9M_val+
			   "&txtEpsQ4_3M_val="+txtEpsQ4_3M_val+
			   "&txtEpsQ4_12M_val="+txtEpsQ4_12M_val+
			   "&rowid="+rowid;	
			    
			    if(company_code !="") 
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/eps_continuing_edit_data_by_ajax",
					   data:dataStr_eps,
					   cache:false,
					   success:function(st){
							alert("Data saved successfully");
					   }
					});  
			    }
				else
				{
					alert("Please select company code");
				}	
			  
			   //alert(dataStr_eps);
			}
			
			
			$("input[name='eps_q1_3m']").keyup(function(){
			    var eps_q1_3m = $("input[name='eps_q1_3m']").val();
			    var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			    var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			    var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			    if(eps_q1_3m!="" && eps_q2_6m=="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = parseFloat(eps_q1_3m)*4;
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else{
				  $("input[name='gen_fin_annualized_eps']").val(""); 
				}
			});
			
			
			$("input[name='eps_q2_6m']").keyup(function(){
			    var eps_q1_3m = $("input[name='eps_q1_3m']").val();
			    var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			    var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			    var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			    if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q2_6m)/2) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m=="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = parseFloat(eps_q1_3m) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else{
				  $("input[name='gen_fin_annualized_eps']").val(""); 
				}
			});
			
			$("input[name='eps_q3_9m']").keyup(function(){
				var eps_q1_3m = $("input[name='eps_q1_3m']").val();
			    var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			    var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			    var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			    if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m!="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q3_9m)/3) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q2_6m)/2) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m=="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = parseFloat(eps_q1_3m)/2 * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else{
				  $("input[name='gen_fin_annualized_eps']").val(""); 
				}
			});			
			
			
			$("input[name='eps_q4_12m']").keyup(function(){
				var eps_q1_3m = $("input[name='eps_q1_3m']").val();
			    var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			    var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			    var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			    if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m!="" && eps_q4_12m!="") {
				    var an_eps = parseFloat(eps_q4_12m); 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m!="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q3_9m)/3) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q2_6m)/2) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m=="" && eps_q3_9m=="" && eps_q4_12m=="") {
				    var an_eps = parseFloat(eps_q1_3m) * 4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else{
				  $("input[name='gen_fin_annualized_eps']").val(""); 
				}
			});						
			
			
			$("input[name='eps_q3_9m']").keyup(function(){
			    var eps_q1_3m = $("input[name='eps_q1_3m']").val();
			    var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			    var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			    var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			    if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m!="" && eps_q4_12m=="") {
				    var an_eps = (parseFloat(eps_q3_9m)/3)*4; 
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2)); 
			    }else if(eps_q1_3m!="" && eps_q2_6m=="" && eps_q3_9m=="" && eps_q4_12m==""){
				    var an_eps = parseFloat(eps_q1_3m)*4;  
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2));    
				}else if(eps_q1_3m!="" && eps_q2_6m!="" && eps_q3_9m=="" && eps_q4_12m==""){
				    var an_eps = (parseFloat(eps_q2_6m)/2)*4;  
				    $("input[name='gen_fin_annualized_eps']").val(an_eps.toFixed(2));    
				}else{
				  $("input[name='gen_fin_annualized_eps']").val(""); 
				}
			});
			
			$("input[name='eps_q2_6m']").keyup(function(){
			   var eps_q2_6m = $("input[name='eps_q2_6m']").val();
			   if(eps_q2_6m!="") 
			   {
			     var eps_q1_3m = $("input[name='eps_q1_3m']").val();
				 var eps_q2_3m = parseFloat(eps_q2_6m)- parseFloat(eps_q1_3m);
				 $("input[name='eps_q2_3m']").val(eps_q2_3m); 
			   }else{
			       $("input[name='eps_q2_3m']").val("");
				   $("input[name='eps_q2_6m']").val("");
			   }
			});
			
			$("input[name='eps_q3_9m']").keyup(function(){
			   var eps_q3_9m = $("input[name='eps_q3_9m']").val();
			   if(eps_q3_9m!="") 
			   {
			     var eps_q2_6m = $("input[name='eps_q2_6m']").val();
				 var eps_q3_3m = parseFloat(eps_q3_9m)- parseFloat(eps_q2_6m);
				 $("input[name='eps_q3_3m']").val(eps_q3_3m); 
			   }else{
			       $("input[name='eps_q3_3m']").val("");
				   $("input[name='eps_q3_9m']").val("");
			   }
			});		
			
			$("input[name='eps_q4_12m']").keyup(function(){
			   var eps_q4_12m = $("input[name='eps_q4_12m']").val();
			   if(eps_q4_12m!="") 
			   {
			     var eps_q3_9m = $("input[name='eps_q3_9m']").val();
				 var eps_q4_3m = parseFloat(eps_q4_12m)- parseFloat(eps_q3_9m);
				 $("input[name='eps_q4_3m']").val(eps_q4_3m); 
			   }else{
			       $("input[name='eps_q4_3m']").val("");
				   $("input[name='eps_q4_12m']").val("");
			   }
			});					
		
		    $("#eps_save").click(function(){
			   var company_code = $("#company_code").val();
			   var eps_year_con  = [];
			   var eps_q1_3m_con = [];
			   
			   var eps_q2_3m_con = [];
			   var eps_q2_6m_con = [];
			   
			   var eps_q3_3m_con = [];
			   var eps_q3_9m_con = [];
			   
			   var eps_q4_3m_con = [];
			   var eps_q4_12m_con = [];
			   
			   
			   $("input[name='eps_year']").each(function(){
			      eps_year_con.push($(this).val());
			   }); 
			   $("input[name='eps_q1_3m']").each(function(){
			      eps_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='eps_q2_3m']").each(function(){
			      eps_q2_3m_con.push($(this).val());
			   }); 			   
			   $("input[name='eps_q2_6m']").each(function(){
				   eps_q2_6m_con.push($(this).val());
			   }); 			   			   
			   
			   $("input[name='eps_q3_3m']").each(function(){
			      eps_q3_3m_con.push($(this).val());
			   });
			   $("input[name='eps_q3_9m']").each(function(){
			      eps_q3_9m_con.push($(this).val());
			   });			   
			   
			   
			   $("input[name='eps_q4_3m']").each(function(){
			      eps_q4_3m_con.push($(this).val());
			   }); 					   
			   $("input[name='eps_q4_12m']").each(function(){
			      eps_q4_12m_con.push($(this).val());
			   }); 		
			   
				var dataStr = "company_code="+company_code+"&eps_year_con="+eps_year_con+
					"&eps_q1_3m_con="+eps_q1_3m_con+
					"&eps_q2_3m_con="+eps_q2_3m_con+
					"&eps_q2_6m_con="+eps_q2_6m_con+
					"&eps_q3_3m_con="+eps_q3_3m_con+
					"&eps_q3_9m_con="+eps_q3_9m_con+
					"&eps_q4_3m_con="+eps_q4_3m_con+
					"&eps_q4_12m_con="+eps_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/eps_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>




		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Company Gen Fin Manual Entry Form</div>
			<div class="panel-body">
			   
				<table cellpadding="0" cellspacing="0" >					
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:#FFA62F;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Nav Per Share</th>
						<th style="font-size:10px;text-align:center;background-color:#F2BB66;">Nav Per Share(Restated)</th>
						<th style="font-size:10px;text-align:center;background-color:#E77471;">Reserve</th>
						<th style="font-size:10px;text-align:center;background-color:#CC6600/*#8467D7*/;">Annualized EPS</th>						
						<th>&nbsp;</th>
					</tr>
					<tr>
					    <th ><select class="form-control" name="gen_fin_year" id="gen_fin_year">
				  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="gen_fin_nav_per_share" id="gen_fin_nav_per_share"/></th>
						<th ><input type="text" class="form-control" name="gen_fin_nav_per_share_restated" id="gen_fin_nav_per_share_restated"/></th>
						<th ><input type="text" class="form-control" name="gen_fin_reserve" id="gen_fin_reserve"/></th>
						<th ><input type="text" class="form-control" name="gen_fin_annualized_eps" id="gen_fin_annualized_eps"/></th>						
						<th ><input type="button" class="btn btn-warning" id="gen_fin_save" value="Save"/></th>																																										
					</tr>					
					<?php
					    $gen_fin_tables = $this->input_form_data->company_gen_fin_entry_form_datatable();
					    foreach($gen_fin_tables as $gen_fin_table)
						{
					?>
							<tr id="<?php echo $gen_fin_table->ID;?>">
								<td ><?php echo $gen_fin_table->YEAR;?></td>
								<td ><?php echo $gen_fin_table->NAV_PERSHARE;?></td>
								<td ><?php echo $gen_fin_table->NAV_PERSHARE_RESTATED;?></td>
								<td ><?php echo $gen_fin_table->RESERVE;?></td>
								<td ><?php echo $gen_fin_table->ANNUALIZED_EPS;?></td>						
								<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="gen_fin_btnEdit"></span>
										<span class="glyphicon glyphicon-ok" name="gen_fin_btnSave"></span>	
								</td>																																										
							</tr>
					<?php } ?>
				</table>
			   	<br/>
			    <p></p>			  			   
			</div>
		</div>														
		<script >
		$(document).ready(function(){
		    
		    $("span[name='gen_fin_btnEdit']").bind("click",gen_fin_Edit);
			$("span[name='gen_fin_btnSave']").bind("click",gen_fin_Save);
		    
			function gen_fin_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtGenFinYear    		   = par.children("td:nth-child(1)");
   			   var txtGenFinPerShare   		   = par.children("td:nth-child(2)");
   			   var txtGenFinPerSahreRestated   = par.children("td:nth-child(3)");
			   var txtGenFinReserve   	       = par.children("td:nth-child(4)");
   			   var txtGenFinAnualizedEPS       = par.children("td:nth-child(5)");
			   
			   txtGenFinYear.html("<input type='text' class='form-control' value='"+txtGenFinYear.text()+"'>");	
			   txtGenFinPerShare.html("<input type='text'  class='form-control'  value='"+txtGenFinPerShare.text()+"'>");	
   			   txtGenFinPerSahreRestated.html("<input type='text'  class='form-control' value='"+txtGenFinPerSahreRestated.text()+"'>");	
			   txtGenFinReserve.html("<input type='text'  class='form-control'  value='"+txtGenFinReserve.text()+"'>");	
			   txtGenFinAnualizedEPS.html("<input type='text'  class='form-control' value='"+txtGenFinAnualizedEPS.text()+"'>");	
   			  			
			
			  //alert('gen_fin_Edit');
			}
			
			function gen_fin_Save()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtGenFinYear    		   = par.children("td:nth-child(1)");
   			   var txtGenFinPerShare   		   = par.children("td:nth-child(2)");
   			   var txtGenFinPerSahreRestated   = par.children("td:nth-child(3)");
			   var txtGenFinReserve   	       = par.children("td:nth-child(4)");
   			   var txtGenFinAnualizedEPS       = par.children("td:nth-child(5)");
			
			
			   
			   var txtGenFinYear_val		     = txtGenFinYear.children("input[type='text']").val();
			   var txtGenFinPerShare_val	     = txtGenFinPerShare.children("input[type='text']").val();
			   var txtGenFinPerSahreRestated_val = txtGenFinPerSahreRestated.children("input[type='text']").val();
			   var txtGenFinReserve_val          = txtGenFinReserve.children("input[type='text']").val();
			   var txtGenFinAnualizedEPS_val     = txtGenFinAnualizedEPS.children("input[type='text']").val();
			   var company_code  	             = $("#company_code").val();
			   					   
			   txtGenFinYear.html(txtGenFinYear_val);
			   txtGenFinPerShare.html(txtGenFinPerShare_val);
			   txtGenFinPerSahreRestated.html(txtGenFinPerSahreRestated_val);
			   txtGenFinReserve.html(txtGenFinReserve_val);
			   txtGenFinAnualizedEPS.html(txtGenFinAnualizedEPS_val);
			  
			  
			  
				var dataStr_gen_fin = "company_code="+company_code+
					"&txtGenFinYear_val="+txtGenFinYear_val+
					"&txtGenFinPerShare_val="+txtGenFinPerShare_val+
					"&txtGenFinPerSahreRestated_val="+txtGenFinPerSahreRestated_val+
					"&txtGenFinReserve_val="+txtGenFinReserve_val+					
					"&txtGenFinAnualizedEPS_val="+txtGenFinAnualizedEPS_val+
					"&rowid="+rowid;
				
				if(company_code!="") 
				{
					$.ajax({
					   type:"post",
					   url:"<?php echo site_url();?>/input_form_mb/gen_fin_data_edit_by_ajax",
					   data:dataStr_gen_fin,
					   cache:false,
					   success:function(st){
					     alert("Data saved successfully");
					   }
					});
				}else{
				  alert("Please select company code!");
				}
				
			    //alert(dataStr_gen_fin);
			}
			
		    $("#gen_fin_save").click(function(){
			   var company_code = $("#company_code").val();
			   var gen_fin_year_con  = [];
			   var gen_fin_nav_per_share_con = [];
			   var gen_fin_nav_per_share_restated_con = [];
			   var gen_fin_reserve_con = [];
			   var gen_fin_annualized_eps_con = [];
			   
			   $("input[name='gen_fin_year']").each(function(){
			      gen_fin_year_con.push($(this).val());
			   }); 
			   $("input[name='gen_fin_nav_per_share']").each(function(){
			      gen_fin_nav_per_share_con.push($(this).val());
			   }); 
			   $("input[name='gen_fin_nav_per_share_restated']").each(function(){
			      gen_fin_nav_per_share_restated_con.push($(this).val());
			   }); 			   
			   $("input[name='gen_fin_reserve']").each(function(){
			      gen_fin_reserve_con.push($(this).val());
			   }); 		
			   
			   $("input[name='gen_fin_annualized_eps']").each(function(){
				   gen_fin_annualized_eps_con.push($(this).val());
			   }); 
			   
				var dataStr = "company_code="+company_code+"&gen_fin_year_con="+gen_fin_year_con+
					"&gen_fin_nav_per_share_con="+gen_fin_nav_per_share_con+"&gen_fin_nav_per_share_restated_con="+
					gen_fin_nav_per_share_restated_con+
					"&gen_fin_reserve_con="+gen_fin_reserve_con+
					"&gen_fin_annualized_eps_con="+gen_fin_annualized_eps_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/gen_fin_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>				
		
		

		
		
		
		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Diluted EPS (Continuing Operation) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
						<th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select class="form-control" name="diluted_eps_year"   id="diluted_eps_year">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q1_3m"  id="diluted_eps_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q2_3m" readonly="readonly"   id="diluted_eps_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q2_6m"  id="diluted_eps_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q3_3m" readonly="readonly"  id="diluted_eps_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q3_9m"  id="diluted_eps_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q4_3m" readonly="readonly"  id="diluted_eps_q4_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_q4_12m" id="diluted_eps_q4_12m"/></th>						
						<th >
							<input type="button" class="btn btn-warning" id="diluted_eps_save" value="Save"/>
						</th>																														
					</tr>					
						
					<?php $diluted_eps_tables = $this->input_form_data->diluted_eps_entry_form_datatable();
					foreach($diluted_eps_tables as $diluted_eps_table)
					{
					?>	
					
					<tr id="<?php echo $diluted_eps_table->ID;?>">
					    <td ><?php echo $diluted_eps_table->YEAR;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_1_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_2_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_2_6M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_3_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_3_9M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_4_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_4_12M;?></td>						
						<td >
							&nbsp;<span class="glyphicon glyphicon-edit"  name="diluted_eps_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="diluted_eps_btnSave"></span>
						</td>																														
					</tr>
					
					<?php } ?>	
				</table>
			   	<br/>
			    <p></p>			   
			</div>
		</div>								
		<script >
		$(document).ready(function(){
		
		
		    $("span[name='diluted_eps_btnEdit']").bind("click",diluted_eps_Edit);
			$("span[name='diluted_eps_btnSave']").bind("click",diluted_eps_Saves);
			
			function diluted_eps_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtDilutedEpsYear    = par.children("td:nth-child(1)");
   			   var txtDilutedEpsQ1_3M   = par.children("td:nth-child(2)");
   			   var txtDilutedEpsQ2_3M   = par.children("td:nth-child(3)");
			   var txtDilutedEpsQ2_6M   = par.children("td:nth-child(4)");
   			   var txtDilutedEpsQ3_3M   = par.children("td:nth-child(5)");
   			   var txtDilutedEpsQ3_9M   = par.children("td:nth-child(6)");
   			   var txtDilutedEpsQ4_3M   = par.children("td:nth-child(7)");
   			   var txtDilutedEpsQ4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtDilutedEpsYear.html("<input type='text' class='form-control' value='"+txtDilutedEpsYear.text()+"'>");	
			   txtDilutedEpsQ1_3M.html("<input type='text'  class='form-control'  value='"+txtDilutedEpsQ1_3M.text()+"'>");	
   			   txtDilutedEpsQ2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtDilutedEpsQ2_3M.text()+"'>");	
			   txtDilutedEpsQ2_6M.html("<input type='text'  class='form-control'  value='"+txtDilutedEpsQ2_6M.text()+"'>");	
			   txtDilutedEpsQ3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtDilutedEpsQ3_3M.text()+"'>");	
   			   txtDilutedEpsQ3_9M.html("<input type='text'  class='form-control' value='"+txtDilutedEpsQ3_9M.text()+"'>");	
			   txtDilutedEpsQ4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtDilutedEpsQ4_3M.text()+"'>");	
			   txtDilutedEpsQ4_12M.html("<input type='text' class='form-control'  value='"+txtDilutedEpsQ4_12M.text()+"'>");
			   							  
			
			  //alert('diluted_eps_Edit');
			}
			function diluted_eps_Saves()
			{ 			
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtDilutedEpsYear    = par.children("td:nth-child(1)");
   			   var txtDilutedEpsQ1_3M   = par.children("td:nth-child(2)");
   			   var txtDilutedEpsQ2_3M   = par.children("td:nth-child(3)");
			   var txtDilutedEpsQ2_6M   = par.children("td:nth-child(4)");
   			   var txtDilutedEpsQ3_3M   = par.children("td:nth-child(5)");
   			   var txtDilutedEpsQ3_9M   = par.children("td:nth-child(6)");
   			   var txtDilutedEpsQ4_3M   = par.children("td:nth-child(7)");
   			   var txtDilutedEpsQ4_12M  = par.children("td:nth-child(8)");			
			   
			   var txtDilutedEpsYear_val   = txtDilutedEpsYear.children("input[type='text']").val();
			   var txtDilutedEpsQ1_3M_val  = txtDilutedEpsQ1_3M.children("input[type='text']").val();
			   var txtDilutedEpsQ2_3M_val  = txtDilutedEpsQ2_3M.children("input[type='text']").val();
			   var txtDilutedEpsQ2_6M_val  = txtDilutedEpsQ2_6M.children("input[type='text']").val();
			   var txtDilutedEpsQ3_3M_val  = txtDilutedEpsQ3_3M.children("input[type='text']").val();
			   var txtDilutedEpsQ3_9M_val  = txtDilutedEpsQ3_9M.children("input[type='text']").val();
			   var txtDilutedEpsQ4_3M_val  = txtDilutedEpsQ4_3M.children("input[type='text']").val();
			   var txtDilutedEpsQ4_12M_val = txtDilutedEpsQ4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   					   
			   txtDilutedEpsYear.html(txtDilutedEpsYear_val);
			   txtDilutedEpsQ1_3M.html(txtDilutedEpsQ1_3M_val);
			   txtDilutedEpsQ2_3M.html(txtDilutedEpsQ2_3M_val);
			   txtDilutedEpsQ2_6M.html(txtDilutedEpsQ2_6M_val);
			   txtDilutedEpsQ3_3M.html(txtDilutedEpsQ3_3M_val);
			   txtDilutedEpsQ3_9M.html(txtDilutedEpsQ3_9M_val);
			   txtDilutedEpsQ4_3M.html(txtDilutedEpsQ4_3M_val);
			   txtDilutedEpsQ4_12M.html(txtDilutedEpsQ4_12M_val);	
			
			
				var dataStr_diluted_eps = "company_code="+company_code+
					"&txtDilutedEpsYear_val="+txtDilutedEpsYear_val+
				   "&txtDilutedEpsQ1_3M_val="+txtDilutedEpsQ1_3M_val
				   +"&txtDilutedEpsQ2_3M_val="+txtDilutedEpsQ2_3M_val
				   +"&txtDilutedEpsQ2_6M_val="+txtDilutedEpsQ2_6M_val
				   +"&txtDilutedEpsQ3_3M_val="+txtDilutedEpsQ3_3M_val+
				   "&txtDilutedEpsQ3_9M_val="+txtDilutedEpsQ3_9M_val+
				   "&txtDilutedEpsQ4_3M_val="+txtDilutedEpsQ4_3M_val+
				   "&txtDilutedEpsQ4_12M_val="+txtDilutedEpsQ4_12M_val+
				   "&rowid="+rowid;	
			    
				if(company_code !="") 
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/diluted_eps_continuing_edit_data_by_ajax",
					   data:dataStr_diluted_eps,
					   cache:false,
					   success:function(st){
							alert("Data saved successfully");
					   }
					});  
			    }
				else
				{
					alert("Please select company code");
				}	
			    //alert(dataStr_diluted_eps);
			}
			
			
			$("input[name='diluted_eps_q2_6m']").keyup(function(ex){
			   var diluted_eps_q2_6m = $("input[name='diluted_eps_q2_6m']").val();
			   if(diluted_eps_q2_6m!=""){
			      var diluted_eps_q1_3m = $("input[name='diluted_eps_q1_3m']").val();
				  var diluted_eps_q2_3m = parseFloat(diluted_eps_q2_6m)-parseFloat(diluted_eps_q1_3m);
				  $("input[name='diluted_eps_q2_3m']").val(diluted_eps_q2_3m);
			   }else{
					$("input[name='diluted_eps_q2_3m']").val("");
					$("input[name='diluted_eps_q2_6m']").val("");
			   }
			});
			
			
			$("input[name='diluted_eps_q3_9m']").keyup(function(ex){
			   var diluted_eps_q3_9m = $("input[name='diluted_eps_q3_9m']").val();
			   if(diluted_eps_q3_9m!=""){
			      var diluted_eps_q2_6m = $("input[name='diluted_eps_q2_6m']").val();
				  var diluted_eps_q3_3m = parseFloat(diluted_eps_q3_9m)-parseFloat(diluted_eps_q2_6m);
				  $("input[name='diluted_eps_q3_3m']").val(diluted_eps_q3_3m);
			   }else{
					$("input[name='diluted_eps_q3_3m']").val("");
					$("input[name='diluted_eps_q3_9m']").val("");
			   }
			});	
			
			
			$("input[name='diluted_eps_q4_12m']").keyup(function(ex){
			   var diluted_eps_q4_12m = $("input[name='diluted_eps_q4_12m']").val();
			   if(diluted_eps_q4_12m!=""){
			      var diluted_eps_q3_9m = $("input[name='diluted_eps_q3_9m']").val();
				  var diluted_eps_q4_3m = parseFloat(diluted_eps_q4_12m)-parseFloat(diluted_eps_q3_9m);
				  $("input[name='diluted_eps_q4_3m']").val(diluted_eps_q4_3m);
			   }else{
					$("input[name='diluted_eps_q4_3m']").val("");
					$("input[name='diluted_eps_q4_12m']").val("");
			   }
			});				
			
		
		    $("#diluted_eps_save").click(function(){
			   var company_code = $("#company_code").val();
			   var diluted_eps_year_con  = [];
			   var diluted_eps_q1_3m_con = [];
			   
			   var diluted_eps_q2_3m_con = [];
			   var diluted_eps_q2_6m_con = [];
			   
			   var diluted_eps_q3_3m_con = [];
			   var diluted_eps_q3_9m_con = [];
			   
			   var diluted_eps_q4_3m_con = [];
			   var diluted_eps_q4_12m_con = [];
			   
			   $("input[name='diluted_eps_year']").each(function(){
			      diluted_eps_year_con.push($(this).val());
			   }); 
			   $("input[name='diluted_eps_q1_3m']").each(function(){
			      diluted_eps_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='diluted_eps_q2_3m']").each(function(){
			      diluted_eps_q2_3m_con.push($(this).val());
			   }); 			   
			   $("input[name='diluted_eps_q2_6m']").each(function(){
				   diluted_eps_q2_6m_con.push($(this).val());
			   }); 			   			   
			   
			   $("input[name='diluted_eps_q3_3m']").each(function(){
			      diluted_eps_q3_3m_con.push($(this).val());
			   }); 			   			   
			   $("input[name='diluted_eps_q3_9m']").each(function(){
				   diluted_eps_q3_9m_con.push($(this).val());
			   }); 			   			   			   
			   
			   $("input[name='diluted_eps_q4_3m']").each(function(){
			      diluted_eps_q4_3m_con.push($(this).val());
			   }); 		
			   $("input[name='diluted_eps_q4_12m']").each(function(){
			      diluted_eps_q4_12m_con.push($(this).val());
			   }); 					   
			   
				var dataStr = "company_code="+company_code+"&diluted_eps_year_con="+diluted_eps_year_con+
					"&diluted_eps_q1_3m_con="+diluted_eps_q1_3m_con+
					
					"&diluted_eps_q2_3m_con="+diluted_eps_q2_3m_con+
					"&diluted_eps_q2_6m_con="+diluted_eps_q2_6m_con+
					
					"&diluted_eps_q3_3m_con="+diluted_eps_q3_3m_con+
					"&diluted_eps_q3_9m_con="+diluted_eps_q3_9m_con+
					
					"&diluted_eps_q4_3m_con="+diluted_eps_q4_3m_con+
					"&diluted_eps_q4_12m_con="+diluted_eps_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/diluted_eps_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>




		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Diluted EPS (Including Extraordinary Income) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
						<th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select class="form-control" name="diluted_eps_extra_year"   id="diluted_eps_extra_year">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q1_3m"  id="diluted_eps_extra_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q2_3m"  readonly="readonly" id="diluted_eps_extra_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q2_6m"  id="diluted_eps_extra_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q3_3m"  readonly="readonly" id="diluted_eps_extra_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q3_9m"  id="diluted_eps_extra_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q4_3m"  readonly="readonly" id="diluted_eps_extra_q4_3m"/></th>
						<th ><input type="text" class="form-control" name="diluted_eps_extra_q4_12m" id="diluted_eps_extra_q4_12m"/></th>						
						<th ><input type="button" class="btn btn-warning" id="diluted_eps_extra_save" value="Save"/></th>																														
					</tr>					
						
					<?php						
					   $diluted_eps_extra_tables =  $this->input_form_data->diluted_eps_extra_entry_form_datatable();	
					   foreach($diluted_eps_extra_tables as $diluted_eps_extra_table)
					   {
					?>	
						<tr id="<?php echo $diluted_eps_extra_table->ID;?>">
							<td ><?php echo $diluted_eps_extra_table->YEAR;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_1_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_2_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_2_6M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_3_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_3_9M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_4_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_4_12M;?></td>						
							<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="diluted_eps_extra_btnEdit"></span>
								<span class="glyphicon glyphicon-ok" name="diluted_eps_extra_btnSave"></span>
							</td>																														
						</tr>			
						
					<?php } ?>	
				</table>
			   	<br/>
			    <p></p>			   			   
			</div>
		</div>										
		<script >
		$(document).ready(function(){
		
		    $("span[name='diluted_eps_extra_btnEdit']").bind("click",diluted_eps_extra_Edit);
		    $("span[name='diluted_eps_extra_btnSave']").bind("click",diluted_eps_extra_Save);			
		
		    function diluted_eps_extra_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtDilutedEpsExtraYear    = par.children("td:nth-child(1)");
   			   var txtDilutedEpsExtraQ1_3M   = par.children("td:nth-child(2)");
   			   var txtDilutedEpsExtraQ2_3M   = par.children("td:nth-child(3)");
			   var txtDilutedEpsExtraQ2_6M   = par.children("td:nth-child(4)");
   			   var txtDilutedEpsExtraQ3_3M   = par.children("td:nth-child(5)");
   			   var txtDilutedEpsExtraQ3_9M   = par.children("td:nth-child(6)");
   			   var txtDilutedEpsExtraQ4_3M   = par.children("td:nth-child(7)");
   			   var txtDilutedEpsExtraQ4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtDilutedEpsExtraYear.html("<input type='text' class='form-control' value='"+txtDilutedEpsExtraYear.text()+"'>");	
			   txtDilutedEpsExtraQ1_3M.html("<input type='text'  class='form-control'  value='"+txtDilutedEpsExtraQ1_3M.text()+"'>");	
   			   txtDilutedEpsExtraQ2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtDilutedEpsExtraQ2_3M.text()+"'>");	
			   txtDilutedEpsExtraQ2_6M.html("<input type='text'  class='form-control'  value='"+txtDilutedEpsExtraQ2_6M.text()+"'>");	
			   txtDilutedEpsExtraQ3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtDilutedEpsExtraQ3_3M.text()+"'>");	
   			   txtDilutedEpsExtraQ3_9M.html("<input type='text'  class='form-control' value='"+txtDilutedEpsExtraQ3_9M.text()+"'>");	
			   txtDilutedEpsExtraQ4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtDilutedEpsExtraQ4_3M.text()+"'>");	
			   txtDilutedEpsExtraQ4_12M.html("<input type='text' class='form-control'  value='"+txtDilutedEpsExtraQ4_12M.text()+"'>");
			   							  
						
			
			  //alert('diluted_eps_extra_Edit');
			}
			
			function diluted_eps_extra_Save()
			{
			  
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtDilutedEpsExtraYear    = par.children("td:nth-child(1)");
   			   var txtDilutedEpsExtraQ1_3M   = par.children("td:nth-child(2)");
   			   var txtDilutedEpsExtraQ2_3M   = par.children("td:nth-child(3)");
			   var txtDilutedEpsExtraQ2_6M   = par.children("td:nth-child(4)");
   			   var txtDilutedEpsExtraQ3_3M   = par.children("td:nth-child(5)");
   			   var txtDilutedEpsExtraQ3_9M   = par.children("td:nth-child(6)");
   			   var txtDilutedEpsExtraQ4_3M   = par.children("td:nth-child(7)");
   			   var txtDilutedEpsExtraQ4_12M  = par.children("td:nth-child(8)");			
			   
			   var txtDilutedEpsExtraYear_val   = txtDilutedEpsExtraYear.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ1_3M_val  = txtDilutedEpsExtraQ1_3M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ2_3M_val  = txtDilutedEpsExtraQ2_3M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ2_6M_val  = txtDilutedEpsExtraQ2_6M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ3_3M_val  = txtDilutedEpsExtraQ3_3M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ3_9M_val  = txtDilutedEpsExtraQ3_9M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ4_3M_val  = txtDilutedEpsExtraQ4_3M.children("input[type='text']").val();
			   var txtDilutedEpsExtraQ4_12M_val = txtDilutedEpsExtraQ4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   					   
			   txtDilutedEpsExtraYear.html(txtDilutedEpsExtraYear_val);
			   txtDilutedEpsExtraQ1_3M.html(txtDilutedEpsExtraQ1_3M_val);
			   txtDilutedEpsExtraQ2_3M.html(txtDilutedEpsExtraQ2_3M_val);
			   txtDilutedEpsExtraQ2_6M.html(txtDilutedEpsExtraQ2_6M_val);
			   txtDilutedEpsExtraQ3_3M.html(txtDilutedEpsExtraQ3_3M_val);
			   txtDilutedEpsExtraQ3_9M.html(txtDilutedEpsExtraQ3_9M_val);
			   txtDilutedEpsExtraQ4_3M.html(txtDilutedEpsExtraQ4_3M_val);
			   txtDilutedEpsExtraQ4_12M.html(txtDilutedEpsExtraQ4_12M_val);
			   
			   var dataStr_diluted_eps_extra = "company_code="+company_code+
					"&txtDilutedEpsExtraYear_val="+txtDilutedEpsExtraYear_val+
				   "&txtDilutedEpsExtraQ1_3M_val="+txtDilutedEpsExtraQ1_3M_val
				   +"&txtDilutedEpsExtraQ2_3M_val="+txtDilutedEpsExtraQ2_3M_val
				   +"&txtDilutedEpsExtraQ2_6M_val="+txtDilutedEpsExtraQ2_6M_val
				   +"&txtDilutedEpsExtraQ3_3M_val="+txtDilutedEpsExtraQ3_3M_val+
				   "&txtDilutedEpsExtraQ3_9M_val="+txtDilutedEpsExtraQ3_9M_val+
				   "&txtDilutedEpsExtraQ4_3M_val="+txtDilutedEpsExtraQ4_3M_val+
				   "&txtDilutedEpsExtraQ4_12M_val="+txtDilutedEpsExtraQ4_12M_val+
				   "&rowid="+rowid;	
			   
			   
			    if(company_code !="") 
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/diluted_eps_extra_continuing_edit_data_by_ajax",
					   data:dataStr_diluted_eps_extra,
					   cache:false,
					   success:function(st){
							alert("Data saved successfully");
					   }
					});  
			    }
				else
				{
					alert("Please select company code");
				}	
			   
			  //alert('diluted_eps_extra_Save');
			}
		
		
		    $("input[name='diluted_eps_extra_q2_6m']").keyup(function(ex){
			    var diluted_eps_extra_q2_6m = $("input[name='diluted_eps_extra_q2_6m']").val();
				if(diluted_eps_extra_q2_6m!="")
				{
				   var diluted_eps_extra_q1_3m = $("input[name='diluted_eps_extra_q1_3m']").val();
				   var diluted_eps_extra_q2_3m = parseFloat(diluted_eps_extra_q2_6m) - parseFloat(diluted_eps_extra_q1_3m);
				   $("input[name='diluted_eps_extra_q2_3m']").val(diluted_eps_extra_q2_3m);
				}else{
				   $("input[name='diluted_eps_extra_q2_3m']").val("");
				   $("input[name='diluted_eps_extra_q2_6m']").val("");
				}
			});
			
			
		    $("input[name='diluted_eps_extra_q3_9m']").keyup(function(ex){
			    var diluted_eps_extra_q3_9m = $("input[name='diluted_eps_extra_q3_9m']").val();
				if(diluted_eps_extra_q3_9m!="")
				{
				   var diluted_eps_extra_q2_6m = $("input[name='diluted_eps_extra_q2_6m']").val();
				   var diluted_eps_extra_q3_3m = parseFloat(diluted_eps_extra_q3_9m) - parseFloat(diluted_eps_extra_q2_6m);
				   $("input[name='diluted_eps_extra_q3_3m']").val(diluted_eps_extra_q3_3m);
				}else{
				   $("input[name='diluted_eps_extra_q3_3m']").val("");
				   $("input[name='diluted_eps_extra_q3_9m']").val("");
				}
			});			
			
			
		    $("input[name='diluted_eps_extra_q4_12m']").keyup(function(ex){
			    var diluted_eps_extra_q4_12m = $("input[name='diluted_eps_extra_q4_12m']").val();
				if(diluted_eps_extra_q4_12m !="")
				{
				   var diluted_eps_extra_q3_9m = $("input[name='diluted_eps_extra_q3_9m']").val();
				   var diluted_eps_extra_q4_3m = parseFloat(diluted_eps_extra_q4_12m) - parseFloat(diluted_eps_extra_q3_9m);
				   $("input[name='diluted_eps_extra_q4_3m']").val(diluted_eps_extra_q4_3m);
				}else{
				   $("input[name='diluted_eps_extra_q4_3m']").val("");
				   $("input[name='diluted_eps_extra_q4_12m']").val("");
				}
			});						
		
		    $("#diluted_eps_extra_save").click(function(){
			   var company_code = $("#company_code").val();
			   var diluted_eps_extra_year_con  = [];
			   var diluted_eps_extra_q1_3m_con = [];
			   
			   var diluted_eps_extra_q2_3m_con = [];
			   var diluted_eps_extra_q2_6m_con = [];
			   
			   var diluted_eps_extra_q3_3m_con = [];
			   var diluted_eps_extra_q3_9m_con = [];
			   
			   var diluted_eps_extra_q4_3m_con = [];
			   var diluted_eps_extra_q4_12m_con = [];
			   
			   $("input[name='diluted_eps_extra_year']").each(function(){
			      diluted_eps_extra_year_con.push($(this).val());
			   }); 
			   $("input[name='diluted_eps_extra_q1_3m']").each(function(){
			      diluted_eps_extra_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='diluted_eps_extra_q2_3m']").each(function(){
			      diluted_eps_extra_q2_3m_con.push($(this).val());
			   }); 		
			   $("input[name='diluted_eps_extra_q2_6m']").each(function(){
			      diluted_eps_extra_q2_6m_con.push($(this).val());
			   }); 			   
			   
			   $("input[name='diluted_eps_extra_q3_3m']").each(function(){
			      diluted_eps_extra_q3_3m_con.push($(this).val());
			   }); 
			   $("input[name='diluted_eps_extra_q3_9m']").each(function(){
			      diluted_eps_extra_q3_9m_con.push($(this).val());
			   }); 			   
			   
			   $("input[name='diluted_eps_extra_q4_3m']").each(function(){
			      diluted_eps_extra_q4_3m_con.push($(this).val());
			   }); 		
			   $("input[name='diluted_eps_extra_q4_12m']").each(function(){
			      diluted_eps_extra_q4_12m_con.push($(this).val());
			   }); 					   
			   
				var dataStrdiluted_eps_extra = "company_code="+company_code+"&diluted_eps_extra_year_con="+diluted_eps_extra_year_con+
					"&diluted_eps_extra_q1_3m_con="+diluted_eps_extra_q1_3m_con+
					"&diluted_eps_extra_q2_3m_con="+diluted_eps_extra_q2_3m_con+
					"&diluted_eps_extra_q2_6m_con="+diluted_eps_extra_q2_6m_con+					
					"&diluted_eps_extra_q3_3m_con="+diluted_eps_extra_q3_3m_con+
					"&diluted_eps_extra_q3_9m_con="+diluted_eps_extra_q3_9m_con+					
					"&diluted_eps_extra_q4_3m_con="+diluted_eps_extra_q4_3m_con+
					"&diluted_eps_extra_q4_12m_con="+diluted_eps_extra_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/diluted_eps_extra_data_add_by_ajax" ,
					   data:dataStrdiluted_eps_extra ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>		







		
		<div class="panel panel-primary">
			<div class="panel-heading">EPS (Including Extraordinary Income) Manual Entry Form</div>
			<div class="panel-body">
			   
				<table cellpadding="0" cellspacing="0" >
					<tr>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th style="font-size:10px;text-align:center;background-color:#728C00;">Q1</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Q2</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Q3</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Q4</th>
					    <th>&nbsp;</th>
					</tr>	
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#8467D7;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">6 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">9 Month</th>
						<th style="font-size:10px;text-align:center;background-color:#E2A76F;">3 Month</th>
						<th style="font-size:10px;text-align:center;background-color:	#FFA62F;">12 Month</th>						
					</tr>
					<tr>
					    <th ><select  name="eps_extra_income_year" id="eps_extra_income_q4_12m">
						  <?php for($i=2000;$i<=2030;$i++){ 
						      if($i==date('Y')){
						?>
						   <option value="<?php echo date('Y');?>" selected="selected"><?php  echo date('Y');?></option>
						<?php }else{ ?>   
						   <option value="<?php echo $i;?>"><?php  echo $i;?></option>
						   <?php }
							}
						   ?>
						</select></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q1_3m" id="eps_extra_income_q1_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q2_3m" readonly="readonly" id="eps_extra_income_q2_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q2_6m" id="eps_extra_income_q2_6m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q3_3m" readonly="readonly"  id="eps_extra_income_q3_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q3_9m" id="eps_extra_income_q3_9m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q4_3m" readonly="readonly"  id="eps_extra_income_q4_3m"/></th>
						<th ><input type="text" class="form-control" name="eps_extra_income_q4_12m" id="eps_extra_income_q4_12m"/></th>						
						<th ><input type="button" class="btn btn-warning" id="eps_extra_income_save" value="Save"/></th>																																				
					</tr>					
					
					<?php  $eps_extra_tables = $this->input_form_data->eps_extra_entry_form_datatable();
					foreach($eps_extra_tables as $eps_extra_table)
					{	
					?>
						<tr id="<?php echo $eps_extra_table->ID;?>">
							<td ><?php echo $eps_extra_table->YEAR;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_1_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_2_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_2_6M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_3_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_3_9M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_4_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_4_12M;?></td>						
							<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="eps_extra_btnEdit"></span>
								<span class="glyphicon glyphicon-ok" name="eps_extra_btnSave"></span>
							</td>																														
						</tr>	
					<?php } ?> 
					
				</table>
				<br/>
			    <p></p>			  			   
			</div>
		</div>												
		<script >
		$(document).ready(function(){
		
		    $("span[name='eps_extra_btnEdit']").bind("click",eps_extra_Edit);
			$("span[name='eps_extra_btnSave']").bind("click",eps_extra_Save);
		
		    function eps_extra_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtEpsExtraYear    = par.children("td:nth-child(1)");
   			   var txtEpsExtraQ1_3M   = par.children("td:nth-child(2)");
   			   var txtEpsExtraQ2_3M   = par.children("td:nth-child(3)");
			   var txtEpsExtraQ2_6M   = par.children("td:nth-child(4)");
   			   var txtEpsExtraQ3_3M   = par.children("td:nth-child(5)");
   			   var txtEpsExtraQ3_9M   = par.children("td:nth-child(6)");
   			   var txtEpsExtraQ4_3M   = par.children("td:nth-child(7)");
   			   var txtEpsExtraQ4_12M  = par.children("td:nth-child(8)");			   
			   
			   txtEpsExtraYear.html("<input type='text' class='form-control' value='"+txtEpsExtraYear.text()+"'>");	
			   txtEpsExtraQ1_3M.html("<input type='text'  class='form-control'  value='"+txtEpsExtraQ1_3M.text()+"'>");	
   			   txtEpsExtraQ2_3M.html("<input type='text'  class='form-control' readonly='readonly' value='"+txtEpsExtraQ2_3M.text()+"'>");	
			   txtEpsExtraQ2_6M.html("<input type='text'  class='form-control'  value='"+txtEpsExtraQ2_6M.text()+"'>");	
			   txtEpsExtraQ3_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtEpsExtraQ3_3M.text()+"'>");	
   			   txtEpsExtraQ3_9M.html("<input type='text'  class='form-control' value='"+txtEpsExtraQ3_9M.text()+"'>");	
			   txtEpsExtraQ4_3M.html("<input type='text'  class='form-control' readonly='readonly'  value='"+txtEpsExtraQ4_3M.text()+"'>");	
			   txtEpsExtraQ4_12M.html("<input type='text' class='form-control'  value='"+txtEpsExtraQ4_12M.text()+"'>");
			   							  
						
			  
			  //alert('eps_extra_Edit');
			}
			
			function eps_extra_Save()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtEpsExtraYear    = par.children("td:nth-child(1)");
   			   var txtEpsExtraQ1_3M   = par.children("td:nth-child(2)");
   			   var txtEpsExtraQ2_3M   = par.children("td:nth-child(3)");
			   var txtEpsExtraQ2_6M   = par.children("td:nth-child(4)");
   			   var txtEpsExtraQ3_3M   = par.children("td:nth-child(5)");
   			   var txtEpsExtraQ3_9M   = par.children("td:nth-child(6)");
   			   var txtEpsExtraQ4_3M   = par.children("td:nth-child(7)");
   			   var txtEpsExtraQ4_12M  = par.children("td:nth-child(8)");			
			   
			   var txtEpsExtraYear_val   = txtEpsExtraYear.children("input[type='text']").val();
			   var txtEpsExtraQ1_3M_val  = txtEpsExtraQ1_3M.children("input[type='text']").val();
			   var txtEpsExtraQ2_3M_val  = txtEpsExtraQ2_3M.children("input[type='text']").val();
			   var txtEpsExtraQ2_6M_val  = txtEpsExtraQ2_6M.children("input[type='text']").val();
			   var txtEpsExtraQ3_3M_val  = txtEpsExtraQ3_3M.children("input[type='text']").val();
			   var txtEpsExtraQ3_9M_val  = txtEpsExtraQ3_9M.children("input[type='text']").val();
			   var txtEpsExtraQ4_3M_val  = txtEpsExtraQ4_3M.children("input[type='text']").val();
			   var txtEpsExtraQ4_12M_val = txtEpsExtraQ4_12M.children("input[type='text']").val();			   
			   var company_code  	  = $("#company_code").val();
			   					   
			   txtEpsExtraYear.html(txtEpsExtraYear_val);
			   txtEpsExtraQ1_3M.html(txtEpsExtraQ1_3M_val);
			   txtEpsExtraQ2_3M.html(txtEpsExtraQ2_3M_val);
			   txtEpsExtraQ2_6M.html(txtEpsExtraQ2_6M_val);
			   txtEpsExtraQ3_3M.html(txtEpsExtraQ3_3M_val);
			   txtEpsExtraQ3_9M.html(txtEpsExtraQ3_9M_val);
			   txtEpsExtraQ4_3M.html(txtEpsExtraQ4_3M_val);
			   txtEpsExtraQ4_12M.html(txtEpsExtraQ4_12M_val);
			   
			  
			  
				var dataStr_eps_extra = "company_code="+company_code+
					"&txtEpsExtraYear_val="+txtEpsExtraYear_val+
					"&txtEpsExtraQ1_3M_val="+txtEpsExtraQ1_3M_val+
					"&txtEpsExtraQ2_3M_val="+txtEpsExtraQ2_3M_val+
					"&txtEpsExtraQ2_6M_val="+txtEpsExtraQ2_6M_val+					
					"&txtEpsExtraQ3_3M_val="+txtEpsExtraQ3_3M_val+
					"&txtEpsExtraQ3_9M_val="+txtEpsExtraQ3_9M_val+					
					"&txtEpsExtraQ4_3M_val="+txtEpsExtraQ4_3M_val+
					"&txtEpsExtraQ4_12M_val="+txtEpsExtraQ4_12M_val+
					"&rowid="+rowid;
				
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/epsextra_continuing_edit_data_by_ajax" ,
					   data:dataStr_eps_extra ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
				
			  //alert('eps_extra_Save');
			}	
			
			
			$("input[name='eps_extra_income_q2_6m']").keyup(function(ex){
			    var eps_extra_income_q2_6m = $("input[name='eps_extra_income_q2_6m']").val();
				if(eps_extra_income_q2_6m!=""){
				   var eps_extra_income_q1_3m = $("input[name='eps_extra_income_q1_3m']").val();
				   var eps_extra_income_q2_3m = parseFloat(eps_extra_income_q2_6m) - parseFloat(eps_extra_income_q1_3m);
				   $("input[name='eps_extra_income_q2_3m']").val(eps_extra_income_q2_3m);
				}else{
				  $("input[name='eps_extra_income_q2_3m']").val("");
				  $("input[name='eps_extra_income_q2_6m']").val("");
				}
			});
		
			$("input[name='eps_extra_income_q3_9m']").keyup(function(ex){
			    var eps_extra_income_q3_9m = $("input[name='eps_extra_income_q3_9m']").val();
				if(eps_extra_income_q3_9m!=""){
				   var eps_extra_income_q2_6m = $("input[name='eps_extra_income_q2_6m']").val();
				   var eps_extra_income_q3_3m = parseFloat(eps_extra_income_q3_9m) - parseFloat(eps_extra_income_q2_6m);
				   $("input[name='eps_extra_income_q3_3m']").val(eps_extra_income_q3_3m);
				}else{
				  $("input[name='eps_extra_income_q3_3m']").val("");
				  $("input[name='eps_extra_income_q3_6m']").val("");
				}
			});		
		
		
			$("input[name='eps_extra_income_q4_12m']").keyup(function(ex){
			    var eps_extra_income_q4_12m = $("input[name='eps_extra_income_q4_12m']").val();
				if(eps_extra_income_q4_12m!=""){
				   var eps_extra_income_q3_9m = $("input[name='eps_extra_income_q3_9m']").val();
				   var eps_extra_income_q4_3m = parseFloat(eps_extra_income_q4_12m) - parseFloat(eps_extra_income_q3_9m);
				   $("input[name='eps_extra_income_q4_3m']").val(eps_extra_income_q4_3m);
				}else{
				  $("input[name='eps_extra_income_q4_3m']").val("");
				  $("input[name='eps_extra_income_q4_12m']").val("");
				}
			});				
		
		    $("#eps_extra_income_save").click(function(){
			   var company_code = $("#company_code").val();
			   var eps_extra_income_year_con  = [];
			   var eps_extra_income_q1_3m_con = [];
			   
			   var eps_extra_income_q2_3m_con = [];
			   var eps_extra_income_q2_6m_con = [];
			   
			   var eps_extra_income_q3_3m_con = [];
			   var eps_extra_income_q3_9m_con = [];
			   
			   var eps_extra_income_q4_3m_con = [];
			   var eps_extra_income_q4_12m_con = [];
			   
			   $("input[name='eps_extra_income_year']").each(function(){
			      eps_extra_income_year_con.push($(this).val());
			   }); 
			   $("input[name='eps_extra_income_q1_3m']").each(function(){
			      eps_extra_income_q1_3m_con.push($(this).val());
			   }); 
			   
			   $("input[name='eps_extra_income_q2_3m']").each(function(){
			      eps_extra_income_q2_3m_con.push($(this).val());
			   }); 			   
			   $("input[name='eps_extra_income_q2_6m']").each(function(){
				   eps_extra_income_q2_6m_con.push($(this).val());
			   }); 			   			   
			   
			   $("input[name='eps_extra_income_q3_3m']").each(function(){
			      eps_extra_income_q3_3m_con.push($(this).val());
			   }); 			   			   
			   $("input[name='eps_extra_income_q3_9m']").each(function(){
				   eps_extra_income_q3_9m_con.push($(this).val());
			   }); 			   			   			   
			   
			  
			   $("input[name='eps_extra_income_q4_3m']").each(function(){
			      eps_extra_income_q4_3m_con.push($(this).val());
			   }); 		
			   $("input[name='eps_extra_income_q4_12m']").each(function(){
			      eps_extra_income_q4_12m_con.push($(this).val());
			   }); 					   
			   
				var dataStr = "company_code="+company_code+"&eps_extra_income_year_con="+eps_extra_income_year_con+
					"&eps_extra_income_q1_3m_con="+eps_extra_income_q1_3m_con+
					"&eps_extra_income_q2_3m_con="+eps_extra_income_q2_3m_con+
					"&eps_extra_income_q2_6m_con="+eps_extra_income_q2_6m_con+
					"&eps_extra_income_q3_3m_con="+eps_extra_income_q3_3m_con+
					"&eps_extra_income_q3_9m_con="+eps_extra_income_q3_9m_con+
					"&eps_extra_income_q4_3m_con="+eps_extra_income_q4_3m_con+
					"&eps_extra_income_q4_12m_con="+eps_extra_income_q4_12m_con;
					
				if(company_code=="") 
				{
				  alert("select company code");
				  return false;
				}
				else
				{
					$.ajax({
					   type:"post" ,
					   url:"<?php echo site_url();?>/input_form_mb/eps_extra_income_data_add_by_ajax" ,
					   data:dataStr ,
					   cache:false ,
					   success:function(st){
						  alert("Data saved successfully");
					   }
					});	
				}	
			 
			});			
		});
		</script>	
	<?php 	
	}
	
	
	
	public function company_logo_upload_ui()
	{		
	?>	
		<div class="panel panel-primary">
			<div class="panel-heading">Company Logo Importer</div>
			<div class="panel-body">
			   
			   <iframe style="width:700px;border:1px solid #fff;" src="<?php echo site_url();?>/mb/logo_upload_form">			   
			   </iframe>	
			   <br/>		   
			   
			</div>
		</div>
	<?php
	}
	
	public function logo_upload_form()
	{
		$this->load->view('utility');
	    $this->load->helper(array('url','form'));
		echo form_open_multipart('mb/logo_do_upload');
		
		$this->load->model("input_form_data");
		$codes = $this->input_form_data->company_code_for_combo();
	?>
		<table>
			<tr><td>Company Code:</td>
				<td>
					<select name="company_code" class="form-control" >
					<?php foreach($codes as $code){?>
					<option value="<?php echo $code->CODE;?>"><?php echo $code->CODE;?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
			    <td>Company Logo:</td>
				<td><input type="file" name="logo_file_importer"  /></td>
			</tr>
			<tr><td>&nbsp;</td>
				<td><input type="submit" class="btn btn-primary" value="Import Logo" /></td>
			</tr>
		</table>					
		</form>
	<?php
	}
	
	
	public function logo_do_upload()
	{	
	    $company_code = $this->input->post("company_code");
	    $filename     = $_FILES['logo_file_importer']['name'];
		$base_url     = base_url();
		$location     = "./company_logo/".$filename;
		
		if(move_uploaded_file($_FILES['logo_file_importer']['tmp_name'],"company_logo/".$_FILES['logo_file_importer']['name']))
		{
		    echo "Successfully uploaded your file $filename!<br/>";	
			$this->load->model("input_form_data");
			$this->input_form_data->company_logo_insert($company_code,$filename);			
		}
		else
		{
		  echo "upload error!";
		}				
	}
	
	
	
	public function management_info_entry_form_ui()
	{
	    $this->load->view("editor_utility");
		$this->load->model("input_form_data");
	?>		
	    <div class="panel panel-primary">
			<div class="panel-heading">Management Information Entry Form</div>
			<div class="panel-body">
			    <table>
					<tr>				
						<td>Company Code:</td>
					</tr>				
					<tr>				
						<td>
						    <select id="company_code" class="form-control">
							   <?php $codes = $this->input_form_data->company_code_for_combo(); 
							      foreach($codes as $code){
							   ?>
							   <option value="<?php echo $code->CODE;?>"><?php echo $code->CODE;?></option>
							   <?php } ?>
							</select>
						</td>
					</tr>	
					<tr>				
						<td>Management Information:</td>
					</tr>						
					<tr>				
						<td>
							<div style="width:0 auto;">  
								<textarea class="summernote" id="management_info_val"></textarea>	
							</div>	   
						</td>
					</tr>
					<tr>				
						<td><input type="button" class="btn btn-warning" id="management_info_save_btn" value="Save"/>
						</td>
					</tr>
				</table>			   
			</div>
		</div>
		
		<script type="text/javascript">
		$(document).ready(function(){
		    $("#management_info_save_btn").click(function()
			{
			    var company_code  = $("#company_code").val();
				var management_info_val = $("#management_info_val").code();
				if(company_code=="") 
				{			       
					alert("Select company code");
					$("#company_code").focus();
					return false;	
				}
				else if(management_info_val=="") 
				{			       
					alert("Enter management info");
					//$("#management_info_val").focus();
					return false;	
				}
				else
				{
					$.ajax({
						type:"post" ,
						url:"<?php echo site_url();?>/mb/management_info_add_by_ajax",
						data:"company_code="+company_code+"&management_info_val="+management_info_val ,
						cache:false,
						success:function(st)
						{
						   alert("Data saved successfully");
						}
					});				 
				}
		    });
		});
		</script>		
<?php 	
	}
	
	public function management_info_add_by_ajax()
	{
	    $company_code        = $this->input->post("company_code");
		$management_info_val = $this->input->post("management_info_val");
		$this->load->model("input_form_data");
		$this->input_form_data->company_management_info_insert($company_code , $management_info_val);
		echo 1;
	}
	
	public function company_info_manual_entry_form_ui()
	{
	    $this->load->model("input_form_data");
		$codes_combo = $this->input_form_data->company_code_for_combo();
	?>
	    <div class="panel panel-primary">
			<div class="panel-heading">Company Information </div>
			<div class="panel-body">
				<table width="100%">
				<tr>
				<td>
				<table>
				<tr>
					<td>Company Code:</td>
					<td>
						<select id="company_codes" class="form-control">
						 <option value="">Select company</option>
						  <?php foreach($codes_combo as $codes_comb){ ?>
							<option value="<?php echo $codes_comb->CODE;?>"><?php echo $codes_comb->CODE;?></option>
						  <?php } ?> 
						</select>  
					</td>
				</tr>
				<tr>
					<td>Company Number:</td>
					<td>
						<input type="text" id="company_number" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Face Value:</td>
					<td>
						<input type="text" id="face_value" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Category:</td>
					<td>
						<input type="text" id="category" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Electronic:</td>
					<td>
						<input type="text" id="electronic" class="form-control"/>  
					</td>
				</tr>
				<tr>

					<td>Market Lot:</td>
					<td>
						<input type="text" id="market_lot" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>52Week Range:</td>
					<td>
						<input type="text" id="_52week_range" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Sector:</td>
							<td>
						<input type="text" id="sector" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Listing Year:</td>
					<td>
						<input type="text" id="listing_year" class="form-control"/>  
					</td>
				</tr>		
				<tr>
					<td>Year End:</td>
					<td>
						<input type="text" id="year_end" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Establishing Date:</td>
					<td>
						<input type="text" id="establishing_date" class="form-control"/>  
					</td>
				</tr>
				
				</table>
				</td>
				<td>&nbsp;&nbsp;</td>
				<td>
				<table>
				
				<tr>
					<td>Trade Start Date:</td>
					<td>
						<input type="text" id="trade_start_date" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Offer Price:</td>
					<td>
						<input type="text" id="offer_price" class="form-control"/>  
					</td>
				</tr>		
				<tr>
					<td>Credit Rating Firm:</td>
					<td>
						<input type="text" id="credit_rating_firm" class="form-control"/>  
					</td>
				</tr>				
				<tr>
					<td>Parent Company:</td>
					<td>
						<input type="text" id="parent_company" class="form-control"/>  
					</td>
				</tr>						
				<tr>
					<td>Company Purpose:</td>
					<td>
						<input type="text" id="company_purpose" class="form-control"/>  
					</td>
				</tr>								
				<tr>
					<td>Address:</td>
					<td>
						<input type="text" id="address" class="form-control"/>  
					</td>
				</tr>	
				<tr>
					<td>Telephone:</td>
					<td>
						<input type="text" id="phone" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Fax:</td>
					<td>
						<input type="text" id="fax" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Email:</td>
					<td>
						<input type="text" id="email" class="form-control"/>  
					</td>
				</tr>
				<tr>
					<td>Website:</td>
					<td>
						<input type="text" id="website" class="form-control"/>  
					</td>
				</tr>		
				</table>
				</td>
				</tr>		
				</table>
				
				
			</div>
		</div>	
		
		<input type="hidden" id="share_table_row_id" value=""/>
		<input type="hidden" id="paidup_table_row_id" value=""/>
		
		
		
		<div class="panel panel-primary">
			<div class="panel-heading">Share Information </div>
			<div class="panel-body">
			
			
			<table  width="100%">
			<tr>
				<td>
				   <table width="100%">
				   <tr>
					 <td>Total Share</td>
					 <td><input type="text" id="total_share" class="form-control"/></td>
				   </tr>
					<tr>
					 <td>Market CAP</td>
					 <td><input type="text" id="market_cap" class="form-control"/></td>
				   </tr>			   
					<tr>
					 <td>Authorized CAP</td>
					 <td><input type="text" id="authorized_cap" class="form-control"/></td>
				   </tr>
				   <tr>
					 <td>Paidup CAP</td>
					 <td><input type="text" id="paidup_cap" class="form-control"/></td>
				   </tr>
					<tr>
					 <td>Sponsor</td>
					 <td><input type="text" id="sponsor" class="form-control"/></td>
				   </tr>	
					<tr>
					 <td>Govt</td>
					 <td><input type="text" id="govt" class="form-control"/></td>
				   </tr>	
					<tr>
					 <td>Institute</td>
					 <td><input type="text" id="institute" class="form-control"/></td>
				   </tr>				   
				   </table>
				</td>
			    <td>&nbsp;&nbsp;&nbsp;</td>
			    <td>
			      <table>				  				   			   
					<tr>
					 <td>Foreign</td>
					 <td><input type="text" id="foreign" class="form-control"/></td>
				   </tr>				   			   			   
					<tr>
					 <td>Public</td>
					 <td><input type="text" id="publics" class="form-control"/></td>
				   </tr>				   			   			   			   			   
					<tr>
					 <td>Reserve Surplus</td>
					 <td><input type="text" id="reserve_surplus" class="form-control"/></td>
				   </tr>
					<tr>
					 <td>Floating Percentage</td>
					 <td><input type="text" id="floating_percentage" class="form-control"/></td>
				   </tr>			   
					<tr>
					 <td>Floating No of Share</td>
					 <td><input type="text" id="floating_no_of_share" class="form-control"/></td>
				   </tr>
				  </table>
			    </td>
			</tr>			
			</table>
			</div>	
		</div>
		
		
		<input type="hidden" id="term_id" value=""/>
		<div class="panel panel-primary">
			<div class="panel-heading">Term Information </div>
			<div class="panel-body">
			   
			   <table width="100%">
			   <tr>			     
			     <td>Long Term Rating:</td>
				 <td><input type="text" id="long_term_rating" class="form-control"/></td>
                 <td>&nbsp;&nbsp;&nbsp;</td>
				 <td>Short Term Rating:</td>
				 <td><input type="text" id="short_term_rating" class="form-control"/></td>
			   </tr>			   
			   <tr>
			     <td>Subsidiaries:</td>
				 <td><input type="text" id="subsidiaries" class="form-control"/></td>
			     <td>&nbsp;&nbsp;&nbsp;</td>
				 <td>&nbsp;&nbsp;&nbsp;</td>
				 <td>&nbsp;&nbsp;&nbsp;</td>
				 <td>&nbsp;&nbsp;&nbsp;</td>
			   </tr>			   			   
			   </table>
			   
			</div>
		</div>
		
		
		<?php  $this->load->view("editor_utility"); ?>
		
		<input type="hidden" id="management_info_table_row_id" value=""/>
		<div class="panel panel-primary">
			<div class="panel-heading">Management Information </div>
			<div class="panel-body">
			
			    <table width="100%">
				   <tr>
					 <td>Managements</td>
					 <td><textarea class="summernote" id="managements_info" class="form-control"></textarea></td>
				   </tr>
				   <tr>
						<td>&nbsp;</td>
						<td ><input type="button" class="btn btn-warning" id="company_basic_innfo_edit" value="Save"/></td>
				  </tr>
				</table> 
			</div>
		</div>
		
		
		
		<script type="text/javascript">
		$(document).ready(function(){
		
		    //divident_details_ui
			//eps_npat_ui
			//stock_vs_pe_ui
		
	        $("#trade_start_date").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});
			
			$("#establishing_date").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});
			
			
            $("#company_codes").bind("change" , change_company_Code );
			function change_company_Code()
			{
				var company_code = $("#company_codes").val();				
				if( company_code != "" )
				{
					$.ajax({
						type:"post" ,
						url:"<?php echo site_url();?>/mb/company_basic_info_fetch",
						data:"company_code="+company_code,
						cache:false,
						success:function(st)
						{							
							var parse = st.split('#');
							
							$("#face_value").val(parse[0]);
							$("#category").val(parse[1]);
							$("#electronic").val(parse[2]);
							$("#market_lot").val(parse[3]);
							$("#_52week_range").val(parse[4]);
							$("#sector").val(parse[5]);
							$("#listing_year").val(parse[6]);
							$("#year_end").val(parse[7]);						
								
							$("#establishing_date").val(parse[8]);
							$("#trade_start_date").val(parse[9]);
							$("#offer_price").val(parse[10]);
							$("#credit_rating_firm").val(parse[11]);
							$("#parent_company").val(parse[12]);
							$("#company_purpose").val(parse[13]);
							$("#address").val(parse[14]);
							$("#phone").val(parse[15]);
							$("#fax").val(parse[16]);
							$("#email").val(parse[17]);
							$("#website").val(parse[18]);
							$("#company_number").val(parse[20]);
	
							$("#share_table_row_id").val(parse[21]);
							$("#total_share").val(parse[22]);
							$("#market_cap").val(parse[23]);
							$("#authorized_cap").val(parse[24]);
							$("#sponsor").val(parse[25]);
							$("#govt").val(parse[26]);
							$("#institute").val(parse[27]);
							$("#foreign").val(parse[28]);
							$("#publics").val(parse[29]);
							$("#reserve_surplus").val(parse[30]);
							$("#floating_percentage").val(parse[31]);
							$("#floating_no_of_share").val(parse[32]);
														
							$("#paidup_table_row_id").val(parse[33]);
							$("#paidup_cap").val(parse[34]);														
							
							$("#management_info_table_row_id").val(parse[35]);
							$("#managements_info").code(parse[36]);						
												
							$("#term_id").val(parse[37]);
							$("#long_term_rating").val(parse[38]);
							$("#short_term_rating").val(parse[39]);
							$("#subsidiaries").val(parse[40]);
							/*
							alert(parse[37]);
							*/
						}
					});
			    }else{
				    alert("Please select company code"); 
				}
			}
				
			
			
			$("#company_basic_innfo_edit").click(function(){
			    var company_codes = $("#company_codes").val();
				var company_number = $("#company_number").val();
			    var face_value = $("#face_value").val();
				var category = $("#category").val();
				var electronic = $("#electronic").val();
				var market_lot = $("#market_lot").val();
				var _52week_range = $("#_52week_range").val();
				var sector = $("#sector").val();
				var listing_year = $("#listing_year").val();
				var year_end = $("#year_end").val();		
				
				var establishing_date = $("#establishing_date").val();
				var trade_start_date = $("#trade_start_date").val();
				var offer_price = $("#offer_price").val();
				var credit_rating_firm = $("#credit_rating_firm").val();
				var parent_company = $("#parent_company").val();
				var company_purpose = $("#company_purpose").val();
				var address = $("#address").val();
				var phone = $("#phone").val();
				var fax = $("#fax").val();
				var email = $("#email").val();
				var website = $("#website").val();				
				
				var share_table_row_id	=	$("#share_table_row_id").val();
				var total_share			=	$("#total_share").val();
				var authorized_cap		=	$("#authorized_cap").val();
				var sponsor				=	$("#sponsor").val();
				var govt				=	$("#govt").val();
				var institute			=	$("#institute").val();
				var foreign				=	$("#foreign").val();
				var publics				=	$("#publics").val();
				var reserve_surplus     =	$("#reserve_surplus").val();
				var floating_percentage =	$("#floating_percentage").val();
				var floating_no_of_share=	$("#floating_no_of_share").val();
				var market_cap          =	$("#market_cap").val();
					
				var paidup_table_row_id =	$("#paidup_table_row_id").val();
				var paidup_cap          =	$("#paidup_cap").val();		
									
				var management_info_table_row_id=		$("#management_info_table_row_id").val();
				var managements_info      =		$("#managements_info").code();
					
					
				var term_id                  = $("#term_id").val();
				var long_term_rating  = $("#long_term_rating").val();
				var short_term_rating = $("#short_term_rating").val();
				var subsidiaries            = $("#subsidiaries").val();
				
				
				
				var dataStr = "company_codes="+company_codes+
				"&company_number="+company_number
				+"&face_value="+face_value+
				"&category="+category+"&electronic="+electronic+"&market_lot="+market_lot
				+"&_52week_range="+_52week_range+"&sector="+sector+"&listing_year="+listing_year
				+"&year_end="+year_end+"&establishing_date="+establishing_date+
				"&trade_start_date="+trade_start_date+"&offer_price="+offer_price+
				"&credit_rating_firm="+credit_rating_firm+"&parent_company="+parent_company+
				"&company_purpose="+company_purpose+"&address="+address+"&phone="+phone
				+"&fax="+fax+"&email="+email+"&website="+website+
				
				"&share_table_row_id="+share_table_row_id+"&total_share="+total_share+
				"&authorized_cap="+authorized_cap+"&sponsor="+sponsor+"&govt="+govt+
				"&institute="+institute+"&foreign="+foreign+"&publics="+publics+
				"&reserve_surplus="+reserve_surplus+"&floating_percentage="+
				floating_percentage+"&floating_no_of_share="+floating_no_of_share+
				"&market_cap="+market_cap+			
				"&paidup_table_row_id="+paidup_table_row_id
				+"&paidup_cap="+paidup_cap +				
				"&management_info_table_row_id="+management_info_table_row_id
				+"&managements_info="+managements_info +
				
				"&term_id="+term_id+"&long_term_rating="+long_term_rating+
				"&short_term_rating="+short_term_rating+"&subsidiaries="+subsidiaries;
				
				if(company_codes!="") {
				   $.ajax({
				      type:"post" ,
					  url:"<?php echo site_url();?>/mb/company_basic_info_update_by_ajax" ,
					  data:dataStr ,
					  cache:false,
					  success:function(st){					  
					     alert("Data saved successfully");
					  }
				   });
				}else{
				  alert("Please select company code");
				}
				
				
			});
		});
		</script>
	<?php
	}
	
	
	public function company_basic_info_fetch()
	{
		$company_code = $this->input->post("company_code");
		$this->load->model("input_form_data");
		
		$basic  = $this->input_form_data->company_basic_info_fetch_data($company_code);
		$share  = $this->input_form_data->share_info_fetch_data($company_code);
		$paidup = $this->input_form_data->paidup_cap_fetch_data($company_code);
		$mng    = $this->input_form_data->board_of_diretors_info_fetch_data($company_code);		
		$terms  = $this->input_form_data->term_of_fetch_data($company_code);
		
		echo $basic  .'#'. $share .'#'. $paidup .'#'. $mng .'#'. $terms;
		
	}
	
	
	public function company_basic_info_update_by_ajax()
	{
	   //company_basic_info_fetch
	     $company_codes = $this->input->post("company_codes");
		 $company_number    = $this->input->post("company_number");
		 $face_value    = $this->input->post("face_value");
		 $category      = $this->input->post("category");
		 $electronic    = $this->input->post("electronic");
		 $market_lot    = $this->input->post("market_lot");
		 $_52week_range = $this->input->post("_52week_range");
		 $sector        = $this->input->post("sector");
		 $listing_year  = $this->input->post("listing_year");
		 $year_end      = $this->input->post("year_end");
		 $establishing_date= $this->input->post("establishing_date");
		 $trade_start_date = $this->input->post("trade_start_date");
		 $offer_price      = $this->input->post("offer_price");
		 $credit_rating_firm= $this->input->post("credit_rating_firm");
		 $parent_company    = $this->input->post("parent_company");
		 $company_purpose   = $this->input->post("company_purpose");
		 $address     = $this->input->post("address");
		 $phone       = $this->input->post("phone");
		 $fax         = $this->input->post("fax");
		 $email       = $this->input->post("email");
		 $website     = $this->input->post("website");
		 
		 
		 
		 
		$share_table_row_id =$this->input->post("share_table_row_id");
		$total_share		=$this->input->post("total_share");
		$authorized_cap		=$this->input->post("authorized_cap");
		$sponsor			=$this->input->post("sponsor");
		$govt				=$this->input->post("govt");
		$institute			=$this->input->post("institute");
		$foreign 			= $this->input->post("foreign");
		$publics 			= $this->input->post("publics");
		$reserve_surplus 		= $this->input->post("reserve_surplus");
		$floating_percentage 	= $this->input->post("floating_percentage");
		$floating_no_of_share 	= $this->input->post("floating_no_of_share");
		$market_cap 			= $this->input->post("market_cap");
		
		$paidup_table_row_id 	= $this->input->post("paidup_table_row_id");
		$paidup_cap 			= $this->input->post("paidup_cap");		 	
		
		$term_id 			    = $this->input->post("term_id");
		$long_term_rating 		= $this->input->post("long_term_rating");
		$short_term_rating		= $this->input->post("short_term_rating");
		$subsidiaries 			= $this->input->post("subsidiaries");	
		
		 
		$management_info_table_row_id =  $this->input->post("management_info_table_row_id");
		$managements_info = $this->input->post("managements_info"); 
		
		 
		 //data_update_after_import_post
		 $this->load->model("input_form_data");
		 $this->input_form_data->data_update_after_import_post(		 
		 $company_codes,$face_value,$category,
		 $electronic,$market_lot,$_52week_range,
		 $sector,$listing_year,$year_end,$establishing_date,
		 $trade_start_date,$offer_price,$credit_rating_firm,
		 $parent_company,$company_purpose,$address,$phone,
		 $fax,$email,$website ,
		 
		 $share_table_row_id,$total_share,
		$authorized_cap,$sponsor,$govt,$institute,
		$foreign,$publics,$reserve_surplus,
		$floating_percentage,$floating_no_of_share,
		$market_cap,$paidup_table_row_id,$paidup_cap,
		
		$management_info_table_row_id,
		$managements_info,$term_id,$long_term_rating,$short_term_rating,$subsidiaries);		 
		
	}
	
	
	
	public function divident_detail_ui()
	{	 
	   $this->load->model("input_form_data");
	?>
		
		<table>
			<tr>
				<td>Select Company: 
				<select id="weekly_company_code" class="form-control">
				   <option value="">Select Company</option>
				   <?php $weekly_company_codes = $this->input_form_data->company_code_for_combo();
					foreach($weekly_company_codes as $weekly_company_code){
				   ?>
						<option value="<?php echo $weekly_company_code->CODE;?>">
						<?php echo $weekly_company_code->CODE;?>
						</option>
					 
					<?php	
					}
					?> 
				</select>	
				</td>
		</tr>
		</table>
		
		<div class="panel panel-primary">
			<div class="panel-heading">Dividend Manual Entry Form</div>
			<div class="panel-body">
			   
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					
					<tr>
					    <th style="font-size:10px;text-align:center;background-color:	#8467D7;">&nbsp;</th>
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Right Share</th>
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Right Declararion Date</th>
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Right Record Date</th>						
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Interim Declararion</th>
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Interim Declararion Date</th>
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Interim Record Date</th>												
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">EGM Record Date</th>		
						<th colspan="2" style="font-size:10px;text-align:center;background-color:#728C00;">Final Declararion</th>						
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#F2BB66;">Final Declararion Date</th>
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#E77471;">Final Record Date</th>																		
						<th rowspan="2" style="font-size:10px;text-align:center;background-color:#CC6600;">AGM Date</th>																								
						<th>&nbsp;</th>
					</tr>
					<tr>
					  <th style="font-size:10px;text-align:center;background-color:	#8467D7;">Year</th>
					  <th style="font-size:10px;text-align:center;background-color:#E2A76F;">Old</th>
					  <th style="font-size:10px;text-align:center;background-color:	#FFA62F;">New</th>
					  <th style="font-size:10px;text-align:center;background-color:#E2A76F;">Cash(%)</th>
					  <th style="font-size:10px;text-align:center;background-color:	#FFA62F;">Stock(%)</th>
					  <th style="font-size:10px;text-align:center;background-color:#E2A76F;">Cash(%)</th>
					  <th style="font-size:10px;text-align:center;background-color:	#FFA62F;">Stock(%)</th>					  
					</tr>
					
					<tr>
					  <th style="font-size:10px;text-align:center;"><select class="form-control" name="divident_mutual_year" id="divident_mutual_year">
					    <?php for($i=2000;$i<=2030;$i++){?>
						<option value="<?php echo $i;?>"><?php echo $i;?></option>
						<?php } ?>
					  </select></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_right_share_old" id="divident_mutual_right_share_old"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_right_share_new" id="divident_mutual_right_share_new"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_right_declare_date" id="divident_mutual_right_declare_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_right_record_date" id="divident_mutual_right_record_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_interim_declare_cash" id="divident_mutual_interim_declare_cash"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_interim_declare_stock" id="divident_mutual_interim_declare_stock"/></th>					  
					  
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_interim_declare_date" id="divident_mutual_interim_declare_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_interim_record_date" id="divident_mutual_interim_record_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_egm_record_date" id="divident_mutual_egm_record_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_final_declare_cash" id="divident_mutual_final_declare_cash"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_final_declare_stock" id="divident_mutual_final_declare_stock"/></th>					  
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_final_declare_date" id="divident_mutual_final_declare_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_final_record_date" id="divident_mutual_final_record_date"/></th>
					  <th style="font-size:10px;text-align:center;"><input type="text" class="form-control" name="divident_mutual_agm_date" id="divident_mutual_agm_date"/></th>					  					  
   					  <th ><input type="button" class="btn btn-warning" id="divident_mutual_save" value="Save"/></th>																																										
					</tr>					
				
					<?php 
						$divident_tables = $this->input_form_data->divident_mutual_entry_form_datatable();
						foreach($divident_tables as $divident_table)
						{
					?>
							<tr id="<?php echo $divident_table->ID;?>">
								<td ><?php echo $divident_table->YEAR;?></td>
								<td ><?php echo $divident_table->RIGHT_OLD;?></td>
								<td ><?php echo $divident_table->RIGHT_NEW;?></td>
								<td ><?php echo $divident_table->RIGHT_DECLARATION_DATE;?></td>
								<td ><?php echo $divident_table->RIGHT_RECORD_DATE;?></td>
								<td ><?php echo $divident_table->INTERIM_DIVIDEND_CASH;?></td>
								<td ><?php echo $divident_table->INTERIM_DIVIDEND_STOCK;?></td>
								<td ><?php echo $divident_table->INTERIM_DIVIDEND_DECLARATION_DATE;?></td>	
								<td ><?php echo $divident_table->INTERIM_DIVIDEND_RECORD_DATE;?></td>
								<td ><?php echo $divident_table->FINAL_DIVIDEND_CASH;?></td>
								<td ><?php echo $divident_table->FINAL_DIVIDEND_STOCK;?></td>
								<td ><?php echo $divident_table->FINAL_DIVIDEND_DECLARATION_DATE;?></td>
								<td ><?php echo $divident_table->FINAL_DIVIDEND_RECORD_DATE;?></td>
								<td ><?php echo $divident_table->EGM_DATE;?></td>
								<td ><?php echo $divident_table->AGM_DATE;?></td>
								<td >
									&nbsp;<span class="glyphicon glyphicon-edit"  name="divident_btnEdit"></span>
									<span class="glyphicon glyphicon-ok" name="divident_btnSave"></span>
								</td>																														
							</tr>	
					<?php } ?>																							
				</table>
			   	<br/>
			    <p></p>			  			   			   
			</div>
		</div>	
		
		
		
		
		<!--
		
		<div class="panel panel-primary">
			<div class="panel-heading">Sample Graph</div>
			<div class="panel-body">
				
				<table width="100%">
				<tr>
					<td>
						<script src="<?php //echo base_url();?>js/charts/highcharts.js"></script>
						<script src="<?php //echo base_url();?>js/charts/modules/exporting.js"></script>									  				  
						<div id="container1"></div>
					</td>
				</tr>
				<tr>					
					<td><div id="container9"></div></td>
				</tr>
				
				<tr>	
					<td>
						<div id="container2"></div>
					</td>				
				</tr>
				<tr>
					<td><div id="container3"></div></td>
				</tr>
				<tr>					
					<td><div id="container4"></div></td>				
				</tr>	
				<tr>
					<td><div id="container5"></div></td>
				</tr>
				<tr>					
					<td><div id="container6"></div></td>				
				</tr>					
				<tr>
					<td><div id="container7"></div></td>
				</tr>
				<tr>					
					<td><div id="container8"></div></td>
				</tr>
				
				<tr>					
					<td><div id="container10"></div></td>
				</tr>
				
				<tr>					
					<td><div id="container11"></div></td>
				</tr>	
				
				
				<tr>					
					<td><div id="container12"></div></td>
				</tr>					
				
				</table>
				
			</div>
		</div>
        -->
		<script>
		$(document).ready(function(){
		
		/*
		var chart12 = new Highcharts.Chart({
				chart: {
					renderTo: 'container12',
					///type: 'pie'					
				},
				title:{
					text: 'Combinational Chart'
				},
				xAxis:{ categories:['Public','Govt','Foreign','Institute']	},
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
				series:				
						[{
							type:'pie',
							text:'Share Distribution',
							data: [
									['Sponsor: 20%', 20],
									['Intitute: 20%', 20], 
									['Public: 30%', 30], 
									['Govt: 10%', 10], 
									['Foreign: 20%', 20]
								]        
						},
						{
							type:'pie',
							text:'Share Distribution 2',
							
							data: [
									['Market CAP: 70%', 70], 
									['Authorized CAP: 30%', 30]
								] ,
							center:[100,80],
							size:100
						}],
				
				
			});
		
		
		
		
		var gradient_values = [];
		$.getJSON("<?php echo site_url();?>/test/pie_with_gradient_fill",function(json)
		{		    
			$.each(json , function(key,value){
			   gradient_values.push(value);
			});			
		     //alert(gradient_values);
			 
			 
				var chart = new Highcharts.Chart({
				chart: {
					renderTo: 'container9',
					type: 'pie'
				},        
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
				series:gradient_values 
				
				[{
					data: [['Jan', 29.9], ['Feb', 71.5], ['Mar', 106.4], 
							['Apr', 129.2], ['May', 144.0], ['Jun', 176.0], 
							['Jul', 135.6], ['Aug', 148.5], ['Sep', 216.4], 
							['Oct', 194.1], ['Nov', 95.6], ['Dec', 54.4]]        
				}]
			});
		});
		
		
		
		var Data = [{
			"name": "Series1",
			"type": "line",
			"data": [40000, 60000, 54000, 58000, 66000]
		}];

		var Options = {
				chart: {
					renderTo: "container8",
					zoomType: "x"
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
				}, {
					title: {
						text: 'Industry Average'
					},
					min: 0,
					//max: 30000,
					opposite: true
				}],
				xAxis:[{
					categories:  ['jan','feb','mar','apr','may'],
					labels:{rotation:-90}
				}],
				series: [{
					"name": "Series1",
					"type": "line",
					"data": [40000, 60000, 54000, 58000, 66000]
					},
					{
					"name": "Series2",
					"type": "line",
					"data": [20000, 30000, 54000, 48000, 56000]
					}
				],
				exporting: {
				   enabled: false	
				},
				credits:{
				   enabled:false	
				}
		}
			myChart = new Highcharts.Chart(Options);
		
		
		
		
		
		
		
		
		
		
		
		
			var chart1 = new Highcharts.Chart({
				chart: {
					renderTo:'container7',
					type:'column'
				},
				title:{
					text:'Chart Title'
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
                    categories:['2000','2001','2002','2004','2005'],  				
					//labels:{rotation:-90},
					title:{
						text:'X Axis Title',						
					}
				},
				yAxis:[{
					title:{
						text:'Y Axis Title',
						rotation:-90,
						margin:10,
					}
				},
				{title:{
				    text:"test"
					},					
					min:0,
					opposite:true
				}],    
				series: [{
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
				}],
				exporting:{   enabled:false	},
				credits:{   enabled:false	}
			});
		
		
		
        var chr = new  Highcharts.Chart({
            chart: {
			    renderTo:'container5',
				type:'pie'
            },
            title: {
                text: 'Combination chart'
            },
            xAxis: {
                categories: ['Apples', 'Oranges', 'Pears', 'Bananas', 'Plums']
            },
            yAxis: {
                max:10
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' fruits';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            labels: {
                items: [{
                    html: 'Total fruit consumption',
                    style: {
                        left: '40px',
                        top: '8px',
                        color: 'black'
                    }
                }]
            },
            series: [{
                type: 'pie',
                name: 'Average',
                data: [3, 6, 3, 6.33, 3.33]
                ,marker: {
                	lineWidth: 2,
                	lineColor: Highcharts.getOptions().colors[3],
                	fillColor: 'white'
                }
				}, 
    			{
                type: 'pie',
                name: 'Total consumption',
                data: [{
                    name: 'Institue',					
                    y: 13,
                    //color: Highcharts.getOptions().colors[0] // Jane's color
                }, {
                    name: 'Public',
                    y: 23,
                    //color: Highcharts.getOptions().colors[1] // John's color
                }, {
                    name: 'Govt',
                    y: 19,
                    //color: Highcharts.getOptions().colors[2] // Joe's color
                }],
                center: [100, 80],
                size: 100,
                showInLegend: true,
                dataLabels: { enabled: false }
            }],
			exporting:{ enabled:false	},
			credits:{ enabled:false	}
        });
    

		
		
		
		var negative_data_values = [];
		$.getJSON("<?php echo site_url();?>/test/column_chart_with_negative_value_json",function(json)
		{		    
			var negative_category_values = json[0].data;
			$.each(json , function(key , value){
				if(key>0) {
					negative_data_values.push(value);			
				}
			});
			var graph6 =new Highcharts.Chart({
				chart: {
					renderTo: 'container4',
					type: 'column',
					width: 400,
					height: 280
				},
				title: {
					text: 'column with negative'
				},
				xAxis: {
					categories:  negative_category_values,
					labels:{rotation:-90}
				},
				credits: {
					enabled: false
				},
				exporting:{ enabled:false},				
				credits:{   enabled:false	},
				plotOptions: {
					series: {
						stacking: 'normal'
					}
				},
				series: negative_data_values
			});
		});
		
		
		
		
		
		
		$.getJSON("<?php echo site_url();?>/test/area_chart_value_json" , function(json){
			var area_chart_category = json[0].data;
			var area_chart_data     = json[1].data;
			
			var graph5 =new Highcharts.Chart({
				chart: {
					renderTo: 'container6',
					type: 'area',
					width: 400,
					height: 280
				},
				title: {text:'area'},
				xAxis: {
					text:'',
					labels:{rotation:-90},
					categories: area_chart_category
					//['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
				},
				exporting:{enabled:false},
				credits:{enabled:false},				
				yAxis:{text:'g'},
				series: [{
					data:  area_chart_data
					//[29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
				}]			
			});
		});
		
		
			
		
		
		$.getJSON("<?php echo site_url();?>/test/column_chart_value_json"  ,function(json){
			var column_chart_category = json[0].data;
			var column_chart_data     = json[1].data;
			var prchart1 = new Highcharts.Chart({
				chart:{
					renderTo: 'container3',
					type: 'column',
					width: 400,
					height: 280
				},
				title: {
					text: 'column'
				},
				xAxis: {
					categories: column_chart_category,
					//['option1', 'opti2', 'opt3'],
					labels: {
						overflow: 'justify'
					},
					title: {
						text: null
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: '',
						align: 'high'
					},
					labels: {
						overflow: 'justify'
					}
				},
				plotOptions: {
					bar: {
						dataLabels: {
							enabled: true
						}
					}
				},

				legend: {
					enabled: false
				},
				exporting: {
					enabled: false
				},
				credits: {
					enabled: false
				},
				series: [{
					name: 'vote test',
					data: column_chart_data
					//[20, 170,450,600,750 ,1000]
				}]
			});
		});
		
		
		$.getJSON("<?php echo site_url();?>/test/pie_chart_value_json" , function(json){
			var pie_chart_category = json[0].data;
			var pie_chart_data     = json[1].data;
			
			var prchart3 = new Highcharts.Chart({
				chart: {
					renderTo: 'container2',
					type: 'pie',
					width: 400,
					height: 280
				},
				title: {
					text: 'pie'
				},
				xAxis: {
					categories: pie_chart_category,
					//['option1', 'opti2', 'opt3'],
					labels: {
						overflow: 'justify'
					},
					title: {
						text: null
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: '',
						align: 'high'
					},
					labels: {
						overflow: 'justify'
					}
				},
				plotOptions: {
					bar: {
						dataLabels: {
							enabled: true
						}
					}
				},
				legend: {
					enabled: true ,
					labelFormatter: function(){
					   return this.name;
					}
				},			
				exporting: {
					enabled: false
				},
				credits: {
					enabled: false
				},
				series: [{
					name: 'vote test',
					data: pie_chart_data
					//[20, 170, 1000]
				}]
			});
		});		
		
		
		
		var negatives_data_values = [];
		$.getJSON("<?php echo site_url();?>/test/column_chart_with_label_json",function(json){		    
			var negatives_category_values = json[0].data;
			
			$.each(json , function(key , value){
				if(key>0) {
					negatives_data_values.push(value);			
				}
			});
			var graph6 =new Highcharts.Chart({
				chart: {
					renderTo: 'container1',
					type: 'column',
					margin:[50,50,100,80],
					width: 400,
					height: 280
				},
				title: {
					text: 'columns'
				},
				xAxis: {
					categories:  negatives_category_values,
					labels:{rotation:-45}
				},
				credits: {
					enabled: false
				},
				exporting:{ enabled:false},
				plotOptions: {
					series: {
						stacking: 'normal'
					}
				},
				series: negatives_data_values
			});
		});
	
		
		
		var chart10 = new Highcharts.Chart({
				chart: {
					renderTo:'container10',
					type:'column'
				},
				title:{
					text:'Chart Title'
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
                    categories:['2000','2001','2002','2004','2005','2006','2007','2008','2009','2010','2011','2012'],  				
					labels:{rotation:-45},
					title:{
						text:'X Axis Title',						
					}
				},
				yAxis:[{
					title:{
						text:'Y Axis Title',
						rotation:-90,
						margin:10,
					}
				},
				//right side text
				{title:{
				    text:"test"
					},					
					min:0,
					opposite:true
				}],    
				series: [{	
                    name:"Yearly",			    
					data: [10,20,30,40,50,60,70,80,90,100,110,112]
				}],
				exporting:{   enabled:false	},
				credits:{   enabled:false	}
			});
		
		
		
		
		
		var chart20 = new Highcharts.Chart({
            chart: {
			    renderTo:'container10',
                //zoomType: 'xy'
            }
            ,
			title: {
                text: 'Average Monthly Temperature and Rainfall in Tokyo'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            }
			
			,
            xAxis: [{
                categories: ['2001', '2002', '2003', '2004', '2005', '2006',
                    '2007', '2008', '2009', '20010', '2011', '2012'] ,
				labels:{	rotation:-55}
            }],
            yAxis: [{ // Primary yAxis
                labels: {
                    format: '{value}°C',
                    style: {
                        color: '#89A54E'
                    }
                },
                title: {
                    text: 'Temperature',
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
                    format: '{value} mm',
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
            legend: {
                layout: 'vertical',
                align: 'left',
                x: 120,
                verticalAlign: 'top',
                y: 100,
                floating: true,
                backgroundColor: '#FFFFFF'
            },
            series: [{
                name: 'Rainfall',
                color: '#4572A7',
                type: 'column',
                yAxis: 1,
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4],
                tooltip: {
                    valueSuffix: ' mm'
                }
    
            }, {
                name: 'Temperature',
                color: '#89A54E',
                type: 'line',
                data: [7.0, 6.9, 9.5, 14.5, 18.2, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6],
                tooltip: {
                    valueSuffix: '°C'
                }
            }] ,
			credits:{enabled:false} ,
			exporting:{enabled:false} 
        });		
		*/
		
		
		
		
		    $("input[name='divident_mutual_right_declare_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			
			$("input[name='divident_mutual_right_record_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			$("input[name='divident_mutual_interim_declare_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			$("input[name='divident_mutual_interim_record_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			
			$("input[name='divident_mutual_egm_record_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			$("input[name='divident_mutual_final_declare_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
			$("input[name='divident_mutual_final_record_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});			
			$("input[name='divident_mutual_agm_date']").datepicker({changeMonth:true,changeYear:true,dateFormat:"yy-mm-dd"});
					
		    $("span[name='divident_btnEdit']").bind("click",divident_Edit);
			$("span[name='divident_btnSave']").bind("click",divident_Save);
		
		    function divident_Edit()
			{
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			  
			   var txtDividentYear    		      = par.children("td:nth-child(1)");
   			   var txtDividentRightOld   		  = par.children("td:nth-child(2)");
   			   var txtDividentRightNew   		  = par.children("td:nth-child(3)");
			   var txtDividentRightDeclareDate    = par.children("td:nth-child(4)");
   			   var txtDividentRightRecordDate     = par.children("td:nth-child(5)");
			   
			 
			   var txtDividentInterimCash    	  = par.children("td:nth-child(6)");
   			   var txtDividentInterimStock   	  = par.children("td:nth-child(7)");
   			   var txtDividentInterimDeclareDate  = par.children("td:nth-child(8)");
			   var txtDividentInterimRecordDate   = par.children("td:nth-child(9)");
   			   
			   var txtDividentFinalCash          = par.children("td:nth-child(10)");			 
			   var txtDividentFinalStock         = par.children("td:nth-child(11)");			 
			   
			   var txtDividentFinalDeclareDate   = par.children("td:nth-child(12)");			 			   
			   var txtDividentFinalRecordDate    = par.children("td:nth-child(13)");			 			   			   
			   
			   var txtDividentFinalAgmDate       = par.children("td:nth-child(14)");			 			   
			   var txtDividentFinalEgmDate       = par.children("td:nth-child(15)");			 			   			   
			   
			   txtDividentYear.html("<input type='text' class='form-control' value='"+txtDividentYear.text()+"'>");	
			   txtDividentRightOld.html("<input type='text'  class='form-control'  value='"+txtDividentRightOld.text()+"'>");	
   			   txtDividentRightNew.html("<input type='text'  class='form-control' value='"+txtDividentRightNew.text()+"'>");	
			   txtDividentRightDeclareDate.html("<input type='text'  class='form-control'  value='"+txtDividentRightDeclareDate.text()+"'>");	
			   txtDividentRightRecordDate.html("<input type='text'  class='form-control' value='"+txtDividentRightRecordDate.text()+"'>");	
   			  			
						
			   txtDividentInterimCash.html("<input type='text' class='form-control' value='"+txtDividentInterimCash.text()+"'>");	
			   txtDividentInterimStock.html("<input type='text'  class='form-control'  value='"+txtDividentInterimStock.text()+"'>");	
   			   txtDividentInterimDeclareDate.html("<input type='text'  class='form-control' value='"+txtDividentInterimDeclareDate.text()+"'>");	
			   txtDividentInterimRecordDate.html("<input type='text'  class='form-control'  value='"+txtDividentInterimRecordDate.text()+"'>");	
			 
			   txtDividentFinalCash.html("<input type='text'  class='form-control' value='"+txtDividentFinalCash.text()+"'>");		
			   txtDividentFinalStock.html("<input type='text'  class='form-control' value='"+txtDividentFinalStock.text()+"'>");		
			   txtDividentFinalDeclareDate.html("<input type='text'  class='form-control' value='"+txtDividentFinalDeclareDate.text()+"'>");		
			   txtDividentFinalRecordDate.html("<input type='text'  class='form-control' value='"+txtDividentFinalRecordDate.text()+"'>");					   
			   
			   txtDividentFinalAgmDate.html("<input type='text'  class='form-control' value='"+txtDividentFinalAgmDate.text()+"'>");					   
			   txtDividentFinalEgmDate.html("<input type='text'  class='form-control' value='"+txtDividentFinalEgmDate.text()+"'>");					   			   
			   
			   //alert(1);
			}
			
			function divident_Save()
			{			   
			   var par = $(this).parent().parent();
			   var rowid = par.attr('id');
			   
			   var txtDividentYear    		      = par.children("td:nth-child(1)");
   			   var txtDividentRightOld   		  = par.children("td:nth-child(2)");
   			   var txtDividentRightNew   		  = par.children("td:nth-child(3)");
			   
			   var txtDividentRightDeclareDate    = par.children("td:nth-child(4)");
   			   var txtDividentRightRecordDate     = par.children("td:nth-child(5)");
			   
			 
			   var txtDividentInterimCash    	  = par.children("td:nth-child(6)");
   			   var txtDividentInterimStock   	  = par.children("td:nth-child(7)");
   			   var txtDividentInterimDeclareDate  = par.children("td:nth-child(8)");
			   var txtDividentInterimRecordDate   = par.children("td:nth-child(9)");
   			   
			   var txtDividentFinalCash          = par.children("td:nth-child(10)");			 
			   var txtDividentFinalStock         = par.children("td:nth-child(11)");			 
			   
			   var txtDividentFinalDeclareDate   = par.children("td:nth-child(12)");			 			   
			   var txtDividentFinalRecordDate    = par.children("td:nth-child(13)");			 			   			   
			   
			   var txtDividentFinalAgmDate       = par.children("td:nth-child(14)");			 			   
			   var txtDividentFinalEgmDate       = par.children("td:nth-child(15)");			 			   			   
			   var company_code 				 = $("#company_code").val();			   		
					
				var txtDividentYear_val		     = txtDividentYear.children("input[type='text']").val();		
				var txtDividentRightOld_val		 = txtDividentRightOld.children("input[type='text']").val();					   
				var txtDividentRightNew_val		         = txtDividentRightNew.children("input[type='text']").val();					   			   
				var txtDividentRightDeclareDate_val		 = txtDividentRightDeclareDate.children("input[type='text']").val();					   			   
				var txtDividentRightRecordDate_val		 = txtDividentRightRecordDate.children("input[type='text']").val();					   			    			  
				var txtDividentInterimCash_val		     = txtDividentInterimCash.children("input[type='text']").val();					   			    			  
				var txtDividentInterimStock_val		     = txtDividentInterimStock.children("input[type='text']").val();					   			    			  
				var txtDividentInterimDeclareDate_val  = txtDividentInterimDeclareDate.children("input[type='text']").val();					   			    			  
				var txtDividentInterimRecordDate_val   = txtDividentInterimRecordDate.children("input[type='text']").val();					   			    			  			
				var txtDividentFinalCash_val	       = txtDividentFinalCash.children("input[type='text']").val();					   			    			  			
				var txtDividentFinalStock_val  	     = txtDividentFinalStock.children("input[type='text']").val();					   			    			  						
				var txtDividentFinalDeclareDate_val  = txtDividentFinalDeclareDate.children("input[type='text']").val();					   			    			  						
				var txtDividentFinalRecordDate_val   = txtDividentFinalRecordDate.children("input[type='text']").val();					   			    			  									   
				var txtDividentFinalAgmDate_val      = txtDividentFinalAgmDate.children("input[type='text']").val();					   			    			  						
				var txtDividentFinalEgmDate_val      = txtDividentFinalEgmDate.children("input[type='text']").val();					   			    			  									   
			   		   
			   txtDividentYear.html(txtDividentYear_val);
			   txtDividentRightOld.html(txtDividentRightOld_val);
			   txtDividentRightNew.html(txtDividentRightNew_val);	
				
			   txtDividentRightDeclareDate.html(txtDividentRightDeclareDate_val);
			   txtDividentRightRecordDate.html(txtDividentRightRecordDate_val);				

			   txtDividentInterimCash.html(txtDividentInterimCash_val);
			   txtDividentInterimStock.html(txtDividentInterimStock_val);				
			
			   txtDividentInterimDeclareDate.html(txtDividentInterimDeclareDate_val);
			   txtDividentInterimRecordDate.html(txtDividentInterimRecordDate_val);
			 
			   txtDividentFinalCash.html(txtDividentFinalCash_val);
			   txtDividentFinalStock.html(txtDividentFinalStock_val);
			   
			   txtDividentFinalDeclareDate.html(txtDividentFinalDeclareDate_val);
			   txtDividentFinalRecordDate.html(txtDividentFinalRecordDate_val);
			   		
			   txtDividentFinalAgmDate.html(txtDividentFinalAgmDate_val);
			   txtDividentFinalEgmDate.html(txtDividentFinalEgmDate_val);
			  
				var dataStr_divident = "company_code="+company_code+
					"&txtDividentYear_val="+txtDividentYear_val+
					"&txtDividentRightOld_val="+txtDividentRightOld_val+
					"&txtDividentRightNew_val="+txtDividentRightNew_val+
					"&txtDividentRightDeclareDate_val="+txtDividentRightDeclareDate_val+					
					"&txtDividentRightRecordDate_val="+txtDividentRightRecordDate_val+
					
					"&txtDividentInterimCash_val="+txtDividentInterimCash_val+
					"&txtDividentInterimStock_val="+txtDividentInterimStock_val+
					"&txtDividentInterimDeclareDate_val="+txtDividentInterimDeclareDate_val+
					"&txtDividentInterimRecordDate_val="+txtDividentInterimRecordDate_val+
					
					"&txtDividentFinalCash_val="+txtDividentFinalCash_val+
					"&txtDividentFinalStock_val="+txtDividentFinalStock_val+
					"&txtDividentFinalDeclareDate_val="+txtDividentFinalDeclareDate_val+
					"&txtDividentFinalRecordDate_val="+txtDividentFinalRecordDate_val+
					
					"&txtDividentFinalAgmDate_val="+txtDividentFinalAgmDate_val+
					"&txtDividentFinalEgmDate_val="+txtDividentFinalEgmDate_val+
					"&rowid="+rowid;		
			   
				if(company_code!="") 
				{
					$.ajax({
					   type:"post",
					   url:"<?php echo site_url();?>/input_form_mb/divident_data_edit_by_ajax",
					   data:dataStr_divident,
					   cache:false,
					   success:function(st){
					       //alert(st);
					   }
					});
				}else{
				  alert("Please select company code!");
				}
			}			
		
			$("#divident_mutual_save").click(function(){
			    var company_code = $("#weekly_company_code").val();
				var divident_mutual_year_con = [];
				var divident_mutual_right_share_old_con = [];
				var divident_mutual_right_share_new_con = [];
				var divident_mutual_right_declare_date_con = [];
				
				var divident_mutual_right_record_date_con  = [];
				var divident_mutual_interim_declare_cash_con  = [];
				var divident_mutual_interim_declare_stock_con = [];
				  
				var divident_mutual_interim_declare_date_con = [];
				var divident_mutual_interim_record_date_con  = [];		
				var divident_mutual_egm_record_date_con  = [];
				
				var divident_mutual_final_declare_cash_con  = [];
				var divident_mutual_final_declare_stock_con = [];
				var divident_mutual_final_declare_date_con  = [];
				var divident_mutual_final_record_date_con = [];
				var divident_mutual_agm_date_con = [];
				
	
				$("input[name='divident_mutual_year']").each(function(){
			      divident_mutual_year_con.push($(this).val());
			    }); 
				
				$("input[name='divident_mutual_right_share_old']").each(function(){
			      divident_mutual_right_share_old_con.push($(this).val());
			    }); 				
				
				$("input[name='divident_mutual_right_share_new']").each(function(){
			      divident_mutual_right_share_new_con.push($(this).val());
			    }); 								
				
				$("input[name='divident_mutual_right_declare_date']").each(function(){
			      divident_mutual_right_declare_date_con.push($(this).val());
			    }); 												
	
				$("input[name='divident_mutual_right_record_date']").each(function(){
			      divident_mutual_right_record_date_con.push($(this).val());
			    }); 												
				
				$("input[name='divident_mutual_interim_declare_cash']").each(function(){
			      divident_mutual_interim_declare_cash_con.push($(this).val());
			    }); 					
				
				$("input[name='divident_mutual_interim_declare_stock']").each(function(){
			      divident_mutual_interim_declare_stock_con.push($(this).val());
			    }); 				
				
				$("input[name='divident_mutual_interim_declare_date']").each(function(){
			      divident_mutual_interim_declare_date_con.push($(this).val());
			    }); 								
		
				$("input[name='divident_mutual_interim_record_date']").each(function(){
			      divident_mutual_interim_record_date_con.push($(this).val());
			    }); 										
				
																	
				
				$("input[name='divident_mutual_egm_record_date']").each(function(){
			      divident_mutual_egm_record_date_con.push($(this).val());
			    }); 																		
				
				
				$("input[name='divident_mutual_final_declare_cash']").each(function(){
			      divident_mutual_final_declare_cash_con.push($(this).val());
			    }); 																						
				
				$("input[name='divident_mutual_final_declare_stock']").each(function(){
			      divident_mutual_final_declare_stock_con.push($(this).val());
			    }); 																										
				
				$("input[name='divident_mutual_final_declare_date']").each(function(){
			      divident_mutual_final_declare_date_con.push($(this).val());
			    }); 																														
				
				$("input[name='divident_mutual_final_record_date']").each(function(){
			      divident_mutual_final_record_date_con.push($(this).val());
			    }); 																																		
				
				$("input[name='divident_mutual_agm_date']").each(function(){
			      divident_mutual_agm_date_con.push($(this).val());
			    }); 

				var dataStr = "company_code="+company_code+
				"&divident_mutual_year_con="+divident_mutual_year_con+ 
				"&divident_mutual_right_share_old_con="+divident_mutual_right_share_old_con+
				"&divident_mutual_right_share_new_con="+divident_mutual_right_share_new_con+
				
				"&divident_mutual_right_declare_date_con="+divident_mutual_right_declare_date_con+ 
				"&divident_mutual_right_record_date_con="+divident_mutual_right_record_date_con+ 
				"&divident_mutual_interim_declare_cash_con="+divident_mutual_interim_declare_cash_con+  
				"&divident_mutual_interim_declare_stock_con="+divident_mutual_interim_declare_stock_con+ 
				  
				"&divident_mutual_interim_declare_date_con="+divident_mutual_interim_declare_date_con+ 
				"&divident_mutual_interim_record_date_con="+divident_mutual_interim_record_date_con+  
				             
				"&divident_mutual_egm_record_date_con="+divident_mutual_egm_record_date_con+  
				"&divident_mutual_final_declare_cash_con="+divident_mutual_final_declare_cash_con+
				
				"&divident_mutual_final_declare_stock_con="+divident_mutual_final_declare_stock_con+ 
				"&divident_mutual_final_declare_date_con="+divident_mutual_final_declare_date_con+  
				"&divident_mutual_final_record_date_con="+divident_mutual_final_record_date_con+ 
				"&divident_mutual_agm_date_con="+divident_mutual_agm_date_con;
				
				
				$("#divident_mutual_interim_declare_date_con").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});
				$("#divident_mutual_interim_record_date_con").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});
								
				$("#divident_mutual_final_declare_date_con").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});				
				$("#divident_mutual_final_record_date_con").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});								
				$("#divident_mutual_egm_record_date_con").datepicker({dateFormat:"yy-mm-dd",changeMonth:true,changeYear:true});												
				
				//alert(dataStr);
				
				if(company_code=="")	
				{
				   alert("Select company code");
				   return false;
				}else if(divident_mutual_year_con==""){
				  alert("Enter Year");
				   $("input['divident_mutual_year']").focus();
				   return false;
				}
				else{
					$.ajax({
					   type:"post",
					   url:"<?php echo site_url();?>/input_form_mb/divident_mutual_data_add_by_ajax",
					   data:dataStr ,
					   cache:false,
					   success:function(st){
						 alert("Data saved successfully!");
					   }
					});
				}
			});	
		});
		</script>	
	
	<?php   
	}
	
	public function seps()
	{
	   $this->load->model("sector_vs_eps_data");
	   $datas = $this->sector_vs_eps_data->individual_sector_capitalization();
	   
?>  
    <table width="100%">
	<tr>
	     <td>Company Code</td>
		 <td>Total Share</td>
		 <td>Capitalization</td>
		 <td>Weight</td>
		 <td>Company PE</td>
		 
		 <td>Annualized EPS</td>
		 <td>Total Capitalization</td>
		 <td>Weighted Avg Price</td>
		 <td>Weighted EPS Avg Price</td>
	</tr>
	<?php 	

	   $this->load->model("sector_vs_eps_data");
	   $datas = $this->sector_vs_eps_data->individual_sector_capitalization();
	   

	$total_capitalization     = $this->sector_vs_eps_data->individual_sector_total_capitalization();
	   $total_weighted_avg_price = $this->sector_vs_eps_data->individual_sector_total_weighted_avg_price();
	   
	   $total_weight_avg = 0;
	   $total_eps_avg = 0;
	   
	   foreach($datas as $data)
	   {
	   
	    $pe[] = $data->ANNUALIZED_EPS;
	?>
	    <tr>
	     <td><?php echo $data->company_code;?></td>
		 <td><?php echo $data->total_share;?></td>
		 <td><?php echo number_format($data->capitalization, 2, '.', '');?></td>		 
		 <td><?php echo number_format($data->total_capitalization, 2, '.', '');?></td>
		 <td><?php echo number_format($data->weight         , 2, '.', '');?></td>
		 <td><?php echo number_format($data->COMPANY_PE     , 2, '.', '');?></td>
		 <td><?php echo number_format($data->ANNUALIZED_EPS , 2, '.', '');?></td>
		 <td><?php echo number_format($data->weighted_avg_price    , 2, '.', '');?></td>
		 <td><?php echo number_format($data->weighter_eps_avg_price, 2, '.', '');?></td>
		</tr>
    <?php   
	    $total_weight_avg += $data->weighted_avg_price;
		$total_eps_avg    += $data->weighter_eps_avg_price;
	   }
	   
	   $sector_pe= $total_weight_avg/$total_eps_avg;
	?>
	
	  <tr>
		<td colspan="4">Total weighted Price = <?php echo number_format($total_weight_avg, 2, '.', '');?></td>
		<td colspan="4">Total weighted EPS Price = <?php echo number_format($total_eps_avg, 2, '.', '');?></td>		
	  </tr>
	  <tr>
		<td colspan="8">Sector P/E = <?php echo number_format($sector_pe, 2, '.', '');?></td>
	  </tr>
	</table>
	<?php 
	}
	
	
		
	
	
	
	
	/*************************************************
	** Share Distribution JSON Data
	**************************************************/
	public function share_distribution_json()
	{
	    $this->load->model("eps_npat_data");	    		
		
		$share_dist_data = $this->eps_npat_data->share_distribution_data();
		$parse_share_dist_data = explode("#" , $share_dist_data);
		
		$sponsor   = $parse_share_dist_data[0];
		$govt      = $parse_share_dist_data[1];
		$institute = $parse_share_dist_data[2];
		$foreign   = $parse_share_dist_data[3];
		$publics   = $parse_share_dist_data[4];
			
			
		$t[0] = array("data"=>array(
	     array('Sponsor:'.$sponsor.'%',(float)$sponsor) ,
		 array('Intitute:'.$institute.'%',(float)$institute) ,
		 array('Public:'.$publics.'%',(float)$publics) ,
		 array('Govt:'.$govt.'%',(float)$govt) ,
		 array('Foreign:'.$foreign.'%',(float)$foreign) 
		));	
			
		echo json_encode($t);	
	}
	
	
	public function scope_to_pay_divident_json()
	{
	   $this->load->model("eps_npat_data");
	   $scope_pay_data = $this->eps_npat_data->scope_to_pay_divident_data();
	   $scope_pay_data_parse = explode("#",$scope_pay_data);
	   $market_cap = $scope_pay_data_parse[0];
	   $paidup_cap = $scope_pay_data_parse[1];
	   $s[] = array("data"=>array(
					array("Paidup Cap",(float)$paidup_cap),
					array("Market Cap",(float)$market_cap)
				));
		echo json_encode($s);	
	}
	/*************************************************
	** End Share Structure JSON Data
	**************************************************/			
	
	
	
	/*************************************************
	** EPS JSON Data
	**************************************************/			
	
	public function eps_first_quarter_continuing_json()
	{
	  $this->load->model("eps_npat_data");	  
	  
	  
	  $eps_years = $this->eps_npat_data->eps_continuing_years_data();
	  foreach($eps_years as $eps_year)
	  {
	    $years[] = (float)$eps_year->YEAR;
	  }
	  
	  $eps_continue_data = $this->eps_npat_data->eps_continuing_first_quarter_data();
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->QUARTER_1_3M ;
		$q2_3m[] = (float)$eps_cont_data->QUARTER_2_3M ;
		$q3_3m[] = (float)$eps_cont_data->QUARTER_3_3M ;
		$q4_3m[] = (float)$eps_cont_data->QUARTER_4_3M ;
	  }	    
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_3m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_3m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_3m);
	  echo json_encode($t);
	}
	
	
	public function eps_all_quarter_continuing_json()
	{
	  $this->load->model("eps_npat_data");
	  
	  $eps_years = $this->eps_npat_data->eps_continuing_years_data();
	  foreach($eps_years as $eps_year)
	  {
	    $years[] = (int)$eps_year->YEAR;
	  }	  
	  
	  $eps_continue_data = $this->eps_npat_data->eps_continuing_all_quarter_data();
	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->QUARTER_1_3M ;
		$q2_6m[] = (float)$eps_cont_data->QUARTER_2_6M ;
		$q3_9m[] = (float)$eps_cont_data->QUARTER_3_9M ;
		$q4_12m[] = (float)$eps_cont_data->QUARTER_4_12M ;
	  }	  
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_6m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_9m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_12m);
	  
	  echo json_encode($t);
	}	
	/*************************************************
	**End EPS JSON Data
	**************************************************/	
	
	public function yealy_eps_json()
	{
	   $this->load->model("eps_npat_data");
	   $yeps = $this->eps_npat_data->yearly_eps_data();
	   
	   foreach($yeps as $yp)
	   {
	      $years[] = $yp->YEAR;
		  $yr_eps[] = (float)$yp->QUARTER_4_12M;
	   }
	   
	   $t[] = array("data"=>$years);	   
	   $t[] = array("data"=>$yr_eps);
	   echo json_encode($t);
	}
	
	/************************************************
	***** Yearly EPS Data
	*************************************************/
	
	
	/**********************************************
	******** End Yearly EPS Data
	************************************************/
	
	
	
	
	/*************************************************
	** Net Profit JSON Data
	**************************************************/	
	public function net_profit_first_quarter_continuing_json()
	{
	  $this->load->model("eps_npat_data");
	  
	  $firsts = $this->eps_npat_data->net_profit_year_continuing_data();
	  	  
	  foreach($firsts as $first)
	  {
	    $years[] = (int)$first->YEAR;
	  }
	  
	  
	  $eps_continue_data = $this->eps_npat_data->net_profit_first_quarter_continuing_data();
	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->QUARTER_1_3M ;
		$q2_3m[] = (float)$eps_cont_data->QUARTER_2_3M ;
		$q3_3m[] = (float)$eps_cont_data->QUARTER_3_3M ;
		$q4_3m[] = (float)$eps_cont_data->QUARTER_4_3M ;
	  }	    
	  
	  $t[0] = array("name"=>"categories","data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_3m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_3m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_3m);
	  echo json_encode($t);
	}	
	
	
	public function net_profit_all_quarter_continuing_json()
	{
	  $this->load->model("eps_npat_data");
	  
	  $firsts = $this->eps_npat_data->net_profit_year_continuing_data();
	  	  
	  foreach($firsts as $first)
	  {
	    $years[] = (int)$first->YEAR;
	  }	  
	  
	  $eps_continue_data = $this->eps_npat_data->net_profit_all_quarter_continuing_data();
	  
	  foreach($eps_continue_data as $eps_cont_data)
	  {
		$q1_3m[] = (float)$eps_cont_data->QUARTER_1_3M ;
		$q2_6m[] = (float)$eps_cont_data->QUARTER_2_6M ;
		$q3_9m[] = (float)$eps_cont_data->QUARTER_3_9M ;
		$q4_12m[] = (float)$eps_cont_data->QUARTER_4_12M ;
	  }	    
	  
	  $t[0] = array("name"=>"categories", "data"=>$years);
	  $t[1] = array("name"=>"Q1","data"=>$q1_3m);
	  $t[2] = array("name"=>"Q2","data"=>$q2_6m);
	  $t[3] = array("name"=>"Q3","data"=>$q3_9m);
	  $t[4] = array("name"=>"Q4","data"=>$q4_12m);
	  echo json_encode($t);
	}
	/*************************************************
	** End Net Profit JSON Data
	**************************************************/		
	
	
	
	
	/*************************************************
	** NAV JSON Data
	**************************************************/	
	
	public function yearly_nav_shares_json()
	{
	   $this->load->model("eps_npat_data");
	   $year_datas = $this->eps_npat_data->yearly_nav_data();
	   foreach($year_datas as $year_data)
	   {
			$years[] = $year_data->YEAR;
	   }
	   
	   $eps_continue_data = $this->eps_npat_data->yearly_nav_shares_data();
	   foreach($eps_continue_data as $eps_cont_data)
	   {
			$shares[] = (float)$eps_cont_data->NAV_PERSHARE;
	   }
	   $t[0] = array("data"=>$years);
	   $t[1] = array("data"=>$shares);
	   echo json_encode($t);	   
	}	
	/*************************************************
	** End NAV JSON Data
	**************************************************/		
	
	
	public function test_json()
	{
	   /* for-pie
	   $t[0] = array("data"=>array(
	     array('Sponsor: 20%',"9.99") ,
		 array('Intitute: 20%',"9.99") ,
		 array('Public: 30%',"9.99") ,
		 array('Govt: 10%',"0.0") ,
		 array('Foreign: 20%',"0.0") 
	   ));
	    */
		
		
		
		
		
		$t[] = array("name"=>"x","data"=>array(2000,2001));
		
		$t[] = array("name"=>"Q1","data"=>array(7,12));
		$t[] = array("name"=>"Q2","data"=>array(2,5));
		$t[] = array("name"=>"Q3","data"=>array(4,5));
		$t[] = array("name"=>"Q4","data"=>array(6,5));		
	   echo  json_encode($t);
	}
	
	
	
	/******************************************
	  every day will change after 
	  market closed
	*/
	public function market_cap_update()
	{
	    $this->load->model("importer_data");
		$this->importer_data->get_updated_market_cap();
		//$this->importer_data->update_market_cap();
		//$last_price = $this->importer_data->get_last_price();		
		//27.10000
	}
}
?>
