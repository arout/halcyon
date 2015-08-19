<?php

class Error_Controller extends Fusion\System\SystemController {
    
    // Error type ( 403, 404, 500, etc )
    private $type;
    
    public function index() {
        
        $this->load->view('errors/index');
    }
    
    public function _403() {
        
        $this->load->view('errors/error_403');
    }
    
    public function _404() {
        
        $this->load->view('errors/error_404');
    }
    
    public function _500() {
        
        $this->load->view('errors/error_404');
    }
}
