-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 02:59 PM
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
(111, '2014_10_12_100000_create_password_resets_table', 3),
(112, '2019_08_19_000000_create_failed_jobs_table', 3),
(113, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(114, '2023_05_10_154031_create_users_table', 3),
(115, '2023_05_13_015911_add_details_to_users_table', 3);

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
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirm_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=inactive, 1=active',
  `role_as` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=user, 1=admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `address`, `email_verified_at`, `password`, `confirm_password`, `remember_token`, `created_at`, `updated_at`, `status`, `role_as`) VALUES
(3, 'zetta.reynolds', 'queen.veum@example.org', '240.435.5112', 'Uruguay', NULL, '$2y$10$y0IBYfgMEN/m0bruMEyY4.TCFVwewHD3fy6.5baV292xJ5ZIOPMCu', 'true', NULL, NULL, NULL, 0, 0),
(4, 'whessel', 'rickey.mcdermott@example.net', '(229) 266-7855', 'Haiti', NULL, '$2y$10$ORHKTihP4cIvWU5/Uex4AuTGGrpOh5jead/GTVyMPdiPqynWkVXfa', 'true', NULL, NULL, NULL, 0, 0),
(5, 'jrutherford', 'bogan.donna@example.com', '+1-352-798-0876', 'Turks and Caicos Islands', NULL, '$2y$10$lEIPtdbEKsOrBIuEtDoL8u8JzUQmMvajGuSx9wweBPr0ukigE747y', 'true', NULL, NULL, NULL, 0, 0),
(6, 'obosco', 'gerlach.maximilian@example.com', '+15702188222', 'Benin', NULL, '$2y$10$Rv3BiMocjkyAXoyBhVjqweS7hZZoUCQd2pZsdLcuxPvOj8BZ4tTJ6', 'true', NULL, NULL, NULL, 0, 0),
(7, 'hlangosh', 'maya38@example.org', '+1-660-425-3260', 'Hong Kong', NULL, '$2y$10$AGd5Q3PXAFLwNCl7hcBjquESd0K3E83SlRed9Uiy.IjFj9ocxV4XO', 'true', NULL, NULL, NULL, 0, 0),
(8, 'xbartoletti', 'laila83@example.net', '1-283-629-4737', 'Gibraltar', NULL, '$2y$10$mPWBz4sM2Re1wGoYGltur.QH16BqOwanqU3ON6dmpV7IiIs0TRT9a', 'true', NULL, NULL, NULL, 0, 0),
(9, 'elnora97', 'aadams@example.net', '+1 (240) 549-8479', 'Korea', NULL, '$2y$10$aJR6GOpGJo7IJyfm9qRtJOt0g0om76VluLc7M7yf8nhwnJb2hp7DS', 'true', NULL, NULL, NULL, 0, 0),
(10, 'edibbert', 'ehuels@example.org', '1-586-893-8999', 'British Indian Ocean Territory (Chagos Archipelago)', NULL, '$2y$10$66X90PWeFZMpA7/kaotAmO54iXi9tl5EIs4N3x/uLnq2jphvfWc5O', 'true', NULL, NULL, NULL, 0, 0),
(11, 'nkuhn', 'hmills@example.net', '878.586.7669', 'Guyana', NULL, '$2y$10$GmY8kdaEQ4nklelzjey17OjFSmf8VbvFbcr/uFGL66X1R.nV261yK', 'true', NULL, NULL, NULL, 0, 0),
(12, 'klocko.clovis', 'west.waldo@example.net', '+1-539-586-7105', 'Tanzania', NULL, '$2y$10$E4rn1Ni4hzjrtOQGPJCTP.n04CdUf5OgMqj9qjdygNldDn8deChDu', 'true', NULL, NULL, NULL, 0, 0),
(13, 'ashlynn.cruickshank', 'tristin.hauck@example.com', '812-767-2655', 'Norway', NULL, '$2y$10$uiHtSp5b/GiYkICDVFzwJeYPIIAxNaDn0jukA4dlMeKe26HY7SQOa', 'true', NULL, NULL, NULL, 0, 0),
(14, 'rubie.schoen', 'krajcik.rosanna@example.net', '1-850-790-5501', 'China', NULL, '$2y$10$S7WKwBON/awQOUlA8u3JEesOnfsfufwTbkLkm40vN8CLMCNz4dgb.', 'true', NULL, NULL, NULL, 0, 0),
(15, 'eulalia23', 'crawford07@example.org', '+19419629299', 'Japan', NULL, '$2y$10$kqk5MMGeY5g89QUtbEvziOoTUAa.IQyuSnCbc/UWrbguGbxsgI8GW', 'true', NULL, NULL, NULL, 0, 0),
(16, 'hyatt.lewis', 'ciara.king@example.com', '+1.925.878.3769', 'Barbados', NULL, '$2y$10$gEBFM2XmDRhLA/lrsEHol.ogEs3hcMhmrz7leoAE7nFkj98y3fvdq', 'true', NULL, NULL, NULL, 0, 0),
(17, 'gkilback', 'adolfo.leuschke@example.net', '413.537.9673', 'Sweden', NULL, '$2y$10$k5prjTzRYWzcroyy9gd8tumGAKmYRBKfj/X1OPghHNDid8gsf7XC2', 'true', NULL, NULL, NULL, 0, 0),
(18, 'lelah13', 'eula.treutel@example.net', '+1 (901) 826-4217', 'Iraq', NULL, '$2y$10$ql1RBq.qj8tZvFisdsWXle7Fdnn3dQU5UA1Cc1PRjk/G.OO1ocFUu', 'true', NULL, NULL, NULL, 0, 0),
(19, 'marta75', 'hcassin@example.net', '1-727-292-9104', 'Cyprus', NULL, '$2y$10$QZRC.zXQ7z6Be.9fkbEFc.UEyoA4VdsUmMuWYr2pmiVxOlWYOTj9G', 'true', NULL, NULL, NULL, 0, 0),
(20, 'maia.prosacco', 'hillard.pouros@example.org', '+18583703883', 'Northern Mariana Islands', NULL, '$2y$10$yqJ7V5AQ6mULlB5UBwjRreEY/gSZqmnNw2OoNlQDYWRgt5GRozEK2', 'true', NULL, NULL, NULL, 0, 0),
(21, 'phartmann', 'kshlerin.marlon@example.net', '+1-832-517-1693', 'Barbados', NULL, '$2y$10$.lMtIHIQFftTdtkQ9ucKpuGVmSJ7/gOciJBiFl6Y6LAvIk9pTCL8q', 'true', NULL, NULL, NULL, 0, 0),
(22, 'nellie23', 'ebert.greta@example.com', '1-725-505-7752', 'Zimbabwe', NULL, '$2y$10$JReY5umfaf0N7bLDdPAI5OvE3EF3RvefbvTcTjvZ27xCjiGIdZAaW', 'true', NULL, NULL, NULL, 0, 0),
(23, 'alycia.johnston', 'lesch.hugh@example.org', '1-646-855-8936', 'China', NULL, '$2y$10$ZNIMMCfKZ5zh0G.RMKkN8uJN/OALqU8tOrJwXoDPyzHnJoF0Ypcoy', 'true', NULL, NULL, NULL, 0, 0),
(24, 'josie07', 'rosenbaum.davin@example.net', '+1-989-839-8525', 'Ukraine', NULL, '$2y$10$/yx2m6XNZTremBrww.5gZuqhLvxJ0Ri9IZ/wWTFe0noKp1Tf1EPRO', 'true', NULL, NULL, NULL, 0, 0),
(25, 'toy.brown', 'lila.lowe@example.org', '(332) 449-4283', 'Madagascar', NULL, '$2y$10$9E5bil05bhBzhXu6P7OEN.8JxoZXm7udsjRW4eLtL6wc8A0g2JCgK', 'true', NULL, NULL, NULL, 0, 0),
(26, 'marcus.walsh', 'alana.hill@example.org', '(281) 465-4009', 'Norway', NULL, '$2y$10$6haVJx8DYmb6DDz/ZAxp.OPhaOvakWVLFx8WEvcot4lG76yTx4iuS', 'true', NULL, NULL, NULL, 0, 0),
(27, 'hahn.loyal', 'joesph.beatty@example.com', '(534) 388-6046', 'Grenada', NULL, '$2y$10$sF0PPaodrmgws/EwltoABe6R3xmd5QCx.jMrnFHyYfwjIjP21ktmC', 'true', NULL, NULL, NULL, 0, 0),
(28, 'hazle.rutherford', 'palma.trantow@example.net', '931-560-2585', 'Saint Martin', NULL, '$2y$10$bB9c1wUX53JtKYj.x4lqPenMOajT9KjSZsX4kiX7JXiy4I4b34HI2', 'true', NULL, NULL, NULL, 0, 0),
(29, 'mlebsack', 'rohan.vesta@example.com', '341-561-0824', 'Saint Barthelemy', NULL, '$2y$10$o4gzHs4XlAMphERxvZ2o3eO.8c6TmJElUjR3VPUzgHjuuIcfA5FVK', 'true', NULL, NULL, NULL, 0, 0),
(30, 'marquardt.dovie', 'jgaylord@example.com', '+17759589983', 'Hungary', NULL, '$2y$10$hPsMCeqkdYTeAOz6nr500OlYCsOqCUDvZuUq9ehZPjGrArUfD6Bne', 'true', NULL, NULL, NULL, 0, 0),
(31, 'frippin', 'elnora.vandervort@example.net', '828.634.5270', 'French Guiana', NULL, '$2y$10$SKAg0VQY/sOJ9w79UTdF3.kLM.c9fQo1mM94.2HxUwTQ03Cov/pG2', 'true', NULL, NULL, NULL, 0, 0),
(32, 'curt.lang', 'shany.nienow@example.org', '530-325-0256', 'Nicaragua', NULL, '$2y$10$GrL1yeOh9HTQdk1OPhsuk.PkuLIJ/4A2L6MDfkJnCf5X5Kshs3RZq', 'true', NULL, NULL, NULL, 0, 0),
(33, 'judah68', 'linwood42@example.net', '530.619.2791', 'Cameroon', NULL, '$2y$10$viS3S8Dtz0P8c4Dc9XLpEO7iawdtq0ri5/fnhvsXR9o3n1d1M1Ew2', 'true', NULL, NULL, NULL, 0, 0),
(34, 'vicky79', 'ijerde@example.org', '920.463.4075', 'Togo', NULL, '$2y$10$zbD4shlbTwMjLhf0L4DIGOOBYf3dob6v0Dpluf8q2EF250hX/W6W.', 'true', NULL, NULL, NULL, 0, 0),
(35, 'enos.oconnell', 'lheaney@example.net', '+1-563-554-9792', 'Oman', NULL, '$2y$10$PzInI7DulCtKFGRVAkC2Hex.uuual0rGT0WKgp/ozSqWOji3Z0LnK', 'true', NULL, NULL, NULL, 0, 0),
(36, 'fgislason', 'okuneva.randy@example.net', '+1.609.802.0751', 'San Marino', NULL, '$2y$10$/tA.TCs1tXd93k7/DenxVOi852qWFQKbvtX/UFklvrCRP9SaZGvqa', 'true', NULL, NULL, NULL, 0, 0),
(37, 'markus.kassulke', 'ward.caitlyn@example.net', '+1.417.595.0383', 'Taiwan', NULL, '$2y$10$/DtVCKkKwXUinM73qbVuTe64aBPV6B.vZq2gTI3mq9K6zcEJQumSC', 'true', NULL, NULL, NULL, 0, 0),
(38, 'anissa13', 'russel.aliza@example.net', '+12706851656', 'Mexico', NULL, '$2y$10$b07SEotSesCWTziCIh6QWOSNIqYO4NvrjOoi3mtJI.ZSq7HSQRYOm', 'true', NULL, NULL, NULL, 0, 0),
(39, 'medhurst.dejuan', 'kaden31@example.com', '1-940-355-5103', 'Cameroon', NULL, '$2y$10$YiG2LOnM.qFnnHxQ.Zo7u.3Bz5Mm.Y8sfN3A0pXpYpMkquKyYNL/.', 'true', NULL, NULL, NULL, 0, 0),
(40, 'coleman.rohan', 'ttrantow@example.com', '1-989-901-5474', 'Moldova', NULL, '$2y$10$yx5uucfdWiKL7hPfkidNteSDxfs1xUkGRUSh0cARbsbJswbHMLnl6', 'true', NULL, NULL, NULL, 0, 0),
(41, 'adolph57', 'zmuller@example.net', '540-227-6950', 'Egypt', NULL, '$2y$10$XZotBBrRir49T7cHE.sf.OggRqOKJg1AyUgZmBeYXTB/ayT0hj67O', 'true', NULL, NULL, NULL, 0, 0),
(42, 'connie67', 'fadel.kathryn@example.net', '+1-470-792-9618', 'Kiribati', NULL, '$2y$10$f/a1FrzXEEHt7/1uKpGNJ.9RsMxXDuIxJKEXZpNf0nU7gE0tRRsGK', 'true', NULL, NULL, NULL, 0, 0),
(43, 'vroob', 'shields.john@example.com', '283-812-4355', 'Northern Mariana Islands', NULL, '$2y$10$wJTmC44kDe0pBYhD/oKK7ufv5XE2KP8CuOP.GJkxTW0iZcWsJUFQi', 'true', NULL, NULL, NULL, 0, 0),
(44, 'howell.jazmyn', 'oharris@example.org', '(775) 940-8418', 'Saint Kitts and Nevis', NULL, '$2y$10$LQtpwtLygiiWHi6rF6o.3OpKkzO0Qd7iLkDEiDTR1ioIJkGWEA6QK', 'true', NULL, NULL, NULL, 0, 0),
(45, 'pschaden', 'shyanne.ortiz@example.com', '947.274.4520', 'Nauru', NULL, '$2y$10$mLoHf/p0xKaK2SkGEFdFFO/MymJv8K3koZh1Jgx/NAspHtF/cTo6m', 'true', NULL, NULL, NULL, 0, 0),
(46, 'pete52', 'rath.hobart@example.net', '+18146177467', 'Honduras', NULL, '$2y$10$RL.ub9oVreFtEziFrkHL9eiBbR9Y6ArcVd.2F.R1cCmw.x0VJA3Ju', 'true', NULL, NULL, NULL, 0, 0),
(47, 'bosco.cheyanne', 'zbalistreri@example.net', '+1 (859) 342-3006', 'Vanuatu', NULL, '$2y$10$xgCrfkIpZ4/aYlPVJ0rkjuc5bNsKWZ/tvyKeZ95gMoY6vJlFSMCPq', 'true', NULL, NULL, NULL, 0, 0),
(48, 'jasmin07', 'ward.keyshawn@example.net', '1-804-707-7488', 'Mauritius', NULL, '$2y$10$r7mQlRCm4Fgl7BhBhgdRZOXawlSUh5lLk3OCuzZ6bLSOewBv9U06O', 'true', NULL, NULL, NULL, 0, 0),
(49, 'lbeier', 'jamal.schumm@example.org', '(540) 427-2706', 'Nauru', NULL, '$2y$10$XHPOtTOZhce99.jEHM3SLOIV6UFsevejB5EuyxZlyYYFGQwHqPAIG', 'true', NULL, NULL, NULL, 0, 0),
(50, 'gturcotte', 'jrussel@example.com', '+1-205-459-4540', 'Marshall Islands', NULL, '$2y$10$y32fNZJFD5VmF7xE/jbicuooYAMHakPjWd.PbbbKhP1rzSCO5wlV2', 'true', NULL, NULL, NULL, 0, 0),
(51, 'admin', 'admin@gmail.com', '0357824536', 'Ha noi', NULL, '$2y$10$cl2GM376oMj6Z/Rs2keVz.Zg0QaNee1Vkc38uBEIpYEqJXHrkHNRG', 'true', NULL, '2023-05-15 19:28:02', '2023-05-15 19:28:02', 1, 1),
(52, 'minhnx', 'minhxuannguyen0809@gmail.com', '7894653695', '29 Ha Dong', NULL, '$2y$10$S4q/z1Uwv3KwF/MjV0CqtOav3eLc3H74K4h3osTlIDNOwOSa3evWa', 'true', NULL, '2023-05-15 19:51:03', '2023-05-15 19:51:03', 0, 0),
(53, 'namheller', 'namhoangheller@gmail.com', '7894563678', 'Ha Dong', NULL, '$2y$10$5.9x4sATYHuPKMye3.NZuuQk7O1xcjD/SW31cZpRkhw02saW0BD2q', 'true', NULL, '2023-05-15 19:56:09', '2023-05-15 19:56:09', 0, 0),
(55, 'phuc123', 'phucswww1609@gmail.com', '7894563695', 'ha noi', NULL, '$2y$10$jto8JZM0OxsOVKi4GB0X.u.vhAmOs0OZhfoDOLS4RyEIbo42RZ69K', 'true', NULL, '2023-05-16 06:21:31', '2023-05-16 06:21:31', 0, 0);

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
  ADD UNIQUE KEY `users_username_unique` (`username`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
