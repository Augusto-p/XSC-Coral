<?php 
class Editorial_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($editorial){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':nombre', $editorial->nombre);
            $consulta->bindValue(':direccion', $editorial->direccion);
            $consulta->bindValue(':telefono', $editorial->telefono);
            $consulta->bindValue(':email', $editorial->email);
            $consulta->bindValue(':web', $editorial->web);
            $consulta->bindValue(':logo', $editorial->logo);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function getBybook($bookId){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $bookId);
            $consulta->execute();
            $editoriales = [];
            while ($row = $consulta->fetch()) {
                $editorial = new Editorial();
                $editorial->id = $row['id'];
                $editorial->nombre = $row['nombre'];
                $editorial->direccion = $row['direccion'];
                $editorial->telefono = $row['telefono'];
                $editorial->email = $row['email'];
                $editorial->web = $row['web'];
                $editorial->logo = $row['logo'];
                array_push($editoriales, $editorial);
            }
            return $editoriales;
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
            $editoriales = [];
            while ($row = $consulta->fetch()) {
                $editorial = new Editorial();
                $editorial->id = $row['id'];
                $editorial->nombre = $row['nombre'];
                $editorial->direccion = $row['direccion'];
                $editorial->telefono = $row['telefono'];
                $editorial->email = $row['email'];
                $editorial->web = $row['web'];
                $editorial->logo = $row['logo'];
                array_push($editoriales, $editorial);
            }
            return $editoriales;
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
            $editorial = new Editorial();
            $editorial->id = $row['id'];
            $editorial->nombre = $row['nombre'];
            $editorial->direccion = $row['direccion'];
            $editorial->telefono = $row['telefono'];
            $editorial->email = $row['email'];
            $editorial->web = $row['web'];
            $editorial->logo = $row['logo'];
            return $editorial;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function update($editorial){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $editorial->id);
            $consulta->bindValue(':nombre', $editorial->nombre);
            $consulta->bindValue(':direccion', $editorial->direccion);
            $consulta->bindValue(':telefono', $editorial->telefono);
            $consulta->bindValue(':email', $editorial->email);
            $consulta->bindValue(':web', $editorial->web);
            $consulta->bindValue(':logo', $editorial->logo);
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
};?>