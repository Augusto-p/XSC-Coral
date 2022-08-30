<?php

require_once 'DTO\editorial.php';


class Editorial_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        //get editors
        $Editoriales = $this->model->getAll();
        $res = [
            "mensaje"   => "Hey",
            "Numero de Editoriales"     => count($Editoriales),
            "Editoriales"   => $Editoriales,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Editorial\getall");
    }


    public function get(){
        //get editor
        $id = $_GET["ID"];
        $editorial = $this->model->get($id);
        $res = [
            "mensaje"   => "Hey",
            "Autor"   => $editorial,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Editorial\get");
        
    }
}