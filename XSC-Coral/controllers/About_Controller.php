<?php

class About_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->us();
    }
    public function us() {
        $this->view->render('About/AboutUs');
        
    }
    
}