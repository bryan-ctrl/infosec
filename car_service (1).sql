-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2025 at 06:55 AM
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
-- Database: `car_service`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_scheduling`
--

CREATE TABLE `job_scheduling` (
  `id` int(11) NOT NULL,
  `mechanic_id` varchar(100) NOT NULL,
  `job_date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_scheduling`
--

INSERT INTO `job_scheduling` (`id`, `mechanic_id`, `job_date`, `description`) VALUES
(1, '1', '2025-02-20', 'alfonso jr'),
(2, '2', '2025-02-08', 'POCHANGKAGALA');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_requests`
--

CREATE TABLE `schedule_requests` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `requested_date` date NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_requests`
--

INSERT INTO `schedule_requests` (`id`, `user_id`, `requested_date`, `status`, `created_at`) VALUES
(1, 3, '2025-02-04', 'pending', '2025-02-22 05:21:23'),
(2, 3, '2025-02-06', 'pending', '2025-02-24 16:54:02'),
(3, 3, '2025-02-28', 'pending', '2025-02-24 16:54:18'),
(4, 3, '2025-02-27', 'pending', '2025-02-25 14:54:01'),
(5, 3, '2025-02-14', 'pending', '2025-02-25 15:50:01'),
(6, 3, '2032-01-13', 'pending', '2025-02-25 15:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `service_history`
--

CREATE TABLE `service_history` (
  `id` int(11) NOT NULL,
  `vehicle_id` varchar(100) NOT NULL,
  `service_date` date NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_history`
--

INSERT INTO `service_history` (`id`, `vehicle_id`, `service_date`, `description`) VALUES
(1, 'VIOS MODEL 1996', '2025-02-03', 'PACKANGSHGIT'),
(2, 'VIOS MODEL 1996', '2025-01-28', 'sdfsasd'),
(3, 'HONDA BRIO', '2025-02-25', 'CHANGE ALL '),
(4, 'HONDA BRIO', '2025-02-25', 'CHANGE ALL '),
(5, 'LC PRADO', '2025-02-28', 'CHANGE FLAIRINGS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role`, `firstname`, `lastname`) VALUES
(1, 'bryanp123', 'bryanp123@gmail.com', '$2y$10$ebWcVrDCi.hEV/PODReRI.L6cjefYdL8jKxIL9HAO9RrlHsGLSKu2', 'user', 'bryan', 'pacuan'),
(2, 'lebronjames', 'lebronjames@gmail.com', '$2y$10$UrZ0lMwr8ay5SwwXFOOupOkYGYSD.URClNttKP8H1CkoXQlEXxnA.', 'admin', 'lebron', 'james'),
(3, 'chok', 'choklim@gmail.com', '$2y$10$TNwsvbAwQUAHipYp4OOBBuLXfEaJjQrPOaCqWaOueQJQL2pJcRKZu', 'user', 'chok', 'lim'),
(4, 'jamalmurray', 'jamalmurray@gmail.com', '$2y$10$8e2z5lXtVvg/w.HjpZkJFO6IOpBC94FOPaREIr4yJXW1WWxZgzZ6m', 'admin', 'jamal', 'murray'),
(6, 'bryanpacuan', 'bryanpacuan@gmail.com', '$2y$10$ob1FDM.XfdPZdOECPpcssuV8jJkOzmiqSVVoNgtB2WMn5IZihFKZe', 'admin', 'bryan', 'pacuan'),
(7, 'jordanpoole', 'jordanpoole@gmail.com', '$2y$10$kOlul2NmrWI5FOcKtpKTrukFCbC.ILqQEehTT2qJF0/pHqkQeB9o6', 'admin', 'jordan', 'poole');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_scheduling`
--
ALTER TABLE `job_scheduling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_requests`
--
ALTER TABLE `schedule_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `service_history`
--
ALTER TABLE `service_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_scheduling`
--
ALTER TABLE `job_scheduling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedule_requests`
--
ALTER TABLE `schedule_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_history`
--
ALTER TABLE `service_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_requests`
--
ALTER TABLE `schedule_requests`
  ADD CONSTRAINT `schedule_requests_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
