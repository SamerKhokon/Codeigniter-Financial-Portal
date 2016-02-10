<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Input_form_tables extends CI_Controller 
{
	public function turnover_datatable()
	{
	    $this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
		$turnover_tables = $this->input_form_data->turnover_entry_form_datatable($company_code);
	?>
	
		<table width="100%">
<?php 
		foreach($turnover_tables as $turnover_table){	
?>
			<tr id="<?php echo $turnover_table->ID;?>">
				<td ><?php echo $turnover_table->YEAR;?></td>
				<td ><?php echo $turnover_table->QUARTER_1_3M;?></td>
				<td ><?php echo $turnover_table->QUARTER_2_3M;?></td>
				<td ><?php echo $turnover_table->QUARTER_2_6M;?></td>
				<td ><?php echo $turnover_table->QUARTER_3_3M;?></td>
				<td ><?php echo $turnover_table->QUARTER_3_9M;?></td>
				<td ><?php echo $turnover_table->QUARTER_4_3M;?></td>
				<td ><?php echo $turnover_table->QUARTER_4_12M;?></td>
				
				<!--
				<td >&nbsp;
					<span class="glyphicon glyphicon-edit"  name="turnover_btnEdit">
					</span><span class="glyphicon glyphicon-ok" name="turnover_btnSave"></span>
				</td>							
				-->
			</tr>
		<?php } ?>
		</table>
<?php 	
	}
	
	
	public function net_profit_after_tax_continuing_datatable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
	?>
		<table width="100%">					
			<?php  						
				$net_profit_after_tax_continuing_datas = $this->input_form_data->net_profit_after_tax_continuing_operation_entry_datatable($company_code);	
				foreach($net_profit_after_tax_continuing_datas as $npat_1){
			?>
			<tr id="<?php echo $npat_1->ID;?>">
				<td ><?php echo $npat_1->YEAR;?></td>
				<td ><?php echo $npat_1->QUARTER_1_3M;?></td>
				<td ><?php echo $npat_1->QUARTER_2_3M;?></td>
				<td ><?php echo $npat_1->QUARTER_2_6M;?></td>
				<td ><?php echo $npat_1->QUARTER_3_3M;?></td>
				<td ><?php echo $npat_1->QUARTER_3_9M;?></td>
				<td ><?php echo $npat_1->QUARTER_4_3M;?></td>
				<td ><?php echo $npat_1->QUARTER_4_12M;?></td>						
				<!--<td >&nbsp;
					<span class="glyphicon glyphicon-edit"  name="napat1_btnEdit">
					</span><span class="glyphicon glyphicon-ok" name="napat1_btnSave"></span></td>													
				-->	
			</tr>
			<?php } ?>
		</table>
	<?php 
	}
	
	
	
	
	public function net_profit_after_tax_continuing_extra_operation_entry_datatable()
	{
		 $this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
	?>
	
						<table width="100%">
					<?php 
					 
					$npat_extra_tables = $this->input_form_data->net_profit_after_tax_continuing_extra_operation_entry_datatable($company_code);
					
					foreach($npat_extra_tables as $npat_extra_table)
					{
					?>
					
					<tr id="<?php echo $npat_extra_table->ID;?>">
					    <td ><?php echo $npat_extra_table->YEAR;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_1_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_2_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_2_6M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_3_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_3_9M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_4_3M;?></td>
						<td ><?php echo $npat_extra_table->QUARTER_4_12M;?></td>					
						<!--
						<td >&nbsp;<span class="glyphicon glyphicon-edit"  name="napat2_extra_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="napat2_extra_btnSave"></span>
						</td>-->
					</tr>
					
					<?php } ?>
														
				</table>
	<?php 
	}
	
	
	
	public function  eps_continuing_operation_manual_entry_form_datatable()
	{	
	 $this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
	?>
	<table width="100%">
					<?php 
						$eps_tables = $this->input_form_data->eps_entry_form_datatable($company_code);
						foreach($eps_tables as $eps_table){
					?>
					<tr id="<?php echo $eps_table->ID;?>">
					    <td ><?php echo $eps_table->YEAR;?></td>
						<td ><?php echo $eps_table->QUARTER_1_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_2_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_2_6M;?></td>
						<td ><?php echo $eps_table->QUARTER_3_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_3_9M;?></td>
						<td ><?php echo $eps_table->QUARTER_4_3M;?></td>
						<td ><?php echo $eps_table->QUARTER_4_12M;?></td>	
						<!--	
						<td >
							&nbsp;<span class="glyphicon glyphicon-edit"  name="eps_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="eps_btnSave"></span>
						</td>-->																														
					</tr>
					
					<?php } ?>
														
				</table>
	
	<?php 
	}
	
	
	
	public function company_gen_fin_datable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
	?>
					<table width="100%">		
					<?php
					    $gen_fin_tables = $this->input_form_data->company_gen_fin_entry_form_datatable($company_code);
					    foreach($gen_fin_tables as $gen_fin_table)
						{
					?>
							<tr id="<?php echo $gen_fin_table->ID;?>">
								<td ><?php echo $gen_fin_table->YEAR;?></td>
								<td ><?php echo $gen_fin_table->NAV_PERSHARE;?></td>
								<td ><?php echo $gen_fin_table->NAV_PERSHARE_RESTATED;?></td>
								<td ><?php echo $gen_fin_table->RESERVE;?></td>
								<td ><?php echo $gen_fin_table->ANNUALIZED_EPS;?></td>						
								
								<!--<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="gen_fin_btnEdit"></span>
										<span class="glyphicon glyphicon-ok" name="gen_fin_btnSave"></span>	
								</td>	-->																																									
							</tr>
					<?php } ?>
				</table>
	<?php 
	}
	
	
	
	public function diluted_eps_continuing_datatable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");
	?>
					<table width="100%">	
					<?php $diluted_eps_tables = $this->input_form_data->diluted_eps_entry_form_datatable($company_code);
					foreach($diluted_eps_tables as $diluted_eps_table)
					{
					?>	
					
					<tr id="<?php echo $diluted_eps_table->ID;?>">
					    <td ><?php echo $diluted_eps_table->YEAR;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_1_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_2_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_2_6M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_3_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_3_9M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_4_3M;?></td>
						<td ><?php echo $diluted_eps_table->QUARTER_4_12M;?></td>						
						<!--
						<td >
							&nbsp;<span class="glyphicon glyphicon-edit"  name="diluted_eps_btnEdit"></span>
							<span class="glyphicon glyphicon-ok" name="diluted_eps_btnSave"></span>
						</td>																														
						-->
					</tr>
					
					<?php } ?>	
				</table>
	<?php 
	}
	
	
	
	public function diluted_eps_extra_datatable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");	
	?>
		<table width="100%">		
					<?php						
					   $diluted_eps_extra_tables =  $this->input_form_data->diluted_eps_extra_entry_form_datatable($company_code);	
					   foreach($diluted_eps_extra_tables as $diluted_eps_extra_table)
					   {
					?>	
						<tr id="<?php echo $diluted_eps_extra_table->ID;?>">
							<td ><?php echo $diluted_eps_extra_table->YEAR;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_1_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_2_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_2_6M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_3_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_3_9M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_4_3M;?></td>
							<td ><?php echo $diluted_eps_extra_table->QUARTER_4_12M;?></td>						
							<!--
							<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="diluted_eps_extra_btnEdit"></span>
								<span class="glyphicon glyphicon-ok" name="diluted_eps_extra_btnSave"></span>
							</td>																														
							-->
						</tr>			
						
					<?php } ?>	
				</table>
	<?php 
	}
	
	
	public function eps_extra_income_datatable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");	
	
	?>
	
					<table width="100%">	
					<?php  $eps_extra_tables = $this->input_form_data->eps_extra_entry_form_datatable($company_code);
					foreach($eps_extra_tables as $eps_extra_table)
					{	
					?>
						<tr id="<?php echo $eps_extra_table->ID;?>">
							<td ><?php echo $eps_extra_table->YEAR;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_1_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_2_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_2_6M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_3_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_3_9M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_4_3M;?></td>
							<td ><?php echo $eps_extra_table->QUARTER_4_12M;?></td>						
							<!--
							<td >
								&nbsp;<span class="glyphicon glyphicon-edit"  name="eps_extra_btnEdit"></span>
								<span class="glyphicon glyphicon-ok" name="eps_extra_btnSave"></span>
							</td>																														
							-->
						</tr>	
					<?php } ?> 
					
				</table>

	
	
	<?php 
	}
	
	
	
	public function dividend_info_entry_datatable()
	{
		$this->load->model("input_form_data");
	    $company_code = $this->input->post("company_code");	
	?>
	
					<table width="120%" cellpadding="2" cellspacing="3">
					<?php 
						$divident_tables = $this->input_form_data->divident_mutual_entry_form_datatable($company_code);
						foreach($divident_tables as $divident_table)
						{
					?>
							<tr id="<?php echo $divident_table->ID;?>">
								<td style="border:1px solid #ccc;"><?php echo $divident_table->YEAR;?></td>
								<td style="border:1px solid #ccc;" ><?php echo $divident_table->RIGHT_OLD;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->RIGHT_NEW;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->RIGHT_DECLARATION_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->RIGHT_RECORD_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->INTERIM_DIVIDEND_CASH;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->INTERIM_DIVIDEND_STOCK;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->INTERIM_DIVIDEND_DECLARATION_DATE;?></td>	
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->INTERIM_DIVIDEND_RECORD_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->FINAL_DIVIDEND_CASH;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->FINAL_DIVIDEND_STOCK;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->FINAL_DIVIDEND_DECLARATION_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->FINAL_DIVIDEND_RECORD_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->EGM_DATE;?></td>
								<td  style="border:1px solid #ccc;"><?php echo $divident_table->AGM_DATE;?></td>
								
								<!--
								<td >
									&nbsp;<span class="glyphicon glyphicon-edit"  name="divident_btnEdit"></span>
									<span class="glyphicon glyphicon-ok" name="divident_btnSave"></span>
								</td>																				
								-->
							</tr>	
					<?php } ?>																							
				</table>
	
	
	<?php 
	}
	
}
?>	