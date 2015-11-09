<?php

class Support_Controller extends Hal\Core\SystemController {

	public function index() {

		$this->load->view('support/docs/index');
	}

	public function docs() {

		$this->index();
	}

	public function faq() {

		$this->load->view('support/docs/faq');
	}

	public function toolbox() {

		$this->load->view('support/docs/toolbox/index');
	}
}