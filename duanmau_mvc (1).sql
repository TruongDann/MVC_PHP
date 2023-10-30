-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 23, 2023 lúc 02:36 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duanmau_mvc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name_category`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Nike', 'Stop business', NULL, NULL),
(2, 'Adidas', 'Stocking', NULL, NULL),
(3, 'Puma', 'Still in business', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_product` bigint NOT NULL,
  `id_user` bigint NOT NULL,
  `id_reply` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `content`, `id_product`, `id_user`, `id_reply`, `created_at`, `updated_at`) VALUES
(18, 'Sản Phẩm Đẹp', 111149, 36, NULL, NULL, NULL),
(20, 'Đúng Vậy', 111149, 36, 18, NULL, NULL),
(21, 'Sản Phẩm Rất Là Hữu Ít', 111149, 36, NULL, NULL, NULL),
(22, 'Yêu Sản Phẩm Này', 111148, 36, NULL, NULL, NULL),
(23, 'Ý Tôi Nó Đẹp', 111149, 36, 20, '2023-10-22 16:57:48', '2023-10-22 16:57:48'),
(26, 'Đúng Rồi Bạn', 111149, 32, 23, NULL, NULL),
(27, 'Đúng ý tôi&#13;&#10;', 111148, 38, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int UNSIGNED NOT NULL,
  `name_images` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_product` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_09_020331_create_categories_table', 1),
(6, '2023_07_09_020432_create_posts_table', 1),
(7, '2023_07_09_020931_create_products_table', 1),
(8, '2023_07_09_020949_create_product_categories_table', 1),
(9, '2023_07_09_022247_create_orders_table', 2),
(10, '2023_07_09_023417_create_order_detail_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int NOT NULL,
  `user_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Chưa Thanh Toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_name`, `customer_phone`, `customer_email`, `shipping_address`, `note`, `total`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(5, 'Alice Brown', '1111111111', 'alice@example.com', '321 Maple Ave', 'Note 3', 400, 4, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Đã Thanh Toán'),
(7, 'Emily Davis', '3333333333', 'emily@example.com', '987 Cedar Rd', '', 600, 6, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Đã Thanh Toán'),
(8, 'David Miller', '4444444444', 'david@example.com', '135 Oakwood Ln', 'Note 5', 700, 7, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Chưa Thanh Toán'),
(9, 'Sarah Anderson', '5555555555', 'sarah@example.com', '468 Elmwood Dr', '', 800, 8, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Chưa Thanh Toán'),
(10, 'Robert Johnson', '6666666666', 'robert@example.com', '791 Maplewood Ave', 'Note 6', 900, 9, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Chưa Thanh Toán'),
(11, 'Olivia Wilson', '7777777777', 'olivia@example.com', '124 Pinecone Ln', '', 1000, 10, '2023-08-09 15:34:52', '2023-08-09 15:34:52', 'Chưa Thanh Toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint NOT NULL,
  `product_id` bigint NOT NULL,
  `qty` int NOT NULL,
  `price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail2`
--

CREATE TABLE `order_detail2` (
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `phone` int NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `id` int UNSIGNED NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail2`
--

INSERT INTO `order_detail2` (`name`, `email`, `phone`, `country`, `id`, `address`, `city`, `total`) VALUES
('Nguyễn Văn A', 'nguyenvana@example.com', 987654321, 'Việt Nam', 1, '123 Đường ABC', 'Thành phố XYZ', 500),
('Trần Thị B', 'tranthib@example.com', 123456789, 'Việt Nam', 2, '456 Đường XYZ', 'Thành phố ABC', 600),
('Lê Văn C', 'levanc@example.com', 912345678, 'Việt Nam', 3, '789 Đường DEF', 'Thành phố MNO', 700),
('Phạm Thị D', 'phamthid@example.com', 845678901, 'Việt Nam', 4, '321 Đường GHI', 'Thành phố PQR', 800),
('Hoàng Văn E', 'hoangvane@example.com', 765432109, 'Việt Nam', 5, '654 Đường JKL', 'Thành phố STU', 900),
('Vũ Thị F', 'vuthif@example.com', 932165487, 'Việt Nam', 6, '987 Đường MNO', 'Thành phố GHI', 1000),
('Ngô Văn G', 'ngovang@example.com', 654321987, 'Việt Nam', 7, '159 Đường PQR', 'Thành phố DEF', 1100),
('Đặng Thị H', 'dangthih@example.com', 801234567, 'Việt Nam', 8, '753 Đường STU', 'Thành phố JKL', 1200),
('Bùi Văn I', 'buivani@example.com', 978012345, 'Việt Nam', 9, '951 Đường GHI', 'Thành phố MNO', 1300),
('Lý Thị K', 'lythik@example.com', 667890123, 'Việt Nam', 10, '357 Đường JKL', 'Thành phố DEF', 1400);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `content`, `thumbnail`, `category_id`, `created_at`, `updated_at`) VALUES
(20, 'Mùa đông không sợ giá riết vì có tui', 'shirt', '<span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">Bộ&nbsp;</span><span style=\"font-weight: bold; color: rgb(188, 192, 195); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">Áo</span><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">&nbsp;Sweater Phối&nbsp;</span><span style=\"font-weight: bold; color: rgb(188, 192, 195); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">Quần</span><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">&nbsp;Ống Rộng Phong Cách Hàn Quốc Thời Trang&nbsp;</span><span style=\"font-weight: bold; color: rgb(188, 192, 195); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">Mùa Đông</span><span style=\"color: rgb(189, 193, 198); font-family: arial, sans-serif; font-size: 14px; background-color: rgb(32, 33, 36);\">&nbsp;Hàng Mới 2023.&nbsp;</span>\r\n              ', '../uploads2023/0864db37969d378_4580f94c6ee6ac12d2756ad687c49ed7.jpg.webp', 1, NULL, NULL),
(21, 'hihi', 'Coffee Beans', 'aaaaaaaa', '../uploads2023/0864db3a689711a_52d9e8623dcaf1c92cb2e1c9ca177546.jpg', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `sale_price` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `content`, `thumbnail`, `price`, `sale_price`, `created_at`, `updated_at`, `category_id`) VALUES
(111148, 'Adidas 12F', 'adidas+12f', 'Phong Cách Đường Phố', '1697969246_6534f45e404ca.jpg', 560000, 500000, NULL, NULL, '2'),
(111149, 'Adidas Yuki', 'adidas+yuki', 'Sản Phẩm Uy Tín Đến Từ Adidas', '1697960294_6534d166a4f36.jpg', 890000, 800000, NULL, NULL, '2'),
(111150, 'Puma V1', 'puma+v1', 'Đậm Chất Phong Cách Đường Phố', '1697964099_6534e04355402.jpg', 690000, 600000, NULL, NULL, '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `id_product` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants_combinations`
--

CREATE TABLE `product_variants_combinations` (
  `id` bigint NOT NULL,
  `sku_id` bigint NOT NULL,
  `option_id` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants_options`
--

CREATE TABLE `product_variants_options` (
  `id` bigint NOT NULL,
  `variant_id` bigint NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skus`
--

CREATE TABLE `skus` (
  `id` bigint NOT NULL,
  `id_product` bigint NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qty` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(31, 'danvtpc06576@fpt.edu.vn', 'Trường Đan', NULL, '$2y$10$5/9R36Nva/ZsMiQxODqWbeEgZ7nM8k8cX5ZbThzmPRrKZQXHC00We', NULL, NULL, NULL, 'admin'),
(32, 'tinh123@gmail.com', 'Văn Tính', NULL, '$2y$10$8WprlZ54/CsZ1LD9CPu/5./dSVeFhebZ9TEDcHy3SKiewWEeSfWMK', NULL, NULL, NULL, 'admin'),
(36, 'triet123@gmail.com', 'Trần Hậu', NULL, '$2y$10$kMy8/NRWQ3GdtacH8mVchO/nGpl3SVTazTGyac7m7q2Z61ngYymai', NULL, NULL, NULL, 'user'),
(37, 'vodan3023@outlook.com.vn', 'MInh Triet', NULL, '$2y$10$yTHP3pDi5TGORKyl6Q9ajuHpBEWIuipIXe6wI5XeCJhfJsNXfZNu2', NULL, NULL, NULL, 'user'),
(38, 'vodan13985@gmail.com', 'Trường Đan', NULL, '$2y$10$Tp59sQ255Hu3bsj2SCbhc.olLKytE5INVKSFbaioNKpJGHNoHEKhe', NULL, NULL, NULL, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`) USING BTREE;

--
-- Chỉ mục cho bảng `order_detail2`
--
ALTER TABLE `order_detail2`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_variants_combinations`
--
ALTER TABLE `product_variants_combinations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_variants_options`
--
ALTER TABLE `product_variants_options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `skus`
--
ALTER TABLE `skus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111151;

--
-- AUTO_INCREMENT cho bảng `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_variants_combinations`
--
ALTER TABLE `product_variants_combinations`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_variants_options`
--
ALTER TABLE `product_variants_options`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `skus`
--
ALTER TABLE `skus`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
