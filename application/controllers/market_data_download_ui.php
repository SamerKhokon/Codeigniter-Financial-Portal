<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market_data_download_ui extends CI_Controller 
{
    public function index()
	{	  
       $this->load->model('market_data_download_data');	
	   $data['companies'] = $this->market_data_download_data->get_companies();
	   $this->load->vars($data);	
	   $this->load->view("home/market_data_download_ui_view"); 	
	}
	
	
	public function market_data_convert_into_csv()
	{ 
	    $market_data_date = trim($this->input->post("market_data_date"));	    
		$company_id 	  = trim($this->input->post("company_id"));
		
		$this->load->model('market_data_download_data');
	    $ress = $this->market_data_download_data->generate_data($company_id,$market_data_date);
		
		$filename = "market_data_".date('Y_m_d_h_i_s').".csv";
		$location = base_url()."market_data/".$filename;
		
	    $file = fopen("market_data/$filename" ,"w+");
		
		if($ress==0)
		{
		   echo "<br/>Sorry, No records found on $market_data_date";
		}
		else
		{	    
			foreach($ress as $res) 
			{
				$code 		  = $res->code;
				$open 		  = (float)$res->open;
				$entry_date   = $res->entry_date;
				$high 		  = (float)$res->high;
				$low 		  = (float)$res->low;
				$ltp 		  = (float)$res->ltp;
				$ycp 		  = (float)$res->ycp;
				$volume 	  = (float)$res->total_volume;
				$turnover 	  = (float)$res->total_value;
				$no_of_trades = (float)$res->total_trade;
				$changes 	  = (float)$res->changes;
				
				$rows = "$code,$entry_date,$open,$high,$low,$ltp,$ycp,$volume,$turnover,$no_of_trades,$changes\r\n";
				fwrite($file ,$rows );
			}			
			fclose($file);
            ?>
			<a href="<?php echo base_url();?>market_data/<?php echo $filename;?>">
			Download <?php echo $filename;?>
			</a>
			<?php 
			}  		
	}
	
}
?>