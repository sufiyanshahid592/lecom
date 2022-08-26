-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2022 at 06:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'sufiyanshahid592@gmail.com', 'c63967a4dd011e9272dd3e273fc8f8a3');

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attribute_id` int(11) NOT NULL,
  `attribute_title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attribute_id`, `attribute_title`) VALUES
(5, 'Size'),
(6, 'Qty');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` text DEFAULT NULL,
  `category_slug` text DEFAULT NULL,
  `category_meta_title` text DEFAULT NULL,
  `category_meta_keyword` text DEFAULT NULL,
  `category_meta_description` text DEFAULT NULL,
  `category_image` text DEFAULT NULL,
  `category_icon` text DEFAULT NULL,
  `parent_category` int(11) DEFAULT NULL,
  `category_placement` text DEFAULT NULL,
  `popular_product` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_meta_title`, `category_meta_keyword`, `category_meta_description`, `category_image`, `category_icon`, `parent_category`, `category_placement`, `popular_product`) VALUES
(8, 'Milks and Dairies', 'milks-and-dairies', 'Milks and Dairies', 'Milks and Dairies', 'Milks and Dairies', 'cat-13.png', 'category-1.svg', NULL, '[\"1\",\"2\"]', '1'),
(9, 'Clothing & beauty', 'clothing-and-beauty', 'Clothing & beauty', 'Clothing & beauty', 'Clothing & beauty', 'cat-13.png', 'category-2.svg', NULL, '[\"1\",\"2\"]', '1'),
(10, 'Pet Foods & Toy', 'pet-foods-and-toy', 'Pet Foods & Toy', 'Pet Foods & Toy', 'Pet Foods & Toy', 'cat-13.png', 'category-3.svg', NULL, '[\"1\",\"2\"]', NULL),
(11, 'Baking material', 'baking-material', 'Baking material', 'Baking material', 'Baking material', 'cat-13.png', 'category-4.svg', NULL, '[\"1\",\"2\"]', NULL),
(12, 'Fresh Fruit', 'fresh-fruit', 'Fresh Fruit', 'Fresh Fruit', 'Fresh Fruit', 'cat-13.png', 'category-5.svg', NULL, '[\"1\",\"2\"]', NULL),
(13, 'Wines & Drinks', 'wines-and-drinks', 'Wines & Drinks', 'Wines & Drinks', 'Wines & Drinks', 'cat-13.png', 'category-6.svg', NULL, '[\"1\",\"2\"]', NULL),
(14, 'Fresh Seafood', 'fresh-seafood', 'Fresh Seafood', 'Fresh Seafood', 'Fresh Seafood', 'cat-13.png', 'category-7.svg', NULL, '[\"1\",\"2\"]', NULL),
(15, 'Fast food', 'fast-food', 'Fast food', 'Fast food', 'Fast food', 'cat-13.png', 'category-8.svg', NULL, '[\"1\",\"2\"]', NULL),
(16, 'Vegetables', 'vegetables', 'Vegetables', 'Vegetables', 'Vegetables', 'cat-13.png', 'category-9.svg', NULL, '[\"1\",\"2\"]', NULL),
(17, 'Bread and Juice', 'bread-and-juice', 'Bread and Juice', 'Bread and Juice', 'Bread and Juice', 'cat-13.png', 'category-10.svg', NULL, '[\"1\",\"2\"]', NULL),
(28, 'Milks and Dairies', 'milks-and-dairies', 'Milks and Dairies', 'Milks and Dairies', 'Milks and Dairies', 'cat-13.png', 'category-1.svg', NULL, '[\"1\",\"2\"]', NULL),
(29, 'Clothing & beauty', 'clothing-and-beauty', 'Clothing & beauty', 'Clothing & beauty', 'Clothing & beauty', 'cat-13.png', 'category-2.svg', NULL, '[\"1\",\"2\"]', NULL),
(31, 'Baking material', 'baking-material', 'Baking material', 'Baking material', 'Baking material', 'cat-13.png', 'category-4.svg', NULL, '[\"1\",\"2\"]', NULL),
(32, 'Fresh Fruit', 'fresh-fruit', 'Fresh Fruit', 'Fresh Fruit', 'Fresh Fruit', 'cat-13.png', 'category-5.svg', NULL, '[\"1\",\"2\"]', NULL),
(33, 'Wines & Drinks', 'wines-and-drinks', 'Wines & Drinks', 'Wines & Drinks', 'Wines & Drinks', 'cat-13.png', 'category-6.svg', NULL, '[\"1\",\"2\"]', NULL),
(34, 'Fresh Seafood', 'fresh-seafood', 'Fresh Seafood', 'Fresh Seafood', 'Fresh Seafood', 'cat-13.png', 'category-7.svg', NULL, '[\"1\",\"2\"]', NULL),
(35, 'Fast food', 'fast-food', 'Fast food', 'Fast food', 'Fast food', 'cat-13.png', 'category-8.svg', NULL, '[\"1\",\"2\"]', NULL),
(36, 'Vegetables', 'vegetables', 'Vegetables', 'Vegetables', 'Vegetables', 'cat-13.png', 'category-9.svg', NULL, '[\"1\",\"2\"]', NULL),
(37, 'Bread and Juice', 'bread-and-juice', 'Bread and Juice', 'Bread and Juice', 'Bread and Juice', 'cat-13.png', 'category-10.svg', NULL, '[\"1\",\"2\"]', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `billing_address1` varchar(255) DEFAULT NULL,
  `billing_address2` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `additional_information` varchar(255) DEFAULT NULL,
  `payment_option` varchar(255) DEFAULT NULL,
  `cart_product` varchar(255) DEFAULT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fname`, `lname`, `billing_address1`, `billing_address2`, `country`, `city`, `zipcode`, `phone`, `additional_information`, `payment_option`, `cart_product`, `order_total`, `order_date`, `payment_status`) VALUES
(4, 'Sufiyan', 'Shahid', 'Gulshan Sardar Town', 'Ferozwala', 'PK', 'Lahore', '54000', '03014065723', 'this is first order', '2', '{\"ad715e924b0e24ed154b4d0d0c1cc647\":{\"rowId\":\"ad715e924b0e24ed154b4d0d0c1cc647\",\"id\":\"11\",\"name\":\"Seventh\",\"qty\":1,\"price\":25,\"weight\":0,\"options\":{\"image\":\"7.png\",\"product_variations\":\"{}\"},\"discount\":0,\"tax\":0,\"subtotal\":25}}', '25.00', '1661275613', '0');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_title` varchar(255) DEFAULT NULL,
  `product_slug` varchar(255) DEFAULT NULL,
  `product_category` varchar(255) DEFAULT NULL,
  `product_meta_title` text DEFAULT NULL,
  `product_meta_keyword` text DEFAULT NULL,
  `product_meta_description` text DEFAULT NULL,
  `product_short_description` text DEFAULT NULL,
  `product_long_description` text DEFAULT NULL,
  `product_image` text DEFAULT NULL,
  `product_hover_image` varchar(255) DEFAULT NULL,
  `product_gallery` text DEFAULT NULL,
  `product_sale_price` varchar(255) DEFAULT NULL,
  `product_discount_price` varchar(255) DEFAULT NULL,
  `product_label` varchar(255) DEFAULT NULL,
  `product_fall_in` varchar(255) DEFAULT NULL,
  `related_product` text DEFAULT NULL,
  `product_variations` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_slug`, `product_category`, `product_meta_title`, `product_meta_keyword`, `product_meta_description`, `product_short_description`, `product_long_description`, `product_image`, `product_hover_image`, `product_gallery`, `product_sale_price`, `product_discount_price`, `product_label`, `product_fall_in`, `related_product`, `product_variations`) VALUES
(5, 'First', 'first', '8', 'First', 'First', 'First', '<b>First 1</b>', 'First', '1.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '1', '[\"6\",\"7\",\"8\"]', '{\"Qty\":\"[\\\"10\\\",\\\"20\\\",\\\"30\\\"]\",\"Size\":\"[\\\"Small\\\",\\\"Medium\\\",\\\"Large\\\"]\"}'),
(6, 'Second', 'second', '9', 'Second', 'Second', 'Second', '<b>Second 1</b>', 'First', '2.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '1', '[]', '[]'),
(7, 'Third', 'third', '8', 'Third', 'Third', 'Third', '<b>Third</b><br>', 'Third', '3.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '1', '[]', '[]'),
(8, 'Fourth', 'fourth', '9', 'Fourth', 'Fourth', 'Fourth', '<b>Fourth</b><br>', 'Fourth', '4.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '2', '[]', '[]'),
(9, 'Fifth', 'fifth', '8', 'Fifth', 'Fifth', 'Fifth', '<b>Fifth</b><br>', 'Fifth', '5.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '2', '[]', '[]'),
(10, 'Sixth', 'sixth', '9', 'Sixth', 'Sixth', 'Sixth', '<b>Sixth</b><br>', 'Sixth', '6.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '2', '[]', '[]'),
(11, 'Seventh', 'seventh', '8', 'Seventh', 'Seventh', 'Seventh', '<b>Seventh</b><br>', 'Seventh', '7.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '3', '[]', '[]'),
(12, 'Eight', 'eight', '9', 'Eight', 'Eight', 'Eight', '<b>Eight</b><br>', 'Eight', '8.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '3', '[]', '[]'),
(13, 'Ninth', 'ninth', '8', 'Ninth', 'Ninth', 'Ninth', '<b>Ninth</b><br>', 'Ninth', '9.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '3', '[]', '[]'),
(14, 'Tenth', 'tenth', '9', 'Tenth', 'Tenth', 'Tenth', '<b>Tenth</b><br>', 'Tenth', '10.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '4', '[]', '[]'),
(15, 'Eleventh', 'eleventh', '8', 'Eleventh', 'Eleventh', 'Eleventh', '<b>Eleventh</b><br>', 'Eleventh', '11.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '25', '1', '4', '[]', '[]'),
(16, 'Twelveth', 'twelveth', '9', 'Twelveth', 'Twelveth', 'Twelveth', '<b>Twelveth</b><br>', 'Twelveth', '12.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', '15', '3', '4', '[]', '[]');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `website_currency` varchar(255) DEFAULT NULL,
  `website_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `website_title`, `website_currency`, `website_logo`) VALUES
(1, 'First Website 1', 'Rs', '11.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(13, 'Sufiyan', 'Shahid', 'sufiyanshahid592', 'sufiyanshahid592@gmail.com', 'c63967a4dd011e9272dd3e273fc8f8a3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attribute_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
