-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 04:13 PM
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
-- Database: `toranowebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_account` varchar(255) NOT NULL,
  `email_account` varchar(255) NOT NULL,
  `password_account` varchar(255) NOT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name_account`, `email_account`, `password_account`, `reset_password_token`, `created_at`, `updated_at`) VALUES
(1, 'root', '', '', '', NULL, NULL),
(2, 'truongvo', 'truong.vd2000@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, NULL, '2023-11-16 14:46:16'),
(6, 'zinham', 'zinhamlovesuu@gmail.com', '8e67cfe9b5daec65ecd5ba1271ec6225', '', '2023-11-15 13:09:06', '2023-11-15 13:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_category` varchar(255) NOT NULL,
  `link_category` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `id_parent` bigint(20) UNSIGNED DEFAULT NULL,
  `status_category` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `link_category`, `sort`, `id_parent`, `status_category`, `created_at`, `updated_at`) VALUES
(1, 'Quần', 'quan', 1, NULL, 1, NULL, NULL),
(2, 'Quần jean', 'quan-jean', 1, 1, 1, NULL, NULL),
(3, 'Quần thun', 'quan-thun', 2, 1, 1, NULL, NULL),
(4, 'Áo', 'ao', 2, NULL, 1, NULL, NULL),
(5, 'Giày', 'giay', 3, NULL, 1, NULL, NULL),
(6, 'Phụ kiện', 'phu-kien', 4, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `desc_color`, `created_at`, `updated_at`, `id_product`) VALUES
(1, 'Xanh đen', NULL, NULL, 1),
(2, 'Xám', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_customer` varchar(255) NOT NULL,
  `email_customer` varchar(255) NOT NULL,
  `phone_customer` varchar(255) NOT NULL,
  `address_customer` varchar(255) DEFAULT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name_customer`, `email_customer`, `phone_customer`, `address_customer`, `id_account`, `created_at`, `updated_at`) VALUES
(3, 'khách vãng lai', '', '', '', 1, NULL, NULL),
(4, 'Võ Trường', 'truong.vd2000@gmail.com', '0721625362', '673/21/10', 2, NULL, '2023-11-15 14:04:07'),
(7, 'Bá zin', 'zinhamlovesuu@gmail.com', '09128732132', NULL, 6, '2023-11-15 13:09:06', '2023-11-15 13:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `limit_number` int(11) DEFAULT NULL,
  `number_used` int(11) NOT NULL DEFAULT 0,
  `expiration_date` datetime NOT NULL,
  `payment_limit` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `code`, `discount`, `limit_number`, `number_used`, `expiration_date`, `payment_limit`, `created_at`, `updated_at`) VALUES
(1, 'HEHE', 10000.00, 5, 5, '2023-11-15 05:34:32', 50.00, NULL, '2023-11-15 05:41:05'),
(4, 'NEW_80582F79', 50000.00, 1, 0, '2023-12-15 20:09:06', NULL, '2023-11-15 13:09:06', '2023-11-15 13:09:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_13_022129_create_accounts_table', 1),
(6, '2023_11_13_022404_create_customers_table', 2),
(7, '2023_11_13_022601_create_categories_table', 3),
(8, '2023_11_13_022846_create_products_table', 4),
(9, '2023_11_13_023725_create_sizes_table', 5),
(10, '2023_11_13_023918_create_colors_table', 6),
(11, '2023_11_13_024004_create_orders_table', 7),
(12, '2023_11_13_024648_create_payments_table', 8),
(13, '2023_11_14_070444_create_order_details_table', 9),
(14, '2023_11_15_110121_create_discounts_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_order` varchar(255) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `date_order` timestamp NULL DEFAULT NULL,
  `email_order` varchar(100) NOT NULL,
  `phone_order` varchar(255) NOT NULL,
  `address_order` varchar(255) NOT NULL,
  `total_order` decimal(10,2) NOT NULL,
  `note` text DEFAULT NULL,
  `discount_code` varchar(100) DEFAULT NULL,
  `status_order` int(11) NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `id_payment` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name_order`, `code_order`, `date_order`, `email_order`, `phone_order`, `address_order`, `total_order`, `note`, `discount_code`, `status_order`, `id_customer`, `id_payment`, `created_at`, `updated_at`) VALUES
(30, 'Võ Trường', 'ORD1511230946986', '2023-11-15 02:46:44', 'truong.vd2000@gmail.com', '09283726352', '673/12/12/22 bình Tân, Hồ Chí Minh', 2200000.00, 'Ghi chú test', NULL, 1, 4, 2, '2023-11-15 02:46:44', '2023-11-15 02:46:44'),
(31, 'Bác ba phi', 'ORD1511231002100', '2023-11-15 03:02:51', 'truong.vd2000@gmail.com', '0928736252', '217/2/24 Bình Tân, Hồ Chí Minhh', 3300000.00, 'hehe', NULL, 1, 3, 1, '2023-11-15 03:02:51', '2023-11-15 03:02:51'),
(32, 'sadsa', 'ORD1511231008141', '2023-11-15 03:08:18', 'truong.vd200@gmail.com', '0921387', '21321/2132131 binh Tan', 550000.00, 'dasda', NULL, 1, 3, 1, '2023-11-15 03:08:18', '2023-11-15 03:08:18'),
(33, 'TRuonsad', 'ORD1511231010479', '2023-11-15 03:10:29', 'truong.vd2000@gmail.com', '9821736215', '21873/22/1 HCM', 1100000.00, 'hteuo', NULL, 1, 3, 1, '2023-11-15 03:10:29', '2023-11-15 03:10:29'),
(34, 'vÕ tRUONG', 'ORD1511231313874', '2023-11-15 06:13:09', 'truong.vd2000@gmail.com', '0921372131', '123/213sdasad', 2740000.00, 'hehe', 'HEHE', 1, 3, 2, '2023-11-15 06:13:09', '2023-11-15 06:13:09'),
(35, 'Võ Trường', 'OD151123220963', '2023-11-15 15:09:28', 'truong.vd2000@gmail.com', '0721625362', 'Testtttttttt', 11000000.00, 'sadsadsadasdsadasdsadasdsadsadasdas', NULL, 1, 3, 2, '2023-11-15 15:09:28', '2023-11-15 15:09:28'),
(36, 'Võ Trường', 'OD151123221623', '2023-11-15 15:16:54', 'truong.vd2000@gmail.com', '0721625362', 'trewre', 1100000.00, 'asdsaddas', NULL, 1, 3, 1, '2023-11-15 15:16:54', '2023-11-15 15:16:54'),
(37, 'Võ Trường', 'OD151123222368', '2023-11-15 15:23:17', 'truong.vd2000@gmail.com', '0721625362', 'dsa', 550000.00, 'sadsadsa', NULL, 1, 3, 2, '2023-11-15 15:23:17', '2023-11-15 15:23:17'),
(38, 'Võ Trường', 'OD151123222864', '2023-11-15 15:28:04', 'truong.vd2000@gmail.com', '0721625362', 'sadsadsa', 550000.00, 'dasdsadaddsadsadadda', NULL, 1, 3, 2, '2023-11-15 15:28:04', '2023-11-15 15:28:04'),
(39, 'Võ Trường', 'OD151123223572', '2023-11-15 15:35:12', 'truong.vd2000@gmail.com', '0721625362', 'zxczxcsadqwexzxcxz', 550000.00, 'sadsadsadsadasdsadsadadadaxzxzcxz', NULL, 1, 3, 1, '2023-11-15 15:35:12', '2023-11-15 15:35:12'),
(41, 'Võ Trường', 'OD161123095173', '2023-11-16 02:51:08', 'truong.vd2000@gmail.com', '0721625362', '3287/123/sadsadsa', 550000.00, 'asdsadasdasds', NULL, 1, 4, 2, '2023-11-16 02:51:08', '2023-11-16 02:51:08'),
(42, 'Võ Trường', 'OD161123220188', '2023-11-16 15:01:59', 'truong.vd2000@gmail.com', '0721625362', 'sdfdsfdsf', 550000.00, 'dsfdsfdsfdsfdsfdsfsfs', NULL, 1, 4, 2, '2023-11-16 15:01:59', '2023-11-16 15:01:59');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `orderid` bigint(20) UNSIGNED NOT NULL,
  `productid` bigint(20) UNSIGNED NOT NULL,
  `colorid` bigint(20) UNSIGNED NOT NULL,
  `sizeid` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `totalprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `created_at`, `updated_at`, `orderid`, `productid`, `colorid`, `sizeid`, `quantity`, `totalprice`) VALUES
(34, '2023-11-15 02:46:44', '2023-11-15 02:46:44', 30, 1, 1, 1, 1, 550000.00),
(35, '2023-11-15 02:46:44', '2023-11-15 02:46:44', 30, 1, 1, 2, 2, 1100000.00),
(36, '2023-11-15 02:46:44', '2023-11-15 02:46:44', 30, 1, 2, 1, 1, 550000.00),
(37, '2023-11-15 03:02:51', '2023-11-15 03:02:51', 31, 1, 1, 1, 2, 1100000.00),
(38, '2023-11-15 03:02:51', '2023-11-15 03:02:51', 31, 1, 2, 1, 4, 2200000.00),
(39, '2023-11-15 03:08:18', '2023-11-15 03:08:18', 32, 1, 1, 1, 1, 550000.00),
(40, '2023-11-15 03:10:29', '2023-11-15 03:10:29', 33, 1, 1, 1, 1, 550000.00),
(41, '2023-11-15 03:10:29', '2023-11-15 03:10:29', 33, 1, 1, 2, 1, 550000.00),
(42, '2023-11-15 06:13:09', '2023-11-15 06:13:09', 34, 1, 1, 1, 3, 1650000.00),
(43, '2023-11-15 06:13:09', '2023-11-15 06:13:09', 34, 1, 2, 2, 2, 1100000.00),
(44, '2023-11-15 15:09:28', '2023-11-15 15:09:28', 35, 1, 1, 1, 16, 8800000.00),
(45, '2023-11-15 15:09:28', '2023-11-15 15:09:28', 35, 1, 2, 2, 2, 1100000.00),
(46, '2023-11-15 15:09:28', '2023-11-15 15:09:28', 35, 1, 1, 2, 2, 1100000.00),
(47, '2023-11-15 15:16:54', '2023-11-15 15:16:54', 36, 1, 1, 1, 2, 1100000.00),
(48, '2023-11-15 15:23:17', '2023-11-15 15:23:17', 37, 1, 1, 1, 1, 550000.00),
(49, '2023-11-15 15:28:04', '2023-11-15 15:28:04', 38, 1, 2, 1, 1, 550000.00),
(50, '2023-11-15 15:35:12', '2023-11-15 15:35:12', 39, 1, 2, 2, 1, 550000.00),
(51, '2023-11-16 02:51:08', '2023-11-16 02:51:08', 41, 1, 1, 1, 1, 550000.00),
(52, '2023-11-16 15:01:59', '2023-11-16 15:01:59', 42, 1, 1, 1, 1, 550000.00);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_payment` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name_payment`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán khi nhận hàng', NULL, NULL),
(2, 'Hình thức chuyển khoản', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_product` varchar(255) NOT NULL,
  `link_product` varchar(255) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `avt_product` varchar(255) NOT NULL,
  `image_product` varchar(255) NOT NULL,
  `quantity_product` int(11) NOT NULL,
  `price_product` decimal(8,2) NOT NULL,
  `sellprice_product` decimal(8,2) NOT NULL,
  `sortdesc_product` text NOT NULL,
  `desc_product` text NOT NULL,
  `number_buy` int(11) NOT NULL,
  `status_product` int(11) NOT NULL,
  `id_category` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_product`, `link_product`, `sku`, `avt_product`, `image_product`, `quantity_product`, `price_product`, `sellprice_product`, `sortdesc_product`, `desc_product`, `number_buy`, `status_product`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Quần Jeans basic Slim DABJ004', 'quan-jeans-basic-slim-dabj004', 'DABJ004', '1.webp', '1.webp#2.webp#3.webp', 50, 550000.00, 0.00, 'Quần Jeans basic Slim CABJ004/2', '1. CHÍNH SÁCH ÁP DỤNG\r\n\r\nÁp dụng từ ngày 01/09/2018.\r\n\r\nTrong vòng 30 ngày kể từ ngày mua sản phẩm với các sản phẩm TORANO.\r\n\r\nÁp dụng đối với sản phẩm nguyên giá và sản phẩm giảm giá ít hơn 50%.\r\n\r\nSản phẩm nguyên giá chỉ được đổi 01 lần duy nhất sang sản phẩm nguyên giá khác và không thấp hơn giá trị sản phẩm đã mua.\r\n\r\nSản phẩm giảm giá/khuyến mại ít hơn 50% được đổi 01 lần sang màu khác hoặc size khác trên cùng 1 mã trong điều kiện còn sản phẩm hoặc theo quy chế chương trình (nếu có). Nếu sản phẩm đổi đã hết hàng khi đó KH sẽ được đổi sang sản phẩm khác có giá trị ngang bằng hoặc cao hơn. Khách hàng sẽ thanh toán phần tiền chênh lệch nếu sản phẩm đổi có giá trị cao hơn sản phẩm đã mua.\r\n\r\nChính sách chỉ áp dụng khi sản phẩm còn hóa đơn mua hàng, còn nguyên nhãn mác, thẻ bài đính kèm sản phẩm và sản phẩm không bị dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua sản phẩm.\r\n\r\nSản phẩm đồ lót và phụ kiện không được đổi trả.\r\n\r\n2. ĐIỀU KIỆN ĐỔI SẢN PHẨM\r\n\r\nĐổi hàng trong vòng 07 ngày kể từ ngày khách hàng nhận được sản phẩm.\r\n\r\nSản phẩm còn nguyên tem, mác và chưa qua sử dụng.\r\n\r\n3. THỰC HIỆN ĐỔI SẢN PHẨM\r\n\r\nQuý khách có thể đổi hàng Online tại hệ thống cửa hàng và đại lý TORANO trên toàn quốc . Lưu ý: vui lòng mang theo sản phẩm và phiếu giao hàng.\r\n\r\nNếu tại khu vực bạn không có cửa hàng TORANO hoặc sản phẩm bạn muốn đổi thì vui lòng làm theo các bước sau:\r\n\r\nBước 1: Gọi đến Tổng đài: 0931733469 các ngày trong tuần (trừ ngày lễ), cung cấp mã đơn hàng và mã sản phẩm cần đổi.\r\n\r\nBước 2: Vui lòng gửi hàng đổi về địa chỉ : Kho Online TORANO - 1165 Giải Phóng, Thịnh Liệt, Q. Hoàng Mai, Hà Nội.\r\n\r\nBước 3: TORANO gửi đổi sản phẩm mới khi nhận được hàng. Trong trường hợp hết hàng, TORANO sẽ liên hệ xác nhận.', 0, 1, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `desc_size`, `created_at`, `updated_at`, `id_product`) VALUES
(1, 'XXL', NULL, NULL, 1),
(2, 'XL', NULL, NULL, 1);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `accounts_email_account_unique` (`email_account`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id_parent_foreign` (`id_parent`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `colors_id_product_foreign` (`id_product`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_customer_unique` (`email_customer`),
  ADD KEY `customers_id_account_foreign` (`id_account`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_code_unique` (`code`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id_customer_foreign` (`id_customer`),
  ADD KEY `id_payment` (`id_payment`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_productid_foreign` (`productid`),
  ADD KEY `order_details_colorid_foreign` (`colorid`),
  ADD KEY `order_details_sizeid_foreign` (`sizeid`),
  ADD KEY `order_details_orderid_foreign` (`orderid`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_category_foreign` (`id_category`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sizes_id_product_foreign` (`id_product`);

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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_id_parent_foreign` FOREIGN KEY (`id_parent`) REFERENCES `categories` (`id`);

--
-- Constraints for table `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_payment`) REFERENCES `payments` (`id`),
  ADD CONSTRAINT `orders_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_colorid_foreign` FOREIGN KEY (`colorid`) REFERENCES `sizes` (`id`),
  ADD CONSTRAINT `order_details_orderid_foreign` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_productid_foreign` FOREIGN KEY (`productid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_sizeid_foreign` FOREIGN KEY (`sizeid`) REFERENCES `colors` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `sizes`
--
ALTER TABLE `sizes`
  ADD CONSTRAINT `sizes_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
