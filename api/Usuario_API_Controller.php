<?php
require_once 'DTO/usuario.php';
require_once 'utilidades/Imagenes.php';
//test
require_once 'utilidades/PDFs.php';
require_once 'models/Book_Model.php';
require_once 'models/DetalleVenta_Model.php';
require_once 'models/Venta_Model.php';
require_once 'models/Pedido_Model.php';






class Usuario_API_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function test(){
        $bookmodel = new Book_Model();
        $ventamodel = new Venta_Model();
        $dventamodel = new DetalleVenta_Model();
        $pedidomodel = new Pedido_Model();
        $venta = $ventamodel->get(7);
        $detalles = $dventamodel->getAllByIdVenta(7);
        foreach ($detalles as $key => $value) {
            $detalles[$key]->Book = $bookmodel->get($value->ISBN);
        }
        $venta->Detalles = $detalles;
        $venta->Pedido = $pedidomodel->get(7);
        $user = $this->model->get($venta->Email);
        $pdfs = new PDFs();
        echo $pdfs->Facturar($venta, $user);
    }

    // public function test2(){
    //     print_r();

    // }


    public function get(){

        $email = $_GET["Email"];
        $user = $this->model->get($email);
        $user->password ="";
        $res = [
            "mensaje"   => "Hey",
            "User"     => $user,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/get");

    }
    public function add(){
        //add author

        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($this->model->getRol($email) == "Administrador" || $this->model->getRol($email) == "Empleado") {
            if ($this->model->getRol($email) == "Empleado" && $data->Usuario->Rol != "Cliente") {
                $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
            }else{
                $user = new Usuario();
                $user->nombrecompleto = $data->Usuario->Nombre. " " . $data->Usuario->Apellido;
                $user->email = $data->Usuario->Email;
                $user->Fnacimento = $data->Usuario->Fecha_Nacimento;
                $user->Iuser = $data->Usuario->Foto != null ? $data->Usuario->Foto : Imagenes::CreateUserImage($data->Usuario->Rol, $data->Usuario->Nombre, $data->Usuario->Apellido, $data->Usuario->Email);
                if ($data->Usuario->Genero == "M") {
                    $user->Genero = "Masculino";
                } elseif ($data->Usuario->Genero == "F") {
                    $user->Genero = "Femenino";
                } else {
                $user->Genero = $data->Usuario->Genero_Personalisado;
                }
                $user->numero = $data->Usuario->Numero;
                $user->calle = $data->Usuario->Calle;
                $user->ciudad = $data->Usuario->Ciudad;
                $user->codigoPostal = $data->Usuario->Codigo_Postal;
                $user->departamento = $data->Usuario->Departamento;
                $user->rol = $data->Usuario->Rol;
                $user->password = password_hash($data->Usuario->Password, PASSWORD_BCRYPT , ['cost' => 10]);

                $reg = $this->model->registrarse($user);
                if ($reg != null) {

                    $res = ["mensaje" => "Usuario Registrado Existosamente", "code" => 200];
                }else{
                    $res = ["mensaje" => "Usuario No se a Registrado Existosamente", "code" => 404];
                }


            }


        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/add");

    }

    public function delete(){
        //add author

        $data      = json_decode(file_get_contents('php://input'));
        $token     = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email     = $token != false ? $token: null ; //JWT
        if ($this->model->getRol($email) == "Administrador" || $this->model->getRol($email) == "Empleado") {
            $User = $this->model->get($data->Usuario->Email);
            if ($this->model->getRol($email) == "Empleado" && $User->rol != "Cliente") {
                $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
            }else{

            unlink($User->Iuser); // delete image

            if($this->model->delete($data->Usuario->Email)){
                $res = ["mensaje" => "Usuario Eliminado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Usuario No Localizado", "code" => 404];
            }


            }


        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/del");

    }

    public function mod(){
        $data = json_decode(file_get_contents('php://input'));
        $token     = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email     = $token != false ? $token: null ; //JWT
        if ($this->model->getRol($email) == "Administrador" || $this->model->getRol($email) == "Empleado" || ($data->Usuario->Email == $email && $data->Usuario->Rol == $this->model->getRol($email))) {
            if ($this->model->getRol($email) == "Empleado" && $data->Usuario->Rol != "Cliente" && $data->Usuario->Email != $email) {
                $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
            }else{
                $user = $this->model->get($data->Usuario->Email);
                $user->nombrecompleto = $data->Usuario->Nombre != null || $data->Usuario->Apellido != null ? $data->Usuario->Nombre: $user->nombrecompleto;
                $user->email = $data->Usuario->Email != null ? $data->Usuario->Email : $user->email;
                $user->Fnacimento = $data->Usuario->Fecha_Nacimento != null ? $data->Usuario->Fecha_Nacimento : $user->Fnacimento;
                $user->numero = $data->Usuario->Numero != null ? $data->Usuario->Numero : $user->numero;
                $user->calle = $data->Usuario->Calle != null ? $data->Usuario->Calle : $user->calle;
                $user->ciudad = $data->Usuario->Ciudad != null ? $data->Usuario->Ciudad : $user->ciudad;
                $user->codigoPostal = $data->Usuario->Codigo_Postal != null ? $data->Usuario->Codigo_Postal : $user->codigoPostal;
                $user->departamento = $data->Usuario->Departamento != null ? $data->Usuario->Departamento : $data->Usuario->Departamento;
                $user->rol = $data->Usuario->Rol ? $data->Usuario->Rol : $user->rol;
                $user->password = $data->Usuario->Password ? password_hash($data->Usuario->Password, PASSWORD_BCRYPT , ['cost' => 10]) : $user->password;

                if ($data->Usuario->Genero == "M") {
                    $user->Genero = "Masculino";
                } elseif ($data->Usuario->Genero == "F") {
                    $user->Genero = "Femenino";
                } else {
                    $user->Genero = $data->Usuario->Genero_Personalisado != null ? $data->Usuario->Genero_Personalisado : $user->Genero;
                }


                if ($this->model->update($user)) {
                    $res = ["mensaje" => "Usuario Actualizado Existosamente", "code" => 200];
                }else{
                    $res = ["mensaje" => "Usuario No Actualizado Existosamente", "code" => 404];
                }


            }


        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/mod");

    }

}