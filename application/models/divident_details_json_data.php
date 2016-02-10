<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Divident_details_json_data extends CI_Model 
{

    public function get_single_company_info($company_id , $year)
	{
	     $str = "select (annual_cash+annual_stock) as vl from dividend_info where 
		company_id='$company_id' and `year` in ($year)";
        return  $this->db->query($str)->result();	
		//return (float)$res[0]->vl;
	}
		
	
	
	public function get_years_of_single_company($company_id,$years)
	{
	    $str = "SELECT `year`,(`annual_stock`+`annual_cash`) as vl
		FROM `dividend_info` WHERE company_id=$company_id  AND YEAR IN($years)";
		$sql = $this->db->query($str)->result();
		//$sp = (float)$sql[0]->vl;
		
		return $sql;
	}
	
	
	
	public function get_single_sector_company_info($sector_id , $year)
	{
	     $str = "SELECT company_id,`year`,(SELECT `code` FROM company WHERE id=a.company_id) AS `code`,
				(annual_cash+annual_stock) AS vl FROM dividend_info AS a
				WHERE company_id IN(SELECT id FROM company WHERE sector_id=$sector_id)
				AND `year` IN ($year)";
        return  $this->db->query($str)->result();	
		//return (float)$res[0]->vl;
	}
	
	
	
	
	

    public function ty($years , $company_code)
	{
       $str = "SELECT `INTERIM_DIVIDEND_CASH`,`INTERIM_DIVIDEND_STOCK`,
		`FINAL_DIVIDEND_CASH`,`FINAL_DIVIDEND_STOCK` FROM `mkt_divident_info`
		WHERE company_code IN($company_code) AND YEAR IN($years)";
	   $res = $this->db->query($str)->result();	 
	   
	   return $res;
    }
	
	public function option_two_json_data($sector , $years)
	{
	    $str = "SELECT `COMPANY_CODE`,`YEAR`,`INTERIM_DIVIDEND_CASH`,`INTERIM_DIVIDEND_STOCK`,
		`FINAL_DIVIDEND_CASH`,`FINAL_DIVIDEND_STOCK`
		FROM `mkt_divident_info` WHERE 
			`COMPANY_CODE` IN(SELECT `CODE` FROM `company_basic_info`
			WHERE SECTOR='$sector') AND YEAR IN($years)"; 
		return $this->db->query($str)->result();		
	}
	
	
	
	public function option_three_json_data()
	{
	    $str = "SELECT `COMPANY_CODE`,`YEAR`,`INTERIM_DIVIDEND_CASH`,`INTERIM_DIVIDEND_STOCK`
				,`FINAL_DIVIDEND_CASH`,`FINAL_DIVIDEND_STOCK`
				FROM `mkt_divident_info` ";
		return $this->db->query($str)->result();		
	}
}
?>