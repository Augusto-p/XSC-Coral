<?php 
require_once './entidades/usuario.php';

class Usuario_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        $this->view->resultadoLogin = "";
    }
    public function render()
    {
        $this->view->mensaje = "cargado";
        $this->view->render('usuario/login');
    }
    
    public function login(){
        $this->view->render('usuario/login');
    }
    public function registrarse(){
        $this->view->render('usuario/registrarse');
    }
    public function resertPassword()
    {
        $this->view->render('usuario/resertPassword');
    }
    
    
    public function signin()
    {
        $user = new Usuario();
        $user->email = $_POST['Email'];
        $user->password = $_POST['Password'];
        $usr = $this->model->entrar($user);
        if (!$usr) {
            $this->view->render('usuario/login');
        } else {
            $_SESSION['id'] = serialize($usr->ID);
            $_SESSION['login'] = true;
            $_SESSION['rol'] = serialize($usr->rol);
        }

    }

    public function signup(){
        $user = new Usuario();
        $user->nombre = $_POST['Nombre'];
        $user->apellido = $_POST['Apellido'];
        $user->email = $_POST['Email'];
        $user->password = $_POST['Password'];
        $user->Fnacimento = $_POST['FNaminento'];
        if ($_POST['Genero'] == "M") {
            $user->Genero = "Masculino";
        } elseif ($_POST['Genero'] == "F") {
            $user->Genero = "Femenino";
        } else {
            $user->Genero = $_POST['Gpersonalizado'];
        }
        $user->numero = $_POST['Numero'];
        $user->calle = $_POST['Calle'];
        $user->ciudad = $_POST['Ciudad'];
        $user->codigoPostal = $_POST['CodigoPostal'];
        $user->departamento = $_POST['Departamento'];



        //foto de perfill
        $NameI = basename($_FILES["PhotoPerfil"]["name"]);  //nombre de la imagen
        $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
         
        $Types = array('jpg','png','jpeg','gif'); //lista de formatos aceptados
        if(in_array($TypeI, $Types)){ //verifica que el formato de la imagen este soportado
            $img = $_FILES['PhotoPerfil']['tmp_name'];  //obtiene el archivo temporal de la imagen
            $path = "public/imgs/Users/".$user->email.$TypeI; //ruta de la imagen
            move_uploaded_file($img, $path); //mover la imagen a la ruta especificada
            $user->Iuser = $path; //guarda la ruta de la imagen en la base de datos

        } else { 
            $this->view->mensaje = "Tipo de archivo no soportado"; 
            $this->view->render('usuario/registrarse');
        }

        $reg = $this->model->registrarse($user);
        if (!$reg) {
            $this->view->render('usuario/registrarse');
        }else{
            $this->view->render('usuario/login');
        }
           
    }
    public function SendEmailPassword()
    {
        
    }
}; ?>