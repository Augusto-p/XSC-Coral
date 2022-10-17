<?php 

class SessionStorage {
    public static function newSS($datos){
        $name = $datos["name"];
        $value = $datos["value"];
        echo'<script> sessionStorage.setItem("'.$name.'", "'.$value.'");</script>';
        
        
    }
    

    public static function delSS($name){
        echo '<script> sessionStorage.setItem("' . $name . '", "");</script>';

    }

}