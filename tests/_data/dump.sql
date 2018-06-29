-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 
-- サーバのバージョン： 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teiki`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE `characters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str` smallint(5) UNSIGNED NOT NULL,
  `vit` smallint(5) UNSIGNED NOT NULL,
  `dex` smallint(5) UNSIGNED NOT NULL,
  `agi` smallint(5) UNSIGNED NOT NULL,
  `int` smallint(5) UNSIGNED NOT NULL,
  `mnd` smallint(5) UNSIGNED NOT NULL,
  `con` smallint(5) UNSIGNED NOT NULL,
  `dev` smallint(5) UNSIGNED NOT NULL,
  `dir` smallint(5) UNSIGNED NOT NULL,
  `exe` smallint(5) UNSIGNED NOT NULL,
  `det` smallint(5) UNSIGNED NOT NULL,
  `res` smallint(5) UNSIGNED NOT NULL,
  `luc` smallint(5) UNSIGNED NOT NULL,
  `gra` smallint(5) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `characters`
--

INSERT INTO `characters` (`id`, `name`, `nickname`, `password`, `str`, `vit`, `dex`, `agi`, `int`, `mnd`, `con`, `dev`, `dir`, `exe`, `det`, `res`, `luc`, `gra`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'テストキャラクター', 'テスト', '$2y$10$rQBdZnDyhrrrEVXni3P5SuJmtJjPAgv5wwhAm5iZumo1VR7fVa97a', 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, 5, NULL, '2018-06-29 11:01:32', '2018-06-29 11:01:32', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `own_chat_id` bigint(20) UNSIGNED NOT NULL,
  `res_chat_id` bigint(20) UNSIGNED NOT NULL,
  `char_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_characters_table', 1),
(2, '2014_10_12_100000_create_chats_table', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
