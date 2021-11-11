-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 12:10 AM
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
-- Database: `laravel_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'The First Post', 'Magna rerum necessit Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 17:10:08', '2021-11-09 18:08:09'),
(3, 'Harum asperiores ea', 'Rerum aliquip aut siLorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 17:16:41', '2021-11-09 18:08:16'),
(4, 'Sequi praesentium ex', 'Aut nisi sint natus Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 17:19:40', '2021-11-09 17:19:40'),
(5, 'Sequi praesentium ex', 'Aut nisi sint natus Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 17:41:46', '2021-11-09 17:41:46'),
(6, 'Non quia aut aut eni', 'Temporibus animi pl Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 18:04:28', '2021-11-09 18:08:22'),
(7, 'Unde quam odit corru', 'Sapiente irure quis Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 18:04:36', '2021-11-09 18:08:28'),
(8, 'Exercitationem numqu', 'Quas consequat Odit Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 18:06:06', '2021-11-09 18:08:33'),
(9, 'Id id eligendi excep', 'Repudiandae similiqu Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 18:07:15', '2021-11-09 18:08:39'),
(10, 'Beatae perspiciatis', 'Quis fugiat ut ipsu Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic tenetur labore debitis consequatur aliquid perspiciatis similique magnam odio eos quaerat! Temporibus, velit vel. Voluptatem quo totam perspiciatis nesciunt corrupti aspernatur!', '2021-11-09 18:07:31', '2021-11-09 18:08:49');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_11_07_221308_create_posts_table', 1),
(6, '2021_11_09_201145_create_articles_table', 2);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 'Molestiae eos nisi', 'Magna velit totam al', '2021-11-09 07:49:20', '2021-11-09 07:49:20'),
(2, 'Veritatis laborum V', 'Quia obcaecati tempo', '2021-11-09 07:54:25', '2021-11-09 07:54:25'),
(3, 'Eum labore dolor vit', 'Fugit consequat Ip', '2021-11-09 07:54:34', '2021-11-09 07:54:34'),
(4, 'Temporibus et offici', 'Sed exercitation vol', '2021-11-09 07:54:37', '2021-11-09 07:54:37'),
(5, 'Est beatae labore qu', 'Laboriosam et aut e', '2021-11-09 07:54:39', '2021-11-09 07:54:39'),
(6, 'Corporis voluptatem', 'Ut est sit dolor dol', '2021-11-09 12:00:34', '2021-11-09 12:00:34');

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
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
