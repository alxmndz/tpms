-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 06:59 AM
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
  `description` varchar(255) NOT NULL,
  `announcePic` varchar(255) NOT NULL,
  `postDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `description`, `announcePic`, `postDate`) VALUES
(39, 'sample announce', 'secret', '../announcement/liquid-cheese.png', '2023-10-07'),
(41, 'Church Visitation', 'You may register here in Saint Vincent Ferrer Parish', '../announcement/Why-Choose-an-IT-Career.jpg', '2023-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `baptismal_tbl`
--

CREATE TABLE `baptismal_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `bapDate` date NOT NULL,
  `bapTime` varchar(100) NOT NULL,
  `birthCert` varchar(100) NOT NULL,
  `marriageCont` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `tDate` date NOT NULL DEFAULT current_timestamp(),
  `payMethod` varchar(100) NOT NULL,
  `transactType` varchar(255) NOT NULL,
  `refNum` varchar(100) NOT NULL,
  `father` varchar(100) NOT NULL,
  `mother` varchar(100) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `parishPriest` varchar(100) NOT NULL,
  `bapPriest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptismal_tbl`
--

INSERT INTO `baptismal_tbl` (`id`, `addedBy`, `name`, `contact`, `address`, `bapDate`, `bapTime`, `birthCert`, `marriageCont`, `sponsor1`, `sponsor2`, `amount`, `receipt`, `status`, `tDate`, `payMethod`, `transactType`, `refNum`, `father`, `mother`, `birthPlace`, `birthday`, `parishPriest`, `bapPriest`) VALUES
(17, 10, 'Alexander Mendoza', '09123456789', 'Bolboc', '2023-09-27', '10:36', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 1000, '../receipt/gcashTemp.png', 'In Process', '2023-09-27', 'gcash', 'Walk-In', '1234567890', '', '', '', '0000-00-00', '', ''),
(18, 10, 'Klief Alexis M. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-09-27', '10:52', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'In Process', '2023-09-27', 'face-to-face', 'Walk-In', '\r\n', '', '', '', '0000-00-00', '', ''),
(29, 10, 'Jerico R. Cabotaje', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-07', '06:34', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'Approved', '2023-09-30', 'face-to-face', 'Walk-In', '', '', '', '', '0000-00-00', '', ''),
(31, 9, 'Kim Alexander M. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-11-11', '11:26', '../upload/birthCert/Birth-Certificate-Template-1-TemplateLab-scaled.jpg', '../upload/marriageCont/c46602985fc9ecff262a3f7663436eda.png', '../upload/sponsors/download.jpg', '../upload/sponsors/sq-10c44e5bac6342ed839252128760d2fa.jpg', 1000, '../receipt/gcashTemp.png', 'Disapproved, Because mismatch files', '2023-10-01', '', 'Online', '12345678', '', '', '', '0000-00-00', '', ''),
(32, 10, 'asdasd', '90128409328', 'jklsadfjkljl', '2023-10-04', '10:39', '', 'Parents Marriage Contract', 'Sponsor 1', '', 0, '', 'Disapproved, Because mismatch files', '2023-10-04', 'face-to-face', 'Walk-In', '', '', '', '', '0000-00-00', '', ''),
(33, 24, 'Sample1', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-05', '03:28', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'In Process', '2023-10-05', 'face-to-face', 'Walk-In', '', '', '', '', '0000-00-00', '', ''),
(34, 24, 'Kent Bryan C. Carbayar', '09618277738', 'Dalima, Tuy Batangas', '2023-10-09', '09:00', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 1000, '../receipt/379567276_844000473925195_5451346223999834902_n.jpg', 'Approved', '2023-10-09', 'gcash', 'Walk-In', '1234567890', '', '', '', '0000-00-00', '', ''),
(37, 10, 'kent bryan carbayar', '09123456789', 'dALIMA, TUY BATANGAS', '2023-10-17', '10:50', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'Approved', '2023-10-17', 'face-to-face', 'Walk-In', '', '', '', '', '0000-00-00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `blessing_tbl`
--

CREATE TABLE `blessing_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `blessDate` date NOT NULL,
  `blessTime` varchar(100) NOT NULL,
  `intention` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `payMethod` varchar(100) NOT NULL,
  `transactType` varchar(255) NOT NULL,
  `refNum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blessing_tbl`
--

INSERT INTO `blessing_tbl` (`id`, `addedBy`, `name`, `contact`, `address`, `blessDate`, `blessTime`, `intention`, `amount`, `receipt`, `status`, `transactDate`, `payMethod`, `transactType`, `refNum`) VALUES
(15, 10, 'Patrick Remoroza', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-07', '10:45', 'Sponsor', 2500, '../receipt/gcashTemp.png', 'In Process', '2023-09-28', 'gcash', 'Walk-In', '0987654321'),
(19, 9, 'Kim Alexander M. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-01', '11:52', 'Birthday', 1000, '../receipt/gcashTemp.png', 'In Process', '2023-10-01', 'gcash', 'Online', '12345678'),
(21, 9, 'Djoanna Marie V. Salac', '09123456789', 'Brgy. Burgos Tuy, Batangas', '2023-10-03', '04:08', 'Thanksgive', 1000, '../receipt/gcashTemp.png', 'Approved', '2023-10-03', 'gcash', 'Online', '1234567890');

-- --------------------------------------------------------

--
-- Table structure for table `communion_tbl`
--

CREATE TABLE `communion_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `comDate` date NOT NULL,
  `comTime` varchar(100) NOT NULL,
  `bapCert` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `transactType` varchar(255) NOT NULL,
  `refNum` varchar(100) NOT NULL,
  `payMethod` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communion_tbl`
--

INSERT INTO `communion_tbl` (`id`, `addedBy`, `name`, `contact`, `address`, `comDate`, `comTime`, `bapCert`, `description`, `amount`, `receipt`, `status`, `transactDate`, `transactType`, `refNum`, `payMethod`) VALUES
(6, 10, 'Erica S. Peña', '09123456789', 'San Jose, Tuy Batangas', '2023-09-28', '10:30', 'Baptismal Certificate', 'N/A', 0, '', 'Approved', '2023-09-28', 'Walk-In', '', 'face-to-face'),
(9, 9, 'Kim Alexander M. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-02', '00:06', '../bapCert/download (1).jpg', 'N/A', 1500, '../receipt/gcashTemp.png', 'Approved', '2023-10-02', 'Online', '12345678', 'gcash');

-- --------------------------------------------------------

--
-- Table structure for table `confirmation_tbl`
--

CREATE TABLE `confirmation_tbl` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `conDate` date NOT NULL,
  `conTime` varchar(100) NOT NULL,
  `bapCert` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `transactType` varchar(255) NOT NULL,
  `payMethod` varchar(100) NOT NULL,
  `refNum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmation_tbl`
--

INSERT INTO `confirmation_tbl` (`id`, `addedBy`, `name`, `contact`, `address`, `conDate`, `conTime`, `bapCert`, `description`, `amount`, `receipt`, `status`, `transactDate`, `transactType`, `payMethod`, `refNum`) VALUES
(10, 10, 'Edison S. Valdez', '09123456789', 'San Jose, Tuy Batangas', '2023-10-07', '11:36', 'Baptismal Certificate', 'N/A', 0, '', 'In Process', '2023-09-28', 'Walk-In', 'face-to-face', ''),
(14, 9, 'Kim Alexander M. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-10-02', '10:00', '../bapCert/download (1).jpg', 'N/A', 1500, '../receipt/gcashTemp.png', 'Approved', '2023-10-02', 'Online', 'gcash', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `donatedDate` date NOT NULL DEFAULT current_timestamp(),
  `amount` double NOT NULL,
  `receipt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `addedBy`, `name`, `contact`, `donatedDate`, `amount`, `receipt`) VALUES
(36, 9, 'Kim Alexander Mendoza', '09123456789', '2023-08-27', 1000, '../donate/gcash.png'),
(37, 15, 'Dexter Avejero', '09123456789', '2023-08-27', 1500, '../donate/gcash.png'),
(38, 10, 'Kent Bryan Carbayar', '09123456789', '2023-08-29', 1000, '../donate/gcashTemplate.jpeg'),
(39, 10, 'Jerico Cabotaje', '09123456789', '2023-08-30', 2000, '../donate/gcashTemp.png'),
(41, 9, '', '09123456789', '2023-10-03', 10000, '../donate/gcashTemp.png'),
(42, 15, '', '09123456789', '2023-10-03', 2500, '../donate/gcashTemp.png'),
(48, 24, 'Kent Bryan C. Carbayar', '09123456789', '2023-10-09', 0, ''),
(49, 9, '', '09123456789', '2023-10-09', 500, '../donate/379567276_844000473925195_5451346223999834902_n.jpg');

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
(1, 'Baptismal', 'Monday', '2023-08-19 07:30:00', '2023-08-19 10:30:00', 'SVF Church', 'Baptismal', 1, 'JUL'),
(2, 'Confirmation', 'Tuesday', '2023-08-19 08:30:00', '2023-08-19 12:30:00', 'SVF Church', 'Confirmation', 31, 'JUL'),
(3, 'Blessing', 'Wednesday', '2023-08-19 09:00:00', '2023-08-19 12:00:00', 'SVF Church', 'Blessing', 2, 'AUG'),
(4, 'Wedding', 'Monday', '2023-08-19 08:30:00', '2023-08-19 10:00:00', 'SVF Church', 'Wedding', 31, 'AUG'),
(6, 'Wedding', 'Monday', '05:21:00am', '05:21:00am', 'Burgos Street, Tuy Batangas', 'Libreng Kasal', 9, 'OCT');

-- --------------------------------------------------------

--
-- Table structure for table `funeralmass_tbl`
--

CREATE TABLE `funeralmass_tbl` (
  `id` int(11) NOT NULL,
  `reqBy` varchar(100) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fName` varchar(100) NOT NULL,
  `mName` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `widow` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `deathDate` date NOT NULL,
  `age` int(11) NOT NULL,
  `buryDate` date NOT NULL,
  `cause` varchar(100) NOT NULL,
  `sacrament` varchar(100) NOT NULL,
  `lastsacrament` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `transactType` varchar(255) NOT NULL,
  `payMethod` varchar(100) NOT NULL,
  `refNum` varchar(100) NOT NULL,
  `resTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `funeralmass_tbl`
--

INSERT INTO `funeralmass_tbl` (`id`, `reqBy`, `addedBy`, `name`, `fName`, `mName`, `contact`, `widow`, `address`, `deathDate`, `age`, `buryDate`, `cause`, `sacrament`, `lastsacrament`, `amount`, `receipt`, `status`, `transactDate`, `transactType`, `payMethod`, `refNum`, `resTime`) VALUES
(13, '', 9, 'Sample1', 'Father', 'Mother', '09123456789', 'Widow', 'San Jose, Tuy Batangas', '2023-10-02', 50, '2023-10-14', 'Brain Tumor', 'Yes', 'Yes', 2000, '../receipt/gcashTemp.png', 'Disapproved, Because mismatch files', '2023-10-02', 'Online', 'gcash', '0987654321', ''),
(14, '', 10, 'Sample2', 'Father', 'Mother', '09123456789', 'Widow', 'Magahis, Tuy Batangas', '2023-09-30', 50, '2023-10-07', 'Heart Attack', 'Yes', 'Yes', 1500, '../receipt/gcashTemp.png', 'Approved', '2023-10-02', 'Walk-In', 'gcash', '12345678', ''),
(15, 'Kim Alexander M. Mendoza', 10, 'Jerome M. Saragoza', 'Jayjay A. Saragoza', 'Mary Jane M. Saragoza', '09123456789', 'None', 'Bolboc, Tuy Batangas', '2023-10-04', 50, '2023-10-14', 'Heart Attack', 'Yes', 'Yes', 0, '', 'Approved', '2023-10-04', 'Walk-In', 'face-to-face', '', '09:30'),
(16, 'Ronelyn G. Tenorio', 10, 'Nikko G. Reyes', 'Albert L. Reyes', 'Gina G. Reyes', '09123456789', 'Lorna G. Reyes', 'Toong, Tuy Batangas', '2023-10-04', 50, '2023-10-04', 'Comatose', 'Yes', 'Yes', 1500, '../receipt/379567276_844000473925195_5451346223999834902_n.jpg', 'In Process', '2023-10-04', 'Walk-In', 'gcash', '123456789', '10:25');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `addedBy` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `event` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'Pending',
  `amount` varchar(255) NOT NULL,
  `refNum` varchar(100) NOT NULL,
  `receipt` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `payMethod` varchar(255) NOT NULL,
  `transactType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `addedBy`, `name`, `contact`, `address`, `event`, `status`, `amount`, `refNum`, `receipt`, `certificate`, `transactDate`, `payMethod`, `transactType`) VALUES
(43, 10, 'Kim Alexander Mendoza', '09123456789', 'Bolboc, Tuy Batangas', 'Baptismal Certificate', 'Disapproved due to file mismatch', '10', '', '../receipt/gcashTemp.png', '', '2023-09-29', '', ''),
(44, 9, 'Nico C. David ', '09123456789', 'Dalima, Tuy Batangas', 'Baptismal Certificate', 'Disapproved due to file mismatch', '1000', '', '../receipt/gcashTemp.png', '', '2023-10-01', '', ''),
(45, 9, 'Denver P. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', 'Baptismal Certificate', 'In Process', '', '', '', '', '2023-10-01', '', ''),
(46, 9, 'Claire Ann D. Hernandez', '09123456789', 'Malibu, Tuy Batangas', 'Confirmation Certificate', 'Ready to pick up', '1000', '12345678', '../receipt/gcashTemp.png', '', '2023-10-01', '', ''),
(48, 24, 'Johnvic L. Lopez', '09123456789', 'Bolbc, Tuy Batangas', 'Baptismal Certificate', 'Pending', '', '', '', '', '2023-10-08', '', 'Walk-In'),
(49, 24, 'Kent Bryan C. Carbayar', '09123456789', 'Dalima, Tuy Batangas', 'Baptismal Certificate', 'Pending', '', '', '', '', '2023-10-09', '', 'Walk-In'),
(50, 9, 'Kim Alexander Mendoza', '09123456789', 'Bolbok, Tuy Batangas', 'Death Certificate', 'Pending', '400', '', '../receipt/379567276_844000473925195_5451346223999834902_n.jpg', '', '2023-10-09', '', '');

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
(14, 933182356, 'hans', 'Hans Christian Abogado', 'abogado018@gmail.com', 'Bolboc, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '16907187216bd4db65b93a499a20cd3c19b45026e3.jpg'),
(15, 154699500, 'dex', 'Dexter Avejero', 'dexter@gmail.com', 'Mataywanac, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '169071877954a2d4c7da9d0efcb643e040ef60d4fd.jpg'),
(16, 1095907067, 'lei', 'Lei Aldrin Sacdalan', 'leisacdalan@gmail.com', 'Brgy. Luna St., Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718849tumblr_5ba2e999a2e8ccc618a14e2e41f9c37f_59bad1a2_1280.jpg'),
(17, 413621422, 'chlea', 'Chlea Aquino', 'chleaaquino@gmail.com', 'Guinhawa, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '16907188955f50a3389aa56dab202831246f6985de.jpg'),
(18, 1498444252, 'emman', 'Emmanuel De Guzman', 'emmandguzman@gmail.com', 'Guinahawa, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718933264e5e9add7efb05531d4ed61e979b7d.jpg'),
(19, 1052392331, 'janno', 'Carl Michael Laxa', 'carlmichaellx@gmail.com', 'Brgy. Luna St., Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1690718980056c98397f41e003870ff8164f5a8c77.jpg'),
(21, 1621718564, 'kent', 'Kent Bryan Carbayar', 'carbayar01@gmail.com', 'Dalima, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1691310343tumblr_79111573eba9bf99d7146152bfbbf8d9_2cd8469e_640.jpg'),
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
  `gContact` varchar(11) NOT NULL,
  `bContact` varchar(11) NOT NULL,
  `gAddress` varchar(100) NOT NULL,
  `bAddress` varchar(100) NOT NULL,
  `package` varchar(25) NOT NULL,
  `intention` varchar(25) NOT NULL,
  `wdate` date NOT NULL,
  `resTime` varchar(100) NOT NULL,
  `gBirthCert` varchar(100) NOT NULL,
  `bBirthCert` varchar(100) NOT NULL,
  `gBapCert` varchar(100) NOT NULL,
  `bBapCert` varchar(100) NOT NULL,
  `gConCert` varchar(100) NOT NULL,
  `bConCert` varchar(100) NOT NULL,
  `cenomar` varchar(100) NOT NULL,
  `marriageLicense` varchar(100) NOT NULL,
  `RPic1` varchar(100) NOT NULL,
  `RPic2` varchar(100) NOT NULL,
  `MBPic1` varchar(100) NOT NULL,
  `MBPic2` varchar(100) NOT NULL,
  `amount` double NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `transactDate` date NOT NULL DEFAULT current_timestamp(),
  `transactType` varchar(255) NOT NULL,
  `payMethod` varchar(100) NOT NULL,
  `refNum` varchar(100) NOT NULL,
  `birthCert` varchar(100) NOT NULL,
  `bapCert` varchar(100) NOT NULL,
  `conCert` varchar(100) NOT NULL,
  `RPic` varchar(100) NOT NULL,
  `MBPic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wedding_tbl`
--

INSERT INTO `wedding_tbl` (`id`, `addedBy`, `groom`, `bride`, `gContact`, `bContact`, `gAddress`, `bAddress`, `package`, `intention`, `wdate`, `resTime`, `gBirthCert`, `bBirthCert`, `gBapCert`, `bBapCert`, `gConCert`, `bConCert`, `cenomar`, `marriageLicense`, `RPic1`, `RPic2`, `MBPic1`, `MBPic2`, `amount`, `receipt`, `status`, `transactDate`, `transactType`, `payMethod`, `refNum`, `birthCert`, `bapCert`, `conCert`, `RPic`, `MBPic`) VALUES
(13, 10, 'Cyrus John L. Alicaway', 'Aira Marie I. Verganza', '09123456789', '09123456789', 'Dao, Tuy Batangas', 'Burgos, Tuy Batangas', 'Package 1', 'Yes', '2023-10-02', '00:37', '../upload/birthCert/Birth-Certificate-Template-1-TemplateLab-scaled.jpg', '../upload/birthCert/Birth-Certificate-Template-1-TemplateLab-scaled.jpg', '../upload/bapCert/download (1).jpg', '../upload/bapCert/download (1).jpg', '../upload/conCert/7a7777e83244c4259b0e124f21fc7602.jpg', '../upload/conCert/2de928b46e38f17b692dd76ec518257f.jpg', '../upload/cenomar/download (2).jpg', '../upload/marriageLicense/c46602985fc9ecff262a3f7663436eda.png', '../upload/pics/download.jpg', '../upload/pics/sq-10c44e5bac6342ed839252128760d2fa.jpg', '../upload/pics/download.jpg', '../upload/pics/sq-10c44e5bac6342ed839252128760d2fa.jpg', 3000, '../receipt/gcashTemp.png', 'In Process', '2023-10-02', 'Online', 'gcash', '12345678', '', '', '', '', ''),
(14, 10, 'Ronan Jay B. Lopez', 'Sherwin S. Valdez', '09123456789', '09123456789', 'Bolboc, Tuy Batangas', 'San Jose, Tuy Batangas', 'Package 1', 'Yes', '2023-10-07', '08:30', '', '', '', '', '', '', 'Certificate of No Marriage', 'Marriage License', '', '', '', '', 3000, '../receipt/gcashTemp.png', 'Approved', '2023-10-02', 'Walk-In', 'gcash', '12345678', 'Birth Certificate', 'Baptismal Certificate', 'Confirmation Certificate', '3R Size Pictures', '2x2 Pictures for Marriage Bann'),
(15, 9, 'Kim Alexander M. Mendoza', 'Chlea A. Aquino', '09123456789', '09123456789', 'Bolboc, Tuy Batangas', 'Guinhawa, Tuy Batangas', 'Package 1', 'Yes', '2023-10-02', '10:13', '../upload/birthCert/Birth-Certificate-Template-1-TemplateLab-scaled.jpg', '../upload/birthCert/Birth-Certificate-Template-1-TemplateLab-scaled.jpg', '../upload/bapCert/download (1).jpg', '../upload/bapCert/download (1).jpg', '../upload/conCert/7a7777e83244c4259b0e124f21fc7602.jpg', '../upload/conCert/2de928b46e38f17b692dd76ec518257f.jpg', '../upload/cenomar/download (2).jpg', '../upload/marriageLicense/c46602985fc9ecff262a3f7663436eda.png', '../upload/pics/download.jpg', '../upload/pics/sq-10c44e5bac6342ed839252128760d2fa.jpg', '../upload/pics/download.jpg', '../upload/pics/sq-10c44e5bac6342ed839252128760d2fa.jpg', 3000, '../receipt/gcashTemp.png', 'Approved', '2023-10-02', 'Online', 'gcash', '12345678', '', '', '', '', '');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `funeralmass_tbl`
--
ALTER TABLE `funeralmass_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
