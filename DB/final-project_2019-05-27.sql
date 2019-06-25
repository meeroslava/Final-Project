# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: final-project
# Generation Time: 2019-05-26 23:48:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Events`;

CREATE TABLE `Events` (
  `eventID` int(11) NOT NULL AUTO_INCREMENT,
  `openDate` datetime DEFAULT NULL,
  `resolveDate` datetime DEFAULT NULL,
  `description` text,
  `duration` datetime DEFAULT NULL,
  `tags` text,
  `createdBy` blob,
  `jira` text,
  `related` blob,
  `subject` text,
  `assigned` blob,
  `resolvedBy` text,
  `status` enum('UNRESOLVED','PROGRESS','FALSE-ALARM','CANCELED','OPEN') DEFAULT NULL,
  `cause` text,
  `cause_date` text,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;


UNLOCK TABLES;


# Dump of table Updates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Updates`;

CREATE TABLE `Updates` (
  `updateDate` text,
  `eventId` int(11) DEFAULT NULL,
  `user` text,
  `details` text,
  `subject` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Updates` WRITE;
/*!40000 ALTER TABLE `Updates` DISABLE KEYS */;


UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `email` varchar(250) NOT NULL DEFAULT '',
  `name` varchar(250) DEFAULT '',
  `role` text,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;


UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
