-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2024 at 03:55 PM
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
-- Database: `foodie_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodie_posts`
--

CREATE TABLE `foodie_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_posts`
--

INSERT INTO `foodie_posts` (`id`, `user_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 7, 'Hello World!', '2024-07-11 13:54:59', '2024-07-11 13:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `foodie_users`
--

CREATE TABLE `foodie_users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_pic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodie_users`
--

INSERT INTO `foodie_users` (`id`, `fullname`, `username`, `pw`, `email`, `profile_pic`) VALUES
(7, 'Anthony Rosales', 'anthony_user', '$2y$10$5HhKfjtdSJiIU/hAHo0iZOaTY4lH9Qnt0aC7ZQ3vRDg86jHZHEl3u', 'anthonychristian@gmail.com', 'uploads/stock1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `foodie_users`
--
ALTER TABLE `foodie_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `foodie_users`
--
ALTER TABLE `foodie_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foodie_posts`
--
ALTER TABLE `foodie_posts`
  ADD CONSTRAINT `foodie_posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `foodie_users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
