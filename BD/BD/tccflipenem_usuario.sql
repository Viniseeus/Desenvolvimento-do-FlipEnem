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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `iduser` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datanasc` date DEFAULT NULL,
  `acertos` int DEFAULT '0',
  `erros` int DEFAULT '0',
  `curso` varchar(50) DEFAULT 'Não informado.',
  `escolafaculdade` varchar(50) DEFAULT 'Não informado.',
  `imagem` varchar(100) DEFAULT 'N/A',
  `ADM` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'David leandrp','adm123','adm@gmail.com','2000-05-02',3,3,'Não lembro','IFSC','',0),(2,'Vinicius Leandro Pereira','vini123','viniciusleandropereira@gmail.com','2006-03-15',13,19,'TI','IFC','Captura de tela 2023-10-25 192245.png',1),(3,'Luiz','luiz123','luizinho@gmail.com','2005-06-16',7,10,'','',NULL,0),(4,'joao','joao123','joao@gmail.com','2000-01-02',3,6,'','',NULL,0),(5,'Tiago','123456','sdfghjkl@gmailcom','1997-10-21',3,0,'','',NULL,0),(6,'Dani','danilinda','danieladeoliveiramateus.sb@gmail.com',NULL,5,4,NULL,NULL,NULL,0),(7,'Guga','guga1234','gugacrispin@gmail.com',NULL,6,1,NULL,NULL,NULL,0),(8,'Nathália ','aleluia','natygvinny@gmail.com','2000-01-01',5,1,NULL,NULL,NULL,0),(9,'Kay','kay123','kay@gmail',NULL,1,1,NULL,NULL,NULL,0),(10,'JESSICALEANDRO','Gio290717','jessica.leandro1@outlook.com',NULL,0,3,NULL,NULL,NULL,0),(11,'nathiel','vinicius','nathielgames@gmail.com',NULL,3,0,NULL,NULL,NULL,0),(13,'pedro','123456789','jpjoao.j14@gmail.com',NULL,9,6,NULL,NULL,NULL,0),(14,'Marcia','Marcia','marcia01.mendess@gmail.com',NULL,1,4,NULL,NULL,NULL,0),(15,'o cara','ocara','toni-ramos@hotmail.com',NULL,1,4,NULL,NULL,NULL,0),(16,'joao paulo','12345678','joaop@gmail.com',NULL,0,1,NULL,NULL,NULL,0),(17,'victormredes','123','victormredes@gmail.com',NULL,0,4,NULL,NULL,NULL,0),(18,'marcelo','1234','marcelobereta7@gmail.com',NULL,0,3,NULL,NULL,NULL,0),(19,'raissinhagameplays','amodev','hendlerf.raissa@gmail.com',NULL,4,2,NULL,NULL,NULL,0),(20,'Usuario','Vini123','Usuariocomum@gmail.com',NULL,0,3,'Não informado.','Não informado.','N/A',0);
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

-- Dump completed on 2023-10-30 20:39:26
