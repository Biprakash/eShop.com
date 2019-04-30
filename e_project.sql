-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 04:31 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_project`
--

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
(1, '2018_08_20_161758_create_tbl_admin_table', 1),
(2, '2018_08_21_170607_create_tbl_category_table', 2),
(3, '2018_09_01_110102_create_manufacture_table', 3),
(5, '2018_09_04_191459_create_tbl_products_table', 4),
(6, '2018_09_21_104706_create_tbl_slider_table', 5),
(7, '2018_10_01_094039_create_tbl_customer_table', 6),
(9, '2018_10_02_103928_create_shipping_table', 7),
(10, '2018_10_05_175450_create_tbl_payment_table', 8),
(11, '2018_10_05_175619_create_users_table', 8),
(12, '2018_10_05_175700_create_tbl_order_table', 8),
(13, '2018_10_05_175756_create_tbl_order_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(2, 'biprakashmandal@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'biprakash', '01798495808', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publications_status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_name`, `category_description`, `publications_status`, `created_at`, `updated_at`) VALUES
(6, 'Men', 'This is for men category', 1, NULL, NULL),
(7, 'Women', 'This is for women category', 1, NULL, NULL),
(8, 'Children', 'This is for children Category', 1, NULL, NULL),
(9, 'Others', 'This is for others category', 1, NULL, NULL),
(10, 'Electric', 'Electric category', 0, NULL, NULL),
(11, 'Mobile Phone', 'This is for mobile phone Category', 1, NULL, NULL),
(12, 'Laptop', 'This is For Laptop Category', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_mobile`, `created_at`, `updated_at`) VALUES
(1, 'Biprakash', 'biprakash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01798495808', NULL, NULL),
(2, 'Biprakash', 'biprakash@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01798495808', NULL, NULL),
(3, 'Rajib', 'rajib@gmail.com', '01cfcd4f6b8770febfb40cb906715822', '01798495807', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung.', 'this is for samsung brands', '1', NULL, NULL),
(4, 'Adidas', 'This is for addidas', '1', NULL, NULL),
(5, 'Chillor Rose', 'Women brands.', '1', NULL, NULL),
(7, 'Appex', 'This is for appex brands', '1', NULL, NULL),
(8, 'Nokia', 'This is for nokia', '1', NULL, NULL),
(9, 'Apple', 'This is for apple Brands', '1', NULL, NULL),
(10, 'RFL', 'it is for rfl product description', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '81,820.00', 'pending', '2019-01-09 13:44:11', NULL),
(2, 3, 2, 2, '2,480.00', 'pending', '2019-01-09 13:50:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 'Telivesion', '80000', '1', NULL, NULL),
(2, 1, 10, 'Electric Ketle', '1820', '1', NULL, NULL),
(3, 2, 7, 'Shirt', '1240', '1', NULL, NULL),
(4, 2, 9, 'T-Shirt', '620', '2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'handkash', 'pending', '2019-01-09 13:44:11', NULL),
(2, 'handkash', 'pending', '2019-01-09 13:50:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `manufacture_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_statuse` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `category_id`, `manufacture_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_statuse`, `created_at`, `updated_at`) VALUES
(2, 11, 9, 'iPhone 8 plus', 'this is for short description', 'This is for long Description', 80000.00, 'image/OuXrGnne6jpAhaOgHu2p.png', '6 inch', 'Read,Brown,bluck', 1, NULL, NULL),
(6, 10, 10, 'Vision Fan', 'This is for the RFl product description', '<span style=\"font-size: 13.3333px;\">This is for the RFl product description</span><span style=\"font-size: 13.3333px;\">This is for the RFl product description</span><span style=\"font-size: 13.3333px;\">This is for the RFl product description</span><span style=\"font-size: 13.3333px;\">This is for the RFl product description</span><span style=\"font-size: 13.3333px;\">This is for the RFl product description</span><span style=\"font-size: 13.3333px;\">This is for the RFl product description</span>', 1800.00, 'image/FTLmlvtZES8BNgnQTfG8.jpeg', '56 inch', 'White', 1, NULL, NULL),
(7, 6, 4, 'Shirt', 'this is for shirt&nbsp;', '<span style=\"font-size: 13.3333px;\">this is for shirt&nbsp;</span><span style=\"font-size: 13.3333px;\">this is for shirt&nbsp;</span><span style=\"font-size: 13.3333px;\">this is for shirt&nbsp;</span>', 1240.00, 'image/DXts6QA40skRWJvOaFqP.jpg', 'S', 'Black', 1, NULL, NULL),
(8, 10, 1, 'Telivesion', 'telivesion', 'tv tv t ttv tvt tvt tv', 80000.00, 'image/Ew2d9MpRZ2aaW2mWj5am.jpg', '56 inch', 'Black', 1, NULL, NULL),
(9, 6, 4, 'T-Shirt', 'nfjjkfnvjkfdnvjfnd', 'ghghgfbghfghghfgfghgfhrthrt', 620.00, 'image/k7sNFV25nQyYJvpOLfTK.jpg', 'M', 'White', 1, NULL, NULL),
(10, 10, 1, 'Electric Ketle', 'fgfdgfndjnjdgjdngfdnerijirejhherug', '<span style=\"font-size: 13.3333px;\">Amar sonar bangla</span><span style=\"font-size: 13.3333px;\">Amar sonar bangla</span><span style=\"font-size: 13.3333px;\">Amar sonar bangla</span><span style=\"font-size: 13.3333px;\">Amar sonar bangla</span>', 1820.00, 'image/0gmdUa8aNSsrzoZag7HQ.jpg', '12', 'Black', 1, NULL, NULL),
(11, 10, 1, 'Oven', 'dfnndjvhfdhuoehruhjkhfjkhgjfd', '<span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdg</span><span style=\"font-size: 13.3333px;\">ffbfdgfgfgfhfh</span>', 5200.00, 'image/EfSuGEv3RFsRYV4dZjaO.jpg', '23', 'White', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_first_aname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_last_aname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_mobile` int(11) NOT NULL,
  `customer_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id`, `customer_email`, `customer_first_aname`, `customer_last_aname`, `customer_address`, `customer_mobile`, `customer_city`, `created_at`, `updated_at`) VALUES
(1, 'biprakash@gmail.com', 'Biprakash', 'Mandal', 'Pirojpur', 1709999999, 'Barishal', NULL, NULL),
(2, 'rajib@gmail.com', 'Rajib', 'Halder', 'nazirpur', 191945656, 'Barishal', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'sliders/YME7G7ZFwYrANNGFckKA.jpg', '1', NULL, NULL),
(3, 'sliders/rvrMjEArlrtS82J9SqSF.jpg', '1', NULL, NULL),
(4, 'sliders/Q1UQBAoPXidvkpbHb855.jpg', '1', NULL, NULL),
(5, 'sliders/w3TEmKcgUQ8AOmCyxLib.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
