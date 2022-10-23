<?php


class Compra_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Compra/lista');
        }else {
            $this->view->render('errores/403');
        }
    }
    public function new () {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Compra/add');
        }else {
            $this->view->render('errores/403');
        }
    }
    public function list() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Compra/lista');
        }else {
            $this->view->render('errores/403');
        }
    }

}