-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 26, 2017 at 11:46 PM
-- Server version: 5.6.37
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `monkedia`
--
CREATE DATABASE IF NOT EXISTS `monkedia` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `monkedia`;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `first_name`, `last_name`, `company_name`) VALUES
(1, 'Adam', 'Campbell', 'Test Company 1'),
(2, 'Christa', 'Campbell', 'Test Company 2'),
(3, 'Layla', 'Campbell', 'Test Child Company 1'),
(4, 'Ashlyn', 'McCarty', 'Test Child Company 2'),
(5, 'Jaxson ', 'Campbell', 'Test Child Company 3'),
(6, 'Sue', 'Crum', 'Test Parent Company 1'),
(7, 'Steve', 'Crum', 'Test Step Parent Company 1'),
(8, 'Mark', 'Campbell', 'Test Parent Company 2'),
(9, 'Brenda', 'Campbell', 'Test Step Parent Company 2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(11, 'admin', '5dbf33db9162b990d71474b19f35e27105437bc4'),
(12, 'user', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');
