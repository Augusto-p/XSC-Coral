<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>usuario/signup" method="post" enctype="multipart/form-data">
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellido" placeholder="Apellido">
        <input type="email" name="Email" placeholder="Email">
        <input type="date" name="Fecha de Naminento" id="">
        <select name="Genero" id="">
            <option value="">Seleccione un Genero</option>
            <option value="M">Masculino</option>
            <option value="F">Femenino</option>
            <option value="P">Personalizado</option>
        </select>
        <input type="text" name="Gpersonalizado">
        <input type="password" name="Password" placeholder="Password">
        <input type="password" name="RPassword" placeholder="Repita su Password">
        <input type="file" name="Photo" id="">
        <input type="submit" name="submit" value="Registrarse">
    </form>
</body>
</html>