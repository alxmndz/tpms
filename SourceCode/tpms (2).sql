-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2023 at 11:05 AM
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
(44, 'ad', 'ada', '../announcement/361366269_743844771083671_6577604868633030174_n.jpg', '2023-11-11');

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
  `refNum` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `baptismal_tbl`
--

INSERT INTO `baptismal_tbl` (`id`, `addedBy`, `name`, `contact`, `address`, `bapDate`, `bapTime`, `birthCert`, `marriageCont`, `sponsor1`, `sponsor2`, `amount`, `receipt`, `status`, `tDate`, `payMethod`, `transactType`, `refNum`) VALUES
(59, 24, 'dad', '543', 'dfs', '2023-11-11', '10:09', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'In Process', '2023-11-11', 'face-to-face', 'Walk-In', ''),
(60, 24, 'asd', '342', 'sd', '2023-11-11', '10:09', 'Birth Certificate', 'Parents Marriage Contract', 'Sponsor 1', 'Sponsor 2', 0, '', 'In Process', '2023-11-11', 'face-to-face', 'Walk-In', '');

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
(23, 10, 'Dexter A. Avejero', '09123456789', 'Toong, Tuy Batangas', '2023-11-07', '07:50', 'Sponsor', 0, '', 'Approved', '2023-11-07', 'face-to-face', 'Walk-In', ''),
(24, 10, 'Justine D. Jumarang', '09123456789', 'Mataywanac, Tuy Batangas', '2023-11-18', '08:30', 'Wedding Anniversarry', 0, '', 'In Process', '2023-11-07', 'face-to-face', 'Walk-In', ''),
(25, 10, 'Ronan Jay B. Lopez', '09123456789', 'Bolboc, Tuy Batangas', '2023-11-25', '08:00', 'Birthday', 0, '', 'Disapproved, Because mismatch files', '2023-11-07', 'face-to-face', 'Walk-In', ''),
(27, 24, 'second', '342', 'dsf', '2023-11-11', '10:12', 'Sponsor', 0, '', 'In Process', '2023-11-11', 'face-to-face', 'Walk-In', '');

-- --------------------------------------------------------

--
-- Table structure for table `certbap`
--

CREATE TABLE `certbap` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `birthDate` date NOT NULL,
  `resDate` date NOT NULL,
  `priest` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `generatedDate` varchar(100) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certbap`
--

INSERT INTO `certbap` (`id`, `name`, `fatherName`, `motherName`, `birthPlace`, `birthDate`, `resDate`, `priest`, `sponsor1`, `sponsor2`, `status`, `generatedDate`) VALUES
(9, 'ada', 'asdasd', 'asdas', 'dasdas', '2023-11-10', '2023-11-10', 'asdsa', 'asda', 'asd', 'Approved', '2023-11-11 20:34:39'),
(10, 'asd', 'sada', 'asd', 'asdas', '2023-11-11', '2023-11-11', 'asd', 'asd', 'asd', 'Approved', '2023-11-11 17:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `certcomm`
--

CREATE TABLE `certcomm` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `birthDate` date NOT NULL,
  `resDate` date NOT NULL,
  `priest` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `generatedDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'In Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certcomm`
--

INSERT INTO `certcomm` (`id`, `name`, `fatherName`, `motherName`, `birthPlace`, `birthDate`, `resDate`, `priest`, `sponsor1`, `sponsor2`, `generatedDate`, `status`) VALUES
(1, 'sdf', 'sdf', 'sdf', 'sdf', '2023-11-10', '2023-11-10', 'sdf', 'sdf', 'sdf', '2023-11-10', 'In Process'),
(2, 'sad', 'asd', 'asd', 'dfs', '2023-11-10', '2023-11-10', 'dasd', 'sd', 'sdf', '2023-11-10', 'Approved'),
(3, 'asd', 'asda', 'ad', 'asda', '2023-11-10', '2023-11-10', 'asd', 'asd', 'asd', '2023-11-10', 'Disapproved, Because mismatch files');

-- --------------------------------------------------------

--
-- Table structure for table `certcon`
--

CREATE TABLE `certcon` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `birthPlace` varchar(100) NOT NULL,
  `birthDate` date NOT NULL,
  `resDate` date NOT NULL,
  `priest` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `generatedDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'In Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certcon`
--

INSERT INTO `certcon` (`id`, `name`, `fatherName`, `motherName`, `birthPlace`, `birthDate`, `resDate`, `priest`, `sponsor1`, `sponsor2`, `generatedDate`, `status`) VALUES
(1, 'asd', 'asd', 'asd', 'asd', '2023-11-10', '2023-11-18', 'asd', 'asd', 'asd', '2023-11-10', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `certfun`
--

CREATE TABLE `certfun` (
  `id` int(11) NOT NULL,
  `deceasedName` varchar(100) NOT NULL,
  `fatherName` varchar(100) NOT NULL,
  `motherName` varchar(100) NOT NULL,
  `widow` varchar(100) NOT NULL,
  `residentAdd` varchar(100) NOT NULL,
  `deathDate` date NOT NULL,
  `age` int(11) NOT NULL,
  `internment` date NOT NULL,
  `causeOfDeath` varchar(100) NOT NULL,
  `sbd` varchar(100) NOT NULL,
  `sbd2` varchar(100) NOT NULL,
  `generatedDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
  `priest` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certfun`
--

INSERT INTO `certfun` (`id`, `deceasedName`, `fatherName`, `motherName`, `widow`, `residentAdd`, `deathDate`, `age`, `internment`, `causeOfDeath`, `sbd`, `sbd2`, `generatedDate`, `status`, `priest`) VALUES
(1, 'asdasd', 'asdas', 'sada', 'das', 'asdas', '2023-11-10', 342, '2023-11-10', 'asd', 'Yes', 'Yes', '2023-11-10', 'Approved', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `certmarriage`
--

CREATE TABLE `certmarriage` (
  `id` int(11) NOT NULL,
  `groom` varchar(100) NOT NULL,
  `bride` varchar(100) NOT NULL,
  `gAge` int(11) NOT NULL,
  `bAge` int(11) NOT NULL,
  `maritalStatus` varchar(100) NOT NULL,
  `maritalStatus2` varchar(100) NOT NULL,
  `gNat` varchar(100) NOT NULL,
  `bNat` varchar(100) NOT NULL,
  `gResidence` varchar(100) NOT NULL,
  `bResidence` varchar(100) NOT NULL,
  `gFather` varchar(100) NOT NULL,
  `gMother` varchar(100) NOT NULL,
  `bFather` varchar(100) NOT NULL,
  `bMother` varchar(100) NOT NULL,
  `marriedDate` date NOT NULL,
  `priest` varchar(100) NOT NULL,
  `sponsor1` varchar(100) NOT NULL,
  `sponsor2` varchar(100) NOT NULL,
  `generatedDate` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL DEFAULT 'In Process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `certmarriage`
--

INSERT INTO `certmarriage` (`id`, `groom`, `bride`, `gAge`, `bAge`, `maritalStatus`, `maritalStatus2`, `gNat`, `bNat`, `gResidence`, `bResidence`, `gFather`, `gMother`, `bFather`, `bMother`, `marriedDate`, `priest`, `sponsor1`, `sponsor2`, `generatedDate`, `status`) VALUES
(1, 'asd', 'asdass', 34, 34, 'zsd', 'sdz', 'zsdz', 'zsd', 'zsd', 'zsd', 'zsd', 'zsd', 'zsd', 'sdz', '2023-11-10', 'x', 'd', 'd', '2023-11-10', 'Approved');

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
(11, 10, 'Denver P. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', '2023-11-13', '08:04', 'Baptismal Certificate', 'N/A', 0, '', 'Approved', '2023-11-07', 'Walk-In', '', 'face-to-face'),
(12, 10, 'Biyaya A. Bautista', '09123456789', 'Luna St, Tuy Batangas', '2023-11-20', '09:00', 'Baptismal Certificate', 'N/A', 0, '', 'In Process', '2023-11-07', 'Walk-In', '', 'face-to-face'),
(13, 10, 'Joshua C. Carayag', '09123456789', 'Putol, Tuy Batangas', '2023-11-21', '10:00', 'Baptismal Certificate', 'N/A', 0, '', 'Disapproved, Because mismatch files', '2023-11-07', 'Walk-In', '', 'face-to-face'),
(14, 24, 'lol1', '09123456789', 'kjadhhk', '2023-11-11', '10:21', 'Baptismal Certificate', 'sad', 0, '', 'In Process', '2023-11-11', 'Walk-In', '', 'face-to-face');

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
(16, 10, 'Erica S. Peña', '09123456789', 'San Jose, Tuy Batangas', '2023-11-08', '10:00', 'Baptismal Certificate', 'N/A', 0, '', 'Approved', '2023-11-07', 'Walk-In', 'face-to-face', ''),
(17, 10, 'Mitchlei A. Perez', '09123456789', 'Putol, Tuy Batangas', '2023-11-15', '10:30', 'Baptismal Certificate', 'N/A', 0, '', 'In Process', '2023-11-07', 'Walk-In', 'face-to-face', ''),
(18, 10, 'Emman G. De Guzman', '09123456789', 'Guinhawa, Tuy Batangas', '2023-11-16', '10:30', 'Baptismal Certificate', 'N/A', 0, '', 'Disapproved, Because mismatch files', '2023-11-07', 'Walk-In', 'face-to-face', ''),
(19, 24, 'hi', '09123456789', 'sjkdhakhj', '2023-11-11', '10:25', 'Baptismal Certificate', 'asdsaddf', 0, '', 'In Process', '2023-11-11', 'Walk-In', 'face-to-face', '');

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
(56, 10, 'sample', '09123456789', '2023-11-10', 500, '../receipt/379567276_844000473925195_5451346223999834902_n.jpg'),
(57, 10, 'kim', '09123456789', '2023-11-10', 0, ''),
(58, 10, '', '09123456789', '2023-11-10', 0, ''),
(59, 24, 'new', '09123456789', '2023-11-11', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `eventlist`
--

CREATE TABLE `eventlist` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `eventDate` date NOT NULL,
  `eventTime` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `generatedDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventlist`
--

INSERT INTO `eventlist` (`id`, `title`, `eventDate`, `eventTime`, `description`, `generatedDate`) VALUES
(7, 'Event Title', '2023-11-30', '10:30', 'Sample Description', '2023-11-11'),
(8, 'Event 2', '2023-11-22', '07:30', 'Event Description Sample', '2023-11-11');

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
(19, 'Sample', 10, 'Sample 1', 'Father', 'Mother', '12345678900', 'Widow', 'Sample, Address', '2023-11-07', 50, '2023-11-11', 'Sample', 'Yes', 'Yes', 0, '', 'Approved', '2023-11-07', 'Walk-In', 'face-to-face', '', '09:40'),
(20, 'funeral', 24, 'jiadj', 'jdisajdi`j', 'jidsaji', '4253', 'jidsajid', 'ada', '2023-11-11', 543, '2023-11-11', 'kgokdfof', 'Yes', 'Yes', 0, '', 'In Process', '2023-11-11', 'Walk-In', 'face-to-face', '', '10:38');

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
  `status` varchar(100) NOT NULL DEFAULT 'In Process',
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
(43, 10, 'Kim Alexander Mendoza', '09123456789', 'Bolboc, Tuy Batangas', 'Baptismal Certificate', 'Disapproved, Because mismatch files', '10', '', '../receipt/gcashTemp.png', '', '2023-09-29', '', ''),
(44, 9, 'Nico C. David ', '09123456789', 'Dalima, Tuy Batangas', 'Baptismal Certificate', 'Disapproved, Because mismatch files', '1000', '', '../receipt/gcashTemp.png', '', '2023-10-01', '', ''),
(45, 9, 'Denver P. Mendoza', '09123456789', 'Bolboc, Tuy Batangas', 'Baptismal Certificate', 'In Process', '', '', '', '', '2023-10-01', '', ''),
(46, 9, 'Claire Ann D. Hernandez', '09123456789', 'Malibu, Tuy Batangas', 'Confirmation Certificate', 'Picked Up', '1000', '12345678', '../receipt/gcashTemp.png', '', '2023-10-01', '', ''),
(48, 24, 'Johnvic L. Lopez', '09123456789', 'Bolbc, Tuy Batangas', 'Baptismal Certificate', 'In Process', '', '', '', '', '2023-10-08', '', 'Walk-In'),
(49, 24, 'Kent Bryan C. Carbayar', '09123456789', 'Dalima, Tuy Batangas', 'Baptismal Certificate', 'In Process', '', '', '', '', '2023-10-09', '', 'Walk-In'),
(50, 9, 'Kim Alexander Mendoza', '09123456789', 'Bolbok, Tuy Batangas', 'Death Certificate', 'In Process', '400', '', '../receipt/379567276_844000473925195_5451346223999834902_n.jpg', '', '2023-10-09', '', ''),
(51, 10, 'sd', 'sdf', 'sdf', 'Baptismal Certificate', 'Ready to pick up', '100', '', '', '', '2023-11-10', '', 'Walk-In'),
(52, 10, 'asd', '234', 'se', 'Baptismal Certificate', 'Ready to pick up', '', '', '', '', '2023-11-10', '', 'Walk-In');

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
(21, 1621718564, 'kent', 'Kent Bryan Carbayar', 'carbayar01@gmail.com', 'Dalima, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1691310343tumblr_79111573eba9bf99d7146152bfbbf8d9_2cd8469e_640.jpg'),
(23, 1447454323, 'mitchlei', 'Mitchlei Perez', 'mitchlei@gmail.com', 'Obispo, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '169202582514585560.jpg'),
(24, 669481157, 'lorenz', 'John Lorenz Lapitan', 'lorenzlapitan@gmail.com', 'Brgy.Burgos, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'staff', '1692284578bro.lorenz.jpg'),
(25, 926474211, 'klief', 'Klief Alexis Mendoza', 'klief@gmail.com', 'Bolboc, Tuy Batangas', '1a1dc91c907325c69271ddf0c944bc72', '09123456789', 'patron', '1698837316peter-parker-3840x2160-15576.jpeg');

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
(17, 10, 'Jerico R. Cabotaje', 'Hazel Ann M. Mendoza', '09123456789', '09123456789', 'Maligas, Tuy Batangas', 'San Jose, Tuy Batangas', 'Package 1', 'Yes', '2023-11-12', '10:30', '', '', '', '', '', '', 'Certificate of No Marriage', 'Marriage License', '', '', '', '', 0, '', 'Approved', '2023-11-07', 'Walk-In', 'face-to-face', '', 'Birth Certificate', 'Baptismal Certificate', 'Confirmation Certificate', '3R Size Pictures', '2x2 Pictures for Marriage Bann'),
(18, 24, 'dfgd', 'dfgdf', '09123456789', '09123456789', 'kdshk', 'hdsjkhd', 'Package 1', 'Yes', '2023-11-11', '10:40', '', '', '', '', '', '', 'Certificate of No Marriage', 'Marriage License', '', '', '', '', 0, '', 'In Process', '2023-11-11', 'Walk-In', 'face-to-face', '', 'Birth Certificate', 'Baptismal Certificate', 'Confirmation Certificate', '3R Size Pictures', '2x2 Pictures for Marriage Bann');

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
  ADD KEY `baptismal_tbl_ibfk_1` (`addedBy`);

--
-- Indexes for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addedBy` (`addedBy`);

--
-- Indexes for table `certbap`
--
ALTER TABLE `certbap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certcomm`
--
ALTER TABLE `certcomm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certcon`
--
ALTER TABLE `certcon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certfun`
--
ALTER TABLE `certfun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certmarriage`
--
ALTER TABLE `certmarriage`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `blessing_tbl`
--
ALTER TABLE `blessing_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `certbap`
--
ALTER TABLE `certbap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `certcomm`
--
ALTER TABLE `certcomm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `certcon`
--
ALTER TABLE `certcon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certfun`
--
ALTER TABLE `certfun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certmarriage`
--
ALTER TABLE `certmarriage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `communion_tbl`
--
ALTER TABLE `communion_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `confirmation_tbl`
--
ALTER TABLE `confirmation_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `eventlist`
--
ALTER TABLE `eventlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `funeralmass_tbl`
--
ALTER TABLE `funeralmass_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `wedding_tbl`
--
ALTER TABLE `wedding_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `baptismal_tbl`
--
ALTER TABLE `baptismal_tbl`
  ADD CONSTRAINT `baptismal_tbl_ibfk_1` FOREIGN KEY (`addedBy`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
