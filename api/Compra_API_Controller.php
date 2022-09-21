<?php

require_once 'DTO/compra.php';
require_once 'DTO/detalleCompra.php';

require_once 'models/Usuario_model.php';
require_once 'models/DetalleCompra_Model.php';



class Compra_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function getAll() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compras = $this->model->getAll();
            $Detalles_Model = new DetalleCompra_Model();
            foreach ($Compras as $key => $compra) {
                $Compras[$key]->Detalles = $Detalles_Model->getAllByIdCompra($compra->id);
            }
            $res = [
            "mensaje"   => "Hey",
            "Compras"   => $Compras,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");


    }

    public function getAllByEditorial() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compras = $this->model->getAllByEditorial($data->IDEditorial);
            $Detalles_Model = new DetalleCompra_Model();
            foreach ($Compras as $key => $compra) {
                $Compras[$key]->Detalles = $Detalles_Model->getAllByIdCompra($compra->id);
            }
            $res = [
            "mensaje"   => "Hey",
            "Compras"   => $Compras,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");


    }
    public function getAllByMPago() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compras = $this->model->getAllByMPago($data->Metodo_Pago);
            $Detalles_Model = new DetalleCompra_Model();
            foreach ($Compras as $key => $compra) {
                $Compras[$key]->Detalles = $Detalles_Model->getAllByIdCompra($compra->id);
            }
            $res = [
            "mensaje"   => "Hey",
            "Compras"   => $Compras,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");


    }

    public function getAllByEstado() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compras = $this->model->getAllByEstado($data->Estado);
            $Detalles_Model = new DetalleCompra_Model();
            foreach ($Compras as $key => $compra) {
                $Compras[$key]->Detalles = $Detalles_Model->getAllByIdCompra($compra->id);
            }
            $res = [
            "mensaje"   => "Hey",
            "Compras"   => $Compras,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");


    }

    public function getAllByFecha() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compras = $this->model->getAllByFecha($data->From, $data->To);
            $Detalles_Model = new DetalleCompra_Model();
            foreach ($Compras as $key => $compra) {
                $Compras[$key]->Detalles = $Detalles_Model->getAllByIdCompra($compra->id);
            }
            $res = [
            "mensaje"   => "Hey",
            "Compras"   => $Compras,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");


    }    


    public function get(){
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Compra = $this->model->get($data->Compra);
            $Detalles_Model = new DetalleCompra_Model();
            $Detalles = $Detalles_Model->getAllByIdCompra($data->Compra);
            $Compra->Detalles  = $Detalles;
            $res = [
            "mensaje"   => "Hey",
            "Compra"   => $Compra,
            ];            
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/get");

    }
    public function add(){
        //add Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $compra = new Compra;
            $compra->estado = $data->Compra->Estado;
            $compra->MPago = $data->Compra->Metodo_Pago;
            $compra->IDEditorial = $data->Compra->IDEditorial;
            $compra->FechaHora = date("Y-m-d H:i:s");
            $Total = 0;
            $Detalles = [];

            foreach ($data->Compra->Detalles as $key => $value) {
                $Detalle = new DetalleCompra();
                $Detalle->ISBN = $value->ISBN;
                $Detalle->PUnitario = $value->Precio_Unitario;
                $Detalle->Cantidad =$value->Cantidad;
                $Total += $Detalle->PUnitario * $Detalle->Cantidad ;
                array_push($Detalles, $Detalle);
            }
        
            $compra->Total = $Total;
       
            $id = $this->model->add($compra);
            if ($id >= 0) {
                $Detalles_Model = new DetalleCompra_Model();
                foreach ($Detalles as $key => $detalle) {
                    $detalle->id = $id;
                    $Detalles_Model->add($detalle);
                }

                $res = ["mensaje" => "Compra Ingresado", "code" => 200];
            }else{
                $res = ["mensaje" => "Compra No Ingresado", "code" => 404];
            }
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/add");

    }

    public function delete(){
        //del Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador") {
            $Detalles_Model = new DetalleCompra_Model();
            if($this->model->delete($data->ID) && $Detalles_Model->deleteByIdCompra($data->ID)){
                $res = ["mensaje" => "Compra Eliminado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Compra No Localizado", "code" => 404];
            }
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/del");

    }
    public function newStatus(){
        //add Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            
            if($this->model->NewStatus($data->ID, $data->New_Status)){
                $res = ["mensaje" => "Estado de Compra Acutualizado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Compra No Localizado", "code" => 404];
            }
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Compra/add");

    }
}