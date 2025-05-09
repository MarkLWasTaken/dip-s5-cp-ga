-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2025 at 05:02 PM
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
-- Database: `ewaste`
--
CREATE DATABASE IF NOT EXISTS `ewaste` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ewaste`;

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
--
-- Database: `ewaste_db`
--
CREATE DATABASE IF NOT EXISTS `ewaste_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ewaste_db`;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `type` enum('Buy','Sell') DEFAULT NULL,
  `status` enum('Pending','Accepted','Rejected') DEFAULT NULL,
  `request_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `item_name`, `type`, `status`, `request_date`) VALUES
(1, 'Laptop', 'Sell', 'Pending', '2025-04-30 21:18:01'),
(2, 'Phone', 'Buy', 'Accepted', '2025-04-30 21:18:01'),
(3, 'TV', 'Sell', 'Rejected', '2025-04-30 21:18:01'),
(4, 'Camera', 'Buy', 'Accepted', '2025-04-30 21:18:01'),
(5, 'Fridge', 'Sell', 'Accepted', '2025-04-30 21:18:01'),
(6, 'Washing Machine', 'Sell', 'Pending', '2025-04-30 21:18:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) NOT NULL DEFAULT '',
  `user` varchar(255) NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `query` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) NOT NULL,
  `col_name` varchar(64) NOT NULL,
  `col_type` varchar(64) NOT NULL,
  `col_length` text DEFAULT NULL,
  `col_collation` varchar(64) NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) DEFAULT '',
  `col_default` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `column_name` varchar(64) NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) NOT NULL DEFAULT '',
  `transformation_options` varchar(255) NOT NULL DEFAULT '',
  `input_transformation` varchar(255) NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) NOT NULL,
  `settings_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Dumping data for table `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"angular_direct\":\"direct\",\"relation_lines\":\"true\",\"snap_to_grid\":\"off\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL,
  `export_type` varchar(10) NOT NULL,
  `template_name` varchar(64) NOT NULL,
  `template_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db` varchar(64) NOT NULL DEFAULT '',
  `table` varchar(64) NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) NOT NULL,
  `item_name` varchar(64) NOT NULL,
  `item_type` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

--
-- Dumping data for table `pma__pdf_pages`
--

INSERT INTO `pma__pdf_pages` (`db_name`, `page_nr`, `page_descr`) VALUES
('ucdf2307_cp_group_9', 1, 'ERD-0001');

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) NOT NULL,
  `tables` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"requests\"},{\"db\":\"ewaste_db\",\"table\":\"requests\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"users\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"sales_request_tracking\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"items\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"accounts_receivable\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"accounts_payable\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"mailing_list\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"contact_us\"},{\"db\":\"ucdf2307_cp_group_9\",\"table\":\"feedbacks\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) NOT NULL DEFAULT '',
  `master_table` varchar(64) NOT NULL DEFAULT '',
  `master_field` varchar(64) NOT NULL DEFAULT '',
  `foreign_db` varchar(64) NOT NULL DEFAULT '',
  `foreign_table` varchar(64) NOT NULL DEFAULT '',
  `foreign_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `search_name` varchar(64) NOT NULL DEFAULT '',
  `search_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

--
-- Dumping data for table `pma__table_coords`
--

INSERT INTO `pma__table_coords` (`db_name`, `table_name`, `pdf_page_number`, `x`, `y`) VALUES
('ucdf2307_cp_group_9', 'accounts_payable', 1, 941, 39),
('ucdf2307_cp_group_9', 'accounts_receivable', 1, 944, 156),
('ucdf2307_cp_group_9', 'contact_us', 1, 272, 464),
('ucdf2307_cp_group_9', 'faq', 1, 946, 416),
('ucdf2307_cp_group_9', 'feedbacks', 1, 606, 44),
('ucdf2307_cp_group_9', 'items', 1, 604, 440),
('ucdf2307_cp_group_9', 'mailing_list', 1, 272, 321),
('ucdf2307_cp_group_9', 'requests', 1, 606, 163),
('ucdf2307_cp_group_9', 'sales_request_tracking', 1, 944, 273),
('ucdf2307_cp_group_9', 'users', 1, 273, 64);

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) NOT NULL DEFAULT '',
  `table_name` varchar(64) NOT NULL DEFAULT '',
  `display_field` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

--
-- Dumping data for table `pma__table_info`
--

INSERT INTO `pma__table_info` (`db_name`, `table_name`, `display_field`) VALUES
('ucdf2307_cp_group_9', 'contact_us', 'name'),
('ucdf2307_cp_group_9', 'feedbacks', 'feedback_date'),
('ucdf2307_cp_group_9', 'mailing_list', 'email_address'),
('ucdf2307_cp_group_9', 'requests', 'request_date'),
('ucdf2307_cp_group_9', 'sales_request_tracking', 'packing_date');

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) NOT NULL,
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `prefs` text NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'ucdf2307_cp_group_9', 'users', '{\"sorted_col\":\"`user_id` ASC\"}', '2025-05-04 04:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) NOT NULL,
  `table_name` varchar(64) NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text NOT NULL,
  `schema_sql` text DEFAULT NULL,
  `data_sql` longtext DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-05-08 06:22:28', '{\"Console\\/Mode\":\"show\",\"Console\\/Height\":60.98133300000001}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) NOT NULL,
  `tab` varchar(64) NOT NULL,
  `allowed` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) NOT NULL,
  `usergroup` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
--
-- Database: `ucdf2307_cp_group_9`
--
CREATE DATABASE IF NOT EXISTS `ucdf2307_cp_group_9` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ucdf2307_cp_group_9`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_payable`
--

CREATE TABLE `accounts_payable` (
  `accounts_payable_id` int(11) NOT NULL,
  `payable_date` varchar(300) NOT NULL,
  `amount_payable` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `picture_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_payable`
--

INSERT INTO `accounts_payable` (`accounts_payable_id`, `payable_date`, `amount_payable`, `request_id`, `picture_id`) VALUES
(1, '2025-05-05 22:23:10 +08:00', 5, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `accounts_receivable_id` int(11) NOT NULL,
  `receivable_date` varchar(300) NOT NULL,
  `amount_receivable` int(11) NOT NULL,
  `request_id` int(11) NOT NULL,
  `picture_id` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts_receivable`
--

INSERT INTO `accounts_receivable` (`accounts_receivable_id`, `receivable_date`, `amount_receivable`, `request_id`, `picture_id`) VALUES
(1, '2025-05-05 22:28:00 +08:00', 200, 1, 'accounts_receivable_id_1_request_id_1.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email_address` varchar(300) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_submitted` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(11) NOT NULL,
  `faq_question` varchar(500) NOT NULL,
  `faq_answer` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`faq_id`, `faq_question`, `faq_answer`) VALUES
(1, 'How is my data treated?', 'You will need to remove any data and perform a factory reset on your devices before handing it over to Quantum.'),
(2, 'What are the e-waste items that are accepted for recycling?', 'You can find the list of e-waste items that accepted at \"E-waste we buy\" page.'),
(3, 'Will I be paid for my e-waste items that\'s being recycled?', 'You can choose to either donate or be rewarded by cash.'),
(4, 'I changed my mind, I do not want to recycle my e-waste. How do I cancel my request?', 'If you really change your mind, do inform Quantum you would like to cancel your request at the \"Contact us\" page.');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `feedbacks_id` int(11) NOT NULL,
  `feedback_date` varchar(300) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_type` varchar(300) NOT NULL,
  `item_price` decimal(11,2) NOT NULL,
  `transaction_type` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_type`, `item_price`, `transaction_type`) VALUES
(1, 'Processor', 200.00, 'buy'),
(2, 'Graphics card', 100.00, 'buy'),
(3, 'Memory (16 GB)', 70.00, 'buy'),
(4, 'Memory (4 GB)', 40.00, 'buy'),
(5, 'Ethernet adapter card', 90.00, 'buy'),
(6, 'CPU heatsink', 10.00, 'buy'),
(7, 'Cooling fan', 12.00, 'buy'),
(8, 'Laptop battery', 20.00, 'buy'),
(9, 'Phone battery', 15.00, 'buy'),
(10, 'Desktop', 5.00, 'sell'),
(11, 'Laptop', 5.00, 'sell'),
(12, 'Smartphone', 5.00, 'sell'),
(13, 'Tablet', 5.00, 'sell'),
(14, 'Monitor', 2.00, 'sell'),
(15, 'Printer', 2.00, 'sell'),
(16, 'Pickup', 50.00, 'service'),
(17, 'Buy B2B Bins', 300.00, 'service'),
(18, 'Destroy Data Securely', 80.00, 'service');

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `mailing_list_id` int(11) NOT NULL,
  `email_address` varchar(300) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL,
  `date_first_subscribed` varchar(300) NOT NULL,
  `date_modified` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `accounts_receivable_id` int(11) NOT NULL,
  `amount_payable` int(11) NOT NULL,
  `amount_receivable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_date`, `request_type`, `request_item_name`, `item_quantity`, `request_status`, `picture_id`, `user_id`, `item_id`, `accounts_payable_id`, `accounts_receivable_id`, `amount_payable`, `amount_receivable`) VALUES
(1, '2025-05-05 21:55:52 +08:00', 'Buy', 'AMD Ryzen 7', 1, 'Approve delivery', '', 7, 1, 0, 1, 0, 200),
(2, '2025-05-05 21:56:14 +08:00', 'Buy', 'AMD Radeon RX 9070 XT', 1, 'Pending', '', 7, 2, 0, 0, 0, 0),
(3, '2025-05-05 21:56:31 +08:00', 'Buy', 'Samsung DDR5', 1, 'Rejected', '', 7, 3, 0, 0, 0, 0),
(4, '2025-05-05 22:03:34 +08:00', 'Sell', 'Apple iPhone', 1, 'Approved', 'request_id_4_user_id_7.png', 7, 12, 1, 0, 5, 0),
(5, '2025-05-05 22:06:23 +08:00', 'Sell', 'Nokia 3310', 1, 'Pending', 'request_id_5_user_id_7.png', 7, 12, 0, 0, 0, 0),
(6, '2025-05-05 22:07:36 +08:00', 'Sell', 'Lenovo Legion 5 Gen 7', 1, 'Pending', 'request_id_6_user_id_7.png', 7, 11, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_request_tracking`
--

CREATE TABLE `sales_request_tracking` (
  `sales_request_tracking_id` int(11) NOT NULL,
  `packing_date` varchar(300) NOT NULL,
  `delivery_date` varchar(300) NOT NULL,
  `delivery_status` varchar(300) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales_request_tracking`
--

INSERT INTO `sales_request_tracking` (`sales_request_tracking_id`, `packing_date`, `delivery_date`, `delivery_status`, `request_id`) VALUES
(1, '2025-05-01', '2025-05-03', 'Delivered', 1),
(2, '2025-05-02', '2025-05-04', 'Delivered', 2),
(3, '2025-05-02', '', 'In Transit', 3),
(4, '2025-05-03', '', 'Processing', 4),
(5, '2025-05-01', '2025-05-02', 'Delivered', 5),
(6, '2025-05-03', '', 'Processing', 6),
(7, '2025-05-02', '2025-05-05', 'Processing', 7),
(8, '2025-05-03', '', 'In Transit', 8),
(9, '2025-05-01', '2025-05-03', 'Delivered', 9),
(10, '2025-05-04', '', 'Processing', 10),
(11, '2025-05-02', '2025-05-04', 'Delivered', 11),
(12, '2025-05-03', '', 'Processing', 12),
(13, '2025-05-01', '', 'Reschedule', 13),
(14, '2025-05-04', '', 'Processing', 14);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `email_address` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL,
  `is_admin` int(1) NOT NULL,
  `date_created` varchar(300) NOT NULL,
  `date_modified` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `gender`, `country`, `is_admin`, `date_created`, `date_modified`) VALUES
(6, 'Ashly', 'Wray', 'awray5@hibu.com', 'aaaaaaaaaaaaaaaaaa', 'Female', 'Malaysia', 1, '2024-10-02', '2025-05-05 21:03:53 +08:00'),
(7, 'Arne', 'Calltone', 'acalltone6@hugedomains.com', 'zK5cdV%S', 'Male', 'Brazil', 2, '2024-12-05', ''),
(9, 'Margi', 'Petru', 'mpetru8@state.tx.us', 'pN7&>)XQft`1q/`', 'Female', 'Nepal', 0, '2024-10-25', ''),
(10, 'Kellina', 'Senyard', 'ksenyard9@simplemachines.org', 'sF8>Bs!g,', 'Female', 'China', 0, '2024-12-11', ''),
(11, 'Nanny', 'Wardley', 'nwardleya@scientificamerican.com', 'xM2\\9b%`X@H,N<_', 'Female', 'Russia', 0, '2024-12-03', ''),
(12, 'Cesya', 'McTerrelly', 'cmcterrellyb@sbwire.com', 'tZ7+t9#a\"lUC', 'Female', 'Indonesia', 0, '2024-11-28', ''),
(13, 'Lonnard', 'Linnemann', 'llinnemannc@comsenz.com', 'cD5zI&&Xc', 'Male', 'Brazil', 0, '2024-11-28', ''),
(14, 'Witty', 'Coop', 'wcoopd@google.com', 'oZ3@mR0Z9H1fe', 'Male', 'China', 0, '2024-11-09', ''),
(15, 'Gerrie', 'Hannigan', 'ghannigane@lulu.com', 'bQ6,KmKCZ+Z9\"f', 'Female', 'Russia', 0, '2024-11-02', ''),
(16, 'Olva', 'Manolov', 'omanolovf@google.com.br', 'mL4,Ji>Z3', 'Female', 'United States', 0, '2024-10-16', ''),
(17, 'Colver', 'Row', 'crowg@nydailynews.com', 'wW9{9DmFw{F/k5Zq', 'Male', 'Poland', 0, '2024-11-11', ''),
(18, 'Lee', 'Rhymer', 'lrhymerh@discovery.com', 'hU9?r}}@F', 'Male', 'Finland', 0, '2024-10-08', ''),
(19, 'Napoleon', 'Francescozzi', 'nfrancescozzii@lycos.com', 'dT3{_y.k6', 'Male', 'Thailand', 0, '2024-12-15', ''),
(20, 'Holly', 'Viger', 'hvigerj@bizjournals.com', 'xG5=xI3}{&Mh0_=', 'Male', 'South Korea', 0, '2024-09-22', ''),
(21, 'Elinor', 'Acaster', 'eacasterk@seattletimes.com', 'mZ7)6?T{L08nSg', 'Female', 'Canada', 0, '2024-11-17', ''),
(22, 'Rochelle', 'Lill', 'rlilll@domainmarket.com', 'qG2}WZ,YJdh', 'Female', 'Ukraine', 0, '2024-10-05', ''),
(23, 'Darci', 'Houdhury', 'dhoudhurym@smugmug.com', 'rI4,lU#!K*p1Y', 'Non-binary', 'Mauritius', 0, '2024-10-13', ''),
(24, 'Leeann', 'Vedeneev', 'lvedeneevn@ebay.co.uk', 'xC0_!KlD', 'Female', 'United Kingdom', 0, '2024-10-23', ''),
(25, 'Darin', 'Lavielle', 'dlavielleo@springer.com', 'oP2?FE+\"89~x', 'Bigender', 'Chile', 0, '2024-11-26', ''),
(26, 'Curtice', 'Triggel', 'ctriggelp@mediafire.com', 'lP4$|.gbp', 'Male', 'Russia', 0, '2024-12-06', ''),
(27, 'Catrina', 'Sutworth', 'csutworthq@google.it', 'eR4z8OrXLDcD', 'Female', 'Greece', 0, '2024-09-20', ''),
(28, 'Tiffanie', 'Waitland', 'twaitlandr@lulu.com', 'vQ8@ax3L@GkA', 'Female', 'Colombia', 0, '2024-09-22', ''),
(29, 'Pace', 'Kuhndel', 'pkuhndels@multiply.com', 'pT8~6~CiSx=&AqH%', 'Male', 'Japan', 0, '2024-12-03', ''),
(30, 'Tara', 'Stilldale', 'tstilldalet@infoseek.co.jp', 'dD8=5\\W|8q', 'Female', 'Norfolk Island', 0, '2024-10-12', ''),
(31, 'Margo', 'Wrightim', 'mwrightimu@reddit.com', 'tB7_e>pMS*', 'Female', 'Vietnam', 0, '2024-12-15', ''),
(32, 'Zaneta', 'De Metz', 'zdemetzv@bloglines.com', 'gT4(C}#ef', 'Female', 'Uruguay', 0, '2024-12-18', ''),
(33, 'Eachelle', 'Gores', 'egoresw@skype.com', 'hF7<T\\+K1J}%>', 'Female', 'Palestinian Territory', 0, '2024-12-21', ''),
(34, 'Ketti', 'Lante', 'klantex@google.com.br', 'jD7!O){z!MDF\"', 'Female', 'Indonesia', 0, '2024-12-16', ''),
(35, 'Ortensia', 'Dillaway', 'odillawayy@upenn.edu', 'jH2>Q}zoGP}Sm', 'Agender', 'Tanzania', 0, '2024-10-08', ''),
(36, 'Bryn', 'Dragge', 'bdraggez@disqus.com', 'zG0>0e4I!Z', 'Female', 'Pakistan', 0, '2024-11-03', ''),
(37, 'Vasily', 'Patton', 'vpatton10@irs.gov', 'yP0.uG?mg2wvwL', 'Male', 'Mexico', 0, '2024-09-14', ''),
(38, 'Averell', 'Aves', 'aaves11@cisco.com', 'cS5%ICq<InLLU', 'Male', 'France', 0, '2024-10-23', ''),
(39, 'Averil', 'Langsbury', 'alangsbury12@a8.net', 'vF5+pIgL|V9l|', 'Male', 'Colombia', 0, '2024-09-30', ''),
(40, 'Hugh', 'Gingold', 'hgingold13@so-net.ne.jp', 'tO2\\pk*`Z~@', 'Male', 'South Africa', 0, '2024-11-03', ''),
(41, 'Odell', 'Brigge', 'obrigge14@telegraph.co.uk', 'fR6@QL$l~2q$n<e', 'Genderqueer', 'Finland', 0, '2024-12-20', ''),
(42, 'Weider', 'Ord', 'word15@hatena.ne.jp', 'yM9(gv+!6qPHN', 'Male', 'Indonesia', 0, '2024-10-10', ''),
(43, 'Amble', 'Frankcom', 'afrankcom16@umn.edu', 'qV0+~+%<+Od/d', 'Male', 'Philippines', 0, '2024-11-26', ''),
(44, 'Lindy', 'Stelfox', 'lstelfox17@amazon.co.jp', 'yB4,rM.`b99ByeJ', 'Female', 'China', 0, '2024-12-21', ''),
(45, 'Basil', 'Learie', 'blearie18@nifty.com', 'lF4{yvfEH*~p1/C', 'Male', 'Russia', 0, '2024-10-20', ''),
(46, 'Leland', 'Jarvis', 'ljarvis19@wikia.com', 'rR9`fot>X1DtY1', 'Male', 'Indonesia', 0, '2024-12-18', ''),
(47, 'Nonna', 'Annets', 'nannets1a@uol.com.br', 'sH9#?X0Kc%5n', 'Female', 'France', 0, '2024-11-01', ''),
(48, 'Ula', 'Brace', 'ubrace1b@so-net.ne.jp', 'gR5~P2%rPH@|3a*j', 'Female', 'Philippines', 0, '2024-10-04', ''),
(49, 'Kent', 'Siberry', 'ksiberry1c@ovh.net', 'vT8`7Mip<wU}bi&g', 'Male', 'China', 0, '2024-11-11', ''),
(50, 'Euell', 'Venneur', 'evenneur1d@taobao.com', 'fG7~BAHj`!wJlT', 'Male', 'Gambia', 0, '2024-12-23', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  ADD PRIMARY KEY (`accounts_payable_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD PRIMARY KEY (`accounts_receivable_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`),
  ADD KEY `email_address` (`email_address`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`feedbacks_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD PRIMARY KEY (`mailing_list_id`),
  ADD KEY `email_address` (`email_address`);

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
-- Indexes for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  ADD PRIMARY KEY (`sales_request_tracking_id`),
  ADD KEY `request_id` (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  MODIFY `accounts_payable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  MODIFY `accounts_receivable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `feedbacks_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mailing_list`
--
ALTER TABLE `mailing_list`
  MODIFY `mailing_list_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  MODIFY `sales_request_tracking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts_payable`
--
ALTER TABLE `accounts_payable`
  ADD CONSTRAINT `accounts_payable_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  ADD CONSTRAINT `accounts_receivable_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD CONSTRAINT `feedbacks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
