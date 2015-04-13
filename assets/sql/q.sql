-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 05:34 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `q`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `toiletId` bigint(20) unsigned NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `latitude` decimal(8,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`toiletId`, `longitude`, `latitude`) VALUES
(1, '121.062000', '14.661251'),
(2, '121.062011', '14.661210'),
(3, '121.055910', '14.657068'),
(4, '121.055922', '14.657084'),
(5, '121.02686',  '14.6566'),
(6, '121.05401215', '14.65387384'),
(7, '121.06753048', '14.66396282');

-- --------------------------------------------------------

--
-- Table structure for table `toilets`
--

CREATE TABLE IF NOT EXISTS `toilets` (
`toiletId` bigint(20) unsigned NOT NULL,
  `gender` tinyint(1) NOT NULL COMMENT '1 - male, 2 - female, 3 - unisex, 4 - pwd',
  `privacy` tinyint(1) NOT NULL COMMENT '1 - public, 2 - private',
  `cost` decimal(8,2) NOT NULL DEFAULT '0.00' COMMENT '0 - free, >0 - paid',
  `cleanliness` tinyint(2) NOT NULL COMMENT '10 highest'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toilets`
--

INSERT INTO `toilets` (`toiletId`, `gender`, `privacy`, `cost`, `cleanliness`) VALUES
(1, 1, 2, '0.00', 10),
(2, 2, 2, '0.00', 10),
(3, 1, 1, '0.00', 8),
(4, 2, 1, '0.00', 8),
(5, 3, 1, '0.00', 6),
(6, 3, 1, '0.00', 4),
(7, 3, 1, '0.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `utilities`
--

CREATE TABLE IF NOT EXISTS `utilities` (
  `toiletId` bigint(20) unsigned NOT NULL,
  `toiletPaper` tinyint(1) NOT NULL DEFAULT '0',
  `bidet` tinyint(1) NOT NULL DEFAULT '0',
  `flush` tinyint(1) NOT NULL DEFAULT '0',
  `urinal` tinyint(1) NOT NULL DEFAULT '0',
  `faucetWater` tinyint(1) NOT NULL DEFAULT '0',
  `handSoap` tinyint(1) NOT NULL DEFAULT '0',
  `handSanitizer` tinyint(1) NOT NULL DEFAULT '0',
  `handDryer` tinyint(1) NOT NULL DEFAULT '0',
  `toiletryVendo` tinyint(1) NOT NULL DEFAULT '0',
  `aircondition` tinyint(1) NOT NULL DEFAULT '0',
  `wifi` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utilities`
--

INSERT INTO `utilities` (`toiletId`, `toiletPaper`, `bidet`, `flush`, `urinal`, `faucetWater`, `handSoap`, `handSanitizer`, `handDryer`, `toiletryVendo`, `aircondition`, `wifi`) VALUES
(1, 1, 0, 1, 1, 1, 1, 0, 0, 0, 0, 0),
(2, 1, 0, 1, 0, 1, 1, 0, 0, 0, 0, 0),
(3, 1, 0, 1, 1, 1, 1, 0, 0, 0, 1, 0),
(4, 1, 0, 1, 0, 1, 1, 0, 0, 0, 1, 0),
(5, 0, 0, 1, 1, 1, 1, 0, 1, 1, 1, 0),
(6, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0),
(7, 0, 0, 1, 1, 1, 1, 0, 1, 0, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
 ADD KEY `toiletId` (`toiletId`);

--
-- Indexes for table `toilets`
--
ALTER TABLE `toilets`
 ADD PRIMARY KEY (`toiletId`);

--
-- Indexes for table `utilities`
--
ALTER TABLE `utilities`
 ADD KEY `toiletId` (`toiletId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `toilets`
--
ALTER TABLE `toilets`
MODIFY `toiletId` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
ADD CONSTRAINT `locations_ibfk_1` FOREIGN KEY (`toiletId`) REFERENCES `toilets` (`toiletId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `utilities`
--
ALTER TABLE `utilities`
ADD CONSTRAINT `utilities_ibfk_1` FOREIGN KEY (`toiletId`) REFERENCES `toilets` (`toiletId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
