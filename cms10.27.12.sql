# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.9)
# Database: cms
# Generation Time: 2012-10-27 08:02:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table authors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `authors`;

CREATE TABLE `authors` (
  `author-id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author-name` varchar(255) NOT NULL,
  PRIMARY KEY (`author-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` varchar(255) NOT NULL DEFAULT '',
  `pageTitle` varchar(255) NOT NULL DEFAULT '',
  `pageSubhead` varchar(255) DEFAULT '',
  `pageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pageContent` mediumtext NOT NULL,
  PRIMARY KEY (`pageId`),
  KEY `author-id` (`authorId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;

INSERT INTO `pages` (`pageId`, `authorId`, `pageTitle`, `pageSubhead`, `pageDate`, `pageContent`)
VALUES
	(1,'','About Us','BloggrCMS is here for you.','2012-10-27 03:05:28','BloggrCMS has been incredibly successful and risen from a handful of users to the most-used blog tool in its category. However, as easy-to-use as we could make the open source package, there was still a barrier in that it requires a hosting account, a database, FTP, and a whole alphabet soup of acronyms that make normal people like you and me dizzy.\r\n\r\nWe wanted to bring the BloggrCMS experience to a larger audience. So we created BloggrCMS, a hosted version of the open source package where you can start a blog in seconds without any technical knowledge. Weâ€™re a bit of an underdog, as there are much larger hosted blogging services such as WordPress that have been out for years, but when BloggrCMS got started people said the blog software market was saturated and there wasnâ€™t room for anything new. (The big players then were Greymatter and Movable Type.) We think we have something unique to bring to the table.'),
	(4,'','Page Name',NULL,'2012-10-27 04:00:47','No subhead');

/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` varchar(255) NOT NULL DEFAULT '',
  `postTitle` varchar(255) NOT NULL DEFAULT '',
  `postSubhead` varchar(255) DEFAULT '',
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postContent` mediumtext NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`postId`, `authorId`, `postTitle`, `postSubhead`, `postDate`, `postContent`)
VALUES
	(1,'','Test post 1','Test post subhead 1','2012-10-24 23:36:44','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet metus lectus, quis congue magna. Aliquam in nunc vel eros dapibus congue. Sed ullamcorper accumsan semper. Cras condimentum hendrerit leo a rutrum. Aliquam erat volutpat. Ut et risus nec augue viverra sollicitudin ut eget felis. Sed accumsan auctor orci et auctor. Sed quis venenatis massa. Sed non dui nibh, eu sodales ligula. Maecenas condimentum, lorem et cursus gravida, neque erat porttitor ligula, at aliquam diam mauris eu diam.\n\n\n'),
	(2,'','Test post 2','Test post subhead 2','2012-10-24 23:53:54','Quisque nunc libero, convallis et facilisis non, sollicitudin nec libero. Fusce quam lacus, molestie eget tincidunt vulputate, accumsan quis tellus. Sed elementum nisl eu nunc tristique posuere. Morbi vestibulum, ligula ut tempor varius, ante purus scelerisque tortor, non viverra tortor tortor at massa. Nam aliquet eros vitae erat blandit ultrices. Morbi facilisis lectus blandit velit elementum faucibus. Proin sapien enim, convallis ut laoreet non, vulputate in nibh. Mauris vitae diam a tellus vulputate porttitor eu vel dui. Nullam tincidunt nunc vel felis aliquam pharetra malesuada leo vestibulum. Duis ullamcorper interdum nisi eu pretium. Aliquam sollicitudin elit sodales odio lobortis rhoncus. Nullam tellus erat, aliquet sed tincidunt varius, accumsan ac ligula. Nunc ornare volutpat orci, vitae condimentum diam laoreet nec. Nulla eu risus in erat porttitor tincidunt at in sapien.'),
	(3,'','Test post 3','Test post subhead 3','2012-10-24 23:55:03','Aenean tincidunt ultrices pharetra. Vivamus varius, odio at tincidunt semper, risus dolor consequat nibh, ac dapibus dolor lacus et erat. Pellentesque tempor aliquam dignissim. Donec quis arcu purus, non fringilla elit. Sed iaculis mi ac ipsum pellentesque consequat. Quisque libero odio, mollis vel varius et, dapibus sit amet velit. Cras nec luctus nisi.\n\n'),
	(4,'','Test post 4','Test post subhead 4','2012-10-24 23:55:34','Vivamus leo elit, varius sed pretium vitae, dignissim eget ligula. Morbi sit amet purus ac justo vehicula dapibus in non sapien. Nunc porta placerat ornare. Sed justo est, vehicula vitae lobortis quis, varius a orci. Proin in massa eu elit dictum ornare sit amet non leo. Nam urna metus, sodales vel iaculis id, vehicula ac turpis. Aenean molestie felis sit amet lectus vestibulum ultrices. Quisque viverra erat eu augue pretium id imperdiet tellus venenatis. Duis at augue nisi, quis cursus felis. Phasellus vestibulum mauris et turpis porta accumsan. Donec sed metus tortor. Sed sit amet dolor nisi. Nunc vel turpis massa, semper fermentum neque. Phasellus at libero metus.\n\n'),
	(5,'','Test post 5','Test post subhead 5','2012-10-24 23:55:36','Praesent vitae nunc nunc. Duis aliquet, mi in pretium vestibulum, eros est posuere justo, eget sodales arcu enim et ante. Nam vel ipsum massa. Praesent at arcu sit amet lorem bibendum rutrum pulvinar ac lectus. Etiam non ante iaculis massa pretium porttitor sit amet vitae justo. Aliquam tincidunt, felis vitae aliquet vestibulum, leo metus pretium nisi, non pretium felis metus id neque. '),
	(6,'','Test post 6','Test post subhead 6','2012-10-24 23:55:38','Pellentesque in lacus nec odio hendrerit gravida. Ut tellus turpis, scelerisque ut imperdiet vitae, cursus sit amet orci. Phasellus sit amet eleifend nulla. Duis viverra, dui bibendum aliquet ultrices, metus odio molestie leo, in sagittis justo metus vel quam. Curabitur vel elit mi. Morbi dignissim euismod adipiscing. Suspendisse adipiscing, mauris ut dignissim rutrum, nisi ligula vehicula massa, in pretium mi orci in leo. Nunc bibendum vulputate ornare.');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `userEmail` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL,
  `mailConfirm` varchar(5) DEFAULT NULL,
  `userType` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `userName`, `firstName`, `lastName`, `userEmail`, `password`, `mailConfirm`, `userType`)
VALUES
	(1,'heyjohnmurray','John','Murray','heyjohnmurray@gmail.com','46df4e7a0a1f9b45fba6b52e6b5da9984c018578','Yes','subscriber'),
	(2,'thursday0384','Jon','Doe','heyjohnmurray@gmail.com','a8f2bf287f88d5295ffc97c56da2737aa42e4cbb','Yes','subscriber');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
