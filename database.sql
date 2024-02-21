-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 01:55 PM
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
-- Database: `creativbyte_proj`
--
CREATE DATABASE IF NOT EXISTS `creativbyte_proj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `creativbyte_proj`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CourseID` varchar(50) DEFAULT NULL,
  `Price` double(12,2) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalPrice` double(12,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CourseID` varchar(50) NOT NULL,
  `CourseTitle` varchar(200) DEFAULT NULL,
  `Duration` varchar(20) DEFAULT NULL,
  `Price` int(20) DEFAULT NULL,
  `Tutor` varchar(128) DEFAULT NULL,
  `Image` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseTitle`, `Duration`, `Price`, `Tutor`, `Image`) VALUES
('C-001', 'Graphics Design', '3 months', 15000, 'Malik Ahmed', 'image/card4.png'),
('C-002', 'Freelancing', '2 months', 8000, 'Touheed Hussain', 'image/card2.png'),
('C-003', 'Web Designing and Development', '6 months', 25000, 'Malik Ahmed', 'image/card5.png'),
('C-004', 'Computer Basics Training', '1 month', 3000, 'M. Ismail', 'image/card1.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `CustomerName` varchar(128) DEFAULT NULL,
  `CustomerPhone` varchar(12) DEFAULT NULL,
  `CustomerIC` varchar(14) DEFAULT NULL,
  `CustomerEmail` varchar(200) DEFAULT NULL,
  `CustomerAddress` varchar(200) DEFAULT NULL,
  `CustomerGender` varchar(10) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `CustomerName`, `CustomerPhone`, `CustomerIC`, `CustomerEmail`, `CustomerAddress`, `CustomerGender`, `UserID`) VALUES
(1, 'Malik Ahmad Hassan', '1232144566', '2324445435', 'malik534@gmail.com', 'asfsafafafa', 'Male', 1),
(2, 'Malik Ahmad Hassan', '1232144566', '2324445435', 'malik534@gmail.com', 'asfsafafafa', 'Male', NULL),
(3, 'Malik Ahmad Hassan', '1232144566', '2324445435', 'malik534@gmail.com', 'asfsafafafa', 'Male', NULL),
(4, 'Malik Ahmad Hassan', '1232144566', '2324445435', 'malik534@gmail.com', 'asfsafafafa', 'Male', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `CourseID` varchar(50) DEFAULT NULL,
  `DatePurchase` datetime DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalPrice` double(12,2) DEFAULT NULL,
  `Status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderID`, `CustomerID`, `CourseID`, `DatePurchase`, `Quantity`, `TotalPrice`, `Status`) VALUES
(2, 3, 'C-004', '2023-12-08 08:56:31', 1, 3000.00, 'N'),
(3, 1, 'C-004', '2023-12-08 08:58:51', 1, 3000.00, 'y'),
(4, 1, 'C-004', '2023-12-08 09:06:01', 1, 3000.00, 'y'),
(5, 1, 'C-004', '2023-12-08 09:25:53', 1, 3000.00, 'y'),
(6, 1, 'C-004', '2023-12-08 09:45:14', 1, 3000.00, 'y'),
(7, 1, 'C-004', '2023-12-08 09:46:35', 10, 30000.00, 'y');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `UserName` varchar(128) DEFAULT NULL,
  `Password` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `UserName`, `Password`) VALUES
(1, 'malik1', '12345678');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CourseID` (`CourseID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `course` (`CourseID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `order_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
