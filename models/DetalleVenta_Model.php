<?php 
require_once 'DTO/detalleVenta.php';
class DetalleVenta_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($DetalleVenta){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO ventas_detalle (ID_Venta, ISBN, Cantidad, Descuento) VALUES (:id, :isbn, :cant, :descu);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':id', $DetalleVenta->id);
            $consulta->bindValue(':isbn', $DetalleVenta->ISBN);
            $consulta->bindValue(':descu', $DetalleVenta->Descuento);
            $consulta->bindValue(':cant', $DetalleVenta->Cantidad);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//udt



    public function getAllByIdVenta($IDVenta){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $IDVenta);
            $consulta->execute();
            $Detalles = [];
            while ($row = $consulta->fetch()) {
                $Detalle = new DetalleVenta();
                $Detalle->id = $row['ID_Venta'];
                $Detalle->ISBN = $row['ISBN'];
                $Detalle->Descuento = $row['Descuento'];
                $Detalle->Cantidad = $row['Cantidad'];
                array_push($Detalles , $Detalle);
            }
            return $Detalles;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//udt



    public function deleteByIdVenta($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM ventas_detalle WHERE (ID_Venta = :id)'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt

    // public function delete($id, $ISBN){
    //     try {
    //         $pdo = $this->db->connect();
    //         $consulta = $pdo->prepare('DELETE FROM ventas_detalle WHERE (ID_Venta = :id) and (ISBN = :isbn);'); // consulta a la base de datos no disponible 
    //         $consulta->bindValue(':id', $id);
    //         $consulta->bindValue(':isbn', $ISBN);
    //         return $consulta->execute();
    //     } catch (PDOException $e) {
    //         return false;
    //     }finally {
    //        $pdo = null;
    //     }
    // }//pt
}; ?>