<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weeklytop_looser_data extends CI_Model 
{
	public function dailytop_looser_by_percent_change()
	{
	    $str = "SELECT c.code,SUM(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2))) AS changes
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
			WHERE e.company_id AND 
			e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
			)
			GROUP BY company_id
			ORDER BY changes ASC  LIMIT 10";
	  return $this->db->query($str)->result();	
	}
	
    public function dailytop_looser_by_volume_data()
	{
		$str = "SELECT c.code,SUM(total_volume) AS volume
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
				WHERE e.company_id AND 
				e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
				)
				GROUP BY company_id
				ORDER BY volume ASC  LIMIT 10";
		return $this->db->query($str)->result();
	}
	
    public function dailytop_looser_by_no_of_trades_data()
	{
		$str = "SELECT c.code,SUM(total_trade) AS no_of_trades
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
				WHERE e.company_id AND 
				e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
				)
				GROUP BY company_id
				ORDER BY no_of_trades DESC  LIMIT 10";
		return $this->db->query($str)->result();
	}
	
	public function dailytop_looser_by_turnover_data()
	{
		$str = "SELECT c.code,SUM(total_value) AS turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
			WHERE e.company_id AND 
			e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
			)
			GROUP BY company_id
			ORDER BY turnover ASC  LIMIT 10";
		return $this->db->query($str)->result();
	}	


	public function weeklytop_looser_by_turnover_growth()
	{
		$str = "SELECT `code`, 
			 SUM(turnover_growth) AS turnover_growth 			 
			FROM ( SELECT c.code,e.entry_date,e.total_trade AS  no_of_trade,
			e.total_volume AS volume ,e.total_value AS turnover,
			CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes,
			((SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp) AS mcap,
			(((SELECT total_value FROM eod_stock WHERE company_id=e.company_id 
			AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
			)-e.total_value)/(SELECT total_value FROM eod_stock WHERE company_id=e.company_id 
			AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
			)) AS turnover_growth FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.id=e.company_id	
			WHERE e.company_id AND entry_date >=
			(SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock) ) AS t
			GROUP BY `code`  ORDER BY turnover_growth ASC LIMIT 10";
		return $this->db->query($str)->result();
	}	
	

}
?>