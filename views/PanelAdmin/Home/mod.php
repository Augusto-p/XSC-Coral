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
            <form action="<?php echo constant('URL'); ?>settings/savehomeMod" method="post" id="Formulario" enctype="multipart/form-data">
                <h2 id="titulo">Home</h2>
                <div class="data">

                    <div class="row seven-row">
                        <div class="col colrow">
                            <h3>Baner Principal</h3>
                            <img src="<?=$this->UrlBanerP;?>" id="VBanerP">
                            <p>Relacion de apecto recomendada 6,72:1</p>
                            <div class="div-change-ban">
                                <input type="file" name="PBaner" id="PBaner" class="InBanP">
                                <button type="button" class="btn-change-ban">Canbiar Baner</button>
                            </div>

                        </div>
                        
                    </div>
                    <hr>
                    <div class="row seven-row subBaner">
                        <div class="col colrow ">
                            <h3>Baner Publicitario 1</h3>
                            <img src="<?=$this->UrlBanerP1;?>" id="VBanerP1">
                            <p>Relacion de apecto recomendada 4.68:1</p>
                            <div class="div-change-ban">
                                <input type="file" name="PP1Baner" id="PP1Baner" class="InBanP">
                                <button type="button" class="btn-change-ban">Canbiar Baner</button>
                            </div>
                    
                        </div>
                    
                    </div>
                    <hr>
                    <div class="row seven-row subBaner">
                        <div class="col colrow ">
                            <h3>Baner Publicitario 2</h3>
                            <img src="<?=$this->UrlBanerP2;?>" id="VBanerP2">
                            <p>Relacion de apecto recomendada 4.68:1</p>
                            <div class="div-change-ban">
                                <input type="file" name="PP2Baner" id="PP2Baner" class="InBanP">
                                <button type="button" class="btn-change-ban">Canbiar Baner</button>
                            </div>
                    
                        </div>
                    
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <h2 class="Slider-title">Slider 1</h2>
                        </div>
                        <div class="col2 col">
                            <h2 class="Slider-title">Slider 2</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col1 col">
                            <div class="row-in-col">
                                <input type="number" name="slider1in" id="slider1in" placeholder="ISBN" class="inputs">
                                <Button type="button" class="btnadd" onclick="addslider1()"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\add.svg"></Button>
                            </div>
                        </div>
                        <div class="col2 col">
                            <div class="row-in-col">
                                <input type="number" name="slider1in" id="slider2in" placeholder="ISBN" class="inputs">
                                <Button type="button" class="btnadd" onclick="addslider2()"><img src="<?php echo constant('URL'); ?>public\Recursos\icons\add.svg"></Button>
                            </div>
                        </div>
                    </div>
                    <div class="row five-row">
                        <div class="col1 col colSc">
                            <div class="sroliable">
                                <div id="slider1Div" >
                                    
                                </div>
                            </div>
                    
                    
                        </div>
                        <div class="col2 col colSc">
                            <div class="sroliable">
                                <div id="slider2Div">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="notView">
                        <div id="notView-s1">
                            
                        </div>
                        <div id="notView-s2"></div>
                    </div>
                </div>
                



                <div id="save-div">
                    <button type="submit">Guardar</button>
                </div>
            </form>
        </div>
        </section>

<link rel="stylesheet" href="<?php echo constant('URL'); ?>public\css\AdminPanel\Home\home.css">
</body>
    <script src="<?php echo constant('URL'); ?>public\js\AdminPanel\home\main.js"></script>
    <?php 
    foreach ($this->Slider1Isbns as $key => $value) {
        echo '<script>addslider1php('.$value.')</script>';
    }
    foreach ($this->Slider2Isbns as $key => $value) {
        echo '<script>addslider2php('.$value.')</script>';
    }
    ; ?>
    
</html>