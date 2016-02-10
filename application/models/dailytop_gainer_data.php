<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dailytop_gainer_data extends CI_Model 
{

    public function trade_status_table_new_data($field,$order)
	{
	
	    if($field=="")
		$where = " ORDER BY changes DESC LIMIT 0,10";
		else if($field=="mcap")
		$where = " where mcap>0 ORDER BY $field $order LIMIT 0,10";
		else 		
		$where = " ORDER BY $field $order LIMIT 0,10";
		
		
		$str = "SELECT * FROM (
				SELECT c.code,e.total_trade,e.total_volume ,e.total_value,e.ycp,
				CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes
				,
				(SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp AS mcap,
				(((
				SELECT total_value FROM eod_stock 
				WHERE company_id=e.company_id 
				AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
				)-e.total_value)/(
				SELECT total_value FROM eod_stock 
				WHERE company_id=e.company_id 
				AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
				)) AS turnover_growth,(
				SELECT total_value FROM eod_stock 
				WHERE company_id=e.company_id 
				AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
				) AS y_total_val ,e.total_value AS prev_total_val,e.entry_date
				 FROM eod_stock AS e
				LEFT OUTER JOIN company AS c
				ON c.id=e.company_id	
				WHERE e.company_id AND e.entry_date=
				(SELECT MAX(entry_date) FROM eod_stock)) AS t $where";
		
		/*
		$str = "SELECT c.code,e.ltp,e.ycp,e.ltp - e.ycp AS price,
			e.total_volume AS volume,
			e.total_value AS turnover,
			CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes,
			e.total_trade,
			(e.total_value - IFNULL((SELECT total_value FROM eod_stock WHERE company_id = e.company_id AND entry_date = e.entry_date),0))/(SELECT total_value FROM eod_stock WHERE company_id = e.company_id AND entry_date = e.entry_date) AS turnover_growth,
			(SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp AS mcap,
			'' AS pe FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) $where";*/
			
	    return $this->db->query($str)->result();
	}
    

    public function trade_status_table_for_home()
	{	   
	    $str = "SELECT Company_Code,Last_Traded_Price,Turnover,Volume,No_of_Trades,
		        ((Close_Price-Prev_Close_Price)/Prev_Close_Price)*100 as Percent_Change, 
				(SELECT MARKET_CAP FROM mkt_share_info WHERE company_code=a.company_code) AS market_cap ,
				(SELECT ANNUALIZED_EPS FROM(SELECT `COMPANY_CODE` , `ANNUALIZED_EPS` , `YEAR`
			FROM `mkt_company_gen_fin_info` ORDER BY ID DESC) AS t  WHERE 
			t.company_code=a.company_code
			GROUP BY company_code ORDER BY ANNUALIZED_EPS DESC) AS eps
				FROM `v_instrument_trade_status_web`  as  a
				where No_of_Trades>0  order by Percent_Change  desc limit 10";
		//return $str;		
		return $this->db->query($str)->result();		
	}
    



    public function trade_status_table_data($field,$order)
	{
	    if($field=="")
		$where = "";
		
		else
		$where = " ORDER BY $field $order  limit 10";	

		
	    $str = "SELECT Company_Code,Last_Traded_Price,Turnover,Volume,No_of_Trades,
		        ((Close_Price-Prev_Close_Price)/Prev_Close_Price)*100 as Percent_Change, 
				(SELECT MARKET_CAP FROM mkt_share_info WHERE company_code=a.company_code) AS market_cap ,
				(SELECT ANNUALIZED_EPS FROM(SELECT `COMPANY_CODE` , `ANNUALIZED_EPS` , `YEAR`
FROM `mkt_company_gen_fin_info` ORDER BY ID DESC) AS t  WHERE 
t.company_code=a.company_code
GROUP BY company_code ORDER BY ANNUALIZED_EPS DESC) AS eps
				FROM `v_instrument_trade_status_web`  as  a
				where No_of_Trades>0 ".$where;
		//return $str;		
		return $this->db->query($str)->result();		
	}
    
    public function dailytop_gainer_by_price()
	{
	   $str = "SELECT c.code,e.ycp,e.ltp,
		CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes
		 FROM eod_stock AS e LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
		ORDER BY changes DESC
		LIMIT 0,10";
		return $this->db->query($str)->result();
	}

	public function dailytop_gainer_by_percent_change()
	{
	   $str = "SELECT c.code,e.ycp,
		CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes
		 FROM eod_stock AS e LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
		ORDER BY changes DESC
		LIMIT 0,10";
	  return $this->db->query($str)->result();
	}
	
	
    public function dailytop_gainer_by_volume_data()
	{
		$str = "SELECT c.code,total_volume  as volume
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY volume DESC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}
	
    public function dailytop_gainer_by_no_of_trades_data()
	{
		$str = "SELECT c.code,total_trade
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY total_trade DESC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}	
	
	
    public function dailytop_gainer_by_value_data()
	{
		$str = "SELECT c.code,total_value as turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY turnover DESC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}		
	
	
    public function dailytop_gainer_by_turnover_data()
	{
		$str = "SELECT c.code,total_value as turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY turnover DESC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}			
	
    public function dailytop_gainer_by_pe_data()
	{
		$str = "";
		return $this->db->query($str)->result();
	}		


    public function dailytop_gainer_by_eps_data()
	{
	    $str = "";
		return $this->db->query($str)->result();			
	}
	
	public function dailytop_gainer_by_marketcap_data()
	{
	    $str = "SELECT * FROM (SELECT c.code,
				(SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp AS mcap
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c
				ON c.ID = e.company_id
				WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
				) AS t WHERE mcap>=0 ORDER BY mcap DESC
				LIMIT 0,10";
		return $this->db->query($str)->result();			
	}
	
	public function dailytop_gainer_by_turnover_growth_data()
	{
	   $str = "SELECT * FROM (
			SELECT c.code,(((
			SELECT total_value FROM eod_stock 
			WHERE company_id=e.company_id 
			AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
			)-e.total_value)/(
			SELECT total_value FROM eod_stock 
			WHERE company_id=e.company_id 
			AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
			)) AS turnover_growth,(
			SELECT total_value FROM eod_stock 
			WHERE company_id=e.company_id 
			AND entry_date=(SELECT DISTINCT entry_date FROM eod_stock ORDER BY entry_date DESC LIMIT 1,1)
			) AS prev_total_val ,
			
			e.total_value AS cur_total_val,e.entry_date
			 FROM eod_stock AS e
			LEFT OUTER JOIN company AS c
			ON c.id=e.company_id	
			WHERE e.company_id AND e.entry_date=(SELECT MAX(entry_date) FROM eod_stock)) AS t	
			ORDER BY turnover_growth DESC LIMIT 10";
	   return $this->db->query($str)->result();
	}
	
	
	
}
?>