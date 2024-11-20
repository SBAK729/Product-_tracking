-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2024 at 12:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS data;
use data;

-- --------------------------------------------------------

--
-- Table structure for table `price_notifications`
--

CREATE TABLE `price_notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `old_price` float NOT NULL,
  `new_price` float NOT NULL,
  `notification_message` text NOT NULL,
  `notified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `price_notifications`
--

INSERT INTO `price_notifications` (`id`, `user_id`, `product_id`, `old_price`, `new_price`, `notification_message`, `notified_at`, `created_at`) VALUES
(1, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:45:26', '2024-11-18 00:32:28'),
(2, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:45:26', '2024-11-18 00:32:28'),
(3, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:46:58', '2024-11-18 00:32:28'),
(4, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:46:58', '2024-11-18 00:32:28'),
(5, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:47:49', '2024-11-18 00:32:28'),
(6, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:47:49', '2024-11-18 00:32:28'),
(7, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:48:00', '2024-11-18 00:32:28'),
(8, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:48:00', '2024-11-18 00:32:28'),
(9, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:48:34', '2024-11-18 00:32:28'),
(10, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:48:34', '2024-11-18 00:32:28'),
(11, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:58:16', '2024-11-18 00:32:28'),
(12, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 20:58:17', '2024-11-18 00:32:28'),
(13, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 22:11:34', '2024-11-18 00:32:28'),
(14, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-17 22:11:37', '2024-11-18 00:32:28'),
(15, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:16:42', '2024-11-18 00:32:28'),
(16, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:16:43', '2024-11-18 00:32:28'),
(17, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:16:54', '2024-11-18 00:32:28'),
(18, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:16:55', '2024-11-18 00:32:28'),
(19, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:29:59', '2024-11-18 00:32:28'),
(20, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:30:00', '2024-11-18 00:32:28'),
(21, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:32:30', '2024-11-18 00:32:30'),
(22, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:32:31', '2024-11-18 00:32:31'),
(23, 1, 1, 5000, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:34:32', '2024-11-18 00:34:32'),
(24, 1, 1, 5001, 5001, 'The price of Air Max from Jimma Shoes Center is now 5001.', '2024-11-18 00:34:32', '2024-11-18 00:34:32'),
(25, 1, 1, 5000, 5008, 'The price of Air Max from Jimma Shoes Center is now 5008.', '2024-11-18 00:35:18', '2024-11-18 00:35:18'),
(26, 1, 1, 5000, 5008, 'The price of Air Max from Jimma Shoes Center is now 5008.', '2024-11-18 00:35:20', '2024-11-18 00:35:20'),
(27, 1, 1, 5000, 5008, 'The price of Air Max from Jimma Shoes Center is now 5008.', '2024-11-18 00:35:48', '2024-11-18 00:35:48'),
(28, 1, 1, 5000, 5008, 'The price of Air Max from Jimma Shoes Center is now 5008.', '2024-11-18 00:35:54', '2024-11-18 00:35:54'),
(29, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:39:15', '2024-11-18 00:39:15'),
(30, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:40:48', '2024-11-18 00:40:48'),
(31, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:41:58', '2024-11-18 00:41:58'),
(32, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:42:17', '2024-11-18 00:42:17'),
(33, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:42:32', '2024-11-18 00:42:32'),
(34, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:48:54', '2024-11-18 00:48:54'),
(35, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:48:57', '2024-11-18 00:48:57'),
(36, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-18 00:49:01', '2024-11-18 00:49:01'),
(37, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-19 16:53:57', '2024-11-19 16:53:57'),
(38, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-20 21:55:03', '2024-11-20 21:55:03'),
(39, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-20 22:11:06', '2024-11-20 22:11:06'),
(40, 1, 4, 4500, 4500, 'The price of Air Max from Jani Shoes is now 4500.', '2024-11-20 22:20:45', '2024-11-20 22:20:45'),
(41, 1, 2, 1000, 1000, 'The price of Air Max from Alami Shop is now 1000.', '2024-11-20 22:20:45', '2024-11-20 22:20:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `business_name`, `product_name`, `price`) VALUES
(1, 'Jimma Shoes Center', 'Air Max', 5000.00),
(2, 'Alami Shop', 'Air Max', 1000.00),
(3, 'Max Shoes', 'Air Max', 4350.00),
(4, 'Jani Shoes', 'Air Max', 4500.00),
(5, 'Ami Diamond Shoes', 'Air Max', 110.00),
(7, 'Dinka Mobile Center', 'Iphone 16 Pro', 2000.00),
(8, 'Abi Mobile Center', 'Iphone 16 Pro', 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_tracking`
--

CREATE TABLE `user_tracking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price_criteria` float NOT NULL,
  `criteria_type` enum('increase','decrease','equal') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tracking`
--

INSERT INTO `user_tracking` (`id`, `user_id`, `product_id`, `price_criteria`, `criteria_type`, `created_at`) VALUES
(1, 1, 1, 5000, 'increase', '2024-11-17 20:39:47'),
(2, 1, 1, 5001, 'equal', '2024-11-17 20:42:34'),
(3, 1, 4, 4500, 'equal', '2024-11-18 00:37:45'),
(4, 1, 2, 400, 'decrease', '2024-11-18 00:38:02'),
(5, 1, 1, 4999, 'equal', '2024-11-20 20:39:20'),
(6, 1, 1, 5000, 'increase', '2024-11-20 22:12:04'),
(7, 1, 2, 1000, 'equal', '2024-11-20 22:18:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `price_notifications`
--
ALTER TABLE `price_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tracking`
--
ALTER TABLE `user_tracking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `price_notifications`
--
ALTER TABLE `price_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_tracking`
--
ALTER TABLE `user_tracking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `price_notifications`
--
ALTER TABLE `price_notifications`
  ADD CONSTRAINT `price_notifications_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_tracking`
--
ALTER TABLE `user_tracking`
  ADD CONSTRAINT `user_tracking_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
