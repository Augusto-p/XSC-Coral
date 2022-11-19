<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libreria MiMundo</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico"
        type="image/x-icon">

</head>

<body>
    <!-- baner -->
    <?php require 'views/header.php';?>
    <!-- contenido -->

    <section class="content">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/cuenta.css">
    <div class="optionPanel">
        <div class="Burgerdiv" onclick="MenuBurger()">
            <span>☰</span>
        </div>
        <div class="titulo-Div-OP">
            <h3>Panel De Control</h3>
        </div>
        <div class="OP-item">
            <div class="OP-item-titulo" onclick="goTo('<?php echo constant('URL'); ?>usuario/settings')">
                <h4 class="noselect">
                <img src="<?php echo constant('URL'); ?>public/Recursos/icons/user.svg">Cuenta</h4>
            </div>
        </div>
        <div class="OP-item">
            <div class="OP-item-titulo" onclick="goTo('<?php echo constant('URL'); ?>usuario/security')">
                <h4 class="noselect">
                <img src="<?php echo constant('URL'); ?>public/Recursos/icons/security.svg">Seguridad</h4>
            </div>
        </div>
    </div>
        
        <div class="conten-data">
            <div id="Formulario">
                <h2 id="titulo">Seguridad</h2>
                <div class="data">
                    <div class="cuentaHeder">
                        <div class="cuentaHederImg" style="background-image: url(<?php echo constant('URL'); ?><?=$this->user->Iuser;?>);">
                        </div>
                        <h2 class="cuentaHederName"><?=$this->user->nombrecompleto;?></h2>
                        <h4 class="cuentaHederEmail"><?=$this->user->email;?></h4>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="password" name="Password" id="password" placeholder="Contraseña Actual" class="inputs">
                        </div>
                        <div class="col2 col">
                             <input type="password" name="Password" id="Npassword" placeholder="Contraseña Nueva" class="inputs">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                        
                        </div>
                        <div class="col2 col">
                            <input type="password" name="Password" id="RNpassword" placeholder="Contraseña Nueva" class="inputs">

                        </div>
                    </div>
                    

                
                </div>
                    
                <div id="save-div">
                    <button type="button" onclick="Send()">Guardar</button>
                </div>
            </div>
        </div>
    </section>


</body>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/Usuario/Security.js"></script>





</html>