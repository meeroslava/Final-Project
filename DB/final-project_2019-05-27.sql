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
	(1,'2019-05-25 14:30:07','2019-05-26 17:37:52','Website doesnt load. Error 503','חישוב אוטומט',NULL,'MichaelKrachun@onehourtranslation.com','12',X'313031','My awesome subject',NULL,'KirillGolodenko@onehourtranslation.com','FALSE-ALARM','',''),
	(2,'2019-05-27 10:52:13','2019-05-29 12:30:52','When user is logged- in he sees another user information. Every refresh of the page shows different user.','חישוב אוטומט',NULL,'VitalyKapshytar@onehourtranslation.com','12',X'313031','My awesome subject',NULL,'DanyloBoiko@onehourtranslation.com','FALSE-ALARM','',''),
	(3,'2019-05-30 11:22:11','2019-01-01 11:32:52','Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created','חישוב אוטומט',NULL,'VitalyKapshytar@onehourtranslation.com','12',X'313031','My awesome subject',NULL,'MichaelKrachun@onehourtranslation.com','FALSE-ALARM','',''),
	(4,'2019-06-01 16:23:17','2019-06-02 14:38:52','The website keeps going down on hourly basis.','חישוב אוטומט',NULL,'OrenYagev@onehourtranslation.com','12',X'313031','My awesome subject',NULL,'DanyloBoiko@onehourtranslation.com','FALSE-ALARM','',''),
	(5,'2019-05-04 18:22:41','2019-06-04 12:50:52','The website is very slow','חישוב אוטומט',NULL,'VitalyKapshytar@onehourtranslation.com','12',X'313031','My awesome subject',NULL,'SergiiKozheletskyi@onehourtranslation.com','FALSE-ALARM','',''),
	(6,'2019-06-06 14:44:28',NULL,'Failure on deploy attempt.','חישוב אוטומט',NULL,'DavidLevy@onehourtranslation.com','','','nana test','SergiiKozheletskyi@onehourtranslation.com',NULL,'OPEN','','');

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
	('May 25, 2019, 14:00 pm',1,'MichaelKrachun@onehourtranslation.com','Checked logs in Kibana, didn’t find anything related. Need to check deploy history.','Website doesnt load Error 503',12),
	('May 25, 2019, 14:17 pm',1,'MichaelKrachun@onehourtranslation.com','Deploy history - nothing that could break the website. We should check MYSQL logs.','Website doesnt load Error 503',13),
	('May 26, 2019, 15:52 pm',1,'MichaelKrachun@onehourtranslation.com','We found SQL query that is too heavy - overloads proccesses. Fixing.','Website doesnt load Error 503',14),
	('May 26, 2019, 17:37 pm',1,'KirillGolodenko@onehourtranslation.com','Fixed ','Website doesnt load. Error ',15),
	('May 27, 2019, 21:55 pm',2,'MichaelKrachun@onehourtranslation.com','Temporary shut-down production. Investigating.','When user is logged- in he sees another user information. Every refresh of the page shows different user.',21),
	('May 27, 2019, 13:57 pm',2,'SergiiKozheletskyi@onehourtranslation.com','Logs checked - no issues here. Moving to DB checkes.','When user is logged- in he sees another user information. Every refresh of the page shows different user.',22),
	('May 28, 2019, 22:32 pm',2,'SergiiKozheletskyi@onehourtranslation.com','Kibana shows no issues with the servers','When user is logged- in he sees another user information. Every refresh of the page shows different user.',23),
	('May 28, 2019, 12:50 pm',2,'MichaelKrachun@onehourtranslation.com','Solution - Issue with the keshing. Danylo made modifications on keshing that caused the issue.','When user is logged- in he sees another user information. Every refresh of the page shows different user.',24),
	('May 29, 2019, 12:30 pm',2,'DanyloBoiko@onehourtranslation.com','Fixed keshing rules.','When user is logged- in he sees another user information. Every refresh of the page shows different user.',25),
	('May 30, 2019, 11:31 pm',3,'SergiiKozheletskyi@onehourtranslation.com','No issues on Kibana Dashboard. Checking further','Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created',31),
	('May 30, 2019, 09:30 pm',3,'SergiiKozheletskyi@onehourtranslation.com','Apps - Everything runs without any issues','Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created',32),
	('June 1, 2019, 12:30 pm',3,'MichaelKrachun@onehourtranslation.com','Checking the code. Seems like there’s a problem with one of the packages. ','Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created',33),
	('June 1, 2019, 11:32 pm',3,'MichaelKrachun@onehourtranslation.com','The related peace of code uses outdated package. Updated.','Customers don’t receive invoices on the website. When user tries should get invoice on his purchase - no PDF is created',34),
	('June 1, 2019, 22:30 pm',4,'OrenYagev@onehourtranslation.com','We found some odd logs. Checking further ',' The website keeps going down on hourly basis.',41),
	('June 2, 2019, 14:30 pm',4,'SergiiKozheletskyi@onehourtranslation.com','The issue must be related to one of the crons. Checking the crons.',' The website keeps going down on hourly basis.',42),
	('June 2, 2019, 21:30 pm',4,'SergiiKozheletskyi@onehourtranslation.com','Checked Jenkins - we don’t see issues there',' The website keeps going down on hourly basis.',43),
	('June 2, 2019, 22:10 pm',4,'SergiiKozheletskyi@onehourtranslation.com','Found issue on Drupal - cache drops every 30 min. Checking the reason ',' The website keeps going down on hourly basis.',44),
	('June 2, 2019, 14:38 pm',4,'DanyloBoiko@onehourtranslation.com','Issue origin - dev servers crushed the deployment server. ',' The website keeps going down on hourly basis.',45),
	('June 4, 2019, 17:30 pm',5,'SergiiKozheletskyi@onehourtranslation.com','We don’t see any issues on Kibana. Checked DB - fine. ','The website is very slow',51),
	('June 4, 2019, 10:30 pm',5,'SergiiKozheletskyi@onehourtranslation.com','Trouble to bring new servers up - investigating.','The website is very slow',52),
	('June 4, 2019, 17:20 pm',5,'SergiiKozheletskyi@onehourtranslation.com','The issue is with packages. Checking','The website is very slow',53),
	('June 4, 2019, 12:50 pm',5,'SergiiKozheletskyi@onehourtranslation.com','The original repository of the packages was removed. Restoring ','The website is very slow',54),
	('June 5, 2019, 11:37 pm',6,'SergiiKozheletskyi@onehourtranslation.com','Kibana - everything is working. Investigating','Failure on deploy attempt.',61),
	('June 5, 2019, 21:37 pm',6,'SergiiKozheletskyi@onehourtranslation.com','Git is failing to upload.','Failure on deploy attempt.',62),
	('June 5, 2019, 11:46 pm',6,'SergiiKozheletskyi@onehourtranslation.com','Checked on https://bitbucket.status.atlassian.com/ - service is down. They are working on bringing it back.','Failure on deploy attempt.',63);

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
     ('MichaelKrachun@onehourtranslation.com','Michael Krachun','admin'),
	 ('VitalyKapshytar@onehourtranslation.com','Vitaly Kapshytar','user'),
	 ('OrenYagev@onehourtranslation.com','Oren Yagev','admin'),
	 ('SergiiKozheletskyi@onehourtranslation.com','Sergii Kozheletskyi','user'),
	 ('KirillGolodenko@onehourtranslation.com','Kirill Golodenko','user'),
	 ('DanyloBoiko@onehourtranslation.com','Danylo Boiko','user'),
	 ('DavidLevy@onehourtranslation.com','David Levy','user');

/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
