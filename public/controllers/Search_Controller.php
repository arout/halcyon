<?php

class Search_Controller extends Hal\Core\SystemController {

	public function index() {

		$content = VIEWS_DIR . 'welcome/index.php';
		$this->toolbox('search')->save_page("Testing again", $content, 'http://localhost/halcyon');
		$this->load->view('search/index');
		// $this->load->template('content', $data);
	}

	public function docs() {

		$this->toolbox('search')->display_page(BASEPATH . 'public/views/welcome/index.php', 'Welcome');
		$this->load->view('search/index');
	}

}