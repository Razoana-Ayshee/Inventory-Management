-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2022 at 11:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ayshee', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `unit` varchar(60) NOT NULL,
  `price` int(60) NOT NULL,
  `id` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `product_name`, `product_description`, `unit`, `price`, `id`) VALUES
(11, 'shirt', 'black-21', 'piece', 999, 1),
(12, 'pant', '8081-model,black', 'piece', 1500, 1),
(14, 'shoe', 'white sneakers', 'pair', 2000, 1),
(15, 'mask', 'surgical mask-12,blue', 'per box', 300, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `purchase_id` int(100) NOT NULL,
  `pro_id` int(200) NOT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(100) NOT NULL,
  `price` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchase_id`, `pro_id`, `quantity`, `date`, `month`, `price`) VALUES
(104, 11, 5, '2022-01-04', 'January', 5000),
(105, 12, 4, '2022-01-04', 'January', 6000),
(107, 11, 2, '2022-01-05', 'January', 2000),
(108, 11, 3, '2022-01-05', 'January', 3000),
(112, 15, 5, '2022-01-08', 'January', 1500),
(113, 14, 3, '2022-01-08', 'January', 6000),
(114, 11, 3, '2022-01-08', 'January', 3000),
(125, 11, 2, '2022-01-09', 'January', 1998);

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `sale_quantity` int(100) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_month` varchar(100) NOT NULL,
  `sale_price` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `pro_id`, `sale_quantity`, `sale_date`, `sale_month`, `sale_price`) VALUES
(39, 11, 2, '2022-01-05', 'January', 2000),
(40, 11, 1, '2022-01-05', 'January', 1000),
(41, 12, 2, '2022-01-05', 'January', 3000),
(42, 11, 2, '2022-01-05', 'January', 2000),
(44, 12, 1, '2022-01-05', 'January', 1500),
(45, 15, 2, '2022-01-08', 'January', 600);

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `tot_id` int(100) NOT NULL,
  `pro_id` int(100) NOT NULL,
  `tot_quantity` int(100) NOT NULL,
  `tot_price` int(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`tot_id`, `pro_id`, `tot_quantity`, `tot_price`) VALUES
(61, 11, 10, 9498),
(62, 12, 1, 1500),
(65, 15, 3, 900),
(66, 14, 3, 6000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`purchase_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`tot_id`),
  ADD UNIQUE KEY `product_name` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `purchase_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `sale`
--
ALTER TABLE `sale`
  MODIFY `sale_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `tot_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);

--
-- Constraints for table `total`
--
ALTER TABLE `total`
  ADD CONSTRAINT `total_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
