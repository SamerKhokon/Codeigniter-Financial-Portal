<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dailytop_looser_data extends CI_Model 
{
	
	public function dailytop_looser_by_price()
	{
	   $str = "SELECT c.code,e.ycp,e.ltp,
		CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes
		 FROM eod_stock AS e LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
		ORDER BY changes ASC
		LIMIT 0,10";
		return $this->db->query($str)->result();
	}	
	
	public function dailytop_looser_by_percent_change()
	{
	    $str = "SELECT c.code,e.ycp,
		CAST(((e.ltp-e.ycp)/e.ycp)*100 AS DECIMAL(10,2)) AS changes
		 FROM eod_stock AS e LEFT OUTER JOIN company AS c
		ON c.ID = e.company_id
		WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
		ORDER BY changes ASC
		LIMIT 0,10";
	  return $this->db->query($str)->result();	
	}
	
    public function dailytop_looser_by_volume_data()
	{
		$str = "SELECT c.code,total_volume as volume
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY volume ASC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}
	
    public function dailytop_looser_by_no_of_trades_data()
	{
		$str = "SELECT c.code,total_trade
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY total_trade ASC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}	
	
	
    public function dailytop_looser_by_value_data()
	{
		$str = "SELECT c.code,
			total_value as turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY turnover ASC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}		
	
    public function dailytop_looser_by_turnover_data()
	{
		$str = "SELECT c.code,total_value as turnover
			 FROM eod_stock AS e LEFT OUTER JOIN company AS c
			ON c.ID = e.company_id
			WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
			ORDER BY turnover ASC
			LIMIT 0,10";
		return $this->db->query($str)->result();
	}			
	
	
	
    public function dailytop_looser_by_pe_data()
	{
		$str = "";
		return $this->db->query($str)->result();
	}		

    public function dailytop_looser_by_eps_data()
	{
	    $str = " ";
	
		return $this->db->query($str)->result();			
	}	
	
	public function dailytop_looser_by_marketcap_data()
	{
		$str = "SELECT * FROM (SELECT c.code,
				(SELECT total_share FROM share_percentage WHERE company_id = c.code) - e.ltp AS mcap
				 FROM eod_stock AS e LEFT OUTER JOIN company AS c
				ON c.ID = e.company_id
				WHERE e.company_id AND e.entry_date = (SELECT MAX(entry_date) FROM eod_stock) 
				) AS t WHERE mcap>=0 ORDER BY mcap ASC
				LIMIT 0,10";
					
		return $this->db->query($str)->result();				
	}
	
	
	public function dailytop_looser_by_turnover_growth_data()
	{
	    $str  = "SELECT * FROM (
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
			e.total_value AS cur_total_val,
			e.entry_date
			 FROM eod_stock AS e
			LEFT OUTER JOIN company AS c
			ON c.id=e.company_id	
			WHERE e.company_id AND e.entry_date=(SELECT MAX(entry_date) FROM eod_stock)) AS t	
			ORDER BY turnover_growth ASC LIMIT 10";
		return $this->db->query($str)->result();	
	}
}
?>