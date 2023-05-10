CREATE DATABASE  IF NOT EXISTS `tccflipenem` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tccflipenem`;
-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: tccflipenem
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `areaconhe`
--

DROP TABLE IF EXISTS `areaconhe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `areaconhe` (
  `idArea` int NOT NULL AUTO_INCREMENT,
  `descArea` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areaconhe`
--

LOCK TABLES `areaconhe` WRITE;
/*!40000 ALTER TABLE `areaconhe` DISABLE KEYS */;
INSERT INTO `areaconhe` VALUES (1,'Ciências Humanas e suas Tecnologias'),(2,'Ciências da Natureza e suas Tecnologias'),(3,'Linguagens, Códigos e suas Tecnologias'),(4,'Matemática e suas Tecnologias');
/*!40000 ALTER TABLE `areaconhe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ifccurso`
--

DROP TABLE IF EXISTS `ifccurso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ifccurso` (
  `idcurso` int NOT NULL AUTO_INCREMENT,
  `nomeCurso` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ifccurso`
--

LOCK TABLES `ifccurso` WRITE;
/*!40000 ALTER TABLE `ifccurso` DISABLE KEYS */;
INSERT INTO `ifccurso` VALUES (1,'Licenciatura em Matemática'),(2,'Técnico em Hospedagem Integrado ao Ensino Médio'),(3,'Técnico em Informática Integrado ao Ensino Médio'),(4,'Técnico em Informática para Internet Integrado ao Ensino Médio'),(5,'Tecnologia em Gestão de Turismo'),(6,'Tecnologia em Redes de Computadores');
/*!40000 ALTER TABLE `ifccurso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questao`
--

DROP TABLE IF EXISTS `questao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questao` (
  `idquest` int NOT NULL AUTO_INCREMENT,
  `anoquest` varchar(4) NOT NULL,
  `enunciado` varchar(300) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `fonte` varchar(150) NOT NULL,
  `quest1` varchar(150) NOT NULL,
  `quest2` varchar(150) NOT NULL,
  `quest3` varchar(150) NOT NULL,
  `quest4` varchar(150) NOT NULL,
  `quest5` varchar(150) NOT NULL,
  `observacao` varchar(100) DEFAULT NULL,
  `idarea` int DEFAULT NULL,
  `resultado` int NOT NULL,
  PRIMARY KEY (`idquest`),
  KEY `idarea_idx` (`idarea`),
  CONSTRAINT `idarea` FOREIGN KEY (`idarea`) REFERENCES `areaconhe` (`idArea`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questao`
--

LOCK TABLES `questao` WRITE;
/*!40000 ALTER TABLE `questao` DISABLE KEYS */;
INSERT INTO `questao` VALUES (2,'2008','teste enunciado','Captura de tela 2023-03-01 171316.png','teste fonte','alt1','alt2','alt3','alt4','alt5','teste observacao',1,3),(3,'2009','wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww','','','','','','','','',2,1),(4,'2020','teste teste','','minha cabeça, CONFIA.','23','24','27','12','4','Adicionar foto ',4,5),(5,'','','','','','','','','','',NULL,1);
/*!40000 ALTER TABLE `questao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `respondendo`
--

DROP TABLE IF EXISTS `respondendo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `respondendo` (
  `idresposta` int NOT NULL AUTO_INCREMENT,
  `resultado` int NOT NULL,
  `hora` datetime DEFAULT NULL,
  `temporest` decimal(10,0) DEFAULT NULL,
  `temporesp` decimal(10,0) DEFAULT NULL,
  `idquest` int DEFAULT NULL,
  `idaluno` int DEFAULT NULL,
  PRIMARY KEY (`idresposta`),
  KEY `idquest` (`idquest`),
  KEY `idaluno` (`idaluno`),
  CONSTRAINT `respondendo_ibfk_1` FOREIGN KEY (`idquest`) REFERENCES `questao` (`idquest`),
  CONSTRAINT `respondendo_ibfk_2` FOREIGN KEY (`idaluno`) REFERENCES `usuario` (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `respondendo`
--

LOCK TABLES `respondendo` WRITE;
/*!40000 ALTER TABLE `respondendo` DISABLE KEYS */;
/*!40000 ALTER TABLE `respondendo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `nomeuser` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datanasc` datetime NOT NULL,
  `erros` int DEFAULT NULL,
  `acertos` int DEFAULT NULL,
  `ranking` varchar(20) DEFAULT NULL,
  `curso` varchar(50) DEFAULT NULL,
  `escolafaculdade` varchar(50) DEFAULT NULL,
  `IFC_Curso` int DEFAULT NULL,
  PRIMARY KEY (`iduser`),
  KEY `IFC_Curso` (`IFC_Curso`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IFC_Curso`) REFERENCES `ifccurso` (`idcurso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'teste','teste123','teste@email.com','2000-05-02 00:00:00',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-10 13:47:17
