<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>Autor/add" method="post" enctype="multipart/form-data" method="post">
    <input type="text" name="Nombre" id="Nombre" placeholder="name">
    <input type="text" name="Apellido" id="Apellido" placeholder="ape">
    <input type="text" name="Pais" id="Pais" placeholder="pais">
    <textarea name="Biografia" id="Biografia" max=500 placeholder="bio"></textarea>
    <input type="date" name="FNacimento" id="FNacimento" placeholder="fn">
    <input type="file" name="Imagenes" id="Imagenes">

    <input type="submit" value="Save">

    </form>
    
</body>
</html>