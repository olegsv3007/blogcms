-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Окт 28 2019 г., 00:31
-- Версия сервера: 5.7.25
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cmsdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `header`, `content`, `image`, `updated_at`, `created_at`, `author_id`) VALUES
(4, 'hgjghjg', '', NULL, '2019-10-26 21:18:22', '2019-10-26 21:18:22', 11),
(6, 'dfgdfgdg', '', NULL, '2019-10-26 21:18:28', '2019-10-26 21:18:28', 11),
(8, 'fghjfghf', '', NULL, '2019-10-26 21:19:40', '2019-10-26 21:19:40', 11),
(9, 'hfghfghfhg', '', NULL, '2019-10-26 21:19:43', '2019-10-26 21:19:43', 11),
(10, 'fghfghfghf', '', NULL, '2019-10-26 21:19:45', '2019-10-26 21:19:45', 11),
(11, 'gfhdfhgdgdfgd', '', NULL, '2019-10-26 21:19:48', '2019-10-26 21:19:48', 11),
(12, 'dfgdgfdgfdfgd', '', NULL, '2019-10-26 21:19:50', '2019-10-26 21:19:50', 11),
(13, 'dfgdfgdgdfgd', '', NULL, '2019-10-26 21:19:53', '2019-10-26 21:19:53', 11),
(14, 'dfgdfgdgdfgdfgd', '', NULL, '2019-10-26 21:19:56', '2019-10-26 21:19:56', 11),
(15, 'ghfghfghfh', '', NULL, '2019-10-26 21:20:04', '2019-10-26 21:20:04', 11),
(16, 'fghfghfhgfhf', '', NULL, '2019-10-26 21:20:07', '2019-10-26 21:20:07', 11),
(17, 'terterte', '', NULL, '2019-10-26 21:20:57', '2019-10-26 21:20:57', 11),
(18, 'wrwerw', '', NULL, '2019-10-26 21:21:02', '2019-10-26 21:21:02', 11),
(19, 'dfsdfsfs', '', NULL, '2019-10-26 22:53:42', '2019-10-26 22:53:42', NULL),
(20, 'ffsfs', '', NULL, '2019-10-26 22:53:55', '2019-10-26 22:53:55', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `is_published` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `article_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Пользователь'),
(2, 'Контент менеджер'),
(4, 'Администратор');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about_self` text,
  `is_subscribe` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email`, `password`, `about_self`, `is_subscribe`, `updated_at`, `created_at`) VALUES
(11, '5d9f1b542bc92.PNG', 'Петров Петр', 'petrov@example.com', '$2y$10$ghm5NTxG8WDezTLHr5GVu.U2rSdF1jiJSJQk1K.XSlF4AKtaLLWOS', 'Я Петька!\r\n', 1, '2019-10-11', '2019-10-01'),
(12, NULL, 'Петров П', 'petrov3@example.com', '$2y$10$nPliWxnWrDtC4QjyISVS7uWy0rWP00jE8Z.Qi/50SKOoZQELnGrIq', NULL, 0, '2019-10-01', '2019-10-01'),
(17, '5da81f2408d8e.png', 'Александр', 'sanek@example.com', '$2y$10$/X1OwsX6zPfySgE8vcwH6uCL4rnPiK6RH3PqEb8Pe0Rqi1lPS3R5q', 'Я санек', 1, '2019-10-17', '2019-10-10'),
(19, '5da08ce98e63e.jpeg', 'UserGod', 'user@example.com', '$2y$10$nAgbKHGB/.H2MqCM3D3DVuN6B//PvNPlJNsEeiJL2G0a8TMTj0t76', '', 0, '2019-10-11', '2019-10-11'),
(20, NULL, 'Иванов Иван Иванович', 'ivanov@exapmle.com', '$2y$10$XLdxpTgmqrLc89FObwI6o.IPW1i97K6aHOercewiFep0SZWzW6.ru', 'It\'s me!', 1, '2019-10-21', '2019-10-21');

-- --------------------------------------------------------

--
-- Структура таблицы `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_role`
--

INSERT INTO `user_role` (`user_id`, `role_id`) VALUES
(11, 1),
(17, 1),
(19, 1),
(11, 2),
(12, 2),
(19, 2),
(11, 4),
(17, 4),
(19, 4),
(20, 4);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

--
-- Ограничения внешнего ключа таблицы `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
