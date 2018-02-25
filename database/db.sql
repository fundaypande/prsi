-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2018 at 02:28 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `lombas`
--

CREATE TABLE `lombas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lombas`
--

INSERT INTO `lombas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Balap Karung', NULL, NULL),
(2, 'Lari Menyebaran', NULL, NULL);

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
(8, '2018_02_23_155404_create_umurs_table', 4);

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
(1, 'SMA Bali Mandara', 'Kubutambahan', '09240958', NULL, NULL),
(2, 'SMK Dwijendra', 'Malaysia', '014091834', NULL, NULL),
(3, 'SMA N 3 Singaraja', 'Jalan pulau natuna penarukan tengah 3', '902349123', '2018-02-23 06:52:48', '2018-02-23 07:04:05'),
(5, 'SMA 4 Singaraja', 'Kapolsek singaraja ke barat dikit 2a', '01938246', '2018-02-23 07:05:40', '2018-02-23 07:27:11');

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
(1, 'Balita', 'Umur 5 Tahun', NULL, NULL),
(2, 'Remaja', '14 Tahun Keatas', NULL, NULL),
(3, 'Tua Sekali', '50 tahun keatas', '2018-02-23 08:07:09', '2018-02-23 08:07:20'),
(4, 'Sangat Remaja', '12 Tahun', '2018-02-23 08:20:54', '2018-02-23 08:20:54');

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
  `school` int(10) UNSIGNED NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `school`, `phone`, `gambar`, `role`, `status`, `token`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'funday', 'fundaypande', 'fundayku@gmail.com', '$2y$10$2u9thPuPIt7lvzReHhdmau2tCljE7FA5NbpBe5Q..FzSasvw0sEEK', 0, '91048108934', '1519307242.jpg', 0, 1, '', 'cTJAyiLSyP0DeyIQFyMq2MuMpHNhZUx9xNrgktUrpMggdSeNbyjmxIjQfeOn', '2018-02-20 21:13:38', '2018-02-23 00:19:59'),
(4, 'Komang Sudana Yasa Pande', 'funday1', 'fundaykomnan@gmail.com', '$2y$10$SEDVYQOctA..ygJG5AUCNuzh3z03FYVXk16njUtrutBCBzfXHUZ4y', 0, '91409134', NULL, 0, 0, 'RbEopmS1OcT97v37GD6I', NULL, '2018-02-20 21:22:56', '2018-02-23 04:36:24'),
(7, 'fundayregis', 'fundayreg', 'funday@gmail.comcom', '$2y$10$r.8BsLddhDYETQYgY63sHe59TYR.J8yX3KwNZ4cW0Zla89/Qp0Yxu', 0, '1230198230', NULL, 1, 1, 'WDPB9YpqFQtAf852hyRj', 'CyRmiXxWekQYVjKlgJ3ChP75xuakboKBw0av07H8G7SX0sheYIntDOlxmQWa', '2018-02-20 21:45:42', '2018-02-20 21:50:18'),
(8, 'fundayyana', 'funday4', 'fundayduanf@gmail.com', '$2y$10$I6Y0O0UfQASpaBDT/foi6eaMhhKOu6FMXCLs3r4fIIriCjOjhqHxy', 0, '09138410934', NULL, 1, 1, 'cyK9vFj0pvvwakRq8kBC', NULL, '2018-02-20 21:58:15', '2018-02-23 00:15:48'),
(9, 'fundayku', 'funday5', 'funzvczvxcday@gmail.com', NULL, 0, '908130948213', NULL, 1, 0, 'EeEmHvMgwP7g2HFFSp3s', NULL, '2018-02-20 22:34:45', '2018-02-20 22:34:45'),
(10, 'funda enam', 'funday6', 'fundayajfajlhs@gmail.com', '$2y$10$yEeQiIjcYzTDfZn9Ki3wl.4zDmyy2nbLZ1QkePHSrUgFx2lRepo7y', 0, '0913480913', NULL, 1, 1, 'XtRfHgQ7Tpj4IcTKxAlQ', 'WcqfNUIauarY7D8Q7wYFpZcdeSrGqTjYXplI9q9WJoqdvcuPAR01NHrpNTLR', '2018-02-20 22:36:29', '2018-02-20 22:37:15'),
(17, 'Komang Sudana Yasa Pande', 'funday', 'funday820@gmail.comw', '$2y$10$BCAMU9XH.jsa6PE9Drjj1uePWVYo4QqdkrpV56niDuQLLg8gRAuj6', 0, '087888030598', '1519400070.png', 0, 1, 'MiRAmmbglEwGDfPtpK6l', 'oZKWh9ouUqBRLldzrvVb2iPi6XMLTgozb0glm0DgDCg0W5vFIlYfTJaE24Ca', '2018-02-23 04:40:05', '2018-02-23 07:34:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lombas`
--
ALTER TABLE `lombas`
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
  ADD KEY `school` (`school`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lombas`
--
ALTER TABLE `lombas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `umurs`
--
ALTER TABLE `umurs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
