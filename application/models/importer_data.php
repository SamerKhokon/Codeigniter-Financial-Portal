<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Importer_data extends CI_Model 
{
	
	public function is_company_basic_info_exist($company_code)
	{
	   $str = "SELECT * COUNTER FROM `company_basic_info` 
		WHERE CODE='$company_code'";
		$res = $this->db->query($str)->result();
		$c = $res->num_rows();
		return $c;
	}
	
	
	public function company_basic_info_data_insert_by_importer(
		$CODE,$NAME,$FACE_VALUE,$CATEGORY,$ELECTRONIC,$MARKET_LOT,
		$LOW_52WEEKS,$SECTOR,$LISTING_YEAR,$YEAR_END)
	{
		$basic_str = "INSERT INTO `company_basic_info`( 
		`CODE`,`NAME`,`FACE_VALUE`,`CATEGORY`,`ELECTRONIC`,`MARKET_LOT`, 
		`_52WEEK_RANGE`,`SECTOR`,`LISTING_YEAR`,`YEAR_END`,`CREATION_DATE`) 
		VALUES('$CODE','$NAME','$FACE_VALUE',
		'$CATEGORY','$ELECTRONIC','$MARKET_LOT','$LOW_52WEEKS',
		'$SECTOR','$LISTING_YEAR','$YEAR_END',NOW())";
	
		$this->db->query($basic_str);   
		return 1;
	}
   
   
   
    public function pe_info_data_insert_by_importer($CODE,$PE)
    {        
		$pe_str = "INSERT INTO `mkt_pe_info` 
		(`COMPANY_CODE`, `PE`, `CREATION_DATE`)
		VALUES('$CODE','$PE', NOW())";
		$this->db->query($pe_str);
		return 1;	
    }
   
   
    public function share_info_data_insert_by_importer(
		$CODE,$TOTAL_SHARE,$MARKET_CAP,$AUTHORIZED_CAP,
		$SPONSOR,$GOVT,$INSTITUTE,$SPONSOR,$GOVT,
		$INSTITUTE,$FOREIGN,$PUBLIC,$RESERVE_SURPLUS)
    {
		$share_str = "INSERT INTO `mkt_share_info`
		(`COMPANY_CODE`,`TOTAL_SHARE`, `MARKET_CAP`,
		`AUTHORIZED_CAP`,`SPONSOR`,`GOVT`,`INSTITUTE`,`FOREIGN`, 
		`PUBLIC`,`RESERVE_SURPLUS`,`CREATION_DATE`) 
		VALUES('$CODE','$TOTAL_SHARE','$MARKET_CAP','$AUTHORIZED_CAP',
		'$SPONSOR','$GOVT','$INSTITUTE',
		'$FOREIGN','$PUBLIC','$RESERVE_SURPLUS',NOW())";
		$this->db->query($share_str);
		return 1;
    }
   
   
	public function agm_info_data_insert_by_importer($CODE, $LAST_AGM)
	{
		$agm_str = "INSERT INTO `mkt_agm_info` 
		(`COMPANY_CODE`,`LAST_AGM`,`CREATION_DATE`)
		VALUES('$CODE', '$LAST_AGM', NOW());";
		$this->db->query($agm_str);
		return 1;
	}
	
	
	public function paidup_cap_info_data_insert_by_importer($CODE,$PAIDUP_CAP)
	{
	    $paidup_cap_str = "INSERT INTO `mkt_paidup_cap_info` 
				(`COMPANY_CODE`,`PAIDUP_CAP`, `CREATION_DATE`)
				VALUES('$CODE','$PAIDUP_CAP',NOW())";
				
		$this->db->query($paidup_cap_str);
		return 1;
	}
}
?>