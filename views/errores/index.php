<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Document</title>
</head>

<body>

  <?php require 'views/header.php';?>

  <input type="hidden" value="<?php echo constant('URL'); ?>" id="url">

  <div class="container">
    <h2>Error</h2>
  
    <?php require 'views/footer.php';?>


    <!-- importo el javascript-->
    <script src="<?php echo constant('URL'); ?>/public/js/main.js"></script>

</body>

</html>