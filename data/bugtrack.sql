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
-- Current Database: `bugtrack`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bugtrack` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bugtrack`;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `proj_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `proj_name` varchar(45) NOT NULL,
  `proj_desc` text NOT NULL,
  `proj_date` int(10) NOT NULL,
  `proj_statut` varchar(45) NOT NULL,
  `proj_hpurl` varchar(155) NOT NULL,
  `proj_docurl` varchar(155) NOT NULL,
  PRIMARY KEY (`proj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

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
  `ut_id` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`usm_id`),
  UNIQUE KEY `usm_login_UNIQUE` (`usm_login`),
  UNIQUE KEY `usm_email_UNIQUE` (`usm_email`),
  KEY `FK_TEAM_ID` (`ut_id`),
  CONSTRAINT `FK_TEAM_ID` FOREIGN KEY (`ut_id`) REFERENCES `user_team` (`ut_id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_staffmembre`
--

LOCK TABLES `user_staffmembre` WRITE;
/*!40000 ALTER TABLE `user_staffmembre` DISABLE KEYS */;
INSERT INTO `user_staffmembre` VALUES (1,'test','test','test','test','testtest',1),(2,'test2','test2','test2','test2','testtest',1),(3,'test3','test3','test3','test3','testtest',2);
/*!40000 ALTER TABLE `user_staffmembre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_team`
--

DROP TABLE IF EXISTS `user_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_team` (
  `ut_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `ut_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ut_id`),
  UNIQUE KEY `ut_name_UNIQUE` (`ut_name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_team`
--

LOCK TABLES `user_team` WRITE;
/*!40000 ALTER TABLE `user_team` DISABLE KEYS */;
INSERT INTO `user_team` VALUES (1,'Team 1'),(2,'Team 2');
/*!40000 ALTER TABLE `user_team` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-05 14:21:30
