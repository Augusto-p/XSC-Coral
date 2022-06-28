<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo constant('URL'); ?>/usuario/signin" method="post">
        <input type="email" name="email" placeholder="email" value="juan@gmail.com">
        <input type="password" name="password" placeholder="password" value="1234567890">
        <input type="submit" name="submit" value="Login">
    </form>
</body>
</html>