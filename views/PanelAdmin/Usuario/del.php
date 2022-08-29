<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    

    <title>Document</title>
</head>

<body>
    <!-- baner -->
    <?php require 'views/header.php';?>
    <!-- contenido -->
    <section class="content">
        <?php require 'views/adminPanel.php';?>
        <div class="conten-data">
            <form action="" method="post" id="Formulario">
                <h2 id="titulo">Eliminar Usuario</h2>

                <div class="data">
                    <div class="big-row">
                        <div class="col">
                            <div class="row-in-col">
                                <input type="email" name="email" id="Email" placeholder="Email" class="inputs">
                                <Button class="btnSeach"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\lupa.svg"></Button>
                            </div>

                        </div>
                    </div>
                    <div class="big-row">
                        <div class="col Uesr-Ban">
                            <img src="">
                            <h3 id="Name"></h3>
                            <h3 id="lastName"></h3>
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <h4>Rol:</h4>
                                <h4 id="Rol-Data"></h4>
                            </div>

                        </div>
                        <div class="col2 col">
                            <div class="row-in-col">
                                <h4>Fecha De Nacimiento:</h4>
                                <h4 id="FN-Data"></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <h4>Genero:</h4>
                                <h4 id="Genero-Data"></h4>
                            </div>
                        </div>
                        
                    </div>
                    <div class="big-row">
                        <div class="col">
                            <div class="row-in-col">
                                <h4>Direccion:</h4>
                                <h4 id="Direc-Data"></h4>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div id="save-div">
                    <button type="submit">Eliminar</button>
                </div>
            </form>
        </div>
    </section>


<link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\Usuario\deluser.css">
</body>
<!-- <script src="../js/user.js"></script> -->

</html>