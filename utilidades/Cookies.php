<?php 

class Cookies {
    public static function newCookie($datos){
        $name = $datos["name"];
        $value = $datos["value"];
        $path = $datos["path"] ?? "/";
        $time = (($datos["time"]["year"] ?? 0) * 31536000+ ($datos["time"]["month"] ?? 0) * 2592000 + ($datos["time"]["day"] ?? 0) * 86400 + ($datos["time"]["hours"] ?? 0) * 3600 + ($datos["time"]["minutes"] ?? 0) * 60 + ($datos["time"]["seconds"] ?? 0));
        return setcookie($name, $value, time() + $time, $path);
        
    }
    public static function newSessionCookie($datos){
        $name = $datos["name"];
        $value = $datos["value"];
        $path = $datos["path"] ?? "/";
        return setcookie($name, $value, 0, $path);
    }

    public static function delCookie($datos){
        $name = $datos["name"];
        $path = $datos["path"] ?? "/";
        return setcookie($name, "", time() - 10, $path);
    }

}