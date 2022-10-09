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
  `Direccion` varchar(255) NOT NULL,
  `Numero` int NOT NULL,
  `Calle` varchar(255) NOT NULL,
  `Ciudad` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(255) NOT NULL,
  `Rol` enum('Cliente','Empleado','Administrador') NOT NULL,
  PRIMARY KEY (`Email`)
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

-- Dump completed on 2022-09-02 23:00:36
