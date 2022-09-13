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

DROP TABLE IF EXISTS `autores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `autores` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Nacionalidad` varchar(255) NOT NULL,
  `Biografia` varchar(500) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autores`
--

LOCK TABLES `autores` WRITE;
/*!40000 ALTER TABLE `autores` DISABLE KEYS */;
INSERT INTO `autores` VALUES (1,'Ayrton Senna','Brasil','Ayrton Senna da Silva fue un piloto de automovilismo de velocidad brasileño. Siendo tres veces campeón del mundo de Fórmula 1, Senna figura entre los más exitosos y dominantes pilotos de la era moderna y para muchos expertos, es el más rápido de la historia.​ ','1960-03-21','public/imgs/Autores/1.jpg'),(2,'Adrian Newey','Reino Unido','Adrian Newey, OBE es el director técnico del equipo Red Bull Racing de Fórmula 1.​Ha trabajado tanto en Fórmula 1 como en Fórmula Indy como ingeniero de carrera, ingeniero de aerodinámica, diseñador y director técnico, habiendo logrado éxitos en ambas categorías.','1958-12-26','public/imgs/Autores/2.jpg'),(6,'Ross Brawn','Reino Unido','Ross James Brawn es un ingeniero de automovilismo británico. Ha trabajado con varios equipos de Fórmula 1. Hasta 2013 fue el máximo responsable del equipo Mercedes AMG F1, en 2014 fue sustituido por Toto Wolff.','1954-11-23','public/imgs/Autores/6.jpeg');
/*!40000 ALTER TABLE `autores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito`
--

DROP TABLE IF EXISTS `carrito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `carrito` (
  `Email` varchar(255) NOT NULL,
  `ISBN` bigint NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`Email`,`ISBN`),
  KEY `isbncarrito_idx` (`ISBN`),
  CONSTRAINT `emailcarrito` FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbncarrito` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `ID` int NOT NULL AUTO_INCREMENT,
  `ID_Editorial` int NOT NULL,
  `Estado` enum('En Espera','Recibido') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Metodo_Pago` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`,`ID_Editorial`),
  KEY `compraEditorial_idx` (`ID_Editorial`),
  CONSTRAINT `compraEditorial` FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`) ON UPDATE CASCADE
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
  `ID_Compra` int NOT NULL,
  `ISBN` bigint NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Cantidad` int unsigned NOT NULL,
  PRIMARY KEY (`ID_Compra`,`ISBN`),
  KEY `isbnComprasdetalle_idx` (`ISBN`),
  CONSTRAINT `idcompraDetalle` FOREIGN KEY (`ID_Compra`) REFERENCES `compras` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbnComprasdetalle` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE
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
  `ID` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `Web` varchar(255) NOT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Email` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `editoriales`
--

LOCK TABLES `editoriales` WRITE;
/*!40000 ALTER TABLE `editoriales` DISABLE KEYS */;
INSERT INTO `editoriales` VALUES (1,'Libros Cupula','www.planetadelibros.com/editorial-libros-cupula-18.html','public/imgs/Editoriales/1.png','Av. Diagonal, 662-664. 08034 Barcelona.','+34934928000','libroscupula@planetadelibros.com'),(3,'Grupo Planeta','www.planeta.es',NULL,'Juan Ignacio Luca de Tena, nº 17 28027 Madrid','+34934928000','info@planeta.es'),(4,'Grupo Planeta','www.planeta.es','public/imgs/Editoriales/4.png','Juan Ignacio Luca de Tena, nº 17 28027 Madrid','+34934928000','info@planeta.es');
/*!40000 ALTER TABLE `editoriales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `escriben`
--

DROP TABLE IF EXISTS `escriben`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `escriben` (
  `ISBN` bigint NOT NULL,
  `ID_Autor` int NOT NULL,
  PRIMARY KEY (`ISBN`,`ID_Autor`),
  KEY `escribenautor_idx` (`ID_Autor`),
  CONSTRAINT `escribenAutor` FOREIGN KEY (`ID_Autor`) REFERENCES `autores` (`ID`),
  CONSTRAINT `escribenIsbn` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `escriben`
--

LOCK TABLES `escriben` WRITE;
/*!40000 ALTER TABLE `escriben` DISABLE KEYS */;
INSERT INTO `escriben` VALUES (9781471162350,1),(9788448025373,1),(9788448025373,2),(9781471162350,6);
/*!40000 ALTER TABLE `escriben` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros`
--

DROP TABLE IF EXISTS `libros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros` (
  `ISBN` bigint NOT NULL,
  `Titulo` varchar(255) NOT NULL,
  `Precio` decimal(10,2) unsigned NOT NULL,
  `Sinopsis` varchar(255) NOT NULL,
  `ID_Editorial` int DEFAULT NULL,
  PRIMARY KEY (`ISBN`),
  KEY `ideditorial_idx` (`ID_Editorial`),
  CONSTRAINT `ideditorial` FOREIGN KEY (`ID_Editorial`) REFERENCES `editoriales` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros`
--

LOCK TABLES `libros` WRITE;
/*!40000 ALTER TABLE `libros` DISABLE KEYS */;
INSERT INTO `libros` VALUES (9781471162350,'Total Competition',1999.50,'public/texts/BookSipnosis/9781471162350.txt',1),(9788448025373,'Cómo construir un coche',2000.00,'public/texts/BookSipnosis/9788448025373.txt',1);
/*!40000 ALTER TABLE `libros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_categorias`
--

DROP TABLE IF EXISTS `libros_categorias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros_categorias` (
  `ISBN` bigint NOT NULL,
  `Categoria` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Categoria`),
  CONSTRAINT `categorias` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_categorias`
--

LOCK TABLES `libros_categorias` WRITE;
/*!40000 ALTER TABLE `libros_categorias` DISABLE KEYS */;
INSERT INTO `libros_categorias` VALUES (9781471162350,'Biografia'),(9781471162350,'Deportes'),(9788448025373,'Biografia'),(9788448025373,'Deportes'),(9788448025373,'Hobbies');
/*!40000 ALTER TABLE `libros_categorias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `libros_imgs`
--

DROP TABLE IF EXISTS `libros_imgs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `libros_imgs` (
  `ISBN` bigint NOT NULL,
  `Img` varchar(255) NOT NULL,
  PRIMARY KEY (`ISBN`,`Img`),
  CONSTRAINT `imgisbn` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `libros_imgs`
--

LOCK TABLES `libros_imgs` WRITE;
/*!40000 ALTER TABLE `libros_imgs` DISABLE KEYS */;
INSERT INTO `libros_imgs` VALUES (9781471162350,'public/imgs/Books/9781471162350/0.jpeg'),(9781471162350,'public/imgs/Books/9781471162350/1.jpeg'),(9781471162350,'public/imgs/Books/9781471162350/2.jpeg'),(9788448025373,'public/imgs/Books/9788448025373/0.jpg');
/*!40000 ALTER TABLE `libros_imgs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pedidos` (
  `ID_Venta` int NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(255) NOT NULL,
  `Sistema_Envio` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Venta`),
  CONSTRAINT `IDVentaPedido` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `Nombre` varchar(255) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('Augusto Picardo','auguselo77@gmail.com',NULL,NULL,'2004-04-22','Bot','Canelones',169,'13','las vegas','$2y$10$fiSgjUl6QWEcnYgArr.NruerQPuz90SYy0JlyV7LM9TK6tr0ptWEq','public/imgs/Users/auguselo77@gmail.com.jpg','Administrador',3311),('carlos Ganbino','juan@gmail.com',NULL,NULL,'2004-01-01','Masculino','Durazno',1,'rn12','las vegas','$2y$10$R2FbNqs/TXIqYAeazdfsDOghd586LWEejk6Wzf3sW1H8jXCdusqRi',NULL,'Administrador',1133);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Email` varchar(255) NOT NULL,
  `Estado` enum('Enviado','Entregado','Procesando') NOT NULL,
  `Metodo_Pago` enum('Debito','Credito') NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  PRIMARY KEY (`ID`,`Email`),
  KEY `ventasEmail_idx` (`Email`),
  CONSTRAINT `ventasEmail` FOREIGN KEY (`Email`) REFERENCES `usuarios` (`Email`) ON UPDATE CASCADE
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
  `ID_Venta` int NOT NULL,
  `ISBN` bigint NOT NULL,
  `Cantidad` int unsigned NOT NULL,
  `Costo` decimal(10,2) unsigned NOT NULL,
  `Descuento` decimal(10,2) unsigned NOT NULL,
  PRIMARY KEY (`ID_Venta`,`ISBN`),
  KEY `isbnVentadetalle_idx` (`ISBN`),
  CONSTRAINT `IDVentaDetalle` FOREIGN KEY (`ID_Venta`) REFERENCES `ventas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `isbnVentadetalle` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON UPDATE CASCADE
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

-- Dump completed on 2022-09-12 23:30:20
