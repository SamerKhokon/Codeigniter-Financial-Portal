<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" /> 
  <title>summernote</title>

  <!-- include jquery -->  
	<script src="../src/js/jquery-1.10.1.min.js"></script>    

  <!-- include libs stylesheets -->
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <script src="../src/js/bootstrap.min.js"></script> 
<!--  <link rel="stylesheet" href="../css/font-awesome.min.css" />-->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />


  <!-- code mirror -->
  <link rel="stylesheet" type="text/css" href="../css/codemirror.min.css" />
  <link rel="stylesheet" href="../css/blackboard.min.css">
  <link rel="stylesheet" href="../css/monokai.min.css">
  <script type="text/javascript" src="../src/js/codemirror.js"></script>
  <script src="../src/js/xml/xml.min.js"></script>
  <script src="../src/js/formatting.min.js"></script>

  <!-- include summernote -->
  <link rel="stylesheet" href="../dist/summernote.css">
  <script type="text/javascript" src="../dist/summernote.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote({
        height: 100,	
        tabsize: 2,
        codemirror: {
          theme: 'monokai'
        }
      });
    });
  </script>
</head>
<body>
<div class="container" style="width:500px;">  
	<div class="summernote"></div>
	
</div>
</body>
</html>
