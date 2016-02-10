<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mb_data extends CI_Model 
{
    public function menu_list()
	{
	   $str = "select id,name
				from web_main_menus";
	   return $this->db->query($str)->result();
	}

	public function get_submenu_overview($content)
	{
	    $str = "SELECT sub_menu_overview FROM `web_sub_menus`
		WHERE content='$content'";  
        $res = $this->db->query($str)->result();		
		return $res[0]->sub_menu_overview;
	}	
	
	public function submenu_table()
	{
	   $str = "SELECT 	`id`, 
	`main_menu_id`, `sub_menu_name`, `content`, `sub_menu_overview`, 
	`page_for`, `order_id`, `creation_date`, `status`	 
	FROM `iportal`.`web_sub_menus`";
	   return $this->db->query($str)->result();
	}
	
	
	
	
	public function company_information_table()
	{
	   $str = "SELECT 	`SLNO`,`CODE`,`NAME`,`FACE_VALUE`,`CATEGORY`, 
	`ELECTRONIC`,`MARKET_LOT`,`_52WEEK_RANGE`,`SECTOR`,`LISTING_YEAR`, 
	`YEAR_END`,`ESTABLISHING_DATE`,`TRADE_START_DATE`, 
	`OFFER_PRICE`,`CREDIT_RATING_FIRM`,`PARENT_COMPANY`,`COMPANY_PURPOSE`, 
	`ADDRESS`,`TELEPHONE`,`FAX`,`EMAIL`,`WEBSITE`,`CREATION_DATE`, 
	`USERNAME`	FROM `company_basic_info`";
	   return $this->db->query($str)->result();
	}
	
	
	
	public function share_info_table($company_code)
	{
	    $str = "SELECT 	ID,`TOTAL_SHARE`,`MARKET_CAP`, 
			`AUTHORIZED_CAP`, 
			`SPONSOR`, 
			`GOVT`, 
			`INSTITUTE`, 
			`FOREIGN`, 
			`PUBLIC`, 
			`RESERVE_SURPLUS`, 
			`FLOATING_PERCENTAGE`, 
			`FLOATING_NO_OF_SHARE`	 
			FROM 
			`mkt_share_info` 
			WHERE company_code='$company_code' ORDER BY ID DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		
		return $res[0]->ID.'#'.$res[0]->IDTOTAL_SHARE.'#'.
			$res[0]->IDMARKET_CAP .'#'.
			$res[0]->IDAUTHORIZED_CAP.'#'.
			$res[0]->IDSPONSOR.'#'.
			$res[0]->IDGOVT .'#'.
			$res[0]->IDINSTITUTE .'#'.
			$res[0]->IDFOREIGN .'#'.
			$res[0]->IDPUBLIC.'#'.
			$res[0]->IDRESERVE_SURPLUS.'#'.
			$res[0]->IDFLOATING_PERCENTAGE.'#'. 
			$res[0]->IDFLOATING_NO_OF_SHARE;
	}
	
	
    public function submenu_add($main_menu_id,$submenu_name,
			$submenu_overviews,$submenu_page_for)
	{
	   $str  = "INSERT INTO `web_sub_menus` 
		(`main_menu_id`,`sub_menu_name`,`content`,`submenu_overview`, 
		`creation_date`,`page_for`,`status`)
		VALUES('$main_menu_id','$submenu_name','', 
		'$submenu_overviews',now(),'$submenu_page_for','Y')";
	  $this->db->query($str);
	  return 1;
	}
	
	public function menu_add($menu_name,$menu_overview,	$submenu_flag,$page_for)
	{
	   $str = "INSERT INTO `web_main_menus`(`name`,`content`,`menu_overview`,`submenu_flag`, 
	 `creation_date`,`status`,`page_for`) VALUES('$menu_name','','$menu_overview','$submenu_flag', 
	 now(),'Y','$page_for')";
	   
	   $this->db->query($str);
	   return 1;
	}
	
	public function test_table()
	{
		$str = "SELECT 	`id`, `amount`, `name`	 FROM `test`";
		return $this->db->query($str)->result();
	}	
}
?>