<?php 
require_once 'DTO/compra.php';
class Compra_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($compra){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO compras (`ID_Editorial`, `Estado`, `Fecha_Hora`, `Metodo_Pago`, `Total`) VALUES (:edi, :estado, :date, :mp, :total);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':edi', $compra->IDEditorial);
            $consulta->bindValue(':mp', $compra->MPago);
            $consulta->bindValue(':total', $compra->Total);
            $consulta->bindValue(':date', $compra->FechaHora);
            $consulta->bindValue(':estado', $compra->estado);            
            if ($consulta->execute()) {
                return $pdo->lastInsertId();
            } else {
                return -1;
            }
        } catch (PDOException $e) {
            return -1;
        }finally {
           $pdo = null;
        }
    }//udt

    public function getAll(){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras;'); // consulta a la base de datos no disponible 
            $consulta->execute();
            $Compras = [];
            while ($row = $consulta->fetch()) {
                $Compra = new Compra();
                $Compra->id = $row['ID'];
                $Compra->estado = $row['Estado'];
                $Compra->MPago = $row['Metodo_Pago'];
                $Compra->IDEditorial = $row['ID_Editorial'];
                $Compra->FechaHora = $row['Fecha_Hora'];
                $Compra->Total = $row['Total'];
                array_push($Compras, $Compra);
            }
            return $Compras;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt

    public function getAllByEditorial($IDEdirorial){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras where compras.ID_Editorial = :idedi;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':idedi', $IDEdirorial);
            $consulta->execute();
            $Compras = [];
            while ($row = $consulta->fetch()) {
                $Compra = new Compra();
                $Compra->id = $row['ID'];
                $Compra->estado = $row['Estado'];
                $Compra->MPago = $row['Metodo_Pago'];
                $Compra->IDEditorial = $row['ID_Editorial'];
                $Compra->FechaHora = $row['Fecha_Hora'];
                $Compra->Total = $row['Total'];
                array_push($Compras, $Compra);
            }
            return $Compras;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt

    public function getAllByMPago($MPago){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras where compras.Metodo_Pago = :mp;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':mp', $MPago);
            $consulta->execute();
            $Compras = [];
            while ($row = $consulta->fetch()) {
                $Compra = new Compra();
                $Compra->id = $row['ID'];
                $Compra->estado = $row['Estado'];
                $Compra->MPago = $row['Metodo_Pago'];
                $Compra->IDEditorial = $row['ID_Editorial'];
                $Compra->FechaHora = $row['Fecha_Hora'];
                $Compra->Total = $row['Total'];
                array_push($Compras, $Compra);
            }
            return $Compras;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt
    
    public function getAllByEstado($Estado){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras where compras.Estado = :status;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':status', $Estado);
            $consulta->execute();
            $Compras = [];
            while ($row = $consulta->fetch()) {
                $Compra = new Compra();
                $Compra->id = $row['ID'];
                $Compra->estado = $row['Estado'];
                $Compra->MPago = $row['Metodo_Pago'];
                $Compra->IDEditorial = $row['ID_Editorial'];
                $Compra->FechaHora = $row['Fecha_Hora'];
                $Compra->Total = $row['Total'];
                array_push($Compras, $Compra);
            }
            return $Compras;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt

    public function getAllByFecha($from, $to){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras where compras.Fecha_Hora between :from and :to;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':from', $from);
            $consulta->bindValue(':to', $to);
            $consulta->execute();
            $Compras = [];
            while ($row = $consulta->fetch()) {
                $Compra = new Compra();
                $Compra->id = $row['ID'];
                $Compra->estado = $row['Estado'];
                $Compra->MPago = $row['Metodo_Pago'];
                $Compra->IDEditorial = $row['ID_Editorial'];
                $Compra->FechaHora = $row['Fecha_Hora'];
                $Compra->Total = $row['Total'];
                array_push($Compras, $Compra);
            }
            return $Compras;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt

    public function get($ID){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM compras where compras.ID = :id;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $ID);
            $consulta->execute();
            $row = $consulta->fetch();
            $Compra = new Compra();
            $Compra->id = $row['ID'];
            $Compra->estado = $row['Estado'];
            $Compra->MPago = $row['Metodo_Pago'];
            $Compra->IDEditorial = $row['ID_Editorial'];
            $Compra->FechaHora = $row['Fecha_Hora'];
            $Compra->Total = $row['Total'];

            return $Compra;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt

    public function NewStatus($ID, $status){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('UPDATE compras SET Estado = :status WHERE (ID = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $ID);
            $consulta->bindValue(':status', $status);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }//udt

    public function delete($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM compras WHERE (ID = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//udt

    
}; ?>