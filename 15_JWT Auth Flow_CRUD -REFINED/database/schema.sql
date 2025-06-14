-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2025 at 10:01 AM
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
-- Database: `supercrud`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_name`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Design Login UI', 1, 1, 1, '2025-06-13 18:54:59', '2025-06-13 18:54:59'),
(3, 'Add Update Functionality wow', 3, 1, 1, '2025-06-14 06:25:11', '2025-06-14 06:43:55'),
(4, 'super crud completed', 3, 1, 1, '2025-06-14 06:44:15', '2025-06-14 06:44:25'),
(5, 'Super CRUD refinement', 3, 1, 1, '2025-06-14 07:17:30', '2025-06-14 08:54:58'),
(6, 'Call Pramod Bhaiya soon', 2, 1, 1, '2025-06-14 10:15:22', '2025-06-14 13:18:25'),
(7, 'learn wordpress', 1, 1, 1, '2025-06-14 13:12:51', '2025-06-14 13:12:51'),
(8, 'demo done', 3, 1, 1, '2025-06-14 13:18:59', '2025-06-14 13:19:56');

-- --------------------------------------------------------

--
-- Table structure for table `task_details`
--

CREATE TABLE `task_details` (
  `task_det_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_description` text DEFAULT NULL,
  `completed_at` datetime DEFAULT NULL,
  `last_updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_statuses`
--

CREATE TABLE `task_statuses` (
  `status_id` int(11) NOT NULL,
  `status_label` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task_statuses`
--

INSERT INTO `task_statuses` (`status_id`, `status_label`) VALUES
(3, 'Completed'),
(2, 'Halted'),
(1, 'InProgress');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password_hash`, `created_at`) VALUES
(1, 'aditya', 'adityadubey793@gmail.com', '$2y$10$Hmq.9vqvFyPJrlYV2ETmDe2sF.mfRuATfwxNSNhis75.VTTkMRjM2', '2025-06-12 12:49:17'),
(2, 'god', 'Password@1', '$2y$10$HGBTElEw2JK5ebd6xNXGhOb7l3ZK/Iu.m.PM9IvpL6ZP8/l2NrDt2', '2025-06-13 11:48:38'),
(3, 'random', 'TestPassword@1', '$2y$10$3RyDhm15zPZwxzQTgzmhludmOM8u6DsWvgMSKGj0HMJLVhTLc6igG', '2025-06-13 11:56:04'),
(4, 'someuser', 'Someuser@1', '$2y$10$HWNC5YTi8FDpqrkpYBn38O9DLcAhyU/EzUBcR/OJJ2bCLyuwVSyam', '2025-06-14 10:28:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `status_id` (`status_id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `task_details`
--
ALTER TABLE `task_details`
  ADD PRIMARY KEY (`task_det_id`),
  ADD KEY `task_id` (`task_id`);
ALTER TABLE `task_details` ADD FULLTEXT KEY `task_description` (`task_description`);

--
-- Indexes for table `task_statuses`
--
ALTER TABLE `task_statuses`
  ADD PRIMARY KEY (`status_id`),
  ADD UNIQUE KEY `status_label` (`status_label`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `task_details`
--
ALTER TABLE `task_details`
  MODIFY `task_det_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_statuses`
--
ALTER TABLE `task_statuses`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `task_statuses` (`status_id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tasks_ibfk_3` FOREIGN KEY (`updated_by`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `task_details`
--
ALTER TABLE `task_details`
  ADD CONSTRAINT `task_details_ibfk_1` FOREIGN KEY (`task_id`) REFERENCES `tasks` (`task_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
