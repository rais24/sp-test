-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2015 at 12:51 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smartplate`
--
CREATE DATABASE IF NOT EXISTS `smartplate` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `smartplate`;

-- --------------------------------------------------------

--
-- Table structure for table `data_capture`
--

CREATE TABLE IF NOT EXISTS `data_capture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `data_capture`
--

INSERT INTO `data_capture` (`id`, `fname`, `lname`, `email`, `create_date`, `ip_address`) VALUES
(1, 'chetan', 'shrivastava', 'chetan.shrivastava84@gmail.com', '2015-04-27 12:13:02', '127.0.0.1'),
(2, 'chetan', 'shrivasta', 'jskks@dkk.com', '2015-04-27 15:45:28', '127.0.0.1'),
(3, 'fdfd', 'dfffdf', 'fdfdf@gmail.com', '2015-04-27 16:03:15', '127.0.0.1'),
(6, 'chtan', 'hssks', 'chetan.dignitas@gmail.com', '2015-04-27 16:05:12', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
