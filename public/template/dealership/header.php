<?php header("Expires: Sat, 31 Jul 2016 05:00:00 GMT");?>
<!doctype html>
<!--[if IE 7 ]> <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="keywords"       content="Tech Blog | PHP Tutorials | Free Software Downloads" />
<meta name="description"    content="MVC Framework for PHP 5.5+" />
<meta name="Author"         content="Andrew Rout" />
<!-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading -->
<meta http-equiv="cleartype" content="on">
<meta name="HandheldFriendly" content="True">
<meta name="MobileOptimized" content="320">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<link rel="shortcut icon" href="images/favicon.ico">
<title><?=$this->toolbox('title')->get();?></title>
<link href="<?=TEMPLATE_URL;?>assets/css/bootstrap.min.css" rel="stylesheet">

<!-- HTML5 shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="<?=TEMPLATE_URL;?>assets/js/html5shiv.js"></script>
      <script src="<?=TEMPLATE_URL;?>assets/js/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Yellowtail%7COpen%20Sans%3A400%2C300%2C600%2C700%2C800" media="screen" />
<!-- Custom styles for this template -->
<link href="<?=TEMPLATE_URL;?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link rel="stylesheet" href="<?=TEMPLATE_URL;?>assets/css/flexslider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?=TEMPLATE_URL;?>assets/css/jquery.bxslider.css" type="text/css" media="screen" />
<link href="<?=TEMPLATE_URL;?>assets/css/jquery.fancybox.css" rel="stylesheet">
<link href="<?=TEMPLATE_URL;?>assets/css/jquery.selectbox.css" rel="stylesheet">
<link href="<?=TEMPLATE_URL;?>assets/css/style.css" rel="stylesheet">
<link href="<?=TEMPLATE_URL;?>assets/css/mobile.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?=TEMPLATE_URL;?>assets/css/settings.css" media="screen" />
<link href="<?=TEMPLATE_URL;?>assets/css/animate.min.css" rel="stylesheet">
<link href="<?=TEMPLATE_URL;?>assets/css/ts.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/jquery.min.js"></script>
<script src="<?=TEMPLATE_URL;?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/wow.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key&amp;sensor=false"></script>

<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
            (Load Extensions only on Local File Systems !
            The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/extensions/revolution.extension.video.min.js"></script>

<!-- Twitter Feed Scripts
     Uncomment to activate -->

<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/twitter/twitter_feed.js"></script>
<script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/twitter/jquery.tweet.js"></script>

</head>

<body>

<?php
/**
 * This is where we set the sliders
 *
 * ==Format==
 *
 * 'controller/action'  =>  'filename-of-slider'
 *
 */
$sliders = [
	'home/index' => 'homepage',
	'login'      => 'whyregister',
];

$this->toolbox('slider')->load($sliders);

// Count unread messages
//$data['count_messages'] = $this->toolbox('messenger')->count_unread();
// Get unread mail
//$data['unread_messages'] = $this->toolbox('messenger')->view_unread();

if ($app['session']->get('email') === FALSE) {
	$this->load->view('../template/' . $this->config->setting['template_name'] . '/nav-visitor');
} else {

	$this->load->view('../template/' . $this->config->setting['template_name'] . '/nav-loggedin');
}

?>

<div class="clearfix"></div>

<section class="content">
    <div class="container">
        <div class="inner-page homepage margin-bottom-none">
<!--
      <div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="true" data-auto-logout-link="false"></div>
-->
        <!-- tinymce
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="<?=TEMPLATE_URL;?>assets/js/tinymce/jquery.tinymce.min.js"></script>
        <script>
    tinymce.init({
      selector: "textarea#elm1",
      theme: "modern",
      width: 1200,
      height: 700,
      plugins: [
         "advlist autolink bbcode link image lists charmap print preview hr anchor pagebreak spellchecker",
         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
         "save table contextmenu directionality emoticons template paste textcolor"
       ],
       content_css: "<?=TEMPLATE_URL;?>assets/js/tinymce/skins/lightgray/content.min.css",
       toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l ink image | print preview media fullpage | forecolor backcolor emoticons",
       theme_advanced_fonts : "Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n",
       theme_advanced_font_sizes : "10px,12px,14px,16px,18px,21px,24px,28px,36px,48px",
       theme_advanced_layout_manager : "RowLayout",
       style_formats: [
          {title: 'Headline', block: 'h1', styles: {color: '#000000'}},
        {title: 'Sub title', block: 'h3', styles: {color: '#7a7a7a'}},
        {title: 'Bold text', inline: 'b'},
        {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
        {title: 'Example 1', inline: 'span', classes: 'example1'},
        {title: 'Example 2', inline: 'span', classes: 'example2'},
        {title: 'Table styles'},
        {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
      ]
     });
    </script>
    -->

    <!-- CKEditor
    <script type="text/javascript" src="<?=PLUGINS_URL;?>ckeditor/ckeditor.js"></script>
        -->