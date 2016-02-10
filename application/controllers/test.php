<?php   if(!defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller 
{
	
	
	
	
	
	
	
	public function cap()
	{
	    $this->load->model("corellation_data");
		$datas = $this->corellation_data->get_all_data();
		
		foreach($datas as $data)
		{
			   $id    = $data->id;
			   $code  = $data->code;
			   $close = $data->close;
			   $floating_number = $this->corellation_data->get_floating_share($code);
			   $cap = (float)$floating_number * (float)$close;
			   $up = $this->corellation_data->update_cap($id , $cap);
			   //echo $code." ".$close."  ".$floating_number."  ".$cap."  ".$this->corellation_data->update_cap($id , $cap)."<br/>";
			   echo $this->corellation_data->update_cap($id , $cap) ."<br/>";
		}
	
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function total_share()
	{
	    $this->load->model("test_data");
		$shares =   $this->test_data->total_share();
		
		
		foreach($shares as $share)
		{
		    $company_code = $share->COMPANY_CODE;
		    $total_share = $share->TOTAL_SHARE;
			$floating_percentage= $share->FLOATING_PERCENTAGE;
			$this->test_data->share_update($company_code,$total_share , $floating_percentage);
		}
		
	}
	
	
	/*
	public function main_page()
	{
	   error_reporting(0);
	   $this->load->view("home/home_page");
	}
	
	public function home()
	{
	   $this->load->view("graph_view/one");	
	}
	public function logout()
	{
	   $this->session->unset_userdata('usernames');	
	   redirect("refresh","main_page");
	}
	
	public function json()
	{		
		$series_data[] = array('name'=>'Samer'  ,'data'=>array(5, 3, 0, 7, 2));
		$series_data[] = array('name'=>'Arif'   ,'data'=>array(2, -2, -3, 0, 1));
		$series_data[] = array('name'=>'Tanvir' ,'data'=>array(0, 4, 4, -2, 5));			
		echo json_encode($series_data);				
	}
	
	
	
	public function pie_with_gradient_fill()
	{
	   error_reporting(0);
	  [['Jan', 29.9], ['Feb', 71.5], ['Mar', 106.4], 
		['Apr', 129.2], ['May', 144.0], ['Jun', 176.0], 
		['Jul', 135.6], ['Aug', 148.5], ['Sep', 216.4], 
		['Oct', 194.1], ['Nov', 95.6], ['Dec', 54.4]] 
	    
		$s[] =  array(
					"data"=>array(
						array('Jan', 29.9),
						array('Feb', 71.5),
						array('Mar', 106.4),
						array('Apr', 129.2),
						array('May', 144.0),
						array('Jun', 176.0),
						array('Jul', 135.6),
						array('Aug', 148.5),
						array('Sep', 216.4),
						array('Oct', 194.1),
						array('Nov', 95.6),
						array('Dec', 54.4)
					)
				);
		
		echo json_encode($s);
	}
	
	
	public function bar_chart_value_json()
	{
   	  $series_data[] = array('data'=>array('2001', '2002', '2003'));
   	  $series_data[] = array('data'=>array(100, 500, 900));	
      echo json_encode($series_data);	
	}
	
	
	
	public function pie_chart_value_json()
	{
   	  $series_data[] = array('data'=>array('2001', '2002', '2003'));
   	  $series_data[] = array('data'=>array(100, 500, 900));	
      echo json_encode($series_data);	
	}
	
	
	public function column_chart_value_json()
	{
   	  $series_data[] = array('data'=>array('2001', '2002', '2003' ,'2004', '2005', '2006' ));
   	  $series_data[] = array('data'=>array(20, 170,450,600,750 ,1000));	
      echo json_encode($series_data);	
	}
	
	
	
	public function column_chart_with_label_json()
	{
	    $series_data[] = array('data'=>array('Tokyo', 'Jakarta',
                    'New York',        'Seoul',
                    'Manila',
                    'Mumbai',
                    'Sao Paulo',
                    'Mexico City',
                    'Dehli',
                    'Osaka',
                    'Cairo',
                    'Kolkata',
                    'Los Angeles',
                    'Shanghai',
                    'Moscow',
                    'Beijing',
                    'Buenos Aires',
                    'Guangzhou',
                    'Shenzhen',
                    'Istanbul'));
					
					
		$series_data[] = array('data'=>array(34.4, 21.8, 20.1, 20, 19.6, 19.5, 19.1, 18.4, 18,
                    17.3, 16.8, 15, 14.7, 14.5, 13.3, 12.8, 12.4, 11.8,
                    11.7, 11.2),"dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
					}");
		echo json_encode($series_data);
	}
	
	
	public function area_chart_value_json()
	{
   	  $series_data[] = array('data'=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'));
   	  $series_data[] = array('data'=>array(29.9,78.8, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 58.4));	
      echo json_encode($series_data);	
	}
	
	
	public function line_chart_value_json()
	{
   	  $series_data[] = array('data'=>array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'));
   	  $series_data[] = array('data'=>array(29.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 58.4));	
      echo json_encode($series_data);	
	}
	
	
	public function column_chart_with_negative_value_json()
	{
		$series_data[] = array('name'=>'Label'  , 'data'=>array('test', 'Oranges', 'Pears', 'Grapes', 'Bananas'));
			
		$series_data[] = array('name'=>'Samer'  , 'data'=>array(5, 3, 0, 7, 2));
		$series_data[] = array('name'=>'Arif'   , 'data'=>array(2, -2, -3, 0, 1));
		$series_data[] = array('name'=>'Tanvir' , 'data'=>array(0, 4, 4, -2, 5));			
		echo json_encode($series_data);		
	}*/
} 
?>

