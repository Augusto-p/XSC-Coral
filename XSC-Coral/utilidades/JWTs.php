<?php 
require 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JWTs {


    public static function newJWT($email, $TTL){
        $payload = [
            "Email" => $email,
            "iat" => time(),
            "exp" => time() + $TTL
        ];
        return JWT::encode($payload, constant('JWT_KEY'), 'HS256');       
    }

    public static function ValidJWT($jwt){
        $jwt = str_replace("Token ","",$jwt);
        try {
            $deco = JWT::decode($jwt, new Key(constant('JWT_KEY'), 'HS256'));
            if ($deco->exp < time()) {
                return false;
            }else{
                return $deco->Email;
            }
        } catch (Exception $e) {
            Errors::NewError("JWT", __File__, __Line__, $e->getMessage());

            return false;
        }
        
    }

}