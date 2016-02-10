<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Volatality_data extends CI_Model 
{


    public function all_dates_in_range($start,$end,$company_id)
	{
	    $str = "SELECT DISTINCT entry_date FROM `eod_stock`
			WHERE company_id=$company_id and
			entry_date BETWEEN str_to_date('$start','%d-%m-%Y') 
			AND str_to_date('$end','%d-%m-%Y')";
		return $this->db->query($str)->result();	
	}

	
	public function volatality_standard_deviation($start_date,$end_date  ,$company_id)
	{
	     $str = "SELECT STDDEV(total_ltp) as sdv FROM (
			SELECT  SUM(ltp) AS total_ltp FROM 
			`eod_stock` WHERE entry_date BETWEEN  
			STR_TO_DATE('$start_date' , '%Y-%m-%d') AND
			STR_TO_DATE('$end_date' , '%Y-%m-%d')
			AND company_id=$company_id GROUP BY entry_date) AS stv";
	    $res = $this->db->query($str)->result();
		return (float)$res[0]->sdv;
	}

	
	
	
    public function get_standard_deviation($date , $company_id, $indicating_days)
	{
	    $str = "SELECT  STDDEV(total_val) AS sdv FROM 
			(SELECT  entry_date,SUM(ltp) AS total_val FROM 
			`eod_stock` WHERE entry_date <= 
			STR_TO_DATE('$date','%Y-%m-%d')
			AND company_id=$company_id
			GROUP BY entry_date) AS t ORDER BY 
			entry_date DESC LIMIT $indicating_days";
		$res = $this->db->query($str)->result();
        return (float)$res[0]->sdv;		
	}

	
	
	
    public function get_all_numbers($start_date,$end_date,$codes)
	{
	   $str = "SELECT Close_Price FROM `test_eod`
				WHERE company_code = '$codes' AND 
				DATE_FORMAT(`Trade_Date`,'%Y-%m-%d') 
				BETWEEN '$start_date' AND '$end_date'";
	   $res = $this->db->query($str)->result();
	   return $res;
	}
   
    public function get_total_numbers($start_date,$end_date,$codes)
	{
	   $str = "SELECT COUNT(*) TOTAL_NUMBERS FROM `test_eod`
				WHERE company_code = '$codes' AND 
				DATE_FORMAT(`Trade_Date`,'%Y-%m-%d')  
				BETWEEN '$start_date' AND '$end_date'";
	   $res = $this->db->query($str)->result();
	   return $res[0]->TOTAL_NUMBERS;
	}
	
	public function get_sum($start_date,$end_date,$codes)
    {
		$str = "SELECT SUM(Close_Price)  SUMMATION FROM `test_eod`
				WHERE company_code = '$codes' AND
				DATE_FORMAT(`Trade_Date`,'%Y-%m-%d') 
				BETWEEN '$start_date' AND '$end_date'";
	   $res = $this->db->query($str)->result();
	   return $res[0]->SUMMATION;
	   //return $str; 
	}
	
	public function get_dates($beg,$end,$code)
	{
	    $beg = date("Y-m-d" , strtotime($beg));
		$end = date("Y-m-d" , strtotime($end));
		
	    $str = "SELECT DISTINCT date_form(Trade_Date,'%Y-%m-%d') Trade_Date,
		DATE_FORMAT(Trade_Date,'%W') AS days FROM `test_eod`
				WHERE company_code='$code' AND
				DATE_FORMAT(`Trade_Date`,'%Y-%m-%d') as Trade_Date
				BETWEEN '".$beg."' AND '".$end."'
					AND (DATE_FORMAT(Trade_Date,'%W')!='Friday' 
					AND DATE_FORMAT(Trade_Date,'%W')!='Saturday')  
				ORDER BY Trade_Date ASC";
				
		return $this->db->query($str)->result();		
	}
	
}
?>	