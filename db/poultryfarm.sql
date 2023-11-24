-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2023 at 04:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poultryfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedsinvestment`
--

CREATE TABLE `feedsinvestment` (
  `feedID` int(11) NOT NULL,
  `iPurpose` varchar(250) NOT NULL,
  `iDate` date NOT NULL,
  `iPrice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedsinvestment`
--

INSERT INTO `feedsinvestment` (`feedID`, `iPurpose`, `iDate`, `iPrice`) VALUES
(1, 'Secret', '2023-11-16', 1000.00),
(2, 'Not Secret', '2023-11-16', 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `uID` int(11) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `contactNum` varchar(250) NOT NULL,
  `userRole` varchar(250) NOT NULL,
  `userName` varchar(250) NOT NULL,
  `userPassword` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`uID`, `fullName`, `contactNum`, `userRole`, `userName`, `userPassword`) VALUES
(1, 'Allen Ramos', '09786547765', 'Admin', 'Allen', 'Allen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedsinvestment`
--
ALTER TABLE `feedsinvestment`
  ADD PRIMARY KEY (`feedID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`uID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedsinvestment`
--
ALTER TABLE `feedsinvestment`
  MODIFY `feedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `uID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
