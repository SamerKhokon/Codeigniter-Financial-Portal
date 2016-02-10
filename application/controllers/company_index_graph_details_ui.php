<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_index_graph_details_ui extends CI_Controller 
{
   //company_index_graph_details_data
    public function index()
	{	   
	   $this->load->model("company_index_graph_details_data");
	   $data['sectors'] = $this->company_index_graph_details_data->get_sectors();
	   $this->load->vars($data);
	   $this->load->view("home/company_index_graph_details_ui_view"); 	
	}
	
	
	public function company_graphs()
	{
		$this->load->model("company_index_graph_details_data");
?>
	<script src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>

	<script type="text/javascript">
        $(document).ready(function(){	
			function company_index_graph(data)
			{  		  
			    // split the data set into ohlc and volume
				var ohlc    = [];
				var volume  = [];
				var dataLength = data.length;	
				
				//alert(data);
				
				for (var i = 0; i < dataLength; i++) 
				{
				    var the_date = data[i].data[0];
					var open     = data[i].data[1];
					var high     = data[i].data[2];
					var low      = data[i].data[3];
					var close    = data[i].data[4];
					var vol      = data[i].data[5];
				    // the date ,open, high, low, close
					ohlc.push([the_date,open,high,low,close]);	
					// the date	,the volume			
					volume.push([the_date,vol]);
						
				}
				//alert(volume);
		       	
				var groupingUnits = [[
						'week',                         // unit name
						[1]                             // allowed multiples
					], [
						'month',
						[1, 2, 3, 4, 6,7,8,9,10,11,12]
					]];			
				 
				//create the chart
				$('#company_index_graph_div').highcharts('StockChart', 
				{
					chart: { width:650,  height:400 },
					rangeSelector: { selected:3},
					title: {  text: ''},
					yAxis: [{
						title:{ text:''},
						height: 200 ,
						lineWidth: 2
					}	
					, 			
					{
						title: {  text: ''},
						top: 200,
						height: 100,
						offset: 0,
						lineWidth: 2
					}],
					exporting: { enabled:false },
					credits:{enabled:false} ,
					plotOptions: {
						column: {
							states: {
								hover: {
									color: 'red'                                                           
								}
							}
						}
					},					
					
					series: [{
						type:'candlestick',
						name: 't',
						data: ohlc,
						marker : {
							enabled : true,
							radius : 3
						},
						shadow : true,				
						dataGrouping: {
							units: groupingUnits
						}
					}
					, 
					{
						type: 'column',
						name: 'Volume',
						color: '#000999',
						data: volume,
							marker : {
							enabled : true,
							radius : 3
						},
						shadow : true,
						yAxis: 1,
						dataGrouping: {
							units: 	groupingUnits
						}
					}]
				});		
			}	
		
		
		$("#company_index_graph_result").click(function()
		{
			var sectors = $("#sectors").val();
			
			if(sectors!="") 
			{	    
				$.ajax({
					type:"post",
					url:"<?php echo site_url();?>/company_index_graph_details_ui/company_index_graph_json" ,
					data:"sector_id="+sectors ,
					dataType:'json',
					cache:false ,
					async:true ,					
					success:function(st)
					{
					    var data = [];
						$.each(st , function(k,v){
							data.push(v);
						});	
					    //alert(data);
					  company_index_graph(data);
					}
				});
			  
			}
			else
			{
			  alert("Please select any sector");
			}
		});	
	});
	</script>	
			<table width="100%">		
				<tr><td  colspan="4">Sector</td></tr>					
				<tr>					    
					<td colspan="4">
						<select id="sectors" style="width:220px;">							
							<option value="">choose sector</option>
							<?php  $sectors = $this->company_index_graph_details_data->get_sectors();  
							foreach($sectors as $sector)
							{
							?>							
							<option value="<?php echo $sector->sector_id; ?>">
							<?php echo $sector->name; ?>
							</option>							
							<?php } ?>							
						</select>
					</td>								
				</tr>
				<tr>
					<td><input type="button" class="btn btn-primary" id="company_index_graph_result" value="Show Result"/></td>
				</tr>
			</table>
			<br/>
			<table width="100%">
				<tr>
					<td>
						<script src="<?php echo base_url();?>js/charts/highstock.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>
						<div id="company_index_graph_div"></div>
					</td>
				</tr>
			</table>
			
			
	<?php 
	}
	
	
	public function company_index_graph_json()
	{
	    $sector_id = trim($this->input->post("sector_id"));
	    $this->load->model("company_index_graph_details_data");
	    $datas = $this->company_index_graph_details_data->get_company_index_data($sector_id);
	 
		foreach($datas as $d)
		{
		   $timestamp = (float)$d->timestamps;
		   $open   = (float)$d->open;
		   $high   = (float)$d->high;
		   $low    = (float)$d->low;		   
		   $ltp    = (float)$d->sector_price;
		   $volume = (float)$d->volume;
		   $json[]    = array("data"  => array($timestamp,$open,$high,$low,$ltp,$volume));
		}  		
		echo json_encode($json);	 
	}
	
}	
?>	