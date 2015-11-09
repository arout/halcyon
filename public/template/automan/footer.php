<!--
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=1429084537339062&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
-->
</div>
<!-- /CONTAINER -->

</div>
<!-- /WRAPPER -->

<!-- FOOTER -->

<footer> 
    
    <!-- FB Like , scrollTo Top 
			<div class="footer-bar">
				<div class="container">
					<span class="copyright">
					<div class="fb-like" data-href="http://kwfusion.com/" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
					
					</span>
					<a class="toTop" href="#topNav">BACK TO TOP <i class="fa fa-arrow-circle-up"></i></a>
				</div>
			</div>
			<!-- copyright , scrollTo Top --> 
    
    <!-- footer content -->
    <div class="footer-content">
        <div class="container">
            <div class="row"> 
                
                <!-- FOOTER CONTACT INFO -->
                <div class="column col-md-4">
                    <h3>Current Software Version <br>
                        <small>Release version
                        <?= $this->config->setting['software_version']; ?>
                    </h3>
                    <p class="contact-desc"><i class="fa fa-download"></i> <a>Download kW Fusion</a> </p>
                    <address class="font-opensans">
                    <ul>
                        <i class="fa fa-cloud"></i> <strong>Previous versions</strong>
                        </li>
                        <li> N/A </li>
                    </ul>
                    </address>
                </div>
                <!-- /FOOTER CONTACT INFO --> 
                
                <!-- FOOTER LOGO -->
                <div class="column logo col-md-4 text-center">
                    <div class="logo-content">
                        <h3>Follow</h3>
                        <img class="animate_fade_in" src="<?= TEMPLATE_URL; ?>assets/images/logo/logo.png" width="200" alt="" />
                        <h4 style="font-family: Audiowide">FRAMEWORK</h4>
                        <a href="https://www.facebook.com/kwfusion" class="social fa fa-facebook"></a> <a href="https://twitter.com/kw_fusion" class="social fa fa-twitter"></a> <a href="#" class="social fa fa-google-plus"></a> </div>
                </div>
                <!-- /FOOTER LOGO --> 
                
                <!-- FOOTER LATEST POSTS -->
                <div class="column col-md-4 text-right">
                    <h3>NEWS</h3>
                    <div class="post-item"> <small>STAY TUNED</small>
                        <h3><a href="">We will update you as soon as possible!</a></h3>
                    </div>
                    <a href="" class="view-more pull-right">View Blog <i class="fa fa-arrow-right"></i></a> </div>
                <!-- /FOOTER LATEST POSTS --> 
                
            </div>
        </div>
    </div>
    <!-- footer content -->
    <div class="footer-bar">
        <div class="container text-center"> Script execution time: <code class="terminal"><?php echo $this->config->setting['execution_time']; ?></code> seconds. Memory usage: <code class="terminal">
            <?php
                            function convert($size) {
                                
                                $unit = ['b','kb','mb','gb','tb','pb'];
                                return round( $size/pow( 1024, ( $i = floor( log( $size, 1024 ) ) ) ), 2 ).' '.$unit[$i];
                            }
                            
                            echo convert( memory_get_peak_usage(true) ); // 123 kb
                            ?>
            </code> <br />
            <small>kW Fusion is licensed and distributed under GNU GENERAL PUBLIC LICENSE v3 by <a href="https://twitter.com/arout77">Andrew Rout</a><br />
            <a class="terminal" href="<?= BASEURL; ?>support/license">Learn more</a></small> </div>
    </div>
</footer>
<!-- /FOOTER --> 

<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery.easing.1.3.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery.cookie.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery.appear.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery.isotope.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/masonry.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/magnific-popup/jquery.magnific-popup.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/owl-carousel/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/stellar/jquery.stellar.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/knob/js/jquery.knob.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/jquery.backstretch.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/superslides/dist/jquery.superslides.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/mediaelement/build/mediaelement-and-player.min.js"></script> 

<!-- REVOLUTION SLIDER --> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/revolution-slider/js/jquery.themepunch.plugins.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/plugins/revolution-slider/js/jquery.themepunch.revolution.min.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/js/slider_revolution.js"></script>

<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/js/scripts.js"></script> 
<script type="text/javascript" src="<?= TEMPLATE_URL; ?>assets/js/tablesorter.js"></script>

<?php # Gritter ?>
<link rel="stylesheet" type="text/css" href="<?= PLUGINS_URL; ?>gritter/css/jquery.gritter.css" />
<script type="text/javascript" src="<?= PLUGINS_URL; ?>gritter/js/jquery.gritter.js"></script>

<!-- Form validation -->
<link rel="stylesheet" href="<?= PLUGINS_URL; ?>form-validation/dist/css/bootstrapValidator.css"/>
<script type="text/javascript" src="<?= PLUGINS_URL; ?>form-validation/dist/js/bootstrapValidator.min.js"></script>

<!-- Check for new messages
<script>
function request() {
        
    setTimeout( function(){
        
        $.ajax({
            url: "<?= BASEURL; ?>public/plugins/ajax/messenger/check_new_messages.php",
            type:"post",
            data:"rid=<?= $this->toolbox('session')->get('member_id'); ?>",
            success:function(data)
            {
                if(data) {
                
                    $("#new_message_alert").html(data);

                        $.gritter.add({
				        // (string | mandatory) the heading of the notification
				        title: 'New Message',
				        // (string | mandatory) the text inside the notification
				        text: data,
				        sticky: false,
				        before_open: function(){
                                if($('.gritter-item-wrapper').length == 1) // Only allow one popup to be displayed at a time
                                {
                                    // Returning false prevents a new gritter from opening
                                    return false;
                                }
                            }
			            });
			    }

            },
            // Restart the function after response sent
            complete: request()
                        
        });
    }, 5000); // Check for new messages every 5 seconds
}
// Initiate the request() function
request();
</script>
-->

<!-- Update unread message badges -->
<script>
function update_unread_total( elemid ) {
$.ajax(
    {
        url: "<?= BASEURL; ?>public/plugins/ajax/messenger/update_unread_count.php",
        type: "post",
        data: {rid:"<?php echo $this->toolbox('session')->get('member_id'); ?>"},
        success:function(response)
        {
            $( "#" + elemid ).html(response);
        }
   });
}
</script>

<?php 
# Fetch JS functions. Stored in js.php to clean up footer code
include_once('js.php');
?>

</body></html><?php ob_end_flush(); ?>