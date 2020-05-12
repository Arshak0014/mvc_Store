-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 12 2020 г., 18:38
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `store`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `create_date`, `update_date`) VALUES
(1, 'Smartphone', '2020-04-22', '2020-04-22'),
(3, 'Camera', '2020-04-08', '2020-04-14'),
(4, 'SmartTV', '2020-04-22', '2020-04-22'),
(5, 'Phone', '2020-04-22', '2020-04-22'),
(7, 'Smartwatch', '2020-04-22', '2020-04-22'),
(8, 'Headphone', '2020-04-22', '2020-04-22'),
(24, 'Notebook', '2020-04-29', '2020-04-29');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `name`, `image`, `price`, `count`, `order_date`) VALUES
(24, 1, 79, 'Honor', '30046975b.jpg', 180, 1, '2020-05-12'),
(25, 1, 81, 'Apple mac', 'chekhol-nakladka-comma-dlya-macbook-air-13-2018-2019-hard-jacket-cover-25175425717122.jpg', 950, 2, '2020-05-12'),
(26, 39, 64, 'Canon', 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 900, 1, '2020-05-12'),
(27, 39, 73, 'Hicense', 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 770, 2, '2020-05-12'),
(28, 39, 72, 'Lenovo', '1566949680_1501922.jpg', 160, 2, '2020-05-12');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(250) DEFAULT NULL,
  `is_new` int(1) DEFAULT NULL,
  `create_date` date NOT NULL,
  `update_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `description`, `price`, `image`, `is_new`, `create_date`, `update_date`) VALUES
(60, 'Apple', 7, 'fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf fggfgf ', 160, '01A00056B-1-518x518.jpg', 0, '2020-04-29', '2020-04-29'),
(61, 'Lenovo', 7, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 60, '30046975b.jpg', 0, '2020-04-29', '2020-04-29'),
(62, 'Samsung', 4, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 400, '1566949680_1501922.jpg', 0, '2020-04-29', '2020-04-29'),
(63, 'Xiaomi Airdots', 8, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 50, 'img_0_83_1158_1.jpg', 1, '2020-04-29', '2020-04-29'),
(64, 'Canon', 3, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 900, 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 1, '2020-04-29', '2020-04-29'),
(65, 'Xiaomi mi 8', 5, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 200, '30046975b.jpg', 0, '2020-04-29', '2020-04-29'),
(66, 'Iphone 7', 5, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 230, 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 0, '2020-04-29', '2020-04-29'),
(67, 'Xiaomi Mi bend', 7, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 35, '1566949680_1501922.jpg', 1, '2020-04-29', '2020-04-29'),
(68, 'Samsung', 8, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 960, 'img_0_83_1158_1.jpg', 0, '2020-04-29', '2020-04-29'),
(69, 'Honor', 5, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 150, '30046975b.jpg', 1, '2020-04-29', '2020-04-29'),
(70, 'Iphone X', 1, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 400, 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 0, '2020-04-29', '2020-04-29'),
(71, 'Iphone 8', 1, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 400, '30046975b.jpg', 1, '2020-04-29', '2020-04-29'),
(72, 'Lenovo', 3, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 160, '1566949680_1501922.jpg', 1, '2020-04-29', '2020-04-29'),
(73, 'Hicense', 4, 'The answer of LeassTaTT works well in \"standard\" browsers like FF and Chrome. The solution for IE exists, but looks different. Here description of cross-browser solution:', 770, 'iphone-se-gallery6_GEO_EMEA_FMT_WHH.jpg', 0, '2020-04-29', '2020-04-29'),
(77, 'Iphone 6', 7, 'Lorem Ipsum', 180, '30046975b.jpg', 1, '2020-04-29', '2020-04-29'),
(78, 'Apple', 4, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 900, 'img_0_83_1158_1.jpg', 1, '2020-04-29', '2020-04-29'),
(79, 'Honor', 1, 'lorem ipsum lorem ipsum lorem ipsum', 180, '30046975b.jpg', 0, '2020-05-02', '2020-05-02'),
(80, 'Xiaomi mi 8', 1, 'lorem ipsum lorem ipsum lorem ipsum', 225, 'img_0_83_1158_1.jpg', 1, '2020-05-02', '2020-05-02'),
(81, 'Apple mac', 24, 'test test test test test test test', 950, 'chekhol-nakladka-comma-dlya-macbook-air-13-2018-2019-hard-jacket-cover-25175425717122.jpg', 1, '2020-05-12', '2020-05-12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `cookie_key` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `role`, `cookie_key`) VALUES
(1, 'John', 'Wick', 'john@gmail.com', '1111', 'admin', 'u48l55w0x92t32u91j33g'),
(20, 'Tony', 'Montana', 'tony@gmail.com', 'bae5e3208a3c700e3db642b6631e95b9', '', ''),
(21, 'Leo', 'Messi', 'leo@gmail.com', '6add84506c86a658bc85038f91e35ce7', '', ''),
(22, 'Angelina', 'Joly', 'joly@gmail.com', 'd27d320c27c3033b7883347d8beca317', '', ''),
(24, 'Arshak', 'Gabrielyan', 'arshak@gmail.com', 'cf5397cbcd959e5f9a95f44db5ea531f', '', ''),
(35, 'Leo', 'Montana', 'armen@gmail.com', '$2y$10$0fWtwmgXYQQaAam5.7DISuN2tV0fElWYv6qwMTazSljiJz/nDPDSy', '', ''),
(38, 'Xabi', 'Alonso', 'xabi@gmail.com', '$2y$10$jTA6lKXTf92hMnO7JvKla.mH0ZhQPtoIwtx3gDC/2AMyQmcqgBbye', '', ''),
(39, 'Charlie', 'Chaplin', 'charlie@gmail.com', '9696967', '', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`categories_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
