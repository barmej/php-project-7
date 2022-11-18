-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 08:51 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market`
--

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
(4, '2020_08_25_232000_create_stores_table', 1),
(5, '2020_08_25_232049_create_products_table', 1),
(6, '2020_08_25_232137_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_id`, `payment_type`, `status`, `products`, `store_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '86353126', 'VISA', 'paid', '[{\"id\":14,\"name\":\"Veniam.\",\"price\":\"34.782\",\"images\":null,\"store_id\":1,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":3}]', 1, 1, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(2, '52237895', 'CASH', 'pending', '[{\"id\":19,\"name\":\"Ullam vel.\",\"price\":\"294.405\",\"images\":null,\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1},{\"id\":40,\"name\":\"Quo.\",\"price\":\"65.515\",\"images\":null,\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 6, 18, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(3, '68109261', 'CASH', 'pending', '[{\"id\":38,\"name\":\"Vero.\",\"price\":\"285.437\",\"images\":null,\"store_id\":8,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":4}]', 1, 6, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(5, '15427063', 'VISA', 'paid', '[{\"id\":11,\"name\":\"Quia.\",\"price\":\"241.298\",\"images\":null,\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":4}]', 9, 1, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(6, '52020370', 'CASH', 'failed', '[{\"id\":6,\"name\":\"Doloribus.\",\"price\":\"142.873\",\"images\":null,\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 5, 6, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(7, '37319386', 'CASH', 'delivered', '[{\"id\":17,\"name\":\"Fugiat.\",\"price\":\"273.261\",\"images\":null,\"store_id\":4,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 8, 3, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(8, '94340910', 'VISA', 'failed', '[{\"id\":28,\"name\":\"Voluptas.\",\"price\":\"194.851\",\"images\":null,\"store_id\":9,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":3},{\"id\":7,\"name\":\"Placeat.\",\"price\":\"243.576\",\"images\":null,\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1},{\"id\":35,\"name\":\"Soluta.\",\"price\":\"124.480\",\"images\":null,\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":4}]', 9, 15, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(9, '20225426', 'VISA', 'delivered', '[{\"id\":22,\"name\":\"Ut earum.\",\"price\":\"14.907\",\"images\":null,\"store_id\":9,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":2},{\"id\":11,\"name\":\"Quia.\",\"price\":\"241.298\",\"images\":null,\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 5, 13, '2020-08-27 03:10:16', '2020-08-31 15:42:35'),
(11, '84586090', 'CASH', 'failed', '[{\"id\":27,\"name\":\"Adipisci.\",\"price\":\"88.162\",\"images\":null,\"store_id\":3,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1},{\"id\":15,\"name\":\"Ex cum.\",\"price\":\"140.184\",\"images\":null,\"store_id\":1,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":4}]', 2, 11, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(12, '33459058', 'CASH', 'pending', '[{\"id\":1,\"name\":\"Modi.\",\"price\":\"257.676\",\"images\":null,\"store_id\":1,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1},{\"id\":11,\"name\":\"Quia.\",\"price\":\"241.298\",\"images\":null,\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1},{\"id\":29,\"name\":\"Labore.\",\"price\":\"202.764\",\"images\":null,\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":2}]', 7, 17, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(13, '57690335', 'VISA', 'paid', '[{\"id\":40,\"name\":\"Quo.\",\"price\":\"65.515\",\"images\":null,\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":4},{\"id\":17,\"name\":\"Fugiat.\",\"price\":\"273.261\",\"images\":null,\"store_id\":4,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":2}]', 3, 19, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(14, '75248887', 'CASH', 'pending', '[{\"id\":29,\"name\":\"Labore.\",\"price\":\"202.764\",\"images\":null,\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":2}]', 4, 20, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(15, '24504675', 'VISA', 'failed', '[{\"id\":11,\"name\":\"Quia.\",\"price\":\"241.298\",\"images\":null,\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":3},{\"id\":40,\"name\":\"Quo.\",\"price\":\"65.515\",\"images\":null,\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":3}]', 3, 5, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(20, '54094752', 'cash', 'pending', '[{\"id\":21,\"name\":\"Aut sed.\",\"price\":\"183.566\",\"images\":null,\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 6, 8, '2020-08-27 03:10:16', '2020-08-27 03:10:16'),
(27, '74350913', 'VISA', 'delivered', '[{\"id\":6,\"name\":\"Doloribus.\",\"price\":\"142.873\",\"images\":null,\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":1}]', 5, 19, NULL, '2020-09-05 16:50:23'),
(51, 'chg_TS022920202050s4L40509099', 'VISA', 'shipped', '[{\"id\":46,\"name\":\"new robots\",\"price\":\"500.000\",\"images\":[],\"store_id\":14,\"created_at\":\"2020-09-05T15:38:34.000000Z\",\"updated_at\":\"2020-09-05T15:38:34.000000Z\",\"quantity\":2,\"store\":{\"id\":14,\"name\":\"Fatima Store\",\"description\":\"Awesome things!\",\"image\":null,\"user_id\":22,\"created_at\":\"2020-08-31T17:57:38.000000Z\",\"updated_at\":\"2020-08-31T17:57:38.000000Z\"}}]', 14, 13, '2020-09-05 13:54:48', '2020-09-05 20:42:59'),
(57, 'chg_TS060820202130Ph5s0509308', 'VISA', 'paid', '[{\"id\":38,\"name\":\"Vero.\",\"price\":\"285.437\",\"images\":[],\"store_id\":8,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":8,\"name\":\"Paucek, Klocko and Lynch\",\"description\":\"Laborum vero.\",\"image\":null,\"user_id\":19,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 8, 13, '2020-09-05 14:27:55', '2020-09-05 14:27:55'),
(61, '82418989', 'CASH', 'pending', '[{\"id\":2,\"name\":\"Dolores.\",\"price\":\"277.206\",\"images\":[],\"store_id\":4,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":4,\"name\":\"Kutch Inc\",\"description\":\"Aut et quam qui est.\",\"image\":null,\"user_id\":1,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 4, 13, '2020-09-05 15:07:50', '2020-09-05 15:07:50'),
(66, '59629742', 'CASH', 'delivered', '[{\"id\":25,\"name\":\"Est ut.\",\"price\":\"71.097\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"3\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-05 15:30:46', '2020-09-05 16:50:32'),
(67, 'chg_TS074720200004Ka4s0609669', 'VISA', 'delivered', '[{\"id\":25,\"name\":\"Est ut.\",\"price\":\"71.097\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"2\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-05 17:02:38', '2020-09-05 17:07:25'),
(69, '46800806', 'CASH', 'delivered', '[{\"id\":33,\"name\":\"Iste.\",\"price\":\"192.779\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-05 17:06:26', '2020-09-05 17:10:23'),
(70, '95660817', 'CASH', 'delivered', '[{\"id\":33,\"name\":\"Iste.\",\"price\":\"192.779\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-05 17:23:27', '2020-09-05 17:26:11'),
(71, '75822197', 'CASH', 'delivered', '[{\"id\":25,\"name\":\"Est ut.\",\"price\":\"71.097\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-05 17:29:32', '2020-09-05 17:36:37'),
(74, '23610651', 'CASH', 'delivered', '[{\"id\":48,\"name\":\"hayden store ideas\",\"price\":\"23.000\",\"images\":[\"\\/storage\\/productsImages\\/ZHB0e0zBuKEaJ8QRWMaoXch4F3hpdn9yF52apjgE.png\"],\"store_id\":15,\"created_at\":\"2020-09-05T22:51:32.000000Z\",\"updated_at\":\"2020-09-05T22:51:32.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":15,\"name\":\"Test\",\"description\":\"one user, more than one store, view orders for each\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-09-05T14:36:11.000000Z\",\"updated_at\":\"2020-09-05T14:36:11.000000Z\"}}]', 15, 22, '2020-09-05 19:06:41', '2020-09-06 11:36:50'),
(78, '87287785', 'CASH', 'delivered', '[{\"id\":48,\"name\":\"hayden store ideas\",\"price\":\"23.000\",\"images\":[\"\\/storage\\/productsImages\\/ZHB0e0zBuKEaJ8QRWMaoXch4F3hpdn9yF52apjgE.png\"],\"store_id\":15,\"created_at\":\"2020-09-05T22:51:32.000000Z\",\"updated_at\":\"2020-09-05T22:51:32.000000Z\",\"quantity\":\"5\",\"store\":{\"id\":15,\"name\":\"Test\",\"description\":\"one user, more than one store, view orders for each\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-09-05T14:36:11.000000Z\",\"updated_at\":\"2020-09-05T14:36:11.000000Z\"}}]', 15, 22, '2020-09-05 20:10:55', '2020-09-05 20:13:19'),
(79, '87287785', 'CASH', 'delivered', '[{\"id\":9,\"name\":\"Some kind of product.\",\"price\":\"150.623\",\"images\":[],\"store_id\":10,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T14:54:08.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":10,\"name\":\"Wilderman-Swaniawski\",\"description\":\"Sunt ducimus eum.\",\"image\":null,\"user_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 10, 22, '2020-09-05 20:10:55', '2020-09-05 20:40:13'),
(81, 'chg_TS061220201005Bu990609087', 'VISA', 'paid', '[{\"id\":25,\"name\":\"Est ut.\",\"price\":\"71.097\",\"images\":[],\"store_id\":5,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":5,\"name\":\"Friesen, Volkman \",\"description\":\"Recusandae dolores.\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 5, 22, '2020-09-06 03:03:16', '2020-09-06 03:03:16'),
(84, '36861884', 'CASH', 'pending', '[{\"id\":22,\"name\":\"Ut earum.\",\"price\":\"14.907\",\"images\":[],\"store_id\":9,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"3\",\"store\":{\"id\":9,\"name\":\"Cole-O\'Conner\",\"description\":\"Corrupti ea quam.\",\"image\":null,\"user_id\":8,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 9, 22, '2020-09-06 12:22:17', '2020-09-06 12:22:17'),
(85, 'chg_TS013520201557Dn240709385', 'VISA', 'paid', '[{\"id\":46,\"name\":\"new robots\",\"price\":\"500.000\",\"images\":[],\"store_id\":14,\"created_at\":\"2020-09-05T15:38:34.000000Z\",\"updated_at\":\"2020-09-05T15:38:34.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":14,\"name\":\"Fatima Store\",\"description\":\"Awesome things!\",\"image\":null,\"user_id\":22,\"created_at\":\"2020-08-31T17:57:38.000000Z\",\"updated_at\":\"2020-08-31T17:57:38.000000Z\"}}]', 14, 7, '2020-09-07 08:56:30', '2020-09-07 08:56:30'),
(86, '81736400', 'CASH', 'delivered', '[{\"id\":46,\"name\":\"new robots\",\"price\":\"500.000\",\"images\":[],\"store_id\":14,\"created_at\":\"2020-09-05T15:38:34.000000Z\",\"updated_at\":\"2020-09-05T15:38:34.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":14,\"name\":\"Fatima Store\",\"description\":\"Awesome things!\",\"image\":null,\"user_id\":22,\"created_at\":\"2020-08-31T17:57:38.000000Z\",\"updated_at\":\"2020-08-31T17:57:38.000000Z\"}}]', 14, 26, '2020-09-07 09:23:41', '2020-09-07 09:39:42'),
(87, 'chg_TS033320201649h2LT0709669', 'VISA', 'delivered', '[{\"id\":52,\"name\":\"drone\",\"price\":\"1200.000\",\"images\":[\"\\/storage\\/productsImages\\/7vMDPv63ueCaTu3UGLaZPnTkXZkbBQkkPc4z72bM.jpeg\"],\"store_id\":17,\"created_at\":\"2020-09-07T13:39:22.000000Z\",\"updated_at\":\"2020-09-07T13:39:22.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":17,\"name\":\"Salem Store\",\"description\":\"awesome things hehehe\",\"image\":\"\\/storage\\/logos\\/kkVbgfMUcuoYho35EI9Oo6UJcNqbp9kKR7Jd4eo2.jpeg\",\"user_id\":26,\"created_at\":\"2020-09-07T13:28:03.000000Z\",\"updated_at\":\"2020-09-07T13:28:03.000000Z\"}}]', 17, 22, '2020-09-07 09:47:13', '2020-09-07 09:49:26'),
(88, 'chg_TS033320201649h2LT0709669', 'VISA', 'paid', '[{\"id\":13,\"name\":\"Labore.\",\"price\":\"102.918\",\"images\":[],\"store_id\":7,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"3\",\"store\":{\"id\":7,\"name\":\"Haag-Zboncak\",\"description\":\"Nostrum amet.\",\"image\":null,\"user_id\":3,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 7, 22, '2020-09-07 09:47:13', '2020-09-07 09:47:13'),
(89, '81635836', 'CASH', 'pending', '[{\"id\":52,\"name\":\"drone\",\"price\":\"1200.000\",\"images\":[\"\\/storage\\/productsImages\\/7vMDPv63ueCaTu3UGLaZPnTkXZkbBQkkPc4z72bM.jpeg\"],\"store_id\":17,\"created_at\":\"2020-09-07T13:39:22.000000Z\",\"updated_at\":\"2020-09-07T13:39:22.000000Z\",\"quantity\":\"3\",\"store\":{\"id\":17,\"name\":\"Salem Store\",\"description\":\"awesome things hehehe\",\"image\":\"\\/storage\\/logos\\/kkVbgfMUcuoYho35EI9Oo6UJcNqbp9kKR7Jd4eo2.jpeg\",\"user_id\":26,\"created_at\":\"2020-09-07T13:28:03.000000Z\",\"updated_at\":\"2020-09-07T13:28:03.000000Z\"}}]', 17, 7, '2020-09-08 04:45:02', '2020-09-08 04:45:02'),
(90, '81635836', 'CASH', 'pending', '[{\"id\":46,\"name\":\"new robots\",\"price\":\"500.000\",\"images\":[],\"store_id\":14,\"created_at\":\"2020-09-05T15:38:34.000000Z\",\"updated_at\":\"2020-09-05T15:38:34.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":14,\"name\":\"Fatima Store\",\"description\":\"Awesome things!\",\"image\":null,\"user_id\":22,\"created_at\":\"2020-08-31T17:57:38.000000Z\",\"updated_at\":\"2020-08-31T17:57:38.000000Z\"}}]', 14, 7, '2020-09-08 04:45:02', '2020-09-08 04:45:02'),
(91, '53191133', 'CASH', 'pending', '[{\"id\":48,\"name\":\"hayden store ideas\",\"price\":\"23.000\",\"images\":[\"\\/storage\\/productsImages\\/ZHB0e0zBuKEaJ8QRWMaoXch4F3hpdn9yF52apjgE.png\"],\"store_id\":15,\"created_at\":\"2020-09-05T22:51:32.000000Z\",\"updated_at\":\"2020-09-05T22:51:32.000000Z\",\"quantity\":\"3\",\"store\":{\"id\":15,\"name\":\"Test\",\"description\":\"one user, more than one store, view orders for each\",\"image\":null,\"user_id\":13,\"created_at\":\"2020-09-05T14:36:11.000000Z\",\"updated_at\":\"2020-09-05T14:36:11.000000Z\"}}]', 15, 7, '2020-09-08 04:46:47', '2020-09-08 04:46:47'),
(92, '53191133', 'CASH', 'pending', '[{\"id\":21,\"name\":\"Aut sed.\",\"price\":\"183.566\",\"images\":[],\"store_id\":6,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":6,\"name\":\"Weber-Ziemann\",\"description\":\"Ipsa molestiae.\",\"image\":null,\"user_id\":10,\"created_at\":\"2020-08-27T07:10:15.000000Z\",\"updated_at\":\"2020-08-27T07:10:15.000000Z\"}}]', 6, 7, '2020-09-08 04:46:47', '2020-09-08 04:46:47'),
(93, 'chg_TS073620201151x4XK0809988', 'VISA', 'paid', '[{\"id\":52,\"name\":\"drone\",\"price\":\"1200.000\",\"images\":[\"\\/storage\\/productsImages\\/7vMDPv63ueCaTu3UGLaZPnTkXZkbBQkkPc4z72bM.jpeg\"],\"store_id\":17,\"created_at\":\"2020-09-07T13:39:22.000000Z\",\"updated_at\":\"2020-09-07T13:39:22.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":17,\"name\":\"Salem Store\",\"description\":\"awesome things hehehe\",\"image\":\"\\/storage\\/logos\\/kkVbgfMUcuoYho35EI9Oo6UJcNqbp9kKR7Jd4eo2.jpeg\",\"user_id\":26,\"created_at\":\"2020-09-07T13:28:03.000000Z\",\"updated_at\":\"2020-09-07T13:28:03.000000Z\"}}]', 17, 7, '2020-09-08 04:49:52', '2020-09-08 04:49:52'),
(94, 'chg_TS073820201154Mn940809277', 'VISA', 'failed', '[{\"id\":52,\"name\":\"drone\",\"price\":\"1200.000\",\"images\":[\"\\/storage\\/productsImages\\/7vMDPv63ueCaTu3UGLaZPnTkXZkbBQkkPc4z72bM.jpeg\"],\"store_id\":17,\"created_at\":\"2020-09-07T13:39:22.000000Z\",\"updated_at\":\"2020-09-07T13:39:22.000000Z\",\"quantity\":\"1\",\"store\":{\"id\":17,\"name\":\"Salem Store\",\"description\":\"awesome things hehehe\",\"image\":\"\\/storage\\/logos\\/kkVbgfMUcuoYho35EI9Oo6UJcNqbp9kKR7Jd4eo2.jpeg\",\"user_id\":26,\"created_at\":\"2020-09-07T13:28:03.000000Z\",\"updated_at\":\"2020-09-07T13:28:03.000000Z\"}}]', 17, 13, '2020-09-08 04:52:10', '2020-09-08 04:52:10');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,3) NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `images`, `store_id`, `created_at`, `updated_at`) VALUES
(1, 'Modi.', '257.676', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(2, 'Dolores.', '277.206', '[]', 4, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(3, 'Suscipit.', '31.625', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(4, 'Ea qui.', '15.292', '[]', 2, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(5, 'Inventore.', '234.279', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(6, 'Doloribus.', '142.873', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(7, 'Placeat.', '243.576', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(8, 'Et.', '147.316', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(9, 'Some kind of product.', '150.623', '[]', 10, '2020-08-27 03:10:15', '2020-08-27 10:54:08'),
(10, 'Suscipit.', '69.927', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(11, 'Quia.', '241.298', '[]', 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(12, 'Voluptas.', '233.192', '[]', 3, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(13, 'Labore.', '102.918', '[]', 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(14, 'Veniam.', '34.782', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(15, 'Ex cum.', '140.184', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(16, 'Vel aut.', '157.711', '[]', 2, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(17, 'Fugiat.', '273.261', '[]', 4, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(18, 'Alias.', '132.310', '[]', 3, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(19, 'Ullam vel.', '294.405', '[]', 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(20, 'Corrupti.', '137.081', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(21, 'Aut sed.', '183.566', '[]', 6, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(22, 'Ut earum.', '14.907', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(23, 'Sit odio.', '69.566', '[]', 2, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(24, 'Molestias.', '154.743', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(25, 'Est ut.', '71.097', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(26, 'Rerum.', '247.338', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(27, 'Adipisci.', '88.162', '[]', 3, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(28, 'Voluptas.', '194.851', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(29, 'Labore.', '202.764', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(30, 'Sed.', '234.335', '[]', 3, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(31, 'Doloribus.', '204.796', '[]', 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(32, 'Aut qui.', '149.749', '[]', 4, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(33, 'Iste.', '192.779', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(34, 'Commodi.', '232.744', '[]', 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(35, 'Soluta.', '124.480', '[]', 6, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(36, 'Excepturi.', '236.495', '[]', 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(37, 'Nobis.', '250.588', '[]', 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(38, 'Vero.', '285.437', '[]', 8, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(39, 'Repellat.', '222.545', '[]', 9, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(40, 'Quo.', '65.515', '[]', 6, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(46, 'new robots', '500.000', '[]', 14, '2020-09-05 11:38:34', '2020-09-05 11:38:34'),
(48, 'hayden store ideas', '23.000', '[\"\\/storage\\/productsImages\\/ZHB0e0zBuKEaJ8QRWMaoXch4F3hpdn9yF52apjgE.png\"]', 15, '2020-09-05 18:51:32', '2020-09-05 18:51:32'),
(49, 'robot set 1', '431.000', '[\"\\/storage\\/productsImages\\/kpKAu4xGCaeF9PMzKhYrM21TYGHBqz7uR1Amtjma.png\",\"\\/storage\\/productsImages\\/brmFVbLkbabUg8q2M1QcyceOLs4jHmCctN7gNud6.png\"]', 16, '2020-09-07 04:31:51', '2020-09-07 04:31:51'),
(50, 'robots set 2', '500.000', '[\"\\/storage\\/productsImages\\/5uPnXGnrYq3jS7kQKVzvNZh5P4Kno2WWphUEhr0e.png\",\"\\/storage\\/productsImages\\/CMaoXG7zSYS8sLs5MPtpVE7o5hTDWmrL5Ff1afWS.png\"]', 16, '2020-09-07 04:32:21', '2020-09-07 04:32:21'),
(51, 'robot remote', '270.000', '[]', 16, '2020-09-07 04:32:49', '2020-09-07 04:32:49'),
(52, 'drone', '1200.000', '[\"\\/storage\\/productsImages\\/7vMDPv63ueCaTu3UGLaZPnTkXZkbBQkkPc4z72bM.jpeg\"]', 17, '2020-09-07 09:39:22', '2020-09-07 09:39:22'),
(54, 'test for delete', '31.000', '[]', 20, '2020-09-07 10:14:41', '2020-09-07 10:14:41');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `description`, `image`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Mraz LLC', 'Repudiandae rem.', NULL, 12, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(2, 'Kling Inc', 'Rerum perspiciatis.', NULL, 5, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(3, 'Rutherford-Padberg', 'Optio possimus.', NULL, 2, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(4, 'Kutch Inc', 'Aut et quam qui est.', NULL, 1, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(5, 'Friesen, Volkman ', 'Recusandae dolores.', NULL, 13, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(6, 'Weber-Ziemann', 'Ipsa molestiae.', NULL, 10, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(7, 'Haag-Zboncak', 'Nostrum amet.', NULL, 3, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(8, 'Paucek, Klocko and Lynch', 'Laborum vero.', NULL, 19, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(9, 'Cole-O\'Conner', 'Corrupti ea quam.', NULL, 8, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(10, 'Wilderman-Swaniawski', 'Sunt ducimus eum.', NULL, 7, '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(14, 'Fatima Store', 'Awesome things!', NULL, 22, '2020-08-31 13:57:38', '2020-08-31 13:57:38'),
(15, 'Test', 'one user, more than one store, view orders for each', NULL, 13, '2020-09-05 10:36:11', '2020-09-05 10:36:11'),
(16, 'Coded', 'Good goods!', '/storage/logos/GQlWc0Zu7kXCFlr5MQLhTGerxA2kYZwfZf4rktHg.png', 7, '2020-09-07 04:29:27', '2020-09-07 04:29:27'),
(17, 'Salem Store', 'awesome things hehehe', '/storage/logos/kkVbgfMUcuoYho35EI9Oo6UJcNqbp9kKR7Jd4eo2.jpeg', 26, '2020-09-07 09:28:03', '2020-09-07 09:28:03'),
(20, 'test for delete', 'hahhahahahah', NULL, 22, '2020-09-07 10:06:25', '2020-09-07 10:06:25'),
(21, 'test for delete!', 'hello this is testing', NULL, 25, '2020-09-07 15:10:45', '2020-09-07 15:10:45'),
(22, 'test empty', 'testing store', NULL, 26, '2020-09-08 06:46:31', '2020-09-08 06:46:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Hillary Bode', 'iva.bradtke@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '54320309', '{\"area\":\"Rathside\",\"block\":1,\"street\":25,\"house\":80,\"additional\":\"Minima est et omnis veniam sunt dicta suscipit.\"}', 'sQ3HklTzUJ', '2020-08-27 03:10:14', '2020-08-27 03:10:14'),
(2, 'Bo Hettinger', 'pdaniel@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '28139826', '{\"area\":\"Shanahanville\",\"block\":1,\"street\":13,\"house\":5,\"additional\":\"Distinctio eos esse hic voluptas totam quis laudantium.\"}', 'jJx09qfGzN', '2020-08-27 03:10:14', '2020-08-27 03:10:14'),
(3, 'Augusta Gutmann', 'leola.raynor@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '76581035', '{\"area\":\"Braunbury\",\"block\":2,\"street\":2,\"house\":56,\"additional\":\"Pariatur ad fuga eos sequi. Aut ut dolores fugiat quam qui est vero.\"}', 'YOqTPIJFI6', '2020-08-27 03:10:14', '2020-08-27 03:10:14'),
(4, 'Zelma Schroeder', 'mertie.runolfsdottir@example.net', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1751158', '{\"area\":\"Gleasonmouth\",\"block\":2,\"street\":14,\"house\":53,\"additional\":\"Ab nesciunt earum numquam consequuntur ab.\"}', 'L6TPPMQGmK', '2020-08-27 03:10:14', '2020-08-27 03:10:14'),
(5, 'Sister McGlynn', 'hansen.angelita@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '66159650', '{\"area\":\"West Virginie\",\"block\":2,\"street\":13,\"house\":53,\"additional\":\"Et animi quod deserunt quidem ex ut. Voluptas omnis cumque est modi.\"}', 'Ge0dFVuoOh', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(6, 'Monte Skiles', 'franz.romaguera@example.net', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '82079175', '{\"area\":\"South Robinshire\",\"block\":5,\"street\":16,\"house\":38,\"additional\":\"Alias nihil excepturi rem animi magnam ad magnam delectus.\"}', 'ss16GhfDdU6LY3LgXfCwEAVdf9UPRcGzr7b8FdDMtJ0kh404YikFbw8egfbJ', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(7, 'Dr. Kareem Gottlieb', 'stracke.jed@example.org', '2020-08-27 12:50:39', '$2y$10$9YM3xKfO2AoYYstzUDtPO.3QO.4J4h4m.gWDKzJfZOHZyKd.OjOPO', '05012345678', '{\"area\":\"Khalifa City A\",\"block\":\"13\",\"street\":\"4\",\"house\":\"157\",\"additional\":\"Khalifa City A hahahha\"}', 'Qll8P1gD5AQ9YqWP7E2TNFZadEJ3pOdchzmnyMJbSBkmp5IaFGmXTewKIDTt', '2020-08-27 03:10:15', '2020-09-08 06:20:18'),
(8, 'Pamela Heathcote Sr.', 'marquardt.amaya@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '66559181', '{\"area\":\"Goldnerburgh\",\"block\":7,\"street\":17,\"house\":52,\"additional\":\"Voluptas cupiditate voluptatem consequatur porro eum sed.\"}', 'HyzGY6YCfZ', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(9, 'Myrl Lindgren', 'akertzmann@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '49690499', '{\"area\":\"East Edward\",\"block\":2,\"street\":17,\"house\":70,\"additional\":\"Incidunt incidunt quidem harum officia error similique sit.\"}', 'HiLv2G67U5', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(10, 'Cielo Harvey Sr.', 'adolf.rodriguez@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '40823591', '{\"area\":\"Carleeburgh\",\"block\":5,\"street\":8,\"house\":3,\"additional\":\"Itaque libero perspiciatis qui. Ut quod hic voluptatem occaecati ex.\"}', 'P4E650ue26', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(11, 'Willy Turcotte', 'alphonso54@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '19231549', '{\"area\":\"Willmouth\",\"block\":4,\"street\":18,\"house\":92,\"additional\":\"Sint illo est unde dolor quo numquam. Dolorem et vitae sed.\"}', 'lP8IK9BwTn', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(12, 'Ms. Glenda McKenzie DVM', 'nona16@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '35473793', '{\"area\":\"Federicoshire\",\"block\":4,\"street\":11,\"house\":3,\"additional\":\"Sed quaerat quisquam ut voluptas aut sunt.\"}', '7FdCh1DwVOKf5DXU86cEzt3XoineRNDS0C6p3wazMbuuKrpexk80Gdh7RPLW', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(13, 'Hayden Raynor', 'selina44@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '95087390', '{\"area\":\"New Craigtown\",\"block\":8,\"street\":24,\"house\":93,\"additional\":\"Ut vitae nihil vitae temporibus. Veniam sunt beatae sunt similique animi.\"}', '5wUuxf8SQi89dEXWITbun1DwjZDvtK9ckLsXRpKsZVO9agQ1wsRZK0iZucDj', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(14, 'Vernon Yundt', 'christine26@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '44615357', '{\"area\":\"North Gretaborough\",\"block\":8,\"street\":9,\"house\":83,\"additional\":\"Iusto ipsum nesciunt debitis omnis iure.\"}', 'gjO61f1BR6', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(15, 'Audreanne Abernathy', 'brown.marlee@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '72316589', '{\"area\":\"East Margarettside\",\"block\":2,\"street\":14,\"house\":20,\"additional\":\"Ipsam ex voluptatem magni accusantium quaerat dolore.\"}', 'tfs3aTfKiV', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(16, 'Ivy Hansen', 'emmerich.jazlyn@example.net', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '89218718', '{\"area\":\"West Hailey\",\"block\":8,\"street\":2,\"house\":84,\"additional\":\"Adipisci sed veniam reprehenderit non blanditiis quos.\"}', '6019YvmD35', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(17, 'Kaelyn Koepp', 'angel87@example.org', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '68868985', '{\"area\":\"Rodriguezmouth\",\"block\":5,\"street\":20,\"house\":29,\"additional\":\"Sint quo accusantium et.\"}', 'zBVm4XYyy1', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(18, 'Mr. Amir Rippin', 'lavon18@example.net', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '10249772', '{\"area\":\"West Morrisville\",\"block\":8,\"street\":14,\"house\":65,\"additional\":\"Quis totam consequatur placeat quia. Facilis delectus magnam et quibusdam.\"}', 'VujrOHAFe3', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(19, 'Mr. Jacey Ankunding IV', 'julie73@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '72296123', '{\"area\":\"Orvilleville\",\"block\":5,\"street\":12,\"house\":64,\"additional\":\"Saepe eligendi velit officia nulla est molestias magnam.\"}', 'wvRXiplSX0', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(20, 'Cordell Lockman', 'wade07@example.com', '2020-08-27 03:10:13', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9920351', '{\"area\":\"Port Aglae\",\"block\":2,\"street\":22,\"house\":23,\"additional\":\"Molestiae cupiditate numquam ullam esse vel aut.\"}', '45nLpFKu1154HJI80jFhEe8ynl4VoFEn2Hikf8RCPSaOI1VXOHLYju6j6NIl', '2020-08-27 03:10:15', '2020-08-27 03:10:15'),
(22, 'Fatima Ali', 'fatima.ali@test.com', '2020-08-27 04:15:35', '$2y$10$tvdhVNJX20fOfv45y1s5MevblsBGZhAM7CAq2EJS4W2xBBLOWsDoe', '12345678', '{\"area\":\"Port Aglae\",\"block\":2,\"street\":22,\"house\":23,\"additional\":\"Molestiae cupiditate numquam ullam esse vel aut.\"}', NULL, '2020-08-27 04:15:35', '2020-08-27 04:15:35'),
(23, 'Ahmed', 'ahmed@test.com', '2020-08-31 16:40:44', '$2y$10$mVJdRmwPmKQl3CFRv29QTepVjU9oIDDthaE9fgrRsrRk8.1RQ/bUy', '0509999999', NULL, NULL, '2020-08-31 16:40:44', '2020-08-31 16:40:44'),
(24, 'hussan abdulla', 'hussan.abdulla@test.com', '2020-08-31 16:41:40', '$2y$10$QofCHZ8djMTqr2gniIPkyO87iTXBgAdE6PkRr6MCMopYk9J9JoYz6', '0501237659', '{\"area\":\"Abu Dhabi\",\"block\":\"13\",\"street\":\"6\",\"house\":\"157\",\"additional\":\"Khalifa City A\"}', NULL, '2020-08-31 16:41:40', '2020-08-31 17:15:34'),
(25, 'maryem', 'Maryem.khaled@test.com', '2020-09-05 17:47:36', '$2y$10$S8w69QbMHNnpH74Dkgl2.eekNnNH/LuuhmflrhTNjktX5L40QaRAK', '0501134555', '{\"area\":\"341\",\"block\":\"12\",\"street\":\"66\",\"house\":\"99\",\"additional\":\"some additional information about my address\"}', NULL, '2020-09-05 17:47:36', '2020-09-05 18:11:27'),
(26, 'salem', 'salem@test.com', '2020-09-07 09:12:13', '$2y$10$ZXvYfju95o2/QHqjdsV1TOmu2iuUCqhnfENzfk2zLLW/Zgg35sTCy', '0501243444', '{\"area\":\"Dubai\",\"block\":\"34\",\"street\":\"Zayed Bin Sultan St.\",\"house\":\"77\",\"additional\":\"AL BARSHA\"}', NULL, '2020-09-07 09:12:13', '2020-09-07 09:23:00'),
(27, 'fahad', 'fahad@test.com', '2020-09-09 04:02:12', '$2y$10$dX47zH/NAWY0ykWHe7uGq.cuwBBnMBRBw0Wl/r9rCNa3t1QC03eRO', '0508888888', NULL, NULL, '2020-09-09 04:02:13', '2020-09-09 04:02:13');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_store_id_foreign` (`store_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_store_id_foreign` (`store_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stores_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stores`
--
ALTER TABLE `stores`
  ADD CONSTRAINT `stores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
