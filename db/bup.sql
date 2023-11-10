-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 10, 2022 at 09:40 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bup`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_en` longtext COLLATE utf8mb4_unicode_ci,
  `description_bn` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

DROP TABLE IF EXISTS `careers`;
CREATE TABLE IF NOT EXISTS `careers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1=Notice,2=Form,3=Result',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_attachments`
--

DROP TABLE IF EXISTS `career_attachments`;
CREATE TABLE IF NOT EXISTS `career_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `career_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attachment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `career_attachments_career_id_foreign` (`career_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `mission` longtext COLLATE utf8mb4_unicode_ci,
  `vision` longtext COLLATE utf8mb4_unicode_ci,
  `motto` text COLLATE utf8mb4_unicode_ci,
  `establish_date` datetime NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'ban.jpg',
  `member_list` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'lift.pdf',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clubs_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`id`, `name`, `faculty_id`, `department_id`, `description`, `mission`, `vision`, `motto`, `establish_date`, `url`, `banner`, `member_list`, `created_at`, `updated_at`) VALUES
(1, 'BUP IT CLUB', 4, 1, '<p>BUP IT ClubForum is the biggest platform of BUP students to exhibit and upgrade their skills in different forms of Arts. The forum is highly committed towards Bengali culture and tradition. At the same time, it is respectful to all other cultural sects of the world. From the beginning days of BUP, the forum is on the lead of University&rsquo;s cultural arena by organizing different events and programs.</p>', '<p>Creating opportunity to participate in art forms such as Music, Dance, Theatre, Fine arts (Painting, Sketching, Collage etc.) and many other events, like Quiz, Debate, Elocution at Intra and Inter university level to provide students multitude of exposure and experience.</p>', '<p>Creating opportunity to participate in art forms such as Music, Dance, Theatre, Fine arts (Painting, Sketching, Collage etc.) and many other events, like Quiz, Debate, Elocution at Intra and Inter university level to provide students multitude of exposure and experience.</p>', 'Knowledge is Power', '2022-09-07 10:43:59', 'https://bup.edu.bd/clubs/cultural-forum', '20220914_1663140012578.png', 'lift.pdf', '2022-09-07 10:43:59', '2022-09-14 01:20:13'),
(2, 'Skyler Baxter', 4, 2, '<p>Doloremque eaque sed.</p>', '<p>Reprehenderit, venia.</p>', '<p>Quas nihil voluptate.</p>', 'Iusto necessitatibus', '2008-09-20 00:00:00', 'Voluptates laborum s', '20220914_166314295620.png', 'D:\\wamp\\tmp\\php6A5D.tmp', '2022-09-08 03:22:48', '2022-09-14 02:09:17'),
(3, 'Patience Stein', 1, 3, '<p>Cupidatat harum aut .</p>', '<p>Magnam doloremque iu.</p>', '<p>Pariatur. Ipsam plac.</p>', 'Sint debitis saepe q', '1984-01-19 00:00:00', 'Error quia laborum c', '20220914_1663142996385.png', 'D:\\wamp\\tmp\\php1EAF.tmp', '2022-09-08 04:48:08', '2022-09-14 02:09:56'),
(4, 'Career BUP', 4, 2, NULL, NULL, NULL, 'Career your decision yous', '2022-09-11 00:00:00', 'efdefgdfg', 'D:\\wamp\\tmp\\php7183.tmp', 'D:\\wamp\\tmp\\php7182.tmp', '2022-09-10 22:20:47', '2022-09-10 22:20:47'),
(5, 'Programming Club', 4, 5, NULL, NULL, NULL, NULL, '2022-09-15 00:00:00', NULL, '20220914_1663147288859.png', 'lift.pdf', '2022-09-14 00:55:22', '2022-09-14 03:21:29');

-- --------------------------------------------------------

--
-- Table structure for table `club_designations`
--

DROP TABLE IF EXISTS `club_designations`;
CREATE TABLE IF NOT EXISTS `club_designations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `club_designations_name_unique` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_designations`
--

INSERT INTO `club_designations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'President', '2022-09-07 09:55:01', NULL),
(2, 'Vice-President', '2022-09-07 09:55:41', NULL),
(3, 'secretary', '2022-10-04 04:03:54', NULL),
(4, 'Executive Member', NULL, NULL),
(5, 'Member', '2022-10-04 04:04:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `club_members`
--

DROP TABLE IF EXISTS `club_members`;
CREATE TABLE IF NOT EXISTS `club_members` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_members`
--

INSERT INTO `club_members` (`id`, `student_id`, `name`, `email`, `phone`, `image`, `short_description`, `verify_token`, `status`, `created_at`, `updated_at`) VALUES
(40, 151621031811, 'zobayer', 'zobayer@mail.com', '01759457400', NULL, NULL, '', 1, '2022-10-06 05:47:01', '2022-10-06 05:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `club_member_mappings`
--

DROP TABLE IF EXISTS `club_member_mappings`;
CREATE TABLE IF NOT EXISTS `club_member_mappings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `club_member_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `club_id` bigint(20) UNSIGNED DEFAULT NULL,
  `club_designation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `join_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club_member_mappings`
--

INSERT INTO `club_member_mappings` (`id`, `club_member_id`, `faculty_id`, `department_id`, `club_id`, `club_designation_id`, `join_date`, `created_at`, `updated_at`) VALUES
(17, 40, 11, 11, NULL, NULL, NULL, '2022-10-06 05:47:01', '2022-10-06 05:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `committe_types`
--

DROP TABLE IF EXISTS `committe_types`;
CREATE TABLE IF NOT EXISTS `committe_types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `committe_types`
--

INSERT INTO `committe_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Senate Committee Member', '2022-09-12 04:18:06', NULL),
(2, 'Syndicate Committee Member', '2022-09-12 04:18:06', NULL),
(3, 'Academic Council Member', '2022-09-12 04:19:57', NULL),
(4, 'Finance Committee Member', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE IF NOT EXISTS `departments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `ucam_department_id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `faculty_id`, `ucam_department_id`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Department of International Relations (BMA)', 1, 101, NULL, '2022-08-24 23:58:07', '2022-08-25 01:35:20'),
(2, 'Information Communication Technology', 4, 1023, NULL, '2022-08-24 23:58:25', '2022-08-25 01:37:28'),
(3, 'BA/BSS Program (BMA)', 1, 102, NULL, '2022-08-25 00:00:19', '2022-08-25 01:34:35'),
(5, 'Computer Science and Engineering', 4, 112, NULL, '2022-08-25 00:20:00', '2022-08-25 01:36:17'),
(7, 'Electronics and Electrical Engineering', 4, 71, NULL, '2022-09-08 03:26:51', '2022-09-08 03:26:51'),
(8, 'Department of Economics', 64, 41, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(9, 'Department of Environmental Science', 68, 43, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(10, 'Department of International Relations (BMA)', 65, 127, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(11, 'Department of Business Admininistration in Marketing', 66, 36, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(12, 'Department of Computer Science and Engineering (CSE)', 68, 38, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(13, 'Department of Development Studies', 64, 39, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(14, 'Department of Peace, Conflict & Human Rights', 69, 50, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(15, 'Department of Information and Communication Technology', 68, 45, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(16, 'Department of English', 64, 42, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(17, 'Department of Business Admininistration in Finance & Banking', 66, 35, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(18, 'Department of Sociology', 64, 54, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(19, 'Department of Business Administration in Management Studies', 66, 32, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(20, 'BA/BSS Program', 64, 9, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(21, 'Department of Mass Communication & Journalism', 69, 48, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(22, 'Department of Business Administrartion in Accounting & Information System', 66, 37, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(23, 'Department of Law', 69, 47, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(24, 'Department of Business Admininistration - General', 66, 34, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(25, 'Department of Economics (BMA)', 65, 125, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(26, 'Department of Disaster Management & Resilience (DMR)', 64, 40, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(27, 'Department of International Relations', 69, 46, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(28, 'Department of Public Administration', 64, 52, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18'),
(29, 'Department of Business Administration (BMA)', 65, 33, NULL, '2022-09-18 23:08:18', '2022-09-18 23:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

DROP TABLE IF EXISTS `designations`;
CREATE TABLE IF NOT EXISTS `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `event_for` tinyint(4) NOT NULL COMMENT 'office = 1, faculty_dept = 2 club = 3, on_campus = 4',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `visible` tinyint(4) NOT NULL DEFAULT '0',
  `show_on_homepage` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_for`, `title`, `description`, `location`, `start_date`, `end_date`, `visible`, `show_on_homepage`, `created_at`, `updated_at`) VALUES
(1, 3, 'bnmbnm', '<p>bnmbm</p>', 'bnmb', '2022-09-07 00:00:00', '2022-09-16 00:00:00', 1, 1, '2022-09-21 04:25:14', '2022-09-21 04:25:14');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

DROP TABLE IF EXISTS `faculties`;
CREATE TABLE IF NOT EXISTS `faculties` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ucam_faculty_id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `ucam_faculty_id`, `about`, `created_at`, `updated_at`) VALUES
(1, 'Faculty of Business and Social Sciences (FBSS)', 65, NULL, '2022-08-24 23:10:55', '2022-08-25 01:31:19'),
(2, 'Faculty of Security and Strategic Studies', 66, NULL, '2022-08-24 23:12:18', '2022-08-25 01:31:39'),
(4, 'Faculty of Science and Technology(FST)', 67, NULL, '2022-08-24 23:38:31', '2022-09-26 21:32:56'),
(5, 'Faculty of Arts & Social Science', 64, NULL, '2022-09-18 23:07:05', '2022-09-18 23:07:05'),
(6, 'Faculty of Science & Technology', 68, NULL, '2022-09-18 23:07:05', '2022-09-18 23:07:05'),
(7, 'Faculty of Security & Strategic Studies', 69, NULL, '2022-09-18 23:07:05', '2022-09-18 23:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` longtext COLLATE utf8mb4_unicode_ci,
  `answer` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_faculty_id_foreign` (`faculty_id`),
  KEY `faqs_department_id_foreign` (`department_id`),
  KEY `faqs_program_id_foreign` (`program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `frontend_menus`
--

DROP TABLE IF EXISTS `frontend_menus`;
CREATE TABLE IF NOT EXISTS `frontend_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rand_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `parent_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gallery_category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_gallery_category_id_foreign` (`gallery_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

DROP TABLE IF EXISTS `gallery_categories`;
CREATE TABLE IF NOT EXISTS `gallery_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_links`
--

DROP TABLE IF EXISTS `home_links`;
CREATE TABLE IF NOT EXISTS `home_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `parent` int(11) NOT NULL,
  `route` varchar(191) NOT NULL,
  `sort` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `icon` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent`, `route`, `sort`, `status`, `icon`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Menu Management', 0, 'menu', 1, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(2, 'Menu List', 1, 'menu', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(3, 'Menu Icon', 1, 'menu.icon', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(4, 'User Management', 0, 'user', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(5, 'View Users', 4, 'user', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(6, 'User Roles', 4, 'user.role', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(7, 'Menu Permission', 4, 'user.permission', 3, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(8, 'Profile Management', 0, 'profile-management', 3, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(9, 'Change Password', 8, 'profile-management.change.password', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(10, 'Change Profile', 8, 'profile-management.change.profile', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(11, 'HomePages', 0, 'homepages', 4, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(12, 'Slider', 11, 'homepages.slider.view', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(13, 'Image Gallery', 11, 'homepages.gallery', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(14, 'Events', 11, 'homepages.event', 4, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(15, 'Notice', 11, 'homepages.notice', 5, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(16, 'News', 11, 'homepages.news', 5, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(17, 'Video Gallery', 11, 'homepages.video.gallery', 3, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(18, 'Site Menu', 0, 'frontend-menu', 3, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(19, 'Menu Post', 18, 'frontend-menu.post.view', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(20, 'Menu View', 18, 'frontend-menu.menu.view', 3, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(25, 'Designation', 4, 'user.designation', 4, 0, NULL, NULL, '2022-05-24 16:32:33', NULL),
(64, 'Setup', 0, 'setup', 4, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(65, 'Manage Faculty', 64, 'setup.manage_faculty', 1, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(67, 'Manage Department', 64, 'setup.manage_department', 2, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(68, 'Program Category', 64, 'setup.program_category', 3, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(69, 'Program', 64, 'setup.program', 4, 1, NULL, NULL, '2022-05-24 16:32:33', NULL),
(70, 'Manage FAQ', 64, 'setup.faq', 5, 1, NULL, NULL, NULL, NULL),
(71, 'Manage Photo', 64, 'setup.photo', 6, 1, NULL, NULL, NULL, NULL),
(72, 'Manage Personnels', 0, 'manage_profile', 5, 1, NULL, NULL, NULL, NULL),
(73, 'From Faculty Api Profiles', 72, 'manage_profile.from_api', 1, 0, NULL, NULL, NULL, NULL),
(74, 'Personnels', 72, 'manage_profile.from_database', 2, 1, NULL, NULL, NULL, NULL),
(75, 'Manage Career', 64, 'setup.career.view', 7, 1, NULL, NULL, NULL, NULL),
(76, 'Manage Office', 64, 'setup.manage_office', 2, 1, NULL, NULL, NULL, NULL),
(77, 'Regulatory Bodies', 0, 'manage.regulatory.bodies', 6, 1, NULL, NULL, NULL, NULL),
(78, 'Senate Committee Member', 77, 'senate.committee.member', 1, 1, NULL, NULL, NULL, NULL),
(79, 'Syndicate Committee Member', 77, 'syndicate.committee.member', 2, 1, NULL, NULL, NULL, NULL),
(80, 'Academic Council Member\r\n', 77, 'academic.committee.member', 3, 1, NULL, NULL, NULL, NULL),
(81, 'Finance Committee Member', 77, 'finance.committee.member', 4, 1, NULL, NULL, NULL, NULL),
(82, 'Manage Clubs', 0, 'manage.club', 7, 1, NULL, NULL, NULL, NULL),
(83, 'Club Lists', 82, 'club.list', 1, 1, NULL, NULL, NULL, NULL),
(84, 'Manage event', 82, 'event.list', 2, 1, NULL, NULL, NULL, NULL),
(85, 'Member Add', 82, 'member.list', 3, 1, NULL, NULL, '2022-10-04 04:29:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menu_permissions`
--

DROP TABLE IF EXISTS `menu_permissions`;
CREATE TABLE IF NOT EXISTS `menu_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permitted_route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_from` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menu_permissions_menu_id_foreign` (`menu_id`),
  KEY `menu_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_permissions`
--

INSERT INTO `menu_permissions` (`id`, `menu_id`, `role_id`, `permitted_route`, `menu_from`, `created_at`, `updated_at`) VALUES
(22, 4, 3, 'user', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(23, 5, 3, 'user', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(24, 6, 3, 'user.role', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(25, 7, 3, 'user.permission', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(26, 25, 3, 'user.designation', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(27, 8, 3, 'profile-management', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(28, 9, 3, 'profile-management.change.password', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(29, 10, 3, 'profile-management.change.profile', 'menu', '2022-06-21 01:26:02', '2022-06-21 01:26:02'),
(55, 5, 2, 'user', 'menu', '2022-08-03 02:24:10', '2022-08-03 02:24:10'),
(56, 4, 2, 'user', 'menu', '2022-08-03 02:24:10', '2022-08-03 02:24:10'),
(57, 7, 2, 'user.permission', 'menu', '2022-08-03 02:24:10', '2022-08-03 02:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `menu_posts`
--

DROP TABLE IF EXISTS `menu_posts`;
CREATE TABLE IF NOT EXISTS `menu_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_routes`
--

DROP TABLE IF EXISTS `menu_routes`;
CREATE TABLE IF NOT EXISTS `menu_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_01_090751_create_site_settings_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_02_062512_create_menu_posts_table', 1),
(6, '2019_12_02_062605_create_frontend_menus_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_04_07_051329_create_sliders_table', 1),
(9, '2021_04_07_051709_create_abouts_table', 1),
(10, '2022_04_12_114408_create_home_links_table', 1),
(11, '2022_04_12_123912_create_menu_routes_table', 1),
(12, '2022_04_12_135500_create_gallery_categories_table', 1),
(13, '2022_04_12_141551_create_galleries_table', 1),
(14, '2022_04_13_144713_create_notices_table', 1),
(16, '2022_04_13_144929_create_news_table', 1),
(17, '2022_04_26_120522_create_slider_categories_table', 1),
(18, '2022_05_23_073447_create_roles_table', 1),
(19, '2022_05_23_094314_create_user_roles_table', 1),
(20, '2022_05_23_095741_create_menus_table', 1),
(21, '2022_05_23_102029_create_menu_permissions', 1),
(25, '2022_05_29_124246_create_divisions_table', 2),
(26, '2022_05_30_045412_create_districts_table', 3),
(27, '2022_05_30_045958_create_upazilas_table', 4),
(28, '2022_05_30_050348_create_municipals_table', 5),
(29, '2022_05_30_060700_create_unions_table', 6),
(38, '2022_06_06_051002_create_circles_table', 7),
(39, '2022_06_06_051217_create_city_corporations_table', 7),
(40, '2022_06_06_051220_create_projects_table', 7),
(41, '2022_06_06_051225_create_project_attachments_table', 7),
(42, '2022_06_06_051350_create_ptws_table', 7),
(43, '2022_06_06_062719_create_ptw_images_table', 7),
(45, '2022_06_07_045639_general_municipality_infos', 8),
(46, '2022_06_07_062622_core_municipality_infos', 9),
(48, '2022_06_08_060945_pipe_dias', 10),
(49, '2022_06_08_054654_add_circle_id_column_to_districts_table', 11),
(50, '2022_06_15_080043_create_municipal_categories_table', 11),
(51, '2022_06_15_114158_create_municipal_types_table', 12),
(52, '2022_06_15_120806_create_components_table', 13),
(53, '2022_06_16_042503_create_project_municipals_table', 14),
(57, '2022_06_16_044315_create_project_details_table', 15),
(58, '2022_06_16_044324_create_project_detail_municipals_table', 15),
(59, '2022_06_16_061914_create_project_detail_city_corporations_table', 15),
(60, '2022_06_17_084700_create_project_components_table', 16),
(61, '2022_06_19_113504_create_pipeline_dias', 17),
(62, '2022_06_19_120859_create_pipeline_informations_table', 18),
(63, '2022_06_20_093642_add_working_area_to_roles_table', 19),
(64, '2022_06_20_115126_create_designations_table', 20),
(65, '2022_06_27_062019_add_extra_columns_to_general_municipality_infos', 21),
(66, '2022_06_27_123322_add_extra_fields_to_ptws_table', 22),
(67, '2022_06_28_070242_ptw_water_qualities', 23),
(71, '2022_07_03_075847_create_manage_owts_table', 24),
(72, '2022_07_03_130051_create_manage_wtps_table', 25),
(73, '2022_08_04_054131_add_bup_id_designation_department_address_to_users', 26),
(75, '2022_08_07_032028_create_program_categories_table', 27),
(76, '2022_08_25_034630_create_faculties_table', 28),
(77, '2022_08_07_042518_create_programs_table', 29),
(78, '2022_08_25_045112_create_departments_table', 30),
(81, '2022_08_25_105847_create_faqs_table', 31),
(82, '2022_08_31_043957_create_profiles_table', 31),
(85, '2022_09_05_081340_create_regulatory_committes_table', 32),
(86, '2022_09_05_081834_create_committe_types_table', 32),
(87, '2022_09_07_094920_create_club_designations_table', 33),
(88, '2022_09_07_095642_create_clubs_table', 34),
(89, '2022_09_07_102136_create_club_members_table', 35),
(106, '2022_09_07_100841_create_careers_table', 36),
(107, '2022_09_11_042444_create_offices_table', 36),
(108, '2022_09_13_040225_create_career_attachments_table', 36),
(109, '2022_09_13_060821_create_profile_journals_table', 36),
(110, '2022_09_13_062801_create_profile_conferences_table', 36),
(111, '2022_09_13_063143_create_profile_books_table', 36),
(112, '2022_09_13_063550_create_profile_award_honors_table', 36),
(113, '2022_09_13_064338_create_profile_research_area_interests_table', 36),
(114, '2022_09_13_064837_create_profile_biographies_table', 36),
(115, '2022_09_13_065429_create_profile_professional_activities', 36),
(116, '2022_09_13_070149_create_profile_course_taughts_table', 36),
(117, '2022_09_13_070850_create_profile_google_scholars_table', 36),
(118, '2022_09_13_071211_create_profile_research_gates_table', 36),
(119, '2022_09_13_092258_create_profile_memberships_table', 36),
(120, '2022_09_13_092812_create_profile_websites_table', 36),
(121, '2022_09_21_041905_create_events_table', 36),
(125, '2022_10_04_035435_create_club_member_mappings_table', 37),
(126, '2022_10_06_084229_add_email_phone_to_club_members', 37);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offices`
--

DROP TABLE IF EXISTS `offices`;
CREATE TABLE IF NOT EXISTS `offices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ucam_office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

DROP TABLE IF EXISTS `profiles`;
CREATE TABLE IF NOT EXISTS `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `office_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bup_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameEn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nameBn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_education` text COLLATE utf8mb4_unicode_ci,
  `experience` text COLLATE utf8mb4_unicode_ci,
  `photo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `faculty_id`, `department_id`, `office_id`, `bup_no`, `nameEn`, `nameBn`, `email`, `designation`, `phone`, `mobile`, `blood_group`, `rank`, `appointment_type`, `detail_education`, `experience`, `photo_path`, `created_at`, `updated_at`) VALUES
(1, 64, 41, NULL, 'BA-4909', 'Lieutenant Colonel   Md. Shamsul Kabir, Psc, Arty', 'লেফটেন্যান্ট কর্নেল মোঃ শামসুল কবীর, পিএসসি, আর্টি', 'N/A', 'Chairman', '', 'N/A', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'http://hr.bup.edu.bd/upload/picture/17204.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(2, 68, 43, NULL, 'BA-4294', 'Lieutenant Colonel   Md Jahangir Hossain, te, sigs', 'লেফটেন্যান্ট কর্নেল মোঃ জাহাঙ্গীর হোসেন, টিই, সিগস্', 'chairman.es@bup.edu.bd', 'Chairman', '+8801769021596', 'N/A', 'O+', 'Lieutenant Colonel  ', 'Deputation', 'Masters, MIST; ', '', 'http://hr.bup.edu.bd/upload/picture/22390.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(3, 65, 127, NULL, 'BA-6023', 'Lieutenant Colonel   Khalid Bin Ismot Biplob, Mphil, ACE', 'লেফটেন্যান্ট কর্নেল খালিদ বিন ইসমত বিপ্লব, এমফিল, এইসি', 'khalid.biplob@gmail.com', 'Chairman', '', 'N/A', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(4, 66, 36, NULL, 'BA-5235', 'Lieutenant Colonel   Sarder Ali Haider, BSP, ord', 'লেফটেন্যান্ট কর্নেল সরদার আলী হায়দার, বিএসপি, অর্ডন্যান্স', 'N/A', 'Chairman', '', 'N/A', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(5, 68, 38, NULL, 'BA-5772', 'Colonel Md Masud Rana, psc, PhD', 'কর্নেল মোঃ মাসুদ রানা, পিএসসি, পিএইচডি', 'masudrana5772@yahoo.com', 'Chairman', '', '+8801769021805', '', 'Colonel', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(6, 64, 39, NULL, 'BA-4805', 'Lieutenant Colonel   Md Shahabuddin Ahmed', 'লেফটেন্যান্ট কর্নেল মোঃ শাহাবুদ্দিন আহমেদ', 'N/A', 'Chairman', '', 'N/A', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(7, 69, 50, NULL, 'P/NO-1082', 'Commander A K M Zakaria', 'কমান্ডার এ কে এম জাকারিয়া', 'akmzakaria71@hotmail.com', 'Chairman', '', '+8801713332367', '', 'Commander', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(8, 68, 45, NULL, '11146', 'Dr. Kazi Abu Taher', 'ড. কাজী আবু তাহের', 'kataher@bup.edu.bd', 'Professor', '+8801727242139', '+8801769021807', 'B+', '', 'Permanent', 'Ph.D, বাংলাদেশ  প্রকৌশল বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13251.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(9, 64, 42, NULL, '11119', 'Dr. Fahmida Haque', 'ড. ফাহমিদা হক', 'fahmida.haque@bup.edu.bd', 'Associate Professor', '+8801717572066', '+8801769028477', 'A+', '', 'Permanent', 'S.S.C, Jahangirnagar University School & College; H.S.C, Jahangirnagar University School & College; Honors, Jahangirnagar University; Masters, IBAIS University; Masters, Jahangirnagar University; Ph.D, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/11331.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(10, 68, 45, NULL, '11021', 'Dr. Mohammed Nasir Uddin ', 'ড. মোহাম্মদ নাসির উদ্দিন', 'nasiruddin@bup.edu.bd', 'Associate Professor', '+8801819308246', '+8801769028700', 'A-', '', 'Permanent', 'S.S.C, Sabuj Shikshayatan High School ; H.S.C, Govt.Haji Mohammad Mohsin College; Honors, University of Chittagong ; Masters, University of Chittagong ; MPhil, Bangladesh University of Engineering and Technology (BUET); Ph.D, Bangladesh University of Engineering and Technology (BUET) ; ', '', 'http://hr.bup.edu.bd/upload/picture/184.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(11, 66, 35, NULL, '11019', 'Dr. Jannatul Ferdaous', 'ড. জান্নাতুল ফেরদাউস', 'jannatul.ferdaous@bup.edu.bd', 'Associate Professor', '+8801910093409', '+8801769021740', 'O+', '', 'Permanent', 'Honors, University of Dhaka; Masters, University of Dhaka; Ph.D, Capital University of Economics and Business; ', '', 'http://hr.bup.edu.bd/upload/picture/1292.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(12, 64, 54, NULL, '11033', 'Josinta Zinia', 'জোসিন্তা জিনিয়া', 'josinta@bup.edu.bd', 'Associate Professor', '+8801921427626', '+8801769021912', 'O+', '', 'Permanent', 'S.S.C, ভিকারুননিসা নূন স্কুল; H.S.C, ভিকারুননিসা নূন কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; Ph.D, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/3977.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(13, 66, 36, NULL, '11004', 'Dr. Mohammad Zahedul Alam', 'ড. মোহাম্মদ জাহেদুল আলম', 'zahedul.alam@bup.edu.bd', 'Associate Professor', '+8801715030184', '+8801769021726', 'AB+', '', 'Permanent', 'S.S.C, Nanupur Abu Subhan High School; H.S.C, Siddeshwari Degree College ; Honors, Dhaka University ; Masters, Dhaka University ; MPhil, Rajshahi University ; Ph.D, Bangladesh University of Professionals (BUP); Ph.D, Wuhan University of Technology, P.R. China; ', '', 'http://hr.bup.edu.bd/upload/picture/703.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(14, 64, 42, NULL, '11120', 'Dr. Md. Mohoshin Reza', 'ড. মোঃ মোহসীন রেজা', 'mohoshin.reza@bup.edu.bd', 'Associate Professor', '+8801718582136', '+8801769028478', 'B+', '', 'Permanent', 'S.S.C, নীলফামারী সরকারি উচ্চ বিদ্যালয়; H.S.C, খানশামা কলেজ, দিনাজপুর; Honors, জাতীয় বিশ্ববিদ্যালয়, গাজীপুর; Masters, জাতীয় বিশ্ববিদ্যালয়, গাজীপুর; MPhil, ইন্সিটিটিউট অব বাংলাদেশ স্টাডিজ (আইবিএস, রাজশাহী বিশ্ববিদ্যালয়); Ph.D, ইন্সিটিটিউট অব বাংলাদেশ স্টাডিজ (আইবিএস, রাজশাহী বিশ্ববিদ্যালয়); ', '', 'http://hr.bup.edu.bd/upload/picture/11332.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(15, 66, 32, NULL, '11050', 'Dr. Ziaur Rahman', 'ড. জিয়াউর রহমান', 'ziaur.rahman@bup.edu.bd', 'Associate Professor', '+8801715760315', '+8801769021742', 'O+', '', 'Permanent', 'S.S.C, পাবনা ক্যাডেট কলেজ; H.S.C, পাবনা ক্যাডেট কলেজ; Degree (Pass)\r\n, চট্টগ্রাম বিশ্ববিদ্যালয়; Masters, জাতীয় বিশ্ববিদ্যালয়; Diploma\r\n, খুঞ্জলা পিয়াদা ওকুলু, তুরস্ক; Ph.D, ইন্টাঃ ইসলামিক ইউনিভার্সিটি মালয়েশিয়া; Post Ph.D, ইউনিভার্সিটি অব ক্যালিফোর্নিয়া লস এঞ্জেলস (আমেরিকা); ', '', 'http://hr.bup.edu.bd/upload/picture/1301.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(16, 66, 32, NULL, '11094', 'Dr. Mohammad Rabiul Bashar Rubel', 'ড. মোহাম্মদ রবিউল বাশার রুবেল', 'rabiul.basher@bup.edu.bd', 'Associate Professor', '+8801881654498', '+8801769028357', 'B+', '', 'Permanent', 'S.S.C, মিরপুর বাংলা উচ্চ বিদ্যালয়; H.S.C, তেজগাঁও কলেজ, ঢাকা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; Ph.D, ইউনিভার্সিটি সাইন্স মালয়েশিয়া; ', '', 'http://hr.bup.edu.bd/upload/picture/4086.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(17, 64, 9, NULL, 'BA-5182', 'Lieutenant Colonel   Shaheen Ahmed, Ord', 'লেফটেন্যান্ট কর্নেল  শাহীন আহমেদ, অর্ডন্যান্স', 'N/A', 'Associate Professor', '01719074779', 'N/A', 'A+', 'Lieutenant Colonel  ', 'Deputation', 'S.S.C, কুমিল্লা ক্যাডেট কলেজ; H.S.C, কুমিল্লা ক্যাডেট কলেজ; PG Diploma\r\n, ঢাকা চেম্বার অফ কমার্স এন্ড ইন্ডাসষ্ট্রিজ; Bachelor of Science (BSc), বিএমএ; ', '', 'http://hr.bup.edu.bd/upload/picture/17599.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(18, 66, 32, NULL, '11018', 'Dr. Sumayya Begum', 'ড. সুমাইয়া বেগম', 'sumayya@bup.edu.bd', 'Associate Professor', '+8801817543522', '+8801769021739', 'A-', '', 'Permanent', 'S.S.C, বিএএফ শাহীন কলেজ কুর্মিটোলা; H.S.C, বিএএফ শাহীন কলেজ তেজগাঁও; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; Ph.D, Wuhan University of Technology, China; ', '', 'http://hr.bup.edu.bd/upload/picture/694.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(19, 68, 43, NULL, '11067', 'D. Shamsunnahar Khanam', 'ড. শামসুন্নাহার খানম', 'shamsun.nahar@bup.edu.bd', 'Associate Professor', '+8801306427201', '+8801769021820', 'B+', '', 'Permanent', 'S.S.C, ডামুড্যা পাইলট উচ্চ বালিকা বিদ্যালয়; H.S.C, বেগম বদরুন্নেছা সরকারী মহিলা কলেজ, ঢাকা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, নাগোয়া বিশ্ববিদ্যালয়; Ph.D, তয়োহাশি ইউনিভার্সিটি অব টেকনোলজি, জাপান; ', '', 'http://hr.bup.edu.bd/upload/picture/5629.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(20, NULL, NULL, NULL, 'BA-6839', 'Lieutenant Colonel   Liana Mamun, psc, sigs', 'লেফটেন্যান্ট কর্নেল লিয়ানা মামুন, পিএসসি, সিগন্যালস্', 'N/A', 'Associate Professor', '', 'N/A', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(21, 64, 42, NULL, 'BA-5775', 'Lieutenant Colonel   Dilip Kumar Roy, AEC', 'লেফটেন্যান্ট কর্নেল দিলীপ কুমার রায়, এইসি', 'dilip@bup.edu.bd', 'Associate Professor', '', '+8801769028480', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'http://hr.bup.edu.bd/upload/picture/31512.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(22, 64, 9, NULL, 'BD/8707', 'Wing Commander Md Khaledur Rahman', 'উইং কমান্ডার মোঃ খালেদুর রহমান', 'khaled8707@gmail.com', 'Associate Professor', '', '+8801769998707', '', 'Wing Commander', 'Deputation', '', '', 'http://hr.bup.edu.bd/upload/picture/24106.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(23, 69, 48, NULL, 'BA-4362', 'Lieutenant Colonel   Md. Maksudul Alam, PBGM', 'লেফটেন্যান্ট কর্নেল মোঃ মাকসুদুল আলম, পিবিজিএম', 'N/A', 'Associate Professor', '', '+8801769028442', '', 'Lieutenant Colonel  ', 'Deputation', '', '', 'http://hr.bup.edu.bd/upload/picture/27957.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(24, 66, 32, NULL, '11010', 'Dr. Md. Arifur Rahaman', 'ড. মোঃ আরিফুর রহমান', 'arifur@bup.edu.bd', 'Associate Professor', '+8801979038565', '+8801769021712', 'B+', '', 'Permanent', 'S.S.C, কাঞ্চননগর মডেল হাই স্কুল ঝিনাইদাহ; H.S.C, ঝিনাইদাহ সরকারী সিটি কলেজ; B.B.A, রাজশাহী বিশ্ববিদ্যালয়; M.B.A, রাজশাহী বিশ্ববিদ্যালয়; Ph.D, Graduate School of Economics; ', '', 'http://hr.bup.edu.bd/upload/picture/693.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(25, 66, 37, NULL, '11006', 'Dr. Md. Tapan Mahmud', 'ড. মোঃ তপন মাহমুদ', 'mahmud.tapan@bup.edu.bd', 'Assistant Professor', '+8801671696969', '+8801769021708', 'A-', '', 'Permanent', 'S.S.C, মনিপুর হাই স্কুল ; H.S.C, Dhaka Commerce Collage  ; B.B.A, University of Dhaka ; M.B.A, University of Dhaka ; Ph.D, Graduate School of Economics of Kyushu University, Japan; ', '', 'http://hr.bup.edu.bd/upload/picture/272.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(26, 64, 42, NULL, 'BA-6615', 'Major Mohammad Rashedul Haque, MPhil, AEC', 'মেজর মোহাম্মদ রাশেদুল হক, এমফিল, এইসি', 'rashedul.haque@bup.edu.bd', 'Assistant Professor', '+8801817093735', '+8801769028479', 'A+', 'Major', 'Deputation', 'Masters, আলীগড় মুসলিম ইউনিভার্সিটি; ', '', 'http://hr.bup.edu.bd/upload/picture/25555.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(27, 69, 47, NULL, '11125', 'Md. Abu Hanif', 'মোঃ আবু হানিফ', 'abuhanif@bup.edu.bd', 'Assistant Professor', '+8801733881899', '+8801769028582', 'O+', '', 'Permanent', 'Alim\r\n, মিঠাপুর আলিম মাদ্রাসা ; Dakhil\r\n, মিঠাপুর আলিম মাদ্রাসা; Honors, জশাহী বিশ্ববিদ্যলয়, বাংলাদেশ ।; Masters, রাজশাহী বিশ্ববিদ্যলয়, বাংলাদেশ; Ph.D, ইসলামী বিশ্ববিদ্যলয়, কুষ্টিয়া, বাংলাদেশ; ', '', 'http://hr.bup.edu.bd/upload/picture/11401.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(28, 69, 47, NULL, '11111', 'Musferat Mazrun Chowdhury', 'মুসফেরাত মাজরুন চৌধুরী', 'musferat@bup.edu.bd', 'Assistant Professor', '+8801769028581', '+8801769028581', 'B+', '', 'Permanent', 'S.S.C, Al Hera Academy; H.S.C, Al Hera Academy; Honors, University of Rajshahi; Masters, University of Rajshahi ; ', '', 'http://hr.bup.edu.bd/upload/picture/5505.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(29, 66, 32, NULL, '11117', 'Mohammad Ali', 'মোহাম্মদ আলী ', 'mohammadali@bup.edu.bd', 'Assistant Professor', '+8801916361910', '+8801769028368', 'O+', '', 'Permanent', 'S.S.C, মিরপুর সরকারি উচ্চ বিদ্যালয়; H.S.C, নটরডেম কলেজ, ঢাকা; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; MPhil, Bangladesh University of Professionals (BUP); ', '', 'http://hr.bup.edu.bd/upload/picture/11329.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(30, 69, 50, NULL, '11101', 'Mohammad Main Uddin', 'মোহাম্মদ মাঈন উদ্দীন', 'main.uddin@bup.edu.bd', 'Assistant Professor', '+8801873598888', '+8801769021765', 'A+', '', 'Permanent', 'S.S.C, চরবাটা খাসের হাট উচ্চ বিদ্যালয়; H.S.C, সৈকত ডিগ্রি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/13330.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(31, 64, 42, NULL, '11092', 'Muhammad Nurul Islam', 'মোহাম্মদ নুরুল ইসলাম ', 'nurulislam@bup.edu.bd', 'Assistant Professor', '+8801714506376', '+8801769021938', 'A+', '', 'Permanent', 'Honors, Shahjalal University of Science and Technology, SYlhet; Masters, Shahjalal University of Science and Technology, sylhe; MPhil, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/2816.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(32, 64, 41, NULL, '11008', 'Dr. Md. Shariful Islam', 'ড. মোঃ শরিফুল ইসলাম', 'shariful.islam@bup.edu.bd', 'Assistant Professor', '+8801916299514', '+8801769028466', 'A+', '', 'Permanent', 'S.S.C, এমারত হোসেন আদর্শ উচ্চ বিদ্যালয়; H.S.C, সরকারি বিজ্ঞান কলেজ; Honors, জাহাঙ্গিরনগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গিরনগর বিশ্ববিদ্যালয়; Ph.D, The University of International Business and Economics, China; ', '', 'http://hr.bup.edu.bd/upload/picture/2089.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(33, 66, 34, NULL, '11026', 'Md. Mahedi Hasan', 'মোঃ মেহেদী হাসান', 'mahedihasan@bup.edu.bd', 'Assistant Professor', '+8801816165246', '+8801769021679', 'O+', '', 'Permanent', 'S.S.C, মুজাদ্দেদিয়া উচ্চ বিদ্যালয়; H.S.C, ধনিয়া কলেজ; Honors, শাবিপ্রবি, সিলেট; Masters,  শাবিপ্রবি, সিলেট; MPhil, বিইউপি; Ph.D, Washington State University, USA; ', '', 'http://hr.bup.edu.bd/upload/picture/1275.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(34, 66, 32, NULL, '11022', 'Md. Akter Kamal', 'মোহাম্মদ আখতার কামাল', 'akhter.kamal@bup.edu.bd', 'Assistant Professor', '+8801711781188', '+8801769021743', 'A+', '', 'Permanent', 'S.S.C, Preparatory High School Cox\'sbazar; H.S.C, Govt. Commerce College Chittagong; B.B.A, University of Chittagong; M.B.A, University of Chittagong; MPhil, Bangladesh University of Professionals; Master of Science (Tech), The Hong Kong Polytechnic University, Hong Kong; ', '', 'http://hr.bup.edu.bd/upload/picture/695.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(35, 66, 32, NULL, '11020', 'Nigar Sultana', 'নিগার সুলতানা', 'nigarsultana@bup.edu.bd', 'Assistant Professor', '01711395701', '+8801769021674', 'O+', '', 'Permanent', 'S.S.C, গরীবে নেওয়াজ উচ্চ বিদ্যালয়; H.S.C, আগ্রাবাদ মহিলা কলেজ; Honors, চট্টগ্রাম কমার্স কলেজ; Masters, চট্টগ্রাম কমার্স কলেজ; M.B.A, অ্যামেরিকান ইন্টারন্যাশনাল ইউনিভার্সিটি-বাংলাদেশ; MPhil, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস্; Ph.D, University of Auckland, New Zealand; ', '', 'http://hr.bup.edu.bd/upload/picture/698.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(36, 66, 35, NULL, '11011', 'Noor Nahar Begum', 'নূর নাহার বেগম', 'nahar@bup.edu.bd', 'Assistant Professor', '+8801937908548', '+8801769021721', 'O+', '', 'Permanent', 'S.S.C, K. B. A.H Dobhash  City Corporation Girl\'s High School; H.S.C, Govt. Commerce College Chittagong; B.B.A, BGC Trust University Chittagong; M.B.A, Bangladesh University of Professionals; MPhil, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/288.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(37, 69, 47, NULL, '11121', 'Emraan Azad', 'ইমরান আজাদ', 'emraan.azad@bup.edu.bd', 'Assistant Professor', '+8801769028580', '+8801769028580', 'O+', '', 'Permanent', 'Honors, University of Dhaka ; Masters, University of Dhaka ; Masters, University of Cambridge ; ', '', 'http://hr.bup.edu.bd/upload/picture/11403.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(38, 64, 39, NULL, '11055', 'Md. Zahidur Rahman', 'মোঃ জাহিদুর রহমান', 'zahidur.rahman@bup.edu.bd', 'Assistant Professor', '+8801769021921', '+8801769021921', 'O+', '', 'Permanent', 'Alim\r\n, ভবানীপুর ফাজিল মাদ্রাসা, ফুলবাড়ীয়া, ময়মনসিংহ; Dakhil\r\n, ভবানীপুর ফাজিল মাদ্রাসা, ফুলবাড়ীয়া, ময়মনসিংহ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; Masters, অর্থনীতি বিভাগ, ইলিনয় স্টেট ইউনিভার্সিটি, যুক্তরাষ্ট্র; ', '', 'http://hr.bup.edu.bd/upload/picture/3979.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(39, 65, 125, NULL, '11024', 'Anjoman Ara Begum ', 'আঞ্জুমান আরা বেগম', 'anjomanara@bup.edu.bd', 'Assistant Professor', '+8801923340034', '+8801769021676', 'B+', '', 'Permanent', 'S.S.C, কুমিল্লা উচ্চ বিদ্যালয় ; H.S.C, কুমিল্লা ভিক্টোরিয়া সরকারী কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13393.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(40, 68, 43, NULL, '11099', 'Alamgir Kabir', 'আলমগীর কবীর', 'alamgir.kabir@bup.edu.bd', 'Assistant Professor', '+8801722140250', '+8801769028680', 'B+', '', 'Permanent', 'S.S.C, কাঞ্চন নগর মডেল হাই স্কুল ; H.S.C, ঢাকা রেসিডেন্সিয়াল মডেল কলেজ; Honors, খুলনা বিশ্ববিদ্যালয়; Masters, খুলনা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/6732.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(41, 64, 40, NULL, '11091', 'Salit chakma', 'সলিত চাকমা ', 'salit.chakma@bup.edu.bd', 'Assistant Professor', '01882767959', '+8801769021935', 'A+', '', 'Permanent', 'S.S.C, Sylhet Cadet College; H.S.C, Sylhet Cadet College; Bachelor of Science (BSc), Curtin University; Master of Science (Tech), University of Warsaw; ', '', 'http://hr.bup.edu.bd/upload/picture/4103.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(42, 69, 46, NULL, '11102', 'Mahfujur Rahman', 'মাহফুজুর রহমান', 'mahfujur@bup.edu.bd', 'Assistant Professor', '+8801515604897', '+8801769021759', 'AB+', '', 'Permanent', 'S.S.C, শরীয়তপুর ইসলামিয়া সিনিয়র ফাজিল মাদ্রাসা; H.S.C, শরীয়তপুর সরকারি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/312.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(43, 64, 39, NULL, '11097', 'Shashish Shami Kamal', 'শাশীশ শামী কামাল ', 'shashish.kamal@bup.edu.bd', 'Assistant Professor', '+8801911064017', '+8801769028434', 'A+', '', 'Permanent', 'S.S.C, ঊদয়ন উচ্চ মাধ্যমিক বিদ্যালয়; H.S.C, Notredame College; Honors, Dhaka University; Masters, Dhaka University; ', '', 'http://hr.bup.edu.bd/upload/picture/8994.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(44, 66, 34, NULL, '11095', 'Mohammad Rajib Uddin', 'মোহাম্মদ রাজীব উদ্দিন', 'rajib.uddin@bup.edu.bd', 'Assistant Professor', '+8801611646465', '+8801769021982', 'A+', '', 'Permanent', 'S.S.C, সিলেট ক্যাডেট কলেজ ; H.S.C,  সিলেট ক্যাডেট কলেজ ; Honors, এডিথ কোয়ার্ন ইউনিভার্সিটি, অস্স্ট্রেলিয়া; Masters, কার্টিন ইউনিভার্সিটি অফ টেকনোলজি, অস্স্ট্রেলিয়া; ', '', 'http://hr.bup.edu.bd/upload/picture/4096.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(45, 69, 48, NULL, '11123', 'Nuzaira Tarannum', 'নুজায়রা তারান্নুম', 'nuzaira.tarannum@bup.edu.bd', 'Assistant Professor', '+8801676757810', '+8801769028602', 'A+', '', 'Permanent', 'S.S.C, আইডিয়াল স্কুল অ্যান্ড কলেজ, বনশ্রী, রামপুরা, ঢাকা ; H.S.C, মতিঝিল আইডিয়াল স্কুল অ্যান্ড কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/11312.jpeg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(46, 64, 52, NULL, '11089', 'Fairooz Binte Hafiz', 'ফাইরুজ বিনতে হাফিজ  ', 'fairooz@bup.edu.bd', 'Assistant Professor', '+8801675871959', '+8801769021939', 'B+', '', 'Permanent', 'S.S.C, চট্টগ্রাম বিশ্ববিদ্যালয় স্কুল এন্ড কলেজ; H.S.C, হলিক্রস কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/5377.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(47, 69, 47, NULL, '11062', 'Md. Sadekul Islam', 'মোঃ সাদেকুল ইসলাম', 'sadekul@bup.edu.bd', 'Assistant Professor', '+8801710377645', '+8801769021781', 'A-', '', 'Permanent', 'Masters, রাজশাহী বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/306.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(48, 66, 35, NULL, '11075', 'Farhana Yasmin', 'ফারহানা ইয়াসমিন ', 'farhana.yasmin@bup.edu.bd', 'Assistant Professor', '+8801918921006', '+8801769021713', 'O+', '', 'Permanent', 'S.S.C, হলিক্রস স্কুল; H.S.C, হলিক্রস স্কুল; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; MPhil, বিইউপি; ', '', 'http://hr.bup.edu.bd/upload/picture/4094.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(49, 66, 36, NULL, '11013', 'Dr. Easnin Ara', 'ড. ইয়াছনীন আরা', 'easnin@bup.edu.bd', 'Assistant Professor', '+8801713302601', '+8801769021729', 'AB+', '', 'Permanent', 'S.S.C, Govt. Coronation Secondary Girls School, Khulna; H.S.C, Govt. M. M. City College, Khulna; B.B.A, Rajshahi University; M.B.A, Rajshahi University; Ph.D, University of Otago, New Zealand; ', '', 'http://hr.bup.edu.bd/upload/picture/1294.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(50, 65, 127, NULL, '11114', 'Md. Abdul Hannan', 'মোঃ আব্দুল হান্নান ', 'abdul.hannan@bup.edu.bd', 'Assistant Professor', '01515262199', '+8801769021791', 'O+', '', 'Permanent', 'S.S.C, ঢাকা রেসিডেন্সিয়াল মডেল কলেজ; H.S.C, ঢাকা রেসিডেন্সিয়াল মডেল কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/11383.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(51, 66, 37, NULL, '11118', 'Dilruba Afroze', 'দিলরুবা আফরোজ ', 'dilruba.afroze@bup.edu.bd', 'Assistant Professor', '01922930089', '+8801769028311', 'A+', '', 'Permanent', 'S.S.C, Viqarunnisa Noon School; H.S.C, Viqarunnisa Noon College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/11359.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(52, 69, 46, NULL, '11105', 'Iffat Anjum', 'ইফ্ফাত আঞ্জুম', 'iffat.anjum@bup.edu.bd', 'Assistant Professor', '01683771225', '+8801769021792', 'O+', '', 'Permanent', 'S.S.C, বি এ আর আই উচ্চ বিদ্যালয়; H.S.C, গাজিপুর সরকারি মহিলা কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13333.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(53, 64, 42, NULL, '11085', 'Nusrat Zahan Chowdhury', 'নুসরাত জাহান চৌধুরী  ', 'nusrat@bup.edu.bd', 'Assistant Professor', '+8801769021937', '+8801769021937', 'O+', '', 'Permanent', 'S.S.C, ভৈরব কে বি পাইলট হাই স্কুল; H.S.C, জিল্লুর রহমান মহিলা কলেজ, ভৈরব; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/2561.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(54, 69, 50, NULL, '11016', 'Abdullah Shahnewaz', 'আব্দুল্লাহ শাহনেওয়াজ', 'shahnewaz@bup.edu.bd', 'Assistant Professor', '01717400699', '+8801769021758', 'O+', '', 'Permanent', 'Honors, University of Dhaka; Masters, Macquarie University, Sydney Australia; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/301.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(55, 69, 46, NULL, '11086', 'Meherun Nesa', 'মেহেরুননেসা  ', 'meherun@bup.edu.bd', 'Assistant Professor', '+8801552752081', '+8801769021771', 'O+', '', 'Permanent', 'S.S.C, Khilgao Girls\' High College; H.S.C, Viqarunnisa Noon College; Honors, University of Dhaka; Masters, University of Dhaka; Masters, University of Antwerp, Belgium; ', '', 'http://hr.bup.edu.bd/upload/picture/3994.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(56, 64, 40, NULL, '11015', 'Dr. Toiaba Binta Taher', 'ড. তৈয়বা বিনতে তাহের', 'toiabataher@bup.edu.bd', 'Assistant Professor', '+8801914878906', '+8801914878906', 'B+', '', 'Permanent', 'Honors, Jahangirnagar University ; Masters, Jahangirnagar University; MPhil, BUP; Ph.D, University of New South Wales, Australia; ', '', 'http://hr.bup.edu.bd/upload/picture/279.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(57, 69, 46, NULL, '11072', 'Abu Faisal Md. Khaled', 'আবু ফয়সল মোঃ খালেদ ', 'faisal.khaled@bup.edu.bd', 'Assistant Professor', '+8801712512467', '+8801769021782', 'A+', '', 'Permanent', 'S.S.C, রাজশাহী কলেজিয়েট স্কুল ; H.S.C, রাজশাহী নিউ গভ: ডিগ্রি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, Willy Brandt School of Public Policy, Germany; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/3998.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(58, 69, 47, NULL, '11076', 'Md. Abu Bakar Siddique', 'মোঃ আবু বকর সিদ্দিক', 'absiddique@bup.edu.bd', 'Assistant Professor', '+8801769021783', '+8801769021783', 'O+', '', 'Permanent', 'S.S.C, Brother Andre High School; H.S.C, Milestone College; Honors, University of Dhaka; Masters, University of Dhaka; Masters, University of Sydney; ', '', 'http://hr.bup.edu.bd/upload/picture/3973.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(59, 68, 45, NULL, '11039', 'Zarin Tasnim', 'জারিন তাসনিম', 'zarin@bup.edu.bd', 'Assistant Professor', '+8801521255766', '+8801769021809', 'O+', '', 'Permanent', 'S.S.C, Rajuk Uttara Model College, Uttara, Dhaka; H.S.C, Ispahani Public School and College, Comilla Cantonmrnt; Honors, Military Institute of Science and Technology (MIST); Masters, University of Liverpool, UK; ', '', 'http://hr.bup.edu.bd/upload/picture/2789.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(60, 66, 36, NULL, '11134', 'Sanjida Amin', 'সানজিদা আমিন', 'sanjida.amin@bup.edu.bd', 'Assistant Professor', '+8801703809075', '+8801769028384', 'O+', '', 'Permanent', 'S.S.C, Noakhali Govt. Girls High School; H.S.C, Holy Cross College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/11515.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(61, 64, 40, NULL, '11070', 'Irtifa Alam Nabila', 'ইরতিফা আলম নাবিলা ', 'irtifa.alam@bup.edu.bd', 'Assistant Professor', '+8801830244012', '+8801769021925', 'B+', '', 'Permanent', 'S.S.C, Kumira Residential Girls\' School and College; H.S.C, Kumira Residential Girls\' School and College; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; Masters,  জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; MPhil, বাংলাদেশ ইউনিভার্সিটি অফ প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/4050.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(62, 68, 45, NULL, '11035', 'Nandita Barman', 'নন্দিতা বর্মণ', 'nandita@bup.edu.bd', 'Assistant Professor', '+8801816477970', '+8801769021810', 'O+', '', 'Permanent', 'MPhil, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/298.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(63, 66, 34, NULL, '11028', 'Md. Sahidul Islam', 'মোঃ শহিদুল ইসলাম', 'sahidul.islam@bup.edu.bd', 'Assistant Professor', '+8801917169849', '+8801769021678', 'O+', '', 'Permanent', 'S.S.C, Halidhani High School; H.S.C, K.C.College, Jhenaidah; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/4129.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(64, 66, 35, NULL, '11012', 'M. Shahin Sarwer', 'মুঃ শাহীন সারোয়ার', 'shahin.sarwar@bup.edu.bd', 'Assistant Professor', '+8801718507775', '+8801769021722', 'B+', '', 'Permanent', 'S.S.C, রহনপুর এ বি সরকারি উচ্চ বিদ্যালয় ; H.S.C, বিজ্ঞান  নিউ গভর্নমেন্ট ডিগ্রি কলেজ, রাজশাহী ; Honors, ড্যাফোডিল ইন্টারন্যাশনাল ইউনিভার্সিটি ; Masters, এশিয়ান ইনস্টিটিউট অফ টেকনোলজি, থাইল্যান্ড ; Masters, বাংলাদেশ ইউনিভার্সিটি অফ প্রফেশনালস ; ', '', 'http://hr.bup.edu.bd/upload/picture/1293.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(65, 68, 45, NULL, '11163', 'Tajbia Karim', 'তাজবিয়া করিম', 'tajbia.karim@bup.edu.bd', 'Assistant Professor', '+8801675499929', '+8801769021811', 'B+', '', 'Permanent', 'Honors, এ আই ইউ বি; Masters, এ আই ইউ বি; ', '', 'http://hr.bup.edu.bd/upload/picture/16444.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(66, 66, 37, NULL, '11112', 'Afrin Sadia Rumana', 'আফরিন সাদিয়া রুমানা', 'afrin.sadia@bup.edu.bd', 'Assistant Professor', '+8801685841607', '+8801769028310', 'O+', '', 'Permanent', 'S.S.C, ভিকারুন্নিসা নুন স্কুল ; H.S.C, ভিকারুন্নিসা নুন স্কুল এন্ড কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/8995.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(67, 69, 46, NULL, '11150', 'Fatema-Tuj-Juhra', 'ফাতেমা-তুজ-জোহরা', 'fatema.juhra@bup.edu.bd', 'Assistant Professor', '+8801777686081', '+8801769021788', 'AB+', '', 'Permanent', 'S.S.C, ভিকারুননিসা নূন স্কুল ; H.S.C, ভিকারুননিসা নূন কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13207.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(68, 68, 45, NULL, '11053', 'Mirza Rehenuma Tabassum', 'মির্জা রেহেনুমা তাবাস্সুম', 'mirza.tabassum@bup.edu.bd', 'Assistant Professor', '+8801534658158', '+8801769021814', 'A+', '', 'Permanent', 'S.S.C, Agrani Girls School; H.S.C, Dhaka City College; Honors, IIT, University of Dhaka; Masters, IIT, University of Dhaka ; Ph.D, Ryerson University, Canada; ', '', 'http://hr.bup.edu.bd/upload/picture/2778.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(69, 69, 46, NULL, '11036', 'Umme Salma Tarin', 'উম্মে  সালমা তারিন', 'tarin@bup.edu.bd', 'Assistant Professor', '+8801769021762', '+8801769021762', 'AB+', '', 'Permanent', 'Honors, University of Dhaka ; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/294.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(70, 66, 34, NULL, '11142', 'Azharul Islam', 'আজহারুল ইসলাম', 'azharul.islam@bup.edu.bd', 'Assistant Professor', '+8801737638642', '+8801769028346', 'O+', '', 'Permanent', 'Alim\r\n, ধাপ-সাতগাড়া বায়তুল মুকাররম কামিল মাদ্রাসা, রংপুর; Dakhil\r\n, কৈমারী দাখিল মাদ্রাসা; Honors, রাজশাহী বিশ্ববিদ্যালয়; Masters, রাজশাহী বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/8997.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(71, 64, 52, NULL, '11057', 'M.M. Ashaduzzaman Nour', 'এম.এম. আসাদুজ্জামান নুর ', 'asaduzzaman@bup.edu.bd', 'Assistant Professor', '+8801780185769', '+8801769021920', 'B+', '', 'Permanent', 'S.S.C, মনিপুর উচ্চ বিদ্যালয়; H.S.C, ঢাকা কমার্স কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; MPhil, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/2785.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(72, 65, 127, NULL, '11069', 'Md. Kamruzzaman Bhuiyan', 'মোঃ কামরুজ্জামান ভূঁইয়া  ', 'kamruzzaman@bup.edu.bd', 'Assistant Professor', '+8801737258880', '+8801769021768', 'B+', '', 'Permanent', 'S.S.C, চট্টগ্রাম সেনানিবাস উচ্চ বিদ্যালয়; H.S.C, চট্টগ্রাম পাবলিক কলেম; Honors, চট্টগ্রাম বিশ্ববিদ্যালয়; Masters, চট্টগ্রাম বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13364.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(73, 64, 54, NULL, '11096', 'Al Jamal Mustafa Shindaini', 'আল জামাল মোস্তফা সিন্দাইনী', 'mustafa.shindaini@bup.edu.bd', 'Assistant Professor', '+8801712602778', '+8801769028401', 'B+', '', 'Permanent', 'S.S.C, মডেল হাইস্কুল, খুলনা ; H.S.C, খুলনা পাবলিক কলেজ    ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয়; MPhil, ঢাকা বিশ্ববিদ্যালয়; Ph.D, বিইউপি ; ', '', 'http://hr.bup.edu.bd/upload/picture/7967.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(74, 69, 46, NULL, '11087', 'Bulbul Ahmed', 'বুলবুল আহমেদ  ', 'bulbul.ahmed@bup.edu.bd', 'Assistant Professor', '+8801796221704', '+8801769021773', 'AB+', '', 'Permanent', 'Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/6706.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(75, 68, 45, NULL, '11115', 'Shanto Rahman', 'শান্ত রহমান ', 'shanto.rahman@bup.edu.bd', 'Assistant Professor', '+8801554548698', '+8801769028704', 'AB+', '', 'Permanent', 'S.S.C, Bagerhat Govt. Giirls School; H.S.C, Bagerhat P.C college; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/11376.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(76, 64, 54, NULL, '11023', 'Abul kalam Azad', 'আবুল কালাম আজাদ', 'kalamazad@bup.edu.bd', 'Assistant Professor', '+8801911376393', '+8801769028400', 'A-', '', 'Permanent', 'Alim\r\n, বয়রাট মাজাইল ফাজিল মাদ্রাসা; Dakhil\r\n, বয়রাট মাজাইল সিনিয়র মাদ্রাসা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; Ph.D, বিইউপি; ', '', 'http://hr.bup.edu.bd/upload/picture/285.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(77, 64, 54, NULL, '11127', 'Saiful Islam', 'সাইফুল ইসলাম', 'saiful.islam@bup.edu.bd', 'Assistant Professor', '+8801757670786', '+8801769028406', 'A+', '', 'Permanent', 'Alim\r\n, তামিরুল মিল্লাত কামিল মাদ্রাসা; Dakhil\r\n, হাজী আ. সামাদ ইস্লামিয়া সিনিওর মাদ্রাসা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/11366.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(78, 64, 42, NULL, '11108', 'Shakila Akter', 'শাকিলা আক্তার ', 'shakila@bup.edu.bd', 'Assistant Professor', '+8801714711499', '+8801769028489', 'O+', '', 'Permanent', 'S.S.C, নকলা পাইলট উচ্চ বিদ্যালয়; H.S.C, চৌধুরী ছবরুন্নেসা মহিলা ডিগ্রী কলেজ; Honors, Department of English, Jahangirnagar University; Masters, Department of English, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/9054.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(79, 64, 42, NULL, '11029', 'Most. Farhana Jannat', 'মোছাঃ ফারহানা জান্নাত', 'farhana.jannat@bup.edu.bd', 'Assistant Professor', '+8801756385829', '+8801769028487', 'B+', '', 'Permanent', 'S.S.C, Quadirabad Cantonment Public School; H.S.C, Rajuk Uttora Model College; Honors, Shahjalal University of Science and Technology; Masters, Shahjalal University of Science and Technology; ', '', 'http://hr.bup.edu.bd/upload/picture/292.jpeg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(80, 66, 37, NULL, '11061', 'Mohammed Moin Uddin Reza', 'মোহাম্মদ মঈন উদ্দিন রেজা', 'moin@bup.edu.bd', 'Assistant Professor', '+8801675624356', '+8801769021718', 'A-', '', 'Permanent', 'S.S.C, Jahangir Nagar University School & College; H.S.C, Dhaka City College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/1299.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(81, 66, 37, NULL, '11030', 'Zobaida Khanam', 'জোবায়দা খানম', 'zobaida@bup.edu.bd', 'Assistant Professor', '+8801940824901', '+8801769021741', 'B+', '', 'Permanent', 'S.S.C, আইডিয়াল স্কুল এন্ড কলেজ; H.S.C, ঢাকা সিটি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/277.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(82, 69, 48, NULL, '11122', 'Md. Ashraful Goni', 'মোঃ আশরাফুল গণি', 'ashraful.goni@bup.edu.bd', 'Assistant Professor', '+8801717732091', '+8801769028603', 'O+', '', 'Permanent', 'S.S.C, হবিগঞ্জ সরকারি উচ্চ বিদ্যালয়; H.S.C, ঢাকা সিটি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/11311.jpeg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(83, 68, 43, NULL, '11136', 'Mahbub Alam', 'মাহবুব আলম', 'mahbub.alam@bup.edu.bd', 'Assistant Professor', '+8801811855502', '+8801769028682', 'O+', '', 'Permanent', 'S.S.C, Islamia Adarsha High School; H.S.C, Govt. Science College; Honors, Jahangirnagar University; Masters, Istanbul Technical University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/11354.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(84, 66, 34, NULL, '11153', 'Nafia Sultana', 'নাফিয়া সুলতানা', 'nafia.sultana@bup.edu.bd', 'Assistant Professor', '+8801858333344', '+8801769021715', 'O+', '', 'Permanent', 'S.S.C, Chittagong University School; H.S.C, Chittagong University College; Honors, Chittagong University; Masters, Chittagong University; ', '', 'http://hr.bup.edu.bd/upload/picture/13245.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(85, 66, 34, NULL, '11113', 'Md. Kaysher Hamid', 'মোঃ কায়সার হামিদ ', 'kaysher@bup.edu.bd', 'Assistant Professor', '+8801790699736', '+8801769028351', 'AB+', '', 'Permanent', 'S.S.C, রামগঞ্জ উচ্চ বিদ্যালয় ; H.S.C, সেন্ট জোসেফ হাইয়ার সেকেন্ডারী স্কুল ; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয় ; Masters, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/11326.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(86, 69, 46, NULL, '11063', 'Md. Robayt Khondoker', 'মোঃ রোবায়েত খন্দকার ', 'robayt@bup.edu.bd', 'Assistant Professor', '+8801795896717', '+8801769021774', 'O+', '', 'Permanent', 'S.S.C, আব্দুর রশিদ সরদার মাধ্যমিক বিদ্যালয় ; H.S.C, বাউফল ডিগ্রী কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ইউনিভার্সিটি অব এন্টওয়ার্প ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/5365.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(87, 69, 46, NULL, '11034', 'Shaila Solaiman', 'শায়লা সোলায়মান', 'shaila.solaiman@bup.edu.bd', 'Assistant Professor', '+8801712295302', '+8801769021761', 'B+', '', 'Permanent', 'S.S.C, Jahangirnagar University School and College; H.S.C, Jahangirnagar University School and College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/287.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(88, 64, 39, NULL, '11156', 'Mohammad Saeed Islam', 'মোহাম্মদ সাঈদ ইসলাম', 'saeed.islam@bup.edu.bd', 'Assistant Professor', '+8801671021764', '+8801769028429', 'O+', '', 'Permanent', 'S.S.C, খিলগাঁও সরকারি উচ্চ বিদ্যালয় ; H.S.C, ঢাকা সিটি কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/13195.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(89, 66, 36, NULL, '11043', 'Mohammad Osman Gani ', 'মোহাম্মদ ওসমান গণি', 'osman@bup.edu.bd', 'Assistant Professor', '+8807037796696', '+8801769021745', 'AB+', '', 'Permanent', 'S.S.C, মতিঝিল মডেল হাই  স্কুল; H.S.C, নটরডেম কলেজ; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; Ph.D, Hiroshima University, Japan; Master of Science (Tech), Hiroshima University, Japan; ', '', 'http://hr.bup.edu.bd/upload/picture/1295.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(90, 64, 41, NULL, '11059', 'Musharrat Azam', 'মুশাররাত আজম', 'musharrat@bup.edu.bd', 'Assistant Professor', '+8801789345697', '+8801769021927', 'A+', '', 'Permanent', 'S.S.C, বি এ এফ শাহীন স্কুল ঢাকা; H.S.C, ইস্পাহানী পাব্লিক স্কুল অ্যান্ড কলেজ; Honors, ইউনিভারসিটি অফ নতিঙ্ঘাম  মালায়শিয়া কাম্পুস; Masters, ইউনিভারসিটি কেবাআংসাআন মালায়শিয়া; ', '', 'http://hr.bup.edu.bd/upload/picture/2092.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(91, 64, 41, NULL, '11081', 'Nahin Rahman', 'নাহিন রহমান ', 'nahin.rahman@bup.edu.bd', 'Assistant Professor', '+8801671012456', '+8801769021929', 'O+', '', 'Permanent', 'S.S.C, মোহাম্মদপুর প্রিপারেটরী হাইয়ার সেকেন্ডারি স্কুল; H.S.C, হলিক্রস কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/2479.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(92, 64, 41, NULL, '11082', 'Md. Shahanawaz Sharif', 'মোঃ শাহনেওয়াজ শরীফ  ', 'shahanawaz.sharif@bup.edu.bd', 'Assistant Professor', '+8801946468658', '+8801769021930', 'A+', '', 'Permanent', 'S.S.C, Comilla Zilla School; H.S.C, Notre Dame College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/2480.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(93, 64, 41, NULL, '11088', 'Md. Emran Hasan', 'মোঃ ইমরান হাসান  ', 'emran.hasan@bup.edu.bd', 'Assistant Professor', '+8801915639658', '+8801769021932', 'O+', '', 'Permanent', 'S.S.C, বগারপাড় উচ্চ বিদ্যালয়; H.S.C, নটরডেম কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/3963.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(94, 68, 45, NULL, '11017', 'Dr. S. M. Salim Reza', 'ড. এস এম সেলিম রেজা', 'salim.reza@bup.edu.bd', 'Assistant Professor', '+8801715013857', '+8801769021808', 'AB+', '', 'Permanent', 'S.S.C, Barisal Cadet College; H.S.C, Barisal Cadet College; Honors, Islamic University of Technology (IUT); Masters, Independent University, Bangladesh; Ph.D, National University of Malaysia; ', '', 'http://hr.bup.edu.bd/upload/picture/13414.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(95, 66, 32, NULL, '11073', 'Farhana Ferdousi Aziz', 'ফারহানা ফেরদৌসি আজিজ', 'farhana.aziz@bup.edu.bd', 'Assistant Professor', '+8801717823672', '+8801769021749', 'O+', '', 'Permanent', 'B.B.A, University of Indiana Polis; M.B.A, University of Indiana Polis; ', '', 'http://hr.bup.edu.bd/upload/picture/3983.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(96, 66, 36, NULL, '11103', 'Farzana Riva', 'ফারজানা রিভা', 'farzana.riva@bup.edu.bd', 'Assistant Professor', '+8801715152830', '+8801769028383', 'B+', '', 'Permanent', 'S.S.C, National Bangla High School; H.S.C, Ghorashal Musabin Hakim Degree College; B.B.A, Dhaka University; M.B.A, Dhaka University; ', '', 'http://hr.bup.edu.bd/upload/picture/8988.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(97, 69, 46, NULL, '11040', 'Sinthia Chakma Krisna', 'সিনথিয়া চাকমা কৃষ্ণা', 'sc.krisna@bup.edu.bd', 'Assistant Professor', '+8801769021763', '+8801769021763', 'B+', '', 'Permanent', 'S.S.C, নৌ বাহিনী হাই স্কুল, চট্টগ্রাম; H.S.C, ইস্পাহানী পাবলিক স্কুল অ্যান্ড কলেজ, চট্টগ্রাম; Honors, মোনাশ ইউনিভার্সিটি, অস্ট্রেলিয়া; Masters, ইউনিভার্সিটি অফ এভোরা; ', '', 'http://hr.bup.edu.bd/upload/picture/300.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(98, 64, 52, NULL, '11079', 'Md. Nasir Uddin', 'মোঃ নাছির উদ্দীন', 'nasir.publicad@bup.edu.bd', 'Assistant Professor', '+8801916882985', '+8801769021928', 'O+', '', 'Permanent', 'Alim\r\n, Naiyair Senior Madrasah ; Dakhil\r\n, Naiyair Senior Madrasah; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/5381.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(99, 66, 37, NULL, '11116', 'Ratan Ghosh', 'রতন ঘোষ ', 'ratan.ghosh@bup.edu.bd', 'Assistant Professor', '+8801675912938', '+8801769028312', 'O+', '', 'Permanent', 'S.S.C, গণবিদ্যা নিকেতন উচ্চ বিদ্যালয়; H.S.C, নটর ডেম কলেজ ; B.B.A, ঢাকা বিশ্ববিদ্যালয় ; M.B.A, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/13222.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(100, 66, 32, NULL, '11025', 'Dr. Ummya Salma', 'ড. উম্মে  সালমা', 'ummya.salma@bup.edu.bd', 'Assistant Professor', '+8801911975600', '+8801769021744', 'A+', '', 'Permanent', 'S.S.C, মতিঝিল মডেল হাই স্কুল; H.S.C, ভিকারুন নিসা নুন কলেজ; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; Ph.D, University of International Business and Economics (UIBE), Beijing, China.; ', '', 'http://hr.bup.edu.bd/upload/picture/696.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(101, 64, 40, NULL, '11090', 'Asikunnaby', 'আসিকুননবী ', 'asikunnaby@bup.edu.bd', 'Assistant Professor', '+8801922405408', '+8801769021934', 'A+', '', 'Permanent', 'Masters, Jahangirnagar University, Bangladesh; Masters, University of Durham, United kingdom; Bachelor of Science (BSc), Jahangirnagar University, Bangladesh; ', '', 'http://hr.bup.edu.bd/upload/picture/4104.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(102, 64, 39, NULL, '11126', 'Tanjila Afrin', 'তানজিলা আফরিন', 'tanjila.afrin@bup.edu.bd', 'Assistant Professor', '+8801743721510', '+8801769028431', 'O+', '', 'Permanent', 'S.S.C, ওটরা মাধ্যমিক বিদ্যালয় ; H.S.C, অমৃতলাল দে মহাবিদ্যালয় ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/11319.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(103, 66, 32, NULL, '11107', 'Tahmina Sultana', 'তাহমিনা সুলতানা', 'tahmina@bup.edu.bd', 'Assistant Professor', '+8801722817131', '+8801769028350', 'B+', '', 'Permanent', 'S.S.C, Tejgaon Govt. Girls’ High School; H.S.C, University Women’s Federation College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/11327.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(104, 64, 40, NULL, '11149', 'Dr. Md. Mostafizur Rahman', 'ড. মোঃ মোস্তাফিজুর রহমান', 'mostafizur@bup.edu.bd', 'Assistant Professor', '+8801716886701', '+8801769028446', 'B+', '', 'Permanent', 'S.S.C, খুলনা রোটারী স্কুল ; H.S.C, খুলনা পাবলিক কলেজ ; Honors, খুলনা বিশ্ববিদ্যালয় ; Masters, University of the Ryukyus, Japan; Ph.D, University of the Ryukyus, Japan; ', '', 'http://hr.bup.edu.bd/upload/picture/13212.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(105, 69, 46, NULL, '11152', 'Zerine Tanzim', 'জেরিন তানজিম', 'zerine.tanzim@bup.edu.bd', 'Assistant Professor', '+8801778303256', '+8801769021789', 'AB+', '', 'Permanent', 'S.S.C, হলিক্রস উচ্চ বালিকা বিদ্যালয়; H.S.C, হলিক্রস কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/13206.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(106, 66, 36, NULL, '11046', 'Nawshin Tabassum Tunna', 'নওশিন তাবাসসুম তুন্না', 'tabassum.tunna@bup.edu.bd', 'Assistant Professor', '+8801747794311', '+8801769021747', 'O+', '', 'Permanent', 'S.S.C, Viqarunnisa Noon School and College; H.S.C, Viqarunnisa Noon School and College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/1285.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(107, 64, 39, NULL, '11110', 'Manila Khisa', 'ম্যানিলা খীসা', 'manila@bup.edu.bd', 'Assistant Professor', '+8801884530539', '+8801769028433', 'B+', '', 'Permanent', 'S.S.C, ময়মনসিংহ গার্লস ক্যাডেট কলেজ ; H.S.C, ময়মনসিংহ গার্লস ক্যাডেট কলেজ ; Honors, The University of Adelaide, Australia ; Masters, University of Potsdam, Germany ; ', '', 'http://hr.bup.edu.bd/upload/picture/6789.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(108, 64, 39, NULL, '11058', 'Shidratul Moontaha Suha', 'সিদরাতুল মুনতাহা সুহা', 'moontaha.suha@bup.edu.bd', 'Assistant Professor', '+8801769021923', '+8801769021923', 'O+', '', 'Permanent', 'H.S.C, Holy Cross College ; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/3980.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(109, 68, 45, NULL, '11071', 'Md. Maynul Islam', 'মোঃ মইনুল ইসলাম ', 'maynul@bup.edu.bd', 'Assistant Professor', '+8801677077454', '+8801769021819', 'O+', '', 'Permanent', 'S.S.C, ঢাকা রেসিডেনসিয়াল মডেল কলেজ; H.S.C, নটর ডেম কলেজ; Honors, মিলিটারি ইন্সটিটিউট অব সায়েন্স এন্ড টেকনোলজি; Masters, মিলিটারি ইন্সটিটিউট অব সায়েন্স এন্ড টেকনোলজি; ', '', 'http://hr.bup.edu.bd/upload/picture/3818.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(110, 66, 35, NULL, '11003', 'Sarabia Rahman', 'সারাবিয়া রহমান', 'sarabia@bup.edu.bd', 'Assistant Professor', '+8801817169167', '+8801769021707', 'A+', '', 'Permanent', 'S.S.C, বিএএফ শাহীন কলেজ, তেজগাও; H.S.C, বিএএফ শাহীন কলেজ, তেজগাও; Honors, এমআইএসটি; Masters, এমআইএসটি, বিইউপি; ', '', 'http://hr.bup.edu.bd/upload/picture/324.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(111, 69, 48, NULL, '11164', 'Maliha Tabassum', 'মালিহা তাবাস্সুম', 'maliha.tabassum@bup.edu.bd', 'Lecturer', '+8801727242139', '+8801769028605', 'B+', '', 'Permanent', 'S.S.C, Uttara High School; H.S.C, Milestone College; Honors, Dhaka University; Masters, Coventry University; Masters, Dhaka University; ', '', 'http://hr.bup.edu.bd/upload/picture/16871.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(112, 69, 48, NULL, '11166', 'Nadia Nahrin Rahman', 'নাদিয়া নাহরিন রহমান ', 'nadia.nahrin@bup.edu.bd', 'Lecturer', '+8801683700821', '+8801769028606', 'A+', '', 'Permanent', 'S.S.C, অগ্রণী স্কুল অ কলেজ; H.S.C, ঢাকা সিটি কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/16873.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(113, 64, 39, NULL, '11157', 'F H Yasin Shafi', 'এফ. এইচ. ইয়াসিন শাফি', 'yasin.shafi@bup.edu.bd', 'Lecturer', '+8801716383548', '+8801769028430', 'A+', '', 'Permanent', 'S.S.C, Government Laboratory High School, Dhaka; H.S.C, Dhaka College; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/13196.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(114, 64, 40, NULL, '11161', 'Nilufa Akhtar ', 'নিলুফা আক্তার ', 'nilufa.akhtar@bup.edu.bd', 'Lecturer', '+8801820153535', '+8801769028451', 'B+', '', 'Permanent', 'S.S.C, Sher-E Bangla Nagar Govt. Girls’ High School; H.S.C, Holycross College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/16868.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(115, 64, 41, NULL, '11128', 'Faryana Rafiq', 'ফারইয়ানা রফিক', 'faryana.rafiq@bup.edu.bd', 'Lecturer', '+8801713942942', '+8801769028468', 'O+', '', 'Permanent', 'S.S.C, 	ভিকারুন্নিসা নুন স্কুল ও কলেজ; H.S.C, 	ভিকারুন্নিসা নুন স্কুল ও কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/10050.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(116, 68, 45, NULL, '11054', 'Mahdia Tahsin', 'মাহদিয়া তাহসিন', 'mahdia@bup.edu.bd', 'Lecturer', '+8801769021813', '+8801769021813', 'A+', '', 'Permanent', 'S.S.C, উদয়ন  বিদ্যালয়; H.S.C, বীরশ্রেষ্ঠ নূর মোহাম্মদ পাবলিক কলেজ; Honors, মিলিটারি ইনস্টিটিউট অফ সায়েন্স অ্যান্ড টেকনোলজি; ', '', 'http://hr.bup.edu.bd/upload/picture/3993.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(117, 64, 41, NULL, '11137', 'Naimur Rahman', 'নাঈমুর রহমান', 'naimur.rahman@bup.edu.bd', 'Lecturer', '+8801676791895', '+8801769021914', 'A+', '', 'Permanent', 'H.S.C, নটরডেম কলেজ; Dakhil\r\n, হাজী মরণ আলী ইসলামিয়া ফাজিল মাদ্রাসা; Honors, জাহাঙ্গীর নগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গীর নগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/10054.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(118, 69, 48, NULL, '11158', 'Priyanka Kundu', 'প্রিয়াংকা কুন্ডু', 'priyanka.kundu@bup.edu.bd', 'Lecturer', '+8801785909071', '+8801769028604', 'B+', '', 'Permanent', 'S.S.C, Adarsha Secondary Girls School; H.S.C, Keshabpur College; Honors, University of Dhaka (DU); Masters, University of Dhaka (DU); ', '', 'http://hr.bup.edu.bd/upload/picture/16437.jpeg', '2022-09-04 21:56:08', '2022-09-04 21:56:08');
INSERT INTO `profiles` (`id`, `faculty_id`, `department_id`, `office_id`, `bup_no`, `nameEn`, `nameBn`, `email`, `designation`, `phone`, `mobile`, `blood_group`, `rank`, `appointment_type`, `detail_education`, `experience`, `photo_path`, `created_at`, `updated_at`) VALUES
(119, 64, 39, NULL, '11132', 'Loban Rahman', 'লোবান রহমান', 'loban.rahman@bup.edu.bd', 'Lecturer', '8801834583282', '+8801769028432', 'O+', '', 'Permanent', 'S.S.C, মির্জাপুর ক্যাডেট কলেজ; H.S.C, মির্জাপুর ক্যাডেট কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/11318.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(120, 64, 41, NULL, '11135', 'Abdul Mahidud Khan', 'আব্দুল মহিদুদ খান', 'mahidud.khan@bup.edu.bd', 'Lecturer', '+8801757071107', '+8801769028467', 'AB+', '', 'Permanent', 'S.S.C, সাভার ক্যান্টনমেন্ট পাবলিক স্কুল এবং কলেজ; H.S.C, জাহাঙ্গিরনগর ইউনিভার্সিটি; Honors, জাহাঙ্গিরনগর ইউনিভার্সিটি; Masters, জাহাঙ্গিরনগর ইউনিভার্সিটি; ', '', 'http://hr.bup.edu.bd/upload/picture/10059.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(121, 68, 43, NULL, '11144', 'Fowzia Ahmed', 'ফৌজিয়া আহমেদ', 'fowzia.ahmed@bup.edu.bd', 'Lecturer', '+8801775547906', '+8801769028683', 'B+', '', 'Permanent', 'S.S.C, Mirpur Girls\' Ideal Laboratory Institute; H.S.C, Holy Cross College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/11836.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(122, 66, 35, NULL, '11167', 'Senjuti Barua', 'সেঁজুতি বড়ুয়া', 'senjuti.barua@bup.edu.bd', 'Lecturer', '+8801827138891', '+8801769028330', 'B+', '', 'Permanent', 'S.S.C, Motijheel Govt. Girls High School; H.S.C, Ideal School & College, Motijheel; Honors, Bangladesh University of Professionals; Masters, North South University; ', '', 'http://hr.bup.edu.bd/upload/picture/16874.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(123, 68, 45, NULL, '11139', 'Saiful Islam', 'সাইফুল ইসলাম', 'saifulislam@bup.edu.bd', 'Lecturer', '+8801626465484', '+8801769028705', 'A+', '', 'Permanent', 'H.S.C, Notre Dame College; H.S.C, Begumganj Govt. Pilot High School; Honors, University of Dhaka; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/11377.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(124, 69, 47, NULL, '11160', 'Moniruz Zaman ', 'মনিরুজ্জামান ', 'moniruz.zaman@bup.edu.bd', 'Lecturer', '+8801916109143', '+8801769028575', 'A+', '', 'Permanent', 'S.S.C, হা. আ. রা. জামেয়া ইসলামিয়া মাদ্রাসা; H.S.C, নটরডেম কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; Masters, University of Cambridge, England; ', '', 'http://hr.bup.edu.bd/upload/picture/16867.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(125, 69, 47, NULL, '11194', 'Psymhe Wadud', 'সাইমী ওদুদ', 'psymhe.wadud@bup.edu.bd', 'Lecturer', '', '+8801769028570', '', '', 'Permanent', 'Honors, ঢাকা বিশ্ববিদ্যালয়য়; Masters, ঢাকা বিশ্ববিদ্যালয়য়; ', '', 'http://hr.bup.edu.bd/upload/picture/21688.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(126, 69, 47, NULL, '11195', 'Maksuda Sarker', 'মাকসুদা সরকার', 'maksuda.sarker@bup.edu.bd', 'Lecturer', '+8801965001500', '+8801769028572', 'B+', '', 'Permanent', 'S.S.C, চান্দিনা ডাঃ ফিরোজা বালিকা উচ্চ বিদ্যালয়; H.S.C, হলিক্রস কলেজ, ঢাকা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/21689.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(127, 64, 40, NULL, '11201', 'Saadmaan Jubayer Khan', 'সাদমান জুবায়ের খান', 'saadmaan.jubayer@bup.edu.bd', 'Lecturer', '+8801776458269', '+8801769028453', 'B+', '', 'Permanent', 'S.S.C, Government Laboratory High School, Dhaka; H.S.C, Dhaka College; Honors, Institute of Disaster Management and Vulnerability Studies (IDMVS), University of Dhaka; Masters, Institute of Disaster Management and Vulnerability Studies (IDMVS), University of Dhaka; PG Diploma\r\n, Bangladesh University of Professionals (BUP); ', '', 'http://hr.bup.edu.bd/upload/picture/22302.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(128, 64, 54, NULL, '11202', 'Eshra Faruky', 'ইশরা ফারুকী', 'eshra.faruky@bup.edu.bd', 'Lecturer', '', '+8801769028408', '', '', 'Permanent', 'S.S.C, জামেয়া আহমদিয়া সুন্নিয়া মহিলা মাদরাসা; H.S.C, চট্টগ্রাম কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/22303.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(129, 68, 43, NULL, '11199', 'Israt Jahan', 'ইশরাত জাহান', 'isratjahan@bup.edu.bd', 'Lecturer', '+8801819884311', '+8801769028685', 'O+', '', 'Permanent', 'S.S.C,  মতিঝিল সরকারি বালিকা উচ্চ বিদ্যালয় ; H.S.C, মতিঝিল আইডিয়াল কলেজ ; Honors, ইনস্টিটিউট অব ফরেস্ট্রি এন্ড এনভায়রনমেন্টাল সায়েন্সেস ; Masters, ইনস্টিটিউট অব ফরেস্ট্রি এন্ড এনভায়রনমেন্টাল সায়েন্সেস; Masters, ডারহাম ইউনিভার্সিটি বিজনেস স্কুল ; ', '', 'http://hr.bup.edu.bd/upload/picture/21678.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(130, 69, 46, NULL, '11187', 'Ushree Barua', 'উশ্রী বড়ুয়া', 'ushree.barua@bup.edu.bd', 'Lecturer', '+8801517107346', '+8801769021779', 'O+', '', 'Permanent', 'S.S.C, Chittagong Govt. Girls\' High School; H.S.C, Chittagong College; Honors, Dhaka University; Masters, Dhaka University  ; Masters, Willy Brandt School of Public Policy ; MPhil, Bangladesh University of Professionals ; ', '', 'http://hr.bup.edu.bd/upload/picture/19151.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(131, 64, 41, NULL, '11192', 'Raisha Rahman', 'রাইসা রহমান', 'raisha.rahman@bup.edu.bd', 'Lecturer', '', '+8801769028455', '', '', 'Permanent', 'S.S.C, হলি ক্রস উচ্চ বালিকা বিদ্যালয়; H.S.C, হলি ক্রস কলেজ; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/21686.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(132, 66, 34, NULL, '11200', 'Reajmin Sultana', 'রিয়াজমিন সুলতানা', 'reajmin.sultana@bup.edu.bd', 'Lecturer', '+8801682245122', '+8801769028336', 'O+', '', 'Permanent', 'S.S.C, র্মগ্যান বালিকা উচ্চ বিদ্যালয়; H.S.C, নারায়ণগঞ্জ কলেজ; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/21674.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(133, 64, 40, NULL, '11182', 'Musarrat Zaman', 'মুসাররাত জামান', 'musarrat.zaman@bup.edu.bd', 'Lecturer', '+8801684237650', '+8801769028452', 'B+', '', 'Permanent', 'H.S.C, College of Development Alternative (CODA); H.S.C, College of Development Alternative (CODA); Honors, Bangladesh University of Engineering and Technology (BUET); Masters, University of Technology Malaysia; ', '', 'http://hr.bup.edu.bd/upload/picture/19146.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(134, 64, 52, NULL, '11204', 'Md. Robiul Islam', 'মোঃ রবিউল ইসলাম', 'robiul.islam@bup.edu.bd', 'Lecturer', '', '+8801769028510', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/22629.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(135, 69, 46, NULL, '11186', 'Momtaj Monwara', 'মমতাজ মনওয়ারা', 'momtaj.monwara@bup.edu.bd', 'Lecturer', '+8801930245948', '+8801769021778', 'B+', '', 'Permanent', 'S.S.C, Nabab Faizunnesa Govt. Girls High School ; H.S.C, Brahmanbaria Govt. college ; Honors, University of Dhaka ; Masters, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/19150.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(136, 65, 125, NULL, '11198', 'Barna Bose', 'বর্না বসু', 'barna.bose@bup.edu.bd', 'Lecturer', '+8801923550663', '+8801769028457', 'AB+', '', 'Permanent', 'S.S.C, Amrita Lal Dey College ; H.S.C, Amrita Lal Dey College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/21671.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(137, 65, 33, NULL, '11184', 'Farjana Nur Saima', 'ফারজানা নূর সায়মা', 'farjana.nur@bup.edu.bd', 'Lecturer', '+8801846968254', '+8801769028314', 'B+', '', 'Permanent', 'S.S.C,  আগ্রাবাদ সরকারি কলোনি উচ্চ বিদ্যালয়; H.S.C, সরকারি কমার্স কলেজ,চট্রগ্রাম; B.B.A, ঢাকা বিশ্ববিদ্যালয়; M.B.A, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/19148.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(138, 66, 34, NULL, '11185', 'Md. H Asibur Rahman', 'মোঃ এইচ আসিবুর রহমান', 'asibur.rahman@bup.edu.bd', 'Lecturer', '+8801515202403', '+8801769028369', 'AB+', '', 'Permanent', 'S.S.C, Board of Intermediate and Secondary Education, Barisal; H.S.C, Govt. Syed Hatem Ali College, Barisal; B.B.A, Management Studies, Jahangirnagar University; M.B.A, Human Resource Management, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/19149.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(139, 65, 33, NULL, '11189', 'Chowdhury Ummeh Kulsum', 'চৌধুরী উম্মে  কুলসুম', 'ummeh.kulsum@bup.edu.bd', 'Lecturer', '+8801976354354', '+8801769028370', 'O+', '', 'Permanent', 'S.S.C, CUFL School & College; H.S.C, Govt Hazi Muhammad Mohsin college; Honors, University of Chittagong; Masters, University of Chittagong; ', '', 'http://hr.bup.edu.bd/upload/picture/19153.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(140, 69, 46, NULL, '11191', 'Tasmiha Tabassum Sadia', 'তাসমিয়াহ্ তাবাসসুম সাদিয়া', 'tasmiha.tabassum@bup.edu.bd', 'Lecturer', '+8801676789318', '+8801769021776', 'O+', '', 'Permanent', 'S.S.C, হলি ক্রস উচ্চ বালিকা বিদ্যালয়; H.S.C, হলি ক্রস কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/21645.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(141, 66, 32, NULL, '11175', 'Farzana Tazin', 'ফারজানা তাজিন', 'farzana.tazin@bup.edu.bd', 'Lecturer', '+8801677354357', '+8801769028354', 'A+', '', 'Permanent', 'S.S.C, YWCA higher secondary Girls School; H.S.C, Dhaka City College; B.B.A, University of Dhaka; M.B.A, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/17546.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(142, 66, 34, NULL, '11183', 'Jarin Tasnim', 'যারিন তাসনিম', 'jarin.tasnim@bup.edu.bd', 'Lecturer', '+8801677004716', '+8801769028345', 'A+', '', 'Permanent', 'S.S.C, Begum Amena Sultan Govt. Girl\'s High School; H.S.C, Dr. Khandakar Mossarof Hossain college; Honors, Jagannath University; Masters, Jagannath University; MPhil, Bangladesh University of Professionals ; ', '', 'http://hr.bup.edu.bd/upload/picture/19147.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(143, 66, 35, NULL, '11197', 'Kazi Asequl Arefin', 'কাজী আশেকুল আরেফীন', 'kazi.arefin@bup.edu.bd', 'Lecturer', '+8801965255860', '+8801769028334', 'B-', '', 'Permanent', 'S.S.C, মীরপুর বাংলা উচ্চ বিদ্যালয় ও কলেজ; H.S.C, ঢাকা কমার্স কলেজ; B.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; M.B.A, ব্যবসায় প্রশাসন ইনস্টিটিউট, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/21668.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(144, 66, 35, NULL, '11196', 'Ummay Mahima Ima', 'উম্মে মাহিমা ইমা', 'ummay.mahima@bup.edu.bd', 'Lecturer', '+8801681484247', '+8801769028319', 'A+', '', 'Permanent', 'S.S.C, টিকাটুলি কামরুন্নেসা সরকারি বালিকা উচ্চ বিদ্যালয়; H.S.C, ঢাকা সিটি কলেজ; B.B.A, ফ্যাকাল্টি অফ বিজনেস স্টাডিস; M.B.A, ফ্যাকাল্টি অফ বিজনেস স্টাডিস; ', '', 'http://hr.bup.edu.bd/upload/picture/21669.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(145, 66, 32, NULL, '11173', 'Sabrina Sharmin Nishat', 'সাবরিনা শারমিন নিশাত', 'sabrina.nishat@bup.edu.bd', 'Lecturer', '01670297982', '+8801769028353', 'A+', '', 'Permanent', 'S.S.C, রেডিয়্যান্ট স্কুল এন্ড কলেজ; H.S.C, মাইলস্টোন কলেজ; B.B.A, ব্যবসায় শিক্ষা অনুষদ, ঢাকা বিশ্ববিদ্দ্যালয়; M.B.A, ব্যবসায় শিক্ষা অনুষদ, ঢাকা বিশ্ববিদ্দ্যালয়; PG Diploma\r\n, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/17543.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(146, 69, 50, NULL, '11174', 'Nusrat Jahan Jebin', 'নুসরাত জাহান জেবিন', 'nusrat.jahan@bup.edu.bd', 'Lecturer', '01960597353', '+8801769021753', 'A+', '', 'Permanent', 'S.S.C, ময়মনসিংহ গার্লস ক্যাডেট কলেজ; H.S.C, ময়মনসিংহ গার্লস ক্যাডেট কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/17570.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(147, 65, 125, NULL, '11179', 'Wasik Sajid Khan', 'ওয়াসিক সাজিদ খান', 'wasik.sajid@bup.edu.bd', 'Lecturer', '+8801676242893', '+8801769028456', 'A+', '', 'Permanent', 'S.S.C, উদয়ন বিদ্যালয়, ঢাকা; H.S.C, নটর ডেম কলেজ, ঢাকা; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/18879.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(148, 64, 52, NULL, '11178', 'Mohammad Nur Ullah', 'মোহাম্মদ নুর উল্লাহ', 'nur.ullah@bup.edu.bd', 'Lecturer', '+8801821504733', '+8801769028509', 'O+', '', 'Permanent', 'S.S.C, গুনক অলিপুর আনোয়ারুল উলুম দাখিল মাদ্রাসা; H.S.C, আল জামেয়াতুল ফালাহিয়া কামিল মাদ্রাসা; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/16476.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(149, 68, 45, NULL, '11143', 'M. Al Mamun', 'মুঃ আল মামুন', 'almamun@bup.edu.bd', 'Lecturer', '+8801727912936', '+8801769028703', 'B+', '', 'Permanent', 'Honors, Islamic University of Technology (IUT); Masters, Islamic University of Technology (IUT); Ph.D, Florida International University, USA; ', '', 'http://hr.bup.edu.bd/upload/picture/11380.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(150, 64, 41, NULL, '11140', 'Md. Adib Ahmed', 'মোঃ আদিব আহমদ', 'adib.ahmed@bup.edu.bd', 'Lecturer', '+8801515204893', '+8801769028469', 'A+', '', 'Permanent', 'S.S.C, বীরশ্রেষ্ট নূর মোহাম্মদ পাবলিক কলেজ; H.S.C, বীরশ্রেষ্ট নূর মোহাম্মদ পাবলিক কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, 	ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/10063.jpeg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(151, 64, 41, NULL, '11162', 'Md. Monir', 'মোঃ মনির', 'monir@bup.edu.bd', 'Lecturer', '+8801911378318', '+8801769028464', 'AB+', '', 'Permanent', 'S.S.C, Mahmudun Nabi High School; H.S.C, Dhaka Commerce College; Honors, Jahangirnagar University; Masters, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/16196.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(152, 65, 33, NULL, '11168', 'Anamika Dey', 'অনামিকা দে', 'anamika.dey@bup.edu.bd', 'Lecturer', '+8801992955136', '+8801769028386', 'A+', '', 'Permanent', 'S.S.C, কে. বি. এ. এইচ দোভাষ সিটি কর্পোরেশন বালিকা উচ্চ বিদ্যালয়  ; H.S.C, সরকারি কমার্স কলেজ, চট্টগ্রাম; B.B.A, চট্টগ্রাম বিশ্ববিদ্যালয় ; M.B.A, চট্টগ্রাম বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/17261.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(153, 69, 47, NULL, '11145', 'Tashmia Sabera', 'তাসমিয়া সাবেরা', 'tashmia@bup.edu.bd', 'Lecturer', '+8801680728697', '+8801769021775', 'O+', '', 'Permanent', 'S.S.C, আলী হোসেন বালিকা উচ্চ বিদ্যালয়; H.S.C, বীরশ্রেষ্ঠ মুন্সী আব্দুর রউফ রাইফেলস কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/13225.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(154, 66, 35, NULL, '11172', 'Md. Nahid Alam', 'মোঃ নাহিদ আলম', 'nahid.alam@bup.edu.bd', 'Lecturer', '+8801878945236', '+8801769028331', 'A+', '', 'Permanent', 'B.B.A, IBA, Jahangirnagar University; M.B.A, IBA, Jahangirnagar University; ', '', 'http://hr.bup.edu.bd/upload/picture/17568.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(155, 64, 40, NULL, '11064', 'Md. Rifat Hossain', 'মোঃ রিফাত হোসেন', 'rifat.hossain@bup.edu.bd', 'Lecturer', '+8801912928638', '+8801769021933', 'B+', '', 'Permanent', 'S.S.C, বরিশাল ক্যাডেট কলেজ; H.S.C, বরিশাল ক্যাডেট কলেজ; Honors, বাংলাদেশ প্রকৌশল বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয়; Ph.D, Toledo University, USA; ', '', 'http://hr.bup.edu.bd/upload/picture/4101.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(156, 69, 46, NULL, '11176', 'Md. Ataur Rahman Talukder', 'মোঃ আতাউর রহমান তালুকদার', 'ataurrahman@bup.edu.bd', 'Lecturer', '01572379740', '+8801769021793', 'B+', '', 'Permanent', 'S.S.C, বীরশ্রেষ্ঠ মুন্সী আব্দুর রউফ পাবলিক কলেজ ; H.S.C, নটরডেম কলেজ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/17572.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(157, 65, 127, NULL, '11238', 'Masrur Mahmud Khan', 'মাশরুর মাহমুদ খান', 'masrur.mahmud@bup.edu.bd', 'Lecturer', '', '+8801769028638', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(158, 69, 48, NULL, '11221', 'Mehedy Hassan Razib', 'মেহেদী হাসান রাজীব', 'mehedy.hassan@bup.edu.bd', 'Lecturer', '', '+8801769028607', '', '', 'Permanent', 'H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; H.S.C, সরকারি দেবেন্দ্র কলেজ, মানিকগঞ্জ; Honors, ঢাকা বিশ্ববিদ্যালয়; ', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(159, 69, 47, NULL, '11233', 'Amena Jahan Urmy', 'আমেনা জাহান ঊর্মি', 'amena.urmy@bup.edu.bd', 'Lecturer', '+8801689896989', '+8801769021797', 'O+', '', 'Permanent', 'S.S.C, Viqarunnisa Noon School ; H.S.C, Viqarunnisa Noon School & College ; Honors, Bangladesh University of Professionals ; Masters, Bangladesh University of Professionals ; ', '', 'http://hr.bup.edu.bd/upload/picture/26482.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(160, 69, 47, NULL, '11232', 'Md. Azhar Uddin Bhuiyan', 'মোঃ আজহার উদ্দিন ভূঁইয়া', 'azhar.uddin@bup.edu.bd', 'Lecturer', '', '+8801769021796', '', '', 'Permanent', 'S.S.C, Ideal School and College, Motijheel, Dhaka; H.S.C, Notre Dame College, Dhaka; Honors, Department of Law, University of Dhaka; Masters, Department of Law, University of Dhaka; ', '', 'http://hr.bup.edu.bd/upload/picture/26476.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(161, 66, 35, NULL, '11234', 'Mst. Sharmin Sultana Sumi', 'মোছাঃ শারমিন সুলতানা সুমি', 'sharmin.sumi@bup.edu.bd', 'Lecturer', '', '+8801769028317', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(162, 66, 34, NULL, '11237', 'Mafi Rahman', 'মাফি রহমান', 'mafirahman@bup.edu.bd', 'Lecturer', '+8801777644825', '+8801769028338', 'B+', '', 'Permanent', 'S.S.C, ভিকারুননিসা নূন স্কুল এন্ড কলেজ; H.S.C, রাজউক উত্তরা মডেল কলেজ; B.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; M.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/27988.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(163, 65, 33, NULL, '11241', 'Ipsita Datta', 'ইপ্সিতা দত্ত', 'ipsita.datta@bup.edu.bd', 'Lecturer', '', '+8801769028375', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(164, 66, 36, NULL, '11231', 'Barnali Nandi', 'বর্ণালী নন্দী', 'barnali.nandi@bup.edu.bd', 'Lecturer', '', '+8801769028374', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(165, 64, 42, NULL, '11244', 'Sumaeta Marjan', 'সুমাইতা মারজান', 'sumaeta.marjan@bup.edu.bd', 'Lecturer', '', '+8801769028491', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(166, 68, 43, NULL, '11181', 'Md. Arifur Rahman Bhuiyan', 'মোঃ আরিফুর রহমান ভূঁইয়া', 'arifur.rahman@bup.edu.bd', 'Lecturer', '+8801683982051', '+8801769028684', 'B+', '', 'Permanent', 'S.S.C, বিএএফ শাহীন কলেজ, কুর্মিটোলা, ঢাকা; H.S.C, বিএএফ শাহীন কলেজ, কুর্মিটোলা, ঢাকা।; Honors, ঢাকা বিশ্ববিদ্যালয়; Masters, ঢাকা বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/19064.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(167, 64, 41, NULL, '11188', 'Dilara Jahan', 'দিলআরা জাহান', 'dilara.jahan@bup.edu.bd', 'Lecturer', '+8801964540054', '+8801769021915', 'B+', '', 'Permanent', 'S.S.C, কলারোয়া; H.S.C, কলারোয়া সরকারি কলেজ।; Honors, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; Masters, জাহাঙ্গীরনগর বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/19152.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(168, 66, 34, NULL, '11207', 'Sadman Kabir', 'সাদমান কবির', 'sadman.kabir@bup.edu.bd', 'Lecturer', '+8801738777997', '+8801769028335', 'A+', '', 'Permanent', 'S.S.C, রাজশাহী বিশ্ববিদ্যালয় স্কুল; H.S.C, নিউ গভঃ ডিগ্রী কলেজ, রাজশাহী; B.B.A, রাজশাহী বিশ্ববিদ্যালয়; M.B.A, রাজশাহী বিশ্ববিদ্যালয়; ', '', 'http://hr.bup.edu.bd/upload/picture/24930.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(169, 69, 47, NULL, '11240', 'Sadia Binte Rahman', 'সাদিয়া বিনতে রহমান', 'sadia.rahman@bup.edu.bd', 'Lecturer', '+8801773320934', '+8801769021780', 'B+', '', 'Permanent', 'S.S.C, ক্যান্টনমেন্ট পাবলিক স্কুল এন্ড কলেজ, সৈয়দপুর; H.S.C, ক্যান্টনমেন্ট পাবলিক স্কুল এন্ড কলেজ রংপুর; Honors, Bangladesh University of Professionals; Masters, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/27991.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(170, 65, 33, NULL, '11235', 'Mohammad Robaitur Rahat', 'মোহাম্মদ রোবাইতুর রাহাত', 'robaitur.rahat@bup.edu.bd', 'Lecturer', '+8801517832146', '+8801769028318', 'B+', '', 'Permanent', 'S.S.C, ফতেয়াবাদ উচ্চ বিদ্যালয় ; H.S.C, কুলগাও সিটি করর্পোরেশন কলেজ ; B.B.A, চট্টগ্রাম বিশ্ববিদ্যালয় ; M.B.A, চট্টগ্রাম বিশ্ববিদ্যালয়	; ', '', 'http://hr.bup.edu.bd/upload/picture/27986.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(171, 68, 38, NULL, '11247', 'Nazneen Akhter', 'নাজনীন আক্তার', 'nazneen.akhter@bup.edu.bd', 'Lecturer', '', '+8801769021823', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/24976.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(172, 66, 37, NULL, '11217', 'Sirajum Munira Chowdhury Otosi', 'সিরাজুম মুনিরা চৌধুরী অতসী', 'sirajum.munira@bup.edu.bd', 'Lecturer', '', '+8801769028301', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(173, 68, 45, NULL, '11223', 'Afrina Khatun', 'আফরিনা খাতুন', 'afrina.khatun@bup.edu.bd', 'Lecturer', '', '+8801769021815', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(174, 66, 36, NULL, '11239', 'Md. Soleman Mollik', 'মোঃ সোলেমান মল্লিক', 'soleman.mollik@bup.edu.bd', 'Lecturer', '', '+8801769028387', '', '', 'Permanent', 'M.B.A, University of Rajshahi; ', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(175, 68, 43, NULL, '11242', 'Md. Golam Muktadir', 'মোঃ গোলাম মুক্তাদির', 'golam.muktadir@bup.edu.bd', 'Lecturer', '', '+8801769028687', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(176, 66, 35, NULL, '11236', 'Mujtaba Rafid Rafa', 'মুজতবা রাফিদ রাফা', 'mujtabarafid.rafa@bup.edu.bd', 'Lecturer', '', '+8801769028320', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(177, 65, 127, NULL, '11214', 'Mansura Amdad', 'মানসুরা এমদাদ', 'mansura.amdad@bup.edu.bd', 'Lecturer', '', '+8801769028637', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(178, 66, 34, NULL, '11243', 'Israt Jahan Dina', 'ইসরাত জাহান দিনা', 'isratjahan.dina@bup.edu.bd', 'Lecturer', '', '+8801769028337', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(179, 66, 36, NULL, '11216', 'Ashik Abdullah', 'আশিক আব্দুল্লাহ্', 'ashik.abdullah@bup.edu.bd', 'Lecturer', '', '+8801769028372', '', '', 'Permanent', '', '', 'https://ucam.bup.edu.bd/Upload/Avatar/Male.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(180, 66, 37, NULL, '11208', 'Umma Hania', 'উম্মে হানিয়া', 'umma.hania@bup.edu.bd', 'Lecturer', '', '+8801769028300', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/24931.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(181, 66, 34, NULL, '11203', 'S. M. Sayem', 'এস. এম. সায়েম', 'smsayem@bup.edu.bd', 'Lecturer', '', '+8801769028333', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/22628.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(182, 65, 125, NULL, '11206', 'Amina Khatun', 'আমিনা খাতুন', 'amina.khatun@bup.edu.bd', 'Lecturer', '', '+8801769028458', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/24929.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(183, 69, 48, NULL, '11205', 'Sanjoy Basak Partha', 'সঞ্জয় বসাক পার্থ', 'sanjoy.partha@bup.edu.bd', 'Lecturer', '+8801964271822', '+8801769028601', 'A+', '', 'Permanent', 'S.S.C, মোহাম্মদপুর মডেল স্কুল অ্যান্ড কলেজ ; H.S.C, ঢাকা রেসিডেনসিয়াল মডেল কলেজ ; Honors, ঢাকা বিশ্ববিদ্যালয় ; Masters, ঢাকা বিশ্ববিদ্যালয় ; ', '', 'http://hr.bup.edu.bd/upload/picture/24928.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(184, 66, 36, NULL, '11190', 'Takrima Jannat', 'তাকরিমা জান্নাত', 'takrima.jannat@bup.edu.bd', 'Lecturer', '', '+8801769028373', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/21649.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(185, 68, 38, NULL, '11246', 'Md. Hasan Al Banna', 'মোঃ হাসান আল বান্না', 'hasan.banna@bup.edu.bd', 'Lecturer', '', '+8801769021822', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/24975.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(186, 69, 46, NULL, '11213', 'Shah Md. Shamrir Al-Af', 'শাহ মোঃ শামরির আল-আফ', 'shamriralaf@bup.edu.bd', 'Lecturer', '', '+8801769028639', '', '', 'Permanent', 'S.S.C, Rajshahi Cadet College; H.S.C, Rajshahi Cadet College; Honors, Bangladesh University of Professionals ; Masters, Bangladesh University of Professionals ; ', '', 'http://hr.bup.edu.bd/upload/picture/25430.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(187, 65, 125, NULL, '11227', 'Md. Mahbubul Alam', 'মোঃ মাহবুবুল আলম', 'mahbubul.alam@bup.edu.bd', 'Lecturer', '+8801521439694', '+8801769028459', 'O-', '', 'Permanent', 'S.S.C, মতিঝিল সরকারি বালক উচ্চ বিদ্যালয় ; H.S.C, সরকারি বিজ্ঞান কলেজ; Honors, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; Masters, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/25444.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(188, 66, 35, NULL, '11220', 'Maliha Rabeta', 'মালিহা রাবেতা', 'maliha.rabeta@bup.edu.bd', 'Lecturer', '', '+8801769028316', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/25437.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(189, 68, 45, NULL, '11219', 'Md. Jaber Al Nahian', 'মোঃ জাবের আল নাহিয়ান', 'Jaber.nahian@bup.edu.bd', 'Lecturer', '', '+8801769021818', '', '', 'Permanent', 'S.S.C, Noakhali Zilla School; H.S.C, B A F Shaheen College, Dhaka; Bachelor of Science (BSc), Bangladesh University of Professionals; Master of Science (Tech), Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/25436.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(190, 65, 33, NULL, '11215', 'Tasfika Khanam', 'তাশফিকা খানম', 'tasfika.khanam@bup.edu.bd', 'Lecturer', '', '+8801769028315', '', '', 'Permanent', 'B.B.A, University of Chittagong; M.B.A, University of Chittagong; ', '', 'http://hr.bup.edu.bd/upload/picture/25432.jpg', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(191, 66, 32, NULL, '11211', 'Sadman Rana Rakin', 'সাদমান রানা রাকিন', 'sadman.rana@bup.edu.bd', 'Lecturer', '', '+8801769028356', '', '', 'Permanent', 'S.S.C, সেন্ট জোসেফ উচ্চ মাধ্যমিক বিদ্যালয়; H.S.C, নটর ডেম কলেজ; B.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; M.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/25022.JPG', '2022-09-04 21:56:08', '2022-09-04 21:56:08'),
(192, 64, 52, NULL, '11228', 'Azmaine Faeique', 'আজমাইন ফায়েক', 'azmaine.faeique@bup.edu.bd', 'Lecturer', '', '+8801769028513', '', '', 'Permanent', 'S.S.C, Mohammadpur Government High School ; H.S.C,  Dhaka College ; Honors, Bangladesh University of Professionals; Masters, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/25445.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(193, 64, 39, NULL, '11225', 'Faria Ahmed', 'ফারিয়া আহমেদ', 'faria.ahmed@bup.edu.bd', 'Lecturer', '', '+8801769028435', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/25442.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(194, 64, 42, NULL, '11224', 'Sahria Islam Trisha', 'সাহরিয়া ইসলাম তৃষা', 'sharia.islam@bup.edu.bd', 'Lecturer', '', '+8801769028490', '', '', 'Permanent', 'S.S.C, ভিকারুননিসা নূন স্কুল এন্ড কলেজ; H.S.C, ভিকারুননিসা নূন স্কুল এন্ড কলেজ; Honors, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস্‌; Masters, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস্‌; ', '', 'http://hr.bup.edu.bd/upload/picture/25441.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(195, 64, 42, NULL, '11244', 'Sumaeta Marjan', 'সুমাইতা মারজান', 'sumaeta.marjan@bup.edu.bd', 'Lecturer', '', '+8801769028491', '', '', 'Permanent', '', '', 'http://hr.bup.edu.bd/upload/picture/25365.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(196, 64, 42, NULL, '11226', 'Khadija Akter Onee', 'খাদিজা আক্তার অনি', 'khadija.akter@bup.edu.bd', 'Lecturer', '+8801996852997', '+8801769028492', 'A+', '', 'Permanent', 'S.S.C, Rajuk Uttara Model College; H.S.C, Rajuk Uttara Model College; Honors, Bangladesh University of Professionals; Masters, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/25443.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(197, 64, 40, NULL, '11230', 'Farah Tasnim', 'ফারাহ্ তাসনিম', 'farah.tasnim@bup.edu.bd', 'Lecturer', '', '+8801769028454', '', '', 'Permanent', 'S.S.C, Monipur High School and College; H.S.C, Shaheed Bir Uttam Lt. Anwar Girls\' College; Honors, Bangladesh University of Professionals; Masters, Bangladesh University of Professionals; ', '', 'http://hr.bup.edu.bd/upload/picture/25447.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(198, 65, 125, NULL, '11229', 'Abir Hassan', 'আবীর হাসান', 'abir.hassan@bup.edu.bd', 'Lecturer', '+8801769028460', '+8801769028460', 'AB+', '', 'Permanent', 'S.S.C, ঝিনাইদহ ক্যাডেট কলেজ; H.S.C, ঝিনাইদহ ক্যাডেট কলেজ; Honors, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; Masters, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/25446.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09'),
(199, 66, 32, NULL, '11210', 'Masuma Binte Yousuf', 'মাসুমা বিনতে ইউসুফ', 'masuma.yousuf@bup.edu.bd', 'Lecturer', '', '+8801769028355', '', '', 'Permanent', 'S.S.C, রাজউক উত্তরা মডেল স্কুল এন্ড কলেজ; H.S.C, রাজউক উত্তরা মডেল স্কুল এন্ড কলেজ; B.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; M.B.A, বাংলাদেশ ইউনিভার্সিটি অব প্রফেশনালস; ', '', 'http://hr.bup.edu.bd/upload/picture/25021.jpg', '2022-09-04 21:56:09', '2022-09-04 21:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `profile_award_honors`
--

DROP TABLE IF EXISTS `profile_award_honors`;
CREATE TABLE IF NOT EXISTS `profile_award_honors` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalAwardAndHonor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AwardHonor` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_award_honors_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_biographies`
--

DROP TABLE IF EXISTS `profile_biographies`;
CREATE TABLE IF NOT EXISTS `profile_biographies` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Biography` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_biographies_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_books`
--

DROP TABLE IF EXISTS `profile_books`;
CREATE TABLE IF NOT EXISTS `profile_books` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `NoOfBook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BookDetail` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_books_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_conferences`
--

DROP TABLE IF EXISTS `profile_conferences`;
CREATE TABLE IF NOT EXISTS `profile_conferences` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `NoOfConference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ConferenceDetail` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_conferences_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_course_taughts`
--

DROP TABLE IF EXISTS `profile_course_taughts`;
CREATE TABLE IF NOT EXISTS `profile_course_taughts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalCourseTaught` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CourseTaught` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_course_taughts_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_google_scholars`
--

DROP TABLE IF EXISTS `profile_google_scholars`;
CREATE TABLE IF NOT EXISTS `profile_google_scholars` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalGoogleScholar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `GoogleScholar` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_google_scholars_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_journals`
--

DROP TABLE IF EXISTS `profile_journals`;
CREATE TABLE IF NOT EXISTS `profile_journals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `NoOfJournal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `JournalDetail` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_journals_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_memberships`
--

DROP TABLE IF EXISTS `profile_memberships`;
CREATE TABLE IF NOT EXISTS `profile_memberships` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalMembership` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Membership` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_memberships_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_professional_activities`
--

DROP TABLE IF EXISTS `profile_professional_activities`;
CREATE TABLE IF NOT EXISTS `profile_professional_activities` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalProfessionalActivity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ProfessionalActivity` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_professional_activities_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_research_area_interests`
--

DROP TABLE IF EXISTS `profile_research_area_interests`;
CREATE TABLE IF NOT EXISTS `profile_research_area_interests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalResearchArea` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResearchAreasOrInterest` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_research_area_interests_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_research_gates`
--

DROP TABLE IF EXISTS `profile_research_gates`;
CREATE TABLE IF NOT EXISTS `profile_research_gates` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalResearchGate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ResearchGate` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_research_gates_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profile_websites`
--

DROP TABLE IF EXISTS `profile_websites`;
CREATE TABLE IF NOT EXISTS `profile_websites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TotalWebsite` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `WebsiteAddress` longtext COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_websites_profile_id_foreign` (`profile_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
CREATE TABLE IF NOT EXISTS `programs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `program_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `faculty_id` bigint(20) UNSIGNED DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `program_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ucam_program_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `programs_program_category_id_foreign` (`program_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_category_id`, `faculty_id`, `department_id`, `program_title`, `ucam_program_id`, `created_at`, `updated_at`) VALUES
(1, 4, 64, 39, 'ertyu', '23', '2022-09-18 23:14:03', '2022-09-18 23:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `program_categories`
--

DROP TABLE IF EXISTS `program_categories`;
CREATE TABLE IF NOT EXISTS `program_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ucam_program_category_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_categories`
--

INSERT INTO `program_categories` (`id`, `program_category`, `ucam_program_category_id`, `created_at`, `updated_at`) VALUES
(3, 'Qui et reprehenderit', '345363', '2022-08-06 21:56:08', '2022-08-06 23:24:40'),
(4, 'Sit velit ea neque c', '473562', '2022-08-06 21:56:13', '2022-08-06 23:24:55');

-- --------------------------------------------------------

--
-- Table structure for table `regulatory_committes`
--

DROP TABLE IF EXISTS `regulatory_committes`;
CREATE TABLE IF NOT EXISTS `regulatory_committes` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `profile_id` bigint(20) UNSIGNED NOT NULL,
  `committe_type_id` bigint(20) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regulatory_committes`
--

INSERT INTO `regulatory_committes` (`id`, `profile_id`, `committe_type_id`, `sort`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, '2022-09-11 22:21:13', '2022-09-14 04:32:58'),
(2, 5, 1, 2, '2022-09-11 22:21:34', '2022-09-12 00:02:43'),
(3, 1, 2, 1, '2022-09-11 22:22:05', '2022-09-11 22:22:05'),
(4, 2, 2, 2, '2022-09-11 22:22:19', '2022-09-11 22:22:19'),
(5, 3, 1, 3, '2022-09-12 00:01:16', '2022-09-12 00:01:16'),
(6, 4, 1, 2, '2022-09-12 00:01:29', '2022-09-12 00:01:43'),
(7, 3, 2, 3, '2022-09-12 00:06:09', '2022-09-12 00:06:43'),
(8, 2, 1, 4, '2022-09-12 00:19:22', '2022-09-12 00:19:22'),
(9, 4, 2, 7, '2022-09-13 22:58:38', '2022-09-13 22:59:03'),
(10, 5, 2, 5, '2022-09-13 22:59:13', '2022-09-13 22:59:13'),
(11, 1, 3, 1, '2022-09-14 00:17:31', '2022-09-14 00:17:31'),
(12, 3, 3, 2, '2022-09-14 00:17:50', '2022-09-14 00:17:50'),
(13, 1, 4, 1, '2022-09-14 00:35:30', '2022-09-14 00:35:30'),
(14, 2, 4, 2, '2022-09-14 00:35:41', '2022-09-14 00:35:41'),
(15, 3, 4, 3, '2022-09-14 04:22:38', '2022-09-14 04:22:38'),
(16, 6, 1, 2, '2022-09-14 04:32:21', '2022-09-14 04:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `working_area` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `working_area`, `status`, `created_by`, `updated_by`, `deleted_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Admin', 'District', 1, NULL, NULL, NULL, NULL, '2022-05-24 22:32:33', '2022-06-20 04:50:58'),
(2, 'User', 'User', 'HQ', 1, NULL, NULL, NULL, NULL, '2022-05-24 22:32:33', '2022-06-20 04:50:53'),
(3, 'Club admin', 'Others', NULL, 1, NULL, NULL, NULL, NULL, '2022-05-24 22:32:33', '2022-09-14 04:38:08');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` text COLLATE utf8mb4_unicode_ci,
  `site_title` text COLLATE utf8mb4_unicode_ci,
  `site_title_bn` text COLLATE utf8mb4_unicode_ci,
  `site_short_description` text COLLATE utf8mb4_unicode_ci,
  `site_short_description_bn` text COLLATE utf8mb4_unicode_ci,
  `site_header_logo` text COLLATE utf8mb4_unicode_ci,
  `site_footer_logo` text COLLATE utf8mb4_unicode_ci,
  `site_favicon` text COLLATE utf8mb4_unicode_ci,
  `site_banner_image` text COLLATE utf8mb4_unicode_ci,
  `site_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone_primary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_phone_secondary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_address` text COLLATE utf8mb4_unicode_ci,
  `mail_driver` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_host` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_port` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_encryption` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` text COLLATE utf8mb4_unicode_ci,
  `twitter_url` text COLLATE utf8mb4_unicode_ci,
  `google_plus_url` text COLLATE utf8mb4_unicode_ci,
  `linkedin_url` text COLLATE utf8mb4_unicode_ci,
  `youtube_url` text COLLATE utf8mb4_unicode_ci,
  `instagram_url` text COLLATE utf8mb4_unicode_ci,
  `pinterest_url` text COLLATE utf8mb4_unicode_ci,
  `tumblr_url` text COLLATE utf8mb4_unicode_ci,
  `flickr_url` text COLLATE utf8mb4_unicode_ci,
  `recaptcha_key` text COLLATE utf8mb4_unicode_ci,
  `recaptcha_secret` text COLLATE utf8mb4_unicode_ci,
  `facebook_key` text COLLATE utf8mb4_unicode_ci,
  `facebook_secret` text COLLATE utf8mb4_unicode_ci,
  `twitter_key` text COLLATE utf8mb4_unicode_ci,
  `twitter_secret` text COLLATE utf8mb4_unicode_ci,
  `google_plus_key` text COLLATE utf8mb4_unicode_ci,
  `google_plus_secret` text COLLATE utf8mb4_unicode_ci,
  `google_map_api` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_width` text COLLATE utf8mb4_unicode_ci,
  `image_height` text COLLATE utf8mb4_unicode_ci,
  `image_size` text COLLATE utf8mb4_unicode_ci,
  `file_type` text COLLATE utf8mb4_unicode_ci,
  `notification_type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 = toastr; 2 = sweetalert; 3 = notifyjs',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `company_name`, `site_title`, `site_title_bn`, `site_short_description`, `site_short_description_bn`, `site_header_logo`, `site_footer_logo`, `site_favicon`, `site_banner_image`, `site_email`, `site_phone_primary`, `site_phone_secondary`, `site_address`, `mail_driver`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `facebook_url`, `twitter_url`, `google_plus_url`, `linkedin_url`, `youtube_url`, `instagram_url`, `pinterest_url`, `tumblr_url`, `flickr_url`, `recaptcha_key`, `recaptcha_secret`, `facebook_key`, `facebook_secret`, `twitter_key`, `twitter_secret`, `google_plus_key`, `google_plus_secret`, `google_map_api`, `image_width`, `image_height`, `image_size`, `file_type`, `notification_type`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Nanosoft', 'MP Portal', ' ', ' ', ' ', '20190821_1566385367712.png', '20190821_1566385399772.png', '20190821_1566373763949.jpg', '20190821_1566373763367.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'jpeg|png|jpg|gif', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_category_id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_categories`
--

DROP TABLE IF EXISTS `slider_categories`;
CREATE TABLE IF NOT EXISTS `slider_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bup_id` bigint(20) DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `mobile`, `password`, `image`, `status`, `deleted_at`, `remember_token`, `created_at`, `updated_at`, `bup_id`, `designation`, `department`, `address`) VALUES
(1, 'Admin', NULL, 'admin@gmail.com', NULL, '01345671823', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, 1, NULL, NULL, '2022-05-24 22:32:33', '2022-06-20 04:53:10', NULL, NULL, NULL, NULL),
(2, 'Mamun', NULL, 'mamun@gmail.com', NULL, '01736453125', '$2y$10$fEt5i4g3hzhFlMhAMV/preypehZMwFdRbBcaVHp1zd70G.rx4.r9S', NULL, 0, NULL, NULL, '2022-05-24 22:32:33', '2022-06-20 05:10:14', NULL, NULL, NULL, NULL),
(3, 'kazal', NULL, 'kazal@gmail.com', NULL, '01363333412', '$2y$10$fEt5i4g3hzhFlMhAMV/preypehZMwFdRbBcaVHp1zd70G.rx4.r9S', NULL, 1, NULL, NULL, '2022-06-20 05:23:22', '2022-06-21 01:25:43', NULL, NULL, NULL, NULL),
(11, 'Nita Oneal', NULL, 'wuker@mailinator.com', NULL, '01346354357', '$2y$10$xGjbRgH8dUFtHmNaQrPNf.BkO67B/o36dZzLYBkauvU8NT0xFAIcm', '20220804_1659595294.jpg', 1, NULL, NULL, '2022-08-04 00:38:36', '2022-08-04 00:43:37', 5354657, 'Perspiciatis evenie', 'Totam officia ad qui', 'Quis mollitia qui au');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `user_id`, `role_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2022-05-24 22:32:33', NULL),
(2, 2, 2, NULL, '2022-06-20 05:05:28', '2022-06-20 05:05:28'),
(3, 3, 2, NULL, '2022-06-20 05:23:22', '2022-06-21 01:36:02'),
(11, 11, 1, NULL, '2022-08-04 00:38:36', '2022-08-04 00:43:37');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
