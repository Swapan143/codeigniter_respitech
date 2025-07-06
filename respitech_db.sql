-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 04:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `respitech_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `state_id` int(11) DEFAULT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `is_active`, `is_delete`) VALUES
(1, 'Visakhapatnam', 1, 'Active', 'N'),
(2, 'Vijayawada', 1, 'Active', 'N'),
(3, 'Guntur', 1, 'Active', 'N'),
(4, 'Nellore', 1, 'Active', 'N'),
(5, 'Itanagar', 2, 'Active', 'N'),
(6, 'Tawang', 2, 'Active', 'N'),
(7, 'Ziro', 2, 'Active', 'N'),
(8, 'Bomdila', 2, 'Active', 'N'),
(9, 'Guwahati', 3, 'Active', 'N'),
(10, 'Silchar', 3, 'Active', 'N'),
(11, 'Dibrugarh', 3, 'Active', 'N'),
(12, 'Jorhat', 3, 'Active', 'N'),
(13, 'Patna', 4, 'Active', 'N'),
(14, 'Gaya', 4, 'Active', 'N'),
(15, 'Bhagalpur', 4, 'Active', 'N'),
(16, 'Muzaffarpur', 4, 'Active', 'N'),
(17, 'Raipur', 5, 'Active', 'N'),
(18, 'Bhilai', 5, 'Active', 'N'),
(19, 'Bilaspur', 5, 'Active', 'N'),
(20, 'Korba', 5, 'Active', 'N'),
(21, 'Panaji', 6, 'Active', 'N'),
(22, 'Margao', 6, 'Active', 'N'),
(23, 'Vasco da Gama', 6, 'Active', 'N'),
(24, 'Mapusa', 6, 'Active', 'N'),
(25, 'Ahmedabad', 7, 'Active', 'N'),
(26, 'Surat', 7, 'Active', 'N'),
(27, 'Vadodara', 7, 'Active', 'N'),
(28, 'Rajkot', 7, 'Active', 'N'),
(29, 'Gurugram', 8, 'Active', 'N'),
(30, 'Faridabad', 8, 'Active', 'N'),
(31, 'Panipat', 8, 'Active', 'N'),
(32, 'Ambala', 8, 'Active', 'N'),
(33, 'Shimla', 9, 'Active', 'N'),
(34, 'Manali', 9, 'Active', 'N'),
(35, 'Dharamshala', 9, 'Active', 'N'),
(36, 'Kullu', 9, 'Active', 'N'),
(37, 'Ranchi', 10, 'Active', 'N'),
(38, 'Jamshedpur', 10, 'Active', 'N'),
(39, 'Dhanbad', 10, 'Active', 'N'),
(40, 'Bokaro', 10, 'Active', 'N'),
(41, 'Bengaluru', 11, 'Active', 'N'),
(42, 'Mysuru', 11, 'Active', 'N'),
(43, 'Mangaluru', 11, 'Active', 'N'),
(44, 'Hubli', 11, 'Active', 'N'),
(45, 'Thiruvananthapuram', 12, 'Active', 'N'),
(46, 'Kochi', 12, 'Active', 'N'),
(47, 'Kozhikode', 12, 'Active', 'N'),
(48, 'Kannur', 12, 'Active', 'N'),
(49, 'Bhopal', 13, 'Active', 'N'),
(50, 'Indore', 13, 'Active', 'N'),
(51, 'Gwalior', 13, 'Active', 'N'),
(52, 'Jabalpur', 13, 'Active', 'N'),
(53, 'Mumbai', 14, 'Active', 'N'),
(54, 'Pune', 14, 'Active', 'N'),
(55, 'Nagpur', 14, 'Active', 'N'),
(56, 'Nashik', 14, 'Active', 'N'),
(57, 'Imphal', 15, 'Active', 'N'),
(58, 'Churachandpur', 15, 'Active', 'N'),
(59, 'Thoubal', 15, 'Active', 'N'),
(60, 'Bishnupur', 15, 'Active', 'N'),
(61, 'Shillong', 16, 'Active', 'N'),
(62, 'Tura', 16, 'Active', 'N'),
(63, 'Jowai', 16, 'Active', 'N'),
(64, 'Aizawl', 17, 'Active', 'N'),
(65, 'Lunglei', 17, 'Active', 'N'),
(66, 'Serchhip', 17, 'Active', 'N'),
(67, 'Kohima', 18, 'Active', 'N'),
(68, 'Dimapur', 18, 'Active', 'N'),
(69, 'Mokokchung', 18, 'Active', 'N'),
(70, 'Bhubaneswar', 19, 'Active', 'N'),
(71, 'Cuttack', 19, 'Active', 'N'),
(72, 'Rourkela', 19, 'Active', 'N'),
(73, 'Amritsar', 20, 'Active', 'N'),
(74, 'Ludhiana', 20, 'Active', 'N'),
(75, 'Jalandhar', 20, 'Active', 'N'),
(76, 'Jaipur', 21, 'Active', 'N'),
(77, 'Udaipur', 21, 'Active', 'N'),
(78, 'Jodhpur', 21, 'Active', 'N'),
(79, 'Gangtok', 22, 'Active', 'N'),
(80, 'Namchi', 22, 'Active', 'N'),
(81, 'Gyalshing', 22, 'Active', 'N'),
(82, 'Chennai', 23, 'Active', 'N'),
(83, 'Coimbatore', 23, 'Active', 'N'),
(84, 'Madurai', 23, 'Active', 'N'),
(85, 'Hyderabad', 24, 'Active', 'N'),
(86, 'Warangal', 24, 'Active', 'N'),
(87, 'Nizamabad', 24, 'Active', 'N'),
(88, 'Agartala', 25, 'Active', 'N'),
(89, 'Udaipur', 25, 'Active', 'N'),
(90, 'Dharmanagar', 25, 'Active', 'N'),
(91, 'Lucknow', 26, 'Active', 'N'),
(92, 'Kanpur', 26, 'Active', 'N'),
(93, 'Varanasi', 26, 'Active', 'N'),
(94, 'Dehradun', 27, 'Active', 'N'),
(95, 'Haridwar', 27, 'Active', 'N'),
(96, 'Nainital', 27, 'Active', 'N'),
(97, 'Kolkata', 28, 'Active', 'N'),
(98, 'Darjeeling', 28, 'Active', 'N'),
(99, 'Asansol', 28, 'Active', 'N'),
(100, 'Port Blair', 29, 'Active', 'N'),
(101, 'Chandigarh', 30, 'Active', 'N'),
(102, 'Daman', 31, 'Active', 'N'),
(103, 'Silvassa', 31, 'Active', 'N'),
(104, 'Kavaratti', 32, 'Active', 'N'),
(105, 'New Delhi', 33, 'Active', 'N'),
(106, 'Puducherry', 34, 'Active', 'N'),
(107, 'Karaikal', 34, 'Active', 'N'),
(108, 'Mahe', 34, 'Active', 'N'),
(109, 'Howrah', 28, 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `is_active`, `is_delete`) VALUES
(1, 'Andhra Pradesh', 'Active', 'N'),
(2, 'Arunachal Pradesh', 'Active', 'N'),
(3, 'Assam', 'Active', 'N'),
(4, 'Bihar', 'Active', 'N'),
(5, 'Chhattisgarh', 'Active', 'N'),
(6, 'Goa', 'Active', 'N'),
(7, 'Gujarat', 'Active', 'N'),
(8, 'Haryana', 'Active', 'N'),
(9, 'Himachal Pradesh', 'Active', 'N'),
(10, 'Jharkhand', 'Active', 'N'),
(11, 'Karnataka', 'Active', 'N'),
(12, 'Kerala', 'Active', 'N'),
(13, 'Madhya Pradesh', 'Active', 'N'),
(14, 'Maharashtra', 'Active', 'N'),
(15, 'Manipur', 'Active', 'N'),
(16, 'Meghalaya', 'Active', 'N'),
(17, 'Mizoram', 'Active', 'N'),
(18, 'Nagaland', 'Active', 'N'),
(19, 'Odisha', 'Active', 'N'),
(20, 'Punjab', 'Active', 'N'),
(21, 'Rajasthan', 'Active', 'N'),
(22, 'Sikkim', 'Active', 'N'),
(23, 'Tamil Nadu', 'Active', 'N'),
(24, 'Telangana', 'Active', 'N'),
(25, 'Tripura', 'Active', 'N'),
(26, 'Uttar Pradesh', 'Active', 'N'),
(27, 'Uttarakhand', 'Active', 'N'),
(28, 'West Bengal', 'Active', 'N'),
(29, 'Andaman and Nicobar Islands', 'Active', 'N'),
(30, 'Chandigarh', 'Active', 'N'),
(31, 'Dadra and Nagar Haveli and Daman and Diu', 'Active', 'N'),
(32, 'Lakshadweep', 'Active', 'N'),
(33, 'Delhi', 'Active', 'N'),
(34, 'Puducherry', 'Active', 'N'),
(35, 'Ladakh', 'Active', 'N'),
(36, 'Jammu and Kashmir', 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `uniqcode` varchar(30) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `uniqcode`, `email_id`, `password`) VALUES
(1, 'adminallerIkg7BhjO0MFdpsr852ln', 'admin@gmail.com', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_allsearch`
--

CREATE TABLE `tbl_allsearch` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `banner_name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`id`, `banner_name`, `images`, `is_active`, `is_delete`) VALUES
(1, 'test', '', 'Active', 'Y'),
(2, 'bvbvbv', '548105713Screenshot (858).png', 'Active', 'Y'),
(3, 'bvbvbvbv', '2020382674Screenshot (862).png', 'Active', 'Y'),
(4, 'Respitech Banner', '', 'Inactive', 'Y'),
(5, 'banner3', '972955590banner3.jpg', 'Active', 'N'),
(6, 'banner', '18667326banner1.jpg', 'Active', 'N'),
(7, '', '1457070809banner2.jpg', 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berlin_question`
--

CREATE TABLE `tbl_berlin_question` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `bmi` varchar(255) DEFAULT NULL,
  `bmi_category` varchar(255) DEFAULT NULL,
  `who_are_you` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `do_you_store` longtext DEFAULT NULL,
  `how_often_snore` longtext DEFAULT NULL,
  `has_your_snoring_evar` longtext DEFAULT NULL,
  `has_any_one_noticed` longtext DEFAULT NULL,
  `how_often_do_you_feel` longtext DEFAULT NULL,
  `during_your_waking_time` longtext DEFAULT NULL,
  `how_offen_does_this_occur` longtext DEFAULT NULL,
  `do_you_have_hign_blood_pressure` longtext DEFAULT NULL,
  `hao_you_evar_nodded_off` longtext DEFAULT NULL,
  `do_you_have_hign_blood_sugar` longtext DEFAULT NULL,
  `do_you_have_smoke` longtext DEFAULT NULL,
  `do_you_have_drink_alcohol` longtext DEFAULT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_berlin_question`
--

INSERT INTO `tbl_berlin_question` (`id`, `first_name`, `last_name`, `height`, `weight`, `age`, `gender`, `bmi`, `bmi_category`, `who_are_you`, `state`, `city`, `do_you_store`, `how_often_snore`, `has_your_snoring_evar`, `has_any_one_noticed`, `how_often_do_you_feel`, `during_your_waking_time`, `how_offen_does_this_occur`, `do_you_have_hign_blood_pressure`, `hao_you_evar_nodded_off`, `do_you_have_hign_blood_sugar`, `do_you_have_smoke`, `do_you_have_drink_alcohol`, `is_active`, `is_delete`) VALUES
(1, 'swapan', 'kanrar', '7', '40', '20', 'Male', '8163.2653061224', 'Obesity', 'Self', '28', '97', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"c. Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(2, 'swapan', 'kanrar', '5', '70', '29', 'Male', '28000', 'Obesity', 'Self', '28', '97', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, NULL, '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(3, 'surjya', 'test', '4', '5', '45', 'Male', '3125', 'Obesity', 'Self', '8', '29', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\",\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\",\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\",\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(4, 'Abbas', 'uddin', '174', '87', '29', 'Male', '28.735632183908', 'Overweight', 'Self', '28', '97', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"B. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(5, 'swapan', 'kanrar', '5', '70', '20', 'Male', '28000', 'Obesity', 'Self', '28', '97', NULL, '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(6, 'Jayantth', 'Kumar', '171', '78', '47', 'Male', '26.674874320304', 'Overweight', 'Family Member', '28', '97', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(7, 'JAYANTH', 'ADAPA', '160', '60', '40', 'Male', '23.4375', 'Normal weight', 'Family Member', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"Don\'t know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(8, 'Tia', 'M Saha', '521', '70', '45', 'Female', '2.5788292851854', 'Underweight', 'Self', '28', '97', NULL, '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(9, 'Tia', 'M Saha', '521', '70', '45', 'Female', '2.5788292851854', 'Underweight', 'Self', '28', '97', NULL, '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(10, 'Tia', 'M Saha', '521', '70', '45', 'Female', '2.5788292851854', 'Underweight', 'Self', '28', '97', NULL, '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(11, 'Abbas', 'Uddin', '173', '87', '29', 'Male', '29.06879615089', 'Overweight', 'Self', '28', '97', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(12, 'Tia', 'M Saha', '521', '70', '45', 'Male', '2.5788292851854', 'Underweight', 'Family Member', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Don\'t know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(13, 'Tia', 'M Saha', '521', '70', '45', 'Male', '2.5788292851854', 'Underweight', 'Friends', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(14, 'Tia', 'M Saha', '521', '70', '45', 'Male', '2.5788292851854', 'Underweight', 'Friends', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(15, 'Tia', 'M Saha', '521', '70', '45', 'Male', '2.5788292851854', 'Underweight', 'Friends', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Don\'t know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(16, 'JAYANTH', 'ADAPA', '170', '60', '40', 'Male', '20.76124567474', 'Normal weight', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(17, 'Abbas', 'Uddin', '173', '25', '19', 'Male', '8.3531023422099', 'Underweight', 'Self', '1', '1', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(18, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156.25', 'Obesity', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(19, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156.25', 'Obesity', 'Self', '28', '97', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(20, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156.25', 'Obesity', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(21, 'swapan', 'kanrar', '5', '5', '5', 'Male', '2000', 'Obesity', 'Self', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(22, 'swapan', 'kanrar', '5', '5', '5', 'Male', '2000', 'Obesity', 'Self', '28', '97', NULL, '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(23, 'swapan', 'kanrar', '7', '70', '20', 'Male', '14285.714285714', 'Obesity', 'Self', '28', '97', NULL, '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"b. 3-4 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 3-4 \\u092c\\u093e\\u0930)\"]', '[\"d. 1-2 times a month (\\u092e\\u0939\\u0940\\u0928\\u0947 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(24, 'swapan', 'kanrar', '7', '70', '20', 'Male', '14285.714285714', 'Obesity', 'Self', '28', '97', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(25, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156', 'Obesity', 'Family Member', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(26, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156', 'Obesity', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(27, 'RUTWK SUNDAR', 'ADAPA', '50', '30', '12', 'Male', '120', 'Obesity', 'Self', '28', '109', NULL, '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(28, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156', 'Obesity', 'Self', '28', '109', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(29, 'RUTWK SUNDAR', 'ADAPA', '40', '25', '9', 'Male', '156', 'Obesity', 'Self', '28', '109', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(30, 'sad', 'sads', '3', '3', '3', 'Male', '3333', 'Obesity', 'Self', '8', '30', NULL, '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', '[\"c. Don\'t Know (\\u092a\\u0924\\u093e \\u0928\\u0939\\u0940\\u0902)\"]', '[\"a. Nearly every day (\\u0932\\u0917\\u092d\\u0917 \\u0939\\u0930 \\u0926\\u093f\\u0928)\"]', '[\"c. 1-2 times a week (\\u0938\\u092a\\u094d\\u0924\\u093e\\u0939 \\u092e\\u0947\\u0902 1-2 \\u092c\\u093e\\u0930)\"]', NULL, NULL, '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"a. Yes(\\u0939\\u093e\\u0901)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', '[\"Yes (\\u0939\\u093e\\u0901)\"]', 'Active', 'N'),
(31, 'Amit', 'Agarwal', '172', '82', '48', 'Male', '28', 'Overweight', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(32, 'Amit', 'Agarwal', '172', '60', '48', 'Male', '20', 'Normal weight', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(33, 'Amit', 'Agarwal', '172', '60', '48', 'Male', '20', 'Normal weight', 'Self', '28', '97', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N'),
(34, 'Amit', 'Agarwal', '172', '60', '48', 'Male', '20', 'Normal weight', 'Family Member', '28', '99', NULL, '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Near or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', '[\"e. Never or nearly never (\\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902 \\u092f\\u093e \\u0932\\u0917\\u092d\\u0917 \\u0915\\u092d\\u0940 \\u0928\\u0939\\u0940\\u0902)\"]', NULL, NULL, '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"b. No(\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', '[\"No (\\u0928\\u0939\\u0940\\u0902)\"]', 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buyer`
--

CREATE TABLE `tbl_buyer` (
  `id` int(11) NOT NULL,
  `buyer_code` varchar(255) NOT NULL,
  `buyer_name` varchar(100) NOT NULL,
  `buyer_address` varchar(255) NOT NULL,
  `buyer_phoneno` varchar(100) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `status` enum('Admin','Vendor') NOT NULL DEFAULT 'Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_buyer`
--

INSERT INTO `tbl_buyer` (`id`, `buyer_code`, `buyer_name`, `buyer_address`, `buyer_phoneno`, `email_id`, `password`, `pincode`, `status`) VALUES
(1, 'Gou001', 'Gourab Sau', 'Amta,Howrha', '9985214756', '', '', '', 'Admin'),
(4, 'Ami003', 'Amit Roy', 'kolkata', '9732954177', '', '', '', 'Admin'),
(5, 'Sum004', 'Suman Dhara', 'Amta,Howrh', '6523154879', '', '', '', 'Admin'),
(6, 'Apu005', 'Apurbo Das', '', '9732954175', 'apurbodas@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'Vendor'),
(7, 'Abh006', 'Abhishek Ghosh', '', '8001103498', 'abhi@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '', 'Vendor'),
(11, 'Aka007', 'Akash Sau', 'Lacktown,K', '9854216359', '', '', '', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_byuerproduct`
--

CREATE TABLE `tbl_byuerproduct` (
  `id` int(11) NOT NULL,
  `buyer_id` varchar(50) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_bye_rate` int(11) NOT NULL,
  `bye_qty` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `month` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(100) NOT NULL,
  `quentity` varchar(50) NOT NULL,
  `seller_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_image`, `category_description`) VALUES
(13, 'CPAP - Continuous Positive Airway Pressure', '127586222service1_img.jpg', 'CPAP - Continuous Positive Airway Pressure'),
(14, 'BiPAP - Bi level Positive Air Pressure', '355970887service2_img.jpg', 'BiPAP - Bi level Positive Air Pressure'),
(16, 'VENTILATOR', '2028636958service3_img.jpg', 'VENTILATOR'),
(17, 'Oxygen Concentrators', '432519652574791139Oxygen Con.png', 'Low-maintenance, low- cost concentrator for stationary use, It is light-weight, portable concentrators with eight-hour battery life.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_copd_consultancy`
--

CREATE TABLE `tbl_copd_consultancy` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `consultation` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `product_id` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_copd_consultancy`
--

INSERT INTO `tbl_copd_consultancy` (`id`, `name`, `patient_name`, `gender`, `dob`, `mobile`, `consultation`, `category_id`, `category_name`, `product_id`, `product_name`, `images`, `date`, `is_active`, `is_delete`) VALUES
(1, 'Mr.', 'swapan kanrar', 'Male', '2024-07-03', '7003999806', 'COPD', '14', 'BiPAP - Bi level Positive Air Pressure', '19', 'abc', '', '03-07-2024', 'Active', 'N'),
(2, 'Mrs.', 'swapan kanrar', 'Female', '2024-07-03', '7003999806', 'OSA', '', NULL, '', NULL, '', '03-07-2024', 'Active', 'N'),
(3, 'Mr.', 'Amit Sharma', 'Male', '1984-02-11', '7004745326', 'OSA', '', NULL, '', NULL, '', '05-08-2024', 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `specialist` varchar(255) NOT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`id`, `name`, `email`, `mobile`, `hospital_name`, `specialist`, `is_active`, `is_delete`) VALUES
(1, 'aaaa', 'aaa@gmail.com', '7003999806', 'vfvxvczxcxcgfgfdgfdg', 'xvxcvcxvcx', 'Active', 'Y'),
(2, 'aaaa', 'aaa@gmail.com', '7887876789', 'sssss', 'sssssb', 'Active', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `bill_name` varchar(150) DEFAULT NULL,
  `bill_mobile` varchar(50) DEFAULT NULL,
  `bill_company` varchar(100) DEFAULT NULL,
  `bill_country` varchar(50) DEFAULT NULL,
  `bill_street` varchar(255) DEFAULT NULL,
  `bill_state` varchar(100) DEFAULT NULL,
  `bill_zip` varchar(50) DEFAULT NULL,
  `bill_email` varchar(50) DEFAULT NULL,
  `deli_name` varchar(150) DEFAULT NULL,
  `deli_mobile` varchar(50) DEFAULT NULL,
  `deli_company` varchar(100) DEFAULT NULL,
  `deli_street` varchar(255) DEFAULT NULL,
  `deli_town` varchar(100) DEFAULT NULL,
  `deli_state` varchar(100) DEFAULT NULL,
  `deli_zip` varchar(50) DEFAULT NULL,
  `deli_email` varchar(50) DEFAULT NULL,
  `product_id` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_qty` varchar(50) DEFAULT NULL,
  `product_sale_price` varchar(100) DEFAULT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `delivery_status` varchar(100) DEFAULT NULL,
  `order_date` varchar(150) DEFAULT NULL,
  `tranction_id` varchar(150) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `qrcode` varchar(255) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `screen_short` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_id`, `invoice_no`, `user_id`, `bill_name`, `bill_mobile`, `bill_company`, `bill_country`, `bill_street`, `bill_state`, `bill_zip`, `bill_email`, `deli_name`, `deli_mobile`, `deli_company`, `deli_street`, `deli_town`, `deli_state`, `deli_zip`, `deli_email`, `product_id`, `product_name`, `product_qty`, `product_sale_price`, `payment_method`, `payment_status`, `delivery_status`, `order_date`, `tranction_id`, `delivery_date`, `qrcode`, `product_code`, `screen_short`) VALUES
(1, '01', '00001', '13', 'Swapan', '700399980', 'tttt', 'India', '15/1 russa road 3rd lane', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', 'Swapan', '700399980', 'tttt', '15/1 russa road 3rd lane', 'Howrah', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', '4', 'SHAW AGENCY NATRAJ 621 BOLD HB WRITING PENCILS Pencil', '2', '80', 'COD', 'Unpaid', 'Ordered', '2024-06-15', '15877', NULL, '00001.png', '#004', NULL),
(2, '02', '00002', 'Guest02', 'swapan kanrar', '07003999806', 'tttt', 'India', '15/1 russa road 3rd lane', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', 'swapan kanrar', '07003999806', 'tttt', '15/1 russa road 3rd lane', 'Howrah', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', '19', NULL, '1', '31000', 'COD', 'Unpaid', 'Ordered', '2024-08-01', '9376', NULL, '00002.png', 'PROD-0001', NULL),
(3, '03', '00003', 'Guest03', 'swapan kanrar', '07003999806', 'dev test', 'India', '15/1 russa road 3rd lane', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', 'swapan kanrar', '07003999806', 'dev test', '15/1 russa road 3rd lane', 'Howrah', 'West Bengal', '711412', 'swapan.kanrar143@gmail.com', '19', NULL, '1', '31000', 'ONLINE', 'Paid', 'Ordered', '2024-08-19', '14391', NULL, '00003.png', 'PROD-0001', '418608676acc-img-1.png'),
(4, '04', '00004', 'Guest04', 'JAYANTH KUMAR ADAPA', '09903622668', '', 'India', '104 National Place', 'West Bengal', '711110', 'jayantthkumar@gmail.com', '', '', '', '', '', '', '', '', '19', NULL, '1', '31000', 'COD', 'Unpaid', 'Ordered', '2024-11-15', '30098', NULL, '00004.png', 'PROD-0001', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_osa_sleep_test`
--

CREATE TABLE `tbl_osa_sleep_test` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `reffered_form` varchar(255) DEFAULT NULL,
  `land_mark` varchar(255) DEFAULT NULL,
  `time_preference` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_osa_sleep_test`
--

INSERT INTO `tbl_osa_sleep_test` (`id`, `name`, `patient_name`, `gender`, `dob`, `mobile`, `email`, `reffered_form`, `land_mark`, `time_preference`, `state`, `city`, `address`, `images`, `date`, `is_active`, `is_delete`) VALUES
(1, '457966382acc-img-1.png', 'swapan kanrar', 'Male', '2024-06-30', '07003999806', 'swapan.kanrar143@gmail.com', 'test', 'fccfvcvc', 'Male', NULL, NULL, '15/1 russa road 3rd lane', '457966382acc-img-1.png', '30-06-2024', 'Active', 'N'),
(2, 'Mrs.', 'swapan kanrar', 'Male', '2024-06-20', '07003999806', 'swapan.kanrar143@gmail.com', 'test', 'fccfvcvc', 'Transgender', NULL, NULL, '15/1 russa road 3rd lane', '1238459784ins_back.png', '30-06-2024', 'Active', 'N'),
(3, 'Mr.', 'swapan kanrar', 'Male', '2024-07-04', '07003999806', 'swapan.kanrar143@gmail.com', 'test', 'fccfvcvc', 'Female', NULL, NULL, '15/1 russa road 3rd lane', '218307711ins.png', '04-07-2024', 'Active', 'N'),
(4, 'Mr.', 'amrendra', 'Male', '1985-06-28', '9709159756', 'singhamrendra28@gmail.com', 'Dr Suprova', 'housing colony', 'Transgender', NULL, NULL, 'Bariatu housing colony, chick mick house , sanskriti vihar road no 3 , room no 201', '', '11-09-2024', 'Active', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privacy_policy`
--

CREATE TABLE `tbl_privacy_policy` (
  `id` int(11) NOT NULL,
  `privacy_policy` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_privacy_policy`
--

INSERT INTO `tbl_privacy_policy` (`id`, `privacy_policy`) VALUES
(1, '<p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>\r\n\r\n<p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.&nbsp;</p>\r\n\r\n<div>\r\n<p>Interpretation and Definitions</p>\r\n</div>\r\n\r\n<h2>Interpretation</h2>\r\n\r\n<p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>\r\n\r\n<h2>Definitions</h2>\r\n\r\n<p>For the purposes of this Privacy Policy:</p>\r\n\r\n<p><strong>Account</strong> means a unique account created for You to access our Service or parts of our Service.</p>\r\n\r\n<p><strong>Affiliate</strong> means an entity that controls, is controlled by or is under common control with a party, where &quot;control&quot; means ownership of 50% or more of the shares, equity interest or other securities entitled to vote for election of directors or other managing authority.</p>\r\n\r\n<p><strong>Application</strong> refers to Wonder Brochure, the software program provided by the Company.</p>\r\n\r\n<p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot; or &quot;Our&quot; in this Agreement) refers to Dhannita Institute of Leadership, Room-902, 33 C R Avenue, Kolkata 700012.</p>\r\n\r\n<p><strong>Country</strong> refers to: West Bengal, India</p>\r\n\r\n<p><strong>Device</strong> means any device that can access the Service such as a computer, a cellphone or a digital tablet.</p>\r\n\r\n<p><strong>Personal Data</strong> is any information that relates to an identified or identifiable individual.</p>\r\n\r\n<p><strong>Service</strong> refers to the Application.</p>\r\n\r\n<p><strong>Service Provider</strong> means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.</p>\r\n\r\n<p><strong>Usage Data</strong> refers to data collected automatically, either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>\r\n\r\n<p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>\r\n\r\n<div>\r\n<p>Collecting and Using Your Personal Data</p>\r\n</div>\r\n\r\n<h2>Types of Data Collected</h2>\r\n\r\n<h3>Personal Data</h3>\r\n\r\n<p>While using Our Service, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:</p>\r\n\r\n<p>Email address</p>\r\n\r\n<p>First name and last name</p>\r\n\r\n<p>Phone number</p>\r\n\r\n<p>Address, State, Province, ZIP/Postal code, City</p>\r\n\r\n<p>Usage Data</p>\r\n\r\n<h3>Usage Data</h3>\r\n\r\n<p>Usage Data is collected automatically when using the Service.</p>\r\n\r\n<p>Usage Data may include information such as Your Device&#39;s Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p>When You access the Service by or through a mobile device, We may collect certain information automatically, including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique device identifiers and other diagnostic data.</p>\r\n\r\n<p>We may also collect information that Your browser sends whenever You visit our Service or when You access the Service by or through a mobile device.</p>\r\n\r\n<h3>Information Collected while Using the Application</h3>\r\n\r\n<p>While using Our Application, in order to provide features of Our Application, We may collect, with Your prior permission:</p>\r\n\r\n<p>&middot; Information regarding your location</p>\r\n\r\n<p>We use this information to provide features of Our Service, to improve and customize Our Service. The information may be uploaded to the Company&#39;s servers and/or a Service Provider&#39;s server or it may be simply stored on Your device.</p>\r\n\r\n<p>You can enable or disable access to this information at any time, through Your Device settings.</p>\r\n\r\n<h2>Use of Your Personal Data</h2>\r\n\r\n<p>The Company may use Personal Data for the following purposes:</p>\r\n\r\n<p><strong>To provide and maintain our Service</strong>, including to monitor the usage of our Service.</p>\r\n\r\n<p><strong>To manage Your Account:</strong> to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.</p>\r\n\r\n<p><strong>For the performance of a contract:</strong> the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.</p>\r\n\r\n<p><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application&#39;s push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.</p>\r\n\r\n<p><strong>To provide You</strong> with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.</p>\r\n\r\n<p><strong>To manage Your requests:</strong> To attend and manage Your requests to Us.</p>\r\n\r\n<p><strong>For business transfers:</strong> We may use Your information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of Our assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by Us about our Service users is among the assets transferred.</p>\r\n\r\n<p><strong>For other purposes</strong>: We may use Your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Service, products, services, marketing and your experience.</p>\r\n\r\n<p>We may share Your personal information in the following situations:</p>\r\n\r\n<p>&middot; <strong>With Service Providers:</strong> We may share Your personal information with Service Providers to monitor and analyze the use of our Service, to contact You.</p>\r\n\r\n<p>&middot; <strong>For business transfers:</strong> We may share or transfer Your personal information in connection with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a portion of Our business to another company.</p>\r\n\r\n<p>&middot; <strong>With Affiliates:</strong> We may share Your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other subsidiaries, joint venture partners or other companies that We control or that are under common control with Us.</p>\r\n\r\n<p>&middot; <strong>With business partners:</strong> We may share Your information with Our business partners to offer You certain products, services or promotions.</p>\r\n\r\n<p>&middot; <strong>With other users:</strong> when You share personal information or otherwise interact in the public areas with other users, such information may be viewed by all users and may be publicly distributed outside.</p>\r\n\r\n<p>&middot; <strong>With Your consent</strong>: We may disclose Your personal information for any other purpose with Your consent.</p>\r\n\r\n<h2>Retention of Your Personal Data</h2>\r\n\r\n<p>The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>\r\n\r\n<p>The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of Our Service, or We are legally obligated to retain this data for longer time periods.</p>\r\n\r\n<h2>Transfer of Your Personal Data</h2>\r\n\r\n<p>Your information, including Personal Data, is processed at the Company&#39;s operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to &mdash; and maintained on &mdash; computers located outside of Your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.</p>\r\n\r\n<p>Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to that transfer.</p>\r\n\r\n<p>The Company will take all steps reasonably necessary to ensure that Your data is treated securely and in accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of Your data and other personal information.</p>\r\n\r\n<h2>Delete Your Personal Data</h2>\r\n\r\n<p>You have the right to delete or request that We assist in deleting the Personal Data that We have collected about You.</p>\r\n\r\n<p>Our Service may give You the ability to delete certain information about You from within the Service.</p>\r\n\r\n<p>You may update, amend, or delete Your information at any time by signing in to Your Account, if you have one, and visiting the account settings section that allows you to manage Your personal information. You may also contact Us to request access to, correct, or delete any personal information that You have provided to Us.</p>\r\n\r\n<p>Please note, however, that We may need to retain certain information when we have a legal obligation or lawful basis to do so.</p>\r\n\r\n<h2>Disclosure of Your Personal Data</h2>\r\n\r\n<h3>Business Transactions</h3>\r\n\r\n<p>If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be transferred. We will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy Policy.</p>\r\n\r\n<h3>Law enforcement</h3>\r\n\r\n<p>Under certain circumstances, the Company may be required to disclose Your Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).</p>\r\n\r\n<h3>Other legal requirements</h3>\r\n\r\n<p>The Company may disclose Your Personal Data in the good faith belief that such action is necessary to:</p>\r\n\r\n<p>&middot; Comply with a legal obligation</p>\r\n\r\n<p>&middot; Protect and defend the rights or property of the Company</p>\r\n\r\n<p>&middot; Prevent or investigate possible wrongdoing in connection with the Service</p>\r\n\r\n<p>&middot; Protect the personal safety of Users of the Service or the public</p>\r\n\r\n<p>&middot; Protect against legal liability</p>\r\n\r\n<h2>Security of Your Personal Data</h2>\r\n\r\n<p>The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.</p>\r\n\r\n<div>\r\n<p>Children&#39;s Privacy</p>\r\n</div>\r\n\r\n<p>Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us. If We become aware that We have collected Personal Data from anyone under the age of 13 without verification of parental consent, We take steps to remove that information from Our servers.</p>\r\n\r\n<p>If We need to rely on consent as a legal basis for processing Your information and Your country requires consent from a parent, We may require Your parent&#39;s consent before We collect and use that information.</p>\r\n\r\n<div>\r\n<p>Links to Other Websites</p>\r\n</div>\r\n\r\n<p>Our Service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party&#39;s site. We strongly advise You to review the Privacy Policy of every site You visit.</p>\r\n\r\n<p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>\r\n\r\n<div>\r\n<p>Changes to this Privacy Policy</p>\r\n</div>\r\n\r\n<p>We may update Our Privacy Policy from time to time. We will notify You of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p>We will let You know via email and/or a prominent notice on Our Service, prior to the change becoming effective and update the &quot;Last updated&quot; date at the top of this Privacy Policy.</p>\r\n\r\n<p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>\r\n\r\n<div>\r\n<p>Contact Us</p>\r\n</div>\r\n\r\n<p>If you have any questions about this Privacy Policy, You can contact us:</p>\r\n\r\n<p>&middot; By email: bongtech.solution@gmail.com</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `recommended_id` int(11) DEFAULT NULL,
  `catgegory_id` varchar(50) DEFAULT NULL,
  `subcategory_id` varchar(50) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_description` longtext DEFAULT NULL,
  `sel_product_rate` varchar(100) DEFAULT NULL,
  `product_discount` varchar(50) DEFAULT NULL,
  `product_discount_rate` int(11) DEFAULT NULL,
  `best_sale` varchar(50) DEFAULT NULL,
  `product_info_image` text DEFAULT NULL,
  `product_info_image_type` varchar(250) DEFAULT NULL,
  `product_description_info` text DEFAULT NULL,
  `is_rent` enum('Yes','No') DEFAULT 'No',
  `rent_type` enum('monthly','yearly') DEFAULT NULL,
  `rent_price` varchar(255) DEFAULT NULL,
  `rent_dese` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_code`, `product_slug`, `recommended_id`, `catgegory_id`, `subcategory_id`, `product_name`, `product_description`, `sel_product_rate`, `product_discount`, `product_discount_rate`, `best_sale`, `product_info_image`, `product_info_image_type`, `product_description_info`, `is_rent`, `rent_type`, `rent_price`, `rent_dese`) VALUES
(19, 'PROD-0001', 'airstart-1', NULL, '13', '', 'AirStart 10 APAP ', 'AirStart™ 10 APAP auto-adjusting positive airway pressure (APAP) therapy device. Part of ResMed Air Solutions, it offers \r\nexcellent value for those seeking an APAP device that’s simple to set up and use.\r\nBuilt-in humidification\r\n\r\nHeated humidification may help reduce the common side effects of therapy, such as nasal congestion and a dry nose or throat, to deliver even more comfort during the night.Every AirStart 10 therapy device comes with a built-in HumidAir™ humidifier, so your patients can enjoy all the benefits of humidification in one out-of-the-box solution. The humidifier tub is also intuitive to use and manage making humidification easy and accessible for more patients.', '40300', '30', 31000, '', NULL, NULL, 'Other features \r\n\r\n- Therapy made easy. The AirStart 10 APAP therapy device is designed to be intuitive and easy-to-use. With no complicated menus or \r\n   settings to navigate, patients can simply plug in the device and press Start.\r\n\r\n- Excellent value. With out-of-the-box simplicity, AirStart 10 devices give you excellent value on the latest technology platform.\r\n\r\n', 'No', NULL, NULL, NULL),
(20, 'PROD-0002', 'airsesnse', NULL, '13', '', 'AirSense 10 APAP (Auto Set)', 'The AirSense™ 10 AutoSet CPAP Machine with HumidAir™ Heated Humidifier builds on the reliable and advanced features of the S9 line of machines by ResMed adding a built-in HumidAir™ humidifier in a sleek design that is 23% lighter.\r\n\r\nAirSense™ 10 AutoSet CPAP Machine with HumidAir™ Heated Humidifier combines the proven technology of the AutoSet algorithm with the integrated comfort of the Optional ClimateLineAir Heated Tube. This is an auto-titrating CPAP machine that adjusts the pressure on a breath by breath basis to deliver the minimal pressure needed to maintain the airway.\r\n\r\n', '83850', '30', 64500, '', '1720898150images1.jpg', 'image', 'Key Features : \r\n\r\n- AutoSet Algorithm\r\n- Built-In HumidAir™ Humidifier\r\n- ClimateLineAir™ Heated Tube\r\n- Expiratory Pressure Relief (EPR™)\r\n- Auto Features\r\n- My Options Color LCD Display\r\n- Light Sensor\r\n- Advanced-Data\r\n- Free support app called MyAir (wireless connectivity through cloud) \r\n', 'No', NULL, NULL, NULL),
(21, 'PROD-0003', 'airmini', NULL, '13', NULL, 'AirMini™ AutoSet™', 'The AirMini™ AutoSet™ Travel CPAP Machine is the smallest ResMed machine available today, weighing only 0.66 pounds. This small CPAP uses a small 20W power supply to further minimise the size of the travel unit. Pair the machine with the AirMini™ by ResMed smartphone app to track therapy and adjust machine settings.\r\n\r\nAirMini™ AutoSet™ Travel CPAP Machine is uniquely designed for operation with four ResMed masks. Choose your size in the AirFit™ N20, AirFit™ F20, AirTouch™ F20, or AirFit™ P10 mask, depending on the mask that offers optimal therapy. The AirMini™ runs with minimal white noise sound and offers pressure relief features such as Ramp and EPR. If pairing the device with the AirFit™ N20 or the AirFit™ P10 and their corresponding tube setups, the included waterless HumidX™ unit is the humidification option intended to help provide moisture while on the road.', '76180', '30', 58600, NULL, NULL, NULL, '', 'No', NULL, NULL, NULL),
(22, 'PROD-0004', 'aircurve-', NULL, '13', NULL, 'AirCurve 10 V Auto ', 'AirCurve 10 V Auto\r\nThe AirCurve 10 V Auto is an auto-adjusting bilevel machine that uses the comfort of both the AutoSet™ algorithm and Easy-Breathe waveform in its V Auto algorithm to treat obstructive sleep apnea patients who can benefit from greater pressure support. The AirCurve 10 V Auto adjusts the baseline pressure to hold the airway open while maintaining a fixed pressure support.Easy-Breathe technologyThe Easy-Breathe pressure waveform mimics the wave shape of normal breathing and replicates it for your breathing comfort.Climate Control Every device comes with the new HumidAir™ heated humidifier built-in, so you can enjoy the benefits of humidification in one easy-to-use system. And when used with the ClimateLineAir™ heated tube, your device has been designed to automatically deliver the optimal temperature and humidity, for a more comfortable therapy experience.', '98800', '30', 76000, NULL, NULL, NULL, '', 'No', NULL, NULL, NULL),
(23, 'PROD-0005', 'airsense', NULL, '13', NULL, 'The AirSense™ 10 AutoSet (Her)', 'The AirSense™ 10 AutoSet  Her CPAP Machine with HumidAir™ Heated Humidifier builds on the reliable and advanced features of the S9 line of machines by ResMed adding a built-in HumidAir™ humidifier in a sleek design that is 23% lighter.\r\nAirSense™ 10 AutoSet  Her CPAP Machine with HumidAir™ Heated Humidifier combines the proven technology of the AutoSet algorithm with the integrated comfort of the Optional ClimateLineAir Heated Tube. This is an auto-titrating CPAP machine that adjusts the pressure on a breath by breath basis to deliver the minimal pressure needed to maintain the airway.\r\n', '83200', '30', 64000, NULL, NULL, NULL, 'AirSense 10 AutoSet  Her Key Features\r\n\r\n- AutoSet Algorithm\r\n- Built-In HumidAir™ Humidifier\r\n- ClimateLineAir™ Heated Tube\r\n- Expiratory Pressure Relief (EPR™)\r\n- Auto Features \r\n- My Options Color LCD Display\r\n- Light Sensor\r\n- Advanced-Data\r\n', 'No', NULL, NULL, NULL),
(24, 'PROD-0006', 'lumis-100', NULL, '14', NULL, 'Lumis 100 VPAP ST Non- Invasive Ventilator', 'Lumis 100 VPAP ST Non- Invasive Ventilator\r\n\r\nThe Lumis™ 100 VPAP ST reduces the work of breathing to keep you comfortable and well-ventilated while you sleep.\r\n\r\nProduct Highlights:\r\n- Climate Control with built-in HumidAir™ humidifier delivers constant temperature and humidity levels for enhanced comfort\r\n- Enhanced Easy-Breathe motor makes for a quiet and peaceful sleep environment\r\n- Continuous leak management provides consistent pressure while maintaining synchrony between you and the machine\r\n- Upright design takes up less space and the color LCD screen is simple to use', '92040', '30', 70800, NULL, NULL, NULL, '', 'No', NULL, NULL, NULL),
(25, 'PROD-0007', 'lumis-150', NULL, '14', NULL, 'Lumis™ 150 VPAP ST Non - Invasive Ventilator', 'Lumis™ 150 VPAP ST Non- Invasive Ventilator\r\n\r\nLumis 150 ST is a non invasive ventilator designed for non dependent patients with respiratory insufficiency. Featuring ResMed\'s unique volume assurance mode - iVAPS (intelligent Volume Assured Pressure Support) - Lumis 150 VPAP ST maintains target alveolar ventilation to suit each patient\'s changing needs. Optional AutoEPAP ensures adequate EPAP is delivered to maintain an open upper airway - automatically, while an intelligent Backup Rate (iBR) encourages spontaneous breathing. Lumis 150 ST is also easy to set up and use.', '113100', '30', 87000, NULL, '1721064675lumis_150.png', 'image', 'Key Features :\r\n \r\n- iVAPS\r\n- intelligent Backup Rate (iBR)\r\n- AutoEPAP maintains upper airway patency\r\n- Vsync\r\n- TiControl\r\n- 5 Trigger and Cycle Senstivities\r\n- QuickNav for low touch therapy adjustments\r\n- Climate Control Auto for automatic humidification\r\n- Ramp and Rampdown for extra comfort.\r\n- Supported by ResScan 5.4\r\n', 'No', NULL, NULL, NULL),
(27, 'PROD-0009', 'lumi150sta', NULL, '14', NULL, 'Lumis™ 150 VPAP ST-A Non - Invasive Ventilator', 'Lumis™ 150 VPAP ST-A Non- Invasive Ventilator\r\n\r\nDesigned for non dependent patients with respiratory insufficiency or obstructive sleep apnea (OSA), Lumis 150 VPAP STA is non invasive ventilator with a set of fixed and adjustable alarms that deliver personalised ventilation. Featuring ResMed\'s unique volume assurance mode iVAPS (intelligent Volume Assured Pressure Support) Lumis 150 STA maintains target alveolar ventilation to suit each patient\'s changing needs. Together with an intelligent backup rate (iBR) and optional Auto EPAP, iVAPS continuously monitors ventilation and upper airway to help you further personalise therapy for your patients', '149500', '45', 115000, NULL, NULL, NULL, 'test', 'Yes', 'monthly', '1000', 'testttt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_productimage`
--

CREATE TABLE `tbl_productimage` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_productimage`
--

INSERT INTO `tbl_productimage` (`id`, `product_id`, `product_image`) VALUES
(25, '19', '1720117747Untitled-1.jpg'),
(26, '20', '1720118095AirSense.jpg'),
(27, '21', '1721064062airminiautoset.png'),
(28, '22', '1721064225aircurve_10.png'),
(29, '23', '1721064336theairsens_10.png'),
(30, '24', '1721064425lumis_100_VPAP.png'),
(31, '26', '1721064553lumis_150.png'),
(32, '27', '1721064960lumis_150_VPAP.png'),
(33, '25', '1721113979L150VPAP_ST-NIV.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `id` int(11) NOT NULL,
  `category_id` varchar(50) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`id`, `category_id`, `subcategory_name`) VALUES
(22, '14', 'CPAP'),
(23, '14', 'BIPAP'),
(24, '14', 'VENTILATOR');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_total_stock`
--

CREATE TABLE `tbl_total_stock` (
  `id` int(11) NOT NULL,
  `product_id` varchar(50) NOT NULL,
  `total_stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_total_stock`
--

INSERT INTO `tbl_total_stock` (`id`, `product_id`, `total_stock`) VALUES
(187, '19', -1),
(188, '20', 1),
(189, '21', 1),
(190, '22', 1),
(191, '23', 1),
(192, '24', 1),
(193, '25', 1),
(194, '26', 1),
(195, '27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `addresh` varchar(255) DEFAULT NULL,
  `password_text` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `patient_type` varchar(255) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `doctor_name` varchar(255) DEFAULT NULL,
  `is_active` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `mobile`, `addresh`, `password_text`, `password`, `patient_type`, `doctor_id`, `doctor_name`, `is_active`, `is_delete`) VALUES
(1, 'swapan kanrar', 'swapan.kanrar143@gmail.com', '07003999806', 'test', '123456', 'e10adc3949ba59abbe56e057f20f883e', 'Type one', 0, 'Other Doctor', 'Active', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_old`
--

CREATE TABLE `tbl_users_old` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users_old`
--

INSERT INTO `tbl_users_old` (`id`, `name`, `email`, `mobile_no`, `image`, `password`, `status`) VALUES
(1, 'Apurbo Das', 'apurbodas@gmail.com', '9732954177', 'usEbbg4HAprZar2sU79chnpkqRFahQ1707307608.jpg', '25d55ad283aa400af464c76d713c07ad', 'Active'),
(3, 'Gourab', 'gourab@gmail.com', '8001103497', 'us4qYUbN7EJ5S3RqA7GXzaA369bZkG1707376104.jpg', '25d55ad283aa400af464c76d713c07ad', 'Active'),
(10, 'nilu@sanu', '006nilu@gmail.com', '7001913136', '', '202cb962ac59075b964b07152d234b70', 'Active'),
(11, 'Shampa Siddha', 'shampasiddha8582@gmail.com', '8145787352', '', '202cb962ac59075b964b07152d234b70', 'Active'),
(12, 'Apurbo Das', 'apurbodas197@gmail.com', '7797142213', '', '202cb962ac59075b964b07152d234b70', 'Active'),
(13, 'Swapan', 'swapan.kanrar143@gmail.com', '700399980', '', '25d55ad283aa400af464c76d713c07ad', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('Active','Inactive','Delete') NOT NULL DEFAULT 'Active',
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`) VALUES
(1, 'vishal', 'vishal@gmail.com'),
(2, 'amit', 'amit@gmail.com'),
(3, 'Sumit', 'sumit@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_allsearch`
--
ALTER TABLE `tbl_allsearch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_berlin_question`
--
ALTER TABLE `tbl_berlin_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_buyer`
--
ALTER TABLE `tbl_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_byuerproduct`
--
ALTER TABLE `tbl_byuerproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_copd_consultancy`
--
ALTER TABLE `tbl_copd_consultancy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_osa_sleep_test`
--
ALTER TABLE `tbl_osa_sleep_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_productimage`
--
ALTER TABLE `tbl_productimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_total_stock`
--
ALTER TABLE `tbl_total_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users_old`
--
ALTER TABLE `tbl_users_old`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_allsearch`
--
ALTER TABLE `tbl_allsearch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_berlin_question`
--
ALTER TABLE `tbl_berlin_question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_buyer`
--
ALTER TABLE `tbl_buyer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_byuerproduct`
--
ALTER TABLE `tbl_byuerproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=415;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_copd_consultancy`
--
ALTER TABLE `tbl_copd_consultancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_osa_sleep_test`
--
ALTER TABLE `tbl_osa_sleep_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_privacy_policy`
--
ALTER TABLE `tbl_privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_productimage`
--
ALTER TABLE `tbl_productimage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_total_stock`
--
ALTER TABLE `tbl_total_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users_old`
--
ALTER TABLE `tbl_users_old`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
