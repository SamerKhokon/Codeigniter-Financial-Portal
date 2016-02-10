
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Weekly_top_ui extends CI_Controller 
{
	public function index()
	{
		$this->load->model("weeklytop_gainer_data"); 
		$this->load->model("weeklytop_looser_data"); 	
		
		
		
		$g_prices            = $this->weeklytop_gainer_data->dailytop_gainer_by_price();
		$l_prices             = $this->weeklytop_looser_data->dailytop_looser_by_percent_change();
		$g_volume         = $this->weeklytop_gainer_data->dailytop_gainer_by_volume_data();
		$l_volume          = $this->weeklytop_looser_data->dailytop_looser_by_volume_data();
		$g_turnover      = $this->weeklytop_gainer_data->dailytop_gainer_by_turnover_data();						
		$l_turnover       = $this->weeklytop_looser_data->dailytop_looser_by_turnover_data();
		$g_no_of_trade = $this->weeklytop_gainer_data->dailytop_gainer_by_no_of_trades_data();		
		$l_no_of_trade  = $this->weeklytop_looser_data->dailytop_looser_by_no_of_trades_data();	
		
        $g_tgrowth = $this->weeklytop_gainer_data->weeklytop_gainer_by_turnover_growth();
		$l_tgrowth = $this->weeklytop_looser_data->weeklytop_looser_by_turnover_growth();
		
		$this->load->model("menu_data");
	    $data['menu_overview']      = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
	    $data['submenu_overview'] = $this->menu_data->get_submenu_overview("weekly_top_ui");
	
		
		$data['g_prices']            = $g_prices;
		$data['l_prices']             = $l_prices;
		$data['g_volume']         = $g_volume;
		$data['l_volume']          = $l_volume;
		$data['g_turnover']      = $g_turnover;
		$data['l_turnover']       = $l_turnover;
		$data['g_no_of_trade'] = $g_no_of_trade;
		$data['l_no_of_trade']  = $l_no_of_trade;
		
		
		$data['g_tgrowth'] = $g_tgrowth;
		$data['l_tgrowth']  = $l_tgrowth;
		
		$this->load->vars($data);
		$this->load->view("home/weekly_top_ui_view");	
	}
	
	
	
	
	//weeklytrade_status_table
	public function weeklytrade_status_table()
	{  
		error_reporting(0);
		$user_keyword = $this->input->post("keyword");
		$parse = explode("#", $user_keyword); 
		
		$field   = $parse[0];
		$order  = $parse[1];
		
		$this->load->model("weeklytop_gainer_data");
		$trades = $this->weeklytop_gainer_data->trade_status_table_new_data($field,$order);
		
		//$this->load->view('utility');
		
?>
        <br/>
        
		
		<table class="display table-bordered table-striped table dataTable" id="example">
			<thead>
				<tr>
					<th >Company Code</th>
					<th >Turnover</th>
					<th >Volume</th>			
					<th >No of Trades</th>						
					<th >%Change</th>			
					<th >Turnover Growth</th>								
				</tr>
			</thead>
			<tbody>
		<?php 	
			$i=0;	
			foreach($trades as $trade)
			{
				$i++;
				if( $i % 2 == 0 )
				$css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
				else
				$css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";			   
	 
	?>		
				<tr >
					<td style="<?php echo $css;?>"><?php echo $trade->code;?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($trade->turnover, 2, '.', '');?></td>
					<td style="<?php echo $css;?>"><?php echo number_format($trade->volume, 2, '.', '');?></td>
					<td style="<?php echo $css;?>text-align:center;"><?php echo number_format($trade->no_of_trades, 0, '.', '');?></td>
					<td style="<?php echo $css;?>">
					   <?php if( $trade->changes  < 0 ) { ?>	
						<span style="color:#B9000D;"><?php echo number_format($trade->changes, 2, '.', '');?>%</span>   
					   <?php  }else{   ?>
						<span style="color:green;"><?php echo number_format($trade->changes, 2, '.', '');?>%</span>   
					   <?php  } ?>	
					</td>
					<td style="<?php echo $css;?>text-align:center;"><?php echo $trade->turnover_growth;?></td>
				</tr>	
			<?php 	
			}
			?>
			</tbody>
		</table>
		
		<br/><br/>		
	<?php 	
	}
	
	
	
	
}
?>