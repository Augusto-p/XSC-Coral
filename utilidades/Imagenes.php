<?php 
class Imagenes {
    private $file;
    private $Tipo;
    private $OutPath;
    private $nombre;
    private $tipos = ['jpg', 'png', 'jpeg', 'gif'];
    
    public function __construct($file, $OutPath) {
        $this->file = $file;
        $this->nombre = basename($file["name"]);
        $this->Tipo = pathinfo($this->nombre, PATHINFO_EXTENSION);
        $this->OutPath = $OutPath . "." . $this->Tipo;
    }

    public function Upload(){
        if (in_array($this->Tipo, $this->tipos)) { //verifica que el formato de la imagen este soportado
            move_uploaded_file($this->file['tmp_name'], $this->OutPath); // almacena el contenido en la ruta de salida (OutPath)
            return $this->OutPath;
        }
        else{
            return false;
        }
        
    }





    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getOutPath()
    {
        return $this->OutPath;
    }


    public function setOutPath($OutPath)
    {
        $this->OutPath = $OutPath;

    }


    public function getTipo()
    {
        return $this->Tipo;
    }


    public function setTipo($Tipo)
    {
        $this->Tipo = $Tipo;

    }


    public function getFile()
    {
        return $this->file;
    }


    public function setFile($file)
    {
        $this->file = $file;

    }
}; ?>