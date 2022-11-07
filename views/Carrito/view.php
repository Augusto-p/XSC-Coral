<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/listar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/carrito.css">
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
        <section class="data-view noselect">
            <section class="data-titulo">
                <h2>Mi Carrito</h2>
            </section>
            <section class="listado" id="ListaDeDatos">
            </section>

            <button onclick="ViewPopUP()" class="BTNSale" id="BTNSale">Comprar</button>
            <div class="PointersBTNSale" id="Element"></div>
            <div class="PointersBTNSale" id="window"></div>

        </section>
    </section>
    <section class="PopUP-Window" id="PopUP-Window">
    <div class="PopUP-form">
      <div class="PopUP-Titulo">
        <h2>Detalles de la Compra</h2>
      </div>
      <div class="PopUP-form-data">
        <div class="Tabla-Detalles">
        	<div class="Tabla-Detalles-Thead" onscroll="ScrollTablePop(1)">
				<div class="Tabla-Detalles-tr">
            		<div class="Tabla-Detalles-th"><span>ISBN</span></div>
            		<div class="Tabla-Detalles-th"><span>Nombre</span></div>
                    <div class="Tabla-Detalles-th"><span>Precio</span></div>
            		<div class="Tabla-Detalles-th"><span>Cantidad</span></div>
                    <div class="Tabla-Detalles-th"><span>Total</span></div>
            		<div class="Tabla-Detalles-th"><span>Eliminar</span></div>
            	</div>
        	</div>
            <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles-POPUP" onscroll="ScrollTablePop(0)">
                
            </div>
        </div>

      </div>
      <div class="PopUP-BTNs">
        <div class="PopUP-Total">
            <span id="popUpTotal">Total: $</span>
        </div>
        
        <button class="PopUP-BTNs-pagar" onclick="Pagar()">Pagar</button>
    </div>

    </div>
    </section>
    <section class="PopUP-Window" id="PopUP-Window2">
        <div class="PopUP-form">
            <div class="PopUP-Titulo">
                <h2>Informacion de la Compra</h2>
            </div>
            <div class="PopUP-form-data">
                <div id="Imgdiv" style="background-image: url(<?php echo constant('URL'); ?>public/Recursos/imgs/GraciasXSuCompra.svg);">
                    
                </div>

                <div>

                    <select name="MPago" id="Mpag-popUp" class="inputs">
                    <option value="" selected disabled>Metodo de Pago</option>
                    <option value="Credito">Credito</option>
                    <option value="Debito">Debito</option>
                </select>
                </div>
                <div>

                    <input type="text" placeholder="Sistema de Paqueria" id="SYSPaceteria" class="inputs">
                </div>
                <div id="Decripciondiv">

                    <textarea name="Descripcion" id="descripcion-popUp" placeholder="Escribe una descripcion" class="inputs"></textarea>
                </div>
        
            </div>
            <div class="PopUP-BTNs">
                <button class="PopUP-BTNs-Finalizar" onclick="finalizar()">Finalizar</button>

            </div>

        </div>
  </section>


    <?php require 'views/footer.php';?>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Book/Carrito.js"></script>
</html>