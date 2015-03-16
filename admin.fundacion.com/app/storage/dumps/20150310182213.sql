-- MySQL dump 10.13  Distrib 5.6.14, for osx10.9 (x86_64)
--
-- Host: localhost    Database: fundacion
-- ------------------------------------------------------
-- Server version	5.6.14

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
-- Dumping data for table `apoyamos_causa`
--

LOCK TABLES `apoyamos_causa` WRITE;
/*!40000 ALTER TABLE `apoyamos_causa` DISABLE KEYS */;
/*!40000 ALTER TABLE `apoyamos_causa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `causas`
--

LOCK TABLES `causas` WRITE;
/*!40000 ALTER TABLE `causas` DISABLE KEYS */;
INSERT INTO `causas` VALUES (1,'prueba','2015-03-13','prubeasss',400000,1,1,1,1,1,NULL,NULL,NULL,NULL),(2,'causa1','2015-03-05','sss',7,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `causas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `causas_donadores`
--

LOCK TABLES `causas_donadores` WRITE;
/*!40000 ALTER TABLE `causas_donadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `causas_donadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `donadores`
--

LOCK TABLES `donadores` WRITE;
/*!40000 ALTER TABLE `donadores` DISABLE KEYS */;
INSERT INTO `donadores` VALUES (1,'nombre','nombre','nombre','nombre',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `donadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `faq`
--

LOCK TABLES `faq` WRITE;
/*!40000 ALTER TABLE `faq` DISABLE KEYS */;
INSERT INTO `faq` VALUES (1,'','',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_03_04_185436_create_causas_table',0),('2015_03_04_185436_create_permissions_table',0),('2015_03_04_185436_create_permissions_roles_table',0),('2015_03_04_185436_create_permissions_users_table',0),('2015_03_04_185436_create_roles_table',0),('2015_03_04_185436_create_users_table',0),('2015_03_04_185636_create_causas_table',0),('2015_03_04_185636_create_permissions_table',0),('2015_03_04_185636_create_permissions_roles_table',0),('2015_03_04_185636_create_permissions_users_table',0),('2015_03_04_185636_create_roles_table',0),('2015_03_04_185636_create_users_table',0),('2015_03_04_185720_create_causas_table',0),('2015_03_04_185720_create_permissions_table',0),('2015_03_04_185720_create_permissions_roles_table',0),('2015_03_04_185720_create_permissions_users_table',0),('2015_03_04_185720_create_roles_table',0),('2015_03_04_185720_create_users_table',0),('2015_03_04_185727_create_causas_table',0),('2015_03_04_185727_create_permissions_table',0),('2015_03_04_185727_create_permissions_roles_table',0),('2015_03_04_185727_create_permissions_users_table',0),('2015_03_04_185727_create_roles_table',0),('2015_03_04_185727_create_users_table',0),('2015_03_04_185733_create_causas_table',0),('2015_03_04_185733_create_permissions_table',0),('2015_03_04_185733_create_permissions_roles_table',0),('2015_03_04_185733_create_permissions_users_table',0),('2015_03_04_185733_create_roles_table',0),('2015_03_04_185733_create_users_table',0),('2015_03_04_200157_create_causas_table',0),('2015_03_04_200157_create_permissions_table',0),('2015_03_04_200157_create_permissions_roles_table',0),('2015_03_04_200157_create_permissions_users_table',0),('2015_03_04_200157_create_roles_table',0),('2015_03_04_200157_create_users_table',0),('2015_03_05_004630_create_causas_table',0),('2015_03_05_004630_create_causas_donadores_table',0),('2015_03_05_004630_create_donadores_table',0),('2015_03_05_004630_create_noticias_table',0),('2015_03_05_004630_create_permissions_table',0),('2015_03_05_004630_create_permissions_roles_table',0),('2015_03_05_004630_create_permissions_users_table',0),('2015_03_05_004630_create_roles_table',0),('2015_03_05_004630_create_users_table',0),('2015_03_05_004732_create_causas_table',0),('2015_03_05_004732_create_causas_donadores_table',0),('2015_03_05_004732_create_donadores_table',0),('2015_03_05_004732_create_noticias_table',0),('2015_03_05_004732_create_permissions_table',0),('2015_03_05_004732_create_permissions_roles_table',0),('2015_03_05_004732_create_permissions_users_table',0),('2015_03_05_004732_create_roles_table',0),('2015_03_05_004732_create_users_table',0),('2015_03_05_004820_create_causas_table',0),('2015_03_05_004820_create_causas_donadores_table',0),('2015_03_05_004820_create_donadores_table',0),('2015_03_05_004820_create_noticias_table',0),('2015_03_05_004820_create_permissions_table',0),('2015_03_05_004820_create_permissions_roles_table',0),('2015_03_05_004820_create_permissions_users_table',0),('2015_03_05_004820_create_roles_table',0),('2015_03_05_004820_create_users_table',0),('2015_03_05_162012_create_apoyamos_tu_causa_table',0),('2015_03_05_162012_create_causas_table',0),('2015_03_05_162012_create_causas_donadores_table',0),('2015_03_05_162012_create_contacto_table',0),('2015_03_05_162012_create_donadores_table',0),('2015_03_05_162012_create_noticias_table',0),('2015_03_05_162012_create_permissions_table',0),('2015_03_05_162012_create_permissions_roles_table',0),('2015_03_05_162012_create_permissions_users_table',0),('2015_03_05_162012_create_roles_table',0),('2015_03_05_162012_create_unete_nosotros_table',0),('2015_03_05_162012_create_users_table',0),('2015_03_05_162127_create_apoyamos_causa_table',0),('2015_03_05_162127_create_causas_table',0),('2015_03_05_162127_create_causas_donadores_table',0),('2015_03_05_162127_create_contacto_table',0),('2015_03_05_162127_create_donadores_table',0),('2015_03_05_162127_create_noticias_table',0),('2015_03_05_162127_create_permissions_table',0),('2015_03_05_162127_create_permissions_roles_table',0),('2015_03_05_162127_create_permissions_users_table',0),('2015_03_05_162127_create_roles_table',0),('2015_03_05_162127_create_unete_nosotros_table',0),('2015_03_05_162127_create_users_table',0),('2015_03_05_162352_create_apoyamos_causa_table',0),('2015_03_05_162352_create_causas_table',0),('2015_03_05_162352_create_causas_donadores_table',0),('2015_03_05_162352_create_contacto_table',0),('2015_03_05_162352_create_donadores_table',0),('2015_03_05_162352_create_eventos_table',0),('2015_03_05_162352_create_faq_table',0),('2015_03_05_162352_create_noticias_table',0),('2015_03_05_162352_create_permissions_table',0),('2015_03_05_162352_create_permissions_roles_table',0),('2015_03_05_162352_create_permissions_users_table',0),('2015_03_05_162352_create_roles_table',0),('2015_03_05_162352_create_unete_nosotros_table',0),('2015_03_05_162352_create_users_table',0),('2015_03_05_162610_create_apoyamos_causa_table',0),('2015_03_05_162610_create_causas_table',0),('2015_03_05_162610_create_causas_donadores_table',0),('2015_03_05_162610_create_contacto_table',0),('2015_03_05_162610_create_donadores_table',0),('2015_03_05_162610_create_eventos_table',0),('2015_03_05_162610_create_faq_table',0),('2015_03_05_162610_create_noticias_table',0),('2015_03_05_162610_create_permissions_table',0),('2015_03_05_162610_create_permissions_roles_table',0),('2015_03_05_162610_create_permissions_users_table',0),('2015_03_05_162610_create_roles_table',0),('2015_03_05_162610_create_unete_nosotros_table',0),('2015_03_05_162610_create_users_table',0),('2015_03_10_173526_create_apoyamos_causa_table',0),('2015_03_10_173526_create_causas_table',0),('2015_03_10_173526_create_causas_donadores_table',0),('2015_03_10_173526_create_contacto_table',0),('2015_03_10_173526_create_donadores_table',0),('2015_03_10_173526_create_eventos_table',0),('2015_03_10_173526_create_faq_table',0),('2015_03_10_173526_create_noticias_table',0),('2015_03_10_173526_create_permissions_table',0),('2015_03_10_173526_create_permissions_roles_table',0),('2015_03_10_173526_create_permissions_users_table',0),('2015_03_10_173526_create_roles_table',0),('2015_03_10_173526_create_unete_nosotros_table',0),('2015_03_10_173526_create_users_table',0),('2015_03_10_181315_create_apoyamos_causa_table',0),('2015_03_10_181315_create_causas_table',0),('2015_03_10_181315_create_causas_donadores_table',0),('2015_03_10_181315_create_contacto_table',0),('2015_03_10_181315_create_donadores_table',0),('2015_03_10_181315_create_eventos_table',0),('2015_03_10_181315_create_faq_table',0),('2015_03_10_181315_create_noticias_table',0),('2015_03_10_181315_create_permissions_table',0),('2015_03_10_181315_create_permissions_roles_table',0),('2015_03_10_181315_create_permissions_users_table',0),('2015_03_10_181315_create_roles_table',0),('2015_03_10_181315_create_unete_nosotros_table',0),('2015_03_10_181315_create_users_table',0),('2015_03_10_181417_create_apoyamos_causa_table',0),('2015_03_10_181417_create_causas_table',0),('2015_03_10_181417_create_causas_donadores_table',0),('2015_03_10_181417_create_contacto_table',0),('2015_03_10_181417_create_donadores_table',0),('2015_03_10_181417_create_eventos_table',0),('2015_03_10_181417_create_faq_table',0),('2015_03_10_181417_create_noticias_table',0),('2015_03_10_181417_create_permissions_table',0),('2015_03_10_181417_create_permissions_roles_table',0),('2015_03_10_181417_create_permissions_users_table',0),('2015_03_10_181417_create_roles_table',0),('2015_03_10_181417_create_unete_nosotros_table',0),('2015_03_10_181417_create_users_table',0),('2015_03_10_182213_create_apoyamos_causa_table',0),('2015_03_10_182213_create_causas_table',0),('2015_03_10_182213_create_causas_donadores_table',0),('2015_03_10_182213_create_contacto_table',0),('2015_03_10_182213_create_donadores_table',0),('2015_03_10_182213_create_eventos_table',0),('2015_03_10_182213_create_faq_table',0),('2015_03_10_182213_create_noticias_table',0),('2015_03_10_182213_create_permissions_table',0),('2015_03_10_182213_create_permissions_roles_table',0),('2015_03_10_182213_create_permissions_users_table',0),('2015_03_10_182213_create_roles_table',0),('2015_03_10_182213_create_unete_nosotros_table',0),('2015_03_10_182213_create_users_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'mmm','',NULL,NULL,NULL,NULL,NULL),(2,'','',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'User','User',0,NULL,NULL,NULL,NULL),(2,'Roles','Roles',0,NULL,NULL,NULL,NULL),(3,'user/create','Create',1,NULL,NULL,NULL,NULL),(4,'user/show','Show',1,NULL,NULL,NULL,NULL),(5,'user/edit','Edit',1,NULL,NULL,NULL,NULL),(6,'user/destroy','Destroy',1,NULL,NULL,NULL,NULL),(7,'role/create','Create',2,NULL,NULL,NULL,NULL),(8,'role/show','Show',2,NULL,NULL,NULL,NULL),(9,'role/edit','Edit',2,NULL,NULL,NULL,NULL),(10,'role/destroy','Destroy',2,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions_roles`
--

LOCK TABLES `permissions_roles` WRITE;
/*!40000 ALTER TABLE `permissions_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions_users`
--

LOCK TABLES `permissions_users` WRITE;
/*!40000 ALTER TABLE `permissions_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Guest',NULL,NULL,NULL,NULL),(2,'Administrator',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `unete_nosotros`
--

LOCK TABLES `unete_nosotros` WRITE;
/*!40000 ALTER TABLE `unete_nosotros` DISABLE KEYS */;
/*!40000 ALTER TABLE `unete_nosotros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Carlos','Haas','Male','chaas@denacom.com','$2y$10$ddL8r1J5M3Es9Kk0GtjOeOZwZLtTzGwz8tnn/ANs6z1DFHhzE9FrW',NULL,NULL,NULL,'Active',2,NULL,NULL,NULL,NULL),(2,'Roberto','Barcenas','Female','rbarcenas@denacom.com','$2y$10$smZRBYHxPI99BkiJl3I80OVWV/hMB2k.IrMItEZr/AX33OEQHjbEm',NULL,NULL,NULL,'Active',2,NULL,NULL,NULL,NULL),(3,'Patricia','Ortega','Male','portega@denacom.com','$2y$10$GF3rwK1ZFzeNUXebv5Ovp.EP7FduXUNw1Zbc3qTm3.FOQ9ZyMHKHS',NULL,NULL,NULL,'Active',2,NULL,NULL,NULL,NULL),(4,'Miguel','Martinez','Male','mmartinez@denacom.com','$2y$10$GuBvk51xpUFxwimvb8Zwv.AtoOHni1pTOHoLl74bTR6Gfhb.10EaS',NULL,NULL,NULL,'Active',2,NULL,NULL,NULL,NULL),(5,'Norma Little','Bahringer','Male','lon.roberts@rolfson.biz','$2y$10$5nvksW9gHKvNTi7slAHxvOXP23gkHHKOANX8mQGRfRFUid0k14ERe',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(6,'Kraig McCullough','Moen','Male','hlarkin@hotmail.com','$2y$10$bKokGPt.P3qECvd.hn2eiejZPktQ7.GQLdws04yKm2pC4fXg8vCLG',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(7,'Mr. Spencer Ullrich Jr.','Herzog','Male','yrunolfsdottir@turner.com','$2y$10$cCDmVw23OA7j6oOuF19uluCiR81nF3vHf2559hLaK8Ri4sMvjQKBq',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(8,'Miss Jarrell McLaughlin','Smitham','Female','edythe.marvin@gmail.com','$2y$10$.ekN1l67dDbyXwYuPnLRnO5Ureih7yseEUCdgqGucNgJWUDn1TPWy',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(9,'Sammie Sauer IV','Borer','Female','sawayn.saul@hotmail.com','$2y$10$clkoby5XM5jcnBG0AgGyVuQlbnyN7EUzCAUPPDVjy7q6doVHwfRQC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(10,'Avery Reilly','Legros','Male','maritza.douglas@nienowbogan.com','$2y$10$A85GrheQ1k4avKcIgJ7mn.QBSFSbzK20HPfqH1VbfFUFSYLBD54Nm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(11,'Jesse Mayer','Wilkinson','Male','ko\'conner@breitenbergturcotte.com','$2y$10$NmVcAGaW8fz4VOraWAb6Qe.ODIvO4r4.IMh9LYyba6qwmYF7QnqJ.',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(12,'Anjali Yundt','Russel','Male','qhaley@marks.com','$2y$10$ZqpOCCG4t3fKBBZYrj9Tu.94mHePgDUpRBSbotQKjKeVUtywlr/9S',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(13,'Dr. Carlie Koelpin','Grant','Female','reilly.stevie@yahoo.com','$2y$10$kJ4eodOxp.nZTOojY2gcrOGhZ36yU8pSd76bMShNA13giYhy/PbSe',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(14,'Myra Bogan','Swift','Female','monique.quigley@cruickshankcollins.info','$2y$10$tESmyHvCPwiVKYtoQpSzt.VyQ7BTr03BQDBRfZOnryAXRLixf/RTa',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(15,'Helena Schmitt','Ruecker','Female','reinger.ramiro@hotmail.com','$2y$10$Sz3WEZGFAr9Vckvl3yROF.oP4RM3Bl44YjEwLIR5RkdMV5mYGnhc2',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(16,'Stevie McLaughlin','Konopelski','Male','zdaniel@gmail.com','$2y$10$lEIML3f7IaRq/gdqgloR9.aF8lXbPemX/Z7gogD0EzWZirb9Rt3WK',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(17,'Ava Becker','Paucek','Female','drew34@gmail.com','$2y$10$rohhuAV4IzuH.kOQaRYdeeDn2BEsY3tp6CIzciuA7NUnHUqCDT2Ym',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(18,'Elvis Olson DVM','Bashirian','Male','zakary91@gmail.com','$2y$10$7mwL4.M3oQIJ1lpek/6aIeCMMnvhldECNh8WFdLvg37J96AqCkApu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(19,'Annabell Kuphal','Stehr','Female','eduardo22@gmail.com','$2y$10$poXaCHlvJmugynAgzi3zoOfxTjiQj8uYB57Bqu3/N0Vsf1PQt.PpG',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(20,'Hortense Botsford PhD','Jerde','Female','greenholt.dewayne@nikolaus.com','$2y$10$3BwKZ5HAystXFxuDP57UK.vVoUtnxHecnD7k5x9FqE2DMyjnhEVKm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(21,'Ms. Grayce Goyette','O\'Kon','Male','streich.destini@lehner.com','$2y$10$sVcmaA6ba.3t00Wx1bZ05e/9rALcwztqSfKvsowl/xmIKhx2aADim',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(22,'Dr. Esperanza Beatty III','Boyer','Female','sandy.lueilwitz@gmail.com','$2y$10$YYTOQZIFhrflMmQd2dDd8eARaG3qvftPWigeS81vpmPacrj0H./Ha',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(23,'Dr. Lea Schuster','Carter','Female','uo\'keefe@kunze.com','$2y$10$5vijrc/PJCCQ7DLEo6UsE.TlKX6rVHRo6JwTBq/a8QLlrQGxmFk/S',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(24,'Deangelo Blanda MD','Turner','Female','cassidy.swaniawski@yahoo.com','$2y$10$./RgINtFRQuRi8S9iS5NN.mqdnWuV12XpNdQywaMuIT2DnSMqfOei',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(25,'Natalie Haag III','Beatty','Female','dietrich.joshuah@hotmail.com','$2y$10$fP2oxQJkg2.2oGQZaAshY.NE2zBocRvX7ePGa1p45VoFnRf0R0dwu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(26,'Maye Trantow','Corwin','Male','genoveva.kihn@homenick.com','$2y$10$Anl6FhVWLHZYE.PPfRLBmeH8ma8ZHUsm0VNChDjGpXcCNc4eke9NS',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(27,'Dr. Edgardo Murazik Jr.','Mohr','Female','kiley83@kautzerwiegand.com','$2y$10$bZkuAFdeEczrKdZtAtGCQeqd7upUp1gn9LtEmdVepWgIUqARmHTZC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(28,'Lilliana Reinger','Steuber','Male','nicolas.bernier@harberferry.com','$2y$10$3TAAz6U7K7cYYm63LqNGYOOZZySUdQuGcP8PcSX3SajGMBTXfMvyi',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(29,'Era Roob IV','Schamberger','Female','tommie23@markslynch.com','$2y$10$sd0iGqBGn8YWNFUTgrlYvOQ44dqKCIAfQYjLFS9hUeUd7cUGB3g8a',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(30,'Brianne Cronin','Jast','Female','demetrius37@bechtelarklein.com','$2y$10$WuPPC4uwlJRMA5T9ZxO3quntAgJoPQf65sjIKUXBTrKfm6V5ziuNq',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(31,'Isadore Witting','Olson','Male','io\'kon@gmail.com','$2y$10$KO5RsBkSOCz2AUQKWbuyqusleVu6LezMDX2DkYzvkWK.UvQLMqsxm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(32,'Jared Bashirian Jr.','Jones','Male','wglover@mertz.info','$2y$10$hz1LLtD6dPq8tNXxPB0NROrPjiGqGuRXF3r1KyPne2Y5MPmPfH29a',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(33,'Cole Haley','Schamberger','Male','allene.franecki@beier.com','$2y$10$.gS9yxt.IaTr28.jwTxnDO/Vu7sm3V7PY.LOcjZw/VKYRa6ulk4xq',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(34,'Miss Jonas Reichel','Nikolaus','Male','gkilback@wilderman.info','$2y$10$s1FKxo6Is9tmd8GtuetSMueHigPMJpjRmbYdMHvflgyU/JceWHBK6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(35,'Mrs. Lila Kuhlman','Anderson','Male','emmett.bruen@hotmail.com','$2y$10$aYAtpeJmG9mXISzpxx49tehC24pQoQRqHdQJndgIAwb31GXTdfJrS',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(36,'Trystan Moen','Abernathy','Female','trudie98@yahoo.com','$2y$10$9apM0REtgo5EMYDNwHn/MOV0CzvQOVofOuZZnhwpThvKdQqGQIdgG',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(37,'Bert Von','Orn','Female','porter.donnelly@yahoo.com','$2y$10$zH8h3JgvdsQT5pDe8Zop1.vw0vdS4Ij9gHxKv0.zKGcrVUPgepxc.',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(38,'Elody Lesch','Christiansen','Female','sammy26@yahoo.com','$2y$10$c19/DQ3DSdqBp3QVZXLqZugR0hX1IfKAuWSBiyr1hFh/rlT4nnoem',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(39,'Breana Schinner','Stracke','Female','rosa.kuvalis@paucek.com','$2y$10$JIa.vQlhUiYdvdGIfQmlpuq/yz450J2rUe.dcSMeZWH/jkSWCNltm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(40,'Miss Johnson Davis','McGlynn','Male','rhills@yahoo.com','$2y$10$.UBZJko.mocad6yk37/ibumVpYkFNLbTsaWdG77hz9XbBeIfb787e',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(41,'Leopoldo Gleichner','O\'Reilly','Male','ciara.langworth@gmail.com','$2y$10$ozFdWM35hWeumDX7.RB14OkuEYwiaPjwQAmC7kWjSdCy9cyyG/awm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(42,'Dr. Moises Hilpert III','Moore','Male','smacejkovic@brakus.com','$2y$10$w7Dxkj43z/CqISgq/R7Edem6L1HP4NVVQipC.AmwkUHMEMhxcKYHO',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(43,'Wilhelm Jacobi','Stiedemann','Male','dubuque.lawrence@yahoo.com','$2y$10$/M8RFYFh1yTrEJ9U5mM7gumrHjMtc87GVEmSiVN9OOraRnrF6NI/G',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(44,'Morris Lehner MD','Mohr','Male','dariana.gaylord@yahoo.com','$2y$10$33eNwCjawqJ30oqXYQAdkuz1VU75fCFchajkDygFvfBvUggAQ.vLu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(45,'Darien Littel','O\'Connell','Male','michelle.jacobi@lehnerkeeling.biz','$2y$10$HS7M4gCR8YeMEcZvEdaBCuCQqWVikCC.MVmXU6f9EufPgdE6VTTRu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(46,'Mrs. Fiona Nicolas V','Macejkovic','Male','prohaska.junius@quitzon.info','$2y$10$swJnHkDX0Db8Y5689hJhR.oBRnyTtc0wUmjStdTYoml77bnEDMiFO',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(47,'Mrs. Esta Marks','Medhurst','Male','fkunde@gmail.com','$2y$10$pEI5o9fU7eu1K2VwjesiauvHO3hs8xYh0sXHO8rmqEvbOxC.VX67S',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(48,'Alvah Trantow','Krajcik','Male','jevon.blanda@gmail.com','$2y$10$WMyYzhVLv/LmfLf1uuy7eeYFXbzjzvsfSwR1Ps.ihwKSBRhJ5Gm1q',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(49,'Kenton Boehm PhD','Johnston','Female','kromaguera@yahoo.com','$2y$10$sbW0zcDQUpN3K1Piov1WLO4bAe7yplbsf6D9Qfxv8D.niksHdHlDa',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(50,'Carleton Schaden','Rutherford','Male','andreane06@gmail.com','$2y$10$z/vwVDBYz1HAv7yRxLC7ceXM0nI52JgCWk.a3YTPGERQJuxtZll76',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(51,'Ms. Ellsworth Fadel','Crooks','Female','sylvan10@yahoo.com','$2y$10$YyEkk9bdfl9WGmRHqrUSyOHgXIxtwL79swlQW.sBvuuYyTraRS87y',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(52,'Granville Shields III','Zboncak','Female','ryder.wehner@yahoo.com','$2y$10$/ZXfnblQK37e3EEdZSu7i.8yPcaM5f5x2VtVaEIy3jQO02XjMXOA.',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(53,'Liana Boehm','Kilback','Female','dedric.crona@yahoo.com','$2y$10$v.7/hhdXrbCSQp3fS61cnu1WaoRCHBjTKyK0jELRbD.YGZ1LRKr1q',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(54,'Mr. Ivah McCullough','Tremblay','Female','vincenzo38@gmail.com','$2y$10$19YEbxcU//zy5i2gkDKc0.xrJ15.zLWl5Ygo9.E6ziQz9EQBJ2gZu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(55,'Kellen Kunze','Batz','Male','jenkins.burnice@millsklocko.com','$2y$10$YpYYtcSsQTyCMg.i88C0d.EZ7SfFslDhsyanIM8F5r5g4bNfIXUnS',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(56,'Ms. Clovis Lowe DDS','McClure','Female','norris70@howelldooley.com','$2y$10$M.gDMyrcih6JbhtvxhIjieHV7B7BYGGo07iKTX6Wuw0FwNUzEzV4i',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(57,'Mrs. Kathryn Brekke','Kunde','Male','albert78@littel.com','$2y$10$19fEA0tL3Fg9Cg2rPm6LMecTVsCVAl6DgNrkBqtd30tjybEHIAXqC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(58,'Garett Gutmann','Tillman','Male','rodolfo85@torphy.com','$2y$10$cJQ3gijuQgq2SAJWzmdugOQYAq98Ssw/iUOxyJ2DoDguVfSCYml/a',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(59,'Gianni Grimes','Conn','Male','hcarroll@stokes.net','$2y$10$kgN9aWY4wWp6tr7o/MCNk.87mX1FOlxkpXduxQC7vfqHCMkumATS.',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(60,'Arnoldo West','Braun','Male','hayes.rudy@yahoo.com','$2y$10$cjKmJesEQSigAjydZy.uZeaC336pw1GSjUAUH.6U6tRq1lSUijqUC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(61,'Guadalupe Wolff','Hagenes','Male','walker.carmelo@hotmail.com','$2y$10$7kjMSxa6b0eOGrNksXNjrOD989Q5D59kSogDPkmO/JxsSV1U6U7rW',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(62,'Gerry Ratke','Homenick','Male','rcrooks@hotmail.com','$2y$10$B4D6O/bAxYMks7Ac1lk4COId2ECke.WhwuiPz4qPnEpZtaTKrgQwi',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(63,'Luna Connelly','Keeling','Male','rutherford.werner@swaniawski.com','$2y$10$rn6N0KWyiTyOz.yoHoI7WOrizyY9DrJMy1kraCgxLhSkxZHspwaQK',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(64,'Carley Harber','Zboncak','Female','littel.carmel@buckridge.org','$2y$10$8hCrQSsvwtIHBirM6Li2muXSNLrpocwS64Uyg0f55WLG86Hwuas/O',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(65,'Mr. Cordia Collier','Stracke','Female','holden96@harber.com','$2y$10$4BvuMEEQE2Y3a9KEHqVIueDyWqxG/nCy2fKdNu9vXXyLaqOEI9c/S',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(66,'Emelia Gottlieb','Rice','Male','hand.winnifred@jacobson.com','$2y$10$4MJvMFidXEd0tLf9H9qKOegLKXIAiCXTxPC7yGdb6OppTg2AD3qkW',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(67,'Delta O\'Hara','Walsh','Female','zrunolfsson@hotmail.com','$2y$10$PH7Kc8wQJYQGfYOO6AtvfOk5OxjYS.dKEqnxOyFbhmi4LB4hmk7hC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(68,'Miss Darryl Schamberger','Willms','Female','hoppe.astrid@yahoo.com','$2y$10$v.aU4eh4IQjagJFBLQolI.o9rKdarXRKBVjM0VoO2SWxGJA4eAZ66',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(69,'Lou Hamill','Bashirian','Female','mcdermott.matilde@armstrong.com','$2y$10$K82UMh2gfqaXm5rryxk89eVy8Bz6LCnve4.zLOFayR/fYdFZkRRme',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(70,'Noemi Treutel','Wunsch','Male','bednar.murray@hane.com','$2y$10$LzbJkd6l3twW0ILNq.2O8eykBk2gT1HFzv5KWhWgSMH11ZCLBEVD.',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(71,'Susan Marvin MD','Bashirian','Male','vcole@hotmail.com','$2y$10$cBEXUU83EDmV9UIBwPMn3eUcyKdYJhCWHoo3W9.0L.7gkO7q3xqWe',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(72,'Jaquelin Cummerata','Hand','Female','beatrice15@runolfsdottirkub.com','$2y$10$Kovr6xYArIPl3wXzV526EOyxmSxMxTkxI71Nx5QrsAH3g7o2o1HJu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(73,'Chesley Kovacek','Graham','Female','conner.bechtelar@gmail.com','$2y$10$A/e0THCq.rCKGHgu7S322ez/NrPOPzI/zuav34CltM3ezsOJZNBHG',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(74,'Marilie Breitenberg','King','Female','tressie32@gmail.com','$2y$10$HqXP76Zpl9vwx2l9JDK3VuiODl9N1J3emLLrTzOfX32UriQF.2Uwa',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(75,'Nestor Bahringer','Okuneva','Female','tyshawn.mertz@gmail.com','$2y$10$hjmOBzdZKaN6foXif.RYLOxlvMItJT7vcebtHFP48SB.aSB8XGBeS',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(76,'Leonie Mueller','Goodwin','Male','ignatius.rogahn@lubowitzwest.com','$2y$10$EtzEz0s4bINlQ2YHks/iMOTXrlQ598YN5RxK0Sl8BG00emadxF9lC',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(77,'Ms. Bartholome Konopelski I','VonRueden','Female','cummings.immanuel@hotmail.com','$2y$10$bmUfJYRnFI55jSCdLGRsFOtfJu9ecOS1afIfk3YrR2FrWzl6ULyjO',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(78,'Titus Jacobs','Kiehn','Male','hackett.karli@yahoo.com','$2y$10$kSkSCrRll3UKTDyvu9h3xOciFnmxEKNIJOxssKGWZwxuw5bAP7Xbe',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(79,'Daron Okuneva','Kulas','Male','garth61@gmail.com','$2y$10$WqCVXcsAK6a.2hIQqEiNae/42mZh1c7CRra93TJrKnGx4a9ebyIgi',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(80,'Nelson Fahey','Predovic','Male','clyde09@yahoo.com','$2y$10$6gtbNcdC4t1Ot8iKBNGv9u07ti1kCvAnU4Ie.yzQbLEAliy3dGF9K',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(81,'Camilla Considine','Konopelski','Female','jacobson.jermain@hotmail.com','$2y$10$rTwUvoswnLg19/KnIK.9/OvlD7srQAyBFcPTlcMUilEu43.X/mEji',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(82,'Aisha Quigley','Mueller','Male','balistreri.cooper@gmail.com','$2y$10$1EaGt62AU0TuCYgDgx0GD.Km3t6mhC2IhAclbmzLS/pxuFGAa3Fi6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(83,'Ms. Selena Langworth Sr.','Kerluke','Male','glover.larissa@hotmail.com','$2y$10$c86Zyp/LSylJMPqpMTb0Y.bP24X0sPtBqgYN/Py6LEN6FzpXPZO7y',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(84,'Ocie Krajcik','McKenzie','Male','dstehr@feeney.com','$2y$10$mSd.vZTZ3opWkysvfDhVWOi3v/dzQpec0YFUpC/7.0pZSdWc.yzw6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(85,'Dr. Shaun Greenfelder','McClure','Female','shanna01@howell.org','$2y$10$6/4ibaC5AObREKmlNAmycubt.WZUhmafXSyWVnqk3MY4nwEsQwxfu',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(86,'Serenity Becker','O\'Conner','Female','jovanny63@kovacek.org','$2y$10$Wni2rL7T66nGnUFkzCPvUuc2hr8zhEW4ZHtPsunmjd1ZWkILMAvay',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(87,'Ms. Zachery Fadel PhD','Wolff','Female','saige55@hotmail.com','$2y$10$SNBZVTxatlrdo8ivkDmZRugRycEIu4uX2mE7bl882xby3kb2uxGcO',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(88,'Boris Gorczany','Von','Male','yessenia.hermann@hotmail.com','$2y$10$mvpKal8OtKvwkNpSSLT2j.H.cvDOQh02dVxUzUYvh24XY/EHKDr3m',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(89,'Shawna Wiza','Pagac','Male','albin69@brakus.biz','$2y$10$8V4M0iegdoB86d0WY8k3j.QpEQ2JmVTAka1KJhqGfbRb6xIaoytF2',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(90,'Sally Hoeger','Mills','Female','gussie.langworth@willweimann.info','$2y$10$Wj5qTXtZzlux2rEl8SWNJeyGRifFNCStrPqmIIdx2XK07cpg8k.pW',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(91,'Neva Bashirian','Rogahn','Male','dwilkinson@gmail.com','$2y$10$n7sz4PZEz/5Ql3c.Y4ahGee2shm99mXIbOEoTH.WgIZu7jmj6xU4m',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(92,'Mr. Khalid Gorczany DDS','Welch','Female','larkin.garnet@breitenberg.com','$2y$10$.qnzE5j4ixDjLgZMzg6hiuzKsqrYw2mN/u9jzU5Ra5/nycKa66w1q',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(93,'Tianna Frami','Heaney','Male','rmayer@oconnell.com','$2y$10$Lf1/F64qCmCHmQrV2km7Gu12obDU0aFVv.I.GGygug6Gk6i2IBlbK',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(94,'Rylan Parisian','Shields','Male','madalyn.harris@gmail.com','$2y$10$qtEMow5.Ul5xrRTQ8lbfbuUxPBoSHuMryFS6PEoYIc8wE7z9ypPY2',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(95,'Alivia Lesch','Lueilwitz','Female','susie96@hotmail.com','$2y$10$dJcqA8P2ytze176DwElmSeTkc6kxyygKT2hG9QFppWtBzys5BNIk6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(96,'Damon Kihn DVM','Gibson','Male','runolfsson.adelia@gmail.com','$2y$10$Azuydy9nSgJ4Y8FKDLV1Y.J21HDp9YFAR8kQfcpr2OeVuFgsWn6by',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(97,'Miss Stephany Mayer V','Treutel','Female','liam19@okuneva.org','$2y$10$1cHnRhN6hHV6dMReMwKdBOphdhkIkGvStAEe9CAwn55OHQevGKkV2',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(98,'Green Smitham Jr.','Robel','Female','harris.maudie@luettgen.com','$2y$10$bDSZrSS5gKSR54IVmBX1N.KgalPr0A/qF3/zKupyhBhZXXF/vnJEO',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(99,'Maxime Casper','Jerde','Male','lon18@batz.com','$2y$10$2ZBX4oRZv7vk5abhTuCNQ.2Ogy6bmX25WfY3oLg.WC3Tm/si6bGOW',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(100,'Mrs. Deshaun Feeney','Kilback','Female','lcrona@yahoo.com','$2y$10$ST1UO59wBrgx2aXiHk9kuOu0YjEUJkvQs2oG5O5Zgbg2u1c7qRjC2',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(101,'Emie Klein','Schulist','Male','hackett.callie@cassin.com','$2y$10$H5Oeohhne0sBP/Cj3ugkoO.jAGs25P3esFdbZbwKzcY/zzb5NKARm',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(102,'Kobe Ankunding','Littel','Female','kautzer.dakota@adamskemmer.com','$2y$10$TfLU5ej5ylUvlEtWoXFABu8g/y.dJxzZpZ/omY.e5RdUpmA9QwbE6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(103,'Marques O\'Connell','Murray','Male','xstamm@treutel.info','$2y$10$LfNHYfwMxqNAtAQhfBhcoeimZw21sJ25VbXWrrOmtP.HptvNq2pdG',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL),(104,'Kaley Von DVM','Erdman','Male','schinner.remington@gmail.com','$2y$10$ZRYjfgabQBSntWryQ..nEeVKkGU4NpAz5sgIUN31wrzrZDJJzkM.6',NULL,NULL,NULL,'Active',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-10 12:22:13
