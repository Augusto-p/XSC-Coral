drop database if exists libreria;


create database libreria;

use libreria;


DROP TABLE IF EXISTS `autores`;


CREATE TABLE `autores` (`ID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(255) NOT NULL,
`Nacionalidad` varchar(255) NOT NULL,
`Biografia` varchar(500) NOT NULL,
`Fecha_Nacimiento` date NOT NULL,
`Foto` varchar(255) DEFAULT NULL,
PRIMARY KEY (`ID`) );


DROP TABLE IF EXISTS `editoriales`;


CREATE TABLE `editoriales` (`ID` int NOT NULL AUTO_INCREMENT,
`Nombre` varchar(255) NOT NULL,
`Web` varchar(255) NOT NULL,
`Logo` varchar(255) DEFAULT NULL,
`Direccion` varchar(255) NOT NULL,
`Telefono` varchar(25) NOT NULL,
`Email` varchar(255) NOT NULL,
PRIMARY KEY (`ID`) );


DROP TABLE IF EXISTS `usuarios`;


CREATE TABLE `usuarios` (`Nombre` varchar(255) NOT NULL,
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


DROP TABLE IF EXISTS `libros`;


CREATE TABLE `libros`
(`ISBN` bigint NOT NULL,
`Titulo` varchar(255) NOT NULL,
`Precio` decimal(10,2) unsigned NOT NULL,
`Sinopsis` varchar(255) NOT NULL,
`ID_Editorial` int DEFAULT NULL,
Stock INT NOT NULL DEFAULT 0,
PRIMARY KEY (`ISBN`),
FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON DELETE
SET NULL );


DROP TABLE IF EXISTS `libros_categorias`;


CREATE TABLE `libros_categorias`
  (`ISBN` bigint NOT NULL,
`Categoria` varchar(255) NOT NULL,
PRIMARY KEY (`ISBN`,`Categoria`),
FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE );


DROP TABLE IF EXISTS `libros_imgs`;


CREATE TABLE `libros_imgs`
(`ISBN` bigint NOT NULL,
`Img` varchar(255) NOT NULL,
PRIMARY KEY (`ISBN`,`Img`),
FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE );


DROP TABLE IF EXISTS `escriben`;


CREATE TABLE `escriben`
  (`ISBN` bigint NOT NULL,`ID_Autor` int NOT NULL,
PRIMARY KEY (`ISBN`,`ID_Autor`),
   FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE );


DROP TABLE IF EXISTS `carrito`;


CREATE TABLE `carrito`
  (`Email` varchar(255) NOT NULL,
`ISBN` bigint NOT NULL,
`Fecha_Hora` datetime NOT NULL,
PRIMARY KEY (`Email`,`ISBN`),
   FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE );


DROP TABLE IF EXISTS `compras`;


CREATE TABLE `compras`
  (`ID` int NOT NULL AUTO_INCREMENT,
`ID_Editorial` int NOT NULL,
`Estado` enum('En Espera','Recibido') NOT NULL,
`Fecha_Hora` datetime NOT NULL,
`Metodo_Pago` varchar(255) NOT NULL,
`Total` decimal(10,2) NOT NULL,
PRIMARY KEY (`ID`,
`ID_Editorial`),
   FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON UPDATE CASCADE );


DROP TABLE IF EXISTS `compras_detalle`;


CREATE TABLE `compras_detalle`
  (`ID_Compra` int NOT NULL,
`ISBN` bigint NOT NULL,
`Precio` decimal(10,2) unsigned NOT NULL,
`Cantidad` int unsigned NOT NULL,
PRIMARY KEY (`ID_Compra`,`ISBN`),
   FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE );


DROP TABLE IF EXISTS `ventas`;


CREATE TABLE `ventas`
  (`ID` int NOT NULL AUTO_INCREMENT,
`Email` varchar(255) NOT NULL,
`Estado` enum('Enviado','Entregado','Procesando') NOT NULL,
`Metodo_Pago` enum('Debito','Credito') NOT NULL,
`Fecha_Hora` datetime NOT NULL,
`Total` decimal(10,2) NOT NULL,
PRIMARY KEY (`ID`,`Email`),
   FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON UPDATE CASCADE ON DELETE no action );


DROP TABLE IF EXISTS `ventas_detalle`;


CREATE TABLE `ventas_detalle`
  (`ID_Venta` int NOT NULL,
`ISBN` bigint NOT NULL,
`Cantidad` int unsigned NOT NULL,
`Descuento` decimal(10,2) unsigned NOT NULL,
PRIMARY KEY (`ID_Venta`,`ISBN`),
   FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE ON DELETE NO action);


DROP TABLE IF EXISTS `pedidos`;


CREATE TABLE `pedidos`
  (`ID_Venta` int NOT NULL AUTO_INCREMENT,
`Descripcion` varchar(255) NOT NULL,
`Sistema_Envio` varchar(255) NOT NULL,
PRIMARY KEY (`ID_Venta`),
   FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE);

-- EVENTO DE TOKEN PASS --

CREATE EVENT IF NOT EXISTS token_pass ON SCHEDULE EVERY 1 MINUTE COMMENT 'Si la fecha de creación del token pass es mayor a 48 horas se cambia el valor de Token_Password y Fecha_Token a vacío.' DO
UPDATE usuarios
SET Token_Password = “”, Fecha_Token = “”
WHERE Fecha_Token < DATE_SUB(NOW(),INTERVAL 48 HOUR);

-- EVENTO DE ELIMINACIÓN DE  PRODUCTOS DEL CARRITO --

CREATE EVENT IF NOT EXISTS borrar_carrito ON SCHEDULE EVERY 1 minute COMMENT 'Elimina todo el contenido del carrito pasado 3 dias despúes de que el cliente añadio sus producto al carrito.' DO
DELETE
FROM carrito
WHERE fechor_car < DATE_SUB(NOW(),INTERVAL 72 HOUR);


CREATE TRIGGER new_baja_book AFTER
INSERT ON ventas_detalle
for each row
update libros
set Stock = libros.Stock - new.Cantidad
where isbn = new.ISBN;


CREATE TRIGGER new_alta_book AFTER
INSERT ON compras_detalle
FOR EACH ROW
UPDATE libros
SET Stock = libros.Stock + new.Cantidad
WHERE isbn = new.ISBN;


CREATE TRIGGER LimpiarCarrito AFTER
INSERT ON ventas
FOR EACH ROW
DELETE
FROM carrito
WHERE (Email = new.Email);

-- insert data

INSERT INTO `usuarios` (`Nombre`, `Email`, `Token_Password`, `Fecha_Token`, `Fecha_Nacimento`, `Genero`, `Departamento`, `Numero`, `Calle`, `Ciudad`, `Password`, `Foto`, `Rol`, `Codigo_Postal`) VALUES ('Augusto Picardo', 'auguselo77@gmail.com', NULL, NULL, '2004-04-22', 'Bot', 'Canelones', '169', '13', 'las vegas', '$2y$10$.BIn.3/KL/HcSHel0m2xBeh4wzK8gObdWDxxVEeDXqZYQyNitp1n.', 'public/imgs/Users/auguselo77@gmail.com.jpeg', 'Administrador', '3311');
INSERT INTO `editoriales` VALUES (1,'Libros Cúpula','https://www.planetadelibros.com/editorial/libros-cupula/18','public/imgs/Editoriales/1.jpeg','Av. Diagonal, 662-664. 08034 Barcelona','+34934928000','libroscupula@planetadelibros.com'),(2,'Blink Publishing','https://www.bonnierbooks.co.uk/','public/imgs/Editoriales/2.jpeg',"Suite 2.08, Plaza, 535 King's Rd, London SW10 0SZ, Reino Unido",'+442037708888','hello@bonnierbooks.co.uk'),(3,'Simon & Schuster','https://www.simonandschuster.com/','public/imgs/Editoriales/3.jpeg','1230 Avenue of the Americas New York, NY 10020','+18779890009','https://www.simonandschuster.net/about/contact_us'),(4,'Faber and Faber','https://www.faber.co.uk/','public/imgs/Editoriales/4.jpeg','Bloomsbury House 74-77 Great Russell Street London WC1B 3DA United Kingdom','+4402079273800','bookshop@faber.co.uk'),(5,'HarperCollins Publishers','https://www.harpercollins.com/','public/imgs/Editoriales/5.jpeg','HarperCollins Publishers 195 Broadway New York, NY 10007','+18002427737','consumercare@harpercollins.com'),(6,'Ediciones Martínez Roca','https://www.planetadelibros.com/editorial/ediciones-martinez-roca/11','public/imgs/Editoriales/6.jpeg','Juan Ignacio Luca de Tena, 17 28027 Madrid','+34914230370','ediciones@espasa.es'),(7,'Montena','https://www.penguinlibros.com/es/11375-montena','public/imgs/Editoriales/7.jpeg','Travessera de Gràcia, 47-49 08021 BARCELONA España','+34933660300','isbn@rhm.es'),(8,'Planeta','https://www.planetadelibros.com.uy/','public/imgs/Editoriales/8.jpeg','Cuareim 1647, 11100 Montevideo, Departamento de Montevideo','++598096253654','info@planeta.es'),(9,'Fefmur','https://pmb.parlamento.gub.uy/pmb/opac_css/index.php?lvl=publisher_see&id=9971','public/imgs/Editoriales/9.jpeg','Av. Italia 2819, 11600 Montevideo, Departamento de Montevideo','+59824252378','bdau@parlamento.gub.uy'),(10,'Destino','https://www.planetadelibros.com/editorial/ediciones-destino/conocenos/7','public/imgs/Editoriales/10.jpeg','Avda. Diagonal 662.664, 7ª','+8034','edicionesedestino@edestino.es'),(11,'Alfaguara','https://www.penguinlibros.com/es/11579-alfaguara','public/imgs/Editoriales/11.jpeg','Colonia 950 Piso 6 Montevideo, CP 1100','+59829013668','bit.ly/RentreeLiteraria'),(12,'Wattpad','https://www.wattpad.com/?locale=es_ES','public/imgs/Editoriales/12.jpeg','Located downtown Toronto, the heart of Canada’s startup capital','+','linkin.bio/lifeatwattpad'),(13,'EDICIONES B','https://www.penguinlibros.com/uy/42720-ediciones-b','public/imgs/Editoriales/13.jpeg','Buenos Aires 671, 11000 Montevideo, Departamento de Montevideo','+5982901366','infouy@penguinrandomhouse.com'),(14,'Plutón Ediciones','https://www.plutonediciones.com/site/','public/imgs/Editoriales/14.jpeg','Poligono Oceanis 5.15, Cataboy, 36418 Atios, Pontevedra, España','+34937070147','contacto@plutonediciones.com'),(15,'Random House Worlds','https://www.penguinrandomhouse.com/authors/2279659/random-house-worlds/','public/imgs/Editoriales/15.jpeg','Colonia 950 Piso 6','+59829013668','global.penguinrandomhouse.com'),(16,'Simon & Schuster Audio','http://www.simonandschuster.com/','public/imgs/Editoriales/16.jpeg','Nueva York, Nueva York, Estados Unidos','+18779890009','Corporate.Communications @simonandschuster.com'),(17,'Tantor Audio','https://audiobookstore.com/contactus.aspx','public/imgs/Editoriales/17.jpeg','Business Park Road, Old Saybrook Estados Unidos','+18775651468','customercare@audiobookstore.com'),(18,'Blackstone Audio','https://www.blackstonewholesale.com/','public/imgs/Editoriales/18.jpeg','Ashland Ruta 66 Estados Unidos','+18007292665','blackstone@audiobooks.com'),(19,'William Morrow','https://www.harpercollins.com/collections/william-morrow','public/imgs/Editoriales/19.jpeg','Austin, Texas, Estados Unidos','+14456014235','morrowmoy@lancapital.com'),(20,'Brilliance Audio','https://www.audible.com/ep/en-espanol-2','public/imgs/Editoriales/20.jpeg','Brilliance Publishing Inc','+16168465256','service@brilliance.com'),(21,'Grijalbo Ilustrados','https://www.penguinlibros.com/ar/','public/imgs/Editoriales/21.jpeg','Humberto 1º 555, C1103ACK CABA, Argentina','+541152354400','infouy@penguinrandomhouse.com'),(22,'VIZ Media LLC','https://www.viz.com/','public/imgs/Editoriales/22.jpeg','San Francisco, California, Estados Unidos','+14155467073','https://www.viz.com/company-contact'),(23,'ELSOLUCIONARIO','https://www.elsolucionario.org/','public/imgs/Editoriales/23.jpeg','Reina Victoria 6450, La Reina, Región Metropolitana, Chile','+573125214990','team@elsolucionario.io'),(24,'Seven Seas Entertainment','https://www.starsonlyclub.com/','public/imgs/Editoriales/24.jpeg','530b Harkle Rd, Santa Fe, NM 87505, Estados Unidos','+12133571523','Seven@seasentrentaiment.com'),(25,'Vintage Español','https://www.penguinlibros.com/ar/181282-vintage-espanol','public/imgs/Editoriales/25.jpeg','Humberto 1º 555, C1103ACK CABA, Argentina','+541152354400','vintaje@espanol.com'),(26,'Porrúa','https://porrua.mx/','public/imgs/Editoriales/26.jpeg','Vialidad de la Barranca 6, Col. Ex Hacienda Jesús del Monte, Bosque de las Palmas, 52763 Naucalpan de Juárez, Mex., México','+525552903115','atencion@porrua.com'),(27,'Alianza Editorial','https://www.alianzaeditorial.es/','public/imgs/Editoriales/27.jpeg','C. de Juan Ignacio Luca de Tena, 15, 28027 Madrid, España','+34913938888','alianza@editorial.com'),(28,'Bibliopolis','http://www.bibliopolis.org/editorial.htm','public/imgs/Editoriales/28.jpeg','28802 Alcalá de Henares (Madrid)','+34918820357','info@udllibros.com'),(29,'Ediciones Minotauro','https://www.planetadelibros.com/editorial/minotauro/21','public/imgs/Editoriales/29.jpeg','Avinguda Diagonal, 662, 08034 Barcelona, España','+34934928816','proyectosminotauro@planeta.es'),(30,'Editorial Hidra','https://www.editorialhidra.com/','public/imgs/Editoriales/30.jpeg','C. de Cuevas, 27, 28039 Madrid, España','+34915715427','red@editorialhidra.com'),(31,'Gallery Books','https://simonandschusterpublishing.com/gallery-books/','public/imgs/Editoriales/31.jpeg','Rockefeller Center,Nueva York','++12126987243','SSCanadaPublicity@Simonandschuster.ca '),(32,'Casa del Libro','https://www.casadellibro.com/','public/imgs/Editoriales/32.jpeg','Las Flores 332, B1875DDH Wilde, Provincia de Buenos Aires, Argentina','+541142073423','casadel@libro.com'),(33,'BookShop','https://m.media-amazon.com/images/I/51unJ6fP03L.jpg','public/imgs/Editoriales/33.jpeg','José Enrique Rodó 1671, 11200 Montevideo, Departamento de Montevideo','+59824011010','web@bookshop.com.uy'),(34,'Ballantine Books','https://www.penguinrandomhouse.com/authors/57084/ballantine/','public/imgs/Editoriales/34.jpeg','1745 Broadway, New York, NY 10019, Estados Unidos','+12127829000','Ballantine@Books.com'),(35,'Emecé Editores.','https://www.planetadelibros.com.uy/editorial/emece-editores/149','public/imgs/Editoriales/35.jpeg','Adolfo Alsina 2062, C1090AAF CABA, Argentina','+59829014026','info@planeta.com.uy'),(36,'Ediciones Siruela','https://www.siruela.com/','public/imgs/Editoriales/36.jpeg','C. de Almagro, 25, 28010 Madrid, España','+34913555720','Ediciones@Siruela.com'),(37,'Editorial Alma','https://www.editorialalma.com/','public/imgs/Editoriales/37.jpeg','C/ Milà I Fontanals, 14-26, 08012 Barcelona, España','+34937934930','info@editorialalma.com');

INSERT INTO `autores`
VALUES (1,'Lewis Hamilton','Reino Unido','Lewis Carl Davidson Larbalestier Hamilton​ es un piloto británico de automovilismo. En Fórmula 1 desde 2007, coronándose campeón del mundo en 7 ocasiones: en 2008 (McLaren) 2014, 2015, 2017, 2018, 2019, 2020 con Mercedes, igualando los 7 títulos mundiales de Michael Schumacher, cuenta con 103 victorias en Grandes Premios a lo largo de su carrera en la Fórmula 1 lo que lo convierte en el piloto con más victorias en la historia de la Categoría','1985-01-07','public/imgs/Autores/1.jpeg'),
(2,'Jenson Button','Reino Unido','Jenson Alexander Lyons Button​, más conocido como Jenson Button, es un piloto de automovilismo de velocidad británico y expiloto de Fórmula 1 que participó entre el año 2000 y 2017 en la dicha categoría, coronándose campeón del mundo en 2009 con Brawn GP.','1980-01-19','public/imgs/Autores/2.jpeg'),
(3,'Adrian Newey','Reino Unido','Adrian Newey, OBE es el director técnico del equipo Red Bull Racing de Fórmula 1.\nHa trabajado tanto en Fórmula 1 como en Indycar, habiendo logrado éxitos en ambas categorías. Considerado como uno de los mejores ingenieros en la Fórmula 1, Newey inspiró diseños que han ganado numerosos títulos, dominando gran parte de los años 1990. Desde el 2006 es parte del equipo Red Bull Racing donde consiguieron el título de pilotos en 5 ocasiones y el de constructores en 4\nocasiones. ','1958-12-26','public/imgs/Autores/3.jpeg'),
(4,'Ross Brawn','Reino Unido','Ross James Brawn​ es un ingeniero de automovilismo británico. Ha trabajado con varios equipos de Fórmula 1. Hasta 2013 fue el máximo responsable del equipo Mercedes AMG F1, en 2014 fue sustituido por Toto Wolff.','1954-11-23','public/imgs/Autores/4.jpeg'),
(5,'Adam Parr','Reino Unido','Adam Parr es un empresario británico conocido por su trabajo en varios campos, incluida la Fórmula 1 y la inversión en ONG. Fue director ejecutivo y ex presidente de Williams Grand Prix Holdings PLC, desde noviembre de 2006 hasta el 30 de marzo de 2012.','1965-05-26','public/imgs/Autores/5.jpeg'),
(6,'Tom Bower','Reino Unido','Thomas Michael Bower es un escritor británico y ex periodista y productor de televisión de la BBC. Es conocido por su periodismo de investigación y por sus biografías no autorizadas, a menudo de magnates de los negocios y propietarios de periódicos.','1946-09-28','public/imgs/Autores/6.jpeg'),
(7,'El Rubius','España','Rubén Doblas Gundersen, mejor conocido como su alias virtual el Rubius es un youtuber, streamer y celebridad de internet hispano-noruego, ​ reconocido por sus vídeos de entretenimiento basados en gameplays, sketches, parodias, montajes y videoblogs.','1990-02-13','public/imgs/Autores/7.jpeg'),
(8,'Julio Verne','Francia','Jules Gabriel Verne, conocido en los países hispanohablantes como Julio Verne fue un escritor, dramaturgo​ y poeta​ francés célebre por sus novelas de aventuras y por su profunda influencia en el género literario de la ciencia ficción​','1828-02-08','public/imgs/Autores/8.jpeg'),
(9,'Raúl Álvarez Genes','España','Raúl Álvarez Genes , más conocido como AuronPlay o simplemente Auron, es un streamer y youtuber español. Con cerca de treinta millones de suscriptores y cuatro mil millones de visualizaciones en su canal principal de YouTube, es el cuarto youtuber con más suscriptores de España. En Twitch cuenta con más de trece millones de seguidores, lo que le coloca en el segundo puesto global de los canales con más seguidores.​','1988-11-05','public/imgs/Autores/9.jpeg'),
(10,'aXoZer','España','Locutor de Twitch asociado y personalidad de los videojuegos conocido por el juego de transmisión en vivo de Among Us, Minecraft y Phasmophobia. Ha acumulado una audiencia de más de 2.3 millones de espectadores dedicados en la plataforma.','2003-12-18','public/imgs/Autores/10.jpeg'),
(11,'Claudia Gray','Estados Unidos','Claudia Gray es una escritora estadounidense conocida por escribir la saga Medianoche','1970-06-12','public/imgs/Autores/11.jpeg'),
(12,'Miriam Costabel','Uruguay','Master educación , Licenciada Enfermera, Consultor ARCUSUR en Universidad de la República','1973-03-05','public/imgs/Autores/12.jpeg'),
(13,'Paulo Coelho','Brasil','Paulo Coelho de Souza es un novelista, dramaturgo y letrista brasileño después de varios años dedicado a la poesía. Es uno de los escritores y novelistas más leídos del mundo, con más de 320 millones de libros vendidos en más de 170 países, traducidos a 83 lenguas','1947-08-24','public/imgs/Autores/13.jpeg'),
(14,'Clive Stapble Lewis','Reino Unido','Clive Staples Lewis, popularmente conocido como C. S. Lewis, fue un apologista cristiano anglicano, medievalista, y escritor británico, reconocido por sus obras de ficción, especialmente por su saga Las crónicas de Narnia','1898-11-29','public/imgs/Autores/14.jpeg'),
(15,'Ariana Godoy','Venezuela','Ariana Godoy es una autora venezolana con una pasión por la lectura desde que era una niña. De pequeña, escribía un diario de su día a día pero le pareció aburrido así que comenzó a agregarle monstruos y situaciones imaginarias creando así nació su primera historia.','1990-10-05','public/imgs/Autores/15.jpeg'),
(16,'Flor M.Salvador','México ','Flor M. Salvador es una joven escritora mexicana, conocida por su condecorada novela Boulevard que fue escrita originalmente desde Wattpad, ','1998-12-25','public/imgs/Autores/16.jpeg'),
(17,'Deepak Chopra','India','Deepak Chopra es un escritor y conferencista indio de temática Nueva Era​ y promotor de terapias pseudocientíficas​. Ha escrito sobre espiritualidad y el supuesto poder de la mente en la curación médica.','1946-10-22','public/imgs/Autores/17.jpeg'),
(18,'Anna Todd','Estados Unidos','Anna Renee Todd es una escritora estadounidense, conocida por su obra escrita After, saga superventas de novelas juveniles, que tuvo como inicio una pasión por el grupo One Direction, en la aplicación Wattpad.​','1989-03-20','public/imgs/Autores/18.jpeg'),
(19,'Chuck Wendig','Estados Unidos','Charles David Wendig es un autor, escritor de historietas, guionista y bloguero estadounidense. Es mejor conocido por su blog en línea Terrible Minds, por su trilogía de novelas de Star Wars Aftermath y Star Wars Aftermath Empire\'s End','1976-04-22','public/imgs/Autores/19.jpeg'),
(20,'John Jackson Miller','Estados Unidos','John Jackson Miller es un autor de ciencia ficción estadounidense, escritor de cómics y comentarista, conocido por su trabajo en la franquicia de Star Wars y su investigación sobre la historia de la circulación de cómics, tal como se presenta en el catálogo estándar de la serie de cómics y el sitio web de Comichron','1968-01-12','public/imgs/Autores/20.jpeg'),(21,'Joe Schreiber','Estados Unidos','Joe Schreiber es un novelista estadounidense conocido por sus novelas de terror y suspenso. También trabaja como técnico de MRI en el MRI Group en Lancaster PA','1969-10-01','public/imgs/Autores/21.jpeg'),
(22,'Karen Traviss','Reino Unido','Karen Traviss es una autora de ciencia ficción de Wiltshire, Inglaterra. Es la autora de la serie Wess\'Har y ha escrito material relacionado con Star Wars, Gears of War, Halo, G.I. Joe y la serie Nomad más nueva trabajando con Nick Cole y Jason Anspach.','1959-01-07','public/imgs/Autores/22.jpeg'),
(23,'Stephen King','Estados Unidos','Stephen Edwin King, más conocido como Stephen King y ocasionalmente por su pseudónimo Richard Bachman, es un escritor estadounidense de novelas de terror, ficción sobrenatural, misterio, ciencia ficción y literatura fantástica.','1947-09-21','public/imgs/Autores/23.jpeg'),
(24,'Alex White','Estados Unidos','Alex White es un autor estadounidense de ciencia ficción y terror. Son mejor conocidos por la trilogía The Salvagers y sus novelas relacionadas con las franquicias Alien y Star Trek. White usa pronombres singulares.','1981-11-04','public/imgs/Autores/24.jpeg'),
(25,'Drew Karpyshyn','Canadá','Drew Karpyshyn es un escritor y diseñador de videojuegos canadiense conocido principalmente por los juegos Baldur \'s Gate II: Throne of Bhaal, Star Wars: Caballeros de la Antigua República, y los libros basados en el personaje Darth Bane de Star Wars.','1971-07-28','public/imgs/Autores/25.jpeg'),
(26,'Catherynne M. Valente','Estados Unidos','Catherynne M. Valente es una escritora de ficción, poeta y crítica literaria estadounidense. Por sus novelas de ficción especulativa ha ganado los premios anuales James Tiptree, Andre Norton y Mythopoeic Fantasy.','1979-05-05','public/imgs/Autores/26.jpeg'),
(27,'J. R. R. Tolkien','Sudáfrica','John Ronald Reuel Tolkien, a menudo citado como J. R. R. Tolkien o JRRT, fue un escritor, poeta, filólogo, lingüista y profesor universitario británico, conocido principalmente por ser el autor de las novelas clásicas de fantasía heroica El hobbit, El Silmarillion y El Señor de los Anillos','1892-01-03','public/imgs/Autores/27.jpeg'),
(28,'Michael Crichton','Estados Unidos','Michael Crichton fue un escritor, guionista, director y productor de cine estadounidense, célebre por sus trabajos en los géneros de la ciencia ficción, la intriga y la ficción médica.','1942-10-23','public/imgs/Autores/28.jpeg'),
(29,'Gina Mclntyre','Estados Unidos','Gina McIntyre es escritora y editora freelance con más de 20 años de experiencia. Es autora del The New York Times bestseller Stranger Things. Mundos del revés es la guía oficial para adentrarse detrás de las cámaras de la serie de Netflix Stranger Things.','1945-05-16','public/imgs/Autores/29.jpeg'),
(30,'Mike Avila','Cubano','Author, TV Producer for hire, Emmy winner Cuban-American, Dad; He/Him IG: ','1975-03-10','public/imgs/Autores/30.jpeg'),
(31,'Ian Sommerville','Reino Unido','Ian F. Sommerville, es un académico británico. Es autor de un popular libro de texto para estudiantes sobre ingeniería de software, así como de varios otros libros y documentos','1951-02-23','public/imgs/Autores/31.jpeg'),
(32,'Syougo Kinugasa','Japonés','Shōgo Kinugasa (衣 (きぬ) 笠 (がさ) 彰 (しょう) 梧 (ご) , Kinugasa Shōgo) es un escritor de escenarios de juegos y un novelista japonés.','1995-05-25','public/imgs/Autores/32.jpeg'),
(33,'David M. Barnett','Reino Unido','David Barnett es un periodista y autor inglés. Tiene varios libros publicados, incluyendo Hinterland, Angelglass y The Janus House y otros cuentos de dos caras. Nacido en Wigan, Lancashire, Inglaterra, ha trabajado en Telegraph & Argus.','1970-01-11','public/imgs/Autores/33.jpeg'),
(34,'Bram Stoker','Irlanda','Abraham \"Bram\" Stoker fue un novelista y escritor irlandés, conocido por su novela Drácula.','1847-11-08','public/imgs/Autores/34.jpeg'),
(35,'Mary Shelley','Reino Unido','Mary Wollstonecraft Shelley fue una escritora, ​ dramaturga, ensayista y biógrafa británica​ reconocida principalmente por ser la autora de la novela gótica Frankenstein o el moderno Prometeo, ​ considerada la primera novela de ciencia ficción moderna y que logra inaugurar el género.','1797-08-30','public/imgs/Autores/35.jpeg'),
(36,'Andrzej Sapkowski','Polonia','Andrzej Sapkowski es un escritor polaco de fantasía heroica. Sus obras están fuertemente influenciadas por la cultura y mitología eslavas, así como por las narraciones tradicionales.​ Su estilo de escritura es fluido y directo adaptando el lenguaje popular de la Polonia actual.','1948-06-21','public/imgs/Autores/36.jpeg'),
(37,'John Gwynne','Singapur','John Gwynne estudió y fue profesor en la Universidad de Brighton. Ha tocado el bajo doble en un grupo de rock y viajado por Estados Unidos y Canadá. Está casado, tiene cuatro hijos y vive en Eastbourne, donde pertenece a una asociación que realiza recreaciones de la civilización vikinga.','1968-09-21','public/imgs/Autores/37.jpeg'),
(38,'Leigh Bardugo','Jerusalén','Leigh Bardugo, es una escritora israelí de fantasía juvenil, conocida por sus novelas de Grishaverse, particularmente por la bilogía Seis de Cuervos y la trilogía Sombra y Hueso, que han vendido más de dos millones de copias, al igual que Novena casa.​','1975-04-06','public/imgs/Autores/38.jpeg'),
(39,'Robert Jordan','Estados Unidos','James Oliver Rigney, Jr., más conocido por el seudónimo Robert Jordan, fue un escritor estadounidense, famoso por ser autor de la saga de fantasía \'\' La rueda del tiempo\'\'.','1948-10-17','public/imgs/Autores/39.jpeg'),
(40,'Troy Denning','Estados Unidos','Troy Denning es un autor y diseñador de juegos estadounidense de fantasía y  ciencia ficción que ha escrito más de dos docenas de novelas.','1958-10-08','public/imgs/Autores/40.jpeg'),
(41,'Pedro Urvi','España','Pedro Urvi es un escritor de fantasía, que un día hace seis años comenzó a escribir como un experimento. Sin él quererlo, el experimento narrativo se convirtió en una novela, que finalmente ha evolucionado hasta convertirse en una trilogía.','1984-05-06','public/imgs/Autores/41.jpeg'),
(42,'Laura Gallego García','España','Laura Gallego García es una autora española de literatura infantil y juvenil especializada en temática fantástica. Ha estudiado Filología Hispánica en la Universidad de Valencia. En el año 2005 ya había escrito un total de 3 libros, siendo ya una referente en lecturas juveniles','1977-10-11','public/imgs/Autores/42.jpeg'),
(43,'George R. R. Martin','Estados Unidos','George Raymond Richard Martin, conocido como George R. R. Martin y en ocasiones por sus seguidores como GRRM, es un escritor y guionista estadounidense de literatura fantástica, ciencia ficción y terror.','1948-09-20','public/imgs/Autores/43.jpeg'),
(44,'Thomas Malory','Reino Unido','Thomas Malory CBE, fue el autor o el compilador de La muerte de Arturo. Existen varias hipótesis sobre la identidad de Malory, aunque la más aceptada dice que se trata de un inglés de Newbold Revell en Warwickshire. El apellido Malory aparece con diferentes grafías, incluyendo Maillorie, Mallory y Maleore.','1471-03-14','public/imgs/Autores/44.jpeg'),
(45,'Rudyard Kipling','India','Joseph Rudyard Kipling fue un escritor y poeta británico. Es el autor de relatos, cuentos infantiles, novelas y poesía.','1865-01-18','public/imgs/Autores/45.jpeg');


INSERT INTO `libros`
VALUES (9780007270064,'Lewis Hamilton: My Story',900.89,'public/texts/BookSipnosis/9780007270064.txt',5,0),
(9780137035151,'Ingeniería del Software – Ian Sommerville – 9na Edición\n ',230.00,'public/texts/BookSipnosis/9780137035151.txt',25,0),
(9780192815989,'Drácula',500.00,'public/texts/BookSipnosis/9780192815989.txt',28,0),
(9780307795960,'Star Wars: The Clone Wars \n ',740.00,'public/texts/BookSipnosis/9780307795960.txt',15,0),
(9780307796080,'Star Wars Death Troopers:',430.00,'public/texts/BookSipnosis/9780307796080.txt',15,0),
(9780356514215,'La sombra de los dioses',1500.00,'public/texts/BookSipnosis/9780356514215.txt',31,0),
(9780395647387,'The Lord Of The Rings: One Volume\n ',2000.00,'public/texts/BookSipnosis/9780395647387.txt',21,0),
(9780399565212,'Star wars Aftermath',1000.00,'public/texts/BookSipnosis/9780399565212.txt',8,0),
(9780450032202,'El resplandor',350.00,'public/texts/BookSipnosis/9780450032202.txt',27,0),
(9780450057694,'Cementerio de animales',600.00,'public/texts/BookSipnosis/9780450057694.txt',35,0),
(9780571269365,'No Angel: The Secret Life of Bernie Ecclestone',850.99,'public/texts/BookSipnosis/9780571269365.txt',4,0),
(9780582541542,'Frankenstein o el moderno Prometeo',730.00,'public/texts/BookSipnosis/9780582541542.txt',29,0),
(9781470821647,'Mass Effect: Andromeda Annihilation',1900.00,'public/texts/BookSipnosis/9781470821647.txt',20,0),
(9781471162350,'Total Competition',1500.00,'public/texts/BookSipnosis/9781471162350.txt',3,0),
(9781501257186,'Jurassic Park',1320.00,'public/texts/BookSipnosis/9781501257186.txt',22,0),
(9781524796297,'Fuego y Sangre',1000.00,'public/texts/BookSipnosis/9781524796297.txt',35,0),
(9781565119383,'La muerte de Arturo',550.00,'public/texts/BookSipnosis/9781565119383.txt',36,0),
(9781692101619,'El Hijo Del Traidor',450.00,'public/texts/BookSipnosis/9781692101619.txt',34,0),
(9781780899602,'Stranger Things. Mundos al revés\n ',720.00,'public/texts/BookSipnosis/9781780899602.txt',23,0),
(9781788702614,'How To Be An F1 Driver: My Guide To Life In The Fast Lane',899.99,'public/texts/BookSipnosis/9781788702614.txt',2,0),
(9781789090413,'Halo: Silent Storm: A Master Chief Story\n ',500.00,'public/texts/BookSipnosis/9781789090413.txt',33,0),
(9781789098907,'Alien: Colony War\n ',789.00,'public/texts/BookSipnosis/9781789098907.txt',20,0),
(9781797123431,'Star Treck Revenant',1500.00,'public/texts/BookSipnosis/9781797123431.txt',18,0),
(9781911600343,'Jenson Button: Life to the Limit: My Autobiography',1250.99,'public/texts/BookSipnosis/9781911600343.txt',2,0),
(9781974732500,'The Art and Making of Transformers: War for Cybertron Trilogy\n ',550.00,'public/texts/BookSipnosis/9781974732500.txt',24,0),
(9782811206772,'Mass Effect: Revelation',1200.00,'public/texts/BookSipnosis/9782811206772.txt',19,0),
(9782820507082,'El último deseo',900.00,'public/texts/BookSipnosis/9782820507082.txt',30,0),
(9783453435773,'It',1000.00,'public/texts/BookSipnosis/9783453435773.txt',18,0),
(9783734161179,'Empire\'s End; Aftermath Star wars',750.00,'public/texts/BookSipnosis/9783734161179.txt',16,0),
(9783741619991,'The Stand',320.00,'public/texts/BookSipnosis/9783741619991.txt',34,0),
(9783839849958,'El Libro de la Selva',1500.00,'public/texts/BookSipnosis/9783839849958.txt',37,0),
(9788408062646,'Las Cronicas de Narnia',900.50,'public/texts/BookSipnosis/9788408062646.txt',10,0),
(9788415089070,'20.000 Leguas de Viaje Submarino',312.60,'public/texts/BookSipnosis/9788415089070.txt',14,0),
(9788416387588,'Seis de cuervos',1000.00,'public/texts/BookSipnosis/9788416387588.txt',32,0),
(9788416889716,'A New Dawn: Star Wars',666.00,'public/texts/BookSipnosis/9788416889716.txt',15,0),
(9788418949333,'aXoZer: El búnker final',700.56,'public/texts/BookSipnosis/9788418949333.txt',7,0),
(9788420451916,'A través de mi ventana',620.10,'public/texts/BookSipnosis/9788420451916.txt',11,0),
(9788427041752,'De lo peor, lo mejor: Los consejos de Auron (4You2)',450.04,'public/texts/BookSipnosis/9788427041752.txt',6,0),
(9788427042629,'AuronPlay, el libro',500.89,'public/texts/BookSipnosis/9788427042629.txt',6,0),
(9788427043916,'El juego del Hater',450.67,'public/texts/BookSipnosis/9788427043916.txt',6,0),
(9788434873612,'El Valle de los Lobosº',250.00,'public/texts/BookSipnosis/9788434873612.txt',34,0),
(9788445011980,'Estuche La rueda del tiempo',850.00,'public/texts/BookSipnosis/9788445011980.txt',31,0),
(9788448025373,'Cómo hacer un coche',2200.59,'public/texts/BookSipnosis/9788448025373.txt',1,0),
(9788466343756,'Jurassic Park: El mundo perdido.',500.00,'public/texts/BookSipnosis/9788466343756.txt',33,0),
(9788466631792,'El Camino hacia el amor',450.12,'public/texts/BookSipnosis/9788466631792.txt',13,0),
(9788499983196,'El libro Troll',450.03,'public/texts/BookSipnosis/9788499983196.txt',6,0),
(9789504956860,'Star Wars Líneas de sangre',1377.00,'public/texts/BookSipnosis/9789504956860.txt',8,0),
(9789571077154,'Classroom of the Elite (Light Novel) Vol. 1\n ',500.00,'public/texts/BookSipnosis/9789571077154.txt',26,0),
(9789875802667,'Brida',500.00,'public/texts/BookSipnosis/9789875802667.txt',8,0),
(9789915667027,'Boulevard',850.50,'public/texts/BookSipnosis/9789915667027.txt',12,0),
(9789974312463,'Manual de Tecnologías y Técnicas en Enfermería.',1000.00,'public/texts/BookSipnosis/9789974312463.txt',9,0),
(9789974729889,'After Antes de ella',920.00,'public/texts/BookSipnosis/9789974729889.txt',8,0);

INSERT INTO `libros_categorias` VALUES (9780007270064,'Autobiografía'),(9780007270064,'Biografía'),(9780007270064,'Deportes'),(9780007270064,'F1'),(9780137035151,'Aprendizaje'),(9780192815989,'Ficción gótica'),(9780192815989,'Ficción Sobrenatural'),(9780192815989,'Libro epistolar'),(9780192815989,'Literatura de Invasión'),(9780192815989,'Literatura fantástica'),(9780192815989,'Terror'),(9780307795960,'Acciòn'),(9780307795960,'Ciencia Ficciòn'),(9780307795960,'Historia'),(9780307795960,'Narrativa'),(9780307796080,'Ciencia Ficción'),(9780307796080,'Drama'),(9780307796080,'Horror'),(9780356514215,'Alta fantasía'),(9780356514215,'Literatura fantástica'),(9780395647387,'Alta fantasía'),(9780395647387,'Ficción de aventuras'),(9780395647387,'Literatura fantástica'),(9780395647387,'Romance de caballería'),(9780399565212,'Acciòn'),(9780399565212,'Aventura'),(9780399565212,'Ciencia Ficción'),(9780399565212,'Drama'),(9780450032202,'Ficción gótica'),(9780450032202,'Ficción sobrenatural'),(9780450032202,'Terror'),(9780450032202,'Terror psicológico'),(9780450057694,'Terror'),(9780571269365,'Biografía'),(9780571269365,'Deportes'),(9780571269365,'F1'),(9780582541542,'Ciencia ficción'),(9780582541542,'Ficción gótica'),(9780582541542,'Terror'),(9781470821647,'Aventura'),(9781470821647,'Ciencia Ficción'),(9781470821647,'Horror'),(9781471162350,'Biográfico'),(9781471162350,'Deportes'),(9781471162350,'F1'),(9781501257186,'Ciencia ficción'),(9781501257186,'Literatura fantástica'),(9781501257186,'Tecno-thriller'),(9781524796297,'Alta fantasía'),(9781524796297,'Ficción de aventuras'),(9781524796297,'Literatura fantástica'),(9781565119383,'Ficción histórica'),(9781565119383,'Materia de Bretaña'),(9781565119383,'Romance de caballería'),(9781692101619,'Alta Fantasía'),(9781692101619,'Fantasía Histórica'),(9781692101619,'Literatura Fantástica'),(9781780899602,'Ficción de aventura'),(9781780899602,'Guia de Horror'),(9781788702614,'Autobiografía'),(9781788702614,'Biografía'),(9781788702614,'Deportes'),(9781788702614,'F1'),(9781789090413,'Acciòn'),(9781789090413,'Aventura'),(9781789090413,'Ciencia Ficciòn'),(9781789090413,'Romance'),(9781789098907,'Ciencia Ficción'),(9781789098907,'Terror'),(9781797123431,'Aventura'),(9781797123431,'Ciencia Ficciòn'),(9781797123431,'Romance'),(9781911600343,'Autobiografía'),(9781911600343,'Biografía'),(9781911600343,'Deportes'),(9781911600343,'F1'),(9781974732500,'aprendizaje'),(9781974732500,'Ciencia Ficción'),(9781974732500,'Historia Fantástica'),(9782811206772,'Acción'),(9782811206772,'Ciencia Ficción'),(9782811206772,'Narrativa'),(9782820507082,'Alta fantasía'),(9782820507082,'Literatura fantástica'),(9783453435773,'Aventura'),(9783453435773,'Drama'),(9783453435773,'Terror'),(9783453435773,'Terror Psicológico'),(9783734161179,'Acciòn'),(9783734161179,'Aventura'),(9783734161179,'Ciencia Ficciòn'),(9783741619991,'Ciencia ficción'),(9783741619991,'Ciencia ficción apocalíptica'),(9783741619991,'Fantasía oscura'),(9783741619991,'Literatura fantástica'),(9783741619991,'Novela'),(9783741619991,'Terror'),(9783839849958,'Ficción de aventuras'),(9783839849958,'Literatura infantil'),(9788408062646,'Aventura'),(9788408062646,'Drama'),(9788408062646,'Fantasía'),(9788408062646,'Suspenso'),(9788415089070,'Aventura'),(9788416387588,'Fantasía'),(9788416387588,'Ficción adulto joven'),(9788416387588,'Literatura fantástica'),(9788416889716,'Aventura'),(9788416889716,'Ciencia Ficciòn'),(9788418949333,'Interactivo'),(9788420451916,'Drama Romantico'),(9788420451916,'Romance'),(9788427041752,'Humor'),(9788427042629,'Biografía'),(9788427043916,'Ficción'),(9788427043916,'Thriller'),(9788434873612,'Literatura fantástica'),(9788445011980,'Drama'),(9788445011980,'Fantasìa'),(9788445011980,'Literatura fantàstica'),(9788448025373,'Autobiografía'),(9788448025373,'Biografía'),(9788448025373,'Deportes'),(9788448025373,'F1'),(9788466343756,'Ciencia ficción'),(9788466343756,'Novela'),(9788466343756,'Tecno-thriller'),(9788466343756,'Terror'),(9788466631792,'Libro de Autoayuda'),(9788499983196,'Humor'),(9789504956860,'Acción'),(9789504956860,'Aventura'),(9789504956860,'Drama'),(9789504956860,'suspenso'),(9789571077154,'Estudiantes'),(9789571077154,'Psicológico'),(9789875802667,'Drama'),(9789875802667,'Romance'),(9789915667027,'Aventura'),(9789915667027,'Narrativo'),(9789974312463,'Conocimiento/Estudio'),(9789974729889,'Romance');


INSERT INTO `libros_imgs`
VALUES (9780007270064,'public/imgs/Books/9780007270064/0.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/1.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/2.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/3.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/4.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/5.jpeg'),
(9780007270064,'public/imgs/Books/9780007270064/6.jpeg'),
(9780137035151,'public/imgs/Books/9780137035151/0.jpeg'),
(9780192815989,'public/imgs/Books/9780192815989/0.jpeg'),
(9780307795960,'public/imgs/Books/9780307795960/0.jpeg'),
(9780307796080,'public/imgs/Books/9780307796080/0.jpeg'),
(9780356514215,'public/imgs/Books/9780356514215/0.jpeg'),
(9780395647387,'public/imgs/Books/9780395647387/0.jpeg'),
(9780399565212,'public/imgs/Books/9780399565212/0.jpeg'),
(9780450032202,'public/imgs/Books/9780450032202/0.jpeg'),
(9780450057694,'public/imgs/Books/9780450057694/0.jpeg'),
(9780571269365,'public/imgs/Books/9780571269365/0.jpeg'),
(9780582541542,'public/imgs/Books/9780582541542/0.jpeg'),
(9781470821647,'public/imgs/Books/9781470821647/0.jpeg'),
(9781471162350,'public/imgs/Books/9781471162350/0.jpeg'),
(9781501257186,'public/imgs/Books/9781501257186/0.jpeg'),
(9781524796297,'public/imgs/Books/9781524796297/0.jpeg'),
(9781565119383,'public/imgs/Books/9781565119383/0.jpeg'),
(9781692101619,'public/imgs/Books/9781692101619/0.jpeg'),
(9781780899602,'public/imgs/Books/9781780899602/0.jpeg'),
(9781788702614,'public/imgs/Books/9781788702614/0.jpeg'),
(9781789090413,'public/imgs/Books/9781789090413/0.jpeg'),
(9781789098907,'public/imgs/Books/9781789098907/0.jpeg'),
(9781797123431,'public/imgs/Books/9781797123431/0.jpeg'),
(9781911600343,'public/imgs/Books/9781911600343/0.jpeg'),
(9781974732500,'public/imgs/Books/9781974732500/0.jpeg'),
(9782811206772,'public/imgs/Books/9782811206772/0.jpeg'),
(9782820507082,'public/imgs/Books/9782820507082/0.jpeg'),
(9783453435773,'public/imgs/Books/9783453435773/0.jpeg'),
(9783734161179,'public/imgs/Books/9783734161179/0.jpeg'),
(9783741619991,'public/imgs/Books/9783741619991/0.jpeg'),
(9783839849958,'public/imgs/Books/9783839849958/0.jpeg'),
(9788408062646,'public/imgs/Books/9788408062646/0.jpeg'),
(9788415089070,'public/imgs/Books/9788415089070/0.jpeg'),
(9788416387588,'public/imgs/Books/9788416387588/0.jpeg'),
(9788416889716,'public/imgs/Books/9788416889716/0.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/0.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/1.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/2.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/3.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/4.jpeg'),
(9788418949333,'public/imgs/Books/9788418949333/5.jpeg'),
(9788420451916,'public/imgs/Books/9788420451916/0.jpeg'),
(9788427041752,'public/imgs/Books/9788427041752/0.jpeg'),
(9788427041752,'public/imgs/Books/9788427041752/1.jpeg'),
(9788427042629,'public/imgs/Books/9788427042629/0.jpeg'),
(9788427042629,'public/imgs/Books/9788427042629/1.jpeg'),
(9788427043916,'public/imgs/Books/9788427043916/0.jpeg'),
(9788427043916,'public/imgs/Books/9788427043916/1.jpeg'),
(9788434873612,'public/imgs/Books/9788434873612/0.jpeg'),
(9788445011980,'public/imgs/Books/9788445011980/0.jpeg'),
(9788448025373,'public/imgs/Books/9788448025373/0.jpeg'),
(9788466343756,'public/imgs/Books/9788466343756/0.jpeg'),
(9788466631792,'public/imgs/Books/9788466631792/0.jpeg'),
(9788499983196,'public/imgs/Books/9788499983196/0.jpeg'),
(9788499983196,'public/imgs/Books/9788499983196/1.jpeg'),
(9788499983196,'public/imgs/Books/9788499983196/2.jpeg'),
(9789504956860,'public/imgs/Books/9789504956860/0.jpeg'),
(9789571077154,'public/imgs/Books/9789571077154/0.jpeg'),
(9789875802667,'public/imgs/Books/9789875802667/0.jpeg'),
(9789915667027,'public/imgs/Books/9789915667027/0.jpeg'),
(9789974312463,'public/imgs/Books/9789974312463/0.jpeg'),
(9789974729889,'public/imgs/Books/9789974729889/0.jpeg');


INSERT INTO `escriben`
VALUES (9780007270064,1),
(9781788702614,2),
(9781911600343,2),
(9788448025373,3),
(9781565119383,4),
(9781471162350,5),
(9780571269365,6),
(9788499983196,7),
(9788415089070,8),
(9788427041752,9),
(9788427042629,9),
(9788427043916,9),
(9788418949333,10),
(9789504956860,11),
(9789974312463,12),
(9789875802667,13),
(9788408062646,14),
(9788420451916,15),
(9789915667027,16),
(9789974729889,17),
(9780399565212,18),
(9788466631792,18),
(9783734161179,19),
(9788416889716,20),
(9780307796080,21),
(9780307795960,22),
(9780450032202,23),
(9780450057694,23),
(9783453435773,23),
(9783741619991,23),
(9781797123431,24),
(9782811206772,25),
(9781470821647,26),
(9780395647387,27),
(9781501257186,28),
(9788466343756,28),
(9781780899602,29),
(9781974732500,30),
(9780137035151,31),
(9789571077154,32),
(9781789098907,33),
(9780192815989,34),
(9780582541542,35),
(9782820507082,36),
(9780356514215,37),
(9788416387588,38),
(9788445011980,39),
(9781789090413,40),
(9781692101619,41),
(9788434873612,42),
(9781524796297,43),
(9783839849958,45);

-- User crate zone
CREATE USER 'Coral'@'localhost' IDENTIFIED BY 'd724a567490114d353f8bbaf451f151001b9911d97c7af273354cea45a8753e6883c685bba9c0391e7838178f5f1eb45c3dc4cbfc9571febf0aab698c4d0ec20';
GRANT ALL PRIVILEGES ON *.* TO 'Coral'@'localhost';

CREATE USER 'usuariobackup'@'localhost' IDENTIFIED BY 'f5fa8480b5b9fd7d3034ee03be13129c965d5aec';
GRANT SELECT,SHOW DATABASES,LOCK TABLES ON *.* TO 'usuariobackup'@'localhost';




DELIMITER **
CREATE PROCEDURE infoStock() BEGIN
SELECT libros.ISBN,
       libros.Titulo,
       libros.Stock
FROM libros
WHERE libros.Stock < 30
ORDER BY libros.Stock,libros.titulo;
END **


DELIMITER **
CREATE PROCEDURE seach(in Ter varchar(255)) BEGIN
SELECT libros.*
FROM libros
join libros_categorias on libros.ISBN = libros_categorias.ISBN
join escriben on libros.ISBN = escriben.ISBN
join autores on escriben.ID_Autor = autores.ID
where (libros.Titulo like Ter
       or libros_categorias.Categoria like Ter
       or autores.nombre like Ter)
  and libros.stock > 0
group by libros.ISBN ; END **

INSERT INTO `compras` VALUES (1,1,'Recibido','2022-11-11 00:19:00','Debito',942732.28),(2,2,'Recibido','2022-11-11 00:19:00','Debito',695280.55),(3,3,'Recibido','2022-11-11 00:19:00','Debito',1159650.00),(4,4,'Recibido','2022-11-11 00:19:00','Debito',44421.62),(5,5,'Recibido','2022-11-11 00:19:00','Debito',461345.20),(6,6,'Recibido','2022-11-11 00:19:00','Debito',894539.43),(7,7,'Recibido','2022-11-11 00:19:00','Debito',167713.00),(8,8,'Recibido','2022-11-11 00:19:00','Debito',824899.50),(9,9,'Recibido','2022-11-11 00:19:00','Debito',257400.00),(10,10,'Recibido','2022-11-11 00:19:00','Debito',537328.35),(11,11,'Recibido','2022-11-11 00:19:00','Debito',378385.02),(12,12,'Recibido','2022-11-11 00:19:00','Debito',441664.65),(13,13,'Recibido','2022-11-11 00:19:00','Debito',398223.13),(14,14,'Recibido','2022-11-11 00:19:00','Debito',276275.88),(15,15,'Recibido','2022-11-11 00:19:00','Debito',157942.80),(16,16,'Recibido','2022-11-11 00:19:00','Debito',396225.00),(17,18,'Recibido','2022-11-11 00:19:00','Debito',1121400.00),(18,19,'Recibido','2022-11-11 00:19:00','Debito',390960.00),(19,20,'Recibido','2022-11-11 00:19:00','Debito',1631531.70),(20,21,'Recibido','2022-11-11 00:19:00','Debito',221400.00),(21,22,'Recibido','2022-11-11 00:19:00','Debito',235224.00),(22,23,'Recibido','2022-11-11 00:19:00','Debito',382968.00),(23,24,'Recibido','2022-11-11 00:19:00','Debito',242055.00),(24,25,'Recibido','2022-11-11 00:19:00','Debito',31257.00),(25,26,'Recibido','2022-11-11 00:19:00','Debito',86850.00),(26,27,'Recibido','2022-11-11 00:19:00','Debito',129780.00),(27,28,'Recibido','2022-11-11 00:19:00','Debito',120600.00),(28,29,'Recibido','2022-11-11 00:19:00','Debito',8541.00),(29,30,'Recibido','2022-11-11 00:19:00','Debito',769500.00),(30,31,'Recibido','2022-11-11 00:19:00','Debito',305685.00),(31,32,'Recibido','2022-11-11 00:19:00','Debito',484200.00),(32,33,'Recibido','2022-11-11 00:19:00','Debito',241650.00),(33,34,'Recibido','2022-11-11 00:19:00','Debito',589662.00),(34,35,'Recibido','2022-11-11 00:19:00','Debito',386640.00),(35,36,'Recibido','2022-11-11 00:19:00','Debito',322245.00),(36,37,'Recibido','2022-11-11 00:19:00','Debito',1300050.00);
INSERT INTO `compras_detalle` VALUES (1,9788448025373,1980.53,476),(2,9781788702614,809.99,383),(2,9781911600343,1125.89,342),(3,9781471162350,1350.00,859),(4,9780571269365,765.89,58),(5,9780007270064,810.80,569),(6,9788427041752,405.04,257),(6,9788427042629,450.80,455),(6,9788427043916,405.60,819),(6,9788499983196,405.03,625),(7,9788418949333,630.50,266),(8,9780399565212,900.00,74),(8,9789504956860,1239.30,75),(8,9789875802667,450.00,36),(8,9789974729889,828.00,784),(9,9789974312463,900.00,286),(10,9788408062646,810.45,663),(11,9788420451916,558.09,678),(12,9789915667027,765.45,577),(13,9788466631792,405.11,983),(14,9788415089070,281.34,982),(15,9780307795960,666.00,196),(15,9780307796080,387.00,29),(15,9788416889716,599.40,27),(16,9783734161179,675.00,587),(17,9781797123431,1350.00,424),(17,9783453435773,900.00,610),(18,9782811206772,1080.00,362),(19,9781470821647,1710.00,864),(19,9781789098907,710.10,217),(20,9780395647387,1800.00,123),(21,9781501257186,1188.00,198),(22,9781780899602,648.00,591),(23,9781974732500,495.00,489),(24,9780137035151,207.00,151),(25,9789571077154,450.00,193),(26,9780450032202,315.00,412),(27,9780192815989,450.00,268),(28,9780582541542,657.00,8),(29,9782820507082,810.00,950),(30,9780356514215,1350.00,159),(30,9788445011980,765.00,119),(31,9788416387588,900.00,538),(32,9781789090413,450.00,277),(32,9788466343756,450.00,260),(33,9781692101619,405.00,734),(33,9783741619991,288.00,434),(33,9788434873612,225.00,744),(34,9780450057694,540.00,536),(34,9781524796297,900.00,108),(35,9781565119383,495.00,651),(36,9783839849958,1350.00,963);
