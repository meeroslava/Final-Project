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

INSERT INTO `Events` (`eventID`, `openDate`, `resolveDate`, `description`, `duration`, `tags`, `createdBy`, `jira`, `related`, `subject`, `assigned`, `resolvedBy`, `status`, `cause`, `cause_date`)
VALUES
	(10,'2019-05-25 14:22:11','2019-05-26 23:37:52','<p>Hello,</p><p>This is the description</p>',NULL,NULL,X'4D656572406F68742E636F6D','12',X'313031','My awesome subject',NULL,'Meer@oht.com','FALSE-ALARM','',''),
	(11,'2019-05-25 14:44:18',NULL,'<p>test</p>',NULL,NULL,X'4D656572406F68742E636F6D','','','nana test',X'74657374406F68742E636F6D',NULL,'OPEN','','');

/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
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

INSERT INTO `Updates` (`updateDate`, `eventId`, `user`, `details`, `subject`, `id`)
VALUES
	('May 25, 2019, 1:57 pm',9,'Meer@oht.com','asdf','asdf',1),
	('May 25, 2019, 1:57 pm',9,'Meer@oht.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',2),
	('May 25, 2019, 1:57 pm',9,'Meer@oht.com','The ticket status changed to canceled','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',3),
	('May 25, 2019, 2:00 pm',9,'Meer@oht.com','The ticket status changed to false-alarm','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',4),
	('May 25, 2019, 2:30 pm',10,'Meer@oht.com','2','1',5),
	('May 26, 2019, 11:37 pm',10,'Meer@oht.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',6),
	('May 26, 2019, 11:46 pm',10,'Meer@oht.com','The ticket status changed to false-alarm','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',7);

/*!40000 ALTER TABLE `Updates` ENABLE KEYS */;
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

INSERT INTO `Users` (`email`, `name`, `role`)
VALUES
	('Meer@oht.com','Meer dr','admin'),
	('test@oht.com','tester','user');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
