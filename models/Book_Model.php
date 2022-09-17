<?php

require_once 'DTO\book.php';
class Book_Model extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function get($id) {
        try {
            $pdo   = $this->db->connect();
            $QBook = $pdo->prepare('SELECT * FROM libros where libros.ISBN = :isbn'); // consulta a la base de datos no disponible
            $QBook->bindValue(':isbn', $id);
            $QBook->execute();
            $libro = new Book();
            while ($row = $QBook->fetch()) {
                $libro->isbn        = $row['ISBN'];
                $libro->titulo      = $row['Titulo'];
                $libro->precio      = $row['Precio'];
                $libro->sipnosis    = $row['Sinopsis'];
                $libro->IDEditorial = $row['ID_Editorial'];
            }
            $imagenes = [];
            $QImages  = $pdo->prepare('SELECT * FROM libros_imgs where libros_imgs.isbn = :isbn'); // consulta a la base de datos no disponible
            $QImages->bindValue(':isbn', $id);
            $QImages->execute();
            while ($row = $QImages->fetch()) {
                $imagenes[] = $row['Img'];
            }
            $libro->imagenes = $imagenes;

            $Categorias  = [];
            $QCategorias = $pdo->prepare('SELECT * FROM libros_categorias where libros_categorias.isbn = :isbn'); // consulta a la base de datos no disponible
            $QCategorias->bindValue(':isbn', $id);
            $QCategorias->execute();
            while ($row = $QCategorias->fetch()) {
                $Categorias[] = $row['Categoria'];
            }
            $libro->categorias = $Categorias;
            return $libro;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }//upd

    public function add($book) {
        try {
            $pdo   = $this->db->connect();
            $QBook = $pdo->prepare('INSERT INTO `libreria`.`libros` (`ISBN`, `Titulo`, `Precio`, `Sinopsis`, `ID_Editorial`)  VALUES (:isbn,:titulo,:precio,:sipnosis,:idEdirorial );'); // consulta a la base de datos no disponible
            $QBook->bindValue(':isbn', $book->isbn);
            $QBook->bindValue(':titulo', $book->titulo);
            $QBook->bindValue(':precio', $book->precio);
            $QBook->bindValue(':sipnosis', $book->sipnosis);
            $QBook->bindValue(':idEdirorial', $book->IDEditorial);
            $QBook->execute();
            foreach ($book->categorias as $key => $value) {
                $QCategoria = $pdo->prepare('INSERT INTO `libros_categorias` (`Categoria`, `ISBN`) VALUES (:categoria,:isbn )'); // consulta a la base de datos no disponible
                $QCategoria->bindValue(':isbn', $book->isbn);
                $QCategoria->bindValue(':categoria', $value);
                $QCategoria->execute();
            }

            foreach ($book->imagenes as $key => $value) {
                $Qimagenes = $pdo->prepare('INSERT INTO `libros_imgs` (`ISBN`, `Img`) VALUES (:isbn, :ruta)'); // consulta a la base de datos no disponible
                $Qimagenes->bindValue(':isbn', $book->isbn);
                $Qimagenes->bindValue(':ruta', $value);
                $Qimagenes->execute();
            }
            foreach ($book->idsAutor as $key => $value) {
                $QEscriven = $pdo->prepare('INSERT INTO `escriben` (`ISBN`, `ID_Autor`) VALUES (:isbn, :idautor);'); // consulta a la base de datos no disponible
                $QEscriven->bindValue(':isbn', $book->isbn);
                $QEscriven->bindValue(':idautor', $value);
                $QEscriven->execute();
            }
            
            return true;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }
    }//upd

    public function seach($Termino) {
        try {
            $pdo   = $this->db->connect();
            $QBook = $pdo->prepare('SELECT * FROM libros where libros.Titulo like :Termino'); // consulta a la base de datos no disponible
            $QBook->bindValue(':Termino', "%" . $Termino . "%");
            $QBook->execute();
            $books = [];
            while ($row = $QBook->fetch()) {
                $libro              = new Book();
                $libro->isbn        = $row['ISBN'];
                $libro->titulo      = $row['Titulo'];
                $libro->precio      = $row['Precio'];
                $libro->sipnosis    = $row['Sinopsis'];
                $libro->IDEditorial = $row['ID_Editorial'];
                $books[]            = $libro;
            }
            foreach ($books as $key => $book) {
                $imagenes   = [];
                $Categorias = [];
                $QImages    = $pdo->prepare('SELECT * FROM libros_imgs where libros_imgs.isbn = :isbn'); // consulta a la base de datos no disponible
                $QImages->bindValue(':isbn', $book->isbn);
                $QImages->execute();
                while ($row = $QImages->fetch()) {
                    $imagenes[] = $row['URL'];
                }
                $QCategorias = $pdo->prepare('SELECT * FROM libros_categorias where libros_categorias.isbn = :isbn'); // consulta a la base de datos no disponible
                $QCategorias->bindValue(':isbn', $book->isbn);
                $QCategorias->execute();
                while ($row = $QCategorias->fetch()) {
                    $Categorias[] = $row['Nombre'];
                }
                $books[$key]->categorias = $Categorias;
                $books[$key]->imagenes   = $imagenes;
            }

            return $books;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }
    }//upd

    public function getAll() {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM libros'); // consulta a la base de datos no disponible
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro              = new Book();
                $libro->isbn        = $row['ISBN'];
                $libro->titulo      = $row['Titulo'];
                $libro->precio      = $row['Precio'];
                $libro->sipnosis    = $row['Sinopsis'];
                $libro->IDEditorial = $row['ID_Editorial'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }//upd

    public function getByAutor($idAutor) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select libros.* from libros join escriben on libros.ISBN = escriben.ISBN where escriben.ID_autor =:idAutor'); // consulta a la base de datos no disponible
            $consulta->bindValue(':idAutor', $idAutor);
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro              = new Book();
                $libro->isbn        = $row['ISBN'];
                $libro->titulo      = $row['Titulo'];
                $libro->precio      = $row['Precio'];
                $libro->sipnosis    = $row['Sinopsis'];
                $libro->IDEditorial = $row['ID_Editorial'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }//upd

    public function getByEditorial($idEditorial) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select libros.* from libros where libros.ID_Editorial =:idEditorial'); // consulta a la base de datos no disponible
            $consulta->bindValue(':idEditorial', $idEditorial);
            $consulta->execute();
            $libros = [];
            while ($row = $consulta->fetch()) {
                $libro              = new Book();
                $libro->isbn        = $row['ISBN'];
                $libro->titulo      = $row['Titulo'];
                $libro->precio      = $row['Precio'];
                $libro->sipnosis    = $row['Sinopsis'];
                $libro->IDEditorial = $row['ID_Editorial'];
                array_push($libros, $libro);
            }
            return $libros;
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }//upd

    public function update($book) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible
            $consulta->bindValue(':isbn', $book->isbn);
            $consulta->bindValue(':titulo', $book->titulo);
            $consulta->bindValue(':precio', $book->precio);
            $consulta->bindValue(':categoria', $book->categoria);
            $consulta->bindValue(':sipnosis', $book->sipnosis);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }

    public function delete($id) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM libros WHERE (ISBN = :isbn);'); // consulta a la base de datos no disponible
            $consulta->bindValue(':isbn', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        } finally {
            $pdo = null;
        }

    }//upd

    

};?>