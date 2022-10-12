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
  PRIMARY KEY (`ID`)
  );

DROP TABLE IF EXISTS `editoriales`;
CREATE TABLE `editoriales` ( `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Web` varchar(255) NOT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(25) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
  );

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
PRIMARY KEY (`Email`)
);


DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros`( `ISBN` bigint NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Sinopsis` varchar(255) NOT NULL,
  `ID_Editorial` int DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON DELETE SET NULL
  );


DROP TABLE IF EXISTS `libros_categorias`;
CREATE TABLE `libros_categorias`( `ISBN` bigint NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Categoria`),
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
  );


DROP TABLE IF EXISTS `libros_imgs`;
CREATE TABLE `libros_imgs`( `ISBN` bigint NOT NULL,
  `Img` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Img`),
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
  );

DROP TABLE IF EXISTS `escriben`;

CREATE TABLE `escriben`( `ISBN` bigint NOT NULL,
  `ID_Autor` int NOT NULL,
  PRIMARY KEY (`ISBN`,`ID_Autor`),
  FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
  );

DROP TABLE IF EXISTS `carrito`;
CREATE TABLE `carrito`
  ( `Email` varchar(255) NOT NULL,
  `ISBN` bigint NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`Email`,`ISBN`),
  FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
  );


DROP TABLE IF EXISTS `compras`;

CREATE TABLE `compras`( `ID` int NOT NULL AUTO_INCREMENT,
  `ID_Editorial` int NOT NULL,
  `Estado` enum('En Espera','Recibido') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Metodo_Pago` varchar(255) NOT NULL,
  `Total_compra` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`ID_Editorial`),
  FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON UPDATE CASCADE
  );


DROP TABLE IF EXISTS `compras_detalle`;

CREATE TABLE `compras_detalle`( `ID_Compra` int NOT NULL,
  `ISBN` bigint NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Cantidad` int unsigned NOT NULL,
  PRIMARY KEY (`ID_Compra`,`ISBN`),
  FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE
  );


DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas`( `ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Estado` enum('Enviado','Entregado','Procesando') NOT NULL,
  `Metodo_Pago` enum('Debito','Credito') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Total_venta` decimal(10,2) NOT NULL,
  PRIMARY KEY (`ID`,`Email`),
  FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON UPDATE CASCADE ON DELETE no action
  );


DROP TABLE IF EXISTS `ventas_detalle`;

CREATE TABLE `ventas_detalle`( `ID_Venta` int NOT NULL,
`ISBN` bigint NOT NULL,
`Cantidad` int unsigned NOT NULL,
`Descuento` decimal(10,2) unsigned NOT NULL,
PRIMARY KEY (`ID_Venta`,`ISBN`),
FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE
);


DROP TABLE IF EXISTS `pedidos`;

CREATE TABLE `pedidos`( `ID_Venta` int NOT NULL AUTO_INCREMENT,
`Descripcion` varchar(255) NOT NULL,
`Sistema_Envio` varchar(255) NOT NULL,
PRIMARY KEY (`ID_Venta`),
FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
);



INSERT INTO `usuarios` VALUES ('Augusto Picardo','auguselo77@gmail.com',NULL,NULL,'2004-04-22','Bot','Canelones',169,'13','las vegas','$2y$10$fiSgjUl6QWEcnYgArr.NruerQPuz90SYy0JlyV7LM9TK6tr0ptWEq','public/imgs/Users/auguselo77@gmail.com.jpg','Administrador',3311);
INSERT INTO `editoriales` VALUES (1,'Libros Cúpula','https://www.planetadelibros.com/editorial/libros-cupula/18','public/imgs/Editoriales/1.jpeg','Av. Diagonal, 662-664. 08034 Barcelona','+34934928000','libroscupula@planetadelibros.com'),(2,'Blink Publishing','https://www.bonnierbooks.co.uk/','public/imgs/Editoriales/2.jpeg','Suite 2.08, Plaza, 535 King\'s Rd, London SW10 0SZ, Reino Unido','+442037708888','hello@bonnierbooks.co.uk'),(3,'Simon & Schuster','https://www.simonandschuster.com/','public/imgs/Editoriales/3.jpeg','1230 Avenue of the Americas\nNew York, NY 10020','+18779890009','https://www.simonandschuster.net/about/contact_us'),(4,'Faber and Faber','https://www.faber.co.uk/','public/imgs/Editoriales/4.jpeg','Bloomsbury House\n74-77 Great Russell Street\nLondon WC1B 3DA\nUnited Kingdom','+4402079273800','bookshop@faber.co.uk'),(5,'HarperCollins Publishers','https://www.harpercollins.com/','public/imgs/Editoriales/5.jpeg','HarperCollins Publishers\n195 Broadway\nNew York, NY 10007','+18002427737','consumercare@harpercollins.com'),(6,'Ediciones Martínez Roca','https://www.planetadelibros.com/editorial/ediciones-martinez-roca/11','public/imgs/Editoriales/6.jpeg','Juan Ignacio Luca de Tena, 17\n28027 Madrid','+34914230370','ediciones@espasa.es'),(7,'Montena','https://www.penguinlibros.com/es/11375-montena','public/imgs/Editoriales/7.jpeg','Travessera de Gràcia, 47-49 08021 BARCELONA España','+34933660300','isbn@rhm.es'),(8,'Planeta','https://www.planetadelibros.com.uy/','public/imgs/Editoriales/8.jpeg','Cuareim 1647, 11100 Montevideo, Departamento de Montevideo','++598096253654','info@planeta.es'),(9,'Fefmur','https://pmb.parlamento.gub.uy/pmb/opac_css/index.php?lvl=publisher_see&id=9971','public/imgs/Editoriales/9.jpeg','Av. Italia 2819, 11600 Montevideo, Departamento de Montevideo','+59824252378','bdau@parlamento.gub.uy'),(10,'Destino','https://www.planetadelibros.com/editorial/ediciones-destino/conocenos/7','public/imgs/Editoriales/10.jpeg','Avda. Diagonal 662.664, 7ª','+8034','edicionesedestino@edestino.es'),(11,'Alfaguara','https://www.penguinlibros.com/es/11579-alfaguara','public/imgs/Editoriales/11.jpeg','Colonia 950 Piso 6\nMontevideo, CP 1100','+59829013668','bit.ly/RentreeLiteraria'),(12,'Wattpad','https://www.wattpad.com/?locale=es_ES','public/imgs/Editoriales/12.jpeg','Located downtown Toronto, the heart of Canada’s startup capital','+—-------------------','linkin.bio/lifeatwattpad\n '),(13,'EDICIONES B','https://www.penguinlibros.com/uy/42720-ediciones-b','public/imgs/Editoriales/13.jpeg','Buenos Aires 671, 11000 Montevideo, Departamento de Montevideo','+5982901366','infouy@penguinrandomhouse.com'),(14,'Plutón Ediciones','https://www.plutonediciones.com/site/','public/imgs/Editoriales/14.jpeg','Poligono Oceanis 5.15, Cataboy, 36418 Atios, Pontevedra, España','+34937070147','contacto@plutonediciones.com');
INSERT INTO `autores` VALUES (1,'Lewis Hamilton','Reino Unido','Lewis Carl Davidson Larbalestier Hamilton​ es un piloto británico de automovilismo. En Fórmula 1 desde 2007, coronándose campeón del mundo en 7 ocasiones: en 2008 (McLaren) 2014, 2015, 2017, 2018, 2019, 2020 con Mercedes, igualando los 7 títulos mundiales de Michael Schumacher, cuenta con 103 victorias en Grandes Premios a lo largo de su carrera en la Fórmula 1 lo que lo convierte en el piloto con más victorias en la historia de la Categoría','1985-01-07','public/imgs/Autores/1.jpeg'),(2,'Jenson Button','Reino Unido','Jenson Alexander Lyons Button​, más conocido como Jenson Button, es un piloto de automovilismo de velocidad británico y expiloto de Fórmula 1 que participó entre el año 2000 y 2017 en la dicha categoría, coronándose campeón del mundo en 2009 con Brawn GP.','1980-01-19','public/imgs/Autores/2.jpeg'),(3,'Adrian Newey','Reino Unido','Adrian Newey, OBE es el director técnico del equipo Red Bull Racing de Fórmula 1.\nHa trabajado tanto en Fórmula 1 como en Indycar, habiendo logrado éxitos en ambas categorías. Considerado como uno de los mejores ingenieros en la Fórmula 1, Newey inspiró diseños que han ganado numerosos títulos, dominando gran parte de los años 1990. Desde el 2006 es parte del equipo Red Bull Racing donde consiguieron el título de pilotos en 5 ocasiones y el de constructores en 4 ocasiones. ','1958-12-26','public/imgs/Autores/3.jpeg'),(4,'Ross Brawn','Reino Unido','Ross James Brawn​ es un ingeniero de automovilismo británico. Ha trabajado con varios equipos de Fórmula 1. Hasta 2013 fue el máximo responsable del equipo Mercedes AMG F1, en 2014 fue sustituido por Toto Wolff.','1954-11-23','public/imgs/Autores/4.jpeg'),(5,'Adam Parr','Reino Unido','Adam Parr es un empresario británico conocido por su trabajo en varios campos, incluida la Fórmula 1 y la inversión en ONG. Fue director ejecutivo y ex presidente de Williams Grand Prix Holdings PLC, desde noviembre de 2006 hasta el 30 de marzo de 2012.','1965-05-26','public/imgs/Autores/5.jpeg'),(6,'Tom Bower','Reino Unido','Thomas Michael Bower es un escritor británico y ex periodista y productor de televisión de la BBC. Es conocido por su periodismo de investigación y por sus biografías no autorizadas, a menudo de magnates de los negocios y propietarios de periódicos.','1946-09-28','public/imgs/Autores/6.jpeg'),(7,'El Rubius','España','Rubén Doblas Gundersen, mejor conocido como su alias virtual el Rubius es un youtuber, streamer y celebridad de internet hispano-noruego, ​ reconocido por sus vídeos de entretenimiento basados en gameplays, sketches, parodias, montajes y videoblogs.','1990-02-13','public/imgs/Autores/7.jpeg'),(8,'Julio Verne','Francia','Jules Gabriel Verne, conocido en los países hispanohablantes como Julio Verne fue un escritor, dramaturgo​ y poeta​ francés célebre por sus novelas de aventuras y por su profunda influencia en el género literario de la ciencia ficción​','1828-02-08','public/imgs/Autores/8.jpeg'),(9,'Raúl Álvarez Genes','España','Raúl Álvarez Genes , más conocido como AuronPlay o simplemente Auron, es un streamer y youtuber español. Con cerca de treinta millones de suscriptores y cuatro mil millones de visualizaciones en su canal principal de YouTube, es el cuarto youtuber con más suscriptores de España. En Twitch cuenta con más de trece millones de seguidores, lo que le coloca en el segundo puesto global de los canales con más seguidores.​','1988-11-05','public/imgs/Autores/9.jpeg'),(10,'aXoZer','España','Locutor de Twitch asociado y personalidad de los videojuegos conocido por el juego de transmisión en vivo de Among Us, Minecraft y Phasmophobia. Ha acumulado una audiencia de más de 2.3 millones de espectadores dedicados en la plataforma.','2003-12-18','public/imgs/Autores/10.jpeg'),(11,'Claudia Gray','Estados Unidos','Claudia Gray es una escritora estadounidense conocida por escribir la saga Medianoche','1970-06-12','public/imgs/Autores/11.jpeg'),(12,'Miriam Costabel','Uruguay','Master educación , Licenciada Enfermera, Consultor ARCUSUR en Universidad de la República','1973-03-05','public/imgs/Autores/12.jpeg'),(13,'Paulo Coelho','Brasil','Paulo Coelho de Souza es un novelista, dramaturgo y letrista brasileño después de varios años dedicado a la poesía. Es uno de los escritores y novelistas más leídos del mundo, con más de 320 millones de libros vendidos en más de 170 países, traducidos a 83 lenguas','1947-08-24','public/imgs/Autores/13.jpeg'),(14,'Clive Stapble Lewis','Reino Unido','Clive Staples Lewis, popularmente conocido como C. S. Lewis, fue un apologista cristiano anglicano, medievalista, y escritor británico, reconocido por sus obras de ficción, especialmente por su saga Las crónicas de Narnia','1898-11-29','public/imgs/Autores/14.jpeg'),(15,'Ariana Godoy','Venezuela','Ariana Godoy es una autora venezolana con una pasión por la lectura desde que era una niña. De pequeña, escribía un diario de su día a día pero le pareció aburrido así que comenzó a agregarle monstruos y situaciones imaginarias creando así nació su primera historia.','1990-10-05','public/imgs/Autores/15.jpeg'),(16,'Flor M.Salvador','México ','Flor M. Salvador es una joven escritora mexicana, conocida por su condecorada novela Boulevard que fue escrita originalmente desde Wattpad, ','1998-12-25','public/imgs/Autores/16.jpeg'),(17,'Deepak Chopra','India','Deepak Chopra es un escritor y conferencista indio de temática Nueva Era​ y promotor de terapias pseudocientíficas​. Ha escrito sobre espiritualidad y el supuesto poder de la mente en la curación médica.','1946-10-22','public/imgs/Autores/17.jpeg'),(18,'Anna Todd','Estados Unidos','Anna Renee Todd es una escritora estadounidense, conocida por su obra escrita After, saga superventas de novelas juveniles, que tuvo como inicio una pasión por el grupo One Direction, en la aplicación Wattpad.​','1989-03-20','public/imgs/Autores/18.jpeg');
INSERT INTO `libros` VALUES (9780007270064,'Lewis Hamilton: My Story',900.89,'public/texts/BookSipnosis/9780007270064.txt',5),(9780571269365,'No Angel: The Secret Life of Bernie Ecclestone',850.99,'public/texts/BookSipnosis/9780571269365.txt',4),(9781471162350,'Total Competition',1500.00,'public/texts/BookSipnosis/9781471162350.txt',3),(9781788702614,'How To Be An F1 Driver: My Guide To Life In The Fast Lane',899.99,'public/texts/BookSipnosis/9781788702614.txt',2),(9781911600343,'Jenson Button: Life to the Limit: My Autobiography',1250.99,'public/texts/BookSipnosis/9781911600343.txt',2),(9788408062646,'Las Cronicas de Narnia',900.50,'public/texts/BookSipnosis/9788408062646.txt',10),(9788415089070,'20.000 Leguas de Viaje Submarino',312.60,'public/texts/BookSipnosis/9788415089070.txt',14),(9788418949333,'aXoZer: El búnker final',700.56,'public/texts/BookSipnosis/9788418949333.txt',7),(9788420451916,'A través de mi ventana',620.10,'public/texts/BookSipnosis/9788420451916.txt',11),(9788427041752,'De lo peor, lo mejor: Los consejos de Auron (4You2)',450.04,'public/texts/BookSipnosis/9788427041752.txt',6),(9788427042629,'AuronPlay, el libro',500.89,'public/texts/BookSipnosis/9788427042629.txt',6),(9788427043916,'El juego del Hater',450.67,'public/texts/BookSipnosis/9788427043916.txt',6),(9788448025373,'Cómo hacer un coche',2200.59,'public/texts/BookSipnosis/9788448025373.txt',1),(9788466631792,'El Camino hacia el amor',450.12,'public/texts/BookSipnosis/9788466631792.txt',13),(9788499983196,'El libro Troll',450.03,'public/texts/BookSipnosis/9788499983196.txt',6),(9789504956860,'Star Wars Líneas de sangre',1377.00,'public/texts/BookSipnosis/9789504956860.txt',8),(9789875802667,'Brida',500.00,'public/texts/BookSipnosis/9789875802667.txt',8),(9789915667027,'Boulevard',850.50,'public/texts/BookSipnosis/9789915667027.txt',12),(9789974312463,'Manual de Tecnologías y Técnicas en Enfermería.',1000.00,'public/texts/BookSipnosis/9789974312463.txt',9),(9789974729889,'After Antes de ella',920.00,'public/texts/BookSipnosis/9789974729889.txt',8);
INSERT INTO `libros_categorias` VALUES (9780007270064,'Autobiografía'),(9780007270064,'Biografía'),(9780007270064,'Deportes'),(9780007270064,'F1'),(9780571269365,'Biografía'),(9780571269365,'Deportes'),(9780571269365,'F1'),(9781471162350,'Biográfico'),(9781471162350,'Deportes'),(9781471162350,'F1'),(9781788702614,'Autobiografía'),(9781788702614,'Biografía'),(9781788702614,'Deportes'),(9781788702614,'F1'),(9781911600343,'Autobiografía'),(9781911600343,'Biografía'),(9781911600343,'Deportes'),(9781911600343,'F1'),(9788408062646,'Aventura'),(9788408062646,'Drama'),(9788408062646,'Fantasía'),(9788408062646,'Suspenso'),(9788415089070,'Aventura'),(9788418949333,'Interactivo'),(9788420451916,'Drama Romantico'),(9788420451916,'Romance'),(9788427041752,'Humor'),(9788427042629,'Biografía'),(9788427043916,'Ficción'),(9788427043916,'Thriller'),(9788448025373,'Autobiografía'),(9788448025373,'Biografía'),(9788448025373,'Deportes'),(9788448025373,'F1'),(9788466631792,'Libro de Autoayuda'),(9788499983196,'Humor'),(9789504956860,'Acción'),(9789504956860,'Aventura'),(9789504956860,'Drama'),(9789504956860,'suspenso'),(9789875802667,'Drama'),(9789875802667,'Romance'),(9789915667027,'Aventura'),(9789915667027,'Narrativo'),(9789974312463,'Conocimiento/Estudio'),(9789974729889,'Romance');
INSERT INTO `libros_imgs` VALUES (9780007270064,'public/imgs/Books/9780007270064/0.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/1.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/2.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/3.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/4.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/5.jpeg'),(9780007270064,'public/imgs/Books/9780007270064/6.jpeg'),(9780571269365,'public/imgs/Books/9780571269365/0.jpeg'),(9781471162350,'public/imgs/Books/9781471162350/0.jpeg'),(9781788702614,'public/imgs/Books/9781788702614/0.jpeg'),(9781911600343,'public/imgs/Books/9781911600343/0.jpeg'),(9788408062646,'public/imgs/Books/9788408062646/0.jpeg'),(9788415089070,'public/imgs/Books/9788415089070/0.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/0.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/1.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/2.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/3.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/4.jpeg'),(9788418949333,'public/imgs/Books/9788418949333/5.jpeg'),(9788420451916,'public/imgs/Books/9788420451916/0.jpeg'),(9788427041752,'public/imgs/Books/9788427041752/0.jpeg'),(9788427041752,'public/imgs/Books/9788427041752/1.jpeg'),(9788427042629,'public/imgs/Books/9788427042629/0.jpeg'),(9788427042629,'public/imgs/Books/9788427042629/1.jpeg'),(9788427043916,'public/imgs/Books/9788427043916/0.jpeg'),(9788427043916,'public/imgs/Books/9788427043916/1.jpeg'),(9788448025373,'public/imgs/Books/9788448025373/0.jpeg'),(9788466631792,'public/imgs/Books/9788466631792/0.jpeg'),(9788499983196,'public/imgs/Books/9788499983196/0.jpeg'),(9788499983196,'public/imgs/Books/9788499983196/1.jpeg'),(9788499983196,'public/imgs/Books/9788499983196/2.jpeg'),(9789504956860,'public/imgs/Books/9789504956860/0.jpeg'),(9789875802667,'public/imgs/Books/9789875802667/0.jpeg'),(9789915667027,'public/imgs/Books/9789915667027/0.jpeg'),(9789974312463,'public/imgs/Books/9789974312463/0.jpeg'),(9789974729889,'public/imgs/Books/9789974729889/0.jpeg');
INSERT INTO `escriben` VALUES (9780007270064,1),(9781788702614,2),(9781911600343,2),(9788448025373,3),(9781471162350,4),(9781471162350,5),(9780571269365,6),(9788499983196,7),(9788415089070,8),(9788427041752,9),(9788427042629,9),(9788427043916,9),(9788418949333,10),(9789504956860,11),(9789974312463,12),(9789875802667,13),(9788408062646,14),(9788420451916,15),(9789915667027,16),(9788466631792,17),(9789974729889,18);

-- EVENTO DE TOKEN PASS --
 CREATE EVENT IF NOT EXISTS token_pass 
 ON SCHEDULE EVERY 1 MINUTE
 COMMENT 'Si la fecha de creación del token pass es mayor a 48 horas se cambia el valor de Token_Password y Fecha_Token a vacío.'
 DO
 UPDATE usuarios SET Token_Password = “”, Fecha_Token = “” WHERE  Fecha_Token < DATE_SUB(NOW(),INTERVAL 48 HOUR);
 
 -- EVENTO DE ELIMINACIÓN DE  PRODUCTOS DEL CARRITO --
  CREATE EVENT IF NOT EXISTS borrar_carrito
 ON SCHEDULE EVERY 1 minute
 COMMENT 'Elimina todo el contenido del carrito pasado 3 dias despúes de que el cliente añadio sus producto al carrito.'
 DO
 DELETE FROM carrito
 WHERE fechor_car < DATE_SUB(NOW(),INTERVAL 72 HOUR);
 
ALTER TABLE libros 
ADD COLUMN Stock INT NOT NULL DEFAULT 0 AFTER `ID_Editorial`;

 CREATE TRIGGER new_baja_book BEFORE INSERT ON 
 ventas_detalle  for each row
 update libros set Stock
 = libros.Stock - new.Cantidad where isbn = new.ISBN;

CREATE  TRIGGER  new_alta_book
BEFORE INSERT ON  compras_detalle  FOR EACH ROW
UPDATE  libros SET Stock
 = libros.Stock + new.Cantidad WHERE isbn = new.ISBN;
