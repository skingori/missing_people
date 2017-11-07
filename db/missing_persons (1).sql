-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2017 at 12:09 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `missing_persons`
--
CREATE DATABASE IF NOT EXISTS `missing_persons` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `missing_persons`;

-- --------------------------------------------------------

--
-- Table structure for table `Handling_Officer_Table`
--

DROP TABLE IF EXISTS `Handling_Officer_Table`;
CREATE TABLE `Handling_Officer_Table` (
  `Handling_Officer_Id` int(20) NOT NULL,
  `Handling_Officer_Mp_Id` bigint(20) DEFAULT NULL,
  `Handling_Officer_Officer_Id` int(20) DEFAULT NULL,
  `Handling_Officer_User_Id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Handling_Officer_Table`
--

INSERT INTO `Handling_Officer_Table` (`Handling_Officer_Id`, `Handling_Officer_Mp_Id`, `Handling_Officer_Officer_Id`, `Handling_Officer_User_Id`) VALUES
(1, 133646420632107, 3274527, 23424242);

-- --------------------------------------------------------

--
-- Table structure for table `Login_Table`
--

DROP TABLE IF EXISTS `Login_Table`;
CREATE TABLE `Login_Table` (
  `Login_Id` int(20) NOT NULL DEFAULT '0',
  `Login_Username` varchar(255) DEFAULT NULL,
  `Login_Password` varchar(255) DEFAULT NULL,
  `Login_Rank` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Login_Table`
--

INSERT INTO `Login_Table` (`Login_Id`, `Login_Username`, `Login_Password`, `Login_Rank`) VALUES
(21213, 'officer', '21232f297a57a5a743894a0e4a801fc3', '3'),
(3274527, 'test2', '7be790e8f2934273c118ef565475c216', '3'),
(23232323, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(23424242, 'user', '21232f297a57a5a743894a0e4a801fc3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `Missing_Persons_Table`
--

DROP TABLE IF EXISTS `Missing_Persons_Table`;
CREATE TABLE `Missing_Persons_Table` (
  `Missing_Persons_Id` bigint(20) NOT NULL,
  `Missing_Persons_Name` varchar(255) DEFAULT NULL,
  `Missing_Persons_Age` varchar(255) DEFAULT NULL,
  `Missing_Persons_Gender` varchar(255) DEFAULT NULL,
  `Missing_Persons_Identity` varchar(255) DEFAULT NULL,
  `Missing_Persons_Description` varchar(255) DEFAULT NULL,
  `Missing_Persons_Image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Missing_Persons_Table`
--

INSERT INTO `Missing_Persons_Table` (`Missing_Persons_Id`, `Missing_Persons_Name`, `Missing_Persons_Age`, `Missing_Persons_Gender`, `Missing_Persons_Identity`, `Missing_Persons_Description`, `Missing_Persons_Image`) VALUES
(133646420632107, 'Missing missing', '9', 'Male', '23424242', '<p>missing missing</p>\r\n', '../img/avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `Officer_Table`
--

DROP TABLE IF EXISTS `Officer_Table`;
CREATE TABLE `Officer_Table` (
  `Officer_Id` int(20) NOT NULL DEFAULT '0',
  `Officer_Name` varchar(255) DEFAULT NULL,
  `Officer_Number` int(20) DEFAULT NULL,
  `Officer_Work` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Officer_Table`
--

INSERT INTO `Officer_Table` (`Officer_Id`, `Officer_Name`, `Officer_Number`, `Officer_Work`) VALUES
(3274527, 'John Kithima', 2147483647, 'Administration Police');

-- --------------------------------------------------------

--
-- Table structure for table `User_Table`
--

DROP TABLE IF EXISTS `User_Table`;
CREATE TABLE `User_Table` (
  `User_Id` int(20) NOT NULL DEFAULT '0',
  `User_Name` varchar(255) DEFAULT NULL,
  `User_Email` varchar(255) DEFAULT NULL,
  `User_Number` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `User_Table`
--

INSERT INTO `User_Table` (`User_Id`, `User_Name`, `User_Email`, `User_Number`) VALUES
(23424242, 'James Test', 'dfdf@lk.com', '67577675675');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Handling_Officer_Table`
--
ALTER TABLE `Handling_Officer_Table`
  ADD PRIMARY KEY (`Handling_Officer_Id`),
  ADD KEY `Handling_Officer_Mp_Id` (`Handling_Officer_Mp_Id`);

--
-- Indexes for table `Login_Table`
--
ALTER TABLE `Login_Table`
  ADD PRIMARY KEY (`Login_Id`);

--
-- Indexes for table `Missing_Persons_Table`
--
ALTER TABLE `Missing_Persons_Table`
  ADD PRIMARY KEY (`Missing_Persons_Id`);

--
-- Indexes for table `Officer_Table`
--
ALTER TABLE `Officer_Table`
  ADD PRIMARY KEY (`Officer_Id`);

--
-- Indexes for table `User_Table`
--
ALTER TABLE `User_Table`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Handling_Officer_Table`
--
ALTER TABLE `Handling_Officer_Table`
  MODIFY `Handling_Officer_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Handling_Officer_Table`
--
ALTER TABLE `Handling_Officer_Table`
  ADD CONSTRAINT `handling_officer_table_ibfk_1` FOREIGN KEY (`Handling_Officer_Mp_Id`) REFERENCES `Missing_Persons_Table` (`Missing_Persons_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Officer_Table`
--
ALTER TABLE `Officer_Table`
  ADD CONSTRAINT `officer_table_ibfk_1` FOREIGN KEY (`Officer_Id`) REFERENCES `Login_Table` (`Login_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `User_Table`
--
ALTER TABLE `User_Table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `Login_Table` (`Login_Id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
