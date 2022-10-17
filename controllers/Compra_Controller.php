<?php


class Compra_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('PanelAdmin/Autor/add');
    }
    public function new () {
        $this->view->render('PanelAdmin/Compra/add');
    }
    public function list() {
        $this->view->render('PanelAdmin/Compra/lista');
    }
    // public function remove() {
    //     $this->view->render('PanelAdmin/Autor/del');
    // }
   

}