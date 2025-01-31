-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 12:51 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `red_ronin`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_item_id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `manga_id` varchar(255) NOT NULL,
  `manga_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_item_id`, `user_id`, `product_id`, `product_name`, `manga_id`, `manga_name`, `price`, `quantity`, `pic`) VALUES
(48, '4', '8', 'Naruto and Jiraiya Mobile case', '0', '', '500', '1', '64e48cbb316d9case2.webp'),
(51, '4', '11', 'Zoro wano style', '0', '', '3000', '1', '65018af9b6063fg1.webp'),
(52, '4', '10', 'Itachi in rain figure', '0', '', '2000', '1', '650040169e7b8fg8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `delete_token`
--

CREATE TABLE `delete_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` longtext NOT NULL,
  `otp` int(11) NOT NULL,
  `expiry_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delete_token`
--

INSERT INTO `delete_token` (`id`, `email`, `token`, `otp`, `expiry_time`, `created_at`, `updated_at`) VALUES
(1, 'xaxagat437@ipniel.com', '79b749010091f72746e74f045b058a511d89b5385ddb9485ec5ac0107408433c68b22024365825179237032b3fb5c3fa61676d3c587fd2b6850dc1a344ed1c1d', 337135, '2023-09-25 00:33:16', '2023-09-24 18:33:16', '2023-09-24 18:33:16');

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
-- Table structure for table `mangas`
--

CREATE TABLE `mangas` (
  `manga_id` bigint(20) UNSIGNED NOT NULL,
  `manga_name` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `sell_count` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mangas`
--

INSERT INTO `mangas` (`manga_id`, `manga_name`, `writer`, `price`, `stock`, `description`, `rating`, `sell_count`, `pic`, `release_date`, `status`) VALUES
(1, 'Your Lie In April', 'Naoshi Arakawa', '500', '20', 'Your Lie in April is a Japanese romantic drama manga series written and illustrated by Naoshi Arakawa. It was serialized in Kodansha\'s magazine Monthly Shōnen Magazine from April 2011 to February 2015', '4', '0', '64e2d9bb9cd53manga1.jpg', '2023-08-19', 'Active'),
(2, 'Dragon Ball Super', 'Toriyama & Toyotaro', '1000', '48', '6 months after the defeat of Majin Boo,[4] Son Goku is seen working as a farmer, and his family and friends live peacefully. However, the God of Destruction Beerus awakens after decades of slumber', '5', '2', '64e2566221cbcmanga3.jpg', '2023-08-20', 'Active'),
(5, 'Wotakoi: Love Is Hard for Otaku', 'Fujita', '300', '10', 'The main characters are Narumi, an office working woman who hides her fujoshi lifestyle, and Hirotaka, a handsome and capable company man who is a game otaku. The two seem perfect for each other, but love is difficult for otaku.', '1', '0', '65464af88b3e9manga4.jpeg', '2023-11-04', 'Active'),
(6, 'Wandering Witch: The Journey of Elaina', 'Jōgi Shiraishi', '250', '10', 'Elaina grew up reading stories about the adventures of a witch named Niké, she chose to travel the world as well, even being given her mother\'s old title of \"Ashen Witch\" upon becoming a full-fledged witch. The story is told through her diary entries.', '1', '0', '65464b6b4b27acover.jpg', '2023-11-04', 'Active');

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
(8, '2023_08_20_120052_products', 2),
(10, '2023_08_20_174440_mangas', 3),
(12, '2023_08_21_074149_user_requests', 4),
(17, '2023_08_21_133104_reviews', 5),
(23, '2023_08_22_173939_cart', 9),
(26, '2023_08_22_113343_orders', 10),
(27, '2023_09_24_175212_delete_token', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `manga_id` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `shipping_method` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL DEFAULT 'Not delivered',
  `payment_status` varchar(255) NOT NULL DEFAULT 'Not Paid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `name`, `email`, `mobile`, `amount`, `quantity`, `item_name`, `product_id`, `manga_id`, `pincode`, `address`, `payment_method`, `shipping_method`, `date`, `delivery_status`, `payment_status`) VALUES
(2, 'Harmish Tervadiya', 'harmishtervadiya@gmail.com', '8160331232', '2400', '3', 'Demon Slayer,Dragon Ball Super,', '7', '4', '365620', 'Fugudu\r\nNshdggn,,Hdhdf', 'cod', 'express', '2023-09-09', 'Delivered', 'Paid'),
(3, 'Harmish', 'harmishtervadiya@gmail.com', '8160331232', '500', '1', 'Naruto and Jiraiya Mobile case,', '8', '0', '365620', 'Chital,,Amreli', 'cod', 'express', '2023-09-12', 'Delivered', 'Paid'),
(4, 'Heet', 'cigixe2335@vreaa.com', '9313338641', '400', '1', 'Demon Slayer,', '7', '0', '365620', 'upleta,,Rajkot', 'cod', 'express', '2023-09-12', 'Not delivered', 'Not Paid'),
(5, 'Harmish', 'hnananiya813@rku.ac.in', '8160331232', '500', '1', 'Naruto and Jiraiya Mobile case,', '8', '0', '30006', 'Buri,,Junagadh', 'cod', 'express', '2023-09-12', 'Not delivered', 'Not Paid'),
(6, 'Teravadiya Harmis Kishorbhai', 'harmishtervadiya@gmail.com', '8160331232', '6500', '3', 'Itachi in rain figure,Zenitsu sword Drawing figure,Zoro wano style,', '10,9,11', '0', '365620', 'Chital High School,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(7, 'Teravadiya Harmis Kishorbhai', 'harmishtervadiya@gmail.com', '8160331232', '6500', '3', 'Itachi in rain figure,Zenitsu sword Drawing figure,Zoro wano style,', '10,9,11', '0', '365620', 'Chital High School,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(8, 'Teravadiya Harmis Kishorbhai', 'harmishtervadiya@gmail.com', '8160331232', '6500', '3', 'Itachi in rain figure,Zenitsu sword Drawing figure,Zoro wano style,', '10,9,11', '0', '365620', 'Chital High School,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(9, 'Teravadiya Harmis Kishorbhai', 'harmishtervadiya@gmail.com', '8160331232', '6500', '3', 'Itachi in rain figure,Zenitsu sword Drawing figure,Zoro wano style,', '10,9,11', '0', '365620', 'Chital High School,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(10, 'Teravadiya Harmis Kishorbhai', 'harmishtervadiya@gmail.com', '8160331232', '6500', '3', 'Itachi in rain figure,Zenitsu sword Drawing figure,Zoro wano style,', '10,9,11', '0', '365620', 'Chital High School,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(11, 'Teravadiya Harmis Kishorbhai', 'travaliya519@rku.ac.in', '8160331232', '1000', '1', ',Dragon Ball Super', '0', '2', '365620', 'Upleta,,Amreli', 'cod', 'express', '2023-09-21', 'Not delivered', 'Not Paid'),
(12, 'Harshit', 'hnananiya813@rku.ac.in', '8160331232', '1000', '2', 'Naruto and Jiraiya Mobile case,', '8', '0', '362640', 'Buri,,Manavadar', 'cod', 'express', '2023-09-26', 'Delivered', 'Paid'),
(13, 'Harmish Tervadiya', 'hnananiya813@rku.ac.in', '8160331232', '350', '1', 'Gojo Satoru Tshirt,', '1', '0', '365620', 'railway station road,,amreli', 'cod', 'express', '2023-11-03', 'Not delivered', 'Not Paid'),
(23, 'Harshit', 'hnananiya813@rku.ac.in', '8160331232', '1500', '1', 'Zenitsu sword Drawing figure,', '9', '0', '365620', 'railway station road,,amreli', 'cod', 'express', '2023-11-03', 'Not delivered', 'Not Paid'),
(24, 'Harshit', 'hnananiya813@rku.ac.in', '8160331232', '300', '1', 'Captain Levi Phone Case,', '12', '0', '365620', 'railway station road,,amreli', 'cod', 'express', '2023-11-03', 'Not delivered', 'Not Paid'),
(25, 'harshit', 'hnananiya813@rku.ac.in', '8160331232', '4000', '2', 'Zoro wano style,,Dragon Ball Super', '11', '2', '365620', 'railway station road,,amreli', 'cod', 'express', '2023-11-03', 'Not delivered', 'Not Paid');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('harmishtervadiya@gmail.com', '123', '2023-09-21 22:39:16');

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
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `stock` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `sell_count` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `release_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category`, `price`, `stock`, `description`, `rating`, `sell_count`, `pic`, `release_date`, `status`) VALUES
(1, 'Gojo Satoru Tshirt', 'Clothes', '350', '19', 'This is a tshirt with a new design of Gojo Satoru', '4', '6', '64e24b73ce3a8t1.webp', '2023-08-19', 'Active'),
(7, 'Demon Slayer', 'Clothes', '400', '14', 'Cotton T shirt with design of demon slayer logo', '1', '7', '64e21d3db5bd4tshrit3.webp', '2023-08-20', 'Active'),
(8, 'Naruto and Jiraiya Mobile case', 'Case', '500', '3', 'Stylish Mobile case with design of Jiraiya sama and Naruto together', '5', '7', '64e48cbb316d9case2.webp', '2023-08-22', 'Active'),
(9, 'Zenitsu sword Drawing figure', 'Figures', '1500', '5', 'Premium figure specialized by the japanese wood', '1', '5', '65003fbf55a1afg7.webp', '2023-09-12', 'Active'),
(10, 'Itachi in rain figure', 'Figures', '2000', '9', 'Premium itachi figure with a attractive design', '1', '1', '650040169e7b8fg8.jpg', '2023-09-12', 'Active'),
(11, 'Zoro wano style', 'Figures', '3000', '8', 'Zoro doing 3 sword style in wano getup', '1', '2', '65018af9b6063fg1.webp', '2023-09-13', 'Active'),
(12, 'Captain Levi Phone Case', 'Case', '300', '49', 'Attack on Titan favourite Captain Levi of Survival squad,\r\n\r\nNow Available in as a phone case\r\nApplicable to Realme Narzo 10 & 20', '1', '1', '6512a791b0a30case4.webp', '2023-09-26', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `pincode` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL DEFAULT 'images.png',
  `pwd` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'normal',
  `status` varchar(255) NOT NULL DEFAULT 'Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `name`, `email`, `mobile`, `gender`, `dob`, `pincode`, `address`, `pic`, `pwd`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Harmish Tervadiya', 'harmishtervadiya@gmail.com', '8160331232', 'Male', '2004-12-30', '365620', 'Near Navjivan mill Railway Station road , Chital , Amreli', 'images.png', '123', 'Admin', 'Active', '2023-08-16 04:43:53', '2023-08-20 09:01:51'),
(4, 'Harshit', 'hnananiya813@rku.ac.in', '8160331232', 'Male', '2023-08-02', '36', 'Buri, Manavadar', '653e93504110dimages.jpeg', '123', 'normal', 'Active', '2023-08-16 12:01:14', '2023-10-29 11:46:00'),
(17, 'Harmis', 'harmistervadiya@gmail.com', '8160331232', 'on', '2023-08-19', '365620', 'somewhere', 'images.png', 'Harmish@123', 'normal', 'Active', '2023-08-19 12:47:34', '2023-09-24 18:45:14'),
(18, 'Harmis', 'cigixe25@vreaa.com', '8160331232', 'on', '2023-08-19', '365620', 'somewhere', 'images.png', 'Harmish@123', 'normal', 'Inactive', '2023-08-19 12:48:58', '2023-08-19 12:48:58'),
(19, 'dummy2', 'xaxagat437@ipniel.com', '8160331232', 'Male', '2023-09-13', '30006', 'America', 'images.png', '123', 'normal', 'Active', '2023-09-13 04:01:54', '2023-09-13 04:19:03');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` bigint(20) UNSIGNED NOT NULL,
  `id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `manga_id` varchar(255) NOT NULL,
  `manga_name` varchar(255) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `review` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `id`, `user`, `email`, `product_name`, `product_id`, `manga_id`, `manga_name`, `pic`, `rating`, `review`, `date`) VALUES
(1, '1', 'Harmish Tervadiya', 'harmishtervadiya@gmail.com', '', '0', '1', 'Your Lie In April', '64e2d9bb9cd53manga1.jpg', '4', 'Very emotional manga', '2023-08-21'),
(2, '1', 'Harmish Tervadiya', 'harmishtervadiya@gmail.com', 'Gojo Satoru Tshirt', '1', '0', '', '64e24b73ce3a8t1.webp', '4', 'Good Product', '2023-08-21'),
(4, '4', 'Harshit', 'hnananiya813@rku.ac.in', 'Naruto and Jiraiya Mobile case', '8', '', '', '64e48cbb316d9case2.webp', '1', 'Nice', '2023-09-26'),
(5, '4', 'Harshit', 'hnananiya813@rku.ac.in', 'Naruto and Jiraiya Mobile case', '8', '', '', '64e48cbb316d9case2.webp', '4', 'Nice too', '2023-09-26');

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

-- --------------------------------------------------------

--
-- Table structure for table `user_requests`
--

CREATE TABLE `user_requests` (
  `request_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_requests`
--

INSERT INTO `user_requests` (`request_id`, `name`, `email`, `mobile`, `message`, `date`, `status`) VALUES
(1, 'Harmis', 'harmishtervadiya@gmail.com', '8160331232', 'This is for demo', '2023-08-21', 'Answered'),
(3, 'Harmis', 'harmishtervadiya@gmail.com', '8160331232', 'Something', '2023-09-26', 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_item_id`);

--
-- Indexes for table `delete_token`
--
ALTER TABLE `delete_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delete_token_email_foreign` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `mangas`
--
ALTER TABLE `mangas`
  ADD PRIMARY KEY (`manga_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registered_users_email_unique` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_requests`
--
ALTER TABLE `user_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `delete_token`
--
ALTER TABLE `delete_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mangas`
--
ALTER TABLE `mangas`
  MODIFY `manga_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_requests`
--
ALTER TABLE `user_requests`
  MODIFY `request_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `delete_token`
--
ALTER TABLE `delete_token`
  ADD CONSTRAINT `delete_token_email_foreign` FOREIGN KEY (`email`) REFERENCES `registered_users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
