-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 26, 2025 lúc 10:58 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `contact_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `opportunity` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`contact_id`, `name`, `email`, `phone`, `address`, `opportunity`, `created_at`, `updated_at`) VALUES
('c006', 'Mr. Stephon Ledner V', 'yundt.kenny@example.com', '1-541-576-5445', '2332 Koch Bridge\nPort Augustusborough, WI 21163', 'rerum', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c007', 'Crystel Haley', 'keebler.zander@example.net', '1-681-710-3644', '54607 Nicola Pines Suite 862\nLake Maximillia, OH 43479-6713', 'voluptas', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c008', 'Ambrose Douglas', 'laverna.mills@example.com', '+1-380-797-5715', '48527 Hoeger Crest\nDevenmouth, KY 59715-7035', 'quia', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c009', 'Sylvester Reinger IV', 'alexander.mckenzie@example.org', '1-740-898-9890', '237 Eden Shoals\nMohrhaven, MN 92469', 'in', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c010', 'Camryn Spencer', 'ngibson@example.net', '+16783805263', '47863 Kendall Forges Apt. 686\nPort Preston, MS 71812', 'velit', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c011', 'Miss Shyann Hermann', 'waters.margarita@example.net', '727-387-1921', '67157 Waelchi Rest\nPort Kyle, DE 80438', 'laboriosam', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c012', 'Sven Monahan', 'luz.huel@example.com', '(956) 586-0863', '6913 Schmeler Parks\nMyrnafurt, VT 53225', 'exercitationem', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c013', 'Miss Eleanora Howe DVM', 'billy15@example.org', '+1.660.432.2599', '7120 Heaney Place Apt. 382\nKuphalside, SD 87254', 'facere', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c014', 'Prof. Catherine Spinka', 'gennaro88@example.org', '380-869-1863', '753 Eden Neck\nEast Noemie, WI 02988', 'ullam', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c015', 'Dr. Fredrick Waters MD', 'ygoyette@example.net', '938.683.4393', '4666 Natalie Stravenue Apt. 652\nImachester, SC 62912', 'sed', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c016', 'Gillian Dach', 'xbeier@example.net', '1-508-544-7649', '713 Klocko Center\nLake Nicolas, AK 63398-3260', 'sunt', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c017', 'Alexis Hodkiewicz', 'megane.feil@example.com', '+1-737-683-0495', '814 Dickens Keys Apt. 838\nNew Caitlynburgh, HI 35376', 'eaque', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c018', 'Mr. Wilburn Wilkinson DVM', 'erika23@example.org', '+1 (859) 660-3425', '415 Okuneva Row Apt. 881\nWest Alville, AR 96637-1898', 'nobis', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('c019', 'Agustin Schultz', 'khach222@gmail.com', '0987654321', 'da nang', 'da nang', '2025-04-26 09:44:18', '2025-04-26 09:44:18'),
('c020', 'a', 'khach23@gmail.com', '0987654321', 'da nang', 'da nang', '2025-04-26 09:44:37', '2025-04-26 09:44:37'),
('c021', 'Agustin Schultz', 'khach24@gmail.com', '0987654321', 'da nang', 'da nang', '2025-04-26 09:44:56', '2025-04-26 09:44:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(22, '2025_04_24_041239_create_users_table', 1),
(23, '2025_04_24_041254_create_contacts_table', 1),
(24, '2025_04_24_041311_create_opportunities_table', 1),
(25, '2025_04_24_041611_create_tasks_table', 1),
(31, '2025_04_26_025713_create_tags_table', 2),
(32, '2025_04_26_025829_create_pipelines_table', 2),
(33, '2025_04_26_030114_update_opportunities_table', 2),
(34, '2025_04_26_033432_create_pipeline_columns_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `opportunities`
--

CREATE TABLE `opportunities` (
  `opportunitie_id` varchar(255) NOT NULL,
  `phase` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `contact_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` decimal(15,2) NOT NULL,
  `closing_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `manager_id` varchar(255) DEFAULT NULL,
  `tag_id` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `opportunities`
--

INSERT INTO `opportunities` (`opportunitie_id`, `phase`, `organisation`, `contact_id`, `name`, `value`, `closing_date`, `created_at`, `updated_at`, `manager_id`, `tag_id`, `created_by`, `updated_by`) VALUES
('o008', 'Proposal', 'Legros-Kassulke', 'c010', 'Veniam asperiores eveniet reiciendis et.', 975971.56, '2008-09-02', '2025-04-25 02:51:15', '2025-04-25 02:51:15', NULL, NULL, NULL, NULL),
('o009', 'Proposal', 'Kunde-Hickle', 'c006', 'Omnis alias adipisci hic aut molestiae.', 546258.83, '1986-11-29', '2025-04-25 02:51:15', '2025-04-25 02:51:15', NULL, NULL, NULL, NULL),
('o010', 'Closing', 'Bergstrom-Reilly', 'c013', 'Perferendis mollitia non maxime eaque consequatur iure harum.', 101286.84, '2014-09-04', '2025-04-25 02:51:15', '2025-04-25 02:51:15', NULL, NULL, NULL, NULL),
('o011', 'Closing', 'Dickens, Nolan and Murray', 'c016', 'Veritatis voluptas et eum et qui aut est.', 789304.86, '2000-05-01', '2025-04-25 02:51:15', '2025-04-25 02:51:15', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_id` varchar(255) NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_id`, `tokenable_type`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'user_10', 'App\\Models\\User', 'auth_token', '7672ba3665f41470e8479a1d4a1a47d535253c93ef590da33b594dad73dd3728', '[\"*\"]', '2025-04-25 02:52:24', NULL, '2025-04-25 02:52:14', '2025-04-25 02:52:24'),
(3, 'user_10', 'App\\Models\\User', 'auth_token', '7bf8eae0b7322a5d392c43b464cda1982bc0f82ac0107dcbf4f9908b61dfd013', '[\"*\"]', '2025-04-25 10:13:59', NULL, '2025-04-25 07:23:05', '2025-04-25 10:13:59'),
(4, 'user_10', 'App\\Models\\User', 'auth_token', 'ab169cf1cee412f1f747ac57f6652bdc624c6a670fe88e74857be8b30e90a327', '[\"*\"]', '2025-04-25 18:01:48', NULL, '2025-04-25 17:43:47', '2025-04-25 18:01:48'),
(5, 'user_10', 'App\\Models\\User', 'auth_token', '27af57b41604dff0839087a099e87b852e9db44df397c57be34b0145b87c36ed', '[\"*\"]', '2025-04-25 18:22:08', NULL, '2025-04-25 18:19:39', '2025-04-25 18:22:08'),
(6, 'user_10', 'App\\Models\\User', 'auth_token', '3f244307eb065ceaffb726a7b534cac44dbc6f4e4e94e862c6e5943ae982160d', '[\"*\"]', '2025-04-25 18:38:26', NULL, '2025-04-25 18:28:01', '2025-04-25 18:38:26'),
(7, 'user_10', 'App\\Models\\User', 'auth_token', '9d46be773c31c001681581f43e1f096157f0c0207e37fc100e6553c4887413d5', '[\"*\"]', '2025-04-25 19:47:52', NULL, '2025-04-25 18:39:10', '2025-04-25 19:47:52'),
(9, 'user_10', 'App\\Models\\User', 'auth_token', 'c5bb6cbbbb3869022ea872d26c4338eb6d2b21d158431569fdeb590f01c2e01b', '[\"*\"]', '2025-04-25 21:39:36', NULL, '2025-04-25 21:39:06', '2025-04-25 21:39:36'),
(10, 'user_10', 'App\\Models\\User', 'auth_token', 'da30e70fe96e9dc6b7e5586ed10152a0cdb85631ff007c694013510aaa6366f7', '[\"*\"]', '2025-04-25 21:47:00', NULL, '2025-04-25 21:46:58', '2025-04-25 21:47:00'),
(11, 'user_10', 'App\\Models\\User', 'auth_token', 'e03ef4e38dc7aa9022a5b579d7bad8fe6bafc949609396d16a8e907f32216604', '[\"*\"]', '2025-04-25 21:53:09', NULL, '2025-04-25 21:46:59', '2025-04-25 21:53:09'),
(12, 'user_10', 'App\\Models\\User', 'auth_token', '6c2901d56b422d20efdfa124e87f9056d32e08858560651a5bd98b1fe8fc6247', '[\"*\"]', '2025-04-25 23:30:31', NULL, '2025-04-25 23:30:28', '2025-04-25 23:30:31'),
(15, 'user_10', 'App\\Models\\User', 'auth_token', 'a2a6c1679850b315f684cec11191d4259aa92f94e7aa0714687cec51304582e7', '[\"*\"]', '2025-04-26 03:14:20', NULL, '2025-04-26 03:05:56', '2025-04-26 03:14:20'),
(16, 'user_10', 'App\\Models\\User', 'auth_token', 'f3a6c0885b8406ca1ec1259f543083b2cc5cc4f247e538ad982220b194d026b4', '[\"*\"]', '2025-04-26 13:45:25', NULL, '2025-04-26 08:59:38', '2025-04-26 13:45:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pipelines`
--

CREATE TABLE `pipelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pipeline_columns`
--

CREATE TABLE `pipeline_columns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pipeline_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tasks`
--

CREATE TABLE `tasks` (
  `task_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('pending','completed','in-progress') NOT NULL DEFAULT 'pending',
  `end_date` date NOT NULL,
  `contact_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tasks`
--

INSERT INTO `tasks` (`task_id`, `title`, `start_date`, `user_id`, `status`, `end_date`, `contact_id`, `created_at`, `updated_at`) VALUES
('task_10', 'Cupiditate alias impedit consequatur et rem iste repellendus placeat.', '1982-03-04', 'user_16', 'pending', '2011-03-30', 'c017', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_11', 'Nulla mollitia omnis molestiae dolore tenetur.', '1985-12-18', 'user_18', 'in-progress', '2023-09-28', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_12', 'Omnis omnis iure et consequatur.', '1973-12-19', 'user_19', 'completed', '1999-03-26', 'c014', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_13', 'Non iusto vero qui vel maiores.', '1998-07-07', 'user_2', 'in-progress', '2011-02-11', 'c006', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_14', 'Repellat deserunt ut quia tempore.', '1972-04-21', 'user_11', 'completed', '1992-04-01', 'c008', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_15', 'Ducimus saepe repellendus dolorum labore reiciendis inventore.', '1982-08-18', 'user_2', 'completed', '1997-12-27', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_16', 'Delectus vel beatae voluptatem.', '1987-03-25', 'user_16', 'pending', '1997-07-04', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_17', 'Nihil sapiente laudantium voluptatibus.', '2002-09-25', 'user_4', 'completed', '1973-07-01', 'c013', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_18', 'Alias dolor quo quo omnis pariatur.', '1994-11-26', 'user_17', 'pending', '1977-12-18', 'c007', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_19', 'Adipisci itaque ea quos iusto.', '2001-05-09', 'user_13', 'in-progress', '1995-03-31', 'c009', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_2', 'Excepturi ut ea sunt sed corrupti dolorum.', '2007-01-08', 'user_1', 'in-progress', '1996-08-20', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_20', 'Modi et eum quisquam.', '2008-06-05', 'user_20', 'completed', '2015-11-30', 'c014', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_3', 'Sint laboriosam saepe quae deleniti delectus reprehenderit.', '1972-03-01', 'user_16', 'pending', '1976-10-17', 'c010', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_4', 'Id repellat tempora perferendis sit eum sunt ratione.', '2011-04-06', 'user_15', 'pending', '1990-02-12', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_5', 'Qui quia dolorem mollitia magni eum delectus.', '1994-04-24', 'user_8', 'completed', '1983-07-30', 'c008', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_6', 'Quis quam ipsa vero illo.', '1989-03-08', 'user_8', 'in-progress', '2006-01-02', NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_7', 'Odit rerum aliquam mollitia aut.', '1994-08-20', 'user_9', 'in-progress', '1989-03-29', 'c011', '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('task_8', 'Eum consequatur inventore rem.', '2023-05-21', 'user_7', 'pending', '2000-06-01', 'c011', '2025-04-25 02:51:15', '2025-04-25 02:51:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `phone` varchar(255) DEFAULT NULL,
  `task` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `task`, `remember_token`, `created_at`, `updated_at`) VALUES
('user_1', 'Columbus Steuber', 'Dr._Helmer_Murazik@gmail.com', NULL, '$2y$10$g6Of9DUgATZRS7XZ01ycK.gmjga3V/6QN1DIoQ0WDNOA7SVV0qwiu', 'user', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_10', 'Glen Champlin', 'Jamil_Bosco@gmail.com', NULL, '$2a$12$t0GNfRD85qz4gCSbaIIk1.mEBfDy6dLHYupasOmIsm4yKtRq5vvq6', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_11', 'Molly Haley III', 'Favian_Streich@gmail.com', NULL, '$2y$10$.ZeCtLsmQqRaOCprIHxtr.2QY36b9oiz8x/eN33GlW58foqas0v0S', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_12', 'Karlie Lemke', 'Tomasa_Rath@gmail.com', NULL, '$2y$10$y5MEA8H6UUEy1Yum46DX6.mzg5NGfQ1zHPsuX/MuR4M1nLZH.4NxW', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_13', 'Prof. Carissa Kuhlman', 'Laury_Daniel@gmail.com', NULL, '$2y$10$T77s05OpeHSFW1jLwa59a.PIrNF.UtpYL0H/ktg/X0UgRwnJ8db62', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_14', 'Dr. Maximo Pollich II', 'Ayana_Bergnaum@gmail.com', NULL, '$2y$10$hpkPXECoyBElXG5gQiE2kOg59bUel4IbTqVtZ5V3kvwZB9IAXrCGu', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_15', 'Bethel Bergnaum', 'Sigurd_Quitzon_Jr.@gmail.com', NULL, '$2y$10$OIq53BBR5LWkO0WwQE30kOO/fn8erUQQO6upU0EbiQTe5mjb4XRdS', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_16', 'Marcos Emard', 'Prof._Jayde_Spencer@gmail.com', NULL, '$2y$10$t./yMlZclIMFbfUI/FLduux/ZMMg7gHYZtG1O/1PbqaKpEN9/DxK2', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_17', 'Mr. Fernando O\'Kon', 'Ima_Block@gmail.com', NULL, '$2y$10$O6CJ/LMVqOT7KG/WYv4/D.hjsdJEHE6XwtXZwgfO5dWFR8A4Orvvi', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_18', 'Angelo Parisian', 'Ms._Jane_Boyle_V@gmail.com', NULL, '$2y$10$QgrQoX8k6l3nLiNeBwhMR.dqV1xTvXyfkBsuMoXSPRvZ3CeVDPdmO', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_19', 'Mrs. Lempi Raynor', 'Ubaldo_Schinner@gmail.com', NULL, '$2y$10$nwRLITdat6iiT4oYcg0G6emdXY1d8dDiY6xQCks6/f06OJSu18MAq', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_2', 'Kirstin Kuvalis', 'Thaddeus_Goyette@gmail.com', NULL, '$2y$10$oVWXsUjjgrse3jnRMJX0beb8ytmft3qWpmY78KR22/ORfgV89yWSC', 'user', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_20', 'Prof. Carley Russel', 'Haleigh_Streich@gmail.com', NULL, '$2y$10$2jtvszhJttDIIts98SOfe.Wcai0FSXl1EXi.j.i/fq9jSrZ6t9yLS', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_3', 'Seth Bailey', 'Godfrey_Hessel_DDS@gmail.com', NULL, '$2y$10$7gMNaWKsz.YD.VYswgM6wucoA9FX0iiCLJZmyHU9AA9VLK7iRPERG', 'user', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_4', 'Willis Johnston DDS', 'Vernon_Robel@gmail.com', NULL, '$2y$10$3XIBxz4IIBXSrvnFmqva5uDtqT9qHxVxJB97QqT3nKEz7dWc9dFB6', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_5', 'Yolanda Shields', 'Ari_Walter@gmail.com', NULL, '$2y$10$VgxQQR5Mpfvih2Z2BpTXL.BoFoDPhM3TljYJl3yloHKtnbnqrbzse', 'user', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_6', 'Anika Weber', 'Salvador_Bayer_IV@gmail.com', NULL, '$2y$10$0ZkgdsUX1NUVShVIaFb4L.qDMRPiVGjQqi/Ufc0.bkVDtEaxd0uFq', 'user', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_7', 'Karl Ryan', 'Cathy_Emard@gmail.com', NULL, '$2y$10$ozM4sYl.iw96aWLyzHjFd.AGaDWWHfefrbUnV.ecReVYW5C6VgQZ.', 'admin', NULL, NULL, NULL, '2025-04-25 02:51:14', '2025-04-25 02:51:14'),
('user_8', 'Miss Zita Lang II', 'Maximus_Pacocha@gmail.com', NULL, '$2y$10$tuSSKHNvmLyYyhGrImIbYeAW3XwSL5rWDTdxdzRXQGlkKczLPXZba', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15'),
('user_9', 'Yvette Grimes', 'Santiago_Moore@gmail.com', NULL, '$2y$10$ZKkVOsImr9SiRba4xsAAIe5CPruJT8jLyHavBxK1T4TxL7upMKaoO', 'user', NULL, NULL, NULL, '2025-04-25 02:51:15', '2025-04-25 02:51:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`contact_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `opportunities`
--
ALTER TABLE `opportunities`
  ADD PRIMARY KEY (`opportunitie_id`),
  ADD KEY `opportunities_contact_id_foreign` (`contact_id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`);

--
-- Chỉ mục cho bảng `pipelines`
--
ALTER TABLE `pipelines`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `pipeline_columns`
--
ALTER TABLE `pipeline_columns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pipeline_columns_pipeline_id_foreign` (`pipeline_id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `tasks_user_id_foreign` (`user_id`),
  ADD KEY `tasks_contact_id_foreign` (`contact_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `pipelines`
--
ALTER TABLE `pipelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `pipeline_columns`
--
ALTER TABLE `pipeline_columns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `opportunities`
--
ALTER TABLE `opportunities`
  ADD CONSTRAINT `opportunities_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `pipeline_columns`
--
ALTER TABLE `pipeline_columns`
  ADD CONSTRAINT `pipeline_columns_pipeline_id_foreign` FOREIGN KEY (`pipeline_id`) REFERENCES `pipelines` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_contact_id_foreign` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`contact_id`) ON DELETE SET NULL,
  ADD CONSTRAINT `tasks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
