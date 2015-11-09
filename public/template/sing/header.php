<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="<?=TEMPLATE_URL;?>assets/css/application.min.css" rel="stylesheet">
	    <!-- as of IE9 cannot parse css files with more that 4K classes separating in two files -->
	    <!--[if IE 9]>
	        <link href="<?=TEMPLATE_URL;?>assets/css/application-ie9-part2.css" rel="stylesheet">
	    <![endif]-->

		<title><?=$this->toolbox('title')->get();?></title>
		<meta name="keywords"       content="Tech Blog | PHP Tutorials | Free Software Downloads" />
		<meta name="description"    content="MVC Framework for PHP 5.5+" />
		<meta name="Author"         content="Andrew Rout" />
		<meta name="viewport"       content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />
		<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
		<meta http-equiv="cleartype" content="on">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script>
        /* yeah we need this empty stylesheet here. It's cool chrome & chromium fix
         chrome fix https://code.google.com/p/chromium/issues/detail?id=167083
         https://code.google.com/p/chromium/issues/detail?id=332189
         */
    </script>
	</head>
	<!-- sn-demo directive enables all functions which are used for demo. e.g. animating notifications count, chat unread messages.
	     to be removed in real app-->
	<body>

<?php
//if (!$this->session->get('email')) {
	require_once ('nav-visitor.php');
//} else {
//	require_once ('nav-loggedin.php');
//}

?>

<div class="content-wrap">
    <!-- main page content. the place to put widgets in. usually consists of .row > .col-md-* > .widget.  -->
    <main id="content" class="content" role="main">

	<!-- The Loader. Is shown when pjax happens -->
<div class="loader-wrap hiding hide">
    <i class="fa fa-circle-o-notch fa-spin-fast"></i>
</div>

<!-- common libraries. required for every page-->
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery-pjax/jquery.pjax.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/transition.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/collapse.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/dropdown.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/button.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/tooltip.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/alert.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/widgster/widgster.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/pace.js/pace.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery-touchswipe/jquery.touchSwipe.js"></script>

<!-- common app js -->
<script src="<?=TEMPLATE_URL;?>assets/js/settings.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/js/app.js"></script>

<!-- page specific libs -->
<script id="test" src="<?=TEMPLATE_URL;?>assets/vendor/underscore/underscore.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery.sparkline/index.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery.sparkline/index.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/d3/d3.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/rickshaw/rickshaw.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/raphael/raphael-min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jQuery-Mapael/js/jquery.mapael.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jQuery-Mapael/js/maps/usa_states.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jQuery-Mapael/js/maps/world_countries.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap-sass/assets/javascripts/bootstrap/popover.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/bootstrap_calendar/bootstrap_calendar/js/bootstrap_calendar.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/vendor/jquery-animateNumber/jquery.animateNumber.min.js"></script>

<!-- page specific js -->
<script src="<?=TEMPLATE_URL;?>assets/vendor/js/index.js"></script>
