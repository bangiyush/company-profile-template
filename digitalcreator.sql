-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2026 at 12:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalcreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_sections`
--

CREATE TABLE `about_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `mission_title` varchar(255) DEFAULT NULL,
  `mission_content` text DEFAULT NULL,
  `vision_title` varchar(255) DEFAULT NULL,
  `vision_content` text DEFAULT NULL,
  `years_experience` int(11) DEFAULT NULL,
  `projects_completed` int(11) DEFAULT NULL,
  `happy_clients` int(11) DEFAULT NULL,
  `team_members` int(11) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_sections`
--

INSERT INTO `about_sections` (`id`, `title`, `content`, `image`, `mission_title`, `mission_content`, `vision_title`, `vision_content`, `years_experience`, `projects_completed`, `happy_clients`, `team_members`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'About Our Company', 'Founded in 2015, Nexus Digital has grown from a small startup to a full-service digital agency serving clients worldwide. We believe in the power of technology to transform businesses and create meaningful connections with customers. Our approach combines creativity, technical expertise, and strategic thinking to deliver solutions that exceed expectations.', NULL, 'Our Mission', 'To empower businesses with innovative digital solutions that drive growth, enhance user experiences, and create lasting impact in the digital world.', 'Our Vision', 'To be the leading digital partner for forward-thinking businesses, known for our creativity, reliability, and commitment to excellence.', 9, 250, 150, 25, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `client_logos`
--

CREATE TABLE `client_logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_settings`
--

CREATE TABLE `company_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `primary_color` varchar(255) NOT NULL DEFAULT '#8b5cf6',
  `secondary_color` varchar(255) NOT NULL DEFAULT '#3b82f6',
  `accent_color` varchar(255) NOT NULL DEFAULT '#ec4899',
  `bg_color` varchar(255) NOT NULL DEFAULT '#0a0a15',
  `text_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `card_color` varchar(255) NOT NULL DEFAULT '#ffffff',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_settings`
--

INSERT INTO `company_settings` (`id`, `company_name`, `tagline`, `description`, `logo`, `favicon`, `email`, `phone`, `address`, `facebook`, `twitter`, `instagram`, `linkedin`, `youtube`, `whatsapp`, `primary_color`, `secondary_color`, `accent_color`, `bg_color`, `text_color`, `card_color`, `created_at`, `updated_at`) VALUES
(1, 'Nexus Digital', 'Transforming Ideas Into Digital Reality', 'We are a leading digital agency specializing in web development, mobile apps, and digital marketing solutions. Our team of experts helps businesses thrive in the digital landscape.', NULL, NULL, 'hello@nexusdigital.com', '+1 (555) 123-4567', '123 Innovation Street, Tech District, San Francisco, CA 94102', 'https://facebook.com/nexusdigital', 'https://twitter.com/nexusdigital', 'https://instagram.com/nexusdigital', 'https://linkedin.com/company/nexusdigital', 'https://youtube.com/@nexusdigital', '+15551234567', '#8b5cf6', '#3b82f6', '#ec4899', '#0a0a15', '#ffffff', '#ffffff', '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `is_replied` tinyint(1) NOT NULL DEFAULT 0,
  `replied_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `phone`, `subject`, `message`, `is_read`, `is_replied`, `replied_at`, `created_at`, `updated_at`) VALUES
(1, 'Bang Iyush', 'bangiyush@gmail.com', '083845513702', 'Kerjasama', 'Halo apakah bisa saya mendapatkan informasi lebih lanjut?', 1, 0, NULL, '2026-04-08 20:17:28', '2026-04-08 20:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `button_text` varchar(255) DEFAULT NULL,
  `button_link` varchar(255) DEFAULT NULL,
  `button_text_secondary` varchar(255) DEFAULT NULL,
  `button_link_secondary` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `foreground_image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `title`, `subtitle`, `description`, `button_text`, `button_link`, `button_text_secondary`, `button_link_secondary`, `background_image`, `foreground_image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'We Build Digital Experiences That Matter', 'Award-Winning Digital Agency', 'Transform your business with cutting-edge web solutions, stunning designs, and powerful digital strategies that drive growth and engagement.', 'Start Your Project', '/contact', 'View Our Work', '/portfolio', NULL, NULL, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_01_01_000001_create_company_settings_table', 1),
(5, '2024_01_01_000002_create_hero_sections_table', 1),
(6, '2024_01_01_000003_create_about_sections_table', 1),
(7, '2024_01_01_000004_create_services_table', 1),
(8, '2024_01_01_000005_create_team_members_table', 1),
(9, '2024_01_01_000006_create_portfolios_table', 1),
(10, '2024_01_01_000007_create_testimonials_table', 1),
(11, '2024_01_01_000008_create_contact_messages_table', 1),
(12, '2026_04_09_025936_add_colors_to_company_settings_table', 2),
(13, '2026_04_09_031138_add_more_colors_to_company_settings_table', 3),
(14, '2026_04_09_035326_create_client_logos_table', 4),
(15, '2026_04_09_062200_add_long_content_to_portfolios_table', 5),
(16, '2026_04_09_062258_add_long_content_to_portfolios_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolios`
--

CREATE TABLE `portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `long_content` longtext DEFAULT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `gallery` varchar(255) DEFAULT NULL,
  `project_url` varchar(255) DEFAULT NULL,
  `completed_at` date DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolios`
--

INSERT INTO `portfolios` (`id`, `title`, `description`, `long_content`, `client_name`, `category`, `image`, `gallery`, `project_url`, `completed_at`, `sort_order`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'TechFlow Dashboard', 'A comprehensive analytics dashboard for a SaaS startup, featuring real-time data visualization and intuitive navigation.', NULL, 'TechFlow Inc.', 'Web Development', '', NULL, 'https://techflow.example.com', NULL, 1, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(2, 'GreenEats Mobile App', 'Food delivery app focused on sustainable restaurants. Features include real-time tracking, eco-friendly packaging options, and loyalty rewards.', NULL, 'GreenEats Co.', 'Mobile Apps', '', NULL, 'https://greeneats.example.com', NULL, 2, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(3, 'Luxe Fashion E-commerce', 'High-end fashion e-commerce platform with AR try-on features, personalized recommendations, and seamless checkout experience.', NULL, 'Luxe Boutique', 'E-commerce', '', NULL, 'https://luxeboutique.example.com', NULL, 3, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(4, 'HealthHub Patient Portal', 'HIPAA-compliant patient portal for a healthcare network, enabling appointment scheduling, telemedicine, and health record access.', NULL, 'HealthHub Medical', 'Web Development', '', NULL, NULL, NULL, 4, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(5, 'FinanceWise Brand Identity', 'Complete brand identity redesign for a fintech startup, including logo, visual guidelines, and marketing collateral.', NULL, 'FinanceWise', 'Branding', '', NULL, NULL, NULL, 5, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(6, 'EduLearn LMS Platform', 'Learning management system with video courses, quizzes, certifications, and progress tracking for an education company.', NULL, 'EduLearn Academy', 'Web Development', '', NULL, NULL, NULL, 6, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `features` text DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `icon`, `image`, `features`, `sort_order`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'Custom web applications built with cutting-edge technologies. From simple websites to complex enterprise solutions, we deliver scalable and secure web experiences.', 'code', NULL, '[\"Responsive Design\",\"E-commerce Solutions\",\"Custom CMS\",\"API Integration\"]', 1, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(2, 'Mobile Apps', 'Native and cross-platform mobile applications that deliver exceptional user experiences on iOS and Android devices.', 'smartphone', NULL, '[\"iOS Development\",\"Android Development\",\"Cross-Platform\",\"App Store Optimization\"]', 2, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(3, 'UI/UX Design', 'Beautiful, intuitive interfaces that delight users and drive conversions. We focus on creating designs that are both stunning and functional.', 'palette', NULL, '[\"User Research\",\"Wireframing\",\"Prototyping\",\"Design Systems\"]', 3, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(4, 'Digital Marketing', 'Data-driven marketing strategies that increase visibility, drive traffic, and convert visitors into loyal customers.', 'trending-up', NULL, '[\"SEO Optimization\",\"Social Media\",\"Content Marketing\",\"PPC Advertising\"]', 4, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(5, 'Cloud Solutions', 'Scalable cloud infrastructure and DevOps services to ensure your applications run smoothly and securely.', 'cloud', NULL, '[\"AWS\\/Azure\\/GCP\",\"CI\\/CD Pipelines\",\"Container Orchestration\",\"24\\/7 Monitoring\"]', 5, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(6, 'Consulting', 'Strategic technology consulting to help you make informed decisions and optimize your digital transformation journey.', 'lightbulb', NULL, '[\"Tech Strategy\",\"Digital Transformation\",\"Process Optimization\",\"Team Training\"]', 6, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4VCyMwvwWnqBeJfVBcQuIsw7XDBQbvU5hlLFAxon', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidzRSalluSGRrNHNkNVI2UEVnQ2F5Vk10alU2MXlzaTJNUm1QNjFkWSI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo1NDoiaHR0cDovL2xvY2FsaG9zdC9kaWdpdGFsY3JlYXRvci9wdWJsaWMvYWRtaW4vcG9ydGZvbGlvIjtzOjU6InJvdXRlIjtzOjIxOiJhZG1pbi5wb3J0Zm9saW8uaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1775729324),
('DqQNyS5Ojxd3kc0LMhppeEsJCDab771TEiZ8BND2', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibmtOZm5qU0xha3h4Q2luSDVWUzhVUllEMk5hMDhaaXlQSTdkYjdzTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjE6Imh0dHA6Ly9sb2NhbGhvc3QvZGlnaXRhbGNyZWF0b3IvcHVibGljL2FkbWluL3BvcnRmb2xpby8xL2VkaXQiO3M6NToicm91dGUiO3M6MjA6ImFkbWluLnBvcnRmb2xpby5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1775716234),
('YnrcQ2HneQRrGrR6KmKMTdTtHJlAc6mMYvHKEPv6', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiaGFUTlRxRFRzeUxCRlZKOW9GeldvYjM2QkNTWmRrb0pjTTBTT1NHdyI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjk6Il9wcmV2aW91cyI7YToyOntzOjM6InVybCI7czo1NDoiaHR0cDovL2xvY2FsaG9zdC9kaWdpdGFsY3JlYXRvci9wdWJsaWMvYWRtaW4vcG9ydGZvbGlvIjtzOjU6InJvdXRlIjtzOjIxOiJhZG1pbi5wb3J0Zm9saW8uaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1775729324);

-- --------------------------------------------------------

--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (`id`, `name`, `position`, `bio`, `photo`, `email`, `phone`, `facebook`, `twitter`, `instagram`, `linkedin`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Sarah Johnson', 'CEO & Founder', 'Visionary leader with 15+ years of experience in digital innovation. Sarah founded Nexus Digital with a mission to help businesses thrive in the digital age.', NULL, 'sarah@nexusdigital.com', NULL, NULL, 'https://twitter.com/sarahjohnson', NULL, 'https://linkedin.com/in/sarahjohnson', 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(2, 'Michael Chen', 'CTO', 'Technology expert specializing in scalable architectures and emerging technologies. Michael leads our technical teams to deliver cutting-edge solutions.', NULL, 'michael@nexusdigital.com', NULL, NULL, NULL, NULL, 'https://linkedin.com/in/michaelchen', 2, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(3, 'Emily Rodriguez', 'Creative Director', 'Award-winning designer with a passion for creating beautiful, user-centered designs that tell compelling brand stories.', NULL, 'emily@nexusdigital.com', NULL, NULL, NULL, 'https://instagram.com/emilydesigns', 'https://linkedin.com/in/emilyrodriguez', 3, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(4, 'David Kim', 'Lead Developer', 'Full-stack developer with expertise in modern web technologies. David ensures our projects are built with clean, maintainable code.', NULL, 'david@nexusdigital.com', NULL, NULL, NULL, NULL, 'https://linkedin.com/in/davidkim', 4, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `client_position` varchar(255) DEFAULT NULL,
  `client_company` varchar(255) DEFAULT NULL,
  `client_photo` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 5,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `client_name`, `client_position`, `client_company`, `client_photo`, `content`, `rating`, `sort_order`, `is_featured`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jennifer Walsh', 'CEO', 'TechFlow Inc.', NULL, 'Working with Nexus Digital was a game-changer for our business. They delivered a stunning dashboard that our users love. The team was professional, responsive, and truly understood our vision.', 5, 1, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(2, 'Robert Martinez', 'Founder', 'GreenEats Co.', NULL, 'The mobile app Nexus Digital built for us exceeded all expectations. Our customer satisfaction scores have increased by 40% since launch. Highly recommend their team!', 5, 2, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(3, 'Amanda Foster', 'Marketing Director', 'Luxe Boutique', NULL, 'The e-commerce platform has transformed our online presence. Sales have doubled and our customers compliment the beautiful design constantly.', 5, 3, 1, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57'),
(4, 'Thomas Lee', 'CTO', 'HealthHub Medical', NULL, 'Nexus Digital navigated our complex requirements with expertise. The patient portal is secure, user-friendly, and has significantly improved our patient engagement.', 4, 4, 0, 1, '2026-04-08 19:20:57', '2026-04-08 19:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@company.com', '2026-04-08 19:20:56', '$2y$12$VuU5GVJojK55RRILsbHeEO40ULL9eWz9/et/hnCtleJL.T0dgcASy', 'z6Xy52IWVg', '2026-04-08 19:20:57', '2026-04-08 19:20:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_sections`
--
ALTER TABLE `about_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `client_logos`
--
ALTER TABLE `client_logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_settings`
--
ALTER TABLE `company_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `portfolios`
--
ALTER TABLE `portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_sections`
--
ALTER TABLE `about_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client_logos`
--
ALTER TABLE `client_logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_settings`
--
ALTER TABLE `company_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `portfolios`
--
ALTER TABLE `portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
