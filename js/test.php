<select id="sel" multiple="multiple">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
</select>
<select id="source" multiple="multiple"></select>
<select id="dest" multiple="multiple"></select>

<script type="text/javascript" src="jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var t = Array('a','f','b','d','g');
	//alert(t.indexOf('f'));
	t[t.indexOf('f')] = 'h';
	for(var i=t.indexOf('f'); i<=t.length;i++)
	{
	  t[i+1] = t[i];
	}
    alert(t);
	
	

	/*
	$('#sel').change(function(){
	    var y = [];
		$('#sel option:selected').each(function(){
		      y.push($(this).val());
			  $('#source').append('<option value="'+$(this).val()+'">'+$(this).text()+'</option>');
			  $(this).remove();
		});		
		
		alert(y);
	});*/
});
</script>