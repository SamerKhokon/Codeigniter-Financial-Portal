<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mains extends CI_Controller 
{

    public function index()
	{	
	    if($this->session->userdata('CAPM_USER'))
		{
			$this->load->view("home/home_page");
		}else{
		   redirect("mains/login" , "refresh");
		}
	}
	
	
	public function login()
	{
		$this->load->view("home/login_view");
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
	   redirect("mains/login","refresh");
	}
	
	
	
	
	public function technical_screener_home_page_search_vals()
	{
		$cci_select = $this->input->post("cci_select");
		$cci_val    = $this->input->post("cci_val");
		
		$mfi_select = $this->input->post("mfi_select");
		$mfi_val	= $this->input->post("mfi_val");
		
		$rsi_select = $this->input->post("rsi_select");
		$rsi_val    = $this->input->post("rsi_val");
		
		$st_oscillator_select = $this->input->post("st_oscillator_select");
		$st_oscillator_val    = $this->input->post("st_oscillator_val");
		
		$ut_oscillator_select = $this->input->post("ut_oscillator_select");
		$ut_oscillator_val	  = $this->input->post("ut_oscillator_val");
		
		$wr_select			  = $this->input->post("wr_select");
		$wr_val				  = $this->input->post("wr_val");
		
		$trix_select		  = $this->input->post("trix_select");
		$trix_val			  = $this->input->post("trix_val");
		
		$data['cci_select'] 		  = $cci_select;
		$data['cci_val'] 			  = $cci_val;		
		$data['mfi_select'] 		  = $mfi_select;
		$data['mfi_val'] 			  = $mfi_val;		
		$data['rsi_select'] 		  = $rsi_select;
		$data['rsi_val'] 			  = $rsi_val;		
		$data['st_oscillator_select'] = $st_oscillator_select;
		$data['st_oscillator_val'] 	  = $st_oscillator_val;		
		$data['ut_oscillator_select'] = $ut_oscillator_select;
		$data['ut_oscillator_val'] 	  = $ut_oscillator_val;		
		$data['wr_select'] 	 		  = $wr_select;
		$data['wr_val']    	 		  = $wr_val;		
		
		$this->session->set_userdata($data);
		echo 1;		
	}	
	 
	
	public function technical_screener_ui_search()
	{
	   $this->load->view("home/technical_screener_ui_search_view"); 
	}
	
	public function fundamental_search()
	{
	    error_reporting(0);
	    $cci_sel		= $this->input->post("cci_sel");
		$search_cci		= $this->input->post("search_cci");
		$mfi_sel		= $this->input->post("mfi_sel");
		$search_mfi		= $this->input->post("search_mfi");
		$rsi_sel		= $this->input->post("rsi_sel");
		$search_rsi		= $this->input->post("search_rsi");
		$st_oscilator_sel	= $this->input->post("st_oscilator_sel");
		$search_st_oscilator= $this->input->post("search_st_oscilator");
		$ut_oscilator_sel	= $this->input->post("ut_oscilator_sel");
		$search_ut_oscilator= $this->input->post("search_ut_oscilator");
		$wr_sel				= $this->input->post("wr_sel");
		$search_wr			= $this->input->post("search_wr");
		
		
	    $this->load->model("fundamental_screener_data");		
	    $datas = $this->fundamental_screener_data->fundamental_screener_search_data($cci_sel,$search_cci,
		$mfi_sel,$search_mfi,$rsi_sel,$search_rsi,$st_oscilator_sel,$search_st_oscilator,
		$ut_oscilator_sel,$search_ut_oscilator,$wr_sel,$search_wr);		
		
		$option = "<table width='80%' >";
		$i = 0;
		foreach($datas as $d)
		{	if($i%2==0)	$css = 'style="background:#efefef;font-family:Arial;font-size:12px;"';
		    else $css = 'style="background:#fff;font-family:Arial;font-size:12px;"';
			$option .= "<tr $css>
				<td width='20%' >". $d->code ."</td>
				<td width='10%'>". $d->cci ."</td>
				<td width='10%' >". $d->mfi ."</td>
				<td  width='10%'>". $d->rsi ."</td>
				<td  width='10%'>". $d->sto_stc ."</td>
				<td  width='10%'>". $d->ult_osc ."</td>
				<td  width='10%'>". $d->wiliam_r ."</td>
			</tr>";
			$i++;
		}
		$option .= "</table>";
		echo $option;
		
	}
	
}
?>