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
                $id =  $pdo->lastInsertId();
            } else {
                $id = -1;
            }
            if ($id > 0) {
                $consulta2 = $pdo->prepare("INSERT INTO pedidos (`ID_Venta`, `Descripcion`, `Sistema_Envio`) VALUES (:id, :desc, :envio);"); // consulta a la base de datos no disponible                                                      
                $consulta2->bindValue(':id', $id);
                $consulta2->bindValue(':envio', $Pedido->SEnvio);
                $consulta2->bindValue(':desc', $Pedido->Descripcion);
                $consulta2->execute();
                foreach ($venta->Detalles as $key => $DetalleVenta) {
                    $consulta3 = $pdo->prepare("INSERT INTO ventas_detalle (ID_Venta, ISBN, Cantidad, Descuento) VALUES (:id, :isbn, :cant, :descu);"); // consulta a la base de datos no disponible                                                      
                    $consulta3->bindValue(':id', $id);
                    $consulta3->bindValue(':isbn', $DetalleVenta->ISBN);
                    $consulta3->bindValue(':descu', $DetalleVenta->Descuento);
                    $consulta3->bindValue(':cant', $DetalleVenta->Cantidad);
                    $consulta3->execute();
                }
            }
            $pdo->commit();
        } catch (PDOException $e) {
            $pdo->rollBack();
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
            foreach ($ventas as $key => $venta) {
                $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
                $consulta2->bindValue(':id', $venta->id);
                $consulta2->execute();
                while ($row = $consulta2->fetch()) {
                    $Pedido = new Pedido();
                    $Pedido->id           = $row['ID_Venta'];
                    $Pedido->SEnvio       = $row['Sistema_Envio'];
                    $Pedido->Descripcion = $row['Descripcion'];
                }
                $ventas[$key]->Pedido = $Pedido;
                $consulta3 = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
                $consulta3->bindValue(':id', $venta->id);
                $consulta3->execute();
                $Detalles = [];
                while ($row = $consulta3->fetch()) {
                    $Detalle = new DetalleVenta();
                    $Detalle->id = $row['ID_Venta'];
                    $Detalle->ISBN = $row['ISBN'];
                    $Detalle->Descuento = $row['Descuento'];
                    $Detalle->Cantidad = $row['Cantidad'];
                    array_push($Detalles , $Detalle);
                }
                $ventas[$key]->Detalles = $Detalles;
            
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
            foreach ($ventas as $key => $venta) {
                $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible
                $consulta2->bindValue(':id', $venta->id);
                $consulta2->execute();
                while ($row = $consulta2->fetch()) {
                    $Pedido              = new Pedido();
                    $Pedido->id          = $row['ID_Venta'];
                    $Pedido->SEnvio      = $row['Sistema_Envio'];
                    $Pedido->Descripcion = $row['Descripcion'];
                }
                $ventas[$key]->Pedido = $Pedido;
                $consulta3            = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible
                $consulta3->bindValue(':id', $venta->id);
                $consulta3->execute();
                $Detalles = [];
                while ($row = $consulta3->fetch()) {
                    $Detalle            = new DetalleVenta();
                    $Detalle->id        = $row['ID_Venta'];
                    $Detalle->ISBN      = $row['ISBN'];
                    $Detalle->Descuento = $row['Descuento'];
                    $Detalle->Cantidad  = $row['Cantidad'];
                    array_push($Detalles, $Detalle);
                }
                $ventas[$key]->Detalles = $Detalles;

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
            foreach ($ventas as $key => $venta) {
                $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
                $consulta2->bindValue(':id', $venta->id);
                $consulta2->execute();
                while ($row = $consulta2->fetch()) {
                    $Pedido = new Pedido();
                    $Pedido->id           = $row['ID_Venta'];
                    $Pedido->SEnvio       = $row['Sistema_Envio'];
                    $Pedido->Descripcion = $row['Descripcion'];
                }
                $ventas[$key]->Pedido = $Pedido;
                $consulta3 = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
                $consulta3->bindValue(':id', $venta->id);
                $consulta3->execute();
                $Detalles = [];
                while ($row = $consulta3->fetch()) {
                    $Detalle = new DetalleVenta();
                    $Detalle->id = $row['ID_Venta'];
                    $Detalle->ISBN = $row['ISBN'];
                    $Detalle->Descuento = $row['Descuento'];
                    $Detalle->Cantidad = $row['Cantidad'];
                    array_push($Detalles , $Detalle);
                }
                $ventas[$key]->Detalles = $Detalles;
            
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
            foreach ($ventas as $key => $venta) {
                $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
                $consulta2->bindValue(':id', $venta->id);
                $consulta2->execute();
                while ($row = $consulta2->fetch()) {
                    $Pedido = new Pedido();
                    $Pedido->id           = $row['ID_Venta'];
                    $Pedido->SEnvio       = $row['Sistema_Envio'];
                    $Pedido->Descripcion = $row['Descripcion'];
                }
                $ventas[$key]->Pedido = $Pedido;
                $consulta3 = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
                $consulta3->bindValue(':id', $venta->id);
                $consulta3->execute();
                $Detalles = [];
                while ($row = $consulta3->fetch()) {
                    $Detalle = new DetalleVenta();
                    $Detalle->id = $row['ID_Venta'];
                    $Detalle->ISBN = $row['ISBN'];
                    $Detalle->Descuento = $row['Descuento'];
                    $Detalle->Cantidad = $row['Cantidad'];
                    array_push($Detalles , $Detalle);
                }
                $ventas[$key]->Detalles = $Detalles;
            
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
            foreach ($ventas as $key => $venta) {
                $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
                $consulta2->bindValue(':id', $venta->id);
                $consulta2->execute();
                while ($row = $consulta2->fetch()) {
                    $Pedido = new Pedido();
                    $Pedido->id           = $row['ID_Venta'];
                    $Pedido->SEnvio       = $row['Sistema_Envio'];
                    $Pedido->Descripcion = $row['Descripcion'];
                }
                $ventas[$key]->Pedido = $Pedido;
                $consulta3 = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
                $consulta3->bindValue(':id', $venta->id);
                $consulta3->execute();
                $Detalles = [];
                while ($row = $consulta3->fetch()) {
                    $Detalle = new DetalleVenta();
                    $Detalle->id = $row['ID_Venta'];
                    $Detalle->ISBN = $row['ISBN'];
                    $Detalle->Descuento = $row['Descuento'];
                    $Detalle->Cantidad = $row['Cantidad'];
                    array_push($Detalles , $Detalle);
                }
                $ventas[$key]->Detalles = $Detalles;
            
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
            $consulta2 = $pdo->prepare('SELECT * FROM pedidos where pedidos.ID_Venta = :id'); // consulta a la base de datos no disponible 
            $consulta2->bindValue(':id', $venta->id);
            $consulta2->execute();
            while ($row = $consulta2->fetch()) {
                $Pedido = new Pedido();
                $Pedido->id           = $row['ID_Venta'];
                $Pedido->SEnvio       = $row['Sistema_Envio'];
                $Pedido->Descripcion = $row['Descripcion'];
            }
            $venta->Pedido = $Pedido;
            $consulta3 = $pdo->prepare('SELECT * FROM ventas_detalle where ventas_detalle.ID_Venta = :id;'); // consulta a la base de datos no disponible 
            $consulta3->bindValue(':id', $venta->id);
            $consulta3->execute();
            $Detalles = [];
            while ($row = $consulta3->fetch()) {
                $Detalle = new DetalleVenta();
                $Detalle->id = $row['ID_Venta'];
                $Detalle->ISBN = $row['ISBN'];
                $Detalle->Descuento = $row['Descuento'];
                $Detalle->Cantidad = $row['Cantidad'];
                array_push($Detalles , $Detalle);
            }
            $venta->Detalles = $Detalles;
            

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