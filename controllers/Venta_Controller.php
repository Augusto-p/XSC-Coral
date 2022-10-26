<?php
class Venta_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->list();
    }
    public function list() {
        if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render('PanelAdmin/Venta/lista');
        }else {
            $this->view->render('errores/403');
        }
    }

}