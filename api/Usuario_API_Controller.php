<?php 
require_once 'DTO/usuario.php';


class Usuario_API_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        $data = json_decode(file_get_contents('php://input'));;
        $email = $data->email;
        $user = $this->model->get($email);
        $res = [
            "mensaje"   => "Hey",
            "User"     => $user,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Ususario/get");
        
    }
}