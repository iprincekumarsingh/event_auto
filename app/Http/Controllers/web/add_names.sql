-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2022 at 02:24 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_names`
--

CREATE TABLE `add_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_names`
--

INSERT INTO `add_names` (`id`, `name`, `payment_id`, `count`, `created_at`, `updated_at`) VALUES
(8, 'Prnce Kima', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:42:27', '2022-09-21 18:42:27'),
(9, 'dd', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:42:27', '2022-09-21 18:42:27'),
(10, 'f', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:42:27', '2022-09-21 18:42:27'),
(11, 'Prnce Kima', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:44:57', '2022-09-21 18:44:57'),
(12, 'dd', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:44:57', '2022-09-21 18:44:57'),
(13, 'f', 'pay_KKj4TpI57kVw40', '4', '2022-09-21 18:44:57', '2022-09-21 18:44:57'),
(14, 'Dimpy Singh', 'pay_KKkII33tTgcoov', '2', '2022-09-21 18:49:47', '2022-09-21 18:49:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_names`
--
ALTER TABLE `add_names`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_names`
--
ALTER TABLE `add_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
