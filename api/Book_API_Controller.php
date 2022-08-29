<?php

require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'utilidades\Archivos.php';
require_once 'models\Autor_Model.php';
require_once 'models\Editorial_Model.php';

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
            $file  = new Archivo;
            $file->setPath($book->sipnosis);
            $file->read();
            $books[$key]->sipnosis = $file->getContent();
            $books[$key]->Editorial = $EditorialModel->get($book->IDEditorial);
            $books[$key]->Autores   = $AutorModel->getBybook($book->isbn);

        }
        $res = [
            "mensaje"     => "Hey",
            "Numero de Libros" => count($books),
            "Libros"   => $books ,
        ];
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/seach");

    }
}