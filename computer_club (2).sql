-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 02 2023 г., 23:29
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `computer_club`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clients`
--

INSERT INTO `clients` (`id`, `name`, `login`, `password`, `admin`) VALUES
(5, 'mila', 'deoships', '1q2w3e4t', 0),
(7, 'admin', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `equipment`
--

CREATE TABLE `equipment` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `characteristics` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `equipment`
--

INSERT INTO `equipment` (`id`, `type`, `characteristics`) VALUES
(1, 'Компьютер', 'Intel Core i5, 8GB RAM, 256GB SSD'),
(2, 'Ноутбук', 'Intel Core i7, 16GB RAM, 512GB SSD'),
(3, 'Игровая консоль', 'PlayStation 5, 1TB HDD');

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `name`) VALUES
(1, 'Call of Duty: Modern Warfare'),
(2, 'FIFA 22'),
(3, 'Assassin\'s Creed Valhalla');

-- --------------------------------------------------------

--
-- Структура таблицы `rental`
--

CREATE TABLE `rental` (
  `id` int(11) NOT NULL,
  `client_id` varchar(50) NOT NULL,
  `tarifs_id` varchar(50) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `equipment_id` varchar(50) NOT NULL,
  `price_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `rental`
--

INSERT INTO `rental` (`id`, `client_id`, `tarifs_id`, `start_time`, `end_time`, `equipment_id`, `price_id`) VALUES
(1, 'loshok', 'Pro', '10:35:00', '15:35:00', 'notebook', '60000');

-- --------------------------------------------------------

--
-- Структура таблицы `tarifs`
--

CREATE TABLE `tarifs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `tarifs`
--

INSERT INTO `tarifs` (`id`, `name`) VALUES
(1, 'Noob(ночной тариф)'),
(2, 'Pro(дневной тариф)'),
(3, 'God(льготный тариф)');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tarifs`
--
ALTER TABLE `tarifs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `rental`
--
ALTER TABLE `rental`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `tarifs`
--
ALTER TABLE `tarifs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
