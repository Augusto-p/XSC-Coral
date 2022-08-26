<?php 
require_once 'DTO\autor.php';
class Autor_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($autor){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO autores(Nombre, Nacionlidad, Biografia, Fecha_Namcimetno) VALUES (:nombre, :nacionalidad, :biografia, :Fnacimento);"); // consulta a la base de datos no disponible 
            $consulta->bindValue(':nombre', $autor->nombre);
            $consulta->bindValue(':nacionalidad', $autor->nacionalidad);
            $consulta->bindValue(':biografia', $autor->biografia);
            $consulta->bindValue(':Fnacimento', $autor->Fnacimento);
            
            if ($consulta->execute()) {
                return $pdo->lastInsertId();
            } else {
                return -1;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function getBybook($bookId){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select autores.* from autores join tienen on autores.id = tienen.idautor where tienen.isbn=:isbn'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $bookId);
            $consulta->execute();
            $autores = [];
            while ($row = $consulta->fetch()) {
                $autor = new Autor();
                $autor->id = $row['ID'];
                $autor->nombre = $row['Nombre'];
                $autor->nacionalidad = $row['Nacionlidad'];
                $autor->biografia = $row['Biografia'];
                $autor->Fnacimento = $row['Fecha_Namcimetno'];
                $autor->foto = $row['Foto'];
                array_push($autores, $autor);
            }
            return $autores;
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
            $autores = [];
            while ($row = $consulta->fetch()) {
                $autor = new Autor();
                $autor->id = $row['id'];
                $autor->nombre = $row['nombre'];
                $autor->nacionalidad = $row['nacionalidad'];
                $autor->biografia = $row['biografia'];
                $autor->Fnacimento = $row['Fnacimento'];
                $autor->foto = $row['foto'];
                array_push($autores, $autor);
            }
            return $autores;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
        
    }

    public function get($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $row = $consulta->fetch();
            $autor = new Autor();
            $autor->id = $row['id'];
            $autor->nombre = $row['nombre'];
            $autor->nacionalidad = $row['nacionalidad'];
            $autor->biografia = $row['biografia'];
            $autor->Fnacimento = $row['Fnacimento'];
            $autor->foto = $row['foto'];
            return $autor;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
    }

    public function update($autor){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $autor->id);
            $consulta->bindValue(':nombre', $autor->nombre);
            $consulta->bindValue(':nacionalidad', $autor->nacionalidad);
            $consulta->bindValue(':biografia', $autor->biografia);
            $consulta->bindValue(':Fnacimento', $autor->Fnacimento);
            $consulta->bindValue(':foto', $autor->foto);
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
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function updateImge($id, $path){
        $pdo = $this->db->connect();
        $consulta = $pdo->prepare("UPDATE autores SET Foto = :img WHERE (ID = :id);"); // consulta a la base de datos no disponible 
        $consulta->bindValue(':id', $id);
        $consulta->bindValue(':img', $path);    
        $consulta->execute();
    }

}; ?>