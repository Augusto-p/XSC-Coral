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
        
        $data  = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if (($this->model->getRol($email) == "Administrador")||($this->model->getRol($email) == "Empleado" &&  $this->model->getRol($data->Usuario->Email) == "Cliente")) {
            $user = $this->model->get($data->Usuario->Email);
            $user->password ="";
            $res = ["mensaje" => "Hey", "User" => $user,"code"=>200];
        }else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
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
        //delete user
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
        if ((empty($data->Usuario->Email)) || ($this->model->getRol($email) == "Administrador")||($this->model->getRol($email) == "Empleado" && $data->Usuario->Rol == "Cliente" && $this->model->getRol($data->Usuario->Email) == "Cliente")) {
            $user = $this->model->get(empty($data->Usuario->Email) ? $email: $data->Usuario->Email);
            $user->nombrecompleto = $data->Usuario->Nombre != null || $data->Usuario->Apellido != null ? $data->Usuario->Nombre: $user->nombrecompleto;
            $user->email = $data->Usuario->Email != null ? $data->Usuario->Email : $user->email;
            $user->Fnacimento = $data->Usuario->Fecha_Nacimento != null ? $data->Usuario->Fecha_Nacimento : $user->Fnacimento;
            $user->numero = $data->Usuario->Numero != null ? $data->Usuario->Numero : $user->numero;
            $user->calle = $data->Usuario->Calle != null ? $data->Usuario->Calle : $user->calle;
            $user->ciudad = $data->Usuario->Ciudad != null ? $data->Usuario->Ciudad : $user->ciudad;
            $user->codigoPostal = $data->Usuario->Codigo_Postal != null ? $data->Usuario->Codigo_Postal : $user->codigoPostal;
            $user->departamento = $data->Usuario->Departamento != null ? $data->Usuario->Departamento : $user->departamento;
            $user->password = $data->Usuario->Password != "default" ? password_hash($data->Usuario->Password, PASSWORD_BCRYPT , ['cost' => 10]) : $user->password;
            $user->rol = $data->Usuario->Rol ? $data->Usuario->Rol : $user->rol;
            if ($data->Usuario->Genero == "M") {
                $user->Genero = "Masculino";
            } elseif ($data->Usuario->Genero == "F") {
                $user->Genero = "Femenino";
            } else {
                $user->Genero = $data->Usuario->Genero_Personalisado != null ? $data->Usuario->Genero_Personalisado : $user->Genero;
            }

            if (!empty($data->Usuario->Imagen)) {
                $Imagen = new Imagenes("public/imgs/Users/".$user->email);
                unlink($user->Iuser);
                $user->Iuser = $Imagen->Upload64($data->Usuario->Imagen);
            }

            if ($this->model->update($user)) {
                $res = ["mensaje" => "Usuario Actualizado Existosamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Usuario No Actualizado Existosamente", "code" => 404];
            }
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/mod");

    }

    public function getMyRol(){
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        $res = ["Rol" => $this->model->getRol($email)];
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/get");
    }

    // public function getMyToken(){
    //     $data = json_decode(file_get_contents('php://input'));
    //     $user           = new Usuario(); 
    //     $user->email    = $data->Usuario->Email; 
    //     $user->password = $data->Usuario->Password;
    //     $usr = $this->model->entrar($user);
    //     if ($usr) {
    //         $res = ["Token" => JWTs::newJWT($usr->email, 60 * 60 * 24)];
    //     }else {
    //         $res = ["Token" => null];
    //     }
    //     $this->view->res = json_encode($res);
    //     $this->view->render("API/Ususario/get");
    // }
    public function newpass(){
        $data = json_decode(file_get_contents('php://input'));
        $token     = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email     = $token != false ? $token: null ; //JWT
        if ($this->model->getRol($email)) {
            $user = $this->model->get($email);
            if (password_verify($data->Usuario->oldPass, $user->password)) {
                if ($this->model->newpass($email, password_hash($data->Usuario->newpass, PASSWORD_BCRYPT , ['cost' => 10]))) {
                    $res = ["mensaje" => "Contraseña actualizada", "code" => 200];    
                }else {
                    $res = ["mensaje" => "no se pudo actualizar su Contraseña", "code" =>404];
                }
            }else{
                $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
            }
        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/mod");

    }
}