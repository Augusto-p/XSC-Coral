<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/baner.css">
<div class="banner">
        <div class="marca">
            <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
            <h2 class="nombre">MiMundo</h2>
        </div>
    
        <div class="busqueda">
            <input class="barra" name="barra_de_busqueda" id="BarradeBusqueda type="text" placeholder="buscar libros">
            <button class="boton-lupa" onclick="opensarch()"><img class="lupa" src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg" alt=""></button>
        </div>
    
        <div class="menu">
            <ul class="menu-ul">
                <li class="lista-res"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/home.svg" alt=""></button></li>
                <li class="lista-res"><a href="#">Explorar</a></li>
                <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/safari.svg" alt=""></button></li>
                <li class="lista-res"><a href="#">Sobre nosotros</a></li>
                <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/info.svg" alt=""></button></li>
                <li><img class="user" src="<?php echo constant('URL'); ?>public/Recursos/icons/user.svg" alt="">
                    <ul class="submenu">
                        <li class="noselect"><a href="#">Ingresar</a></li>
                        <li class="noselect"><a href="#">Registro</a></li>
                        <li class="noselect"><a href="<?php echo constant('URL'); ?>home/mod">Panel Admin</a></li>
                        <li class="noselect"><a href="#">Configuracion</a></li>
                        <hr>
                        <li class="noselect"><a href="#">salir</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    
        <div class="carrito-div">
            <a href="#"><img class="carrito" src="<?php echo constant('URL'); ?>public/Recursos/icons/carrito.svg" alt=""></a>
        </div>
    </div>
    <input type="hidden" name="url" id="URL" value="<?php echo constant('URL'); ?>">
<script src="<?php echo constant('URL'); ?>public/js/ITag/ITag.js"></script>
    