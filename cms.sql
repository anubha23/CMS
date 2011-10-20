-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 20, 2011 at 08:48 AM
-- Server version: 5.5.8
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
-- Table structure for table `cmsarticles`
--

CREATE TABLE IF NOT EXISTS `cmsarticles` (
  `ID` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `content` text,
  `TitleTime` datetime NOT NULL COMMENT 'stores the time the article was published/updated',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `cmsarticles`
--

INSERT INTO `cmsarticles` (`ID`, `title`, `content`, `TitleTime`) VALUES
(1, 'hey!', 'this is my first article', '2011-09-21 00:54:18'),
(4, 'hi', 'what''s new?', '2011-09-21 03:04:51'),
(5, 'Domain offers you don''t want to miss!', 'Now buy a .com domain and get the other absolutely free!', '2011-09-22 21:01:28'),
(7, 'Coming up..', 'Watch out for our webcast on 28th Sept at 19:00 hrs', '2011-09-22 21:07:50'),
(9, 'Domain prices slashed!', 'Now buy a domain for only Rs. 99*', '2011-09-29 00:35:22'),
(11, 'Hello', 'testing...', '2011-09-29 00:38:59'),
(12, 'testing', 'hey hey..', '2011-09-29 00:49:35'),
(13, 'Timepass', 'Just for fun..testing', '2011-10-19 19:00:43'),
(14, 'Welcome October!', 'hello! this is an october post!', '2011-10-20 00:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `cmsusers`
--

CREATE TABLE IF NOT EXISTS `cmsusers` (
  `ID` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(20) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `designation` int(1) NOT NULL DEFAULT '0' COMMENT 'specifies whether admin or user',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `cmsusers`
--

INSERT INTO `cmsusers` (`ID`, `user`, `pass`, `firstname`, `lastname`, `designation`) VALUES
(1, 'admin', '*CF601F9E564D3E53365263D04F0665DCDC2E341E', 'Anubha', 'Bhat', 1),
(2, 'ritz', '*613E87D51665F2A86950C1C10B70FF5A11CC4686', 'Reeti', 'Dwivedi', 0),
(5, 'chinks', '*F524F5845679551BA48262801FDA603D3CDDDCCC', 'Shrushti', 'Agarwal', 0),
(11, 'jd', '*583DEFCD4246944A68F64C2FBC3ED61033048B06', 'Jaydeep', 'Shah', 0);
