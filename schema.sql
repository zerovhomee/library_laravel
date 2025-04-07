-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 07 2025 г., 22:31
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `text` text NOT NULL,
                         `user_id` bigint(20) UNSIGNED DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `text`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
                                                                                                    (2, 'akpakapskpas', 'msdvnlkvnklvn', 1, '2025-04-03 09:22:04', '2025-04-07 06:57:05', NULL),
                                                                                                    (8, 'f[f[f[f[f[', 's[s[s[s[s[s[', 1, '2025-04-03 11:29:10', '2025-04-03 13:12:15', NULL),
                                                                                                    (15, 'первая книга второго пользователя', 'текст', 2, '2025-04-04 00:45:10', '2025-04-04 00:45:10', NULL),
                                                                                                    (18, 'test_api_book2', 'test_api_text_of_book2', 1, '2025-04-06 14:44:38', '2025-04-06 14:44:38', NULL),

-- --------------------------------------------------------

--
-- Структура таблицы `cache`
--

CREATE TABLE `cache` (
                         `key` varchar(255) NOT NULL,
                         `value` mediumtext NOT NULL,
                         `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `cache_locks`
--

CREATE TABLE `cache_locks` (
                               `key` varchar(255) NOT NULL,
                               `owner` varchar(255) NOT NULL,
                               `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `failed_jobs`
--

CREATE TABLE `failed_jobs` (
                               `id` bigint(20) UNSIGNED NOT NULL,
                               `uuid` varchar(255) NOT NULL,
                               `connection` text NOT NULL,
                               `queue` text NOT NULL,
                               `payload` longtext NOT NULL,
                               `exception` longtext NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
                        `id` bigint(20) UNSIGNED NOT NULL,
                        `queue` varchar(255) NOT NULL,
                        `payload` longtext NOT NULL,
                        `attempts` tinyint(3) UNSIGNED NOT NULL,
                        `reserved_at` int(10) UNSIGNED DEFAULT NULL,
                        `available_at` int(10) UNSIGNED NOT NULL,
                        `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `job_batches`
--

CREATE TABLE `job_batches` (
                               `id` varchar(255) NOT NULL,
                               `name` varchar(255) NOT NULL,
                               `total_jobs` int(11) NOT NULL,
                               `pending_jobs` int(11) NOT NULL,
                               `failed_jobs` int(11) NOT NULL,
                               `failed_job_ids` longtext NOT NULL,
                               `options` mediumtext DEFAULT NULL,
                               `cancelled_at` int(11) DEFAULT NULL,
                               `created_at` int(11) NOT NULL,
                               `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `library_accesses`
--

CREATE TABLE `library_accesses` (
                                    `id` bigint(20) UNSIGNED NOT NULL,
                                    `owner_id` bigint(20) UNSIGNED NOT NULL,
                                    `user_id` bigint(20) UNSIGNED NOT NULL,
                                    `created_at` timestamp NULL DEFAULT NULL,
                                    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `library_accesses`
--

INSERT INTO `library_accesses` (`id`, `owner_id`, `user_id`, `created_at`, `updated_at`) VALUES
                                                                                             (1, 1, 2, '2025-04-05 12:49:38', '2025-04-05 12:49:38'),
                                                                                             (3, 2, 1, '2025-04-06 04:21:17', '2025-04-06 04:21:17'),
                                                                                             (4, 2, 3, '2025-04-06 04:49:20', '2025-04-06 04:49:20'),
                                                                                             (5, 1, 4, '2025-04-06 15:22:27', '2025-04-06 15:22:27'),
                                                                                             (8, 1, 3, '2025-04-07 14:39:24', '2025-04-07 14:39:24');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
                              `id` int(10) UNSIGNED NOT NULL,
                              `migration` varchar(255) NOT NULL,
                              `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
                                                          (5, '0001_01_01_000000_create_users_table', 1),
                                                          (6, '0001_01_01_000001_create_cache_table', 1),
                                                          (7, '0001_01_01_000002_create_jobs_table', 1),
                                                          (8, '2025_04_03_120757_create_books_table', 1),
                                                          (9, '2025_04_03_155128_add_deleted_at_to_table', 2),
                                                          (11, '2025_04_05_063444_create_library_accesses_table', 3),
                                                          (12, '2025_04_06_181941_create_personal_access_tokens_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
                                         `email` varchar(255) NOT NULL,
                                         `token` varchar(255) NOT NULL,
                                         `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
                                          `id` bigint(20) UNSIGNED NOT NULL,
                                          `tokenable_type` varchar(255) NOT NULL,
                                          `tokenable_id` bigint(20) UNSIGNED NOT NULL,
                                          `name` varchar(255) NOT NULL,
                                          `token` varchar(64) NOT NULL,
                                          `abilities` text DEFAULT NULL,
                                          `last_used_at` timestamp NULL DEFAULT NULL,
                                          `expires_at` timestamp NULL DEFAULT NULL,
                                          `created_at` timestamp NULL DEFAULT NULL,
                                          `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `sessions`
--

CREATE TABLE `sessions` (
                            `id` varchar(255) NOT NULL,
                            `user_id` bigint(20) UNSIGNED DEFAULT NULL,
                            `ip_address` varchar(45) DEFAULT NULL,
                            `user_agent` text DEFAULT NULL,
                            `payload` longtext NOT NULL,
                            `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
                                                                                                     ('6gdfgP7vzfrL1fQv9sDMFNlxBcHTUHM0ysMwD69j', 1, '127.0.0.1', 'PostmanRuntime/7.43.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0R0REhzT3VyUlVYZEN5YVJDS0xJRXl3V0xrVVVMa2dxS1VZdnpqdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744025731),
                                                                                                     ('msdCAc2LCvYjbD6SqHkQpdezb0M2ttAiPJOIcbRB', 1, '127.0.0.1', 'PostmanRuntime/7.43.3', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSFdnT1Rxc3g5WFY3ZHJPVnFZc21WWTR3T2dodmlsMGxNenhYZnJDWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9ib29rcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1744025365);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
                         `id` bigint(20) UNSIGNED NOT NULL,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
                                                                                                                               (1, 'first_user', 'ggggg@gmail.com', NULL, '$2y$12$jzajJXAggRC94CTc/OoojuK8xjFo76VAZFKF6Rm83avaOLv2LGeXC', NULL, '2025-04-03 08:24:07', '2025-04-03 08:24:07'),
                                                                                                                               (2, 'llalal', '1166@mail.ru', NULL, '$2y$12$4gg29eOWLV4.IvweLXhJKOHsR5e5K6cmaF31g9hM7EIUdzLdS6JRK', NULL, '2025-04-04 00:35:47', '2025-04-04 00:35:47'),
                                                                                                                               (3, 'ajajajjaja', 'a@mail.ru', NULL, '$2y$12$lkDS439hzu0A637a8qiiz.ltmIAj0ugKAArDQKe7glnuuU7EOLfh6', NULL, '2025-04-05 00:52:00', '2025-04-05 00:52:00'),
                                                                                                                               (4, 'dggdgdgdgdgdgd', 'd@mail.ru', NULL, '$2y$12$3676unxsjiMH9Hi7uze1ZOcdtGvvL0Ky1DTBvaLaenCfKOyTfY2xO', NULL, '2025-04-05 00:54:51', '2025-04-05 00:54:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
    ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_index` (`user_id`);

--
-- Индексы таблицы `cache`
--
ALTER TABLE `cache`
    ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `cache_locks`
--
ALTER TABLE `cache_locks`
    ADD PRIMARY KEY (`key`);

--
-- Индексы таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
    ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Индексы таблицы `job_batches`
--
ALTER TABLE `job_batches`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `library_accesses`
--
ALTER TABLE `library_accesses`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `library_accesses_owner_id_user_id_unique` (`owner_id`,`user_id`),
  ADD KEY `library_accesses_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
    ADD PRIMARY KEY (`email`);

--
-- Индексы таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Индексы таблицы `sessions`
--
ALTER TABLE `sessions`
    ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT для таблицы `failed_jobs`
--
ALTER TABLE `failed_jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `library_accesses`
--
ALTER TABLE `library_accesses`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
    MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `books`
--
ALTER TABLE `books`
    ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `library_accesses`
--
ALTER TABLE `library_accesses`
    ADD CONSTRAINT `library_accesses_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `library_accesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
