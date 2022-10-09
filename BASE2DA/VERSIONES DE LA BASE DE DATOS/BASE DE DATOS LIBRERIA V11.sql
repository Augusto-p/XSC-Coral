-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: libreria
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `autores`
--
DROP DATABASE if EXISTS `mimundo`;
CREATE DATABASE mimundo;
USE mimundo;
DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `id_autor` int NOT NULL AUTO_INCREMENT,
  `nom_autor` varchar(255) NOT NULL,
  `nac_autor` varchar(255) NOT NULL,
  `bio_autor` varchar(500) NOT NULL,
  `fecdenac_autor` date NOT NULL,
  `foto_autor` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `emailusr` varchar(255) NOT NULL,
  `isbn_lib` bigint NOT NULL,
  `fechor_car` datetime NOT NULL,
  PRIMARY KEY (`emailusr`,`isbn_lib`),
  KEY `isbncarrito_idx` (`isbn_lib`),
  CONSTRAINT `emailcarrito` FOREIGN KEY (`emailusr`) REFERENCES `usuarios` (`usr_email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbncarrito` FOREIGN KEY (`isbn_lib`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito`
--

LOCK TABLES `carrito` WRITE;
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `id_comp` int NOT NULL AUTO_INCREMENT,
  `id_edit` int NOT NULL,
  `est_comp` enum('En Espera','Recibido') NOT NULL,
  `fechor_comp` datetime NOT NULL,
  `metpago_comp` varchar(255) NOT NULL,
  PRIMARY KEY (`id_comp`,`id_edit`),
  KEY `compraEditorial_idx` (`id_edit`),
  CONSTRAINT `compraEditorial` FOREIGN KEY (`id_edit`) REFERENCES `editoriales` (`id_ed`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_detalle`
--

DROP TABLE IF EXISTS `compras_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras_detalle` (
  `id_compra` int NOT NULL,
  `isbn_libr` bigint NOT NULL,
  `prec_comp` decimal(10,2) unsigned NOT NULL,
  `cant_comp` int unsigned NOT NULL,
  PRIMARY KEY (`id_compra`,`isbn_libr`),
  KEY `isbnComprasdetalle_idx` (`isbn_libr`),
  CONSTRAINT `idcompraDetalle` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_comp`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbnComprasdetalle` FOREIGN KEY (`isbn_libr`) REFERENCES `libros` (`isbn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_detalle`
--

LOCK TABLES `compras_detalle` WRITE;
/*!40000 ALTER TABLE `compras_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_detalle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `editoriales`
--

DROP TABLE IF EXISTS `editoriales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `editoriales` (
  `id_ed` int NOT NULL AUTO_INCREMENT,
  `nom_ed` varchar(255) NOT NULL,
  `web_ed` varchar(255) NOT NULL,
  `logo_ed` varchar(255) DEFAULT NULL,
  `dir_ed` varchar(255) NOT NULL,
  `tel_ed` varchar(15) NOT NULL,
  `email_ed` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoriales`
--

LOCK TABLES `editoriales` WRITE;
/*!40000 ALTER TABLE `editoriales` DISABLE KEYS */;
/*!40000 ALTER TABLE `editoriales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escriben`
--

DROP TABLE IF EXISTS `escriben`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escriben` (
  `isbn_li` bigint NOT NULL,
  `aut_id` int NOT NULL,
  PRIMARY KEY (`isbn_li`,`aut_id`),
  KEY `escribenautor_idx` (`aut_id`),
  CONSTRAINT `escribenAutor` FOREIGN KEY (`aut_id`) REFERENCES `autores` (`id_autor`),
  CONSTRAINT `escribenIsbn` FOREIGN KEY (`isbn_li`) REFERENCES `libros` (`isbn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escriben`
--

LOCK TABLES `escriben` WRITE;
/*!40000 ALTER TABLE `escriben` DISABLE KEYS */;
/*!40000 ALTER TABLE `escriben` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros` (
  `isbn` bigint NOT NULL,
  `lib_tit` varchar(255) NOT NULL,
  `prec_lib` decimal(10,2) unsigned NOT NULL,
  `sino_lib` varchar(255) NOT NULL,
  `idedit` int DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `ideditorial_idx` (`idedit`),
  CONSTRAINT `ideditorial` FOREIGN KEY (`idedit`) REFERENCES `editoriales` (`id_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_categorias`
--

DROP TABLE IF EXISTS `libros_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros_categorias` (
  `isbn_cat` bigint NOT NULL,
  `cat` varchar(255) NOT NULL,
  PRIMARY KEY (`isbn_cat`,`cat`),
  CONSTRAINT `categorias` FOREIGN KEY (`isbn_cat`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_categorias`
--

LOCK TABLES `libros_categorias` WRITE;
/*!40000 ALTER TABLE `libros_categorias` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_imgs`
--

DROP TABLE IF EXISTS `libros_imgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros_imgs` (
  `isbn_img` bigint NOT NULL,
  `img_lib` varchar(255) NOT NULL,
  PRIMARY KEY (`isbn_img`,`img_lib`),
  CONSTRAINT `imgisbn` FOREIGN KEY (`isbn_img`) REFERENCES `libros` (`isbn`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_imgs`
--

LOCK TABLES `libros_imgs` WRITE;
/*!40000 ALTER TABLE `libros_imgs` DISABLE KEYS */;
/*!40000 ALTER TABLE `libros_imgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `id_vent` int NOT NULL AUTO_INCREMENT,
  `desc_vent` varchar(255) NOT NULL,
  `sist_env` varchar(255) NOT NULL,
  PRIMARY KEY (`id_vent`),
  CONSTRAINT `IDVentaPedido` FOREIGN KEY (`id_vent`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `usr_nom` varchar(255) NOT NULL,
  `usr_email` varchar(255) NOT NULL,
  `usr_tokpass` varchar(45) DEFAULT NULL,
  `usr_tokfec` date DEFAULT NULL,
  `usr_fecnac` date NOT NULL,
  `usr_gen` varchar(255) NOT NULL,
  `usr_dep` varchar(255) NOT NULL,
  `usr_num` int NOT NULL,
  `usr_cal` varchar(255) NOT NULL,
  `usr_ciu` varchar(255) NOT NULL,
  `usr_pass` varchar(255) NOT NULL,
  `usr_img` varchar(255) NOT NULL,
  `usr_rol` enum('Cliente','Empleado','Administrador') NOT NULL,
  PRIMARY KEY (`usr_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id_venta` int NOT NULL AUTO_INCREMENT,
  `email_usr` varchar(255) NOT NULL,
  `vent_est` enum('Enviado','Entregado','Procesando') NOT NULL,
  `metpag_vent` enum('Debito','Credito') NOT NULL,
  `fechor_vent` datetime NOT NULL,
  PRIMARY KEY (`id_venta`,`email_usr`),
  KEY `ventasEmail_idx` (`email_usr`),
  CONSTRAINT `ventasEmail` FOREIGN KEY (`email_usr`) REFERENCES `usuarios` (`usr_email`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_detalle`
--

DROP TABLE IF EXISTS `ventas_detalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_detalle` (
  `identa` int NOT NULL,
  `ventisbn` bigint NOT NULL,
  `cant_vent` int unsigned NOT NULL,
  `prec_vent` decimal(10,2) unsigned NOT NULL,
  `descuento` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`identa`,`ventisbn`),
  KEY `isbnVentadetalle_idx` (`ventisbn`),
  CONSTRAINT `IDVentaDetalle` FOREIGN KEY (`identa`) REFERENCES `ventas` (`id_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbnVentadetalle` FOREIGN KEY (`ventisbn`) REFERENCES `libros` (`isbn`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_detalle`
--

LOCK TABLES `ventas_detalle` WRITE;
/*!40000 ALTER TABLE `ventas_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_detalle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-02 23:00:36
INSERT INTO `autores` VALUES (1,'Adrian Newey','Reino Unido','Adrian Newey es el diseñador de automóviles más laureado de la historia de la Fórmula 1. Ha diseñado 14 coches campeones del mundo, 4 de ellos con el equipo Red Bull Racing, y ha sido galardonado con el Premio de Diseño de la FIA en cuatro ocasiones. En 2019 recibió el Premio Príncipe de Asturias de los Deportes.','1958-12-26','public/imgs/Autores/1.jpg'),(3,'Ayrton Senna','Brasil','Ayrton Senna da Silva fue un piloto de automovilismo de velocidad brasileño. Siendo tres veces campeón del mundo de Fórmula 1, Senna figura entre los más exitosos y dominantes pilotos de la era moderna y para muchos expertos, es el más rápido de la historia.','1960-03-21','public/imgs/Autores/3.jpg');
INSERT INTO `editoriales` VALUES (1,'Libros Cúpula','https://www.planetadelibros.com/editorial/libros-cupula/18','public/imgs/Editoriales/1.jpg','Av. Diagonal, 662-664 08034 Barcelona','+3434934928','libroscupula@planetadelibros.com');
INSERT INTO `libros` VALUES (1,'un gran libro 1',1200.00,'public/texts/BookSipnosis/9788448025373.txt',1),(2,'un gran libro 2',122.00,'public/texts/BookSipnosis/9788448025373.txt',1),(3,'un gran libro 3',1221.00,'public/texts/BookSipnosis/9788448025373.txt',1),(4,'un gran libro 4',1234.00,'public/texts/BookSipnosis/9788448025373.txt',1),(9788448025373,'Cómo construir un coche',2044.00,'public/texts/BookSipnosis/9788448025373.txt',1);

INSERT INTO `usuarios` VALUES ('Augusto Picardo','auguselo77@gmail.com','','2022-09-04','2004-04-22','Bot','Canelones',69,'13','las vegas','$2y$10$H05XZPwgvrhgioj4TV.gQOpWYZmOO2XsoZw6tH5L2/BLNewAsxYRu','public/imgs/Users/auguselo77@gmail.com.jpg','Cliente');
INSERT INTO `compras` VALUES (1,1,'Recibido','2021-12-01 20:01:00','Debito');
INSERT INTO `compras_detalle` VALUES (1,1,10.00,50),(1,2,15.00,100),(1,3,20.00,120),(1,4,10.00,123);
INSERT INTO `escriben` VALUES (2,1),(4,1),(9788448025373,1),(1,3),(3,3),(9788448025373,3);
INSERT INTO `libros_categorias` VALUES (1,'Fantasia'),(1,'no es real'),(2,'Fantasia'),(3,'Fantasia'),(4,'Accion'),(9788448025373,'Deportes'),(9788448025373,'Hobbies');
INSERT INTO `libros_imgs` VALUES (1,'public/imgs/Books/9788448025373/1.jpg'),(1,'public/imgs/Books/9788448025373/2.jpg'),(2,'public/imgs/Books/9788448025373/3.jpg'),(2,'public/imgs/Books/9788448025373/4.jpg'),(3,'public/imgs/Books/9788448025373/5.jpg'),(3,'public/imgs/Books/97884480273/4.jpg'),(4,'public/imgs/Books/97884480253/0.jpg'),(4,'public/imgs/Books/978844802573/0.jpg'),(4,'public/imgs/Books/97888025373/0.jpg'),(9788448025373,'public/imgs/Books/9788448025373/0.jpg');
INSERT INTO `ventas` VALUES (1,'auguselo77@gmail.com','Enviado','Debito','2022-04-01 13:01:01'),(2,'auguselo77@gmail.com','Enviado','Debito','2022-04-01 13:01:01'),(3,'auguselo77@gmail.com','Enviado','Debito','2022-04-01 13:01:01'),(4,'auguselo77@gmail.com','Enviado','Debito','2022-04-01 13:01:01');
INSERT INTO `pedidos` VALUES (1,'desc','DAC'),(2,'desc','DAC'),(3,'desc','Correo'),(4,'desc','Correo');
INSERT INTO `ventas_detalle` VALUES (1,1,5,1200.00,0.00),(2,1,5,1200.00,0.00),(3,1,5,1200.00,0.00),(4,1,5,1200.00,0.00);