-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2021 at 01:06 PM
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
-- Database: `arrival`
--

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `id` int(30) NOT NULL,
  `Tracking` varchar(40) NOT NULL,
  `Sender` varchar(50) NOT NULL,
  `Student` varchar(50) NOT NULL,
  `Phone` int(30) NOT NULL,
  `Arrived` date NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `arrival`
--

INSERT INTO `arrival` (`id`, `Tracking`, `Sender`, `Student`, `Phone`, `Arrived`, `Status`) VALUES
(25, '12345678', 'JOACHIM', 'AUGUSTINE', 123456789, '2021-05-30', 'Received'),
(27, '23456789', 'MUHAMMAD AKMAL', 'MOHD AMMERUL', 165123181, '2021-06-06', 'Received'),
(28, '34567890', 'MOHD FIRDAUS', 'MUHAMMAD AIDIL', 193456789, '2021-06-07', 'Received'),
(29, '12364321', 'NURAIN FITRI', 'NUR NAJWA', 112981356, '2021-06-27', 'Not delivered'),
(31, '34567890', 'MICHEAL', 'FRANKIN', 193456789, '2021-06-30', 'Not delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrival`
--
ALTER TABLE `arrival`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
