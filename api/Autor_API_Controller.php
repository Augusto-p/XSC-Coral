<?php

require_once 'DTO/autor.php';
require_once 'models/Usuario_model.php';
require_once 'utilidades/Imagenes.php';


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
        $this->view->render("API/Autor/getAll");
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
        $this->view->render("API/Autor/get");
        
    }
    public function add(){
        //add author
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $autor            = new Autor();
            $autor->nombre = $data->Autor->Nombre;
            $autor->nacionalidad = $data->Autor->Nacionalidad;
            $autor->biografia = $data->Autor->Biografia;
            $autor->Fnacimento = $data->Autor->Fnacimento;
            $autor->foto = $data->Autor->foto;

            //$id=5;
            $id = $this->model->add($autor);

            if ($id >= 0) {
                $ImagenAutor = new Imagenes("public/imgs/Autores/" . $id);
                $path            = $ImagenAutor->Upload64($autor->foto);
                $status          = $this->model->updateImge($id, $path);
                $res             = ["mensaje" => "Autor Ingresado", "code" => 200];
            }else{
                $res             = ["mensaje" => "Autor No Ingresado", "code" => 404];
            }
            
            

        } else {
            $res             = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Autor/add");

    }

    public function delete(){
        //add author
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $autor = $this->model->get($data->Autor->id);
            unlink($autor->foto); // delete image

            if($this->model->delete($data->Autor->id)){
                $res = ["mensaje" => "Autor Eliminado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Autor N0 Localizado", "code" => 404];
            }
            

        } else {
            $res             = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Autor/del");

    }
        
}