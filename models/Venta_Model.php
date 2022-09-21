<?php 
require_once 'DTO/venta.php';
class Venta_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($venta){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO ventas (Email, Estado, Metodo_Pago, Fecha_Hora, Total) VALUES (:email, :estado, :mp, :date, :total);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':email', $venta->Email);
            $consulta->bindValue(':mp', $venta->MPago);
            $consulta->bindValue(':total', $venta->Total);
            $consulta->bindValue(':date', $venta->FechaHora);
            $consulta->bindValue(':estado', $venta->Estado);  
            
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
            $consulta = $pdo->prepare('SELECT * FROM ventas;'); // consulta a la base de datos no disponible 
            $consulta->execute();
            $ventas = [];
            while ($row = $consulta->fetch()) {
                $venta = new Venta();
                $venta->id = $row['ID'];
                $venta->Estado = $row['Estado'];
                $venta->MPago = $row['Metodo_Pago'];
                $venta->Email = $row['Email'];
                $venta->FechaHora = $row['Fecha_Hora'];
                $venta->Total = $row['Total'];
                array_push($ventas, $venta);
            }
            return $ventas;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt

    public function getAllByUser($Email){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas where ventas.Email = :email;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $Email);
            $consulta->execute();
            $ventas = [];
            while ($row = $consulta->fetch()) {
                $venta = new Venta();
                $venta->id = $row['ID'];
                $venta->Estado = $row['Estado'];
                $venta->MPago = $row['Metodo_Pago'];
                $venta->Email = $row['Email'];
                $venta->FechaHora = $row['Fecha_Hora'];
                $venta->Total = $row['Total'];
                array_push($ventas, $venta);
            }
            return $ventas;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt

    public function getAllByMPago($MPago){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas where ventas.Metodo_Pago = :mp;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':mp', $MPago);
            $consulta->execute();
            $ventas = [];
            while ($row = $consulta->fetch()) {
                $venta = new Venta();
                $venta->id = $row['ID'];
                $venta->Estado = $row['Estado'];
                $venta->MPago = $row['Metodo_Pago'];
                $venta->Email = $row['Email'];
                $venta->FechaHora = $row['Fecha_Hora'];
                $venta->Total = $row['Total'];
                array_push($ventas, $venta);
            }
            return $ventas;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt
    
    public function getAllByEstado($Estado){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas where ventas.Estado = :status;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':status', $Estado);
            $consulta->execute();
            $ventas = [];
            while ($row = $consulta->fetch()) {
                $venta = new Venta();
                $venta->id = $row['ID'];
                $venta->Estado = $row['Estado'];
                $venta->MPago = $row['Metodo_Pago'];
                $venta->Email = $row['Email'];
                $venta->FechaHora = $row['Fecha_Hora'];
                $venta->Total = $row['Total'];
                array_push($ventas, $venta);
            }
            return $ventas;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt

    public function getAllByFecha($from, $to){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas where ventas.Fecha_Hora between :from and :to;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':from', $from);
            $consulta->bindValue(':to', $to);
            $consulta->execute();
            $ventas = [];
            while ($row = $consulta->fetch()) {
                $venta = new Venta();
                $venta->id = $row['ID'];
                $venta->Estado = $row['Estado'];
                $venta->MPago = $row['Metodo_Pago'];
                $venta->Email = $row['Email'];
                $venta->FechaHora = $row['Fecha_Hora'];
                $venta->Total = $row['Total'];
                array_push($ventas, $venta);
            }
            return $ventas;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt

    public function get($ID){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas where ventas.ID = :id;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $ID);
            $consulta->execute();
            $row = $consulta->fetch();
            $venta = new Venta();
            $venta->id = $row['ID'];
            $venta->Estado = $row['Estado'];
            $venta->MPago = $row['Metodo_Pago'];
            $venta->Email = $row['Email'];
            $venta->FechaHora = $row['Fecha_Hora'];
            $venta->Total = $row['Total'];

            return $venta;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt

    public function NewStatus($ID, $status){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('UPDATE ventas SET Estado = :status WHERE (ID = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $ID);
            $consulta->bindValue(':status', $status);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//upt

    public function delete($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM ventas WHERE (ID = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt

    
}; ?>