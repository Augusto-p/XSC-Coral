<?php
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '//'); // direccion del proyecto

//database connection
define('HOST', ''); // HOST de la base de datos
define('PORT', ''); // Puerto de la base de datos
define('DB', 'libreria'); //Nombre de la base de datos
define('USER', 'Coral'); //usuario de la base de datos
define('PASSWORD', "d724a567490114d353f8bbaf451f151001b9911d97c7af273354cea45a8753e6883c685bba9c0391e7838178f5f1eb45c3dc4cbfc9571febf0aab698c4d0ec20"); //contraseña de la base de datos
define('CHARSET', 'utf8mb4');

define("EMAIL", ""); // Email de la empresa
define("SEED_PHRASE", ""); // Contraseña de acceso a la aplicacion para el envio de correos
define("JWT_KEY", ""); //Key of JWT