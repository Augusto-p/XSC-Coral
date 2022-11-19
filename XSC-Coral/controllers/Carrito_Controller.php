<?php

class Carrito_Controller extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function render(){
        if (!empty($_SESSION['login']) ? $_SESSION['login'] : false) {
            $this->view->render('Carrito/view');
        }else {
            $this->view->render('Usuario/login');
        }
    }

   
}