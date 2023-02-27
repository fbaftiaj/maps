-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2022 at 09:11 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maps`
--

-- --------------------------------------------------------

--
-- Table structure for table `admini`
--

CREATE TABLE `admini` (
  `aID` int(255) NOT NULL,
  `adminID` varchar(500) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `usernamee` varchar(255) NOT NULL,
  `passwordi` varchar(500) NOT NULL,
  `dataRegj` date NOT NULL,
  `oraRegj` time(6) NOT NULL,
  `nrtel` varchar(20) NOT NULL,
  `email` varchar(65) NOT NULL DEFAULT 'Nuk është i dhënë !',
  `komuna` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admini`
--

INSERT INTO `admini` (`aID`, `adminID`, `emri`, `mbiemri`, `usernamee`, `passwordi`, `dataRegj`, `oraRegj`, `nrtel`, `email`, `komuna`) VALUES
(1, 'm-2135928759829_1', 'Florian', 'Baftiaj', 'admin', '$2y$10$AAzjS8m/NvlpkHvSRQZf.udzygg62PyK14WYWcP53NIQz4658wcb6', '2022-08-30', '10:54:02.000000', '044777555', 'Nuk është i dhënë !', 'Suharekë');

-- --------------------------------------------------------

--
-- Table structure for table `kompania`
--

CREATE TABLE `kompania` (
  `kID` int(255) NOT NULL,
  `komID` varchar(255) NOT NULL,
  `emri` varchar(500) NOT NULL,
  `usernamee` varchar(255) NOT NULL,
  `passwordi` varchar(500) NOT NULL,
  `dataRegj` date NOT NULL,
  `oraRegj` time(6) NOT NULL,
  `komuna` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kompania`
--

INSERT INTO `kompania` (`kID`, `komID`, `emri`, `usernamee`, `passwordi`, `dataRegj`, `oraRegj`, `komuna`) VALUES
(1, 'm-2135928759829_2', 'Kompania1', 'admini', '$2y$10$AAzjS8m/NvlpkHvSRQZf.udzygg62PyK14WYWcP53NIQz4658wcb6', '2022-09-04', '14:15:31.930000', 'Suhareke');

-- --------------------------------------------------------

--
-- Table structure for table `kordinata`
--

CREATE TABLE `kordinata` (
  `kID` int(255) NOT NULL,
  `korID` varchar(255) NOT NULL,
  `lati` varchar(255) NOT NULL,
  `longi` varchar(255) NOT NULL,
  `shenja` text NOT NULL,
  `dataregj` date NOT NULL,
  `oraregj` time(6) NOT NULL,
  `adminID` varchar(500) NOT NULL,
  `statusi` varchar(255) NOT NULL DEFAULT 'paperfunduar',
  `pershkrimi` text NOT NULL,
  `komID` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kordinata`
--

INSERT INTO `kordinata` (`kID`, `korID`, `lati`, `longi`, `shenja`, `dataregj`, `oraregj`, `adminID`, `statusi`, `pershkrimi`, `komID`) VALUES
(4, 'm_7404335274', '42.21683329856988', '20.737279192738768', 'qasgsgGGDSSGDG', '2022-08-30', '10:27:00.000000', 'm-2135928759829_1', 'paperfunduar', 'Nuk ka asnjë përshkrim !', ''),
(10, 'm_16192478910', '42.2161658433574', '20.747342840962645', 'apigheosgs', '2022-08-30', '12:12:00.000000', 'm-2135928759829_1', 'paperfunduar', 'Nuk ka asnjë përshkrim !', ''),
(11, 'm_67166107111', '42.21661081428289', '20.735133425526854', 'Perparesi kalimi', '2022-08-31', '11:51:00.000000', 'm-2135928759829_1', 'perfunduar', 'Nuk ka asnjë përshkrim !', 'm-2135928759829_2'),
(12, 'm_50864866712', '42.21282846148009', '20.73524071388745', 'Femijet ne rruge', '2022-08-31', '11:52:00.000000', 'm-2135928759829_1', 'paperfunduar', 'Nuk ka asnjë përshkrim !', ''),
(13, 'm_62495039613', '42.214558757075245', '20.743071276423123', 'Kthese e dyfishte', '2022-08-31', '01:34:00.000000', 'm-2135928759829_1', 'paperfunduar', 'Nuk ka asnjë përshkrim !', '');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `sID` int(255) NOT NULL,
  `superID` varchar(500) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `usernamee` varchar(255) NOT NULL,
  `passwordi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uID` int(255) NOT NULL,
  `userID` varchar(255) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `usernamee` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `roli` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uID`, `userID`, `emri`, `mbiemri`, `usernamee`, `pass`, `roli`) VALUES
(1, 'm-2135928759829_1', 'Florian', 'Baftiaj', 'admin1', '$2y$10$AAzjS8m/NvlpkHvSRQZf.udzygg62PyK14WYWcP53NIQz4658wcb6', 'admin'),
(2, 'm-2135928759829_2', 'Kompania1', 'Kompania1', 'admini', '$2y$10$AAzjS8m/NvlpkHvSRQZf.udzygg62PyK14WYWcP53NIQz4658wcb6', 'kompani'),
(3, 'M-32237857298-3', 'kom', 'baft', 'super', '$2y$10$AAzjS8m/NvlpkHvSRQZf.udzygg62PyK14WYWcP53NIQz4658wcb6', 'superadmin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admini`
--
ALTER TABLE `admini`
  ADD PRIMARY KEY (`aID`);

--
-- Indexes for table `kompania`
--
ALTER TABLE `kompania`
  ADD PRIMARY KEY (`kID`);

--
-- Indexes for table `kordinata`
--
ALTER TABLE `kordinata`
  ADD PRIMARY KEY (`kID`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admini`
--
ALTER TABLE `admini`
  MODIFY `aID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kompania`
--
ALTER TABLE `kompania`
  MODIFY `kID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kordinata`
--
ALTER TABLE `kordinata`
  MODIFY `kID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `sID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
