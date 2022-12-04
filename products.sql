-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 25, 2022 at 08:35 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_trans` varchar(255) NOT NULL,
  `price` int NOT NULL,
  `small_text` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `big_text` text NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `name_trans`, `price`, `small_text`, `big_text`, `user_id`) VALUES
(1, 'диван', 'sofa', 1500, 'Минималистичный дизайн дивана ', 'Минималистичный дизайн дивана вписывается в любой по стильный интерьер. ', 1),
(2, 'штаны', 'pants', 350, 'Мы не по наслышке знаем как тя', 'Мы не по наслышке знаем как тяжело найти одежду для женщин', 2),
(3, 'футболка', 't-shirt', 100, 'Футболка унисекс минимализм', 'Футболка с надписью «минимализм» minimalism для тех кто любит простоту и стиль во всем. ', 1),
(4, 'кроссовки', 'sneakers', 500, 'Зимние кроссовки женские', 'Стильные и лаконичные кроссовки - сникеры: удобная и комфортная обувь.', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
