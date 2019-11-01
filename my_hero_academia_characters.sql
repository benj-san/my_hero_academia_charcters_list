-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: my_hero_academia
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `characters`
--

DROP TABLE IF EXISTS `characters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `characters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `japanese_name` varchar(100) DEFAULT NULL,
  `description` longtext,
  `picture` varchar(80) DEFAULT NULL,
  `background` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `characters`
--

LOCK TABLES `characters` WRITE;
/*!40000 ALTER TABLE `characters` DISABLE KEYS */;
INSERT INTO `characters` VALUES (1,'Izuku Midoriya',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','izuku_midoriya_card.png','izuku_midoriya_background.png',1),(2,'katsuki bakugo',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','katsuki_bakugo_card.png','katsuki_bakugo_background.png',1),(3,'shoto todoroki',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','todoroki_shoto_card.png','todoroki_shoto_background.png',1),(4,'Stain',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','stain_card.png','stain_background.png',2),(5,'All for one',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','all_for_one_card.png','all_for_one_background.jpg',2),(6,'Himiko Toga',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos, repellat','himiko_toga_card.png','himiko_toga_background.jpg',2);
/*!40000 ALTER TABLE `characters` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-01 14:50:24
