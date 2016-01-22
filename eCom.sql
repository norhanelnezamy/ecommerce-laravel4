-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2016 at 02:08 AM
-- Server version: 5.6.27-0ubuntu1
-- PHP Version: 5.6.4-4ubuntu6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eCom`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `status`) VALUES
(29, 1, 12, ''),
(32, 1, 5, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'laptop', '2015-08-28 15:22:14', '2015-10-07 09:42:00'),
(2, 'smart phone', '2015-08-28 15:22:27', '2015-08-28 15:22:27'),
(3, 'bags', '2015-09-01 13:25:37', '2015-09-01 13:25:37'),
(5, 'computer screen', '2015-09-06 18:36:48', '2015-09-06 18:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_08_28_170439_categories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `photo`, `price`, `available`, `created_at`, `updated_at`) VALUES
(5, 2, 'tablet', 'iPad Mini Will Be Wi-Fi Only - Business I', 'images/products/2015-08-31-15:36:41-how-apple-will-keep-the-ipad-mini-as-cheap-as-googles-android-tablets.jpg', 9000.00, 1, '2015-08-31 13:36:41', '2015-08-31 13:36:41'),
(7, 1, 'laptop', 'new tablet with suitable price \r\nyou can buy it now', 'images/products/2015-08-31-16:20:50-apple-macbook-gold-2015-back-angle-1500x1000.jpg', 9999.99, 0, '2015-08-31 14:20:50', '2015-09-01 13:19:39'),
(8, 3, 'bag', 'new bag with suitable price \r\nyou can buy it now', 'images/products/2015-09-01-15:26:33-11701057_968719789846434_2030387943848270842_n.jpg', 90.00, 1, '2015-09-01 13:26:34', '2015-09-01 13:26:34'),
(12, 3, 'bag', 'panda bag :)\r\nwith special price', 'images/products/2015-09-04-13:00:12-11224723_968719953179751_1034229065206340428_n.jpg', 50.00, 1, '2015-09-04 11:00:12', '2015-09-04 11:00:12'),
(13, 1, 'test', '<br>', '2015/10/2015-10-22-14:00:05-1.jpeg', 80.00, 1, '2015-10-22 12:00:05', '2015-10-22 12:00:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL,
  `last_name` varchar(10) NOT NULL,
  `first_name` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(11) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `last_name`, `first_name`, `password`, `telephone`, `admin`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'norhanelnezamy@gmail.com', 'elnezamy', 'norhan', '$2y$10$WqjyveGjQ36qT7jHSqmRR.pwjNp15ub3BrqNXGbDuYNzQRQFNxXsu', '01222222222', 1, '2015-10-29 10:15:42', '2015-10-29 08:15:42', 'FcjQBzyPmFri8jtiXMpsj2vKbFX3W2rwaD7YX7PNqW8hnsuRAR1wef19aGAj'),
(4, 'mariam@gmail.com', 'elnezamy', 'mariam', '$2y$10$e8F5OJIXTwSXTAyXp3f9ousk4SNB5Jlj7B5.VdhVL2w/r2FpqTfeO', '01233333333', 0, '2015-10-06 19:27:11', '2015-10-06 19:27:11', ''),
(8, 'amr@gmail.com', 'elnezamy', 'amr', '$2y$10$bhok4/s1FNIu0S2vlPshYe.IrZ9zbz/v91zQi/RKfOn18hbAlfsJ.', '01233333333', 1, '2015-10-06 19:46:38', '2015-10-06 19:46:38', ''),
(9, 'nada@gmail.com', 'rageh', 'nada', '$2y$10$6TOGlMZoOQ4GPyqVNfPn0.YgnUQnI/uHc.T3Wrh3Y6W81WBuUov/u', '0123456789', 0, '2015-10-28 17:24:04', '2015-10-28 17:24:04', ''),
(10, 'emad@gmail.com', 'elmogy', 'emad', '$2y$10$k6DWwXa/iHgZoa2dFvhyVejw2HE8HM.lngxsyF6OkBnDlpRb/py56', '0123456789', 1, '2015-10-29 10:06:20', '2015-10-29 10:06:20', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
