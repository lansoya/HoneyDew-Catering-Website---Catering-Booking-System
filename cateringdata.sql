-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 04:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cateringdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Occasion` varchar(40) NOT NULL,
  `EventDate` date NOT NULL,
  `EventTime` time NOT NULL,
  `BudgetPerPax` decimal(10,2) NOT NULL,
  `NumberOfPax` int(11) NOT NULL,
  `TotalBudget` decimal(10,2) NOT NULL,
  `EventAddress` varchar(255) NOT NULL,
  `Location` varchar(20) NOT NULL,
  `ContactPerson` varchar(40) NOT NULL,
  `ContactNumber` varchar(20) NOT NULL,
  `CompanyName` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `SpecialRequests` text DEFAULT NULL,
  `PromoCode` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Occasion`, `EventDate`, `EventTime`, `BudgetPerPax`, `NumberOfPax`, `TotalBudget`, `EventAddress`, `Location`, `ContactPerson`, `ContactNumber`, `CompanyName`, `Email`, `SpecialRequests`, `PromoCode`) VALUES
(1, 'wedding', '2024-01-13', '11:32:34', 10.00, 30, 300.00, 'kg batu', 'SELANGOR', 'daus', '012343434', 'daun', 'daus@faris', 'xnak babi', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
