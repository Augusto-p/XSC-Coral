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
    public function new(){
        $this->view->render('libros/new');
    }
    public function add(){
        $book = new Libro();
        $book->isbn = $_POST['isbn'];
        $book->titulo = $_POST['titulo'];
        $book->precio = $_POST['precio'];
        $book->categoria = $_POST['categoria'];
        $book->id_Autor = $_POST['id_autor'];
        $book->sipnosis = $_POST['sipnosis'];
        //manejos de imagenes
        $this->model->add($book);
    }


};?>