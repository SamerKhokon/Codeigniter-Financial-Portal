<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fundamental_screener_ui extends CI_Controller 
{
    public function index()
    {   
      $this->load->model("fundamental_screener_data");
	  $data['caps']     = $this->fundamental_screener_data->get_caps();	  
	  $data['max_mins'] = $this->fundamental_screener_data->max_min_vals();
	  
      $this->load->vars($data);
      $this->load->view("home/fundamental_screener_ui_view");
    }	
	
	
	public function fundamental_screener_show_result()
	{
	    $keyword = $this->input->post("keyword");
		$min    = $this->input->post("min");
	    $max    = $this->input->post("max");
		
		
		$this->load->model("fundamental_screener_data");
		$fundamentals = $this->fundamental_screener_data->screener_query($keyword,$min,$max);
?>
		
		<table width="100%" class="display table-bordered table-striped table dataTable">
			<tr>
				<th>Company</th>
				<th>Symbol</th>
				<th>Market Cap</th>
				<th>PE Ratio</th>
				<th>Dividend Yield</th>
				<th>52w Price Change</th>
			</tr>
			<?php foreach($fundamentals as $f){ ?>
			<tr>
				<td><?php echo $f->name;					  ?></td>
				<td><?php echo $f->code;					  ?></td>
				<td><?php echo (float)$f->cap;				  ?></td>
				<td><?php echo (float)$f->pe_ratio;			  ?></td>
				<td><?php echo (float)$f->divident_yield;	  ?></td>
				<td><?php echo (float)$f->price_change_52week;?></td>
			</tr>
			<?php } ?>
		</table>
<?php 
	}
}
?>