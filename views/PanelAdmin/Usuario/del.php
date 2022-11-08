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
        <?php require 'views/adminPanel.php';?>
        <div class="conten-data">
            <div id="Formulario">
                <h2 id="titulo">Eliminar Usuario</h2>

                <div class="data">
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="email" name="email" onkeyup="IDonKeyUp(event)" id="Email"
                                    placeholder="Email" class="inputs">
                                <Button class="btnSeach" onclick="Seach()" type="button"><img
                                        src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg"></Button>
                            </div>

                        </div>
                        <div class="col2 col">
                            <select name="Rol" id="Rol" class="inputs" disabled>
                                <option value="Cliente">Cliente</option>
                                <option value="Empleado">Empleado</option>
                                <option value="Administrador">Administrador</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="password" name="Password" id="password" placeholder="Password" class="inputs"
                                disabled>
                        </div>
                        <div class="col2 col">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" class="inputs" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <select name="Genero" id="genero" class="inputs" disabled>
                                <option value="" selected disabled>Género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="P">Otro</option>
                            </select>

                        </div>
                        <div class="col2 col">
                            <input type="text" name="GPersonalizado" id="GP" placeholder="Genero" class="inputs"
                                disabled>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="date" name="FNacimiento" id="fecha" placeholder="Fecha de Nacimiento" disabled
                                class="inputs">
                        </div>
                        <div class="col2 col">
                            <input type="number" name="numero" id="Numero" placeholder="Numero" class="inputs" step="1"
                                min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="calle" id="Calle" placeholder="Calle" class="inputs" disabled>
                        </div>
                        <div class="col2 col">
                            <input type="text" name="ciudad" id="Ciudad" placeholder="Ciudad" class="inputs" disabled>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="number" name="codigo" id="CPostal" placeholder="Codigo Postal" class="inputs"
                                step="1" min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                disabled>
                        </div>
                        <div class="col2 col">
                            <input type="text" name="Departamento" list="depaList" id="departamento"
                                placeholder="Departamento" class="inputs" disabled>
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
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col1 col">
                           
                        </div>

                    </div> -->
                </div>

                <div id="save-div">
                    <button type="button" onclick="Send()">Eliminar</button>
                </div>
            </div>
        </div>
    </section>


    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/Usuario/moduser.css">

</body>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Usuario/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/Usuario/del.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/AdminPanel/AdminPanel.js"></script>

</html>