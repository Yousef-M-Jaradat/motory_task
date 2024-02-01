-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 07:17 AM
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
-- Database: `motory`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(2, 'خدمات المساعدة والضمان', 'وصف لخدمات المساعدة والضمان'),
(3, 'خدمات الحماية', 'وصف لخدمات الحماية');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `action`, `details`, `created_at`) VALUES
(1, 'create', '57 created at 2024-02-01 00:38:19', '2024-01-31 23:38:19'),
(2, 'delete', 'category with Id =1 deleted at 2024-02-01 00:38:41', '2024-01-31 23:38:41'),
(3, 'create', 'خدمات المساعدة والضمان created at 2024-02-01 00:39:13', '2024-01-31 23:39:13'),
(4, 'create', 'خدمات الحماية created at 2024-02-01 00:39:26', '2024-01-31 23:39:26'),
(5, 'create', '77 created at 2024-02-01 00:39:44', '2024-01-31 23:39:44'),
(6, 'delete', 'service with Id =1 deleted at 2024-02-01 00:40:21', '2024-01-31 23:40:21'),
(7, 'create service', 'المساعدة على الطريق created at 2024-02-01 00:42:41', '2024-01-31 23:42:41'),
(8, 'create service', 'الضمان الممتد created at 2024-02-01 00:43:27', '2024-01-31 23:43:27'),
(9, 'create service', 'الضمان الممتد created at 2024-02-01 00:43:55', '2024-01-31 23:43:55'),
(10, 'create service', 'الحماية القياسية created at 2024-02-01 00:44:53', '2024-01-31 23:44:54'),
(11, 'create service', 'الحماية الكاملة للسيارات السيدان created at 2024-02-01 00:45:16', '2024-01-31 23:45:16'),
(12, 'update service', 'الضمان الممتد updated at 2024-02-01 00:59:58', '2024-01-31 23:59:58'),
(13, 'update service', 'الضمان الممتد updated at 2024-02-01 01:00:20', '2024-02-01 00:00:20'),
(14, 'create service', '645456 created at 2024-02-01 05:47:31', '2024-02-01 04:47:31'),
(15, 'delete service', 'service with Id =7 deleted at 2024-02-01 05:48:02', '2024-02-01 04:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1706744257),
('m240129_192234_create_categories_table', 1706744257),
('m240129_192255_create_services_table', 1706744257),
('m240131_093736_create_history_table', 1706744257);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) NOT NULL,
  `car_types` enum('new','used','both') NOT NULL,
  `warranty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `image`, `price`, `category_id`, `car_types`, `warranty`) VALUES
(2, 'المساعدة على الطريق', 'وصف لخدمة المساعدة على الطريق', 'uploads/images/Screenshot 2024-01-31 122314.png', 230.00, 2, 'new', 3),
(3, 'الضمان الممتد', 'وصف لخدمة الضمان الممتد', 'uploads/images/Screenshot 2024-01-31 122333.png', 1725.00, 2, 'new', 3),
(4, 'الضمان الممتد', 'وصف لخدمة الضمان الممتد', 'uploads/images/Screenshot 2024-01-31 122333.png', 1610.00, 2, 'used', 3),
(5, 'الحماية القياسية', 'وصف لخدمة الحماية القياسية', 'uploads/images/Icon (2).svg', 2300.00, 3, 'both', 10),
(6, 'الحماية الكاملة للسيارات السيدان', 'وصف لخدمة الحماية الكاملة للسيارات السيدان', 'uploads/images/Icon (2).svg', 10350.00, 3, 'both', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-services-category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `fk-services-category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
