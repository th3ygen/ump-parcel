-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 01:21 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ump_parcel`
--

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `parcelId` varchar(10) NOT NULL,
  `type` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `recipientName` varchar(30) NOT NULL,
  `recipientContact` varchar(30) NOT NULL,
  `recipientAddress` varchar(50) NOT NULL,
  `senderName` varchar(30) NOT NULL,
  `senderContact` varchar(30) NOT NULL,
  `senderAddress` varchar(50) NOT NULL,
  `postService` varchar(30) NOT NULL,
  `trackingNum` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL,
  `dateArrived` date NOT NULL,
  `dateReceived` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`parcelId`, `type`, `label`, `recipientName`, `recipientContact`, `recipientAddress`, `senderName`, `senderContact`, `senderAddress`, `postService`, `trackingNum`, `status`, `dateArrived`, `dateReceived`) VALUES
('112', 'Good', 'clothes', 'Irfan Fahmi', '0132678583', 'UMP Pekan,26600 Pekan,Pahang', 'Johan Bakar', '01231455567', 'Johor Bharu, Johor', 'j&t', '68123456', 'Receives', '2021-02-03', '2021-03-08'),
('340', 'Good', 'clothes', 'NUR NAJWA', '0123456789', 'UMP Pekan,26600 Pekan,Pahang', 'AB RAHMAN', '01112312891', 'Kg Peramu Jaya 3, 26600 Pekan, Pekan', 'Poslaju', 'pl123678', 'Receives', '2021-05-26', '2021-05-28'),
('341', 'Good', 'clothes', 'NUR NAJWA', '0123456789', 'UMP Pekan,26600 Pekan,Pahang', 'Kassim Selamat', '0125643789', 'Taman Jaya,18000 Kuala Krai, Kelantan', 'j&t', '69087657', 'Receives', '2021-05-31', '2021-05-31'),
('432', 'Good', 'Book', 'NUR NAJWA', '0123456789', 'UMP Pekan,26600 Pekan,Pahang', 'Norlia ', '01112312891', 'KOK LANAS,16450 KOTA BHARU, KELANTAN', 'Cjmy', '11298761', 'Receives', '2021-05-27', '2021-06-28'),
('434', 'Good', 'Book', 'NUR NAJWA', '0123456789', 'UMP Pekan,26600 Pekan,Pahang', 'MUHD AMINUDDIN', '01112312891', 'KEDAI BUKU MUDA OSMAN KOK LANAS,16450 KOTA BHARU, ', 'j&t', '662386', 'Receives', '2021-06-04', '2021-06-05'),
('435', 'Good', 'clothes', 'NUR NAJWA', '0123456789', 'UMP Pekan,26600 Pekan,Pahang', 'Eliza Johari', '0112345677', 'Kg Peramu Jaya 3, 26600 Pekan, Pekan', 'Poslaju', 'pl112312', 'collected', '2021-07-03', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`parcelId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
