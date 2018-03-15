-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 31, 2018 at 01:55 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `sec`
--

CREATE TABLE `sec` (
  `id` bigint(8) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `section` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sec`
--

INSERT INTO `sec` (`id`, `name`, `section`) VALUES
(11609018, 'Debasish Bhol', 'K1601'),
(11609020, 'Azeem Hussain', 'K1607'),
(11615144, 'Amit Singh', 'K1607'),
(11601876, 'Sachin Bhandari', 'K1604');

-- --------------------------------------------------------

--
-- Table structure for table `sub`
--

CREATE TABLE `sub` (
  `id` bigint(8) DEFAULT NULL,
  `sub` varchar(10) DEFAULT NULL,
  `dat` date DEFAULT NULL,
  `room` varchar(10) DEFAULT NULL,
  `sid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub`
--

INSERT INTO `sub` (`id`, `sub`, `dat`, `room`, `sid`) VALUES
(11609018, 'MTH110', '2018-05-08', '9-100', 1),
(11609018, 'CSE115', '2018-05-10', '28-133', 2),
(11609018, 'CHE110', '2018-05-12', '20-148', 3),
(11609020, 'CSE115', '2018-05-10', '30-141', 4),
(11609020, 'CHE110', '2018-05-12', '15-104', 5),
(11609020, 'MTH110', '2018-05-08', '46-126', 6),
(11615144, 'MTH110', '2018-05-10', '11-121', 7),
(11615144, 'CHE110', '2018-05-08', '24-102', 8),
(11615144, 'PEL101', '2018-05-12', '15-110', 9),
(11601876, 'PEL110', '2018-05-14', '3-105', 10),
(11601876, 'ECE131', '2018-05-10', '34-105', 11),
(11601876, 'POY130', '2018-05-18', '54-140', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sub`
--
ALTER TABLE `sub`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sub`
--
ALTER TABLE `sub`
  MODIFY `sid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
