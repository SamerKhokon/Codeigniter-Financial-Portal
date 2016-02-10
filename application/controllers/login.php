<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    
    class Login extends CI_Controller
	{
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
	}

?>