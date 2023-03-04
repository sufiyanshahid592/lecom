-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2023 at 04:30 PM
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
(6, 'Qty'),
(7, 'Coting');

-- --------------------------------------------------------

--
-- Table structure for table `attributes_value`
--

CREATE TABLE `attributes_value` (
  `attribute_value_id` int(11) NOT NULL,
  `attribute_value_title` varchar(255) DEFAULT NULL,
  `attribute_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_value`
--

INSERT INTO `attributes_value` (`attribute_value_id`, `attribute_value_title`, `attribute_id`) VALUES
(3, '10', '6'),
(4, 'Small', '5'),
(5, 'Medium', '5'),
(6, 'Large', '5'),
(7, '20', '6'),
(8, '30', '6'),
(9, 'Yes', '7'),
(10, 'No', '7');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_1_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_1_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_2_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_2_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_3_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_3_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_4_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_4_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_5_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_5_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_6_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_6_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_7_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_7_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_8_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_8_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_9_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_9_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_10_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_10_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_1_title`, `banner_1_image`, `banner_2_title`, `banner_2_image`, `banner_3_title`, `banner_3_image`, `banner_4_title`, `banner_4_image`, `banner_5_title`, `banner_5_image`, `banner_6_title`, `banner_6_image`, `banner_7_title`, `banner_7_image`, `banner_8_title`, `banner_8_image`, `banner_9_title`, `banner_9_image`, `banner_10_title`, `banner_10_image`) VALUES
(1, 'First', 'banner-1.webp', 'Second', 'banner-2.webp', 'Third', 'banner-3.webp', 'Fourth', 'banner-4.webp', 'Fifth', 'banner-5.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_slug` varchar(255) DEFAULT NULL,
  `blog_meta_keywords` text DEFAULT NULL,
  `blog_meta_description` text DEFAULT NULL,
  `blog_short_description` text DEFAULT NULL,
  `blog_long_description` text DEFAULT NULL,
  `blog_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`blog_id`, `blog_title`, `blog_slug`, `blog_meta_keywords`, `blog_meta_description`, `blog_short_description`, `blog_long_description`, `blog_image`) VALUES
(4, 'first', 'first', 'first', 'first', 'first', 'first', 'CMX.png');

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
  `popular_product` varchar(255) DEFAULT NULL,
  `daily_best_sells` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_slug`, `category_meta_title`, `category_meta_keyword`, `category_meta_description`, `category_image`, `category_icon`, `parent_category`, `category_placement`, `popular_product`, `daily_best_sells`) VALUES
(8, 'Milks and Dairies', 'milks-and-dairies', 'Milks and Dairies', 'Milks and Dairies', 'Milks and Dairies', 'cat-13.png', 'category-1.svg', NULL, '[\"1\",\"2\"]', '1', '1'),
(9, 'Clothing & beauty', 'clothing-and-beauty', 'Clothing & beauty', 'Clothing & beauty', 'Clothing & beauty', 'cat-13.png', 'category-2.svg', NULL, '[\"1\",\"2\"]', '1', '1'),
(10, 'Pet Foods & Toy', 'pet-foods-and-toy', 'Pet Foods & Toy', 'Pet Foods & Toy', 'Pet Foods & Toy', 'cat-13.png', 'category-3.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(11, 'Baking material', 'baking-material', 'Baking material', 'Baking material', 'Baking material', 'cat-13.png', 'category-4.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(12, 'Fresh Fruit', 'fresh-fruit', 'Fresh Fruit', 'Fresh Fruit', 'Fresh Fruit', 'cat-13.png', 'category-5.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(13, 'Wines & Drinks', 'wines-and-drinks', 'Wines & Drinks', 'Wines & Drinks', 'Wines & Drinks', 'cat-13.png', 'category-6.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(14, 'Fresh Seafood', 'fresh-seafood', 'Fresh Seafood', 'Fresh Seafood', 'Fresh Seafood', 'cat-13.png', 'category-7.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(15, 'Fast food', 'fast-food', 'Fast food', 'Fast food', 'Fast food', 'cat-13.png', 'category-8.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(16, 'Vegetables', 'vegetables', 'Vegetables', 'Vegetables', 'Vegetables', 'cat-13.png', 'category-9.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(17, 'Bread and Juice', 'bread-and-juice', 'Bread and Juice', 'Bread and Juice', 'Bread and Juice', 'cat-13.png', 'category-10.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(28, 'Milks and Dairies', 'milks-and-dairies', 'Milks and Dairies', 'Milks and Dairies', 'Milks and Dairies', 'cat-13.png', 'category-1.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(29, 'Clothing & beauty', 'clothing-and-beauty', 'Clothing & beauty', 'Clothing & beauty', 'Clothing & beauty', 'cat-13.png', 'category-2.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(31, 'Baking material', 'baking-material', 'Baking material', 'Baking material', 'Baking material', 'cat-13.png', 'category-4.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(32, 'Fresh Fruit', 'fresh-fruit', 'Fresh Fruit', 'Fresh Fruit', 'Fresh Fruit', 'cat-13.png', 'category-5.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(33, 'Wines & Drinks', 'wines-and-drinks', 'Wines & Drinks', 'Wines & Drinks', 'Wines & Drinks', 'cat-13.png', 'category-6.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(34, 'Fresh Seafood', 'fresh-seafood', 'Fresh Seafood', 'Fresh Seafood', 'Fresh Seafood', 'cat-13.png', 'category-7.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(35, 'Fast food', 'fast-food', 'Fast food', 'Fast food', 'Fast food', 'cat-13.png', 'category-8.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(36, 'Vegetables', 'vegetables', 'Vegetables', 'Vegetables', 'Vegetables', 'cat-13.png', 'category-9.svg', NULL, '[\"1\",\"2\"]', NULL, NULL),
(37, 'Bread and Juice', 'bread-and-juice', 'Bread and Juice', 'Bread and Juice', 'Bread and Juice', 'cat-13.png', 'category-10.svg', NULL, '[\"1\",\"2\"]', NULL, NULL);

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
  `cart_product` text DEFAULT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `order_date` varchar(255) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `fname`, `lname`, `billing_address1`, `billing_address2`, `country`, `city`, `zipcode`, `phone`, `additional_information`, `payment_option`, `cart_product`, `order_total`, `order_date`, `payment_status`) VALUES
(4, 'Sufiyan', 'Shahid', 'Gulshan Sardar Town', 'Ferozwala', 'PK', 'Lahore', '54000', '03014065723', 'this is first order', '2', '{\"ad715e924b0e24ed154b4d0d0c1cc647\":{\"rowId\":\"ad715e924b0e24ed154b4d0d0c1cc647\",\"id\":\"11\",\"name\":\"Seventh\",\"qty\":1,\"price\":25,\"weight\":0,\"options\":{\"image\":\"7.png\",\"product_variations\":\"{}\"},\"discount\":0,\"tax\":0,\"subtotal\":25}}', '25.00', '1661275613', '0'),
(5, 'Sufiyan', 'Shahid', 'Gulshan Sardar', 'Ferozwala', 'AF', 'Lahore', '54000', '03014065723', 'this is my first order', '1', '{\"9ab04229e081c9b0610f9c1507bda897\":{\"rowId\":\"9ab04229e081c9b0610f9c1507bda897\",\"id\":\"5\",\"name\":\"First\",\"qty\":1,\"price\":25,\"weight\":0,\"options\":{\"image\":\"1.png\",\"product_variations\":\"{\\\"Size\\\":\\\"Small\\\",\\\"Qty\\\":\\\"10\\\"}\"},\"discount\":0,\"tax\":0,\"subtotal\":25}}', '25.00', '1663588639', '1'),
(6, 'Sufiyan', 'Shahid', 'Gulshan Sardar Town', 'Ferozwala', 'PK', 'Lahore', '54000', '03014065723', 'this is my first order', '1', '{\"9ab04229e081c9b0610f9c1507bda897\":{\"rowId\":\"9ab04229e081c9b0610f9c1507bda897\",\"id\":\"5\",\"name\":\"First\",\"qty\":\"1\",\"price\":25,\"weight\":0,\"options\":{\"image\":\"1.png\",\"product_variations\":\"{\\\"Size\\\":\\\"Small\\\",\\\"Qty\\\":\\\"10\\\"}\"},\"discount\":0,\"tax\":0,\"subtotal\":25}}', '25.00', '1664253665', '2'),
(7, 'Sufiyan', 'Shahid', 'Gulshan Sardar Town', 'Ferozwala', 'PK', 'Lahore', '54000', '03014065723', 'this is my first order', '2', '{\"9ab04229e081c9b0610f9c1507bda897\":{\"rowId\":\"9ab04229e081c9b0610f9c1507bda897\",\"id\":\"5\",\"name\":\"First\",\"qty\":\"1\",\"price\":25,\"weight\":0,\"options\":{\"image\":\"1.png\",\"product_variations\":\"{\\\"Size\\\":\\\"Small\\\",\\\"Qty\\\":\\\"10\\\"}\"},\"discount\":0,\"tax\":0,\"subtotal\":25}}', '25.00', '1664253893', '0');

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
  `product_discount_price` int(255) DEFAULT NULL,
  `product_label` varchar(255) DEFAULT NULL,
  `product_fall_in` varchar(255) DEFAULT NULL,
  `related_product` text DEFAULT NULL,
  `product_variations` text DEFAULT NULL,
  `product_variations_values` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_slug`, `product_category`, `product_meta_title`, `product_meta_keyword`, `product_meta_description`, `product_short_description`, `product_long_description`, `product_image`, `product_hover_image`, `product_gallery`, `product_sale_price`, `product_discount_price`, `product_label`, `product_fall_in`, `related_product`, `product_variations`, `product_variations_values`) VALUES
(5, 'First', 'first1', '8', 'First', 'First', 'First', '<b>First 1</b>', 'First', '1.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 80, '1', '1', '[\"6\",\"7\",\"8\"]', '[\"5\",\"6\"]', '{\"Size\":[\"Small\",\"Medium\",\"Large\"],\"Qty\":[\"10\",\"20\",\"30\"]}'),
(6, 'Second', 'second', '9', 'Second', 'Second', 'Second', '<b>Second 1</b>', 'First', '2.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 50, '3', '1', '[]', '[\"5\",\"6\",\"7\"]', '{\"Size\":[\"Small\",\"Medium\",\"Large\"],\"Coting\":[\"Yes\"]}'),
(7, 'Third', 'third', '8', 'Third', 'Third', 'Third', '<b>Third</b><br>', 'Third', '3.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 120, '1', '1', '[]', '[\"5\",\"6\",\"7\"]', '{\"Size\":[\"Small\",\"Medium\",\"Large\"],\"Qty\":[\"10\",\"20\",\"30\"],\"Coting\":[\"Yes\",\"No\"]}'),
(8, 'Fourth', 'fourth', '9', 'Fourth', 'Fourth', 'Fourth', '<b>Fourth</b><br>', 'Fourth', '4.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 40, '3', '2', '[]', '[\"5\",\"6\",\"7\"]', NULL),
(9, 'Fifth', 'fifth', '8', 'Fifth', 'Fifth', 'Fifth', '<b>Fifth</b><br>', 'Fifth', '5.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 20, '1', '2', '[]', '[\"5\",\"6\",\"7\"]', NULL),
(10, 'Sixth', 'sixth', '9', 'Sixth', 'Sixth', 'Sixth', '<b>Sixth</b><br>', 'Sixth', '6.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 60, '3', '2', '[]', '[\"5\", \"7\"]', NULL),
(11, 'Seventh', 'seventh', '8', 'Seventh', 'Seventh', 'Seventh', '<b>Seventh</b><br>', 'Seventh', '7.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 70, '1', '3', '[]', '[\"5\", \"6\"]', NULL),
(12, 'Eight', 'eight', '9', 'Eight', 'Eight', 'Eight', '<b>Eight</b><br>', 'Eight', '8.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 10, '3', '3', '[]', '[\"5\",\"6\",\"7\"]', NULL),
(13, 'Ninth', 'ninth', '8', 'Ninth', 'Ninth', 'Ninth', '<b>Ninth</b><br>', 'Ninth', '9.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 90, '1', '3', '[]', '[\"5\", \"6\"]', NULL),
(14, 'Tenth', 'tenth', '9', 'Tenth', 'Tenth', 'Tenth', '<b>Tenth</b><br>', 'Tenth', '10.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 100, '3', '4', '[]', '[\"5\",\"6\",\"7\"]', NULL),
(15, 'Eleventh', 'eleventh', '8', 'Eleventh', 'Eleventh', 'Eleventh', '<b>Eleventh</b><br>', 'Eleventh', '11.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 110, '1', '4', '[]', '[\"5\", \"7\"]', NULL),
(16, 'Twelveth', 'twelveth', '9', 'Twelveth', 'Twelveth', 'Twelveth', '<b>Twelveth</b><br>', 'Twelveth', '12.png', '2.png', '{\"product_gallery_1\":\"cat-13.png\",\"product_gallery_2\":\"2.png\",\"product_gallery_3\":\"3.png\",\"product_gallery_4\":\"4.png\",\"product_gallery_5\":\"5.png\",\"product_gallery_6\":\"6.png\",\"product_gallery_7\":\"7.png\",\"product_gallery_8\":\"8.png\"}', '30', 30, '3', '4', '[]', '[\"5\", \"7\"]', NULL),
(23, 'Last', 'last', '8', 'last', 'last', 'last', '<p>last<br></p>', '<p>last<br></p>', '9.png', '10.png', '{\"product_gallery_1\":\"image-1.png\",\"product_gallery_2\":\"image-2.png\",\"product_gallery_3\":\"image-3.png\",\"product_gallery_4\":\"image-4.png\",\"product_gallery_5\":\"image-5.png\"}', '20', 130, '2', 'none', '[\"7\",\"8\"]', 'null', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `product_variation_id` int(11) NOT NULL,
  `product_variation_data` text DEFAULT NULL,
  `product_variation_price` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`product_variation_id`, `product_variation_data`, `product_variation_price`, `product_id`) VALUES
(4, '{\"Size\":\"Small\",\"Coting\":\"Yes\"}', '10', 6),
(5, '{\"Size\":\"Medium\",\"Coting\":\"Yes\"}', '20', 6),
(6, '{\"Size\":\"Large\",\"Coting\":\"Yes\"}', '30', 6),
(45, '{\"Size\":\"Small\",\"Qty\":\"10\",\"Coting\":\"Yes\"}', '1', 7),
(46, '{\"Size\":\"Small\",\"Qty\":\"20\",\"Coting\":\"Yes\"}', '2', 7),
(47, '{\"Size\":\"Small\",\"Qty\":\"30\",\"Coting\":\"Yes\"}', '3', 7),
(48, '{\"Size\":\"Medium\",\"Qty\":\"10\",\"Coting\":\"Yes\"}', '4', 7),
(49, '{\"Size\":\"Medium\",\"Qty\":\"20\",\"Coting\":\"Yes\"}', '5', 7),
(50, '{\"Size\":\"Medium\",\"Qty\":\"30\",\"Coting\":\"Yes\"}', '6', 7),
(51, '{\"Size\":\"Large\",\"Qty\":\"10\",\"Coting\":\"Yes\"}', '7', 7),
(52, '{\"Size\":\"Large\",\"Qty\":\"20\",\"Coting\":\"Yes\"}', '8', 7),
(53, '{\"Size\":\"Large\",\"Qty\":\"30\",\"Coting\":\"Yes\"}', '9', 7),
(54, '{\"Size\":\"Small\",\"Qty\":\"10\",\"Coting\":\"No\"}', '10', 7),
(55, '{\"Size\":\"Small\",\"Qty\":\"20\",\"Coting\":\"No\"}', '11', 7),
(56, '{\"Size\":\"Small\",\"Qty\":\"30\",\"Coting\":\"No\"}', '12', 7),
(57, '{\"Size\":\"Medium\",\"Qty\":\"10\",\"Coting\":\"No\"}', '13', 7),
(58, '{\"Size\":\"Medium\",\"Qty\":\"20\",\"Coting\":\"No\"}', '14', 7),
(59, '{\"Size\":\"Medium\",\"Qty\":\"30\",\"Coting\":\"No\"}', '15', 7),
(60, '{\"Size\":\"Large\",\"Qty\":\"10\",\"Coting\":\"No\"}', '16', 7),
(61, '{\"Size\":\"Large\",\"Qty\":\"20\",\"Coting\":\"No\"}', '17', 7),
(62, '{\"Size\":\"Large\",\"Qty\":\"30\",\"Coting\":\"No\"}', '18', 7),
(143, '{\"Size\":\"Small\",\"Qty\":\"10\"}', '80', 5),
(144, '{\"Size\":\"Small\",\"Qty\":\"20\"}', '3', 5),
(145, '{\"Size\":\"Small\",\"Qty\":\"30\"}', '5', 5),
(146, '{\"Size\":\"Medium\",\"Qty\":\"10\"}', '7', 5),
(147, '{\"Size\":\"Medium\",\"Qty\":\"20\"}', '9', 5),
(148, '{\"Size\":\"Medium\",\"Qty\":\"30\"}', '11', 5),
(149, '{\"Size\":\"Large\",\"Qty\":\"10\"}', '13', 5),
(150, '{\"Size\":\"Large\",\"Qty\":\"20\"}', '15', 5),
(151, '{\"Size\":\"Large\",\"Qty\":\"30\"}', '17', 5);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `website_currency` varchar(255) DEFAULT NULL,
  `website_address` text DEFAULT NULL,
  `website_number` varchar(255) DEFAULT NULL,
  `website_email` varchar(255) DEFAULT NULL,
  `website_timing` text DEFAULT NULL,
  `website_footer_description` text DEFAULT NULL,
  `website_logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`setting_id`, `website_title`, `website_currency`, `website_address`, `website_number`, `website_email`, `website_timing`, `website_footer_description`, `website_logo`) VALUES
(1, 'Laravel Ecommerce Website', 'Rs', '5171 W Campbell Ave undefined Kent, Utah 53127 United States', '(+91) - 540-025-124553', 'info@ecommerce.com', '10:00 - 18:00, Mon - Sat', 'Awesome grocery store website template', 'logo.svg');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`slider_id`, `slider_title`, `slider_image`, `slider_description`) VALUES
(4, 'Don’t miss amazing', 'slider-7.png', 'Sign up for the daily newsletter'),
(5, 'Fresh Vegetable', 'slider-8.png', 'Sign up for the daily newsletter');

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
-- Indexes for table `attributes_value`
--
ALTER TABLE `attributes_value`
  ADD PRIMARY KEY (`attribute_value_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

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
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`product_variation_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`slider_id`);

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
  MODIFY `attribute_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attributes_value`
--
ALTER TABLE `attributes_value`
  MODIFY `attribute_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `product_variation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
