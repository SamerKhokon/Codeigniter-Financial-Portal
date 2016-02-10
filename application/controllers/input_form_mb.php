<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input_form_mb extends CI_Controller 
{
	
	public function divident_data_edit_by_ajax()
	{	
		$rowid  			 				= $this->input->post("rowid");
		$company_code		 				= $this->input->post("company_code");
		
		$txtDividentYear_val 				= $this->input->post("txtDividentYear_val");
		$txtDividentRightOld_val  			= $this->input->post("txtDividentRightOld_val");
		$txtDividentRightNew_val  			= $this->input->post("txtDividentRightNew_val");
		$txtDividentRightDeclareDate_val    = $this->input->post("txtDividentRightDeclareDate_val");		
		$txtDividentRightRecordDate_val  	= $this->input->post("txtDividentRightRecordDate_val");		
		
		$txtDividentInterimCash_val 		= $this->input->post("txtDividentInterimCash_val");
		$txtDividentInterimStock_val  		= $this->input->post("txtDividentInterimStock_val");
		$txtDividentInterimDeclareDate_val  = $this->input->post("txtDividentInterimDeclareDate_val");
		$txtDividentInterimRecordDate_val   = $this->input->post("txtDividentInterimRecordDate_val");		
		
			
		$txtDividentFinalCash_val  		 = $this->input->post("txtDividentFinalCash_val");				
		$txtDividentFinalStock_val  	 = $this->input->post("txtDividentFinalStock_val");				
		$txtDividentFinalDeclareDate_val = $this->input->post("txtDividentFinalDeclareDate_val");						
		$txtDividentFinalRecordDate_val  = $this->input->post("txtDividentFinalRecordDate_val");								
		
		
		$txtDividentFinalAgmDate_val  	 = $this->input->post("txtDividentFinalAgmDate_val");						
		$txtDividentFinalEgmDate_val  	 = $this->input->post("txtDividentFinalEgmDate_val");								
		
		
		$this->load->model("input_form_data");
		echo $this->input_form_data->divident_edit($company_code,		
		$txtDividentYear_val ,
		$txtDividentRightOld_val,
		$txtDividentRightNew_val ,
		$txtDividentRightDeclareDate_val,
		$txtDividentRightRecordDate_val  ,				
		$txtDividentInterimCash_val,
		$txtDividentInterimStock_val,
		$txtDividentInterimDeclareDate_val,
		$txtDividentInterimRecordDate_val,
		$txtDividentFinalCash_val  ,				
		$txtDividentFinalStock_val  ,				
		$txtDividentFinalDeclareDate_val,						
		$txtDividentFinalRecordDate_val ,
		$txtDividentFinalAgmDate_val ,						
		$txtDividentFinalEgmDate_val,$rowid);
		echo 1;
	}
	
	
	public function gen_fin_data_edit_by_ajax()
	{		
		$rowid  			 			= $this->input->post("rowid");
		$company_code		 			= $this->input->post("company_code");
		$txtGenFinYear_val 				= $this->input->post("txtGenFinYear_val");
		$txtGenFinPerShare_val  		= $this->input->post("txtGenFinPerShare_val");
		$txtGenFinPerSahreRestated_val  = $this->input->post("txtGenFinPerSahreRestated_val");
		$txtGenFinReserve_val  			= $this->input->post("txtGenFinReserve_val");		
		$txtGenFinAnualizedEPS_val  	= $this->input->post("txtGenFinAnualizedEPS_val");		
		
		$this->load->model("input_form_data");		
		$this->input_form_data->gen_finedit_data_insert($company_code,
		$txtGenFinYear_val,$txtGenFinPerShare_val,$txtGenFinPerSahreRestated_val
		,$txtGenFinReserve_val,$txtGenFinAnualizedEPS_val,$rowid);
		
		echo 1;
	}
	
	public function turnover_edit_data_by_ajax()
	{		   
	
	    $rowid  			 = $this->input->post("rowid");
		$company_code		 = $this->input->post("company_code");
		$txtTurnoverYear_val = $this->input->post("txtTurnoverYear_val");
		$txtQ1_3M_val  		 = $this->input->post("txtQ1_3M_val");
		
		$txtQ2_3M_val  = $this->input->post("txtQ2_3M_val");
		$txtQ2_6M_val  = $this->input->post("txtQ2_6M_val");
		
		$txtQ3_3M_val  = $this->input->post("txtQ3_3M_val");		
		$txtQ3_9M_val  = $this->input->post("txtQ3_9M_val");

		$txtQ4_3M_val  = $this->input->post("txtQ4_3M_val");			
		$txtQ4_12M_val = $this->input->post("txtQ4_12M_val");	
		
		
		$this->load->model("input_form_data");
		$this->input_form_data->turnover_edit_data_insert($company_code,
		$txtTurnoverYear_val,
		$txtQ1_3M_val,$txtQ2_3M_val,$txtQ2_6M_val,		
		$txtQ3_3M_val,$txtQ3_9M_val,$txtQ4_3M_val,
		$txtQ4_12M_val,$rowid);
		
		echo 1;
	}
	
	
	public function napat_continuing_edit_data_by_ajax()
	{		   
	
	    $rowid  		  = $this->input->post("rowid");
		$company_code	  = $this->input->post("company_code");
		$txtNpat1Year_val = $this->input->post("txtNpat1Year_val");
		$txtNpat1Q1_3M_val = $this->input->post("txtNpat1Q1_3M_val");
		
		$txtNpat1Q2_3M_val  = $this->input->post("txtNpat1Q2_3M_val");
		$txtNpat1Q2_6M_val  = $this->input->post("txtNpat1Q2_6M_val");
		
		$txtNpat1Q3_3M_val  = $this->input->post("txtNpat1Q3_3M_val");		
		$txtNpat1Q3_9M_val  = $this->input->post("txtNpat1Q3_9M_val");

		$txtNpat1Q4_3M_val  = $this->input->post("txtNpat1Q4_3M_val");			
		$txtNpat1Q4_12M_val = $this->input->post("txtNpat1Q4_12M_val");	
		
		
		$this->load->model("input_form_data");
		$this->input_form_data->npat_continuing_edit_data_update($company_code,
		$txtNpat1Year_val,$txtNpat1Q1_3M_val,
		$txtNpat1Q2_3M_val,$txtNpat1Q2_6M_val,		
		$txtNpat1Q3_3M_val,$txtNpat1Q3_9M_val,
		$txtNpat1Q4_3M_val,$txtNpat1Q4_12M_val,
		$rowid);
		
		echo 1;
	}
	
	
	
	public function napat_extra_continuing_edit_data_by_ajax()
	{		
 	    $rowid  		  	   = $this->input->post("rowid");
		$company_code	  	   = $this->input->post("company_code");
		$txtNpatExtra1Year_val = $this->input->post("txtNpatExtra1Year_val");
		$txtNpat1Q1_3M_val 	   = $this->input->post("txtNpat1Q1_3M_val");
		
		$txtNpatExtra1Q2_3M_val  = $this->input->post("txtNpatExtra1Q2_3M_val");
		$txtNpatExtra1Q2_6M_val  = $this->input->post("txtNpatExtra1Q2_6M_val");
		
		$txtNpatExtra1Q3_3M_val  = $this->input->post("txtNpatExtra1Q3_3M_val");		
		$txtNpatExtra1Q3_9M_val  = $this->input->post("txtNpatExtra1Q3_9M_val");

		$txtNpatExtra1Q4_3M_val  = $this->input->post("txtNpatExtra1Q4_3M_val");			
		$txtNpatExtra1Q4_12M_val = $this->input->post("txtNpatExtra1Q4_12M_val");	
		
		
		$this->load->model("input_form_data");
		echo $this->input_form_data->npat_extra_continuing_edit_data_update($company_code,
		$txtNpatExtra1Year_val,$txtNpat1Q1_3M_val,
		$txtNpatExtra1Q2_3M_val,$txtNpatExtra1Q2_6M_val,		
		$txtNpatExtra1Q3_3M_val,$txtNpatExtra1Q3_9M_val,
		$txtNpatExtra1Q4_3M_val,$txtNpatExtra1Q4_12M_val,
		$rowid);
		
		//echo 1;
	}	
	
	
	public function eps_continuing_edit_data_by_ajax()
	{		
 	    $rowid  		  = $this->input->post("rowid");
		$company_code	  = $this->input->post("company_code");
		$txtEpsYear_val   = $this->input->post("txtEpsYear_val");
		$txtEpsQ1_3M_val  = $this->input->post("txtEpsQ1_3M_val");
		
		$txtEpsQ2_3M_val  = $this->input->post("txtEpsQ2_3M_val");
		$txtEpsQ2_6M_val  = $this->input->post("txtEpsQ2_6M_val");
		
		$txtEpsQ3_3M_val  = $this->input->post("txtEpsQ3_3M_val");		
		$txtEpsQ3_9M_val  = $this->input->post("txtEpsQ3_9M_val");

		$txtEpsQ4_3M_val  = $this->input->post("txtEpsQ4_3M_val");			
		$txtEpsQ4_12M_val = $this->input->post("txtEpsQ4_12M_val");	
		
		
		$this->load->model("input_form_data");
		$this->input_form_data->eps_continuing_edit_data_update($company_code,
		$txtEpsYear_val,$txtEpsQ1_3M_val,
		$txtEpsQ2_3M_val,$txtEpsQ2_6M_val,		
		$txtEpsQ3_3M_val,$txtEpsQ3_9M_val,
		$txtEpsQ4_3M_val,$txtEpsQ4_12M_val,
		$rowid);
		
		echo 1;
	}		
	
	public function diluted_eps_continuing_edit_data_by_ajax()
	{	
		$rowid  		 		 = $this->input->post("rowid");
		$company_code	  		 = $this->input->post("company_code");
		$txtDilutedEpsYear_val   = $this->input->post("txtDilutedEpsYear_val");
		$txtDilutedEpsQ1_3M_val  = $this->input->post("txtDilutedEpsQ1_3M_val");
		
		$txtDilutedEpsQ2_3M_val  = $this->input->post("txtDilutedEpsQ2_3M_val");
		$txtDilutedEpsQ2_6M_val  = $this->input->post("txtDilutedEpsQ2_6M_val");
		
		$txtDilutedEpsQ3_3M_val  = $this->input->post("txtDilutedEpsQ3_3M_val");		
		$txtDilutedEpsQ3_9M_val  = $this->input->post("txtDilutedEpsQ3_9M_val");

		$txtDilutedEpsQ4_3M_val  = $this->input->post("txtDilutedEpsQ4_3M_val");			
		$txtDilutedEpsQ4_12M_val = $this->input->post("txtDilutedEpsQ4_12M_val");	
		
		
		$this->load->model("input_form_data");
		$this->input_form_data->diluted_eps_continuing_edit_data_update($company_code,
		$txtDilutedEpsYear_val,$txtDilutedEpsQ1_3M_val,
		$txtDilutedEpsQ2_3M_val,$txtDilutedEpsQ2_6M_val,		
		$txtDilutedEpsQ3_3M_val,$txtDilutedEpsQ3_9M_val,
		$txtDilutedEpsQ4_3M_val,$txtDilutedEpsQ4_12M_val,
		$rowid);
		
		echo 1;	
	}
	
	public function diluted_eps_extra_continuing_edit_data_by_ajax()
	{			   
		$rowid  		 		 = $this->input->post("rowid");
		$company_code	  		 = $this->input->post("company_code");
		$txtDilutedEpsExtraYear_val   = $this->input->post("txtDilutedEpsExtraYear_val");
		$txtDilutedEpsExtraQ1_3M_val  = $this->input->post("txtDilutedEpsExtraQ1_3M_val");
		
		$txtDilutedEpsExtraQ2_3M_val  = $this->input->post("txtDilutedEpsExtraQ2_3M_val");
		$txtDilutedEpsExtraQ2_6M_val  = $this->input->post("txtDilutedEpsExtraQ2_6M_val");
		
		$txtDilutedEpsExtraQ3_3M_val  = $this->input->post("txtDilutedEpsExtraQ3_3M_val");		
		$txtDilutedEpsExtraQ3_9M_val  = $this->input->post("txtDilutedEpsExtraQ3_9M_val");

		$txtDilutedEpsExtraQ4_3M_val  = $this->input->post("txtDilutedEpsExtraQ4_3M_val");			
		$txtDilutedEpsExtraQ4_12M_val = $this->input->post("txtDilutedEpsExtraQ4_12M_val");	
		
		
		$this->load->model("input_form_data");
		$this->input_form_data->diluted_eps_extra_continuing_edit_data_update($company_code,
		$txtDilutedEpsExtraYear_val,$txtDilutedEpsExtraQ1_3M_val,
		$txtDilutedEpsExtraQ2_3M_val,$txtDilutedEpsExtraQ2_6M_val,		
		$txtDilutedEpsExtraQ3_3M_val,$txtDilutedEpsExtraQ3_9M_val,
		$txtDilutedEpsExtraQ4_3M_val,$txtDilutedEpsExtraQ4_12M_val,
		$rowid);
		
		echo 1;	
	}
	
	
	public function epsextra_continuing_edit_data_by_ajax()
	{	
		$rowid  		 		 = $this->input->post("rowid");
		$company_code	  		 = $this->input->post("company_code");
		$txtEpsExtraYear_val   = $this->input->post("txtEpsExtraYear_val");
		$txtEpsExtraQ1_3M_val  = $this->input->post("txtEpsExtraQ1_3M_val");
		
		$txtEpsExtraQ2_3M_val  = $this->input->post("txtEpsExtraQ2_3M_val");
		$txtEpsExtraQ2_6M_val  = $this->input->post("txtEpsExtraQ2_6M_val");
		
		$txtEpsExtraQ3_3M_val  = $this->input->post("txtEpsExtraQ3_3M_val");		
		$txtEpsExtraQ3_9M_val  = $this->input->post("txtEpsExtraQ3_9M_val");

		$txtEpsExtraQ4_3M_val  = $this->input->post("txtEpsExtraQ4_3M_val");			
		$txtEpsExtraQ4_12M_val = $this->input->post("txtEpsExtraQ4_12M_val");	
		
		
		$this->load->model("input_form_data");
		 $this->input_form_data->eps_extra_continuing_edit_data_update($company_code,
		$txtEpsExtraYear_val,$txtEpsExtraQ1_3M_val,
		$txtEpsExtraQ2_3M_val,$txtEpsExtraQ2_6M_val,		
		$txtEpsExtraQ3_3M_val,$txtEpsExtraQ3_9M_val,
		$txtEpsExtraQ4_3M_val,$txtEpsExtraQ4_12M_val,
		$rowid);
		
		echo 1;	
	}	
	
		
	public function turnover_data_add_by_ajax()
	{
		$company_code		 = $this->input->post("company_code");
		$turnover_year_con	 = $this->input->post("turnover_year_con");
		$turnover_q1_3m_con	 = $this->input->post("turnover_q1_3m_con");
		
		$turnover_q2_3m_con	 = $this->input->post("turnover_q2_3m_con");
		$turnover_q2_6m_con	 = $this->input->post("turnover_q2_6m_con");
		
		$turnover_q3_3m_con  = $this->input->post("turnover_q3_3m_con");		
		$turnover_q3_9m_con  = $this->input->post("turnover_q3_9m_con");

		$turnover_q4_3m_con  = $this->input->post("turnover_q4_3m_con");			
		$turnover_q4_12m_con = $this->input->post("turnover_q4_12m_con");	
		
		$parse1 = explode("," , $turnover_year_con);
		
		$parse2 = explode("," , $turnover_q1_3m_con);
		
		$parse3 = explode("," , $turnover_q2_3m_con);
		$parse4 = explode("," , $turnover_q2_6m_con);
		
		$parse5 = explode("," , $turnover_q3_3m_con);
		$parse6 = explode("," , $turnover_q3_9m_con);
		
		$parse7 = explode("," , $turnover_q4_3m_con);
		$parse8 = explode("," , $turnover_q4_12m_con);		
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->turnover_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }
	
	public function npat_data_add_by_ajax()
	{
		$company_code	 = $this->input->post("company_code");
		$npat_year_con	 = $this->input->post("npat_year_con");
		$npat_q1_3m_con	 = $this->input->post("npat_q1_3m_con");
		
		$npat_q2_3m_con	 = $this->input->post("npat_q2_3m_con");
		$npat_q2_6m_con	 = $this->input->post("npat_q2_6m_con");		
		
		$npat_q3_3m_con  = $this->input->post("npat_q3_3m_con");
		$npat_q3_9m_con  = $this->input->post("npat_q3_9m_con");
		
		$npat_q4_3m_con  = $this->input->post("npat_q4_3m_con");	
		$npat_q4_12m_con = $this->input->post("npat_q4_12m_con");			
		
		$parse1 = explode("," , $npat_year_con);
		$parse2 = explode("," , $npat_q1_3m_con);
		
		$parse3 = explode("," , $npat_q2_3m_con);
		$parse4 = explode("," , $npat_q2_6m_con);
		
		$parse5 = explode("," , $npat_q3_3m_con);
		$parse6 = explode("," , $npat_q3_9m_con);
		
		$parse7 = explode("," , $npat_q4_3m_con);
		$parse8 = explode("," , $npat_q4_12m_con);
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->npat_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }	
	
	
	public function npat_extra_data_add_by_ajax()
	{
		$company_code   	   = $this->input->post("company_code");
		$npat_extra_year_con   = $this->input->post("npat_extra_year_con");
		$npat_extra_q1_3m_con  = $this->input->post("npat_extra_q1_3m_con");
		
		$npat_extra_q2_3m_con  = $this->input->post("npat_extra_q2_3m_con");
		$npat_extra_q2_6m_con  = $this->input->post("npat_extra_q2_6m_con");
		
		$npat_extra_q3_3m_con  = $this->input->post("npat_extra_q3_3m_con");
		$npat_extra_q3_9m_con  = $this->input->post("npat_extra_q3_9m_con");
		
		$npat_extra_q4_3m_con = $this->input->post("npat_extra_q4_3m_con");	
		$npat_extra_q4_12m_con = $this->input->post("npat_extra_q4_12m_con");			
		
		$parse1 = explode("," , $npat_extra_year_con);
		$parse2 = explode("," , $npat_extra_q1_3m_con);
		
		$parse3 = explode("," , $npat_extra_q2_3m_con);
		$parse4 = explode("," , $npat_extra_q2_6m_con);
		
		$parse5 = explode("," , $npat_extra_q3_3m_con);
		$parse6 = explode("," , $npat_extra_q3_9m_con);
		
		$parse7 = explode("," , $npat_extra_q4_3m_con);
		$parse8 = explode("," , $npat_extra_q4_12m_con);
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->npat_extra_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }		
	
	
	public function eps_data_add_by_ajax()
	{
		$company_code   = $this->input->post("company_code");
		$eps_year_con   = $this->input->post("eps_year_con");
		$eps_q1_3m_con  = $this->input->post("eps_q1_3m_con");
		
		$eps_q2_3m_con  = $this->input->post("eps_q2_3m_con");
		$eps_q2_6m_con  = $this->input->post("eps_q2_6m_con");
		
		$eps_q3_3m_con  = $this->input->post("eps_q3_3m_con");
		$eps_q3_9m_con  = $this->input->post("eps_q3_9m_con");
		
		$eps_q4_3m_con  = $this->input->post("eps_q4_3m_con");
		$eps_q4_12m_con = $this->input->post("eps_q4_12m_con");
		
		$parse1 = explode("," , $eps_year_con);
		$parse2 = explode("," , $eps_q1_3m_con);
		
		$parse3 = explode("," , $eps_q2_3m_con);
		$parse4 = explode("," , $eps_q2_6m_con);
		
		$parse5 = explode("," , $eps_q3_3m_con);
		$parse6 = explode("," , $eps_q3_9m_con);
		
		$parse7 = explode("," , $eps_q4_3m_con);
		$parse8 = explode("," , $eps_q4_12m_con);
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->eps_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }			
	
	
	public function diluted_eps_data_add_by_ajax()
	{
		$company_code   	   = $this->input->post("company_code");
		$diluted_eps_year_con   = $this->input->post("diluted_eps_year_con");
		$diluted_eps_q1_3m_con  = $this->input->post("diluted_eps_q1_3m_con");
		
		$diluted_eps_q2_3m_con  = $this->input->post("diluted_eps_q2_3m_con");
		$diluted_eps_q2_6m_con  = $this->input->post("diluted_eps_q2_6m_con");
		
		$diluted_eps_q3_3m_con  = $this->input->post("diluted_eps_q3_3m_con");
		$diluted_eps_q3_9m_con  = $this->input->post("diluted_eps_q3_9m_con");
		
		$diluted_eps_q4_3m_con = $this->input->post("diluted_eps_q4_3m_con");	
		$diluted_eps_q4_12m_con = $this->input->post("diluted_eps_q4_12m_con");			
		
		$parse1 = explode("," , $diluted_eps_year_con);
		$parse2 = explode("," , $diluted_eps_q1_3m_con);
		
		$parse3 = explode("," , $diluted_eps_q2_3m_con);
		$parse4 = explode("," , $diluted_eps_q2_6m_con);
		
		$parse5 = explode("," , $diluted_eps_q3_3m_con);
		$parse6 = explode("," , $diluted_eps_q3_9m_con);		
		
		$parse7 = explode("," , $diluted_eps_q4_3m_con);		
		$parse8 = explode("," , $diluted_eps_q4_12m_con);				
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->diluted_eps_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }			
	
	
	public function diluted_eps_extra_data_add_by_ajax()
	{
		$company_code   	   = $this->input->post("company_code");
		$diluted_eps_extra_year_con   = $this->input->post("diluted_eps_extra_year_con");
		$diluted_eps_extra_q1_3m_con  = $this->input->post("diluted_eps_extra_q1_3m_con");
		
		$diluted_eps_extra_q2_3m_con  = $this->input->post("diluted_eps_extra_q2_3m_con");
		$diluted_eps_extra_q2_6m_con  = $this->input->post("diluted_eps_extra_q2_6m_con");		
		
		$diluted_eps_extra_q3_3m_con  = $this->input->post("diluted_eps_extra_q3_3m_con");
		$diluted_eps_extra_q3_9m_con  = $this->input->post("diluted_eps_extra_q3_9m_con");		
		
		$diluted_eps_extra_q4_3m_con = $this->input->post("diluted_eps_extra_q4_3m_con");	
		$diluted_eps_extra_q4_12m_con = $this->input->post("diluted_eps_extra_q4_12m_con");			
		
		$parse1 = explode("," , $diluted_eps_extra_year_con);
		$parse2 = explode("," , $diluted_eps_extra_q1_3m_con);
		
		$parse3 = explode("," , $diluted_eps_extra_q2_3m_con);
		$parse4 = explode("," , $diluted_eps_extra_q2_6m_con);
		
		$parse5 = explode("," , $diluted_eps_extra_q3_3m_con);
		$parse6 = explode("," , $diluted_eps_extra_q3_9m_con);
		
		$parse7 = explode("," , $diluted_eps_extra_q4_3m_con);		
		$parse8 = explode("," , $diluted_eps_extra_q4_12m_con);				
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->diluted_eps_extra_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }				
	
	
	public function eps_extra_income_data_add_by_ajax()
	{
		$company_code   	         = $this->input->post("company_code");
		$eps_extra_income_year_con   = $this->input->post("eps_extra_income_year_con");
		$eps_extra_income_q1_3m_con  = $this->input->post("eps_extra_income_q1_3m_con");
		
		$eps_extra_income_q2_3m_con  = $this->input->post("eps_extra_income_q2_3m_con");
		$eps_extra_income_q2_6m_con  = $this->input->post("eps_extra_income_q2_6m_con");
		
		$eps_extra_income_q3_3m_con  = $this->input->post("eps_extra_income_q3_3m_con");
		$eps_extra_income_q3_9m_con  = $this->input->post("eps_extra_income_q3_9m_con");
		
		$eps_extra_income_q4_3m_con  = $this->input->post("eps_extra_income_q4_3m_con");	
		$eps_extra_income_q4_12m_con = $this->input->post("eps_extra_income_q4_12m_con");			
		
		$parse1 = explode("," , $eps_extra_income_year_con);
		$parse2 = explode("," , $eps_extra_income_q1_3m_con);
		
		
		$parse3 = explode("," , $eps_extra_income_q2_3m_con);
		$parse4 = explode("," , $eps_extra_income_q2_6m_con);
		
		$parse5 = explode("," , $eps_extra_income_q3_3m_con);
		$parse6 = explode("," , $eps_extra_income_q3_9m_con);
		
		$parse7 = explode("," , $eps_extra_income_q4_3m_con);
		$parse8 = explode("," , $eps_extra_income_q4_12m_con);
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->eps_extra_income_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],
			$parse5[$i],$parse6[$i],$parse7[$i],$parse8[$i]);
		}
        echo 1;		
    }					
	
	
	
	public function gen_fin_data_add_by_ajax()
	{
		$company_code   	   				 = $this->input->post("company_code");
		$gen_fin_year_con   				 = $this->input->post("gen_fin_year_con");
		$gen_fin_nav_per_share_con  		 = $this->input->post("gen_fin_nav_per_share_con");
		$gen_fin_nav_per_share_restated_con  = $this->input->post("gen_fin_nav_per_share_restated_con");
		$gen_fin_reserve_con  				 = $this->input->post("gen_fin_reserve_con");
		$gen_fin_annualized_eps_con			 = $this->input->post("gen_fin_annualized_eps_con");
		
		
		$parse1 = explode("," , $gen_fin_year_con);
		$parse2 = explode("," , $gen_fin_nav_per_share_con);
		$parse3 = explode("," , $gen_fin_nav_per_share_restated_con);
		$parse4 = explode("," , $gen_fin_reserve_con);
		$parse5 = explode("," , $gen_fin_annualized_eps_con);
		
		$this->load->model("input_form_data");
		for($i=0;$i<count($parse1);$i++) 
		{
			$this->input_form_data->gen_fin_data_insert($company_code,
			$parse1[$i],$parse2[$i],$parse3[$i],$parse4[$i],$parse5[$i]);
		}
        echo 1;		
    }			

	
	public function divident_mutual_data_add_by_ajax()
	{	
	    $company_code 						                      = $this->input->post("company_code"); 
		$divident_mutual_year_con                          = $this->input->post("divident_mutual_year_con"); 
		$divident_mutual_right_share_old_con       = $this->input->post("divident_mutual_right_share_old_con");
		$divident_mutual_right_share_new_con      = $this->input->post("divident_mutual_right_share_new_con");
		
		$divident_mutual_right_declare_date_con   = $this->input->post("divident_mutual_right_declare_date_con");
		$divident_mutual_right_record_date_con    = $this->input->post("divident_mutual_right_record_date_con"); 
		
		$divident_mutual_interim_declare_cash_con   = $this->input->post("divident_mutual_interim_declare_cash_con");  
		$divident_mutual_interim_declare_stock_con = $this->input->post("divident_mutual_interim_declare_stock_con");
		  
		$divident_mutual_interim_declare_cash_con   = (float)$divident_mutual_interim_declare_cash_con/100;
		$divident_mutual_interim_declare_stock_con =(float)$divident_mutual_interim_declare_stock_con/100;
		  
		$divident_mutual_interim_declare_date_con = $this->input->post("divident_mutual_interim_declare_date_con"); 
		$divident_mutual_interim_record_date_con  = $this->input->post("divident_mutual_interim_record_date_con");
		
		$divident_mutual_egm_record_date_con	    = $this->input->post("divident_mutual_egm_record_date_con");
		$divident_mutual_final_declare_cash_con	    = $this->input->post("divident_mutual_final_declare_cash_con");
		
		$divident_mutual_final_declare_stock_con  = $this->input->post("divident_mutual_final_declare_stock_con"); 
		$divident_mutual_final_declare_date_con    = $this->input->post("divident_mutual_final_declare_date_con");  
		
		$divident_mutual_final_declare_cash_con   = (float)$divident_mutual_final_declare_cash_con/100;
		$divident_mutual_final_declare_stock_con = (float)$divident_mutual_final_declare_stock_con/100;
		
		
		$divident_mutual_final_record_date_con     = $this->input->post("divident_mutual_final_record_date_con"); 
		$divident_mutual_agm_date_con		          = $this->input->post("divident_mutual_agm_date_con");
			
			
		$this->load->model("input_form_data");
		$this->input_form_data->divident_mutual_data_insert($company_code,$divident_mutual_year_con , $divident_mutual_right_share_old_con ,
		$divident_mutual_right_share_new_con ,$divident_mutual_right_declare_date_con,
		$divident_mutual_right_record_date_con,	$divident_mutual_interim_declare_cash_con, 
		$divident_mutual_interim_declare_stock_con,	$divident_mutual_interim_declare_date_con, 
		$divident_mutual_interim_record_date_con,$divident_mutual_egm_record_date_con,
		$divident_mutual_final_declare_cash_con,$divident_mutual_final_declare_stock_con, 
		$divident_mutual_final_declare_date_con,$divident_mutual_final_record_date_con,
		$divident_mutual_agm_date_con);
		
		//echo 1;
	}
	
	
}
?>