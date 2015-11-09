<!DOCTYPE html>
<html>
	<head>

		<!-- Basic -->
		<meta charset="utf-8">
		<title><?= $this->toolbox('title')->get(); ?></title>		
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

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/owlcarousel/owl.carousel.min.css" media="screen">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/owlcarousel/owl.theme.default.min.css" media="screen">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/theme.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/theme-elements.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/theme-blog.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/theme-shop.css">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/theme-animate.css">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/rs-plugin/css/settings.css" media="screen">
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/vendor/circle-flip-slideshow/css/component.css" media="screen">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/custom.css">

		<!-- Head Libs -->
		<script src="<?= TEMPLATE_URL; ?>assets/vendor/modernizr/modernizr.js"></script>

		<!--[if IE]>
			<link rel="stylesheet" href="<?= TEMPLATE_URL; ?>assets/css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="<?= TEMPLATE_URL; ?>assets/vendor/respond/respond.js"></script>
			<script src="<?= TEMPLATE_URL; ?>assets/vendor/excanvas/excanvas.js"></script>
		<![endif]-->

	</head>
	<body>
		<div class="body">
			
			<?php
		        // Count unread messages
		        $data['count_messages'] = $this->toolbox('messenger')->count_unread();
		        // Get unread mail
		        $data['unread_messages'] = $this->toolbox('messenger')->view_unread();
		        
		        if( $container['session']->get('email') === FALSE )
					$this->load->view('../template/'.$this->config->setting['template_name'].'/nav-visitor', $data);
				else
					$this->load->view('../template/'.$this->config->setting['template_name'].'/nav-loggedin', $data);
			?>
			<p><br></p><p><br></p><p><br></p>
			<?php if( $this->config->setting['breadcrumbs'] === TRUE ): ?>

			<?php require( VENDOR_PATH.'Fusion/Toolbox/Breadcrumbstitles.php' );?>
			<!-- Use large images for breadcrumbs background -->
			<header style="background-image:url('<?= TEMPLATE_URL; ?>assets/images/bg/pr09studio_bringmetolife.png')" id="page-title">
			    <!-- Enable overlay only if bright background image used -->
				<span class="overlay"></span>
				
			    <div class="container">
			        <h1>
			            <?php if( function_exists("Breadcrumbstitles") ): ?>
			                <?= $this->toolbox('breadcrumbs')->title( Breadcrumbstitles($container) ); ?>
			            <?php else: ?>
			                <?= $this->toolbox('breadcrumbs')->title(); ?>
			            <?php endif; ?>
			        </h1>
			        <ul class="breadcrumb">
			            <?= $this->toolbox('breadcrumbs')->show(); ?>
			        </ul>
			    </div>
			</header>

			<?php endif; ?>

			<div role="main" class="main">
			<div class="container">