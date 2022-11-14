<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/baner.css">
<div class="banner">
    <div class="marca" onclick="goTo('<?php echo constant('URL'); ?>')">
        <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
        <h2 class="nombre" >MiMundo</h2>
    </div>

    <div class="busqueda">
        <input class="barra" name="barra_de_busqueda" onkeyup="enterSach(event)" id="BarradeBusqueda" type="text"
            placeholder="buscar libros">
        <button class="boton-lupa" onclick="opensarch()"><img class="lupa"
                src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg" alt=""></button>
    </div>

    <div class="menu">
        <ul class="menu-ul">
            <li class="lista-res"><b><a href="<?php echo constant('URL'); ?>">Inicio</a></b></li>
            <li class="logos-res"><button onclick="goTo('<?php echo constant('URL'); ?>')"><img
                        src="<?php echo constant('URL'); ?>public/Recursos/icons/home.svg"></button></li>
            <li class="lista-res"><b><a href="<?php echo constant('URL'); ?>book">Explorar</a></b></li>
            <li class="logos-res"><button onclick="goTo('<?php echo constant('URL'); ?>book')"><img
                        src="<?php echo constant('URL'); ?>public/Recursos/icons/safari.svg"></button></li>
            <li class="lista-res"><b><a href="<?php echo constant('URL'); ?>About">Sobre nosotros</a></b></li>
            <li class="logos-res"><button onclick="goTo('<?php echo constant('URL'); ?>About')"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/info.svg"
                        alt=""></button></li>
            <li class="li-user">
                <?php if (empty($_SESSION["login"])){ ; ?>
                    <img class="user" onclick="openSubmenuBanner()" src="<?php echo constant('URL'); ?>public/Recursos/icons/user.svg">
                <?php }else{; ?>
                    <div class="userpersonal" onclick="openSubmenuBanner()" style="background-image: url(<?php echo constant('URL'); ?><?=unserialize($_SESSION["img"]);?>);"></div>
                    
                <?php }; ?>
            </li>
            
        
        </ul>
        <ul class="submenu" id="SubmenuBanner">
                <?php if (empty($_SESSION["login"])){ ; ?>
                    <li class="noselect" onclick="goTo('<?php echo constant('URL'); ?>Usuario')">Ingresar</li>
                    <li class="noselect" onclick="goTo('<?php echo constant('URL'); ?>Usuario/registrarse')">Registro</li>

                <?php }
                if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {;?>
                    <li class="noselect" onclick="goTo('<?php echo constant('URL'); ?>Book/info')">Panel Admin</li>
                <?php  } if (isset($_SESSION["login"])) { 
                    if ($_SESSION["login"]) {?>
                        <li class="noselect" onclick="goTo('<?php echo constant('URL'); ?>usuario/settings')">Configuración</li>
                        <hr>
                        <li class="noselect" onclick="goTo('<?php echo constant('URL'); ?>Usuario/Salir?From=<?php echo isset($_GET["url"]) ? $_GET["url"]: "";?>')">Salir
                        </li>
                <?php }}; ?>
            </ul>
    </div>

    <div class="carrito-div" onclick="goTo('<?php echo constant('URL'); ?>Carrito/')">
        <img class="carrito" src="<?php echo constant('URL'); ?>public/Recursos/icons/carrito.svg">
    </div>
</div>
<input type="hidden" name="url" id="URL" value="<?php echo constant('URL'); ?>">
<script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/ITag/ITag.js"></script>