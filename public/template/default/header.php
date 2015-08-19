<?php header("Expires: Sat, 31 Jul 2016 05:00:00 GMT"); ?>
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->
<html>
<!--<![endif]-->
<head>
<meta charset="utf-8" />
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

<link href="<?= TEMPLATE_URL; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/plugins/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/plugins/owl-carousel/owl.theme.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/plugins/owl-carousel/owl.transitions.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/plugins/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/animate.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/superslides.css" rel="stylesheet" type="text/css" />
<!-- REVOLUTION SLIDER
		<link href="<?= TEMPLATE_URL; ?>assets/plugins/revolution-slider/css/captions.css" rel="stylesheet" type="text/css" />
		<link href="<?= TEMPLATE_URL; ?>assets/plugins/revolution-slider/css/settings.css" rel="stylesheet" type="text/css" />
        -->
<link href="<?= TEMPLATE_URL; ?>assets/css/essentials.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/layout.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/layout-responsive.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/color_scheme/darkgreen.css" rel="stylesheet" type="text/css" />
<link href="<?= TEMPLATE_URL; ?>assets/css/custom.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/modernizr.min.js"></script>
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery-2.1.1.min.js"></script>
</head>
<body>
<header id="topHead" class="color">
    <div class="container"> <span class="quick-contact pull-left hidden-xs"> <i class="fa fa-film"></i> &nbsp;<a href="<?= BASEURL; ?>">
        <?= $this->config->setting['site_slogan']; ?>
        </a> </span>
        <?php if( $container['session']->get('email') === FALSE ): ?>
        
        <div class="pull-right nav signin-dd"> <a id="quick_sign_in" href="<?= BASEURL; ?>login" data-toggle="dropdown"><i class="fa fa-users"></i><span> Sign In</span></a>
            <div class="dropdown-menu" role="menu" aria-labelledby="quick_sign_in">
                <h4>Sign In</h4>
                <form action="<?= BASEURL; ?>login/login_validate" method="post" role="form">
                    <div class="form-group">
                        <input required type="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input required type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <?php if( $this->config->setting['login_math'] === TRUE ): ?>
                    <?php $data['a'] = rand(1, 5); $data['b'] = rand(1, 5); ?>
                    <div class="input-group">
                        <input type="text" class="form-control" required=required name="math" placeholder="<?= $data['a']; ?> x <?= $data['b']; ?> =">
                        <span class="input-group-btn">
                        <button class="btn btn-primary">Sign In</button>
                        </span> </div>
                    <input type="hidden" name="math_answer" value="<?= $data['a']*$data['b']; ?>">
                    <?php endif; ?>
                </form>
                <hr />
                <a href="#" class="btn-facebook fullwidth radius3"><i class="fa fa-facebook"></i> Connect With Facebook</a> 
                <!-- <a href="#" class="btn-twitter fullwidth radius3"><i class="fa fa-twitter"></i> Connect With Twitter</a> --> 
                <!--<a href="#" class="btn-google-plus fullwidth radius3"><i class="fa fa-google-plus"></i> Connect With Google</a>-->
                
                <p class="bottom-create-account"> <a href="<?= BASEURL; ?>member/signup">Create an Account</a> </p>
            </div>
        </div>
        
        <?php else: ?>
        
        <div class="pull-right nav signin-dd"> <a id="profile" href="<?= BASEURL;?>member/profile/edit" data-toggle="dropdown"> <i class="fa fa-user"></i><span class="hidden-xs"> Logged in as
            <?= $container['session']->get('first_name'); ?>
            <?= $container['session']->get('last_name'); ?>
            </span></a>
            <div class="dropdown-menu" role="menu" aria-labelledby="profile">
                <p> <a href="<?= BASEURL;?>member/profile/edit" class="btn-facebook fullwidth radius3"><i class="fa fa-edit"></i> Edit Profile</a> 
                    <!-- <a href="#" class="btn-twitter fullwidth radius3"><i class="fa fa-twitter"></i> Connect With Twitter</a> --> 
                    <!--<a href="#" class="btn-google-plus fullwidth radius3"><i class="fa fa-google-plus"></i> Connect With Google</a>--> 
                </p>
                <p class="bottom-create-account"> <a href="<?= BASEURL; ?>login/logout"><i class="fa fa-power-off"></i> Logout</a> </p>
            </div>
        </div>
        
        <?php endif; ?>
        
        <!-- CART MOBILE BUTTON
	<a class="pull-right" id="btn-mobile-quick-cart" href="shop-cart.html"><i class="fa fa-shopping-cart"></i></a>
	-->
        
        <div class="pull-right nav">
            <a href="<?= BASEURL; ?>support/docs/index"><i class="fa fa-edit"></i><span class="hidden-xs">Documentation</span></a> 
            <?php if( $container['session']->get('email') !== FALSE ): ?>
            <a href="<?= BASEURL; ?>messenger"><i class="fa fa-comments"></i><span class="hidden-xs"> Messenger</span></a>
            <?php endif; ?>
        </div>
        
    </div>
</header>
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
<div id="wrapper" class="bg10">

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

<?php else: ?>

<p><br></p>

<?php endif; ?>
<div class="container">

<!-- Facebook login
    <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="true" data-auto-logout-link="false"></div>
-->