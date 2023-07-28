-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2023 at 06:48 AM
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
-- Database: `tpms`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `donatedDate` date NOT NULL,
  `amount` int(11) NOT NULL,
  `event` varchar(50) NOT NULL,
  `receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `addedBy`, `name`, `contact`, `email`, `address`, `donatedDate`, `amount`, `event`, `receipt`) VALUES
(3, 8, 'Kent Bryan Carbayar', 2147483647, 'kentc@yahoo.com', 'Dalima, Tuy Batangas', '2023-07-27', 1000, 'Baptismal', 'donate/gcashTemplate.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `event` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `amount` int(11) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `addedBy`, `name`, `contact`, `email`, `address`, `event`, `status`, `amount`, `receipt`, `certificate`) VALUES
(3, 8, 'Kent Bryan Carbayar', 2147483647, 'kentc@yahoo.com', 'Dalima, Tuy Batangas', 'Baptismal Certificate', 'Approved', 1000, 'receipt/gcashTemplate.jpeg', ''),
(4, 9, 'Kim Alexander Mendoza', 2147483647, 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Baptismal Certificate', 'Pending', 1000, 'receipt/gcashTemplate.jpeg', ''),
(5, 9, 'Kim Alexander Mendoza', 2147483647, 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Communion Certificate', 'Pending', 1500, 'receipt/gcashTemplate.jpeg', ''),
(6, 9, 'Kim Alexander Mendoza', 2147483647, 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Confirmation Certificate', 'Pending', 1500, 'receipt/gcashTemplate.jpeg', ''),
(7, 9, 'Kim Alexander Mendoza', 2147483647, 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Death Certificate', 'Pending', 1000, 'receipt/gcashTemplate.jpeg', ''),
(8, 9, 'Kim Alexander Mendoza', 2147483647, 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Marriage Certificate', 'Pending', 1000, 'receipt/gcashTemplate.jpeg', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `unique_id` int(255) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `type` varchar(50) NOT NULL DEFAULT 'patron',
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `unique_id`, `uname`, `name`, `email`, `address`, `password`, `contact`, `type`, `profile`) VALUES
(8, 694779284, 'kent', 'Kent Bryan Carbayar', 'kentc@yahoo.com', 'Dalima, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690454121169016571169744-mortal-kombat-11-mortal-kombat-2019-games-games-hd-4k.jpg'),
(9, 544399772, 'alxmndz', 'Kim Alexander Mendoza', 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690458162scorpion.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
