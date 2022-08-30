<link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\style.css">
<div class="optionPanel">
            <div class="titulo-Div-OP">
                <h3>Panel De Control</h3>
            </div>
            <div class="OP-item">
                <div class="OP-item-titulo ">
                    <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\home.svg">Home</h4>
                </div>
                <div class="OP-item-content OP-item-content-home">
                    <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>settings/homemod">Editar</a>
                </div>
            </div>
            <div class="OP-item ">
                <div class="OP-item-titulo">
                    <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\book.svg">Articulos</h4>
                </div>
                <div class="OP-item-content">
                    <a class="noselect" href="<?php echo constant('URL'); ?>book/new">Añadir</a>
                    <a class="noselect" href="<?php echo constant('URL'); ?>book/change">Modificar</a>
                    <a class="OP-item-content-end noselect">Eliminar</a>
                </div>
            </div>
            <div class="OP-item nonselect">
                <div class="OP-item-titulo">
                    <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\user.svg">Usuario</h4>
                </div>
                <div class="OP-item-content">
                    <a class="noselect" href="<?php echo constant('URL'); ?>usuario/apadd">Añadir</a>
                    <a class="noselect" href="<?php echo constant('URL'); ?>usuario/apmod">Modificar</a>
                    <a class="OP-item-content-end noselect" href="<?php echo constant('URL'); ?>usuario/apdel">Eliminar</a>
                </div>
            </div>
            <div class="OP-item">
                <div class="OP-item-titulo">
                    <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\Editorial.svg">Editorial</h4>
                </div>
                <div class="OP-item-content">
                    <a class="noselect" href="<?php echo constant('URL'); ?>editorial/new">Añadir</a>
                    <a class="noselect" href="<?php echo constant('URL'); ?>editorial/change">Modificar</a>
                    <a class="OP-item-content-end noselect">Eliminar</a>
                </div>
            </div>
            <div class="OP-item">
                <div class="OP-item-titulo">
                    <h4 class="noselect"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\Autor.svg">Autor</h4>
                </div>
                <div class="OP-item-content">
                    <a class="noselect" href="<?php echo constant('URL'); ?>autor/new">Añadir</a>
                    <a class="noselect" href="<?php echo constant('URL'); ?>autor/change">Modificar</a>
                    <a class="OP-item-content-end noselect">Eliminar</a>
                </div>
            </div>

        </div>

