<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h3>
        <?php echo $this->Book->isbn; ?>
    </h3>
    <h1><?=$this->BookTitulo;?></h1>
    <h2><?=$this->BookISBN;?></h2>
    <h2><?=$this->BookPrecio;?></h2>
    <h2><?=$this->BookCategorias;?></h2>
    <h2><?=$this->BookSipnosis;?></h2>
    <h2><?=$this->bookImagenes;?></h2>
    <h2></h2>
</body>
</html>