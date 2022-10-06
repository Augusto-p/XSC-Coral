<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/listar.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Book/carrito.css">
    <title>Document</title>
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
        </section>
        <section class="ads-div">
            <div class="ad">
                <img src="https://media.istockphoto.com/photos/profile-portrait-picture-id176799603?k=20&m=176799603&s=612x612&w=0&h=fBeWO8TsYh7T4eTlS8pgfzRp3ccGJPFn7IGIBBhYMm8=">
            </div>
            <div class="ad">
                <img
                    src="https://media.istockphoto.com/photos/profile-portrait-picture-id176799603?k=20&m=176799603&s=612x612&w=0&h=fBeWO8TsYh7T4eTlS8pgfzRp3ccGJPFn7IGIBBhYMm8=">
            </div>
            
        </section>
        </section>
    </section>

    <?php require 'views/footer.php';?>
</body>
<script src="<?php echo constant('URL'); ?>public/js/Book/Carrito.js"></script>
</html>