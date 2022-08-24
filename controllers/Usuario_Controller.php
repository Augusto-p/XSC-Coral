<?php 
require_once 'DTO/usuario.php';
require_once 'Funciones\Mails.php';

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
        $this->view->render('usuario/sendResertPassword');
    }
    public function resetPasswordByIDPassword()
    {
        $code = $_GET['code'];
        $this->view->code = $code;
        $this->view->render('Usuario/passwordReset');
    }
    

    
    
    public function signin()
    {
        $user = new Usuario(); //creamos un objeto de tipo usuario
        $user->email = $_POST['Email']; //asignamos el valor del email
        $user->password = password_hash($_POST['Password'], PASSWORD_BCRYPT , ['cost' => 10]); //asignamos el valor del password encriptado
        $usr = $this->model->entrar($user);
        if (!$usr) {
            $this->view->render('usuario/login');
        } else {
            $_SESSION['email'] = serialize($usr->email);
            $_SESSION['nombre'] = serialize($usr->nombrecompleto);
            $_SESSION['rol'] = serialize($usr->rol);
            $_SESSION['genero'] = serialize($usr->Genero);
            $_SESSION['numero'] = serialize($usr->numero);
            $_SESSION['calle'] = serialize($usr->calle);
            $_SESSION['ciudad'] = serialize($usr->ciudad);
            $_SESSION['codigoPostal'] = serialize($usr->codigoPostal);
            $_SESSION['departamento'] = serialize($usr->departamento);
            $_SESSION['Fnacimeto'] = serialize($usr->Fnacimento);
            $_SESSION['login'] = true;
            $this->view->render('home/index');
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
        $NameI = basename($_FILES["PhotoPerfil"]["name"]);  //nombre de la imagen
        $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
         
        $Types = array('jpg','png','jpeg','gif'); //lista de formatos aceptados
        if(in_array($TypeI, $Types)){ //verifica que el formato de la imagen este soportado
            $img = $_FILES['PhotoPerfil']['tmp_name'];  //obtiene el archivo temporal de la imagen
            $path = "public/imgs/Users/".$user->email.".".$TypeI; //ruta de la imagen
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
    public function siginUpAdmin(){ //la pagina de registro Para el uso del administradores Y los Vendeores
        if (Session::get('rol') == "Adminitrador") {
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
        $user->rol = $_POST['Rol'];
        $user->password = password_hash($_POST['Password'], PASSWORD_BCRYPT , ['cost' => 10]);
    

        //foto de perfill
        $NameI = basename($_FILES["PhotoPerfil"]["name"]);  //nombre de la imagen
        $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
         
        $Types = array('jpg','png','jpeg','gif'); //lista de formatos aceptados
        if(in_array($TypeI, $Types)){ //verifica que el formato de la imagen este soportado
            $img = $_FILES['PhotoPerfil']['tmp_name'];  //obtiene el archivo temporal de la imagen
            $path = "public/imgs/Users/".$user->email.".".$TypeI; //ruta de la imagen
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
        }else{
            $this->view->render('usuario/registrarse');
        }    
        
    }

    public function SendEmailPassword()
    {
        $email = $_POST['Email'];
        //generat unique string
        $nombre = $this->model->getNombrebyEmail($email); //obtiene el nombre del usuario
        if ($nombre) {
            $ID_Password_Reset = sha1(uniqid(mt_rand(), true)); // se genera una cadena unica
            $date = date("Y-m-d"); // se obtiene la fecha actual
            $this->model->setTokenOfForgetPasswordByEmailSystem( $email,$ID_Password_Reset, $date); //se guarda la cadena unica en la base de datos
            $send = new Mail(); // se crea una nueva instancia de la clase mails
            $sending = $send->SendMailForgetPassword($email, $ID_Password_Reset , $nombre);
            if ($sending){
                echo "<script>alert('mail enviado')</script>";
            }else{
                echo "<script>alert('mail no enviado')</script>";
            }
        }else{
            echo "<script>alert('mail no enviado')</script>";
        }
        

    }

    public function resetPasswordByCode(){
        $code = $_POST['Code'];
        $password = password_hash($_POST['Password'], PASSWORD_BCRYPT , ['cost' => 10]);
        $reset = $this->model->remplacePassWordBYEmailSystem($code, $password);
        if ($reset){
            echo "<script>alert('Contraseña cambiada')</script>";
            $this->view->render('usuario/login');
        }else{
            echo "<script>alert('Contraseña no cambiada')</script>";
            $this->view->render('usuario/sendResetPassword');
        }


        
    }
}; ?>