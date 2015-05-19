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
INSERT INTO `causas` VALUES (1,'Roberto Alonso Espinosa','2015-06-01','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',193000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'132c6798b19b4dab13596bb3a9ec6256',1,4,4,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(2,'Museo Amparo','2015-05-14','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',193000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'bcf2f88dd7020e0882ad27dbd4130758',2,4,4,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(3,'Centro Comercial \"La Victoria\"','2015-05-28','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',10000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'b4a604bc76648b6c321ec1d692a31573',5,4,4,'2015-05-07 22:20:16','2015-05-07 22:20:16');
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
-- Dumping data for table `home_video`
--

LOCK TABLES `home_video` WRITE;
/*!40000 ALTER TABLE `home_video` DISABLE KEYS */;
INSERT INTO `home_video` VALUES (1,'acb1fd6e9240a75873e9b07a607ef36e','eb27cc2a87a60e7d6195b9f50acf215d','Active','2015-05-07 22:21:11','2015-05-07 22:21:11',4,4);
/*!40000 ALTER TABLE `home_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `logfile`
--

LOCK TABLES `logfile` WRITE;
/*!40000 ALTER TABLE `logfile` DISABLE KEYS */;
INSERT INTO `logfile` VALUES (1,1,'causas','created','127.0.0.1',4,0,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(2,1,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(3,2,'causas','created','127.0.0.1',4,0,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(4,2,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(5,3,'causas','created','127.0.0.1',4,0,'2015-05-07 22:20:16','2015-05-07 22:20:16'),(6,3,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:20:16','2015-05-07 22:20:16'),(7,1,'home_video','created','127.0.0.1',4,0,'2015-05-07 22:21:11','2015-05-07 22:21:11'),(8,1,'home_video','updated','127.0.0.1',4,0,'2015-05-07 22:21:11','2015-05-07 22:21:11');
/*!40000 ALTER TABLE `logfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_05_19_190459_create_categorias_table',1),('2015_05_19_190459_create_causas_donadores_table',1),('2015_05_19_190459_create_causas_table',1),('2015_05_19_190459_create_contacto_table',1),('2015_05_19_190459_create_donadores_table',1),('2015_05_19_190459_create_eventos_table',1),('2015_05_19_190459_create_faq_table',1),('2015_05_19_190459_create_home_video_table',1),('2015_05_19_190459_create_logfile_table',1),('2015_05_19_190459_create_modules_table',1),('2015_05_19_190459_create_muro_table',1),('2015_05_19_190459_create_noticias_table',1),('2015_05_19_190459_create_permissions_roles_table',1),('2015_05_19_190459_create_permissions_table',1),('2015_05_19_190459_create_permissions_users_table',1),('2015_05_19_190459_create_profiles_table',1),('2015_05_19_190459_create_registrados_table',1),('2015_05_19_190459_create_roles_table',1),('2015_05_19_190459_create_unete_nosotros_table',1),('2015_05_19_190459_create_users_chart_report_table',1),('2015_05_19_190459_create_users_notes_table',1),('2015_05_19_190459_create_users_table',1),('2015_05_19_184459_create_categorias_table',1),('2015_05_19_184459_create_causas_donadores_table',1),('2015_05_19_184459_create_causas_table',1),('2015_05_19_184459_create_contacto_table',1),('2015_05_19_184459_create_donadores_table',1),('2015_05_19_184459_create_eventos_table',1),('2015_05_19_184459_create_faq_table',1),('2015_05_19_184459_create_home_video_table',1),('2015_05_19_184459_create_logfile_table',1),('2015_05_19_184459_create_modules_table',1),('2015_05_19_184459_create_muro_table',1),('2015_05_19_184459_create_noticias_table',1),('2015_05_19_184459_create_permissions_roles_table',1),('2015_05_19_184459_create_permissions_table',1),('2015_05_19_184459_create_permissions_users_table',1),('2015_05_19_184459_create_profiles_table',1),('2015_05_19_184459_create_registrados_table',1),('2015_05_19_184459_create_roles_table',1),('2015_05_19_184459_create_unete_nosotros_table',1),('2015_05_19_184459_create_users_chart_report_table',1),('2015_05_19_184459_create_users_notes_table',1),('2015_05_19_184459_create_users_table',1),('2015_05_07_170604_create_apoyamos_causa_table',1),('2015_05_07_170604_create_causas_donadores_table',1),('2015_05_07_170604_create_causas_table',1),('2015_05_07_170604_create_contacto_table',1),('2015_05_07_170604_create_donadores_table',1),('2015_05_07_170604_create_eventos_table',1),('2015_05_07_170604_create_faq_table',1),('2015_05_07_170604_create_home_video_table',1),('2015_05_07_170604_create_logfile_table',1),('2015_05_07_170604_create_modules_table',1),('2015_05_07_170604_create_noticias_table',1),('2015_05_07_170604_create_permissions_roles_table',1),('2015_05_07_170604_create_permissions_table',1),('2015_05_07_170604_create_permissions_users_table',1),('2015_05_07_170604_create_registrados_table',1),('2015_05_07_170604_create_roles_table',1),('2015_05_07_170604_create_unete_nosotros_table',1),('2015_05_07_170604_create_users_chart_report_table',1),('2015_05_07_170604_create_users_notes_table',1),('2015_05_07_170604_create_users_table',1),('2015_05_12_164400_create_apoyamos_causa_table',0),('2015_05_12_164400_create_categorias_table',0),('2015_05_12_164400_create_causas_table',0),('2015_05_12_164400_create_causas_donadores_table',0),('2015_05_12_164400_create_contacto_table',0),('2015_05_12_164400_create_donadores_table',0),('2015_05_12_164400_create_eventos_table',0),('2015_05_12_164400_create_faq_table',0),('2015_05_12_164400_create_home_video_table',0),('2015_05_12_164400_create_logfile_table',0),('2015_05_12_164400_create_modules_table',0),('2015_05_12_164400_create_muro_table',0),('2015_05_12_164400_create_noticias_table',0),('2015_05_12_164400_create_permissions_table',0),('2015_05_12_164400_create_permissions_roles_table',0),('2015_05_12_164400_create_permissions_users_table',0),('2015_05_12_164400_create_profiles_table',0),('2015_05_12_164400_create_registrados_table',0),('2015_05_12_164400_create_roles_table',0),('2015_05_12_164400_create_unete_nosotros_table',0),('2015_05_12_164400_create_users_table',0),('2015_05_12_164400_create_users_chart_report_table',0),('2015_05_12_164400_create_users_notes_table',0),('2015_05_12_164402_add_foreign_keys_to_causas_table',0),('2015_05_19_133415_create_apoyamos_causa_table',0),('2015_05_19_133415_create_categorias_table',0),('2015_05_19_133415_create_causas_table',0),('2015_05_19_133415_create_causas_donadores_table',0),('2015_05_19_133415_create_contacto_table',0),('2015_05_19_133415_create_donadores_table',0),('2015_05_19_133415_create_eventos_table',0),('2015_05_19_133415_create_faq_table',0),('2015_05_19_133415_create_home_video_table',0),('2015_05_19_133415_create_logfile_table',0),('2015_05_19_133415_create_modules_table',0),('2015_05_19_133415_create_muro_table',0),('2015_05_19_133415_create_noticias_table',0),('2015_05_19_133415_create_permissions_table',0),('2015_05_19_133415_create_permissions_roles_table',0),('2015_05_19_133415_create_permissions_users_table',0),('2015_05_19_133415_create_profiles_table',0),('2015_05_19_133415_create_registrados_table',0),('2015_05_19_133415_create_roles_table',0),('2015_05_19_133415_create_unete_nosotros_table',0),('2015_05_19_133415_create_users_table',0),('2015_05_19_133415_create_users_chart_report_table',0),('2015_05_19_133415_create_users_notes_table',0),('2015_05_19_133416_add_foreign_keys_to_causas_table',0),('2015_05_19_190459_create_categorias_table',0),('2015_05_19_190459_create_causas_table',0),('2015_05_19_190459_create_causas_donadores_table',0),('2015_05_19_190459_create_contacto_table',0),('2015_05_19_190459_create_donadores_table',0),('2015_05_19_190459_create_eventos_table',0),('2015_05_19_190459_create_faq_table',0),('2015_05_19_190459_create_home_video_table',0),('2015_05_19_190459_create_logfile_table',0),('2015_05_19_190459_create_modules_table',0),('2015_05_19_190459_create_muro_table',0),('2015_05_19_190459_create_noticias_table',0),('2015_05_19_190459_create_permissions_table',0),('2015_05_19_190459_create_permissions_roles_table',0),('2015_05_19_190459_create_permissions_users_table',0),('2015_05_19_190459_create_profiles_table',0),('2015_05_19_190459_create_registrados_table',0),('2015_05_19_190459_create_roles_table',0),('2015_05_19_190459_create_unete_nosotros_table',0),('2015_05_19_190459_create_users_table',0),('2015_05_19_190459_create_users_chart_report_table',0),('2015_05_19_190459_create_users_notes_table',0);
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
INSERT INTO `users` VALUES (1,'Carlos','Cuellar','Male','ccuellarlira@gmail.com','$2y$10$B1Q0CZxgeFZiMxZA2QxfpeyNaENzRNktR/timIJKWkw/pdE58mYea',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:37','2015-05-07 22:14:37'),(2,'Erick','Vizcaya','Female','erick@vizcaya.pro','$2y$10$4AujVwrlt7HltQiP.Hjomu/aGv/bE80ZJAZu8PMfyPoAH8cdP20GK',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:38','2015-05-07 22:14:38'),(3,'Miguel','Martinez','Female','natacion@gmail.com','$2y$10$pIUZfrvvyRvEDuFYaCsXdOCYknOudfyCl2hu3r/uEGE69Zp/l3wMS',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:38','2015-05-07 22:14:38'),(4,'Eric','Bravo','Female','eric.bravo.rod@gmail.com','$2y$10$w.JxNn1QIY1Hl5Z05llDm.7WPuxn4I18qOPrjfTge4FOC3ws0REfS',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:39','2015-05-07 22:14:39');
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

-- Dump completed on 2015-05-19 14:46:49
