<?php
namespace Hal\Toolbox;

class Slider {

	// Loader
	private $load;
	private $session;
	public $sliders = [];

	public function __construct($c) {

		$this->load    = $c['load'];
		$this->session = $c['session'];

	}

	public function load() {

		$slider = $this->session->get('slider');
		return $this->load->view("sliders/$slider");

	}

	public function get() {

		return $this->sliders;

	}

	public function destroy() {

		if ($this->session->get('slider')) {
			return $this->session->delete('slider');
		}

	}

	public function display($slider) {

		if ($this->session->verify('slider') === TRUE) {
			$this->session->delete('slider');
		}

		return $this->session->set('slider', $slider);

	}
}