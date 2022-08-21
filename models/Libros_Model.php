<?php 
class Libros_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function get($id){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $id);
            $consulta->execute();
            $libro = new Libro();
            while ($row = $consulta->fetch()) {
                $libro->isbn = $row['isbn'];
                $libro->titulo = $row['titulo'];
                $libro->precio = $row['precio'];
                $libro->categoria = $row['categoria'];
                $libro->idAutor = $row['idAutor'];
                $libro->sipnosis = $row['sipnosis'];
            }
            return $libro;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
    }

    public function add($book){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $book->isbn);
            $consulta->bindValue(':titulo', $book->titulo);
            $consulta->bindValue(':precio', $book->precio);
            $consulta->bindValue(':categoria', $book->categoria);
            $consulta->bindValue(':sipnosis', $book->sipnosis);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
    }

    public function getAll(){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro = new Libro();
                $libro->isbn = $row['isbn'];
                $libro->titulo = $row['titulo'];
                $libro->precio = $row['precio'];
                $libro->categoria = $row['categoria'];
                $libro->idAutor = $row['idAutor'];
                $libro->sipnosis = $row['sipnosis'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
    }

    public function getByAutor($idAutor){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':idAutor', $idAutor);
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro = new Libro();
                $libro->isbn = $row['isbn'];
                $libro->titulo = $row['titulo'];
                $libro->precio = $row['precio'];
                $libro->categoria = $row['categoria'];
                $libro->idAutor = $row['idAutor'];
                $libro->sipnosis = $row['sipnosis'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        

        
    }

    public function getByEditorial($idEditorial){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':idEditorial', $idEditorial);
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro = new Libro();
                $libro->isbn = $row['isbn'];
                $libro->titulo = $row['titulo'];
                $libro->precio = $row['precio'];
                $libro->categoria = $row['categoria'];
                $libro->idAutor = $row['idAutor'];
                $libro->sipnosis = $row['sipnosis'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
        
    }

    public function update($book){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $book->isbn);
            $consulta->bindValue(':titulo', $book->titulo);
            $consulta->bindValue(':precio', $book->precio);
            $consulta->bindValue(':categoria', $book->categoria);
            $consulta->bindValue(':sipnosis', $book->sipnosis);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
    }

    public function delete($id){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
        
    }


    

}; ?>