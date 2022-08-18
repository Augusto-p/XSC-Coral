<?php 
require_once './entidades/libros.php';
require_once './entidades/autores.php';


class Libros_Controller extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function render()
    {
        $this->view->render('usuario/login');
    }
    public function view(){
        $id = $_GET['id'];
        $libro = $this->model->getLibro($id);
        $autor = $this->model->getAutor($libro->id_autor);
        $this->view->libro = $libro;
        $this->view->autor = $autor;
        $this->view->render('libros/view');
    }


};?>