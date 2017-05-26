-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2017 at 04:52 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guruknits`
--

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'caviar', 1, '2016-12-27 18:03:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `description`, `condicion`, `created_at`, `updated_at`) VALUES
(1, '100%cotton', 1, '2016-12-27 18:05:16', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `content_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `weight` double NOT NULL,
  `width` varchar(20) NOT NULL,
  `coo` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `codicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`id`, `code`, `content_id`, `supplier_id`, `weight`, `width`, `coo`, `price`, `codicion`, `created_at`, `updated_at`) VALUES
(1, 'p1528', 1, 1, 140, '60-62', 'El Salvador', 1.4, 1, '2016-12-27 18:08:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `fabric_color`
--

CREATE TABLE `fabric_color` (
  `id` int(11) NOT NULL,
  `fabric_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fabric_color`
--

INSERT INTO `fabric_color` (`id`, `fabric_id`, `color_id`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2016-12-27 18:08:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `in_transict_fabric`
--

CREATE TABLE `in_transict_fabric` (
  `id` int(11) NOT NULL,
  `id_purchase_detail` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `arrival_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comments` varchar(200) NOT NULL,
  `condicion` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `id` int(11) NOT NULL,
  `po` varchar(200) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `coments` varchar(250) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE `purchase_detail` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `fabric_color_id` int(11) NOT NULL,
  `quantity_order` int(11) NOT NULL,
  `quantity_left` int(11) NOT NULL,
  `delivered_date` date NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `coment` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(150) NOT NULL,
  `telephone` int(11) NOT NULL,
  `country` varchar(50) NOT NULL,
  `supplier_tipe_id` int(11) NOT NULL,
  `condicion` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_tipe`
--

CREATE TABLE `suppliers_tipe` (
  `id` int(11) NOT NULL,
  `tipe` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `condicion` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers_tipe`
--

INSERT INTO `suppliers_tipe` (`id`, `tipe`, `description`, `condicion`, `created_at`, `updated_at`) VALUES
(1, 'fabric', NULL, 1, '2016-12-27 17:49:04', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `fabric_color`
--
ALTER TABLE `fabric_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fabric_id` (`fabric_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `in_transict_fabric`
--
ALTER TABLE `in_transict_fabric`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_purchase_detail` (`id_purchase_detail`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `purchase_id` (`purchase_id`),
  ADD KEY `fabric_color_id` (`fabric_color_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_tipe_id` (`supplier_tipe_id`);

--
-- Indexes for table `suppliers_tipe`
--
ALTER TABLE `suppliers_tipe`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fabric_color`
--
ALTER TABLE `fabric_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `in_transict_fabric`
--
ALTER TABLE `in_transict_fabric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suppliers_tipe`
--
ALTER TABLE `suppliers_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD CONSTRAINT `fabrics_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`);

--
-- Constraints for table `fabric_color`
--
ALTER TABLE `fabric_color`
  ADD CONSTRAINT `fabric_color_ibfk_1` FOREIGN KEY (`fabric_id`) REFERENCES `fabrics` (`id`),
  ADD CONSTRAINT `fabric_color_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Constraints for table `in_transict_fabric`
--
ALTER TABLE `in_transict_fabric`
  ADD CONSTRAINT `in_transict_fabric_ibfk_1` FOREIGN KEY (`id_purchase_detail`) REFERENCES `purchase_detail` (`id`);

--
-- Constraints for table `purchase`
--
ALTER TABLE `purchase`
  ADD CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_ibfk_1` FOREIGN KEY (`supplier_tipe_id`) REFERENCES `suppliers_tipe` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
