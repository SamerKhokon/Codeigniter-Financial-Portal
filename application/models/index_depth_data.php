<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_depth_data extends CI_Model 
{
   public function get_companies()
   {
      $str = "select `id`,`code` from company";
	  return  $this->db->query($str)->result();
   }
}
?>
