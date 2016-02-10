<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dailytop_gainer extends CI_Controller 
{
	
    public function dailytop_gainer_by_change()
	{	     
	   $this->load->model("dailytop_gainer_data");
	   $percents = $this->dailytop_gainer_data->dailytop_gainer_by_percent_change();
	?>
	
	   <table width="50%" >
		<tr style="background-color:#009241;">
			<th style="color:#fff;">Company</th>
			<th style="color:#fff;">&nbsp;&nbsp;%Change</th>
		</tr>
	<?php	$i = 0;
	   foreach($percents as $percent)
	   {
	       $i++;
		   if($i%2==0)
		   $css = "background-color:#fff;font-family: tahoma,Arial;font-size:11px;";
		   else
		   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:11px;";
	?>
	    <tr style="<?php echo $css;?>"> 
	      <td  align="left" style="border-left:#f1f1f1;"><?php echo $percent->Company_Code;?></td>
		  <td  align="left">
			  <?php echo number_format($percent->Percent_Change, 2, '.', '');?>%
		   </td>
		</tr>  
	<?php	  
	   }
	?> 
	   </table>
	<?php
	}
	
	public function dailytop_gainer_by_volume()
	{
	    $this->load->model("dailytop_gainer_data");
	    $volumes = $this->dailytop_gainer_data->dailytop_gainer_by_volume_data();
	?>
	    <table width="50%" >
		<tr style="background-color:#009241;">
			<th style="color:#fff;">Company</th>
			<th style="color:#fff;">&nbsp;&nbsp;Volume</th>
		</tr>
		<?php
		$i = 0;
		foreach($volumes as $volume)
		{
		   $i++;
		   if($i%2==0)
		   $css = "background-color:#fff;font-family: tahoma,Arial;font-size:11px;";
		   else
		   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:11px;";
		?>
		  <tr style="<?php echo $css;?>">
		   <td align="left" style="border-left:#f1f1f1;"><?php echo $volume->company_code; ?></td> 
		   <td align="left"><?php echo number_format($volume->volume, 2, '.', '');       ?></td> 
		  </tr> 
		<?php   
		}
		?>
		
		</table>
	<?php	
	}
	
	public function dailytop_gainer_by_value()
	{
	    $this->load->model("dailytop_gainer_data");
	    $values = $this->dailytop_gainer_data->dailytop_gainer_by_value_data();
	?>
		<table width="50%" >
			<tr style="background-color:#009241;">
				<th style="color:#fff;">Company</th>
				<th style="color:#fff;">&nbsp;&nbsp;Value</th>
			</tr>
	<?php	$i = 0;
				foreach($values as $value)
				{
				   $i++;
				   if($i%2==0)
				   $css = "background-color:#fff;font-family: tahoma,Arial;font-size:11px;";
				   else
				   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:11px;";
?>
					<tr style="<?php echo $css;?>">
					   <td align="left" style="border-left:#f1f1f1;"><?php echo $value->company_code; ?></td> 
					   <td align="left"><?php echo number_format($value->turnover, 2, '.', '');       ?></td> 
					</tr>		  
<?php   
				}
?>
		</table>
<?php	
	}
	
	public function dailytop_gainer_by_no_of_trades()
	{
	    $this->load->model("dailytop_gainer_data");
	    $trades = $this->dailytop_gainer_data->dailytop_gainer_by_no_of_trades_data();
	?>	
		<table width="50%" >
			<tr style="background-color:#009241;">
				<th style="color:#fff;">Company</th>
				<th style="color:#fff;">&nbsp;&nbsp;No of Trade</th>
			</tr>
	<?php	$i=0;
		foreach($trades as $trade)
		{
			$i++;
		   if($i%2==0)
		   $css = "background-color:#fff;font-family: tahoma,Arial;font-size:11px;";
		   else
		   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:11px;";
	?>	   
	      <tr style="<?php echo $css;?>">
		   <td align="left" style="border-left:#f1f1f1;"><?php echo $trade->company_code ;?></td>
		   <td align="left"><?php echo number_format($trade->no_of_trades, 2, '.', '');?></td>
		  </tr> 
	<?php
		}
	?>
	    </table>
	<?php
	}
	
	public function dailytop_gainer_by_pe()
	{
	    $this->load->model("dailytop_gainer_data");
	    $pes = $this->dailytop_gainer_data->dailytop_gainer_by_pe_data();
	?>	
	    <table width="50%" >
			<tr style="background-color:#009241;">
				<th style="color:#fff;">Company</th>
				<th style="color:#fff;">&nbsp;&nbsp;P/E</th>
			</tr>
	<?php	$i=0;
		foreach($pes as $pe)
		{
		   $i++;
		   if($i%2==0)
		   $css = "background-color:#fff;font-family: tahoma,Arial;font-size:11px;";
		   else
		   $css = "background-color:#F6FAFD;font-family: tahoma,Arial;font-size:11px;";
	?>
	      <tr style="<?php echo $css;?>">
		   <td align="left" style="border-left:#f1f1f1;"><?php echo $pe->company_code;?></td>
		   <td align="left"><?php echo number_format($pe->pe, 2, '.', '') ;?></td>
		  </tr> 
	<?php
		}
	?>
	    </table>
	<?php
	}
	
	
}
?>