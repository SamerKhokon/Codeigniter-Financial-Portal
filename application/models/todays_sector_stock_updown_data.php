<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Todays_sector_stock_updown_data extends CI_Model 
{

	public function get_sectors()
	{
	    $str = "select sector_id,name from sector";
		return $this->db->query($str)->result();
    }

    public function todays_market_brief_data()
	{
	    $sector_id = 1;
		$str = "SELECT SUM(`total_value`) AS total_value,
			SUM(`total_volume`) AS total_volume,
			SUM(`total_trade`) AS total_trades   FROM eod_stock WHERE 
			company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
			AND entry_date = (SELECT MAX(entry_date) FROM eod_stock)";
		
		$res=  $this->db->query($str)->result();

        $str2 = "select `open`,`high`,`low`,`ycp`  FROM eod_stock WHERE 
			company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
			AND entry_date = (SELECT MAX(entry_date) FROM eod_stock)";
		
		$res2 =  $this->db->query($str2)->result();
		
		return $res[0]->total_trades . "#" . $res2[0]->open . "#" . $res2[0]->high . "#" . $res2[0]->low 
		. "#" . $res2[0]->ycp;
	}

    public function todays_all_sectors_stock_updown_data()
	{
	   $str = "SELECT   s.name, SUM(a.pos) AS pos,SUM(a.neg) AS neg,
			SUM(a.none) AS NONE		FROM sector AS s
			LEFT OUTER JOIN	(SELECT c.sector_id,
			IF(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) > 0, 1, 0) AS pos, IF(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) < 0, 1, 0) AS neg, 
			IF(!(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) > 0) AND !(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) < 0), 1, 0) AS NONE 
			FROM company AS c 
			LEFT OUTER JOIN eod_stock AS e ON e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			AND e.company_id = c.ID WHERE e.company_id  ) AS a ON a.sector_id = s.sector_ID GROUP BY s.sector_ID 
			ORDER BY COUNT(pos+neg+NONE) DESC;";
		return $this->db->query($str)->result();	
	}
	
	
	
	public function indiv_sector_updown($sector_name)
	{
	  $str = "SELECT
			s.name,
			SUM(a.pos) AS pos,
			SUM(a.neg) AS neg,
			SUM(a.n) AS `n`

			FROM sector AS s

			LEFT OUTER JOIN
			(SELECT 
			c.sector_id,
			IF(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) > 0, 1, 0) AS pos,
			 IF(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) < 0, 1, 0) AS neg, 
			IF(!(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) > 0) AND !(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) < 0), 1, 0) AS `n` 

			FROM company AS c 
			LEFT OUTER JOIN eod_stock AS e ON e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			AND e.company_id = c.ID WHERE e.company_id  ) AS a ON a.sector_id = s.sector_ID
			WHERE s.name='$sector_name' GROUP BY s.sector_ID 
			ORDER BY COUNT(pos+neg+n) DESC;";
			
		$res =  $this->db->query($str)->result();	
		return $res[0]->pos . '#'. $res[0]->neg .'#'. $res[0]->n;
	}
	
	
	
	public function todays_sector_stock_close_price_data($sector_id)
	{
	   //$sector_id = 1;
	   
	   $str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
		(SELECT `name` FROM company WHERE id=e.company_id) AS `name`,
		e.ltp,e.entry_date AS `date`
			 FROM eod_stock AS e
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
		AND entry_date = (SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
		ORDER BY ltp ASC";   
	   
	   /*
	   $str  = "SELECT c.code,c.name,e.ltp,e.entry_date AS `date`
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id WHERE e.company_id AND e.entry_date 
		= (SELECT MAX(entry_date) FROM eod_stock) AND 
		sector_id = '$sector_id' ORDER BY e.ltp  ASC";	   
		*/
		
		return $this->db->query($str)->result();
	}
	
	
	public function todays_sector_stock_volume_data($sector_id)
	{
	    //$sector_id = 1;
		$str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
		(SELECT `name` FROM company WHERE id=e.company_id) AS `name`,
		e.total_volume,e.entry_date AS `date`
			 FROM eod_stock AS e
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
		AND entry_date = (SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
		ORDER BY total_volume ASC";
		/*
	    $str  = "SELECT c.code,c.name,e.total_volume,
			e.entry_date AS `date`
			FROM eod_stock AS e
			LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = 
			(SELECT MAX(entry_date)
			 FROM eod_stock) AND 
			 sector_id = '$sector_id' ORDER BY total_volume";	   
		*/
		
		return $this->db->query($str)->result();
	}


	public function todays_sector_value_graph_json($sector_id)
	{
	    //$sector_id = 1;
		$str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
		(SELECT `name` FROM company WHERE id=e.company_id) AS `name`,
		e.total_value AS turnover,e.entry_date AS `date`
			 FROM eod_stock AS e
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
		AND entry_date = (SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
		ORDER BY turnover ASC";
		
		/*
	    $str = "SELECT c.code,c.name,e.total_value AS turnover,
		e.entry_date AS `date` FROM eod_stock AS e
		LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date =
		 (SELECT MAX(entry_date) FROM eod_stock) 
		 AND sector_id = '$sector_id' ORDER BY turnover asc";
		*/
		
		return $this->db->query($str)->result();
	}

	
	
	public function todays_sector_no_of_trades_graph_data($sector_id)
	{
	    //$sector_id = 1;
		
		$str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
		(SELECT `name` FROM company WHERE id=e.company_id) AS `name`,
		e.total_trade AS trade,e.entry_date AS `date`
			 FROM eod_stock AS e
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
		AND entry_date = (SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
		ORDER BY trade ASC";
		
		/*
	    $str = "SELECT c.code,c.name,e.total_trade AS trade,
		e.entry_date AS `date` FROM eod_stock AS e
		LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date = 
		(SELECT MAX(entry_date) FROM eod_stock)
		AND sector_id = '$sector_id' ORDER BY trade";	
		*/
		return $this->db->query($str)->result();
	}	
	
	public function todays_sector_changes_graph_data($sector_id)
	{
	    //$sector_id = 1;
		$str = "SELECT (SELECT `code` FROM company WHERE id=e.company_id) AS `code`,
		(SELECT `name` FROM company WHERE id=e.company_id) AS `name`,
		e.changes,e.entry_date AS `date`
			 FROM eod_stock AS e
		WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id) 
		AND entry_date = (SELECT entry_date FROM eod_stock WHERE company_id=e.`company_id` ORDER BY entry_date DESC LIMIT 1)
		ORDER BY changes ASC";
		
		/*
	    $str = "SELECT c.code,c.name,
				CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes,
				e.entry_date AS `date`,
				FROM_UNIXTIME(e.entry_timestamp, '%h:%i') AS `time`
				FROM eod_stock AS e
				LEFT OUTER JOIN company AS c
				ON c.ID = e.company_id
				WHERE e.company_id AND e.entry_date = 
				(SELECT MAX(entry_date) FROM eod_stock) 
				AND sector_id = '$sector_id'
				ORDER BY changes ASC";
				
		*/		
		return $this->db->query($str)->result();		
	}
	
	public function stock_price_table_data()
	{
	   $company_code = "DBH";
	   $where = "c.code='$company_code' AND";
	   
	   $str = "SELECT 	c.`code` , 
		e.`open`, e.`high`, e.`low`, e.`ltp`,
		e.`ycp`, e.`cse_price`, 
		e.`cse_volume`, e.`total_trade`,
		e.`total_volume`, e.`total_value`
		, (((e.`ltp`-e.`ycp`)/e.`ycp`)*100) AS changes,
		`entry_date` 	 
		FROM 	`db_iportal`.`eod_stock` AS e	
		LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE 	
		e.company_id AND e.entry_date = 
		(SELECT MAX(entry_date) FROM eod_stock)	
		ORDER BY total_trade DESC LIMIT 10";
	
	    return $this->db->query($str)->result();	
	}
}

?>