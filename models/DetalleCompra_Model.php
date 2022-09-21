<?php 
require_once 'DTO/detalleCompra.php';
class DetalleCompra_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($DetalleCompra){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO compras_detalle (`ID_Compra`, `ISBN`, `Precio`, `Cantidad`) VALUES (:id, :isbn, :PU, :cant);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':id', $DetalleCompra->id);
            $consulta->bindValue(':isbn', $DetalleCompra->ISBN);
            $consulta->bindValue(':PU', $DetalleCompra->PUnitario);
            $consulta->bindValue(':cant', $DetalleCompra->Cantidad);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt



    public function getAllByIdCompra($IDCompra){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM libreria.compras_detalle where compras_detalle.ID_Compra = :id;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $IDCompra);
            $consulta->execute();
            $Detalles = [];
            while ($row = $consulta->fetch()) {
                $Detalle = new DetalleCompra();
                $Detalle->id = $row['ID_Compra'];
                $Detalle->ISBN = $row['ISBN'];
                $Detalle->PUnitario = $row['Precio'];
                $Detalle->Cantidad = $row['Cantidad'];
                array_push($Detalles , $Detalle);
            }
            return $Detalles;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
        
    }//pt



    public function deleteByIdCompra($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM compras_detalle WHERE (ID_Compra = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt

    public function delete($id, $ISBN){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM compras_detalle WHERE (ID_Compra = :id) and (ISBN = :isbn);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            $consulta->bindValue(':isbn', $ISBN);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt
}; ?>