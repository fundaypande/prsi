-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2018 at 03:59 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `atlits`
--

CREATE TABLE `atlits` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` tinyint(1) NOT NULL,
  `ttl` date NOT NULL,
  `sekolah_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `atlits`
--

INSERT INTO `atlits` (`id`, `name`, `jk`, `ttl`, `sekolah_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Funday Pande Laki', 1, '1998-02-24', 13, 5, NULL, '2018-02-25 00:57:45'),
(2, 'Made SIanida', 0, '1998-02-06', 14, 6, NULL, NULL),
(4, 'Meong Garong Kedua', 0, '1990-01-30', 10, 5, '2018-02-24 01:04:45', '2018-02-25 00:58:43'),
(5, 'Nyoman Suarsan', 0, '2004-02-10', 13, 5, '2018-02-24 07:48:40', '2018-02-24 07:48:40'),
(6, 'Made Sumbawe', 1, '1998-02-12', 11, 5, '2018-02-24 19:57:08', '2018-02-24 19:57:08'),
(7, 'Komang Sudana Yasa Pande', 1, '1998-05-03', 5, 5, '2018-02-25 06:58:32', '2018-02-25 06:58:32'),
(8, 'Made Awal Bulan', 1, '1998-01-01', 11, 5, '2018-02-25 07:15:36', '2018-02-25 07:15:36');

-- --------------------------------------------------------

--
-- Table structure for table `daftars`
--

CREATE TABLE `daftars` (
  `id` int(10) UNSIGNED NOT NULL,
  `atlit_id` int(10) UNSIGNED NOT NULL,
  `lomba_id` int(10) UNSIGNED NOT NULL,
  `best_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `umur_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daftars`
--

INSERT INTO `daftars` (`id`, `atlit_id`, `lomba_id`, `best_time`, `user_id`, `umur_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '20 Menit', 6, 5, NULL, NULL),
(2, 4, 2, '30 Menit', 6, 4, NULL, NULL),
(3, 7, 2, '30 Menit', 5, 2, '2018-02-25 07:38:03', '2018-02-25 07:38:03'),
(5, 1, 2, '00 Jam', 5, 3, '2018-02-25 08:13:31', '2018-02-25 08:51:11'),
(6, 2, 3, '12', 5, 5, '2018-02-25 08:57:52', '2018-02-25 08:57:52'),
(7, 2, 3, '12', 5, 5, '2018-02-25 08:57:54', '2018-02-25 08:57:54'),
(8, 2, 3, '12', 5, 5, '2018-02-25 08:57:57', '2018-02-25 08:57:57'),
(9, 2, 3, '12', 5, 5, '2018-02-25 08:57:59', '2018-02-25 08:57:59'),
(10, 2, 3, '12', 5, 5, '2018-02-25 08:58:07', '2018-02-25 08:58:07'),
(11, 2, 3, '12', 5, 5, '2018-02-25 08:58:10', '2018-02-25 08:58:10'),
(12, 2, 3, '12', 5, 5, '2018-02-25 08:58:14', '2018-02-25 08:58:14'),
(13, 2, 3, '12', 5, 5, '2018-02-25 08:58:18', '2018-02-25 08:58:18'),
(14, 2, 3, '12', 5, 5, '2018-02-25 08:58:21', '2018-02-25 08:58:21'),
(15, 2, 3, '12', 5, 5, '2018-02-25 08:58:23', '2018-02-25 08:58:23'),
(16, 2, 3, '12', 5, 5, '2018-02-25 08:58:28', '2018-02-25 08:58:28');

-- --------------------------------------------------------

--
-- Table structure for table `lombas`
--

CREATE TABLE `lombas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acara` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lombas`
--

INSERT INTO `lombas` (`id`, `name`, `acara`, `created_at`, `updated_at`) VALUES
(2, 'Lari Menyebaran', 0, NULL, NULL),
(3, 'Balap Jangkrik Terpadu', 1, '2018-02-23 18:34:30', '2018-02-23 18:34:36'),
(4, 'Lomba Renang Jarak Jauh', 2, '2018-02-25 07:40:25', '2018-02-25 07:40:25'),
(5, 'Renang 50 Meter', 3, '2018-02-25 07:40:39', '2018-02-25 07:40:39'),
(6, 'Renang 2 Meter', 4, '2018-02-25 07:40:47', '2018-02-25 07:40:47'),
(9, 'Renang Bersama', 6, '2018-02-26 20:51:04', '2018-02-26 21:19:42'),
(17, 'Perlombaan anak muda', 7, '2018-02-26 21:11:07', '2018-02-26 21:11:07'),
(26, 'Perlombaan Ayam Broiler', 8, '2018-02-26 22:10:30', '2018-02-26 22:10:30');

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
(5, '2018_02_23_134519_create_sekolahs_table', 2),
(6, '2018_02_23_153855_create_upload_files_table', 3),
(7, '2018_02_23_153921_create_lombas_table', 3),
(8, '2018_02_23_155404_create_umurs_table', 4),
(9, '2018_02_24_013853_users_migration', 5),
(11, '2018_02_24_042314_create_atlits_table', 6),
(16, '2018_02_25_091234_create_daftars_table', 7);

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
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `name`, `alamat`, `phone`, `created_at`, `updated_at`) VALUES
(5, 'SMA 4 Singaraja EDIT', 'Kapolsek singaraja ke barat dikit 2a', '01938246', '2018-02-23 07:05:40', '2018-02-24 20:13:45'),
(10, 'SMK Bali Berjaya', 'Jalan gunung subabue', '91083439', '2018-02-23 18:39:26', '2018-02-23 18:39:26'),
(11, 'Sekolah International', 'Jalan international no baru', '91340193', '2018-02-23 18:44:53', '2018-02-23 18:44:53'),
(13, 'Sekolah Kurang Angin', 'Jalan anignanan 23', '98173894', '2018-02-23 19:43:31', '2018-02-23 19:43:31'),
(14, 'Sekolah Kita Bersama', 'Jalan meninang kaingian', '019824', '2018-02-23 19:50:57', '2018-02-23 19:50:57'),
(15, 'dddddd', 'adasd', '12312', '2018-02-23 19:52:50', '2018-02-23 19:52:50'),
(16, 'hhhhhhh', 'Gunung batur', '209812901', '2018-02-23 19:54:05', '2018-02-23 19:54:05'),
(17, 'Sekolah Funday', 'Jalan gunung batur no 5', '013984790134', '2018-02-23 19:56:35', '2018-02-23 19:56:35'),
(18, 'Bisaa lo Ini', 'jalanjlana', '901384913', '2018-02-23 20:05:53', '2018-02-23 20:05:53'),
(19, 'Dari Register', 'Jalan pingunin', '90834091', '2018-02-23 20:07:20', '2018-02-23 20:07:20'),
(20, 'Penambahan ID Hilang', 'Hebat', '90238902', '2018-02-23 20:09:58', '2018-02-23 20:09:58'),
(21, 'Sekolah Pinguin', 'Pingun cuk curacuk', '1093481', '2018-02-23 20:11:12', '2018-02-23 20:11:12'),
(22, 'Sekolah Pantai Pinguin', 'Hebat Yaaaa', '01934809134', '2018-02-23 20:12:51', '2018-02-23 20:12:51'),
(23, 'Hebatt', 'Jalan hebat makmur', '01984', '2018-02-24 20:25:34', '2018-02-24 20:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `umurs`
--

CREATE TABLE `umurs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `umurs`
--

INSERT INTO `umurs` (`id`, `name`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 'Remaja', '14 Tahun Keatas', NULL, NULL),
(3, 'Tua Sekali', '50 tahun keatas', '2018-02-23 08:07:09', '2018-02-23 08:07:20'),
(4, 'Sangat Remaja', '12 Tahun', '2018-02-23 08:20:54', '2018-02-23 08:20:54'),
(5, 'Dewasa Sekali', 'Umur 70 Tahun s', '2018-02-23 18:34:54', '2018-02-23 18:34:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` int(10) UNSIGNED DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `school`, `phone`, `gambar`, `status`, `role`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'funday', 'fundaypande', 'funday820@gmail.com', '$2y$10$RVRj8C7vqdC30J8sEayv9O3Dc.XP4dHRkIeiCWTxK69YYK9oPYkoS', 11, '1093840913', '1519532236.png', 1, 0, '1ctbeFS5qYjoMYDUQfup', 'KWIxTqGTkqLdO944nJaQUeImjFR0l9IA72y3eKReYDekrQv9qJDx228qmI9N', '2018-02-23 18:31:07', '2018-02-24 20:17:35'),
(6, 'funday', 'funday', 'ajdfnkajdbf@gmail.com', NULL, NULL, '0293821', NULL, 0, 1, 'lmRuTS5rRjrJwJEI5bEJ', NULL, '2018-02-23 18:33:40', '2018-02-23 18:33:40'),
(7, 'budi', 'budi', 'buadf@gmail.com', '$2y$10$IUq9VubFrK/TvfJej1HoyeZauY87PxGAvmT3GkJLqOS.UNyKK4Tni', NULL, '24562546', '1519440423.png', 1, 1, '3PfMs5N1zmHSVPxByqi7', '2kihEcK2FejYQYmGjQDHrMbRkifWuyax3FZPGP8MZ1A3URnWY3NbVl8PMb9A', '2018-02-23 18:34:16', '2018-02-23 18:56:20'),
(8, 'Krisna', 'krisna', 'faujfa@gmail.com', '$2y$10$oCwa0jRHK.9wHHzWCgiujeUVpprIuuhbWT/LZrJTmfoI9DHQES3Se', 20, '0913840913', '1519441539.jpg', 1, 0, 'YK1edwupRC1yWwd10WoI', NULL, '2018-02-23 19:03:55', '2018-02-23 20:10:03'),
(9, 'Komang Pinguin', 'pinguin', 'oinguinha@gmail.com', '$2y$10$csEs4suwaWoD7c.2UEfNE.dIZ1ttzHOFt19UFnGAzI8IT7fQJMF3O', 22, '8734019734', NULL, 1, 1, 'XeG0A41GY7nUNtJbjmoa', '8XJU3o3GFCHalUs2wRYlKafAnmaNpKPMc4khhWV9gDCYFg0rCrKvEtuNZDyX', '2018-02-23 20:12:57', '2018-02-23 20:13:52'),
(10, 'member', 'member', 'member@gmail.com', '$2y$10$Q2CcQvTSbU0TmP9XRgrJGeINi1G.iy9P6ZVBemW0nvC972gTfzRX.', 11, '0198304913', NULL, 1, 1, 'sX9KA3NFehimaUrMbq6h', NULL, '2018-02-27 06:40:16', '2018-02-27 06:40:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atlits`
--
ALTER TABLE `atlits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `atlits_sekolah_id_foreign` (`sekolah_id`),
  ADD KEY `atlits_user_id_foreign` (`user_id`);

--
-- Indexes for table `daftars`
--
ALTER TABLE `daftars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `daftars_user_id_foreign` (`user_id`),
  ADD KEY `daftars_atlit_id_foreign` (`atlit_id`),
  ADD KEY `daftars_lomba_id_foreign` (`lomba_id`),
  ADD KEY `daftars_umur_id_foreign` (`umur_id`);

--
-- Indexes for table `lombas`
--
ALTER TABLE `lombas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acara` (`acara`);

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
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umurs`
--
ALTER TABLE `umurs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_school_foreign` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atlits`
--
ALTER TABLE `atlits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `daftars`
--
ALTER TABLE `daftars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `lombas`
--
ALTER TABLE `lombas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `umurs`
--
ALTER TABLE `umurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `atlits`
--
ALTER TABLE `atlits`
  ADD CONSTRAINT `atlits_sekolah_id_foreign` FOREIGN KEY (`sekolah_id`) REFERENCES `sekolahs` (`id`),
  ADD CONSTRAINT `atlits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `daftars`
--
ALTER TABLE `daftars`
  ADD CONSTRAINT `daftars_atlit_id_foreign` FOREIGN KEY (`atlit_id`) REFERENCES `atlits` (`id`),
  ADD CONSTRAINT `daftars_lomba_id_foreign` FOREIGN KEY (`lomba_id`) REFERENCES `lombas` (`id`),
  ADD CONSTRAINT `daftars_umur_id_foreign` FOREIGN KEY (`umur_id`) REFERENCES `umurs` (`id`),
  ADD CONSTRAINT `daftars_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_school_foreign` FOREIGN KEY (`school`) REFERENCES `sekolahs` (`id`) ON DELETE SET NULL;
