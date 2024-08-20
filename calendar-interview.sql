-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 05:45 PM
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
-- Database: `calendar-interview`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `label` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `allDay` tinyint(1) DEFAULT NULL,
  `eventUrl` text DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `label`, `description`, `start_date`, `end_date`, `allDay`, `eventUrl`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Title 1', NULL, 'Desc 1', '2024-05-05 00:00:00', '2024-05-10 00:00:00', NULL, NULL, NULL, '2024-08-20 10:31:29', '2024-08-20 10:31:29'),
(3, 'Title 2', NULL, 'Desc 2', '2023-05-05 00:00:00', '2023-05-10 00:00:00', NULL, NULL, NULL, '2024-08-20 10:38:53', '2024-08-20 10:38:53'),
(4, 'title 4', NULL, 'Desc for Title 4', '2024-09-09 00:00:00', '2024-09-19 00:00:00', NULL, NULL, NULL, '2024-08-20 12:37:51', '2024-08-20 12:37:51'),
(7, 'title 55', NULL, '2024-09-19', '2024-09-29 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, '2024-08-20 13:18:14', '2024-08-20 13:18:14'),
(9, 'title 56', 'Label 2', 'Test', '2024-09-19 00:00:00', '2024-09-29 00:00:00', 0, 'https://google.com', 'Nairobi', '2024-08-20 13:37:19', '2024-08-20 13:37:19'),
(10, 'title 57', 'Label 6123', 'Test', '2024-09-19 00:00:00', '2024-09-29 00:00:00', 0, '1', 'Machakos', '2024-08-20 13:39:49', '2024-08-20 13:40:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
