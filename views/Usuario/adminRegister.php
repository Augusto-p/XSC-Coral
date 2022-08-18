<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MiMundo</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>usuario/signupAdmin" method="post" enctype="multipart/form-data">
        <select name="Rol" id="Rol">
            <option value="">Seleccione un Rol</option>
            <option value="Cliente">Cliente</option>
            <option value="Vendedor">Vendedor</option>
            <option value="Administrador">Administrador</option>
        </select>
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