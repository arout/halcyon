<?php

class Download_Controller extends Hal\Core\SystemController {

	public function index() {

		// $this->data['cache'] = new System\Core\Apc;
		$this->data['param']  = $this->route->param2;
		$data['main_content'] = $this->load->view('static/download', $this->data);
	}

	public function demo() {

		echo '<div class="bs-callout text-center styleSecondBackground">Demo action loaded!!!  :)</div>';
	}

}