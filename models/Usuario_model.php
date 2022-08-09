<?php 
class Usuario_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
 
    public function entrar($user){
        $Accseo = false;
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare('');// consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $user->email);
            $consulta->bindValue(':pass', $user->password);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->password = $row['contrasena'];
                $usr->email = $row['Email'];
                $usr->id = $row['ID'];
                $usr->nombre = $row['Nombre'];
                $usr->Fnacimento = $row["Fecha_nacimiento"];
                $usr->Genero = $row["Genero"];
                $usr->rol = $row["Rol"];
            }
            return $usr;
        } catch (PDOException $e) {
            return false;
        }finally {
            $db = null;
        }
        return $Accseo;
    }

   

    public function registrarse($user){
         try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':name', $user->nombre);
            $consulta->bindValue(':ape', $user->apellido);
            $consulta->bindValue(':email', $user->email);
            $consulta->bindValue(':pass', $user->password);
            $consulta->bindValue(':FNacim', $user->Fecha_nacimiento);
            $consulta->bindValue(':Genero', $user->Genero);
            $consulta->bindValue(':Rol', $user->rol);
            $consulta->bindValue(':Numero', $user->numero);
            $consulta->bindValue(':Calle', $user->calle);
            $consulta->bindValue(':Ciudad', $user->ciudad);
            $consulta->bindValue(':CodigoPostal', $user->codigoPostal);
            $consulta->bindValue(':Departamento', $user->departamento);
            $consulta->bindValue(':img', $user->$Iuser);
            
            return $consulta->execute();
        }catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
    }

    public function getNombrebyEmail($email){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->execute();
            $usr = new Usuario();
            while ($row = $consulta->fetch()) {
                $usr->nombre = $row['Nombre'];
            }
            return $usr->nombre;
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
           $db = null;
        }
        
    }

    public function remplacePassWordBYEmailSystem($token, $password){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':token', $token);
            $consulta->bindValue(':password', $password);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
              $db = null;
          }
    }

    public function setTokenOfForgetPasswordByEmailSystem(){
        try {
            $db = $this->db;
            $consulta = $db->connect()->prepare(''); // consulta a la base de datos no disponible 
            $consulta->bindValue(':email', $email);
            $consulta->bindValue(':token', $token);
            return $consulta->execute();
        } catch (PDOException $e) {
            var_dump($e);
        }finally {
              $db = null;
          }
        
    }


}; ?>