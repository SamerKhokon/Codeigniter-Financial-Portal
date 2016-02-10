<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mutual_fund_data extends CI_Model 
{

    public function get_companies()
	{
		$str = "SELECT id,`code` FROM `company` 
			WHERE sector_id IN(SELECT sector_id FROM sector WHERE 
			`name`='Mutual Funds')";
		return $this->db->query($str)->result();
	}

    public function mutual_fund_performance_data()
    {
        $str = "SELECT `code`,
			(SELECT ltp FROM eod_stock WHERE company_id=n.`company_id` ORDER BY entry_date DESC LIMIT 1) AS ltp ,
			`nav_mpb`,`nav_cpb` ,

			((SELECT ltp FROM eod_stock WHERE company_id=n.`company_id` ORDER BY entry_date DESC LIMIT 1)/`nav_mpb`) AS price_to_nav ,
			(`nav_mpb`/`nav_cpb`) AS nav_market_value ,

			(((SELECT `nav_mpb` FROM nav_sample_data WHERE company_id=n.company_id ORDER BY `entry_date` DESC LIMIT 1)-
			(SELECT `nav_mpb` FROM nav_sample_data WHERE company_id=n.company_id AND n.`entry_date`<entry_date ORDER BY entry_date DESC LIMIT 1,1))/
			(SELECT `nav_mpb` FROM nav_sample_data WHERE company_id=n.company_id AND n.`entry_date`<entry_date ORDER BY entry_date DESC LIMIT 1,1))*100 AS weekly_portfolio,

			(((SELECT ltp FROM eod_stock WHERE company_id=n.`company_id` ORDER BY entry_date DESC LIMIT 1)-
			(SELECT ltp FROM eod_stock WHERE company_id=n.company_id ORDER BY entry_date DESC LIMIT 5,1))/
			(SELECT ltp FROM eod_stock WHERE company_id=n.company_id ORDER BY entry_date DESC LIMIT 5,1))*100 AS weekly_change ,
			(SELECT listing_year FROM company WHERE id=n.company_id LIMIT 1) AS listing_year
			 
			FROM `nav_sample_data` AS n limit 41";		
		return $this->db->query($str)->result();
    }


    public function nav_graph_two_lines($company_id)
    {
		$str = "SELECT `publish_date`,`nav_mpb`,`nav_cpb`
			FROM `nav_sample_data` AS n WHERE publish_date BETWEEN
			(SELECT DATE_SUB((SELECT MAX(publish_date) FROM `nav_sample_data`),INTERVAL 1 YEAR))
			AND (SELECT MAX(publish_date) FROM `nav_sample_data`)
			AND company_id=$company_id ORDER BY entry_date DESC";
		return $this->db->query($str)->result();	
    }
   
   
    public function nav_graph_ltp_lines($company_id)
    {
        $str = "SELECT `entry_date`,`ltp` FROM eod_stock WHERE 
		company_id=$company_id AND entry_date BETWEEN
		(SELECT DATE_SUB((SELECT MAX(entry_date) FROM eod_stock),INTERVAL 3 MONTH)) AND
		(SELECT MAX(entry_date) FROM eod_stock)";
		return $this->db->query($str)->result();
    }
	
	
	
	public function nav_mutual_fund_datas()
	{
	
	
	    /*
	    $str = "SELECT `code`,`ytp`,
			((cur_mpb-prev_7day_mpv)/prev_7day_mpv)*100 AS mpb7m,
			((cur_mpb-prev_1month_mpv)/prev_1month_mpv)*100 AS mpb1m,
			((cur_mpb-prev_3month_mpv)/prev_3month_mpv)*100 AS mpb3m,
			((cur_mpb-prev_6month_mpv)/prev_6month_mpv)*100 AS mpb6m,
			((cur_mpb-prev_1year_mpv)/prev_1year_mpv)*100 AS mpb1y,
			((cur_mpb-prev_2year_mpv)/prev_2year_mpv)*100 AS mpb2y ,
			((cur_mpb-prev_3year_mpv)/prev_3year_mpv)*100 AS mpb3y 
			 FROM (
			SELECT company_id,
			(SELECT `code` FROM company WHERE id=n.company_id) AS `code`
			,`nav_mpb`,`nav_cpb`,

			(SELECT ltp FROM eod_stock WHERE company_id=n.company_id ORDER BY entry_date DESC LIMIT 1,1) AS ytp ,

			(SELECT `nav_mpb` FROM `nav_sample_data` WHERE 
			company_id=n.`company_id` AND publish_date=(SELECT MAX(publish_date) FROM `nav_sample_data`)) AS cur_mpb ,

			(SELECT MAX(publish_date) FROM `nav_sample_data`) AS max_date ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 7 DAY))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_7day_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 6 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_6month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1year_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 2 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_2year_mpv  ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3year_mpv 

			 FROM nav_sample_data AS n  LIMIT 41) AS nav_data";*/
			 
			 
			$str = "SELECT `code`,((`cur_ytp`-`last_ytp`)/`last_ytp`)*100 AS `ytp`,
			((cur_mpb-prev_7day_mpv)/prev_7day_mpv)*100 AS mpb7m,
			((cur_mpb-prev_1month_mpv)/prev_1month_mpv)*100 AS mpb1m,
			((cur_mpb-prev_3month_mpv)/prev_3month_mpv)*100 AS mpb3m,
			((cur_mpb-prev_6month_mpv)/prev_6month_mpv)*100 AS mpb6m,
			((cur_mpb-prev_1year_mpv)/prev_1year_mpv)*100 AS mpb1y,
			((cur_mpb-prev_2year_mpv)/prev_2year_mpv)*100 AS mpb2y ,
			((cur_mpb-prev_3year_mpv)/prev_3year_mpv)*100 AS mpb3y 
			 FROM (
			SELECT company_id,
			(SELECT `code` FROM company WHERE id=n.company_id) AS `code`
			,`nav_mpb`,`nav_cpb`,

			(SELECT ltp FROM eod_stock WHERE company_id=n.company_id ORDER BY entry_date DESC LIMIT 1) AS cur_ytp ,
			(SELECT ltp FROM eod_stock WHERE company_id=n.company_id AND DATE_FORMAT(entry_date,'%Y')=DATE_FORMAT(NOW(),'%Y') ORDER BY entry_date ASC LIMIT 1) AS last_ytp ,

			(SELECT `nav_mpb` FROM `nav_sample_data` WHERE 
			company_id=n.`company_id` AND publish_date=(SELECT MAX(publish_date) FROM `nav_sample_data`)) AS cur_mpb ,

			(SELECT MAX(publish_date) FROM `nav_sample_data`) AS max_date ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 7 DAY))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_7day_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 6 MONTH))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_6month_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 1 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_1year_mpv ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 2 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_2year_mpv  ,

			(SELECT nav_mpb FROM `nav_sample_data`
			 WHERE company_id=n.company_id AND
			  publish_date=(SELECT DISTINCT publish_date FROM `nav_sample_data` WHERE publish_date BETWEEN 
			(SELECT DATE_SUB((SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`),INTERVAL 3 YEAR))
			AND (SELECT MAX(DISTINCT publish_date) FROM `nav_sample_data`) LIMIT 1)) AS prev_3year_mpv 

			 FROM nav_sample_data AS n  LIMIT 41) AS nav_data"; 
			 
		return $this->db->query($str)->result();	 
	}
   
}
?>