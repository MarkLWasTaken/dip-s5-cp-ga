-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 07:54 PM
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
-- Table structure for table `accounts_payable`
--

CREATE TABLE `accounts_payable` (
  `accounts_payable_id` int(11) NOT NULL,
  `payable_date` varchar(300) NOT NULL,
  `amount_payable` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `accounts_receivable`
--

CREATE TABLE `accounts_receivable` (
  `accounts_receivable_id` int(11) NOT NULL,
  `receivable_date` varchar(300) NOT NULL,
  `amount_receivable` int(11) NOT NULL,
  `request_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `accounts_receivable_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`request_id`, `request_date`, `request_type`, `request_item_name`, `item_quantity`, `request_status`, `picture_id`, `user_id`, `item_id`, `accounts_payable_id`, `accounts_receivable_id`) VALUES
(1, '2025-04-29T12:28:42+08:00', 'Buy', 'Intel', 1, 'Pending', '', 6, 1, 0, 0),
(2, '2025-04-29T12:29:04+08:00', 'Buy', 'Dell battery', 1, 'Pending', '', 6, 8, 0, 0),
(3, '2025-04-29T12:29:37+08:00', 'Buy', 'Network card', 1, 'Pending', '', 6, 5, 0, 0),
(4, '2025-04-29T12:30:46+08:00', 'Buy', 'Memory', 1, 'Pending', '', 6, 4, 0, 0),
(5, '2025-04-29T12:31:27+08:00', 'Sell', 'Lenovo desktop', 1, 'Pending', '', 6, 10, 0, 0),
(6, '2025-04-29T12:32:14+08:00', 'Sell', 'HP desktop', 1, 'Pending', '', 6, 10, 0, 0),
(7, '2025-04-29T13:02:48+08:00', 'Sell', 'Nokia', 1, 'Pending', '../uploads/requests/request_id_7_user_id_6.jpg', 6, 12, 0, 0),
(8, '2025-04-29T13:12:04+08:00', 'Sell', 'Nokia', 1, 'Pending', 'request_id_8_user_id_6.jpg', 6, 12, 0, 0);

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
(6, 'Ashly', 'Wray', 'awray5@hibu.com', 'zF7*6uF1r', 'Female', 'Azerbaijan', 1, '2024-10-02', ''),
(7, 'Arne', 'Calltone', 'acalltone6@hugedomains.com', 'zK5\'dV%S', 'Male', 'Brazil', 2, '2024-12-05', ''),
(8, 'Horton', 'Seaman', 'hseaman7@1688.com', 'aX9(ZCGGwQk', 'Male', 'China', 0, '2024-11-04', ''),
(9, 'Margi', 'Petru', 'mpetru8@state.tx.us', 'pN7&>)XQft`1q/`', 'Female', 'Nepal', 0, '2024-10-25', ''),
(10, 'Kellina', 'Senyard', 'ksenyard9@simplemachines.org', 'sF8>Bs!g,', 'Female', 'China', 0, '2024-12-11', ''),
(11, 'Nanny', 'Wardley', 'nwardleya@scientificamerican.com', 'xM2\\9b%`X@H,N<_', 'Female', 'Russia', 0, '2024-12-03', ''),
(12, 'Cesya', 'McTerrelly', 'cmcterrellyb@sbwire.com', 'tZ7+t9#a\"lUC', 'Female', 'Indonesia', 0, '2024-11-28', ''),
(13, 'Lonnard', 'Linnemann', 'llinnemannc@comsenz.com', 'cD5\'I&&Xc', 'Male', 'Brazil', 0, '2024-11-28', ''),
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
(27, 'Catrina', 'Sutworth', 'csutworthq@google.it', 'eR4\'8OrXLDcD', 'Female', 'Greece', 0, '2024-09-20', ''),
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
  MODIFY `accounts_payable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `accounts_receivable`
--
ALTER TABLE `accounts_receivable`
  MODIFY `accounts_receivable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `mailing_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  MODIFY `sales_request_tracking_id` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for table `sales_request_tracking`
--
ALTER TABLE `sales_request_tracking`
  ADD CONSTRAINT `sales_request_tracking_ibfk_1` FOREIGN KEY (`request_id`) REFERENCES `requests` (`request_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
