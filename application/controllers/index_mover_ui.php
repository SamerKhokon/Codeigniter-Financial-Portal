<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_mover_ui extends CI_Controller 
{
    public function index()
	{	   
	   $this->load->view("home/index_mover_ui_view"); 	
	}
	
	
	public function get_index_mover_datatable()
	{  
	   $this->load->model("index_mover_data");
	   $datas = $this->index_mover_data->get_index_mover_data();
	   ?>
		<table class="display table-bordered table-striped table dataTable">
			<thead>
			    <tr>
				  <th>Company</th>
				  <th>Close Price</th>
				  <th>Volume</th>
				  <th>Value(BDT mn.)</th>
				  <th>No. of Trades</th>
				  <th>Changes</th>
				  <th>High</th>
				  <th>Low</th>
				  <th>Datetime</th>
				  <th>Impact</th>
			    </tr>
			</thead>
			<tbody>
			    <?php 
				foreach($datas as $data){ 
				?>
				<tr>
					<td><?php echo $data->code;?></td>
					<td><?php echo $data->ltp;?></td>
					<td><?php echo $data->total_volume;?></td>
					<td><?php echo $data->total_value;?></td>
					<td><?php echo $data->total_trade;?></td>
					<td><?php echo $data->changes;?></td>
					<td><?php echo $data->high;?></td>
					<td><?php echo $data->low;?></td>				  
					<td><?php echo $data->entry_date;?></td>
					<td><?php echo number_format($data->index_change ,3,'.','');?>%</td>
			    </tr>
				<?php } ?>
			</tbody>
		</table>
		<?php 
	}
	
}	
?> 