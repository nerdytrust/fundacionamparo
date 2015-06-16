-- MySQL dump 10.13  Distrib 5.5.38, for osx10.6 (i386)
--
-- Host: localhost    Database: ndytrust_fundacion_amparo
-- ------------------------------------------------------
-- Server version	5.5.38

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
INSERT INTO `apoyamos_causa` VALUES (1,'Beksor','5555555555','a@a.com',4,'Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no te cabe parte dellas.Y, viéndole don Quijote de aquella manera, con muestras de tanta tristeza, le dijo: Sábete, Sancho, que no es un hombre más que otro si no hace más que otro. Todas estas borrascas que nos suceden son señales de que presto ha de serenar el tiempo y han de sucedernos bien las cosas; porque no es posible que el mal ni el bien sean durables, y de aquí se sigue que, habiendo durado mucho el mal, el bien está ya cerca. Así que, no debes congojarte por las desgracias que a mí me suceden, pues a ti no','127.0.0.1',0,0,'2015-05-21 18:12:44','2015-05-21 18:12:44');
/*!40000 ALTER TABLE `apoyamos_causa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `categorias`
--

LOCK TABLES `categorias` WRITE;
/*!40000 ALTER TABLE `categorias` DISABLE KEYS */;
INSERT INTO `categorias` VALUES (1,'CENTROS COMUNITARIOS','centros-comunitarios',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(2,'CULTURA','cultura',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(3,'EDUCACIÓN','educacion',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(4,'SALUD','salud',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(5,'RESTAURACIÓN','restauracion',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(6,'DEPORTE','deporte',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13'),(7,'ASISTENCIALES','asistenciales',NULL,NULL,'2015-05-19 18:56:13','2015-05-19 18:56:13');
/*!40000 ALTER TABLE `categorias` ENABLE KEYS */;
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
-- Dumping data for table `ciudades`
--

LOCK TABLES `ciudades` WRITE;
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `donaciones`
--

LOCK TABLES `donaciones` WRITE;
/*!40000 ALTER TABLE `donaciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `donaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `donadores`
--

LOCK TABLES `donadores` WRITE;
/*!40000 ALTER TABLE `donadores` DISABLE KEYS */;
/*!40000 ALTER TABLE `donadores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `estados`
--

LOCK TABLES `estados` WRITE;
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;
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
-- Dumping data for table `home_video`
--

LOCK TABLES `home_video` WRITE;
/*!40000 ALTER TABLE `home_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `logfile`
--

LOCK TABLES `logfile` WRITE;
/*!40000 ALTER TABLE `logfile` DISABLE KEYS */;
/*!40000 ALTER TABLE `logfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `membresias`
--

LOCK TABLES `membresias` WRITE;
/*!40000 ALTER TABLE `membresias` DISABLE KEYS */;
/*!40000 ALTER TABLE `membresias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_06_15_201306_create_apoyamos_causa_table',1),('2015_06_15_201306_create_categorias_table',1),('2015_06_15_201306_create_causas_donadores_table',1),('2015_06_15_201306_create_causas_table',1),('2015_06_15_201306_create_ciudades_table',1),('2015_06_15_201306_create_contacto_table',1),('2015_06_15_201306_create_donaciones_table',1),('2015_06_15_201306_create_donadores_table',1),('2015_06_15_201306_create_estados_table',1),('2015_06_15_201306_create_eventos_table',1),('2015_06_15_201306_create_faq_table',1),('2015_06_15_201306_create_home_video_table',1),('2015_06_15_201306_create_logfile_table',1),('2015_06_15_201306_create_membresias_table',1),('2015_06_15_201306_create_modules_table',1),('2015_06_15_201306_create_muro_table',1),('2015_06_15_201306_create_noticias_table',1),('2015_06_15_201306_create_paises_table',1),('2015_06_15_201306_create_permissions_roles_table',1),('2015_06_15_201306_create_permissions_table',1),('2015_06_15_201306_create_permissions_users_table',1),('2015_06_15_201306_create_profiles_table',1),('2015_06_15_201306_create_promedios_table',1),('2015_06_15_201306_create_registrados_table',1),('2015_06_15_201306_create_roles_table',1),('2015_06_15_201306_create_tipo_causas_table',1),('2015_06_15_201306_create_unete_nosotros_table',1),('2015_06_15_201306_create_users_chart_report_table',1),('2015_06_15_201306_create_users_notes_table',1),('2015_06_15_201306_create_users_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `muro`
--

LOCK TABLES `muro` WRITE;
/*!40000 ALTER TABLE `muro` DISABLE KEYS */;
/*!40000 ALTER TABLE `muro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `paises`
--

LOCK TABLES `paises` WRITE;
/*!40000 ALTER TABLE `paises` DISABLE KEYS */;
/*!40000 ALTER TABLE `paises` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
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
-- Dumping data for table `profiles`
--

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;
/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `promedios`
--

LOCK TABLES `promedios` WRITE;
/*!40000 ALTER TABLE `promedios` DISABLE KEYS */;
/*!40000 ALTER TABLE `promedios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `registrados`
--

LOCK TABLES `registrados` WRITE;
/*!40000 ALTER TABLE `registrados` DISABLE KEYS */;
/*!40000 ALTER TABLE `registrados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `tipo_causas`
--

LOCK TABLES `tipo_causas` WRITE;
/*!40000 ALTER TABLE `tipo_causas` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipo_causas` ENABLE KEYS */;
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

-- Dump completed on 2015-06-15 20:17:22
