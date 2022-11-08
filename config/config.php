<?php
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/XSC-Coral/'); // direcion del proyecto

//database connection
define('HOST', '127.0.0.1'); // HOST de la base de datos
define('PORT', '3306'); // Puerto de la base de datos
define('DB', 'libreria'); //Nombre de la base de datos
define('USER', 'Coral'); //usuario de la base de datos
define('PASSWORD', "d724a567490114d353f8bbaf451f151001b9911d97c7af273354cea45a8753e6883c685bba9c0391e7838178f5f1eb45c3dc4cbfc9571febf0aab698c4d0ec20");//contaseña de la base de datos
define('CHARSET', 'utf8mb4');

define("EMAIL", "xscsoftware@gmail.com"); // Email de la empresa
define("SEED_PHRASE", "dktwsjsfpstuiwcy"); // Contraceña de acceso a la aplicacion para el envio de correos
define("JWT_KEY","23a704d86cdcf51561aa585a8d53692379c59eb43db8f9e88c742998939c8f3cccc97be524bbad8ed9ea6a23c0c0c359016435281940b67a7b43d7073c84be10"); //Key of JWT