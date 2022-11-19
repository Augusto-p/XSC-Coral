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
                <h2 id="titulo">Cuenta</h2>
                <div class="data">
                    <div class="cuentaHeder">
                        <div class="cuentaHederImg" style="background-image: url(<?php echo constant('URL'); ?><?=$this->user->Iuser;?>);">
                            <input type="file" name="Imge" id="Image">
                            <div class="cuentaHederImgView">
                                <h6>Cambiar Imagen</h6>
                            </div>    
                        </div>
                        <h2 class="cuentaHederName"><?=$this->user->nombrecompleto;?></h2>
                        <h4 class="cuentaHederEmail"><?=$this->user->email;?></h4>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="nombre" id="Nombre" placeholder="Nombre" class="inputs" value="<?=$this->user->nombrecompleto;?>">
                        </div>
                        <div class="col2 col">
                             <input type="date" name="FNacimiento" id="fecha" placeholder="Fecha de Nacimiento"
                                class="inputs" value="<?=$this->user->Fnacimento;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <select name="Genero" id="genero" class="inputs">
                                <option value="" selected disabled>Género</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                                <option value="P">Otro</option>
                            </select>

                        </div>
                        <div class="col2 col">
                            <input type="text" name="GPersonalizado" id="GP" placeholder="Genero" class="inputs" value="<?=$this->GP;?>">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                           <input type="number" name="numero" id="Numero" placeholder="Numero" class="inputs" step="1"
                                min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?=$this->user->numero;?>">
                        </div>
                        <div class="col2 col">
                            <input type="text" name="calle" id="Calle" placeholder="Calle" class="inputs" value="<?=$this->user->calle;?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="ciudad" id="Ciudad" placeholder="Ciudad" class="inputs" value="<?=$this->user->ciudad;?>">
                        </div>
                        <div class="col2 col">
                            <input type="number" name="codigo" id="CPostal" placeholder="Codigo Postal" class="inputs"
                                step="1" min="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="<?=$this->user->codigoPostal;?>">    

                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <input type="text" name="Departamento" list="depaList" id="departamento"
                                placeholder="Departamento" class="inputs" value="<?=$this->user->departamento;?>">
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
                        <div class="col2 col">
                            
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
<script src="<?php echo constant('URL'); ?>public/js/Usuario/cuenta.js"></script>
<script>
    genero.value="<?=$this->Genero;?>";
    genero.value != "P" ? gp.style.display = 'none' : gp.style.display = 'inline-block';
</script>




</html>