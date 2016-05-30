-- MySQL dump 10.16  Distrib 10.1.10-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: SAPIENCIA
-- ------------------------------------------------------
-- Server version	10.1.10-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `Usuario` varchar(15) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `Num_Cuenta` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Grupo` int(11) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Num_Cuenta`),
  KEY `Grupo` (`Grupo`),
  CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`Grupo`) REFERENCES `grupo` (`Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (315230190,'Eric Giovanni Miguel Torres',NULL,'BcUJawaSVYrZo');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordinador`
--

DROP TABLE IF EXISTS `coordinador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordinador` (
  `Usuario` varchar(15) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinador`
--

LOCK TABLES `coordinador` WRITE;
/*!40000 ALTER TABLE `coordinador` DISABLE KEYS */;
/*!40000 ALTER TABLE `coordinador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo`
--

DROP TABLE IF EXISTS `grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo` (
  `Grupo` int(11) NOT NULL,
  `Turno` varchar(15) DEFAULT NULL,
  `CCT` char(10) DEFAULT NULL,
  `Cedula` int(11) DEFAULT NULL,
  `Num_Cuenta` int(11) DEFAULT NULL,
  `Clave` char(4) DEFAULT NULL,
  PRIMARY KEY (`Grupo`),
  KEY `CCT` (`CCT`),
  KEY `Cedula` (`Cedula`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  KEY `Clave` (`Clave`),
  CONSTRAINT `grupo_ibfk_1` FOREIGN KEY (`CCT`) REFERENCES `plantel` (`CCT`),
  CONSTRAINT `grupo_ibfk_2` FOREIGN KEY (`Cedula`) REFERENCES `profesor` (`Cedula`),
  CONSTRAINT `grupo_ibfk_3` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`),
  CONSTRAINT `grupo_ibfk_4` FOREIGN KEY (`Clave`) REFERENCES `materia` (`Clave_Mat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo`
--

LOCK TABLES `grupo` WRITE;
/*!40000 ALTER TABLE `grupo` DISABLE KEYS */;
INSERT INTO `grupo` VALUES (512,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `Clave_Mat` char(4) NOT NULL,
  `Nom_Materia` varchar(45) DEFAULT NULL,
  `Cedula` int(11) DEFAULT NULL,
  PRIMARY KEY (`Clave_Mat`),
  KEY `Cedula` (`Cedula`),
  CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `profesor` (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plantel`
--

DROP TABLE IF EXISTS `plantel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plantel` (
  `CCT` char(10) NOT NULL,
  `Cedula` int(11) DEFAULT NULL,
  `Num_Cuenta` int(11) DEFAULT NULL,
  `Grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`CCT`),
  KEY `Cedula` (`Cedula`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  KEY `Grupo` (`Grupo`),
  CONSTRAINT `plantel_ibfk_1` FOREIGN KEY (`Cedula`) REFERENCES `profesor` (`Cedula`),
  CONSTRAINT `plantel_ibfk_2` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`),
  CONSTRAINT `plantel_ibfk_3` FOREIGN KEY (`Grupo`) REFERENCES `grupo` (`Grupo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plantel`
--

LOCK TABLES `plantel` WRITE;
/*!40000 ALTER TABLE `plantel` DISABLE KEYS */;
/*!40000 ALTER TABLE `plantel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pregunta`
--

DROP TABLE IF EXISTS `pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pregunta` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pregunta` varchar(150) DEFAULT NULL,
  `RA` varchar(50) DEFAULT NULL,
  `IRA` int(11) DEFAULT NULL,
  `RB` varchar(50) DEFAULT NULL,
  `IRB` int(11) DEFAULT NULL,
  `RC` varchar(50) DEFAULT NULL,
  `IRC` int(11) DEFAULT NULL,
  `RD` varchar(50) DEFAULT NULL,
  `IRD` int(11) DEFAULT NULL,
  `Clave_Mat` char(4) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Clave_Mat` (`Clave_Mat`),
  CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`Clave_Mat`) REFERENCES `materia` (`Clave_Mat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pregunta`
--

LOCK TABLES `pregunta` WRITE;
/*!40000 ALTER TABLE `pregunta` DISABLE KEYS */;
/*!40000 ALTER TABLE `pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor`
--

DROP TABLE IF EXISTS `profesor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profesor` (
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(60) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Clave` char(4) DEFAULT NULL,
  `IDpunt` int(11) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Cedula`),
  KEY `Clave` (`Clave`),
  KEY `IDpunt` (`IDpunt`),
  CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`Clave`) REFERENCES `materia` (`Clave_Mat`),
  CONSTRAINT `profesor_ibfk_2` FOREIGN KEY (`IDpunt`) REFERENCES `puntaje` (`IDPunt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor`
--

LOCK TABLES `profesor` WRITE;
/*!40000 ALTER TABLE `profesor` DISABLE KEYS */;
/*!40000 ALTER TABLE `profesor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntaje`
--

DROP TABLE IF EXISTS `puntaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntaje` (
  `IDPunt` int(11) NOT NULL AUTO_INCREMENT,
  `Puntajes` int(11) DEFAULT NULL,
  `Num_Cuenta` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDPunt`),
  KEY `Num_Cuenta` (`Num_Cuenta`),
  CONSTRAINT `puntaje_ibfk_1` FOREIGN KEY (`Num_Cuenta`) REFERENCES `alumno` (`Num_Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntaje`
--

LOCK TABLES `puntaje` WRITE;
/*!40000 ALTER TABLE `puntaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntaje` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-30 16:27:27
