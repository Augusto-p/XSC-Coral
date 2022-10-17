<?php
require_once 'DTO/editorial.php';

class Editorial_Model extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function add($editorial) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('INSERT INTO editoriales (Nombre, Web, Direccion, Telefono, Email) VALUES (:nombre, :web, :direccion, :telefono, :email);'); // consulta a la base de datos no disponible

            $consulta->bindValue(':nombre', $editorial->nombre);
            $consulta->bindValue(':direccion', $editorial->direccion);
            $consulta->bindValue(':telefono', $editorial->telefono);
            $consulta->bindValue(':email', $editorial->email);
            $consulta->bindValue(':web', $editorial->web);

            if ($consulta->execute()) {
                return $pdo->lastInsertId();
            } else {
                return -1;
            }
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return -1;
        } finally {
            $pdo = null;
        }
    } //upd

    public function getAll() {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select * from editoriales'); // consulta a la base de datos no disponible
            $consulta->execute();
            $editoriales = [];
            while ($row = $consulta->fetch()) {
                $editorial            = new Editorial();
                $editorial->id        = $row['ID'];
                $editorial->nombre    = $row['Nombre'];
                $editorial->direccion = $row['Direccion'];
                $editorial->telefono  = $row['Telefono'];
                $editorial->email     = $row['Email'];
                $editorial->web       = $row['Web'];
                $editorial->logo      = $row['Logo'];
                array_push($editoriales, $editorial);
            }
            return $editoriales;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
            
        } finally {
            $pdo = null;
        }
    } //upd

    public function get($id) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select * from editoriales where editoriales.ID =:id'); // consulta a la base de datos no disponible
            $consulta->bindValue(':id', $id);
            $consulta->execute();
            $editorial = new Editorial();
            while ($row = $consulta->fetch()) {
                $editorial->id        = $row['ID'];
                $editorial->nombre    = $row['Nombre'];
                $editorial->direccion = $row['Direccion'];
                $editorial->telefono  = $row['Telefono'];
                $editorial->email     = $row['Email'];
                $editorial->web       = $row['Web'];
                $editorial->logo      = $row['Logo'];
            }
            return $editorial;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
        } finally {
            $pdo = null;
        }
    } //upd

    public function update($editorial) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('UPDATE editoriales SET Nombre = :nombre, Web = :web, Logo = :logo, `Direccion` = :direccion, Telefono = :telefono, Email = :email WHERE (`ID` = :id);'); // consulta a la base de datos no disponible
            $consulta->bindValue(':id', $editorial->id);
            $consulta->bindValue(':nombre', $editorial->nombre);
            $consulta->bindValue(':direccion', $editorial->direccion);
            $consulta->bindValue(':telefono', $editorial->telefono);
            $consulta->bindValue(':email', $editorial->email);
            $consulta->bindValue(':web', $editorial->web);
            $consulta->bindValue(':logo', $editorial->logo);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        } finally {
            $pdo = null;
        }
    }

    public function delete($id) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM editoriales WHERE (ID = :id);'); // consulta a la base de datos no disponible
            $consulta->bindValue(':id', $id);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return false;
        } finally {
            $pdo = null;
        }
    } //upd

    public function updateImge($id, $path) {
        $pdo      = $this->db->connect();
        $consulta = $pdo->prepare("UPDATE editoriales SET Logo = :img WHERE (editoriales.ID = :id);"); // consulta a la base de datos no disponible
        $consulta->bindValue(':id', $id);
        $consulta->bindValue(':img', $path);
        return $consulta->execute();
    } //upd
};?>