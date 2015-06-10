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
INSERT INTO `causas` VALUES (1,'Roberto Alonso Espinosa','2015-06-01','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',193000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'132c6798b19b4dab13596bb3a9ec6256',1,0,4,4,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(2,'Museo Amparo','2015-05-14','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',193000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'bcf2f88dd7020e0882ad27dbd4130758',2,0,4,4,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(3,'Centro Comercial \"La Victoria\"','2015-05-28','Desarrollo y crecimiento del Centro de Desarrollo Comunitario Roberto Alonso Espinosa, ubicado en la colonia Lomas de Chamontoya en la Ciudad de México y otro en el municipio de Zacatlán, Puebla, los cuales brindan atención, bajo el Método Montessori, a la comunidad infantil de muy escasos recursos, ampliando el beneficio al ambiente familiar.',10000,0,NULL,'http://facebook.com','http://twitter.com',NULL,'b4a604bc76648b6c321ec1d692a31573',5,0,4,4,'2015-05-07 22:20:16','2015-05-07 22:20:16');
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
INSERT INTO `contacto` VALUES (1,'Test','5555555555','a@a.com','Mensaje de prueba','127.0.0.1',4,0,'2015-05-22 15:37:50','2015-05-22 15:37:50');
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `donaciones`
--

LOCK TABLES `donaciones` WRITE;
/*!40000 ALTER TABLE `donaciones` DISABLE KEYS */;
INSERT INTO `donaciones` VALUES (1,'ebravo@itcitrus.mx',1,100,'FNDAMP-67471411-1433268581','556df1a124122917b60016d4','visa','credit',1,1,0,0,'2015-06-02 18:09:48','2015-06-02 18:09:48'),(2,'ebravo@itcitrus.mx',1,100,'FNDAMP-856253054-1433268766','556df25a2412294287001420','visa','credit',1,1,0,0,'2015-06-02 18:12:53','2015-06-02 18:12:53'),(3,'ebravo@itcitrus.mx',1,15,'FNDAMP-2022127563-1433269550','556df61e19ce88213b00156e',NULL,'oxxo',0,1,0,0,'2015-06-02 18:25:51','2015-06-02 18:25:51'),(4,'ebravo@itcitrus.mx',1,20,'FNDAMP-1857102832-1433270151','556df87719ce88b84800174b',NULL,'spei',0,1,0,0,'2015-06-02 18:35:52','2015-06-02 18:35:52'),(5,'ebravo@itcitrus.mx',1,20,'FNDAMP-1972932508-1433271558','556dfdf619ce88b4f3001b4c',NULL,'spei',0,0,0,0,'2015-06-02 18:59:19','2015-06-02 18:59:19'),(6,'ebravo@itcitrus.mx',2,40,'FNDAMP-1422018331-1433271723','556dfe9a19ce88b4f3001b71',NULL,'spei',0,0,0,0,'2015-06-02 19:02:03','2015-06-02 19:02:03'),(7,'a@a.com',1,55,'FNDAMP-1270232800-1433277120','556e13b019ce8826e000003c',NULL,'oxxo',0,0,0,0,'2015-06-02 20:32:00','2015-06-02 20:32:00'),(8,'eric.bravo.rod@gmail.com',3,100,'FNDAMP-1005810879-1433439774','55708f1219ce88fbab004d85','visa','credit',1,1,0,0,'2015-06-04 17:42:59','2015-06-04 17:42:59');
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
INSERT INTO `faq` VALUES (1,'¿Cuáles son las formas de ayudar?','Es muy fácil entra al muro de causas vivas, selecciona la causa a la que quieras ayudar, y haz clic en el botón de donar. Selecciona la cantidad que quieres que se te cargue, si es un cobro único o recurrente y dale aceptar. Llena tus datos y los de tu tarjeta de crédito o débito y realiza el cargo via Paypal.',4,0,'2015-05-21 23:49:55','2015-05-21 23:49:55'),(2,'¿Cómo puedo ser donador?','Es muy fácil entra al muro de causas vivas, selecciona la causa a la que quieras ayudar, y haz clic en el botón de donar. Selecciona la cantidad que quieres que se te cargue, si es un cobro único o recurrente y dale aceptar. Llena tus datos y los de tu tarjeta de crédito o débito y realiza el cargo via Paypal.',4,0,'2015-05-21 23:50:22','2015-05-21 23:50:22'),(3,'¿Cómo puedo ser impulsor?','Es muy fácil entra al muro de causas vivas, selecciona la causa a la que quieras ayudar, y haz clic en el botón de donar. Selecciona la cantidad que quieres que se te cargue, si es un cobro único o recurrente y dale aceptar. Llena tus datos y los de tu tarjeta de crédito o débito y realiza el cargo via Paypal.',4,0,'2015-05-21 23:50:49','2015-05-21 23:50:49'),(4,'¿Cómo puedo ser voluntario?','Es muy fácil entra al muro de causas vivas, selecciona la causa a la que quieras ayudar, y haz clic en el botón de donar. Selecciona la cantidad que quieres que se te cargue, si es un cobro único o recurrente y dale aceptar. Llena tus datos y los de tu tarjeta de crédito o débito y realiza el cargo via Paypal.',4,0,'2015-05-21 23:51:07','2015-05-21 23:51:07'),(5,'¿Las donaciones con mi tarjeta de crédito o débito son seguras?','Es muy fácil entra al muro de causas vivas, selecciona la causa a la que quieras ayudar, y haz clic en el botón de donar. Selecciona la cantidad que quieres que se te cargue, si es un cobro único o recurrente y dale aceptar. Llena tus datos y los de tu tarjeta de crédito o débito y realiza el cargo via Paypal.',4,0,'2015-05-21 23:51:23','2015-05-21 23:51:23');
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
INSERT INTO `logfile` VALUES (1,1,'causas','created','127.0.0.1',4,0,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(2,1,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:18:01','2015-05-07 22:18:01'),(3,2,'causas','created','127.0.0.1',4,0,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(4,2,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:19:26','2015-05-07 22:19:26'),(5,3,'causas','created','127.0.0.1',4,0,'2015-05-07 22:20:16','2015-05-07 22:20:16'),(6,3,'causas','updated','127.0.0.1',4,0,'2015-05-07 22:20:16','2015-05-07 22:20:16'),(7,1,'home_video','created','127.0.0.1',4,0,'2015-05-07 22:21:11','2015-05-07 22:21:11'),(8,1,'home_video','updated','127.0.0.1',4,0,'2015-05-07 22:21:11','2015-05-07 22:21:11'),(9,1,'membresias','created','127.0.0.1',4,0,'2015-05-20 18:38:21','2015-05-20 18:38:21'),(10,1,'membresias','updated','127.0.0.1',4,0,'2015-05-20 18:38:35','2015-05-20 18:38:35'),(11,2,'membresias','created','127.0.0.1',4,0,'2015-05-20 19:00:57','2015-05-20 19:00:57'),(12,2,'membresias','updated','127.0.0.1',4,0,'2015-05-20 19:00:57','2015-05-20 19:00:57'),(13,3,'membresias','created','127.0.0.1',4,0,'2015-05-20 19:02:13','2015-05-20 19:02:13'),(14,3,'membresias','updated','127.0.0.1',4,0,'2015-05-20 19:02:13','2015-05-20 19:02:13'),(15,1,'faq','created','127.0.0.1',4,0,'2015-05-21 23:49:55','2015-05-21 23:49:55'),(16,2,'faq','created','127.0.0.1',4,0,'2015-05-21 23:50:22','2015-05-21 23:50:22'),(17,3,'faq','created','127.0.0.1',4,0,'2015-05-21 23:50:49','2015-05-21 23:50:49'),(18,4,'faq','created','127.0.0.1',4,0,'2015-05-21 23:51:07','2015-05-21 23:51:07'),(19,5,'faq','created','127.0.0.1',4,0,'2015-05-21 23:51:23','2015-05-21 23:51:23'),(20,1,'contacto','created','127.0.0.1',4,0,'2015-05-22 15:37:50','2015-05-22 15:37:50'),(21,4,'users','updated','127.0.0.1',4,0,'2015-06-10 19:30:59','2015-06-10 19:30:59');
/*!40000 ALTER TABLE `logfile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `membresias`
--

LOCK TABLES `membresias` WRITE;
/*!40000 ALTER TABLE `membresias` DISABLE KEYS */;
INSERT INTO `membresias` VALUES (1,'FEMAM','Federación Mexicana de Asociaciones de Amigos de los Museos (FEMAM) se constituyó el 21 de octubre de 1991. Es un organismo independiente sin fines de lucro que tiene como objetivo preservar el patrimonio cultural de México a través de Patronatos y Asociaciones de Amigos de los Museos de toda la República en beneficio de nuestra sociedad. ','http://www.femam.org.mx',NULL,'8418b9141825296eae85a683f0c49abc',0,4,4,'2015-05-20 13:38:21','2015-05-20 13:38:35'),(2,'CEMEFI','El Centro Mexicano para la Filantropía (CEMEFI) es una asociación civil fundada en diciembre de 1988. Es una institución privada, no lucrativa, sin ninguna filiación a partido, raza o religión. Cuenta con permiso del Gobierno de México para recibir donativos deducibles de impuestos. Su sede se encuentra en la Ciudad de México y su ámbito de acción abarca todo el país.','http://www.proyectoroberto.com.mx',NULL,'482e1ac7e6a4513696b772713a115ab8',0,4,4,'2015-05-20 14:00:57','2015-05-20 14:00:57'),(3,'JIB','Es un organo administrativo desconcentrado por función que tiene por objetivo inspeccionar y vigilar la administración de las instituciones de beneficencia privada en el estado de Puebla, evitando así que se desvirtúe el objetivo original por el cual fueron constituidas y evitando la violación de la voluntad de los fundadores.','http://www.jib.org',NULL,'898cfa8a1ebaff5be9210190174beea3',0,4,4,'2015-05-20 14:02:13','2015-05-20 14:02:13');
/*!40000 ALTER TABLE `membresias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2015_06_04_181931_create_apoyamos_causa_table',1),('2015_06_04_181931_create_categorias_table',1),('2015_06_04_181931_create_causas_donadores_table',1),('2015_06_04_181931_create_causas_table',1),('2015_06_04_181931_create_contacto_table',1),('2015_06_04_181931_create_donaciones_table',1),('2015_06_04_181931_create_donadores_table',1),('2015_06_04_181931_create_eventos_table',1),('2015_06_04_181931_create_faq_table',1),('2015_06_04_181931_create_home_video_table',1),('2015_06_04_181931_create_logfile_table',1),('2015_06_04_181931_create_membresias_table',1),('2015_06_04_181931_create_modules_table',1),('2015_06_04_181931_create_muro_table',1),('2015_06_04_181931_create_noticias_table',1),('2015_06_04_181931_create_password_reminders_table',1),('2015_06_04_181931_create_permissions_roles_table',1),('2015_06_04_181931_create_permissions_table',1),('2015_06_04_181931_create_permissions_users_table',1),('2015_06_04_181931_create_profiles_table',1),('2015_06_04_181931_create_promedios_table',1),('2015_06_04_181931_create_registrados_table',1),('2015_06_04_181931_create_roles_table',1),('2015_06_04_181931_create_tipo_causas_table',1),('2015_06_04_181931_create_unete_nosotros_table',1),('2015_06_04_181931_create_users_chart_report_table',1),('2015_06_04_181931_create_users_notes_table',1),('2015_06_04_181931_create_users_table',1),('2015_06_04_101938_create_apoyamos_causa_table',1),('2015_06_04_101938_create_categorias_table',1),('2015_06_04_101938_create_causas_donadores_table',1),('2015_06_04_101938_create_causas_table',1),('2015_06_04_101938_create_contacto_table',1),('2015_06_04_101938_create_donaciones_table',1),('2015_06_04_101938_create_donadores_table',1),('2015_06_04_101938_create_eventos_table',1),('2015_06_04_101938_create_faq_table',1),('2015_06_04_101938_create_home_video_table',1),('2015_06_04_101938_create_logfile_table',1),('2015_06_04_101938_create_membresias_table',1),('2015_06_04_101938_create_modules_table',1),('2015_06_04_101938_create_muro_table',1),('2015_06_04_101938_create_noticias_table',1),('2015_06_04_101938_create_permissions_roles_table',1),('2015_06_04_101938_create_permissions_table',1),('2015_06_04_101938_create_permissions_users_table',1),('2015_06_04_101938_create_profiles_table',1),('2015_06_04_101938_create_promedios_table',1),('2015_06_04_101938_create_registrados_table',1),('2015_06_04_101938_create_roles_table',1),('2015_06_04_101938_create_tipo_causas_table',1),('2015_06_04_101938_create_unete_nosotros_table',1),('2015_06_04_101938_create_users_chart_report_table',1),('2015_06_04_101938_create_users_notes_table',1),('2015_06_04_101938_create_users_table',1),('2015_05_28_111654_create_apoyamos_causa_table',1),('2015_05_28_111654_create_categorias_table',1),('2015_05_28_111654_create_causas_donadores_table',1),('2015_05_28_111654_create_causas_table',1),('2015_05_28_111654_create_contacto_table',1),('2015_05_28_111654_create_donaciones_table',1),('2015_05_28_111654_create_donadores_table',1),('2015_05_28_111654_create_eventos_table',1),('2015_05_28_111654_create_faq_table',1),('2015_05_28_111654_create_home_video_table',1),('2015_05_28_111654_create_logfile_table',1),('2015_05_28_111654_create_membresias_table',1),('2015_05_28_111654_create_modules_table',1),('2015_05_28_111654_create_muro_table',1),('2015_05_28_111654_create_noticias_table',1),('2015_05_28_111654_create_permissions_roles_table',1),('2015_05_28_111654_create_permissions_table',1),('2015_05_28_111654_create_permissions_users_table',1),('2015_05_28_111654_create_profiles_table',1),('2015_05_28_111654_create_promedios_table',1),('2015_05_28_111654_create_registrados_table',1),('2015_05_28_111654_create_roles_table',1),('2015_05_28_111654_create_tipo_causas_table',1),('2015_05_28_111654_create_unete_nosotros_table',1),('2015_05_28_111654_create_users_chart_report_table',1),('2015_05_28_111654_create_users_notes_table',1),('2015_05_28_111654_create_users_table',1),('2015_05_22_115846_create_apoyamos_causa_table',1),('2015_05_22_115846_create_categorias_table',1),('2015_05_22_115846_create_causas_donadores_table',1),('2015_05_22_115846_create_causas_table',1),('2015_05_22_115846_create_contacto_table',1),('2015_05_22_115846_create_donadores_table',1),('2015_05_22_115846_create_eventos_table',1),('2015_05_22_115846_create_faq_table',1),('2015_05_22_115846_create_home_video_table',1),('2015_05_22_115846_create_logfile_table',1),('2015_05_22_115846_create_membresias_table',1),('2015_05_22_115846_create_modules_table',1),('2015_05_22_115846_create_muro_table',1),('2015_05_22_115846_create_noticias_table',1),('2015_05_22_115846_create_permissions_roles_table',1),('2015_05_22_115846_create_permissions_table',1),('2015_05_22_115846_create_permissions_users_table',1),('2015_05_22_115846_create_profiles_table',1),('2015_05_22_115846_create_promedios_table',1),('2015_05_22_115846_create_registrados_table',1),('2015_05_22_115846_create_roles_table',1),('2015_05_22_115846_create_tipo_causas_table',1),('2015_05_22_115846_create_unete_nosotros_table',1),('2015_05_22_115846_create_users_chart_report_table',1),('2015_05_22_115846_create_users_notes_table',1),('2015_05_22_115846_create_users_table',1),('2015_05_22_100604_create_apoyamos_causa_table',1),('2015_05_22_100604_create_categorias_table',1),('2015_05_22_100604_create_causas_donadores_table',1),('2015_05_22_100604_create_causas_table',1),('2015_05_22_100604_create_contacto_table',1),('2015_05_22_100604_create_donadores_table',1),('2015_05_22_100604_create_eventos_table',1),('2015_05_22_100604_create_faq_table',1),('2015_05_22_100604_create_home_video_table',1),('2015_05_22_100604_create_logfile_table',1),('2015_05_22_100604_create_membresias_table',1),('2015_05_22_100604_create_modules_table',1),('2015_05_22_100604_create_muro_table',1),('2015_05_22_100604_create_noticias_table',1),('2015_05_22_100604_create_permissions_roles_table',1),('2015_05_22_100604_create_permissions_table',1),('2015_05_22_100604_create_permissions_users_table',1),('2015_05_22_100604_create_profiles_table',1),('2015_05_22_100604_create_promedios_table',1),('2015_05_22_100604_create_registrados_table',1),('2015_05_22_100604_create_roles_table',1),('2015_05_22_100604_create_unete_nosotros_table',1),('2015_05_22_100604_create_users_chart_report_table',1),('2015_05_22_100604_create_users_notes_table',1),('2015_05_22_100604_create_users_table',1),('2015_05_21_192552_create_apoyamos_causa_table',1),('2015_05_21_192552_create_categorias_table',1),('2015_05_21_192552_create_causas_donadores_table',1),('2015_05_21_192552_create_causas_table',1),('2015_05_21_192552_create_contacto_table',1),('2015_05_21_192552_create_donadores_table',1),('2015_05_21_192552_create_eventos_table',1),('2015_05_21_192552_create_faq_table',1),('2015_05_21_192552_create_home_video_table',1),('2015_05_21_192552_create_logfile_table',1),('2015_05_21_192552_create_membresias_table',1),('2015_05_21_192552_create_modules_table',1),('2015_05_21_192552_create_muro_table',1),('2015_05_21_192552_create_noticias_table',1),('2015_05_21_192552_create_permissions_roles_table',1),('2015_05_21_192552_create_permissions_table',1),('2015_05_21_192552_create_permissions_users_table',1),('2015_05_21_192552_create_profiles_table',1),('2015_05_21_192552_create_promedios_table',1),('2015_05_21_192552_create_registrados_table',1),('2015_05_21_192552_create_roles_table',1),('2015_05_21_192552_create_unete_nosotros_table',1),('2015_05_21_192552_create_users_chart_report_table',1),('2015_05_21_192552_create_users_notes_table',1),('2015_05_21_192552_create_users_table',1),('2015_05_21_182546_create_apoyamos_causa_table',1),('2015_05_21_182546_create_categorias_table',1),('2015_05_21_182546_create_causas_donadores_table',1),('2015_05_21_182546_create_causas_table',1),('2015_05_21_182546_create_contacto_table',1),('2015_05_21_182546_create_donadores_table',1),('2015_05_21_182546_create_eventos_table',1),('2015_05_21_182546_create_faq_table',1),('2015_05_21_182546_create_home_video_table',1),('2015_05_21_182546_create_logfile_table',1),('2015_05_21_182546_create_membresias_table',1),('2015_05_21_182546_create_modules_table',1),('2015_05_21_182546_create_muro_table',1),('2015_05_21_182546_create_noticias_table',1),('2015_05_21_182546_create_permissions_roles_table',1),('2015_05_21_182546_create_permissions_table',1),('2015_05_21_182546_create_permissions_users_table',1),('2015_05_21_182546_create_profiles_table',1),('2015_05_21_182546_create_promedios_table',1),('2015_05_21_182546_create_registrados_table',1),('2015_05_21_182546_create_roles_table',1),('2015_05_21_182546_create_unete_nosotros_table',1),('2015_05_21_182546_create_users_chart_report_table',1),('2015_05_21_182546_create_users_notes_table',1),('2015_05_21_182546_create_users_table',1),('2015_05_20_175723_create_categorias_table',1),('2015_05_20_175723_create_causas_donadores_table',1),('2015_05_20_175723_create_causas_table',1),('2015_05_20_175723_create_contacto_table',1),('2015_05_20_175723_create_donadores_table',1),('2015_05_20_175723_create_eventos_table',1),('2015_05_20_175723_create_faq_table',1),('2015_05_20_175723_create_home_video_table',1),('2015_05_20_175723_create_logfile_table',1),('2015_05_20_175723_create_membresias_table',1),('2015_05_20_175723_create_modules_table',1),('2015_05_20_175723_create_muro_table',1),('2015_05_20_175723_create_noticias_table',1),('2015_05_20_175723_create_permissions_roles_table',1),('2015_05_20_175723_create_permissions_table',1),('2015_05_20_175723_create_permissions_users_table',1),('2015_05_20_175723_create_profiles_table',1),('2015_05_20_175723_create_promedios_table',1),('2015_05_20_175723_create_registrados_table',1),('2015_05_20_175723_create_roles_table',1),('2015_05_20_175723_create_unete_nosotros_table',1),('2015_05_20_175723_create_users_chart_report_table',1),('2015_05_20_175723_create_users_notes_table',1),('2015_05_20_175723_create_users_table',1),('2015_05_19_190459_create_categorias_table',1),('2015_05_19_190459_create_causas_donadores_table',1),('2015_05_19_190459_create_causas_table',1),('2015_05_19_190459_create_contacto_table',1),('2015_05_19_190459_create_donadores_table',1),('2015_05_19_190459_create_eventos_table',1),('2015_05_19_190459_create_faq_table',1),('2015_05_19_190459_create_home_video_table',1),('2015_05_19_190459_create_logfile_table',1),('2015_05_19_190459_create_modules_table',1),('2015_05_19_190459_create_muro_table',1),('2015_05_19_190459_create_noticias_table',1),('2015_05_19_190459_create_permissions_roles_table',1),('2015_05_19_190459_create_permissions_table',1),('2015_05_19_190459_create_permissions_users_table',1),('2015_05_19_190459_create_profiles_table',1),('2015_05_19_190459_create_registrados_table',1),('2015_05_19_190459_create_roles_table',1),('2015_05_19_190459_create_unete_nosotros_table',1),('2015_05_19_190459_create_users_chart_report_table',1),('2015_05_19_190459_create_users_notes_table',1),('2015_05_19_190459_create_users_table',1),('2015_05_19_184459_create_categorias_table',1),('2015_05_19_184459_create_causas_donadores_table',1),('2015_05_19_184459_create_causas_table',1),('2015_05_19_184459_create_contacto_table',1),('2015_05_19_184459_create_donadores_table',1),('2015_05_19_184459_create_eventos_table',1),('2015_05_19_184459_create_faq_table',1),('2015_05_19_184459_create_home_video_table',1),('2015_05_19_184459_create_logfile_table',1),('2015_05_19_184459_create_modules_table',1),('2015_05_19_184459_create_muro_table',1),('2015_05_19_184459_create_noticias_table',1),('2015_05_19_184459_create_permissions_roles_table',1),('2015_05_19_184459_create_permissions_table',1),('2015_05_19_184459_create_permissions_users_table',1),('2015_05_19_184459_create_profiles_table',1),('2015_05_19_184459_create_registrados_table',1),('2015_05_19_184459_create_roles_table',1),('2015_05_19_184459_create_unete_nosotros_table',1),('2015_05_19_184459_create_users_chart_report_table',1),('2015_05_19_184459_create_users_notes_table',1),('2015_05_19_184459_create_users_table',1),('2015_05_07_170604_create_apoyamos_causa_table',1),('2015_05_07_170604_create_causas_donadores_table',1),('2015_05_07_170604_create_causas_table',1),('2015_05_07_170604_create_contacto_table',1),('2015_05_07_170604_create_donadores_table',1),('2015_05_07_170604_create_eventos_table',1),('2015_05_07_170604_create_faq_table',1),('2015_05_07_170604_create_home_video_table',1),('2015_05_07_170604_create_logfile_table',1),('2015_05_07_170604_create_modules_table',1),('2015_05_07_170604_create_noticias_table',1),('2015_05_07_170604_create_permissions_roles_table',1),('2015_05_07_170604_create_permissions_table',1),('2015_05_07_170604_create_permissions_users_table',1),('2015_05_07_170604_create_registrados_table',1),('2015_05_07_170604_create_roles_table',1),('2015_05_07_170604_create_unete_nosotros_table',1),('2015_05_07_170604_create_users_chart_report_table',1),('2015_05_07_170604_create_users_notes_table',1),('2015_05_07_170604_create_users_table',1),('2015_05_12_164400_create_apoyamos_causa_table',0),('2015_05_12_164400_create_categorias_table',0),('2015_05_12_164400_create_causas_table',0),('2015_05_12_164400_create_causas_donadores_table',0),('2015_05_12_164400_create_contacto_table',0),('2015_05_12_164400_create_donadores_table',0),('2015_05_12_164400_create_eventos_table',0),('2015_05_12_164400_create_faq_table',0),('2015_05_12_164400_create_home_video_table',0),('2015_05_12_164400_create_logfile_table',0),('2015_05_12_164400_create_modules_table',0),('2015_05_12_164400_create_muro_table',0),('2015_05_12_164400_create_noticias_table',0),('2015_05_12_164400_create_permissions_table',0),('2015_05_12_164400_create_permissions_roles_table',0),('2015_05_12_164400_create_permissions_users_table',0),('2015_05_12_164400_create_profiles_table',0),('2015_05_12_164400_create_registrados_table',0),('2015_05_12_164400_create_roles_table',0),('2015_05_12_164400_create_unete_nosotros_table',0),('2015_05_12_164400_create_users_table',0),('2015_05_12_164400_create_users_chart_report_table',0),('2015_05_12_164400_create_users_notes_table',0),('2015_05_12_164402_add_foreign_keys_to_causas_table',0),('2015_05_19_133415_create_apoyamos_causa_table',0),('2015_05_19_133415_create_categorias_table',0),('2015_05_19_133415_create_causas_table',0),('2015_05_19_133415_create_causas_donadores_table',0),('2015_05_19_133415_create_contacto_table',0),('2015_05_19_133415_create_donadores_table',0),('2015_05_19_133415_create_eventos_table',0),('2015_05_19_133415_create_faq_table',0),('2015_05_19_133415_create_home_video_table',0),('2015_05_19_133415_create_logfile_table',0),('2015_05_19_133415_create_modules_table',0),('2015_05_19_133415_create_muro_table',0),('2015_05_19_133415_create_noticias_table',0),('2015_05_19_133415_create_permissions_table',0),('2015_05_19_133415_create_permissions_roles_table',0),('2015_05_19_133415_create_permissions_users_table',0),('2015_05_19_133415_create_profiles_table',0),('2015_05_19_133415_create_registrados_table',0),('2015_05_19_133415_create_roles_table',0),('2015_05_19_133415_create_unete_nosotros_table',0),('2015_05_19_133415_create_users_table',0),('2015_05_19_133415_create_users_chart_report_table',0),('2015_05_19_133415_create_users_notes_table',0),('2015_05_19_133416_add_foreign_keys_to_causas_table',0),('2015_05_19_190459_create_categorias_table',0),('2015_05_19_190459_create_causas_table',0),('2015_05_19_190459_create_causas_donadores_table',0),('2015_05_19_190459_create_contacto_table',0),('2015_05_19_190459_create_donadores_table',0),('2015_05_19_190459_create_eventos_table',0),('2015_05_19_190459_create_faq_table',0),('2015_05_19_190459_create_home_video_table',0),('2015_05_19_190459_create_logfile_table',0),('2015_05_19_190459_create_modules_table',0),('2015_05_19_190459_create_muro_table',0),('2015_05_19_190459_create_noticias_table',0),('2015_05_19_190459_create_permissions_table',0),('2015_05_19_190459_create_permissions_roles_table',0),('2015_05_19_190459_create_permissions_users_table',0),('2015_05_19_190459_create_profiles_table',0),('2015_05_19_190459_create_registrados_table',0),('2015_05_19_190459_create_roles_table',0),('2015_05_19_190459_create_unete_nosotros_table',0),('2015_05_19_190459_create_users_table',0),('2015_05_19_190459_create_users_chart_report_table',0),('2015_05_19_190459_create_users_notes_table',0),('2015_05_20_130413_create_categorias_table',0),('2015_05_20_130413_create_causas_table',0),('2015_05_20_130413_create_causas_donadores_table',0),('2015_05_20_130413_create_contacto_table',0),('2015_05_20_130413_create_donadores_table',0),('2015_05_20_130413_create_eventos_table',0),('2015_05_20_130413_create_faq_table',0),('2015_05_20_130413_create_home_video_table',0),('2015_05_20_130413_create_logfile_table',0),('2015_05_20_130413_create_membresias_table',0),('2015_05_20_130413_create_modules_table',0),('2015_05_20_130413_create_muro_table',0),('2015_05_20_130413_create_noticias_table',0),('2015_05_20_130413_create_permissions_table',0),('2015_05_20_130413_create_permissions_roles_table',0),('2015_05_20_130413_create_permissions_users_table',0),('2015_05_20_130413_create_profiles_table',0),('2015_05_20_130413_create_registrados_table',0),('2015_05_20_130413_create_roles_table',0),('2015_05_20_130413_create_unete_nosotros_table',0),('2015_05_20_130413_create_users_table',0),('2015_05_20_130413_create_users_chart_report_table',0),('2015_05_20_130413_create_users_notes_table',0),('2015_05_20_172821_create_categorias_table',0),('2015_05_20_172821_create_causas_table',0),('2015_05_20_172821_create_causas_donadores_table',0),('2015_05_20_172821_create_contacto_table',0),('2015_05_20_172821_create_donadores_table',0),('2015_05_20_172821_create_eventos_table',0),('2015_05_20_172821_create_faq_table',0),('2015_05_20_172821_create_home_video_table',0),('2015_05_20_172821_create_logfile_table',0),('2015_05_20_172821_create_membresias_table',0),('2015_05_20_172821_create_modules_table',0),('2015_05_20_172821_create_muro_table',0),('2015_05_20_172821_create_noticias_table',0),('2015_05_20_172821_create_permissions_table',0),('2015_05_20_172821_create_permissions_roles_table',0),('2015_05_20_172821_create_permissions_users_table',0),('2015_05_20_172821_create_profiles_table',0),('2015_05_20_172821_create_promedios_table',0),('2015_05_20_172821_create_registrados_table',0),('2015_05_20_172821_create_roles_table',0),('2015_05_20_172821_create_unete_nosotros_table',0),('2015_05_20_172821_create_users_table',0),('2015_05_20_172821_create_users_chart_report_table',0),('2015_05_20_172821_create_users_notes_table',0),('2015_05_21_181114_create_apoyamos_causa_table',0),('2015_05_21_181114_create_categorias_table',0),('2015_05_21_181114_create_causas_table',0),('2015_05_21_181114_create_causas_donadores_table',0),('2015_05_21_181114_create_contacto_table',0),('2015_05_21_181114_create_donadores_table',0),('2015_05_21_181114_create_eventos_table',0),('2015_05_21_181114_create_faq_table',0),('2015_05_21_181114_create_home_video_table',0),('2015_05_21_181114_create_logfile_table',0),('2015_05_21_181114_create_membresias_table',0),('2015_05_21_181114_create_modules_table',0),('2015_05_21_181114_create_muro_table',0),('2015_05_21_181114_create_noticias_table',0),('2015_05_21_181114_create_permissions_table',0),('2015_05_21_181114_create_permissions_roles_table',0),('2015_05_21_181114_create_permissions_users_table',0),('2015_05_21_181114_create_profiles_table',0),('2015_05_21_181114_create_promedios_table',0),('2015_05_21_181114_create_registrados_table',0),('2015_05_21_181114_create_roles_table',0),('2015_05_21_181114_create_unete_nosotros_table',0),('2015_05_21_181114_create_users_table',0),('2015_05_21_181114_create_users_chart_report_table',0),('2015_05_21_181114_create_users_notes_table',0),('2015_05_21_182546_create_apoyamos_causa_table',0),('2015_05_21_182546_create_categorias_table',0),('2015_05_21_182546_create_causas_table',0),('2015_05_21_182546_create_causas_donadores_table',0),('2015_05_21_182546_create_contacto_table',0),('2015_05_21_182546_create_donadores_table',0),('2015_05_21_182546_create_eventos_table',0),('2015_05_21_182546_create_faq_table',0),('2015_05_21_182546_create_home_video_table',0),('2015_05_21_182546_create_logfile_table',0),('2015_05_21_182546_create_membresias_table',0),('2015_05_21_182546_create_modules_table',0),('2015_05_21_182546_create_muro_table',0),('2015_05_21_182546_create_noticias_table',0),('2015_05_21_182546_create_permissions_table',0),('2015_05_21_182546_create_permissions_roles_table',0),('2015_05_21_182546_create_permissions_users_table',0),('2015_05_21_182546_create_profiles_table',0),('2015_05_21_182546_create_promedios_table',0),('2015_05_21_182546_create_registrados_table',0),('2015_05_21_182546_create_roles_table',0),('2015_05_21_182546_create_unete_nosotros_table',0),('2015_05_21_182546_create_users_table',0),('2015_05_21_182546_create_users_chart_report_table',0),('2015_05_21_182546_create_users_notes_table',0),('2015_05_22_115702_create_apoyamos_causa_table',0),('2015_05_22_115702_create_categorias_table',0),('2015_05_22_115702_create_causas_table',0),('2015_05_22_115702_create_causas_donadores_table',0),('2015_05_22_115702_create_contacto_table',0),('2015_05_22_115702_create_donadores_table',0),('2015_05_22_115702_create_eventos_table',0),('2015_05_22_115702_create_faq_table',0),('2015_05_22_115702_create_home_video_table',0),('2015_05_22_115702_create_logfile_table',0),('2015_05_22_115702_create_membresias_table',0),('2015_05_22_115702_create_modules_table',0),('2015_05_22_115702_create_muro_table',0),('2015_05_22_115702_create_noticias_table',0),('2015_05_22_115702_create_permissions_table',0),('2015_05_22_115702_create_permissions_roles_table',0),('2015_05_22_115702_create_permissions_users_table',0),('2015_05_22_115702_create_profiles_table',0),('2015_05_22_115702_create_promedios_table',0),('2015_05_22_115702_create_registrados_table',0),('2015_05_22_115702_create_roles_table',0),('2015_05_22_115702_create_tipo_causas_table',0),('2015_05_22_115702_create_unete_nosotros_table',0),('2015_05_22_115702_create_users_table',0),('2015_05_22_115702_create_users_chart_report_table',0),('2015_05_22_115702_create_users_notes_table',0),('2015_05_22_122939_create_apoyamos_causa_table',0),('2015_05_22_122939_create_categorias_table',0),('2015_05_22_122939_create_causas_table',0),('2015_05_22_122939_create_causas_donadores_table',0),('2015_05_22_122939_create_contacto_table',0),('2015_05_22_122939_create_donadores_table',0),('2015_05_22_122939_create_eventos_table',0),('2015_05_22_122939_create_faq_table',0),('2015_05_22_122939_create_home_video_table',0),('2015_05_22_122939_create_logfile_table',0),('2015_05_22_122939_create_membresias_table',0),('2015_05_22_122939_create_modules_table',0),('2015_05_22_122939_create_muro_table',0),('2015_05_22_122939_create_noticias_table',0),('2015_05_22_122939_create_permissions_table',0),('2015_05_22_122939_create_permissions_roles_table',0),('2015_05_22_122939_create_permissions_users_table',0),('2015_05_22_122939_create_profiles_table',0),('2015_05_22_122939_create_promedios_table',0),('2015_05_22_122939_create_registrados_table',0),('2015_05_22_122939_create_roles_table',0),('2015_05_22_122939_create_tipo_causas_table',0),('2015_05_22_122939_create_unete_nosotros_table',0),('2015_05_22_122939_create_users_table',0),('2015_05_22_122939_create_users_chart_report_table',0),('2015_05_22_122939_create_users_notes_table',0),('2015_05_27_163637_create_apoyamos_causa_table',0),('2015_05_27_163637_create_categorias_table',0),('2015_05_27_163637_create_causas_table',0),('2015_05_27_163637_create_causas_donadores_table',0),('2015_05_27_163637_create_contacto_table',0),('2015_05_27_163637_create_donadores_table',0),('2015_05_27_163637_create_eventos_table',0),('2015_05_27_163637_create_faq_table',0),('2015_05_27_163637_create_home_video_table',0),('2015_05_27_163637_create_logfile_table',0),('2015_05_27_163637_create_membresias_table',0),('2015_05_27_163637_create_modules_table',0),('2015_05_27_163637_create_muro_table',0),('2015_05_27_163637_create_noticias_table',0),('2015_05_27_163637_create_permissions_table',0),('2015_05_27_163637_create_permissions_roles_table',0),('2015_05_27_163637_create_permissions_users_table',0),('2015_05_27_163637_create_profiles_table',0),('2015_05_27_163637_create_promedios_table',0),('2015_05_27_163637_create_registrados_table',0),('2015_05_27_163637_create_roles_table',0),('2015_05_27_163637_create_tipo_causas_table',0),('2015_05_27_163637_create_unete_nosotros_table',0),('2015_05_27_163637_create_users_table',0),('2015_05_27_163637_create_users_chart_report_table',0),('2015_05_27_163637_create_users_notes_table',0);
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
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
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
INSERT INTO `promedios` VALUES (1,'8.5',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(2,'8.6',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(3,'8.7',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(4,'8.8',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(5,'8.9',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(6,'9.0',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(7,'9.1',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(8,'9.2',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(9,'9.3',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(10,'9.4',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(11,'9.5',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(12,'9.6',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(13,'9.7',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(14,'9.8',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(15,'9.9',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23'),(16,'10.0',NULL,NULL,'2015-05-21 23:09:23','2015-05-21 23:09:23');
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
INSERT INTO `tipo_causas` VALUES (1,'Amparo','amparo',NULL,NULL,'2015-05-22 17:00:50','2015-05-22 17:00:50'),(2,'Externa','externa',NULL,NULL,'2015-05-22 17:00:50','2015-05-22 17:00:50');
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
INSERT INTO `users` VALUES (1,'Carlos','Cuellar','Male','ccuellarlira@gmail.com','$2y$10$B1Q0CZxgeFZiMxZA2QxfpeyNaENzRNktR/timIJKWkw/pdE58mYea',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:37','2015-05-07 22:14:37'),(2,'Erick','Vizcaya','Female','erick@vizcaya.pro','$2y$10$4AujVwrlt7HltQiP.Hjomu/aGv/bE80ZJAZu8PMfyPoAH8cdP20GK',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:38','2015-05-07 22:14:38'),(3,'Miguel','Martinez','Female','natacion@gmail.com','$2y$10$pIUZfrvvyRvEDuFYaCsXdOCYknOudfyCl2hu3r/uEGE69Zp/l3wMS',NULL,NULL,NULL,'Active',2,0,0,'2015-05-07 22:14:38','2015-05-07 22:14:38'),(4,'Eric','Bravo','Male','eric.bravo.rod@gmail.com','$2y$10$w.JxNn1QIY1Hl5Z05llDm.7WPuxn4I18qOPrjfTge4FOC3ws0REfS','','',NULL,'Active',2,0,4,'2015-05-07 22:14:39','2015-06-10 19:30:59');
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

-- Dump completed on 2015-06-10 15:37:12
