<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todays_market extends CI_Controller 
{
    public function index()
	{
	   $this->load->view("site/todays_market_page");
	}
}
?>	