<?php

require_once 'DTO\editorial.php';
require_once 'models\Usuario_model.php';
require_once 'utilidades\Imagenes.php';

class Editorial_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        //get editors
        $Editoriales = $this->model->getAll();
        $res         = [
            "mensaje"               => "Hey",
            "Numero de Editoriales" => count($Editoriales),
            "Editoriales"           => $Editoriales,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Editorial\getall");
    }

    public function get() {
        //get editor
        $id        = $_GET["ID"];
        $editorial = $this->model->get($id);
        $res       = [
            "mensaje"   => "Hey",
            "Editorial" => $editorial,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API\Editorial\get");

    }

    public function add() {
        //add editor
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $editorial            = new Editorial();
            $editorial->nombre    = $data->Editorial->Nombre;
            $editorial->direccion = $data->Editorial->Direccion;
            $editorial->telefono  = str_replace(" ", "", $data->Editorial->Telefono, $count);
            $editorial->email     = $data->Editorial->Email;
            $editorial->web       = $data->Editorial->Web;
            $editorial->logo      = $data->Editorial->Logo;
            $id                   = $this->model->add($editorial);

            if ($id >= 0) {
                $ImagenEditorial = new Imagenes("public/imgs/Editoriales/" . $id);
                $path            = $ImagenEditorial->Upload64($editorial->logo);
                $status          = $this->model->updateImge($id, $path);
            }
            $res             = ["mensaje" => "Hey Editorial Ingresado"];
            $this->view->res = json_encode($res);
            $this->view->render("API\Editorial\add");

        } else {
            echo "error";
        }

    }
}