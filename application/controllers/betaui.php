<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Betaui extends CI_Controller 
{
    public function index()
	{	   
	   $this->load->view("home/beta_ui_view"); 	
	}
	
	
	public function get_beta_table()
	{
	   $this->load->model('beta_data');
	   $all_betas = $this->beta_data->get_all_sector_data();
	?>	
       <table class="display table-bordered table-striped table dataTable">
	   <tbody>
	   <?php 
	   foreach($all_betas as $beta)
	   {
	    $sectorId = $beta->sector_ID;
	   ?>
	      <tr>	     
			  <th><?php echo $beta->name;?></th>
			  <th><?php echo $beta->sectoBeta_three_month;?></th>
			  <th><?php echo $beta->sectoBeta_nine_month;?></th>
			  <th><?php echo $beta->sectoBeta_twelve_month;?></th>
		  </tr>		  
		  <?php 
		  $ibetas = $this->beta_data->get_individual_companies_single_sector_beta($sectorId);
		  foreach($ibetas as $ibeta)
		  {
		  ?>
		    <tr>		  
				<td><?php echo $ibeta->code;?></td>
				<td><?php echo $ibeta->three_month_beta;?></td>
				<td><?php echo $ibeta->six_month_beta;?></td>
				<td><?php echo $ibeta->one_year_beta;?></td>
			</tr>
		<?php 	 
		  }
	   }
	   ?>
	   </tbody>
       </table>
	<?php 
	}
}
?>