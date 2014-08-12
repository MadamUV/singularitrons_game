-- phpMyAdmin SQL Dump
-- version 3.4.3.1
-- http://www.phpmyadmin.net
--
-- Host: pdb14.freehostingeu.com
-- Generation Time: Aug 12, 2014 at 11:54 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `1650712_singular`
--
CREATE DATABASE `1650712_singular` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `1650712_singular`;

-- --------------------------------------------------------

--
-- Table structure for table `bot_levels`
--

CREATE TABLE IF NOT EXISTS `bot_levels` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `bot_id` int(7) NOT NULL,
  `bot_type` varchar(18) NOT NULL,
  `bot_level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(29) NOT NULL,
  `first_name` varchar(18) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `user_id`, `first_name`, `level`) VALUES
(4, '10152607174964846', 'Erin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ownedbots`
--

CREATE TABLE IF NOT EXISTS `ownedbots` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(29) NOT NULL,
  `owned_bot` varchar(37) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `ownedbots`
--

INSERT INTO `ownedbots` (`id`, `user_id`, `owned_bot`) VALUES
(36, '10152607174964846', 'pseudo');

-- --------------------------------------------------------

--
-- Table structure for table `ownedhabitats`
--

CREATE TABLE IF NOT EXISTS `ownedhabitats` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(29) NOT NULL,
  `habitat` varchar(40) NOT NULL,
  `yes_no` varchar(4) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `ownedhabitats`
--

INSERT INTO `ownedhabitats` (`id`, `user_id`, `habitat`, `yes_no`) VALUES
(20, '10152607174964846', 'spaceship', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `powercoins`
--

CREATE TABLE IF NOT EXISTS `powercoins` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(29) NOT NULL,
  `powercoins` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `powercoins`
--

INSERT INTO `powercoins` (`id`, `user_id`, `powercoins`) VALUES
(6, '10152607174964846', 700);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
