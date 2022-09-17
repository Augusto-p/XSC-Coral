<?php

require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'utilidades\Archivos.php';
require_once 'models\Autor_Model.php';
require_once 'models\Editorial_Model.php';
require_once 'models\Usuario_model.php';
require_once 'utilidades\Imagenes.php';

class Book_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $id = $_GET['ISBN'];
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

        $res = [
            "mensaje"   => "Hey",
            "Libro"     => $libro,
            "Editorial" => $editorial,
            "Autores"   => $autores,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/get");
    }

    public function seach() {
        $Termino        = $_GET['Termino'];
        $books          = $this->model->seach($Termino);
        $EditorialModel = new Editorial_Model();
        $AutorModel     = new Autor_Model();
        foreach ($books as $key => $book) {
            $file = new Archivo;
            $file->setPath($book->sipnosis);
            $file->read();
            $books[$key]->sipnosis  = $file->getContent();
            $books[$key]->Editorial = $EditorialModel->get($book->IDEditorial);
            $books[$key]->Autores   = $AutorModel->getBybook($book->isbn);

        }
        $res = [
            "mensaje"          => "Hey",
            "Numero de Libros" => count($books),
            "Libros"           => $books,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/seach");

    }

    public function getAll() {
        $Books = [];
        //gets Book
        $libros = $this->model->getAll();
        foreach ($libros as $key => $libro) {
            $file = new Archivo;
            $file->setPath($libro->sipnosis);
            $file->read();
            $libros[$key]->sipnosis  = $file->getContent();
            $AutorModel              = new Autor_Model();
            $libros[$key]->Autores   = $AutorModel->getBybook($libro->isbn);
            $EditorialModel          = new Editorial_Model();
            $libros[$key]->Editorial = $EditorialModel->get($libro->IDEditorial);
        }

        $res = [
            "mensaje"          => "Hey",
            "Numero De Libros" => count($libros),
            "Libros"           => $libros,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/get");
    }

    public function add() {
        //add author
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token     = $data->Token;
        $email     = $token; //probiconal JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $book              = new Book();
            $book->isbn        = $data->Libro->ISBN;
            $book->titulo      = $data->Libro->Titulo;
            $book->precio      = $data->Libro->Precio;
            $book->categorias  = $data->Libro->Categorias;
            $book->idsAutor    = $data->Libro->IDSAutor;
            $book->IDEditorial = $data->Libro->IDEditorial;
            $imgs              = $data->Libro->Imagenes;

            //guardado de sipnosis
            $file = new Archivo;
            $file->setPath("public/texts/BookSipnosis/" . $book->isbn . ".txt");
            $file->setContent($data->Libro->Sipnosis);
            $file->save();
            $book->sipnosis = $file->getPath();

            //manego de imagenes
            if (!file_exists('./public/imgs/Books/' . $book->isbn)) {
                mkdir("./public/imgs/Books/" . $book->isbn);
            }
            $cont  = 0;
            $paths = [];
            foreach ($imgs as $img) {
                $ImagenArticulo = new Imagenes("public/imgs/Books/" . $book->isbn . "/" . $cont);
                $paths[]        = $ImagenArticulo->Upload64($img);
                $cont++;
            }
            $book->imagenes = $paths;
            $this->model->add($book);
            
            $res             = ["mensaje" => "Hey Libro Ingresado"];
            $this->view->res = json_encode($res);
            $this->view->render("API\Book\add");

        } else {
            echo "error";
        }

    }
}