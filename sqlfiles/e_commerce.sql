-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 05:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `region` varchar(30) DEFAULT NULL,
  `city_id_address` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `region`, `city_id_address`) VALUES
(1, 'الحي السياسي', 1),
(2, 'حي علوي السلامي', 1),
(3, 'لايوجد', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `all_items`
-- (See below for the actual view)
--
CREATE TABLE `all_items` (
`items_id` int(11)
,`items_name` varchar(100)
,`items_name_ar` varchar(100)
,`items_description` varchar(300)
,`items_description_ar` varchar(300)
,`items_image` varchar(255)
,`items_image2` varchar(255)
,`items_image3` varchar(255)
,`items_image4` varchar(255)
,`items_date_create` timestamp
,`items_active` tinyint(1)
,`items_count` int(11)
,`items_discount` smallint(3)
,`items_price` float
,`items_categories_id` int(11)
,`isInCart` varchar(9)
);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `users_cart_id` int(11) NOT NULL,
  `item_cart_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`users_cart_id`, `item_cart_id`, `quantity`) VALUES
(58, 8, 1),
(58, 10, 1),
(59, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `categories_name_ar` varchar(100) NOT NULL,
  `categories_image` varchar(255) DEFAULT NULL,
  `categories_date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `categories_description` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_name_ar`, `categories_image`, `categories_date_create`, `categories_description`) VALUES
(1, 'smart phones', 'هواتف ذكية', 'phoneSvg.svg', '2022-09-13 19:53:53', 'We have every thing you want'),
(2, 'shoes', 'احذية', 'shoesSvg.svg', '2022-09-13 19:54:59', 'we have every thing'),
(3, 'Laptops', 'لابتوب', 'laptopSvg.svg', '2022-09-13 19:55:46', 'we have every thing'),
(4, 'clothes', 'ملابس', 'dressSvg.svg', '2022-09-13 19:56:31', 'we have every thing'),
(5, 'Accessories', 'إكسسوارات', 'Accessory.svg', '2022-09-15 03:49:11', 'we have every thing'),
(6, 'games', 'العاب', 'ddd.svg', '2022-10-10 02:48:05', 'سسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسسس'),
(7, 'Computers', 'كمبيوترات', 'laptopSvg.svg', '2022-09-13 19:55:46', 'we have every thing'),
(8, 'Gifts', 'هدايا', 'gifts.svg', '2022-11-21 20:04:58', '...............');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `country_id_city` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country_id_city`) VALUES
(1, 'sana\'a', 1),
(2, 'taiz', 1),
(3, 'aden', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colors_options`
--

CREATE TABLE `colors_options` (
  `id` int(11) NOT NULL,
  `color_value` varchar(45) DEFAULT NULL,
  `color_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `colors_options`
--

INSERT INTO `colors_options` (`id`, `color_value`, `color_name`) VALUES
(5, '0xFFF9DFC8', 'gold'),
(6, '0xFF555450', 'graphit'),
(7, '0xFF526351', 'green'),
(8, '0xffB4022C', 'red'),
(9, '0xff481E61', 'purple'),
(10, '0xff9E6A3B', 'bage'),
(11, 'lightBlue', '0'),
(12, 'cyan', '0'),
(13, 'teal', '0'),
(14, 'green', '0'),
(15, 'lightGreen', '0'),
(16, 'lime', '0'),
(17, 'yellow', '0'),
(18, 'amber', '0'),
(19, 'orange', '0'),
(20, 'deepOrange', '0'),
(21, 'brown', '0'),
(22, 'blueGrey', '0'),
(23, 'redAccent', '0'),
(24, 'pinkAccent', '0'),
(25, 'purpleAccent', '0'),
(26, 'deepPurpleAccent', '0'),
(27, 'indigoAccent', '0'),
(28, 'blueAccent', '0'),
(29, 'lightBlueAccent', '0'),
(30, 'cyanAccent', '0'),
(31, 'tealAccent', '0'),
(32, 'greenAccent', '0'),
(33, 'lightGreenAccent', '0'),
(34, 'limeAccent', '0'),
(35, 'yellowAccent', '0'),
(36, 'amberAccent', '0'),
(37, 'orangeAccent', '0'),
(38, 'deepOrangeAccent', '0'),
(39, 'L', '0'),
(40, 'XL', '0'),
(41, 'S', '0'),
(42, 'M', '0');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`) VALUES
(1, 'Yemen');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `item_fav_id` int(11) NOT NULL,
  `users_fav_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`item_fav_id`, `users_fav_id`) VALUES
(1, 58),
(1, 59),
(4, 58),
(6, 58),
(7, 58),
(12, 58),
(13, 59);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `items_id` int(11) NOT NULL,
  `items_name` varchar(100) NOT NULL,
  `items_name_ar` varchar(100) NOT NULL,
  `items_description` varchar(300) NOT NULL,
  `items_description_ar` varchar(300) NOT NULL,
  `items_image` varchar(255) NOT NULL,
  `items_image2` varchar(255) DEFAULT NULL,
  `items_image3` varchar(255) DEFAULT NULL,
  `items_image4` varchar(255) DEFAULT NULL,
  `items_date_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `items_active` tinyint(1) NOT NULL DEFAULT 1,
  `items_count` int(11) NOT NULL,
  `items_discount` smallint(3) NOT NULL,
  `isDiscounted` tinyint(1) NOT NULL DEFAULT 0,
  `items_price` float NOT NULL,
  `items_categories_id` int(11) NOT NULL,
  `condition` int(1) DEFAULT NULL COMMENT '0 is old 1 is new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`items_id`, `items_name`, `items_name_ar`, `items_description`, `items_description_ar`, `items_image`, `items_image2`, `items_image3`, `items_image4`, `items_date_create`, `items_active`, `items_count`, `items_discount`, `isDiscounted`, `items_price`, `items_categories_id`, `condition`) VALUES
(1, 'laptop acer E5-73G', 'E5-73G لابتوب أيسر', 'RAM-8GB Storage-1T  RAM-8GB Storage-1T  ', 'رام-8جييجا تخزين-1تيرا رام-8جييجا تخزين-1تيرا', 'acer.png', 'acer.png', 'acer.png', 'acer.png', '2022-09-15 22:23:29', 1, 5, 6, 0, 1000, 3, NULL),
(4, 'Party dress', 'فستان حفلات', 'red dress with high quality', 'فستان احمر عالي الجودة', 'party_dress.png', 'reddDress.png', 'reddDress.png', 'reddDress.png', '2022-09-15 22:35:43', 1, 1250, 0, 0, 50, 4, NULL),
(6, 'Samsung glaxy s21', 'سامسونج جلاكسي اس 21', 'RAM-16GB Storage 128GB RAM-16GB Storage 128GB ', 'رام-8جييجا تخزين-128جيجا رام-8جييجا تخزين-128جيجا', 'samsung21.png', 'samsung21.png', 'samsung21.png', 'samsung21.png', '2022-09-19 04:55:24', 1, 100, 0, 0, 880, 1, NULL),
(7, 'LG stylo44', 'ال جي ستايلو 44', 'RAM-16GB Storage 128GB RAM-16GB Storage 128GB ', 'رام-8جييجا تخزين-128جيجا رام-8جييجا تخزين-128جيجا', 'lgstylo44.png', 'lgstylo44.png', 'lgstylo44.png', 'lgstylo44.png', '2022-09-19 04:55:24', 1, 8, 0, 0, 200, 1, NULL),
(8, 'sony xperiaz20', 'سوني اكسبيريا 20', 'RAM-16GB Storage 128GB RAM-16GB Storage 128GB ', 'رام-8جييجا تخزين-128جيجا رام-8جييجا تخزين-128جيجا', 'xperia.png', 'xperia.png', 'xperia.png', 'xperia.png', '2022-09-19 04:55:24', 1, 10, 1, 0, 400, 1, NULL),
(9, 'high heels', 'كعب عالي', 'amazing red high heels ', 'كعب عالي رائع', 'highHeels.png', 'highHeels.png', 'highHeels.png', 'highHeels.png', '2022-09-23 05:37:32', 1, 20, 1, 0, 22, 2, NULL),
(10, 'Sport Nike Shoes', 'حذاء نايك رياضي', 'Sport Nike Shoes Sport Nike Shoes Sport Nike Shoes', 'حذاء نايك رياضي حذاء نايك رياضي حذاء نايك رياضي حذاء نايك رياضي ', 'nikeShoes.png', 'nikeShoes.png', 'nikeShoes.png', 'nikeShoes.png', '2022-10-06 22:10:18', 1, 4, 1, 0, 88, 2, NULL),
(12, 'iphone13 pro', 'ايفون 13 برو', 'RAM-16GB Storage 128GB RAM-16GB Storage 128GB RAM-16GB Storage 128GB RAM-16GB Storage 128GB ', 'رام-8جييجا تخزين-128جيجا رام-8جييجا تخزين-128جيجا', 'iphone13pro128.png', 'iphone13pro.png', 'iphone13pro.png', 'iphone13pro.png', '2022-09-19 04:55:24', 1, 120, 0, 0, 1200, 1, NULL),
(13, 'laptop acer E5-73G', 'E5-73G لابتوب أيسر', 'RAM-8GB Storage-1T  RAM-8GB Storage-1T  ', 'رام-8جييجا تخزين-1تيرا رام-8جييجا تخزين-1تيرا', 'acer.png', 'acer.png', 'acer.png', 'acer.png', '2022-09-15 22:23:29', 1, 5, 6, 0, 1000, 3, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_configuration`
--

CREATE TABLE `item_configuration` (
  `item_id_config` int(11) DEFAULT NULL,
  `image_name` varchar(255) NOT NULL,
  `config_id` int(11) NOT NULL,
  `color_option_id` int(11) DEFAULT NULL,
  `size_option_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `item_configuration`
--

INSERT INTO `item_configuration` (`item_id_config`, `image_name`, `config_id`, `color_option_id`, `size_option_id`) VALUES
(4, 'purple_dress.png', 10, 9, 1),
(4, 'red_dress.png', 11, 8, 2),
(4, 'bage_dress.png', 12, 10, 3),
(12, 'iphone_13_gold.png', 16, 5, 8),
(12, 'iphone_13_graphit.png', 17, 6, 8),
(12, 'iphone_13_green.png', 18, 7, 8);

-- --------------------------------------------------------

--
-- Stand-in structure for view `item_view`
-- (See below for the actual view)
--
CREATE TABLE `item_view` (
`categories_id` int(11)
,`categories_name` varchar(100)
,`categories_name_ar` varchar(100)
,`categories_image` varchar(255)
,`categories_date_create` timestamp
,`categories_description` varchar(300)
,`items_id` int(11)
,`items_name` varchar(100)
,`items_name_ar` varchar(100)
,`items_description` varchar(300)
,`items_description_ar` varchar(300)
,`items_image` varchar(255)
,`items_date_create` timestamp
,`items_active` tinyint(1)
,`items_count` int(11)
,`items_discount` smallint(3)
,`items_price` float
,`items_categories_id` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `user_id_order` int(11) DEFAULT NULL,
  `order_date` timestamp NULL DEFAULT current_timestamp(),
  `ship_id` int(11) DEFAULT NULL,
  `is_delivered` tinyint(1) DEFAULT 0,
  `total` int(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id_order`, `order_date`, `ship_id`, `is_delivered`, `total`) VALUES
(1, 58, '2022-12-28 20:39:55', NULL, 1, 6336),
(2, 58, '2022-12-28 20:40:09', NULL, 0, 6336),
(3, 58, '2022-12-29 01:47:48', NULL, 0, 2900),
(4, 58, '2022-12-29 01:51:15', NULL, 0, 1400),
(5, 58, '2022-12-29 01:54:54', NULL, 0, 1422),
(6, 58, '2022-12-29 02:04:23', NULL, 0, 2298),
(7, 58, '2022-12-29 03:29:34', NULL, 0, 940),
(8, 58, '2022-12-29 03:37:56', NULL, 0, 940),
(9, 58, '2022-12-29 03:38:51', NULL, 0, 88),
(10, 58, '2022-12-31 00:57:24', NULL, 0, 1000),
(11, 58, '2022-12-31 01:06:15', NULL, 0, 940),
(12, 58, '2022-12-31 01:07:11', NULL, 0, 396),
(13, 58, '2022-12-31 01:07:43', NULL, 0, 396),
(14, 58, '2022-12-31 01:09:06', NULL, 0, 940),
(15, 58, '2022-12-31 01:11:57', NULL, 1, 396),
(16, 58, '2022-12-31 01:12:48', NULL, 1, 396),
(17, 58, '2022-12-31 01:56:29', NULL, 0, 22),
(18, 58, '2023-01-01 22:07:57', NULL, 0, 22),
(19, 58, '2023-01-01 22:09:30', NULL, 0, 88),
(20, 58, '2023-01-01 22:13:31', NULL, 0, 150),
(21, 58, '2023-01-01 23:12:24', NULL, 0, 50),
(22, 58, '2023-01-01 23:16:36', NULL, 0, 1600),
(23, 58, '2023-01-03 20:12:19', NULL, 0, 400),
(24, 58, '2023-01-04 23:25:07', NULL, 0, 396),
(25, 58, '2023-01-05 21:59:47', NULL, 1, 940),
(26, 58, '2023-01-06 03:16:43', NULL, 0, 940),
(27, 58, '2023-01-06 03:17:06', NULL, 0, 88),
(28, 58, '2023-01-06 23:09:10', NULL, 0, 940),
(29, 58, '2023-01-06 23:11:39', NULL, 0, 50),
(30, 58, '2023-03-14 15:54:50', NULL, 0, 880),
(31, 59, '2024-01-31 20:42:25', NULL, 1, 940),
(32, 58, '2024-02-01 15:51:40', NULL, 0, 940),
(33, 58, '2024-02-01 15:52:06', NULL, 0, 396);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `item_id_order` int(11) NOT NULL,
  `item_name_order` varchar(100) DEFAULT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(20) DEFAULT NULL,
  `discount` int(4) DEFAULT NULL,
  `unti_price` int(10) DEFAULT NULL,
  `total_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`item_id_order`, `item_name_order`, `order_id`, `quantity`, `discount`, `unti_price`, `total_price`) VALUES
(1, 'laptop acer E5-73G', 25, 1, 6, 1000, 940),
(1, 'laptop acer E5-73G', 26, 1, 6, 1000, 940),
(1, 'laptop acer E5-73G', 28, 1, 6, 1000, 940),
(1, 'laptop acer E5-73G', 31, 1, 6, 1000, 940),
(1, 'laptop acer E5-73G', 32, 1, 6, 1000, 940),
(4, 'Party dress', 29, 1, 0, 50, 50),
(6, 'Samsung glaxy s21', 30, 1, 0, 880, 880),
(8, 'sony xperiaz20', 24, 1, 1, 400, 396),
(8, 'sony xperiaz20', 33, 1, 1, 400, 396),
(10, 'Sport Nike Shoes', 27, 1, 1, 88, 87.12),
(12, 'iphone13 pro', 2, 2, 0, 1200, 2400);

--
-- Triggers `order_details`
--
DELIMITER $$
CREATE TRIGGER `befor_insert_order` BEFORE INSERT ON `order_details` FOR EACH ROW BEGIN 
SET new.item_name_order =(SELECT `items`.`items_name` FROM `items` WHERE `items`.`items_id`=new.item_id_order);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `id` int(11) NOT NULL,
  `user_id_pay` int(11) DEFAULT NULL,
  `pay_type_id` int(11) DEFAULT NULL,
  `provider` varchar(35) DEFAULT NULL,
  `account_number` int(30) DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT current_timestamp(),
  `is_default` tinyint(1) DEFAULT NULL,
  `remittance_number` varchar(55) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `sender_name` varchar(200) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `user_id_pay`, `pay_type_id`, `provider`, `account_number`, `payment_date`, `is_default`, `remittance_number`, `amount`, `sender_name`, `phone_number`) VALUES
(1, 58, 2, 'Transfer the amount through Al-Kura', 0, '2022-12-24 21:19:34', NULL, '01012356', 7960, 'ashraf', '442948'),
(2, 58, 1, 'pay when receive', 0, '2022-12-24 21:24:05', NULL, '', 7960, '', '123456789'),
(3, 58, 1, 'pay when receive', 0, '2022-12-24 21:26:33', NULL, '', 7960, '', '5454'),
(4, 58, 1, 'pay when receive', 0, '2022-12-24 21:32:35', NULL, '', 7960, '', 'ssssss'),
(5, 58, 1, 'pay when receive', 0, '2022-12-24 22:28:04', NULL, '', 7960, '', '555568955'),
(6, 58, 1, 'pay when receive', 0, '2022-12-24 22:30:36', NULL, '', 7960, '', '858987'),
(7, 58, 6, 'Transfer the amount through Mobilee', 0, '2022-12-24 22:31:37', NULL, 'sssss', 7960, 'sss', 'sssss'),
(8, 58, 1, 'pay when receive', 0, '2022-12-24 22:36:42', NULL, '', 7960, '', '2222222222222'),
(9, 58, 1, 'pay when receive', 0, '2022-12-24 22:49:53', NULL, '', 7960, '', 'ssssss'),
(10, 58, 1, 'pay when receive', 0, '2022-12-24 23:28:25', NULL, '', 5000, '', '555'),
(11, 58, 1, 'pay when receive', 0, '2022-12-24 23:38:17', NULL, '', 57586, '', 'zzz'),
(12, 58, 1, 'pay when receive', 0, '2022-12-24 23:39:59', NULL, '', 5000, '', '5555'),
(13, 58, 1, 'pay when receive', 0, '2022-12-25 00:35:28', NULL, '', 57636, '', '222'),
(14, 58, 1, 'pay when receive', 0, '2022-12-25 20:53:56', NULL, '', 47598, '', '888'),
(15, 58, 1, 'pay when receive', 0, '2022-12-25 21:24:03', NULL, '', 47598, '', '9898'),
(16, 58, 1, 'pay when receive', 0, '2022-12-25 21:25:52', NULL, '', 47598, '', '00000'),
(17, 58, 1, 'pay when receive', 0, '2022-12-25 21:29:25', NULL, '', 50, '', '5555'),
(18, 58, 1, 'pay when receive', 0, '2022-12-25 21:58:17', NULL, '', 48798, '', '54545'),
(19, 58, 1, 'pay when receive', 0, '2022-12-27 01:08:26', NULL, '', 48748, '', '4432895'),
(20, 58, 1, 'pay when receive', 0, '2022-12-27 01:12:22', NULL, '', 48748, '', '5555555'),
(21, 58, 1, 'pay when receive', 0, '2022-12-27 01:13:02', NULL, '', 48748, '', '55555'),
(22, 58, 1, 'pay when receive', 0, '2022-12-27 01:13:49', NULL, '', 48748, '', '44444'),
(23, 58, 1, 'pay when receive', 0, '2022-12-27 01:25:31', NULL, '', 48748, '', '1111'),
(24, 58, 1, 'pay when receive', 0, '2022-12-27 01:36:10', NULL, '', 150, '', 'zzzz'),
(25, 58, 1, 'pay when receive', 0, '2022-12-27 01:59:02', NULL, '', 48748, '', '11111'),
(26, 58, 1, 'pay when receive', 0, '2022-12-27 02:07:07', NULL, '', 48748, '', '2222'),
(27, 58, 1, 'pay when receive', 0, '2022-12-27 02:20:40', NULL, '', 48948, '', '63555'),
(28, 58, 1, 'pay when receive', 0, '2022-12-27 05:45:55', NULL, '', 45950, '', '738990995'),
(29, 58, 1, 'pay when receive', 0, '2022-12-28 20:21:48', NULL, '', 45950, '', '55555558888888'),
(30, 58, 1, 'pay when receive', 0, '2022-12-28 20:36:02', NULL, '', 1400, '', '333333'),
(31, 58, 5, 'Transfer the amount through kash', 0, '2022-12-29 01:47:47', NULL, '0323952010', 2900, 'ahsraf', '442948'),
(32, 58, 1, 'pay when receive', 0, '2022-12-29 01:51:15', NULL, '', 1400, '', '256'),
(33, 58, 1, 'pay when receive', 0, '2022-12-29 01:54:54', NULL, '', 1422, '', '111616'),
(34, 58, 1, 'pay when receive', 0, '2022-12-29 02:04:23', NULL, '', 2298, '', '1111'),
(35, 58, 1, 'pay when receive', 0, '2022-12-29 03:29:34', NULL, '', 940, '', '151515'),
(36, 58, 1, 'pay when receive', 0, '2022-12-29 03:37:56', NULL, '', 940, '', '222222222'),
(37, 58, 1, 'pay when receive', 0, '2022-12-29 03:38:51', NULL, '', 88, '', '2222222'),
(38, 58, 1, 'pay when receive', 0, '2022-12-31 00:54:15', NULL, '', 0, '', '555'),
(39, 58, 1, 'pay when receive', 0, '2022-12-31 00:55:39', NULL, '', 0, '', '4444'),
(40, 58, 1, 'pay when receive', 0, '2022-12-31 00:57:24', NULL, '', 1000, '', '22222'),
(41, 58, 1, 'pay when receive', 0, '2022-12-31 01:06:14', NULL, '', 940, '', '735739008'),
(42, 58, 1, 'pay when receive', 0, '2022-12-31 01:07:10', NULL, '', 396, '', '8989'),
(43, 58, 1, 'pay when receive', 0, '2022-12-31 01:07:43', NULL, '', 396, '', '858'),
(44, 58, 1, 'pay when receive', 0, '2022-12-31 01:09:05', NULL, '', 940, '', '3333333333'),
(45, 58, 1, 'pay when receive', 0, '2022-12-31 01:11:57', NULL, '', 396, '', '555'),
(46, 58, 1, 'pay when receive', 0, '2022-12-31 01:12:48', NULL, '', 396, '', '555'),
(47, 58, 1, 'pay when receive', 0, '2022-12-31 01:56:29', NULL, '', 22, '', '222'),
(48, 58, 1, 'pay when receive', 0, '2023-01-01 22:07:56', NULL, '', 22, '', '222'),
(49, 58, 1, 'pay when receive', 0, '2023-01-01 22:09:29', NULL, '', 88, '', '22222'),
(50, 58, 1, 'pay when receive', 0, '2023-01-01 22:13:31', NULL, '', 150, '', '22222'),
(51, 58, 1, 'pay when receive', 0, '2023-01-01 23:12:24', NULL, '', 50, '', '738990995'),
(52, 58, 1, 'pay when receive', 0, '2023-01-01 23:16:36', NULL, '', 1600, '', '5454'),
(53, 58, 1, 'pay when receive', 0, '2023-01-03 20:12:19', NULL, '', 400, '', '5555'),
(54, 58, 1, 'pay when receive', 0, '2023-01-04 23:25:07', NULL, '', 396, '', 'sssssssssssssss'),
(55, 58, 1, 'pay when receive', 0, '2023-01-05 21:59:46', NULL, '', 940, '', '442948'),
(56, 58, 1, 'pay when receive', 0, '2023-01-06 03:16:43', NULL, '', 940, '', '22222222'),
(57, 58, 1, 'pay when receive', 0, '2023-01-06 03:17:06', NULL, '', 88, '', '585696'),
(58, 58, 1, 'pay when receive', 0, '2023-01-06 23:09:10', NULL, '', 940, '', '738990995'),
(59, 58, 1, 'pay when receive', 0, '2023-01-06 23:11:38', NULL, '', 50, '', '2563'),
(60, 58, 1, 'pay when receive', 0, '2023-03-14 15:54:50', NULL, '', 880, '', '738990995'),
(61, 59, 1, 'pay when receive', 0, '2024-01-31 20:42:25', NULL, '', 940, '', '738990995'),
(62, 58, 1, 'pay when receive', 0, '2024-02-01 15:51:40', NULL, '', 940, '', '738990995'),
(63, 58, 1, 'pay when receive', 0, '2024-02-01 15:52:06', NULL, '', 396, '', '738990995');

--
-- Triggers `payment_method`
--
DELIMITER $$
CREATE TRIGGER `check_provider` BEFORE INSERT ON `payment_method` FOR EACH ROW BEGIN 
SET new.provider =(SELECT `payment_type`.payment_name FROM `payment_type` WHERE `payment_type`.payment_id=new.pay_type_id);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `payment_id` int(11) NOT NULL,
  `payment_name` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`payment_id`, `payment_name`) VALUES
(1, 'pay when receive'),
(2, 'Transfer the amount through Al-Kuraimi.'),
(3, 'Transfer the amount through Al-Najm'),
(4, 'Transfer the amount through Al-qutaibi'),
(5, 'Transfer the amount through kash'),
(6, 'Transfer the amount through Mobilee');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `stars` int(11) DEFAULT 0,
  `content` varchar(400) DEFAULT NULL,
  `item_id_review` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `stars`, `content`, `item_id_review`, `user_id`) VALUES
(1, 5, 'jjjjj', 1, 53),
(5, 3, 'half and half ', 1, 58),
(6, 4, 'veryGood', 1, 44),
(8, 5, 'veryGood', 4, 58),
(9, 2, 'sss', 8, 58),
(10, 3, '', 10, 58),
(11, 4, 'good', 1, 59);

-- --------------------------------------------------------

--
-- Table structure for table `size_options`
--

CREATE TABLE `size_options` (
  `id` int(11) NOT NULL,
  `size_value` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `size_options`
--

INSERT INTO `size_options` (`id`, `size_value`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'XL'),
(4, 'XXL'),
(5, 'L'),
(6, 'XXXL'),
(7, '256GB'),
(8, '128GB');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` varchar(100) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_phone` varchar(40) NOT NULL,
  `users_verifycode` int(11) NOT NULL,
  `users_approve` tinyint(4) NOT NULL DEFAULT 0,
  `users_create` timestamp NOT NULL DEFAULT current_timestamp(),
  `password` varchar(100) NOT NULL,
  `users_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `users_name`, `users_email`, `users_phone`, `users_verifycode`, `users_approve`, `users_create`, `password`, `users_image`) VALUES
(44, 'ashraf', 'ash323wsserw@gmail.com', '0096772894099220', 60513, 0, '2022-11-03 22:53:38', '5191', NULL),
(45, 'dddddddddddddd', 'dddddddddd@gmail.com', '88888888888888', 12954, 0, '2022-11-05 22:45:39', '45409aefae8ead1b57bf152871ae57e94d347254', NULL),
(46, 'aasssaass', 'ashrafee@gmail.com', '738990995', 27089, 1, '2022-11-06 23:14:44', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(47, 'alooooooosh', 'ashrafammar@gmail.com', '738990990', 97017, 1, '2022-11-06 23:19:02', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(48, 'ayoot', 'aya2001@gmail.com', '0096772894099228', 20248, 1, '2022-11-06 23:41:37', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(49, 'ayoooota', 'aya20011@gmail.com', '738990495', 89362, 0, '2022-11-07 23:08:36', '7c222fb2927d828af22f592134e8932480637c0d', NULL),
(51, 'ashraf abdooo', 'ashrafabood@gmail.com', '777777777', 20843, 0, '2022-11-07 23:44:43', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(53, 'aaaaaaaa', 'rrrrrrrrrrr@gamil.com', '44444444444', 73186, 0, '2022-11-08 00:02:00', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(54, 'ggggggggggg', 'ggggggg@gmail.com', '11111111111111', 57843, 1, '2022-11-08 00:50:03', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL),
(55, 'ffffaaaaffff', 'fffaaaafff@gmail.com', '7888888888888', 14085, 1, '2022-11-08 19:31:32', '7c222fb2927d828af22f592134e8932480637c0d', NULL),
(56, 'ashhhhhh', 'ashhhhrr@gmail.com', '22222333333332', 79785, 0, '2022-11-08 20:22:44', '7c222fb2927d828af22f592134e8932480637c0d', NULL),
(58, 'ashraf abdo', 'ashrafabdo6622@gmail.com', '00967738995995', 81329, 1, '2022-11-09 03:08:57', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', '419558_ashrafabdo.jpg'),
(59, 'ashraf abdo', 'ashrafabdulmajeed1@gmail.com', '00967738990995', 70183, 1, '2024-01-31 18:37:41', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `user_id` int(11) DEFAULT NULL,
  `first_name` varchar(35) DEFAULT NULL,
  `second_name` varchar(35) DEFAULT NULL,
  `third_name` varchar(35) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `Neighborhood` varchar(35) DEFAULT NULL,
  `street_name` varchar(35) DEFAULT NULL,
  `nearest_place` varchar(35) DEFAULT NULL,
  `is_default` tinyint(1) DEFAULT NULL,
  `phone_number` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_address`
--

INSERT INTO `user_address` (`user_id`, `first_name`, `second_name`, `third_name`, `address_id`, `Neighborhood`, `street_name`, `nearest_place`, `is_default`, `phone_number`) VALUES
(58, 'ashraf', 'abdoulmajeed', 'al_mekhlafi', 1, 'sالحي السياسي', 'bنواكشط', 'مستشفى الاوقاف', NULL, '55885');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_auth`
-- (See below for the actual view)
--
CREATE TABLE `user_auth` (
`users_id` int(11)
,`users_name` varchar(100)
,`users_email` varchar(100)
,`users_phone` varchar(40)
,`users_verifycode` int(11)
,`users_approve` tinyint(4)
,`users_create` timestamp
,`password` varchar(100)
,`users_auth` varchar(14)
);

-- --------------------------------------------------------

--
-- Structure for view `all_items`
--
DROP TABLE IF EXISTS `all_items`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `all_items`  AS SELECT `items`.`items_id` AS `items_id`, `items`.`items_name` AS `items_name`, `items`.`items_name_ar` AS `items_name_ar`, `items`.`items_description` AS `items_description`, `items`.`items_description_ar` AS `items_description_ar`, `items`.`items_image` AS `items_image`, `items`.`items_image2` AS `items_image2`, `items`.`items_image3` AS `items_image3`, `items`.`items_image4` AS `items_image4`, `items`.`items_date_create` AS `items_date_create`, `items`.`items_active` AS `items_active`, `items`.`items_count` AS `items_count`, `items`.`items_discount` AS `items_discount`, `items`.`items_price` AS `items_price`, `items`.`items_categories_id` AS `items_categories_id`, CASE WHEN (select `cart`.`item_cart_id` from (`cart` join `users`) where `items`.`items_id` = `cart`.`item_cart_id` AND `users`.`users_id` = `cart`.`users_cart_id`) is null THEN 'notInCart' ELSE 'inCart' END AS `isInCart` FROM `items``items`  ;

-- --------------------------------------------------------

--
-- Structure for view `item_view`
--
DROP TABLE IF EXISTS `item_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `item_view`  AS SELECT `categories`.`categories_id` AS `categories_id`, `categories`.`categories_name` AS `categories_name`, `categories`.`categories_name_ar` AS `categories_name_ar`, `categories`.`categories_image` AS `categories_image`, `categories`.`categories_date_create` AS `categories_date_create`, `categories`.`categories_description` AS `categories_description`, `items`.`items_id` AS `items_id`, `items`.`items_name` AS `items_name`, `items`.`items_name_ar` AS `items_name_ar`, `items`.`items_description` AS `items_description`, `items`.`items_description_ar` AS `items_description_ar`, `items`.`items_image` AS `items_image`, `items`.`items_date_create` AS `items_date_create`, `items`.`items_active` AS `items_active`, `items`.`items_count` AS `items_count`, `items`.`items_discount` AS `items_discount`, `items`.`items_price` AS `items_price`, `items`.`items_categories_id` AS `items_categories_id` FROM (`items` join `categories` on(`categories`.`categories_id` = `items`.`items_categories_id`))  ;

-- --------------------------------------------------------

--
-- Structure for view `user_auth`
--
DROP TABLE IF EXISTS `user_auth`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `user_auth`  AS SELECT `users`.`users_id` AS `users_id`, `users`.`users_name` AS `users_name`, `users`.`users_email` AS `users_email`, `users`.`users_phone` AS `users_phone`, `users`.`users_verifycode` AS `users_verifycode`, `users`.`users_approve` AS `users_approve`, `users`.`users_create` AS `users_create`, `users`.`password` AS `password`, CASE WHEN `users`.`users_email` <> 'aya2001@gmail.com' THEN 'email error' WHEN `users`.`password` <> 'f7c3bc1d808e04732adf679965ccc34ca7ae3441' THEN 'PASSWORD ERROR' WHEN `users`.`users_email` = 'aya2001@gmail.com' AND `users`.`password` = 'f7c3bc1d808e04732adf679965ccc34ca7ae3441' AND `users`.`users_approve` = 1 THEN 'success' WHEN `users`.`users_email` = 'aya2001@gmail.com' AND `users`.`password` = 'f7c3bc1d808e04732adf679965ccc34ca7ae3441' AND `users`.`users_approve` <> 1 THEN 'not approved' END AS `users_auth` FROM `users``users`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `city_id_address` (`city_id_address`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`users_cart_id`,`item_cart_id`),
  ADD KEY `item_cart_id` (`item_cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `country_id_city` (`country_id_city`);

--
-- Indexes for table `colors_options`
--
ALTER TABLE `colors_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`item_fav_id`,`users_fav_id`),
  ADD KEY `users_fav_id` (`users_fav_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`items_id`),
  ADD KEY `items_categorie_id` (`items_categories_id`);

--
-- Indexes for table `item_configuration`
--
ALTER TABLE `item_configuration`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `item_id_image` (`item_id_config`),
  ADD KEY `variation_option_id` (`color_option_id`),
  ADD KEY `size_option_id` (`size_option_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id_order` (`user_id_order`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`item_id_order`,`order_id`),
  ADD KEY `order_details_ibfk_1` (`order_id`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_pay` (`user_id_pay`),
  ADD KEY `pay_type_id` (`pay_type_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id_review` (`item_id_review`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `size_options`
--
ALTER TABLE `size_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `users_email` (`users_email`),
  ADD UNIQUE KEY `users_phone` (`users_phone`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `address_id` (`address_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors_options`
--
ALTER TABLE `colors_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `items_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `item_configuration`
--
ALTER TABLE `item_configuration`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `size_options`
--
ALTER TABLE `size_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`city_id_address`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`item_cart_id`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`users_cart_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id_city`) REFERENCES `country` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`item_fav_id`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorite_ibfk_2` FOREIGN KEY (`users_fav_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_categorie_id` FOREIGN KEY (`items_categories_id`) REFERENCES `categories` (`categories_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item_configuration`
--
ALTER TABLE `item_configuration`
  ADD CONSTRAINT `item_configuration_ibfk_1` FOREIGN KEY (`item_id_config`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_configuration_ibfk_3` FOREIGN KEY (`color_option_id`) REFERENCES `colors_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `item_configuration_ibfk_4` FOREIGN KEY (`size_option_id`) REFERENCES `size_options` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`user_id_order`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`item_id_order`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD CONSTRAINT `payment_method_ibfk_1` FOREIGN KEY (`user_id_pay`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_method_ibfk_2` FOREIGN KEY (`pay_type_id`) REFERENCES `payment_type` (`payment_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`item_id_review`) REFERENCES `items` (`items_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`);

--
-- Constraints for table `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_address_ibfk_2` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
