<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/style.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/registro.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Usuario/aminations.css">
    <title>Libreria MiMundo</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico"
        type="image/x-icon">
</head>

<body>
    <section id="global">
        <section id="g-izq">
            <div id="g-izq-content">

                <div id="g-izq-content-in" onclick="goTo('<?php echo constant('URL'); ?>')">
                    <img src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg" alt="">
                </div>

            </div>
        </section>
        <section id="g-der">
            <form action="<?php echo constant('URL'); ?>Usuario/signupClientes" method="post" id="form-reg"
                enctype="multipart/form-data">
                <h2 id="titulo">Registrarse</h2>
                <div id="form-sls">
                    <div id="form-in">
                        <input type="text" name="Nombre" id="Nombre" placeholder="Nombre" class="inputs">
                        <input type="text" name="Apellido" id="Apellido" placeholder="Apellido" class="inputs">
                        <input type="email" name="Email" id="Email" placeholder="Email" class="inputs">
                        <input type="password" name="Password" id="password" placeholder="Password" class="inputs">
                        <input type="password" name="RPassword" id="rpassword" placeholder="Confirmar Password"
                            class="inputs">
                        <input type="date" name="FNacimiento" id="fecha" placeholder="Fecha de Nacimiento"
                            class="inputs">
                        <select name="Genero" id="genero" class="inputs">
                            <option value="" selected disabled>Género</option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                            <option value="P">Otro</option>
                        </select>
                        <input type="text" name="GPersonalizado" id="GP" placeholder="Genero" class="inputs">
                        <div id="Sig" class="btn">Siguiente</div>
                        <span class="span-cam">
                            ¿Ya tenes cuenta? <a href="<?php echo constant('URL'); ?>Usuario">Login</a>
                        </span>
                    </div>
                    <div id="form-end">
                        <input type="number" name="Numero" id="Numero" placeholder="Numero" class="inputs" step="1"
                            min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="Calle" id="Calle" placeholder="Calle" class="inputs">
                        <input type="text" name="Ciudad" id="Ciudad" placeholder="Ciudad" class="inputs">
                        <input type="number" name="Codigo" id="CPostal" placeholder="Codigo Postal" class="inputs"
                            step="1" min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
                        <input type="text" name="Departamento" list="depaList" id="departamento"
                            placeholder="Departamento" class="inputs">
                        <datalist id="depaList">
                            <option value="Artigas">
                            <option value="Canelones">
                            <option value="Cerro Largo">
                            <option value="Colonia">
                            <option value="Durazno">
                            <option value="Flores">
                            <option value="Florida">
                            <option value="Lavalleja">
                            <option value="Maldonado">
                            <option value="Montevideo">
                            <option value="Paysandú">
                            <option value="Rivera">
                            <option value="Rocha">
                            <option value="Salto">
                            <option value="San José">
                            <option value="Soriano">
                            <option value="Tacuarembó">
                            <option value="Treinta y Tres">
                        </datalist>
                        <div id="i-global">
                            <input type="file" name="PhotoPerfil" id="foto">
                            <div id="not-image">
                                <img src="<?php echo constant('URL'); ?>public/Recursos/icons/AddPhoto.svg" alt="">
                                <span id="DDTesxt">Seleccione su foto de perfil</span>
                            </div>
                            <div id="yes-image">
                                <img src="" alt="" id="foto-img">
                            </div>
                        </div>

                        <button id="send" type="submit" class="btn">Enviar</button>
                        <span class="span-cam">
                            ¿Ya tenes cuenta? <a href="<?php echo constant('URL'); ?>Usuario">Login</a>
                        </span>
                    </div>

                </div>



            </form>
        </section>


    </section>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Usuario/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/Usuario/registro.js"></script>

</html>