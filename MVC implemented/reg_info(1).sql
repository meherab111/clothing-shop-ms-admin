-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 08:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg_info`
--

-- --------------------------------------------------------

--
-- Table structure for table `emp_app_req`
--

CREATE TABLE `emp_app_req` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_app_req`
--

INSERT INTO `emp_app_req` (`id`, `name`, `email`, `password`, `status`) VALUES
(16, 'alayna', 'alu123@hotmail.com', '$2y$10$B0AMeqT8pve6TEvS147SP.YqEvR0sEQd94PHfzrks0jLtSFPV9z5G', 'Approved'),
(28, 'sobuj hasan', 'self123@gmail.com', '$2y$10$GXk8lmkeE7E0eDHBm1Mp7ekev505r/y4/M6xdlHRQrGIgpAfnZxw2', 'Pending'),
(30, 'Ahmed Likhan', 'liks0null@yahoo.com', '$2y$10$x95i.3GJiiFa/ZEax4X0E.dZV1aYRSqyct5HJui86Z..baueiGinW', 'Pending'),
(31, 'Najib Mia', 'najib.jodran@gmail.com', '$2y$10$MrNzpo0N2d6sYfsw0tZDzeUojsjjpwsbplCASpub.kIvBNSI5sEni', 'Pending'),
(32, 'Sakib Hasan', 'sak123@gmail.com', '$2y$10$zP24xSkkC1z0TWY14V7y8ehsMUqDx7nLp8ma.sBVpz.24u0x4i4Iq', 'Pending'),
(33, 'Kazi Arpa', 'arpa6@yahoo.com', '$2y$10$3QL5zAH1DvHtbSjoWo.0/.GoAmEtgnXQ5F49nPTD906jdPTLxycpW', 'Approved'),
(34, 'Nisha Alo', 'alo90@hotmail.com', '$2y$10$VKREOvpLPPEgcme9OBJG1.EJ8/vVB77XRJHMSYW43hjol4UM8QwoK', 'Pending'),
(35, 'Leon Mahmud', 'leo.messi899@gmail.com', '$2y$10$kY5xkDiuFmeMUtBbtNdg4eD2DG711xjRlazSB//j5/k4vm6gSvAzO', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `emp_info`
--

CREATE TABLE `emp_info` (
  `id` int(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `daily_salary` int(255) NOT NULL,
  `total_days_in_month` int(255) NOT NULL,
  `absent_days_allowed` varchar(255) NOT NULL,
  `absent_days` varchar(255) NOT NULL,
  `total_salary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emp_info`
--

INSERT INTO `emp_info` (`id`, `employee_name`, `daily_salary`, `total_days_in_month`, `absent_days_allowed`, `absent_days`, `total_salary`) VALUES
(32, 'Amin Islam', 800, 30, '4', '5', ''),
(33, 'Sakib Ahmed', 800, 30, '4', '2', ''),
(42, 'Asif Rahman', 800, 30, '4', '5', ''),
(44, 'Lucky Akter', 800, 30, '4', '4', ''),
(45, 'Shohid Islam', 800, 30, '4', '6', ''),
(49, 'Araf Hasan', 700, 30, '4', '3', ''),
(50, 'saminul mia', 800, 30, '4', '1', ''),
(51, 'Kazi Maruf', 750, 30, '4', '5', ''),
(52, 'Samina rahman', 800, 30, '4', '0', ''),
(53, 'Najib Ullah', 750, 30, '4', '4', '');

-- --------------------------------------------------------

--
-- Table structure for table `registered`
--

CREATE TABLE `registered` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered`
--

INSERT INTO `registered` (`id`, `name`, `phone`, `email`, `password`, `token`, `status`, `image`) VALUES
(35, 'Roksana Shishir', '01445680099', 'roks.begum9@gmail.com', '$2y$10$gZFb67zzONDOw51Yaj4LQOuVnPdoO6ISSmjxDvGUxentjqHutHOsW', '10f4a9ecdc92a2cc621a08096af627', 'active', ''),
(37, 'Meherab Hassan', '01702967345', 'mehrabborno@gmail.com', '$2y$10$Z0HaIYcCFm8V/0cgem09gex44FhGMcVaewqO6Wsuu6kOS06klZK4y', 'baed93c57f7f3be6df39ecb0d8d082', 'active', 'IMAGE-65819030109e19.75790513.jpg'),
(46, 'Nazib Hassan', '01573493384', 'nazibvai123@gmail.com', '$2y$10$IXmsg3XbRGH4h3/YeqstleIsox6N3dR1itthIkuwQxdiL/svQgE8y', '89dc299fc0a6df57661e03a0ac3982', 'active', 'IMAGE-6565fc6dea99d5.66888770.png');

-- --------------------------------------------------------

--
-- Table structure for table `sale_info`
--

CREATE TABLE `sale_info` (
  `id` int(255) NOT NULL,
  `product` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `sale_price` varchar(255) NOT NULL,
  `total_sale` varchar(255) NOT NULL,
  `buy_price` varchar(255) NOT NULL,
  `total_buy` varchar(255) NOT NULL,
  `profit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sale_info`
--

INSERT INTO `sale_info` (`id`, `product`, `qty`, `sale_price`, `total_sale`, `buy_price`, `total_buy`, `profit`) VALUES
(1, 'T-Shirt', 25, '1200', '30000', '800', '20000', '10000'),
(2, 'Jeans Pant', 20, '1400', '28000', '1100', '22000', '6000'),
(3, 'Blazzer', 9, '4500', '40500', '3700', '33300', '7200'),
(5, 'Check Shirt', 10, '1300', '13000', '950', '9500', '3500'),
(7, 'Short Pant', 25, '700', '17500', '400', '10000', '7500'),
(8, 'Underwear', 15, '200', '3000', '150', '2250', '750'),
(9, 'Plain-Shirt', 19, '1800', '34200', '1500', '28500', '5700'),
(10, 'Panjabi', 21, '2000', '42000', '1700', '35700', '6300'),
(11, 'Pajama', 21, '1400', '29400', '1100', '23100', '6300'),
(12, 'Gabardine Pant', 22, '1600', '35200', '1300', '28600', '6600'),
(13, 'Hoodie', 9, '1500', '13500', '1200', '10800', '2700');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emp_app_req`
--
ALTER TABLE `emp_app_req`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `emp_info`
--
ALTER TABLE `emp_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registered`
--
ALTER TABLE `registered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sale_info`
--
ALTER TABLE `sale_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emp_app_req`
--
ALTER TABLE `emp_app_req`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `emp_info`
--
ALTER TABLE `emp_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `registered`
--
ALTER TABLE `registered`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `sale_info`
--
ALTER TABLE `sale_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
