-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2024 at 01:28 AM
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
-- Database: `gtms`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_year`
--

CREATE TABLE `academic_year` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `academic_year`
--

INSERT INTO `academic_year` (`id`, `academic_year`, `created`, `modified`) VALUES
(1, 'First-year (Freshman)', '2024-04-23 20:24:26', '2024-04-23 12:24:26'),
(2, 'Second-year (Sophomore)', '2024-04-23 20:24:52', '2024-04-23 12:24:52'),
(3, 'Third-year (Junior)', '2024-04-23 20:25:18', '2024-04-23 12:25:18'),
(4, 'Fourth-year (Senior)', '2024-04-23 20:25:39', '2024-04-23 12:25:39'),
(5, 'Senior High School ', '2024-05-09 13:08:50', '2024-05-09 05:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Bachelor of Science in Computer Science', '2024-04-23 19:49:30', '2024-04-23 11:49:30'),
(2, 'Bachelor of Science in Information Technology', '2024-04-23 19:51:12', '2024-04-23 11:51:12'),
(3, 'Bachelor of Science in Computer Engineering', '2024-04-23 19:51:25', '2024-04-23 11:51:25'),
(4, 'Bachelor of Science in Information System', '2024-04-23 19:54:31', '2024-04-23 11:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `phone`, `message`, `created`) VALUES
(9, 'ALEXIS JAYE DELEON D', 'ajcodalify@gmail.com', '953-330-769', 'TEst', '2024-05-09 10:50:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `reference_no` varchar(15) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `garment_type` varchar(50) NOT NULL,
  `size_width` varchar(10) NOT NULL,
  `size_height` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `notes` varchar(555) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_no`, `student_id`, `amount`, `garment_type`, `size_width`, `size_height`, `gender`, `notes`, `status`, `created`, `modified`) VALUES
(31, 'GTMS003100097', '11b146', '300.00', 'Uniform Men', '', '', 'female', '', 'Pending', '2024-05-10 07:08:13', '2024-05-09 23:08:13'),
(32, 'GTMS001600575', '11b146', '300.00', 'Uniform Men', '', '', 'female', '', 'Pending', '2024-05-10 07:08:14', '2024-05-09 23:08:14'),
(33, 'GTMS003800635', '11b146', '300.00', 'Uniform Men', '', '', 'female', '', 'Pending', '2024-05-10 07:08:50', '2024-05-09 23:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `order_id` varchar(50) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `reference_no` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `student_id`, `order_id`, `payment_status`, `status`, `reference_no`, `created`, `modified`) VALUES
(1, '22b0959', '0120921', 'FULLY PAID', 'READY TO PICK-UP', 'GMTS09533307696', '2024-04-29 19:31:49', '2024-04-29 11:31:49'),
(2, '22b0959', '0120921', 'PARTIAL PAID', 'READY TO PICK-UP', 'GMTS09533307696', '2024-04-29 19:31:49', '2024-04-29 11:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `student_id` varchar(25) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email_address` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `academic_year` varchar(255) NOT NULL,
  `access_level` varchar(25) NOT NULL,
  `image_profile` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `firstname`, `lastname`, `gender`, `email_address`, `password`, `contact_no`, `address`, `course`, `academic_year`, `access_level`, `image_profile`, `created`, `modified`) VALUES
(1, '22b0959', 'willdell ', 'bravo', '', 'student_gmts@gmail.com', '$2y$10$RMDuRnTJba0Mz0.orByD3.TQNtL6caw3OehRz/fipMFvNtMK5nIfO', '09533307696', '', '', '', 'Student', '', '2024-03-22 17:32:03', '2024-04-28 17:13:27'),
(2, '22b093', 'Alexisss', 'Dumale', '', 'admin_gtms@gmail.com', '$2y$10$fVjiVlbUg8IyLhRjvKRiA.z5JagJXWfMxLxdQYU4ZVvuYpcdu63xi', '', '', '', '', 'Admin', '', '2024-03-22 11:45:41', '2024-04-28 17:13:27'),
(39, '11b146', 'ALEXIS', 'DUMALE', 'female', 'ajcodalify@gmail.com', '$2y$10$fVjiVlbUg8IyLhRjvKRiA.z5JagJXWfMxLxdQYU4ZVvuYpcdu63xi', '+63953330769', 'ANAPOG-SIBUCAO', '3', '1', 'Student', 'ef2489c475dfbd7931a807bcb8dc10db8d4ae0de-Admin2.jpg', '2024-04-29 10:39:41', '2024-04-29 19:25:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_year`
--
ALTER TABLE `academic_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_year`
--
ALTER TABLE `academic_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
