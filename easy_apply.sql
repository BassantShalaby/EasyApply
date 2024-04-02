-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2024 at 09:23 PM
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
-- Database: `easy_apply`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `experience` enum('entry-level','junior','mid-level','senior','lead') DEFAULT NULL,
  `exp_years` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `first_name`, `last_name`, `birthdate`, `email`, `country_id`, `city_id`, `password`, `bio`, `cv`, `picture`, `phone`, `title`, `experience`, `exp_years`, `gender`, `token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', '1990-05-15', 'john.doe@example.com', 1, 1, 'password', 'Experienced software engineer', 'cv.pdf', 'john.jpg', '+123456789', 'Software Engineer', 'senior', 5, 'male', '0', '2024-04-01 08:59:16', '2024-04-01 08:59:16'),
(2, 'Jane', 'Smith', '1995-08-20', 'jane.smith@example.com', 2, 2, 'password', 'Recent graduate seeking entry-level position', 'resume.doc', 'jane.jpg', '+987654321', 'Graduate', 'entry-level', 0, 'female', '0', '2024-04-01 08:59:16', '2024-04-01 08:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `applicant_skills`
--

CREATE TABLE `applicant_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicant_skills`
--

INSERT INTO `applicant_skills` (`id`, `applicant_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-04-01 09:01:11', '2024-04-01 09:01:11'),
(2, 1, 2, '2024-04-01 09:01:11', '2024-04-01 09:01:11'),
(3, 2, 4, '2024-04-01 09:01:11', '2024-04-01 09:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `applies`
--

CREATE TABLE `applies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `applicant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `job_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('applied','pending','shortlisted','rejected') DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applies`
--

INSERT INTO `applies` (`id`, `applicant_id`, `job_id`, `status`, `reason`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'pending', NULL, '2024-04-01 09:01:11', '2024-04-01 09:01:11'),
(2, 2, 2, 'applied', NULL, '2024-04-01 09:01:11', '2024-04-01 09:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IT', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(2, 'Finance', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(3, 'Consulting', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(4, 'Healthcare', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(5, 'Technology', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(6, 'Manufacturing', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(7, 'Retail', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(8, 'Hospitality', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(9, 'Automotive', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(10, 'Construction', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(11, 'Education', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(12, 'Entertainment', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(13, 'Food & Beverage', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(14, 'Real Estate', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(15, 'Transportation', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(16, 'Utilities', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(17, 'Telecommunications', '2024-04-01 08:55:00', '2024-04-01 08:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'New York', 1, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(2, 'Los Angeles', 1, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(3, 'Toronto', 2, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(4, 'Vancouver', 2, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(5, 'London', 3, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(6, 'Manchester', 3, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(7, 'Berlin', 4, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(8, 'Munich', 4, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(9, 'Paris', 5, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(10, 'Marseille', 5, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(11, 'Rome', 6, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(12, 'Milan', 6, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(13, 'Cairo', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(14, 'Alexandria', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(15, 'Luxor', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(16, 'Aswan', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(17, 'Giza', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(18, 'Sharm El Sheikh', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(19, 'Hurghada', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(20, 'Dahab', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(21, 'Asyut', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(22, 'Fayoum', 7, '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(23, 'Cairo', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(24, 'Alexandria', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(25, 'Giza', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(26, 'Port Said', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(27, 'Suez', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(28, 'Luxor', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(29, 'Asyut', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(30, 'Mansoura', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(31, 'Al-Minya', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(32, 'Hurghada', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(33, 'Qena', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(34, 'Sohag', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(35, 'Beni Suef', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(36, 'Aswan', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(37, 'Faiyum', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(38, 'Damietta', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(39, 'Ismailia', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(40, 'Al-Mahalla Al-Kubra', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(41, 'Kafr El Sheikh', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(42, 'Matruh', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(43, 'Port said', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43'),
(44, 'Sohag', 7, '2024-03-31 08:36:43', '2024-03-31 08:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'United States', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(2, 'Canada', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(3, 'United Kingdom', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(4, 'Germany', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(5, 'France', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(6, 'Italy', '2024-03-31 08:32:51', '2024-03-31 08:32:51'),
(7, 'Egypt', '2024-03-31 08:32:51', '2024-03-31 08:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `org_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `open_vacancies` smallint(6) DEFAULT NULL,
  `hired` smallint(6) DEFAULT NULL,
  `applied` smallint(6) DEFAULT NULL,
  `job_status` enum('Closed','Open') DEFAULT NULL,
  `level` enum('Entry Level','Junior','Mid Level','Senior','Lead') DEFAULT NULL,
  `exp_years` tinyint(4) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `location_type` enum('Remote','Hybrid','Onsite') DEFAULT NULL,
  `salary_max` decimal(10,2) DEFAULT NULL,
  `salary_min` decimal(10,2) DEFAULT NULL,
  `gender` enum('Male','Female','Any') DEFAULT NULL,
  `emp_type` enum('Part Time','Full Time') DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiry_date` timestamp GENERATED ALWAYS AS (`created_at` + interval 5 month) VIRTUAL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `org_id`, `title`, `description`, `open_vacancies`, `hired`, `applied`, `job_status`, `level`, `exp_years`, `country_id`, `city_id`, `location_type`, `salary_max`, `salary_min`, `gender`, `emp_type`, `category_id`, `requirements`, `created_at`, `updated_at`) VALUES
(1, 1, 'Software Engineer', 'Develop and maintain software applications', 3, 1, 10, 'Open', '', 3, 1, 1, 'Remote', 80000.00, 60000.00, 'Any', '', 1, NULL, '2024-04-01 08:59:16', '2024-04-01 08:59:16'),
(2, 2, 'Financial Analyst', 'Analyze financial data and prepare reports', 2, 0, 5, 'Open', 'Junior', 1, 3, 3, '', 70000.00, 50000.00, 'Any', '', 2, NULL, '2024-04-01 08:59:16', '2024-04-01 08:59:16');

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `industry` varchar(100) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `info` text DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `email`, `password`, `phone`, `link`, `country_id`, `city_id`, `industry`, `logo`, `info`, `token`, `created_at`, `updated_at`) VALUES
(1, 'Tech Solutions Inc.', 'info@techsolutions.com', 'password1', '+123456789', NULL, 1, 1, 'Technology', 'logo1.png', 'Leading technology solutions provider', '', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(2, 'Global Enterprises', 'contact@globent.com', 'password2', '+987654321', NULL, 2, 2, 'Consulting', 'logo2.png', 'International consulting firm', '', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(3, 'ABC Corporation', 'info@abccorp.com', 'password3', '+1122334455', NULL, 3, 3, 'Finance', 'logo3.png', 'Financial services company', '', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(4, 'ssssssss', 'testtt@gmail.com', '$2y$10$Ob097gzYUp8nA', '+12345678997690', 'http://www.easyapply.local/org-create', 5, 9, 'Hospitality', 'uploads/Screenshot_107.png', 'ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss', '', '2024-04-01 09:48:29', '2024-04-01 09:48:29'),
(5, 'Instagram', 'insta@insta.com', '$2y$10$3mTAiT.CbppKq', '+12345678997690', 'http://www.easyapply.local/org-create', 5, 10, 'Entertainment', 'uploads/Screenshot_109.png', 'insta aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'e519bc320c11584e0957a1fb870c3928', '2024-04-01 15:26:56', '2024-04-01 15:26:56'),
(7, 'mobile', 'heba@gmail.com', '$2y$10$BF7Bq3gZV/Ef5', '+12345678997690', 'http://www.easyapply.local/org-create', 4, 7, 'Real Estate', 'uploads/Screenshot_108.png', 'dwerghtrytrhegsfaaaaaffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffheba@gmail.com', '29ea53f9fa3de6adb18129b74b47683e', '2024-04-01 15:34:42', '2024-04-01 15:34:42'),
(8, 'faceboocebook.com', 'facebook@facebook.com', '$2y$10$eyZpM0J7XgLUfITeQ98kI.AIRgzEud/N28Gzd0VqQu5u8vt/QnfUO', '+12345678997690', 'https://www.facebook.com/', 3, 6, 'Entertainment', 'uploads/download (3).png', 'facebook@facebook.comfacebook@facebook.comfacebook@facebook.comfacebook@facebook.comfacebook@facebook.comfacebook@facebook.com', '7153044618f7f55e9467c5093fd0959a', '2024-04-01 15:45:11', '2024-04-01 15:45:11');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Programming', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(2, 'Database Management', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(3, 'Project Management', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(4, 'Communication', '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(5, 'Problem Solving', '2024-04-01 08:55:00', '2024-04-01 08:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `skills_categories`
--

CREATE TABLE `skills_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills_categories`
--

INSERT INTO `skills_categories` (`id`, `skill_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(2, 2, 1, '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(3, 3, 1, '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(4, 4, 2, '2024-04-01 08:55:00', '2024-04-01 08:55:00'),
(5, 5, 3, '2024-04-01 08:55:00', '2024-04-01 08:55:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `skill_id` (`skill_id`);

--
-- Indexes for table `applies`
--
ALTER TABLE `applies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `org_id` (`org_id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills_categories`
--
ALTER TABLE `skills_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_id` (`skill_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `applies`
--
ALTER TABLE `applies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills_categories`
--
ALTER TABLE `skills_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `applicant_skills`
--
ALTER TABLE `applicant_skills`
  ADD CONSTRAINT `applicant_skills_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_skills_ibfk_2` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `applies`
--
ALTER TABLE `applies`
  ADD CONSTRAINT `applies_ibfk_1` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applies_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`org_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_4` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizations`
--
ALTER TABLE `organizations`
  ADD CONSTRAINT `organizations_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `organizations_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `skills_categories`
--
ALTER TABLE `skills_categories`
  ADD CONSTRAINT `skills_categories_ibfk_1` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skills_categories_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
