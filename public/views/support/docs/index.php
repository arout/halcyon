<?php
$_app 	        = new \Pimple\Container();
$_app['router'] = function ($c) {
							    return @new Fusion\System\Router;
							};

if( ! isset( $_app['router']->param1 ) || $_app['router']->param1 === 'index' )
    $this->view('support/toc');