<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/fonts.css">
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Error/style.css">
    <title>Libreria MiMundo</title>
</head>
<body>
    <div class="container">

        <img class="logo" src="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.svg">
        <div class="error"><p>Pagina <b>API</b><p></div>        
        <div class="serror"><p>Esta pestaña solo esta disponible para consultas vía API</p></div>
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