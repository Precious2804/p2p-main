-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2021 at 08:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p2p`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_amount_providavles`
--

CREATE TABLE `all_amount_providavles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amountProv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_amount_providavles`
--

INSERT INTO `all_amount_providavles` (`id`, `amountProv`, `created_at`, `updated_at`) VALUES
(1, '5000', '2021-06-21 10:16:31', '2021-06-21 10:16:31'),
(2, '10000', '2021-06-21 10:16:50', '2021-06-21 10:16:50'),
(3, '20000', '2021-06-21 10:17:47', '2021-06-21 10:17:47'),
(4, '300000', '2021-06-21 10:18:00', '2021-06-21 10:18:00');

-- --------------------------------------------------------

--
-- Table structure for table `all_get_requests`
--

CREATE TABLE `all_get_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `get_help_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_provided_helps`
--

CREATE TABLE `all_provided_helps` (
  `prov_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `all_tickets`
--

CREATE TABLE `all_tickets` (
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_tickets`
--

INSERT INTO `all_tickets` (`ticket_id`, `id`, `email`, `ticket_type`, `created_at`, `updated_at`) VALUES
(1, 'db23365d733a', 'tester@gmail.com', 'Enquiry', '2021-06-21 10:20:10', '2021-06-21 10:20:10');

-- --------------------------------------------------------

--
-- Table structure for table `chat_replies`
--

CREATE TABLE `chat_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reply_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_supports`
--

CREATE TABLE `chat_supports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attach` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat_supports`
--

INSERT INTO `chat_supports` (`id`, `unique_id`, `email`, `ticket_type`, `subject`, `message`, `attach`, `reply`, `created_at`, `updated_at`) VALUES
(1, 'db23365d733a', 'tester@gmail.com', 'Enquiry', 'Something about Enqiry', 'I want to know more about this stuff', '/storage/No Attachment', NULL, '2021-06-21 10:20:10', '2021-06-21 10:20:10'),
(2, 'db23365d733a', 'tester@gmail.com', 'Enquiry', NULL, 'Please tell me more', '/storage/chatAttachments/1624274494_profile-img.jpg', NULL, '2021-06-21 10:21:34', '2021-06-21 10:21:34'),
(3, 'db23365d733a', 'tester@gmail.com', 'Enquiry', NULL, NULL, NULL, 'What would u like to know sir', '2021-06-21 10:22:47', '2021-06-21 10:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `completed_provides`
--

CREATE TABLE `completed_provides` (
  `tab_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `get_help_id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `merge_helps`
--

CREATE TABLE `merge_helps` (
  `merge_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_help_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `merge_helps`
--

INSERT INTO `merge_helps` (`merge_id`, `id`, `get_help_id`, `amount`, `acct_name`, `acct_number`, `bank`, `phone`, `created_at`, `updated_at`) VALUES
(1, '0a3d0d64a986', '3a6e1866ba6c', '20000', 'Tester2 Money2', '01010101010', 'Tester2 Microfinance2 Bank2', '08176157244', '2021-06-21 10:29:33', '2021-06-21 10:29:33'),
(2, '13c96c1bfba5', '37a748b9a346', '10000', 'Tester2 Money2', '01010101010', 'Tester2 Microfinance2 Bank2', '08176157244', '2021-06-21 10:37:50', '2021-06-21 10:37:50'),
(3, 'b09caa6219ae', '0a3d0d64a986', '15000', 'Tester Money', '3098476748', 'Tester Microfinance Bank', '08176157244', '2021-06-21 10:55:53', '2021-06-21 10:55:53');

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
(4, '2021_05_23_235514_create_payment_proofs_table', 1),
(5, '2021_05_24_024043_create_provide_helps_table', 1),
(6, '2021_05_24_045655_create_all_provided_helps_table', 1),
(7, '2021_05_24_210941_create_user_total_helps_table', 1),
(8, '2021_05_28_073610_create_referral_tables_table', 1),
(9, '2021_05_29_092836_create_process_gets_table', 1),
(10, '2021_05_31_203538_create_contact_us_table', 1),
(11, '2021_06_03_202152_create_chat_supports_table', 1),
(12, '2021_06_04_223121_create_all_tickets_table', 1),
(13, '2021_06_05_200840_create_all_get_requests_table', 1),
(14, '2021_06_05_211100_create_merge_helps_table', 1),
(15, '2021_06_05_221836_create_completed_provides_table', 1),
(16, '2021_06_07_213742_create_running_investments_table', 1),
(17, '2021_06_08_204918_create_chat_replies_table', 1),
(18, '2021_06_10_082951_create_all_amount_providavles_table', 1),
(19, '2021_06_10_083412_create_setting_tables_table', 1),
(20, '2021_06_16_143035_create_testimonials_table', 1);

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
-- Table structure for table `payment_proofs`
--

CREATE TABLE `payment_proofs` (
  `proof_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_help_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dep_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_date` date NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `proof` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `process_gets`
--

CREATE TABLE `process_gets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `get_help_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `process_gets`
--

INSERT INTO `process_gets` (`id`, `email`, `get_help_id`, `created_at`, `updated_at`) VALUES
(1, 'tester@gmail.com', '0a3d0d64a986', '2021-06-21 10:52:08', '2021-06-21 10:52:08'),
(2, 'tester@gmail.com', '0a3d0d64a986', '2021-06-21 10:52:44', '2021-06-21 10:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `provide_helps`
--

CREATE TABLE `provide_helps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provide_helps`
--

INSERT INTO `provide_helps` (`id`, `amount`, `email`, `rate`, `profit`, `total`, `created_at`, `updated_at`) VALUES
(1, '20000', 'tester@gmail.com', '50', '10000', '30000', '2021-06-21 10:16:11', '2021-06-21 10:28:28'),
(2, '10000', 'tester2@gmail.com', '50', '5000', '15000', '2021-06-21 10:25:19', '2021-06-21 10:54:52');

-- --------------------------------------------------------

--
-- Table structure for table `referral_tables`
--

CREATE TABLE `referral_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commision` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `referral_tables`
--

INSERT INTO `referral_tables` (`id`, `email`, `ref_id`, `commision`, `created_at`, `updated_at`) VALUES
(1, 'tester@gmail.com', 'Tester', '1', '2021-06-21 10:16:12', '2021-06-21 10:25:19'),
(2, 'tester2@gmail.com', 'Tester2', NULL, '2021-06-21 10:25:19', '2021-06-21 10:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `running_investments`
--

CREATE TABLE `running_investments` (
  `tab_id` int(10) UNSIGNED NOT NULL,
  `id` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `running_investments`
--

INSERT INTO `running_investments` (`tab_id`, `id`, `email`, `amount`, `rate`, `profit`, `total`, `created_at`, `updated_at`) VALUES
(2, '13c96c1bfba5', 'tester@gmail.com', '20000', '50', '10000', '30000', '2021-06-21 10:39:54', '2021-06-21 10:39:54'),
(3, 'b09caa6219ae', 'tester2@gmail.com', '10000', '50', '5000', '15000', '2021-06-21 11:01:39', '2021-06-21 11:01:39');

-- --------------------------------------------------------

--
-- Table structure for table `setting_tables`
--

CREATE TABLE `setting_tables` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '50',
  `maxProv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '2',
  `beforeGet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_tables`
--

INSERT INTO `setting_tables` (`id`, `rate`, `maxProv`, `beforeGet`, `created_at`, `updated_at`) VALUES
(1, '50', '2', '2', '2021-06-21 10:16:15', '2021-06-21 10:17:30');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allInvestors` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `highest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ref_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acct_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acct_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `phone`, `gender`, `address`, `ref_id`, `password`, `acct_name`, `acct_number`, `acct_type`, `bank`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Tester', 'Tester', 'Tester', 'tester@gmail.com', '08176157244', 'Male', '29 umuaga street abakpa nike enugu', NULL, '$2y$10$KO3l9eRid/AhQNlvpPGjdOD.V3NnZQUkOSFeuFiggVwejBbAEgkZK', 'Tester Money', '3098476748', 'Savings', 'Tester Microfinance Bank', '/storage/uploads/1624274355_fav.png', '2021-06-21 10:16:11', '2021-06-21 10:19:16'),
(2, 'Tester2', 'Tester2', 'Tester2', 'tester2@gmail.com', '08176157244', NULL, NULL, 'Tester', '$2y$10$CwvP8jcWF3OY1lAVvq2C1u73wdWpkaGZfqWfT.zCi34RIe8qwIDsa', 'Tester2 Money2', '01010101010', 'Savings', 'Tester2 Microfinance2 Bank2', NULL, '2021-06-21 10:25:19', '2021-06-21 10:27:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_total_helps`
--

CREATE TABLE `user_total_helps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalAmount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalProfit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sumTotal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noOfInvestments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_total_helps`
--

INSERT INTO `user_total_helps` (`id`, `email`, `totalAmount`, `totalProfit`, `sumTotal`, `noOfInvestments`, `created_at`, `updated_at`) VALUES
(1, 'tester@gmail.com', '10000', '5000', '15000', '2', '2021-06-21 10:16:12', '2021-06-21 10:28:47'),
(2, 'tester2@gmail.com', '0', '0', '0', '1', '2021-06-21 10:25:19', '2021-06-21 10:55:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_amount_providavles`
--
ALTER TABLE `all_amount_providavles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_get_requests`
--
ALTER TABLE `all_get_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `all_provided_helps`
--
ALTER TABLE `all_provided_helps`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `all_tickets`
--
ALTER TABLE `all_tickets`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `chat_replies`
--
ALTER TABLE `chat_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_supports`
--
ALTER TABLE `chat_supports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `completed_provides`
--
ALTER TABLE `completed_provides`
  ADD PRIMARY KEY (`tab_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `merge_helps`
--
ALTER TABLE `merge_helps`
  ADD PRIMARY KEY (`merge_id`);

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
-- Indexes for table `payment_proofs`
--
ALTER TABLE `payment_proofs`
  ADD PRIMARY KEY (`proof_id`);

--
-- Indexes for table `process_gets`
--
ALTER TABLE `process_gets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provide_helps`
--
ALTER TABLE `provide_helps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referral_tables`
--
ALTER TABLE `referral_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `referral_tables_ref_id_unique` (`ref_id`);

--
-- Indexes for table `running_investments`
--
ALTER TABLE `running_investments`
  ADD PRIMARY KEY (`tab_id`);

--
-- Indexes for table `setting_tables`
--
ALTER TABLE `setting_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_acct_number_unique` (`acct_number`);

--
-- Indexes for table `user_total_helps`
--
ALTER TABLE `user_total_helps`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_amount_providavles`
--
ALTER TABLE `all_amount_providavles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `all_get_requests`
--
ALTER TABLE `all_get_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_provided_helps`
--
ALTER TABLE `all_provided_helps`
  MODIFY `prov_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_tickets`
--
ALTER TABLE `all_tickets`
  MODIFY `ticket_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chat_replies`
--
ALTER TABLE `chat_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chat_supports`
--
ALTER TABLE `chat_supports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `completed_provides`
--
ALTER TABLE `completed_provides`
  MODIFY `tab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merge_helps`
--
ALTER TABLE `merge_helps`
  MODIFY `merge_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `payment_proofs`
--
ALTER TABLE `payment_proofs`
  MODIFY `proof_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `process_gets`
--
ALTER TABLE `process_gets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `provide_helps`
--
ALTER TABLE `provide_helps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `referral_tables`
--
ALTER TABLE `referral_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `running_investments`
--
ALTER TABLE `running_investments`
  MODIFY `tab_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `setting_tables`
--
ALTER TABLE `setting_tables`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_total_helps`
--
ALTER TABLE `user_total_helps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
