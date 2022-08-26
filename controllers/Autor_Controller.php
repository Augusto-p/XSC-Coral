<?php

require_once 'DTO/autor.php';


class Autor_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function render() {
        $this->view->render('Autor/new');
    }

    public function add() {
        $autor = new Autor();
        $autor->nombre = $_POST['Nombre'] ." ". $_POST['Apellido'];
        $autor->nacionalidad = $_POST['Pais'];
        $autor->biografia = $_POST['Biografia'];
        $autor->Fnacimento = $_POST['FNacimento'];
        $imgin              = $_FILES["Imagenes"];
    
        $id = $this->model->add($autor);
        if ($id >=0) {
            $NameI = basename($imgin["name"]); //nombre de la imagen
            $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
            $Types = ['jpg', 'png', 'jpeg', 'gif']; //lista de formatos aceptados
            if (in_array($TypeI, $Types)) { //verifica que el formato de la imagen este soportado
                $img  = $imgin['tmp_name']; //obtiene el archivo temporal de la imagen
                $path = "public/imgs/Autores/".$id. "." . $TypeI; //ruta de la imagen
                move_uploaded_file($img, $path); //mover la imagen a la ruta especificada
            }
        }
        $status = $this->model->updateImge($id, $path);

    }
    public function new() {
        $this->view->render('Autor/new');
    }
}