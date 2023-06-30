-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 05:49 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`user_id`, `unique_id`, `fname`, `lname`, `email`, `password`, `img`, `status`, `type`) VALUES
(1, 652190505, 'Alex', 'Mendoza', 'alxmndz@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '1687705922295247190_1236635760527554_4871297374157259135_n.jpg', 'Active now', 'admin'),
(3, 395033215, 'Kent', 'Carbayar', 'kentc@yahoo.com', '1a1dc91c907325c69271ddf0c944bc72', '1687962533spider-man-variants-spiderman-across-the-spider-verse-4k-wallpaper-uhdpaper.com-780@1@k.jpg', 'Active now', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announceID` bigint(20) NOT NULL,
  `announceTitle` varchar(255) NOT NULL,
  `announceDate` date NOT NULL,
  `announceTime` time NOT NULL,
  `announceDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `donateID` bigint(20) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `donateAmount` int(11) NOT NULL,
  `donateDate` date NOT NULL,
  `donateReceipt` varchar(255) NOT NULL,
  `donateEvent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`donateID`, `fname`, `lname`, `donateAmount`, `donateDate`, `donateReceipt`, `donateEvent`) VALUES
(1, 'Alex', 'Mendoza', 2000, '2023-06-25', 'communion.jpg', ''),
(2, 'Jerico', 'Cabotaje', 3000, '2023-06-26', 'blessings.jpg', 'Blessing');

-- --------------------------------------------------------

--
-- Table structure for table `eventres`
--

CREATE TABLE `eventres` (
  `eventResID` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` time NOT NULL,
  `contactNum` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `sponsored` varchar(100) DEFAULT NULL,
  `package` varchar(255) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `refNum` varchar(100) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `receiptIMG` longblob NOT NULL,
  `optionPay` varchar(255) NOT NULL,
  `credentialIMG` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `formsID` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobilePhone` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `formType` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `amount` int(11) NOT NULL,
  `pack` varchar(255) NOT NULL,
  `refNum` varchar(50) DEFAULT NULL,
  `receiptIMG` varchar(255) DEFAULT NULL,
  `optionPay` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `reportID` bigint(20) NOT NULL,
  `reportTitle` varchar(255) NOT NULL,
  `reportDate` date NOT NULL,
  `reportTime` time NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`reportID`, `reportTitle`, `reportDate`, `reportTime`, `description`) VALUES
(5, 'Libreng Binyagan sa Tuy', '2023-06-29', '08:10:00', 'Organizer Mr. John Lorenz Lapitan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announceID`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`donateID`);

--
-- Indexes for table `eventres`
--
ALTER TABLE `eventres`
  ADD PRIMARY KEY (`eventResID`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`formsID`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`reportID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announceID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `donateID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eventres`
--
ALTER TABLE `eventres`
  MODIFY `eventResID` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `formsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `reportID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
