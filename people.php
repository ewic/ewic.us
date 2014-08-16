<!DOCTYPE HTML>
<!--

	Parallelism 1.0 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)

-->
<html>
	<head>
		<title>Eric Zhang - RI-Based Photographer</title>
		<meta name="viewport" content="width=1120,user-scalable=no" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script>-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.poptrox-2.1.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
		</noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body>

		<div id="wrapper">

			<div id="main">
				<div id="reel">
				<!-- ******************************************************************************************** -->
				<!-- ******************************************************************************************** -->
				

					<!-- Header Item -->
					
						<div id="header" class="item" data-width="400">
							<h1>people</h1>
						</div>
					
					<!-- Thumb Items -->
					<?php
						echo print_item('people','01');
						echo print_item('people','02');
						echo print_item('people','03');
						echo print_item('people','04',400);
					?>
						

				<!-- ******************************************************************************************** -->
				<!-- ******************************************************************************************** -->

				</div>
			</div>
		
			<div id="footer">
				<div class="left">
					<p>Contact Me: <br />
						e | ewicexclamationpoint@gmail.com <br />
						p | (401)426-1202</p>
				</div>
				<div class="right">
					<ul class="contact">
						<li><a href="https://twitter.com/theewic" class="icon icon-twitter"><span>Twitter</span></a></li>
						<li><a href="http://facebook.com/ewicexclamationpoint" class="icon icon-facebook"><span>Facebook</span></a></li>
						<li><a href="http://flickr.com/photos/ewic" class="icon icon-flickr"><span>Facebook</span></a></li>
					</ul>					
				</div>
			</div>

		</div>

	</body>
</html>

<?php

function print_item($folder,$item,$width="282") {
	$out = '<article class="item thumb" data-width="'.$width.'">';
	$out .= '<h2>'.$item.'</h2>';
	$out .= '<a href="'.$folder.'/fulls/'.$item.'.jpg"><img src="'.$folder.'/thumbs/'.$item.'.jpg" alt=""></a>';
	$out .= '</article>';
	return $out;
}

?>