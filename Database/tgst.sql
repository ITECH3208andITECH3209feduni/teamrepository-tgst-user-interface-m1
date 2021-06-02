-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 06:00 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgst`
--
CREATE DATABASE IF NOT EXISTS `tgst` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tgst`;

-- --------------------------------------------------------

--
-- Table structure for table `purchase1`
--
-- Creation: May 12, 2021 at 11:49 AM
--

DROP TABLE IF EXISTS `purchase1`;
CREATE TABLE IF NOT EXISTS `purchase1` (
  `p_id` int(10) NOT NULL AUTO_INCREMENT,
  `i_number` varchar(50) NOT NULL,
  `i_date` date NOT NULL,
  `i_value` varchar(255) NOT NULL,
  `supplyplace` varchar(255) NOT NULL,
  `reversecharge` varchar(10) NOT NULL,
  `i_type` varchar(15) NOT NULL,
  `rate` int(10) NOT NULL,
  `tax_value` decimal(10,0) NOT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `i_number` (`i_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `purchase1`:
--

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--
-- Creation: May 12, 2021 at 11:49 AM
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `s_id` int(10) NOT NULL AUTO_INCREMENT,
  `i_number` varchar(50) NOT NULL,
  `i_date` date NOT NULL,
  `i_value` varchar(255) NOT NULL,
  `supplyplace` varchar(255) NOT NULL,
  `reversecharge` varchar(10) NOT NULL,
  `i_type` varchar(15) NOT NULL,
  `rate` int(10) NOT NULL,
  `tax_value` decimal(10,0) NOT NULL,
  PRIMARY KEY (`s_id`),
  UNIQUE KEY `i_number` (`i_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `sales`:
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
