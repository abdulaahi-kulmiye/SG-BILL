-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2017 at 04:36 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sahal_gas`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `cus_id` int(11) NOT NULL,
  `cus_name` varchar(50) DEFAULT NULL,
  `cus_phone` varchar(30) NOT NULL,
  `cus_address` varchar(80) DEFAULT NULL,
  `cus_type` varchar(40) DEFAULT NULL,
  `cus_register` varchar(50) DEFAULT NULL,
  `cus_description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`cus_id`, `cus_name`, `cus_phone`, `cus_address`, `cus_type`, `cus_register`, `cus_description`) VALUES
(18, 'hodan maxamed', '8654654846', 'garowe', 'home use', 'Mohamed Abdirazak Khalif', 'waa iska'),
(22, '', '', '', 'home use', 'Abdullahi Abdikadir Abdisahal', ''),
(23, '', '', '', 'home use', 'Abdullahi Abdikadir Abdisahal', ''),
(16, 'bashiir axmed', '7569842', 'galkacyo', 'business use', 'Mohamed Wagad', 'waa shaqaale'),
(17, 'cali khadal', '7854645', 'bosaso', 'home use', 'Mohamed Abdirazak Khalif', 'ffsdfsdfs'),
(21, 'xamdi axmed', '87674468', 'bosaso', 'business use', 'mohamed khalif', 'shaqaale'),
(24, '', '', '', 'home use', 'Abdullahi Abdikadir Abdisahal', ''),
(25, '', '', '', 'home use', 'Abdullahi Abdikadir Abdisahal', ''),
(26, '', '', '', 'home use', 'Faarax Ismaaciil', 'fdsfsdfsadf'),
(27, 'geedi rooble', '7258694', 'bosaso', 'home use', 'Mohamed Abdirazak Khalif', '');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_phone` varchar(50) DEFAULT NULL,
  `driver_description` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`driver_id`, `driver_name`, `driver_phone`, `driver_description`) VALUES
(1, 'Abdullahi Abdikadir Abdisahal', '7701622', 'wade gaari'),
(2, 'Mohamed Abdirazak Khalif', '7455137', 'wade gaari'),
(3, 'Faarax Ismaaciil', '755558585', 'wade gaari'),
(5, 'wagad', '771622', 'maskax faaruq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`cus_id`,`cus_phone`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`driver_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
