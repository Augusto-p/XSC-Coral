<?php 
require_once 'DTO/carrito.php';
class Carrito_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($Carrito){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO `libreria`.`carrito` (`Email`, `ISBN`, `Fecha_Hora`) VALUES (:email, :isbn, :date);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':email', $Carrito->Email);
            $consulta->bindValue(':isbn', $Carrito->ISBN);
            $consulta->bindValue(':date', $Carrito->FechaHora);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//udt

    public function getByUser($email){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT carrito.* FROM carrito where carrito.Email = :email;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $Carritos = [];
            while ($row = $consulta->fetch()) {
                $Carrito = new Carrito();
                $Carrito->Email = $row['Email'];
                $Carrito->ISBN = $row['ISBN'];
                $Carrito->FechaHora = $row['Fecha_Hora'];
                array_push($Carritos, $Carrito);
            }
            return $Carritos;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
    }//udt

    public function deleteAll($email){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM carrito WHERE (`Email` = :email);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//udt

    public function delete($Carrito){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM carrito WHERE (Email =:email) and (`ISBN` = :isbn);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $Carrito->Email);
            $consulta->bindValue(':isbn', $Carrito->ISBN);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//udt

    public function Existe($email, $ISBN){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT carrito.* FROM carrito where carrito.Email = :email and carrito.ISBN = :isbn;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':isbn', $ISBN);
            $consulta->execute();
            $res = false;
            while ($row = $consulta->fetch()) {
                $res = true;
            }
        
            return $res;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
    }//udt



}; ?>