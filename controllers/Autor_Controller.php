<?php

require_once 'DTO/autor.php';
require_once 'utilidades\Imagenes.php';


class Autor_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('PanelAdmin\Autor\add');
    }
    public function new() {
        $this->view->render('PanelAdmin\Autor\add');
    }
    public function change() {
        $this->view->render('PanelAdmin\Autor\mod');
    }

    public function add() {
        $autor = new Autor();
        $autor->nombre = $_POST['nombre'];
        $autor->nacionalidad = $_POST['Nacionalidad'];
        $autor->biografia = $_POST['Biografia'];
        $autor->Fnacimento = $_POST['FNacimiento'];
        $imgin              = $_FILES["Foto"];
    
        $id = $this->model->add($autor);
        if ($id >=0) {
            $ImagenAutor = new Imagenes($imgin, "public/imgs/Autores/".$id);
            $path = $ImagenAutor->Upload();
            $status = $this->model->updateImge($id, $path);
            if ($status) {
                echo "";
                //mover a pagina de errror
            }
        }else {
            echo "";
            //mover a pagina de error
        }
        

    }
    
}