<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_mover_data extends CI_Model 
{
    public function get_index_mover_data()
	{
	    $str = "SELECT company_id,`code`,entry_date,ltp,total_volume,total_trade,total_value,high,low,changes,floating_cap,prev_cap,cap_change,total_cap,((cap_change/total_cap)*100) AS cap_weight,
		 idx_deviation ,((((cap_change/total_cap)*100)*idx_deviation)/100) AS index_change
		 FROM (
			SELECT e.`company_id`,DATE_FORMAT(e.`entry_date`,'%d %M,%Y') AS entry_date,(SELECT `code` FROM company WHERE id=e.`company_id`) AS `code`,
		e.`ltp`,e.`total_volume`,e.`total_trade`,e.`total_value`,e.`changes`,e.`high`,e.`low`,e.`floating_cap`,
			
			(SELECT floating_cap FROM eod_stock WHERE entry_date<e.`entry_date` AND company_id=e.`company_id` LIMIT 1) AS prev_cap ,
			(e.`floating_cap`- (SELECT floating_cap FROM eod_stock WHERE entry_date<e.`entry_date` AND company_id=e.`company_id` LIMIT 1)) AS cap_change ,

			(SELECT SUM(floating_cap) FROM eod_stock WHERE 
			entry_date =(SELECT DATE_FORMAT(idx_date_time,'%Y-%m-%d') AS idx_date_time FROM `index_change` 
			 ORDER BY idx_date_time DESC LIMIT 1)) AS total_cap ,
			  (SELECT `idx_deviation` FROM `index_change` ORDER BY idx_date_time DESC LIMIT 1) AS idx_deviation

			 FROM eod_stock AS e WHERE entry_date =(SELECT DATE_FORMAT(idx_date_time,'%Y-%m-%d') AS idx_date_time FROM `index_change` 
			 ORDER BY idx_date_time DESC LIMIT 1)  
		 ) AS t ORDER BY  index_change DESC";
			
		return $this->db->query($str)->result();			 
	}
}
?>