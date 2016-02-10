<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sector_vs_eps_data extends CI_Model 
{

   public function get_sectors()
   {
      $str = "select sector_id,`name` as sector from 
	          sector";
	   return $this->db->query($str)->result();
   }

   
   
   
   public function individual_sector_total_capitalization()
   {
        $str = "SELECT SUM((total_share*
			(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
			WHERE Company_Code=a.company_code ORDER BY 
			Company_Code DESC LIMIT 1))) AS total_capitalization
			FROM `mkt_share_info` AS a";
		
	  $res = $this->db->query($str)->result();
	  return $res[0]->total_capitalization;	
   }
   
   public function individual_sector_total_weighted_avg_price()
   {
		$str = "SELECT SUM(((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
			WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))/	
			(SELECT SUM((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
			WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))) AS total_capitalization
			FROM `mkt_share_info` AS a))*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
			WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1)) 
			AS total_weighted_avg_price FROM `mkt_share_info` AS a";
			
		$res = $this->db->query($str)->result();	
		return $res[0]->total_weighted_avg_price;
   }
   
   
   
   
   
   public function individual_sector_capitalization($sector_id)
   {
       /*
        $str = "SELECT company_code,total_share,				
				(total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1)) 
				AS capitalization ,
				
				(SELECT SUM((total_share*(SELECT floating_no_of_share FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))) 
				AS total_capitalization FROM `mkt_share_info` AS a) AS total_capitalization ,
								
				
				((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))
				
				/				
				
				(SELECT SUM((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))) 
				AS total_capitalization FROM `mkt_share_info` AS a)) AS weight	,				
				
				
				(SELECT PE FROM `mkt_pe_info`
				WHERE COMPANY_CODE=a.company_code ORDER BY ID DESC LIMIT 1)  
				AS ANNUALIZED_EPS ,
				
				
				(SELECT PE FROM `mkt_pe_info`
				WHERE COMPANY_CODE=a.company_code ORDER BY ID DESC LIMIT 1)  
				AS COMPANY_PE ,				
				
				((SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1)*
				((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))/	
				(SELECT SUM((total_share*(SELECT Last_Traded_Price FROM 
				`v_instrument_trade_status_web` WHERE Company_Code=a.company_code 
				ORDER BY Company_Code DESC LIMIT 1))) AS total_capitalization
				FROM `mkt_share_info` AS a))) AS weighted_avg_price ,
				
				
				((SELECT `PE` FROM `mkt_pe_info` 
				WHERE company_code=a.company_code ORDER BY ID DESC LIMIT 1)*
				((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))/	
				(SELECT SUM((total_share*(SELECT Last_Traded_Price FROM `v_instrument_trade_status_web` 
				WHERE Company_Code=a.company_code ORDER BY Company_Code DESC LIMIT 1))) 
				AS total_capitalization FROM `mkt_share_info` AS a))) AS weighter_eps_avg_price
				
				
				FROM `mkt_share_info` AS a WHERE 
				company_code IN(SELECT DISTINCT CODE
				FROM company_basic_info WHERE SECTOR='$sector')";
			*/
			
			
		 $str = "SELECT company_id,`code`,total_share,capitalization,total_capitalization,
				(capitalization/total_capitalization) AS weight , ltp ,
				((capitalization/total_capitalization)*ltp) AS weighted_avg_price , 
				((capitalization/total_capitalization)*annualized_eps) AS weighter_eps_avg_price, annualized_eps,
				(ltp/annualized_eps) AS company_pe 	FROM (SELECT company_id,

				(SELECT `code` FROM company WHERE id=t.`company_id`) AS `code`,	total_share,
				(SELECT `floating_cap` FROM `eod_stock` WHERE 
				company_id=t.`company_id` ORDER BY entry_date DESC LIMIT 1) AS capitalization ,

				(SELECT SUM(`floating_cap`) FROM `eod_stock` WHERE company_id IN 
				(SELECT id FROM company WHERE sector_id=$sector_id))
				 AS total_capitalization ,

				(SELECT ltp FROM eod_stock ORDER BY entry_date DESC LIMIT 1) AS ltp ,
				(SELECT q4 FROM eps_continuing WHERE company_id=t.`company_id` LIMIT 1) 
				AS annualized_eps FROM share_percentage AS t WHERE company_id IN 
				(SELECT id FROM company WHERE sector_id=$sector_id)) AS tpl";	
			
			
			
		return $this->db->query($str)->result();		
   }
   
   
   
   
   
   
   
   
   
}
?>