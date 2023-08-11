-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2020 at 05:41 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nic_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_list`
--

CREATE TABLE `city_list` (
  `id` int(40) NOT NULL,
  `state_id` int(40) NOT NULL,
  `city_name` varchar(40) NOT NULL,
  `status` int(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city_list`
--

INSERT INTO `city_list` (`id`, `state_id`, `city_name`, `status`) VALUES
(1, 1, 'Alipur', 1),
(2, 1, 'Anderson Island', 1),
(3, 1, 'Arainj-Laka-Punga', 1),
(4, 1, 'Austinabad', 1),
(5, 1, 'Bamboo Flat', 1),
(6, 1, 'Barren Island', 1),
(7, 1, 'Beadonabad', 1),
(8, 1, 'Betapur', 1),
(9, 2, 'Adilabad', 1),
(10, 2, 'Anantapur', 1),
(11, 2, 'Chittoor', 1),
(12, 2, 'Cuddapah', 1),
(13, 2, 'East Godavari', 1),
(14, 2, 'Guntur', 1),
(15, 2, 'Hyderabad', 1),
(16, 2, 'Karimnagar', 1),
(17, 2, 'Khammam', 1),
(18, 2, 'Krishna', 1),
(19, 2, 'Kurnool', 1),
(20, 2, 'Mahabubnagar', 1),
(21, 3, 'Anjaw', 1),
(22, 3, 'Changlang', 1),
(23, 3, 'Dibang Valley', 1),
(24, 3, 'East Kameng', 1),
(25, 3, 'East Siang', 1),
(26, 3, 'Itanagar', 1),
(27, 4, 'Barpeta', 1),
(28, 4, 'Bongaigaon', 1),
(29, 4, 'Cachar', 1),
(30, 4, 'Darrang', 1),
(31, 4, 'Dhemaji', 1),
(32, 4, 'Dhubri', 1),
(33, 5, 'Araria', 1),
(34, 5, 'Aurangabad', 1),
(35, 5, 'Banka', 1),
(36, 5, 'Begusarai', 1),
(37, 5, 'Bhagalpur', 1),
(38, 5, 'Bhojpur', 1),
(39, 5, 'Buxar', 1),
(40, 5, 'Darbhanga', 1),
(41, 7, 'Chandigarh', 1),
(42, 7, 'Mani Marja', 1),
(43, 6, 'Bastar', 1),
(44, 6, 'Bhilai', 1),
(45, 6, 'Bijapur', 1),
(46, 6, 'Bilaspur', 1),
(47, 6, 'Dhamtari', 1),
(48, 6, 'Durg', 1),
(49, 31, 'Chennai', 1),
(50, 31, 'Chidambaram', 1),
(51, 31, 'Chingleput', 1),
(52, 31, 'Coimbatore', 1),
(53, 31, 'Courtallam', 1),
(54, 31, 'Cuddalore', 1),
(55, 31, 'Dharmapuri', 1),
(56, 31, 'Dindigul', 1),
(57, 31, 'Erode', 1),
(58, 31, 'Hosur', 1),
(59, 31, 'Kanchipuram', 1),
(60, 31, 'Kanyakumari', 1),
(61, 31, 'Karaikudi', 1),
(62, 31, 'Karur', 1),
(63, 31, 'Kodaikanal', 1),
(64, 31, 'Kovilpatti', 1),
(65, 31, 'Krishnagiri', 1),
(66, 31, 'Kumbakonam', 1),
(67, 31, 'Madurai', 1),
(68, 31, 'Mayiladuthurai', 1),
(69, 31, 'Nagapattinam', 1),
(70, 31, 'Nagarcoil', 1),
(71, 31, 'Namakkal', 1),
(72, 31, 'Neyveli', 1),
(73, 31, 'Nilgiris', 1),
(74, 31, 'Ooty', 1),
(75, 31, 'Palani', 1),
(76, 31, 'Perambalur', 1),
(77, 31, 'Pollachi', 1),
(78, 31, 'Pudukkottai', 1),
(79, 31, 'Rajapalayam', 1),
(80, 31, 'Ramanathapuram', 1),
(81, 31, 'Salem', 1),
(82, 31, 'Sivaganga', 1),
(83, 31, 'Sivakasi', 1),
(84, 31, 'Thanjavur', 1),
(85, 31, 'Theni', 1),
(86, 31, 'Thoothukudi', 1),
(87, 31, 'Tiruchirappalli', 1),
(88, 31, 'Tirunelveli', 1),
(89, 31, 'Tirupur', 1),
(90, 31, 'Tiruvallur', 1),
(91, 31, 'Tiruvannamalai', 1),
(92, 31, 'Tiruvarur', 1),
(93, 31, 'Trichy', 1),
(94, 31, 'Tuticorin', 1),
(95, 31, 'Vellore', 1),
(96, 31, 'Villupuram', 1),
(97, 31, 'Virudhunagar', 1),
(98, 31, 'Yercaud', 1);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(40) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Age` int(40) NOT NULL,
  `Gender` varchar(40) NOT NULL,
  `Education` varchar(40) NOT NULL,
  `Language` varchar(40) NOT NULL,
  `State` varchar(40) NOT NULL,
  `City` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `Name`, `Age`, `Gender`, `Education`, `Language`, `State`, `City`) VALUES
(1, 'Prathiv Rajan', 28, 'Male', 'PG', 'Tamil,English,', '2', 'Hyderabad'),
(2, 'Santhosh Raj', 25, 'Male', 'PG', 'English,Tamil,Hindi,', '31', 'Chennai'),
(12, 'Rajanasdf', 32, 'Male', '12th', 'English,', '4', 'Dhubri'),
(14, 'Prathiv Rajan', 32, 'Male', 'UG', 'English,', '31', 'Chennai'),
(15, 'amudhan', 22, 'Male', '10th', 'English,Hindi,', '6', 'Durg'),
(16, 'rajan', 27, 'Male', 'PG', 'Tamil,English,', '4', 'Barpeta');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` int(40) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(31, 'TAMIL NADU');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city_list`
--
ALTER TABLE `city_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city_list`
--
ALTER TABLE `city_list`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
