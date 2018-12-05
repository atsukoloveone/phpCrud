-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: api_db
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.16.04.1

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Fashion','Category for anything related to fashion.','2014-06-01 00:35:07','2014-05-30 15:34:33'),(2,'Electronics','Gadgets, drones and more.','2014-06-01 00:35:07','2014-05-30 15:34:33'),(3,'Motors','Motor sports and more','2014-06-01 00:35:07','2014-05-30 15:34:54'),(5,'Movies','Movie products.','2014-06-01 00:00:00','2016-01-08 12:27:26'),(6,'Books','Kindle books, audio books and more.','2014-06-01 00:00:00','2016-01-08 12:27:47'),(13,'Sports','Drop into new winter gear.','2016-01-09 02:24:24','2016-01-09 00:24:24');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'LG P880 4X HD','My first awesome phone!',336,3,'2014-06-01 01:12:26','2014-05-31 15:12:26'),(2,'Google Nexus 4','The most awesome phone of 2013!',299,2,'2014-06-01 01:12:26','2014-05-31 15:12:26'),(3,'Samsung Galaxy S4','How about no?',600,3,'2014-06-01 01:12:26','2014-05-31 15:12:26'),(6,'Bench Shirt','The best shirt!',29,1,'2014-06-01 01:12:26','2014-05-31 00:12:21'),(7,'Lenovo Laptop','My business partner.',399,2,'2014-06-01 01:13:45','2014-05-31 00:13:39'),(8,'Samsung Galaxy Tab 10.1','Good tablet.',259,2,'2014-06-01 01:14:13','2014-05-31 00:14:08'),(9,'Spalding Watch','My sports watch.',199,1,'2014-06-01 01:18:36','2014-05-31 00:18:31'),(10,'Sony Smart Watch','The coolest smart watch!',300,2,'2014-06-06 17:10:01','2014-06-05 16:09:51'),(11,'Huawei Y300','For testing purposes.',100,2,'2014-06-06 17:11:04','2014-06-05 16:10:54'),(12,'Abercrombie Lake Arnold Shirt','Perfect as gift!',60,1,'2014-06-06 17:12:21','2014-06-05 16:12:11'),(13,'Abercrombie Allen Brook Shirt','Cool red shirt!',70,1,'2014-06-06 17:12:59','2014-06-05 16:12:49'),(26,'Another product','Awesome product!',555,2,'2014-11-22 19:07:34','2014-11-21 19:07:34'),(28,'Wallet','You can absolutely use this one!',799,6,'2014-12-04 21:12:03','2014-12-03 21:12:03'),(31,'Amanda Waller Shirt','New awesome shirt!',333,1,'2014-12-13 00:52:54','2014-12-12 00:52:54'),(42,'Nike Shoes for Men','Nike Shoes',12999,3,'2015-12-12 06:47:08','2015-12-12 04:47:08'),(63,'a1','b1',1121,6,'2018-08-28 15:34:07','2018-08-28 13:34:07'),(64,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-13 16:35:44','2018-11-13 15:35:44'),(65,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-14 11:54:30','2018-11-14 10:54:30'),(66,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-14 12:03:59','2018-11-14 11:03:59'),(67,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-14 17:08:39','2018-11-14 16:08:40'),(68,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-15 00:39:47','2018-11-14 23:39:47'),(69,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-15 00:39:47','2018-11-14 23:39:47'),(70,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-15 00:41:42','2018-11-14 23:41:42'),(71,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-15 00:42:02','2018-11-14 23:42:02'),(72,'Amazing Pillow 2.0','The best pillow for amazing programmers.',199,2,'2018-11-15 00:48:56','2018-11-14 23:48:56'),(73,'','dasfdsafsd',11,1,'2018-11-20 16:22:23','2018-11-20 15:22:23'),(74,'','dasfdsafsd',12212,2,'2018-11-20 16:23:23','2018-11-20 15:23:24'),(75,'Atsuko Yamazaki','dasfdsafsd',1,2,'2018-11-20 16:23:39','2018-11-20 15:23:39'),(76,'Atsuko Yamazaki','fdas',11,1,'2018-11-20 16:28:53','2018-11-20 15:28:53'),(77,'Atsuko Yamazaki','dasfdsafsd',111,1,'2018-11-20 16:31:07','2018-11-20 15:31:07'),(78,'Atsuko Yamazaki','dasfdsafsd',111,1,'2018-11-21 10:46:43','2018-11-21 09:46:43'),(79,'Atsuko Yamazaki','fdas',222,2,'2018-11-21 10:54:11','2018-11-21 09:54:11'),(80,'Atsuko Yamazaki','fdfasd',22,2,'2018-11-21 10:55:16','2018-11-21 09:55:16'),(81,'Atsuko Yamazaki','dasfdsafsd',33,2,'2018-11-21 10:56:40','2018-11-21 09:56:40'),(82,'Atsuko Yamazaki','dasfdsafsd',33,3,'2018-11-21 11:09:01','2018-11-21 10:09:01'),(83,'Atsuko Yamazaki','dasfdsafsd',1,1,'2018-11-21 11:14:26','2018-11-21 10:14:26'),(84,'Atsuko Yamazaki','121',44,2,'2018-11-21 11:15:20','2018-11-21 10:15:20'),(85,'Atsuko Yamazaki','dasfdsafsd',11,2,'2018-11-21 11:17:36','2018-11-21 10:17:36'),(86,'Atsuko Yamazaki','dasfdsafsd',1,2,'2018-11-21 11:21:00','2018-11-21 10:21:00'),(87,'Atsuko Yamazaki','dasfdsafsd',1,1,'2018-11-21 11:21:57','2018-11-21 10:21:57'),(88,'Atsuko Yamazaki','dasfdsafsd',44,2,'2018-11-21 11:24:07','2018-11-21 10:24:07'),(89,'Atsuko Yamazaki','121',1,1,'2018-11-21 11:31:50','2018-11-21 10:31:50'),(90,'Atsuko Yamazaki','121',11,2,'2018-11-21 11:33:16','2018-11-21 10:33:16'),(92,'Atsuko Yamazaki','dasfdsafsd',2,2,'2018-11-21 11:37:41','2018-11-21 10:37:41'),(93,'Atsuko Yamazaki','dasfdsafsd',3,3,'2018-11-21 11:38:08','2018-11-21 10:38:08');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-03 11:21:58
