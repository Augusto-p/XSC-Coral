<?php 
require_once './DTO/book.php';
require_once './DTO/autor.php';


class Book_Controller extends Controller
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
        $book = new Book();
        $book->isbn = $_POST['isbn'];
        $book->titulo = $_POST['titulo'];
        $book->precio = $_POST['precio'];
        $book->categoria = $_POST['categoria'];
        $book->id_Autor = $_POST['id_autor'];
        $book->sipnosis = $_POST['sipnosis'];
        $imgs = $_FILES["Imagenes"];
        
        mkdir("./public/imgs/Books/".$book->isbn);

        $cont = 0;
        $paths = array();
        foreach($imgs["name"] as $i){
            $NameI = basename($imgs["name"][$cont]);  //nombre de la imagen
            $TypeI = pathinfo($NameI, PATHINFO_EXTENSION); // formato de imagen
            $Types = array('jpg','png','jpeg','gif'); //lista de formatos aceptados
            if(in_array($TypeI, $Types)){ //verifica que el formato de la imagen este soportado
                $img = $imgs['tmp_name'][$cont];  //obtiene el archivo temporal de la imagen
                $path = "public/imgs/Books/".$book->isbn."/".$cont.".".$TypeI; //ruta de la imagen
                move_uploaded_file($img, $path); //mover la imagen a la ruta especificada
                $paths[] = $path;
                $cont++;
            }

        }




        $this->model->add($book);
    }


};?>