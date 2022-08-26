<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>book/add" method="post" enctype="multipart/form-data">
    
        <input type="number" name="isbn" id="isbn" placeholder="ISBN" value="9788448025373">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo" value="Cómo hacer un coche">
        <input type="text" name="precio" id="precio" placeholder="Precio" value="2044.50">
        <input type="text" name="categorias[]" class="categoria" placeholder="Categoria" value="Hobbies">
        <input type="text" name="categorias[]" class="categoria" placeholder="Categoria" value="Deportes">
        <input type="text" name="sipnosis" id="sipnosis" placeholder="Sipnosis" value="En este emocionante libro descubriremos de manera exhaustiva, fascinante y extraordinariamente entretenida cómo funciona un coche de carreras, mientras recorremos la trayectoria de Adrian Newey, el más grande diseñador de automóviles de la historia, desde sus comienzos en la IndyCar hasta alcanzar un éxito inigualado en la Fórmula 1 diseñando coches para pilotos como Mario Andretti, Nigel Mansell, Alain Prost, Mika Häkkinen, Mark Webber o Sebastian Vettel entre otros, siempre con un objetivo inquebrantable: conseguir el coche más rápido.">
        <input type="text" name="Editorial" id="Editorial" placeholder="Sipnosis" value="1">
        <input type="file" name="Imagenes[]" class="Imagenes">
        <input type="file" name="Imagenes[]" class="Imagenes">
        <input type="submit" value="Agregar">
</form>
    
</body>
</html>