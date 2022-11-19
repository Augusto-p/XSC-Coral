<?php

require_once 'DTO/editorial.php';
require_once 'models/Usuario_Model.php';
require_once 'utilidades/Imagenes.php';

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
        $this->view->render("API/Editorial/getall");
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
        $this->view->render("API/Editorial/get");

    }

    public function add() {
        //add editor
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
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
            $res = ["mensaje" => "Editorial Ingresado", "code" => 200];
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Editorial/add");

    }

    public function delete() {
        //add editor
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Editorial = $this->model->get($data->Editorial->id);
            unlink($Editorial->logo); // delete image

            if($this->model->delete($data->Editorial->id)){
                $res = ["mensaje" => "Editorial Eliminado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Editorial No Localizado", "code" => 404];
            }
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Editorial/del");
            
        

    }

    public function mod() {
        //add editor
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $editorial = $this->model->get($data->Editorial->ID);
            $editorial->nombre    = $data->Editorial->Nombre != null ? $data->Editorial->Nombre : $editorial->nombre;;
            $editorial->direccion = $data->Editorial->Direccion != null ? $data->Editorial->Direccion : $editorial->direccion;
            $editorial->telefono  = $data->Editorial->Telefono != null ? str_replace(" ", "", $data->Editorial->Telefono, $count) : $editorial->telefono;
            $editorial->email     = $data->Editorial->Email != null ? $data->Editorial->Email : $editorial->email;
            $editorial->web       = $data->Editorial->Web != null ? $data->Editorial->Web : $editorial->web;
            

            if ($data->Editorial->Logo != null) {
                unlink($editorial->logo); // delete image
                $ImagenEditorial = new Imagenes("public/imgs/Editoriales/" . $data->Editorial->ID);
                $editorial->logo = $ImagenEditorial->Upload64($data->Editorial->Logo);
            }
            

            if ($this->model->update($editorial)) {
                $res = ["mensaje" => "Editorial Actualizado", "code" => 200];    
            }else{
                $res = ["mensaje" => "Editorial No Actualizado", "code" => 404];    
            }
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Editorial/mod");

    }

}