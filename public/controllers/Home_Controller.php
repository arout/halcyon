<?php

class Home_Controller extends Hal\Core\SystemController {

	/**
	 * [__construct description]
	 * @param [object] $container [Instance of Pimple]
	 *
	 * Often, an individual controller will need a constructor.
	 * Below is an example of creating the __construct() for a
	 * given controller.
	 * The $app variable must be passed to the construct method,
	 * and again to the parent::__construct() method call
	 */
	public function __construct($app) {

		parent::__construct($app);

	}

	public function index() {

		echo '<h3>Order of services loaded</h3>';
		foreach (\Hal\Core\Registry::$registry as $service) {
			echo $service . '<br>';
		}
		$this->load->view('home/requirements');

	}

}