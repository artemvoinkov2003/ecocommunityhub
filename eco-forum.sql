-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 06 2025 г., 12:37
-- Версия сервера: 10.8.4-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eco-forum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `category`, `views`, `created_at`, `updated_at`) VALUES
(1, 'Важность переработчик отходов', 'Переработка отходов играет ключевую роль в сохранении окружающей среды, она позволяет сократить количество мусора на свалках, eменьшить 	 потребление первичных ресурсов и 	  снизить выбросы парниковых газов. Каждый человек может внести свой вклад, сортируя мусор и сдавая его 	    на переработку.', 'Переработка', 1, '2025-06-06 07:29:12', NULL),
(2, 'Возобновляемые источники энергии', 'Солнечная, ветровая и гидроэнергетика - это экологически чистые альтернативы ископаемому топливу. Они не только сокращают выбросы CO2, но  и способствуют энергетической независимости. Узнайте, как можно использовать возобновляемые источники энергии в быту.', 'Энергетика', 1, '2025-06-06 07:29:12', NULL),
(5, 'Сохранение биоразнообразия', 'Биоразнообразие - это основа устойчивости экосистем. Вырубка лесов, загрязнение окружающей среды и изменение климата угрожают многим 		 видам. Узнайте о мерах, которые принимаются для защиты исчезающих видов и их мест обитания.', 'Биоразнообразие', 1, '2025-06-06 07:31:48', NULL),
(6, 'Экологичный транспорт', 'Велосипеды, электросамокаты и общественный транспорт - это экологичные альтернативы личному автомобилю. Они помогают снизить выбросы 		вредных веществ и уничтожить пробки на дорогах. В статье рассмотрены преимущества и перспективы развития экотранспорта.', 'Транспорт', 1, '2025-06-06 07:31:48', NULL),
(9, 'Устойчивое сельское хозяйство', 'Органическое земледелие, пермакультура и агролесоводство - это методы ведения сельского хозяйства, которые не наносят вреда окружающей среде, Они сохраняют плодородие почв, биоразнообразие и водные ресурсы.', 'Сельское хозяйство', 4, '2025-06-06 07:33:21', NULL),
(10, 'Экономия воды в быту', 'Вода - это ценный ресурс, и ее сохранение важно для устойчивого развития. Простые меры, такие как установка водооберегающих насадок на краны, использование посудомоечной машины вместо мытья под проточной водой и сбор дождевой воды для полива, могут значительно снизить потребление воды в доме.', 'Ресурсосбережение', 4, '2025-06-06 07:33:21', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `forum_message`
--

CREATE TABLE `forum_message` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_message`
--

INSERT INTO `forum_message` (`id`, `topic_id`, `content`, `author_id`, `created_at`) VALUES
(1, 1, 'Нужно запретить одноразовый пластик', 2, '2025-06-06 08:07:17'),
(2, 2, 'Нужно следить за разжиганием костров в пожароопасный период', 1, '2025-06-06 08:07:17'),
(3, 3, 'За солнечными батареями будущее', 1, '2025-06-06 08:10:48'),
(4, 4, 'На долинах надо было уже давно установить ветровые станции', 2, '2025-06-06 06:11:58');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_section`
--

CREATE TABLE `forum_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_section`
--

INSERT INTO `forum_section` (`id`, `title`, `description`, `created_at`) VALUES
(1, 'Экология', 'Обсуждение экологических проблем', '2025-06-06 07:44:35'),
(2, 'Возобновляемая энергетика', 'Солнечная и ветряная энергия', '2025-06-06 07:44:35');

-- --------------------------------------------------------

--
-- Структура таблицы `forum_topic`
--

CREATE TABLE `forum_topic` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `forum_topic`
--

INSERT INTO `forum_topic` (`id`, `section_id`, `title`, `content`, `author_id`, `created_at`) VALUES
(1, 1, 'Загрязнение океанов', 'Как мы можем уменьшить загрязнение пластиком', 2, '2025-06-06 07:49:09'),
(2, 1, 'Сохранение лесов', 'Программы по восстановлению лесов', 1, '2025-06-06 07:49:09'),
(3, 2, 'Солнечные панели', 'Эффективность новых солнечных панелей', 1, '2025-06-06 07:52:25'),
(4, 2, 'Ветровые станции', 'Эффективность новых  ветряных станций', 2, '2025-06-06 07:52:25');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1749181632),
('m250519_095409_create_user_table', 1749181633),
('m250519_095445_create_articles_table', 1749181633),
('m250519_100247_create_resourse_table', 1749181633),
('m250524_070836_create_reviews_table', 1749181633),
('m250605_085724_create_forum_section_table', 1749181633),
('m250605_090138_create_forum_topic_table', 1749181633),
('m250605_090205_create_forum_message_table', 1749181633);

-- --------------------------------------------------------

--
-- Структура таблицы `resourse`
--

CREATE TABLE `resourse` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coordinates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_id` int(11) DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `text`, `article_id`, `photo`, `created_at`) VALUES
(1, 1, 'Сайт помог мне найти единомышленников в теме экологии', NULL, 'uploads/reviews/artem.jpg', '2025-06-06 03:47:47');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) DEFAULT 10,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `first_name`, `last_name`, `email`, `phone`, `password`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Artem', 'Артём', 'Воинков', 'artem@mail.ru', '+7.912.522-64-20', '$2y$13$aawPeUJKiELxzJMwtM3XWOB2W4qiZCmIPal24Pgq59hBnGQr4TXR6', NULL, 10, NULL, NULL),
(2, 'User', 'Atmoteam', 'Neu3BecTHo', 'user@mail.ru', '+7.800.555-35-35', '$2y$13$SNR7Zh/oEN/9noeVeIkTRemS4l5.N.23G2M9xSaPX5rEX7ng3Yiby', NULL, 10, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_message`
--
ALTER TABLE `forum_message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-forum_message-topic_id` (`topic_id`),
  ADD KEY `fk-forum_message-author_id` (`author_id`);

--
-- Индексы таблицы `forum_section`
--
ALTER TABLE `forum_section`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-forum_topic-section_id` (`section_id`),
  ADD KEY `fk-forum_topic-author_id` (`author_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `resourse`
--
ALTER TABLE `resourse`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk-reviews-article_id` (`article_id`),
  ADD KEY `fk-reviews-user_id` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `forum_message`
--
ALTER TABLE `forum_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `forum_section`
--
ALTER TABLE `forum_section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `resourse`
--
ALTER TABLE `resourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `forum_message`
--
ALTER TABLE `forum_message`
  ADD CONSTRAINT `fk-forum_message-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-forum_message-topic_id` FOREIGN KEY (`topic_id`) REFERENCES `forum_topic` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `forum_topic`
--
ALTER TABLE `forum_topic`
  ADD CONSTRAINT `fk-forum_topic-author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-forum_topic-section_id` FOREIGN KEY (`section_id`) REFERENCES `forum_section` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `fk-reviews-article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk-reviews-user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
