<?php

require_once 'DTO/venta.php';
require_once 'DTO/detalleVenta.php';
require_once 'DTO/pedido.php';
require_once 'models/Usuario_model.php';
require_once 'models/Book_Model.php';
require_once 'utilidades/Mails.php';
require_once 'utilidades/PDFs.php';


class Venta_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function getAll() {
        //get all compras
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAll();
            
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado" || $data->Email == $email) {
            $Ventas = $this->model->getAllByUser($data->Email);
                       
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByMPago($data->Metodo_Pago);
            
            
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByEstado($data->Estado);
                       
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Ventas = $this->model->getAllByFecha($data->From, $data->To);
                       
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $Venta = $this->model->get($data->Venta);
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
        // $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($email != null) {
            $Venta = new Venta;
            $Venta->Estado = $data->Venta->Estado;
            $Venta->MPago = $data->Venta->Metodo_Pago;
            $Venta->Email = $email;
            $Venta->FechaHora = date("Y-m-d H:i:s");
            $Total = 0;
            $SinStok = [];
            $Detalles = [];
            $BookModel = new Book_Model();
            foreach ($data->Venta->Detalles as $key => $value) {
                $book = $BookModel->get($value->ISBN);
                if ($book->Stock > 0) {   
                    $Detalle = new DetalleVenta();
                    $Detalle->Book = $book;
                    $Detalle->ISBN = $value->ISBN;
                    $Detalle->Descuento = $value->Descuento;
                    $Detalle->Cantidad =$value->Cantidad;
                    $Total += $book->precio * $Detalle->Cantidad ;
                    array_push($Detalles, $Detalle);
                }else{
                    array_push($SinStok, $book->titulo);
                }
            }
            $Pedido = new Pedido();
            $Pedido->SEnvio = $data->Venta->Pedido->Sistema_Envio;
            $Pedido->Descripcion = $data->Venta->Pedido->Descripcion;
            $Venta->Total = $Total;
            $Venta->Detalles = $Detalles;
            $Venta->Pedido = $Pedido;
    
            $id = $this->model->add($Venta);
            if ($id >= 0) {
                $Venta->id = $id;
                $pdfs = new PDFs();
                $mails = new Mail();
                $userModel = new Usuario_Model();
                
                
                $user = $userModel->get($email);
                $mails->SendMailETiket($user->email, $pdfs->Facturar($Venta, $user), $user->nombre);
                if ($SinStok != []) {
                    $res = ["mensaje" => "Venta Ingresada", "code" => 200];
                }else{

                    $res = ["mensaje" => $SinStok, "code" => 201];
                }
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            if($this->model->delete($data->ID)){
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
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