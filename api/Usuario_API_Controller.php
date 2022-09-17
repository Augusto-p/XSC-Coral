<?php 
require_once 'DTO/usuario.php';
require_once 'utilidades/Imagenes.php';


class Usuario_API_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

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



    // public function test(){
    //     $Imagenes = new Imagenes();
    //     $Imagenes->CreateUserImage("Administrador", "Augusto", "Picardo", "auguselo77@gmail.com");
    // }

     public function add(){
        //add author
        
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($this->model->getRol($email) == "Administrador" || $this->model->getRol($email) == "Empleado") {
            if ($this->model->getRol($email) == "Empleado" && $data->Usuario->Rol != "Cliente") {
                $res             = ["mensaje" => "Permiso Denegado"];
            }else{
                $user = new Usuario();
                $user->nombrecompleto = $data->Usuario->Nombre. " " . $data->Usuario->Apellido;
                $user->email = $data->Usuario->Email;
                $user->Fnacimento = $data->Usuario->Fecha_Nacimento;
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
                    $res             = ["mensaje" => "Usuario Registrado Existosamente"];
                }else{
                    $res             = ["mensaje" => "Usuario No se a Registrado Existosamente"];
                }
                

            }
            

        } else {
            $res             = ["mensaje" => "Permiso Denegado"];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/add");

    }

    
}