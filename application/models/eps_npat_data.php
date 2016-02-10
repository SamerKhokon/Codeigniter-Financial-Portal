<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Eps_npat_data extends CI_Model 
{	
    public function get_sectors()
	{
	    $str = "SELECT id,CODE FROM 
				`company` ORDER BY CODE ASC";
		$res = $this->db->query($str)->result();		
		return $res;
	}
	
	public function share_distribution_data($company_id)
	{
	    $str = "SELECT  `SPONSOR`,`GOVT`,`INSTITUTE`,`FOREIGN_SHARE`,`PUBLIC` as `PUBLICS`
				FROM `share_percentage` WHERE 
				company_id='$company_id'";
	  
	    $res = $this->db->query($str)->result();
		return $res[0]->SPONSOR .'#'. $res[0]->GOVT .'#'. $res[0]->INSTITUTE 
		.'#'. $res[0]->FOREIGN_SHARE  .'#'. $res[0]->PUBLICS;
	}
	
	public function scope_to_pay_divident_data($company_id)
	{			
		/*$str = "SELECT MARKET_CAP,
			((SELECT PAIDUP_CAP  FROM `mkt_paidup_cap_info` WHERE company_id='$company_id' ORDER BY ID DESC LIMIT 1)/
			(SELECT `AUTHORIZED_CAP`  FROM `mkt_share_info` WHERE company_id='$company_id' ORDER BY ID DESC LIMIT 1))*100 AS NPAID_UP
			,100-(((SELECT PAIDUP_CAP  FROM `mkt_paidup_cap_info` WHERE company_id='$company_id' ORDER BY ID DESC LIMIT 1)/
			(SELECT `AUTHORIZED_CAP`  FROM `mkt_share_info` WHERE company_id='$company_id' ORDER BY ID DESC LIMIT 1))*100) AS SCOPE
			FROM `mkt_share_info` WHERE company_id='$company_id'
			ORDER BY ID DESC LIMIT 1";*/
	    
		  $str =	"SELECT ((paidup_capital/authorized_capital)*100) AS paidup ,
			(100 - ((paidup_capital/authorized_capital)*100)) AS scope
			FROM  capital  AS t WHERE company_id=$company_id";
	  
	  
	    $res = $this->db->query($str)->result();
		return $res[0]->paidup  .'#'.  $res[0]->scope;
	}
	
	
	
	
	
	public function eps_continuing_years_data($company_id)
	{
	    //$company_code = "ACI";
	    $str = "SELECT `eps_year` FROM 
				`eps_continuing`
				WHERE company_id='$company_id'";
		return  $this->db->query($str)->result();		
	}
		
	
	public function eps_continuing_first_quarter_data($company_id)
	{
	    //$company_code = "ACI";
	    $str = "SELECT `q1`,`q2`,`q3`,`q4` FROM 
				`eps_continuing`
				WHERE company_id='$company_id'";
		return  $this->db->query($str)->result();		
	}	
	
	public function eps_continuing_all_quarter_data($company_code)
	{
	    //$company_code = "ACI";
	    $str = "SELECT `q1`,`q2`,
				`q3`,`q4` FROM 
				`eps_continuing`
				WHERE company_id='$company_code'";
		return  $this->db->query($str)->result();
	}
	
	
	public function yearly_eps_data($company_code)
	{
		//$company_code = "ACI";
		$str = "SELECT `eps_year`,`q4` FROM `eps_continuing`
				WHERE company_id='$company_code'";
				
		return $this->db->query($str)->result();		
	}
	
	
	
	
	public function net_profit_year_continuing_data($company_code)
	{  
	    //$company_code = "ACI";
	    $str = "SELECT `eps_year` FROM 
		`eps_continuing`
		WHERE company_id='$company_code'";
		return  $this->db->query($str)->result();
	}
	
	
	
	
	public function net_profit_first_quarter_continuing_data($company_code)
	{
		//$company_code = "ACI";
	    $str = "SELECT `q1`,`q2`,`q3`,`q4` FROM 
				`eps_continuing`
				WHERE company_id='$company_code'";
		return  $this->db->query($str)->result();	
	}
	
	public function net_profit_all_quarter_continuing_data($company_code)
	{
		//$company_code = "ACI";
	    $str = "SELECT `q1`,`q2`,`q3`,`q4` FROM 
			`eps_continuing`
			WHERE company_id='$company_code'";
		return  $this->db->query($str)->result();	
	}	
	
	
	
	
	
	
	
	public function yearly_nav_data($company_code)
	{
	    //$company_code = "ACI";
	    $str = "SELECT `YEAR` FROM 
		`mkt_company_gen_fin_info`
		WHERE COMPANY_CODE='$company_code'";
		
		return  $this->db->query($str)->result();	
	}
	
	
	public function yearly_nav_shares_data($company_code)
	{
	   // $company_code = "ACI";
	    $str = "SELECT NAV_PERSHARE FROM 
		`mkt_company_gen_fin_info`
		WHERE COMPANY_CODE='$company_code'";
		
		return  $this->db->query($str)->result();	
	}	
	
}
?>