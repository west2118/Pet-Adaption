-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2025 at 04:01 AM
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
-- Database: `petadaption_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pets`
--

CREATE TABLE `tbl_pets` (
  `pet_id` int(11) NOT NULL,
  `petName` varchar(255) NOT NULL,
  `petType` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `vaccinated` tinyint(1) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_added` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pets`
--

INSERT INTO `tbl_pets` (`pet_id`, `petName`, `petType`, `breed`, `age`, `gender`, `description`, `photo`, `vaccinated`, `status`, `date_added`) VALUES
(1, 'Buddy', 'dog', 'Golden Retriever', '3 years old', 'male', 'Friendly and energetic dog who loves playing fetch and enjoys being around people.               ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsN7dZrWMxZNc9ySZRwWlztSZjsV4TlSVCFa77QrTgen01wafzLNF7xacAHb4XUtMLSIm2yRhQDASqHdOlIPCYLhXSIIuQ8sKs5QFIXA&s=10', 1, 'available', '2025-12-17'),
(2, 'Luna', 'cat', 'Persian', '2 years old', 'female', 'Calm and affectionate cat that enjoys quiet environments and gentle petting.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR73vrKgTAIPDvewfxJENo3XptLGFATb5bqkqKxBsCl4Fw6ut5IIeTc0FCn034X9dEKpDvAi0kesFaTzguV7PSnuaXGoOf_SYD2lr92aBg&s=10', 1, 'available', '2025-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requests`
--

CREATE TABLE `tbl_requests` (
  `request_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `homeCity` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `petExperience` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `pet_id` int(11) NOT NULL,
  `dateSubmitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ref_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_requests`
--

INSERT INTO `tbl_requests` (`request_id`, `firstName`, `lastName`, `homeCity`, `email`, `status`, `contact`, `petExperience`, `message`, `pet_id`, `dateSubmitted`, `ref_number`) VALUES
(14, 'Dustine1', 'Joshua', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', 'wew', 'wewe', 1, '2025-12-18 04:45:46', 'PA-2025-14'),
(15, 'Dustine1', 'Joshua', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', 'wewe', 'wewew', 2, '2025-12-18 04:50:55', 'PA-2025-15'),
(16, 'Dustine1', 'Joshua', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', '123', '123', 2, '2025-12-18 04:54:03', 'PA-2025-16'),
(17, 'wewew', 'wewew', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', 'qweqw', 'qweqwe', 2, '2025-12-18 05:01:16', 'PA-2025-17'),
(18, 'Dustine1', 'Joshua', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', 'wewe', 'wewew', 2, '2025-12-20 02:59:14', 'PA-2025-18'),
(19, 'Dustine1', 'Gordon', 'Parañaque city', 'johntapang18@gmail.com', 'pending', '09760810110', 'ewew', 'wewew', 2, '2025-12-20 02:59:40', 'PA-2025-19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dateCreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstName`, `lastName`, `email`, `password`, `dateCreated`) VALUES
(1, 'Klyde', 'Ramos', 'johntapang18@gmail.com', '$2y$10$CysgiN3M29LRbUGMiaTaEu44FSWg45mLklifeC23aTnqEivMlNsQ.', '2025-12-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  ADD PRIMARY KEY (`pet_id`);

--
-- Indexes for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_pets`
--
ALTER TABLE `tbl_pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_requests`
--
ALTER TABLE `tbl_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
