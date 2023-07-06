-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 02:36 PM
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
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Visible,1=Hidden'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `status`) VALUES
(1, 'BMW', 0),
(2, 'VINFAST', 0),
(6, 'FORD', 0),
(7, 'HONDA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `car_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seats` int(11) NOT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`car_id`, `car_name`, `price`, `description`, `seats`, `fuel`, `year`, `speed`, `capacity`, `brand_id`) VALUES
(1, 'Vinfast V8', 56.36, 'ádsadasdasdsad', 7, 'gasoline', 2023, 256, 369, 2),
(3, 'q5', 1.07, 'Laborum ducimus est modi rem. Quas pariatur ea nihil eos qui sunt amet. Fugit commodi voluptates aliquam velit vitae.', 5, 'Diesel', 1971, 768, 392, 2),
(4, 'h3', 101.78, 'Asperiores asperiores corporis blanditiis sit facere nesciunt aspernatur eligendi. Sapiente in odit cumque adipisci occaecati aut labore repellat. Ut at quam provident possimus. Vel et tempore quae dolorem soluta officia beatae est.', 7, 'Petrol', 1971, 382, 436, 2),
(5, 't4', 115.73, 'Ab eius accusantium repudiandae. Nostrum eum quos voluptate tenetur. Officiis sapiente modi enim vel. Est quibusdam deserunt in ut minus.', 8, 'Diesel', 1988, 627, 349, 1),
(6, 'l8', 168.20, 'Non iure asperiores sed vel. Voluptate consectetur ut facilis voluptatem rem maxime. Dolores mollitia perspiciatis maiores animi hic laboriosam magnam. Id earum neque ad quas.', 10, 'Petrol', 1989, 321, 392, 2),
(7, 'i1', 115.07, 'Aspernatur fugit deserunt aut. Laudantium quia corrupti ut voluptatem. Impedit sit atque veritatis non sit.', 4, 'Petrol', 1972, 441, 434, 7),
(8, 'J4', 115.89, 'Facere a perspiciatis libero dolore nesciunt rerum. Et molestiae ut omnis sunt vel eum cum. Quas ea autem eos. Non tempora provident commodi veniam optio.', 6, 'Petrol', 1979, 512, 427, 2),
(9, 'b4', 123.89, 'Nemo quidem est et voluptatem. Ullam velit nihil ratione voluptates aut. Aut repellat non numquam.', 7, 'Diesel', 1986, 795, 442, 6),
(10, 'h6', 153.80, 'Quae aut inventore ratione consequatur. Fugiat doloribus accusantium sunt sed et ipsum quasi. Beatae non ut sequi dolorem amet.', 9, 'Diesel', 2018, 486, 387, 1),
(11, 'y2', 120.68, 'Autem numquam et praesentium alias hic. Qui molestiae id totam ipsa ullam consectetur. Et id aliquam deleniti maxime. Sapiente tenetur blanditiis voluptates quia distinctio similique.', 9, 'Petrol', 2000, 756, 453, 6),
(12, 'j5', 179.80, 'Dolore rerum consequatur neque possimus nihil dolore. Sed recusandae velit sit ratione voluptatem dolor. Unde tempore culpa sit qui qui sunt earum. Ex quasi quo odio porro deleniti sint nostrum.', 8, 'Diesel', 1988, 453, 407, 7),
(13, 'o8', 148.75, 'Tenetur nostrum dicta explicabo pariatur beatae esse. Ut quis sequi eius alias adipisci. Officiis eum aut nesciunt quis similique omnis. Doloremque aut consequuntur assumenda ut corporis eum.', 5, 'Petrol', 1970, 465, 397, 1),
(14, 'b8', 177.66, 'Quidem voluptatem qui libero. Aut eveniet dolores cum quaerat et quis quis. Numquam neque nostrum quibusdam non nam suscipit sed. Iste corrupti sed dolore id quod rerum nulla.', 4, 'Diesel', 1987, 741, 467, 1),
(15, 'G6', 111.33, 'Quidem reprehenderit incidunt aut id fugit quisquam sed. In dolorem velit quo labore voluptates voluptatum. Hic reprehenderit omnis sint.', 8, 'Petrol', 2016, 359, 486, 2),
(16, 't2', 166.30, 'Sit voluptatem distinctio rerum quia unde quia est. Et laborum minus in pariatur et. Unde quos dicta animi neque.', 4, 'Diesel', 1973, 555, 500, 7),
(17, 'm2', 167.50, 'Est doloremque sunt ratione quo quo. Ea fugiat minus pariatur fugiat rem dolores non. Rerum iste sed saepe amet voluptas. Voluptatem qui et quia dolores qui necessitatibus et iste. Accusamus occaecati qui pariatur iure.', 7, 'Petrol', 1993, 666, 428, 7),
(18, 'R7', 194.56, 'Eos magni debitis rerum omnis voluptas quaerat eos fugiat. Corporis eum cumque incidunt rerum suscipit similique.', 8, 'Petrol', 2014, 740, 453, 2),
(19, 'a3', 138.38, 'Porro aut ad quis amet occaecati. Reiciendis est eligendi vel veniam perferendis possimus optio. Provident id amet qui. Illo possimus totam modi nihil eum odit non qui.', 8, 'Petrol', 2007, 769, 383, 6),
(20, 'u1', 153.08, 'Dignissimos autem vitae rerum qui magni vero ullam unde. Laborum facere velit omnis aut iste aspernatur ab. Omnis distinctio ratione corrupti ipsam.', 8, 'Petrol', 2018, 775, 379, 2),
(21, 'W9', 175.68, 'Modi alias nostrum non distinctio et qui voluptatum. Aut optio at sint. Consequatur et sint ea ut vel est.', 7, 'Diesel', 1976, 515, 429, 1),
(22, 'F7', 132.16, 'Est omnis quas earum velit qui. Incidunt eum dolorem hic ut deserunt iste magnam. Autem vel ipsam molestiae dolorum perspiciatis aut expedita. Et ea incidunt non est rem voluptatem.', 6, 'Diesel', 1973, 468, 368, 2),
(23, 'F1', 127.25, 'Aut quia tempore excepturi dolores aut. Accusamus consequatur adipisci placeat consequatur. Quibusdam eos ducimus assumenda aut ut.', 4, 'Diesel', 1982, 388, 481, 6),
(24, 'k1', 137.46, 'Voluptas omnis voluptatem expedita quia. Molestias impedit eos mollitia et enim ipsum ad. Sunt id magnam quis optio natus eos et quae.', 7, 'Diesel', 2020, 502, 318, 2),
(25, 'v9', 117.46, 'Rerum id consectetur tenetur accusamus. Aut eum omnis dolorum velit odio deleniti quia. Iusto autem maxime qui dolor. Voluptatem amet quia non deleniti.', 5, 'Diesel', 2010, 362, 381, 6),
(26, 'u0', 170.92, 'Necessitatibus ducimus veniam quia vero. Nobis voluptatibus voluptatem est sint vel earum explicabo. Laudantium nihil molestiae optio et vel.', 10, 'Petrol', 2014, 547, 367, 7),
(27, 'K3', 185.43, 'Ratione vero quia qui quo nemo. Dignissimos autem mollitia voluptatem illo. Perspiciatis cumque similique est et quia. Rerum dolores ratione aut omnis blanditiis.', 9, 'Diesel', 2022, 560, 334, 1),
(28, 'Z1', 191.27, 'Enim possimus quibusdam sit aspernatur iure eveniet sunt. Maiores earum totam explicabo ex hic unde voluptates sunt. Amet exercitationem et ducimus aliquid et sed. Dolores debitis tempora dolorem sed minima.', 8, 'Petrol', 1992, 385, 471, 2);

-- --------------------------------------------------------

--
-- Table structure for table `car_images`
--

CREATE TABLE `car_images` (
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `car_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_images`
--

INSERT INTO `car_images` (`image_id`, `car_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/16885729911.jpg', '2023-07-05 09:03:11', '2023-07-05 09:03:11'),
(2, 1, 'uploads/products/16885729912.jpg', '2023-07-05 09:03:11', '2023-07-05 09:03:11'),
(3, 1, 'uploads/products/16885729913.jpg', '2023-07-05 09:03:11', '2023-07-05 09:03:11');

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
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2019_08_19_000000_create_failed_jobs_table', 1),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(18, '2023_05_10_154031_create_users_table', 1),
(19, '2023_05_13_015911_add_details_to_users_table', 1),
(20, '2023_06_30_095231_create_brands_table', 2),
(24, '2023_05_16_100303_create_cars_table', 5),
(25, '2023_07_03_015641_create_car_images_table', 6);

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
(1, 'admin', 'minhphuc.nguyen1609@gmail.com', '0357824536', 'Hai Ba Trung', NULL, '$2y$10$iCbZCX8FRtGTAr1zE5tEyOp/vAARZsG9x33iLqj3a5.Zlli5lQtWe', 'true', NULL, '2023-07-02 21:19:40', '2023-07-02 21:19:40', 0, 1),
(2, 'minhnguyen', 'minh@gmail.com', '0369875258', 'Hanoi', NULL, '$2y$10$TnTMr5pKVYZk.PObZZ.XaurAk2TaIDeLbySiFvyGK/rB5b4aSHXpa', 'true', NULL, '2023-07-04 09:21:33', '2023-07-04 09:21:33', 0, 0),
(3, 'namheller', 'abc@gmail.com', '5645645645', 'abc', NULL, '$2y$10$NCJObCupFuaKbWrUduBzA.M4xTuI5HHm3V3ybtZ2eC23de/4oXkrG', 'true', NULL, '2023-07-05 17:40:43', '2023-07-05 17:40:43', 0, 0),
(4, 'aswaniawski', 'qokon@example.org', '940.297.9111', 'Maldives', NULL, '$2y$10$mpQcYC6bQ.e2pvejkkXkb.x.2kSPaabHY96g/j9IOIVaSAmLM3t42', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(5, 'brianne47', 'wolf.leann@example.org', '513.843.9346', 'New Zealand', NULL, '$2y$10$9U2Y7.FVvjkHXNE70Qf1Qe9PHSaPsrS84iQek/pZH.v/A1VM19djC', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(6, 'rbins', 'deangelo31@example.com', '1-754-720-8694', 'South Georgia and the South Sandwich Islands', NULL, '$2y$10$CDcLViGqHaEX1/cL6y7fV.7SUeSbHODTkdcU.V4Xi80sWXfZdKRi.', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(7, 'uschaden', 'sunny.heller@example.com', '+1.534.669.3513', 'Singapore', NULL, '$2y$10$rU8o4bhI/5/HC3FWJypXgeqBV2dacsvSUMDg.yqelv/wnnUstXjAW', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(8, 'alize93', 'crooks.coty@example.org', '820.681.6936', 'United States Virgin Islands', NULL, '$2y$10$1wQ/Jjz3IaFRv0A.gGp8XeUpYxlG461c2PB.Xwv7upX/5YOYoQF.i', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(9, 'mathias.spencer', 'uwilderman@example.net', '314.408.5957', 'French Polynesia', NULL, '$2y$10$xE9kh22m68mMbz0N.cl/4.R3B.Y9O4UNqeYOq1ONdueW086MQ2A3O', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(10, 'vklein', 'reynolds.ciara@example.org', '865-230-7869', 'Niger', NULL, '$2y$10$U/2nzpDJrU3Fvyv4mkJLD.q3mxiV3By.uvfxKRWX3nUjWTQV0uzx6', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(11, 'maynard.aufderhar', 'wlang@example.net', '+18648807905', 'Belgium', NULL, '$2y$10$.GNWZaCe0onpoM5VBMMV2.4cmR4xeLW4nwbGxh2gHxl7d96e0KEkK', 'true', NULL, '2023-07-05 17:46:18', '2023-07-05 17:46:18', 0, 0),
(12, 'bernier.arnoldo', 'virginie.pouros@example.org', '+12797604046', 'Iraq', NULL, '$2y$10$sc9vcn9jKl4zxfo1ahOzAeS1q8gp1KGw67cA8jeCwGqijXQ7vgQuy', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(13, 'callie91', 'psimonis@example.net', '1-283-831-0823', 'Eritrea', NULL, '$2y$10$bPDJ2L0Ng7srRCiuwRph4eo.szdhK97xD.9asOxau4S1/uOzV2crW', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(14, 'mthompson', 'shields.lexus@example.com', '1-510-894-0339', 'Lesotho', NULL, '$2y$10$BZgiHogv4eJv8dqx0Q.7d.j2sKpWritVY8IocfYY/mu3lB37ZtXUW', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(15, 'jamaal.will', 'elton58@example.com', '+1.442.537.0835', 'Cayman Islands', NULL, '$2y$10$4aziN8Zdp42bEe1b41ioJ.w0U1.sYFdJ9C9MXO1UZPWyFLm.NYzH.', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(16, 'jaunita80', 'kitty76@example.com', '(952) 972-5935', 'Sao Tome and Principe', NULL, '$2y$10$BAesJ59PjFb9EOy1NBTMvez66nZLYr.wViEvrGzv1t1NDa69fXAq6', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(17, 'brent30', 'goldner.virginia@example.net', '+1.325.793.0081', 'Eritrea', NULL, '$2y$10$5kePcWIW1W1CfEomDxyNhuAT03jN3PBAH/L0GJTXWhWItQ7/fDrzG', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(18, 'gislason.stephen', 'ejenkins@example.net', '1-704-412-5422', 'New Caledonia', NULL, '$2y$10$J8lwwSIVZH/aU31d6OM47.i3D12h3Q76b/zCOlf.1EyUMsbygOXaq', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(19, 'kutch.bernardo', 'mkeebler@example.com', '857-430-3425', 'Switzerland', NULL, '$2y$10$ke.At1bS.mjPLHIDfPoszuEvec3BJ3IwGGCb44h73qyyaies1oRIG', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(20, 'nienow.bell', 'jcorwin@example.org', '279-988-0030', 'United States Minor Outlying Islands', NULL, '$2y$10$Lw70Axk9vSCEZhZ23wy9WuElbhVVnok4vXG1JDs/EbB1sPu6iXPdG', 'true', NULL, '2023-07-05 17:46:19', '2023-07-05 17:46:19', 0, 0),
(21, 'jjerde', 'kautzer.rene@example.net', '1-254-712-0342', 'Lao People\'s Democratic Republic', NULL, '$2y$10$YFMRaixGiHjGK/cSXNeYaeCGcyNS3b6oUhRkDJSpoR7hNOk5NMlfC', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(22, 'zsimonis', 'lucas17@example.org', '+1.251.544.7929', 'Heard Island and McDonald Islands', NULL, '$2y$10$EseTuOvhtes4keb5UKSuKeNV.Tm9P7OB8Y9HCrHRpVBDEApPmX.OG', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(23, 'vlind', 'hettinger.velda@example.com', '863.530.0488', 'Mongolia', NULL, '$2y$10$BoxokAiUyEkV8LMv9EDWY..CWYfBys/OWDooonwn0Jof04W49D3Xe', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(24, 'white.kelsie', 'kaylah.schneider@example.org', '+14192120057', 'Czech Republic', NULL, '$2y$10$cNDDj/sCMFJRXBPVw83kCeM26rJ/fyflax.9ob7thor0u7s3mPUta', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(25, 'winnifred89', 'dereck.schaden@example.org', '805.641.4090', 'Cook Islands', NULL, '$2y$10$82h4kHjH5xgHZKb8eXxA9e2YZpMm8lZe4iWu13DAa6IiAl1X6peii', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(26, 'waters.brenden', 'kali73@example.net', '231-931-8927', 'Saint Helena', NULL, '$2y$10$uAvV1MUOtih7Sphm0W0V5esFWgN7RAH3ArnJmP8tzT.5ljVuDJLzy', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(27, 'scotty11', 'schiller.jarred@example.net', '321-893-8143', 'Antigua and Barbuda', NULL, '$2y$10$G9J5QebFgP1.m2t1LXqJSuJzaWwsEVuhFSlkawr.Wf3gm4b1JFe82', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0),
(28, 'ahane', 'vzulauf@example.org', '571-738-7369', 'Cyprus', NULL, '$2y$10$9SnyJcv4Pv1chhh6i92xMu64XJsPo/8GlvvfXpEViZk2Cu2FJlcum', 'true', NULL, '2023-07-05 17:46:20', '2023-07-05 17:46:20', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `cars_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `car_images`
--
ALTER TABLE `car_images`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `car_images_car_id_foreign` (`car_id`);

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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `car_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `car_images`
--
ALTER TABLE `car_images`
  MODIFY `image_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `cars_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`) ON DELETE CASCADE;

--
-- Constraints for table `car_images`
--
ALTER TABLE `car_images`
  ADD CONSTRAINT `car_images_car_id_foreign` FOREIGN KEY (`car_id`) REFERENCES `cars` (`car_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
