<?php

class Index_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function render()
    {
        $this->view->render('home/index');
    }

   
}
