<?php 
require_once 'DTO\usuario.php';
class Usuario_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function entrar($user){
        $Accseo = false;
        try {
             $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select * from usuarios where usuarios.email = ":email" and usuarios.Contraseña = ":pass";');// consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $user->email);
            $consulta->bindValue(':pass', $user->password);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                
                $usr->nombrecompleto = $row['Nombre'];
                $usr->email = $row['email'];
                $usr->Fnacimento = $row["FNamcimento"];
                $usr->rol = $row["rol"];
                $usr->genero = $row["genero"];
                $usr->Iuser = $row["foto"];
                $usr->numero = $row["numero"];
                $usr->calle = $row["calle"];
                $usr->ciudad = $row["ciudad"];
                $usr->codigoPostal = $row["codigoPostal"];
                $usr->departamento = $row["departamento"];
                
            }
            return $usr;
        } catch (PDOException $e) {
            return false;
        }finally {
            $pdo = null;
        }
        return $Accseo;
    }

   

    public function registrarse($user){
         try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare("INSERT INTO usuarios (email, Nombre, FNamcimento, genero, Contraseña, foto, Rol, Numero, Calle, Ciudad, Departamento, Codigo_Postal) VALUES (:email, :nameo, :FNacim, :Genero, :pass, :img, :Rol, :Numero, :Calle, :Ciudad, :Departamento, :CodigoPostal)"); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $user->email);
            $consulta->bindValue(':nameo', $user->nombrecompleto);
            $consulta->bindValue(':FNacim', $user->Fnacimento);
            
            $consulta->bindValue(':Genero', $user->Genero);
            $consulta->bindValue(':pass', $user->password);
            $consulta->bindValue(':img', $user->Iuser);
            $consulta->bindValue(':Rol', $user->rol);
            $consulta->bindValue(':Numero', $user->numero);
            $consulta->bindValue(':Calle', $user->calle);
            $consulta->bindValue(':Ciudad', $user->ciudad);
            $consulta->bindValue(':Departamento', $user->departamento);
            $consulta->bindValue(':CodigoPostal', $user->codigoPostal);
            return $consulta->execute();
        }catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
    }

    public function get($email){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select * from usuarios where usuarios.email = :email'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->nombrecompleto = $row['Nombre'];
                $usr->email = $row['email'];
                $usr->Fnacimento = $row["FNamcimento"];
                $usr->password = $row['Contraseña'];
                $usr->rol = $row["Rol"];
                $usr->genero = $row["genero"];
                $usr->Iuser = $row["foto"];
                $usr->numero = $row["Numero"];
                $usr->calle = $row["Calle"];
                $usr->ciudad = $row["Ciudad"];
                $usr->codigoPostal = $row["Codigo_Postal"];
                $usr->departamento = $row["Departamento"];
            }
            return $usr;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
    }

    public function getNombrebyEmail($email){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('select Nombre from usuarios where usuarios.email = :email'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->nombrecompleto = $row['Nombre'];
            }
            return $usr->nombrecompleto;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $pdo = null;
        }
        
    }

    public function remplacePassWordBYEmailSystem($token, $password){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('update usuarios set Contraseña=:password, ID_Password_Reset="" where usuarios.ID_Password_Reset = :token;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':token', $token);
            $consulta->bindValue(':password', $password);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
              $pdo = null;
          }
    }

    public function setTokenOfForgetPasswordByEmailSystem($email, $token, $date){
        try {
            $pdo = $this->db->connect();
            $consulta = $pdo->prepare('update usuarios set ID_Password_Reset=:token, fecha_Password_Reset=:date where usuarios.email = :email;'); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':token', $token);
            $consulta->bindValue(':date', $date);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
              $pdo = null;
          }
        
    }


}; ?>