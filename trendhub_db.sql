-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2023 at 12:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trendhub_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_admin`
--

CREATE TABLE `m_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_brands`
--

CREATE TABLE `m_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(128) DEFAULT NULL,
  `del_flg` tinyint(4) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_categories`
--

CREATE TABLE `m_categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(128) DEFAULT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_customers`
--

CREATE TABLE `m_customers` (
  `id` int(11) NOT NULL,
  `c_name` varchar(128) NOT NULL,
  `c_email` varchar(128) NOT NULL,
  `c_phone` varchar(128) NOT NULL,
  `c_password` varchar(256) NOT NULL,
  `region_id` int(11) NOT NULL,
  `township_id` int(11) NOT NULL,
  `c_address` varchar(256) NOT NULL,
  `c_profile` varchar(256) DEFAULT NULL,
  `c_points` int(11) NOT NULL DEFAULT 5,
  `wishlist_id` int(11) DEFAULT NULL,
  `token` varchar(128) NOT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `def_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_customers`
--

INSERT INTO `m_customers` (`id`, `c_name`, `c_email`, `c_phone`, `c_password`, `region_id`, `township_id`, `c_address`, `c_profile`, `c_points`, `wishlist_id`, `token`, `verify`, `def_flg`, `create_date`, `update_date`) VALUES
(9, 'mgmg', '9.bluelake@gmail.com', '123', '$2y$10$TZQpCwbzzulEmQ9axIhRmu028lsIbmnXN7WzazuKIzUdRUTQm0CRG', 1, 2, 'abc', NULL, 5, NULL, '7586wJCLa9D1d3U4IoPdJDDjEdeO6arzevy7knu2rpHk71jN6zZIU6Pp4ISs94lcVoFBGPLPZO5QnskdMt9zi8IHmua6voHDXdkWGLBNAAqNIZ52Jdvct0NE9A7Ekt68', 1, 0, '2023-07-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_marchents`
--

CREATE TABLE `m_marchents` (
  `id` int(11) NOT NULL,
  `m_name` varchar(128) NOT NULL,
  `m_bname` varchar(128) NOT NULL,
  `m_email` varchar(128) NOT NULL,
  `m_phone` varchar(128) NOT NULL,
  `m_password` varchar(256) NOT NULL,
  `m_licene` varchar(128) NOT NULL,
  `m_logo` varchar(256) NOT NULL,
  `m_address` varchar(256) NOT NULL,
  `del_flg` tinyint(11) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_months`
--

CREATE TABLE `m_months` (
  `id` int(11) NOT NULL,
  `month` varchar(128) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_products`
--

CREATE TABLE `m_products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_description` varchar(256) NOT NULL,
  `p_detail` varchar(256) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell_price` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `merchant_id` int(11) NOT NULL,
  `p_discount` int(11) DEFAULT NULL,
  `review_id` int(11) DEFAULT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_regions`
--

CREATE TABLE `m_regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_regions`
--

INSERT INTO `m_regions` (`id`, `name`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 'Kachin State', 0, NULL, NULL),
(2, 'Kayah State', 0, NULL, NULL),
(3, 'Kayin State', 0, NULL, NULL),
(4, 'Chin State', 0, NULL, NULL),
(5, 'Sagaing Region', 0, NULL, NULL),
(6, 'Tanintharyi Region', 0, NULL, NULL),
(7, 'Bago Region', 0, NULL, NULL),
(8, 'Mon State', 0, NULL, NULL),
(9, 'Magway Region', 0, NULL, NULL),
(10, 'Mandalay Region', 0, NULL, NULL),
(11, 'Shan State', 0, NULL, NULL),
(12, 'Yangon Region', 0, NULL, NULL),
(13, 'Rakhine State', 0, NULL, NULL),
(14, 'Ayeyarwady Region', 0, NULL, NULL),
(15, 'Naypyidaw Union Territory', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_temp_products`
--

CREATE TABLE `m_temp_products` (
  `id` int(11) NOT NULL,
  `product_submit_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `m_townships`
--

CREATE TABLE `m_townships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `region_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `m_townships`
--

INSERT INTO `m_townships` (`id`, `region_id`, `name`, `del_flg`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bhamo', 0, NULL, NULL),
(2, 1, 'Dotphoneyan', 0, NULL, NULL),
(3, 1, 'Lwegel', 0, NULL, NULL),
(4, 1, 'Mansi', 0, NULL, NULL),
(5, 1, 'Momauk', 0, NULL, NULL),
(6, 1, 'Myohla', 0, NULL, NULL),
(7, 1, 'Shwegu', 0, NULL, NULL),
(8, 1, 'Hopin', 0, NULL, NULL),
(9, 1, 'Hpakant', 0, NULL, NULL),
(10, 1, 'Kamine', 0, NULL, NULL),
(11, 1, 'Mogaung', 0, NULL, NULL),
(12, 1, 'Mohnyin', 0, NULL, NULL),
(13, 1, 'Chipwi', 0, NULL, NULL),
(14, 1, 'Hsadone', 0, NULL, NULL),
(15, 1, 'Hsawlaw', 0, NULL, NULL),
(16, 1, 'Hsinbo', 0, NULL, NULL),
(17, 1, 'Injangyang', 0, NULL, NULL),
(18, 1, 'Kanpaikti', 0, NULL, NULL),
(19, 1, 'Myitkyina', 0, NULL, NULL),
(20, 1, 'Panwa', 0, NULL, NULL),
(21, 1, 'Shinbwayyan', 0, NULL, NULL),
(22, 1, 'Tanai', 0, NULL, NULL),
(23, 1, 'Waingmaw', 0, NULL, NULL),
(24, 1, 'Kawnglanghpu', 0, NULL, NULL),
(25, 1, 'Machanbaw', 0, NULL, NULL),
(26, 1, 'Nogmung', 0, NULL, NULL),
(27, 1, 'Pannandin', 0, NULL, NULL),
(28, 1, 'Putao', 0, NULL, NULL),
(29, 1, 'Sumprabum', 0, NULL, NULL),
(30, 2, 'Bawlakhe', 0, NULL, NULL),
(31, 2, 'Hpasawng', 0, NULL, NULL),
(32, 2, 'Mese', 0, NULL, NULL),
(33, 2, 'Ywathit', 0, NULL, NULL),
(34, 2, 'Demoso', 0, NULL, NULL),
(35, 2, 'Hpruso', 0, NULL, NULL),
(36, 2, 'Loikaw', 0, NULL, NULL),
(37, 2, 'Shadaw', 0, NULL, NULL),
(38, 3, 'Bawgali', 0, NULL, NULL),
(39, 3, 'Hlaignbwe', 0, NULL, NULL),
(40, 3, 'Hpa-an', 0, NULL, NULL),
(41, 3, 'Leiktho', 0, NULL, NULL),
(42, 3, 'Paingkyon', 0, NULL, NULL),
(43, 3, 'Shan Ywathit', 0, NULL, NULL),
(44, 3, 'Thandaunggyi', 0, NULL, NULL),
(45, 3, 'Hpapun', 0, NULL, NULL),
(46, 3, 'Kamamaung', 0, NULL, NULL),
(47, 3, 'Kawkareik', 0, NULL, NULL),
(48, 3, 'Kyaidon', 0, NULL, NULL),
(49, 3, 'Kyain Seikgyi', 0, NULL, NULL),
(50, 3, 'Payarthonezu', 0, NULL, NULL),
(51, 3, 'Myawaddy', 0, NULL, NULL),
(52, 3, 'Sugali', 0, NULL, NULL),
(53, 3, 'Wawlaymyaing', 0, NULL, NULL),
(54, 4, 'Cikha', 0, NULL, NULL),
(55, 4, 'Falam', 0, NULL, NULL),
(56, 4, 'Rikhuadal', 0, NULL, NULL),
(57, 4, 'Tiddim', 0, NULL, NULL),
(58, 4, 'Ton Zang', 0, NULL, NULL),
(59, 4, 'Hakha', 0, NULL, NULL),
(60, 4, 'Htantlang', 0, NULL, NULL),
(61, 4, 'Kanpetle', 0, NULL, NULL),
(62, 4, 'Matupi', 0, NULL, NULL),
(63, 4, 'Mindat', 0, NULL, NULL),
(64, 4, 'Paletwa', 0, NULL, NULL),
(65, 4, 'Reazu', 0, NULL, NULL),
(66, 4, 'Sami', 0, NULL, NULL),
(67, 5, 'Donhee', 0, NULL, NULL),
(68, 5, 'Hkamti', 0, NULL, NULL),
(69, 5, 'Homalin', 0, NULL, NULL),
(70, 5, 'Htanparkway', 0, NULL, NULL),
(71, 5, 'Lahe', 0, NULL, NULL),
(72, 5, 'Leshi Township (Lay)', 0, NULL, NULL),
(73, 5, 'Mobaingluk', 0, NULL, NULL),
(74, 5, 'Nanyun', 0, NULL, NULL),
(75, 5, 'Pansaung', 0, NULL, NULL),
(76, 5, 'Sonemara', 0, NULL, NULL),
(77, 5, 'Kanbalu', 0, NULL, NULL),
(78, 5, 'Kyunhla', 0, NULL, NULL),
(79, 5, 'Taze', 0, NULL, NULL),
(80, 5, 'Ye-U', 0, NULL, NULL),
(81, 5, 'Kale', 0, NULL, NULL),
(82, 5, 'Kalewa', 0, NULL, NULL),
(83, 5, 'Mingin', 0, NULL, NULL),
(84, 5, 'Banmauk', 0, NULL, NULL),
(85, 5, 'Indaw', 0, NULL, NULL),
(86, 5, 'Katha', 0, NULL, NULL),
(87, 5, 'Kawlin', 0, NULL, NULL),
(88, 5, 'Pinlebu', 0, NULL, NULL),
(89, 5, 'Tigyaing', 0, NULL, NULL),
(90, 5, 'Wuntho', 0, NULL, NULL),
(91, 5, 'Mawlaik', 0, NULL, NULL),
(92, 5, 'Paungbyin', 0, NULL, NULL),
(93, 5, 'Ayadaw', 0, NULL, NULL),
(94, 5, 'Budalin', 0, NULL, NULL),
(95, 5, 'Chaung-U', 0, NULL, NULL),
(96, 5, 'Monywa', 0, NULL, NULL),
(97, 5, 'Myaung', 0, NULL, NULL),
(98, 5, 'Myinmu', 0, NULL, NULL),
(99, 5, 'Sagaing', 0, NULL, NULL),
(100, 5, 'Khin-U', 0, NULL, NULL),
(101, 5, 'Kyaukmyaung', 0, NULL, NULL),
(102, 5, 'Shwebo', 0, NULL, NULL),
(103, 5, 'Tabayin', 0, NULL, NULL),
(104, 5, 'Wetlet', 0, NULL, NULL),
(105, 5, 'Khampat', 0, NULL, NULL),
(106, 5, 'Myothit', 0, NULL, NULL),
(107, 5, 'Tamu', 0, NULL, NULL),
(108, 5, 'Kani', 0, NULL, NULL),
(109, 5, 'Pale', 0, NULL, NULL),
(110, 5, 'Salingyi', 0, NULL, NULL),
(111, 5, 'Yinmabin', 0, NULL, NULL),
(112, 6, 'Dawei', 0, NULL, NULL),
(113, 6, 'Kaleinaung', 0, NULL, NULL),
(114, 6, 'Launglon', 0, NULL, NULL),
(115, 6, 'Myitta', 0, NULL, NULL),
(116, 6, 'Thayetchaung', 0, NULL, NULL),
(117, 6, 'Yebyu', 0, NULL, NULL),
(118, 6, 'Bokpyin', 0, NULL, NULL),
(119, 6, 'Karathuri', 0, NULL, NULL),
(120, 6, 'Kawthoung', 0, NULL, NULL),
(121, 6, 'Khamaukgyi', 0, NULL, NULL),
(122, 6, 'Pyigyimandaing', 0, NULL, NULL),
(123, 6, 'Kyunsu', 0, NULL, NULL),
(124, 6, 'Myeik', 0, NULL, NULL),
(125, 6, 'Palauk', 0, NULL, NULL),
(126, 6, 'Palaw', 0, NULL, NULL),
(127, 6, 'Tanintharyi', 0, NULL, NULL),
(128, 7, 'Aungmyin', 0, NULL, NULL),
(129, 7, 'Bago', 0, NULL, NULL),
(130, 7, 'Daik-U', 0, NULL, NULL),
(131, 7, 'Hpayargyi', 0, NULL, NULL),
(132, 7, 'Intagaw', 0, NULL, NULL),
(133, 7, 'Kawa', 0, NULL, NULL),
(134, 7, 'Kyauktaga', 0, NULL, NULL),
(135, 7, 'Madauk', 0, NULL, NULL),
(136, 7, 'Nyaunglebin', 0, NULL, NULL),
(137, 7, 'Peinzalot', 0, NULL, NULL),
(138, 7, 'Penwegon', 0, NULL, NULL),
(139, 7, 'Pyuntaza', 0, NULL, NULL),
(140, 7, 'Shwegyin', 0, NULL, NULL),
(141, 7, 'Thanatpin', 0, NULL, NULL),
(142, 7, 'Waw', 0, NULL, NULL),
(143, 7, 'Kanyutkwin', 0, NULL, NULL),
(144, 7, 'Kaytumadi', 0, NULL, NULL),
(145, 7, 'Kyaukkyi', 0, NULL, NULL),
(146, 7, 'Kywebwe', 0, NULL, NULL),
(147, 7, 'Mone', 0, NULL, NULL),
(148, 7, 'Myohla', 0, NULL, NULL),
(149, 7, 'Natthangwin', 0, NULL, NULL),
(150, 7, 'Nyaungbinthar', 0, NULL, NULL),
(151, 7, 'Oktwin', 0, NULL, NULL),
(152, 7, 'Pyu', 0, NULL, NULL),
(153, 7, 'Swa', 0, NULL, NULL),
(154, 7, 'Tantabin', 0, NULL, NULL),
(155, 7, 'Taungoo', 0, NULL, NULL),
(156, 7, 'Thagara', 0, NULL, NULL),
(157, 7, 'Yaeni', 0, NULL, NULL),
(158, 7, 'Yedashe', 0, NULL, NULL),
(159, 7, 'Innma', 0, NULL, NULL),
(160, 7, 'Okshipin', 0, NULL, NULL),
(161, 7, 'Padaung', 0, NULL, NULL),
(162, 7, 'Padigone', 0, NULL, NULL),
(163, 7, 'Paukkaung', 0, NULL, NULL),
(164, 7, 'Paungdale', 0, NULL, NULL),
(165, 7, 'Paungde', 0, NULL, NULL),
(166, 7, 'Pyay', 0, NULL, NULL),
(167, 7, 'Shwedaung', 0, NULL, NULL),
(168, 7, 'Sinmeswe', 0, NULL, NULL),
(169, 7, 'Thegon', 0, NULL, NULL),
(170, 7, 'Gyobingauk', 0, NULL, NULL),
(171, 7, 'Letpadan', 0, NULL, NULL),
(172, 7, 'Minhla', 0, NULL, NULL),
(173, 7, 'Monyo', 0, NULL, NULL),
(174, 7, 'Nattalin', 0, NULL, NULL),
(175, 7, 'Okpho', 0, NULL, NULL),
(176, 7, 'Ooethegone', 0, NULL, NULL),
(177, 7, 'Sitkwin', 0, NULL, NULL),
(178, 7, 'Tapun', 0, NULL, NULL),
(179, 7, 'Tharrawaddy', 0, NULL, NULL),
(180, 7, 'Thonze', 0, NULL, NULL),
(181, 7, 'Zigon', 0, NULL, NULL),
(182, 8, 'Chaungzon', 0, NULL, NULL),
(183, 8, 'Khawzar', 0, NULL, NULL),
(184, 8, 'Kyaikkhami', 0, NULL, NULL),
(185, 8, 'Kyaikmaraw', 0, NULL, NULL),
(186, 8, 'Lamine', 0, NULL, NULL),
(187, 8, 'Mawlamyine', 0, NULL, NULL),
(188, 8, 'Mudon', 0, NULL, NULL),
(189, 8, 'Thanbyuzayat', 0, NULL, NULL),
(190, 8, 'Ye', 0, NULL, NULL),
(191, 8, 'Bilin', 0, NULL, NULL),
(192, 8, 'Kyaikto', 0, NULL, NULL),
(193, 8, 'Mottama', 0, NULL, NULL),
(194, 8, 'Paung', 0, NULL, NULL),
(195, 8, 'Suvannawadi', 0, NULL, NULL),
(196, 8, 'Thaton', 0, NULL, NULL),
(197, 8, 'Zingyeik', 0, NULL, NULL),
(198, 9, 'Gangaw', 0, NULL, NULL),
(199, 9, 'Kyaukhtu', 0, NULL, NULL),
(200, 9, 'Saw', 0, NULL, NULL),
(201, 9, 'Tilin', 0, NULL, NULL),
(202, 9, 'Chauck', 0, NULL, NULL),
(203, 9, 'Magway', 0, NULL, NULL),
(204, 9, 'Myothit', 0, NULL, NULL),
(205, 9, 'Natmauk', 0, NULL, NULL),
(206, 9, 'Taungdwingyi', 0, NULL, NULL),
(207, 9, 'Yenangyaung', 0, NULL, NULL),
(208, 9, 'Minbu', 0, NULL, NULL),
(209, 9, 'Ngape', 0, NULL, NULL),
(210, 9, 'Pwintbyu', 0, NULL, NULL),
(211, 9, 'Salin', 0, NULL, NULL),
(212, 9, 'Sidoktaya', 0, NULL, NULL),
(213, 9, 'Myaing', 0, NULL, NULL),
(214, 9, 'Pakokku', 0, NULL, NULL),
(215, 9, 'Pauk', 0, NULL, NULL),
(216, 9, 'Seikphyu', 0, NULL, NULL),
(217, 9, 'Yesagyo', 0, NULL, NULL),
(218, 9, 'Aunglan', 0, NULL, NULL),
(219, 9, 'Kamma', 0, NULL, NULL),
(220, 9, 'Mindon', 0, NULL, NULL),
(221, 9, 'Minhla', 0, NULL, NULL),
(222, 9, 'Sinbaungwe', 0, NULL, NULL),
(223, 9, 'Thayet', 0, NULL, NULL),
(224, 10, 'Kyaukse', 0, NULL, NULL),
(225, 10, 'Myittha', 0, NULL, NULL),
(226, 10, 'Sintgaing', 0, NULL, NULL),
(227, 10, 'Tada-U', 0, NULL, NULL),
(228, 10, 'Amarapura', 0, NULL, NULL),
(229, 10, 'Aungmyethazan', 0, NULL, NULL),
(230, 10, 'Chanayethazan', 0, NULL, NULL),
(231, 10, 'Chanmyathazi', 0, NULL, NULL),
(232, 10, 'Mahaaungmye', 0, NULL, NULL),
(233, 10, 'Patheingyi', 0, NULL, NULL),
(234, 10, 'Pyigyidagun', 0, NULL, NULL),
(235, 10, 'Mahlaing', 0, NULL, NULL),
(236, 10, 'Meiktila', 0, NULL, NULL),
(237, 10, 'Thazi', 0, NULL, NULL),
(238, 10, 'Wundwin', 0, NULL, NULL),
(239, 10, 'Myingyan', 0, NULL, NULL),
(240, 10, 'Natogyi', 0, NULL, NULL),
(241, 10, 'Nganzun', 0, NULL, NULL),
(242, 10, 'Thaungtha', 0, NULL, NULL),
(243, 10, 'Kyaukpadaung', 0, NULL, NULL),
(244, 10, 'Ngathayauk', 0, NULL, NULL),
(245, 10, 'Nyaung-U', 0, NULL, NULL),
(246, 10, 'Madaya', 0, NULL, NULL),
(247, 10, 'Mogok', 0, NULL, NULL),
(248, 10, 'Pyinoolwin', 0, NULL, NULL),
(249, 10, 'Singu', 0, NULL, NULL),
(250, 10, 'Tagaung', 0, NULL, NULL),
(251, 10, 'Thabeikkyin', 0, NULL, NULL),
(252, 10, 'Pyawbwe', 0, NULL, NULL),
(253, 10, 'Yamethin', 0, NULL, NULL),
(254, 11, 'Kengtung', 0, NULL, NULL),
(255, 11, 'Mine Pauk', 0, NULL, NULL),
(256, 11, 'Minelar', 0, NULL, NULL),
(257, 11, 'Mong Khet', 0, NULL, NULL),
(258, 11, 'Mong La', 0, NULL, NULL),
(259, 11, 'Mong Yang', 0, NULL, NULL),
(260, 11, 'Mineyu', 0, NULL, NULL),
(261, 11, 'Mong Hpayak', 0, NULL, NULL),
(262, 11, 'Mong Yawng', 0, NULL, NULL),
(263, 11, 'Minekoke', 0, NULL, NULL),
(264, 11, 'Monehta', 0, NULL, NULL),
(265, 11, 'Mong Hsat', 0, NULL, NULL),
(266, 11, 'Mong Ping', 0, NULL, NULL),
(267, 11, 'Mong Tong', 0, NULL, NULL),
(268, 11, 'Ponparkyin', 0, NULL, NULL),
(269, 11, 'Tontar', 0, NULL, NULL),
(270, 11, 'Kyaing Lap', 0, NULL, NULL),
(271, 11, 'Tachileik', 0, NULL, NULL),
(272, 11, 'Talay', 0, NULL, NULL),
(273, 11, 'Kunlong', 0, NULL, NULL),
(274, 11, 'Hsipaw', 0, NULL, NULL),
(275, 11, 'Kyaukme', 0, NULL, NULL),
(276, 11, 'Mantong', 0, NULL, NULL),
(277, 11, 'Minelon', 0, NULL, NULL),
(278, 11, 'Minengaw', 0, NULL, NULL),
(279, 11, 'Namhsan', 0, NULL, NULL),
(280, 11, 'Namtu', 0, NULL, NULL),
(281, 11, 'Nawnghkio', 0, NULL, NULL),
(282, 11, 'Hsenwi', 0, NULL, NULL),
(283, 11, 'Lashio', 0, NULL, NULL),
(284, 11, 'Mongyai', 0, NULL, NULL),
(285, 11, 'Tangyan', 0, NULL, NULL),
(286, 11, 'Chinshwehaw', 0, NULL, NULL),
(287, 11, 'Konkyan', 0, NULL, NULL),
(288, 11, 'Laukkaing', 0, NULL, NULL),
(289, 11, 'Mawhtike', 0, NULL, NULL),
(290, 11, 'Kutkai', 0, NULL, NULL),
(291, 11, 'Manhero', 0, NULL, NULL),
(292, 11, 'Monekoe', 0, NULL, NULL),
(293, 11, 'Mu Se', 0, NULL, NULL),
(294, 11, 'Namhkam', 0, NULL, NULL),
(295, 11, 'Pansai', 0, NULL, NULL),
(296, 11, 'Tamoenye', 0, NULL, NULL),
(297, 11, 'Hopang', 0, NULL, NULL),
(298, 11, 'Mongmao', 0, NULL, NULL),
(299, 11, 'Namtit', 0, NULL, NULL),
(300, 11, 'Pangwaun', 0, NULL, NULL),
(301, 11, 'Panlong', 0, NULL, NULL),
(302, 11, 'Man Kan', 0, NULL, NULL),
(303, 11, 'Matman', 0, NULL, NULL),
(304, 11, 'Namphan', 0, NULL, NULL),
(305, 11, 'Pangsang Township (Pan', 0, NULL, NULL),
(306, 11, 'Mabein', 0, NULL, NULL),
(307, 11, 'Mongmit', 0, NULL, NULL),
(308, 11, 'Homane', 0, NULL, NULL),
(309, 11, 'Kengtaung', 0, NULL, NULL),
(310, 11, 'Langkho', 0, NULL, NULL),
(311, 11, 'Mawkmai', 0, NULL, NULL),
(312, 11, 'Mong Nai', 0, NULL, NULL),
(313, 11, 'Mong Pan', 0, NULL, NULL),
(314, 11, 'Karli', 0, NULL, NULL),
(315, 11, 'Kholan', 0, NULL, NULL),
(316, 11, 'Kunhing', 0, NULL, NULL),
(317, 11, 'Kyethi', 0, NULL, NULL),
(318, 11, 'Lai-Hka', 0, NULL, NULL),
(319, 11, 'Loilen', 0, NULL, NULL),
(320, 11, 'Minenaung', 0, NULL, NULL),
(321, 11, 'Minesan', 0, NULL, NULL),
(322, 11, 'Mong Hsu', 0, NULL, NULL),
(323, 11, 'Mong Kung', 0, NULL, NULL),
(324, 11, 'Nansang', 0, NULL, NULL),
(325, 11, 'Panglong', 0, NULL, NULL),
(326, 11, 'Hopong', 0, NULL, NULL),
(327, 11, 'Hsi Hseng', 0, NULL, NULL),
(328, 11, 'Indaw', 0, NULL, NULL),
(329, 11, 'Kalaw', 0, NULL, NULL),
(330, 11, 'Kyauktalongyi', 0, NULL, NULL),
(331, 11, 'Lawksawk', 0, NULL, NULL),
(332, 11, 'Naungtayar', 0, NULL, NULL),
(333, 11, 'Nyaungshwe', 0, NULL, NULL),
(334, 11, 'Pekon', 0, NULL, NULL),
(335, 11, 'Pingdaya', 0, NULL, NULL),
(336, 11, 'Pinlaung', 0, NULL, NULL),
(337, 11, 'Taunggyi', 0, NULL, NULL),
(338, 11, 'Ywangan', 0, NULL, NULL),
(339, 12, 'Botataung', 0, NULL, NULL),
(340, 12, 'City', 0, NULL, NULL),
(341, 12, 'Dagon Seikkan', 0, NULL, NULL),
(342, 12, 'Dawbon', 0, NULL, NULL),
(343, 12, 'East Dagon', 0, NULL, NULL),
(344, 12, 'Mingala Taungnyunt', 0, NULL, NULL),
(345, 12, 'North Dagon', 0, NULL, NULL),
(346, 12, 'North Okkalapa', 0, NULL, NULL),
(347, 12, 'Pazundaung', 0, NULL, NULL),
(348, 12, 'South Dagon', 0, NULL, NULL),
(349, 12, 'South Okkalapa', 0, NULL, NULL),
(350, 12, 'Tamwe', 0, NULL, NULL),
(351, 12, 'Thaketa', 0, NULL, NULL),
(352, 12, 'Thingangyun', 0, NULL, NULL),
(353, 12, 'Yankin', 0, NULL, NULL),
(354, 12, 'City', 0, NULL, NULL),
(355, 12, 'Hlaingthaya', 0, NULL, NULL),
(356, 12, 'Hlegu', 0, NULL, NULL),
(357, 12, 'Hmawbi', 0, NULL, NULL),
(358, 12, 'Htantabin', 0, NULL, NULL),
(359, 12, 'Insein', 0, NULL, NULL),
(360, 12, 'Mingaladon', 0, NULL, NULL),
(361, 12, 'Rural', 0, NULL, NULL),
(362, 12, 'Shwepyitha', 0, NULL, NULL),
(363, 12, 'Taikkyi', 0, NULL, NULL),
(364, 12, 'City', 0, NULL, NULL),
(365, 12, 'Cocokyun', 0, NULL, NULL),
(366, 12, 'Dala', 0, NULL, NULL),
(367, 12, 'Kawhmu', 0, NULL, NULL),
(368, 12, 'Kayan', 0, NULL, NULL),
(369, 12, 'Kungyangon', 0, NULL, NULL),
(370, 12, 'Rural', 0, NULL, NULL),
(371, 12, 'Seikkyi Kanaungto', 0, NULL, NULL),
(372, 12, 'Tada', 0, NULL, NULL),
(373, 12, 'Thanlyin', 0, NULL, NULL),
(374, 12, 'Thongwa', 0, NULL, NULL),
(375, 12, 'Twante', 0, NULL, NULL),
(376, 12, 'Ahlon', 0, NULL, NULL),
(377, 12, 'Bahan', 0, NULL, NULL),
(378, 12, 'City', 0, NULL, NULL),
(379, 12, 'Dagon', 0, NULL, NULL),
(380, 12, 'Hlaing', 0, NULL, NULL),
(381, 12, 'Kamayut', 0, NULL, NULL),
(382, 12, 'Kyauktada', 0, NULL, NULL),
(383, 12, 'Kyimyindaing', 0, NULL, NULL),
(384, 12, 'Lanmadaw', 0, NULL, NULL),
(385, 12, 'Latha', 0, NULL, NULL),
(386, 12, 'Mayangon', 0, NULL, NULL),
(387, 12, 'Pabedan', 0, NULL, NULL),
(388, 12, 'Sanchaung', 0, NULL, NULL),
(389, 12, 'Seikkan', 0, NULL, NULL),
(390, 13, 'Ann', 0, NULL, NULL),
(391, 13, 'Kyaukpyu', 0, NULL, NULL),
(392, 13, 'Manaung', 0, NULL, NULL),
(393, 13, 'Ramree', 0, NULL, NULL),
(394, 13, 'Buthidaung', 0, NULL, NULL),
(395, 13, 'Maungdaw', 0, NULL, NULL),
(396, 13, 'Taungpyoletwe', 0, NULL, NULL),
(397, 13, 'Pauktaw', 0, NULL, NULL),
(398, 13, 'Ponnagyun', 0, NULL, NULL),
(399, 13, 'Rathedaung', 0, NULL, NULL),
(400, 13, 'Sittwe', 0, NULL, NULL),
(401, 13, 'Gaw', 0, NULL, NULL),
(402, 13, 'Kyeintali', 0, NULL, NULL),
(403, 13, 'Maei', 0, NULL, NULL),
(404, 13, 'Thandwe', 0, NULL, NULL),
(405, 13, 'Toungup', 0, NULL, NULL),
(406, 13, 'Kyauktaw', 0, NULL, NULL),
(407, 13, 'Minbya', 0, NULL, NULL),
(408, 13, 'Mrauk-U', 0, NULL, NULL),
(409, 13, 'Myebon', 0, NULL, NULL),
(410, 14, 'Hinthada', 0, NULL, NULL),
(411, 14, 'Ingapu', 0, NULL, NULL),
(412, 14, 'Kyangin', 0, NULL, NULL),
(413, 14, 'Lemyethna', 0, NULL, NULL),
(414, 14, 'Myanaung', 0, NULL, NULL),
(415, 14, 'Zalun', 0, NULL, NULL),
(416, 14, 'Labutta', 0, NULL, NULL),
(417, 14, 'Mawlamyinegyun', 0, NULL, NULL),
(418, 14, 'Pyinsalu', 0, NULL, NULL),
(419, 14, 'Danuphyu', 0, NULL, NULL),
(420, 14, 'Ma-ubin', 0, NULL, NULL),
(421, 14, 'Nyaungdon', 0, NULL, NULL),
(422, 14, 'Pantanaw', 0, NULL, NULL),
(423, 14, 'Einme', 0, NULL, NULL),
(424, 14, 'Myaungmya', 0, NULL, NULL),
(425, 14, 'Wakema', 0, NULL, NULL),
(426, 14, 'Hainggyikyun', 0, NULL, NULL),
(427, 14, 'Kangyidaunk', 0, NULL, NULL),
(428, 14, 'Kyaunggon', 0, NULL, NULL),
(429, 14, 'Kyonpyaw', 0, NULL, NULL),
(430, 14, 'Ngapudaw', 0, NULL, NULL),
(431, 14, 'Ngathaingchaung', 0, NULL, NULL),
(432, 14, 'Ngayokaung', 0, NULL, NULL),
(433, 14, 'Ngwehsaung', 0, NULL, NULL),
(434, 14, 'Pathein', 0, NULL, NULL),
(435, 14, 'Shwethaungyan', 0, NULL, NULL),
(436, 14, 'Thabaung', 0, NULL, NULL),
(437, 14, 'Yekyi', 0, NULL, NULL),
(438, 14, 'Ahmar', 0, NULL, NULL),
(439, 14, 'Bogale', 0, NULL, NULL),
(440, 14, 'Dedaye', 0, NULL, NULL),
(441, 14, 'Kyaiklat', 0, NULL, NULL),
(442, 14, 'Pyapon', 0, NULL, NULL),
(443, 15, 'Dekkhinathiri', 0, NULL, NULL),
(444, 15, 'Lewe', 0, NULL, NULL),
(445, 15, 'Pyinmana', 0, NULL, NULL),
(446, 15, 'Zabuthiri', 0, NULL, NULL),
(447, 15, 'Ottarathiri', 0, NULL, NULL),
(448, 15, 'Pobbathiri', 0, NULL, NULL),
(449, 15, 'Tatkon', 0, NULL, NULL),
(450, 15, 'Zeyarthiri', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_contact_customers`
--

CREATE TABLE `t_contact_customers` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `msg_text` varchar(256) NOT NULL,
  `reply_text` varchar(256) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_contact_merchants`
--

CREATE TABLE `t_contact_merchants` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `msg_text` varchar(256) NOT NULL,
  `reply_text` varchar(256) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_monthly_merchant_payments`
--

CREATE TABLE `t_monthly_merchant_payments` (
  `id` int(11) NOT NULL,
  `month_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_notify_to_merchant`
--

CREATE TABLE `t_notify_to_merchant` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_orders`
--

CREATE TABLE `t_orders` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(128) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `township_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `order_status` tinyint(4) NOT NULL DEFAULT 0,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_order_details`
--

CREATE TABLE `t_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_payment_method`
--

CREATE TABLE `t_payment_method` (
  `id` int(11) NOT NULL,
  `payment_method` varchar(128) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_submits`
--

CREATE TABLE `t_product_submits` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_product_submit_details`
--

CREATE TABLE `t_product_submit_details` (
  `id` int(11) NOT NULL,
  `product_submit_id` int(11) NOT NULL,
  `p_photo` varchar(256) NOT NULL,
  `p_name` varchar(128) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_description` varchar(256) NOT NULL,
  `p_detail` varchar(256) NOT NULL,
  `buy_price` int(11) NOT NULL,
  `sell-price` int(11) NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  `merchant_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_review`
--

CREATE TABLE `t_review` (
  `id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_review_details`
--

CREATE TABLE `t_review_details` (
  `id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `review_text` varchar(256) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `reply_text` varchar(256) DEFAULT NULL,
  `review_photo` varchar(256) DEFAULT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_wishlists`
--

CREATE TABLE `t_wishlists` (
  `id` int(11) NOT NULL,
  `del_flg` int(11) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `t_wishlist_details`
--

CREATE TABLE `t_wishlist_details` (
  `id` int(11) NOT NULL,
  `wishlist_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `del_flg` tinyint(4) NOT NULL DEFAULT 0,
  `create_date` date NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ui_setting`
--

CREATE TABLE `ui_setting` (
  `id` int(11) NOT NULL,
  `logo` varchar(256) DEFAULT NULL,
  `primary_color` varchar(128) DEFAULT NULL,
  `secondary_color` varchar(128) DEFAULT NULL,
  `tertiary_color` varchar(256) DEFAULT NULL,
  `price_text_color` varchar(256) DEFAULT NULL,
  `nav_text_color` varchar(256) DEFAULT NULL,
  `title_color` varchar(256) DEFAULT NULL,
  `price_card_color` varchar(256) DEFAULT NULL,
  `h1_color` varchar(256) DEFAULT NULL,
  `h2_color` varchar(256) DEFAULT NULL,
  `buy_button_color` varchar(256) DEFAULT NULL,
  `banner1` varchar(128) DEFAULT NULL,
  `banner2` varchar(128) DEFAULT NULL,
  `banner3` varchar(128) DEFAULT NULL,
  `banner4` varchar(128) DEFAULT NULL,
  `banner5` varchar(128) DEFAULT NULL,
  `money_amout` int(11) DEFAULT NULL,
  `point_amount` int(11) DEFAULT NULL,
  `image_silder1` varchar(256) DEFAULT NULL,
  `image_silder2` varchar(256) DEFAULT NULL,
  `image_silder3` varchar(256) DEFAULT NULL,
  `image_silder_title1` varchar(256) DEFAULT NULL,
  `image_silder_title2` varchar(256) DEFAULT NULL,
  `image_silder_title3` varchar(256) DEFAULT NULL,
  `image_silder_dsc1` varchar(256) DEFAULT NULL,
  `image_silder_dsc2` varchar(256) DEFAULT NULL,
  `image_silder_dsc3` varchar(256) DEFAULT NULL,
  `question1` varchar(256) DEFAULT NULL,
  `question2` varchar(256) DEFAULT NULL,
  `question3` varchar(256) DEFAULT NULL,
  `answer1` varchar(256) DEFAULT NULL,
  `answer2` varchar(256) DEFAULT NULL,
  `answer3` varchar(256) DEFAULT NULL,
  `terms` varchar(1080) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT 0,
  `create_date` text NOT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_admin`
--
ALTER TABLE `m_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_brands`
--
ALTER TABLE `m_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_categories`
--
ALTER TABLE `m_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_customers`
--
ALTER TABLE `m_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_marchents`
--
ALTER TABLE `m_marchents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_months`
--
ALTER TABLE `m_months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_regions`
--
ALTER TABLE `m_regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_temp_products`
--
ALTER TABLE `m_temp_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_townships`
--
ALTER TABLE `m_townships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_townships_region_id_foreign` (`region_id`);

--
-- Indexes for table `t_contact_customers`
--
ALTER TABLE `t_contact_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_contact_merchants`
--
ALTER TABLE `t_contact_merchants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_monthly_merchant_payments`
--
ALTER TABLE `t_monthly_merchant_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_notify_to_merchant`
--
ALTER TABLE `t_notify_to_merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_orders`
--
ALTER TABLE `t_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_order_details`
--
ALTER TABLE `t_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_payment_method`
--
ALTER TABLE `t_payment_method`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_submits`
--
ALTER TABLE `t_product_submits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_product_submit_details`
--
ALTER TABLE `t_product_submit_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_review`
--
ALTER TABLE `t_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_review_details`
--
ALTER TABLE `t_review_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_wishlists`
--
ALTER TABLE `t_wishlists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_wishlist_details`
--
ALTER TABLE `t_wishlist_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ui_setting`
--
ALTER TABLE `ui_setting`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_admin`
--
ALTER TABLE `m_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_brands`
--
ALTER TABLE `m_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_categories`
--
ALTER TABLE `m_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_customers`
--
ALTER TABLE `m_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_marchents`
--
ALTER TABLE `m_marchents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_months`
--
ALTER TABLE `m_months`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_products`
--
ALTER TABLE `m_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_regions`
--
ALTER TABLE `m_regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_temp_products`
--
ALTER TABLE `m_temp_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_townships`
--
ALTER TABLE `m_townships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=451;

--
-- AUTO_INCREMENT for table `t_contact_customers`
--
ALTER TABLE `t_contact_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_contact_merchants`
--
ALTER TABLE `t_contact_merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_monthly_merchant_payments`
--
ALTER TABLE `t_monthly_merchant_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_notify_to_merchant`
--
ALTER TABLE `t_notify_to_merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_orders`
--
ALTER TABLE `t_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_order_details`
--
ALTER TABLE `t_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_payment_method`
--
ALTER TABLE `t_payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_submits`
--
ALTER TABLE `t_product_submits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_product_submit_details`
--
ALTER TABLE `t_product_submit_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_review`
--
ALTER TABLE `t_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_review_details`
--
ALTER TABLE `t_review_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_wishlists`
--
ALTER TABLE `t_wishlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_wishlist_details`
--
ALTER TABLE `t_wishlist_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ui_setting`
--
ALTER TABLE `ui_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_townships`
--
ALTER TABLE `m_townships`
  ADD CONSTRAINT `m_townships_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `m_regions` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
