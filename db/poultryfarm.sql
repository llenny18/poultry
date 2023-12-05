-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2023 at 02:55 AM
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
-- Table structure for table `investmentrecords`
--

CREATE TABLE `investmentrecords` (
  `recordID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `typeID` int(11) NOT NULL,
  `recordDate` date NOT NULL,
  `recordPrice` decimal(10,2) UNSIGNED NOT NULL CHECK (`recordPrice` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investmenttype`
--

CREATE TABLE `investmenttype` (
  `typeID` int(11) NOT NULL,
  `typeName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `investmenttype`
--

INSERT INTO `investmenttype` (`typeID`, `typeName`) VALUES
(1, 'Bills'),
(2, 'Medicines & Vitamins'),
(3, 'E-Wages'),
(4, 'Miscellaneous');

-- --------------------------------------------------------

--
-- Table structure for table `paperrecords`
--

CREATE TABLE `paperrecords` (
  `paperID` int(11) NOT NULL,
  `p_typeID` int(11) NOT NULL,
  `p_image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `papertype`
--

CREATE TABLE `papertype` (
  `p_typeID` int(11) NOT NULL,
  `p_typeName` varchar(100) NOT NULL,
  `p_typeDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `piglist`
--

CREATE TABLE `piglist` (
  `HouseID` int(11) NOT NULL,
  `PigCount` int(11) NOT NULL,
  `PigDeceased` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pigprice`
--

CREATE TABLE `pigprice` (
  `priceID` int(11) NOT NULL,
  `Weight` decimal(10,2) NOT NULL,
  `priceDate` date NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pigsold`
--

CREATE TABLE `pigsold` (
  `soldID` int(11) NOT NULL,
  `soldCount` int(11) NOT NULL,
  `priceID` int(11) NOT NULL,
  `houseID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE `useraccounts` (
  `userID` int(11) NOT NULL,
  `u_username` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `infoID` int(11) NOT NULL,
  `u_firstname` varchar(255) NOT NULL,
  `u_lastname` varchar(255) NOT NULL,
  `u_contactnum` varchar(20) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `roleID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(100) NOT NULL,
  `roleDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `investmentrecords`
--
ALTER TABLE `investmentrecords`
  ADD PRIMARY KEY (`recordID`),
  ADD KEY `fk_typeID` (`typeID`);

--
-- Indexes for table `investmenttype`
--
ALTER TABLE `investmenttype`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `paperrecords`
--
ALTER TABLE `paperrecords`
  ADD PRIMARY KEY (`paperID`),
  ADD KEY `fk_p_typeID` (`p_typeID`);

--
-- Indexes for table `papertype`
--
ALTER TABLE `papertype`
  ADD PRIMARY KEY (`p_typeID`);

--
-- Indexes for table `piglist`
--
ALTER TABLE `piglist`
  ADD PRIMARY KEY (`HouseID`);

--
-- Indexes for table `pigprice`
--
ALTER TABLE `pigprice`
  ADD PRIMARY KEY (`priceID`);

--
-- Indexes for table `pigsold`
--
ALTER TABLE `pigsold`
  ADD PRIMARY KEY (`soldID`),
  ADD KEY `fk_priceID` (`priceID`),
  ADD KEY `fk_houseID` (`houseID`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`infoID`),
  ADD KEY `fk_roleID` (`roleID`),
  ADD KEY `fk_userID` (`userID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `investmentrecords`
--
ALTER TABLE `investmentrecords`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `investmenttype`
--
ALTER TABLE `investmenttype`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paperrecords`
--
ALTER TABLE `paperrecords`
  MODIFY `paperID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `papertype`
--
ALTER TABLE `papertype`
  MODIFY `p_typeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `piglist`
--
ALTER TABLE `piglist`
  MODIFY `HouseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pigprice`
--
ALTER TABLE `pigprice`
  MODIFY `priceID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `infoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `roleID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investmentrecords`
--
ALTER TABLE `investmentrecords`
  ADD CONSTRAINT `fk_typeID` FOREIGN KEY (`typeID`) REFERENCES `investmenttype` (`typeID`);

--
-- Constraints for table `paperrecords`
--
ALTER TABLE `paperrecords`
  ADD CONSTRAINT `fk_p_typeID` FOREIGN KEY (`p_typeID`) REFERENCES `papertype` (`p_typeID`);

--
-- Constraints for table `pigsold`
--
ALTER TABLE `pigsold`
  ADD CONSTRAINT `fk_houseID` FOREIGN KEY (`houseID`) REFERENCES `piglist` (`HouseID`),
  ADD CONSTRAINT `fk_priceID` FOREIGN KEY (`priceID`) REFERENCES `pigprice` (`priceID`);

--
-- Constraints for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD CONSTRAINT `fk_roleID` FOREIGN KEY (`roleID`) REFERENCES `userrole` (`roleID`),
  ADD CONSTRAINT `fk_userID` FOREIGN KEY (`userID`) REFERENCES `useraccounts` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
