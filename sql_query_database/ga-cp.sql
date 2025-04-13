-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2024 at 11:53 PM
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
-- Database: `ucdf2307_rwdd_group_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_us_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `date_submitted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `css_quiz_answers`
--

CREATE TABLE `css_quiz_answers` (
  `css_quiz_answers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `date_submitted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `donation_id` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `bank_account_number` int(20) NOT NULL,
  `amount_donated` int(15) NOT NULL,
  `date_submitted` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `html_quiz_answers`
--

CREATE TABLE `html_quiz_answers` (
  `html_quiz_answers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `date_attempted` varchar(200) NOT NULL,
  `date_submitted` varchar(200) NOT NULL,
  `q1_answer` varchar(200) NOT NULL,
  `q2_answer` varchar(200) NOT NULL,
  `q3_answer` varchar(200) NOT NULL,
  `q4_answer` varchar(200) NOT NULL,
  `q5_answer` varchar(200) NOT NULL,
  `q6_answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailing_list`
--

CREATE TABLE `mailing_list` (
  `mailing_list_id` int(11) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `is_subscribed` tinyint(1) NOT NULL,
  `date_first_subscribed` varchar(200) NOT NULL,
  `date_modified` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mailing_list`
--

INSERT INTO `mailing_list` (`mailing_list_id`, `email_address`, `is_subscribed`, `date_first_subscribed`, `date_modified`) VALUES
(1, 'ewhitehall0@mozilla.com', 1, '2024-12-09', ''),
(2, 'cfrancesco1@yellowpages.com', 1, '2024-11-06', ''),
(3, 'bmccolgan2@topsy.com', 1, '2024-09-19', ''),
(4, 'clago3@dedecms.com', 1, '2024-11-08', ''),
(5, 'eyitzovitz4@java.com', 1, '2024-10-19', ''),
(6, 'mmeadmore5@so-net.ne.jp', 1, '2024-10-13', ''),
(7, 'mprangle6@tripod.com', 1, '2024-12-11', ''),
(8, 'hmartonfi7@guardian.co.uk', 1, '2024-09-16', ''),
(9, 'hsuddock8@irs.gov', 1, '2024-11-15', ''),
(10, 'caizikovitz9@time.com', 1, '2024-12-17', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `country` varchar(200) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `date_created` varchar(200) NOT NULL,
  `date_modified` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `gender`, `country`, `is_admin`, `date_created`, `date_modified`) VALUES
(6, 'Ashly', 'Wray', 'awray5@hibu.com', 'zF7*6uF1r', 'Female', 'Azerbaijan', 0, '2024-10-02', ''),
(7, 'Arne', 'Calltone', 'acalltone6@hugedomains.com', 'zK5\'dV%S', 'Male', 'Brazil', 0, '2024-12-05', ''),
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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_us_id`);

--
-- Indexes for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  ADD PRIMARY KEY (`css_quiz_answers_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`donation_id`);

--
-- Indexes for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  ADD PRIMARY KEY (`html_quiz_answers_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `mailing_list`
--
ALTER TABLE `mailing_list`
  ADD PRIMARY KEY (`mailing_list_id`);

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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_us_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  MODIFY `css_quiz_answers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `donation_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  MODIFY `html_quiz_answers_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailing_list`
--
ALTER TABLE `mailing_list`
  MODIFY `mailing_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `css_quiz_answers`
--
ALTER TABLE `css_quiz_answers`
  ADD CONSTRAINT `css_quiz_answers_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `html_quiz_answers`
--
ALTER TABLE `html_quiz_answers`
  ADD CONSTRAINT `html_quiz_answers_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
