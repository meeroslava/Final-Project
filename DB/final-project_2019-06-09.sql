# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.23)
# Database: final-project
# Generation Time: 2019-06-09 09:45:13 +0000
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
  `status` enum('UNRESOLVED','PROGRESS','FALSE-ALARM','CANCELED','OPEN','RESOLVED') DEFAULT NULL,
  `cause` text,
  `cause_date` text,
  PRIMARY KEY (`eventID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `Events` WRITE;
/*!40000 ALTER TABLE `Events` DISABLE KEYS */;

INSERT INTO `Events` (`eventID`, `openDate`, `resolveDate`, `description`, `duration`, `tags`, `createdBy`, `jira`, `related`, `subject`, `assigned`, `resolvedBy`, `status`, `cause`, `cause_date`)
VALUES
	(1,'2019-05-21 14:53:26','2019-06-07 15:33:16','<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Website doesn\'t load. Error 503.</span></p>',NULL,NULL,X'4D69636861656C4B72616368756E406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Error 503',X'4B6972696C6C476F6C6F64656E6B6F406F6E65686F75727472616E736C6174696F6E2E636F6D','KirillGolodenko@onehourtranslation.com','RESOLVED','',''),
	(2,'2019-05-23 14:53:26','2019-06-07 15:03:13','<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">When user is logged- in he sees another user information. Every refresh of the page shows different user.</span></p>',NULL,NULL,X'566974616C794B6170736879746172406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Users see others users information after login',X'44616E796C6F426F696B6F406F6E65686F75727472616E736C6174696F6E2E636F6D','VitalyKapshytar@onehourtranslation.com','RESOLVED','',''),
	(3,'2019-05-28 14:53:26',NULL,'<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created. </span></p>',NULL,NULL,X'566974616C794B6170736879746172406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Website doesn\'t crate PDF on invoices',X'4D69636861656C4B72616368756E406F6E65686F75727472616E736C6174696F6E2E636F6D',NULL,'OPEN','',''),
	(4,'2019-06-01 15:42:37',NULL,'<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">The website keeps going down on hourly basis.</span></p>',NULL,NULL,X'44616E796C6F426F696B6F406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Website crushes every hour',X'44616E796C6F426F696B6F406F6E65686F75727472616E736C6174696F6E2E636F6D',NULL,'OPEN','',''),
	(5,'2019-06-01 16:42:37',NULL,'<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">The website is very slow</span></p>\n\n\n',NULL,NULL,X'566974616C794B6170736879746172406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Slow work of the website',X'5365726769694B6F7A68656C6574736B7969406F6E65686F75727472616E736C6174696F6E2E636F6D',NULL,'OPEN',NULL,NULL),
	(6,'2019-06-03 09:08:37',NULL,'<p><span style=\"background-color: transparent; color: rgb(0, 0, 0);\">Failure on deploy attempt</span></p>',NULL,NULL,X'44617669644C657679406F6E65686F75727472616E736C6174696F6E2E636F6D','','','Issues with deploy',X'5365726769694B6F7A68656C6574736B7969406F6E65686F75727472616E736C6174696F6E2E636F6D',NULL,'OPEN',NULL,NULL),
	(22,'2019-06-08 22:09:15','2019-06-08 22:15:08','<p>description for example after edit</p>',NULL,NULL,X'44616E796C6F426F696B6F406F6E65686F75727472616E736C6174696F6E2E636F6D','','','case 7',X'4F72656E5961676576406F6E65686F75727472616E736C6174696F6E2E636F6D','DanyloBoiko@onehourtranslation.com','OPEN','',''),
	(23,'2019-06-08 22:15:40',NULL,'',NULL,NULL,X'44616E796C6F426F696B6F406F6E65686F75727472616E736C6174696F6E2E636F6D','','','bla',X'556E61737369676E6564',NULL,'OPEN','','');

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
	('May 25, 2019, 11:57 pm',1,'SergiiKozheletskyi@onehourtranslation.com','Server, DB and Slave systems are down','Website doesnt load Error 503',11),
	('May 25, 2019, 14:00 pm',1,'MichaelKrachun@onehourtranslation.com','Need to check deploy history.','Checked logs in Kibana, didn’t find anything related. ',12),
	('May 25, 2019, 14:17 pm',1,'MichaelKrachun@onehourtranslation.com','We should check MYSQL logs.','Deploy history - nothing that could break the website',13),
	('May 26, 2019, 15:52 pm',1,'MichaelKrachun@onehourtranslation.com','Fixing','We found SQL query that is too heavy - overloads proccesses. ',14),
	('May 27, 2019, 21:55 pm',2,'MichaelKrachun@onehourtranslation.com','Investigating','Temporary shut-down production',21),
	('May 27, 2019, 13:57 pm',2,'SergiiKozheletskyi@onehourtranslation.com','Moving to DB checks','Logs checked - no issues here.',22),
	('May 28, 2019, 22:32 pm',2,'SergiiKozheletskyi@onehourtranslation.com','Kibana shows no issues with the servers','Kibana shows no issues with the servers',23),
	('May 28, 2019, 12:50 pm',2,'MichaelKrachun@onehourtranslation.com','Danylo made modifications on keshing that caused the issue.','Solution - Issue with the keshing. ',24),
	('May 29, 2019, 12:30 pm',2,'DanyloBoiko@onehourtranslation.com','Fixed keshing rules.','Fixed keshing rules.',25),
	('May 30, 2019, 11:31 pm',3,'SergiiKozheletskyi@onehourtranslation.com','Checking further','No issues on Kibana Dashboard. ',31),
	('May 30, 2019, 09:30 pm',3,'SergiiKozheletskyi@onehourtranslation.com','Everything runs without any issues','Apps',32),
	('June 1, 2019, 12:30 pm',3,'MichaelKrachun@onehourtranslation.com','Checking the code. ','Seems like there’s a problem with one of the packages. ',33),
	('June 1, 2019, 19:32 pm',3,'MichaelKrachun@onehourtranslation.com','Updated.','The related peace of code uses outdated package. ',34),
	('June 1, 2019, 22:30 pm',4,'OrenYagev@onehourtranslation.com','Checking further ','We found some odd logs. ',41),
	('June 2, 2019, 14:30 pm',4,'SergiiKozheletskyi@onehourtranslation.com','Checking the crons.','The issue must be related to one of the crons. ',42),
	('June 2, 2019, 21:30 pm',4,'SergiiKozheletskyi@onehourtranslation.com','we don’t see issues there','Checked Jenkins',43),
	('June 2, 2019, 22:10 pm',4,'SergiiKozheletskyi@onehourtranslation.com','Checking the reason ','Found issue on Drupal - cache drops every 30 min. ',44),
	('June 2, 2019, 14:38 pm',4,'DanyloBoiko@onehourtranslation.com','dev servers crushed the deployment server. ','Issue origin',45),
	('June 4, 2019, 17:30 pm',5,'SergiiKozheletskyi@onehourtranslation.com','We don’t see any issues on Kibana. ','Checked DB - fine. ',51),
	('June 4, 2019, 18:30 pm',5,'SergiiKozheletskyi@onehourtranslation.com','investigating.','Trouble to bring new servers up - ',52),
	('June 4, 2019, 19:02 pm',5,'SergiiKozheletskyi@onehourtranslation.com','Checking','The issue is with packages. ',53),
	('June 4, 2019, 20:50 pm',5,'SergiiKozheletskyi@onehourtranslation.com','Restoring ','The original repository of the packages was removed. ',54),
	('June 5, 2019, 11:37 pm',6,'SergiiKozheletskyi@onehourtranslation.com','Investigating','Kibana - everything is working',61),
	('June 5, 2019, 21:37 pm',6,'SergiiKozheletskyi@onehourtranslation.com','Git is failing to upload.','Git is failing to upload',62),
	('June 5, 2019, 11:46 pm',6,'SergiiKozheletskyi@onehourtranslation.com',' They are working on bringing it back.','Checked on https://bitbucket.status.atlassian.com/ - service is down.',63),
	('June 7, 2019, 3:03 pm',2,'DanyloBoiko@onehourtranslation.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',65),
	('June 7, 2019, 3:33 pm',1,'KirillGolodenko@onehourtranslation.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',66),
	('June 7, 2019, 3:37 pm',3,'KirillGolodenko@onehourtranslation.com','The ticket status changed to progress','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',67),
	('June 8, 2019, 10:10 pm',22,'DanyloBoiko@onehourtranslation.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',68),
	('June 8, 2019, 10:15 pm',22,'DanyloBoiko@onehourtranslation.com','The ticket status changed to resolved','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',69),
	('June 8, 2019, 10:15 pm',22,'DanyloBoiko@onehourtranslation.com','The ticket status changed to open','<h3 style=\"color: rgb(255, 165, 0);margin: 0;\">Ticket status has been change</h2>',70);

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
	('DanyloBoiko@onehourtranslation.com','Danylo Boiko','user'),
	('DavidLevy@onehourtranslation.com','David Levy','user'),
	('KirillGolodenko@onehourtranslation.com','Kirill Golodenko','user'),
	('MichaelKrachun@onehourtranslation.com','Michael Krachun','admin'),
	('OrenYagev@onehourtranslation.com','Oren Yagev','admin'),
	('SergiiKozheletskyi@onehourtranslation.com','Sergii Kozheletskyi','user'),
	('VitalyKapshytar@onehourtranslation.com','Vitaly Kapshytar','user');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
