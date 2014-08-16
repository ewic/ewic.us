<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="style.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <div class="container-fluid">
  	<div class="navbar-header">
  		<div id="toggle-sidebar"></div>
	</div>
  </div>
    <div class="row">
      <div class="collapse col-md-2" id="sidebar-main">
    	<div class="sidebar">
    		<ul class="nav nav-sidebar">
    			<li><a href=#>Test</a></li>
    		</ul>
    		<ul class="nav nav-sidebar">
    			<li><a href=#>Test</a></li>
    		</ul>
    	</div>
      </div>

    	<div class="col-sm-3 col-md-2" id="sidebar-icons">
    		<ul class="nav nav-sidebar">
    			<li><a href=#>Test</a></li>
    		</ul>
    		<ul class="nav nav-sidebar">
    			<li><a href=#>Test</a></li>
    		</ul>
    	</div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

	<!-- Latest compiled and minified JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

	<script type="text/JavaScript">
	$("#toggle-sidebar").click(function() {
		$("#sidebar-main").animate({width: 'toggle'});
	});
	</script>
  </body>
</html>