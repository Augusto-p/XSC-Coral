<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/listar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/carrito.css">
    <title>Libreria MiMundo</title>
</head>
<body>
    <?php require 'views/header.php';?>

    <section class="content">
        <section class="recomendados noselect">
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
                

                <div class="list-item">
                    <div class="list-item-img">
                        <img src="../Recursos/imgs/libro.jpg" alt="">
                    </div>
                    <div class="list-item-data">
                        <div class="list-item-data-up">
                            <h2>Cómo hacer un coche</h2>
                        </div>
                        <div class="list-item-data-center">
                            <p>
                                En este emocionante libro descubriremos de manera exhaustiva, fascinante y extraordinariamente
                                entretenida cómo funciona
                                un coche de carreras, mientras recorremos la trayectoria de Adrian Newey, el más grande diseñador de
                                automóviles de la
                                historia, desde sus comienzos en la IndyCar hasta alcanzar un éxito inigualado en la Fórmula 1 diseñando
                                coches para
                                pilotos como Mario Andretti, Nigel Mansell, Alain Prost, Mika Häkkinen, Mark Webber o Sebastian Vettel
                                entre otros,
                                siempre con un objetivo inquebrantable: conseguir el coche más rápido.
                            </p>
                        </div>
                        <div class="list-item-data-down">
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                        </div>
                    </div>
                    <div class="list-item-sale">
                        <div class="list-item-sale-ultra-up">
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="item-menu">
                                <button>Ver Libro</button>
                                <button>Ver Autor</button>
                                <button>Ver Editorial</button>
                                <hr>
                                <button class="remoCarr" >Remover del Carrito</button>
                            </div>
                        </div>
                        <div class="list-item-sale-up">
                            <h3>$ 2.900,00</h3>
                        </div>
                        <div class="list-item-sale-down">
                            <button class="remoCarr">Remover del Carrito</button>
                        </div>
                    </div>
                
                
                </div>
                <div class="list-item">
                    <div class="list-item-img">
                        <img src="../Recursos/imgs/libro.jpg" alt="">
                    </div>
                    <div class="list-item-data">
                        <div class="list-item-data-up">
                            <h2>Cómo hacer un coche</h2>
                        </div>
                        <div class="list-item-data-center">
                            <p>
                                En este emocionante libro descubriremos de manera exhaustiva, fascinante y extraordinariamente
                                entretenida cómo funciona
                                un coche de carreras, mientras recorremos la trayectoria de Adrian Newey, el más grande diseñador de
                                automóviles de la
                                historia, desde sus comienzos en la IndyCar hasta alcanzar un éxito inigualado en la Fórmula 1 diseñando
                                coches para
                                pilotos como Mario Andretti, Nigel Mansell, Alain Prost, Mika Häkkinen, Mark Webber o Sebastian Vettel
                                entre otros,
                                siempre con un objetivo inquebrantable: conseguir el coche más rápido.
                            </p>
                        </div>
                        <div class="list-item-data-down">
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                        </div>
                    </div>
                    <div class="list-item-sale">
                        <div class="list-item-sale-ultra-up">
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="item-menu">
                                <button>Ver Libro</button>
                                <button>Ver Autor</button>
                                <button>Ver Editorial</button>
                                <hr>
                                <button class="remoCarr">Remover del Carrito</button>
                            </div>
                        </div>
                        <div class="list-item-sale-up">
                            <h3>$ 2.900,00</h3>
                        </div>
                        <div class="list-item-sale-down">
                            <button class="remoCarr">Remover del Carrito</button>
                        </div>
                    </div>
                
                
                </div>
            
                <div class="list-item">
                    <div class="list-item-img">
                        <img src="../Recursos/imgs/libro.jpg" alt="">
                    </div>
                    <div class="list-item-data">
                        <div class="list-item-data-up">
                            <h2>Cómo hacer un coche</h2>
                        </div>
                        <div class="list-item-data-center">
                            <p>
                                En este emocionante libro descubriremos de manera exhaustiva, fascinante y extraordinariamente
                                entretenida cómo funciona
                                un coche de carreras, mientras recorremos la trayectoria de Adrian Newey, el más grande diseñador de
                                automóviles de la
                                historia, desde sus comienzos en la IndyCar hasta alcanzar un éxito inigualado en la Fórmula 1 diseñando
                                coches para
                                pilotos como Mario Andretti, Nigel Mansell, Alain Prost, Mika Häkkinen, Mark Webber o Sebastian Vettel
                                entre otros,
                                siempre con un objetivo inquebrantable: conseguir el coche más rápido.
                            </p>
                        </div>
                        <div class="list-item-data-down">
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                            <img src="https://cdn-1.motorsport.com/images/amp/YEQVPjLY/s1000/adrian-newey-red-bull-racing--.jpg">
                            <h6>Adrian Newey</h6>
                        </div>
                    </div>
                    <div class="list-item-sale">
                        <div class="list-item-sale-ultra-up">
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="list-item-sale-ultra-up-pointer"></div>
                            <div class="item-menu">
                                <button>Ver Libro</button>
                                <button>Ver Autor</button>
                                <button>Ver Editorial</button>
                                <hr>
                                <button class="remoCarr">Remover del Carrito</button>
                            </div>
                        </div>
                        <div class="list-item-sale-up">
                            <h3>$ 2.900,00</h3>
                        </div>
                        <div class="list-item-sale-down">
                            <button class="remoCarr">Remover del Carrito</button>
                        </div>
                    </div>
                
                
                </div>
            
            </section>

            <button onclick="ViewPopUP()" class="BTNSale">Comprar</button>

        </section>
    </section>
    <section class="PopUP-Window" id="PopUP-Window">
    <div class="PopUP-form">
      <div class="PopUP-Titulo">
        <h2>Detalles de la Compra</h2>
      </div>
      <div class="PopUP-form-data">
        <div class="Tabla-Detalles">
        	<div class="Tabla-Detalles-Thead">
				<div class="Tabla-Detalles-tr">
            		<div class="Tabla-Detalles-th"><span>ISBN</span></div>
            		<div class="Tabla-Detalles-th"><span>Nombre</span></div>
                    <div class="Tabla-Detalles-th"><span>Precio</span></div>
            		<div class="Tabla-Detalles-th"><span>Cantidad</span></div>
                    <div class="Tabla-Detalles-th"><span>Total</span></div>
            		<div class="Tabla-Detalles-th"><span>Eliminar</span></div>
            	</div>
        	</div>
            <div class="Tabla-Detalles-Tbody" id="Tabla-Detalles-POPUP">
                
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
                <div id="Imgdiv" style="background-image: url(https://thumbs.dreamstime.com/b/gracias-por-su-compra-en-espa%C3%B1ol-letras-ilustraci%C3%B3n-de-l%C3%A1piz-caligraf%C3%ADa-moderna-pincel-traducci%C3%B3n-del-tu-elemento-para-193742802.jpg);">
                    
                </div>

                <div>

                    <select name="MPago" id="Mpago" class="inputs">
                    <option value="">Metodo de Pago</option>
                    <option value="Credito">Cerdito</option>
                    <option value="Devito">Devito</option>
                </select>
                </div>
                <div>

                    <input type="text" placeholder="Sistema de Paqueria" id="SYSPaceteria" class="inputs">
                </div>
                <div id="Decripciondiv">

                    <textarea name="Descripcion" id="descripcion" placeholder="Escribe una descripcion" class="inputs"></textarea>
                </div>
        
            </div>
            <div class="PopUP-BTNs">
                <button class="PopUP-BTNs-Finalizar" onclick="Fin()">Finalizar</button>

            </div>

        </div>
  </section>


    <?php require 'views/footer.php';?>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Book/Carrito.js"></script>
</html>