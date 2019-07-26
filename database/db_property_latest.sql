-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2019 at 08:44 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_property`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `city_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `radius` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `comment`, `status`, `lat`, `lng`, `radius`, `created_at`, `updated_at`) VALUES
(1, 'Islambad', NULL, 'active', NULL, NULL, NULL, '2019-03-23 14:16:11', '2019-03-23 14:16:49'),
(2, 'Rawalpindi', NULL, 'inactive', NULL, NULL, NULL, '2019-03-23 14:16:43', '2019-03-23 14:30:37'),
(3, 'Peshawar', NULL, 'active', NULL, NULL, NULL, '2019-03-26 10:38:46', '2019-03-26 10:38:46'),
(4, 'Multan', NULL, 'active', NULL, NULL, NULL, '2019-03-26 12:48:38', '2019-03-26 12:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `comment_body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `listing_id`, `comment_body`, `status`, `created_at`, `updated_at`) VALUES
(1, 9, 5, 'dslfjla;s fj;lasdjf', 'active', '2019-04-19 17:09:54', '2019-04-19 17:09:54'),
(2, 9, 5, 'this is a comment on ad no: 5', 'active', '2019-04-19 17:10:29', '2019-04-19 17:10:29'),
(3, 9, 5, 'OKay sure I will conaact your as soon as possible', 'active', '2019-04-19 17:26:58', '2019-04-19 17:26:58'),
(4, 9, 2, 'be the first to comment on this property ad', 'active', '2019-04-19 17:30:31', '2019-04-19 17:30:31'),
(5, 14, 5, 'alsjfkdlas ;fj;lasf;asf;salfjks;', 'active', '2019-04-19 17:31:31', '2019-04-19 17:31:31'),
(6, 14, 2, 'why are you the first one to comment on this property ad??', 'active', '2019-04-19 17:32:21', '2019-04-19 17:32:21'),
(7, 9, 2, 'why are you the first one to comment on this property ad??why are you the first one to comment on this property ad??', 'active', '2019-04-19 17:33:45', '2019-04-19 17:33:45'),
(8, 1, 5, 'Is this still available for the rent?', 'active', '2019-06-16 07:24:49', '2019-06-16 07:24:49'),
(9, 9, 5, 'I just want to know if you can negotiate on the price you are asking for? \r\nI will call on your phone number in the noon.', 'active', '2019-06-16 07:31:08', '2019-06-16 07:31:08'),
(10, 12, 5, 'Does this house has stares from outside?', 'active', '2019-06-16 07:34:13', '2019-06-16 07:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE `listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `street_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `listing_area_id` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `price_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` text COLLATE utf8mb4_unicode_ci,
  `garages` int(11) DEFAULT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathroom` int(11) NOT NULL,
  `siderooms` int(11) DEFAULT NULL,
  `floors` int(11) DEFAULT NULL,
  `kitchens` int(11) DEFAULT NULL,
  `featured_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact1` text COLLATE utf8mb4_unicode_ci,
  `contact2` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`id`, `user_id`, `title`, `description`, `street_name`, `house`, `listing_area_id`, `type`, `price`, `price_type`, `size`, `garages`, `bedrooms`, `bathroom`, `siderooms`, `floors`, `kitchens`, `featured_image`, `contact1`, `contact2`, `status`, `comment`, `lat`, `lng`, `created_at`, `updated_at`) VALUES
(2, 2, '4 bed room apartment is available for rent', NULL, 'house# 101,street 293, G-7/3-3', '142', 2, 'rent', 15000, '1', NULL, NULL, 4, 4, 1, 2, 2, '1553426157_grass_green_sky_blue_clouds_summer_302_1600x1200.jpg', NULL, NULL, 'active', 'house is available for the rent,', NULL, NULL, '2019-03-24 06:15:57', '2019-03-24 14:29:16'),
(3, 2, '3 bed room apartment is available for rent', NULL, ',street 293, G-7/3-3', '105', 1, 'rent', 15000, '1', NULL, NULL, 2, 2, 22, NULL, NULL, '1553426798_triangle_form_light_dark_88543_1600x1200.jpg', NULL, NULL, 'active', NULL, NULL, NULL, '2019-03-24 06:26:38', '2019-03-28 11:12:13'),
(4, 2, '3 bed room apartment is available for rent', 'it has no more dtails', 'house# 101,street 293, G-7/3-3', '56', 1, 'rent', 15000, '1', NULL, NULL, 5, 2, 1, 2, 3, '1553440113_face_paint_profile_abstraction_95073_1400x1050.jpg', '7177878327', NULL, 'active', 'nothign else', NULL, NULL, '2019-03-24 10:08:33', '2019-03-24 14:29:22'),
(5, 6, 'A 4 roomed portion is available for sale', NULL, 'street number 13, Murree road', '12', 2, 'sale', 121000, '3', NULL, 1, 4, 2, 1, 2, 1, '1553612654_fox_stone_fire_paper_figures_93387_1600x1200.jpg', '0519800000', NULL, 'active', 'you can wriite whatever you want here iwill the details of yourlisting', NULL, NULL, '2019-03-26 10:04:14', '2019-03-26 10:35:56'),
(6, 9, '3 bed room apartment is available for rent', 'it has no more dtails', 'street 23', 'house 104', 3, 'rent', 30000, '1', NULL, 2, 3, 4, 1, 2, 2, '1553621945_abstraction_sharp_figure_101902_1600x1200.jpg', '923435363763', NULL, 'inactive', 'this is dummy comment for the ad of 3 bed rooms. this is dummy comment for the ad of', NULL, NULL, '2019-03-26 12:39:05', '2019-04-19 15:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `listing_areas`
--

CREATE TABLE `listing_areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sector_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `subsector_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `radius` double(8,2) DEFAULT NULL,
  `population` int(11) DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `listing_areas`
--

INSERT INTO `listing_areas` (`id`, `area_name`, `sector_name`, `city_id`, `subsector_name`, `town`, `comment`, `lat`, `lng`, `radius`, `population`, `status`, `created_at`, `updated_at`) VALUES
(1, 'China Market, F6 Sector', '3', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-23 12:47:46', '2019-03-23 12:47:46'),
(2, 'Sadiq abad, Murree road', '3', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-23 14:20:09', '2019-03-23 14:20:09'),
(3, 'F8-4, Margalla road', '5', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-26 10:39:26', '2019-03-26 10:39:26'),
(4, 'F7-3 Sector', '6', 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-26 12:50:02', '2019-03-26 12:50:02');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_03_01_192115_create_publics_table', 1),
(6, '2019_03_01_201634_create_listings_table', 1),
(7, '2019_03_01_205956_create_listing_areas_table', 1),
(9, '2019_03_02_184955_create_service_providers_table', 1),
(10, '2019_03_23_172217_create_sectors_table', 1),
(11, '2019_03_01_211322_create_cities_table', 2),
(12, '2019_04_19_213916_create_comment_controllers_table', 3),
(13, '2019_07_26_160917_create_sliders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `publics`
--

CREATE TABLE `publics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sectors`
--

CREATE TABLE `sectors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sector_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sectors`
--

INSERT INTO `sectors` (`id`, `sector_name`, `city_id`, `status`, `created_at`, `updated_at`) VALUES
(3, 'i10 Sector', 2, 'active', '2019-03-23 12:33:24', '2019-06-16 14:18:34'),
(5, 'F8 Sector', 3, 'active', '2019-03-26 10:39:07', '2019-03-26 10:39:07'),
(6, 'F7 Sector', 4, 'active', '2019-03-26 12:49:29', '2019-03-26 12:49:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_providers`
--

CREATE TABLE `service_providers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `electrical_systems` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `concrete` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `steel_frames` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ceiling` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masonry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plumbing` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `windows` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labour` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_providers`
--

INSERT INTO `service_providers` (`id`, `user_id`, `electrical_systems`, `concrete`, `steel_frames`, `ceiling`, `masonry`, `plumbing`, `windows`, `labour`, `transport`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, '1', '1', '1', '1', '1', '1', '1', '1', '1', 'one two three', '2019-04-10 19:00:00', '2019-04-11 15:37:23'),
(2, 10, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'new use added', '2019-04-19 15:56:56', '2019-04-19 15:56:56'),
(3, 11, '1', '0', '1', '1', '0', '1', '0', '1', '1', 'new use added', '2019-04-19 16:13:14', '2019-04-19 16:21:33'),
(4, 12, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'new use added', '2019-04-19 16:15:43', '2019-04-19 16:15:43'),
(5, 14, '0', '0', '0', '0', '0', '0', '0', '0', '0', 'new use added', '2019-04-19 16:17:44', '2019-04-19 16:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(2, '1564165979_Capture.PNG', 'active', 1, '2019-07-26 13:32:59', '2019-07-26 13:32:59'),
(3, '1564165992_evengoAPI.PNG', 'inactive', 1, '2019-07-26 13:33:12', '2019-07-26 13:42:54'),
(4, '1564166009_answer.png', 'inactive', 1, '2019-07-26 13:33:29', '2019-07-26 13:42:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `address`, `image`, `phone`, `email`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Raheel', 'khan', 'raheelkhan', 'house 0, i10/4 0 ISb', NULL, '7177878327', 'admin@admin.com', NULL, '$2y$10$S4uE7jTcnqiVv4TMaYByXObshqNygMtak29zgdCu3e0RVuT.M71bm', 'admin', 'active', NULL, '2019-03-23 12:26:26', '2019-07-26 10:48:40'),
(2, 'Admin', 'Khan', 'adminkhan', 'ISLAMABAD', NULL, '923330000000', 'khan@admin.com', NULL, '$2y$10$MMGGbCrQ3VzZ8IYw6gCqw.BAmAs3xb1YKRm00rNd25aDRyvtCEHtm', 'sp', 'active', NULL, '2019-03-24 05:52:43', '2019-04-11 12:56:56'),
(3, 'user', 'khan', 'user', 'india newzealand', NULL, '9233312312313', 'user@admin.com', NULL, '$2y$10$45BLgzHo.qi0nO81jrhCYO/P.P1Q2WNiHOPemXkvWemzs9iKgq2eW', 'user', 'active', NULL, '2019-03-24 15:53:20', '2019-03-24 15:53:20'),
(4, 'userr', 'khan', 'user1', 'Islamabad', NULL, '3330000000', 'user@user.com', NULL, '$2y$10$mrU/nutlmd/djWsNSakuyugYtcuOpyN1Kch9OdO8QM0Rr1m/a9knG', 'user', 'active', NULL, '2019-03-24 15:54:53', '2019-03-24 15:54:53'),
(5, 'usser', 'khaan', 'usser', 'Islamabad', NULL, '333000000000', 'usrrr@admin.com', NULL, '$2y$10$84SWkfDft4PnF.7xDJPC.uNURoZahNHHhFfq5jAphqYF82Zvxqt7K', 'user', 'active', NULL, '2019-03-24 15:56:19', '2019-03-24 15:56:19'),
(6, 'hira', 'abcd', 'hira', 'islamabad', NULL, '93123123123', 'hira@gmail.com', NULL, '$2y$10$vkij2xUhVIXE1EXsnHzjp.awCU.ZkPt8DeW5rErgfb8lihWhJEhJy', 'user', 'active', NULL, '2019-03-26 10:01:40', '2019-03-26 10:01:40'),
(9, 'Raima', 'abcd', 'raimaa', 'islamabad', NULL, '9312312312322', 'raima@admin.com', NULL, '$2y$10$wqNzWp2G/s0BMnryexUeYu7ZIDBxYj87wA1nmFrynZlF11YGnvxmi', 'admin', 'active', NULL, '2019-03-26 12:36:34', '2019-03-26 12:36:34'),
(10, 'sp', 'khan', 'spkhan', 'slfja  dk jfdakslf', NULL, '9233336312313', 'sp@spkhan.com', NULL, '$2y$10$kgU2cjK3E0iNhuHJEVbuD.58wcqjfYW5WSja/JTKPgkFthHB4B0AS', 'admin', 'active', NULL, '2019-04-19 15:56:55', '2019-04-19 15:56:55'),
(11, 'spkh', 'khan', 'sp1', 'sp rawlapindi', NULL, '9232378378333', 'mysp@gmail.com', NULL, '$2y$10$V1s/pYd6cTHKkrfRjOYf4eJEVvZaTrXWrvdLww7m9jjDJzbazXxLC', 'sp', 'active', NULL, '2019-04-19 16:13:14', '2019-04-19 16:13:14'),
(12, 'Hira', 'Ali', 'hira_ali', 'aslfja;slkf jasdlfkj', NULL, '333363931234', 'aadddi@ggjl.com', NULL, '$2y$10$sxy0OF2XA94gt6RVGMbVGe.OWL38pux43xr7GMN8praMkiJxo1I9i', 'admin', 'active', NULL, '2019-04-19 16:15:43', '2019-04-19 16:15:43'),
(13, 'lasjkfl asdjk', 'lsdjkfl', 'adminlkjvlkjz', 'salfj asld;j aslddfjk', NULL, '9212312348484', 'asdjkf2@gmakc.om', NULL, '$2y$10$MCBzWp9JJumOEVbQA9OQWu1m.DD4Lem0wZzA7E6R.w4.O0gxw9XEq', 'admin', 'active', NULL, '2019-04-19 16:16:33', '2019-04-19 16:16:33'),
(14, 'sadps', 'sajfdasp p j', 'adminspppppp', 'sakfj ksld fjkd f', NULL, '7177878327999', 'adminsp@admdsafasspin.com', NULL, '$2y$10$W9TyszKM8Suh9C5YFkm21eoumBkfVW2gq2icsuRSP5aWicQyfm7sG', 'sp', 'active', NULL, '2019-04-19 16:17:44', '2019-04-19 16:17:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listings`
--
ALTER TABLE `listings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `listing_areas`
--
ALTER TABLE `listing_areas`
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
-- Indexes for table `publics`
--
ALTER TABLE `publics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sectors`
--
ALTER TABLE `sectors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `listing_areas`
--
ALTER TABLE `listing_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `publics`
--
ALTER TABLE `publics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sectors`
--
ALTER TABLE `sectors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
