<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


class Mail {
    private $mail;
    private $correo;
    private $pass;
    public function __construct()
    {
        $this->correo = constant('EMAIL');
        $this->pass = constant('SEED_PHRASE');
        $this->mail = new PHPMailer();
        $this->mail->isSMTP();
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->Host = "smtp.gmail.com";
        $this->mail->Port = 587;
        $this->mail->Username = $this->correo;
        $this->mail->Password = $this->pass;
    }



    public function SendMailForgetPassword($email, $ID_Password_Reset, $nombre){
        $body = file_get_contents('templates/mails/forgetPassword.html'); // se obtiene la plantilla
        $body = str_replace('%%NOMBRE_USER%%', "Binevenido ". $nombre, $body); // se reemplaza el nombre del usuario
        $body = str_replace('%%ENLACE_LINK%%', constant('URL')."usuario/resetPasswordByIDPassword?code=".$ID_Password_Reset, $body); // se reemplaza el link del reset password
        $this->mail->setFrom($this->correo, "Mi mundo web"); // se establece el correo de origen
        $this->mail->addAddress($email, $nombre); // se establece el correo de destino
        $this->mail->Subject = "Recuperar contraseña"; // se establece el asunto
        $this->mail->AddEmbeddedImage('public/Recursos/imgs/LogoMimundo.png', 'logo'); // se establece la imagen del logo
        $this->mail->Body = $body; // se establece el cuerpo del mensaje
        $this->mail->isHTML(true); // se establece que el mensaje es HTML
        $this->mail->CharSet = "UTF-8"; // se establece la codificacion del mensaje
        return $this->mail->send();


    }

    public function SendMailETiket($email, $Tiket, $nombre){
        $body = file_get_contents('templates/mails/SendTiket.html'); // se obtiene la plantilla
        $body = str_replace('%%NOMBRE_USER%%', "Binevenido ". $nombre, $body); // se reemplaza el nombre del usuario
        $this->mail->setFrom($this->correo, "Mi mundo web"); // se establece el correo de origen
        $this->mail->addAddress($email, $nombre); // se establece el correo de destino
        $this->mail->Subject = "Ticket de MiMundo"; // se establece el asunto
        $this->mail->AddEmbeddedImage('public/Recursos/imgs/LogoMimundo.png', 'logo'); // se establece la imagen del logo
        $this->mail->AddAttachment($Tiket, 'ticket');
        $this->mail->Body = $body; // se establece el cuerpo del mensaje
        $this->mail->isHTML(true); // se establece que el mensaje es HTML
        $this->mail->CharSet = "UTF-8"; // se establece la codificacion del mensaje
        return $this->mail->send();


    }





}



; ?>