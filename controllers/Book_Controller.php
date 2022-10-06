<?php
require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'DTO/editorial.php';
require_once 'utilidades/Archivos.php';
require_once 'models/Autor_Model.php';
require_once 'models/Editorial_Model.php';
require_once 'utilidades/Imagenes.php';

class Book_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }
    public function render() {

        if (isset($_GET["Categoria"])) {
            $Books = $this->model->getByCategoria($_GET["Categoria"]);
        } elseif (isset($_GET["Autor"])) {
            $Books = $this->model->getByAutor($_GET["Autor"]);
        }elseif (isset($_GET["Editorial"])){
            $Books = $this->model->getByEditorial($_GET["Editorial"]);
        }elseif (isset($_GET["Seach"])) {
            $Books = $this->model->seach($_GET["Seach"]);
        }
        
        else {
            $Books = $this->model->getAll();
        }
        foreach ($Books as $key => $libro) {
            $file = new Archivo;
            $file->setPath($libro->sipnosis);
            $file->read();
            $Books[$key]->sipnosis  = $file->getContent();
            $AutorModel             = new Autor_Model();
            $Books[$key]->Autores   = $AutorModel->getBybook($libro->isbn);
            $EditorialModel         = new Editorial_Model();
            $Books[$key]->Editorial = $EditorialModel->get($libro->IDEditorial);
        }
        $this->view->Books = $Books;
        $this->view->render('libros/Listar');
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
        $this->view->Paises = file_get_contents('public/Recursos/Jsons/Paises.json');

        $this->view->render('libros/view');
    }
    public function new() {
        $this->view->render('PanelAdmin/Book/add');
    }

    public function change(){
        $this->view->render('PanelAdmin/Book/mod');
    }

    public function remove(){
        $this->view->render('PanelAdmin/Book/del');
    }
    
    // public function explorer(){
    //     if ($_GET["Categoria"] != null) {
    //         $Books = $this->model->getAllByCategoria($_GET["Categoria"]);    
    //     }else {
    //         $Books = $this->model->getAll();
    //     }



    //     foreach ($Books as $key => $libro) {
    //         $file = new Archivo;
    //         $file->setPath($libro->sipnosis);
    //         $file->read();
    //         $Books[$key]->sipnosis  = $file->getContent();
    //         $AutorModel             = new Autor_Model();
    //         $Books[$key]->Autores   = $AutorModel->getBybook($libro->isbn);
    //         $EditorialModel         = new Editorial_Model();
    //         $Books[$key]->Editorial = $EditorialModel->get($libro->IDEditorial);
    //     }
    //     $this->view->Books = $Books;
    //     $this->view->render('libros/Listar');
    // }


};?>