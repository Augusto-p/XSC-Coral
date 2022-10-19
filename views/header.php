<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/baner.css">
<div class="banner">
  <div class="marca">
    <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
    <a href="<?php echo constant('URL'); ?>" class="nombre">MiMundo</a>
  </div>

  <div class="busqueda">
    <input class="barra" name="barra_de_busqueda" onkeyup="enterSach(event)" id="BarradeBusqueda" type="text"
      placeholder="buscar libros">
    <button class="boton-lupa" onclick="SeachBar()"><img class="lupa"
        src="<?php echo constant('URL'); ?>public/Recursos/icons/lupa.svg" alt=""></button>
  </div>

  <div class="menu">
    <ul class="menu-ul">
      <li class="lista-res"><a href="<?php echo constant('URL'); ?>">Inicio</a></li>
      <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/home.svg"
            alt=""></button></li>
      <li class="lista-res"><a href="<?php echo constant('URL'); ?>book">Explorar</a></li>
      <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/safari.svg"
            alt=""></button></li>
      <li class="lista-res"><a href="#">Sobre nosotros</a></li>
      <li class="logos-res"><button><img src="<?php echo constant('URL'); ?>public/Recursos/icons/info.svg"
            alt=""></button></li>
      <li><img class="user" src="<?php echo constant('URL'); ?>public/Recursos/icons/user.svg" alt="">
        <ul class="submenu">
          <?php if (empty($_SESSION["login"])){ ; ?>
          <li class="noselect"><a href="<?php echo constant('URL'); ?>Usuario">Ingresar</a></li>
          <li class="noselect"><a href="<?php echo constant('URL'); ?>Usuario/registrarse">Registro</a></li>
          <?php 
            }
            require_once 'utilidades\Formatos.php';
            if (Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador" || Formatos::RolFormat(!empty($_SESSION["rol"])?$_SESSION["rol"]: "") == "Empleado") {;?>
          <li class="noselect"><a href="<?php echo constant('URL'); ?>home/mod">Panel Admin</a></li>
          <?php  } if (isset($_SESSION["login"])) { 
            if ($_SESSION["login"]) {?>
          <li class="noselect"><a href="#">Configuracion</a></li>
          <hr>
          <li class="noselect"><a
              href="<?php echo constant('URL'); ?>Usuario/Salir?From=<?php echo isset($_GET["url"]) ? $_GET["url"]: "";?>">salir</a>
          </li>
          <?php }}; ?>
        </ul>
      </li>
    </ul>
  </div>

  <div class="carrito-div">
    <a href="<?php echo constant('URL'); ?>Carrito/"><img class="carrito"
        src="<?php echo constant('URL'); ?>public/Recursos/icons/carrito.svg" alt=""></a>
  </div>
</div>
<input type="hidden" name="url" id="URL" value="<?php echo constant('URL'); ?>">
<script src="<?php echo constant('URL'); ?>public/js/main.js"></script>
<script src="<?php echo constant('URL'); ?>public/js/ITag/ITag.js"></script>