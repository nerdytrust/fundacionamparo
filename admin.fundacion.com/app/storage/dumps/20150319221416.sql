-- MySQL dump 10.13  Distrib 5.6.23, for osx10.10 (x86_64)
--
-- Host: localhost    Database: fundacion
-- ------------------------------------------------------
-- Server version	5.6.23

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
/*!40000 ALTER TABLE `faq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_03_19_221415_create_apoyamos_causa_table',0),('2015_03_19_221415_create_causas_table',0),('2015_03_19_221415_create_causas_donadores_table',0),('2015_03_19_221415_create_contacto_table',0),('2015_03_19_221415_create_donadores_table',0),('2015_03_19_221415_create_eventos_table',0),('2015_03_19_221415_create_faq_table',0),('2015_03_19_221415_create_noticias_table',0),('2015_03_19_221415_create_permissions_table',0),('2015_03_19_221415_create_permissions_roles_table',0),('2015_03_19_221415_create_permissions_users_table',0),('2015_03_19_221415_create_roles_table',0),('2015_03_19_221415_create_unete_nosotros_table',0),('2015_03_19_221415_create_users_table',0),('2015_03_19_221415_create_users_chart_report_table',0),('2015_03_19_221415_create_users_notes_table',0);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'User','User',0,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(2,'Roles','Roles',0,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(3,'user/create','Create',1,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(4,'user/show','Show',1,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(5,'user/edit','Edit',1,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(6,'user/destroy','Destroy',1,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(7,'role/create','Create',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(8,'role/show','Show',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(9,'role/edit','Edit',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(10,'role/destroy','Destroy',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03');
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
INSERT INTO `roles` VALUES (1,'Guest',NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(2,'Administrator',NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03');
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
INSERT INTO `users` VALUES (1,'Carlos','Cuellar','Male','ccuellarlira@gmail.com','$2y$10$2KjpkH74.my92qC7YeKGXO3oOvqAENMzrwakCSA4eTIgAtcDdDgZO','','',NULL,'Active',2,NULL,3,'2015-03-15 06:16:03','2015-03-19 23:33:53'),(2,'Erick','Vizcaya','Female','erick@vizcaya.pro','$2y$10$j.WiOOdNe.OWXbJGx87AA.YiBLWIr8x5Pi3jbKk0iGUZitq6kXp3m',NULL,NULL,NULL,'Active',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03'),(3,'Miguel','Martinez','Male','natacion@gmail.com','$2y$10$BDO0.TQy4P9/1FiT9VjHj.3p0Fpxpte/hOpsG4peMhpERjuueDWCC',NULL,NULL,NULL,'Active',2,NULL,NULL,'2015-03-15 06:16:03','2015-03-15 06:16:03');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_chart_report`
--

LOCK TABLES `users_chart_report` WRITE;
/*!40000 ALTER TABLE `users_chart_report` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_chart_report` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `users_notes`
--

LOCK TABLES `users_notes` WRITE;
/*!40000 ALTER TABLE `users_notes` DISABLE KEYS */;
INSERT INTO `users_notes` VALUES (1,'2',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users_notes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-03-19 16:14:16
