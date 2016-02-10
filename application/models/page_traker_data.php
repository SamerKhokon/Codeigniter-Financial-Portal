<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page_traker_data extends CI_Model 
{
	
	public function is_page_traker_exist($page_id)
	{
	   $str = "SELECT `name` FROM `page_traker` 
			where name='$page_id'";
	   if( $this->db->query($str)->num_rows() <= 0 )
	   $this->page_traker_insert($page_id);
	   return 0;
	   else
	   $this->page_traker_update($page_id);
	   //return $this->db->query($str)->num_rows();
	}
	
	
	public function get_page_traker()
	{
	   $select = "select `name` from `page_traker` 
	              order by id asc limit 1";
	   $res = $this->db->query($select)->result;
	   return $res[0]->name;
	}
	
	
	public function page_traker_update($page_id)
	{
	   $update = "update `page_traker` set 
	   `name`='$page_id' where id=1";
	   $this->db->query($update);
	}
	
	public function page_traker_insert($page_id)
	{
	   $insert = "insert into `page_traker`(`name`)
	   values('$page_id')";
	   $this->db->query($insert);
	}	
}
?>