<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capital_gain_data extends CI_Model 
{	 
    public function company_code_for_combo()
	{
	    $str = "SELECT 	`id`,`code`	FROM 
				`company` order by `code` asc";
		return $this->db->query($str)->result();
	}
	
	public function get_sectors()
	{
	    $str = "SELECT 	`sector_id`,`name`	FROM 
		`sector` order by `name` asc";
		return $this->db->query($str)->result();
	}
	
	public function first_search_data($start,$end,$companies)
	{
	    $str = "SELECT c.code,c.name, a.ltp AS begning_price, b.ltp AS endprice,
			d.interim_rec_date, d.interim_cash,d.interim_stock, 
			d1.annual_rec_date,d1.annual_cash,d1.annual_stock, 
			CAST(((b.ltp - a.ltp) / a.ltp * 100) AS DECIMAL(10, 2)) AS capital_gain
			FROM eod_stock AS a LEFT OUTER JOIN eod_stock AS b
			ON a.company_id = b.company_id LEFT OUTER JOIN company AS c
			ON c.ID = a.company_id LEFT OUTER JOIN dividend_info AS d
			ON c.ID = d.company_id AND d.interim_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			LEFT OUTER JOIN dividend_info AS d1 ON c.ID = d1.company_id AND d1.annual_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			WHERE a.entry_date = str_to_date('$start','%d-%m-%Y')
			AND b.entry_date = str_to_date('$end','%d-%m-%Y')
			AND a.company_id IN ($companies)";

        return $this->db->query($str)->result();
	}
	
	
	public function first_search_data_for_json($start,$end,$companies)
	{
	    $str = "SELECT c.code,CAST(((b.ltp - a.ltp) / a.ltp * 100) AS DECIMAL(10, 2)) AS capital_gain
			FROM eod_stock AS a LEFT OUTER JOIN eod_stock AS b
			ON a.company_id = b.company_id LEFT OUTER JOIN company AS c
			ON c.ID = a.company_id LEFT OUTER JOIN dividend_info AS d
			ON c.ID = d.company_id AND d.interim_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			LEFT OUTER JOIN dividend_info AS d1 ON c.ID = d1.company_id AND d1.annual_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			WHERE a.entry_date = str_to_date('$start','%d-%m-%Y')
			AND b.entry_date = str_to_date('$end','%d-%m-%Y')
			AND a.company_id IN ($companies)  ORDER BY capital_gain ASC";

        return $this->db->query($str)->result();
	}	
	
		
	public function second_search_data($start,$end,$sector)
	{
	    $str = "SELECT c.code,c.name, a.ltp as begning_price, b.ltp as endprice,
		d.interim_rec_date, d.interim_cash,d.interim_stock, 
		d1.annual_rec_date,d1.annual_cash,d1.annual_stock, 
		CAST(((b.ltp - a.ltp) / a.ltp * 100) AS DECIMAL(10, 2)) as capital_gain
		FROM eod_stock AS a LEFT OUTER JOIN eod_stock AS b
		ON a.company_id = b.company_id LEFT OUTER JOIN company AS c
		ON c.ID = a.company_id LEFT OUTER JOIN dividend_info AS d
		ON c.ID = d.company_id AND d.interim_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
		LEFT OUTER JOIN dividend_info AS d1 ON c.ID = d1.company_id AND d1.annual_rec_date BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
		WHERE a.entry_date = str_to_date('$start','%d-%m-%Y')
		AND b.entry_date = str_to_date('$end','%d-%m-%Y')
		AND c.sector_id IN ($sector) order by capital_gain asc";
		return $this->db->query($str)->result();		
	}
	
	
	
	
    public function get_end_price($date,$company_code)
	{
		$str = "SELECT `MKISTAT_CLOSE_PRICE` FROM mkt_eod 
			WHERE `MKISTAT_INSTRUMENT_CODE`='$company_code' 
			AND DATE_FORMAT(`MKISTAT_LM_DATE_TIME`,'%d-%m-%Y')='$date'";

		if( $this->db->query($str)->num_rows() <= 0 )
			return 0;		
		else
			$res = $this->db->query($str)->result();	
			return $res[0]->MKISTAT_CLOSE_PRICE;
	}
	
	
	public function third_search_data($start,$end)
	{
	    $str = "SELECT c.code,c.name, a.ltp as begning_price, 
			b.ltp as endprice,d.interim_rec_date, d.interim_cash,d.interim_stock, 
			d1.annual_rec_date,d1.annual_cash,d1.annual_stock, 
			CAST(((b.ltp - a.ltp) / a.ltp * 100) AS DECIMAL(10, 2)) as capital_gain
			FROM eod_stock AS a LEFT OUTER JOIN eod_stock AS b
			ON a.company_id = b.company_id LEFT OUTER JOIN company AS c
			ON c.ID = a.company_id LEFT OUTER JOIN dividend_info AS d
			ON c.ID = d.company_id AND d.interim_rec_date BETWEEN 
			str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			LEFT OUTER JOIN dividend_info AS d1 ON c.ID = d1.company_id AND d1.annual_rec_date 
			BETWEEN str_to_date('$start','%d-%m-%Y') AND str_to_date('$end','%d-%m-%Y')
			WHERE a.entry_date = str_to_date('$start','%d-%m-%Y')
			AND b.entry_date = str_to_date('$end','%d-%m-%Y') AND c.dsex IN (1) 
			order by capital_gain asc";
		
		return $this->db->query($str)->result();
	}
	
	public function third_search_json_data($start,$end)
	{
	    $str = "SELECT c.code,
				CAST(((b.ltp - a.ltp) / a.ltp * 100) AS DECIMAL(10, 2)) AS capital_gain
				FROM eod_stock AS a LEFT OUTER JOIN eod_stock AS b
				ON a.company_id = b.company_id LEFT OUTER JOIN company AS c
				ON c.ID = a.company_id LEFT OUTER JOIN dividend_info AS d
				ON c.ID = d.company_id AND d.interim_rec_date BETWEEN 
				STR_TO_DATE('$start','%d-%m-%Y') AND STR_TO_DATE('$end','%d-%m-%Y')
				LEFT OUTER JOIN dividend_info AS d1 ON c.ID = d1.company_id AND d1.annual_rec_date 
				BETWEEN STR_TO_DATE('$start','%d-%m-%Y') AND STR_TO_DATE('$end','%d-%m-%Y')
				WHERE a.entry_date = STR_TO_DATE('$start','%d-%m-%Y')
				AND b.entry_date = STR_TO_DATE('$end','%d-%m-%Y') AND c.dsex IN (1) 
				ORDER BY capital_gain ASC";
		return $this->db->query($str)->result();		
	}
	
}
?>	