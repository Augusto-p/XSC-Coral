<?php

class Autor_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->new();
    }
    public function new() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Autor/add');
        }else {
            $this->view->render('errores/403');
        }
    }
    public function change() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Autor/mod');
        }else {
            $this->view->render('errores/403');
        }
    }
    public function remove() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Autor/del');
        }else {
            $this->view->render('errores/403');
        }
    }
    

}