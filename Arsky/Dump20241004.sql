-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: ARSKY
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.22.04.1

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
-- Table structure for table `Asiento`
--

DROP TABLE IF EXISTS `Asiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Asiento` (
  `ID` varchar(45) NOT NULL,
  `Asiento_Clase` int DEFAULT NULL,
  `Avion` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Asiento_Clase` (`Asiento_Clase`),
  KEY `Avion` (`Avion`),
  CONSTRAINT `Asiento_ibfk_1` FOREIGN KEY (`Asiento_Clase`) REFERENCES `Clase` (`ID`),
  CONSTRAINT `Asiento_ibfk_2` FOREIGN KEY (`Avion`) REFERENCES `Aviones` (`Matrícula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Asiento`
--

LOCK TABLES `Asiento` WRITE;
/*!40000 ALTER TABLE `Asiento` DISABLE KEYS */;
INSERT INTO `Asiento` VALUES ('A1',1,'354241'),('A2',1,'354241'),('A3',1,'354241'),('B1',1,'354241'),('B2',1,'354241'),('B3',1,'354241'),('C1',1,'354241'),('C2',1,'354241'),('C3',1,'354241'),('D1',1,'354241'),('D2',1,'354241'),('D3',1,'354241');
/*!40000 ALTER TABLE `Asiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Aviones`
--

DROP TABLE IF EXISTS `Aviones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Aviones` (
  `Matrícula` varchar(6) NOT NULL,
  `Modelo` varchar(45) DEFAULT NULL,
  `Asientos_Primera` int DEFAULT NULL,
  `Asientos_Bussiness` int DEFAULT NULL,
  `Asientos_Economica` int DEFAULT NULL,
  PRIMARY KEY (`Matrícula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aviones`
--

LOCK TABLES `Aviones` WRITE;
/*!40000 ALTER TABLE `Aviones` DISABLE KEYS */;
INSERT INTO `Aviones` VALUES ('354241','Airborne 1',20,10,100),('625342','Airborne 3',0,40,100),('984758','Airborne 2',10,20,100);
/*!40000 ALTER TABLE `Aviones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Boleto`
--

DROP TABLE IF EXISTS `Boleto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Boleto` (
  `ID` int NOT NULL,
  `Precio` int DEFAULT NULL,
  `Vuelo_ID` int DEFAULT NULL,
  `Compra_ID` int DEFAULT NULL,
  `Asiento_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Vuelo_ID` (`Vuelo_ID`),
  KEY `Compra_ID` (`Compra_ID`),
  KEY `Asiento_ID` (`Asiento_ID`),
  CONSTRAINT `Boleto_ibfk_1` FOREIGN KEY (`Vuelo_ID`) REFERENCES `Vuelo` (`ID`),
  CONSTRAINT `Boleto_ibfk_3` FOREIGN KEY (`Compra_ID`) REFERENCES `Compra` (`ID`),
  CONSTRAINT `Boleto_ibfk_4` FOREIGN KEY (`Asiento_ID`) REFERENCES `Asiento` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Boleto`
--

LOCK TABLES `Boleto` WRITE;
/*!40000 ALTER TABLE `Boleto` DISABLE KEYS */;
INSERT INTO `Boleto` VALUES (1,150000,1,1,'A1');
/*!40000 ALTER TABLE `Boleto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Clase`
--

DROP TABLE IF EXISTS `Clase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Clase` (
  `ID` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clase`
--

LOCK TABLES `Clase` WRITE;
/*!40000 ALTER TABLE `Clase` DISABLE KEYS */;
INSERT INTO `Clase` VALUES (1,'Económica'),(2,'Primera'),(3,'Bussiness');
/*!40000 ALTER TABLE `Clase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cliente` (
  `DNI` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Apellido` varchar(45) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Contrasenia` text,
  PRIMARY KEY (`DNI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` VALUES (2,'Pepito','ui',456,NULL,'2024-09-11','clave'),(678,'Pepito','fefwfwf',8766,NULL,'2024-09-03','$2y$10$V4XvRsuTbewhkdyuFw54pubmCHW6dbg6mueI0W0uMnMXPIAIqIyXi'),(987,'messian','oiuábo',234,'info@gmail.com','2024-09-11','$2y$10$i36tgqRoudyx5MGp/fP2BO8HvMRf1Ux21ILiGVxz4eabwPQPjzoYO'),(12345678,'Juan Cruz','Melgarejo',45,NULL,'2024-09-20','clave'),(22222222,'Magali','Cristobo',32323,NULL,'2003-04-28','$2y$10$sM.9DrDEIwr8YsJUebr9AeLoPIs0JjyveXeAuMc2ep6TYuGquaIie');
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Compra`
--

DROP TABLE IF EXISTS `Compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Compra` (
  `ID` int NOT NULL,
  `Cantidad_Cuotas` int DEFAULT NULL,
  `Fecha` datetime DEFAULT NULL,
  `MetodoPago` int DEFAULT NULL,
  `Cliente_ID` int DEFAULT NULL,
  `Tarjeta` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `MetodoPago` (`MetodoPago`),
  KEY `Cliente_ID` (`Cliente_ID`),
  KEY `Tarjeta` (`Tarjeta`),
  CONSTRAINT `Compra_ibfk_1` FOREIGN KEY (`MetodoPago`) REFERENCES `MetodoPago` (`ID`),
  CONSTRAINT `Compra_ibfk_2` FOREIGN KEY (`Cliente_ID`) REFERENCES `Cliente` (`DNI`),
  CONSTRAINT `Compra_ibfk_3` FOREIGN KEY (`Tarjeta`) REFERENCES `Tarjeta` (`Numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Compra`
--

LOCK TABLES `Compra` WRITE;
/*!40000 ALTER TABLE `Compra` DISABLE KEYS */;
INSERT INTO `Compra` VALUES (1,6,'2024-10-04 00:00:00',1,22222222,144);
/*!40000 ALTER TABLE `Compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `MetodoPago`
--

DROP TABLE IF EXISTS `MetodoPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `MetodoPago` (
  `ID` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `MetodoPago`
--

LOCK TABLES `MetodoPago` WRITE;
/*!40000 ALTER TABLE `MetodoPago` DISABLE KEYS */;
INSERT INTO `MetodoPago` VALUES (1,'Tarjeta'),(2,'Efectivo'),(3,'Transferencia');
/*!40000 ALTER TABLE `MetodoPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sede`
--

DROP TABLE IF EXISTS `Sede`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Sede` (
  `ID` int NOT NULL,
  `Provincia` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sede`
--

LOCK TABLES `Sede` WRITE;
/*!40000 ALTER TABLE `Sede` DISABLE KEYS */;
INSERT INTO `Sede` VALUES (1,'Buenos Aires'),(2,'CABA'),(3,'Córdoba'),(4,'Santa Fe'),(5,'Mendoza'),(6,'Tucumán'),(7,'Salta'),(8,'Neuquén'),(9,'Chaco'),(10,'Santiago del Estero'),(11,'Corrientes'),(12,'Entre Ríos'),(13,'Catamarca'),(14,'La Rioja'),(15,'San Juan'),(16,'San Luis'),(17,'Formosa'),(18,'Jujuy'),(19,'Río Negro'),(20,'Chubut'),(21,'Santa Cruz'),(22,'Tierra del Fuego'),(23,'Misiones'),(24,'Salta');
/*!40000 ALTER TABLE `Sede` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tarjeta`
--

DROP TABLE IF EXISTS `Tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tarjeta` (
  `Numero` int NOT NULL,
  `Num_Seguridad` int DEFAULT NULL,
  `Fecha_Cad` date DEFAULT NULL,
  `Cliente_DNI` int DEFAULT NULL,
  `Tipo` int DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Cliente_DNI` (`Cliente_DNI`),
  KEY `Tipo` (`Tipo`),
  CONSTRAINT `Tarjeta_ibfk_1` FOREIGN KEY (`Cliente_DNI`) REFERENCES `Cliente` (`DNI`),
  CONSTRAINT `Tarjeta_ibfk_2` FOREIGN KEY (`Tipo`) REFERENCES `Tipo_Tarjeta` (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tarjeta`
--

LOCK TABLES `Tarjeta` WRITE;
/*!40000 ALTER TABLE `Tarjeta` DISABLE KEYS */;
INSERT INTO `Tarjeta` VALUES (123,986,'2027-09-01',2,1),(133,4655,'2028-02-20',987,4),(144,435,'2026-03-27',22222222,2);
/*!40000 ALTER TABLE `Tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tipo_Tarjeta`
--

DROP TABLE IF EXISTS `Tipo_Tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Tipo_Tarjeta` (
  `Codigo` int NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tipo_Tarjeta`
--

LOCK TABLES `Tipo_Tarjeta` WRITE;
/*!40000 ALTER TABLE `Tipo_Tarjeta` DISABLE KEYS */;
INSERT INTO `Tipo_Tarjeta` VALUES (1,'Visa'),(2,'Mastercard'),(3,'American Express'),(4,'Mercado Pago');
/*!40000 ALTER TABLE `Tipo_Tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Vuelo`
--

DROP TABLE IF EXISTS `Vuelo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Vuelo` (
  `ID` int NOT NULL,
  `Origen` int DEFAULT NULL,
  `Destino` int DEFAULT NULL,
  `Fecha_Salida` datetime DEFAULT NULL,
  `Fecha_Llegada` datetime DEFAULT NULL,
  `Avion` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Origen` (`Origen`),
  KEY `Destino` (`Destino`),
  KEY `Avion` (`Avion`),
  CONSTRAINT `Vuelo_ibfk_1` FOREIGN KEY (`Origen`) REFERENCES `Sede` (`ID`),
  CONSTRAINT `Vuelo_ibfk_2` FOREIGN KEY (`Destino`) REFERENCES `Sede` (`ID`),
  CONSTRAINT `Vuelo_ibfk_3` FOREIGN KEY (`Avion`) REFERENCES `Aviones` (`Matrícula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Vuelo`
--

LOCK TABLES `Vuelo` WRITE;
/*!40000 ALTER TABLE `Vuelo` DISABLE KEYS */;
INSERT INTO `Vuelo` VALUES (1,1,22,'2024-11-20 00:00:00','2024-11-30 00:00:00','354241');
/*!40000 ALTER TABLE `Vuelo` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-04 15:20:56
