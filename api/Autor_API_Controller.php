<?php

require_once 'DTO/autor.php';


class Autor_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        //get authors
        $autores = $this->model->getAll();
        $res = [
            "mensaje"   => "Hey",
            "Numero de Autores"     => count($autores),
            "Autores"   => $autores,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Autor\getAll");
    }


    public function get(){
        //get author
        $id = $_GET["ID"];
        $autor = $this->model->get($id);
        $res = [
            "mensaje"   => "Hey",
            "Autor"   => $autor,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Autor\get");
        
    }
}