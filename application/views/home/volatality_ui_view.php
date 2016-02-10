<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>

<?php $this->load->view("utility"); ?>

</head>
<body>
<div class="container"> 
 
    <!---header start----->	
    <div class="row">
		<?php $this->load->view("home/capm_header");?>
    </div>	
	
    <div class="row">
		<div class="col-md-12  placeholder">  </div>
	</div>

	<div class="row">
		<?php $this->load->view("home/capm_megamenu");?>
	</div> 
    <!---header end----> 

      

	  
	  
	  
    <!--body start---->
	<div class="row"> 

		<!--static sidebar menu---->
		<div class="col-md-3">
			<?php $this->load->view("home/company_fundamental_quantitative_left_menu");?>
		</div>
		<!--static sidebar menu end--->
		
		
		
		
		
		
		
		<div class="col-md-9">

			<div class="row">
				<div class="col-md-12 placeholder">
					<?php $this->load->view("home/company_fundamental_quantitative_submenu_overview");?>
				</div>
			</div>
			<?php $companies = $this->load->get_var('companies'); ?>										
					 
					<table width="70%">		
						<tr>
							<td>From</td>
							<td>&nbsp;</td>
							<td>To</td>							
							<td>Indicating Days</td>						
						</tr>					
						<tr>					    
							<td><input type="text" id="volatality_start_date" style="width:200px;"/></td>
							<td>&nbsp;</td>
							<td><input type="text" id="volatality_end_date"  style="width:200px;"/></td>
							<td>
								<select id="indicating_days" style="width:150px;">
									<option value="7">7</option>
									<option value="15">15</option>
									<option value="20">20</option>
									<option value="30">30</option>
									<option value="50">50</option>
								</select>
							</td>								
						</tr>
					
					
					
						<tr>
							<td>Select Company/Companies:</td>
							<td>&nbsp;</td>
							<td>Selected Company/Companies:</td>											
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td>					
								<select id="company_codes" multiple="multiple" style="width:220px;height:150px;">
									<?php foreach($companies as $company){ ?>
									<option value="<?php echo $company->id;?>">
										<?php echo $company->code;?>
									</option>
									<?php }?>
								</select>
							</td>
							<td>												
								<ul style="list-style:none;">
									<li><input type="button" style="padding:10px;margin-left:-38px;" value=">>" id="company_codes_add" value="Add Companies"/></li>
									<li><input type="button" style="padding:10px;margin-left:-38px;" value="<<" id="company_codes_remove" value="Add Companies"/></li>
								</ul>
							</td>
							<td >
							<select id="selected_option01" multiple="multiple" style="width:220px;height:150px;"></select>
							</td>			
							<td>&nbsp;</td>		
						</tr>
						<tr>
							<td><input type="button" class="btn btn-primary" id="volatality_show_result" value="Show Result"/></td>
						</tr>
					</table>

					
					
					<table>					
					<tr>
						<td>
							<script src="<?php echo base_url();?>js/charts/highcharts.js"></script>
							<script src="<?php echo base_url();?>js/charts/modules/exporting.js"></script>									  				  					
							<div id="volatality_graph_1"></div>
						</td>
					</tr>
                    <tr>					
						<td><div id="volatality_graph_2"></div></td>
					</tr>					
					<tr>
					  <td><div id="volatality_graph_3"></div></td>
					</tr>
                    <tr>  
					  <td><div id="volatality_graph_4"></div></td>
					</tr>					
					<tr>
					  <td><div id="volatality_graph_5"></div></td>
					</tr>
                    <tr>					
					<td><div id="volatality_graph_6"></div></td>
					</tr>					
					<tr>
					  <td><div id="volatality_graph_7"></div></td>
					</tr>
                    <tr>					
					<td><div id="volatality_graph_8"></div></td>
					</tr>				
					<tr>
					  <td><div id="volatality_graph_9"></div></td>
					</tr>
                    <tr>					
					<td><div id="volatality_graph_10"></div></td>
					</tr>
					
				</table>
				
				
				
				
				
		
	<script type="text/javascript">
	$(document).ready(function()
	{		    
		$('#company_codes_add').click(function(){
			$("#temp_comps").val('');
			
			$('#company_codes option:selected').each( function() 
			{
				$('#selected_option01').append("<option value='"+
				$(this).val()+"'>"+$(this).text()+"</option>");
				
				$(this).remove();
			});
		});
		
		$('#company_codes_remove').click(function(){
			$('#selected_option01 option:selected').each( function() {
				$('#company_codes').append("<option value='"+
				$(this).val()+"'>"+$(this).text()+"</option>");
			
				$(this).remove();
			});
		});
			
				
		$("#volatality_start_date").datepicker({
			changeMonth:true,
			changeYear:true,
			dateFormat:"dd-mm-yy",
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});
		
		$("#volatality_end_date").datepicker({
			changeMonth:true,changeYear:true,
			dateFormat:"dd-mm-yy",
			showOn: "button",
			buttonImage: "<?php echo base_url();?>images/calendar.gif",
			buttonImageOnly: true
		});					
		
					
		$("#volatality_show_result").bind("click", volatality_show_result);
		
		function volatality_show_result()
		{
			var volatality_start_date = $("#volatality_start_date").val();
			var volatality_end_date   = $("#volatality_end_date").val();
			var indicating_days       = $("#indicating_days").val();
			
			var companies  = [];
			$("#selected_option01 option").each(function(){
			   companies.push($(this).val());
			});	
			
			if( companies.length <= 10 )
			{
				for(i=0;i<companies.length;i++)
				{				
					//volatality_graph_i 			    
					var dataStr = "volatality_start_date="+
						volatality_start_date+
						"&volatality_end_date="+
						volatality_end_date+
						"&indicating_days="+
						indicating_days+
						"&companies="+companies[i];
						//alert(dataStr);
					make_request_for_volatality(dataStr , i+1);					
			    }
					
			}else{
			   alert("Sorry, you can`t select more than 10 companies");
			}
			
		}
       
        function make_request_for_volatality(dataStr , div_id)
		{		    
		    $.ajax({
				type:"post" ,
				url:"<?php echo site_url();?>/volatality_ui/volatality_search_result",
				data:dataStr ,
				cache:false,
				async:true ,
				dataType:'json',
				success:function(st)
				{
					//alert(st);
					generate_volatality_graph(st,div_id)
				}
			});		
		}
        
        function generate_volatality_graph(st,div_id)
		{		  	
			var category = st[0].category;
			var d = [];			
			$.each(st , function(k,v){			    
				d.push(v);				
			});			
			//alert(d);
			
			$('#volatality_graph_'+div_id).highcharts({			
				title: {
					text: 'Volatality',
					x: -20 //center
				},
				exporting:{enabled:false},
				credits:{enabled:false},            
				xAxis: {
					categories: category ,
					labels:{rotation:-90}
					
				},
				yAxis: {
					title: {
						text: 'Volatality '
					},
					plotLines: [{
						value: 0,
						width: 1,
						color: '#808080'
					}]
				},
				tooltip: {
					valueSuffix: '',
					formatter:function(){
					   return this.x+'<br/>Volatality:'+this.y;
					}
				},
				legend: {
					enabled:false ,
					layout: 'vertical',
					align: 'right',
					verticalAlign: 'middle',
					borderWidth: 0
				},
				series: d			
			});						
		}
		
			
		
		
		
		$('#accordion .panel-collapse').on('shown.bs.collapse', function () {
		   $(".glyphicon-chevron-down").removeClass("glyphicon-chevron-down").addClass("glyphicon-chevron-up");
		});
		$('#accordion .panel-collapse').on('hidden.bs.collapse', function () {
		   $(".glyphicon-chevron-up").removeClass("glyphicon-chevron-up").addClass("glyphicon-chevron-down");
		});

		
		
		
	});
	</script>	

		</div><!---the bottom tens---->

    </div>
	</div>


    <!--main column end for body---> 
    <!--body end--> 
<script src="<?php echo base_url();?>js/bootstrap.js"></script>
<!--
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
-->
</body>
</html>