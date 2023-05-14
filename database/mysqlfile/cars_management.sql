-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2023 at 04:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars_management`
--

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
(7, '2023_05_10_155946_add_detail_to_users_table', 2),
(96, '2014_10_12_100000_create_password_resets_table', 3),
(97, '2019_08_19_000000_create_failed_jobs_table', 3),
(98, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(99, '2023_05_10_154031_create_users_table', 3),
(100, '2023_05_13_015911_add_details_to_users_table', 3);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `email_verified_at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`, `role_as`) VALUES
(1, 'admin', 'phuc@gmail.com', '1234567898', NULL, '$2y$10$FuqV5eBB27bCpcAHvomrsup5nUPl9jKvkkB7mMvjR/Z8/mChd2W5G', 'true', NULL, '2023-05-13 05:51:02', '2023-05-13 05:51:02', 1),
(2, 'mgerlach', 'blarson@example.org', '1-423-624-4636', NULL, '$2y$10$lbrv2M8jWYEVzh6oJZNME..rYeugMbOBRHtrOA2zD56lAa2dqWdla', 'true', NULL, NULL, NULL, 0),
(3, 'bode.immanuel', 'sgreenholt@example.net', '+1-626-896-0692', NULL, '$2y$10$Ev/xGCYtxNCpKBsRwxGZR.QOwZC7tTS/0mszkYa1r1ASMJbr1vD/a', 'true', NULL, NULL, NULL, 0),
(4, 'okuneva.neal', 'dedric.leannon@example.org', '1-743-457-6172', NULL, '$2y$10$stgeNwiNiX4w2crl1.K/..RPEBShuxuiQc5WTOkSDMOVnPNQE4pw.', 'true', NULL, NULL, NULL, 0),
(5, 'vonrueden.rick', 'windler.marshall@example.com', '+1 (740) 887-8893', NULL, '$2y$10$79dyumQRCa9SeTXYakqDs.qVsw32RZYrG6WFeSvWVtR67CYMivFjm', 'true', NULL, NULL, NULL, 0),
(6, 'qschinner', 'fkrajcik@example.net', '+1-661-445-7732', NULL, '$2y$10$uG85oZSWFEtf0453xOKMpeGxelJ/SoZXn9AuZPIeNZYYveJtQk7vq', 'true', NULL, NULL, NULL, 0),
(7, 'hullrich', 'davion63@example.org', '972-957-4633', NULL, '$2y$10$m10GRRqD07OJ3dKR.F4gsO2Xw9kNXAZHMR/NAKExNaWSVUcuJHUKi', 'true', NULL, NULL, NULL, 0),
(8, 'alena.torp', 'trau@example.net', '364-265-6614', NULL, '$2y$10$blqTwwRB1omvSHNoO.zX6O3K7MA3sWbx49/Yx7UWX0W3Z1oxnyt7e', 'true', NULL, NULL, NULL, 0),
(9, 'tboyle', 'cstehr@example.com', '+1 (754) 695-1604', NULL, '$2y$10$ouTfmW9VCC6UxJVvIUw/pO9hxDpgC5zHw1hioEhYtAFow4RjV21q2', 'true', NULL, NULL, NULL, 0),
(10, 'rippin.sally', 'gusikowski.jovany@example.net', '419.219.5085', NULL, '$2y$10$jqaru5wsoKFrw/l0bO5B6Orf5igiXkRNfPPJsqhq0I3LgBeYX4ny6', 'true', NULL, NULL, NULL, 0),
(11, 'hirthe.osvaldo', 'cathrine93@example.org', '+1-520-916-6936', NULL, '$2y$10$gcVwKh6OCIgeNF/Yzr.fl.7tRmJIZkP4FYWG03btLxAVhPALIFP26', 'true', NULL, NULL, NULL, 0),
(12, 'ywunsch', 'kub.anabelle@example.org', '732-929-1147', NULL, '$2y$10$5McVz6B5JExyaH/PB1aMVeO8bKk7djBgx8GjQ.eE1wvlfKRFvkcke', 'true', NULL, NULL, NULL, 0),
(13, 'jay16', 'cali.douglas@example.com', '(972) 461-1986', NULL, '$2y$10$MdBMKsZvqqid9tuMkxk1R.E.owvir4CO3HiDOGvfyNSHyQ.IIip5S', 'true', NULL, NULL, NULL, 0),
(15, 'amanda.osinski', 'christiana77@example.net', '(520) 784-5089', NULL, '$2y$10$k6WsBu4ZuFOZC3Jv5nkfzu7mr9DGP8DBBSIFnxm6Y56FLmFnkWyoG', 'true', NULL, NULL, NULL, 0),
(16, 'laila.blanda', 'jett19@example.org', '+1 (929) 406-0129', NULL, '$2y$10$CAGoAYgxK7zQXY11jd9CPOsAe9j8NJDu0GZ3BcE37phC1qKe4tKki', 'true', NULL, NULL, NULL, 0),
(17, 'wilson.schaefer', 'jwehner@example.org', '203.308.5940', NULL, '$2y$10$wzN03pw3BEpSrHwB8dThxOx0a4RP55yo.u8L0SIIIOdZSWnm2hmuu', 'true', NULL, NULL, NULL, 0),
(18, 'ubayer', 'gleannon@example.net', '+1.915.981.0917', NULL, '$2y$10$NoTGzcUtgHD844Mr/VL9UeoBfvC4gJE0l7WwEDZ49oLq4SqRgjq4C', 'true', NULL, NULL, NULL, 0),
(19, 'myrtie72', 'gretchen.heidenreich@example.org', '(480) 947-6284', NULL, '$2y$10$N2Er6z4Oo26rcEVj0MSNGeNwYZhmAziSkSIxfi10zN4EvxFLm1eFu', 'true', NULL, NULL, NULL, 0),
(20, 'rhea.abernathy', 'elvie.morar@example.net', '1-820-641-1936', NULL, '$2y$10$q8ARkHM1oEJ6qe2bYc7.GON2dhowzYtCBYjMlqGWdM2.Lm30VBF4C', 'true', NULL, NULL, NULL, 0),
(22, 'mertz.kenyatta', 'jcarroll@example.net', '+19182797664', NULL, '$2y$10$c59JECyjD7hm/PDNWpMPkeGUXejqKoUxPvdeIebpoe1H8Q3zGZ4l.', 'true', NULL, NULL, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
