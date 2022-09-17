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
    public function add(){
        $editorial = new Editorial();
        $editorial->nombre = $_POST["nombre"];
        $editorial->direccion = $_POST["Direccion"];
        $editorial->telefono = str_replace(" ", "", $_POST["Numero"], $count);
        $editorial->email = $_POST["email"];  
        $editorial->web = $_POST["Web"];
        $editorial->logo = $_FILES["Logo"];

        $id = $this->model->add($editorial);
        
        if ($id >=0) {
            $ImagenEditorial = new Imagenes($editorial->logo, "public/imgs/Editoriales/".$id);
            $path = $ImagenEditorial->Upload();
            $status = $this->model->updateImge($id, $path);
        }

        
    }
    
}