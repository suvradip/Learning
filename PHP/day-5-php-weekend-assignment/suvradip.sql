-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 03, 2015 at 08:00 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suvradip`
--

-- --------------------------------------------------------

--
-- Table structure for table `subscriber_details`
--

CREATE TABLE IF NOT EXISTS `subscriber_details` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `SUBSCRIBER_NAME` varchar(100) NOT NULL,
  `SUBSCRIBER_MAIL_ID` varchar(100) NOT NULL,
  `SUBSCRIBER_PHONE` bigint(11) NOT NULL,
  `SUBSCRIBER_SEX` varchar(6) NOT NULL,
  `SUBSCRIBER_COUNTRY` varchar(30) NOT NULL,
  `SUBSCRIBER_STATE` varchar(30) NOT NULL,
  `SUBSCRIBER_FEEDBACK` text NOT NULL,
  `INTEREST_GAME` varchar(10) NOT NULL,
  `INTEREST_MOVIE` varchar(10) NOT NULL,
  `INTEREST_READING` varchar(10) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `subscriber_details`
--

INSERT INTO `subscriber_details` (`ID`, `SUBSCRIBER_NAME`, `SUBSCRIBER_MAIL_ID`, `SUBSCRIBER_PHONE`, `SUBSCRIBER_SEX`, `SUBSCRIBER_COUNTRY`, `SUBSCRIBER_STATE`, `SUBSCRIBER_FEEDBACK`, `INTEREST_GAME`, `INTEREST_MOVIE`, `INTEREST_READING`) VALUES
(37, 'suvradip', 'suradip@fusioncharts.com', 8981390509, 'Male', 'IN', 'West Bengal', 'Good Morning.', 'undefined', 'undefined', 'Reading');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
