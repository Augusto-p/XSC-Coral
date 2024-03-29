<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/login.css">
    <title>Librería MiMundo</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico"
        type="image/x-icon">
</head>

<body>
    <section id="global">
        <section id="g-izq">
            <div id="g-izq-content" onclick="goTo('<?php echo constant('URL'); ?>')">

                <div id="g-izq-content-in">
                    <img src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg" alt="">
                </div>
            </div>
        </section>
        <section id="g-der">
            <form action="<?php echo constant('URL'); ?>Usuario/signin" method="post" id="form-log">
                <h2 id="titulo">Log In</h2>
                <input type="email" name="Email" id="email" placeholder="Email" class="inputs">
                <input type="password" name="Password" id="password" placeholder="Password" class="inputs">
                <button id="entrar" class="btn">Entrar</button>
                <span id="span-olv">¿<a href="<?php echo constant('URL'); ?>Usuario/resertPassword">Olvidaste tu
                        contraseña</a>?</span>

                <span class="span-cam">
                    ¿No tenes cuenta? <a href="<?php echo constant('URL'); ?>Usuario/registrarse">Regístrate</a>
                </span>
            </form>
        </section>


    </section>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Usuario/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/Usuario/login.js"></script>

</html>