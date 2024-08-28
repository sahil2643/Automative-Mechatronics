-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 10:56 AM
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
-- Database: `automative_mechatronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'sahil', 'sahil123@gmail.com', 'hello world', 'asyujbsicgwicbwicbwibcbhdwhbcbdhcbdhcbcbjhshabchbeiufef'),
(2, 'sahil', 'sahil123@gmail.com', 'hello world', 'asyujbsicgwicbwicbwibcbhdwhbcbdhcbdhcbcbjhshabchbeiufef'),
(3, 'sahil', 'abcd@gmail.com', 'abd', 'abcgdmabhyvchbsjoojjdbdbuad34845'),
(4, 'umang', 'umang@gmail.com', 'happy', 'this is umang and your web is amazing');

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `did` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `gst` varchar(225) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `DATE` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `distributor`
--

INSERT INTO `distributor` (`did`, `name`, `email`, `phone`, `gst`, `password`, `address`, `location`, `DATE`) VALUES
(5, 'sahil', 'sahil123@gmail.com', 9601666978, 'GST12516DMSHS2', '123456', '142 ring road vastral ahmedabad', 'ahmedabad', '2024-03-22');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(100) NOT NULL,
  `pid` int(225) NOT NULL,
  `rid` int(100) NOT NULL,
  `sid` int(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `price` varchar(225) NOT NULL,
  `qty` varchar(225) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `pid`, `rid`, `sid`, `name`, `image`, `price`, `qty`, `status`, `date`) VALUES
(60, 21, 11, 39, 'turning', 'cnmg.webp', '165', '1', 'Delivered', '2024-03-28'),
(61, 21, 11, 40, 'turning', 'cnmg.webp', '165', '9', 'Reject', '2024-03-28'),
(62, 20, 11, 41, '16ER AG60,DCMT11,cnbc-mf', '16er Ag60.webp,dcmt11.webp,cnbc-mf.jpg', '315,250,100', '10,15,5', 'Panding', '2024-03-28'),
(63, 20, 11, 42, '16ER AG60,turning', '16er Ag60.webp,cnmg.webp', '315,165', '10,15', 'Delivered', '2024-03-28'),
(64, 20, 11, 44, '16ER AG60', '16er Ag60.webp', '315', '1', 'Reject', '2024-03-30'),
(65, 21, 11, 45, 'turning', 'cnmg.webp', '165', '10', 'Delivered', '2024-04-19');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(225) NOT NULL,
  `oid` int(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `card_number` int(225) NOT NULL,
  `exp` varchar(225) NOT NULL,
  `total_amount` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `oid`, `email`, `card_number`, `exp`, `total_amount`) VALUES
(12, 60, 'sahil123@gmail.com', 2147483647, '2026-09', 165),
(13, 61, 'sahil123@gmail.com', 2147483647, '2024-02', 1485),
(14, 62, 'sahil123@gmail.com', 2147483647, '2024-02', 7400),
(15, 63, 'sahil123@gmail.com', 2147483647, '2024-08', 5625),
(16, 64, 'sahil123@gmail.com', 2147483647, '2024-04', 315),
(17, 65, 'sahil123@gmail.com', 1235899955, '2024-02', 1650);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `image` varchar(25) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `name`, `image`, `price`) VALUES
(20, '16ER AG60', '16er Ag60.webp', 315),
(21, 'turning', 'cnmg.webp', 165),
(22, 'cnbc-mf', 'cnbc-mf.jpg', 100),
(23, 'DCMT11', 'dcmt11.webp', 250);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `rid` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `gst` varchar(225) NOT NULL,
  `password` varchar(8) NOT NULL,
  `address` varchar(225) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`rid`, `name`, `email`, `phone`, `gst`, `password`, `address`, `date`) VALUES
(11, 'sahil', 'sahil123@gmail.com', 9601666978, 'SPY254BDYS55S45S', '123456', '142 ring road vastral ahmedabad', '2024-03-10 12:40:01');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `sid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `gst` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `location` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`sid`, `name`, `phone`, `email`, `gst`, `address`, `location`) VALUES
(39, 'sahil', 6352764863, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad'),
(40, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad'),
(41, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'botad'),
(42, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad'),
(43, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad'),
(44, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad'),
(45, 'sahil', 9601666978, 'sahil123@gmail.com', 'SPY254BDYS55S45S', '142 ring road vastral ahmedabad', 'ahmedabad');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `rid` (`rid`) USING BTREE,
  ADD KEY `sid` (`sid`),
  ADD KEY `pid` (`pid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `did` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `rid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `pid` FOREIGN KEY (`pid`) REFERENCES `product` (`pid`),
  ADD CONSTRAINT `rid` FOREIGN KEY (`rid`) REFERENCES `register` (`rid`),
  ADD CONSTRAINT `sid` FOREIGN KEY (`sid`) REFERENCES `shipping` (`sid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `oid` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
