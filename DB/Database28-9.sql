drop database if exists libreria;


create database libreria;

use libreria;


DROP TABLE IF EXISTS `autores`;
CREATE TABLE `autores` ( `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Nacionalidad` varchar(255) NOT NULL,
  `Biografia` varchar(500) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`));

DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE `editoriales` ( `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Web` varchar(255) NOT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`));

DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros`( `ISBN` bigint NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Sinopsis` varchar(255) NOT NULL,
  `ID_Editorial` int DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON DELETE SET NULL);


DROP TABLE IF EXISTS `libros_categorias`;
CREATE TABLE `libros_categorias`( `ISBN` bigint NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Categoria`),
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `libros_imgs`;
CREATE TABLE `libros_imgs`( `ISBN` bigint NOT NULL,
  `Img` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Img`),
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` ( `Nombre` varchar(255) NOT NULL,
`Email` varchar(255) NOT NULL,
`Token_Password` varchar(45) DEFAULT NULL,
`Fecha_Token` date DEFAULT NULL,
`Fecha_Nacimento` date NOT NULL,
`Genero` varchar(255) NOT NULL,
`Departamento` varchar(255) NOT NULL,
`Numero` int NOT NULL,
`Calle` varchar(255) NOT NULL,
`Ciudad` varchar(255) NOT NULL,
`Password` varchar(255) NOT NULL,
`Foto` varchar(255) DEFAULT NULL,
`Rol` enum('Cliente','Empleado','Administrador') NOT NULL,
`Codigo_Postal` int NOT NULL,
PRIMARY KEY (`Email`));

DROP TABLE IF EXISTS `escriben`;

CREATE TABLE `escriben`( `ISBN` bigint NOT NULL,
  `ID_Autor` int NOT NULL,
  PRIMARY KEY (`ISBN`,`ID_Autor`),
  FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE);

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito`
  ( `Email` varchar(255) NOT NULL,
  `ISBN` bigint NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`Email`,`ISBN`),
  FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE);


DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras`( `ID` int NOT NULL AUTO_INCREMENT,
  `ID_Editorial` int NOT NULL,
  `Estado` enum('En Espera','Recibido') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Metodo_Pago` varchar(255) NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`ID_Editorial`),
  FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON UPDATE CASCADE);


DROP TABLE IF EXISTS `compras_detalle`;

CREATE TABLE `compras_detalle`( `ID_Compra` int NOT NULL,
  `ISBN` bigint NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Cantidad` int unsigned NOT NULL,
  PRIMARY KEY (`ID_Compra`,`ISBN`),
  FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE);


DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`( `ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Estado` enum('Enviado','Entregado','Procesando') NOT NULL,
  `Metodo_Pago` enum('Debito','Credito') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Total` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`Email`),
  FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON UPDATE CASCADE ON DELETE no action);


DROP TABLE IF EXISTS `ventas_detalle`;

CREATE TABLE `ventas_detalle`( `ID_Venta` int NOT NULL,
`ISBN` bigint NOT NULL,
`Cantidad` int unsigned NOT NULL,
`Descuento` decimal(10,2) unsigned NOT NULL,
PRIMARY KEY (`ID_Venta`,`ISBN`),
FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE);


DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos`( `ID_Venta` int NOT NULL AUTO_INCREMENT,
`Descripcion` varchar(255) NOT NULL,
`Sistema_Envio` varchar(255) NOT NULL,
PRIMARY KEY (`ID_Venta`),
FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE);



INSERT INTO `usuarios` VALUES ('Augusto Picardo','auguselo77@gmail.com',NULL,NULL,'2004-04-22','Bot','Canelones',169,'13','las vegas','$2y$10$fiSgjUl6QWEcnYgArr.NruerQPuz90SYy0JlyV7LM9TK6tr0ptWEq','public/imgs/Users/auguselo77@gmail.com.jpg','Administrador',3311);
