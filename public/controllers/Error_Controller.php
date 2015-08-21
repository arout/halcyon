<?php

class Error_Controller extends Fusion\System\SystemController {
    
    // Error type ( 403, 404, 500, etc )
    public $type;
    
    public function index() {
        
        $this->load->view('errors/index');
    }
    
    public function _403() {
        
        $this->type = 403;
        $this->load->view('errors/error_403');
    }
    
    public function _404() {
        
        $this->type = 404;
        $this->load->view('errors/error_404');
    }
    
    public function _500() {
        
        $this->type = 500;
        $this->load->view('errors/error_404');
    }

}