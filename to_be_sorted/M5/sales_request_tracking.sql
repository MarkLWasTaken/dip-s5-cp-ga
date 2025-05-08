-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 09:49 AM
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
-- Database: `ucdf2307_cp_group_9`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_request_tracking`
--

CREATE TABLE `sales_request_tracking` (
  `sales_request_tracking_id` int(11) NOT NULL,
  `packing_date` varchar(300) NOT NULL,
  `delivery_date` varchar(300) DEFAULT NULL,
  `delivery_status` varchar(300) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_request_tracking`
--

INSERT INTO `sales_request_tracking` (`sales_request_tracking_id`, `packing_date`, `delivery_date`, `delivery_status`, `request_id`) VALUES
(1, '2025-05-01', '2025-05-03', 'Delivered', 1),
(2, '2025-05-02', '2025-05-04', 'Delivered', 2),
(3, '2025-05-02', NULL, 'In Transit', 3),
(4, '2025-05-03', NULL, 'Processing', 4),
(5, '2025-05-01', '2025-05-02', 'Delivered', 5),
(6, '2025-05-03', NULL, 'Processing', 6),
(7, '2025-05-02', '2025-05-05', 'Delivered', 7),
(8, '2025-05-03', NULL, 'In Transit', 8),
(9, '2025-05-01', '2025-05-03', 'Delivered', 9),
(10, '2025-05-04', NULL, 'Processing', 10),
(11, '2025-05-02', '2025-05-04', 'Delivered', 11),
(12, '2025-05-03', NULL, 'Processing', 12),
(13, '2025-05-01', NULL, 'Reschedule', 13),
(14, '2025-05-04', NULL, 'Processing', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  ADD PRIMARY KEY (`sales_request_tracking_id`),
  ADD KEY `request_id` (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  MODIFY `sales_request_tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  ADD CONSTRAINT `sales_request_tracking_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
