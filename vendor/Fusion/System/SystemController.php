<?php
namespace Fusion\System;

/**
 * File:    /vendor/Fusion/System/SystemController.php
 * Purpose: Base class from which all controllers extend
 */

class SystemController {

	// use Loader;
	protected $db;
	private $controller;
	private $controller_class;
	private $controller_filename;
	protected $param;
	protected $route;
	protected $model;
	public $view;
	protected $action;
	protected $config;
	protected $data;
	public $session;
	public $helper;
	// Input sanitation class
	public $input;
	public $cache;
	public $toolbox;
	public $load;

	public function __construct(\Pimple\Container $container) {

		$this->db      = $container['database'];
		$this->config  = $container['config'];
		$this->route   = $container['router'];
		$this->model   = $container['system_model'];
		$this->load    = $container['load'];
		$this->toolbox = $container['toolbox'];
		$this->session = self::session();
		$this->input   = self::input();
		$this->cache   = self::cache();
	}

	public final function dispatch( $container ) {

		// Define child controller being worked with
		$this->controller = $this->route->controller;
		// The class name contained inside child controller
		$this->controller_class = $this->controller;
		// File name of child controller
		$this->controller_filename = ucwords($this->controller).'.php';
		// Action being requested from child controller
		$this->action = $this->route->action;
		$action       = trim(strtolower($this->route->action));
		// URL parameters
		$this->param = $this->route->param;

		// Search for requested controller file
		if (is_readable(CONTROLLERS_DIR.$this->controller_filename)) {
			// File was found and has proper file permissions
			require_once CONTROLLERS_DIR.$this->controller_filename;

			if (class_exists($this->controller_class)) {
				// File found and class exists, so instantiate controller class
				$__instantiate_class = new $this->controller_class($container);

				if (method_exists($__instantiate_class, $action)) {
					// Class method exists
					$__instantiate_class->$action();
				} else {
					// Valid controller, but invalid action
					$this->load->viewerror('errors/action', $this->controller_filename, $this->data, $this->route);
				}
			} else {
				// Controller file exists, but class name
				// is not formatted / spelled properly
				$this->data['controller-error'] = 'Controller file exists, but class name is not formatted / spelled properly';
				$this->load->viewerror('errors/controller-bad-classname', $this->data['file'], $this->data, $this->route);
			}
		} else {

			// Controller file does not exist, or
			// does not have read permissions (644)
			$this->load->view('errors/controller', $this->route);
		}
	}

	public function cache() {

		// return \Application::run('Cache');
	}

	public function input() {

		return $this->toolbox["sanitize"];
	}

	public function model($model) {
		return $this->load->model("$model");
	}

	public function redirect($url) {

		if (strpos($url, 'http://')) {
			return header('Location: '.$url);
		} elseif (strpos($url, 'https://')) {
			return header('Location: '.$url);
		} else {

			return header('Location: '.BASEURL.$url);
		}
	}

	public function session() {

		return $this->toolbox('session');
	}

	public function toolbox($helper) {

		# Load a Toolbox helper
		return $this->toolbox["$helper"];
	}

}