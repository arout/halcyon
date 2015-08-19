<?php
namespace Fusion\System;

class Template{
	
	public $config;
	public $data = [];
	public $route;
	public $load;
	public $cache;
    public $toolbox;

	public function __construct( $c, $data ) {
		
		$this->config 	= $c['config'];
		$this->route 	= $c['router'];
		$this->load 	= $c['load'];
		$this->view 	= $c['view'];
		$this->data 	= $data;
        $this->toolbox 	= $c['toolbox'];
		$this->cache 	= self::cache();
	}

	public function cache() {
		// return \Application::run('Session');
	}
	
	public function page() {
		
	}
	
	public function header( $container ) {
		
		if( is_readable(TEMPLATE_BASE_PATH.'header.php') ) {
			require_once TEMPLATE_BASE_PATH.'header.php';
		}
		else
			$this->load->view('error/template_header');
	}
	
	public function footer( $container ) {

		if(is_readable(TEMPLATE_BASE_PATH.'footer.php'))
			require_once TEMPLATE_BASE_PATH.'footer.php';
		else
			$this->load->view('error/template_footer');
	}
    
    public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}
}