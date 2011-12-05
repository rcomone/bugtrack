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
-- Table structure for table `proj_task`
--

DROP TABLE IF EXISTS `proj_task`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proj_task` (
  `tsk_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tsk_name` varchar(45) NOT NULL,
  `tsk_date` int(10) unsigned NOT NULL,
  `tsk_expectDate` int(10) unsigned NOT NULL,
  `tsk_desc` text,
  `tskstu_id` tinyint(3) unsigned NOT NULL,
  `usm_id` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`tsk_id`),
  KEY `fk_tsk_usm_id` (`usm_id`),
  KEY `fk_tsk_tskstu_id` (`tskstu_id`),
  CONSTRAINT `fk_tsk_tskstu_id` FOREIGN KEY (`tskstu_id`) REFERENCES `proj_taskStatus` (`tskstu_id`) ON UPDATE CASCADE,
  CONSTRAINT `fk_tsk_usm_id` FOREIGN KEY (`usm_id`) REFERENCES `user_staffmembre` (`usm_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proj_task`
--

LOCK TABLES `proj_task` WRITE;
/*!40000 ALTER TABLE `proj_task` DISABLE KEYS */;
/*!40000 ALTER TABLE `proj_task` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-12-05 17:15:16
