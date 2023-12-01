-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2023 at 05:44 AM
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
-- Database: `itkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `bid` int(11) NOT NULL,
  `nblock` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`bid`, `nblock`) VALUES
(25, 'test1'),
(26, 'test2'),
(28, 'ramanjuam'),
(29, 'test1'),
(30, 'ramanjuam'),
(31, 'HELLO'),
(32, 'hey123'),
(33, 'nktestt'),
(34, 'ramanjuam123nk');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `cid` int(11) NOT NULL,
  `ncompany` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`cid`, `ncompany`) VALUES
(57, 'M Kumarasamy College of Engineering Karur'),
(58, 'narain'),
(59, 'test1'),
(60, 'MKCe'),
(61, 'HEY123'),
(62, 'nk');

-- --------------------------------------------------------

--
-- Table structure for table `departement`
--

CREATE TABLE `departement` (
  `did` int(11) NOT NULL,
  `ndept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departement`
--

INSERT INTO `departement` (`did`, `ndept`) VALUES
(29, 'hey123'),
(28, 'it'),
(22, 'jegan marimuthu'),
(24, 'ss'),
(23, 'test1'),
(31, 'test1sd'),
(27, 'test23'),
(32, 'testgo');

-- --------------------------------------------------------

--
-- Table structure for table `eitems`
--

CREATE TABLE `eitems` (
  `id` int(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL,
  `deprt` varchar(20) NOT NULL,
  `nlevel` varchar(10) NOT NULL,
  `nroom` varchar(20) NOT NULL,
  `pdate` date NOT NULL,
  `nintent` varchar(20) NOT NULL,
  `po_n` varchar(20) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `waranty` varchar(20) NOT NULL,
  `unit_cost` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `product` varchar(20) NOT NULL,
  `product_c` varchar(20) NOT NULL,
  `model` varchar(50) NOT NULL,
  `assetid` varchar(20) NOT NULL,
  `cpu_s` varchar(20) NOT NULL,
  `monitor_s` varchar(20) NOT NULL,
  `keyb_s` varchar(20) NOT NULL,
  `Mouse_s` varchar(20) NOT NULL,
  `os` varchar(20) NOT NULL,
  `ram` varchar(20) NOT NULL,
  `storagetype` varchar(50) NOT NULL,
  `msoffice` varchar(20) NOT NULL,
  `ocssts` varchar(50) NOT NULL,
  `created_date` date NOT NULL,
  `ip` varchar(20) NOT NULL,
  `mac` varchar(20) NOT NULL,
  `nchannels` varchar(20) NOT NULL,
  `scann` varchar(20) NOT NULL,
  `Storage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eitems`
--

INSERT INTO `eitems` (`id`, `company`, `block`, `deprt`, `nlevel`, `nroom`, `pdate`, `nintent`, `po_n`, `invoice_no`, `waranty`, `unit_cost`, `status`, `product`, `product_c`, `model`, `assetid`, `cpu_s`, `monitor_s`, `keyb_s`, `Mouse_s`, `os`, `ram`, `storagetype`, `msoffice`, `ocssts`, `created_date`, `ip`, `mac`, `nchannels`, `scann`, `Storage`) VALUES
(288, 'a', 'a', 'a', '1', 'a1', '0000-00-00', '1221', '634896131', 'a1', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '4586', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a', '0000-00-00', 'a', 'a', 'a', 'a', 'a'),
(289, 'b', 'b', 'b', '23', 'asd', '0000-00-00', '12121', '634896131', 'b1', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '4586', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '0000-00-00', 'b', 'b', 'b', 'b', 'b'),
(290, 'Company', 'Company', 'Company', '56', 'Comaedpany', '0000-00-00', '2121212121', '634896131', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', '4586', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', 'Company', '0000-00-00', 'Company', 'Company', 'Company', 'Company', 'Company'),
(291, 'd', 'd', 'd', '5', 'Comaedpany', '0000-00-00', '1212112', '634896131', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '4586', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '0000-00-00', 'd', 'd', 'd', 'd', 'd');

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gstin` varchar(50) NOT NULL,
  `supp_code` varchar(12) NOT NULL,
  `add1` varchar(50) NOT NULL,
  `add2` varchar(50) NOT NULL,
  `t-phone` varchar(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `web` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `suppliern` varchar(50) NOT NULL,
  `supp_address` varchar(50) NOT NULL,
  `indent_no` varchar(50) NOT NULL,
  `indent_date` date NOT NULL,
  `order_no` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `brand` varchar(20) NOT NULL,
  `receipt` varchar(100) NOT NULL,
  `invoice_no` varchar(20) NOT NULL,
  `invoice_date` date NOT NULL,
  `material_name` text NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `suppliern`, `supp_address`, `indent_no`, `indent_date`, `order_no`, `order_date`, `brand`, `receipt`, `invoice_no`, `invoice_date`, `material_name`, `quantity`, `value`, `gst`, `remarks`) VALUES
(207, 'mkce', 'thalavapalayam karur', 'test', '2023-09-02', '1', '2023-09-08', 'dell', 'uploads/651120b828fd356.jpg', 'q', '2023-09-01', 'computer', '2', '22', '2', 'asdfasdfs'),
(208, 'mkce', 'thalavapalayam karur', 'test', '2023-09-02', '1', '2023-09-08', 'de2', 'uploads/651120b828fd356.jpg', 'q', '2023-09-01', 'keyboard', '1', '22', '2', 'asdfasdfs'),
(209, 'dell_official', 'thalavapalayam karur', 'sDCAS', '2023-10-06', '1', '2023-10-07', 'dell', 'uploads/651ea4b07f2fb56.jpg', '123', '2023-10-06', 'computer', '11', '1', '1', '2e2e'),
(210, 'dell_official', 'thalavapalayam karur', 'sDCAS', '2023-10-06', '1', '2023-10-07', 'albin', 'uploads/651ea4b07f2fb56.jpg', '123', '2023-10-06', 'computer', '12', '1', '1', '2e2e'),
(211, 'dell_official', 'thalavapalayam karur', 'sDCAS', '2023-10-07', '1', '2023-10-06', 'dell', 'uploads/651ea9064af7256.jpg', '123', '2023-10-26', 'computer', '10', '1', '1', 'kumaar'),
(212, 'dell_official', 'thalavapalayam karur', 'sDCAS', '2023-10-07', '1', '2023-10-06', 'hp', 'uploads/651ea9064af7256.jpg', '123', '2023-10-26', 'keyboard', '10', '1', '1', 'kumaar');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `producttype` varchar(50) NOT NULL,
  `productname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `producttype`, `productname`) VALUES
(36, 'System', 'mouse'),
(37, 's', '');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(20) NOT NULL,
  `items` varchar(20) NOT NULL,
  `block` varchar(20) NOT NULL,
  `pname` varchar(20) NOT NULL,
  `ptype` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `cabin` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `rid` int(11) NOT NULL,
  `nroom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`rid`, `nroom`) VALUES
(12, 'test1'),
(13, 'hey123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`did`),
  ADD UNIQUE KEY `ndept` (`ndept`);

--
-- Indexes for table `eitems`
--
ALTER TABLE `eitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `departement`
--
ALTER TABLE `departement`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `eitems`
--
ALTER TABLE `eitems`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
