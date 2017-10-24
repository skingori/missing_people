-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 24, 2017 at 10:52 AM
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
  `Handling_Officer_Id` int(20) NOT NULL DEFAULT '0',
  `Handling_Officer_Mp_Id` int(20) DEFAULT NULL,
  `Handling_Officer_Officer_Id` int(20) DEFAULT NULL,
  `Handling_Officer_User_Id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(21212, 'user', '21232f297a57a5a743894a0e4a801fc3', '2'),
(21213, 'officer', '21232f297a57a5a743894a0e4a801fc3', '3'),
(23232323, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Missing_Persons_Table`
--

DROP TABLE IF EXISTS `Missing_Persons_Table`;
CREATE TABLE `Missing_Persons_Table` (
  `Missing_Persons_Id` varchar(255) NOT NULL DEFAULT '0',
  `Missing_Persons_Name` varchar(255) DEFAULT NULL,
  `Missing_Persons_Age` varchar(255) DEFAULT NULL,
  `Missing_Persons_Gender` varchar(255) DEFAULT NULL,
  `Missing_Persons_Identity` varchar(255) DEFAULT NULL,
  `Missing_Persons_Description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Missing_Persons_Table`
--

INSERT INTO `Missing_Persons_Table` (`Missing_Persons_Id`, `Missing_Persons_Name`, `Missing_Persons_Age`, `Missing_Persons_Gender`, `Missing_Persons_Identity`, `Missing_Persons_Description`) VALUES
('4MXZE-PIXSL-YA8BN-EQS05', 'dssfsfsd', '34', 'MALE', '21212', 'ffsdffre'),
('URYVQ-T9GFZ-LS8I8-7HI3X', 'gfhgfg', '8798798', 'MALE', '21212', 'kgkjghg\r\nbnmnb\r\nmnmm,bjkhhjhj\r\ntyuytytyub,jhmbnmbmnb,nm\r\njhkjhkjhkj');

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
(21213, 'f d', 2147483647, '34343');

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
(21212, 'sdsds', 'sds@dff.com', '434343433');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Handling_Officer_Table`
--
ALTER TABLE `Handling_Officer_Table`
  ADD PRIMARY KEY (`Handling_Officer_Id`);

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
-- Constraints for dumped tables
--

--
-- Constraints for table `User_Table`
--
ALTER TABLE `User_Table`
  ADD CONSTRAINT `user_table_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `Login_Table` (`Login_Id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
