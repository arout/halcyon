<div class="row">
<div class="white-row-shadow">

        <div class="bs-callout text-center styleRedBackground">
		    <h1><i class="fa fa-bug"></i> Oops, Page Not Found</h1>
        </div>
        
        <p class="lead text-center">The page you were looking for does not exist, or may have been moved.</p>
            
		<p>
			<h4>From here, you can:</h4>
			<a href="<?=BASEURL;?>"><button class="btn btn-large btn-info">Go to the site home page</button></a> 
			<?php if( isset( $_SERVER['HTTP_REFERER']) ) { ?>
			<a href="<?= $_SERVER['HTTP_REFERER'];?>"><button class="btn btn-large btn-primary">Go back to the last page you were on</button></a>
			<?php } ?>
		</p>
		<p>
			If you followed a link, or submitted a form, and are seeing this message, please <a href="<?= BASEURL;?>contact/support">report this problem</a> to our team.
		</p>

		<div class="e404 text-right">404</div>

	</div>
</div>
