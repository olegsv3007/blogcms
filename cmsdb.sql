-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 19 2019 г., 13:46
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
(14, 'Top 10 Vim plugins for programming in multiple languages', 'My number one pick isn\'t even a plugin; rather, it replaces plugins like Vundle, so I\'m listing it here.\r\n\r\nVolt is a Vim plugin manager that lives outside Vim. You can use it to install plugins and create combinations of plugins called \"profiles.\" You can enable a new profile with a single command: volt profile set myprofile. That way, I can do things like enable the indentpython plugin for just my Python profile. Volt also offers a simple way to do per-plugin configurations. The configuration is shared between profiles, so you can install plugins once and use them in multiple profiles.\r\n\r\nVolt is still relatively new and not perfect (e.g., you can have just one configuration file per plugin, no matter how many profiles you are using), but apart from that, I find it extremely handy, extremely fast, and extremely simple.', '5dd3c62d441b6.jpg', '2019-11-19 13:38:37', '2019-11-19 13:38:37', 7),
(15, 'Generate random passwords with this Bash script', 'I don\'t know all the details of how this works, but I have done a bit of research and experimentation. The \"meat\" of the script is in the line beginning with do dd. You may have seen dd used to copy one disk to another, but in this case, it is used to generate one block of random characters with dev/urandom. The feedback messages from dd are stripped out, and then the characters are passed on to uuencode, whose job it is to transform the characters so that all are printable (i.e., no control characters).\r\n\r\nThe uuencode command can be obtained by installing the sharutils package.\r\n\r\nThe job of sed seems to be some further transformation so that the letters are mixed upper and lower case. Finally, cut slices off 12 characters to end with a 12-character password. The for loop runs 12 times, so you get 12 passwords.', '5dd3c652902a8.jpg', '2019-11-19 13:39:14', '2019-11-19 13:39:14', 7),
(16, 'How to use pkgsrc on Linux', 'With the exception of MacOS, all Unix operating systems ship with a package manager included. You don\'t necessarily need pkgsrc, but here are three great reasons you may want to try it:\r\n\r\nPackaging. If you\'re curious about packaging but have yet to try creating a package yourself, pkgsrc is a relatively simple system to use, especially if you\'re already familiar with Makefiles and build systems like GNU Autotools.\r\nGeneric. If you use multiple operating systems or distributions, then you probably encounter a package manager for each system. You can use pkgsrc across disparate systems so that when you package an application for one, you\'ve packaged it for all of them.\r\nFlexible. In many packaging systems, it\'s not always obvious how to choose a binary package or a source package. With pkgsrc, the distinction is clear, both methods of installing are equally as easy, and both resolve dependencies for you.\r\nHow to install pkgsrc\r\nWhether you\'re on BSD, Linux, Illumos, Solaris, or MacOS, the installation process is basically the same:\r\n\r\nUse CVS to check out the pkgsrc tree\r\nBootstrap the pkgsrc system\r\nInstall packages', '5dd3c676af38d.png', '2019-11-19 13:39:50', '2019-11-19 13:39:50', 7),
(17, 'What is a community of practice in an open organization?', 'Community is a fundamental component of open organizations. The Open Organization Definition notes that:\r\n\r\nShared values and purpose guide participation in open organizations, and these values—more so than arbitrary geographical locations or hierarchical positions—help determine the organization\'s boundaries and conditions of participation.\r\n\r\nIn other words, people in open organizations often define their roles, responsibilities, and affiliations through shared interests and passions—not title, role, or position on an organizational chart.\r\n\r\nThat means organizational leaders will find themselves invested in building communities inside their organizations, connecting like-minded people with one another to accelerate business objectives.\r\n\r\nFor this reason, communities of practice can be a useful component of open organizations. In this three-part series, I\'ll explain what communities of practice are, why they are beneficial to an organization, and how you can start a community of practice. ', '5dd3c69c850f2.jpg', '2019-11-19 13:40:28', '2019-11-19 13:40:28', 7),
(18, 'How internet security works: TLS, SSL, and CA', 'Multiple times every day, you visit websites that ask you to log in with your username or email address and password. Banking websites, social networking sites, email services, e-commerce sites, and news sites are just a handful of the types of sites that use this mechanism.\r\n\r\nEvery time you sign into one of these sites, you are, in essence, saying, \"yes, I trust this website, so I am willing to share my personal information with it.\" This data may include your name, gender, physical address, email address, and sometimes even credit card information.\r\n\r\nBut how do you know you can trust a particular website? To put this a different way, what is the website doing to secure your transaction so that you can trust it?\r\n\r\nThis article aims to demystify the mechanisms that make a website secure. I will start by discussing the web protocols HTTP and HTTPS and the concept of Transport Layer Security (TLS), which is one of the cryptographic protocols in the internet protocol\'s (IP) layers. Then, I will explain certificate authorities (CAs) and self-signed certificates and how they can help secure a website. Finally, I will introduce some open source tools you can use to create and manage certificates.', '5dd3c6bf1959d.jpg', '2019-11-19 13:41:03', '2019-11-19 13:41:03', 7),
(19, 'Cheat sheet for Linux users and permissions', 'The Linux operating system is a true multi-user OS, meaning it assumes that there\'s data on every computer that should be protected, whether in the interest of privacy, security, or system integrity.\r\n\r\nLinux uses file ownership and permissions to manage file and folder access. \r\n\r\nFor administrators who deal with different user environments all day, this system is easy to understand, calculate, and control.\r\nFor users still learning Linux, or for users who learned Linux primarily in a single-user environment, file access can seem restrictive and confusing.\r\nOur Linux Permissions cheat sheet covers important file and directory access commands to help you understand and manipulate which user and group member can see shared data on your Linux computer.\r\n\r\nThis cheat sheet is part of a larger set that includes Linux Networking, SELinux, and common Linux Commands.', '5dd3c711ba5b8.png', '2019-11-19 13:42:25', '2019-11-19 13:42:25', 7);

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

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `text`, `author_id`, `article_id`, `is_published`, `created_at`, `updated_at`) VALUES
(6, 'No comments\r\n', 7, 19, 1, '2019-11-19 13:44:06', '2019-11-19 13:44:06');

-- --------------------------------------------------------

--
-- Структура таблицы `emails`
--

CREATE TABLE `emails` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `is_subscribe` tinyint(4) NOT NULL DEFAULT '0',
  `unsub_id` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `emails`
--

INSERT INTO `emails` (`id`, `email`, `is_subscribe`, `unsub_id`, `created_at`, `updated_at`) VALUES
(20, 'petrov@example.com', 1, '5dd3bb9ec3945', '2019-11-12 15:51:38', '2019-11-19 13:41:37');

-- --------------------------------------------------------

--
-- Структура таблицы `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pages`
--

INSERT INTO `pages` (`id`, `url`, `filename`, `name`, `created_at`, `updated_at`) VALUES
(9, 'page1', 'file1', 'Первая страница', '2019-11-17 16:04:06', '2019-11-17 16:18:26'),
(10, 'page2', 'file2', 'Вторая страница', '2019-11-17 16:04:38', '2019-11-17 16:18:30'),
(13, 'rules', 'rules', 'Правила сайта', '2019-11-18 14:21:31', '2019-11-18 14:21:31');

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
  `email_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `about_self` text,
  `is_subscribe` tinyint(4) NOT NULL DEFAULT '0',
  `updated_at` date DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `avatar`, `name`, `email_id`, `password`, `about_self`, `is_subscribe`, `updated_at`, `created_at`) VALUES
(7, '5dd3c76d443f7.png', 'Петров П', 20, '$2y$10$ih5DAPb8I2unIRRG0nHEYuQZCHvWWgnZRmfhIw0QeQbLFws7Buiz6', '', 0, '2019-11-19', '2019-11-12');

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
(7, 4);

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
-- Индексы таблицы `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Индексы таблицы `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`),
  ADD UNIQUE KEY `filename` (`filename`);

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
  ADD UNIQUE KEY `email` (`email_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `emails`
--
ALTER TABLE `emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`email_id`) REFERENCES `emails` (`id`);

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
