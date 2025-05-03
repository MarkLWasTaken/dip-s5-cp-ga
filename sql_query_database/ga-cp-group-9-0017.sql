-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2025 at 01:19 PM
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
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `request_id` int(11) NOT NULL,
  `request_date` varchar(300) NOT NULL,
  `request_type` varchar(300) NOT NULL,
  `request_item_name` varchar(300) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `request_status` varchar(300) NOT NULL,
  `picture_id` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `accounts_payable_id` int(11) NOT NULL,
  `accounts_receivable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_date`, `request_type`, `request_item_name`, `item_quantity`, `request_status`, `picture_id`, `user_id`, `item_id`, `accounts_payable_id`, `accounts_receivable_id`) VALUES
(1, '2025-05-03 16:53:32 +08:00', 'Sell', 'HP', 1, 'Pending', 'request_id_1_user_id_7.jpg', 7, 10, 0, 0),
(2, '2025-05-03 16:54:16 +08:00', 'Sell', 'Dell', 1, 'Pending', 'request_id_2_user_id_7.jpg', 7, 11, 0, 0),
(3, '2025-05-03 16:54:44 +08:00', 'Sell', 'Nokia', 1, 'Pending', 'request_id_3_user_id_7.png', 7, 12, 0, 0),
(4, '2025-05-03 16:55:16 +08:00', 'Sell', 'Samsung Galaxy Tab', 1, 'Pending', 'request_id_4_user_id_7.png', 7, 13, 0, 0),
(5, '2025-05-03 16:55:34 +08:00', 'Sell', 'Dell', 1, 'Pending', 'request_id_5_user_id_7.png', 7, 14, 0, 0),
(6, '2025-05-03 16:55:52 +08:00', 'Sell', 'Brother', 1, 'Pending', 'request_id_6_user_id_7.png', 7, 15, 0, 0),
(7, '2025-05-03 18:09:21 +08:00', 'Buy', 'AMD', 1, 'Pending', '', 7, 1, 0, 0),
(8, '2025-05-03 18:09:35 +08:00', 'Buy', 'AMD', 1, 'Pending', '', 7, 2, 0, 0),
(9, '2025-05-03 18:10:07 +08:00', 'Buy', 'Lenovo', 1, 'Pending', '', 7, 8, 0, 0),
(10, '2025-05-03 18:51:22 +08:00', 'Sell', 'Asus', 1, 'Pending', 'request_id_10_user_id_7.jpg', 7, 10, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `accounts_payable_id` (`accounts_payable_id`),
  ADD KEY `accounts_receivable_id` (`accounts_receivable_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `requests_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
