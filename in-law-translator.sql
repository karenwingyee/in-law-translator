-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2015 at 10:43 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `in-law-translator`
--

-- --------------------------------------------------------

--
-- Table structure for table `female`
--

CREATE TABLE IF NOT EXISTS `female` (
`id` int(11) NOT NULL,
  `phrase` longtext NOT NULL,
  `meaning` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `female`
--

INSERT INTO `female` (`id`, `phrase`, `meaning`) VALUES
(1, 'Would you like a drink?', 'Are you an alcoholic?');

-- --------------------------------------------------------

--
-- Table structure for table `male`
--

CREATE TABLE IF NOT EXISTS `male` (
`id` int(11) NOT NULL,
  `phrase` longtext NOT NULL,
  `meaning` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `male`
--

INSERT INTO `male` (`id`, `phrase`, `meaning`) VALUES
(1, 'Do you like cooking?', 'Can you cook?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `female`
--
ALTER TABLE `female`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `male`
--
ALTER TABLE `male`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `female`
--
ALTER TABLE `female`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `male`
--
ALTER TABLE `male`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
