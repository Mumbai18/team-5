-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2018 at 01:56 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `annadhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `crowd`
--

CREATE TABLE `crowd` (
  `id` int(10) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Photoid` varchar(5000) NOT NULL,
  `Hungry` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crowd`
--

INSERT INTO `crowd` (`id`, `Latitude`, `Longitude`, `Photoid`, `Hungry`) VALUES
(1, '', '', '', 0),
(2, '', '', '', 1),
(3, '', '', '', 0),
(4, '', '', '', 1),
(5, '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Photoid` varchar(5000) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Availability` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `Name`, `Email`, `Phone`, `Photoid`, `Latitude`, `Longitude`, `Availability`) VALUES
(1, 'DInesh Kanani', 'dk@gmail.com', '123456789', '', '19.1718589', '72.8323097', 1),
(2, 'Deepak Tiwary', 'deputiwu@yahoo.com', '9821548234', '', '19.1718589', '72.8323097', 0),
(3, 'Akansha Shah', 'ankushah@gmail.com', '7823671234', '', '19.1718589', '72.8323097', 1),
(4, 'Sakshi menon', 'sakshimenon@yahoo.in', '8781298712', '', '19.1718589', '72.8323097', 0),
(5, 'karan praharaj', 'karanpra@gmail.com', '873827192', '', '19.1718589', '72.8323097', 1);

-- --------------------------------------------------------

--
-- Table structure for table `live`
--

CREATE TABLE `live` (
  `id` int(11) NOT NULL,
  `donor_name` varchar(50) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Quantity` int(20) NOT NULL,
  `Fresh` int(10) NOT NULL,
  `Photoid` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `live`
--

INSERT INTO `live` (`id`, `donor_name`, `Latitude`, `Longitude`, `Quantity`, `Fresh`, `Photoid`) VALUES
(18, 'Nik', '17', '20', 2, 1, ''),
(19, 'nik', '17', '20', 2, 1, ''),
(20, 'nik', '17', '20', 2, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id` int(10) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Photoid` varchar(5000) NOT NULL,
  `Latitude` varchar(50) NOT NULL,
  `Longitude` varchar(50) NOT NULL,
  `Availability` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id`, `Name`, `Email`, `Phone`, `Photoid`, `Latitude`, `Longitude`, `Availability`) VALUES
(1, 'Tanisha Kapoor', 'tanishakapoor@yahoo.in', '9821563721', '', '', '', 0),
(2, 'Sushil shah', 'sushishah@gmail.com', '7625361875', '', '', '', 1),
(3, 'ankush sharma', 'sharmaankush@gmail.com', '8732516253', '', '', '', 1),
(4, 'unma desai', 'unmadesai@yahoo.in', '7635262781', '', '', '', 0),
(5, 'harsh chauhan', 'chauhanharsh@gmail.com', '9875362765', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crowd`
--
ALTER TABLE `crowd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live`
--
ALTER TABLE `live`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crowd`
--
ALTER TABLE `crowd`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `live`
--
ALTER TABLE `live`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
