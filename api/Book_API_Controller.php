<?php

require_once 'DTO/book.php';
require_once 'DTO/autor.php';
require_once 'utilidades/Archivos.php';
require_once 'models/Autor_Model.php';
require_once 'models/Editorial_Model.php';
require_once 'models/Usuario_Model.php';
require_once 'utilidades/Imagenes.php';


class Book_API_Controller extends Controller {
    public function __construct() {
        parent::__construct();
    }

    public function get() {
        $id = $_GET['ISBN'];
        //get Book
        $libro = $this->model->get($id);
        if ($libro != null) {
            # code...
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
        }else{
            $res = [
            "mensaje"   => "Error"
        ];
        }
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

    public function getAllByCategoria() {
        $Categoria = $_GET["Categoria"];
        //gets Book
        $libros = $this->model->getByCategoria($Categoria);
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
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
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
            $a =$this->model->add($book);
            if ($a == true) {
                $res = ["mensaje" => "Libro Ingresado", "code" => 200];    
            }else{
                $res = ["mensaje" => $a, "code" => 404];    
            }
            
            
            
            

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/add");

    }

    public function delete() {
        //add author
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $book        = $this->model->get($data->Libro->ISBN);
            unlink($book->sipnosis); // delete Sipnosis
            foreach ($book->imagenes as $key => $value) {
                unlink($value); // delete images
            }
            rmdir("public/imgs/Books/".$data->Libro->ISBN);
            
            if($this->model->delete($data->Libro->ISBN)){
                $res = ["mensaje" => "Libro Eliminado Correctamente", "code" => 200];
            }else{
                $res = ["mensaje" => "Libro No Localizado", "code" => 404];
            }
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/del");

    }

    public function mod() {
        //add author
        $userModel = new Usuario_Model();
        $data      = json_decode(file_get_contents('php://input'));
        $token = JWTs::ValidJWT(apache_request_headers()["Authorization"]);
        $email = $token != false ? $token : null; //JWT
        if ($userModel->getRol($email) == "Administrador" || $userModel->getRol($email) == "Empleado") {
            $book = $this->model->get($data->Libro->ISBN);
            $book->titulo      = $data->Libro->Titulo != null ? $data->Libro->Titulo : $book->titulo;
            $book->precio      = $data->Libro->Precio != null ? $data->Libro->Precio : $book->precio;
            $book->categorias  = $data->Libro->Categorias != null ? $data->Libro->Categorias : $book->categorias;
            $book->IDEditorial = $data->Libro->IDEditorial != null ? $data->Libro->IDEditorial : $book->IDEditorial;
            
            

            //guardado de sipnosis
            if ($data->Libro->Sipnosis != null) {
                $file = new Archivo;
                $file->setPath("public/texts/BookSipnosis/" . $book->isbn . ".txt");
                $file->setContent($data->Libro->Sipnosis);
                $file->save();
                $book->sipnosis = $file->getPath();
            }
            // manejo de imagnes
            if($data->Libro->Imagenes != null){
                Archivo::RmDir('./public/imgs/Books/' . $book->isbn);
                mkdir("./public/imgs/Books/" . $book->isbn);
                $cont  = 0;
                $paths = [];
                foreach ($data->Libro->Imagenes as $img) {
                    $ImagenArticulo = new Imagenes("public/imgs/Books/" . $book->isbn . "/" . $cont);
                    $paths[] = $ImagenArticulo->Upload64($img);
                    $cont++;
                }
                $book->imagenes = $paths;
            }
            
            if ($data->Libro->IDSAutor != null) {
                $book->idsAutor = $data->Libro->IDSAutor;    
            }
           
            
            
            if ($this->model->update($book)) {
                $res = ["mensaje" => "Libro Actualizado", "code" => 200];
            }else {
                $res = ["mensaje" => "Libro No Actualizado", "code" => 404];
            }
                      

        } else {
            $res = ["mensaje" => "Permisos Insuficientes", "code" => 403];
        }
        $this->view->res = json_encode($res);
        $this->view->render("API/Book/add");

    }
}