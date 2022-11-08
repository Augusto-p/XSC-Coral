<?php
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/XSC-Coral/'); // direcion del proyecto

//database connection
define('HOST', '127.0.0.1'); // HOST de la base de datos
define('PORT', '3306'); // Puerto de la base de datos
define('DB', 'libreria'); //Nombre de la base de datos
define('USER', ''); //usuario de la base de datos
define('PASSWORD', "");//contaseña de la base de datos
define('CHARSET', 'utf8mb4');

define("EMAIL", "xscsoftware@gmail.com"); // Email de la empresa
define("SEED_PHRASE", "dktwsjsfpstuiwcy"); // Contraceña de acceso a la aplicacion para el envio de correos
define("JWT_KEY","23a704d86cdcf51561aa585a8d53692379c59eb43db8f9e88c742998939c8f3cccc97be524bbad8ed9ea6a23c0c0c359016435281940b67a7b43d7073c84be10"); //Key of JWT