<link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/AdminPanel/style.css">
<div class="optionPanel">
    <div class="Burgerdiv" onclick="MenuBurger()">
        <span>☰</span>
    </div>
    <div class="titulo-Div-OP">
        <h3>Panel De Control</h3>
    </div>
    <div class="OP-item">
        <div class="OP-item-titulo" onclick="goTo('<?php echo constant('URL'); ?>Book/info')">
            <h4 class="noselect">
            <img src="<?php echo constant('URL'); ?>public/Recursos/icons/warning.svg">Stock</h4>
        </div>
    </div>
    <div class="OP-item ">
        <div class="OP-item-titulo">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/book.svg">Artículos</h4>
        </div>
        <div class="OP-item-content">
            <a class="noselect" href="<?php echo constant('URL'); ?>book/new">Añadir</a>
            <a class="noselect" href="<?php echo constant('URL'); ?>book/change">Modificar</a>
            <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>book/remove">Eliminar</a>
        </div>
    </div>
    <div class="OP-item nonselect">
        <div class="OP-item-titulo">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/user.svg">Usuario</h4>
        </div>
        <div class="OP-item-content">
            <a class="noselect" href="<?php echo constant('URL'); ?>usuario/apadd">Añadir</a>
            <a class="noselect" href="<?php echo constant('URL'); ?>usuario/apmod">Modificar</a>
            <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>usuario/apdel">Eliminar</a>
        </div>
    </div>
    <div class="OP-item">
        <div class="OP-item-titulo">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Editorial.svg">Editorial
            </h4>
        </div>
        <div class="OP-item-content">
            <a class="noselect" href="<?php echo constant('URL'); ?>editorial/new">Añadir</a>
            <a class="noselect" href="<?php echo constant('URL'); ?>editorial/change">Modificar</a>
            <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>editorial/remove">Eliminar</a>
        </div>
    </div>
    <div class="OP-item">
        <div class="OP-item-titulo">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/Autor.svg">Autor</h4>
        </div>
        <div class="OP-item-content">
            <a class="noselect" href="<?php echo constant('URL'); ?>autor/new">Añadir</a>
            <a class="noselect" href="<?php echo constant('URL'); ?>autor/change">Modificar</a>
            <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>autor/remove">Eliminar</a>
        </div>
    </div>
    <!-- new -->
    <div class="OP-item">
        <div class="OP-item-titulo">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/buys.svg">Compras</h4>
        </div>
        <div class="OP-item-content OP-item-content-Two">
            <a class="noselect" href="<?php echo constant('URL'); ?>Compra/list">Ver</a>
            <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>Compra/new">Añadir</a>
        </div>
    </div>
    <div class="OP-item">
        <div class="OP-item-titulo" onclick="goTo('<?php echo constant('URL'); ?>Venta/list')">
            <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public/Recursos/icons/tag.svg">Ventas</h4>
        </div>
    </div>
    
    <?php 
    require_once 'utilidades/Formatos.php';
    if (unserialize(!empty($_SESSION["rol"])?$_SESSION["rol"] : "") == "Administrador"){;?>
        <div class="OP-item">
            <div class="OP-item-titulo ">
                <h4 class="noselect" onclick="goTo('<?php echo constant('URL'); ?>home/mod')">
                <img src="<?php echo constant('URL'); ?>public/Recursos/icons/home.svg">Home</h4>
            </div>
        </div>
    <?php }; ?>


</div>