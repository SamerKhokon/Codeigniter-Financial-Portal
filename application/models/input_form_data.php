<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input_form_data extends CI_Model 
{	


   
  


	public function get_last_day_turnover($company_code)
	{
	    $str = "SELECT Turnover FROM test_eod 
					where company_code='$company_code'
					ORDER BY id DESC LIMIT 1 ";
		$res = $this->db->query($str)->result();
        if($this->db->query($str)->num_rows()>0)
           return $res[0]->Turnover;	
		else 
		   return 0;
	}
	
	public function get_current_day_turnover($company_code)
	{
	    $str = "SELECT Turnover FROM  v_instrument_trade_status_web
		          where company_code='$company_code'
					ORDER BY id DESC LIMIT 1 ";
		$res = $this->db->query($str)->result();
		if($this->db->query($str)->num_rows()>0)
        return $res[0]->Turnover;	
		else 
		return 0;
	}
	
	
	
	public function get_last_audited_eps($company_code)
	{
	    $str = "SELECT `ANNUALIZED_EPS`,`YEAR`,
				`COMPANY_CODE`
			 FROM `mkt_company_gen_fin_info` 
			WHERE company_code='$company_code' 
			  ORDER BY YEAR DESC LIMIT 1,1";
		$res = $this->db->query($str)->result();
		
		if($this->db->query($str)->num_rows()>0)
			return $res[0]->ANNUALIZED_EPS;
		else
			return 0;	  
	}
	
	public function get_anualized_eps($company_code)
	{
	    $str = "SELECT `ANNUALIZED_EPS`,YEAR,id
			FROM `mkt_company_gen_fin_info`
			WHERE `COMPANY_CODE`='$company_code' 
			ORDER BY id DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		
		if($this->db->query($str)->num_rows()>0)
			return $res[0]->ANNUALIZED_EPS;
		else
			return 0;
	}	
	
	
	
	
	public function get_last_trade_price()
	{
	   $str = "SELECT last_traded_price FROM 
					`v_instrument_trade_status_web`
					ORDER BY id DESC LIMIT 1";
		$res = $this->db->query($str)->result();
        return $res[0]->last_traded_price;		
	}
	
	public function get_last_update_datetime($company_code)
	{
	   $str = " SELECT LAST_UPDATE_DATE FROM 
			`company_basic_info` WHERE 
			CODE='$company_code' LIMIT 1";
		$res = $this->db->query($str)->result();	
		
		if( $this->db->query($str)->num_rows() > 0 )		
		return   $res[0]->LAST_UPDATE_DATE;
		else
		return   "";
	}
	
	
	public function get_paidup_info($company_code)
	{
	  $str = "SELECT PAIDUP_CAP FROM `mkt_paidup_cap_info`
			WHERE COMPANY_CODE='$company_code' 
			ORDER BY ID DESC LIMIT 1";
	  $res = $this->db->query($str)->result();
	  return $res[0]->PAIDUP_CAP;
	}
	
	public function get_divident_info($company_code)
	{
		$str = "SELECT `INTERIM_DIVIDEND_DECLARATION_DATE`,
			`FINAL_DIVIDEND_DECLARATION_DATE`,`AGM_DATE` 
			FROM `mkt_divident_info`
			WHERE company_code='$company_code'
			ORDER BY ID DESC LIMIT 1";
		$res = $this->db->query($str)->result();
		return $res[0]->INTERIM_DIVIDEND_DECLARATION_DATE .'#'.
		$res[0]->FINAL_DIVIDEND_DECLARATION_DATE  .'#'.
		$res[0]->AGM_DATE;
		
	}
	
	
	public function get_share_info($company_code)
	{
	    $str = "SELECT`TOTAL_SHARE`,`MARKET_CAP`,`SPONSOR`
			FROM `mkt_share_info` WHERE company_code='$company_code'";
		$res = $this->db->query($str)->result();		
		return $res[0]->TOTAL_SHARE .'#'. $res[0]->MARKET_CAP 
		.'#'. $res[0]->SPONSOR;
	}	
	
    public function get_sectors()
	{
	    $str = "SELECT DISTINCT SECTOR FROM `company_basic_info` 
				ORDER BY sector ASC";
		return $this->db->query($str)->result();
	}

    public function divident_edit($company_code,$txtDividentYear_val ,
		$txtDividentRightOld_val , $txtDividentRightNew_val ,
		$txtDividentRightDeclareDate_val,	$txtDividentRightRecordDate_val  ,				
		$txtDividentInterimCash_val,	$txtDividentInterimStock_val,
		$txtDividentInterimDeclareDate_val,	$txtDividentInterimRecordDate_val,
		$txtDividentFinalCash_val  , $txtDividentFinalStock_val  ,				
		$txtDividentFinalDeclareDate_val, $txtDividentFinalRecordDate_val ,
		$txtDividentFinalAgmDate_val , $txtDividentFinalEgmDate_val , $rowid)
	{
	    $str = "UPDATE `mkt_divident_info` 
				SET 
				`YEAR` = '$txtDividentYear_val' , 
				`RIGHT_OLD` = '$txtDividentRightOld_val' , 
				`RIGHT_NEW` = '$txtDividentRightNew_val' , 
				`RIGHT_DECLARATION_DATE` = '$txtDividentRightDeclareDate_val' , 
				`RIGHT_RECORD_DATE` = '$txtDividentRightRecordDate_val' , 
				`INTERIM_DIVIDEND_CASH` = '$txtDividentInterimCash_val' , 
				`INTERIM_DIVIDEND_STOCK` = '$txtDividentInterimStock_val' , 
				`INTERIM_DIVIDEND_DECLARATION_DATE` = '$txtDividentInterimDeclareDate_val' , 
				`INTERIM_DIVIDEND_RECORD_DATE` = '$txtDividentInterimRecordDate_val' , 
				`FINAL_DIVIDEND_CASH` = '$txtDividentFinalCash_val' , 
				`FINAL_DIVIDEND_STOCK` = '$txtDividentFinalStock_val' , 
				`FINAL_DIVIDEND_DECLARATION_DATE` = '$txtDividentFinalDeclareDate_val' , 
				`FINAL_DIVIDEND_RECORD_DATE` = '$txtDividentFinalRecordDate_val' , 
				`EGM_DATE` = '$txtDividentFinalAgmDate_val' , 
				`AGM_DATE` = '$txtDividentFinalEgmDate_val' , 
				`CREATION_DATE` = NOW() 
				WHERE
				`ID` = '$rowid' AND `COMPANY_CODE` = '$company_code'";
				$this->db->query($str);
		return  1;
	}	
		
	public function gen_finedit_data_insert($company_code,
		$txtGenFinYear_val,$txtGenFinPerShare_val,$txtGenFinPerSahreRestated_val
		,$txtGenFinReserve_val,$txtGenFinAnualizedEPS_val,$rowid)
	{
	    $str = "UPDATE `mkt_company_gen_fin_info` 
			SET
			`YEAR` = '$txtGenFinYear_val' , 
			`NAV_PERSHARE` = '$txtGenFinPerShare_val' , 
			`NAV_PERSHARE_RESTATED` = '$txtGenFinPerSahreRestated_val' , 
			`RESERVE` = '$txtGenFinReserve_val' , 
			`ANNUALIZED_EPS` = '$txtGenFinAnualizedEPS_val' , 
			`CREATION_DATE` = NOW()
			WHERE
			`ID` = '$rowid' AND `COMPANY_CODE` = '$company_code'";
		$this->db->query($str);	
	   return  1;
	   
	}	
	 
	public function turnover_edit_data_insert($company_code,
		$txtTurnoverYear_val,
		$txtQ1_3M_val,$txtQ2_3M_val,$txtQ2_6M_val,		
		$txtQ3_3M_val,$txtQ3_9M_val,$txtQ4_3M_val,$txtQ4_12M_val,
		$rowid)
	{
	    $str  = "UPDATE `mkt_company_turnover_info` SET		 
			`YEAR` = '$txtTurnoverYear_val' ,
			`QUARTER_1_3M` = '$txtQ1_3M_val' , 
			`QUARTER_2_3M` = '$txtQ2_3M_val' , 
			`QUARTER_2_6M` = '$txtQ2_6M_val' , 
			`QUARTER_3_3M` = '$txtQ3_3M_val' , 
			`QUARTER_3_9M` = '$txtQ3_9M_val' , 
			`QUARTER_4_3M` = '$txtQ4_3M_val' , 
			`QUARTER_4_12M` = '$txtQ4_12M_val' , 
			`CREATION_DATE` = NOW() 
			WHERE `ID` = '$rowid' AND 
			`COMPANY_CODE` = '$company_code'";
		$this->db->query($str);
		return 1;
	}	

	
	public function npat_continuing_edit_data_update($company_code,
		$txtNpat1Year_val,$txtNpat1Q1_3M_val,
		$txtNpat1Q2_3M_val,$txtNpat1Q2_6M_val,		
		$txtNpat1Q3_3M_val,$txtNpat1Q3_9M_val,
		$txtNpat1Q4_3M_val,$txtNpat1Q4_12M_val,
		$rowid)
	{
	    $str  = "UPDATE `mkt_net_profit_after_tax_continuing_operation_info` 
			SET
			`YEAR` = '$txtNpat1Year_val' , 
			`QUARTER_1_3M` = '$txtNpat1Q1_3M_val' , 
			`QUARTER_2_3M` = '$txtNpat1Q2_3M_val' , 
			`QUARTER_2_6M` = '$txtNpat1Q2_6M_val' , 
			`QUARTER_3_3M` = '$txtNpat1Q3_3M_val' , 
			`QUARTER_3_9M` = '$txtNpat1Q3_9M_val' , 
			`QUARTER_4_3M` = '$txtNpat1Q4_3M_val' , 
			`QUARTER_4_12M` = '$txtNpat1Q4_12M_val' , 
			`CREATION_DATE` = NOW()	
				WHERE `ID` = '$rowid' AND 	
			`COMPANY_CODE` = '$company_code'";
		$this->db->query($str);
		return 1;
	}	
	
	
	public function npat_extra_continuing_edit_data_update($company_code,
		$txtNpatExtra1Year_val,$txtNpat1Q1_3M_val,
		$txtNpatExtra1Q2_3M_val,$txtNpatExtra1Q2_6M_val,		
		$txtNpatExtra1Q3_3M_val,$txtNpatExtra1Q3_9M_val,
		$txtNpatExtra1Q4_3M_val,$txtNpatExtra1Q4_12M_val,
		$rowid)
	{
	    $str  = "UPDATE `mkt_net_profit_after_tax_including_exordinary_income_info` 
				SET	
				`YEAR` = '$txtNpatExtra1Year_val' , 
				`QUARTER_1_3M` = '$txtNpat1Q1_3M_val' , 
				`QUARTER_2_3M` = '$txtNpatExtra1Q2_3M_val' , 
				`QUARTER_2_6M` = '$txtNpatExtra1Q2_6M_val' , 
				`QUARTER_3_3M` = '$txtNpatExtra1Q3_3M_val' , 
				`QUARTER_3_9M` = '$txtNpatExtra1Q3_9M_val' , 
				`QUARTER_4_3M` = '$txtNpatExtra1Q4_3M_val' , 
				`QUARTER_4_12M` = '$txtNpatExtra1Q4_12M_val' , 
				`CREATION_DATE` = NOW() 
				WHERE
				`ID` = '$rowid' AND 
				`COMPANY_CODE` = '$company_code'";
		$this->db->query($str);
		return $str;
	}	
	
	public function eps_continuing_edit_data_update($company_code,
		$txtEpsYear_val,$txtEpsQ1_3M_val,
		$txtEpsQ2_3M_val,$txtEpsQ2_6M_val,		
		$txtEpsQ3_3M_val,$txtEpsQ3_9M_val,
		$txtEpsQ4_3M_val,$txtEpsQ4_12M_val,
		$rowid)
	{
	    $str = "UPDATE `mkt_eps_continuing_operation_info` 
				SET	
				`YEAR` = '$txtEpsYear_val' , 
				`QUARTER_1_3M` = '$txtEpsQ1_3M_val' , 
				`QUARTER_2_3M` = '$txtEpsQ2_3M_val' , 
				`QUARTER_2_6M` = '$txtEpsQ2_6M_val' , 
				`QUARTER_3_3M` = '$txtEpsQ3_3M_val' , 
				`QUARTER_3_9M` = '$txtEpsQ3_9M_val' , 
				`QUARTER_4_3M` = '$txtEpsQ4_3M_val' , 
				`QUARTER_4_12M` = '$txtEpsQ4_12M_val' , 
				`CREATION_DATE` = NOW()
				WHERE `ID` = '$rowid' AND `COMPANY_CODE` = '$company_code'";
		$this->db->query($str);		
	    return 1; 
	}	
	
	
	public function diluted_eps_continuing_edit_data_update($company_code,
		$txtDilutedEpsYear_val,
		$txtDilutedEpsQ1_3M_val,
		$txtDilutedEpsQ2_3M_val,
		$txtDilutedEpsQ2_6M_val,		
		$txtDilutedEpsQ3_3M_val,
		$txtDilutedEpsQ3_9M_val,
		$txtDilutedEpsQ4_3M_val,
		$txtDilutedEpsQ4_12M_val,
		$rowid)
	{
	    $str = "UPDATE `mkt_eps_diluted_continuing_operation_info` 
			SET
			`YEAR` = '$txtDilutedEpsYear_val' , 
			`QUARTER_1_3M` = '$txtDilutedEpsQ1_3M_val' , 
			`QUARTER_2_3M` = '$txtDilutedEpsQ2_3M_val' , 
			`QUARTER_2_6M` = '$txtDilutedEpsQ2_6M_val' , 
			`QUARTER_3_3M` = '$txtDilutedEpsQ3_3M_val' , 
			`QUARTER_3_9M` = '$txtDilutedEpsQ3_9M_val' , 
			`QUARTER_4_3M` = '$txtDilutedEpsQ4_3M_val' , 
			`QUARTER_4_12M` = '$txtDilutedEpsQ4_12M_val' , 
			`CREATION_DATE` = NOW()	
			 WHERE `ID` = '$rowid' AND
			 `COMPANY_CODE` = '$company_code'";
		$this->db->query($str);		
	    return 1; 
	}
	
	
	public function diluted_eps_extra_continuing_edit_data_update($company_code,
		$txtDilutedEpsExtraYear_val,$txtDilutedEpsExtraQ1_3M_val,
		$txtDilutedEpsExtraQ2_3M_val,$txtDilutedEpsExtraQ2_6M_val,		
		$txtDilutedEpsExtraQ3_3M_val,$txtDilutedEpsExtraQ3_9M_val,
		$txtDilutedEpsExtraQ4_3M_val,$txtDilutedEpsExtraQ4_12M_val,
		$rowid)
	{
	    $str = "UPDATE `mkt_eps_diluted_including_extraordinary_income_info` 
			SET	
			`YEAR` = '$txtDilutedEpsExtraYear_val' , 
			`QUARTER_1_3M` = '$txtDilutedEpsExtraQ1_3M_val' , 
			`QUARTER_2_3M` = '$txtDilutedEpsExtraQ2_3M_val' , 
			`QUARTER_2_6M` = '$txtDilutedEpsExtraQ2_6M_val' , 
			`QUARTER_3_3M` = '$txtDilutedEpsExtraQ3_3M_val' , 
			`QUARTER_3_9M` = '$txtDilutedEpsExtraQ3_9M_val' , 
			`QUARTER_4_3M` = '$txtDilutedEpsExtraQ4_3M_val' , 
			`QUARTER_4_12M` = '$txtDilutedEpsExtraQ4_12M_val' , 
			`CREATION_DATE` = NOW()			
			WHERE
			`ID` = '$rowid' AND `COMPANY_CODE` = '$company_code'";
		$this->db->query($str);
		return 1;
	}
	
	
	public function eps_extra_continuing_edit_data_update($company_code,
		$txtEpsExtraYear_val,
		$txtEpsExtraQ1_3M_val,
		$txtEpsExtraQ2_3M_val,
		$txtEpsExtraQ2_6M_val,		
		$txtEpsExtraQ3_3M_val,
		$txtEpsExtraQ3_9M_val,
		$txtEpsExtraQ4_3M_val,
		$txtEpsExtraQ4_12M_val,
		$rowid)
	{
	    $str = "UPDATE `mkt_eps_including_extraordinary_income_info` 
	SET	
	`YEAR` = '$txtEpsExtraYear_val' , 
	`QUARTER_1_3M` = '$txtEpsExtraQ1_3M_val' , 
	`QUARTER_2_3M` = '$txtEpsExtraQ2_3M_val' , 
	`QUARTER_2_6M` = '$txtEpsExtraQ2_6M_val' , 
	`QUARTER_3_3M` = '$txtEpsExtraQ3_3M_val' , 
	`QUARTER_3_9M` = '$txtEpsExtraQ3_9M_val' , 
	`QUARTER_4_3M` = '$txtEpsExtraQ4_3M_val' , 
	`QUARTER_4_12M` = '$txtEpsExtraQ4_12M_val' , 
	`CREATION_DATE` = NOW()
	WHERE
	`ID` = '$rowid' AND 
	`COMPANY_CODE` = '$company_code'";
	    $this->db->query($str);
		return 1;
	}	
	

    public function turnover_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`,`COMPANY_CODE`, 
			`YEAR`, `QUARTER_1_3M`, 
			`QUARTER_2_3M`, 
			`QUARTER_2_6M`, 
			`QUARTER_3_3M`, 
			`QUARTER_3_9M`, 
			`QUARTER_4_3M`, 
			`QUARTER_4_12M`	 
			FROM `mkt_company_turnover_info`
			where company_code='$company_code'
			ORDER BY ID DESC";
			
		return $this->db->query($str)->result();	
	}
	
	
	public function divident_mutual_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
				`COMPANY_CODE`, 
				`YEAR`, 
				`RIGHT_OLD`, 
				`RIGHT_NEW`, 
				`RIGHT_DECLARATION_DATE`, 
				`RIGHT_RECORD_DATE`, 
				`INTERIM_DIVIDEND_CASH`, 
				`INTERIM_DIVIDEND_STOCK`, 
				`INTERIM_DIVIDEND_DECLARATION_DATE`, 
				`INTERIM_DIVIDEND_RECORD_DATE`, 
				`FINAL_DIVIDEND_CASH`, 
				`FINAL_DIVIDEND_STOCK`, 
				`FINAL_DIVIDEND_DECLARATION_DATE`, 
				`FINAL_DIVIDEND_RECORD_DATE`, 
				`EGM_DATE`, 
				`AGM_DATE`, 
				`CREATION_DATE`, 
				`USERNAME`	 
				FROM 
				`mkt_divident_info` 
				where company_code='$company_code'
				ORDER BY ID DESC";
			
		return $this->db->query($str)->result();	
	}
	
	public function net_profit_after_tax_continuing_operation_entry_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, `COMPANY_CODE`, 
				`YEAR`, 
				`QUARTER_1_3M`, 
				`QUARTER_2_3M`, 
				`QUARTER_2_6M`, 
				`QUARTER_3_3M`, 
				`QUARTER_3_9M`, 
				`QUARTER_4_3M`, 
				`QUARTER_4_12M`, 
				`CREATION_DATE`, 
				`USERNAME`
	 
				FROM 
				`mkt_net_profit_after_tax_continuing_operation_info`
				where company_code='$company_code'
				ORDER BY ID DESC";
			return $this->db->query($str)->result();	
	}	
	
	
	public function eps_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
				`COMPANY_CODE`, 
				`YEAR`, 
				`QUARTER_1_3M`, 
				`QUARTER_2_3M`, 
				`QUARTER_2_6M`, 
				`QUARTER_3_3M`, 
				`QUARTER_3_9M`, 
				`QUARTER_4_3M`, 
				`QUARTER_4_12M`, 
				`CREATION_DATE`, 
				`USERNAME`	 
				FROM 
				`mkt_eps_continuing_operation_info` 
				where company_code='$company_code'
				ORDER BY ID DESC";
						
		return $this->db->query($str)->result();	
	}
	
	
	public function diluted_eps_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
			`COMPANY_CODE`, 
			`YEAR`, 
			`QUARTER_1_3M`, 
			`QUARTER_2_3M`, 
			`QUARTER_2_6M`, 
			`QUARTER_3_3M`, 
			`QUARTER_3_9M`, 
			`QUARTER_4_3M`, 
			`QUARTER_4_12M`, 
			`CREATION_DATE`, 
			`USERNAME`	 
			FROM 
			`mkt_eps_diluted_continuing_operation_info`
where company_code='$company_code'			
			ORDER BY ID DESC";
						
		return $this->db->query($str)->result();	
	}	
	
	
	
	public function diluted_eps_extra_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
			`COMPANY_CODE`, 
			`YEAR`, 
			`QUARTER_1_3M`, 
			`QUARTER_2_3M`, 
			`QUARTER_2_6M`, 
			`QUARTER_3_3M`, 
			`QUARTER_3_9M`, 
			`QUARTER_4_3M`, 
			`QUARTER_4_12M`, 
			`CREATION_DATE`, 
			`USERNAME`	 
			FROM 
			`mkt_eps_diluted_including_extraordinary_income_info`
where company_code='$company_code'			
			ORDER BY ID DESC";
						
		return $this->db->query($str)->result();	
	}		
	
	
	public function eps_extra_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
	`COMPANY_CODE`, 
	`YEAR`, 
	`QUARTER_1_3M`, 
	`QUARTER_2_3M`, 
	`QUARTER_2_6M`, 
	`QUARTER_3_3M`, 
	`QUARTER_3_9M`, 
	`QUARTER_4_3M`, 
	`QUARTER_4_12M`, 
	`CREATION_DATE`, 
	`USERNAME`	 
	FROM 
	`mkt_eps_including_extraordinary_income_info` 
	where company_code='$company_code'
	ORDER BY ID DESC";
						
		return $this->db->query($str)->result();	
	}			
	
	
	public function net_profit_after_tax_continuing_extra_operation_entry_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
	`COMPANY_CODE`, 
	`YEAR`, 
	`QUARTER_1_3M`, 
	`QUARTER_2_3M`, 
	`QUARTER_2_6M`, 
	`QUARTER_3_3M`, 
	`QUARTER_3_9M`, 
	`QUARTER_4_3M`, 
	`QUARTER_4_12M`, 
	`CREATION_DATE`, 
	`USERNAME`	 
	FROM 
	`mkt_net_profit_after_tax_including_exordinary_income_info` 
	where company_code='$company_code'
    ORDER BY ID DESC";
			
		return $this->db->query($str)->result();	
	}
	
	public function company_gen_fin_entry_form_datatable($company_code)
	{
	    $str = "SELECT 	`ID`, 
				`COMPANY_CODE`, 
				`YEAR`, 
				`NAV_PERSHARE`, 
				`NAV_PERSHARE_RESTATED`, 
				`RESERVE`, 
				`ANNUALIZED_EPS`, 
				`CREATION_DATE`, 
				`USERNAME`	 
				FROM 
				`mkt_company_gen_fin_info`
where company_code='$company_code'				
				ORDER BY ID DESC";
			
		return $this->db->query($str)->result();	
	}
	

    public function company_code_for_combo()
	{
	    $str = "SELECT 	DISTINCT `CODE`	FROM 
		`company` order by `CODE` asc";
	   return $this->db->query($str)->result();
	}
	
	

	
	public function company_sector_by_code_for_combo($company_code)
	{
	    $str = "SELECT DISTINCT sector_id,name FROM `sector`
		WHERE CODE='$company_code'";
	   $res = $this->db->query($str)->result();
	   
	   $last_update_time = $this->get_last_update_datetime($company_code);
	   
	   return $res[0]->name . '#'.$last_update_time;
	}
	
	public function company_management_info_insert($company_code,$management)
	{
	  $str = "INSERT INTO `mkt_board_of_directors` 
				(`COMPANY_CODE`, `BOARD_OF_DIRECTORS`, `CREATION_DATE`)
		VALUES('$company_code','$management',NOW())";	
		
	  $this->db->query($str);	
	  return 1;
	}
	
	
	public function company_logo_insert($company_code,$filename)
	{
		$str = "INSERT INTO `mkt_company_logo`(`COMPANY_CODE`, 
			`LOGO_NAME`,`CREATION_DATE`)
			VALUES('$company_code','$filename',NOW())";
		$this->db->query($str);	
		return 1;
	}
	
	public function company_logo_finder($company_code)
	{
		$str = "SELECT LOGO_NAME FROM  mkt_company_logo
				WHERE company_code='$company_code' ORDER BY ID
				DESC LIMIT 1";
		$res = $this->db->query($str)->result();		
		return $res[0]->LOGO_NAME;
	}
	
	
    public function turnover_data_insert($company_code,$turnover_year_con,
		$turnover_q1_3m_con,
		$turnover_q2_3m_con,
		$turnover_q2_6m_con,
		$turnover_q3_3m_con,
		$turnover_q3_9m_con,
		$turnover_q4_3m_con,
		$turnover_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_company_turnover_info`
		(`COMPANY_CODE`,`YEAR`,`QUARTER_1_3M`,`QUARTER_2_3M`, 
		`QUARTER_2_6M`,`QUARTER_3_3M`,`QUARTER_3_9M`, 
		`QUARTER_4_3M`,`QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$turnover_year_con',
			'$turnover_q1_3m_con', 
			'$turnover_q2_3m_con','$turnover_q2_6m_con', 
			'$turnover_q3_3m_con','$turnover_q3_9m_con', 
			'$turnover_q4_3m_con','$turnover_q4_12m_con',
			NOW())";
	    $this->db->query($str);
		return  1;
	}
	
	
	public function npat_data_insert($company_code,$npat_year_con,
		$npat_q1_3m_con,
		$npat_q2_3m_con,
		$npat_q2_6m_con,
		$npat_q3_3m_con,
		$npat_q3_9m_con,
		$npat_q4_3m_con,
		$npat_q4_12m_con
		)
	{
		$str = "INSERT INTO `mkt_net_profit_after_tax_continuing_operation_info`
		(`COMPANY_CODE`, `YEAR`, `QUARTER_1_3M`, `QUARTER_2_3M`, 
		`QUARTER_2_6M`, `QUARTER_3_3M`, `QUARTER_3_9M`, `QUARTER_4_3M`, 
				`QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$npat_year_con',
			'$npat_q1_3m_con', 
			'$npat_q2_3m_con',
			'$npat_q2_6m_con',
			'$npat_q3_3m_con',
			'$npat_q3_9m_con',
			'$npat_q4_3m_con',
			'$npat_q4_12m_con',
			NOW())";
	    $this->db->query($str);
		return  1;
	}
	
	
	public function npat_extra_data_insert($company_code,$npat_extra_year_con,
		$npat_extra_q1_3m_con,
		$npat_extra_q2_3m_con,
		$npat_extra_q2_6m_con,
		$npat_extra_q3_3m_con,
		$npat_extra_q3_9m_con,
		$npat_extra_q4_3m_con,
		$npat_extra_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_net_profit_after_tax_including_exordinary_income_info`
		(`COMPANY_CODE`,`YEAR`, `QUARTER_1_3M`, `QUARTER_2_3M`, 
			`QUARTER_2_6M`, `QUARTER_3_3M`, `QUARTER_3_9M`, 
			`QUARTER_4_3M`, `QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$npat_extra_year_con',
			'$npat_extra_q1_3m_con','$npat_extra_q2_3m_con', 
			'$npat_extra_q2_6m_con','$npat_extra_q3_3m_con', 
			'$npat_extra_q3_9m_con','$npat_extra_q4_3m_con',
			'$npat_extra_q4_12m_con',NOW())";
			
	    $this->db->query($str);
		return  1;
	}	
	
	
	public function eps_data_insert($company_code,$eps_year_con,
		$eps_q1_3m_con,
		$eps_q2_3m_con,
		$eps_q2_6m_con,
		$eps_q3_3m_con,
		$eps_q3_9m_con,
		$eps_q4_3m_con,
		$eps_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_eps_continuing_operation_info`
			(`COMPANY_CODE`,`YEAR`, `QUARTER_1_3M`, `QUARTER_2_3M`, 
			`QUARTER_2_6M`, `QUARTER_3_3M`, `QUARTER_3_9M`, 
			`QUARTER_4_3M`, `QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$eps_year_con',
			'$eps_q1_3m_con', 
			'$eps_q2_3m_con',
			'$eps_q2_6m_con',
			'$eps_q3_3m_con', 
			'$eps_q3_9m_con', 
			'$eps_q4_3m_con',
			'$eps_q4_12m_con',
			NOW())";
	    $this->db->query($str);
		return  1;
	}		
	
	
	public function diluted_eps_data_insert($company_code,$diluted_eps_year_con,
		$diluted_eps_q1_3m_con,
		$diluted_eps_q2_3m_con,
		$diluted_eps_q2_6m_con,
		$diluted_eps_q3_3m_con,
		$diluted_eps_q3_9m_con,
		$diluted_eps_q4_3m_con,
		$diluted_eps_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_eps_diluted_continuing_operation_info`
		(`COMPANY_CODE`,`YEAR`, `QUARTER_1_3M`, `QUARTER_2_3M`, 
		`QUARTER_2_6M`, `QUARTER_3_3M`, `QUARTER_3_9M`, 
		`QUARTER_4_3M`, `QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$diluted_eps_year_con',
			'$diluted_eps_q1_3m_con', 
			'$diluted_eps_q2_3m_con',
			'$diluted_eps_q2_6m_con',
			'$diluted_eps_q3_3m_con',
			'$diluted_eps_q3_9m_con',
			'$diluted_eps_q4_3m_con',
			'$diluted_eps_q4_12m_con',
			NOW())";
	    $this->db->query($str);
		return  1;
	}			
	
	
	public function diluted_eps_extra_data_insert($company_code,$diluted_eps_extra_year_con,
		$diluted_eps_extra_q1_3m_con,
		$diluted_eps_extra_q2_3m_con,
		$diluted_eps_extra_q2_6m_con,
		$diluted_eps_extra_q3_3m_con,
		$diluted_eps_extra_q3_9m_con,
		$diluted_eps_extra_q4_3m_con,
		$diluted_eps_extra_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_eps_diluted_including_extraordinary_income_info`
		(`COMPANY_CODE`,`YEAR`,`QUARTER_1_3M`,`QUARTER_2_3M`,`QUARTER_2_6M`, 
		`QUARTER_3_3M`,`QUARTER_3_9M`,`QUARTER_4_3M`, `QUARTER_4_12M`, 
		`CREATION_DATE`) VALUES('$company_code','$diluted_eps_extra_year_con',
		'$diluted_eps_extra_q1_3m_con',
		'$diluted_eps_extra_q2_3m_con',
		'$diluted_eps_extra_q2_6m_con',
		'$diluted_eps_extra_q3_3m_con',
		'$diluted_eps_extra_q3_9m_con',
		'$diluted_eps_extra_q4_3m_con',
		'$diluted_eps_extra_q4_12m_con',
		NOW())";
	    $this->db->query($str);
		return  1;
	}				
	
	
	public function eps_extra_income_data_insert($company_code,$eps_extra_income_year_con,
		$eps_extra_q1_3m_con,
		$eps_extra_income_q2_3m_con,
		$eps_extra_income_q2_6m_con,
		$eps_extra_income_q3_3m_con,
		$eps_extra_income_q3_9m_con,
		$eps_extra_income_q4_3m_con,
		$eps_extra_income_q4_12m_con)
	{
		$str = "INSERT INTO `mkt_eps_including_extraordinary_income_info`
		(`COMPANY_CODE`,`YEAR`, `QUARTER_1_3M`, `QUARTER_2_3M`, 
		`QUARTER_2_6M`, `QUARTER_3_3M`, `QUARTER_3_9M`, 
		`QUARTER_4_3M`, `QUARTER_4_12M`, `CREATION_DATE`)
			VALUES('$company_code','$eps_extra_income_year_con',
			'$eps_extra_q1_3m_con', 
			'$eps_extra_income_q2_3m_con',
			'$eps_extra_income_q2_6m_con',
			'$eps_extra_income_q3_3m_con',
			'$eps_extra_income_q3_9m_con',
			'$eps_extra_income_q4_3m_con',
			'$eps_extra_income_q4_12m_con',
			NOW())";
	    $this->db->query($str);
		return  1;
	}					
	
	
	public function gen_fin_data_insert($company_code,$gen_fin_year_con,
		$gen_fin_nav_per_share_con,
		$gen_fin_nav_per_share_restated_con,
		$gen_fin_reserve_con,
		$gen_fin_annualized_eps_con)
	{
		$str = "INSERT INTO `mkt_company_gen_fin_info`(`COMPANY_CODE`, 
		`YEAR`,`NAV_PERSHARE`, `NAV_PERSHARE_RESTATED`, `RESERVE`, 
		`ANNUALIZED_EPS`, `CREATION_DATE`)
		VALUES('$company_code', '$gen_fin_year_con','$gen_fin_nav_per_share_con',
		'$gen_fin_nav_per_share_restated_con', '$gen_fin_reserve_con'
		,'$gen_fin_annualized_eps_con', NOW())";
	    $this->db->query($str);
		return  1;
	}

	public function divident_mutual_data_insert($company_code,$divident_mutual_year_con ,
	$divident_mutual_right_share_old_con ,
		$divident_mutual_right_share_new_con ,$divident_mutual_right_declare_date_con,
		$divident_mutual_right_record_date_con,	$divident_mutual_interim_declare_cash_con, 
		$divident_mutual_interim_declare_stock_con,	$divident_mutual_interim_declare_date_con, 
		$divident_mutual_interim_record_date_con,$divident_mutual_egm_record_date_con,
		$divident_mutual_final_declare_cash_con,$divident_mutual_final_declare_stock_con, 
		$divident_mutual_final_declare_date_con,$divident_mutual_final_record_date_con,
		$divident_mutual_agm_date_con)	
	{
		$str = "INSERT INTO `mkt_divident_info`(`COMPANY_CODE`,`YEAR`, `RIGHT_OLD`, 
			`RIGHT_NEW`,`RIGHT_DECLARATION_DATE`, `RIGHT_RECORD_DATE`, `INTERIM_DIVIDEND_CASH`, 
			`INTERIM_DIVIDEND_STOCK`,`INTERIM_DIVIDEND_DECLARATION_DATE`, `INTERIM_DIVIDEND_RECORD_DATE`, 
			`FINAL_DIVIDEND_CASH`,`FINAL_DIVIDEND_STOCK`, `FINAL_DIVIDEND_DECLARATION_DATE`, 
			`FINAL_DIVIDEND_RECORD_DATE`, `EGM_DATE`, `AGM_DATE`, `CREATION_DATE`)	
			
			VALUES('$company_code','$divident_mutual_year_con', '$divident_mutual_right_share_old_con',
			'$divident_mutual_right_share_new_con', 
			'$divident_mutual_right_declare_date_con',
			'$divident_mutual_right_record_date_con',
			'$divident_mutual_interim_declare_cash_con', 
			'$divident_mutual_interim_declare_stock_con',
			'$divident_mutual_interim_declare_date_con', 
			'$divident_mutual_interim_record_date_con',
			'$divident_mutual_final_declare_cash_con', 
			'$divident_mutual_final_declare_stock_con', 
			'$divident_mutual_final_declare_date_con',
			'$divident_mutual_final_record_date_con', 
			'$divident_mutual_egm_record_date_con',
			'$divident_mutual_agm_date_con',NOW())";
			
	    $this->db->query($str);
		return  1;
	}
	
	
	
	
	
	public function company_basic_info_view($company_code)
	{
		$str = "SELECT 	`ID`,`COMPANY_CODE`, 
			`BOARD_OF_DIRECTORS`,`CREATION_DATE`,`USERNAME`	 
			FROM `mkt_board_of_directors` 
			WHERE `COMPANY_CODE`='$company_code' 
			ORDER BY ID DESC LIMIT 1";
		$res = $this->db->query($str)->result();	
		return $res;
	}
	
	
	
	public function get_subsidiaries($company_code)
	{
	    $str = "SELECT `SUBSIDIARIES` FROM
				`mkt_term_info` WHERE 
			`COMPANY_CODE`='$company_code' 
			ORDER BY ID DESC LIMIT 1";
			
		$res = $this->db->query($str)->result();
		if($this->db->query($str)->num_rows()<=0)
		return "#";
		else
		return $res[0]->SUBSIDIARIES;
	}
	
	
	public function get_last_info($company_code)
	{	    
		$trade_date = date('Y-m-d');
		$d                = date('D',strtotime($trade_date));
		
	    $str = "SELECT Last_Traded_Price,
			Open_Price,Close_Price,Prev_Close_Price,
			Volume,Day_High,Day_Low,Trade_Date
			FROM `v_instrument_trade_status_web` 
					WHERE company_code='$company_code' 
					AND DATE_FORMAT(Trade_Date,'%Y-%m-%d')='$trade_date' 
					ORDER BY ID DESC LIMIT 1";
		$res = $this->db->query($str)->result();	
		
		
		$str2 = "SELECT Last_Traded_Price,
			Open_Price,Close_Price,Prev_Close_Price,
			Volume,Day_High,Day_Low,Trade_Date
			FROM `v_instrument_trade_status_web` 
					WHERE company_code='$company_code' 
					ORDER BY ID DESC LIMIT 1";
		 $res2  = $this->db->query($str2)->result();	
		
        if($this->db->query($str)->num_rows()>0)  
		
			return $res[0]->Last_Traded_Price . '#' . $res[0]->Open_Price 
				. '#' . $res[0]->Close_Price . '#' . $res[0]->Prev_Close_Price  
				. '#' . $res[0]->Volume      . '#' . $res[0]->Day_High .
				'#' . $res[0]->Day_Low ;
			
		else 	   
			
			return $res2[0]->Last_Traded_Price . '#' . $res2[0]->Open_Price 
				. '#' . $res2[0]->Close_Price . '#' . $res2[0]->Prev_Close_Price  
				. '#' . $res2[0]->Volume      . '#' . $res2[0]->Day_High . '#' .
				$res2[0]->Day_Low ;
	}
	
	
	public function term_of_fetch_data($company_code)
	{
	    $str = "SELECT 	`ID`,`LONG_TERM_RATING`,`SHORT_TERM_RATING`, 
			`SUBSIDIARIES`	FROM `mkt_term_info` 
				WHERE `COMPANY_CODE`='$company_code' 
				ORDER BY ID DESC LIMIT 1";
		$res4 = $this->db->query($str)->result(); 
		if($this->db->query($str)->num_rows() <=0)
		return "###";
		else
		return  $res4[0]->ID .'#'. $res4[0]->LONG_TERM_RATING .'#'.
				$res4[0]->SHORT_TERM_RATING .'#'. $res4[0]->SUBSIDIARIES;	   
	}
	
	public function company_basic_info_fetch_data($company_code)
	{
	    $str = "SELECT 	`SLNO`,`CODE`,`NAME`, 
				`FACE_VALUE`, `CATEGORY`, `ELECTRONIC`, 
				`MARKET_LOT`, `_52WEEK_RANGE`, 	`SECTOR`, 
				`LISTING_YEAR`, `YEAR_END`, 
				`ESTABLISHING_DATE`, `TRADE_START_DATE`, 
				`OFFER_PRICE`, `CREDIT_RATING_FIRM`, 
				`PARENT_COMPANY`, `COMPANY_PURPOSE`, 
				`ADDRESS`, `TELEPHONE`, 
				`FAX`, `EMAIL`, `WEBSITE`, 
				`CREATION_DATE`,	`USERNAME`,`COMPANY_NUMBER`				 
				FROM 
				`company_basic_info` where CODE='$company_code' limit 1";
		$r = $this->db->query($str)->num_rows();		
		$res = $this->db->query($str)->result();
		
			
		return $res[0]->FACE_VALUE .'#'. $res[0]->CATEGORY .'#'. $res[0]->ELECTRONIC
		.'#'. $res[0]->MARKET_LOT .'#'. $res[0]->_52WEEK_RANGE .'#'. $res[0]->SECTOR
		.'#'. $res[0]->LISTING_YEAR .'#'. $res[0]->YEAR_END  .'#'. $res[0]->ESTABLISHING_DATE
		.'#'. $res[0]->TRADE_START_DATE .'#'. $res[0]->OFFER_PRICE .'#'. $res[0]->CREDIT_RATING_FIRM
		.'#'. $res[0]->PARENT_COMPANY .'#'. $res[0]->COMPANY_PURPOSE .'#'. $res[0]->ADDRESS
		.'#'. $res[0]->TELEPHONE .'#'. $res[0]->FAX .'#'. $res[0]->FAX .'#'. $res[0]->EMAIL 
		.'#'. $res[0]->WEBSITE .'#'. $res[0]->COMPANY_NUMBER;
	}
	
	
	public function data_update_after_import_post(		 
		 $company_codes,$face_value,$category, $electronic,$market_lot,$_52week_range,
		 $sector,$listing_year,$year_end,$establishing_date, $trade_start_date,$offer_price,$credit_rating_firm,
		 $parent_company,$company_purpose,$address,$phone, $fax,$email,$website ,
		 		 
		$share_table_row_id,$total_share,$authorized_cap,$sponsor,$govt,$institute,
		$foreign,$publics,$reserve_surplus,	$floating_percentage,$floating_no_of_share,
		$market_cap,	
		
		$paidup_table_row_id,$paidup_cap ,$management_info_table_row_id,
		$managements_info	,		
		
		$term_id,$long_term_rating,$short_term_rating,$subsidiaries)	
	{
	
	
		/**********************************************
		**   update management info	 after import
		************************************************/
		if($$management_info_table_row_id!="")
		{
			$mng = "UPDATE `mkt_board_of_directors` SET	 
			`BOARD_OF_DIRECTORS` = '$managements_info' , 
			`CREATION_DATE` = NOW()	
			WHERE
			`ID` = '$management_info_table_row_id' AND 
			`COMPANY_CODE` = '$company_codes'";
			$this->db->query($mng);
		}	
	
	
	
		/**********************************************
		**   update paidup cap info	 after import
		************************************************/
		if($paidup_table_row_id!="")
		{
			$paidup = "UPDATE `mkt_paidup_cap_info` 
					SET	`PAIDUP_CAP` = '$paidup_cap' , 
					`CREATION_DATE` = NOW()
			WHERE	`ID` = '$paidup_table_row_id' 
			AND `COMPANY_CODE` = '$company_codes'";
			$this->db->query($paidup);
		}	
	    
		
		
	
		/**********************************************
		**   update share info	 after import
		************************************************/
		if($share_table_row_id!="") 
		{
			$share = "UPDATE `mkt_share_info` 	SET
			`TOTAL_SHARE` = '$total_share' , `MARKET_CAP` = '$market_cap' , 
			`AUTHORIZED_CAP` = '$authorized_cap' , `SPONSOR` = '$sponsor' , 
			`GOVT` = '$govt' , `INSTITUTE` = '$institute' , `FOREIGN` = '$foreign' , 
			`PUBLIC` = '$publics' , `RESERVE_SURPLUS` = '$reserve_surplus' , 
			`FLOATING_PERCENTAGE` = '$floating_percentage' ,
			`FLOATING_NO_OF_SHARE` = '$floating_no_of_share' , 
			`CREATION_DATE` = NOW()	WHERE	`ID` = '$share_table_row_id' AND
			`COMPANY_CODE` = '$company_codes' ";
			$this->db->query($share);
	    }
	
	    /**********************************************
		**   update company basic info	 after import
		************************************************/
		
		$basic = "UPDATE `company_basic_info` 	SET	
				`FACE_VALUE` = '$face_value' , `CATEGORY` = '$category' , `ELECTRONIC` = '$electronic' , 
				`MARKET_LOT` = '$market_lot' , `_52WEEK_RANGE` = '$_52week_range' , 
				`SECTOR` = '$sector' , `LISTING_YEAR` = '$listing_year' , 
				`YEAR_END` = '$year_end' , `ESTABLISHING_DATE` = '$establishing_date' , 
				`TRADE_START_DATE` = '$trade_start_date' , `OFFER_PRICE` = '$offer_price' , 
				`CREDIT_RATING_FIRM` = '$credit_rating_firm' , `PARENT_COMPANY` = '$parent_company' , 
				`COMPANY_PURPOSE` = '$company_purpose' , `ADDRESS` = '$address' , `TELEPHONE` = '$phone' , 
				`FAX` = '$fax' ,`EMAIL` = '$email' , `WEBSITE` = '$website' , `CREATION_DATE` = NOW() ,
				`LAST_UPDATE_DATE`=	NOW()		 WHERE	`CODE` = '$company_codes'";
		$this->db->query($basic); 
		 
		 		
				
		$terms = "UPDATE `mkt_term_info` SET `LONG_TERM_RATING` = '$long_term_rating' , 
				`SHORT_TERM_RATING` = '$short_term_rating' , 
				`SUBSIDIARIES` = '$subsidiaries' , `CREATION_DATE` = NOW() 	
				WHERE `ID` = '$term_id' AND `COMPANY_CODE` = '$company_codes'";		 
		$this->db->query($terms); 
	}
	
	
	public function paidup_cap_fetch_data($company_code)
	{
	    $str2 = "SELECT `ID`, `PAIDUP_CAP`	FROM 
				`mkt_paidup_cap_info` WHERE company_code='$company_code'
				ORDER BY ID DESC LIMIT 1";
		$r = $this->db->query($str2)->num_rows();		
		$res2 =	$this->db->query($str2)->result();	
		
		global $string;
		
		if($r==0)
		$string = "#";
		else
		$string = $res2[0]->ID  .'#'.$res2[0]->PAIDUP_CAP;
		return $string;
	}
	
	public function board_of_diretors_info_fetch_data($company_code)
	{
	   $str3 = "SELECT `ID`,`BOARD_OF_DIRECTORS`	 
				FROM `mkt_board_of_directors` 
				WHERE `COMPANY_CODE`='$company_code'
				ORDER BY ID DESC LIMIT 1";
				
		$r = $this->db->query($str3)->num_rows();		
		$res3 =	$this->db->query($str3)->result();
				
		global $string;
		if($r==0)
		$string  = "#";
		else
		$string  =$res3[0]->ID .'#'.$res3[0]->BOARD_OF_DIRECTORS;		
		return $string;
	}
	
	
	
	
	
	public function share_info_fetch_data($company_code)
	{
	     	 $str1 = "SELECT 	`ID`,`TOTAL_SHARE`,`MARKET_CAP`, 
			`AUTHORIZED_CAP`, 
			`SPONSOR`, 
			`GOVT`, 
			`INSTITUTE`, 
			`FOREIGN`, 
			`PUBLIC`, 
			`RESERVE_SURPLUS`, 
			`FLOATING_PERCENTAGE`, 
			`FLOATING_NO_OF_SHARE`	 
			FROM 
			`mkt_share_info` 
			WHERE company_code='$company_code' ORDER BY ID DESC LIMIT 1";
			
		$r = $this->db->query($str1)->num_rows();
	    $res1 = $this->db->query($str1)->result();
		
		global $string;
		if($r==0)
		$string  = "#";
		else
		$string  = $res1[0]->ID.'#'.$res1[0]->TOTAL_SHARE.'#'.$res1[0]->MARKET_CAP .'#'.
			$res1[0]->AUTHORIZED_CAP.'#'.$res1[0]->SPONSOR.'#'.
			$res1[0]->GOVT .'#'.$res1[0]->INSTITUTE .'#'.
			$res1[0]->FOREIGN .'#'.	$res1[0]->PUBLIC.'#'.
			$res1[0]->RESERVE_SURPLUS.'#'.$res1[0]->FLOATING_PERCENTAGE.'#'. 
			$res1[0]->FLOATING_NO_OF_SHARE ;
		
		return  $string;
	}
	
	
	
	public function company_basic_info_data_update($company_codes,$face_value,$category,
		 $electronic,$market_lot,$_52week_range,$sector,$listing_year,$year_end,$establishing_date,
		 $trade_start_date,$offer_price,$credit_rating_firm,
		 $parent_company,$company_purpose,$address,$phone,$fax,$email,$website)
	{
			$str = "UPDATE `company_basic_info` SET `NAME` = 'NAME' , 
				`FACE_VALUE` = '$face_value' , `CATEGORY` = '$category' , 
				`ELECTRONIC` = '$electronic' , `MARKET_LOT` = '$market_lot' , 
				`_52WEEK_RANGE` = '$_52week_range' , `SECTOR` = '$sector' , 
				`LISTING_YEAR` = '$listing_year' , `YEAR_END` = '$year_end' , 
				`ESTABLISHING_DATE` = '$establishing_date' , `TRADE_START_DATE` = '$trade_start_date' , 
				`OFFER_PRICE` = '$offer_price' , `CREDIT_RATING_FIRM` = '$credit_rating_firm' , 
				`PARENT_COMPANY` = '$parent_company' , `COMPANY_PURPOSE` = '$company_purpose' , 
				`ADDRESS` = '$address' , `TELEPHONE` = '$phone' , `FAX` = '$fax' , 
				`EMAIL` = '$email' , `WEBSITE` = '$website' , `CREATION_DATE` = NOW() 	
					WHERE `CODE` = '$company_codes'";
					
			$this->db->query($str);		
			return 1;
	
	}	 
	
}
?>