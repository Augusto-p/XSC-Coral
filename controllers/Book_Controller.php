<?php
require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'utilidades\Archivos.php';
require_once 'models\Autor_Model.php';
require_once 'models\Editorial_Model.php';

class Book_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function render() {
        $this->view->render('usuario/login');
    }
    public function view() {
        $id = $_GET['id'];
        //get Book
        $libro = $this->model->get($id);
        $file  = new Archivo;
        $file->setPath($libro->sipnosis);
        $file->read();
        $libro->sipnosis = $file->getContent();
        //get author
        $AutorModel = new Autor_Model();
        $autores    = $AutorModel->getBybook($id);
        //get Editor
        $EditorialModel = new Editorial_Model();
        $editorial      = $EditorialModel->get($libro->IDEditorial);

        //send Data
        $this->view->Book      = $libro;
        $this->view->Autores   = $autores;
        $this->view->Editorial = $editorial;

        $this->view->render('libros/view');
    }
    public function new() {
        $this->view->render('PanelAdmin/Book/add');
    }

    public function change(){
        $this->view->render('PanelAdmin/Book/mod');
    }

    

    public function add() {
        $book             = new Book();
        $book->isbn       = $_POST['isbn'];
        $book->titulo     = $_POST['titulo'];
        $book->precio     = $_POST['precio'];
        $book->categorias = $_POST['categorias'];
        // $book->idsAutor = $_POST['id_autor'];
        $book->IDEditorial = $_POST['Editorial'];
        $imgs              = $_FILES["Imagenes"];

        //guardado de sipnosis

        $file = new Archivo;
        $file->setPath("public/texts/BookSipnosis/" . $book->isbn . ".txt");
        $file->setContent($_POST['sipnosis']);
        $file->save();
        $book->sipnosis = $file->getPath();

        //manego de imagenes
        if (!file_exists('./public/imgs/Books/".$book->isbn')) {
            mkdir("./public/imgs/Books/" . $book->isbn);
        }
        $cont  = 0;
        $paths = [];
        foreach ($imgs["name"] as $i) {
            $img["name"] = $imgs["name"][$cont];
            $img["tmp_name"] =  $imgs['tmp_name'][$cont];
            $ImagenArticulo = new Imagenes($img, "public/imgs/Books/" . $book->isbn . "/" . $cont);
            $paths[] = $ImagenArticulo->Upload();


        }
        $book->imagenes = $paths;

        $this->model->add($book);
    }

};?>