<?php

require_once 'DTO/venta.php';
require_once 'DTO/detalleVenta.php';
require_once 'DTO/pedido.php';

require_once 'models/Usuario_model.php';
require_once 'models/DetalleVenta_Model.php';
require_once 'models/Pedido_Model.php';
require_once 'models/Book_Model.php';



class Venta_API_Controller extends Controller {
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
            $Ventas = $this->model->getAll();
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            foreach ($Ventas as $key => $venta) {
                $Ventas[$key]->Detalles  = $Detalles_Model->getAllByIdVenta($venta->id);
                $Ventas[$key]->Pedido = $Pedido_Model->get($venta->id);
            }
            
            $res = [
            "mensaje"   => "Hey",
            "Ventas"   => $Ventas,
            ];            
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/get");


    }

    public function getAllByUser() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado" || $data->Email == $email) {
            $Ventas = $this->model->getAllByUser($data->Email);
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            foreach ($Ventas as $key => $venta) {
                $Ventas[$key]->Detalles  = $Detalles_Model->getAllByIdVenta($venta->id);
                $Ventas[$key]->Pedido = $Pedido_Model->get($venta->id);
            }
            
            $res = [
                "mensaje"   => "Hey",
                "Ventas"   => $Ventas,
            ];      
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/get");


    }
    public function getAllByMPago() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByMPago($data->Metodo_Pago);
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            foreach ($Ventas as $key => $venta) {
                $Ventas[$key]->Detalles  = $Detalles_Model->getAllByIdVenta($venta->id);
                $Ventas[$key]->Pedido = $Pedido_Model->get($venta->id);
            }
            
            $res = [
                "mensaje"   => "Hey",
                "Ventas"   => $Ventas,
            ];      
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/get");


    }

    public function getAllByEstado() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByEstado($data->Estado);
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            foreach ($Ventas as $key => $venta) {
                $Ventas[$key]->Detalles  = $Detalles_Model->getAllByIdVenta($venta->id);
                $Ventas[$key]->Pedido = $Pedido_Model->get($venta->id);
            }
            
            $res = [
                "mensaje"   => "Hey",
                "Ventas"   => $Ventas,
            ];
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/get");


    }

    public function getAllByFecha() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByFecha($data->From, $data->To);
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            foreach ($Ventas as $key => $venta) {
                $Ventas[$key]->Detalles  = $Detalles_Model->getAllByIdVenta($venta->id);
                $Ventas[$key]->Pedido = $Pedido_Model->get($venta->id);
            }
            
            $res = [
                "mensaje"   => "Hey",
                "Ventas"   => $Ventas,
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
            $Venta = $this->model->get($data->Venta);
            $Detalles_Model = new DetalleVenta_Model();
            $Venta->Detalles  = $Detalles_Model->getAllByIdVenta($data->Venta);
            $Pedido_Model = new Pedido_Model();
            $Venta->Pedido = $Pedido_Model->get($data->Venta);
            $res = [
            "mensaje"   => "Hey",
            "Venta"   => $Venta,
            ];            
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/get");

    }
    public function add(){
        //add Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            //$res = $data;
            $Venta = new Venta;
            $Venta->Estado = $data->Venta->Estado;
            $Venta->MPago = $data->Venta->Metodo_Pago;
            $Venta->Email = $email;
            $Venta->FechaHora = date("Y-m-d H:i:s");
            $Total = 0;
            $Detalles = [];
            $BookModel = new Book_Model();
            foreach ($data->Venta->Detalles as $key => $value) {
                $book = $BookModel->get($value->ISBN);
                $Detalle = new DetalleVenta();
                $Detalle->ISBN = $value->ISBN;
                $Detalle->Descuento = $value->Descuento;
                $Detalle->Cantidad =$value->Cantidad;
                $Total += $book->precio * $Detalle->Cantidad ;
                array_push($Detalles, $Detalle);
            }
        
            $Venta->Total = $Total;
            
       
            $id = $this->model->add($Venta);

            
            if ($id >= 0) {
                $Pedido = new Pedido();
                $Pedido->id = $id;
                $Pedido->SEnvio = $data->Venta->Pedido->Sistema_Envio;
                $Pedido->Descripcion = $data->Venta->Pedido->Descripcion;
                $Pedido_Model = new Pedido_Model();
                $Pedido_Model->add($Pedido);
                $Detalles_Model = new DetalleVenta_Model();
                foreach ($Detalles as $key => $detalle) {
                    $detalle->id = $id;
                    $Detalles_Model->add($detalle);
                }

                $res = ["mensaje" => "Venta Ingresada", "code" => 200];
            }else{
                $res = ["mensaje" => "Venta No Ingresada", "code" => 404];
            }
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/add");

    }

    public function delete(){
        //del Compra
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Detalles_Model = new DetalleVenta_Model();
            $Pedido_Model = new Pedido_Model();
            if($this->model->delete($data->ID) && $Detalles_Model->deleteByIdVenta($data->ID) && $Pedido_Model->delete($data->ID)){
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
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado" || ($this->model->get($data->ID)->Email == $email && $data->New_Status ==  "Entregado")) {    
            if($this->model->NewStatus($data->ID, $data->New_Status)){
                $res = ["mensaje" => "Estado de Venta Acutualizado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Venta No Localizada", "code" => 404];
            }
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Venta/NStatus");

    }
}