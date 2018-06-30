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
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_mini` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_txt` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `characters`
--

INSERT INTO `characters` (`id`, `name`, `nickname`, `password`, `str`, `vit`, `dex`, `agi`, `int`, `mnd`, `con`, `dev`, `dir`, `exe`, `det`, `res`, `luc`, `gra`, `profile_img`, `profile_mini`, `profile_txt`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'テストキャラクター1', 'テスト1', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, 'ひとこと自己紹介', '自己紹介の\nサンプル\nです。', '0ID7vjargQ0am19aTv2PaQkhMvqcfKMfVqIWogtNjx464WF6hYn6zUe8Uhqv', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(2, 'テストキャラクター2', 'テスト2', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, 'てすとてすと', NULL, 'USU2C62ad4uB7kinzIVadBscNqsabmYnvsHLssO8fnW0g1p5oaT8dpVJinQz', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(3, 'テストキャラクター3', 'テスト3', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, '', NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(4, 'テストキャラクター4', 'テスト4', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(5, 'テストキャラクター5', 'テスト5', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(6, 'テストキャラクター6', 'テスト6', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(7, 'テストキャラクター7', 'テスト7', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(8, 'テストキャラクター8', 'テスト8', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(9, 'テストキャラクター9', 'テスト9', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL),
(10, 'テストキャラクター10', 'テスト10', '$2y$10$OEHpjBT5spndUoQFSvpKFuL8pU1xsugyII3hQuhWo6DUW9P5wY3MG', 5, 5, 5, 5, 5, 5, 5, 5, 3, 3, 3, 3, 0, 0, NULL, NULL, NULL, 'DERRVt6rHk1iDipoyibfzxVZ4aN0KWJeoiXmyWlgZvKZ75VWnZfEnBQxLtou', '2018-06-29 15:38:35', '2018-06-29 15:38:35', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `own_chat_id` bigint(20) UNSIGNED NOT NULL,
  `res_chat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `res_char_id` int(10) UNSIGNED DEFAULT NULL,
  `char_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_txt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


--
-- テーブルのデータのダンプ `chats`
--

INSERT INTO `chats` (`id`, `own_chat_id`, `res_chat_id`, `res_char_id`, `char_id`, `name`, `icon_img`, `chat_txt`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, NULL, NULL, 1, 'テスト', '/img/no_image_icon.png', '発言テスト', '2018-06-30 11:34:28', '2018-06-30 11:34:28', NULL),
(2, 2, NULL, NULL, 1, 'テストキャラクター', '/img/no_image_icon.png', 'テスト\r\nテスト\r\nテスト', '2018-06-30 11:34:49', '2018-06-30 11:34:49', NULL),
(3, 2, 2, 1, 1, 'テスト1', '/img/no_image_icon.png', '返信テスト', '2018-06-30 11:34:57', '2018-06-30 11:34:57', NULL),
(4, 2, 3, 1, 2, 'テスト２', '/img/no_image_icon.png', '返信テスト２', '2018-06-30 12:28:35', '2018-06-30 12:28:35', NULL),
(5, 2, 4, 2, 3, 'テスト３', '/img/no_image_icon.png', '返信テスト３', '2018-06-30 12:29:03', '2018-06-30 12:29:03', NULL),
(6, 1, 1, 1, 3, 'テスト３', '/img/no_image_icon.png', 'ツリーテスト', '2018-06-30 13:57:53', '2018-06-30 13:57:53', NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
