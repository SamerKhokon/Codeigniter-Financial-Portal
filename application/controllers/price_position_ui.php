<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Price_position_ui extends CI_Controller 
{
    public function index()
    {
      $this->load->model("price_position_data");
	  $data['companies'] = $this->price_position_data->get_companies();
	  $this->load->vars($data);
      $this->load->view("home/price_position_ui_view");
    } 




    public function price_position_result()
    {
	    error_reporting(0);
	    $this->load->model("price_position_data");
	    /********************************************
			1 year price position
	    **********************************************/
		
		$company_id  = $this->input->post("company_id");
		
		$interval_1y = $this->price_position_data->get_your_val("1 YEAR",$company_id);
		$parse_1y = explode("#",$interval_1y);
		$low_1y  = (float)$parse_1y[0];
		$high_1y = (float)$parse_1y[1];	
		$curent_ltp_1y = $this->price_position_data->get_your_ltp("1 YEAR",$company_id);	
		$change_1y = (($curent_ltp_1y-$low_1y)/($high_1y-$low_1y))*100;
			
	
	
		/******************************************
		  6 month price position
		******************************************/
		$interval_6m = $this->price_position_data->get_your_val("6 MONTH",$company_id);
		$parse_6m = explode("#",$interval_6m);
		$low_6m  = (float)$parse_6m[0];
		$high_6m = (float)$parse_6m[1];	
		$curent_ltp_6m = $this->price_position_data->get_your_ltp("6 MONTH",$company_id);	
		$change_6m = (($curent_ltp_6m-$low_6m)/($high_6m-$low_6m))*100;
		
		
		/******************************************
		  3 month price position
		******************************************/
		$interval_3m = $this->price_position_data->get_your_val("3 MONTH",$company_id);
		$parse_3m = explode("#",$interval_3m);
		$low_3m  = (float)$parse_3m[0];
		$high_3m = (float)$parse_3m[1];	
		$curent_ltp_3m = $this->price_position_data->get_your_ltp("3 MONTH",$company_id);	
		$change_3m = (($curent_ltp_3m-$low_3m)/($high_3m-$low_3m))*100;
		
		
		/******************************************
		  1 month price position
		******************************************/
		$interval_1m = $this->price_position_data->get_your_val("1 MONTH",$company_id);
		$parse_1m = explode("#",$interval_1m);
		$low_1m  = (float)$parse_1m[0];
		$high_1m = (float)$parse_1m[1];	
		$curent_ltp_1m = $this->price_position_data->get_your_ltp("1 MONTH",$company_id);	
		$change_1m = (($curent_ltp_1m-$low_1m)/($high_1m-$low_1m))*100;	
		
	
	    
	
    ?><br/>
			<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="5" style="font-size:9px;text-align:left;">Price Position 1 Year</th>
			</tr>
			<tr>
				<th colspan="5">&nbsp;&nbsp;</th>
			
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;">Low Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;">Current Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;">High Price</th>
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;"><?php echo $low_1y;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;"><?php echo $curent_ltp_1y;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;"><?php echo $high_1y;?></th>
			</tr>
			<tr>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#7CEB98;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#93EEAA;">&nbsp;</td>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>	
				<td style="border-right:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;"><img src="<?php echo base_url();?>/images/high.gif"/></td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">0%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:left;"><?php echo number_format($change_1y,2,'.','');?>%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:right;">100%</td>
			</tr>
			</table>
             <br/>
			<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="5" style="font-size:9px;text-align:left;">Price Position 6 Month</th>
			</tr>
			<tr>
				<th colspan="5">&nbsp;&nbsp;</th>
			
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;">Low Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;">Current Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;">High Price</th>
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;"><?php echo $low_6m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;"><?php echo $curent_ltp_6m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;"><?php echo $high_6m;?></th>
			</tr>
			<tr>
				  <td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#7CEB98;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#93EEAA;">&nbsp;</td>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>	
				<td style="border-right:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;"><img src="<?php echo base_url();?>/images/high.gif"/></td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">0%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:left;"><?php echo number_format($change_6m,2,'.','');?>%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:right;">100%</td>
			</tr>
			</table>


<br/>

			<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="5" style="font-size:9px;text-align:left;">Price Position 3 Month</th>
			</tr>
			<tr>
				<th colspan="5">&nbsp;&nbsp;</th>
			
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;">Low Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;">Current Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;">High Price</th>
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;"><?php echo $low_3m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;"><?php echo $curent_ltp_3m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;"><?php echo $high_3m;?></th>
			</tr>
			<tr>
				   <td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#7CEB98;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#93EEAA;">&nbsp;</td>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>	
				<td style="border-right:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;"><img src="<?php echo base_url();?>/images/high.gif"/></td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">0%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:left;"><?php echo number_format($change_3m,2,'.','');?>%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:right;">100%</td>
			</tr>
			</table>

			<br/>


			<table width="100%" cellspacing="0" cellpadding="0">
			<tr>
				<th colspan="5" style="font-size:9px;text-align:left;">Price Position 1 Month</th>
			</tr>
			<tr>
				<th colspan="5">&nbsp;&nbsp;</th>
			
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;">Low Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;">Current Price</th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;">High Price</th>
			</tr>
			<tr>
				<th style="font-size:9px;text-align:left;"><?php echo $low_1m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:left;"><?php echo $curent_ltp_1m;?></th>
				<th>&nbsp;</th>
				<th style="font-size:9px;text-align:right;"><?php echo $high_1m;?></th>
			</tr>
			<tr>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#7CEB98;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#93EEAA;">&nbsp;</td>
				<td style="border-left:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
				<td style="border-left:0px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>	
				<td style="border-right:1px solid #000;border-bottom:1px solid #000;background:#A4F0B7;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;"><img src="<?php echo base_url();?>/images/high.gif"/></td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;">&nbsp;</td>
			</tr>
			<tr>
				<td style="font-size:9px;">0%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:left;"><?php echo number_format($change_1m,2,'.','');?>%</td>
				<td style="font-size:9px;">&nbsp;</td>
				<td style="font-size:9px;text-align:right;">100%</td>
			</tr>
			</table>


  <?php
    }
   
}
?>