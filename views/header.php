<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/baner.css">
<div class="banner">
        <div class="marca">
            <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
            <a href="<?php echo constant('URL'); ?>" class="nombre">MiMundo</a>
        </div>
    
        <div class="busqueda">
            <input class="barra" name="barra_de_busqueda" id="BarradeBusqueda" type="text" placeholder="buscar libros">
            <button class="boton-lupa" onclick="Seach()"><img class="lupa" src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg" alt=""></button>
        </div>
    
        <div class="menu">
            <ul class="menu-ul">
                <li class="lista-res"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
                <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/home.svg" alt=""></button></li>
                <li class="lista-res"><a href="<?php echo constant('URL'); ?>book">Explorar</a></li>
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
            <a href="<?php echo constant('URL'); ?>Carrito/"><img class="carrito" src="<?php echo constant('URL'); ?>public/Recursos/icons/carrito.svg" alt=""></a>
        </div>
    </div>
    <input type="hidden" name="url" id="URL" value="<?php echo constant('URL'); ?>">
    <script>
        const URL = document.getElementById("URL").value;
        const Buscar = document.getElementById("BarradeBusqueda")
        function Seach() {
            goTo(`${URL}book?Seach=${Buscar.value}`)
        }
        Buscar.value = new URLSearchParams(window.location.search).get("Seach");
        function goTo(url) {
            a = document.createElement("a");
            a.href = url;
            a.click()
        }
    </script>
<script src="<?php echo constant('URL'); ?>public/js/ITag/ITag.js"></script>
<script>let user = "auguselo77@gmail.com";</script>

<script>
    function getCookie(name) {
        return document.cookie.split('; ').filter(Cookie => Cookie.includes(name+"="))[0].replace(name+"=", "");
    }
</script>

    