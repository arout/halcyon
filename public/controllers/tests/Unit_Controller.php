<?php
namespace Fusion\Unit;

class Unit_Controller extends \Hal\Core\UnitController {

	public function index() {
		$this->view('welcome/index', $data = NULL);
	}

}