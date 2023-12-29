-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2023 at 01:23 PM
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
-- Database: `carpooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auto`
--

CREATE TABLE `tbl_auto` (
  `auto_id` int(11) NOT NULL,
  `auto_title` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `fule_id` int(11) NOT NULL,
  `transmission_id` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `model_no` varchar(255) NOT NULL,
  `descriptions` text NOT NULL,
  `auto_img` varchar(255) NOT NULL,
  `rent_per_hour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_auto`
--

INSERT INTO `tbl_auto` (`auto_id`, `auto_title`, `brand_id`, `fule_id`, `transmission_id`, `seats`, `model_no`, `descriptions`, `auto_img`, `rent_per_hour`) VALUES
(1, 'cheverolet', 1, 1, 1, 4, 'bc2023', 'dshfhsfshfhf', 'uploads/auto/car-1.jpg', 200);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `pickup_city_id` int(11) NOT NULL,
  `pickup_city_area_id` int(11) NOT NULL,
  `dropoff_city_id` int(11) NOT NULL,
  `dropoff_city_area_id` int(11) NOT NULL,
  `from_date` varchar(20) NOT NULL,
  `to_date` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `pickup_time` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`book_id`, `user_id`, `auto_id`, `pickup_city_id`, `pickup_city_area_id`, `dropoff_city_id`, `dropoff_city_area_id`, `from_date`, `to_date`, `message`, `pickup_time`, `status`) VALUES
(1, 2, 1, 1, 1, 1, 2, '12/26/2023', '12/26/2023', 'jdfjhusd', '01:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `created_at`) VALUES
(1, 'bajaj', '2023-12-23 07:14:11'),
(2, 'mahindra', '2023-12-23 07:14:25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cities`
--

CREATE TABLE `tbl_cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cities`
--

INSERT INTO `tbl_cities` (`city_id`, `city_name`) VALUES
(1, 'rajkot'),
(2, 'surat');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city_area`
--

CREATE TABLE `tbl_city_area` (
  `area_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_city_area`
--

INSERT INTO `tbl_city_area` (`area_id`, `city_id`, `area_name`) VALUES
(1, 1, 'kalawad road'),
(2, 2, '150 feet road');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_features`
--

CREATE TABLE `tbl_features` (
  `feature_id` int(11) NOT NULL,
  `auto_id` int(11) NOT NULL,
  `feature_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_features`
--

INSERT INTO `tbl_features` (`feature_id`, `auto_id`, `feature_name`) VALUES
(1, 1, 'music'),
(2, 1, 'Ac'),
(3, 1, 'heater');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fule_types`
--

CREATE TABLE `tbl_fule_types` (
  `fule_id` int(11) NOT NULL,
  `fule_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fule_types`
--

INSERT INTO `tbl_fule_types` (`fule_id`, `fule_name`, `created_at`) VALUES
(1, 'petrol', '2023-12-23 07:17:18'),
(2, 'desiel', '2023-12-23 07:17:18'),
(3, 'cnc', '2023-12-23 07:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `permission_id` int(11) NOT NULL,
  `permission_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`permission_id`, `permission_name`) VALUES
(1, 'index_access');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`role_id`, `role_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role_permission`
--

CREATE TABLE `tbl_role_permission` (
  `role_permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role_permission`
--

INSERT INTO `tbl_role_permission` (`role_permission_id`, `role_id`, `permission_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transmission_type`
--

CREATE TABLE `tbl_transmission_type` (
  `transmission_id` int(11) NOT NULL,
  `transmission_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transmission_type`
--

INSERT INTO `tbl_transmission_type` (`transmission_id`, `transmission_name`, `created_at`) VALUES
(1, 'gear', '2023-12-23 11:28:04'),
(2, 'gearless', '2023-12-23 11:28:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `role_id`, `user_name`, `mobile_no`, `email`, `password`, `created_at`) VALUES
(1, 1, 'admin', 12356489562, 'admin@gmail.com', '123', '2023-12-22 13:53:47'),
(2, 2, 'payal', 9909612140, 'payal@gmail.com', '123', '2023-12-23 12:07:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auto`
--
ALTER TABLE `tbl_auto`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `pickup_city_id` (`pickup_city_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pickup_city_area_id` (`pickup_city_area_id`),
  ADD KEY `dropoff_city_id` (`dropoff_city_id`),
  ADD KEY `dropoff_city_area_id` (`dropoff_city_area_id`);

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `tbl_city_area`
--
ALTER TABLE `tbl_city_area`
  ADD PRIMARY KEY (`area_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD PRIMARY KEY (`feature_id`),
  ADD KEY `auto_id` (`auto_id`);

--
-- Indexes for table `tbl_fule_types`
--
ALTER TABLE `tbl_fule_types`
  ADD PRIMARY KEY (`fule_id`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD PRIMARY KEY (`role_permission_id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `permission_id` (`permission_id`);

--
-- Indexes for table `tbl_transmission_type`
--
ALTER TABLE `tbl_transmission_type`
  ADD PRIMARY KEY (`transmission_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auto`
--
ALTER TABLE `tbl_auto`
  MODIFY `auto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cities`
--
ALTER TABLE `tbl_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_city_area`
--
ALTER TABLE `tbl_city_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_features`
--
ALTER TABLE `tbl_features`
  MODIFY `feature_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_fule_types`
--
ALTER TABLE `tbl_fule_types`
  MODIFY `fule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  MODIFY `role_permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_transmission_type`
--
ALTER TABLE `tbl_transmission_type`
  MODIFY `transmission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `dropoff_city_area_id` FOREIGN KEY (`dropoff_city_area_id`) REFERENCES `tbl_city_area` (`area_id`),
  ADD CONSTRAINT `dropoff_city_id` FOREIGN KEY (`dropoff_city_id`) REFERENCES `tbl_cities` (`city_id`),
  ADD CONSTRAINT `pickup_city_area_id` FOREIGN KEY (`pickup_city_area_id`) REFERENCES `tbl_city_area` (`area_id`),
  ADD CONSTRAINT `pickup_city_id` FOREIGN KEY (`pickup_city_id`) REFERENCES `tbl_cities` (`city_id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`);

--
-- Constraints for table `tbl_city_area`
--
ALTER TABLE `tbl_city_area`
  ADD CONSTRAINT `city_id` FOREIGN KEY (`city_id`) REFERENCES `tbl_cities` (`city_id`);

--
-- Constraints for table `tbl_features`
--
ALTER TABLE `tbl_features`
  ADD CONSTRAINT `auto_id` FOREIGN KEY (`auto_id`) REFERENCES `tbl_auto` (`auto_id`);

--
-- Constraints for table `tbl_role_permission`
--
ALTER TABLE `tbl_role_permission`
  ADD CONSTRAINT `permission_id` FOREIGN KEY (`permission_id`) REFERENCES `tbl_permission` (`permission_id`),
  ADD CONSTRAINT `role_id` FOREIGN KEY (`role_id`) REFERENCES `tbl_roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
