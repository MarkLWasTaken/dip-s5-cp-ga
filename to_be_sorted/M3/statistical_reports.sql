-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2025 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ewaste`
--

-- --------------------------------------------------------

--
-- Table structure for table `statistical_reports`
--

CREATE TABLE `statistical_reports` (
  `Report_ID` int(11) NOT NULL,
  `Material_Name` varchar(255) DEFAULT NULL,
  `Report_Type` varchar(255) DEFAULT NULL,
  `Unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statistical_reports`
--

INSERT INTO `statistical_reports` (`Report_ID`, `Material_Name`, `Report_Type`, `Unit`) VALUES
(1, 'Old Laptop', 'Preprocessing', 50),
(2, 'Old Desktop', 'Preprocessing', 60),
(3, 'Old Monitor', 'Preprocessing', 100),
(4, 'Old Smartphone', 'Preprocessing', 90),
(5, 'Old Tablets', 'Preprocessing', 80),
(6, 'RAM', 'Recycled', 50),
(7, 'Hard Disk', 'Recycled', 40),
(8, 'Wireless Network Card', 'Recycled', 30),
(9, 'CPU', 'Recycled', 45),
(10, 'GPU', 'Recycled', 20),
(11, 'Old Laptop', 'Collected', 60),
(12, 'Old Desktop', 'Collected', 70),
(13, 'Old Monitor', 'Collected', 120),
(14, 'Old Smartphone', 'Collected', 100),
(15, 'Old Tablets', 'Collected', 90),
(16, 'RAM', 'Sold', 40),
(17, 'Hard Disk', 'Sold', 30),
(18, 'Wireless Network Card', 'Sold', 20),
(19, 'CPU', 'Sold', 22),
(20, 'GPU', 'Sold', 15),
(21, 'Old Laptop', 'Cash', 200),
(22, 'Old Desktop', 'Cash', 300),
(23, 'Old Monitor', 'Cash', 170),
(24, 'Old Smartphone', 'Cash', 75),
(25, 'Old Tablets', 'Cash', 80),
(26, 'RAM', 'Cash', 70),
(27, 'Hard Disk', 'Cash', 180),
(28, 'Wireless Network Card', 'Cash', 60),
(29, 'CPU', 'Cash', 200),
(30, 'GPU', 'Cash', 500),
(31, 'Paid to User A', 'Reward', 100),
(32, 'Paid to User B', 'Reward', 150),
(33, 'Paid to User C', 'Reward', 50),
(34, 'Paid to User D', 'Reward', 70),
(35, 'Paid to User E', 'Reward', 80);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statistical_reports`
--
ALTER TABLE `statistical_reports`
  ADD PRIMARY KEY (`Report_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `statistical_reports`
--
ALTER TABLE `statistical_reports`
  MODIFY `Report_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
