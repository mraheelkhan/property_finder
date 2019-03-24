-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 08:11 PM
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
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` double(8,2) DEFAULT NULL,
  `lng` double(8,2) DEFAULT NULL,
  `radius` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 1, 'BS Software Engineering', 'Software Quality Engineering, Pakistan, India, New Zealand, best of all Anas ali khan pakistan india and trhe irum is not a good girl but motti is the most criminal mind girl', 'Mohalla Junakheil Village Bazaar, P/o Rustam, District Mardan,', '52 house', 2, '2', 84000, '2', NULL, 2, 2, 2, 2, 2, 3, '1551893551_gaminglaptops-lowres-9178-570x380.jpg', '03333639395', '+923333639395', 'active', 'nothing to comment but testing', NULL, NULL, '2019-03-05 11:25:53', '2019-03-05 11:25:53'),
(5, 1, 'BS Software Engineering', NULL, 'Mohalla Junakheil Village Bazaar, P/o Rustam, District Mardan,', '12d number', 2, '1', 5000, '3', NULL, NULL, 5, 2, NULL, NULL, NULL, '1553094149_grass_green_sky_blue_clouds_summer_302_1600x1200.jpg', '03333639395', NULL, 'active', NULL, NULL, NULL, '2019-03-20 10:02:29', '2019-03-20 10:02:29');

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
(3, 'Koi bhi arae', 'I10', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-15 14:53:25', '2019-03-15 14:53:25'),
(7, 'fasdfasf', 'I10', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'inactive', '2019-03-15 14:58:19', '2019-03-15 14:58:19'),
(8, 'sector G7', 'G7', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', '2019-03-17 09:12:53', '2019-03-17 09:12:53');

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
(80, '2014_10_12_000000_create_users_table', 1),
(81, '2014_10_12_100000_create_password_resets_table', 1),
(82, '2019_03_01_192115_create_publics_table', 1),
(83, '2019_03_01_201634_create_listings_table', 1),
(84, '2019_03_01_205956_create_listing_areas_table', 1),
(85, '2019_03_01_211322_create_cities_table', 1),
(86, '2019_03_02_184955_create_service_providers_table', 1);

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
(1, 'admin', 'khan', 'admin', 'islamab', NULL, '923333639395', 'admin@admin.com', NULL, '$2y$10$px7vVMGP1pThUfkaUlSGcejAaH3HLmXEPnYXs0IEvlPMf0fVFE26O', 'admin2', 'active', NULL, '2019-03-02 14:31:23', '2019-03-02 14:31:23'),
(2, 'manan', 'khan', 'manan', 'mana', NULL, '92333333323233', 'mana@gmail.com', NULL, '$2y$10$J3GIwf6/67VjaXZzb.kmK.sevUnUjzDaeUHWZE7wrD8.JQ/sy0lUm', '0', 'active', NULL, '2019-03-12 12:32:23', '2019-03-12 12:32:23'),
(3, 'Raheel', 'Khan', 'Raheel646', 'Blue Area Islamabad', NULL, '3333639395', 'iraheelyousafzai@gmail.com', NULL, '$2y$10$px7vVMGP1pThUfkaUlSGcejAaH3HLmXEPnYXs0IEvlPMf0fVFE26O', '0', 'active', NULL, '2019-03-15 13:35:04', '2019-03-15 13:35:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
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
-- Indexes for table `service_providers`
--
ALTER TABLE `service_providers`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `listings`
--
ALTER TABLE `listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listing_areas`
--
ALTER TABLE `listing_areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `publics`
--
ALTER TABLE `publics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service_providers`
--
ALTER TABLE `service_providers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
