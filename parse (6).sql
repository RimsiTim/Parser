-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 31 2022 г., 10:54
-- Версия сервера: 8.0.24
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `parse`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categorys`
--

CREATE TABLE `categorys` (
  `id_categorys` int NOT NULL,
  `id_global_category` int NOT NULL,
  `name_categorys` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `img_categorys` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `categorys`
--

INSERT INTO `categorys` (`id_categorys`, `id_global_category`, `name_categorys`, `img_categorys`) VALUES
(1, 5, 'Акустические гитары', 'AkustikG.jpg'),
(2, 5, 'Электро-гитары', 'ElG.jpg'),
(3, 5, 'Басс-гитары', 'BassG.jpg'),
(4, 5, 'Укулеле', 'ukulel.jpg'),
(5, 5, 'Классические гитары', 'classG.jpg'),
(6, 5, 'Гитарные струны', 'strunG.jpg'),
(7, 5, 'Струны для укулеле', 'strunU.jpg'),
(11, 6, 'Флейты', '270x202_1_normal_0d6d765656a92b4928a05b2574e7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `category_shops`
--

CREATE TABLE `category_shops` (
  `id_category_shops` int NOT NULL,
  `id_shop` int NOT NULL,
  `id_category` int NOT NULL,
  `url_category_shops` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `category_shops`
--

INSERT INTO `category_shops` (`id_category_shops`, `id_shop`, `id_category`, `url_category_shops`) VALUES
(1, 1, 1, 'https://www.muztorg.ru/category/akusticheskie-gitary?sort=stocks'),
(4, 2, 2, 'https://pop-music.ru/catalog/gitaryi/elektrogitaryi/'),
(5, 2, 1, 'https://pop-music.ru/catalog/gitaryi/gitaryi-akusticheskie/'),
(6, 6, 11, 'https://skifmusic.ru/catalog/fleytyi-280');

-- --------------------------------------------------------

--
-- Структура таблицы `global_categorys`
--

CREATE TABLE `global_categorys` (
  `id_global_categorys` int NOT NULL,
  `name_global_categorys` varchar(500) NOT NULL,
  `view_global_categorys` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `global_categorys`
--

INSERT INTO `global_categorys` (`id_global_categorys`, `name_global_categorys`, `view_global_categorys`) VALUES
(5, 'Струнные инструменты', 1),
(6, 'Духовые инструменты', 1),
(7, 'Ударные интсрументы', 1),
(8, 'Клавишные инструменты', 1),
(13, 'sadfsadfasdfsad', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id_reviews` int NOT NULL,
  `name_reviews` varchar(255) NOT NULL,
  `text_reviews` text NOT NULL,
  `status_view` tinyint(1) NOT NULL DEFAULT '0',
  `status_main` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id_reviews`, `name_reviews`, `text_reviews`, `status_view`, `status_main`, `user_id`) VALUES
(5, 'Иван', 'Супер! Случайно наткнулся на Ваш сайт - это просто праздник какой-то! Спасибо, ребята, офигенно удобный и нужный сервис.', 1, 1, 6),
(6, 'Кирилл', 'У вас офигенный парсер. Многие брались и не могли сделать, а ваш парсинг уже спарсил что нужно.', 1, 0, 6),
(7, 'Карл', 'Я протестировал, у вас разработан потрясающий сервис, я впечатлен', 1, 1, 6),
(8, 'Астольфа', 'Сервис просто очень удобный. Экономит нереальное количество времени.', 1, 1, 6),
(9, 'Сашенька', 'Замечательный у вас парсер, очень удобный', 1, 0, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `shops`
--

CREATE TABLE `shops` (
  `id_shops` int NOT NULL,
  `name_shops` varchar(500) NOT NULL,
  `url_shops` varchar(500) NOT NULL,
  `par_html` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `par_name` varchar(500) NOT NULL,
  `par_name_d` varchar(500) DEFAULT NULL,
  `par_price` varchar(500) NOT NULL,
  `par_price_d` varchar(500) DEFAULT NULL,
  `par_img` varchar(500) NOT NULL,
  `par_img_d` varchar(500) DEFAULT NULL,
  `par_url` varchar(500) NOT NULL,
  `par_url_d` varchar(500) DEFAULT NULL,
  `search` varchar(500) NOT NULL,
  `search_html` varchar(500) NOT NULL,
  `search_name` varchar(500) NOT NULL,
  `search_name_d` varchar(500) DEFAULT NULL,
  `search_price` varchar(500) NOT NULL,
  `search_price_d` varchar(500) DEFAULT NULL,
  `search_img` varchar(500) NOT NULL,
  `search_img_d` varchar(500) DEFAULT NULL,
  `search_url` varchar(500) NOT NULL,
  `search_url_d` varchar(500) DEFAULT NULL,
  `img_shops` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `shops`
--

INSERT INTO `shops` (`id_shops`, `name_shops`, `url_shops`, `par_html`, `par_name`, `par_name_d`, `par_price`, `par_price_d`, `par_img`, `par_img_d`, `par_url`, `par_url_d`, `search`, `search_html`, `search_name`, `search_name_d`, `search_price`, `search_price_d`, `search_img`, `search_img_d`, `search_url`, `search_url_d`, `img_shops`) VALUES
(1, 'Музторг', 'https://www.muztorg.ru', '.product-thumbnail', 'div.title a', '', '.price', '', '.img-responsive', 'data-src', 'div.title a', 'href', 'https://www.muztorg.ru/search/', '.product-thumbnail', 'div.title a', '', '.price', '', '.img-responsive', 'data-src', 'div.title a', 'href', 'logo_muztorg.svg'),
(2, 'POP-MUSIC', 'https://pop-music.ru', '.products-grid__i', '.product-card__name', '', '.product-card__newprice', '', '.product-card__img img', 'src', '.product-card__name', 'href', 'https://pop-music.ru/?digiSearch=true&params=%7Csort%3DDEFAULT&term=', '.digi-product', '.digi-product__label', '', '.digi-product-price-variant', '', '.digi-product__image', 'src', '.digi-product__label', 'href', 'logo.svg'),
(6, 'SKIFMUSIC', 'https://skifmusic.ru', '.product-list__item', '.product-box__name .js-product-link', '', '.product-box__price', '', '.js-product-link img', 'src', '.js-product-link', 'href', 'https://skifmusic.ru/search/', '.product-list__item', '.product-box__name .js-product-link', '', '.product-box__price', '', '.js-product-link img', 'src', '.js-product-link', 'href', 'logo (1).svg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `password_users` varchar(32) NOT NULL,
  `email_users` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `status`, `password_users`, `email_users`) VALUES
(5, 1, 'eb317b2f49d93760d44cf1c884f26484', 'admin@admin.ru'),
(6, 0, 'eb317b2f49d93760d44cf1c884f26484', 'ad@ad'),
(7, 0, 'eb317b2f49d93760d44cf1c884f26484', 'ad1@ad');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id_categorys`),
  ADD KEY `id_global_category` (`id_global_category`);

--
-- Индексы таблицы `category_shops`
--
ALTER TABLE `category_shops`
  ADD PRIMARY KEY (`id_category_shops`),
  ADD KEY `id_shop` (`id_shop`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `global_categorys`
--
ALTER TABLE `global_categorys`
  ADD PRIMARY KEY (`id_global_categorys`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id_reviews`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id_shops`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id_categorys` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `category_shops`
--
ALTER TABLE `category_shops`
  MODIFY `id_category_shops` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `global_categorys`
--
ALTER TABLE `global_categorys`
  MODIFY `id_global_categorys` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id_reviews` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `shops`
--
ALTER TABLE `shops`
  MODIFY `id_shops` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `categorys`
--
ALTER TABLE `categorys`
  ADD CONSTRAINT `categorys_ibfk_1` FOREIGN KEY (`id_global_category`) REFERENCES `global_categorys` (`id_global_categorys`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_shops`
--
ALTER TABLE `category_shops`
  ADD CONSTRAINT `category_shops_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categorys` (`id_categorys`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_shops_ibfk_2` FOREIGN KEY (`id_shop`) REFERENCES `shops` (`id_shops`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
