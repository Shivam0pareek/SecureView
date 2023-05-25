-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 04:51 AM
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
-- Database: `mydbnew`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(6) UNSIGNED NOT NULL,
  `filepath` varchar(100) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `filetype` varchar(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `filepath`, `filename`, `filetype`, `title`, `description`, `created_at`) VALUES
(6, 'uploads/', '1.jpg', 'jpg', 'my new pics ', 'astrophotography', '2023-05-03 03:56:37'),
(7, 'uploads/', '2.mp4', 'mp4', 'my new pics ', 'astrophotography', '2023-05-03 03:56:37'),
(8, 'uploads/', 'original_57b6d40a-9bcf-404b-9abd-e29054115731_PXL_20230321_101542101.jpg', 'jpg', 'Clouds', 'my clouds pics', '2023-05-04 15:47:01'),
(9, 'uploads/', 'PXL_20230331_105712489.jpg', 'jpg', '3 pics', 'test description', '2023-05-04 15:47:47'),
(10, 'uploads/', 'PXL_20230331_120621422~2.jpg', 'jpg', '', '', '2023-05-04 15:48:07'),
(11, 'uploads/', 'PXL_20230331_141810603~2.jpg', 'jpg', 'pixel pictures', 'my pixel pictures', '2023-05-06 03:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`username`, `email`, `password`, `created_at`, `updated_at`, `id`) VALUES
('Shivam021', 'test01@gmail.com', '$2y$10$fX2YQIGOsmJPRrySpYL6hO/8Z46UCYturewZ8p10a1/jp.zv/HuP6', '2023-05-02 12:13:36', '2023-05-02 12:13:36', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
