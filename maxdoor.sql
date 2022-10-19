-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2022 at 11:16 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxdoor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `json_information` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_information`)),
  `is_super_admin` tinyint(1) NOT NULL DEFAULT 0,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `json_information`, `is_super_admin`, `status`, `remember_token`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Thắng Nguyễn', 'huuthangb2k50@gmail.com', '$2y$10$hiviWgTAQTUWqBfBmb8Ad.SLl35MewgFDxfYAgqKNVZNAfjm3QdXG', 2, NULL, 1, 'active', NULL, NULL, NULL, '2021-09-24 08:48:18', '2022-08-08 10:13:47'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$ne8b9f22P9tX.K2Wfsg1De8zcDs1qf/hWEgNugIwt539u9KW2Ze0u', 2, NULL, 0, 'active', NULL, NULL, NULL, '2022-07-08 11:13:53', '2022-09-26 03:53:29'),
(3, 'Editor', 'editor@gmail.com', '$2y$10$e.q8ZFu.2/WoXcm6QlX7C.EXVEGqP2M28ZW87DVY8rU7nWmN6zWS.', 1, NULL, 0, 'active', NULL, NULL, NULL, '2022-09-26 03:53:57', '2022-09-26 03:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
(4, '2021_09_21_090133_create_admins_table', 1),
(5, '2021_09_29_090019_create_tb_options_table', 1),
(6, '2021_09_29_090048_create_tb_logs_table', 1),
(7, '2021_09_29_090107_create_tb_admin_menus_table', 1),
(8, '2021_09_29_090214_create_tb_modules_table', 1),
(9, '2021_09_29_090233_create_tb_module_functions_table', 1),
(10, '2021_09_29_090301_create_tb_roles_table', 1),
(11, '2021_09_29_090402_create_tb_menus_table', 1),
(12, '2021_09_29_090455_create_tb_blocks_table', 1),
(13, '2021_09_29_090509_create_tb_block_contents_table', 1),
(14, '2021_09_29_090709_create_tb_cms_taxonomys_table', 1),
(15, '2021_09_29_090743_create_tb_cms_posts_table', 1),
(16, '2021_10_09_013236_create_tb_pages_table', 1),
(17, '2021_10_26_210129_change_tb_users_table', 1),
(24, '2022_04_25_163138_create_tb_widgets_table', 3),
(25, '2022_04_25_163922_create_tb_components_table', 3),
(26, '2022_04_26_155008_create_tb_widget_configs_table', 4),
(27, '2022_04_26_155035_create_tb_component_configs_table', 4),
(28, '2022_06_02_102255_create_tb_bookings_table', 5),
(29, '2022_02_14_165457_create_tb_contacts_table', 6),
(30, '2022_02_14_170033_create_tb_orders_table', 6),
(31, '2022_02_14_170056_create_tb_order_details_table', 6),
(32, '2022_06_27_162451_create_tb_popups_table', 7),
(33, '2022_06_29_095757_change_users_table', 8),
(35, '2022_07_07_144844_create_tb_affiliate_payments_table', 9),
(36, '2022_07_12_210520_create_tb_affiliate_historys_table', 10);

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
-- Table structure for table `tb_admin_menus`
--

CREATE TABLE `tb_admin_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `toolbar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_admin_menus`
--

INSERT INTO `tb_admin_menus` (`id`, `parent_id`, `name`, `icon`, `url_link`, `iorder`, `status`, `toolbar`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(3, 10, 'Quản lý người dùng', 'fa fa-user-plus', 'admins', 3, 'active', 'deactive', 1, 1, '2021-09-30 07:38:46', '2022-03-02 19:25:15'),
(5, 10, 'Quản lý nhóm quyền', 'fa fa-users', 'roles', 4, 'active', 'active', 1, 1, '2021-09-30 09:57:11', '2022-03-02 19:25:00'),
(6, 10, 'Quản lý Menu Admin', 'fa fa-tasks', 'admin_menus', 5, 'active', 'deactive', 1, 1, '2021-09-30 21:41:45', '2022-03-02 19:26:32'),
(7, 11, 'Khai báo Modules', 'fa fa-cubes', 'modules', 1, 'active', 'deactive', 1, 1, '2021-10-01 01:57:15', '2022-03-02 19:30:40'),
(9, 11, 'Khai báo Functions', 'fa fa-cube', 'module_functions', 2, 'active', 'deactive', 1, 1, '2021-10-01 16:11:00', '2022-03-02 19:30:50'),
(10, NULL, 'Quản lý hệ thống', 'fa fa-server', NULL, 99, 'active', 'deactive', 1, 1, '2021-10-01 17:10:06', '2022-03-02 19:35:52'),
(11, NULL, 'For Developers', 'fa fa-cogs', NULL, 100, 'active', 'deactive', 1, 1, '2021-10-01 18:29:40', '2022-03-02 19:35:57'),
(13, NULL, 'Quản lý cấu hình', 'fa fa-home', NULL, 98, 'active', 'deactive', 1, 1, '2021-10-02 10:26:41', '2022-03-02 19:35:45'),
(16, 11, 'Khai báo Blocks', 'fa fa-puzzle-piece', 'blocks', 999, 'active', 'deactive', 1, 1, '2021-10-06 16:45:28', '2022-03-02 19:32:08'),
(17, 71, 'Quản lý Khối nội dung', 'fa fa-object-group', 'block_contents', 999, 'active', 'deactive', 1, 1, '2021-10-07 09:08:48', '2022-08-06 08:30:21'),
(41, 71, 'Quản lý Pages - Trang', 'fa fa-clone', 'pages', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:15:57', '2022-08-06 08:30:18'),
(42, 71, 'Quản lý Menu Website', 'fa fa-bars', 'menus', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:19:53', '2022-08-06 08:30:15'),
(43, 11, 'Khai báo tham số hệ thống', 'fa fa-wrench', 'options', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:20:20', '2022-03-02 19:28:15'),
(44, 70, 'Quản lý hình ảnh hệ thống', 'fa fa-picture-o', 'web_image', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:03', '2022-08-06 08:29:09'),
(45, 70, 'Quản lý thông tin Website', 'fa fa-globe', 'web_information', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:28', '2022-08-06 08:29:06'),
(46, 70, 'Quản lý liên kết MXH', 'fa fa-share-alt-square', 'web_social', NULL, 'active', 'deactive', 1, 1, '2022-03-02 18:23:43', '2022-08-06 08:29:03'),
(51, NULL, 'Quản lý nội dung', 'fa fa-folder', NULL, 2, 'active', NULL, 1, 1, '2022-05-30 08:46:23', '2022-08-06 08:32:52'),
(52, 51, 'Quản lý danh mục - thể loại', NULL, 'cms_taxonomys', 1, 'active', NULL, 1, 1, '2022-05-30 08:46:51', '2022-05-30 08:46:51'),
(53, 51, 'Quản lý bài viết', NULL, 'cms_posts', 2, 'active', NULL, 1, 1, '2022-05-30 09:56:47', '2022-05-30 09:56:47'),
(54, 51, 'Quản lý dịch vụ', NULL, 'cms_services', 3, 'active', NULL, 1, 1, '2022-05-30 09:57:03', '2022-09-21 06:45:43'),
(58, 71, 'Quản lý mã nhúng CSS - JS', NULL, 'web_source', NULL, 'active', NULL, 1, 1, '2022-06-07 02:41:52', '2022-08-06 08:30:12'),
(59, 72, 'Quản lý liên hệ', NULL, 'contacts', 3, 'active', NULL, 1, 1, '2022-06-08 03:16:46', '2022-08-06 08:35:02'),
(61, 72, 'Quản lý đặt hàng', NULL, 'order_products', 1, 'active', NULL, 1, 1, '2022-06-09 04:49:20', '2022-09-21 06:45:23'),
(69, 51, 'Quản lý sản phẩm', NULL, 'cms_products', 4, 'active', NULL, 1, 1, '2022-08-05 08:37:24', '2022-09-21 06:46:07'),
(70, 13, 'Cấu hình thông tin chung', 'fa fa-bars', '#', 1, 'active', NULL, 1, 1, '2022-08-06 08:28:32', '2022-08-06 08:31:29'),
(71, 13, 'Cấu hình Website', 'fa fa-object-group', '#', 2, 'active', NULL, 1, 1, '2022-08-06 08:29:55', '2022-08-06 08:31:10'),
(72, NULL, 'Quản lý khách hàng', 'fa fa-opencart', '#', 1, 'active', NULL, 1, 1, '2022-08-06 08:32:30', '2022-08-06 08:34:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_affiliate_historys`
--

CREATE TABLE `tb_affiliate_historys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `order_id` bigint(20) DEFAULT NULL,
  `order_total_money` double(20,2) NOT NULL DEFAULT 0.00,
  `affiliate_percent` double(20,2) NOT NULL DEFAULT 0.00,
  `affiliate_point` double(20,2) DEFAULT NULL,
  `affiliate_money` double(20,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_affiliate_historys`
--

INSERT INTO `tb_affiliate_historys` (`id`, `is_type`, `user_id`, `order_id`, `order_total_money`, `affiliate_percent`, `affiliate_point`, `affiliate_money`, `description`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'product', 3, 9, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 17:51:21', '2022-07-12 18:52:58'),
(3, 'product', 2, 9, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:18:05', '2022-07-12 18:52:58'),
(4, 'service', 3, 14, 0.00, 3.00, 0.00, 0.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:53:27', '2022-07-12 18:53:27'),
(5, 'service', 2, 14, 0.00, 2.50, 0.00, 0.00, '', NULL, 'processed', NULL, NULL, '2022-07-12 18:53:27', '2022-07-12 18:53:27'),
(6, 'product', 3, 11, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-13 08:11:45', '2022-07-13 08:11:54'),
(7, 'product', 2, 11, 3500000000.00, 1.50, 52500000.00, 52500000.00, '', NULL, 'processed', NULL, NULL, '2022-07-13 08:11:45', '2022-07-13 08:11:54'),
(8, 'product', 3, 16, 5350000.00, 1.50, 80250.00, 80250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(9, 'product', 2, 16, 5350000.00, 1.50, 80250.00, 80250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(10, 'service', 3, 15, 450000.00, 3.00, 13500.00, 13500.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17'),
(11, 'service', 2, 15, 450000.00, 2.50, 11250.00, 11250.00, '', NULL, 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_affiliate_payments`
--

CREATE TABLE `tb_affiliate_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `money` double(20,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_affiliate_payments`
--

INSERT INTO `tb_affiliate_payments` (`id`, `user_id`, `money`, `description`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 3, 5000000.00, 'Số tài khoản: 1122335789\r\nChủ tài khoản: Nguyễn Hữu Thắng\r\nTên ngân hàng: Vietcombank Hà Tây', NULL, 'new', NULL, NULL, '2022-07-13 08:29:49', '2022-07-13 08:29:49'),
(2, 3, 15000000.00, 'Số tài khoản: 1122335789\r\nChủ tài khoản: Nguyễn Hữu Thắng\r\nTên ngân hàng: MB Bank', '{\"admin_note\":\"ThangNH \\u0111ang x\\u1eed l\\u00fd \\u0111\\u1ec1 ngh\\u1ecb thanh to\\u00e1n n\\u00e0y\"}', 'processing', NULL, 1, '2022-07-13 08:33:09', '2022-07-13 10:40:49'),
(3, 3, 50000.00, NULL, NULL, 'new', NULL, NULL, '2022-07-13 09:01:39', '2022-07-13 09:01:39'),
(4, 3, 5350000.00, NULL, '{\"admin_note\":\"Payment for orders by affiliate wallet\",\"order_id\":16}', 'processed', NULL, NULL, '2022-07-14 04:08:05', '2022-07-14 04:08:05'),
(5, 3, 450000.00, NULL, '{\"admin_note\":\"Payment for orders by affiliate wallet\",\"order_id\":15}', 'processed', NULL, NULL, '2022-07-14 04:28:17', '2022-07-14 04:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blocks`
--

CREATE TABLE `tb_blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_blocks`
--

INSERT INTO `tb_blocks` (`id`, `name`, `description`, `block_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Khối hình ảnh quảng cáo', 'Block used for displaying banner advertising images, with or without additional content', 'banner', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\"\r\n	],\r\n	\"layout\":[\r\n		\"slide\",\r\n		\"logo_partner\",\r\n		\"static\"\r\n	],\r\n	\"style\":[\r\n		\"d-block\",\r\n		\"d-none\"\r\n	]\r\n}', 1, 2, 'active', 1, 1, '2021-10-07 04:49:19', '2022-10-19 03:12:39'),
(11, 'Khối nội dung tùy chọn', 'Blocks are used for optional content and styled accordingly', 'custom', '{\r\n	\"template\":[\r\n		\"home.primary\"\r\n	],\r\n	\"layout\":[\r\n		\"product_category\",\r\n		\"why_choose\",\r\n		\"process_step\",\r\n		\"statistic\",\r\n		\"testimonial\",\r\n		\"call_now\",\r\n		\"map\"\r\n	]\r\n}', 1, 3, 'active', 1, 1, '2021-10-11 16:44:15', '2022-09-22 10:04:44'),
(20, 'Khối nội dung đầu trang', NULL, 'header', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n		\"page.about\"\r\n	],\r\n	\"layout\":[\r\n		\"home\",\r\n		\"default\"\r\n	]\r\n}', 1, 1, 'active', 1, 1, '2022-05-30 03:05:17', '2022-09-23 04:19:39'),
(21, 'Khối nội dung chân trang', NULL, 'footer', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n		\"page.ads\",\r\n		\"page.mkt\",\r\n		\"page.website\",\r\n		\"page.content\",\r\n		\"page.seo\",\r\n		\"page.media\",\r\n		\"page.about\"\r\n	],\r\n\"layout\":[\r\n		\"home\",\r\n		\"default\"\r\n	]\r\n}', 1, 99, 'active', 1, 1, '2022-05-30 03:06:28', '2022-10-19 04:46:18'),
(22, 'Khối danh sách dịch vụ nổi bật', NULL, 'cms_service', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\"\r\n	]\r\n}', 1, 5, 'active', 1, 1, '2022-05-31 07:25:43', '2022-08-24 07:31:44'),
(23, 'Khối danh sách bài viết nổi bật', NULL, 'cms_post', '{\r\n	\"template\":[\r\n		\"home.primary\"\r\n	]\r\n}', 1, 7, 'active', 1, 1, '2022-05-31 09:53:32', '2022-08-05 09:44:42'),
(24, 'Khối danh sách sản phẩm nổi bật', NULL, 'cms_product', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"page.default\"\r\n	]\r\n}', 1, 6, 'active', 1, 1, '2022-06-01 08:38:54', '2022-09-22 06:57:01'),
(27, 'Khối hiển thị nội dung chính', 'Khối hiển thị nội dung theo từng chức năng cụ thể', 'main', '{\r\n	\"template\":[\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n		\"page.ads\"\r\n	]\r\n}', 1, 4, 'active', 1, 1, '2022-06-02 11:23:39', '2022-09-14 04:08:26'),
(35, 'Khối nội dung form đăng ký', NULL, 'form', '{\r\n	\"template\":[\r\n		\"home.primary\",\r\n		\"post.detail\",\r\n		\"post.default\",\r\n		\"product.detail\",\r\n		\"product.default\",\r\n		\"service.detail\",\r\n		\"service.default\",\r\n		\"department.default\",\r\n		\"doctor.default\",\r\n		\"doctor.detail\",\r\n		\"resource.detail\",\r\n		\"resource.default\",\r\n		\"contact.default\",\r\n		\"cart.default\",\r\n		\"user.default\",\r\n		\"tags.default\",\r\n		\"search.default\",\r\n		\"page.ads\",\r\n		\"page.mkt\",\r\n		\"page.website\",\r\n		\"page.content\",\r\n		\"page.seo\",\r\n		\"page.media\",\r\n		\"page.about\"\r\n	],\r\n	\"layout\":[\r\n		\"booking\",\r\n		\"newsletter\"\r\n	]\r\n}', 1, 8, 'active', 1, 1, '2022-09-13 09:23:28', '2022-09-14 04:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_block_contents`
--

CREATE TABLE `tb_block_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `block_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_block_contents`
--

INSERT INTO `tb_block_contents` (`id`, `parent_id`, `title`, `brief`, `content`, `block_code`, `json_params`, `image`, `image_background`, `icon`, `url_link`, `url_link_title`, `position`, `system_code`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(16, 74, 'Cửa cuốn nghệ thuật', 'Tôn vinh vẻ đẹp kiến trúc Việt', 'Thiết kế bền vững', 'banner', '{\"layout\":\"slide\",\"style\":\"d-block\"}', '/data/cms-image/banner/image-2.jpg', '/data/cms-image/banner/image-2.jpg', NULL, NULL, 'Xem Thêm', NULL, NULL, 1, 'active', 1, 1, '2021-10-12 10:23:06', '2022-10-19 07:44:57'),
(17, 74, 'Banner #2', 'Care for your Loved Ones from the Experts in the Medical & Hospitality Industry.', 'Thiết kế bền vững', 'banner', '{\"layout\":\"slide\",\"style\":\"d-none\"}', '/data/cms-image/banner/image-1.jpg', '/data/cms-image/banner/image-1.jpg', NULL, NULL, 'Xem Thêm', NULL, NULL, 2, 'active', 1, 1, '2021-10-12 10:23:50', '2022-10-19 07:44:40'),
(19, NULL, 'QUY TRÌNH CỦA CHÚNG TÔI', 'Chuyên nghiệp từng giai đoạn, rút ngắn tối đa thời gian khách hàng phải chờ đợi', NULL, 'custom', '{\"layout\":\"process_step\",\"style\":null}', '/data/cms-image/1/about-v1-img1.jpg', '/data/cms-image/1/about-v1-img2.jpg', NULL, NULL, NULL, NULL, NULL, 5, 'active', 1, 1, '2021-10-12 10:29:41', '2022-10-19 03:03:58'),
(21, 19, '1', 'Nhận yêu cầu', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2021-10-12 10:31:50', '2022-09-22 04:39:24'),
(22, 19, '2', 'Báo giá', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2021-10-12 10:32:50', '2022-09-22 04:39:25'),
(23, 19, '3', 'Sản xuất', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2021-10-12 10:33:36', '2022-09-22 04:39:26'),
(74, NULL, 'Khối hình ảnh banner đầu trang', NULL, NULL, 'banner', '{\"layout\":\"slide\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-03-18 17:50:28', '2022-10-19 03:25:27'),
(75, NULL, 'Khối nội dung đầu trang - nochan', NULL, NULL, 'header', '{\"layout\":\"default\",\"style\":\"nochan\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, -1, 'delete', 1, 1, '2022-05-30 03:10:40', '2022-09-12 07:16:44'),
(79, NULL, 'Dịch vụ hàng đầu', 'Bên cạnh dịch vụ gia công và lắp đặt cửa cuốn, Nhật Việt hân hạnh mang tới cho quý khách những dịch vụ chất lượng khác', 'Đã mang lại sự hài lòng cho', 'cms_service', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, '#', 'Xem tất cả', NULL, NULL, 6, 'active', 1, 1, '2022-05-31 07:26:33', '2022-10-19 08:21:21'),
(80, NULL, 'Danh mục sản phẩm nổi bật', NULL, NULL, 'custom', '{\"layout\":\"product_category\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2022-05-31 08:52:07', '2022-09-22 04:36:59'),
(82, NULL, 'Sản phẩm nổi bật', 'Chúng tôi luôn sẵn sàng sản xuất theo đơn hàng cũng như có sẵn các sản phẩm trong kho để phục vụ quý khách hàng', NULL, 'cms_product', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7, 'active', 1, 1, '2022-06-01 08:39:42', '2022-09-22 06:58:44'),
(83, NULL, 'Cảm nhận khách hàng', 'Chúng tôi tự hào là đơn vị cung cấp sản phẩm và dịch vụ cửa cuốn uy tín chất lượng tại Việt Nam', NULL, 'custom', '{\"layout\":\"testimonial\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 9, 'active', 1, 1, '2022-06-01 09:24:32', '2022-09-22 08:18:57'),
(84, NULL, 'Con số thống kê', NULL, NULL, 'custom', '{\"layout\":\"statistic\",\"style\":null}', '/data/cms-image/1/counter-v1-shape1.png', '/data/cms-image/1/counter-v1-shape1.png', NULL, NULL, NULL, NULL, NULL, 8, 'active', 1, 1, '2022-06-01 09:44:25', '2022-10-19 07:08:05'),
(85, NULL, 'Danh sách logo đối tác', '<span class=\"stroke\">ĐỐI TÁC </span> HÀNG ĐẦU', NULL, 'banner', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 66, 'delete', 1, 1, '2022-06-02 05:37:32', '2022-09-13 09:21:11'),
(86, 85, '#7', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 7, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:52'),
(87, 85, '#6', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 6, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:53'),
(88, 85, '#5', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 5, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:54'),
(89, 85, '#4', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 4, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:55'),
(90, 85, '#3', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 3, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:56'),
(91, 85, '#2', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 2, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:57'),
(92, 85, '#1', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 1, 'delete', 1, 1, '2022-06-02 05:39:29', '2022-08-18 02:48:58'),
(93, NULL, 'Khối nội dung chân trang', NULL, NULL, 'footer', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'active', 1, 1, '2022-06-02 05:46:30', '2022-08-18 03:40:56'),
(94, NULL, 'Khối hiển thị nội dung chính', NULL, NULL, 'main', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-06-02 11:24:21', '2022-06-03 03:49:47'),
(95, 85, '#8', NULL, NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, '#', 'www.fhmvietnam.vn', NULL, NULL, 8, 'delete', 1, 1, '2022-08-05 08:58:04', '2022-08-18 02:51:25'),
(96, 84, 'Năm kinh nghiệm', '7', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-08-05 08:58:04', '2022-09-22 07:45:33'),
(97, 84, 'Khách hàng đã phục vụ', '498', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-08-05 08:58:04', '2022-09-22 07:45:21'),
(98, 80, 'Thấu hiểu', '95', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'delete', 1, 1, '2022-08-05 08:58:04', '2022-09-22 04:00:37'),
(99, 80, 'Kinh nghiệm', '85', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-08-05 08:58:04', '2022-09-22 04:00:32'),
(100, 80, 'Kỹ năng', '90', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-05 08:58:04', '2022-09-22 04:00:27'),
(101, 83, 'Ms. Ngân', 'Khách hàng tại Hà Nội', 'Chất lượng sản phẩm của Nhật Việt thật sự tuyệt vời, chính sách và thái độ phục vụ của nhân viên làm tôi rất hài lòng', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/about-v1-img1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-08-05 09:17:04', '2022-10-19 03:09:40'),
(102, 83, 'Anh Chung', 'Khách hàng tại Vĩnh Phúc', 'Là nhà thầu xây dựng, chất lượng sản phẩm là giá trị cốt lõi của tôi muốn mang lại cho khách hàng. Và tôi đã có được điều ấy khi hợp tác cùng Nhật Việt', 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/1/about-v1-img1.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-08-05 09:17:04', '2022-10-19 03:09:18'),
(103, 84, 'Công trình thi công', '985', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-08-05 09:17:04', '2022-09-22 07:45:27'),
(104, 84, 'Sản phẩm cung cấp', '4552', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2022-08-05 09:17:04', '2022-09-22 07:45:30'),
(105, 19, '4', 'Bàn giao, bảo hành', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-08-17 10:30:42', '2022-09-22 04:39:27'),
(106, NULL, 'Vì sao chọn cửa cuốn Nhật Việt?', 'Và đây là những điều tuyệt với bạn nhận được', NULL, 'custom', '{\"layout\":\"why_choose\",\"style\":null}', NULL, NULL, NULL, NULL, 'Liên Hệ', NULL, NULL, 4, 'active', 1, 1, '2022-08-18 03:06:25', '2022-10-19 03:01:45'),
(107, 106, 'CAM KẾT CHẤT LƯỢNG', 'Luôn đảm bảo sản phẩm chất lượng, vật liệu gia công tốt nhất', 'Liên Hệ', 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, '<i class=\"far fa-calendar-check\"></i>', NULL, 'Liên Hệ', NULL, NULL, 3, 'active', 1, 1, '2022-08-18 03:10:32', '2022-10-19 03:00:16'),
(108, 106, 'GIÁ CẢ CẠNH TRANH', 'Giá tận xưởng, phục vụ khách hàng với nhiều ưu đãi', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, '<i class=\"fas fa-dollar-sign\"></i>', NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-08-18 03:10:35', '2022-10-19 02:54:21'),
(109, 106, 'CHÍNH SÁCH VẬN CHUYỂN', 'Hỗ trợ giao hàng miễn phí trong ngày trong bán kính 5km', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, '<i class=\"fas fa-rocket\"></i>', NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-18 03:10:39', '2022-10-19 02:54:14'),
(110, NULL, 'Khối video và hình ảnh nổi bật', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 55, 'delete', 1, 1, '2022-08-18 03:18:35', '2022-09-22 10:12:24'),
(112, NULL, 'Khối nội dung đầu trang -Service', NULL, NULL, 'header', '{\"layout\":\"default\",\"style\":null}', '/data/cms-image/1/main-slider-v1-3.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'active', 1, 1, '2022-08-22 08:57:56', '2022-10-19 03:31:55'),
(232, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:37:58'),
(233, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:38:21'),
(234, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:38:16'),
(235, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:38:12'),
(236, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:38:08'),
(237, 79, 'Our services', 'Quảng cáo đa nền tảng', 'Quảng cáo đa nền tảng sẽ giúp bạn dễ dàng tiếp cận và tương tác với các khách hàng thông qua các mẫu quảng cáo Facebook, Google, Tiktok,... của bạn từ đó nâng cao chất lượng dịch vụ và doanh thu.', 'cms_service', '{\"layout\":null,\"style\":null}', '/data/cms-image/service/fb.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-08-26 09:45:10', '2022-09-13 07:38:03'),
(238, 106, 'TƯ VẤN 24/7', 'Tư vấn tận tình và hợp lý với nhu cầu khách hàng', NULL, 'custom', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, 'Liên Hệ', NULL, NULL, 6, 'active', 1, 1, '2022-09-12 09:12:35', '2022-10-19 02:59:31'),
(239, 19, 'Sức khỏe & Sắc đẹp', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm tempor incididunt ut labore et.', NULL, 'custom', '{\"layout\":null,\"style\":null}', '/data/cms-image/icon/5.png', NULL, NULL, NULL, NULL, NULL, NULL, 5, 'delete', 1, 1, '2022-09-12 09:13:00', '2022-09-22 04:37:50'),
(240, 110, 'Video lớp học', NULL, '<iframe style=\"width: 100%\" width=\"885\" height=\"610\" src=\"https://www.youtube.com/embed/ihba9Lw0tv4\" title=\"10 Minute Morning Stretch for every day | Simple routine to wake up & feel good\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\"  allowfullscreen></iframe>', 'cms_resource', '{\"layout\":null,\"style\":\"video\"}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'delete', 1, 1, '2022-09-12 10:09:33', '2022-09-12 10:09:33'),
(241, 110, 'Hình ảnh lớp học', NULL, NULL, 'cms_resource', '{\"layout\":null,\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'delete', 1, 1, '2022-09-12 10:10:31', '2022-09-12 10:10:31'),
(242, NULL, 'Nếu bạn cần hỗ trợ', 'Hãy cho chúng tôi cơ hội được lắng nghe bạn', NULL, 'custom', '{\"layout\":\"call_now\",\"style\":null}', NULL, NULL, NULL, '#', 'LIÊN HỆ NGAY', NULL, NULL, 10, 'active', 1, 1, '2022-09-13 09:25:51', '2022-09-22 08:29:39'),
(243, NULL, 'Đối tác của chúng tôi', NULL, NULL, 'banner', '{\"layout\":\"logo_partner\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11, 'active', 1, 1, '2022-09-13 09:26:30', '2022-09-22 10:19:04'),
(244, 243, '#5', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, NULL, NULL, NULL, NULL, 5, 'active', 1, 1, '2022-09-22 10:15:57', '2022-09-22 10:15:57'),
(245, 243, '#4', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-09-22 10:15:58', '2022-09-22 10:15:58'),
(246, 243, '#3', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, NULL, NULL, NULL, NULL, 3, 'active', 1, 1, '2022-09-22 10:15:59', '2022-09-22 10:15:59'),
(247, 243, '#2', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, NULL, NULL, NULL, NULL, 2, 'active', 1, 1, '2022-09-22 10:16:00', '2022-09-22 10:16:00'),
(248, 243, '#1', NULL, NULL, 'banner', '{\"layout\":null,\"style\":null}', '/data/cms-image/partner/vpbank.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'active', 1, 1, '2022-09-22 10:16:00', '2022-09-22 10:16:00'),
(249, NULL, 'Khối nhúng bản đồ', NULL, NULL, 'custom', '{\"layout\":\"map\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 12, 'active', 1, 1, '2022-09-22 10:26:58', '2022-09-22 10:26:58'),
(250, NULL, 'Khối nội dung đầu trang - Trang chủ', NULL, NULL, 'header', '{\"layout\":\"home\",\"style\":null}', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'active', 1, 1, '2022-09-23 04:20:20', '2022-09-23 04:20:28'),
(251, NULL, 'đăng ký', 'Liên Hệ', 'Đặt hàng\r\nngay hôm nay', 'form', '{\"layout\":\"booking\",\"style\":null}', '/data/cms-image/1/contact-v1-img1.jpg', '/data/cms-image/1/contact-v1-img1.jpg', NULL, NULL, 'Send', NULL, NULL, 13, 'active', 1, 1, '2022-10-19 03:06:49', '2022-10-19 03:14:39'),
(252, NULL, 'Khối nội dung chân trang- home', 'Thiết kế bền vững', 'Thiết kế bền vững', 'footer', '{\"layout\":\"home\",\"style\":null}', '/data/cms-image/1/footer-v1-bg.jpg', '/data/cms-image/1/footer-v1-bg.jpg', NULL, NULL, NULL, NULL, NULL, 99, 'active', 1, 1, '2022-10-19 04:54:17', '2022-10-19 07:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bookings`
--

CREATE TABLE `tb_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `doctor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_bookings`
--

INSERT INTO `tb_bookings` (`id`, `customer_id`, `name`, `email`, `phone`, `address`, `customer_note`, `department_id`, `doctor_id`, `booking_date`, `booking_time`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Thắng Nguyễn EDU', NULL, '0912 568 999', NULL, NULL, 10, 28, '2022-06-08', '04:00 PM', 'Thử comment', NULL, 'processed', NULL, 1, '2022-06-02 05:26:04', '2022-06-08 09:03:14'),
(2, NULL, 'Thắng Nguyễn EDU', NULL, '0912 568 999', NULL, NULL, 10, 28, '2022-06-02', NULL, NULL, NULL, 'new', NULL, NULL, '2022-06-02 05:26:31', '2022-06-02 05:26:31'),
(3, NULL, 'Thắng Nguyễn EDU', NULL, '0912 568 999', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit reprehenderit voluptates.', 10, 28, '2022-06-02', NULL, NULL, NULL, 'new', NULL, NULL, '2022-06-02 05:29:25', '2022-06-02 05:29:25'),
(4, NULL, 'Thắng Nguyễn EDU', NULL, '0912 568 999', NULL, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit reprehenderit voluptates.', 10, 28, '2022-06-02', '06:00 PM', NULL, NULL, 'new', NULL, 1, '2022-06-02 05:34:29', '2022-06-08 09:04:26'),
(6, NULL, 'Nguyễn Hữu Thắng', NULL, '098 226 9600', NULL, 'Thử chức năng booking bác sĩ chi tiết', 10, 28, '2022-06-30', '9:30 AM', NULL, NULL, 'new', NULL, NULL, '2022-06-21 08:48:51', '2022-06-21 08:48:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_posts`
--

CREATE TABLE `tb_cms_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'post',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_thumb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `count_visited` int(11) NOT NULL DEFAULT 0,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cms_posts`
--

INSERT INTO `tb_cms_posts` (`id`, `taxonomy_id`, `is_type`, `title`, `json_params`, `image`, `image_thumb`, `is_featured`, `count_visited`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 4, 'post', 'Bảng giá thiết kế', '{\"brief\":{\"vi\":\"In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bang-gia-thiet-ke-noi-that.jpg\\\" \\/><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bang-gia-thiet-ke-noi-that.jpg', '/data/cms-image/1/bang-gia-thiet-ke-noi-that.jpg', 0, 10, 1, 'delete', 1, 1, '2021-10-15 08:58:35', '2022-08-18 04:01:35'),
(2, 4, 'post', 'Bảng giá thi công phần thô', '{\"brief\":{\"vi\":\"In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bang-gia-thiet-ke-noi-that.jpg\\\" \\/><\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bang-gia-thiet-ke-noi-that.jpg', '/data/cms-image/1/bang-gia-thiet-ke-noi-that.jpg', 0, 2, 2, 'delete', 1, 1, '2021-10-15 08:59:49', '2022-08-18 04:01:38'),
(3, 1, 'post', 'Xu thế việc làm toàn cầu - 2021?', '{\"title\":{\"vi\":\"Xu th\\u1ebf vi\\u1ec7c l\\u00e0m to\\u00e0n c\\u1ea7u - 2021?\"},\"brief\":{\"vi\":\"In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.\"},\"content\":{\"vi\":null}}', 'http://cvedu.test/assets/img/module-3.jpg', NULL, 0, 1, 3, 'delete', 1, 1, '2021-10-15 09:36:39', '2022-08-06 08:15:08'),
(4, 3, 'service', 'Kiến trúc biệt thự', '{\"price\":\"450000\",\"price_currency\":\"\\u20ab\",\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size.\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/1582527257_dream.jpg', '/data/cms-image/1/1582527257_dream.jpg', 0, 6, 7, 'delete', 1, 1, '2022-02-13 15:59:41', '2022-08-20 04:58:50'),
(5, 17, 'service', 'Tư vấn thiết kế', '{\"price\":null,\"price_currency\":null,\"brief\":{\"vi\":\"C\\u1eeda g\\u1ed7\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/cuacuon.jpg', NULL, 1, 56, 2, 'active', 1, 1, '2022-02-13 16:05:18', '2022-10-19 08:20:26'),
(17, 1, 'post', 'Quy trình thi công nội thất chung cư trọn gói', '{\"tags\":[\"25\",\"26\"],\"brief\":{\"vi\":\"Phasellus et lacus mattis, tincidunt metus sodales, tincidunt urna. Cras felis neque, iaculis vitae varius eu, luctus consectetur odio. However, this ideal is a dream, not reality, and a clever and profitable marketing ruse, not fact.\"},\"content\":{\"vi\":\"<p>Nullam mollis ultrices est. Nulla in justo lacinia, scelerisque purus et, semper tortor. Donec bibendum leo vitae commodo porttitor. Proin tempus sollicitudin odio in feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices vitae nisl tristique commodo. Phasellus porttitor metus at mattis ultricies. In imperdiet nec nunc in tincidunt.<\\/p>\\r\\n\\r\\n<p>Curabitur faucibus dolor at dui lobortis, eget dictum nisi mattis. Fusce risus dui, fringilla non elit sit amet, lobortis interdum eros. Donec mattis lectus quis elit fermentum lacinia. Nullam at ligula semper ante mollis pretium. Nam euismod velit ut quam accumsan vestibulum. Etiam diam augue, dapibus ac placerat nec, accumsan eget nibh. Cras sodales, leo ut volutpat laoreet, velit enim pharetra magna, at dapibus lacus elit vel mi. Nullam a massa ac ligula scelerisque maximus. Quisque dictum quis lorem ut sodales. Duis at semper odio. Morbi in sapien vel lacus posuere mattis ac eget ante. Etiam viverra accumsan rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":\"Cv t\\u1ed1t, h\\u01b0\\u1edbng d\\u1eabn t\\u1ea1o cv\",\"seo_description\":\"Phasellus et lacus mattis, tincidunt metus sodales, tincidunt urna. Cras felis neque, iaculis vitae varius eu, luctus consectetur odio. However, this ideal is a dream, not reality, and a clever and profitable marketing ruse, not fact.\",\"related_post\":[\"19\",\"18\"]}', '/data/cms-image/post/1.jpg', '/data/cms-image/post/1.jpg', 1, 192, 1, 'active', 1, 1, '2022-09-14 04:00:34', '2022-09-24 10:03:23'),
(18, 1, 'post', 'Xu hướng thiết kế nhà phố mới nhất 2022', '{\"tags\":[\"23\",\"22\"],\"brief\":{\"vi\":\"In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/2.jpg', '/data/cms-image/post/2.jpg', 1, 17, 2, 'active', 1, 1, '2021-10-15 08:59:49', '2022-09-14 03:19:01'),
(19, 1, 'post', 'Thi công nội thất trọn gói uy tín, chuyên nghiệp', '{\"brief\":{\"vi\":\"In varius varius justo, eget ultrices mauris rhoncus non. Morbi tristique, mauris eu bibendum, velit diam.\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/3.jpg', '/data/cms-image/post/3.jpg', 1, 9, 3, 'active', 1, 1, '2022-08-06 03:18:53', '2022-09-24 10:03:32'),
(21, 17, 'service', 'Sửa chữa cửa cuốn', '{\"price\":null,\"price_currency\":null,\"brief\":{\"vi\":\"C\\u1eeda g\\u1ed7\"},\"content\":{\"vi\":\"<p>Ng\\u00e0y nay khi l\\u0129nh v\\u1ef1c c\\u00f4ng ngh\\u1ec7 th\\u00f4ng tin ng\\u00e0y c\\u00e0ng hi\\u1ec7n \\u0111\\u1ea1i \\u0111\\u1eb7c bi\\u1ec7t l\\u00e0 s\\u1ef1 ra \\u0111\\u1eddi v\\u00e0 ph\\u00e1t tri\\u1ec3n m\\u1ea1nh m\\u1ebd c\\u1ee7a nh\\u1eefng trang m\\u1ea1ng x\\u00e3 h\\u1ed9i (Social Network) v\\u1edbi s\\u1ef1 k\\u1ebft n\\u1ed1i v\\u00e0 lan truy\\u1ec1n r\\u1ed9ng r\\u00e3i tr\\u00ean kh\\u1eafp th\\u1ebf gi\\u1edbi b\\u1eb1ng c\\u00e1c thi\\u1ebft b\\u1ecb th\\u00f4ng minh nh\\u01b0; \\u0110i\\u1ec7n tho\\u1ea1i th\\u00f4ng minh (Smart Phone), IPad, Laptop, Tablet\\u2026 Ch\\u00ednh vi\\u1ec7c t\\u00edch h\\u1ee3p c\\u00e1c trang m\\u1ea1ng x\\u00e3 h\\u1ed9i b\\u1eb1ng c\\u00e1c thi\\u1ebft b\\u1ecb di \\u0111\\u1ed9ng th\\u00f4ng minh \\u0111\\u00e3 gi\\u00fap gia t\\u0103ng s\\u1ef1 lan truy\\u1ec1n v\\u00e0 ph\\u00e1t tri\\u1ec3n r\\u1ed9ng r\\u00e3i c\\u1ee7a m\\u1ea1ng x\\u00e3 h\\u1ed9i \\u0111\\u1ebfn v\\u1edbi ng\\u01b0\\u1eddi d\\u00f9ng Vi\\u1ec7t Nam v\\u00e0 tr\\u00ean kh\\u1eafp th\\u1ebf gi\\u1edbi.<\\/p>\\r\\n\\r\\n<p>M\\u1ea1ng x\\u00e3 h\\u1ed9i Facebook t\\u00ednh \\u0111\\u1ebfn n\\u0103m 2017 t\\u1ea1i Vi\\u1ec7t Nam c\\u00f3 tr\\u00ean 42 tri\\u1ec7u ng\\u01b0\\u1eddi d\\u00f9ng. Kh\\u00f4ng ch\\u1ec9 c\\u00f3 s\\u1ed1 l\\u01b0\\u1ee3ng ng\\u01b0\\u1eddi s\\u1eed d\\u1ee5ng kh\\u1ed5ng l\\u1ed3 m\\u00e0 Facebook c\\u00f2n c\\u00f3 t\\u00ednh n\\u0103ng lan truy\\u1ec1n c\\u1ef1c k\\u1ef3 r\\u1ed9ng r\\u00e3i. Ch\\u00ednh v\\u00ec \\u0111i\\u1ec1u n\\u00e0y m\\u00e0 nhi\\u1ec1u c\\u00f4ng ty; c\\u00e1 nh\\u00e2n kinh doanh Online s\\u1eed d\\u1ee5ng d\\u1ecbch v\\u1ee5 qu\\u1ea3ng c\\u00e1o facebook \\u0111\\u1ec3 qu\\u1ea3ng b\\u00e1 s\\u1ea3n ph\\u1ea9m v\\u00e0 th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a m\\u00ecnh. Nh\\u1edd qu\\u1ea3ng c\\u00e1o facebook m\\u00e0 nhi\\u1ec1u m\\u1eb7t h\\u00e0ng c\\u1ee7a c\\u00e1c doanh nghi\\u1ec7p, c\\u00f4ng ty, c\\u1eeda h\\u00e0ng \\u0111\\u01b0\\u1ee3c qu\\u1ea3ng b\\u00e1 r\\u1ed9ng r\\u00e3i \\u0111\\u1ebfn ng\\u01b0\\u1eddi ti\\u00eau d\\u00f9ng.<\\/p>\\r\\n\\r\\n<h2>Hi\\u1ec7u Qu\\u1ea3 Trong D\\u1ecbch V\\u1ee5 Qu\\u1ea3ng C\\u00e1o Facebook<\\/h2>\\r\\n\\r\\n<h3>Qu\\u1ea3ng c\\u00e1o Facebook \\u0111\\u1ebfn \\u0111\\u00fang m\\u1ee5c ti\\u00eau<\\/h3>\\r\\n\\r\\n<p>V\\u1edbi nh\\u1eefng t\\u00ednh n\\u0103ng v\\u01b0\\u1ee3t tr\\u1ed9i c\\u1ee7a Facebook nh\\u01b0 b\\u1ed9 l\\u1ecdc th\\u00f4ng minh; l\\u1ef1a ch\\u1ecdn v\\u1ecb tr\\u00ed \\u0111\\u1ecba l\\u00fd, \\u0111\\u1ed9 tu\\u1ed5i, s\\u1edf th\\u00edch, gi\\u1edbi t\\u00ednh, nh\\u00f3m \\u0111\\u1ed1i t\\u01b0\\u1ee3ng, ch\\u1ee9c v\\u1ee5\\u2026 v\\u1edbi nh\\u1eefng t\\u00ednh n\\u0103ng n\\u00e0y qu\\u1ea3ng c\\u00e1o Facebook ch\\u1ec9 hi\\u1ec3n th\\u1ecb qu\\u1ea3ng c\\u00e1o tr\\u00ean nh\\u1eefng ng\\u01b0\\u1eddi thu\\u1ed9c nh\\u00f3m \\u0111\\u1ed1i t\\u01b0\\u1ee3ng m\\u00e0 b\\u1ea1n mu\\u1ed1n gi\\u1edbi h\\u1ea1n theo b\\u1ed9 l\\u1ecdc c\\u1ee7a Facebook.<\\/p>\\r\\n\\r\\n<h3>Qu\\u1ea3ng c\\u00e1o Facebook<\\/h3>\\r\\n\\r\\n<p>Qu\\u1ea3ng c\\u00e1o Facebook lu\\u00f4n b\\u1eaft bu\\u1ed9c ph\\u1ea3i g\\u1eafn li\\u1ec1n v\\u1edbi m\\u1ed9t ho\\u1eb7c nhi\\u1ec1u \\u201ch\\u00ecnh \\u1ea3nh\\u201d ho\\u1eb7c \\u201cvideo clip\\u201d tr\\u00ean nh\\u1eefng m\\u1eabu qu\\u1ea3ng c\\u00e1o. Do v\\u1eady m\\u00e0 nh\\u1eefng qu\\u1ea3ng c\\u00e1o Facebook c\\u1ee7a b\\u1ea1n d\\u1ec5 d\\u00e0ng \\u0111\\u01b0\\u1ee3c ch\\u00fa \\u00fd v\\u00e0 thu h\\u00fat ng\\u01b0\\u1eddi d\\u00f9ng; c\\u00f9ng v\\u1edbi t\\u00ednh lan truy\\u1ec1n v\\u00e0 chia s\\u1ebb r\\u1ed9ng r\\u00e3i c\\u1ee7a Facebook c\\u0169ng gi\\u00fap gia t\\u0103ng s\\u1ef1 ph\\u1ee7 s\\u00f3ng t\\u1ed1i \\u0111a v\\u1ec1 nh\\u1eadn di\\u1ec7n th\\u01b0\\u01a1ng hi\\u1ec7u\\/s\\u1ea3n ph\\u1ea9m c\\u1ee7a b\\u1ea1n \\u0111\\u1ebfn v\\u1edbi c\\u00f4ng ch\\u00fang. Qu\\u1ea3ng c\\u00e1o Facebook hi\\u1ec7u qu\\u1ea3 v\\u1edbi t\\u00ednh n\\u0103ng lan truy\\u1ec1n nhanh.<\\/p>\\r\\n\\r\\n<p>Trong c\\u00e1c k\\u00eanh qu\\u1ea3ng c\\u00e1o th\\u00ec \\u0111\\u1ed9 lan truy\\u1ec1n r\\u1ed9ng r\\u00e3i v\\u00e0 nhanh ch\\u00f3ng nh\\u1ea5t thu\\u1ed9c v\\u1ec1 k\\u00eanh qu\\u1ea3ng c\\u00e1o Facebook, nh\\u1eefng m\\u1eabu qu\\u1ea3ng c\\u00e1o Facebook d\\u1ec5 d\\u00e0ng \\u0111\\u01b0\\u1ee3c lan truy\\u1ec1n r\\u1ed9ng r\\u00e3i v\\u1edbi t\\u1ed1c \\u0111\\u1ed9 nhanh ch\\u00f3ng b\\u1edfi c\\u00e1c t\\u00ednh n\\u0103ng; Y\\u00eau th\\u00edch <a href=\\\"https:\\/\\/vi.wikipedia.org\\/wiki\\/Like\\\">(Like)<\\/a>, chia s\\u1ebb (share)\\u2026 v\\u00e0 t\\u00ednh k\\u1ebft n\\u1ed1i b\\u1eafc c\\u1ea7u t\\u1eeb ng\\u01b0\\u1eddi n\\u00e0y v\\u1edbi ng\\u01b0\\u1eddi kh\\u00e1c.<\\/p>\\r\\n\\r\\n<h3>Qu\\u1ea3ng c\\u00e1o Facebook c\\u00f3 t\\u00ednh c\\u1ed9ng \\u0111\\u1ed3ng cao<\\/h3>\\r\\n\\r\\n<p>V\\u1edbi t\\u00ednh n\\u0103ng c\\u1ed9ng \\u0111\\u1ed3ng cao th\\u00ec c\\u00e1c m\\u1eabu qu\\u1ea3ng c\\u00e1o Facebook s\\u1ebd gi\\u00fap b\\u1ea1n d\\u1ec5 d\\u00e0ng ti\\u1ebfp c\\u1eadn v\\u00e0 t\\u01b0\\u01a1ng t\\u00e1c v\\u1edbi c\\u00e1c kh\\u00e1ch h\\u00e0ng th\\u00f4ng qua c\\u00e1c m\\u1eabu qu\\u1ea3ng c\\u00e1o Facebook c\\u1ee7a b\\u1ea1n t\\u1eeb \\u0111\\u00f3 n\\u00e2ng cao kh\\u1ea3 n\\u0103ng ch\\u0103m s\\u00f3c kh\\u00e1ch h\\u00e0ng v\\u00e0 thu th\\u1eadp th\\u00f4ng tin v\\u1ec1 s\\u1ef1 h\\u00e0i l\\u00f2ng v\\u00e0 nh\\u1eefng g\\u00ec ch\\u01b0a h\\u00e0i l\\u00f2ng \\u0111\\u1ed1i v\\u1edbi s\\u1ea3n ph\\u1ea9m c\\u1ee7a doanh nghi\\u1ec7p b\\u1ea1n. T\\u1eeb \\u0111\\u00f3 t\\u1ea1o m\\u1ed1i li\\u00ean k\\u1ebft ch\\u1eb7t ch\\u1ebd gi\\u1eefa doanh nghi\\u1ec7p b\\u1ea1n v\\u00e0 kh\\u00e1ch h\\u00e0ng; gi\\u00fap t\\u0103ng uy t\\u00edn th\\u01b0\\u01a1ng hi\\u1ec7u, uy t\\u00edn doanh nghi\\u1ec7p b\\u1ea1n \\u0111\\u1ed1i v\\u1edbi ng\\u01b0\\u1eddi ti\\u00eau d\\u00f9ng.<\\/p>\\r\\n\\r\\n<h2><strong>C\\u00e1c D\\u1ea1ng Qu\\u1ea3ng C\\u00e1o Facebook<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>H\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o Facebook Page Post:<\\/strong><\\/h3>\\r\\n\\r\\n<p>&nbsp;Qu\\u1ea3ng c\\u00e1o Page Post l\\u00e0 h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o m\\u1ed9t b\\u00e0i vi\\u1ebft tr\\u00ean Fanpage; k\\u00e8m theo \\u0111\\u00f3 l\\u00e0 m\\u1ed9t ho\\u1eb7c nhi\\u1ec1u h\\u00ecnh \\u1ea3nh v\\u1ec1 s\\u1ea3n ph\\u1ea9m v\\u00e0 th\\u01b0\\u01a1ng hi\\u1ec7u c\\u1ee7a b\\u1ea1n. Gi\\u00fap t\\u0103ng l\\u01b0\\u1ee3t qu\\u1ea3ng b\\u00e1 s\\u1ea3n ph\\u1ea9m c\\u1ee7a b\\u1ea1n \\u0111\\u1ebfn v\\u1edbi c\\u1ed9ng \\u0111\\u1ed3ng v\\u00e0 t\\u0103ng \\u0111\\u1ed9 t\\u01b0\\u01a1ng t\\u00e1c c\\u1ee7a kh\\u00e1ch h\\u00e0ng l\\u00ean m\\u1eabu qu\\u1ea3ng c\\u00e1o c\\u1ee7a b\\u1ea1n qua c\\u00e1c h\\u00e0nh vi; Like post, chia s\\u1ebb \\u201cshare\\u201d, comment, photo view,\\u2026 \\u0110\\u1ed3ng th\\u1eddi c\\u0169ng t\\u0103ng l\\u01b0\\u1ee3ng fan t\\u1ef1 nhi\\u00ean cho fanpage c\\u1ee7a b\\u1ea1n. H\\u00ecnh th\\u1ee9c n\\u00e0y ch\\u1ec9 t\\u00ednh ti\\u1ec1n khi kh\\u00e1ch h\\u00e0ng c\\u00f3 t\\u01b0\\u01a1ng t\\u00e1c l\\u00ean m\\u1eabu qu\\u1ea3ng c\\u00e1o Page Post c\\u1ee7a b\\u1ea1n m\\u00e0 th\\u00f4i.&nbsp;<strong>Page Post ph\\u00f9 h\\u1ee3p v\\u1edbi c\\u00e1c l\\u00e3nh v\\u1ef1c kinh doanh nh\\u01b0<\\/strong>;<strong> Th\\u1eddi trang, m\\u1ef9 ph\\u1ea9m, b\\u1ea5t \\u0111\\u1ed9ng s\\u1ea3n, th\\u1ea9m m\\u1ef9 vi\\u1ec7n, spa, \\u1ea9m th\\u1ef1c.<\\/strong><\\/p>\\r\\n\\r\\n<h3><strong>H\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o Facebook Page Like:<\\/strong>&nbsp;<\\/h3>\\r\\n\\r\\n<p>Qu\\u1ea3ng c\\u00e1o Facebook Page Like l\\u00e0 h\\u00ecnh th\\u1ee9c gi\\u00fap gia t\\u0103ng l\\u01b0\\u1ee3ng fan \\u201cth\\u1eadt\\u201d tr\\u00ean fanpage c\\u1ee7a b\\u1ea1n. \\u0110\\u00e2y l\\u00e0 h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o kh\\u00f4ng \\u0111em l\\u1ea1i nhi\\u1ec1u doanh thu cho b\\u1ea1n nh\\u01b0ng ch\\u00fang l\\u1ea1i b\\u1ed5 tr\\u1ee3 cho c\\u00e1c h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o kh\\u00e1c c\\u1ee7a facebook. V\\u00e0 Page Like c\\u0169ng l\\u00e0 h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o c\\u1ef1c k\\u00ec quan tr\\u1ecdng trong chi\\u1ebfn l\\u01b0\\u1ee3c Marketing Online; b\\u1edfi \\u0111\\u1ec3 qu\\u1ea3ng c\\u00e1o facebook hi\\u1ec7u qu\\u1ea3 cho c\\u00e1c h\\u00ecnh th\\u1ee9c kh\\u00e1c nh\\u01b0; Page post, Website click, Website click \\u2013 Multi product\\u2026 th\\u00ec vi\\u1ec7c \\u0111\\u1ea7u ti\\u00ean l\\u00e0 ph\\u1ea3i qu\\u1ea3ng c\\u00e1o facebook Page Like. Ngo\\u00e0i ra n\\u1ebfu b\\u1ea1n bi\\u1ebft t\\u1eadn d\\u1ee5ng h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o facebook; Page, Like t\\u1ed1t \\u0111\\u1ebfn khi l\\u01b0\\u1ee3ng fan tr\\u00ean fanpage c\\u1ee7a b\\u1ea1n l\\u1edbn s\\u1ebd gi\\u00fap b\\u1ea1n t\\u0103ng doanh thu l\\u1edbn m\\u00e0 kh\\u00f4ng c\\u1ea7n ph\\u1ea3i d\\u00f9ng \\u0111\\u1ebfn c\\u00e1c h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1c kh\\u00e1c.<\\/p>\\r\\n\\r\\n<h3><strong>H\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o Facebook Website Click:<\\/strong>&nbsp;<\\/h3>\\r\\n\\r\\n<p>Qu\\u1ea3ng c\\u00e1o Website Click l\\u00e0 h\\u00ecnh th\\u1ee9c qu\\u1ea3ng c\\u00e1o tr\\u00ean facebook c\\u00f3 \\u0111\\u01b0\\u1eddng d\\u1eabn tr\\u1ef1c ti\\u1ebfp \\u0111\\u1ebfn website c\\u1ee7a b\\u1ea1n. H\\u00ecnh th\\u1ee9c n\\u00e0y gi\\u00fap ng\\u01b0\\u1eddi ti\\u00eau d\\u00f9ng \\u0111\\u1ebfn v\\u1edbi website c\\u1ee7a b\\u1ea1n l\\u1ef1a ch\\u1ecdn s\\u1ea3n ph\\u1ea9m tr\\u1ef1c ti\\u1ebfp tr\\u00ean website; \\u0111\\u1ed3ng th\\u1eddi c\\u0169ng qu\\u1ea3ng b\\u00e1 website c\\u1ee7a b\\u1ea1n r\\u1ed9ng r\\u00e3i \\u0111\\u1ebfn v\\u1edbi kh\\u00e1ch h\\u00e0ng. Kh\\u00f4ng ch\\u1ec9 v\\u1eady gi\\u00fap t\\u0103ng l\\u01b0\\u1ee3ng traffic website v\\u00e0 l\\u00e0m t\\u0103ng ch\\u1ea5t l\\u01b0\\u1ee3ng website c\\u00f4ng ty b\\u1ea1n.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/cuacuon.jpg', NULL, 1, 179, 1, 'active', 1, 1, '2022-02-13 15:59:41', '2022-10-19 08:20:11'),
(22, 12, 'resource', 'Thư viện media 01', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":null},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/embed\\/G-44iU8Me_U\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/demo/demo.jpg', NULL, 1, 57, 1, 'active', 1, 1, '2022-06-01 08:27:54', '2022-09-14 08:14:45'),
(23, 12, 'resource', 'Tin mẫu thi công dự án 02', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bao-gia-noi-that-go-oc-cho-3.jpg\\\" \\/>Vi\\u1ec7t Nam l\\u1ea7n th\\u1ee9 29 \\u2013 VIETNAM MEDI-PHARM 2022\\u201d t\\u1ed5 ch\\u1ee9c ch\\u01b0\\u01a1ng tr\\u00ecnh \\u201cPh\\u1ed5 c\\u1eadp ki\\u1ebfn th\\u1ee9c \\u2013 T\\u01b0 v\\u1ea5n t\\u1ea7m so\\u00e1t ung th\\u01b0\\u201d.<\\/p>\"},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/watch?v=miHa-stI7oI\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bao-gia-noi-that-go-oc-cho-3.jpg', NULL, 1, 3, 2, 'delete', 1, 1, '2022-06-01 08:27:54', '2022-09-14 05:13:03'),
(24, 12, 'resource', 'Tin mẫu thi công dự án 06', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bao-gia-noi-that-go-oc-cho-3.jpg\\\" \\/>Vi\\u1ec7t Nam l\\u1ea7n th\\u1ee9 29 \\u2013 VIETNAM MEDI-PHARM 2022\\u201d t\\u1ed5 ch\\u1ee9c ch\\u01b0\\u01a1ng tr\\u00ecnh \\u201cPh\\u1ed5 c\\u1eadp ki\\u1ebfn th\\u1ee9c \\u2013 T\\u01b0 v\\u1ea5n t\\u1ea7m so\\u00e1t ung th\\u01b0\\u201d.<\\/p>\"},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/watch?v=miHa-stI7oI\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bao-gia-noi-that-go-oc-cho-3.jpg', NULL, 1, 1, 3, 'delete', 1, 1, '2022-06-01 08:27:54', '2022-09-14 05:13:11'),
(25, 12, 'resource', 'Tin mẫu thi công dự án 05', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bao-gia-noi-that-go-oc-cho-3.jpg\\\" \\/>Vi\\u1ec7t Nam l\\u1ea7n th\\u1ee9 29 \\u2013 VIETNAM MEDI-PHARM 2022\\u201d t\\u1ed5 ch\\u1ee9c ch\\u01b0\\u01a1ng tr\\u00ecnh \\u201cPh\\u1ed5 c\\u1eadp ki\\u1ebfn th\\u1ee9c \\u2013 T\\u01b0 v\\u1ea5n t\\u1ea7m so\\u00e1t ung th\\u01b0\\u201d.<\\/p>\"},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/watch?v=miHa-stI7oI\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bao-gia-noi-that-go-oc-cho-3.jpg', NULL, 1, 2, 3, 'delete', 1, 1, '2022-06-01 08:27:54', '2022-09-14 05:13:09'),
(26, 12, 'resource', 'Tin mẫu thi công dự án 04', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bao-gia-noi-that-go-oc-cho-3.jpg\\\" \\/>Vi\\u1ec7t Nam l\\u1ea7n th\\u1ee9 29 \\u2013 VIETNAM MEDI-PHARM 2022\\u201d t\\u1ed5 ch\\u1ee9c ch\\u01b0\\u01a1ng tr\\u00ecnh \\u201cPh\\u1ed5 c\\u1eadp ki\\u1ebfn th\\u1ee9c \\u2013 T\\u01b0 v\\u1ea5n t\\u1ea7m so\\u00e1t ung th\\u01b0\\u201d.<\\/p>\"},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/watch?v=miHa-stI7oI\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bao-gia-noi-that-go-oc-cho-3.jpg', NULL, 1, 1, 3, 'delete', 1, 1, '2022-06-01 08:27:54', '2022-09-14 05:13:07'),
(27, 12, 'resource', 'Tin mẫu thi công dự án 03', '{\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size\"},\"content\":{\"vi\":\"<p style=\\\"text-align: center;\\\"><img alt=\\\"\\\" src=\\\"\\/data\\/other\\/1\\/bao-gia-noi-that-go-oc-cho-3.jpg\\\" \\/>Vi\\u1ec7t Nam l\\u1ea7n th\\u1ee9 29 \\u2013 VIETNAM MEDI-PHARM 2022\\u201d t\\u1ed5 ch\\u1ee9c ch\\u01b0\\u01a1ng tr\\u00ecnh \\u201cPh\\u1ed5 c\\u1eadp ki\\u1ebfn th\\u1ee9c \\u2013 T\\u01b0 v\\u1ea5n t\\u1ea7m so\\u00e1t ung th\\u01b0\\u201d.<\\/p>\"},\"gallery_video\":{\"1654071906938\":{\"title\":\"Youtube video\",\"source\":\"https:\\/\\/www.youtube.com\\/watch?v=miHa-stI7oI\"},\"1654071907137\":{\"title\":\"Upload video\",\"source\":\"\\/data\\/videos\\/demo\\/mov_bbb.mp4\"}},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/1/bao-gia-noi-that-go-oc-cho-3.jpg', NULL, 1, 7, 3, 'delete', 1, 1, '2022-06-01 08:27:54', '2022-09-14 05:13:05'),
(36, 1, 'post', 'Quản lý tài khoản', '{\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"related_post\":[\"18\",\"17\",\"3\",\"2\",\"1\"]}', NULL, NULL, 0, 3, NULL, 'delete', 1, 1, '2022-07-18 02:34:33', '2022-08-06 03:18:53'),
(37, 18, 'post', 'Về chúng tôi', '{\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/3.jpg', '/data/cms-image/post/3.jpg', 0, 4, 99, 'delete', 1, 1, '2022-08-06 08:23:52', '2022-09-14 03:28:00'),
(38, 18, 'post', 'Hạng mục', '{\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/3.jpg', '/data/cms-image/post/3.jpg', 0, 1, 99, 'delete', 1, 1, '2022-08-06 08:24:21', '2022-09-14 03:27:57'),
(39, 17, 'service', 'Kiến trúc nhà phố', '{\"price\":\"450000\",\"price_currency\":\"\\u20ab\",\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size.\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/bg.jpg', '/data/cms-image/service/bg.jpg', 0, 6, 6, 'delete', 1, 1, '2022-02-13 15:59:41', '2022-09-14 04:03:45'),
(40, 17, 'service', 'Nội thất nhà hàng, cafe, spa,...', '{\"price\":\"450000\",\"price_currency\":\"\\u20ab\",\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size.\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/bg.jpg', '/data/cms-image/service/bg.jpg', 0, 5, 5, 'delete', 1, 1, '2022-02-13 15:59:41', '2022-09-14 04:03:43'),
(41, 17, 'service', 'Nội thất văn phòng', '{\"price\":\"450000\",\"price_currency\":\"\\u20ab\",\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size.\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/bg.jpg', '/data/cms-image/service/bg.jpg', 0, 5, 4, 'delete', 1, 1, '2022-02-13 15:59:41', '2022-09-14 04:03:41'),
(42, 17, 'service', 'Nội thất nhà phố', '{\"price\":\"450000\",\"price_currency\":\"\\u20ab\",\"brief\":{\"vi\":\"Powerful Layout with Responsive functionality that can be adapted to any screen size.\"},\"content\":{\"vi\":\"<h2><strong>Quy tr\\u00ecnh trong thi\\u1ebft k\\u1ebf n\\u1ed9i thi c\\u00f4ng th\\u1ea5t chung c\\u01b0 c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t<\\/strong><\\/h2>\\r\\n\\r\\n<h3><strong>1. Thu th\\u1eadp th\\u00f4ng tin, t\\u01b0 v\\u1ea5n \\u00fd t\\u01b0\\u1edfng<\\/strong><\\/h3>\\r\\n\\r\\n<p>Nh\\u00e2n vi\\u00ean t\\u01b0 v\\u1ea5n c\\u1ee7a N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t ti\\u1ebfp nh\\u1eadn y\\u00eau c\\u1ea7u c\\u1ee7a kh\\u00e1ch h\\u00e0ng, trao \\u0111\\u1ed5i h\\u1ed7 tr\\u1ee3 \\u00fd t\\u01b0\\u1edfng thi\\u1ebft k\\u1ebf v\\u00e0 ch\\u1ecdn ch\\u1ea5t li\\u1ec7u ph\\u00f9 h\\u1ee3p d\\u1ef1a v\\u00e0o t\\u00ecnh h\\u00ecnh t\\u00e0i ch\\u00ednh c\\u1ee7a ch\\u1ee7 nh\\u00e0.<\\/p>\\r\\n\\r\\n<h3><strong>2. Kh\\u1ea3o s\\u00e1t c\\u00f4ng tr\\u00ecnh<\\/strong><\\/h3>\\r\\n\\r\\n<p>X\\u00e1c \\u0111\\u1ecbnh r\\u00f5 m\\u1ee5c \\u0111\\u00edch thi\\u1ebft, d\\u1ef1a tr\\u00ean di\\u1ec7n t\\u00edch t\\u00ednh to\\u00e1n c\\u00e1c th\\u00f4ng s\\u1ed1 \\u0111\\u1ec3 gi\\u00fap kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu, phong c\\u00e1ch thi\\u1ebft k\\u1ebf theo \\u00fd t\\u01b0\\u1edfng v\\u00e0 mong mu\\u1ed1n c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>3. K\\u00fd k\\u1ebft h\\u1ee3p \\u0111\\u1ed3ng thi\\u1ebft k\\u1ebf n\\u1ed9i th\\u1ea5t chung c\\u01b0<\\/strong><\\/h3>\\r\\n\\r\\n<p>Sau khi kh\\u1ea3o s\\u00e1t, N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd x\\u00e1c \\u0111\\u1ecbnh \\u0111\\u01b0\\u1ee3c ph\\u01b0\\u01a1ng \\u00e1n t\\u1ed1i \\u01b0u cho c\\u00f4ng tr\\u00ecnh, sau t\\u1eeb 2-4 ng\\u00e0y t\\u00f9y theo kh\\u1ed1i l\\u01b0\\u1ee3ng c\\u00f4ng vi\\u1ec7c N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd thi\\u1ebft k\\u1ebf ra m\\u1eb7t b\\u1eb1ng t\\u1eeb 2D \\u0111\\u1ec3 l\\u00ean ph\\u01b0\\u01a1ng \\u00e1n cho kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu.<\\/p>\\r\\n\\r\\n<p>Sau khi kh\\u00e1ch h\\u00e0ng ch\\u1ecdn m\\u1eabu N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd ti\\u1ebfn h\\u00e0nh b\\u00e1o gi\\u00e1 d\\u1ef1a tr\\u00ean h\\u1ea1ng m\\u1ee5c c\\u00f3 s\\u1eb5n c\\u00f9ng c\\u00e1c y\\u00eau c\\u1ea7u ri\\u00eang c\\u1ee7a kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<h3><strong>4. Thi\\u1ebft k\\u1ebf b\\u1ea3n v\\u1ebd 3D<\\/strong><\\/h3>\\r\\n\\r\\n<p>N\\u1ed9i Th\\u1ea5t Nh\\u00e0 Vi\\u1ec7t s\\u1ebd g\\u1eedi c\\u00e1c h\\u00ecnh \\u1ea3nh c\\u00e1c b\\u1ea3n v\\u1ebd 3D chi ti\\u1ebft t\\u1eebng c\\u0103n ph\\u00f2ng (t\\u1eeb \\u0111\\u01b0\\u1eddng n\\u00e9t, \\u0111\\u1ed9 d\\u00e0i, chi\\u1ec1u cao\\u2026)qua cho kh\\u00e1ch h\\u00e0ng.<\\/p>\\r\\n\\r\\n<p>K\\u00e8m theo \\u0111\\u00f3 l\\u00e0 s\\u1ef1 thi\\u1ebft k\\u1ebf ph\\u1ed1i m\\u00e0u s\\u1eafc \\u0111\\u1ec3 kh\\u00e1ch h\\u00e0ng c\\u00f3 th\\u1ec3 h\\u00ecnh dung \\u0111\\u01b0\\u1ee3c t\\u1ed5ng th\\u1ec3 b\\u1ed1 c\\u1ee5c s\\u1ea3n ph\\u1ea9m sau khi thi\\u1ebft k\\u1ebf.<\\/p>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/bg.jpg', '/data/cms-image/service/bg.jpg', 1, 42, 3, 'delete', 1, 1, '2022-02-13 15:59:41', '2022-09-14 04:03:39'),
(43, 27, 'product', 'Thiết kế kiến trúc', '{\"price\":\"25000000\",\"price_old\":\"35000000\",\"brief\":{\"vi\":\"13.7 inch USB extension cable extension perfect for travel USB hub \\/ Adds 4 USB 3.0 ports to your computer \\/ Backward compatible with USB 2.0 and 1.1 specifications Ready Out-of-Box\"},\"content\":{\"vi\":\"<h3>Micro USB Hub 2.0 Combo 3 Ports Card Reader High Speed USB Splitter All In One USB 3.0 Hub or PC Computer Accessories Notebook<\\/h3>\\r\\n\\r\\n<h4>Specification:<\\/h4>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Item Name: USB Hub Combo<\\/li>\\r\\n\\t<li>USB Ports: 3 Ports<\\/li>\\r\\n\\t<li>Card Reader: Support MS,M2,SD\\/MMC,TF card<\\/li>\\r\\n\\t<li>Cable: 3.0 for 20cm,2.0 for 40cm - Size: 77*45*25mm<\\/li>\\r\\n\\t<li>Date Transfer Rate: Upto 480mbps\\/5Gmbps<\\/li>\\r\\n\\t<li>Color: White - Compatible: Windows XP\\/2000\\/Vista\\/WIN 7\\/8\\/10,Mac OS,etc.<\\/li>\\r\\n<\\/ul>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"related_post\":[\"46\",\"44\"]}', '/data/cms-image/post/1.jpg', NULL, 1, 41, 1, 'active', 1, 1, '2022-09-21 06:54:39', '2022-09-24 01:42:53'),
(44, 27, 'product', 'Cửa cuốn Austdoor C70', '{\"price\":\"50000000\",\"price_old\":\"65000000\",\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/2.jpg', NULL, 1, 3, 1, 'active', 1, 1, '2022-09-21 07:01:58', '2022-10-19 07:35:24'),
(45, 17, 'service', 'Cung cấp thiết bị cửa cuốn', '{\"price\":null,\"price_currency\":null,\"brief\":{\"vi\":\"C\\u1eeda g\\u1ed7\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/service/cuacuon.jpg', NULL, 1, 1, 3, 'active', 1, 1, '2022-09-22 04:52:19', '2022-10-19 08:20:38'),
(46, 27, 'product', 'Cửa cuốn Austdoor C71', '{\"price\":\"50000000\",\"price_old\":\"65000000\",\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null,\"related_post\":[\"44\",\"43\"]}', '/data/cms-image/post/2.jpg', NULL, 1, 14, 1, 'active', 1, 1, '2022-09-21 07:01:58', '2022-10-19 04:47:22'),
(47, 30, 'product', 'Thiết kế kiến trúc', '{\"price\":\"25000000\",\"price_old\":\"35000000\",\"brief\":{\"vi\":\"13.7 inch USB extension cable extension perfect for travel USB hub \\/ Adds 4 USB 3.0 ports to your computer \\/ Backward compatible with USB 2.0 and 1.1 specifications Ready Out-of-Box\"},\"content\":{\"vi\":\"<h3>Micro USB Hub 2.0 Combo 3 Ports Card Reader High Speed USB Splitter All In One USB 3.0 Hub or PC Computer Accessories Notebook<\\/h3>\\r\\n\\r\\n<h4>Specification:<\\/h4>\\r\\n\\r\\n<ul>\\r\\n\\t<li>Item Name: USB Hub Combo<\\/li>\\r\\n\\t<li>USB Ports: 3 Ports<\\/li>\\r\\n\\t<li>Card Reader: Support MS,M2,SD\\/MMC,TF card<\\/li>\\r\\n\\t<li>Cable: 3.0 for 20cm,2.0 for 40cm - Size: 77*45*25mm<\\/li>\\r\\n\\t<li>Date Transfer Rate: Upto 480mbps\\/5Gmbps<\\/li>\\r\\n\\t<li>Color: White - Compatible: Windows XP\\/2000\\/Vista\\/WIN 7\\/8\\/10,Mac OS,etc.<\\/li>\\r\\n<\\/ul>\"},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/1.jpg', NULL, 1, 42, 1, 'active', 1, 1, '2022-09-21 06:54:39', '2022-10-19 04:29:20'),
(48, 28, 'product', 'Cửa cuốn Austdoor C71', '{\"price\":\"50000000\",\"price_old\":\"65000000\",\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', '/data/cms-image/post/2.jpg', NULL, 1, 15, 1, 'active', 1, 1, '2022-09-21 07:01:58', '2022-10-19 07:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cms_taxonomys`
--

CREATE TABLE `tb_cms_taxonomys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `taxonomy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_cms_taxonomys`
--

INSERT INTO `tb_cms_taxonomys` (`id`, `taxonomy`, `parent_id`, `title`, `json_params`, `is_featured`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'post', NULL, 'Sự kiện & Báo chí', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 3, 'active', 1, 1, '2021-10-15 03:19:10', '2022-09-14 03:27:30'),
(2, 'post', NULL, 'Chia sẻ kiến thức', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 2, 'delete', 1, 1, '2021-10-15 04:01:59', '2022-08-06 08:14:45'),
(3, 'service', NULL, 'Thiết kế kiến trúc', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 1, 'delete', 1, 1, '2022-02-12 08:10:39', '2022-08-20 04:58:57'),
(4, 'post', NULL, 'Báo giá', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 2, 'delete', 1, 1, '2022-02-13 15:02:31', '2022-08-18 04:01:46'),
(5, 'product', NULL, 'Sản phẩm', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, NULL, 'delete', 1, 1, '2022-02-13 16:35:52', '2022-08-06 02:32:27'),
(6, 'gallery', NULL, 'Bộ ảnh của bé', '{\"brief\":{\"vi\":null},\"image\":null,\"image_background\":null}', 0, NULL, 'delete', 1, 1, '2022-02-13 18:03:11', '2022-02-15 10:31:26'),
(11, 'resource', NULL, 'Hướng dẫn sử dụng', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null}}', 0, NULL, 'delete', 1, 1, '2022-06-01 02:46:19', '2022-08-05 08:38:17'),
(12, 'resource', NULL, 'Thư viện Media', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, NULL, 'delete', 1, 1, '2022-06-01 02:46:34', '2022-09-26 03:58:37'),
(14, 'product', 5, 'Máy siêu âm', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, NULL, 'delete', 1, 1, '2022-06-16 09:27:21', '2022-08-06 02:32:28'),
(17, 'service', NULL, 'Dịch vụ nổi bật', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, NULL, 'active', 1, 1, '2022-08-06 02:39:04', '2022-09-22 04:48:01'),
(18, 'post', NULL, 'Giới thiệu', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 1, 'delete', 1, 1, '2022-08-06 08:22:34', '2022-09-14 03:27:43'),
(19, 'tags', NULL, 'CNTT', NULL, 0, NULL, 'delete', 1, 1, '2022-08-19 07:10:59', '2022-09-13 07:43:12'),
(20, 'tags', NULL, 'SEO', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, NULL, 'delete', 1, 1, '2022-08-19 07:11:09', '2022-09-13 07:43:10'),
(21, 'tags', NULL, 'Graphic Design', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, NULL, 'delete', 1, 1, '2022-08-19 07:11:39', '2022-09-13 07:43:14'),
(22, 'tags', NULL, 'Website Template', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, NULL, 'delete', 1, 1, '2022-08-19 07:11:47', '2022-09-13 07:43:08'),
(23, 'tags', NULL, 'Responsive', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, NULL, 'delete', 1, 1, '2022-08-19 07:11:53', '2022-09-13 07:43:04'),
(24, 'post', NULL, 'Tuyển dụng', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 0, 2, 'delete', 1, 1, '2022-08-19 07:41:33', '2022-09-14 03:27:46'),
(25, 'tags', NULL, 'Làm đẹp', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 1, 'delete', 1, 1, '2022-09-14 03:02:08', '2022-09-26 03:58:45'),
(26, 'tags', NULL, 'Phong thái', '{\"image\":null,\"image_background\":null,\"brief\":{\"vi\":null},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 2, 'delete', 1, 1, '2022-09-14 03:02:30', '2022-09-26 03:58:48'),
(27, 'product', NULL, 'Cửa cuốn Austdoor', '{\"image\":\"\\/data\\/cms-image\\/icon\\/computer-dark.png\",\"image_background\":null,\"brief\":{\"vi\":\"easy and effective way to get your device repaired\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 1, 'active', 1, 1, '2022-09-21 06:48:44', '2022-09-22 04:04:53'),
(28, 'product', NULL, 'Cửa cuốn Netdoor', '{\"image\":\"\\/data\\/cms-image\\/icon\\/diagnostic-dark.png\",\"image_background\":null,\"brief\":{\"vi\":\"easy and effective way to get your device repaired\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 2, 'active', 1, 1, '2022-09-21 06:59:09', '2022-09-22 04:04:52'),
(29, 'product', NULL, 'Cửa cuốn Eurodoor', '{\"image\":\"\\/data\\/cms-image\\/icon\\/flash-drive-dark.png\",\"image_background\":null,\"brief\":{\"vi\":\"easy and effective way to get your device repaired\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 3, 'active', 1, 1, '2022-09-21 06:59:43', '2022-09-22 04:04:51'),
(30, 'product', NULL, 'Cửa cuốn Masterdoor', '{\"image\":\"\\/data\\/cms-image\\/icon\\/printer-dark.png\",\"image_background\":null,\"brief\":{\"vi\":\"easy and effective way to get your device repaired\"},\"content\":{\"vi\":null},\"seo_title\":null,\"seo_keyword\":null,\"seo_description\":null}', 1, 4, 'active', 1, 1, '2022-09-21 07:00:20', '2022-09-22 04:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_components`
--

CREATE TABLE `tb_components` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `component_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_components`
--

INSERT INTO `tb_components` (`id`, `component_code`, `parent_id`, `title`, `brief`, `content`, `json_params`, `image`, `image_background`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'menu', NULL, 'Main menu', NULL, NULL, '{\"menu_id\":\"24\"}', NULL, NULL, 1, 'active', 1, 1, '2022-05-04 08:23:05', '2022-05-20 01:38:02'),
(2, 'banner_image', NULL, 'Adv banner', NULL, NULL, NULL, '/data/cms-image/banner/no-banner.jpg', NULL, 2, 'active', 1, 1, '2022-05-04 10:25:30', '2022-05-04 10:25:30'),
(3, 'menu', NULL, 'Primary sidebar', 'Primary sidebar section', NULL, '{\"menu_id\":\"33\"}', NULL, NULL, 3, 'active', 1, 1, '2022-05-19 07:24:44', '2022-05-20 01:38:15'),
(4, 'custom', NULL, 'Footer content', NULL, NULL, NULL, NULL, NULL, 4, 'active', 1, 1, '2022-05-19 15:21:27', '2022-05-19 15:21:27'),
(5, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 5, 'delete', 1, 1, '2022-05-20 04:24:40', '2022-05-20 06:23:36'),
(6, NULL, 2, 'Right banner 1', 'Description to this banner', NULL, '{\"url_link\":\"#\",\"url_link_title\":\"Show now\",\"target\":\"_self\"}', '/data/cms-image/meta-logo-favicon.png', NULL, 1, 'active', 1, 1, '2022-05-20 04:27:07', '2022-05-20 04:27:07'),
(7, NULL, 2, 'Right banner 2', NULL, NULL, '{\"url_link\":\"#\",\"url_link_title\":\"View more\",\"target\":\"_self\"}', '/data/banner/architektura-5.jpg', NULL, 2, 'active', 1, 1, '2022-05-20 06:25:03', '2022-05-20 06:25:03'),
(8, NULL, 2, 'Right banner 3', NULL, NULL, '{\"url_link\":null,\"url_link_title\":null,\"target\":\"_self\"}', '/data/banner/ewx_cslxkaio8su.jpg', NULL, 3, 'active', 1, 1, '2022-05-20 06:27:24', '2022-05-20 06:27:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_component_configs`
--

CREATE TABLE `tb_component_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `component_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_component_configs`
--

INSERT INTO `tb_component_configs` (`id`, `name`, `description`, `component_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Menu', NULL, 'menu', NULL, 1, 1, 'active', 1, 1, '2022-04-26 09:53:00', '2022-04-26 09:53:00'),
(2, 'Custom', NULL, 'custom', NULL, 1, 2, 'active', 1, 1, '2022-04-26 09:53:17', '2022-04-26 09:53:17'),
(3, 'Banner / Image', NULL, 'banner_image', NULL, 1, 3, 'active', 1, 1, '2022-04-26 09:53:50', '2022-04-26 09:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'contact',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `is_type`, `name`, `email`, `phone`, `subject`, `content`, `admin_note`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'newsletter', NULL, 'huuthangb2k50@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2022-06-02 08:02:36', '2022-06-02 08:02:36'),
(16, 'newsletter', NULL, 'thangnh.edu@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 'active', NULL, NULL, '2022-09-13 09:54:38', '2022-09-13 09:54:38'),
(19, 'contact', 'Thắng Nguyễn 2', 'huuthangb2k50@gmail.com', '098 226 9600', NULL, 'Gửi thử liên hệ từ nhật việt', NULL, NULL, NULL, 'new', NULL, NULL, '2022-09-24 10:29:11', '2022-09-24 10:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_logs`
--

CREATE TABLE `tb_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url_referer` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `params` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logged_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_menus`
--

CREATE TABLE `tb_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_menus`
--

INSERT INTO `tb_menus` (`id`, `parent_id`, `name`, `description`, `url_link`, `menu_type`, `system_code`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(24, NULL, 'Menu đầu trang', 'Menu link for main navbar', NULL, 'header', NULL, NULL, 1, 'active', 1, 1, '2022-05-10 10:29:01', '2022-08-10 06:52:06'),
(27, 24, 'Dịch vụ', NULL, 'http://127.0.0.1:8000/danh-muc-dich-vu', 'main', 'public', '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2021-12-08 02:51:06', '2022-10-19 08:17:36'),
(31, 24, 'Liên hệ', NULL, 'http://127.0.0.1:8000/lien-he', NULL, NULL, '{\"target\":\"_self\"}', 4, 'active', 1, 1, '2022-05-18 16:52:41', '2022-10-19 08:17:36'),
(33, NULL, 'LIÊN KẾT NHANH', 'Hiển thị liên kết cuối chân trang', NULL, 'footer', NULL, NULL, 2, 'active', 1, 1, '2022-05-18 18:47:23', '2022-09-13 10:06:49'),
(34, 33, 'Điều khoản dịch vụ', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-05-18 18:49:06', '2022-08-18 04:34:19'),
(35, 33, 'Chính sách bảo mật', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-05-18 18:49:24', '2022-08-18 04:34:32'),
(36, NULL, 'Menu cuối trang #2', NULL, NULL, 'footer', NULL, NULL, 3, 'delete', 1, 1, '2022-06-02 07:25:15', '2022-08-05 10:14:07'),
(37, 36, 'Chính sách bảo mật thông tin', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-06-02 07:25:33', '2022-06-02 07:25:33'),
(38, 36, 'Hướng dẫn tra cứu', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-06-02 07:25:44', '2022-06-02 07:25:44'),
(46, 33, 'Câu hỏi thường gặp', NULL, '#', NULL, NULL, '{\"target\":\"_self\"}', 3, 'active', 1, 1, '2022-08-05 10:15:12', '2022-08-18 04:34:42'),
(58, 24, 'Trang chủ', NULL, 'http://127.0.0.1:8000', NULL, NULL, '{\"target\":\"_self\"}', 1, 'active', 1, 1, '2022-08-17 09:34:50', '2022-10-19 08:17:36'),
(59, 24, 'Sản phẩm', NULL, 'http://127.0.0.1:8000/danh-muc-san-pham', NULL, NULL, '{\"target\":\"_self\"}', 2, 'active', 1, 1, '2022-08-22 10:46:36', '2022-10-19 08:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `tb_modules`
--

CREATE TABLE `tb_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_modules`
--

INSERT INTO `tb_modules` (`id`, `module_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'admins', 'Quản lý người dùng', 'Chức năng quản lý người dùng hệ thống', 100, 'active', 1, 1, '2021-10-01 12:35:15', '2022-08-08 06:47:54'),
(5, 'admin_menus', 'Quản lý Menu Admin', NULL, 102, 'active', 1, 1, '2022-03-04 05:19:37', '2022-08-08 06:47:53'),
(6, 'roles', 'Quản lý nhóm quyền', NULL, 101, 'active', 1, 1, '2022-03-04 05:20:18', '2022-08-08 06:47:54'),
(7, 'menus', 'Quản lý Menu Website Public', NULL, 94, 'active', 1, 1, '2022-03-04 05:20:46', '2022-08-08 06:49:15'),
(8, 'block_contents', 'Quản lý Khối nội dung', NULL, 96, 'active', 1, 1, '2022-03-04 05:21:07', '2022-08-08 06:49:14'),
(9, 'pages', 'Quản lý Pages - Trang', NULL, 95, 'active', 1, 1, '2022-03-04 05:21:19', '2022-08-08 06:49:15'),
(10, 'cms_taxonomys', 'Quản lý danh mục - thể loại', NULL, 3, 'active', 1, 1, '2022-03-04 05:21:40', '2022-03-04 05:29:06'),
(11, 'cms_posts', 'Quản lý bài viết', NULL, 4, 'active', 1, 1, '2022-03-04 05:22:17', '2022-03-04 05:29:11'),
(12, 'cms_services', 'Quản lý dịch vụ', NULL, 5, 'active', 1, 1, '2022-03-04 05:22:40', '2022-09-26 03:40:49'),
(13, 'cms_products', 'Quản lý sản phẩm', NULL, 6, 'active', 1, 1, '2022-03-04 05:22:52', '2022-09-26 03:41:15'),
(16, 'web_information', 'Quản lý thông tin website', NULL, 91, 'active', 1, 1, '2022-03-04 05:24:37', '2022-08-08 06:49:17'),
(17, 'web_image', 'Quản lý hình ảnh hệ thống', NULL, 92, 'active', 1, 1, '2022-03-04 05:25:38', '2022-08-08 06:49:17'),
(18, 'web_social', 'Quản lý liên kết MXH', NULL, 90, 'active', 1, 1, '2022-03-04 05:25:53', '2022-08-08 06:49:18'),
(19, 'contacts', 'Quản lý liên hệ', NULL, 1, 'active', 1, 1, '2022-03-04 05:26:39', '2022-08-08 06:44:47'),
(21, 'web_source', 'Quản lý mã nhúng CSS - JS', NULL, 93, 'active', 1, 1, '2022-08-08 06:46:02', '2022-08-08 06:49:16'),
(22, 'order_products', 'Quản lý đặt hàng', NULL, NULL, 'active', 1, 1, '2022-08-08 06:50:09', '2022-09-26 03:41:35');

-- --------------------------------------------------------

--
-- Table structure for table `tb_module_functions`
--

CREATE TABLE `tb_module_functions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_id` bigint(20) UNSIGNED NOT NULL,
  `function_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_module_functions`
--

INSERT INTO `tb_module_functions` (`id`, `module_id`, `function_code`, `name`, `description`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(7, 19, 'contacts.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 05:32:15', '2022-03-04 05:35:40'),
(8, 19, 'contacts.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 05:35:45', '2022-03-04 05:35:45'),
(9, 19, 'contacts.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 05:35:48', '2022-03-04 05:35:48'),
(10, 19, 'contacts.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 05:35:51', '2022-03-04 05:35:51'),
(11, 19, 'contacts.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 05:35:55', '2022-03-04 05:35:55'),
(12, 19, 'contacts.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 05:35:58', '2022-03-04 05:35:58'),
(27, 1, 'admins.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(28, 1, 'admins.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(29, 1, 'admins.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(30, 1, 'admins.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(31, 1, 'admins.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(32, 1, 'admins.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(39, 5, 'admin_menus.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(40, 5, 'admin_menus.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(41, 5, 'admin_menus.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(42, 5, 'admin_menus.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(43, 5, 'admin_menus.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(44, 5, 'admin_menus.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(45, 6, 'roles.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(46, 6, 'roles.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(47, 6, 'roles.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(48, 6, 'roles.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(49, 6, 'roles.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(50, 6, 'roles.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(51, 7, 'menus.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(52, 7, 'menus.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(53, 7, 'menus.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(54, 7, 'menus.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(55, 7, 'menus.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(56, 7, 'menus.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(57, 8, 'block_contents.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(58, 8, 'block_contents.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(59, 8, 'block_contents.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(60, 8, 'block_contents.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(61, 8, 'block_contents.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(62, 8, 'block_contents.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(63, 9, 'pages.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(64, 9, 'pages.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(65, 9, 'pages.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(66, 9, 'pages.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(67, 9, 'pages.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(68, 9, 'pages.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(75, 10, 'cms_taxonomys.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(76, 10, 'cms_taxonomys.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(77, 10, 'cms_taxonomys.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(78, 10, 'cms_taxonomys.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(79, 10, 'cms_taxonomys.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(80, 10, 'cms_taxonomys.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(81, 11, 'cms_posts.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(82, 11, 'cms_posts.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(83, 11, 'cms_posts.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(84, 11, 'cms_posts.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(85, 11, 'cms_posts.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(86, 11, 'cms_posts.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(87, 12, 'cms_services.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-03-04 06:51:52'),
(88, 12, 'cms_services.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-03-04 06:51:55'),
(89, 12, 'cms_services.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-03-04 06:51:58'),
(90, 12, 'cms_services.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-03-04 06:52:01'),
(91, 12, 'cms_services.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-03-04 06:52:03'),
(92, 12, 'cms_services.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-03-04 06:52:06'),
(93, 13, 'cms_products.index', 'Xem danh sách', NULL, 1, 'active', 1, 1, '2022-03-04 06:51:52', '2022-09-26 03:46:00'),
(94, 13, 'cms_products.create', 'Thêm mới (Form nhập)', NULL, 2, 'active', 1, 1, '2022-03-04 06:51:55', '2022-09-26 03:46:00'),
(95, 13, 'cms_products.store', 'Thêm mới (Lưu thông tin)', NULL, 3, 'active', 1, 1, '2022-03-04 06:51:58', '2022-09-26 03:45:59'),
(96, 13, 'cms_products.edit', 'Sửa thông tin (Form nhập)', NULL, 4, 'active', 1, 1, '2022-03-04 06:52:01', '2022-09-26 03:45:59'),
(97, 13, 'cms_products.update', 'Sửa thông tin (Lưu thông tin)', NULL, 5, 'active', 1, 1, '2022-03-04 06:52:03', '2022-09-26 03:45:58'),
(98, 13, 'cms_products.destroy', 'Xóa', NULL, 6, 'active', 1, 1, '2022-03-04 06:52:06', '2022-09-26 03:45:58'),
(117, 16, 'web.information', 'Xem thông tin website', NULL, 1, 'active', 1, 1, '2022-03-04 07:24:06', '2022-03-04 07:24:06'),
(118, 16, 'web.information.update', 'Cập nhật thông tin website', NULL, 2, 'active', 1, 1, '2022-03-04 07:24:24', '2022-03-04 07:24:24'),
(119, 17, 'web.image', 'Xem hình ảnh hệ thống', NULL, 1, 'active', 1, 1, '2022-03-04 07:25:11', '2022-03-04 07:25:11'),
(120, 17, 'web.image.update', 'Cập nhật hình ảnh hệ thống', NULL, 2, 'active', 1, 1, '2022-03-04 07:25:34', '2022-03-04 07:25:34'),
(121, 18, 'web.social', 'Xem liên kết MXH', NULL, 1, 'active', 1, 1, '2022-03-04 07:26:03', '2022-03-04 07:26:03'),
(122, 18, 'web.social.update', 'Cập nhật liên kết MXH', NULL, 2, 'active', 1, 1, '2022-03-04 07:26:23', '2022-03-04 07:26:23'),
(123, 20, 'call_request.destroy', 'Xóa', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:30', '2022-08-08 06:44:30'),
(124, 20, 'call_request.update', 'Sửa thông tin (Lưu thông tin)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:30', '2022-08-08 06:44:30'),
(125, 20, 'call_request.show', 'Sửa thông tin (Form nhập)', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:31', '2022-08-08 06:44:31'),
(126, 20, 'call_request.index', 'Xem danh sách', NULL, NULL, 'active', 1, 1, '2022-08-08 06:44:31', '2022-08-08 06:44:31'),
(127, 21, 'web.source.update', 'Cập nhật mã', NULL, NULL, 'active', 1, 1, '2022-08-08 06:46:40', '2022-08-08 06:46:40'),
(128, 21, 'web.source', 'Xem chi tiết mã', NULL, NULL, 'active', 1, 1, '2022-08-08 06:46:40', '2022-08-08 06:46:40'),
(129, 22, 'order_products.destroy', 'Xóa', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:30', '2022-09-26 03:43:25'),
(130, 22, 'order_products.update', 'Cập nhật thông tin đơn hàng', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:30', '2022-09-26 07:19:15'),
(131, 22, 'order_products.show', 'Xem chi tiết đơn hàng', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:31', '2022-09-26 07:19:02'),
(132, 22, 'order_products.index', 'Xem danh sách', NULL, NULL, 'active', 1, 1, '2022-08-08 06:51:31', '2022-09-26 03:43:26'),
(133, 22, 'order_details.update', 'Cập nhật thông tin chi tiết sản phẩm đặt hàng', NULL, 1, 'active', 1, 1, '2022-09-26 03:46:52', '2022-09-26 03:47:19'),
(134, 22, 'order_details.destroy', 'Xóa chi tiết sản phẩm đặt hàng', NULL, 2, 'active', 1, 1, '2022-09-26 03:47:02', '2022-09-26 03:47:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_options`
--

CREATE TABLE `tb_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_system_param` tinyint(1) DEFAULT 1,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_options`
--

INSERT INTO `tb_options` (`id`, `option_name`, `option_value`, `description`, `is_system_param`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(2, 'information', '{\"site_name\":\"C\\u00d4NG TY TNHH C\\u01a0 KH\\u00cd X\\u00c2Y D\\u1ef0NG NH\\u1eacT VI\\u1ec6T\",\"slogan\":\"H\\u00e3y b\\u1eaft \\u0111\\u1ea7u ngay c\\u00f9ng Nh\\u1eadt Vi\\u1ec7t \\u0111\\u1ec3 tr\\u1ea3i nghi\\u1ec7m nh\\u1eefng d\\u1ecbch v\\u1ee5 tuy\\u1ec7t v\\u1eddi c\\u1ee7a ch\\u00fang t\\u00f4i\",\"phone\":\"0976 300 448\",\"email\":\"fhmvietnam@gmail.com\",\"address\":\"S\\u1ed1 82, ng\\u00f5 2, \\u0111\\u01b0\\u1eddng Tr\\u1ea7n Ph\\u00fa, H\\u00e0 \\u0110\\u00f4ng, H\\u00e0 N\\u1ed9i\",\"seo_title\":\"C\\u1eeda cu\\u1ed1n Nh\\u1eadt Vi\\u1ec7t\",\"seo_keyword\":null,\"seo_description\":null}', 'Các dữ liệu cấu trúc liên quan đến thông tin liên hệ của hệ thống website', 0, 1, 1, '2021-10-02 05:06:00', '2022-09-23 02:09:33'),
(5, 'image', '{\"logo_header_light\":\"\\/data\\/cms-image\\/logo\\/logo_white.png\",\"logo_header_dark\":\"\\/data\\/cms-image\\/1\\/Mid home logo final-02.png\",\"logo_footer\":\"\\/data\\/cms-image\\/1\\/Mid home logo final-02.png\",\"favicon\":\"\\/data\\/cms-image\\/icon\\/icon.png\",\"background_breadcrumbs\":\"\\/data\\/cms-image\\/banner\\/image-2.jpg\",\"seo_og_image\":\"\\/data\\/cms-image\\/logo\\/logo_dark.png\"}', 'Danh sách các hình ảnh cấu hình trên hệ thống tại các vị trí', 0, 1, 1, '2021-10-11 09:22:56', '2022-10-19 08:30:44'),
(6, 'social', '{\"facebook\":\"https:\\/\\/www.facebook.com\",\"youtube\":\"https:\\/\\/www.youtube.com\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"twitter\":\"https:\\/\\/twitter.com\\/\",\"call_now\":\"097 791 4444\",\"zalo\":\"https:\\/\\/zalo.me\\/0977914444\",\"messenger\":null}', 'Danh sách các Social network của hệ thống', 0, 1, 1, '2022-02-14 10:35:40', '2022-08-18 04:38:45'),
(7, 'page', '{\r\n\"frontend.home\":  1\r\n}', NULL, 0, 1, 1, '2022-05-26 11:03:52', '2022-06-09 04:03:39'),
(8, 'source_code', '{\"css\":null,\"javascript\":null,\"facebook_fanpage\":\"<iframe src=\\\"https:\\/\\/www.facebook.com\\/plugins\\/page.php?href=https%3A%2F%2Fwww.facebook.com%2FFHM.Agency.VN&tabs=timeline&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=511852473216672\\\" width=\\\"100%\\\" height=\\\"250px\\\" style=\\\"border:none;overflow:hidden\\\" scrolling=\\\"no\\\" frameborder=\\\"0\\\" allowfullscreen=\\\"true\\\" allow=\\\"autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share\\\"><\\/iframe>\",\"map\":\"<iframe src=\\\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d3724.85570948349!2d105.82540031546361!3d20.99842029418804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135adc6b03e1cf3%3A0x9c632b0633d53cea!2sFHM%20Agency!5e0!3m2!1svi!2s!4v1661184638120!5m2!1svi!2s\\\" width=\\\"100%\\\" height=\\\"100%\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\\\"><\\/iframe>\"}', NULL, 0, 1, 1, '2022-06-07 02:24:11', '2022-09-22 10:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'product',
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_orders`
--

INSERT INTO `tb_orders` (`id`, `is_type`, `customer_id`, `name`, `email`, `phone`, `address`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(6, 'product', NULL, 'Nguyen Thang', 'huuthangb2k50@gmail.com', '098 226 9600', 'Xuan Khanh, Son Tay, Ha Noi', 'Thu chuc nang', 'Đang xử lý', NULL, 'processing', NULL, 1, '2022-06-17 09:27:34', '2022-06-20 03:00:02'),
(7, 'product', NULL, 'Nguyễn Dũng', NULL, '1900 1570', 'Tây Hồ, HN', NULL, NULL, NULL, 'processed', NULL, 1, '2022-06-17 09:31:11', '2022-06-20 03:56:47'),
(9, 'product', 3, 'Tags', NULL, '0912 568 999', NULL, NULL, NULL, NULL, 'processed', NULL, 1, '2022-07-11 18:55:05', '2022-07-12 18:52:58'),
(10, 'product', NULL, 'Thắng Nguyễn EDU', NULL, '096 220 92 11', NULL, NULL, NULL, NULL, 'new', NULL, 1, '2022-07-11 18:56:00', '2022-07-13 08:10:33'),
(11, 'product', 3, 'Thắng Nguyễn EDU', NULL, '096 220 92 11', NULL, NULL, NULL, NULL, 'processed', NULL, 1, '2022-07-11 18:57:49', '2022-07-13 08:11:54'),
(16, 'product', 3, 'Thắng Nguyễn EDU', NULL, '096 220 92 11', NULL, NULL, NULL, '{\"payment_method\":\"affiliate\"}', 'processed', NULL, 1, '2022-07-14 03:13:34', '2022-07-14 04:08:05'),
(42, 'product', NULL, 'Thắng Nguyễn services', 'huuthangb2k50@gmail.com', '0912 568 999', 'Xuân Khanh, Sơn Tây, Hà nội', 'Gọi điện trước khi gửi hàng', 'Đang xử lý rồi', NULL, 'processed', NULL, 2, '2022-09-26 03:21:27', '2022-09-26 07:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_details`
--

CREATE TABLE `tb_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(20,2) DEFAULT NULL,
  `discount` double(20,2) DEFAULT NULL,
  `customer_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_order_details`
--

INSERT INTO `tb_order_details` (`id`, `order_id`, `item_id`, `quantity`, `price`, `discount`, `customer_note`, `admin_note`, `json_params`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/family-planning.html?id=5\"}', NULL, NULL, NULL, '2022-06-09 03:43:21', '2022-06-09 03:43:21'),
(2, 2, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/intensive-care.html?id=21\"}', NULL, NULL, NULL, '2022-06-09 08:19:49', '2022-06-09 08:19:49'),
(4, 6, 35, 2, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 34, 10, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 6, 33, 5, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-06-20 03:37:55'),
(7, 7, 35, 2, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 7, 34, 10, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 7, 33, 1, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 9, 34, 1, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, 10, 33, 1, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 10, 34, 1, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, 11, 33, 1, 3500000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, 11, 6, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, 12, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/intensive-care.html?id=21\"}', NULL, NULL, NULL, '2022-07-12 09:33:04', '2022-07-12 09:33:04'),
(21, 13, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/intensive-care.html?id=21\"}', NULL, NULL, NULL, '2022-07-12 09:37:34', '2022-07-12 09:37:34'),
(22, 14, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/intensive-care.html?id=21\"}', NULL, NULL, NULL, '2022-07-12 14:33:16', '2022-07-12 14:33:16'),
(23, 15, 4, 1, 450000.00, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/bacha.test\\/dich-vu\\/kham-chua-benh\\/intensive-care.html?id=4\"}', NULL, NULL, NULL, '2022-07-14 02:40:07', '2022-07-14 02:40:07'),
(24, 16, 33, 1, 5000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, 16, 34, 1, 350000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, 17, 21, 1, 50000000.00, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/hluxhome.test\\/dich-vu\\/thiet-ke-kien-truc\\/thiet-ke-noi-that.html?id=21\"}', NULL, NULL, NULL, '2022-08-06 07:29:08', '2022-08-06 07:29:08'),
(45, 37, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/qlady.test\\/khoa-hoc\\/khoa-hoc-trai-nghiem-2h-21.html\"}', NULL, NULL, NULL, '2022-09-14 07:18:51', '2022-09-14 07:18:51'),
(46, 36, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/qlady.test\\/khoa-hoc\\/khoa-hoc-trai-nghiem-2h-21.html\"}', NULL, NULL, NULL, '2022-09-14 07:18:51', '2022-09-14 07:18:51'),
(47, 38, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/qlady.test\\/khoa-hoc\\/khoa-hoc-trai-nghiem-2h-21.html\"}', NULL, NULL, NULL, '2022-09-14 07:20:43', '2022-09-14 07:20:43'),
(48, 39, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/qlady.test\\/khoa-hoc\\/khoa-hoc-trai-nghiem-2h-21.html\"}', NULL, NULL, NULL, '2022-09-14 07:20:43', '2022-09-14 07:20:43'),
(49, 40, 21, 1, NULL, NULL, NULL, NULL, '{\"post_type\":\"service\",\"post_link\":\"http:\\/\\/qlady.test\\/khoa-hoc\\/khoa-hoc-trai-nghiem-2h-21.html\"}', NULL, NULL, NULL, '2022-09-14 07:21:05', '2022-09-14 07:21:05'),
(52, 42, 46, 2, 50000000.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(53, 42, 44, 2, 50000000.00, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, '2022-09-26 03:27:02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pages`
--

CREATE TABLE `tb_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keyword` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_pages`
--

INSERT INTO `tb_pages` (`id`, `name`, `title`, `keyword`, `description`, `content`, `route_name`, `alias`, `json_params`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Trang chủ', NULL, NULL, NULL, NULL, 'frontend.home', 'trang-chu', '{\"og_image\":null,\"template\":\"home.primary\",\"block_content\":[\"250\",\"74\",\"106\",\"19\",\"84\",\"82\",\"79\",\"251\",\"83\",\"93\"]}', 1, 'active', 1, 1, '2022-03-23 09:35:33', '2022-10-19 03:24:20'),
(3, 'Bài viết', 'Bài viết mới', NULL, NULL, NULL, 'frontend.cms.post', 'bai-viet', '{\"og_image\":null,\"template\":\"post.default\",\"block_content\":[\"112\",\"94\",\"93\"]}', 2, 'active', 1, 1, '2022-06-02 11:20:50', '2022-09-24 08:59:08'),
(4, 'Chi tiết bài viết', NULL, NULL, NULL, NULL, 'frontend.cms.post.detail', 'chi-tiet-bai-viet', '{\"og_image\":null,\"template\":\"post.detail\",\"block_content\":[\"112\",\"94\",\"93\"]}', 3, 'active', 1, 1, '2022-06-03 02:52:10', '2022-09-23 03:48:03'),
(5, 'Dịch vụ', 'Dịch vụ nổi bật', NULL, NULL, NULL, 'frontend.cms.service', 'dich-vu', '{\"og_image\":null,\"template\":\"service.default\",\"block_content\":[\"112\",\"94\",\"93\"]}', 4, 'active', 1, 1, '2022-06-03 03:48:58', '2022-09-23 10:00:11'),
(6, 'Chi tiết dịch vụ', NULL, NULL, NULL, NULL, 'frontend.cms.service.detail', 'chi-tiet-dich-vu', '{\"og_image\":null,\"template\":\"service.detail\",\"block_content\":[\"112\",\"94\",\"243\",\"93\"]}', 5, 'active', 1, 1, '2022-06-03 03:50:17', '2022-09-14 03:07:47'),
(10, 'Thư viện', 'Thư viện Media', NULL, NULL, NULL, 'frontend.cms.resource', 'thu-vien', '{\"og_image\":null,\"template\":\"resource.default\",\"block_content\":[\"112\",\"94\",\"243\",\"93\"]}', 9, 'delete', 1, 1, '2022-06-03 08:26:47', '2022-09-23 03:48:26'),
(11, 'Giỏ hàng', NULL, NULL, NULL, NULL, 'frontend.order.cart', 'gio-hang', '{\"og_image\":null,\"template\":\"cart.default\",\"block_content\":[\"112\",\"94\",\"93\"]}', 10, 'active', 1, 1, '2022-06-03 08:27:09', '2022-09-23 03:50:10'),
(13, 'Liên hệ', 'Liên hệ với chúng tôi', NULL, NULL, NULL, 'frontend.contact', 'lien-he', '{\"og_image\":null,\"template\":\"contact.default\",\"block_content\":[\"112\",\"94\",\"251\",\"252\"]}', 11, 'active', 1, 1, '2022-06-07 07:35:49', '2022-10-19 07:19:59'),
(18, 'Tags', NULL, NULL, NULL, NULL, 'frontend.cms.tags', 'tags', '{\"og_image\":null,\"template\":\"tags.default\",\"block_content\":[\"112\",\"94\",\"243\",\"93\"]}', 16, 'active', 1, 1, '2022-07-18 03:37:09', '2022-09-14 03:08:19'),
(19, 'Tìm kiếm', NULL, NULL, NULL, NULL, 'frontend.search', 'tim-kiem', '{\"og_image\":null,\"template\":\"search.default\",\"block_content\":[\"112\",\"94\",\"243\",\"93\"]}', 17, 'active', 1, 1, '2022-07-18 08:36:34', '2022-09-14 03:08:26'),
(27, 'Danh sách sản phẩm', NULL, NULL, 'Our design services starts and ends with a best in class experience\r\nstrategy that builds brands.', NULL, 'frontend.cms.product', 'danh-sach-san-pham', '{\"og_image\":\"\\/data\\/cms-image\\/1\\/main-slider-v1-3.jpg\",\"template\":\"product.default\",\"block_content\":[\"112\",\"94\",\"252\"]}', NULL, 'active', 1, 1, '2022-09-23 04:08:13', '2022-10-19 04:55:02'),
(28, 'Chi tiết sản phẩm', NULL, NULL, NULL, NULL, 'frontend.cms.product.detail', 'chi-tiet-san-pham', '{\"og_image\":null,\"template\":\"product.detail\",\"block_content\":[\"112\",\"94\",\"93\"]}', NULL, 'active', 1, 1, '2022-09-23 07:30:49', '2022-09-23 07:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `tb_popups`
--

CREATE TABLE `tb_popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_popups`
--

INSERT INTO `tb_popups` (`id`, `title`, `content`, `image`, `json_params`, `start_time`, `end_time`, `duration`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Home Popup', '<p>Nullam mollis ultrices est. Nulla in justo lacinia, scelerisque purus et, semper tortor. Donec bibendum leo vitae commodo porttitor. Proin tempus sollicitudin odio in feugiat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ultrices vitae nisl tristique commodo. Phasellus porttitor metus at mattis ultricies. In imperdiet nec nunc in tincidunt.</p>\r\n\r\n<p>Curabitur faucibus dolor at dui lobortis, eget dictum nisi mattis. Fusce risus dui, fringilla non elit sit amet, lobortis interdum eros. Donec mattis lectus quis elit fermentum lacinia. Nullam at ligula semper ante mollis pretium. Nam euismod velit ut quam accumsan vestibulum. Etiam diam augue, dapibus ac placerat nec, accumsan eget nibh. Cras sodales, leo ut volutpat laoreet, velit enim pharetra magna, at dapibus lacus elit vel mi. Nullam a massa ac ligula scelerisque maximus. Quisque dictum quis lorem ut sodales. Duis at semper odio. Morbi in sapien vel lacus posuere mattis ac eget ante. Etiam viverra accumsan rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>', '/data/cms-image/banner/no-banner.jpg', '{\"page\":[\"1\",\"3\",\"4\"]}', '2022-06-27 00:00:00', '2022-06-28 00:00:00', 5, 'active', 1, 1, '2022-06-27 15:22:00', '2022-06-27 18:01:38'),
(2, 'Thông báo bảo trì hệ thống', NULL, '/data/cms-image/banner/1.jpg', '{\"page\":[\"1\",\"3\",\"4\",\"5\",\"6\",\"7\",\"8\",\"9\",\"10\",\"11\",\"13\",\"14\",\"15\",\"16\"]}', '2022-06-28 00:00:00', '2022-06-28 00:00:00', NULL, 'deactive', 1, 1, '2022-06-27 15:42:38', '2022-06-27 18:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_access` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_access`)),
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_roles`
--

INSERT INTO `tb_roles` (`id`, `name`, `description`, `json_access`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Quyền quản trị nội dung', 'Dành cho nhân viên thiết kế và cập nhật nội dung', '{\"menu_id\":[\"72\",\"61\",\"59\",\"51\",\"52\",\"53\",\"54\",\"69\",\"13\",\"70\",\"46\",\"45\",\"44\",\"71\",\"58\",\"42\",\"41\",\"17\"],\"function_code\":[\"order_products.index\",\"order_products.show\",\"order_products.update\",\"order_details.update\",\"order_details.destroy\",\"contacts.index\",\"contacts.create\",\"contacts.store\",\"contacts.edit\",\"contacts.update\",\"cms_taxonomys.index\",\"cms_taxonomys.create\",\"cms_taxonomys.store\",\"cms_taxonomys.edit\",\"cms_taxonomys.update\",\"cms_posts.index\",\"cms_posts.create\",\"cms_posts.store\",\"cms_posts.edit\",\"cms_posts.update\",\"cms_services.index\",\"cms_services.create\",\"cms_services.store\",\"cms_services.edit\",\"cms_services.update\",\"cms_products.index\",\"cms_products.create\",\"cms_products.store\",\"cms_products.edit\",\"cms_products.update\",\"web.social\",\"web.social.update\",\"web.information\",\"web.information.update\",\"web.image\",\"web.image.update\",\"web.source\",\"web.source.update\",\"menus.index\",\"menus.create\",\"menus.store\",\"menus.edit\",\"menus.update\",\"pages.index\",\"pages.create\",\"pages.store\",\"pages.edit\",\"pages.update\",\"block_contents.index\",\"block_contents.create\",\"block_contents.store\",\"block_contents.edit\",\"block_contents.update\"]}', 1, 'active', 1, 2, '2021-10-02 10:59:48', '2022-09-26 07:19:40'),
(2, 'Quản trị hệ thống', 'Quyền dành cho người quản trị hệ thống', '{\"menu_id\":[\"72\",\"61\",\"59\",\"51\",\"52\",\"53\",\"54\",\"69\",\"13\",\"70\",\"46\",\"45\",\"44\",\"71\",\"58\",\"42\",\"41\",\"17\",\"10\",\"3\",\"5\",\"6\"],\"function_code\":[\"order_products.index\",\"order_products.show\",\"order_products.update\",\"order_products.destroy\",\"order_details.update\",\"order_details.destroy\",\"contacts.index\",\"contacts.create\",\"contacts.store\",\"contacts.edit\",\"contacts.update\",\"contacts.destroy\",\"cms_taxonomys.index\",\"cms_taxonomys.create\",\"cms_taxonomys.store\",\"cms_taxonomys.edit\",\"cms_taxonomys.update\",\"cms_taxonomys.destroy\",\"cms_posts.index\",\"cms_posts.create\",\"cms_posts.store\",\"cms_posts.edit\",\"cms_posts.update\",\"cms_posts.destroy\",\"cms_services.index\",\"cms_services.create\",\"cms_services.store\",\"cms_services.edit\",\"cms_services.update\",\"cms_services.destroy\",\"cms_products.index\",\"cms_products.create\",\"cms_products.store\",\"cms_products.edit\",\"cms_products.update\",\"cms_products.destroy\",\"web.social\",\"web.social.update\",\"web.information\",\"web.information.update\",\"web.image\",\"web.image.update\",\"web.source\",\"web.source.update\",\"menus.index\",\"menus.create\",\"menus.store\",\"menus.edit\",\"menus.update\",\"menus.destroy\",\"pages.index\",\"pages.create\",\"pages.store\",\"pages.edit\",\"pages.update\",\"pages.destroy\",\"block_contents.index\",\"block_contents.create\",\"block_contents.store\",\"block_contents.edit\",\"block_contents.update\",\"block_contents.destroy\",\"admins.index\",\"admins.create\",\"admins.store\",\"admins.edit\",\"admins.update\",\"admins.destroy\",\"roles.index\",\"roles.create\",\"roles.store\",\"roles.edit\",\"roles.update\",\"roles.destroy\",\"admin_menus.index\",\"admin_menus.create\",\"admin_menus.store\",\"admin_menus.edit\",\"admin_menus.update\",\"admin_menus.destroy\"]}', 2, 'active', 1, 2, '2021-10-02 11:28:09', '2022-09-26 07:19:32');

-- --------------------------------------------------------

--
-- Table structure for table `tb_widgets`
--

CREATE TABLE `tb_widgets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `widget_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brief` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_widgets`
--

INSERT INTO `tb_widgets` (`id`, `widget_code`, `title`, `brief`, `json_params`, `image`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'header', 'Header Style 1', 'Header 1 brief content', '{\"layout\":null,\"style\":null,\"component\":[\"1\",\"2\"]}', NULL, 10, 'active', 1, 1, '2022-05-04 14:59:07', '2022-05-10 07:29:20'),
(2, 'footer', 'Footer Style 1', NULL, '{\"layout\":null,\"style\":null,\"component\":[\"2\",\"1\"]}', NULL, 20, 'active', 1, 1, '2022-05-10 07:29:03', '2022-05-10 07:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_widget_configs`
--

CREATE TABLE `tb_widget_configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `widget_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `is_config` tinyint(1) NOT NULL DEFAULT 1,
  `iorder` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `admin_created_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_widget_configs`
--

INSERT INTO `tb_widget_configs` (`id`, `name`, `description`, `widget_code`, `json_params`, `is_config`, `iorder`, `status`, `admin_created_id`, `admin_updated_id`, `created_at`, `updated_at`) VALUES
(1, 'Header', NULL, 'header', NULL, 1, 1, 'active', 1, 1, '2022-04-26 09:40:39', '2022-04-26 09:40:39'),
(2, 'Footer', NULL, 'footer', NULL, 1, 2, 'active', 1, 1, '2022-04-26 09:42:09', '2022-04-26 09:42:09'),
(3, 'Left Sidebar', NULL, 'left_sidebar', NULL, 1, 3, 'active', 1, 1, '2022-04-26 09:42:46', '2022-04-26 09:42:46'),
(4, 'Right Sidebar', NULL, 'right_sidebar', NULL, 1, 4, 'active', 1, 1, '2022-04-26 09:43:02', '2022-04-26 09:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `affiliate_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_score` double NOT NULL DEFAULT 0,
  `total_money` double NOT NULL DEFAULT 0,
  `total_payment` double NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified` tinyint(1) NOT NULL DEFAULT 0,
  `email_verification_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `is_super_user` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `count_view_info` int(11) NOT NULL DEFAULT 0,
  `country_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `json_params` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_params`)),
  `json_profiles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`json_profiles`)),
  `admin_updated_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `affiliate_id`, `affiliate_code`, `total_score`, `total_money`, `total_payment`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `email_verified`, `email_verification_code`, `status`, `is_super_user`, `avatar`, `birthday`, `sex`, `phone`, `count_view_info`, `country_id`, `city_id`, `district_id`, `json_params`, `json_profiles`, `admin_updated_id`) VALUES
(2, NULL, '2', 105091500, 105091500, 0, 'Thắng Nguyễn', 'meta_thangnh', NULL, '$2y$10$V78sbM3Ny/Tvd/bWOLjCLeDDSgLmwlds8tWQh/nhXWCcQheYbtcQy', NULL, '2022-07-11 02:33:03', '2022-07-14 04:28:17', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '098 226 9600', 0, NULL, NULL, NULL, NULL, NULL, 1),
(3, 2, 'mRpdEly6Bx3', 79243750, 79243750, 25850000, 'Thắng Nguyễn EDU', 'huuthangb2k50@gmail.com', NULL, '$2y$10$FLuZlM/WTtFZPKJW4PyC0efVJeTFeWSzichj1d/55v7Qe0aoEKVJu', NULL, '2022-07-11 03:04:45', '2022-07-14 04:28:17', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '096 220 92 11', 0, NULL, NULL, NULL, NULL, NULL, 1),
(4, 3, 'qBmtRsfkwH4', 0, 0, 0, 'Thắng Nguyễn 2', 'meta_test', NULL, '$2y$10$SGOy7paQ82Pt8lbIg1Z0nuAhCR04yxYTIhXbqbK.3HoSSO/FIrumy', NULL, '2022-07-11 03:20:37', '2022-07-11 03:20:37', NULL, 0, NULL, 'active', 0, NULL, NULL, 'female', '1900 1570', 0, NULL, NULL, NULL, NULL, NULL, 1),
(5, 4, 'U7fj3GtOb95', 0, 0, 0, 'Nguyễn Hữu Thắng', 'meta_thangnguyen', NULL, '$2y$10$qb4Y74yT4dQhwk3ER8Cyq.qZBbif//5SLb3JK7PWysraIQ43Gnu/y', NULL, '2022-07-11 03:53:11', '2022-07-11 03:53:11', NULL, 0, NULL, 'active', 0, NULL, NULL, 'male', '0936.267.568', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 3, 'lM2Z3vEmFM6', 0, 0, 0, 'Bắc Hà AFL', 'meta_bacha', NULL, '$2y$10$36l5V8DsEp7rWar78gGaZe2XvrtKfg6qD/XvB/n/DFj7cg8iwF18y', NULL, '2022-07-11 18:08:34', '2022-07-11 18:08:34', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0936.267.568', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, 'ajXYJMQwtg7', 0, 0, 0, 'Lịch sử Apply', 'test_lai', NULL, '$2y$10$GpNMSXWwC4fHsRciLRCabOIZFakxt1KUh.HkD/mAAaBQYw.C03nd.', NULL, '2022-07-11 18:11:04', '2022-07-11 18:11:04', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '0912 568 999', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, '1mQVhkwtR38', 0, 0, 0, 'Đặt lại mật khẩu', 'huuthangb2k250@gmail.com', NULL, '$2y$10$h2VUcj4EumZJHqG/ERzGDex59lR0qff6gkqD/9G4k8NlgE0ASaBEC', NULL, '2022-07-11 18:13:20', '2022-07-11 18:13:20', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '098 226 9600', 0, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 4, 'mLu1qHUYPF9', 0, 0, 0, 'Tags', 'test2@gmail.com', NULL, '$2y$10$g5hcIFbN9zr37wiikne1CuEmLMUC9JMUDfjvyu1URsUGCTLV5h5FK', NULL, '2022-07-11 18:25:50', '2022-07-11 18:30:37', NULL, 0, NULL, 'active', 0, NULL, NULL, NULL, '1900 1570', 0, NULL, NULL, NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD KEY `admins_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `admins_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_admin_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_admin_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_affiliate_historys_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_affiliate_historys_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_affiliate_payments_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_affiliate_payments_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_blocks`
--
ALTER TABLE `tb_blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_blocks_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_blocks_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_block_contents_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_block_contents_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_bookings_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_bookings_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_posts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_posts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_cms_taxonomys_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_cms_taxonomys_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_components`
--
ALTER TABLE `tb_components`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_components_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_components_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_component_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_component_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_contacts_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_contacts_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_logs`
--
ALTER TABLE `tb_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_menus_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_menus_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_modules_module_code_unique` (`module_code`),
  ADD KEY `tb_modules_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_modules_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_module_functions_function_code_unique` (`function_code`),
  ADD KEY `tb_module_functions_module_id_foreign` (`module_id`),
  ADD KEY `tb_module_functions_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_module_functions_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_options`
--
ALTER TABLE `tb_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tb_options_option_name_unique` (`option_name`),
  ADD KEY `tb_options_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_options_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_orders_customer_id_foreign` (`customer_id`),
  ADD KEY `tb_orders_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_orders_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_order_details_order_id_foreign` (`order_id`),
  ADD KEY `tb_order_details_item_id_foreign` (`item_id`),
  ADD KEY `tb_order_details_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_order_details_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_pages_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_pages_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_popups`
--
ALTER TABLE `tb_popups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_popups_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_popups_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_roles_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_roles_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_widgets`
--
ALTER TABLE `tb_widgets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widgets_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widgets_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_widget_configs_admin_created_id_foreign` (`admin_created_id`),
  ADD KEY `tb_widget_configs_admin_updated_id_foreign` (`admin_updated_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_admin_updated_id_foreign` (`admin_updated_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_blocks`
--
ALTER TABLE `tb_blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_components`
--
ALTER TABLE `tb_components`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_logs`
--
ALTER TABLE `tb_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_menus`
--
ALTER TABLE `tb_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tb_modules`
--
ALTER TABLE `tb_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tb_options`
--
ALTER TABLE `tb_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_orders`
--
ALTER TABLE `tb_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tb_pages`
--
ALTER TABLE `tb_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_popups`
--
ALTER TABLE `tb_popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_widgets`
--
ALTER TABLE `tb_widgets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `admins_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_admin_menus`
--
ALTER TABLE `tb_admin_menus`
  ADD CONSTRAINT `tb_admin_menus_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_admin_menus_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_affiliate_historys`
--
ALTER TABLE `tb_affiliate_historys`
  ADD CONSTRAINT `tb_affiliate_historys_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_affiliate_historys_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_affiliate_payments`
--
ALTER TABLE `tb_affiliate_payments`
  ADD CONSTRAINT `tb_affiliate_payments_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_affiliate_payments_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_blocks`
--
ALTER TABLE `tb_blocks`
  ADD CONSTRAINT `tb_blocks_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_blocks_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_block_contents`
--
ALTER TABLE `tb_block_contents`
  ADD CONSTRAINT `tb_block_contents_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_block_contents_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_bookings`
--
ALTER TABLE `tb_bookings`
  ADD CONSTRAINT `tb_bookings_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_bookings_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_cms_posts`
--
ALTER TABLE `tb_cms_posts`
  ADD CONSTRAINT `tb_cms_posts_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_cms_posts_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_cms_taxonomys`
--
ALTER TABLE `tb_cms_taxonomys`
  ADD CONSTRAINT `tb_cms_taxonomys_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_cms_taxonomys_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_components`
--
ALTER TABLE `tb_components`
  ADD CONSTRAINT `tb_components_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_components_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_component_configs`
--
ALTER TABLE `tb_component_configs`
  ADD CONSTRAINT `tb_component_configs_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_component_configs_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD CONSTRAINT `tb_contacts_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_contacts_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_menus`
--
ALTER TABLE `tb_menus`
  ADD CONSTRAINT `tb_menus_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_menus_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_modules`
--
ALTER TABLE `tb_modules`
  ADD CONSTRAINT `tb_modules_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_modules_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_module_functions`
--
ALTER TABLE `tb_module_functions`
  ADD CONSTRAINT `tb_module_functions_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_module_functions_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_options`
--
ALTER TABLE `tb_options`
  ADD CONSTRAINT `tb_options_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_options_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_orders_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_order_details`
--
ALTER TABLE `tb_order_details`
  ADD CONSTRAINT `tb_order_details_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_order_details_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_pages`
--
ALTER TABLE `tb_pages`
  ADD CONSTRAINT `tb_pages_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_pages_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_popups`
--
ALTER TABLE `tb_popups`
  ADD CONSTRAINT `tb_popups_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_popups_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD CONSTRAINT `tb_roles_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_roles_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_widgets`
--
ALTER TABLE `tb_widgets`
  ADD CONSTRAINT `tb_widgets_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_widgets_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `tb_widget_configs`
--
ALTER TABLE `tb_widget_configs`
  ADD CONSTRAINT `tb_widget_configs_admin_created_id_foreign` FOREIGN KEY (`admin_created_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `tb_widget_configs_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_admin_updated_id_foreign` FOREIGN KEY (`admin_updated_id`) REFERENCES `admins` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
