-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2023 at 12:05 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meadilkh_mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `bv`
--

CREATE TABLE `bv` (
  `table_id` int(11) NOT NULL,
  `my_bv` int(11) NOT NULL DEFAULT '0',
  `my_bv_new` float DEFAULT NULL,
  `counted` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bv`
--

INSERT INTO `bv` (`table_id`, `my_bv`, `my_bv_new`, `counted`) VALUES
(1, 0, 1, 'no'),
(2, 0, 2.5, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `cheque`
--

CREATE TABLE `cheque` (
  `table_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `income` varchar(100) NOT NULL,
  `TDS` varchar(100) NOT NULL,
  `admin_charges` varchar(100) NOT NULL,
  `amount_payble` varchar(100) NOT NULL,
  `payment_mode` enum('Cheque','NEFT') NOT NULL,
  `payment_date` date NOT NULL,
  `refrence_no` varchar(100) NOT NULL,
  `refrence_date` date NOT NULL,
  `refrence_bank` varchar(100) NOT NULL,
  `refrence_branch` varchar(100) NOT NULL,
  `status` enum('Paid','Unpaid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `epins`
--

CREATE TABLE `epins` (
  `table_id` int(11) NOT NULL,
  `epin` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `req_no` int(11) DEFAULT NULL,
  `epin_product_code` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `mode` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dd_no` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `dd_date` date DEFAULT NULL,
  `dd_bank` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `dd_branch` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `cheque_no` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `cheque_bank` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `cheque_branch` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `used_by` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'N/A',
  `status` enum('Pending','Issued','Used','Canceled') COLLATE utf8_bin NOT NULL DEFAULT 'Pending',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `created_ip` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_browser` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_ip` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `updated_browser` varchar(300) COLLATE utf8_bin DEFAULT NULL,
  `updated_by` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `viewed_or_not` varchar(10) COLLATE utf8_bin DEFAULT 'no',
  `viewed_or_not_admin` varchar(10) COLLATE utf8_bin NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `epins`
--

INSERT INTO `epins` (`table_id`, `epin`, `req_no`, `epin_product_code`, `mode`, `dd_no`, `dd_date`, `dd_bank`, `dd_branch`, `cheque_no`, `cheque_date`, `cheque_bank`, `cheque_branch`, `used_by`, `status`, `created_date`, `created_by`, `created_ip`, `created_browser`, `updated_date`, `updated_ip`, `updated_browser`, `updated_by`, `viewed_or_not`, `viewed_or_not_admin`) VALUES
(1, '3816429668112534', 101, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '2', 'Issued', '2016-02-15 11:01:29', '1', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0', '2016-02-15 16:31:45', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/48.0.2564.97 Safari/537.36', '1', 'no', 'no'),
(2, '7162479735992831', 102, '2', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', '7', 'Used', '2016-03-08 10:08:16', '1', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36', '2016-03-14 16:57:46', '::1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.75 Safari/537.36', '2', 'no', 'no'),
(4, '1826688338648191', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:41', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no'),
(5, '6498329793854931', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:41', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no'),
(6, '9222239731662766', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:42', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no'),
(7, '9485339442772488', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:42', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no'),
(8, '6911619636414915', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:42', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no'),
(9, '1866278484557329', 103, '1', 'cash', '', '0000-00-00', '', '', '', '0000-00-00', '', '', 'N/A', 'Issued', '2016-12-09 11:48:42', '3', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2016-12-09 17:19:02', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '2', 'no', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `highest_achiever`
--

CREATE TABLE `highest_achiever` (
  `table_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `income` varchar(20) DEFAULT NULL,
  `session` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `highest_achiever`
--

INSERT INTO `highest_achiever` (`table_id`, `user_id`, `income`, `session`) VALUES
(3, 4, '10', 4),
(4, 5, '65', 13),
(5, 6, '48', 15);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `table_id` int(11) NOT NULL,
  `epin_code` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`table_id`, `epin_code`, `user_id`) VALUES
(1, '3816429668112534', 2),
(2, '7162479735992831', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `table_id` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL DEFAULT 'Executive',
  `tag_upgraded_session` varchar(5) NOT NULL DEFAULT 'no',
  `username` varchar(200) DEFAULT NULL,
  `did` varchar(10) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT 'user',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `income_status` varchar(20) NOT NULL DEFAULT 'allowed',
  `reason` varchar(1000) DEFAULT NULL,
  `last_login_ip` varchar(50) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_browser` varchar(300) DEFAULT NULL,
  `fso` varchar(10) DEFAULT NULL,
  `sso` varchar(10) DEFAULT NULL,
  `sponsor_id` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(200) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `educational_qualification` varchar(100) DEFAULT NULL,
  `proffession` varchar(100) DEFAULT NULL,
  `contact_no` varchar(150) DEFAULT NULL,
  `alternate_contact_no` varchar(150) DEFAULT NULL,
  `email_id` varchar(300) DEFAULT NULL,
  `pan` varchar(20) DEFAULT NULL,
  `c_address` varchar(500) DEFAULT NULL,
  `p_address` varchar(500) DEFAULT NULL,
  `p_local` varchar(200) DEFAULT NULL,
  `p_city` varchar(200) DEFAULT NULL,
  `p_state` varchar(200) DEFAULT NULL,
  `p_pincode` varchar(200) DEFAULT NULL,
  `c_local` varchar(200) DEFAULT NULL,
  `c_city` varchar(200) DEFAULT NULL,
  `c_state` varchar(200) DEFAULT NULL,
  `c_pincode` varchar(200) DEFAULT NULL,
  `nominee_name` varchar(200) DEFAULT NULL,
  `nominee_relation` varchar(200) DEFAULT NULL,
  `nominee_age` varchar(200) DEFAULT NULL,
  `bank_name` varchar(200) DEFAULT NULL,
  `bank_branch` varchar(200) DEFAULT NULL,
  `bank_account_no` varchar(200) DEFAULT NULL,
  `bank_ifsc_code` varchar(200) DEFAULT NULL,
  `profile_pic` varchar(500) DEFAULT NULL,
  `profile_path` varchar(500) NOT NULL DEFAULT 'images/logo.png',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `income_mode` varchar(20) NOT NULL DEFAULT 'cheque',
  `bank_details` varchar(1000) DEFAULT NULL,
  `created_by` varchar(10) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_ip` varchar(50) DEFAULT NULL,
  `created_browser` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`table_id`, `tag`, `tag_upgraded_session`, `username`, `did`, `password`, `type`, `status`, `income_status`, `reason`, `last_login_ip`, `last_login_date`, `last_login_browser`, `fso`, `sso`, `sponsor_id`, `name`, `dob`, `gender`, `father_name`, `mother_name`, `nationality`, `educational_qualification`, `proffession`, `contact_no`, `alternate_contact_no`, `email_id`, `pan`, `c_address`, `p_address`, `p_local`, `p_city`, `p_state`, `p_pincode`, `c_local`, `c_city`, `c_state`, `c_pincode`, `nominee_name`, `nominee_relation`, `nominee_age`, `bank_name`, `bank_branch`, `bank_account_no`, `bank_ifsc_code`, `profile_pic`, `profile_path`, `start_date`, `end_date`, `income_mode`, `bank_details`, `created_by`, `created_date`, `created_ip`, `created_browser`) VALUES
(1, 'Executive', 'no', 'adil', '123', '123', 'user', 'active', 'allowed', '', '171.79.34.193', '2017-07-01 19:00:44', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'images/logo.png', '0000-00-00', '0000-00-00', 'cheque', '', '', '2016-02-15 11:01:02', '', ''),
(2, 'Executive', 'no', 'admin', 'admin', 'admin', 'admin', 'active', 'allowed', '', '210.89.61.6', '2023-05-29 10:23:47', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36', '', '', '', 'Admin', '1965-10-05', 'Male', 'fdsfsdf', '', 'Indian', 'sdfds', 'fsdfsd', '98979585020', '9897958520', 'samar@gmail.com', '', 'dsfsd', 'ffdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '66-1EO3ULY20GA97BPJF846TVRNS5QHMWXKDZCI-minions_2015-1280x720.jpg', 'images/logo.png', '2016-02-15', '2017-02-14', 'cheque', '', '1', '2016-02-15 11:15:03', '::1', 'Mozilla/5.0 (Windows NT 6.1; rv:45.0) Gecko/20100101 Firefox/45.0'),
(3, 'Executive', 'no', 'sameer', '123', '123', 'user', 'active', 'allowed', '', '103.46.192.2', '2016-12-12 15:14:32', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36', '', '7', '', 'Sameer Khan', '6-11-1980', 'Female', 'as', 'Mom', 'asasasa', 'sas', 'Developer', '9999082285', '7895367300', 'samkhan6623@gmail.com', 'AKH78GF4', 'Delhi', 'Delhi', 'D-172, DWARKA MOR', 'NEW DELHI', '1', '110059', 'D-172, DWARKA MOR', 'NEW DELHI', '1', '110059', 'HEMA DEVLAL', 'WIFE', '30', 'Punjab National bank', 'Uttam nagar', '4054000100132466', 'PUNB0405400', '64-JQ5R6O3DLX2E0CSZNAIWHVUF71YK9GB8P4MT-beautiful_christmas_tree-1280x720.jpg', 'images/logo.png', '0000-00-00', '0000-00-00', 'cheque', '', '', '2016-02-16 05:27:35', '', ''),
(4, 'Executive', 'no', 'khan_sam', '123', '123', 'user', 'active', 'allowed', '', '', '0000-00-00 00:00:00', '', '', '', '', 'Ankit Kumar', '1988-10-05', 'Male', 'sddsd', '', 'sdsdsdsd', 'sd', 'sdsdsdsdsd', '32323', '2323', 'Admin@gmail.com', '', 'sdsd', 'sdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '65-X8U1JOTWBDEZM2I7V9NAL6KFP40YSR3H5GQC-metro-music-1.png', 'images/logo.png', '0000-00-00', '0000-00-00', 'cheque', '', '', '2016-02-16 05:28:06', '', ''),
(5, 'Executive', 'no', 'saddu', '123', '123', 'user', 'active', 'allowed', '', '', '0000-00-00 00:00:00', '', '', '', '', 'Session', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'images/logo.png', '0000-00-00', '0000-00-00', 'cheque', '', '', '2016-02-16 06:46:19', '', ''),
(6, 'Executive', 'no', 'chand', '123', '123', 'user', 'active', 'allowed', '', '', '0000-00-00 00:00:00', '', '', '', '', 'Session', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'images/logo.png', '0000-00-00', '0000-00-00', 'cheque', '', '', '2016-02-16 06:46:19', '', ''),
(7, 'Executive', 'no', 'Gokul', '92256952', '123', 'user', 'active', 'allowed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Gokul', '2016-11-29', 'Male', 'OK', '', 'Indian', 'jh', 'jh', '9897958520', '9897958520', 'samkhan@gmail.com', NULL, 'Hello India', 'Hello', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'images/logo.png', '2016-12-08', '2017-12-07', 'cheque', NULL, '1', '2016-12-08 21:41:57', '::1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `table_id` int(11) NOT NULL,
  `from` int(11) DEFAULT NULL,
  `to` varchar(100) DEFAULT NULL,
  `subject` varchar(500) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_ip` varchar(200) DEFAULT NULL,
  `created_browser` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`table_id`, `from`, `to`, `subject`, `message`, `created_date`, `created_ip`, `created_browser`) VALUES
(1, 1, 'company', 'Message Subject Is Placed Here', 'Hello John,\r\n\r\nKeffiyeh blog actually fashion axe vegan, irony biodiesel. Cold-pressed hoodie chillwave put a bird on it aesthetic, bitters brunch meggings vegan iPhone. Dreamcatcher vegan scenester mlkshk. Ethical master cleanse Bushwick, occupy Thundercats banjo cliche ennui farm-to-table mlkshk fanny pack gluten-free. Marfa butcher vegan quinoa, bicycle rights disrupt tofu scenester chillwave 3 wolf moon asymmetrical taxidermy pour-over. Quinoa tote bag fashion axe, Godard disrupt migas church-key tofu blog locavore. Thundercats cronut polaroid Neutra tousled, meh food truck selfies narwhal American Apparel.', '2016-02-16 11:21:36', '', ''),
(2, 1, 'company', 'rtrt', 'rtrtrtrt', '2016-02-16 12:05:17', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ps`
--

CREATE TABLE `ps` (
  `product_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `prod_desc` varchar(100) DEFAULT NULL,
  `currency` varchar(10) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `actual_price` varchar(20) DEFAULT NULL,
  `tax` varchar(20) DEFAULT NULL,
  `handling_charge` varchar(20) DEFAULT NULL,
  `price_in_words` varchar(200) DEFAULT NULL,
  `bv` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ps`
--

INSERT INTO `ps` (`product_id`, `name`, `prod_desc`, `currency`, `price`, `actual_price`, `tax`, `handling_charge`, `price_in_words`, `bv`, `status`) VALUES
(1, 'Standard', '', 'INR', '7960', '5000', '', '', 'Seven Thousand Nine Hundred and Sixty Only', '1', 'active'),
(2, 'Deluxe', '', 'INR', '13960', '5000', '', '', 'Thirteen Thousand Nine Hundred and Sixty Only', '2.5', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conversation`
--

CREATE TABLE `tbl_conversation` (
  `table_id` int(11) NOT NULL,
  `conver_id` int(11) DEFAULT NULL,
  `messages` varchar(10000) DEFAULT NULL,
  `created_browser` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_ip` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `table_id` int(11) NOT NULL,
  `created_ip` varchar(100) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_browser` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bv`
--
ALTER TABLE `bv`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `cheque`
--
ALTER TABLE `cheque`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `epins`
--
ALTER TABLE `epins`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `highest_achiever`
--
ALTER TABLE `highest_achiever`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `ps`
--
ALTER TABLE `ps`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_conversation`
--
ALTER TABLE `tbl_conversation`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bv`
--
ALTER TABLE `bv`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cheque`
--
ALTER TABLE `cheque`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `epins`
--
ALTER TABLE `epins`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `highest_achiever`
--
ALTER TABLE `highest_achiever`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ps`
--
ALTER TABLE `ps`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_conversation`
--
ALTER TABLE `tbl_conversation`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
