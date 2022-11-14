<?php
require_once 'DTO/usuario.php';
class Usuario_Model extends Model {
    public function __construct() {
        parent::__construct();
    }

    public function entrar($user) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select * from usuarios where usuarios.Email = :email'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $user->email);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->nombrecompleto = $row['Nombre'];
                $usr->email          = $row['Email'];
                $usr->Fnacimento     = $row["Fecha_Nacimento"];
                $usr->password       = $row['Password'];
                $usr->rol            = $row["Rol"];
                $usr->Genero         = $row["Genero"];
                $usr->Iuser          = $row["Foto"];
                $usr->numero         = $row["Numero"];
                $usr->calle          = $row["Calle"];
                $usr->ciudad         = $row["Ciudad"];
                $usr->codigoPostal   = $row["Codigo_Postal"];
                $usr->departamento   = $row["Departamento"];

            }
            if (password_verify($user->password, $usr->password)) {
                return $usr;
            } else {
                return false;
            }

        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        } finally {
            $pdo = null;
        }
    } //upd

    public function registrarse($user) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO usuarios (Nombre, Email, Fecha_Nacimento, Genero, Departamento, Numero, Calle, Ciudad, Password, Foto, Rol, Codigo_Postal) VALUES (:Nombre, :email, :FNacim, :Genero, :Departamento, :Numero, :Calle, :Ciudad, :pass, :img, :Rol, :CodigoPostal)"); // consulta a la base de datos no disponible
            $consulta->bindParam(':email', $user->email);
            $consulta->bindParam(':Nombre', $user->nombrecompleto);
            $consulta->bindParam(':FNacim', $user->Fnacimento);
            $consulta->bindParam(':Genero', $user->Genero);
            $consulta->bindParam(':pass', $user->password);
            $consulta->bindParam(':img', $user->Iuser);
            $consulta->bindParam(':Rol', $user->rol);
            $consulta->bindParam(':Numero', $user->numero);
            $consulta->bindParam(':Calle', $user->calle);
            $consulta->bindParam(':Ciudad', $user->ciudad);
            $consulta->bindParam(':Departamento', $user->departamento);
            $consulta->bindParam(':CodigoPostal', $user->codigoPostal);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return false;
        } finally {
            $pdo = null;
        }
    } //upd

    public function get($email) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select * from usuarios where usuarios.Email = :email'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->nombrecompleto = $row['Nombre'];
                $usr->email          = $row['Email'];
                $usr->Fnacimento     = $row["Fecha_Nacimento"];
                $usr->password       = $row['Password'];
                $usr->rol            = $row["Rol"];
                $usr->Genero         = $row["Genero"];
                $usr->Iuser          = $row["Foto"];
                $usr->numero         = $row["Numero"];
                $usr->calle          = $row["Calle"];
                $usr->ciudad         = $row["Ciudad"];
                $usr->codigoPostal   = $row["Codigo_Postal"];
                $usr->departamento   = $row["Departamento"];

            }
            return $usr;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return null;
        } finally {
            $pdo = null;
        }

    } //upd

    public function getNombrebyEmail($email) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select Nombre from usuarios where usuarios.Email = :email'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $name = "";
            while ($row = $consulta->fetch()) {
                $name = $row['Nombre'];
            }
            return $name;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return null;
        } finally {
            $pdo = null;
        }

    }//upd

    public function remplacePassWordBYEmailSystem($token, $password) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('update usuarios set Password=:password, Token_Password="" where usuarios.Token_Password = :token;'); // consulta a la base de datos no disponible
            $consulta->bindValue(':token', $token);
            $consulta->bindValue(':password', $password);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return false;
        } finally {
            $pdo = null;
        }
    }//upd

    public function setTokenOfForgetPasswordByEmailSystem($email, $token, $date) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('update usuarios set Token_Password=:token, Fecha_Token=:date where usuarios.email = :email;'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':token', $token);
            $consulta->bindValue(':date', $date);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return false;
        } finally {
            $pdo = null;
        }

    }//upd
    

    public function update($user) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare("UPDATE usuarios SET Nombre = :Nombre, Fecha_Nacimento = :FNacim, Genero = :Genero, Departamento = :Departamento, Numero = :Numero, Calle = :Calle, Ciudad = :Ciudad, Password = :pass, Foto = :img, Rol = :Rol, Codigo_Postal = :CodigoPostal WHERE (`Email` = :email);"); // consulta a la base de datos no disponible
            $consulta->bindParam(':email', $user->email);
            $consulta->bindParam(':Nombre', $user->nombrecompleto);
            $consulta->bindParam(':FNacim', $user->Fnacimento);
            $consulta->bindParam(':Genero', $user->Genero);
            $consulta->bindParam(':pass', $user->password);
            $consulta->bindParam(':img', $user->Iuser);
            $consulta->bindParam(':Rol', $user->rol);
            $consulta->bindParam(':Numero', $user->numero);
            $consulta->bindParam(':Calle', $user->calle);
            $consulta->bindParam(':Ciudad', $user->ciudad);
            $consulta->bindParam(':Departamento', $user->departamento);
            $consulta->bindParam(':CodigoPostal', $user->codigoPostal);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        } finally {
            $pdo = null;
        }
    }

    public function delete($email) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('DELETE FROM usuarios WHERE (Email = :email);'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $email);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());
            return false;
        } finally {
            $pdo = null;
        }
    }//upd

    public function getRol($email) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare('select Rol from usuarios where usuarios.Email = :email'); // consulta a la base de datos no disponible
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $rol = false;
            while ($row = $consulta->fetch()) {
                $rol = $row["Rol"];
            }
            return $rol;
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        } finally {
            $pdo = null;
        }

    } //upd

    public function newpass($email, $password) {
        try {
            $pdo      = $this->db->connect();
            $consulta = $pdo->prepare("UPDATE usuarios SET Password = :pass WHERE (`Email` = :email);"); // consulta a la base de datos no disponible
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':pass', $password);
            return $consulta->execute();
        } catch (PDOException $e) {
            Errors::NewError("PDO", __File__, __Line__, $e->getMessage());

            return false;
        } finally {
            $pdo = null;
        }
    }

};?>