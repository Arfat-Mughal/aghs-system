-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2021 at 08:16 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aghs`
--

-- --------------------------------------------------------

--
-- Table structure for table `datesheets`
--

CREATE TABLE `datesheets` (
  `id` int(11) NOT NULL,
  `slip_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `date` varchar(150) NOT NULL,
  `reporting` varchar(150) NOT NULL,
  `start_time` varchar(150) NOT NULL,
  `end_time` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datesheets`
--

INSERT INTO `datesheets` (`id`, `slip_id`, `subject_id`, `date`, `reporting`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2021-10-12', '03:57', '02:56', '02:56', '2021-09-30 14:53:31', '2021-09-30 14:53:31'),
(2, 1, 2, '2021-09-27', '00:56', '02:55', '02:56', '2021-09-30 14:53:31', '2021-09-30 14:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Play Group', '2021-09-20 17:41:45', NULL),
(2, 'Nursery', '2021-09-20 17:41:45', NULL),
(3, 'Prep', '2021-09-20 17:42:29', NULL),
(4, '1st', '2021-09-20 17:42:29', NULL),
(5, '2nd', '2021-09-20 17:42:51', NULL),
(6, '3rd', '2021-09-20 17:42:51', NULL),
(7, '4th', '2021-09-20 17:43:02', NULL),
(8, '5th', '2021-09-20 17:43:02', NULL),
(9, '6th', '2021-09-20 17:43:22', NULL),
(10, '7th', '2021-09-20 17:43:22', NULL),
(11, '8th', '2021-09-20 17:43:56', NULL),
(12, '9th ( Pre )', '2021-09-20 17:43:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recodes`
--

CREATE TABLE `recodes` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recodes`
--

INSERT INTO `recodes` (`id`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, 4, '2021-10-01 10:55:40', '2021-10-01 10:55:40');

-- --------------------------------------------------------

--
-- Table structure for table `recode_marks`
--

CREATE TABLE `recode_marks` (
  `id` int(11) NOT NULL,
  `recode_id` int(11) NOT NULL,
  `t_marks` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `recode_marks`
--

INSERT INTO `recode_marks` (`id`, `recode_id`, `t_marks`, `created_at`, `updated_at`, `subject_id`) VALUES
(1, 1, '50', '2021-10-01 16:17:23', '2021-10-01 10:55:40', 7),
(2, 1, '50', '2021-10-01 16:17:28', '2021-10-01 10:55:40', 5),
(3, 1, '50', '2021-10-01 16:17:32', '2021-10-01 10:55:40', 3);

-- --------------------------------------------------------

--
-- Table structure for table `slips`
--

CREATE TABLE `slips` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) NOT NULL,
  `term` varchar(150) DEFAULT NULL,
  `session` varchar(150) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slips`
--

INSERT INTO `slips` (`id`, `grade_id`, `term`, `session`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 4, 'Mid Term', '2012', 0, '2021-09-30 14:53:31', '2021-10-01 08:39:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `father_name` varchar(150) NOT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `religion` varchar(150) DEFAULT NULL,
  `b_form` varchar(30) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `cnic` varchar(20) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `quran` varchar(11) DEFAULT NULL,
  `address` longtext DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `cell` varchar(50) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `addmission_no` varchar(50) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `path` varchar(80) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `father_name`, `dob`, `email`, `religion`, `b_form`, `gender`, `cnic`, `occupation`, `quran`, `address`, `phone`, `cell`, `grade_id`, `addmission_no`, `date`, `path`, `created_at`, `updated_at`) VALUES
(1, 'Keefe Pope', 'Destiny Coleman', '1975-07-02', NULL, 'Sikhism', '35', 'Select option', '1', 'Incidunt recusandae', '1', 'Do dolor cupidatat i', '97', '1', 4, '85', '1991-06-09', 'student_profile/wxfu4IgGzAx1CFh2tGdL.jpg', '2021-09-25 06:34:47', '2021-09-25 06:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'science', '2021-09-20 19:05:11', NULL),
(2, 'islamiat', '2021-09-20 19:05:11', NULL),
(3, 'english', '2021-09-20 19:05:11', NULL),
(4, 'mathematics', '2021-09-20 19:05:11', NULL),
(5, 'urdu', '2021-09-20 19:05:11', NULL),
(6, 'geography', '2021-09-20 19:05:11', NULL),
(7, 'islamiat reading', '2021-09-20 19:05:11', NULL),
(8, 'table book', '2021-09-20 19:05:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'arfat', 'aghs9435@gmail.com', NULL, '$2y$10$NXhURdXj7Dswz9kWX8iege3sTWJz3uyu8AoPXHwYd2rpxIxcSWykG', 'F7QrBu3IhzfjjfSgvF4vuocnOtfWGFcmUfa7MTAkqJ9vS8kHXhmYzhgZC41i', '2021-08-29 03:33:10', '2021-08-29 03:33:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datesheets`
--
ALTER TABLE `datesheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recodes`
--
ALTER TABLE `recodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recode_marks`
--
ALTER TABLE `recode_marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slips`
--
ALTER TABLE `slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datesheets`
--
ALTER TABLE `datesheets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recodes`
--
ALTER TABLE `recodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `recode_marks`
--
ALTER TABLE `recode_marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slips`
--
ALTER TABLE `slips`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
