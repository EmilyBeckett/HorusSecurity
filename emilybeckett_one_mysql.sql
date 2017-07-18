-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: emilybeckett.one.mysql:3306
-- Generation Time: Jul 18, 2017 at 12:50 PM
-- Server version: 10.1.24-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `emilybeckett_one_task`
--
CREATE DATABASE `emilybeckett_one_task` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `emilybeckett_one_task`;

-- --------------------------------------------------------

--
-- Table structure for table `t_category`
--

CREATE TABLE IF NOT EXISTS `t_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `t_category`
--

INSERT INTO `t_category` (`id`, `name`) VALUES
(1, 'new function'),
(2, 'just do it'),
(3, 'fixing');

-- --------------------------------------------------------

--
-- Table structure for table `t_level`
--

CREATE TABLE IF NOT EXISTS `t_level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `t_level`
--

INSERT INTO `t_level` (`id`, `name`) VALUES
(1, 'simple'),
(2, 'manager'),
(3, 'admin'),
(4, 'supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `t_status`
--

CREATE TABLE IF NOT EXISTS `t_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `t_status`
--

INSERT INTO `t_status` (`id`, `name`) VALUES
(1, 'new'),
(2, 'in progress'),
(3, 'done'),
(4, 'accepted'),
(5, 'cancelled'),
(6, 'postponed');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `create_by` int(11) NOT NULL,
  `owner` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `create_by`, `owner`, `create_time`, `status`, `deadline`, `category`) VALUES
(1, 'First task', 'Description more', 1, 5, '2017-07-18 07:22:12', 2, '2017-07-21', 1),
(2, 'Second one', 'Something what is already done', 1, 2, '2017-07-18 07:32:26', 3, '2017-07-30', 1),
(3, 'Third Bird', 'Három marárka', 1, 3, '2017-07-18 08:48:19', 6, '2017-07-27', 1),
(4, 'New test', 'Text', 1, 4, '2017-07-18 09:36:35', 2, '2017-07-29', 1),
(5, 'This is a task', 'This is a text', 1, 5, '2017-07-18 09:37:09', 5, '2017-07-22', 1),
(6, 'New one', 'This is a very new', 1, 4, '2017-07-18 10:18:44', 1, '2017-07-18', 1),
(7, 'Again', 'Just do it', 1, 5, '2017-07-18 11:39:25', 1, '2017-07-18', 2),
(8, 'dh ydygf hs ', 'gh ,hg yd tghgf yhdzrgt yfgghfgv,', 1, 3, '2017-07-18 11:50:52', 1, '2017-07-19', 2),
(9, ' ', '', 1, 4, '2017-07-18 12:14:48', 1, '2017-07-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `pass`, `level`) VALUES
(1, 'Beckett', 'c21f969b5f03d33d43e04f8f136e7682', 1),
(2, 'Bishop', 'c21f969b5f03d33d43e04f8f136e7682', 2),
(3, 'another', 'c21f969b5f03d33d43e04f8f136e7682', 1),
(4, 'an admin', 'c21f969b5f03d33d43e04f8f136e7682', 3),
(5, 'Test user', 'c21f969b5f03d33d43e04f8f136e7682', 1),
(6, 'Tristan', 'c21f969b5f03d33d43e04f8f136e7682', 4),
(7, 'Another SV', 'c21f969b5f03d33d43e04f8f136e7682', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
