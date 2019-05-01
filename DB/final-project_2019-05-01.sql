# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.5.42)
# Database: final-project
# Generation Time: 2019-05-01 00:43:43 +0000
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
  `eventID` int(11) DEFAULT NULL,
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
  `resolvedBy` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;

INSERT INTO `Events` (`eventID`, `openDate`, `resolveDate`, `description`, `duration`, `tags`, `createdBy`, `jira`, `related`, `subject`, `assigned`, `resolvedBy`)
VALUES
	(1,'0000-00-00 00:00:00','2019-05-01 02:56:28','test','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','','','my subject','','yossi.eynav@climacell.co'),
	(2,'0000-00-00 00:00:00','2019-05-01 03:05:11','test2','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','','','','','yossi.eynav@climacell.co'),
	(3,'0000-00-00 00:00:00',NULL,'test3','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','','','','',NULL),
	(4,'0000-00-00 00:00:00',NULL,'as','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','2',X'33','1','',NULL),
	(5,'0000-00-00 00:00:00','2019-05-01 03:42:34','as','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','2',X'33','1','','yossi.eynav@gmail.com'),
	(6,'0000-00-00 00:00:00',NULL,'<h1><span style=\"color: rgb(115, 24, 66); background-color: rgb(247, 173, 107); font-family: &quot;Comic Sans MS&quot;;\">TEEEEEEEEEEEST</span></h1>','0000-00-00 00:00:00','',X'74657374406F68742E636F6D','no jira',X'31','New test','',NULL);

/*!40000 ALTER TABLE `Events` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Tags`;

CREATE TABLE `Tags` (
  `name` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



# Dump of table Updates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Updates`;

CREATE TABLE `Updates` (
  `updateDate` text,
  `eventId` int(11) DEFAULT NULL,
  `user` text,
  `duration` datetime DEFAULT NULL,
  `details` text,
  `subject` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Updates` WRITE;
/*!40000 ALTER TABLE `Updates` DISABLE KEYS */;

INSERT INTO `Updates` (`updateDate`, `eventId`, `user`, `duration`, `details`, `subject`)
VALUES
	('',1,'test@oht.com','0000-00-00 00:00:00','this is a test... ',''),
	('April 27, 2019, 10:09 pm',0,'','0000-00-00 00:00:00','',''),
	('April 27, 2019, 10:11 pm',0,'','0000-00-00 00:00:00','',''),
	('April 27, 2019, 10:13 pm',1,'1','0000-00-00 00:00:00','','asdf'),
	('April 27, 2019, 10:14 pm',1,'1','0000-00-00 00:00:00','','sdfsdfsdf'),
	('April 27, 2019, 10:15 pm',1,'1','0000-00-00 00:00:00','','dfgdwfg'),
	('April 27, 2019, 10:17 pm',1,'1','0000-00-00 00:00:00','','DSFGSDFG'),
	('April 27, 2019, 10:18 pm',1,'1','0000-00-00 00:00:00','','ASDFSADF'),
	('April 27, 2019, 10:19 pm',1,'1','0000-00-00 00:00:00','','SADFSADF'),
	('April 27, 2019, 10:20 pm',1,'1','0000-00-00 00:00:00','','555'),
	('April 27, 2019, 10:22 pm',1,'1','0000-00-00 00:00:00','asdfsadfsdfadf','sadf'),
	('April 28, 2019, 8:00 pm',1,'1','0000-00-00 00:00:00','sadfsadfsadfsadfsadfddfsdafsdf','asdfsadf'),
	('April 28, 2019, 8:01 pm',1,'1','0000-00-00 00:00:00','asdfsadf asdfasdf adsf','hi test'),
	('April 28, 2019, 8:02 pm',1,'1','0000-00-00 00:00:00','asdfasdfasdfasdf asdfdsfasdf asf ','askfl;sakfl; as'),
	('May 1, 2019, 2:03 am',1,'1',NULL,'12341234','1234'),
	('May 1, 2019, 2:03 am',1,'1',NULL,'asdfsadfsa dfsadfasd saf asdf sadfasd','whateverewrt'),
	('May 1, 2019, 2:35 am',1,'1',NULL,'444','333'),
	('May 1, 2019, 2:36 am',1,'yossi.eynav@climacell.co',NULL,'444555','333'),
	('May 1, 2019, 2:42 am',1,'yossi.eynav@climacell.co',NULL,'21342134213423421','324123423'),
	('May 1, 2019, 2:45 am',1,'yossi.eynav@climacell.co',NULL,'asdfasdfasdfasdf234','sadfasd'),
	('May 1, 2019, 3:04 am',2,'yossi.eynav@climacell.co',NULL,'asdfsfd','asdfasdf'),
	('May 1, 2019, 3:05 am',2,'yossi.eynav@climacell.co',NULL,'sadfsdfasfd','hi234234'),
	('May 1, 2019, 3:42 am',4,'yossi.eynav@gmail.com',NULL,' sadfsadfsdafsadf','asdfsad');

/*!40000 ALTER TABLE `Updates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Users`;

CREATE TABLE `Users` (
  `email` text,
  `name` text,
  `role` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;

INSERT INTO `Users` (`email`, `name`, `role`)
VALUES
	('test@oht.com','tester','user'),
	('test2@oht.com','Tester Fon-Tset','admin'),
	('Meer@oht.com','Meer dr','admin');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
