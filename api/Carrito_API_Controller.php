<?php

require_once 'DTO/carrito.php';
require_once 'models/Usuario_model.php';

class Carrito_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function get(){
        //get Carrito by user
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) != false) {
            $Carrito = $this->model->getByUser($email);
            $res = [
            "mensaje"   => "Hey",
            "Carrito"   => $Carrito,
            ];
        }else{
            $res = [
            "mensaje"   => "Hey",
            "Carrito"   => [],
            ];
        }

        $this->view->res = json_encode($res);
        $this->view->render("API/Carrito/get");
        
    }
    public function add(){
        //add Carrito
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) != false) {
            if ($this->model->Existe($email, $data->Book)) {
                $res = ["mensaje" => "Se Añadio Al Carrito", "code" => 200];
            }else{
                $carro = new Carrito();
                $carro->Email = $email;
                $carro->ISBN = $data->Book;
                $carro->FechaHora = date("Y-m-d H:i:s");
                if ($this->model->add($carro)) {
                    $res = ["mensaje" => "Se Añadio Al Carrito", "code" => 200];
                }else{
                    $res = ["mensaje" => "No Se Pudo Añadir Al Carrito", "code" => 404];
            }
            }

            
        } else {
            $res             = ["mensaje" => "Usuario No Encontrado", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Carrito/add");

    }

    public function deleteByUser(){
        //delete carrito by user
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) != false) {
            if($this->model->deleteAll($email)){
                $res = ["mensaje" => "Carrito Vaciado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Carrito N0 Localizado", "code" => 404];
            }

        } else {
            $res             = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Carrito/delall");

    }

    public function delete(){
        //delete carrito by user
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) != false) {
            $carro = new Carrito();
            $carro->Email = $email;
            $carro->ISBN = $data->Book;

            if($this->model->delete($carro)){
                $res = ["mensaje" => "Carrito Vaciado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Carrito N0 Localizado", "code" => 404];
            }

        } else {
            $res             = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Carrito/del");

    }

        
}