-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2012 at 09:59 AM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `author-id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author-name` varchar(255) NOT NULL,
  PRIMARY KEY (`author-id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `authors`
--


-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` varchar(255) NOT NULL DEFAULT '',
  `pageTitle` varchar(255) NOT NULL DEFAULT '',
  `pageSubhead` varchar(255) DEFAULT '',
  `pageDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pageContent` mediumtext NOT NULL,
  PRIMARY KEY (`pageId`),
  KEY `author-id` (`authorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` VALUES(1, '', 'About Us', 'BloggrCMS is here for you.', '2012-10-27 03:05:28', 'BloggrCMS has been incredibly successful and risen from a handful of users to the most-used blog tool in its category. However, as easy-to-use as we could make the open source package, there was still a barrier in that it requires a hosting account, a database, FTP, and a whole alphabet soup of acronyms that make normal people like you and me dizzy.\r\n\r\nWe wanted to bring the BloggrCMS experience to a larger audience. So we created BloggrCMS, a hosted version of the open source package where you can start a blog in seconds without any technical knowledge. We‰Ûªre a bit of an underdog, as there are much larger hosted blogging services such as WordPress that have been out for years, but when BloggrCMS got started people said the blog software market was saturated and there wasn‰Ûªt room for anything new. (The big players then were Greymatter and Movable Type.) We think we have something unique to bring to the table.');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` varchar(255) NOT NULL DEFAULT '',
  `postTitle` varchar(255) NOT NULL DEFAULT '',
  `postSubhead` varchar(255) DEFAULT '',
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postContent` mediumtext NOT NULL,
  PRIMARY KEY (`postId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(1, '', 'Test post 1', 'Test post subhead 1', '2012-10-24 23:36:44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet metus lectus, quis congue magna. Aliquam in nunc vel eros dapibus congue. Sed ullamcorper accumsan semper. Cras condimentum hendrerit leo a rutrum. Aliquam erat volutpat. Ut et risus nec augue viverra sollicitudin ut eget felis. Sed accumsan auctor orci et auctor. Sed quis venenatis massa. Sed non dui nibh, eu sodales ligula. Maecenas condimentum, lorem et cursus gravida, neque erat porttitor ligula, at aliquam diam mauris eu diam.\n\n\n');
INSERT INTO `posts` VALUES(2, '', 'Test post 2', 'Test post subhead 2', '2012-10-24 23:53:54', 'Quisque nunc libero, convallis et facilisis non, sollicitudin nec libero. Fusce quam lacus, molestie eget tincidunt vulputate, accumsan quis tellus. Sed elementum nisl eu nunc tristique posuere. Morbi vestibulum, ligula ut tempor varius, ante purus scelerisque tortor, non viverra tortor tortor at massa. Nam aliquet eros vitae erat blandit ultrices. Morbi facilisis lectus blandit velit elementum faucibus. Proin sapien enim, convallis ut laoreet non, vulputate in nibh. Mauris vitae diam a tellus vulputate porttitor eu vel dui. Nullam tincidunt nunc vel felis aliquam pharetra malesuada leo vestibulum. Duis ullamcorper interdum nisi eu pretium. Aliquam sollicitudin elit sodales odio lobortis rhoncus. Nullam tellus erat, aliquet sed tincidunt varius, accumsan ac ligula. Nunc ornare volutpat orci, vitae condimentum diam laoreet nec. Nulla eu risus in erat porttitor tincidunt at in sapien.');
INSERT INTO `posts` VALUES(3, '', 'Test post 3', 'Test post subhead 3', '2012-10-24 23:55:03', 'Aenean tincidunt ultrices pharetra. Vivamus varius, odio at tincidunt semper, risus dolor consequat nibh, ac dapibus dolor lacus et erat. Pellentesque tempor aliquam dignissim. Donec quis arcu purus, non fringilla elit. Sed iaculis mi ac ipsum pellentesque consequat. Quisque libero odio, mollis vel varius et, dapibus sit amet velit. Cras nec luctus nisi.\n\n');
INSERT INTO `posts` VALUES(4, '', 'Test post 4', 'Test post subhead 4', '2012-10-24 23:55:34', 'Vivamus leo elit, varius sed pretium vitae, dignissim eget ligula. Morbi sit amet purus ac justo vehicula dapibus in non sapien. Nunc porta placerat ornare. Sed justo est, vehicula vitae lobortis quis, varius a orci. Proin in massa eu elit dictum ornare sit amet non leo. Nam urna metus, sodales vel iaculis id, vehicula ac turpis. Aenean molestie felis sit amet lectus vestibulum ultrices. Quisque viverra erat eu augue pretium id imperdiet tellus venenatis. Duis at augue nisi, quis cursus felis. Phasellus vestibulum mauris et turpis porta accumsan. Donec sed metus tortor. Sed sit amet dolor nisi. Nunc vel turpis massa, semper fermentum neque. Phasellus at libero metus.\n\n');
INSERT INTO `posts` VALUES(5, '', 'Test post 5', 'Test post subhead 5', '2012-10-24 23:55:36', 'Praesent vitae nunc nunc. Duis aliquet, mi in pretium vestibulum, eros est posuere justo, eget sodales arcu enim et ante. Nam vel ipsum massa. Praesent at arcu sit amet lorem bibendum rutrum pulvinar ac lectus. Etiam non ante iaculis massa pretium porttitor sit amet vitae justo. Aliquam tincidunt, felis vitae aliquet vestibulum, leo metus pretium nisi, non pretium felis metus id neque. ');
INSERT INTO `posts` VALUES(6, '', 'Test post 6', 'Test post subhead 6', '2012-10-24 23:55:38', 'Pellentesque in lacus nec odio hendrerit gravida. Ut tellus turpis, scelerisque ut imperdiet vitae, cursus sit amet orci. Phasellus sit amet eleifend nulla. Duis viverra, dui bibendum aliquet ultrices, metus odio molestie leo, in sagittis justo metus vel quam. Curabitur vel elit mi. Morbi dignissim euismod adipiscing. Suspendisse adipiscing, mauris ut dignissim rutrum, nisi ligula vehicula massa, in pretium mi orci in leo. Nunc bibendum vulputate ornare.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'heyjohnmurray', 'John', 'Murray', 'heyjohnmurray@gmail.com', '9fd8de5fc2a7c2c0d469b2fff1afde4e5def37ba', 'Yes', 'subscriber');
INSERT INTO `users` VALUES(2, 'admin', 'John', 'Doe', 'admin@admin.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Yes', 'subscriber');
