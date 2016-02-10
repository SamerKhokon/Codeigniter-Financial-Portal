<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sp extends CI_Controller 
{
    public function call_sp()
    {
        $this->load->model('sp_data');
		$code = "ACI";
	    //$tps = $this->sp_data->tp();
		$tps = $this->sp_data->tp_call($code);
	    foreach($tps as $tp)
	    {
			echo $tp->code .'  '.$tp->name .'<br/>';
	    }
    }
}
?>