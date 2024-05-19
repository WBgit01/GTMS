-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2024 at 09:42 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `garment_sizes`
--

CREATE TABLE `garment_sizes` (
  `id` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `garment_type` varchar(50) NOT NULL,
  `garment_measure` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `garment_sizes`
--

INSERT INTO `garment_sizes` (`id`, `size`, `gender`, `garment_type`, `garment_measure`, `created`) VALUES
(1, 'small', 'Male', 'Polo', 'Length: 27-28 inches Width: 40-42 inches Shoulder: 16-17 inches', '2024-05-13 21:50:50'),
(2, 'medium', 'Male', 'Polo', 'Length: 28-29 inches Width: 43-44 inches Shoulder: 18-19 inches', '2024-05-13 21:51:32'),
(3, 'large', 'Male', 'Polo', 'Length: 29-30 inches Width: 45-48 inches Shoulder: 20-22 inches', '2024-05-13 21:52:53'),
(4, 'small', 'Male', 'Pants', 'Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches', '2024-05-13 21:53:45'),
(5, 'medium', 'Male', 'Pants', 'Length: 40-42 inches Hips: 42-43 inches Waist - 32-34 inches', '2024-05-13 21:54:30'),
(6, 'large', 'Male', 'Pants', 'Length: 43-45 inches Hips: 43-45 inches Waist - 34-36 inches', '2024-05-13 21:55:02'),
(7, 'small', 'Female', 'Blouse', 'Length: 21-22 inches Chest: 35-36 inches Waist: 29-30 inches', '2024-05-13 21:56:11'),
(8, 'medium', 'Female', 'Blouse', 'Length: 22-23 inches Chest: 37-38 inches Waist: 31-32 inches', '2024-05-13 21:56:53'),
(9, 'large', 'Female', 'Blouse', 'Length: 23-24 inches Chest: 39-40 inches Waist: 33-34 inches', '2024-05-13 21:57:42'),
(10, 'small', 'Female', 'Skirt', 'Length: 17-18 inches Waist: 27-28 inches', '2024-05-13 21:58:07'),
(11, 'medium', 'Female', 'Skirt', 'Length: 19-21 inches Waist: 29-31 inches', '2024-05-13 21:58:24'),
(12, 'large', 'Female', 'Skirt', 'Length: 22-24 inches Waist: 31-34 inches', '2024-05-13 21:58:52'),
(13, 'small', 'Male', 'PE Polo Shirt', 'Width: 18-19 inches Length: 24-26 inches', '2024-05-13 21:59:50'),
(14, 'medium', 'Male', 'PE Polo Shirt', 'Width: 20-21 inches Length: 27-28 inches', '2024-05-13 22:00:10'),
(15, 'large', 'male', 'PE Polo Shirt', 'Width: 22-24 inches Length: 30-31 inches', '2024-05-13 22:00:37'),
(16, 'small', 'Female', 'PE Polo Shirt', 'Width: 15-16 inches Length: 20-21 inches', '2024-05-13 22:01:23'),
(17, 'medium', 'Female', 'PE Polo Shirt', 'Width: 17-18 inches Length: 22-23 inches', '2024-05-13 22:02:15'),
(18, 'large', 'Female', 'PE Polo Shirt', 'Width: 19-20 inches Length: 23-24 inches', '2024-05-13 22:02:41'),
(19, 'small', 'both', 'PE Pants', 'Length: 34 inches Waist: 19-34 inches', '2024-05-13 22:05:45'),
(20, 'medium', 'both', 'PE Pants', 'Length: 35 inches Waist: 20-36 inches', '2024-05-13 22:06:12'),
(21, 'large', 'both', 'PE Pants', 'Length: 35 inches Waist: 20-36 inches', '2024-05-13 22:06:23'),
(22, 'large', 'both', 'PE Pants', 'Length: 36 inches Waist: 21-38 inches', '2024-05-13 22:07:08'),
(23, 'XL', 'both', 'PE Pants', 'Length: 38 inches Waist: 23-40 inches', '2024-05-13 22:07:35'),
(24, '2XL', 'both', 'PE Pants', 'Length: 40 inches Waist: 25-42 inches', '2024-05-13 22:08:06'),
(25, 'small', 'Male', 'SHS Polo', 'Length: 27-28 inches Width: 40-42 inches Shoulder: 16-17 inches', '2024-05-13 21:50:50'),
(26, 'medium', 'Male', 'SHS Polo', 'Length: 28-29 inches Width: 43-44 inches Shoulder: 18-19 inches', '2024-05-13 21:51:32'),
(27, 'large', 'Male', 'SHS Polo', 'Length: 29-30 inches Width: 45-48 inches Shoulder: 20-22 inches', '2024-05-13 21:52:53'),
(28, 'small', 'Male', 'SHS Pants', 'Length: 39-40 inches Hips: 38-41 inches Waist - 29-32 inches', '2024-05-13 21:53:45'),
(29, 'medium', 'Male', 'SHS Pants', 'Length: 40-42 inches Hips: 42-43 inches Waist - 32-34 inches', '2024-05-13 21:54:30'),
(30, 'large', 'Male', 'SHS Pants', 'Length: 43-45 inches Hips: 43-45 inches Waist - 34-36 inches', '2024-05-13 21:55:02'),
(31, 'small', 'Female', 'SHS Blouse', 'Length: 21-22 inches Chest: 35-36 inches Waist: 29-30 inches', '2024-05-13 21:56:11'),
(32, 'medium', 'Female', 'SHS Blouse', 'Length: 22-23 inches Chest: 37-38 inches Waist: 31-32 inches', '2024-05-13 21:56:53'),
(33, 'large', 'Female', 'SHS Blouse', 'Length: 23-24 inches Chest: 39-40 inches Waist: 33-34 inches', '2024-05-13 21:57:42'),
(34, 'small', 'Female', 'SHS Skirt', 'Length: 17-18 inches Waist: 27-28 inches', '2024-05-13 21:58:07'),
(35, 'medium', 'Female', 'SHS Skirt', 'Length: 19-21 inches Waist: 29-31 inches', '2024-05-13 21:58:24'),
(36, 'large', 'Female', 'SHS Skirt', 'Length: 22-24 inches Waist: 31-34 inches', '2024-05-13 21:58:52');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `garment_id` varchar(25) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `notes` varchar(555) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `reference_no`, `student_id`, `amount`, `garment_type`, `garment_id`, `gender`, `notes`, `status`, `created`, `modified`) VALUES
(60, 'GTMS002200668', '26b756', '280.00', 'Skirt', '11', 'female', '', 'Decline', '2024-05-19 02:45:16', '2024-05-18 18:45:16'),
(61, 'GTMS001900127', '26b756', '350.00', 'PE Polo Shirt', '17', 'female', '', 'Declined', '2024-05-19 02:45:16', '2024-05-18 18:45:16'),
(62, 'GTMS007600261', '26b756', '350.00', 'PE Pants', '22', 'female', '', 'Declined', '2024-05-19 02:45:17', '2024-05-18 18:45:17'),
(63, 'GTMS009700906', '26b756', '300.00', 'Blouse', '', 'female', '', 'Pending', '2024-05-19 02:45:18', '2024-05-18 18:45:18'),
(64, 'GTMS007700321', '57b519', '350.00', 'SHS Polo', '26', 'Male', '', 'Updated', '2024-05-19 08:44:13', '2024-05-19 00:44:13'),
(65, 'GTMS003900541', '57b519', '350.00', 'SHS Polo', 'Not set', 'Male', '', 'Pending', '2024-05-19 09:20:25', '2024-05-19 01:20:25'),
(66, 'GTMS005900088', '57b519', '350.00', 'SHS Polo', 'Not set', 'Male', '', 'Pending', '2024-05-19 09:21:33', '2024-05-19 01:21:33'),
(67, 'GTMS003400919', '57b519', '350.00', 'PE Pants', 'Not set', 'Both', '', 'Pending', '2024-05-19 10:14:34', '2024-05-19 02:14:34');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `profile_status` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `student_id`, `firstname`, `lastname`, `gender`, `email_address`, `password`, `contact_no`, `address`, `course`, `academic_year`, `access_level`, `image_profile`, `profile_status`, `created`, `modified`) VALUES
(1, '22b0959', 'willdell ', 'bravo', 'female', 'student_gmts@gmail.com', '$2y$10$RMDuRnTJba0Mz0.orByD3.TQNtL6caw3OehRz/fipMFvNtMK5nIfO', '09533307696', '', '', '1', 'Student', '', '', '2024-03-22 17:32:03', '2024-04-28 17:13:27'),
(2, '22b093', 'Alexisss', 'Dumale', '', 'admin_gtms@gmail.com', '$2y$10$fVjiVlbUg8IyLhRjvKRiA.z5JagJXWfMxLxdQYU4ZVvuYpcdu63xi', '', '', '', '', 'Admin', '', '', '2024-03-22 11:45:41', '2024-04-28 17:13:27'),
(39, '11b146', 'ALEXIS', 'DUMALE', 'male', 'ajcodalify@gmail.com', '$2y$10$fVjiVlbUg8IyLhRjvKRiA.z5JagJXWfMxLxdQYU4ZVvuYpcdu63xi', '+63953330769', 'ANAPOG-SIBUCAO', '3', '1', 'Student', 'ef2489c475dfbd7931a807bcb8dc10db8d4ae0de-Admin2.jpg', '', '2024-04-29 10:39:41', '2024-04-29 19:25:18'),
(40, '26b756', 'ALEXIS', 'DUMALE', 'female', 'kesha@gmail.com', '$2y$10$cVp4aDRs.iOn7UJ9aEfywe8WR/Geg66GAjlAymfoJWv/Ydcm8P9li', '999-999-9999', '30# alvarez street', '3', '1', 'Student', '', '', '2024-05-14 10:55:58', '2024-05-14 18:56:54'),
(41, '57b519', 'ALEXIS', 'DUMALE', 'Female', 'alexisdumale@gmail.com', '$2y$10$.XR4d34d/WgUqKDoilblAOAdhXZHSuERxbzfPcfeTHpDhq8gK778e', '953-330-7696', 'ANAPOG-SIBUCAO', '3', '5', 'Student', 'ef2489c475dfbd7931a807bcb8dc10db8d4ae0de-Admin2.jpg', 'Updated', '2024-05-19 00:19:57', '2024-05-19 15:19:39');

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
-- Indexes for table `garment_sizes`
--
ALTER TABLE `garment_sizes`
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
-- AUTO_INCREMENT for table `garment_sizes`
--
ALTER TABLE `garment_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
