<?php 
require_once 'DTO/pedido.php';
class Pedido_Model extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function add($Pedido){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO pedidos (`ID_Venta`, `Descripcion`, `Sistema_Envio`) VALUES (:id, :desc, :envio);"); // consulta a la base de datos no disponible                                                      
            $consulta->bindValue(':id', $Pedido->id);
            $consulta->bindValue(':envio', $Pedido->SEnvio);
            $consulta->bindValue(':desc', $Pedido->Descripcion);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt



    public function get($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $row = $consulta->fetch();
            // ID_Venta, Descripcion, Sistema_Envio
            $Pedido = new Pedido();
            $Pedido->id           = $row['ID_Venta'];
            $Pedido->SEnvio       = $row['Sistema_Envio'];
            $Pedido->Descripcion = $row['Descripcion'];
            
            return $Pedido;
        } catch (PDOException $e) {
            return null;
        }finally {
           $pdo = null;
        }
        
    }//pt


    public function delete($id){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM pedidos WHERE (ID_Venta = :id);'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            return false;
        }finally {
           $pdo = null;
        }
    }//pt



}; ?>