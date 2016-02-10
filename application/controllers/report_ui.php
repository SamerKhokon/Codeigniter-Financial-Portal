<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_ui extends CI_Controller 
{
    public function index()
    {
	    $this->load->model("report_data");	    
		$data['recomendation'] = $this->report_data->recomendation_data();
		$data['anouncements']  = $this->report_data->anouncements_data();
		$data['sector']  = $this->report_data->sector_data();
		$data['macro']   = $this->report_data->macro_data();
		$data['article'] = $this->report_data->article_interviews_data();
		$data['ipo']     = $this->report_data->ipo_watch_data();
		$data['daily']   = $this->report_data->daily_overview_data();
		$data['weekly']  = $this->report_data->weekly_overview_data();
		$this->load->vars($data);
		$this->load->view("home/report_ui_view_for_site");
    }



    
	
	
	
	/****************************************************************
	*** report ui page
	*****************************************************************/	
	public function anouncement_report_up_action()
	{
	    $category_id = $_POST["anouncement"];
		$entry_date  = $_POST["entry_date"];
		$title  = $_POST["title"];
		$source = $_POST["source"];
		
		$filename = $_FILES['anouncementReport']['name'];
		$base_url = base_url();
		$location = "./reports/anouncement/".$filename;
		
		$this->load->model("report_up_data");		
		if(move_uploaded_file($_FILES['anouncementReport']['tmp_name'],"./reports/anouncement/".$_FILES['anouncementReport']['name']))
		{
		    $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}
		else
		{
		   echo "Upload error";
		}
	}
	
	public function recomendation_report_up_action()
	{
	    $category_id = $_POST["recomendation"];	
		$entry_date  = $_POST["entry_date"];
		$title       = $_POST["title"];
		$source      = $_POST["source"];
	    $filename = $_FILES['recomendationReport']['name'];
		$base_url = base_url();
		$location = "./reports/recomendation/".$filename;
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['recomendationReport']['tmp_name'],"./reports/recomendation/".$_FILES['recomendationReport']['name']))
		{
		    $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}
	
	public function sector_report_up_action()
	{	
	    $category_id = $_POST["sector"];
		$entry_date  = $_POST["entry_date"];
		$title 		 = $_POST["title"];
		$source 	 = $_POST["source"];
	    $filename = $_FILES['sector_report']['name'];
		$base_url = base_url();
		$location = "./reports/sector/".$filename;
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['sector_report']['tmp_name'],"./reports/sector/".$_FILES['sector_report']['name']))
		{
		    $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}	
	
	
	public function macro_report_up_action()
	{	
	    $category_id = $_POST["macro"];
		$entry_date  = $_POST["entry_date"];
		$title 		 = $_POST["title"];
		$source 	 = $_POST["source"];
	    $filename = $_FILES['macro_report']['name'];
		$base_url = base_url();
		$location = "./reports/macro/".$filename;
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['macro_report']['tmp_name'],"./reports/macro/".$_FILES['macro_report']['name']))
		{
		       $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}	
	
	
	
	public function article_report_up_action()
	{	
	    $category_id = $_POST["article"];
		$entry_date  = $_POST["entry_date"];
		$title 		 = $_POST["title"];
		$source 	 = $_POST["source"];
	    $filename = $_FILES['article_report']['name'];
		$base_url = base_url();
		$location = "./reports/articles/".$filename;
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['article_report']['tmp_name'],"./reports/articles/".$_FILES['article_report']['name']))
		{
		  $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}



	
	public function ipo_report_up_action()
	{	
	    //ipo_watch_report,company_name,subscription_date,ipo_type,ipo_method,source
        $company_name = $_POST["company_name"];
		$subscription_date  = $_POST["subscription_date"];
		$ipo_type 		 = $_POST["ipo_type"];
		$ipo_method 	 = $_POST["ipo_method"];
		$source 	 = $_POST["source"];
		$filename 	 = $_FILES['ipo_watch_report']['name'];
		$base_url = base_url();
		$location = "./reports/ipo/".$filename;
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['ipo_watch_report']['tmp_name'],"./reports/ipo/".$_FILES['ipo_watch_report']['name']))
		{
		  $this->report_up_data->ipo_report_entry($company_name,$subscription_date,$ipo_type,$ipo_method,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}
	
	
	
	
	public function daily_report_up_action()
	{	
        $category_id = $_POST["daily"];
		$entry_date  = $_POST["entry_date"];
		$title 		 = $_POST["title"];
		$source 	 = $_POST["source"];	
		$filename 	 = $_FILES['daily_overview_report']['name'];
		$base_url 	 = base_url();
		$location 	 = "./reports/daily/".$filename;
		
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['daily_overview_report']['tmp_name'],"./reports/daily/".$_FILES['daily_overview_report']['name']))
		{
		     $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}	
	
	
	public function weekly_report_up_action()
	{	
	    $category_id = $_POST["weekly"];
	    $entry_date  = $_POST["entry_date"];
		$title      = $_POST["title"];
		$source     = $_POST["source"];
	    $filename = $_FILES['weekly_overview_report']['name'];
		$base_url = base_url();
		$location = "./reports/weekly/".$filename;
		
		
		$this->load->model("report_up_data");	
		if(move_uploaded_file($_FILES['weekly_overview_report']['tmp_name'],"./reports/weekly/".$_FILES['weekly_overview_report']['name']))
		{
		      $this->report_up_data->report_entry($category_id,$entry_date,$title,$source,$filename);
		
			echo "Successfully uploaded your file $filename!<br/>";		  				
		}else{
		   echo "Upload error";
		}
	}
	
	
	
	/***************************************************************
	*** end upload actions function
	***************************************************************/
	
	
	
	

	
	/***************************************
	*** report ui upload forms
	****************************************/	
	public function anouncement_report_up()
	{	
	    
	    $this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/anouncement_report_up_action');
	?>
    <html>
    <head>	
       <!-- bootstrap -->
   	   <?php //$this->load->view('utility');?>
		
		<script type="text/javascript">
	   $(document).ready(function(){
	     // alert(2);
	      $("#entry_date1").datepicker({});
	   });
	   </script>
	   </head>
	   <body>
      <input type="hidden" name="anouncement" value="1"/>
        <fieldset>
	    <legend>anouncement report file upload</legend>  
	  <table width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="anouncementReport"/></td>
	   </tr>
	   <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source" value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	   <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>" id="entry_date1"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	   </body>
	   </html>
	<?php 
	}
	
	
	
	
	public function recomendation_report_up()
	{	
	    $this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/recomendation_report_up_action');
	?>	 
      <input type="hidden" name="recomendation" value="8"/>	
	    <fieldset>
	    <legend>recomendation report file upload</legend>
	  <table width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="recomendationReport"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	<?php 
	}
	
	
	public function sector_report_up()
	{	
	    $this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/sector_report_up_action');
	 ?>
	   <input type="hidden" name="sector" value="2"/>	
	     <fieldset>
	    <legend>sector report file upload</legend>
	   <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="sector_report"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	   <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	<?php  
	}	
	
	public function macro_report_up()
	{	
		$this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/macro_report_up_action');

	 ?>
	    <input type="hidden" name="macro" value="3"/>	
	    <fieldset>
	    <legend>macro report file upload</legend>
	   <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="macro_report"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	   <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	<?php  
	}	
	
	
	
	public function article_and_interview_report_up()
	{
	  	$this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/article_report_up_action');
	?>
	    <input type="hidden" name="article" value="4"/>	
	    <fieldset>
	    <legend>article and interview file upload</legend>
	   <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="article_report"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	<?php	
	}

	
	
	
	
	
	
	public function ipo_watch_report_up()
	{
      	$this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/ipo_report_up_action');	
	?>
	      <input type="hidden" name="ipo" value="5"/>	
	  <fieldset>
	   <legend>ipo overview file upload</legend>
	   <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="ipo_watch_report"/></td>
	   </tr>
	    <tr>
	      <td>Company Name</td>
		  <td><input type="text" name="company_name" style="width:250px;" /></td>
	   </tr>
	    <tr>
	      <td>Subscription Date</td>
		  <td><input type="text" name="subscription_date" style="width:250px;" /></td>
	   </tr>
	    <tr>
	      <td>IPO Type</td>
		  <td><input type="text" name="ipo_type" value="IPO Approved by SEC
" style="width:250px;" /></td>
	   </tr>
	    <tr>
	      <td>IPO Method</td>
		  <td>
			<select  name="ipo_method" style="width:250px;" >
				<option value="Fixed Price Method">Fixed Price Method</option>
				<option value="Book Building Method">Book Building Method</option>
			</select>
		  </td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."  style="width:250px;"/></td>
	   </tr>
	    
	   <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	<?php	
	}
	
	
	
	
	
	
	
	public function daily_overview_report_up()
	{	
		$this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/daily_report_up_action');	
	?>
		<input type="hidden" name="daily" value="6"/>	
	   <fieldset>
	   <legend>daily overview file upload</legend>
	    <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="daily_overview_report"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	   <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	    </fieldset>
	<?php	
	}




	
	
	
	public function weekly_overview_report_up()
	{	
		$this->load->helper(array('url','form'));
		echo form_open_multipart('report_ui/weekly_report_up_action');	
	?>
	  <input type="hidden" name="weekly" value="7"/>	
	   <fieldset>
	   <legend>weekly overview file upload</legend>
	   <table  width="100%">
	   <tr>
	      <td>Upload</td>
		  <td><input type="file" name="weekly_overview_report"/></td>
	   </tr>
	    <tr>
	      <td>Title</td>
		  <td><input type="text" name="title"   style="width:250px;"/></td>
	   </tr>
	    <tr>
	      <td>Source</td>
		  <td><input type="text" name="source"  value="CAPM Advisory Ltd."   style="width:250px;"/></td>
	   </tr>
	     <tr>
	      <td>Date</td>
		  <td><input type="text" name="entry_date" value="<?php echo date('Y-m-d');?>"   style="width:250px;"/></td>
	   </tr>
	   <tr>
	      <td></td>
		  <td><input type="submit" value="upload"/></td>
	   </tr>
	   </table>
	   </form>
	   </fieldset>
	<?php	
	}	
	
	
	public function ipo_title_story_search()
	{
	   $row_id = $this->input->post("row_id");
	   $this->load->model("report_data");
	   $res   = $this->report_data->get_title_story($row_id);
	   $parse = explode("#" , $res);
	   $title = $parse[0];
	   $story = $parse[1];
	   echo $title.'#'.$story;
	}
	
}
?>