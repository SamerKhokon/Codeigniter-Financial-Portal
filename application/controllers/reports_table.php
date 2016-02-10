<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_table extends CI_Controller 
{
   
    public function recomendation_table()
	{
    ?>
    <table class="display table-bordered table-striped table dataTable">
		<tr>
			<th>Date</th>
			<th>Category</th>
			<th>Title</th>
			<th>File</th>
		</tr>
		<?php $recomendation = $this->load->get_var("recomendation");
		foreach($recomendation as $recomend){
		?>
		<tr>
			<td><?php echo $recomend->report_date;?></td>
			<td><?php echo $recomend->category;?></td>
			<td><?php echo $recomend->title;?></td>
			<td><a target="_blank" href="<?php echo base_url().'reports/'.$recomend->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
		</tr>
		<?php } ?>
	</table>
	<?php 
    }
	
	
	public function sector_table()
	{
	?>
	<table class="display table-bordered table-striped table dataTable">
		<tr>
			<th>Date</th>
			<th>Category</th>
			<th>Title</th>
			<th>File</th>
		</tr>
		
		<?php $sectors = $this->load->get_var("sector");
		foreach($sectors as $sector){
		?>
		<tr>
			<td><?php echo $sector->report_date;?></td>
			<td><?php echo $sector->category;?></td>
			<td><?php echo $sector->title;?></td>
			<td><a target="_blank" href="<?php echo base_url().'reports/'.$sector->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
		</tr>
		<?php } ?>							
	</table>
	<?php 
	}
	
	
	
	
	public function macro_table()
	{
	?>
		<table class="display table-bordered table-striped table dataTable">
			<tr>
				<th>Date</th>
				<th>Category</th>
				<th>Title</th>
				<th>File</th>
			</tr>
			
			<?php $articles = $this->load->get_var("article");
			foreach($articles as $article){
			?>
			<tr>
				<td><?php echo $article->report_date;?></td>
				<td><?php echo $article->category;?></td>
				<td><?php echo $article->title;?></td>
				<td><a target="_blank" href="<?php echo base_url().'reports/'.$article->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
			</tr>
			<?php } ?>								
		</table>
	<?php 
	}
	
	
	public function macro_table()
	{
	?>
		<table class="display table-bordered table-striped table dataTable">
			<tr>
				<th>Date</th>
				<th>Category</th>
				<th>Title</th>
				<th>File</th>
			</tr>
			
			<?php $ipos = $this->load->get_var("ipo");
			foreach($ipos as $ipo){
			?>
			<tr>
				<td><?php echo $ipo->report_date;?></td>
				<td><?php echo $ipo->category;?></td>
				<td><?php echo $ipo->title;?></td>
				<td><a target="_blank" href="<?php echo base_url().'reports/'.$ipo->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
			</tr>
			<?php } ?>							
		</table>
	<?php 
	}
	
	
	
	public function daily_table()
	{
	?>	
		<table class="display table-bordered table-striped table dataTable">
			<tr>
				<th>Date</th>
				<th>Category</th>
				<th>Title</th>
				<th>File</th>
			</tr>
			
			<?php $dailys = $this->load->get_var("daily");
			foreach($dailys as $daily){
			?>
			<tr>
				<td><?php echo $daily->report_date;?></td>
				<td><?php echo $daily->category;?></td>
				<td><?php echo $daily->title;?></td>
				<td><a target="_blank" href="<?php echo base_url().'reports/'.$daily->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
			</tr>
			<?php } ?>								
		</table>
	
	<?php 
	}
	
	
	
	public function weekly_table()
	{
	?>
	
	<table class="display table-bordered table-striped table dataTable">
		<tr>
			<th>Date</th>
			<th>Category</th>
			<th>Title</th>
			<th>File</th>
		</tr>								
		<?php $weeklys = $this->load->get_var("weekly");
		foreach($weeklys as $weekly){
		?>
		<tr>
			<td><?php echo $weekly->report_date;?></td>
			<td><?php echo $weekly->category;?></td>
			<td><?php echo $weekly->title;?></td>
			<td><a target="_blank" href="<?php echo base_url().'reports/'.$weekly->filename;?>"><img src="<?php echo base_url();?>img/pdf_icon.gif"/></a></td>
		</tr>
		<?php } ?>								
	</table>	
	<?php
	}
	
   
}
?>
