-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2012 at 04:20 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `authors`
--


-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL AUTO_INCREMENT,
  `authorId` varchar(255) NOT NULL DEFAULT '',
  `postTitle` varchar(255) NOT NULL DEFAULT '',
  `postSubhead` varchar(255) NOT NULL DEFAULT '',
  `postDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `postContent` text NOT NULL,
  PRIMARY KEY (`postId`),
  KEY `author-id` (`authorId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` VALUES(1, '', 'Test post 1', 'Test post subhead 1', '2012-10-24 23:36:44', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sit amet metus lectus, quis congue magna. Aliquam in nunc vel eros dapibus congue. Sed ullamcorper accumsan semper. Cras condimentum hendrerit leo a rutrum. Aliquam erat volutpat. Ut et risus nec augue viverra sollicitudin ut eget felis. Sed accumsan auctor orci et auctor. Sed quis venenatis massa. Sed non dui nibh, eu sodales ligula. Maecenas condimentum, lorem et cursus gravida, neque erat porttitor ligula, at aliquam diam mauris eu diam.\n\n\n');
INSERT INTO `posts` VALUES(2, '', 'Test post 2', 'Test post subhead 2', '2012-10-24 23:53:54', 'Quisque nunc libero, convallis et facilisis non, sollicitudin nec libero. Fusce quam lacus, molestie eget tincidunt vulputate, accumsan quis tellus. Sed elementum nisl eu nunc tristique posuere. Morbi vestibulum, ligula ut tempor varius, ante purus scelerisque tortor, non viverra tortor tortor at massa. Nam aliquet eros vitae erat blandit ultrices. Morbi facilisis lectus blandit velit elementum faucibus. Proin sapien enim, convallis ut laoreet non, vulputate in nibh. Mauris vitae diam a tellus vulputate porttitor eu vel dui. Nullam tincidunt nunc vel felis aliquam pharetra malesuada leo vestibulum. Duis ullamcorper interdum nisi eu pretium. Aliquam sollicitudin elit sodales odio lobortis rhoncus. Nullam tellus erat, aliquet sed tincidunt varius, accumsan ac ligula. Nunc ornare volutpat orci, vitae condimentum diam laoreet nec. Nulla eu risus in erat porttitor tincidunt at in sapien.');
INSERT INTO `posts` VALUES(3, '', 'Test post 3', 'Test post subhead 3', '2012-10-24 23:55:03', 'Aenean tincidunt ultrices pharetra. Vivamus varius, odio at tincidunt semper, risus dolor consequat nibh, ac dapibus dolor lacus et erat. Pellentesque tempor aliquam dignissim. Donec quis arcu purus, non fringilla elit. Sed iaculis mi ac ipsum pellentesque consequat. Quisque libero odio, mollis vel varius et, dapibus sit amet velit. Cras nec luctus nisi.\n\n');
INSERT INTO `posts` VALUES(4, '', 'Test post 4', 'Test post subhead 4', '2012-10-24 23:55:34', 'Vivamus leo elit, varius sed pretium vitae, dignissim eget ligula. Morbi sit amet purus ac justo vehicula dapibus in non sapien. Nunc porta placerat ornare. Sed justo est, vehicula vitae lobortis quis, varius a orci. Proin in massa eu elit dictum ornare sit amet non leo. Nam urna metus, sodales vel iaculis id, vehicula ac turpis. Aenean molestie felis sit amet lectus vestibulum ultrices. Quisque viverra erat eu augue pretium id imperdiet tellus venenatis. Duis at augue nisi, quis cursus felis. Phasellus vestibulum mauris et turpis porta accumsan. Donec sed metus tortor. Sed sit amet dolor nisi. Nunc vel turpis massa, semper fermentum neque. Phasellus at libero metus.\n\n');
INSERT INTO `posts` VALUES(5, '', 'Test post 5', 'Test post subhead 5', '2012-10-24 23:55:36', 'Praesent vitae nunc nunc. Duis aliquet, mi in pretium vestibulum, eros est posuere justo, eget sodales arcu enim et ante. Nam vel ipsum massa. Praesent at arcu sit amet lorem bibendum rutrum pulvinar ac lectus. Etiam non ante iaculis massa pretium porttitor sit amet vitae justo. Aliquam tincidunt, felis vitae aliquet vestibulum, leo metus pretium nisi, non pretium felis metus id neque. ');
INSERT INTO `posts` VALUES(6, '', 'Test post 6', 'Test post subhead 6', '2012-10-24 23:55:38', 'Pellentesque in lacus nec odio hendrerit gravida. Ut tellus turpis, scelerisque ut imperdiet vitae, cursus sit amet orci. Phasellus sit amet eleifend nulla. Duis viverra, dui bibendum aliquet ultrices, metus odio molestie leo, in sagittis justo metus vel quam. Curabitur vel elit mi. Morbi dignissim euismod adipiscing. Suspendisse adipiscing, mauris ut dignissim rutrum, nisi ligula vehicula massa, in pretium mi orci in leo. Nunc bibendum vulputate ornare.');
INSERT INTO `posts` VALUES(7, '', '<a href=\\"www.google.com\\">Click</a>', 'This is a html sanitization test', '2012-10-25 11:32:22', 'This is a test.');
INSERT INTO `posts` VALUES(8, '', '\\"Select * from posts\\"', 'This is a mysqli prepared statement/SQL injection test', '2012-10-25 11:33:11', 'This is a test');

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
  `userType` varchar(25) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` VALUES(1, 'heyjohnmurray', 'John', 'Murray', 'heyjohnmurray@gmail.com', '46df4e7a0a1f9b45fba6b52e6b5da9984c018578', 'Yes', 'subscriber');
INSERT INTO `users` VALUES(2, 'thursday0384', 'Jon', 'Doe', 'heyjohnmurray@gmail.com', 'a8f2bf287f88d5295ffc97c56da2737aa42e4cbb', 'Yes', 'subscriber');
