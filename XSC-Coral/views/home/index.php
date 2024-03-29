<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Librería MiMundo</title>
    <link rel="shortcut icon" href="<?php echo constant('URL'); ?>public/Recursos/imgs/LogoMimundo.ico"
        type="image/x-icon">
</head>

<body>
    <?php require 'views/header.php';?>
    <link rel="stylesheet" href="<?php echo constant('URL'); ?>public/css/Home/style.css">
    <div class="banner1">
        <a href="#"><img class="baner" src="<?=$this->UrlBanerP;?>"></a>
    </div>
    <section class="producto">
        <h2 class="cat-prod">Recomendaciones</h2>
        <div class="slider-div">
            <section class="slider">
                <div class="btn-slider btn-slider-before" id="btn-slider-1" onclick="MoveSlider1('BEFORE', false);">
                    <h2 class="noselect">❮</h2>
                </div>
                <div class="slider-content">
                    <div class="slider-content-view">
                        <div class="slider-content-in">
                        </div>
                    </div>
                    <div class="slider-pointer">
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item active"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                    </div>
                </div>
                <div class="btn-slider btn-slider-next" id="btn-slider-2" onclick="MoveSlider1('NEXT', false);">
                    <h2 class="noselect">❯</h2>
                </div>
            </section>
        </div>
    </section>

    <div class="banners">
        <a href="#"><img src="<?=$this->UrlBanerP1;?>"></a>

        <a href="#"><img src="<?=$this->UrlBanerP2;?>"></a>

    </div>
    <section class="producto">
        <h2 class="cat-prod">Más vistos</h2>
        <div class="slider-div">
            <section class="slider">
                <div class="btn-slider btn-slider-before" id="btn-slider-3" onclick="MoveSlider2('BEFORE', false);">
                    <h2 class="noselect">❮</h2>
                </div>
                <div class="slider-content">
                    <div class="slider-content-view">
                        <div class="slider-content-in">
                        </div>
                    </div>
                    <div class="slider-pointer">
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item active"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                        <span class="slider-pointer-item"></span>
                    </div>
                </div>
                <div class="btn-slider btn-slider-next" id="btn-slider-4" onclick="MoveSlider2('NEXT', false);">
                    <h2 class="noselect">❯</h2>
                </div>
            </section>
        </div>
    </section>

    <?php require 'views/footer.php';?>

</body>
<script src="<?php echo constant('URL'); ?>public/js/home/main.js"></script>
<?php foreach ($this->Slider1 as $key => $book) {;?>
<script>
AddSlider1(<?=$book->isbn;?>, '<?=$book->titulo;?>', <?=$book->precio;?>,
    '<?php echo constant('URL'); ?><?=$book->imagenes[0];?>');
</script>
<?php } foreach ($this->Slider2 as $key => $book) {;?>
<script>
AddSlider2(<?=$book->isbn;?>, '<?=$book->titulo;?>', <?=$book->precio;?>,
    '<?php echo constant('URL'); ?><?=$book->imagenes[0];?>');
</script>
<?php };?>
<script>
StartSliders()
</script>

</html>