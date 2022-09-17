<?php
require 'vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;



class Imagenes {
    private $file;
    private $Tipo;
    private $OutPath;
    private $nombre;
    private $tipos = ['jpg', 'png', 'jpeg', 'gif'];
    

    public function __construct() {
        $params = func_get_args(); //get params
        $num_params = func_num_args(); //get params number
        $funcion_constructor = '__construct' . $num_params; // crate constructor name
        if (method_exists($this, $funcion_constructor)) { // existis construcor
            call_user_func_array([$this, $funcion_constructor], $params); //call constructor
        }
    }

    public function __construct1($OutPath) {
        $this->OutPath = $OutPath;
    }
    public function __construct2($file, $OutPath) {
        $this->file    = $file;
        $this->nombre  = basename($file["name"]);
        $this->Tipo    = pathinfo($this->nombre, PATHINFO_EXTENSION);
        $this->OutPath = $OutPath . "." . $this->Tipo;
    }

    public function Upload() {
        if (in_array($this->Tipo, $this->tipos)) { //verifica que el formato de la imagen este soportado
            move_uploaded_file($this->file['tmp_name'], $this->OutPath); // almacena el contenido en la ruta de salida (OutPath)
            return $this->OutPath;
        } else {
            return false;
        }
    }
    public function Upload64($content) {
        $this->OutPath = $this->OutPath . "." . $this->getTipoContent($content);
        $imageData = base64_decode(explode(",", $content)[1]);
        $success = file_put_contents($this->OutPath, $imageData);

        return $this->OutPath;
    }

    // public function CreateUserImage($rol, $nombre, $apellido, $email){
        
    //     // (A) SETTINGS
    //     $txt = strtoupper($nombre[0]) . strtoupper($apellido[0]);
    //     $font = "C:\Windows\Fonts\arial.ttf"; // ! CHANGE THIS TO YOUR OWN !
    //     $font_size = 114;
    //     $width = 500;
    //     $height = 500;
    //     $font_angle = 0;
 
    //     // (B) IMAGE OBJECT + COLORS
    //     $img = imagecreate($width, $height);

    //     if ($rol == "Administrador") {
    //         // $bg = "#FFD700";
    //         $bg = imagecolorallocate($img, 255, 215, 00);
    //     }elseif ($rol == "Empleado"){
    //         // $bg = "#00FF42";
    //         $bg = imagecolorallocate($img, 00, 255, 66);
    //     }else{
    //         // $bg = "#00FFD1";
    //         $bg = imagecolorallocate($img, 00, 255, 209);
              
    //     }     
    //     // $font_path = "public/Recursos/Fonts/Roboto/Roboto-Bold.ttf";
    //     // $text = strtoupper($nombre[0]) . strtoupper($apellido[0]);

        
    //     $withe = imagecolorallocate($img, 255, 255, 255);
    //     imagefilledrectangle($img, 0, 0, $width, $height, $bg);
 
    //     // (C) TEXT BOX SIZE
    //     // imagettfbbox(FONT SIZE, ANGLE, FONT, TEXT)
    //     $text_size = imagettfbbox($font_size, $font_angle, $font, $txt);
    //     $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
    //     $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);
 
    //     // (D) CENTERING THE TEXT BLOCK
    //     $centerX = CEIL(($width - $text_width) / 2);
    //     $centerX = $centerX<0 ? 0 : $centerX;
    //     $centerY = CEIL(($height - $text_height -100) / 2);
    //     $centerY = $centerY<0 ? 0 : $centerY;
    //     imagettftext($img, $font_size, $font_angle, $centerX, $centerY, $withe, $font, $txt);
 
    //     // (E) OUTPUT
    //     imagepng($img, "demo.png");
    //     imagedestroy($img);
        
    //     // $img = Image::canvas(500, 500, "#ff0000");
    //     // $img->text('test', 0, 0, function($font) {
    //     //     $font->file(public_path('Roboto-Bold.ttf'));
    //     //     $font->size(100);
    //     //     $font->color('#fff');
    //     //     $font->align('center');
    //     //     $font->valign('top');
    //     //     $font->angle(45);
    //     // });

    //     // $img->save('test.jpg');

        
    // }

    private function getTipoContent($content){
        return explode("/", explode(";", explode(",", $content)[0])[0])[1];
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getOutPath() {
        return $this->OutPath;
    }

    public function setOutPath($OutPath) {
        $this->OutPath = $OutPath;

    }

    public function getTipo() {
        return $this->Tipo;
    }

    public function setTipo($Tipo) {
        $this->Tipo = $Tipo;

    }

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;

    }
};?>