-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 04:54 PM
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
  `status_account` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `name_account`, `email_account`, `password_account`, `reset_password_token`, `status_account`, `created_at`, `updated_at`) VALUES
(1, 'root', '', '', '', 1, NULL, NULL),
(2, 'truongvo', 'truong.vd2000@gmail.com', '8e67cfe9b5daec65ecd5ba1271ec6225', NULL, 1, '2023-11-12 21:31:00', '2023-12-03 16:31:53'),
(15, 'zinham', 'zinhamlovesuu@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 0, '2023-11-28 14:59:13', '2023-11-30 08:43:08');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `link`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'main', 'bg1', 'bg1.webp', 1, '2023-12-12 03:22:48', NULL),
(2, 'main', 'bg2', 'bg2.webp', 1, NULL, NULL),
(3, 'main', 'bg3', 'bg3.jpg', 1, NULL, '2023-12-13 09:54:06'),
(4, 'secon1', 'sec1', 'sec1.webp', 1, NULL, NULL),
(5, 'secon2', 'sec2', 'sec2.jpg', 1, NULL, NULL),
(6, 'secon3', 'sec3', 'sec3.jpg', 1, NULL, NULL),
(7, 'secon4', 'sec4', 'sec4.jpg', 1, NULL, '2023-12-13 10:14:28');

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
(3, 'Quần thun', 'quan-thun', 2, 1, 1, NULL, '2023-11-21 08:25:22'),
(4, 'Áo', 'ao', 2, NULL, 1, NULL, NULL),
(5, 'Giày', 'giay', 3, NULL, 1, NULL, '2023-11-23 09:27:34'),
(10, 'Phụ kiện', 'phu-kien', 4, NULL, 1, '2023-11-20 12:47:56', '2023-11-28 14:28:42');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `desc_color`, `created_at`, `updated_at`) VALUES
(1, 'Xanh đen', NULL, NULL),
(2, 'Xám', NULL, NULL),
(3, 'Đen', '2023-11-18 18:44:21', '2023-11-30 04:34:26'),
(4, 'Xanh navy', '2023-11-18 18:44:21', NULL),
(7, 'Đỏ đỏ', '2023-12-05 14:12:37', '2023-12-05 14:12:50');

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
(4, 'Võ Trường', 'truong.vd2000@gmail.com', '072162536', '673/21/10 Binh tân, HCM,việt Nam', 2, NULL, '2023-11-28 14:13:45'),
(17, 'Zin Hâm', 'zinhamlovesuu@gmail.com', '0912837223', 'Số 17', 15, '2023-11-28 14:59:13', '2023-11-30 08:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
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
(1, 'xinchao', 10000.00, 9, 4, '2023-12-27 05:34:00', 200000.00, NULL, '2023-12-12 13:15:34'),
(9, 'WELCOME_ZINHAM', 50000.00, 1, 0, '2023-12-28 21:59:13', 20000.00, '2023-11-28 14:59:13', '2023-11-28 14:59:13'),
(11, 'Teiasiu', 50000.00, 10, 0, '2023-12-04 12:00:00', 150000.00, '2023-12-03 07:51:15', '2023-12-03 07:51:15'),
(12, 'TEqweiuwqe', 10000.00, 100000, 0, '2023-12-06 13:20:00', 100000.00, '2023-12-05 14:16:50', '2023-12-05 14:16:50');

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
(14, '2023_11_15_110121_create_discounts_table', 10),
(15, '2023_11_24_113912_create_product_variants_table', 11),
(16, '2023_12_13_093927_create_banners_table', 12);

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
  `discount_code` bigint(20) UNSIGNED DEFAULT NULL,
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
(61, 'Võ Trường', 'OD12122320132', '2023-12-12 13:13:19', 'truong.vd2000@gmail.com', '072162536', '673/21/10 Binh tân, HCM,việt Nam', 900000.00, 'Giao giờ hành chính', 1, 1, 4, 2, '2023-12-12 13:13:19', '2023-12-12 13:13:19'),
(62, 'Võ Trường', 'OD12122320153', '2023-12-12 13:15:34', 'truong.vd2000@gmail.com', '072162536', '673/21/10 Binh tân, HCM,việt Nam', 1090000.00, 'Giao qua nhà tôi', 1, 4, 4, 1, '2023-12-12 13:15:34', '2023-12-13 10:24:26');

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
(80, '2023-12-12 13:13:19', '2023-12-12 13:13:19', 61, 2, 3, 1, 1, 300000.00),
(81, '2023-12-12 13:13:19', '2023-12-12 13:13:19', 61, 2, 2, 1, 2, 600000.00),
(82, '2023-12-12 13:15:34', '2023-12-12 13:15:34', 62, 2, 3, 1, 1, 300000.00),
(83, '2023-12-12 13:15:34', '2023-12-12 13:15:34', 62, 1, 1, 1, 1, 400000.00),
(84, '2023-12-12 13:15:34', '2023-12-12 13:15:34', 62, 1, 2, 1, 1, 400000.00);

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
  `avt_product` varchar(255) DEFAULT NULL,
  `image_product` varchar(255) DEFAULT NULL,
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

INSERT INTO `products` (`id`, `name_product`, `link_product`, `sku`, `avt_product`, `image_product`, `price_product`, `sellprice_product`, `sortdesc_product`, `desc_product`, `number_buy`, `status_product`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'Quần Jeans basic Slim DABJ004', 'quan-jeans-basic-slim-dabj004', 'DABJ004', '1.png', '1.png#2.png', 500000.00, 400000.00, 'Quần Jeans basic Slim CABJ004/2 \r\nhehe nè haha', '<p>TẬN HƯỞNG OREO SOCOLA PIE NGON KHÓ CƯỠNG</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/t75/1/16/1f618.png\" alt=\"😘\">Bạn đã sẵn sàng để được trải nghiệm cảm giác tuyệt vời như được đắm chìm trong lớp socola sóng sánh ngất ngây, bồng bềnh trong làn mây mềm mại, êm ái tựa ôm một chú gấu bông?</p><p><img src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf4/1/16/2728.png\" alt=\"✨\">Còn chần chờ gì mà không rinh ngay bánh OREO Socola Pie để tận hưởng cảm giác tuyệt vời ấy!</p><p><a href=\"https://www.facebook.com/hashtag/oreovn?__eep__=6&amp;__cft__[0]=AZVzBMwNt-HYszL9YvpHpPuXMDyGCRJxy0hU1qb9JlGmqlEs56WZYwfZHgi_SJvG9h4V2AiTv0D3aR94b9XLT6Dbn4J7GfZmRn_BiEydMqwjXjveZR8MOLSarAkyAAoyKNi95pn1J7d3T9Y0pK43wlc_IvaYUhKaxoxwn6X3fkBza_pfAQnJcDNpGBVlLPU4KMAB2ocDyhmXTI8bWMjiKdyVABePsrA71GSAGbRH-wan72RGgAo4gXqM3bFgS6VnpvstOq9bK4xmeKebBqCMm8YgsVo7QOT9b1_M5L5UA4r6vd3RNRYC5U3u7ZfISAYb6UiFPXPAxJgRVUtLw2bDmhJ1&amp;__tn__=*NK-R\">#OREOVN</a> <a href=\"https://www.facebook.com/hashtag/oreosocolapie?__eep__=6&amp;__cft__[0]=AZVzBMwNt-HYszL9YvpHpPuXMDyGCRJxy0hU1qb9JlGmqlEs56WZYwfZHgi_SJvG9h4V2AiTv0D3aR94b9XLT6Dbn4J7GfZmRn_BiEydMqwjXjveZR8MOLSarAkyAAoyKNi95pn1J7d3T9Y0pK43wlc_IvaYUhKaxoxwn6X3fkBza_pfAQnJcDNpGBVlLPU4KMAB2ocDyhmXTI8bWMjiKdyVABePsrA71GSAGbRH-wan72RGgAo4gXqM3bFgS6VnpvstOq9bK4xmeKebBqCMm8YgsVo7QOT9b1_M5L5UA4r6vd3RNRYC5U3u7ZfISAYb6UiFPXPAxJgRVUtLw2bDmhJ1&amp;__tn__=*NK-R\">#OreoSocolaPie</a> <a href=\"https://www.facebook.com/hashtag/m%E1%BB%81mngonkh%C3%B3c%C6%B0%E1%BB%A1ng?__eep__=6&amp;__cft__[0]=AZVzBMwNt-HYszL9YvpHpPuXMDyGCRJxy0hU1qb9JlGmqlEs56WZYwfZHgi_SJvG9h4V2AiTv0D3aR94b9XLT6Dbn4J7GfZmRn_BiEydMqwjXjveZR8MOLSarAkyAAoyKNi95pn1J7d3T9Y0pK43wlc_IvaYUhKaxoxwn6X3fkBza_pfAQnJcDNpGBVlLPU4KMAB2ocDyhmXTI8bWMjiKdyVABePsrA71GSAGbRH-wan72RGgAo4gXqM3bFgS6VnpvstOq9bK4xmeKebBqCMm8YgsVo7QOT9b1_M5L5UA4r6vd3RNRYC5U3u7ZfISAYb6UiFPXPAxJgRVUtLw2bDmhJ1&amp;__tn__=*NK-R\">#MềmNgonKhóCưỡng</a></p>', 16, 1, 2, NULL, '2023-12-12 13:15:34'),
(2, 'Short gió cạp phối chun, in logo mép quần 2.ESBW005', 'short-gio-cap-phoi-chun-in-logo-mep-quan-esbw005', 'ESBW005', '1.webp', '1.webp#2.webp#3.jpg#4.jpg', 300000.00, 0.00, 'Áp dụng từ ngày 01/09/2018.\r\n\r\nTrong vòng 30 ngày kể từ ngày mua sản phẩm với các sản phẩm TORANO.\r\n\r\nÁp dụng đối với sản phẩm nguyên giá và sản phẩm giảm giá ít hơn 50%.\r\n\r\nSản phẩm nguyên giá chỉ được đổi 01 lần duy nhất sang sản phẩm nguyên giá khác và không thấp hơn giá trị sản phẩm đã mua.\r\n\r\nSản phẩm giảm giá/khuyến mại ít hơn 50% được đổi 01 lần sang màu khác hoặc size khác trên cùng 1 mã trong điều kiện còn sản phẩm hoặc theo quy chế chương trình (nếu có). Nếu sản phẩm đổi đã hết hàng khi đó KH sẽ được đổi sang sản phẩm khác có giá trị ngang bằng hoặc cao hơn. Khách hàng sẽ thanh toán phần tiền chênh lệch nếu sản phẩm đổi có giá trị cao hơn sản phẩm đã mua.\r\n\r\nChính sách chỉ áp dụng khi sản phẩm còn hóa đơn mua hàng, còn nguyên nhãn mác, thẻ bài đính kèm sản phẩm và sản phẩm không bị dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua sản phẩm.\r\n\r\nSản phẩm đồ lót và phụ kiện không được đổi trả.', '<p>BẢO MẬT THÔNG TIN KHÁCH HÀNG TORANO 1. Thu thập và sử dụng thông tin của TORANO TORANO chỉ thu thập các loại thông tin cơ bản liên quan đến đơn đặt hàng gồm:…… Các thông tin này được sử dụng nhằm mục đích xử lý đơn hàng, nâng cao chất lượng dịch vụ, nghiên cứu thị trường, các hoạt động marketing, chăm sóc khách hàng, quản lý nội bộ hoặc theo yêu cầu của pháp luật. Khách hàng tùy từng thời điểm có thể chỉnh sửa lại các thông tin đã cung cấp để đảm bảo được hưởng đầy đủ các quyền mà TORANO dành cho Khách hàng của mình. TORANO cam kết: Thông tin cá nhân của khách hàng được sử dụng đúng vào mục đích của việc thu thập và cung cấp; Mọi việc thu thập và sử dụng thông tin đã thu thập được của Khách hàng đều được thông qua ý kiến của Khách hàng Chỉ sử dụng các thông tin được Khách hàng đã cung cấp cho TORANO, không sử dụng các thông tin của Khách hàng được biết đến theo các phương thức khác; Thời gian lưu trữ và bảo mật thông tin: Chỉ cho phép các đối tượng sau được tiếp cận với thông tin của Khách hàng: Người thực hiện việc cung cấp hàng hóa, dịch vụ từ TORANO theo yêu cầu của Khách hàng; Người thực hiện việc chăm sóc Khách hàng đã sử dụng hàng hóa, dịch vụ của TORANO; Người tiếp nhận và xử lý các thắc mắc của Khách hàng trong quá trình sử dụng hàng hóa, dịch vụ của TORANO; Cơ quan Nhà nước có thẩm quyền Trong quá trình chào hàng, quảng cáo và chăm sóc Khách hàng, Khách hàng hoàn toàn có thể gửi yêu cầu dừng việc sử dụng thông tin theo cách thức tương ứng mà hoạt động chào hàng, quảng cáo và chăm sóc khách hàng gửi tới Khách hàng. 2. Cách thức bảo mật thông tin khách hàng: Việc bảo mật các thông tin do Khách hàng cung cấp được dựa trên sự đảm bảo việc tuân thủ của từng cán bộ, nhân viên TORANO, đối tác và hệ thống lưu trữ dữ liệu. Trong trường hợp máy chủ lưu trữ thông tin bị hacker tấn công dẫn đến mất mát dữ liệu cá nhân Khách hàng, TORANO sẽ có trách nhiệm thông báo vụ việc cho cơ quan chức năng điều tra xử lý kịp thời và thông báo cho Khách hàng được biết. Tuy nhiên, do đặc điểm của môi trường internet, không một dữ liệu nào trên môi trường mạng cũng có thể được bảo mật 100%. Vì vậy, TORANO không cam kết chắc chắn rằng các thông tin tiếp nhận từ Khách hàng được bảo mật tuyệt đối. 3. Trách nhiệm bảo mật thông tin Khách hàng Khách hàng vui lòng chỉ cung cấp đúng và đủ các thông tin theo yêu cầu của TORANO đặc biệt tránh cung cấp các thông tin liên quan đến tài khoản ngân hàng khi chưa được mã hóa thông tin trong các giao dịch thanh toán trực tuyến hoặc các thông tin nhạy cảm khác. Khách hàng hoàn toàn chịu trách nhiệm về tính trung thực và chính xác đối với các thông tin đã cung cấp cũng như tự chịu trách nhiệm nếu cung cấp các thông tin ngoài yêu cầu. Trong trường hợp Khách hàng cung cấp thông tin cá nhân của mình cho nhiều tổ chức, cá nhân khác nhau, Khách hàng phải yêu cầu các bên liên quan cùng bảo mật. Mọi thông tin cá nhân của Khách hàng khi bị tiết lộ gây thiệt hại đến Khách hàng, Khách hàng phải tự xác định được nguồn tiết lộ thông tin. TORANO không chịu trách nhiệm khi thông tin Khách hàng bị tiết lộ mà không có căn cứ xác đáng thể hiện TORANO là bên tiết lộ thông tin. TORANO không chịu trách nhiệm về việc tiết lộ thông tin của Khách hàng nếu Khách hàng không tuân thủ các yêu cầu trên. 4. Luật áp dụng khi xảy ra tranh chấp Mọi tranh chấp xảy ra giữa Khách hàng và TORANO sẽ được hòa giải. Nếu hòa giải không thành sẽ được giải quyết tại Tòa án có thẩm quyền và tuân theo pháp luật Việt Nam.</p>', 21, 1, 3, '2023-11-18 18:38:15', '2023-12-12 13:15:34');

-- --------------------------------------------------------

--
-- Table structure for table `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `size_id`, `color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 3, NULL, '2023-11-28 04:24:20'),
(2, 1, 2, 2, 0, NULL, NULL),
(3, 1, 1, 2, 2, NULL, '2023-12-12 13:15:34'),
(5, 2, 1, 3, 3, NULL, '2023-12-11 15:05:55'),
(6, 1, 3, 1, 7, NULL, '2023-12-11 15:16:01'),
(8, 2, 1, 2, 4, NULL, '2023-12-12 13:13:19');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc_size` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `desc_size`, `created_at`, `updated_at`) VALUES
(1, 'XXL', NULL, NULL),
(2, 'XL', NULL, NULL),
(3, 'S', '2023-11-18 18:43:19', NULL),
(4, 'M', '2023-11-18 18:43:19', NULL),
(5, 'L', '2023-11-18 18:43:53', NULL),
(7, 'XS', '2023-11-24 19:23:28', NULL);

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
(1, 'admin', 'truong.vd2000@gmail.com', NULL, '827ccb0eea8a706c4c34a16891f84e7b', '', NULL, '2023-12-13 15:47:26');

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
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variants_product_id_foreign` (`product_id`),
  ADD KEY `product_variants_size_id_foreign` (`size_id`),
  ADD KEY `product_variants_color_id_foreign` (`color_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_id_parent_foreign` FOREIGN KEY (`id_parent`) REFERENCES `categories` (`id`);

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
  ADD CONSTRAINT `order_details_colorid_foreign` FOREIGN KEY (`colorid`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `order_details_orderid_foreign` FOREIGN KEY (`orderid`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_productid_foreign` FOREIGN KEY (`productid`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_details_sizeid_foreign` FOREIGN KEY (`sizeid`) REFERENCES `sizes` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_variants_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
