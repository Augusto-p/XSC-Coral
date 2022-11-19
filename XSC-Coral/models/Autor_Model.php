<?php 
require_once 'DTO/autor.php';
class Autor_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($autor){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO autores (Nombre, Nacionalidad, Biografia, Fecha_Nacimiento) VALUES (:nombre, :nacionalidad, :biografia, :Fnacimento);"); // consulta a la base de datos no disponible                                                      
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
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return -1;
        }finally {
           $pdo = null;
        }
    }//upd

    public function getBybook($bookId){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select autores.* from autores join escriben on autores.ID = escriben.ID_Autor where escriben.ISBN = :isbn order by autores.Nombre'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':isbn', $bookId);
            $consulta->execute();
            $autores = [];
            while ($row = $consulta->fetch()) {
                $autor = new Autor();
                $autor->id = $row['ID'];
                $autor->nombre = $row['Nombre'];
                $autor->nacionalidad = $row['Nacionalidad'];
                $autor->biografia = $row['Biografia'];
                $autor->Fnacimento = $row['Fecha_Nacimiento'];
                $autor->foto = $row['Foto'];
                array_push($autores, $autor);
            }
            return $autores;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
        }finally {
           $pdo = null;
        }
        
    }

    public function getAll(){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select autores.* from autores order by autores.Nombre'); // consulta a la base de datos no disponible 
            $consulta->execute();
            $autores = [];
            while ($row = $consulta->fetch()) {
                $autor = new Autor();
                $autor->id = $row['ID'];
                $autor->nombre = $row['Nombre'];
                $autor->nacionalidad = $row['Nacionalidad'];
                $autor->biografia = $row['Biografia'];
                $autor->Fnacimento = $row['Fecha_Nacimiento'];
                $autor->foto = $row['Foto'];
                array_push($autores, $autor);
            }
            return $autores;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//upd

    public function get($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select autores.* from autores where autores.ID = :id'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $row = $consulta->fetch();
            $autor = new Autor();
            $autor->id           = $row['ID'];
            $autor->nombre       = $row['Nombre'];
            $autor->nacionalidad = $row['Nacionalidad'];
            $autor->biografia    = $row['Biografia'];
            $autor->Fnacimento   = $row['Fecha_Nacimiento'];
            $autor->foto         = $row['Foto'];
            return $autor;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
        }finally {
           $pdo = null;
        }
        
    }//upd

    public function update($autor){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('UPDATE autores SET Nombre = :nombre, Nacionalidad = :nacionalidad, `Biografia` = :biografia, `Fecha_Nacimiento` = :Fnacimento, `Foto` = :foto WHERE (`ID` = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $autor->id);
            $consulta->bindValue(':nombre', $autor->nombre);
            $consulta->bindValue(':nacionalidad', $autor->nacionalidad);
            $consulta->bindValue(':biografia', $autor->biografia);
            $consulta->bindValue(':Fnacimento', $autor->Fnacimento);
            $consulta->bindValue(':foto', $autor->foto);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        }finally {
           $pdo = null;
        }
    }//upd

    public function delete($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM autores WHERE (ID = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        }finally {
           $pdo = null;
        }
    }//upd

    public function updateImge($id, $path){
        $pdo = $this->db->connect();
        $consulta = $pdo->prepare("UPDATE autores SET Foto = :img WHERE (autores.ID = :id);"); // consulta a la base de datos no disponible 
        $consulta->bindValue(':id', $id);
        $consulta->bindValue(':img', $path);    
        return $consulta->execute();
    } //upd

}; ?>