<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Error/style.css">
    <title>Libreria MiMundo</title>
<link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
        <div class="error"><p>Error <b>404.</b><p></div>        
        <div class="serror"><p>La URL en la que quiere ingresar, no fue encontrada en nuestro servidor.</p></div>
        <div class="inicio"><button onclick="goTo('<?php echo constant('URL'); ?>')">Volver a Inicio</button></div>
    </div>
</body>
<script>
    function goTo(url) {
        a = document.createElement("a");
        a.href = url;
        a.click()
    }
</script>
</html>