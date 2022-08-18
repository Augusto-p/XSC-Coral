<?php 
class Usuario_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLibro($id){
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

    public function getAutor($id){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':idAutor', $id);
            $consulta->execute();
            $autor = new Autor();
            while ($row = $consulta->fetch()) {
                $autor->id = $row['id'];
                $autor->nombre = $row['nombre'];
                $autor->nacionalidad = $row['nacionalidad'];
                $autor->biografia = $row['biografia'];
                $autor->Fnacimento = $row['Fnacimento'];
                $autor->foto = $row['foto'];
            }
            return $libro;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
    }
    

}; ?>