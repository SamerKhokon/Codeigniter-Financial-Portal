<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sector_index_graph_details_ui extends CI_Controller 
{
    public function index()
	{	   
	   $this->load->model("sector_index_graph_details_data");
	   $data['companies'] = $this->sector_index_graph_details_data->get_companies();
	   $this->load->vars($data);
	   $this->load->view("home/sector_index_graph_details_ui_view"); 	
	}
	
	
	public function graphs()
	{
	$this->load->model("sector_index_graph_details_data");
	?>
	<script src="<?php echo base_url();?>js/jquery-1.10.1.min.js"></script>

	<script type="text/javascript">
        $(document).ready(function(){	
			function sector_index_graph(data)
			{
			
			    
			   		  
			   // split the data set into ohlc and volume
				var ohlc    = [];
				var volume  = [];
				var dataLength = data.length;
				
				
				
			    //alert(data[0].data[0]);
				
				//ohlc.push([data[0].data[0],data[0].data[1]]);
				//alert(ohlc);
				
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
				//alert(ohlc);
		       	
				var groupingUnits = [[
						'week',                         // unit name
						[1]                             // allowed multiples
					], [
						'month',
						[1, 2, 3, 4, 6]
					]];			
				 
				//create the chart
				$('#sector_index_graph').highcharts('StockChart', 
				{
					chart: { width:650,  height:400 },
					rangeSelector: { selected:1},
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
		
		
		$("#sector_index_graph_result").click(function()
		{
			var sector_index_graph_company = $("#sector_index_graph_company").val();
			if(sector_index_graph_company!="") 
			{	    
				$.ajax({
					type:"post",
					url:"<?php echo site_url();?>/sector_index_graph_details_ui/sector_index_graph_json" ,
					data:"company_id="+sector_index_graph_company ,
					dataType:'json',
					cache:false ,
					async:true ,					
					success:function(st)
					{
					    var data = [];
						$.each(st , function(k,v){
							data.push(v);
						});	
					
					  sector_index_graph(data);
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
				<tr><td  colspan="4">Company</td></tr>					
				<tr>					    
					<td colspan="4">
						<select id="sector_index_graph_company" style="width:220px;">							
							<option value="">choose company</option>
							<?php $companies =  $this->sector_index_graph_details_data->get_companies();  
							foreach($companies as $company)
							{
							?>							
							<option value="<?php echo $company->id; ?>">
							<?php echo $company->code; ?>
							</option>							
							<?php } ?>							
						</select>
					</td>								
				</tr>
				<tr>
					<td><input type="button" class="btn btn-primary" id="sector_index_graph_result" value="Show Result"/></td>
				</tr>
			</table>
			<br/>
			<table width="100%">
				<tr>
					<td>
						<script src="<?php echo base_url();?>js/charts/highstock.js"></script>
						<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>
						<div id="sector_index_graph"></div>
					</td>
				</tr>
			</table>
			
			
	<?php 
	}
	
	public function sector_index_graph_json()
	{
	    $company_id = trim($this->input->post("company_id"));
	    $this->load->model("sector_index_graph_details_data");
	    $datas = $this->sector_index_graph_details_data->get_sector_index_data($company_id);
	 
		foreach($datas as $d)
		{
		   $timestamp = (float)$d->entry_timestamp;
		   $open   = (float)$d->open;
		   $high   = (float)$d->high;
		   $low    = (float)$d->low;		   
		   $ltp    = (float)$d->ltp;
		   $volume = (float)$d->total_volume;
		   $json[]    = array("data"  => array($timestamp,$open,$high,$low,$ltp,$volume));
		}  		
		echo json_encode($json);	 
	}
	
}
?>