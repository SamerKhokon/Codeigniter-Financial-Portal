<script type="text/javascript">
 $(document).ready(function (){  
  var width = 7;
  var x = 0;
   $('.mainnav ul li').each(function(i) {
   x=i*5;   
    width += $(this).outerWidth();
   });  
  $(".mainnav").css('width', width+x);
 });
</script>