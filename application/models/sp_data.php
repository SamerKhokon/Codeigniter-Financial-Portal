<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sp_data extends CI_Model 
{
    public function tp()
    {
      $str = "call test2();";
	  return $this->db->query($str)->result();
    }
   
    public function tp_call($code)
    {
         $str = "call test3('$code');";
	     return $this->db->query($str)->result();
    }
}
?>