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
        <input type="text" name="isbn" id="isbn" placeholder="ISBN">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <input type="text" name="precio" id="precio" placeholder="Precio">
        <input type="text" name="categoria" id="categoria" placeholder="Categoria">
        <input type="text" name="id_autor" id="id_autor" placeholder="ID Autor">
        <input type="text" name="sipnosis" id="sipnosis" placeholder="Sipnosis">
        <input type="file" name="Imagenes[]" id="Imagenes" multiple>
        <input type="file" name="Imagenes[]" id="Imagenes">
        <input type="submit" value="Agregar">
</form>
    
</body>
</html>