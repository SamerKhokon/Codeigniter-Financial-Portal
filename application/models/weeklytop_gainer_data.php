<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weeklytop_gainer_data extends CI_Model 
{
	
	public function trade_status_table_new_data($field,$order)
	{
	    if($field=="")
	    $where = " ORDER BY changes DESC  LIMIT 10";
	    else
		$where = " ORDER BY $field $order  LIMIT 10";
		
		$str = "SELECT `code`, SUM(volume) AS volume , SUM(turnover) AS turnover ,
			SUM(no_of_trade) AS no_of_trades ,SUM(changes) AS changes ,
			 SUM(turnover_growth) AS turnover_growth ,SUM(mcap) AS mcap			 
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
			GROUP BY `code` $where";
	
	    /*
	    $str = "SELECT c.code,SUM(e.total_volume) AS volume,
			SUM(e.total_value) AS turnover,
			SUM(e.total_trade) AS  no_of_trades,
			SUM(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2))) AS changes,
			SUM((e.total_value - IFNULL((SELECT total_value FROM eod_stock WHERE company_id = e.company_id AND entry_date = e.entry_date),0))/(SELECT total_value FROM eod_stock WHERE company_id = e.company_id AND entry_date = e.entry_date)) AS turnover_growth,
			SUM((SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp) AS mcap
			 
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
			WHERE e.company_id AND 
			e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
			)
			GROUP BY company_id $where";
		*/	
			
       	return $this->db->query($str)->result();	
	}
	
	public function trade_status_table_data($field,$order)
	{
	    if($field=="")
		$where = "";
		else
		$where = "ORDER BY $field $order";		
		
	    $str = "SELECT Trade_Date,Company_Code,SUM(No_of_Trades) No_of_Trades,
			SUM(Prev_Close_Price) Prev_Close_Price,SUM(Close_Price) Close_Price,
			SUM(((Close_Price-Prev_Close_Price)/Prev_Close_Price)*100) AS Percent_Change
			,SUM(Last_Traded_Price) Last_Traded_Price,SUM(Turnover) AS Turnover
			,SUM(Volume) AS Volume 	FROM 
			`v_instrument_trade_status_web`   WHERE No_of_Trades > 0
			AND DATE_FORMAT(Trade_Date , '%Y-%m-%d') 
			BETWEEN DATE_SUB(DATE_FORMAT(NOW() , '%Y-%m-%d'),INTERVAL 7 DAY)
			AND DATE_FORMAT(NOW() , '%Y-%m-%d')
			GROUP BY Company_Code ".$where;				
			
		return $this->db->query($str)->result();		
	}
    	
	
	public function dailytop_gainer_by_price()
	{
	    $str = "SELECT c.code,SUM(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2))) AS changes
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
				WHERE e.company_id AND 
				e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
				)	GROUP BY company_id
				ORDER BY changes DESC  LIMIT 10";
		return $this->db->query($str)->result();
	}
	
	public function dailytop_gainer_by_percent_change()
	{
	    $str = "SELECT c.code,SUM(CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2))) AS changes
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
			WHERE e.company_id AND 
			e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
			)
			GROUP BY company_id
			ORDER BY changes DESC  LIMIT 10";
	  return $this->db->query($str)->result();
	}	
	
	
    public function dailytop_gainer_by_volume_data()
	{
		$str = "SELECT c.code,SUM(total_volume) AS volume
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
				WHERE e.company_id AND 
				e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
				)
				GROUP BY company_id
				ORDER BY volume DESC  LIMIT 10";
		return $this->db->query($str)->result();
	}	
	
	
	public function dailytop_gainer_by_no_of_trades_data()
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
	
	
    public function dailytop_gainer_by_turnover_data()
	{
		$str = "SELECT c.code,SUM(total_value) AS turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c ON c.ID = e.company_id
			WHERE e.company_id AND 
			e.entry_date >= ((SELECT DATE_SUB(MAX(entry_date),INTERVAL 7 DAY) FROM eod_stock)
			)
			GROUP BY company_id
			ORDER BY turnover DESC  LIMIT 10";
		return $this->db->query($str)->result();
	}		
	
	public function weeklytop_gainer_by_turnover_growth()
	{
	    $str ="SELECT `code`, 
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
			GROUP BY `code`  ORDER BY turnover_growth DESC LIMIT 10";
			
		return $this->db->query($str)->result();	
	}
	
}
?>