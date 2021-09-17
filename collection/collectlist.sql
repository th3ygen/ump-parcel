-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 11:56 AM
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
-- Database: `dbactivelist`
--

-- --------------------------------------------------------

--
-- Table structure for table `collectlist`
--

CREATE TABLE `collectlist` (
  `Student_Name` varchar(50) NOT NULL,
  `Phone_Number` int(15) NOT NULL,
  `Tracking_Number` varchar(15) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Arrival_Date` date NOT NULL,
  `Parcel_Type` varchar(30) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `Collect_Date` date NOT NULL,
  `Goods_Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
