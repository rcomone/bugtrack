-- MySQL dump 10.13  Distrib 5.1.49, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: bugtrack
-- ------------------------------------------------------
-- Server version	5.1.49-3

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
-- Table structure for table `user_staffmembre`
--

DROP TABLE IF EXISTS `user_staffmembre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_staffmembre` (
  `usm_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `usm_firstname` varchar(80) NOT NULL,
  `usm_lastname` varchar(80) NOT NULL,
  `usm_email` varchar(150) NOT NULL,
  `usm_login` varchar(20) NOT NULL,
  `usm_password` char(42) NOT NULL,
  PRIMARY KEY (`usm_id`),
  UNIQUE KEY `usm_login_UNIQUE` (`usm_login`),
  UNIQUE KEY `usm_email_UNIQUE` (`usm_email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_staffmembre`
--

LOCK TABLES `user_staffmembre` WRITE;
/*!40000 ALTER TABLE `user_staffmembre` DISABLE KEYS */;
INSERT INTO `user_staffmembre` VALUES (1,'test','test','test','test','tset');
/*!40000 ALTER TABLE `user_staffmembre` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-02 11:01:55
