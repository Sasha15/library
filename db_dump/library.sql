-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2017 г., 17:15
-- Версия сервера: 10.1.19-MariaDB
-- Версия PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `isbn` int(13) NOT NULL,
  `description` text NOT NULL,
  `picture` varchar(50) NOT NULL,
  `publishing_year` varchar(12) NOT NULL,
  `book_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `book_author`, `book_title`, `isbn`, `description`, `picture`, `publishing_year`, `book_status`) VALUES
(1, 'Stephen King', 'Insomnia', 2147483647, 'Since his wife died, Ralph Roberts has been having trouble sleeping. Each night he awakens a little earlier until he''s barely sleeping at all. During his late night vigils and walks, he observes some strange things going on in Derry, Maine. He sees colored ribbons streaming from people''s heads. He witnesses two strange little men wandering the city under cover of night. He begins to suspect that these visions are something more than hallucinations brought about by sleep deprivation. Ralph and his friend, widow Lois Chasse, become enmeshed in events of cosmic significance.', '', '1994', 1),
(2, 'Stephen King', 'It', 2147483647, 'A promise made twenty-eight years ago calls seven adults to reunite in Derry, Maine, where as teenagers they battled an evil creature that preyed on the city''s children. Unsure that their Losers Club had vanquished the creature all those years ago, the seven had vowed to return to Derry if IT should ever reappear. Now, children are being murdered again and their repressed memories of that summer return as they prepare to do battle with the monster lurking in Derry''s sewers once more.', '', '1986', 1),
(3, 'Stephen King', 'The Shining', 2147483647, 'Jack Torrance, his wife Wendy, and their young son Danny move into the Overlook Hotel, where Jack has been hired as the winter caretaker. Cut off from civilization for months, Jack hopes to battle alcoholism and uncontrolled rage while writing a play. Evil forces residing in the Overlook – which has a long and violent history – covet young Danny for his precognitive powers and exploit Jack’s weaknesses to try to claim the boy.', '', '1977', 0),
(4, 'Stephen King', 'The Stand', 2147483647, 'One man escapes from a biological weapon facility after an accident, carrying with him the deadly virus known as Captain Tripps, a rapidly mutating flu that - in the ensuing weeks - wipes out most of the world''s population. In the aftermath, survivors choose between following an elderly black woman to Boulder or the dark man, Randall Flagg, who has set up his command post in Las Vegas. The two factions prepare for a confrontation between the forces of good and evil.', '', '1990', 0),
(5, 'А. Стругацкий, Б. Стругацкий', 'Трудно быть богом', 2147483647, 'Повесть, которая задумывалась как легкая, бравурная, авантюрно-приключенческая, "мушкетерская", а стала одним из самых спорных произведений Стругацких, чаще всего вызывающих раздражение в высоких кабинетах. Книга о попытках изменить человеческую сущность и об этичности таких попыток. Принято считать, что повесть "Трудно быть богом" во многом повлияла на представление советской интеллигенции о "братской помощи", которую СССР щедро оказывал развивающимся странам и соседкам по соцлагерю. Однако сами Стругацкие это мнение не разделяли: их интересовали более близкие исторические параллели, недаром в одной из первых редакций дона Рэбу, "серого кардинала" Арканара, звали без затей доном Рэбией.', '', '1964', 0),
(6, 'А. Стругацкий, Б. Стругацкий', 'Понедельник начинается в субботу', 2147483647, 'Сказка для научных сотрудников младшего возраста", веселая и лихая ода творческому труду и людям, которым "работать интереснее, чем отдыхать". Лучшее лекарство от депрессии и хандры, настольная книга каждого уважающего себя молодого ученого 1960-х, по сей день не утратившая свою актуальность для тех, кто любит свою работу до беспамятства. Наряду с фильмом "Девять дней одного года" и романом Даниила Гранина "Иду на грозу" стала одним из главных символов научно-технического расцвета в СССР того времени, литературным воплощением неподдельного энтузиазма, до сих пор вспоминаемого с ностальгией.', '', '1965', 0),
(7, 'Robin Nixon', 'Learning PHP, MySQL, JavaScript, CSS & HTML5: A Step-by-Step Guide to Creating Dynamic Websites', 2147483647, 'The 3rd edition of the best-selling introduction to using PHP & MySQL to create dynamic, interactive websites - also includes coverage of JavaScript, CSS, and HTML5.', '', '2016', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bookstransfers`
--

CREATE TABLE `bookstransfers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `taken_date` varchar(13) NOT NULL,
  `return_date` varchar(13) NOT NULL,
  `real_return_date` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookstransfers`
--

INSERT INTO `bookstransfers` (`id`, `user_id`, `book_id`, `taken_date`, `return_date`, `real_return_date`) VALUES
(21, 3, 1, '1487548800', '1487635200', ''),
(22, 2, 2, '1488791464', '1491379864', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1487524590),
('m130524_201442_init', 1487524594);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_type` varchar(25) NOT NULL,
  `payment_amount` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `birthdate` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(25) NOT NULL,
  `pass_number` varchar(25) NOT NULL,
  `pass_data` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `tariff` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `profile`
--

INSERT INTO `profile` (`user_id`, `firstname`, `lastname`, `middlename`, `birthdate`, `address`, `phone`, `pass_number`, `pass_data`, `image`, `tariff`) VALUES
(1, 'Aleksandr', 'Brovko', 'Vladimirovich', '1487602133', 'dsfdsafdsaf', 'dsfadsaf', 'dsafdsaf', 'dsfadsafdsaf', '', 0),
(2, 'Sasha2', 'Brovko2', 'Vladimirovich', '1487665206', 'adsfdasfdsaf sadf ds fsafd sas df', '565568615', 'adsfdasf', 'adsfdasfadsf', '', 1),
(3, 'Sasha 3', 'sakfjkdsjafk', 'safdsafdfa', '1487858019', 'dafdasfdsaf asdfdasf dsaf  ', '546545', 'df545454', 'dafds fd sfd sf dsf d saf', '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'r2rigNVlGf6tLznOF2mWhslmhpwNjsps', '$2y$13$tXKovKxKh5t7zFMF3PvIwOOjn9OtmCIYgEv.Jb96fRQnZsoa9cbQe', NULL, 'admin@admin.com', 10, 1487576079, 1487576079, 1),
(2, 'user1', 'H7bt38xMLV24oF_2ag3afv3HVhsTuEo0', '$2y$13$RK2SftI08c2ndOr/5sLhHujexr5G/mWWlChpnJEtLZCQdlQGyxZPC', NULL, 'user1@user1.com', 10, 1487583127, 1487583127, 0),
(3, 'user 2', 'vKNrOpbyC4bPqQcZbQvPx5N2DVNXPALX', '$2y$13$SHUTzgSLZFzQOJ5YU/RxyOfJX02VtUap6YbUKbzesiIXyJgoTmwdS', NULL, 'user2@laksdfj.com', 10, 1487857950, 1487857950, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bookstransfers`
--
ALTER TABLE `bookstransfers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `bookstransfers`
--
ALTER TABLE `bookstransfers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT для таблицы `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
