<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todays_market_mover_data extends CI_Model 
{
	
	public function market_mover_table_data()
	{
	   $company_code = "DBH";
	   //$where = "c.code='$company_code' AND";
	   
	   $str = "SELECT 	c.`code` , 
		e.`open`, e.`high`, e.`low`, e.`ltp`,
		e.`ycp`, e.`cse_price`, 
		e.`cse_volume`, e.`total_trade`,
		e.`total_volume`, e.`total_value`
		, (((e.`ltp`-e.`ycp`)/e.`ycp`)*100) AS changes,
		`entry_date` 	 
		FROM 	`eod_stock` AS e	
		LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE 	
		e.company_id AND e.entry_date = 
		(SELECT MAX(entry_date) FROM eod_stock)	
		ORDER BY total_value DESC";
	
	    return $this->db->query($str)->result();	
	}
	
	
    public function stock_market_prices_table_data($sector)
	{
	   $company_code = "DBH";
	   //$where = "c.code='$company_code' AND";
	   
	   $str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
  e.`open`, e.`high`, e.`low`, e.`ltp`, e.`ycp`, e.`cse_price`, 
e.`cse_volume`, e.`total_trade`, e.`total_volume`, e.`total_value` , 
changes, `entry_date` FROM `eod_stock` AS e 
WHERE e.company_id IN(SELECT id FROM company WHERE sector_id=$sector) AND
e.`entry_date` = 
(SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
ORDER BY total_value DESC ";
	   /*
	  echo $str = "SELECT 	c.`code` , 
		e.`open`, e.`high`, e.`low`, e.`ltp`,
		e.`ycp`, e.`cse_price`, 
		e.`cse_volume`, e.`total_trade`,
		e.`total_volume`, e.`total_value`
		, (((e.`ltp`-e.`ycp`)/e.`ycp`)*100) AS changes,
		`entry_date` 	 
		FROM 	`eod_stock` AS e	
		LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE 	
		e.company_id AND e.entry_date = 
		(SELECT MAX(entry_date) FROM eod_stock)	
		AND e.company_id 
		IN(SELECT id FROM company WHERE sector_id=$sector)
		ORDER BY total_value DESC";*/
	
	    return $this->db->query($str)->result();	
	}
}
?>	