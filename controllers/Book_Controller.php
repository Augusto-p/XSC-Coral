<?php 
require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'Funciones\Archivos.php';
require_once 'models\Autor_Model.php';
require_once 'models\Editorial_Model.php';
require_once 'Funciones\Paises.php';

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
        //get Book
        $libro = $this->model->get($id);
        $file = new Archivo;
        $file->setPath($libro->sipnosis);
        $file->read();
        $libro->sipnosis = $file->getContent();
        //get author
        $AutorModel = new Autor_Model();
        $autores = $AutorModel->getBybook($id);
        //get Editor
        $EditorialModel = new Editorial_Model();
        $editorial = $EditorialModel->get($libro->IDEditorial);
        //obtener la vandera del pais del autor
        foreach ($autores as $autor) {
            $pais = new Pais();
            $pais->setNombre($autor);
            $pais->uploadInfoByName();
            $autor->flag = $pais->getFlag();
        }


        //send Data
        $this->view->Book = $libro;
        $this->view->Autores = $autores;
        $this->view->Editorial = $editorial;
        $this->view->render('libros/view');
    }
    public function new(){
        $this->view->render('libros/new2');
    }
    public function add(){
        $book = new Book();
        $book->isbn = $_POST['isbn'];
        $book->titulo = $_POST['titulo'];
        $book->precio = $_POST['precio'];
        $book->categorias = $_POST['categorias'];
        // $book->idsAutor = $_POST['id_autor'];
        $book->IDEditorial = $_POST['Editorial'];
        $imgs = $_FILES["Imagenes"];
        
        //guardado de sipnosis

        $file = new Archivo;
        $file->setPath("public/texts/BookSipnosis/".$book->isbn.".txt");
        $file->setContent($_POST['sipnosis']);
        $file->save();
        $book->sipnosis = $file->getPath();

        //manego de imagenes 
        if (!file_exists('./public/imgs/Books/".$book->isbn')) {
            mkdir("./public/imgs/Books/".$book->isbn);
        }
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
        $book->imagenes = $paths;



        $this->model->add($book);
    }


};?>