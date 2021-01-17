-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2020 at 08:26 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslists`
--

CREATE TABLE `accesslists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `door_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accesslists`
--

INSERT INTO `accesslists` (`id`, `employee_id`, `door_id`, `created_at`, `updated_at`) VALUES
(198, 19, 8, '2020-02-23 13:21:14', '2020-02-23 13:21:14'),
(199, 19, 9, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(200, 19, 10, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(201, 19, 11, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(202, 19, 12, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(203, 19, 13, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(204, 19, 14, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(205, 19, 15, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(206, 19, 16, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(207, 19, 17, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(208, 19, 18, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(209, 19, 19, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(210, 19, 20, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(211, 19, 21, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(212, 19, 22, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(213, 19, 23, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(214, 19, 24, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(215, 19, 25, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(216, 19, 26, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(217, 19, 27, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(218, 19, 28, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(219, 19, 29, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(220, 19, 30, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(221, 19, 31, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(222, 19, 32, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(223, 19, 33, '2020-02-23 13:21:15', '2020-02-23 13:21:15'),
(224, 19, 34, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(225, 19, 35, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(226, 19, 36, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(227, 19, 37, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(228, 19, 38, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(229, 19, 39, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(230, 19, 40, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(231, 19, 41, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(232, 19, 42, '2020-02-23 13:21:16', '2020-02-23 13:21:16'),
(233, 19, 43, '2020-02-23 13:21:16', '2020-02-23 13:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `access_cards`
--

CREATE TABLE `access_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Using',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_cards`
--

INSERT INTO `access_cards` (`id`, `employee_id`, `card_number`, `status`, `created_at`, `updated_at`) VALUES
(38, 19, '000131507702004357', 'Using', '2020-02-23 07:48:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `access_card_services`
--

CREATE TABLE `access_card_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Using',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `access_card_services`
--

INSERT INTO `access_card_services` (`id`, `service_id`, `card_number`, `status`, `created_at`, `updated_at`) VALUES
(3, 2, '000131507702004358', 'Using', '2020-02-23 09:06:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+ve', NULL, '2020-02-23 02:55:44'),
(2, 'B+ve', NULL, NULL),
(3, 'AB+ve', NULL, NULL),
(4, 'O+ve', NULL, NULL),
(5, 'A-ve', NULL, NULL),
(6, 'B-ve', NULL, NULL),
(7, 'AB-ve', NULL, NULL),
(8, 'O-ve', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumptions`
--

CREATE TABLE `consumptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) NOT NULL,
  `quentity` bigint(20) NOT NULL,
  `consumption_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumptions`
--

INSERT INTO `consumptions` (`id`, `name`, `employee_id`, `quentity`, `consumption_type`, `author`, `created_at`, `updated_at`) VALUES
(22, '0', 19, 1, '1', 5, '2020-02-23 07:57:53', '2020-02-23 09:10:28'),
(23, '1', 20, 1, '0', 5, '2020-02-23 08:03:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `consumption_services`
--

CREATE TABLE `consumption_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `quentity` int(11) NOT NULL,
  `author` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consumption_services`
--

INSERT INTO `consumption_services` (`id`, `name`, `service_id`, `quentity`, `author`, `created_at`, `updated_at`) VALUES
(2, '0', 2, 1, 5, '2020-02-23 09:08:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Accounts', '2020-02-10 18:00:00', '2020-02-23 05:59:35'),
(2, 'Administration', '2020-02-23 06:00:04', '2020-02-23 06:00:04'),
(3, 'Anaesthesia (Cardiac Surgery)', '2020-02-23 06:00:20', '2020-02-23 06:00:20'),
(4, 'Anaesthesiology', '2020-02-23 06:00:39', '2020-02-23 06:00:39'),
(5, 'Bio-Medical Engineering', '2020-02-23 06:00:59', '2020-02-23 06:00:59'),
(6, 'Biochemistry', '2020-02-23 06:01:14', '2020-02-23 06:01:14'),
(7, 'CCU (Unit-1)', '2020-02-23 06:01:37', '2020-02-23 06:01:37'),
(8, 'CCU (Unit-2)', '2020-02-23 06:01:49', '2020-02-23 06:01:49'),
(9, 'CSSD', '2020-02-23 06:02:12', '2020-02-23 06:02:12'),
(10, 'Cafeteria', '2020-02-23 06:02:32', '2020-02-23 06:02:32'),
(11, 'Cancer Center', '2020-02-23 06:03:04', '2020-02-23 06:03:04'),
(12, 'Cardiology', '2020-02-23 06:04:11', '2020-02-23 06:04:11'),
(13, 'Cardiology (Unit-1)', '2020-02-23 06:04:28', '2020-02-23 06:04:28'),
(14, 'Cardiology (Unit-2)', '2020-02-23 06:04:37', '2020-02-23 06:04:37'),
(15, 'Cardiovascular & Thoracic Surgery', '2020-02-23 06:04:50', '2020-02-23 06:04:50'),
(16, 'Cardiac Surgery', '2020-02-23 06:05:11', '2020-02-23 06:05:11'),
(17, 'Cath-Lab', '2020-02-23 06:05:27', '2020-02-23 06:05:27'),
(18, 'Central Gymnasium', '2020-02-23 06:05:44', '2020-02-23 06:05:44'),
(19, 'Central Pharmacy', '2020-02-23 06:05:53', '2020-02-23 06:05:53'),
(20, 'Central Store', '2020-02-23 06:06:16', '2020-02-23 06:06:16'),
(21, 'Cleaning', '2020-02-23 06:06:26', '2020-02-23 06:06:26'),
(22, 'Cleaning & Washing', '2020-02-23 06:06:39', '2020-02-23 06:06:39'),
(23, 'Community Medicine', '2020-02-23 06:07:00', '2020-02-23 06:07:00'),
(24, 'Construction', '2020-02-23 06:07:10', '2020-02-23 06:07:10'),
(25, 'Information Technology', '2020-02-23 07:45:43', '2020-02-23 07:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `doors`
--

CREATE TABLE `doors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doors`
--

INSERT INTO `doors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(8, 'IT Door', '2020-02-23 07:28:16', '2020-02-23 07:28:16'),
(9, 'Lab door', '2020-02-23 07:28:24', '2020-02-23 07:28:24'),
(10, 'ICU Door', '2020-02-23 07:28:32', '2020-02-23 07:28:32'),
(11, 'OPD 1st Floor', '2020-02-23 07:28:44', '2020-02-23 07:28:44'),
(12, 'Accounts Office', '2020-02-23 07:28:52', '2020-02-23 07:28:52'),
(13, '202 No. Ward Front Door', '2020-02-23 07:29:12', '2020-02-23 07:29:12'),
(14, 'Central Store Door', '2020-02-23 07:29:22', '2020-02-23 07:29:22'),
(15, 'Medicine Ward Back Door', '2020-02-23 07:29:33', '2020-02-23 07:29:33'),
(16, 'Medicine & CCU Door', '2020-02-23 07:29:47', '2020-02-23 07:29:47'),
(17, 'CCU Back Door', '2020-02-23 07:29:52', '2020-02-23 07:29:52'),
(18, 'CCU Front Door', '2020-02-23 07:29:59', '2020-02-23 07:29:59'),
(19, 'CCU& Cardiology', '2020-02-23 07:30:06', '2020-02-23 07:30:06'),
(20, 'Cafeteria Front Door', '2020-02-23 07:30:12', '2020-02-23 07:30:12'),
(21, 'Emergency to Imaging Door', '2020-02-23 07:30:19', '2020-02-23 07:30:19'),
(22, 'Imaging Back Door', '2020-02-23 07:30:27', '2020-02-23 07:30:27'),
(23, 'Oncology Back Door', '2020-02-23 07:30:34', '2020-02-23 07:30:34'),
(24, 'CSSD Door', '2020-02-23 07:30:41', '2020-02-23 07:30:41'),
(25, 'Cafeteria Back Door', '2020-02-23 07:30:47', '2020-02-23 07:30:47'),
(26, 'Blood Bank', '2020-02-23 07:30:55', '2020-02-23 07:30:55'),
(27, 'General Surgery Ward Front Door', '2020-02-23 07:31:04', '2020-02-23 07:31:04'),
(28, 'General OT Front Door', '2020-02-23 07:31:10', '2020-02-23 07:31:10'),
(29, 'Gynae OT Back Door', '2020-02-23 07:31:19', '2020-02-23 07:31:19'),
(30, 'IPD Door', '2020-02-23 07:31:29', '2020-02-23 07:31:29'),
(31, 'Oncology Front Door', '2020-02-23 07:31:36', '2020-02-23 07:31:36'),
(32, 'OPD Back Door', '2020-02-23 07:31:43', '2020-02-23 07:31:43'),
(33, 'Medicine Ward Front Door', '2020-02-23 07:31:49', '2020-02-23 07:31:49'),
(34, '203 No. Cabin Front Door', '2020-02-23 07:31:55', '2020-02-23 07:31:55'),
(35, 'Cardiac OT Door', '2020-02-23 07:32:02', '2020-02-23 07:32:02'),
(36, 'General OT Back Door', '2020-02-23 07:32:09', '2020-02-23 07:32:09'),
(37, 'General Surgery Ward Back Door', '2020-02-23 07:32:16', '2020-02-23 07:32:16'),
(38, '203 No. Cabin Back Door', '2020-02-23 07:32:22', '2020-02-23 07:32:22'),
(39, '202 No. Ward Back Door', '2020-02-23 07:32:28', '2020-02-23 07:32:28'),
(40, 'Morgue', '2020-02-23 07:32:35', '2020-02-23 07:32:35'),
(41, 'Paediatrics Ward front Door', '2020-02-23 07:32:45', '2020-02-23 07:32:45'),
(42, 'Morgue Out Door', '2020-02-23 07:32:51', '2020-02-23 07:32:51'),
(43, 'General ICU Door', '2020-02-23 07:33:02', '2020-02-23 07:33:02');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blood_id` bigint(20) UNSIGNED NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `name`, `department_id`, `designation`, `card_type`, `status`, `blood_id`, `mobile`, `image`, `author_id`, `created_at`, `updated_at`) VALUES
(19, 'E160501001348', 'Prodip Munshi', 25, 'Hardware Engineer', 'Access', 'Delivered', 3, '01736834294', '1582465624.jpg', 5, '2020-02-23 07:08:30', '2020-02-23 07:59:28'),
(20, 'Test ID', 'Test Name', 16, 'Test', 'NonAccess', 'Not Printed', 1, 'test', '1582466575.jpg', 5, '2020-02-23 08:02:55', '2020-02-23 13:23:47');

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
(3, '2019_07_20_034721_create_permission_tables', 1),
(4, '2019_07_20_034826_create_products_table', 1),
(5, '2020_02_10_190200_create_blood_table', 2),
(6, '2020_02_10_190317_create_department_table', 2),
(7, '2020_02_10_190408_create_employee_table', 3),
(8, '2020_02_10_192450_create_access_card_table', 4),
(10, '2020_02_15_111913_create_consumptions_table', 5),
(11, '2020_02_17_182711_create_doors_table', 6),
(12, '2020_02_17_182945_create_servicecards_table', 7),
(13, '2020_02_17_183038_create_accesslists_table', 7),
(14, '2020_02_22_151751_create_access_card_services_table', 8),
(15, '2020_02_22_163608_create_consumption_services_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(4, 'App\\User', 16),
(4, 'App\\User', 5),
(2, 'App\\User', 17);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(2, 'role-create', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(3, 'role-edit', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(4, 'role-delete', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(5, 'product-list', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(6, 'product-create', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(7, 'product-edit', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(8, 'product-delete', 'web', '2020-02-05 07:58:37', '2020-02-05 07:58:37'),
(10, 'user-list', 'web', '2020-02-16 03:51:12', '2020-02-16 03:51:12'),
(11, 'user-create', 'web', '2020-02-16 03:51:12', '2020-02-16 03:51:12'),
(12, 'user-edit', 'web', '2020-02-16 03:51:12', '2020-02-16 03:51:12'),
(13, 'user-delete', 'web', '2020-02-16 03:51:12', '2020-02-16 03:51:12'),
(14, 'employee-list', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(15, 'employee-create', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(16, 'employee-edit', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(17, 'employee-delete', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(18, 'consumption-list', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(19, 'consumption-create', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(20, 'consumption-edit', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(21, 'consumption-delete', 'web', '2020-02-16 03:51:13', '2020-02-16 03:51:13'),
(22, 'servicecard-list', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(23, 'servicecard-create', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(24, 'servicecard-edit', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(25, 'servicecard-delete', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(26, 'door-list', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(27, 'door-create', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(28, 'door-edit', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(29, 'door-delete', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(30, 'accesslist-list', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(31, 'accesslist-create', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(32, 'accesslist-edit', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(33, 'accesslist-delete', 'web', '2020-02-17 14:01:06', '2020-02-17 14:01:06'),
(34, 'department-list', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(35, 'department-create', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(36, 'department-edit', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(37, 'department-delete', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(38, 'blood-list', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(39, 'blood-create', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(40, 'blood-edit', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36'),
(41, 'blood-delete', 'web', '2020-02-20 16:28:36', '2020-02-20 16:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quentity` bigint(255) NOT NULL,
  `author` bigint(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `quentity`, `author`, `created_at`, `updated_at`) VALUES
(10, '0', 'For  employee id card ptinting', 50, 5, '2020-02-23 06:19:08', '2020-02-23 06:19:08'),
(11, '1', 'For employee id card printing', 50, 5, '2020-02-23 06:20:02', '2020-02-23 06:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'User', 'web', '2020-02-05 10:33:10', '2020-02-16 05:00:06'),
(3, 'Admin', 'web', '2020-02-08 04:51:32', '2020-02-08 04:51:32'),
(4, 'Super Admin', 'web', '2020-02-09 12:37:56', '2020-02-09 12:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(6, 4),
(7, 4),
(8, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(20, 4),
(21, 4),
(22, 4),
(23, 4),
(24, 4),
(25, 4),
(26, 4),
(27, 4),
(28, 4),
(29, 4),
(30, 4),
(31, 4),
(32, 4),
(33, 4),
(34, 4),
(35, 4),
(36, 4),
(37, 4),
(38, 4),
(39, 4),
(40, 4),
(41, 4),
(1, 2),
(5, 2),
(6, 2),
(10, 2),
(14, 2),
(15, 2),
(16, 2),
(18, 2),
(19, 2),
(22, 2),
(23, 2),
(24, 2),
(26, 2),
(27, 2),
(28, 2),
(30, 2),
(31, 2),
(32, 2),
(34, 2),
(35, 2),
(36, 2),
(38, 2),
(39, 2),
(40, 2),
(1, 3),
(2, 3),
(3, 3),
(4, 3),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(10, 3),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(27, 3),
(28, 3),
(29, 3),
(30, 3),
(31, 3),
(32, 3),
(33, 3),
(34, 3),
(35, 3),
(36, 3),
(37, 3),
(38, 3),
(39, 3),
(40, 3),
(41, 3);

-- --------------------------------------------------------

--
-- Table structure for table `servicecards`
--

CREATE TABLE `servicecards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `servicecards`
--

INSERT INTO `servicecards` (`id`, `service_id`, `department_id`, `place`, `status`, `created_at`, `updated_at`) VALUES
(2, 'IT2020020001', 25, 'All Door', 'Delivered', '2020-02-23 08:38:08', '2020-02-23 09:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'Prodip Munshi', 'munshiprodip@gmail.com', 0, NULL, '$2y$10$MFX7oZBReaRdBCOUEzP6tOQfddRgMdMXkITIum9vx2RmLVt/dj9/6', 'NTrSgw8kYf8TC43SYuIPejBoV0xksbgCU26tRIkZXFPgiYkNbkD7lyWZrizG', '2020-02-08 04:51:32', '2020-02-16 07:37:26'),
(16, 'Engr. Tariqul Islam', 'engi.tareq@yahoo.com', 0, NULL, '$2y$10$m7QXw3uxIP9cAP2irtxwVOAeDfkNYX180bCurQ/yh.MsW/paXiNHq', NULL, '2020-02-16 07:36:50', '2020-02-16 07:36:50'),
(17, 'Md. Shohanur Rahaman', 'shohanur1986@gmail.com', 0, NULL, '$2y$10$fLgk4p7jvTrFjezzhuMigO8md4jFCp4ezNd/5L0V2dKhpIg42VLcO', NULL, '2020-02-16 07:40:01', '2020-02-16 07:40:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslists`
--
ALTER TABLE `accesslists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `accesslists_employee_id_foreign` (`employee_id`),
  ADD KEY `accesslists_door_id_foreign` (`door_id`);

--
-- Indexes for table `access_cards`
--
ALTER TABLE `access_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_card_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `access_card_services`
--
ALTER TABLE `access_card_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_card_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumptions`
--
ALTER TABLE `consumptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consumption_services`
--
ALTER TABLE `consumption_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `consumption_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doors`
--
ALTER TABLE `doors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_department_id_foreign` (`department_id`),
  ADD KEY `employee_blood_id_foreign` (`blood_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD KEY `model_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD KEY `model_has_roles_role_id_foreign` (`role_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `servicecards`
--
ALTER TABLE `servicecards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicecards_department_id_foreign` (`department_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslists`
--
ALTER TABLE `accesslists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- AUTO_INCREMENT for table `access_cards`
--
ALTER TABLE `access_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `access_card_services`
--
ALTER TABLE `access_card_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `consumptions`
--
ALTER TABLE `consumptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `consumption_services`
--
ALTER TABLE `consumption_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `doors`
--
ALTER TABLE `doors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `servicecards`
--
ALTER TABLE `servicecards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accesslists`
--
ALTER TABLE `accesslists`
  ADD CONSTRAINT `accesslists_door_id_foreign` FOREIGN KEY (`door_id`) REFERENCES `doors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `accesslists_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `access_cards`
--
ALTER TABLE `access_cards`
  ADD CONSTRAINT `access_card_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `access_card_services`
--
ALTER TABLE `access_card_services`
  ADD CONSTRAINT `access_card_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `servicecards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `consumption_services`
--
ALTER TABLE `consumption_services`
  ADD CONSTRAINT `consumption_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `servicecards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employee_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employee_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `servicecards`
--
ALTER TABLE `servicecards`
  ADD CONSTRAINT `servicecards_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
