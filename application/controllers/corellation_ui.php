<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Corellation_ui extends CI_Controller
	{
		public function index()
		{
			$this->load->model("capital_gain_data");					
			$companies = $this->capital_gain_data->company_code_for_combo();
			$sectors   = $this->capital_gain_data->get_sectors();			
			$data['companies'] = $companies;
			$data['sectors']   = $sectors;	
			
			$this->load->vars($data);
			$this->load->view("home/corellation_ui_view");
		}
		
		
		
		
		/***********************************************************
		** corellation for selected companies
		***********************************************************/
		public function first_btn_values()
		{    error_reporting(0);
		    $companies = $this->input->post("companies");
			$start     = $this->input->post("start");
			$end       = $this->input->post("end");
			$parse     = explode(",",$companies);			
			$this->load->model("corellation_data");			
?>			
			<table cellpadding="3" cellspacing="3">
			<tr>
			<td>&nbsp;</td>
<?php 
			for($k=1;$k<=count($parse);$k++)
			{
?>
			    <td style="font-family:Arial;font-size:12px;height:100px;-webkit-transform: rotate(-90deg); 
					-moz-transform: rotate(-90deg);filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);">
					<?php echo $parse[$k-1];?>
				</td>
<?php 
			}
?>
			</tr>
			
<?php
			for( $i = 1 ; $i <= count($parse) ; $i++)
			{
			     if($i%2==0) {
					$css = "background-color:#E1EEF4;font-family:Arial;";
				 }else{
				 	$css = "background-color:#ffffff;font-family:Arial;";
				 }
?>
				<tr>
			    <td  style="<?php echo $css;?>"><?php echo $parse[$i-1];?></td>				
				<?php 
				for($j=1 ; $j<=$i ; $j++)
				{	
                   		
					$xval  = $this->calculation($parse[$i-1] ,$start , $end);
					$yval = $this->calculation($parse[$j-1] ,$start , $end);					
					$r = $this->get_corellation($xval , $yval );					
					echo "<td align='center' style='".$css."'>".$r."</td>";					
				}
				echo "</tr>";
			}			
			echo '</table>';
		}
		
		
		
		public function get_all_companies_of_single_sector($sector_id)
		{
		   $this->load->model("corellation_data");
		   $companies = $this->corellation_data->get_single_sectors_company_ids($sector_id);
		   return trim($companies);
		}
		
		 
		 
		 
		 
		/*********************************************************************
		*** corellation for same sector companies
		**********************************************************************/		
		public function second_btn_values()
		{  error_reporting(0);
		   $start = $this->input->post("start");
		   $end   = $this->input->post("end");
		   $sector_id = $this->input->post("sector_id");
		   $this->load->model("corellation_data");
		   $companies = $this->get_all_companies_of_single_sector($sector_id);
		   $parse     = explode(",",$companies);	
		   
		  ?> 		   
		   <table >
			<tr>
				<td>&nbsp;</td>
			<?php 
				for($k=1 ; $k <= count($parse) ; $k++ )
				{
			?>
					<td style="font-family:Arial;font-size:12px;height:100px;-webkit-transform: rotate(-90deg); 
						-moz-transform: rotate(-90deg);
						filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);">
						<?php echo $parse[$k-1];?>
					</td>
<?php 
				} 
?>
			</tr>			
<?php
			for( $i = 1 ; $i <= count($parse) ; $i++)
			{
			     if($i%2==0) {
					$css = "background-color:#E1EEF4;font-family:Arial;";
				 }else{
				 	$css = "background-color:#ffffff;font-family:Arial;";
				 }
?>
				<tr>
					<td  style="<?php echo $css;?>"><?php echo $parse[$i-1];?></td>				
				<?php 
					for($j=1 ; $j<=$i ; $j++)
					{
					
					    
						$xval = $this->calculation($parse[$i-1] ,$start , $end);
						$yval = $this->calculation($parse[$j-1] ,$start , $end);					
						$r = $this->get_corellation($xval , $yval );
						
						echo "<td align='center' style='".$css."'>".$r."</td>";
					}
				echo "</tr>";
			}			
			echo '</table>';
		}
		
		
		
		/*********************************************************
		**** corellation for sectors
		**********************************************************/
		public function third_btn_result()
		{
		   error_reporting(0);
		   $this->load->model("corellation_data");
		   $start = $this->input->post("start");
		   $end   = $this->input->post("end");
		   
		   $sectors = $this->corellation_data->get_sectors();
		   $parse = array();		   
?>
		   	<table>
			<tr>
			<td>&nbsp;</td>
<?php 
				foreach($sectors as $sector )
				{
					$parse[] = $sector->name;
?>
					<td style="font-family:Arial;font-size:12px;height:100px;-webkit-transform: rotate(-90deg); 
						-moz-transform: rotate(-90deg);
						filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);">
						<?php echo $sector->name;?>
					</td>
<?php 
				} 
?>
			</tr>			
<?php
			for( $i = 1 ; $i <= count($parse) ; $i++)
			{
			    if($i%2==0) {
					$css = "background-color:#E1EEF4;font-family:Arial;";
				 }else{
				 	$css = "background-color:#ffffff;font-family:Arial;";
				 }
?>
				<tr>
					<td style="<?php echo $css;?>"><?php echo $parse[$i-1];?></td>				
				<?php 
					for( $j = 1 ; $j <= $i ; $j++ )
					{	
                     			
						$xval = $this->sector_corellation_calculation($parse[$i-1] ,$start , $end);
						$yval = $this->sector_corellation_calculation($parse[$j-1] ,$start , $end);					
						$r    = $this->get_corellation($xval , $yval );						
					
						echo "<td align='center' style='".$css."'>".$r."</td>";
					}
				echo "</tr>";
			}			
			echo '</table>';
		}
		
		
		
		public function sector_corellation_calculation($code ,$start , $end)
		{
		    $this->load->model("corellation_data");		
			$xvals = $this->corellation_data->get_single_sector_series($code , $start , $end);
			foreach($xvals as $xval)
			{			    
				$x[] 	 = (float)$xval->sector_price;
				$x_2[]   = (float)$xval->sector_price * (float)$xval->sector_price ;
			}	
            return $x;	
		}
		
		
		
		
		
				
		
		/************************************************************************
		**** corellation calculation
		************************************************************************/
		
		public function calculation($code ,$start , $end)
		{
		   	$this->load->model("corellation_data");		
			$xvals = $this->corellation_data->get_single_company_series($code , $start , $end);
			foreach($xvals as $xval)
			{			    
				$x[] 	 = (float)$xval->ltp;
				$x_2[]   = (float)$xval->ltp_ltp;
			}	
            return $x;			
		}
		
		
		
		public function get_corellation($x , $y ) 
		{	
			$n    = count($x);	
			for($i=0;$i<$n;$i++)
			{			 
			  $x_2[] = (float)$x[$i] * (float)$x[$i];				
			  $y_2[] = (float)$y[$i] * (float)$y[$i];
			  $xy[]  = (float)$x[$i] * (float)$y[$i]; 
		    }
			 			
			$sum_x  = array_sum($x);
			$sum_y  = array_sum($y);		   
			$sum_xy = array_sum($xy);
			$sum_x2 = array_sum($x_2);		   
			$sum_y2 = array_sum($y_2);
			
		    $up   = (($n*$sum_xy)-($sum_x*$sum_y));
            $u    = number_format($up,2,".","");
		   
		    $down = (($n*$sum_x2)-($sum_x*$sum_x))*(($n*$sum_y2)-($sum_y*$sum_y));
		    $d    = number_format($down,2,".","");
		   
		    $down_portion = sqrt($d);
			$down_portion = number_format($down_portion,2,".","");
						
		    if( $down_portion=="" ||  $down_portion==0)			
			$r=0;
			else			
			$r = ((float)$u/(float)$down_portion);			
		    	
			return number_format($r,2,".","");
			
		    //return $u.'#'.$d.'#'.$down_portion."#".$r;		   
           //return (float)$r;		   
		}
		
	}
?>