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
    
    
    public function signin()
    {
        $user = new Usuario();
        $user->email = $_POST['email'];
        $user->password = $_POST['password'];
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
        $user->nombre = $_POST['Nombre'] . " " . $_POST['Apellido'];
        $user->email = $_POST['Email'];
        $user->password = $_POST['Password'];
        $user->Fnacimento = $_POST['Fecha_de_Naminento'];
        if ($_POST['Genero'] == "M") {
            $user->Genero = "Masculino";
        } elseif ($_POST['Genero'] == "F") {
            $user->Genero = "Femenino";
        } else {
            $user->Genero = $_POST['Gpersonalizado'];
        }
        //foto de perfill
        $NameI = basename($_FILES["Photo"]["name"]);  //nombre de la imagen
        $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
         
        $Types = array('jpg','png','jpeg','gif'); //lista de formatos aceptados
        if(in_array($TypeI, $Types)){ //verifica que el formato de la imagen este soportado
            $img = $_FILES['Photo']['tmp_name'];  //obtiene el archivo temporal de la imagen
            $imgContent = addslashes(file_get_contents($img)); //obtiene el contenido de la imagen BLOB
            $user->Iuser = $imgContent;

        } else { 
            $this->view->mensaje = "Tipo de archivo no soportado"; 
            $this->view->render('usuario/img');
        }

        $reg = $this->model->registrarse($user);
        if (!$reg) {
            $this->view->render('usuario/registrarse');
        }else{
            $this->view->render('usuario/login');
        }
           
    }

}; ?>