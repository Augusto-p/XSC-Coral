<?php

class Errores_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje = "Hay un error al cargar el recurso";
        $this->view->render('errores/index');
    }

    public function render()
    {
        $this->view->mensaje = "cargado";
        $this->view->render('errores/index');
    }

   

}