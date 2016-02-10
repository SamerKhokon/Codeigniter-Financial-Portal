<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_upload extends CI_Controller 
{
    public function index()
	{
	   $this->load->view("home/report_upmb_ui_view");
	}
	
}
?>