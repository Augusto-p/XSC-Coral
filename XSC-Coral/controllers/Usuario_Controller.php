<?php 
require_once 'DTO/usuario.php';
require_once 'utilidades/Mails.php';
require_once 'utilidades/Imagenes.php';



class Usuario_Controller extends Controller
{
    public function __construct(){
        parent::__construct();
        
    }
    public function render(){
        $this->login();
    }
    
    public function login(){
        $this->view->render('Usuario/login');
    }
    public function registrarse(){
        $this->view->render('Usuario/registrarse');
    }
    public function resertPassword(){
        $this->view->render('Usuario/sendResertPassword');
    }
    public function resetPasswordByIDPassword(){
        $code = $_GET['code'];
        $this->view->code = $code;
        $this->view->render('Usuario/passwordReset');
    }
    

    // admin panel paths
    public function apadd(){
        if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render("PanelAdmin/Usuario/add");
        }else {
            $this->view->render('errores/403');
        }
    }
    public function apmod(){
        if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render("PanelAdmin/Usuario/mod");
        }else {
            $this->view->render('errores/403');
        }
    }
    public function apdel(){
        if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {
            $this->view->render("PanelAdmin/Usuario/del");
        }else {
            $this->view->render('errores/403');
        }
    }  
    public function settings(){
        if ($_SESSION["login"]) {
            $user = $this->model->get(unserialize($_SESSION["email"]));
            $GP = null;
            $Genero = null;
            if ($user->Genero == "Masculino") {
                $Genero = "M";
            }elseif($user->Genero == "Femenino"){
                $Genero = "F";
            }else{
                $Genero = "P";
                $GP = $user->Genero;
            }
            $this->view->user = $user;
            $this->view->Genero = $Genero;
            $this->view->GP = $GP;
            $this->view->render("Usuario/panelUser");
        }else {
            $this->view->render('errores/403');
        }

        
    }
    public function security(){
        if ($_SESSION["login"]) {
            $user = $this->model->get(unserialize($_SESSION["email"]));
            $this->view->user = $user;
            $this->view->render("Usuario/panelUserS");
        }else {
            $this->view->render('errores/403');
        }

        
    }
    
    public function signin(){
        $user = new Usuario(); //creamos un objeto de tipo usuario
        $user->email = $_POST['Email']; //asignamos el valor del email
        $user->password = $_POST['Password']; //asignamos el valor del password
        $usr = $this->model->entrar($user);

        if (!$usr) {
            $this->view->render('Usuario/login');
        } else {
            $_SESSION['rol'] = serialize($usr->rol);
            $_SESSION['email'] = serialize($usr->email);
            $_SESSION['img'] = serialize($usr->Iuser);
            $_SESSION['login'] = true;
            SessionStorage::newSS(["name" => "Token", "value" => JWTs::newJWT($user->email, 60 * 60 * 48)]);
            $this->view->render('home/GoToindex');
        }

    }

    public function signupClientes(){
        $user = new Usuario();
        $user->nombrecompleto = $_POST['Nombre']. " " . $_POST['Apellido'];
        $user->email = $_POST['Email'];
        
        $user->Fnacimento = $_POST['FNacimiento'];
        if ($_POST['Genero'] == "M") {
            $user->Genero = "Masculino";
        } elseif ($_POST['Genero'] == "F") {
            $user->Genero = "Femenino";
        } else {
            $user->Genero = $_POST['GPersonalizado'];
        }
        $user->numero = $_POST['Numero'];
        $user->calle = $_POST['Calle'];
        $user->ciudad = $_POST['Ciudad'];
        $user->codigoPostal = $_POST['Codigo'];
        $user->departamento = $_POST['Departamento'];
        $user->rol = "Cliente";
        $user->password = password_hash($_POST['Password'], PASSWORD_BCRYPT , ['cost' => 10]);
    

        //foto de perfill
        if ($_FILES["PhotoPerfil"]["size"] > 0) {
            $ImagenUser = new Imagenes($_FILES["PhotoPerfil"], "public/imgs/Users/".$user->email);
            $user->Iuser = $ImagenUser->Upload();
            if (!$user->Iuser) {
                $this->view->mensaje = "Tipo de archivo no soportado"; 
                $this->view->render('Usuario/registrarse');
                $user->Iuser = Imagenes::CreateUserImage($user->rol, $_POST['Nombre'], $_POST['Apellido'], $user->email);
            }
        }else {
           $user->Iuser = Imagenes::CreateUserImage($user->rol, $_POST['Nombre'], $_POST['Apellido'], $user->email);
        }
        
        $reg = $this->model->registrarse($user);
        if (!$reg) {
            $this->view->render('Usuario/registrarse');
        }else{
            $this->view->render('Usuario/login');
        }
           
    }
    
    public function SendEmailPassword(){
        $email = $_POST['Email'];
        //generat unique string
        $nombre = $this->model->getNombrebyEmail($email); //obtiene el nombre del usuario
        if ($nombre) {
            $ID_Password_Reset = sha1(uniqid(mt_rand(), true)); // se genera una cadena unica
            $date = date("Y-m-d H:i:s"); // se obtiene la fecha actual
            $this->model->setTokenOfForgetPasswordByEmailSystem( $email,$ID_Password_Reset, $date); //se guarda la cadena unica en la base de datos
            $send = new Mail(); // se crea una nueva instancia de la clase mails
            $sending = $send->SendMailForgetPassword($email, $ID_Password_Reset , $nombre);
            if ($sending){
                echo "<script>alert('mail enviado')</script>";
                $this->view->render('Usuario/login');
            }else{
                echo "<script>alert('mail no enviado')</script>";
                $this->view->render('Usuario/registrarse');
            }
        }else{
            echo "<script>alert('mail no enviado')</script>";
            $this->view->render('Usuario/registrarse');
        }
        

    }

    public function resetPasswordByCode(){
        $code = $_POST['Code'];
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT , ['cost' => 10]);
        $reset = $this->model->remplacePassWordBYEmailSystem($code, $password);
        if ($reset){
            echo "<script>alert('Contraseña cambiada')</script>";
            $this->view->render('Usuario/login');
        }else{
            echo "<script>alert('Contraseña no cambiada')</script>";
            $this->view->render('Usuario/sendResetPassword');
        }


        
    }

    public function Salir(){
        $_SESSION["rol"] = null;
        $_SESSION["login"] = null;
        SessionStorage::delSS("Token");
        $this->view->from = constant('URL') . $_GET["From"];
        $this->view->render('Usuario/Salir');
    }
}; ?>