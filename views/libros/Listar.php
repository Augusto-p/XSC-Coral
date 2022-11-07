<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/listar.css">
    <title>Libreria MiMundo</title>
<link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico" type="image/x-icon">
</head>
<body>
    <?php require 'views/header.php';?>
    
    <section class="content">
        <section class="recomendados noselect">
            <div class="Burgerdiv" onclick="recomendados()">
                <span>☰</span>
            </div>
            <h2>Recomendados</h2>
            <hr>
            <h3>Categorias</h3>
            <a href="<?php echo constant('URL'); ?>book?Categoria=Autobiografia">Autobiografia</a>
            <a href="<?php echo constant('URL'); ?>book?Categoria=Biografia">Biografia</a>
            <a href="<?php echo constant('URL'); ?>book?Categoria=Deportes">Deportes</a>
            <a href="<?php echo constant('URL'); ?>book?Categoria=Humor">Humor</a>
            <a href="<?php echo constant('URL'); ?>book?Categoria=F1">F1</a>
            <hr>
            <h3>Autores</h3>
            <a href="<?php echo constant('URL'); ?>book?Autor=1">Lewis Hamilton</a>
            <a href="<?php echo constant('URL'); ?>book?Autor=2">Jenson Button</a>
            <a href="<?php echo constant('URL'); ?>book?Autor=4">Ross Brawn</a>
            <a href="<?php echo constant('URL'); ?>book?Autor=9">Raúl Alvarez Genez</a>
            <a href="<?php echo constant('URL'); ?>book?Autor=3">Adrian Newey</a>
            <hr>
            <h3>Editoriales</h3>
            <a href="<?php echo constant('URL'); ?>book?Editorial=6">Ediciones Martínez Roca</a>
            <a href="<?php echo constant('URL'); ?>book?Editorial=8">Planeta</a>
            <a href="<?php echo constant('URL'); ?>book?Editorial=1">Libros Cúpula</a>
            <a href="<?php echo constant('URL'); ?>book?Editorial=2">Blink Publishing</a>
            <a href="<?php echo constant('URL'); ?>book?Editorial=3">Simon & Schuster</a>
            <hr>
        </section>
        <section class="listado" id="ListaDeDatos">
            <?php foreach ($this->Books as $key => $Book) {?>
            <div class="list-item noselect">
                <div class="list-item-img" >
                    <img src="<?=$Book->imagenes[0];?>">
                </div>
                <div class="list-item-data">
                    <div class="list-item-data-up" onclick="goTo('<?php echo constant('URL');?>book/view?id=<?=$Book->isbn?>')">
                        <h2><?=$Book->titulo;?></h2>
                    </div>
                    <div class="list-item-data-center" onclick="goTo('<?php echo constant('URL');?>book/view?id=<?=$Book->isbn?>')">
                        <p><?=$Book->sipnosis;?></p>
                    </div>
                    <div class="list-item-data-down">
                        <?php foreach ($Book->Autores as $key => $Autor) {; ?>
                        <img src="<?php echo constant('URL'); ?><?=$Autor->foto;?>" onclick="goTo('<?php echo constant('URL');?>book?Autor=<?=$Autor->id?>')">
                        <h6 onclick="goTo('<?php echo constant('URL');?>book?Autor=<?=$Autor->id?>')"><?=$Autor->nombre;?></h6>
                        <?php }; ?>
                        
                    </div>
                </div>
                <div class="list-item-sale">
                    <div class="list-item-sale-ultra-up" onclick="options(event)">
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="list-item-sale-ultra-up-pointer"></div>
                        <div class="item-menu">
                            <button onclick="goTo('<?php echo constant('URL');?>book/view?id=<?=$Book->isbn?>')">Ver Libro</button>
                            <!-- <button>Ver Categoria</button> -->
                            <button onclick="goTo('<?php echo constant('URL');?>book?Editorial=<?=$Book->IDEditorial?>')">Ver Editorial</button>
                            <hr>
                            <button class="AddCarr" onclick="addCarrito(<?=$Book->isbn?>)">Añadir al Carrito</button>
                        </div>
                    </div>
                    <div class="list-item-sale-up" onclick="goTo('<?php echo constant('URL');?>book/view?id=<?=$Book->isbn?>')">
                        <h3>$ <?=$Book->precio;?></h3>
                    </div>
                    <div class="list-item-sale-down">
                        <button class="AddCarr" onclick="addCarrito(<?=$Book->isbn?>)">Añadir Carrito</button>
                    </div>
                </div>
            
            
            </div>
            
            <?php }; ?>
            

        </section>
    </section>

    <?php require 'views/footer.php';?>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Book/explorer.js"></script>
</html>