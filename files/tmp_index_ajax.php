<html>
<head>
<link rel="stylesheet" type="text/css" href="res/style.css">
<title>
Home - Virtual Dom(me)
</title>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="main_ajax.js"></script>
</head>
<body>
<div id="head">
<h1>Virtual Dom(me)</h1>
</div>

<div id="head2">
  <script type="text/javascript"> 
  // load some quote on load....
  // cool loading animation and stuff is still missing
  load2div("func2ajax","Quote","?fid=1")
  </script>
  <div id="Quote_div">stuff gets loaded in here</div>
</div>

<div id="body">
<a href="#Quote" id="load-1-func2ajax-fid" class="lbutton2div">Load new Quote</a>
</div>

</body>
</html>
