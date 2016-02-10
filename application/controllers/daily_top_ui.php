<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daily_top_ui extends CI_Controller 
{
    public function index()
	{
	    $this->load->model("dailytop_gainer_data"); 
		$this->load->model("dailytop_looser_data"); 
		
		$prices     = $this->dailytop_gainer_data->dailytop_gainer_by_price();
		$lprices    = $this->dailytop_looser_data->dailytop_looser_by_price();
		
		$gvolumes   = $this->dailytop_gainer_data->dailytop_gainer_by_volume_data();
		$lvolumes   = $this->dailytop_looser_data->dailytop_looser_by_volume_data();
		
		$gturnovers = $this->dailytop_gainer_data->dailytop_gainer_by_turnover_data();
		$lturnovers = $this->dailytop_looser_data->dailytop_looser_by_turnover_data();
		
		$gtrades  = $this->dailytop_gainer_data->dailytop_gainer_by_no_of_trades_data();		
		$ltrades  = $this->dailytop_looser_data->dailytop_looser_by_no_of_trades_data();
				
		$gtgrowth = $this->dailytop_gainer_data->dailytop_gainer_by_turnover_growth_data();		
		$ltgrowth = $this->dailytop_looser_data->dailytop_looser_by_turnover_growth_data();
	
	    $gmcap = $this->dailytop_gainer_data->dailytop_gainer_by_marketcap_data();
	    $lmcap  = $this->dailytop_looser_data->dailytop_looser_by_marketcap_data();
	
	
	
		$this->load->model("menu_data");
	    $data['menu_overview']      = $this->menu_data->get_menu_overview("Company Fundamentals & Quantitative");
	    $data['submenu_overview'] = $this->menu_data->get_submenu_overview("daily_top_ui");
			
			
		$data['prices']          = $prices;				
		$data['lprices']         = $lprices;
		
		$data['gvolumes']    = $gvolumes;
		$data['lvolumes']     = $lvolumes;
		
		$data['gturnovers'] = $gturnovers;
		$data['lturnovers']  = $lturnovers;
		
		$data['gtrades'] = $gtrades;
		$data['ltrades']  = $ltrades;
		
		$data['gtgrowth'] = $gtgrowth;
		$data['ltgrowth']  = $ltgrowth;		
		
		$data['gmcap'] = $gmcap;
		$data['lmcap']  = $lmcap;		
		
		$this->load->vars($data);		
	   $this->load->view("home/daily_top_ui_view");
	}
	
	
	
	
	public function trade_status_table()
	{  
	
	    error_reporting(0);
		$user_keyword  =  $this->input->post("keyword");
		$parse = explode("#", $user_keyword); 
		
		$field = $parse[0];
		$order = $parse[1];
		
		$this->load->model("dailytop_gainer_data");
		$trades = $this->dailytop_gainer_data->trade_status_table_new_data($field,$order);
		
?>
        <br/>
        
		
		<table  class="display table-bordered table-striped table dataTable" >
		<thead>
		<tr>
			<th >Company Code</th>
			<th >% Change</th>
			<th >Turnover</th>
			<th >Volume</th>			
			<th >No of Trades</th>						
			<th >Market CAP</th>									
			<th >Turnover Growth</th>												
		</tr>
		</thead>
		<tbody>
	<?php 	
	    $i=0;	
		foreach($trades as $trade)
		{
		    $i++;
			if($i%2==0)
			$css  = "background-color:#FFFFFF;font-family: tahoma,Arial;font-size:12px;";
			else
			$css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:12px;";
?>		
			<tr >
				<td style="<?php echo $css;?>"><?php echo $trade->code;?></td>
				<td style="<?php echo $css;?>">
					<?php if($trade->changes <0 ){  ?>	
						<span style="color:#B9000D;"><?php echo number_format($trade->changes, 2, '.', '');?>%</span>   
				    <?php }else{?>
						<span style="color:green;"><?php echo number_format($trade->changes, 2, '.', '');?>%</span>   
				    <?php }?>	
				</td>
				<td style="<?php echo $css;?>"><?php echo number_format($trade->total_value) ;?></td>
				<td style="<?php echo $css;?>"><?php echo number_format($trade->total_volume, 2, '.', '');?></td>
				<td style="<?php echo $css;?>text-align:center;"><?php echo number_format($trade->total_trade, 0, '.', '');?></td>
			    <td style="<?php echo $css;?>text-align:center;"><?php echo number_format($trade->mcap);?></td>
			    <td style="<?php echo $css;?>text-align:center;"><?php echo $trade->turnover_growth;?></td>				
			</tr>	
		<?php 	
		}
		?>
		</tbody>
		</table>
		
		
	<?php 	
	}
	

	
	
}
?>