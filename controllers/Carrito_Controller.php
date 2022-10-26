<?php
require_once 'models/Book_Model.php';
require_once 'DTO/book.php';
require_once 'DTO/carrito.php';

class Carrito_Controller extends Controller{
    public function __construct(){
        parent::__construct();
    }

    public function render(){
        if (!empty($_SESSION['login']) ? $_SESSION['login'] : false) {
            $this->view->render('Carrito/view');
        }else {
            $this->view->render('usuario/login');
        }
    }

   
}
