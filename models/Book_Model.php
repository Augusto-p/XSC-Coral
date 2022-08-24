<?php 

require_once 'DTO\book.php';
class Book_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function get($id){
        try {
            $pdo = $this->db->connect();
            $QBook = $pdo->prepare('SELECT * FROM libros where libros.isbn = :isbn'); // consulta a la base de datos no disponible 
            $QBook->bindValue(':isbn', $id);
            $QBook->execute();
            $libro = new Book();
            while ($row = $QBook->fetch()) {
                $libro->isbn = $row['ISBN'];
                $libro->titulo = $row['Titulo'];
                $libro->precio = $row['Precio'];
                $libro->sipnosis = $row['Sinopsis'];
                $libro->IDEditorial = $row['IdEditorial'];
            }
            $imagenes = [];
            $QImages = $pdo->prepare('SELECT * FROM imagenes_libros where imagenes_libros.isbn = :isbn'); // consulta a la base de datos no disponible 
            $QImages->bindValue(':isbn', $id);
            $QImages->execute();
            while ($row = $QImages->fetch()) {
                $imagenes[] = $row['URL'];
            }
            $libro->imagenes = $imagenes;

            $Categorias = [];
            $QCategorias = $pdo->prepare('SELECT * FROM categorias_libros where categorias_libros.isbn = :isbn'); // consulta a la base de datos no disponible 
            $QCategorias->bindValue(':isbn', $id);
            $QCategorias->execute();
            while ($row = $QCategorias->fetch()) {
                $Categorias[] = $row['Nombre'];
            }
            $libro->categorias = $Categorias;
            return $libro;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
    }

    public function add($book){
        try {
            $pdo = $this->db->connect();
            $QBook = $pdo->prepare('INSERT INTO libros (ISBN, Titulo, Sinopsis, Precio,IdEditorial) VALUES (:isbn,:titulo,:sipnosis,:precio,:idEdirorial );'); // consulta a la base de datos no disponible 
            $QBook->bindValue(':isbn', $book->isbn);
            $QBook->bindValue(':titulo', $book->titulo);
            $QBook->bindValue(':precio', $book->precio);
            $QBook->bindValue(':sipnosis', $book->sipnosis);
            $QBook->bindValue(':idEdirorial', $book->IDEditorial);
            $QBook->execute();
            foreach ($book->categorias as $key => $value) {
                $QCategoria = $pdo->prepare('INSERT INTO categorias_libros (Nombre, ISBN) VALUES (:categoria,:isbn )'); // consulta a la base de datos no disponible 
                $QCategoria->bindValue(':isbn', $book->isbn);
                $QCategoria->bindValue(':categoria', $value);
                $QCategoria->execute();
            }

            foreach ($book->imagenes as $key => $value) {
                $Qimagenes = $pdo->prepare('INSERT INTO imagenes_libros (URL, ISBN) VALUES (:ruta,:isbn)'); // consulta a la base de datos no disponible 
                $Qimagenes->bindValue(':isbn', $book->isbn);
                $Qimagenes->bindValue(':ruta', $value);
                $Qimagenes->execute();
            }
            return true;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function getAll(){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
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
           $pdo = null;
        }
        
    }

    public function getByAutor($idAutor){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
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
           $pdo = null;
        }
        

        
    }

    public function getByEditorial($idEditorial){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
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
           $pdo = null;
        }
        
        
    }

    public function update($book){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $book->isbn);
            $consulta->bindValue(':titulo', $book->titulo);
            $consulta->bindValue(':precio', $book->precio);
            $consulta->bindValue(':categoria', $book->categoria);
            $consulta->bindValue(':sipnosis', $book->sipnosis);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
    }

    public function delete($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
        
    }


    

}; ?>