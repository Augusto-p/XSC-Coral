<?php

require_once 'DTO\editorial.php';
require_once 'utilidades\Imagenes.php';


class Editorial_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('PanelAdmin\Editorial\add');
    }
    public function new() {
        $this->view->render('PanelAdmin\Editorial\add');
    }
    public function change() {
        $this->view->render('PanelAdmin\Editorial\mod');
    }
    
}