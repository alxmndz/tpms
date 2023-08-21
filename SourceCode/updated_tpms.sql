-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 07:46 AM
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
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `eventdate` varchar(100) NOT NULL,
  `start` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `eventdate`, `start`, `endtime`, `description`, `location`) VALUES
(29, 'Baptismal', '2023-08-19', '08:00', '10:30', 'Requirements needed to be submitted is Birth Certificate', 'SVF Church');

-- --------------------------------------------------------

--
-- Table structure for table `baptismal_tbl`
--

CREATE TABLE `baptismal_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bapDate` date NOT NULL,
  `bapTime` varchar(100) NOT NULL,
  `birthCert` varchar(100) NOT NULL,
  `marriageCont` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blessing_tbl`
--

CREATE TABLE `blessing_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `blessDate` date NOT NULL,
  `blessTime` varchar(100) NOT NULL,
  `intention` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `communion_tbl`
--

CREATE TABLE `communion_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `comDate` date NOT NULL,
  `comTime` varchar(100) NOT NULL,
  `bapCert` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_tbl`
--

CREATE TABLE `confirmation_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `conDate` date NOT NULL,
  `conTime` varchar(100) NOT NULL,
  `bapCert` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `donatedDate` date NOT NULL,
  `amount` int(255) NOT NULL,
  `event` varchar(50) NOT NULL,
  `receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `addedBy`, `name`, `contact`, `email`, `address`, `donatedDate`, `amount`, `event`, `receipt`) VALUES
(9, 9, 'Kim Alexander Mendoza', '09123456789', 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', '2023-07-28', 1000, 'Baptismal', 'donate/gcashTemplate.jpeg'),
(10, 11, 'Jerico Cabotaje', '09123456789', 'cabotaje012@gmail.com', 'Sitio Maligas, Tuy Batangas', '2023-07-29', 2500, 'Baptismal', 'donate/gcashTemplate.jpeg'),
(11, 13, 'Ronan Jay Lopez', '09123456789', 'rjaylopez@gmail.com', 'Bolboc, Tuy Batangas', '2023-07-30', 1500, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(12, 12, 'Johnvic Lopez', '09123456789', 'jlopez@gmail.com', 'Bolboc, tuy Batangas', '2023-07-30', 1500, 'Wedding', 'donate/gcashTemplate.jpeg'),
(13, 18, 'Emmanuel De Guzman', '09123456789', 'emmandguzman@gmail.com', 'Guinahawa, Tuy Batangas', '2023-07-30', 2300, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(14, 19, 'Carl Michael Laxa', '09123456789', 'carlmichaellx@gmail.com', 'Brgy. Luna St., Tuy Batangas', '2023-07-30', 3000, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(15, 17, 'Chlea Aquino', '09123456789', 'chleaaquino@gmail.com', 'Guinhawa, Tuy Batangas', '2023-07-30', 3000, 'Wedding', 'donate/gcashTemplate.jpeg'),
(16, 14, 'Hans Christian Abogado', '09123456789', 'abogado018@gmail.com', 'Bolboc, Tuy Batangas', '2023-07-31', 1500, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(17, 15, 'Dexter Avejero', '09123456789', 'dexter@gmail.com', 'Mataywanac, Tuy Batangas', '2023-07-31', 1500, 'Baptismal', 'donate/gcashTemplate.jpeg'),
(18, 16, 'Lei Aldrin Sacdalan', '09123456789', 'leisacdalan@gmail.com', 'Brgy. Luna St., Tuy Batangas', '2023-07-30', 1500, 'Communion', 'donate/gcashTemplate.jpeg'),
(19, 9, 'Kim Alexander Mendoza', '09123456789', 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', '2023-07-30', 1000, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(21, 21, 'Kent Bryan Carbayar', '09123456789', 'carbayar01@gmail.com', 'Dalima, Tuy Batangas', '2023-08-06', 1500, 'Confirmation', 'donate/gcashTemplate.jpeg'),
(24, 15, 'Dexter Avejero', '09123456789', 'dexter@gmail.com', 'Mataywanac, Tuy Batangas', '2023-08-14', 1500, 'Baptismal', 'donate/gcash.png');

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `eventday` varchar(50) NOT NULL,
  `start` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `daynumber` int(11) NOT NULL,
  `month` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`id`, `title`, `eventday`, `start`, `endtime`, `location`, `description`, `daynumber`, `month`) VALUES
(1, 'Baptismal', 'Monday', '2023-08-19 07:30:00', '2023-08-19 10:30:00', 'SVF Church', 'Baptismal', 31, 'JUL'),
(2, 'Confirmation', 'Tuesday', '2023-08-19 08:30:00', '2023-08-19 12:30:00', 'SVF Church', 'Confirmation', 1, 'AUG'),
(3, 'Blessing', 'Wednesday', '2023-08-19 09:00:00', '2023-08-19 12:00:00', 'SVF Church', 'Blessing', 2, 'AUG'),
(4, 'Wedding', 'Monday', '2023-08-19 08:30:00', '2023-08-19 10:00:00', 'SVF Church', 'Wedding', 31, 'JUL');

-- --------------------------------------------------------

--
-- Table structure for table `funeralmass_tbl`
--

CREATE TABLE `funeralmass_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `mName` varchar(100) NOT NULL,
  `widow` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `deathDate` date NOT NULL,
  `age` int(11) NOT NULL,
  `buryDate` date NOT NULL,
  `cause` varchar(100) NOT NULL,
  `sacrament` varchar(100) NOT NULL,
  `lastsacrament` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
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
(10, 9, 'Kim Alexander Mendoza', '09123456789', 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', 'Baptismal Certificate', 'Pending', 1000, 'receipt/gcashTemplate.jpeg', ''),
(11, 14, 'Hans Christian Abogado', '09123456789', 'abogado018@gmail.com', 'Bolboc, Tuy Batangas', 'Confirmation Certificate', 'Pending', 5000, 'receipt/gcashTemplate.jpeg', ''),
(12, 15, 'Dexter Avejero', '09123456789', 'dexter@gmail.com', 'Mataywanac, Tuy Batangas', 'Marriage Certificate', 'Pending', 5000, 'receipt/gcashTemplate.jpeg', ''),
(13, 17, 'Chlea Aquino', '09123456789', 'chleaaquino@gmail.com', 'Guinhawa, Tuy Batangas', 'Marriage Certificate', 'Pending', 5000, 'receipt/gcashTemplate.jpeg', ''),
(14, 16, 'Lei Aldrin Sacdalan', '09123456789', 'leisacdalan@gmail.com', 'Brgy. Luna St., Tuy Batangas', 'Communion Certificate', 'Pending', 5000, 'receipt/gcashTemplate.jpeg', ''),
(20, 10, 'John Lexer Ibita', '09498275214', 'ibita@gmail.com', 'Bolboc, Tuy Batangas', 'Baptismal Certificate', 'Pending', 1000, 'receipt/gcash.png', '');

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
(9, 544399772, 'alxmndz', 'Kim Alexander Mendoza', 'alxmndz@gmail.com', 'Bolbok, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690458162scorpion.jpg'),
(10, 245634236, 'jbisnan', 'Jeeper Bisnan', 'jbisnan@gmail.com', 'Tuy, Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'admin', '1690521121Basic_Ui_(186).jpg'),
(11, 919915831, 'jerico', 'Jerico Cabotaje', 'cabotaje012@gmail.com', 'Sitio Maligas, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690595359tn_scorpion_11_pr.png'),
(12, 102660312, 'Johnvic', 'Johnvic Lopez', 'jlopez@gmail.com', 'Bolboc, tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690690254gcashTemplate.jpeg'),
(13, 478689619, 'rjaylopez', 'Ronan Jay Lopez', 'rjaylopez@gmail.com', 'Bolboc, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690690304subzero-mortal-kombat-11-uhdpaper.com-4K-5.jpg'),
(14, 933182356, 'hans', 'Hans Christian Abogado', 'abogado018@gmail.com', 'Bolboc, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '16907187216bd4db65b93a499a20cd3c19b45026e3.jpg'),
(15, 154699500, 'dex', 'Dexter Avejero', 'dexter@gmail.com', 'Mataywanac, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '169071877954a2d4c7da9d0efcb643e040ef60d4fd.jpg'),
(16, 1095907067, 'lei', 'Lei Aldrin Sacdalan', 'leisacdalan@gmail.com', 'Brgy. Luna St., Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718849tumblr_5ba2e999a2e8ccc618a14e2e41f9c37f_59bad1a2_1280.jpg'),
(17, 413621422, 'chlea', 'Chlea Aquino', 'chleaaquino@gmail.com', 'Guinhawa, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '16907188955f50a3389aa56dab202831246f6985de.jpg'),
(18, 1498444252, 'emman', 'Emmanuel De Guzman', 'emmandguzman@gmail.com', 'Guinahawa, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718933264e5e9add7efb05531d4ed61e979b7d.jpg'),
(19, 1052392331, 'janno', 'Carl Michael Laxa', 'carlmichaellx@gmail.com', 'Brgy. Luna St., Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718980056c98397f41e003870ff8164f5a8c77.jpg'),
(21, 1621718564, 'kent', 'Kent Bryan Carbayar', 'carbayar01@gmail.com', 'Dalima, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1691310343tumblr_79111573eba9bf99d7146152bfbbf8d9_2cd8469e_640.jpg'),
(22, 519731486, 'russ', 'Russel Alicaway', 'rusellalics@gmail.com', 'Brgy. Magahis, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1692025600vecteezy_man-avatar-vector_23402468.jpg'),
(23, 1447454323, 'mitchlei', 'Mitchlei Perez', 'mitchlei@gmail.com', 'Obispo, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '169202582514585560.jpg'),
(24, 669481157, 'lorenz', 'John Lorenz Lapitan', 'lorenzlapitan@gmail.com', 'Brgy.Burgos, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'staff', '1692284578bro.lorenz.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `wedding_tbl`
--

CREATE TABLE `wedding_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `groom` varchar(100) NOT NULL,
  `bride` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gContact` varchar(11) NOT NULL,
  `bContact` varchar(11) NOT NULL,
  `gAddress` varchar(100) NOT NULL,
  `bAddress` varchar(100) NOT NULL,
  `package` varchar(25) NOT NULL,
  `intention` varchar(25) NOT NULL,
  `wdate` date NOT NULL,
  `startTime` varchar(100) NOT NULL,
  `endTime` varchar(100) NOT NULL,
  `gBirthCert` varchar(100) NOT NULL,
  `bBirthCert` varchar(100) NOT NULL,
  `gBapCert` varchar(100) NOT NULL,
  `bBapCert` varchar(100) NOT NULL,
  `gConCert` varchar(100) NOT NULL,
  `bConCert` varchar(100) NOT NULL,
  `cenomar` varchar(100) NOT NULL,
  `marriageLicense` varchar(100) NOT NULL,
  `3RPic1` varchar(100) NOT NULL,
  `3RPic2` varchar(100) NOT NULL,
  `MBPic1` varchar(100) NOT NULL,
  `MBPic2` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `eventlist`
--
ALTER TABLE `eventlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funeralmass_tbl`
--
ALTER TABLE `funeralmass_tbl`
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
-- Indexes for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `funeralmass_tbl`
--
ALTER TABLE `funeralmass_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  ADD CONSTRAINT `baptismal_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  ADD CONSTRAINT `blessing_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
  ADD CONSTRAINT `communion_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
  ADD CONSTRAINT `confirmation_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `funeralmass_tbl`
--
ALTER TABLE `funeralmass_tbl`
  ADD CONSTRAINT `funeralmass_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);

--
-- Constraints for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
  ADD CONSTRAINT `wedding_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
