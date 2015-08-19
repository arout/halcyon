<?php

class Welcome_Controller extends Fusion\System\SystemController {

	/**
	 * [__construct description]
	 * @param [object] $container [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a 
	 * given controller.
	 * The $container var must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct( $container ) {

		parent::__construct( $container );

	}

	public function index() {

		$this->load->view('welcome/requirements');
	}
}