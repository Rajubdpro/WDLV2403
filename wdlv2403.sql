-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2025 at 06:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdlv2403`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int NOT NULL,
  `designation` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `watermark` varchar(100) NOT NULL,
  `short_des` text NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `designation`, `name`, `watermark`, `short_des`, `photo`) VALUES
(1, 'Web Developer', 'Raju Ahmed', 'raju', ' I am a web developer with years of experience in creating and managing websites. My skills include coding in HTML, CSS, and JavaScript, as well as working with CMSs like WordPress and Drupal.', '67a736a9ad212.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int NOT NULL,
  `header_logo` varchar(255) NOT NULL,
  `footer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `header_logo`, `footer_logo`) VALUES
(1, '67a736135bc87.png', '67a7369469530.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `status`, `created_at`) VALUES
(23, 'Raju Ahmed', 'rajubdpro@gmail.com', 'Apply for test', 'Hello, this is test', 0, '2025-02-08'),
(24, 'Shamim Hasan', 'shamimbdpro@gmail.com', 'Apply for test', 'I need your help can you help me', 1, '2025-02-08'),
(25, 'Mamun Rashid', 'mamunbdpro@gmail.com', 'Need Help', 'I need help', 0, '2025-02-08'),
(26, 'Rahim', 'rahim@gmail.com', 'Need Help', 'Hello, can you help me!', 0, '2025-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `category`, `photo`, `status`) VALUES
(14, 'Website Design', 'Wordpress', '67a0fceff1189.jpg', '1'),
(15, 'Website Development', 'Wordpress', '67a0fd476e9a7.png', '1'),
(16, 'Grapices Design', 'Canva', '67a0fd628e993.JPG', '1'),
(17, 'Video Editing', 'Cap Cut', '67a0fdca89ea4.jpg', '1'),
(18, 'Content Writing ', 'Content', '67a0fdf5ecaf6.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `description`, `status`) VALUES
(1, 'Website Design test', 'Web design services', 1),
(3, 'Herrod Blair', 'Officiis Nam consequ', 1),
(4, 'Jillian Chaney', 'Aut similique esse d', 1),
(5, 'Lawrence Lambert', 'Commodo tenetur quia', 1),
(6, 'Amethyst Higgins', 'Earum quia eu dolor ', 1),
(8, 'Alfreda Avery', 'Quae voluptatem qui', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `percentage` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `percentage`, `status`) VALUES
(1, 'Web Design', 73, 1),
(2, 'Web Development', 90, 1),
(3, 'Ui & Ux', 58, 1),
(15, 'Content Writing', 79, 1),
(18, 'Digital Marketing', 56, 1),
(24, 'Grapices Design', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `photo`) VALUES
(1, 'Raju Ahmed', 'rajubdpro@gmail.com', '$2y$10$MhVTR/UEpoBAidmlWHoGuOotmKmsCsroTfAEazfJ.AEWUFyA1J7WO', '679e52d6745262.63692238.jpg'),
(46, 'Deacon Kline', 'xeqinumobu@mailinator.com', '$2y$10$k6bZSuuHB2RtHkJkf/07k.AqiEenWKYudku5XjgJlmVqaJeGwPQSW', NULL),
(47, 'Bernard Mcmahon', 'witukaxyd@mailinator.com', '$2y$10$xnQ9oxXeTZE/OvIJ.vmvMu46/G/ysXRZ3GViOMKnuZgn1NIsour2C', NULL),
(51, 'Kenyon Sellers', 'vyly@mailinator.com', '$2y$10$4BHz6lHG8t4wdA.FEeRvqOevMQpb58vRSKBSS/mMZ/GLncW9Gh8nS', NULL),
(58, 'Yen Barr', 'ritawisoc@mailinator.com', '$2y$10$N8MOHYskAmHZI4mVLZEecuNUcsxkYY7ceSjCrtScCsDWbeBd0RAO.', NULL),
(59, 'Vance Sheppard', 'bupesurovi@mailinator.com', '$2y$10$SOl5G1YkYlYG7GeQkPDiperXKnS16HdzKTffnGY7GyIfcmsF/LFk2', NULL),
(60, 'Armando Santana', 'zisokah@mailinator.com', '$2y$10$IKmh0H65xwhq6cSqVXgo2OTbfETCKfWh7P8HNV.Y3XPVyQE1EepRO', NULL),
(61, 'Velma Chavez', 'jinyq@mailinator.com', '$2y$10$UPxy1gbKk5pq3UcxCH3tRu7GucUAGhrwnfcKujhwkUSCtSO4b0Q3i', NULL),
(62, 'Phoebe Rasmussen', 'tahasap@mailinator.com', '$2y$10$K4XqYrC8HSZc8DezKRr4eea0QeoFsnrzJrOcfat64PZ8t1XLZes/6', NULL),
(63, 'Maite Wilcox', 'wikesajasy@mailinator.com', '$2y$10$xAwC0IKAf3EWyqvNEjkWLOLkHXxqoBBKZoRXJJz9PnfgDIEJfKKLu', NULL),
(64, 'Nadine Vaughn', 'tikoc@mailinator.com', '$2y$10$jfNsr/RZQyFeHmuWKXUX0e4VWDRHBNDJMUQaaHNX3X8BSUEqBj40O', NULL),
(65, 'Ross Mack', 'leqylyketu@mailinator.com', '$2y$10$0zf3x9ZYfG6uQQqgb5SxP.16xGy1GwddYjMYzNIx2JevU4sXczTme', NULL),
(66, 'Wesley Lane', 'figuza@mailinator.com', '$2y$10$34exlxLD0OrzlkFECm4hmeawflE2N9jtH0bSceQrwjIFEhYHrdVn2', NULL),
(67, 'Aidan Underwood', 'henehulil@mailinator.com', '$2y$10$NdlWv3sOT1fQCh02dfnlbOdxkXSnUo8.leYr1M1yMfqjG1MPkEPcO', NULL),
(68, 'Hasad Flowers', 'fohuba@mailinator.com', '$2y$10$63InQgmh2yCQdrbFcR1Y8ekULBBhhSwMQOnOmPNUn27xxXWJXxKJK', NULL),
(69, 'Noah Hull', 'xuzulyzynu@mailinator.com', '$2y$10$jHD/qDtwDMEol8t448jQqujUsMgjBmrH0Z8ro7JUWsHGFf6D7KTDC', NULL),
(70, 'Indira Gregory', 'pypequsu@mailinator.com', '$2y$10$GbFmVQj6MbKvnWBuwf3RbuxgM07ZvxBXccoHA6kIM7rnMLM0KE4u6', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
