<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Market_mover_ui extends CI_Controller 
{
	public function index()
	{
	   $this->load->view("home/market_mover_ui_view");  
	}
	
	public function market_mover_stock_data_in_table()
	{
	    $this->load->model("todays_market_mover_data"); 	     
	    $datas = $this->todays_market_mover_data->market_mover_table_data();
	    //$this->load->view('utility');
		//print_r($datas);
		?>
		<table id="ljSortable" class="display table-bordered table-striped table dataTable">
			<thead>
			<tr>
			 <th>Company</th>
			 <th>Close Price</th>
			 <th>Value</th>
			 <th>Volume</th>
			 <th>Trades</th>
			 <th>Changes</th>
			 <th>High</th>
			 <th>Low</th>
			 <th>CSE Price</th>
			 <th>CSE Volume</th>
			</tr>
			</thead>		
			<tbody>
			<?php 
			foreach($datas as $data)
			{
			?>
				<tr>
				 <th><?php echo $data->code;?></th>
				 <td><?php echo $data->ycp;?></td>
				 <td><?php echo $data->total_value;?></td>
				 <td><?php echo $data->total_volume;?></td>
				 <td><?php echo $data->total_trade;?></td>
				 <td><?php echo $data->changes;?></td>
				 <td><?php echo $data->high;?></td>
				 <td><?php echo $data->low;?></td>
				 <td ><?php echo $data->cse_price;?></td>
				 <td><?php echo $data->cse_volume;?></td>
				</tr>
			<?php 
			}
			?>
			</tbody>
		</table>
			<script src="<?php echo base_url();?>js/ljSortable.min.js"></script>
 
	
<?php 
	} 
}
?>