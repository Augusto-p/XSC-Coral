<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/sendResetPassword.css">
    <title>Libreria MiMundo</title>
<link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico" type="image/x-icon">
    
</head>
    <body>
        <section id="global">
            <section id="g-izq">
                <div id="g-izq-content">
                    
                    <div id="g-izq-content-in">
                        <img src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg" alt="">
                    </div>
                
                </div>
            </section>
            <section id="g-der">
                <form action="<?php echo constant('URL'); ?>usuario/SendEmailPassword" method="post" id="form-olv-pass">
                    <h2 id="titulo">¿Olvidaste Tu Contraseña?</h2>
                    <input type="email" name="Email" id="email" placeholder="Email" class="inputs">
                    <button id="entrar" type="submit" class="btn">Entrar</button>

                    <span class="span-cam">
                        No teners cuenta? <a href="<?php echo constant('URL'); ?>Usuario/registrarse">Registrate</a>
                    </span>
                </form>
            </section>
    
    
        </section>
    </body>
    

<script src="public/js/Usuario/main.js"></script>
<script src="public/js/Usuario/SendResetPassWord.js"></script>
</html>