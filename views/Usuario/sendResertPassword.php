<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>usuario/SendEmailPassword" method="post">
    <input type="email" name="Email" id="email">
    <input type="submit" value="Enviar">
</form>
    
</body>
</html>