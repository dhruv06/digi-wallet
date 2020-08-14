-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 06:16 PM
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
-- Database: `digiwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_money_requests`
--

CREATE TABLE `add_money_requests` (
  `Email` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `TransactionID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Email`, `Password`) VALUES
('amoghagrawal98@gmail.com', 'Amogh@37'),
('rahullad945@gmail.com', 'Rahul@39'),
('virajparmar98@gmail.com', 'Viraj@34');

-- --------------------------------------------------------

--
-- Table structure for table `debt`
--

CREATE TABLE `debt` (
  `Email1` varchar(255) NOT NULL,
  `Email2` varchar(255) NOT NULL,
  `Money` varchar(255) NOT NULL,
  `Confirm` tinyint(1) NOT NULL,
  `ID` int(11) NOT NULL,
  `Mine` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debt`
--

INSERT INTO `debt` (`Email1`, `Email2`, `Money`, `Confirm`, `ID`, `Mine`) VALUES
('abc@xyz.com', 'msc@gmail.com', '45', 1, 2, 0),
('abc@xyz.com', 'msc@gmail.com', '100', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forgot_password`
--

CREATE TABLE `forgot_password` (
  `Email` varchar(255) NOT NULL,
  `OTP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot_password`
--

INSERT INTO `forgot_password` (`Email`, `OTP`) VALUES
('abc@xyz.com', 6833);

-- --------------------------------------------------------

--
-- Table structure for table `login_credentials`
--

CREATE TABLE `login_credentials` (
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_credentials`
--

INSERT INTO `login_credentials` (`Email`, `Password`) VALUES
('abc@xyz.com', '12345678'),
('msc@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE `reward` (
  `Email` varchar(255) NOT NULL,
  `Points` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransactionID` varchar(255) NOT NULL,
  `Email1` varchar(255) NOT NULL,
  `Email2` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransactionID`, `Email1`, `Email2`, `Amount`, `DateTime`, `Status`) VALUES
('4ZIFFD6asI', 'msc@gmail.com', '', '1000', '2018-10-28 01:36:24', 'Successful'),
('fH6bRAqzvz', 'abc@xyz.com', 'msc@gmail.com', '45', '2018-10-28 03:03:59', 'Successful'),
('fLe0FNmCMK', 'msc@gmail.com', 'abc@xyz.com', '25', '2018-10-28 17:37:23', 'successful'),
('FtdXbKrtui', 'abc@xyz.com', '', '1000', '2018-10-29 19:28:56', 'Successful'),
('gZhKeIaaEq', 'abc@xyz.com', 'msc@gmail.com', '1', '2018-10-29 19:29:31', 'Successful'),
('p4tIdOJRiI', 'msc@gmail.com', 'msc@gmail.com', '10', '2018-10-28 17:36:50', 'successful'),
('TzEx1sacyN', 'abc@xyz.com', 'msc@gmail.com', '1000', '2018-10-29 22:20:01', 'successful'),
('xsyc1dlCML', 'msc@gmail.com', 'abc@xyz.com', '100', '2018-10-28 01:39:08', 'Successful'),
('yBl3zfheCL', 'msc@gmail.com', 'abc@xyz.com', '10', '2018-10-28 17:37:04', 'successful'),
('ZjgBfLjrCo', 'abc@xyz.com', 'msc@gmail.com', '1.3', '2018-10-29 19:29:52', 'Successful');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Email` varchar(255) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `MobileNumber` varchar(255) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Wallet` varchar(255) NOT NULL,
  `OTP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Email`, `FirstName`, `LastName`, `MobileNumber`, `DOB`, `Gender`, `Wallet`, `OTP`) VALUES
('abc@xyz.com', 'ABC2', 'XYZ2', '8154831352', '1997-07-16', 'male', '87.7', 0),
('msc@gmail.com', 'Meet2', 'Chauhan2', '8154831353', '2007-02-06', 'male', '1902.3', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_money_requests`
--
ALTER TABLE `add_money_requests`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `debt`
--
ALTER TABLE `debt`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `login_credentials`
--
ALTER TABLE `login_credentials`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `reward`
--
ALTER TABLE `reward`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `debt`
--
ALTER TABLE `debt`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
