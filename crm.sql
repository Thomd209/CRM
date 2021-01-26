-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 22 2021 г., 16:04
-- Версия сервера: 10.3.16-MariaDB
-- Версия PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `id13172432_crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '$2y$10$wDjsEOdb7I17APvKuCrGUOybAAZY/AbIHqwfgP0sfJovArBQB2ure');

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Суда'),
(2, 'Проектанты'),
(3, 'Верфи'),
(4, 'Заказчики');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id_customer` int(11) NOT NULL,
  `customer_working_name` varchar(256) DEFAULT NULL,
  `entity` varchar(256) DEFAULT NULL,
  `INN` varchar(256) DEFAULT NULL,
  `contacts` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id_customer`, `customer_working_name`, `entity`, `INN`, `contacts`) VALUES
(15, 'Атомфлот', 'ФГУП \"Атомфлот\"', '5192110268', 'general@rosatomflot.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `designers`
--

CREATE TABLE `designers` (
  `id_designer` int(11) NOT NULL,
  `designer_working_name` varchar(256) DEFAULT NULL,
  `entity` varchar(256) DEFAULT NULL,
  `INN` varchar(256) DEFAULT NULL,
  `contacts` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `designers`
--

INSERT INTO `designers` (`id_designer`, `designer_working_name`, `entity`, `INN`, `contacts`) VALUES
(52, '\"ЦКБ \"Айсберг\"', 'ПАО \"ЦКБ \"Айсберг\"', '7801005606', 'main@iceberg.sp.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `history_customers`
--

CREATE TABLE `history_customers` (
  `id` int(11) NOT NULL,
  `history` text DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `history_designers`
--

CREATE TABLE `history_designers` (
  `id` int(11) NOT NULL,
  `history` text DEFAULT NULL,
  `designer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `history_shipyards`
--

CREATE TABLE `history_shipyards` (
  `id` int(11) NOT NULL,
  `history` text DEFAULT NULL,
  `shipyard_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `shipyards`
--

CREATE TABLE `shipyards` (
  `id_shipyard` int(11) NOT NULL,
  `shipyard_working_name` varchar(256) DEFAULT NULL,
  `entity` varchar(256) DEFAULT NULL,
  `INN` varchar(256) DEFAULT NULL,
  `contacts` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `shipyards`
--

INSERT INTO `shipyards` (`id_shipyard`, `shipyard_working_name`, `entity`, `INN`, `contacts`) VALUES
(15, 'Балтийский завод', 'АО Балтийский завод\"', '7830001910', 'zavod@bz.ru');

-- --------------------------------------------------------

--
-- Структура таблицы `vessels`
--

CREATE TABLE `vessels` (
  `id` int(11) NOT NULL,
  `IMO` varchar(256) DEFAULT NULL,
  `project` varchar(256) DEFAULT NULL,
  `ship_name` varchar(256) DEFAULT NULL,
  `ship_type` varchar(256) DEFAULT NULL,
  `building_number` varchar(256) DEFAULT NULL,
  `project_stage` varchar(256) DEFAULT NULL,
  `purchase_stage` varchar(256) DEFAULT NULL,
  `designer_id` int(11) DEFAULT NULL,
  `shipyard_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `vessels`
--

INSERT INTO `vessels` (`id`, `IMO`, `project`, `ship_name`, `ship_type`, `building_number`, `project_stage`, `purchase_stage`, `designer_id`, `shipyard_id`, `customer_id`) VALUES
(17, '9694725', '22220', 'Арктика', 'Универсальный атомный ледокол', '05706', 'Испытания', 'Завершена', 52, 15, 15);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id_customer`),
  ADD KEY `id` (`id_customer`);

--
-- Индексы таблицы `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id_designer`),
  ADD KEY `id` (`id_designer`),
  ADD KEY `id_2` (`id_designer`);

--
-- Индексы таблицы `history_customers`
--
ALTER TABLE `history_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Индексы таблицы `history_designers`
--
ALTER TABLE `history_designers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer_id` (`designer_id`);

--
-- Индексы таблицы `history_shipyards`
--
ALTER TABLE `history_shipyards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipyard_id` (`shipyard_id`);

--
-- Индексы таблицы `shipyards`
--
ALTER TABLE `shipyards`
  ADD PRIMARY KEY (`id_shipyard`),
  ADD KEY `id` (`id_shipyard`);

--
-- Индексы таблицы `vessels`
--
ALTER TABLE `vessels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer_id` (`designer_id`),
  ADD KEY `shipyard_id` (`shipyard_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `designers`
--
ALTER TABLE `designers`
  MODIFY `id_designer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `history_customers`
--
ALTER TABLE `history_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `history_designers`
--
ALTER TABLE `history_designers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT для таблицы `history_shipyards`
--
ALTER TABLE `history_shipyards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `shipyards`
--
ALTER TABLE `shipyards`
  MODIFY `id_shipyard` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `vessels`
--
ALTER TABLE `vessels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `history_customers`
--
ALTER TABLE `history_customers`
  ADD CONSTRAINT `history_customers_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id_customer`);

--
-- Ограничения внешнего ключа таблицы `history_designers`
--
ALTER TABLE `history_designers`
  ADD CONSTRAINT `history_designers_ibfk_1` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id_designer`);

--
-- Ограничения внешнего ключа таблицы `history_shipyards`
--
ALTER TABLE `history_shipyards`
  ADD CONSTRAINT `history_shipyards_ibfk_1` FOREIGN KEY (`shipyard_id`) REFERENCES `shipyards` (`id_shipyard`);

--
-- Ограничения внешнего ключа таблицы `vessels`
--
ALTER TABLE `vessels`
  ADD CONSTRAINT `vessels_ibfk_1` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id_designer`),
  ADD CONSTRAINT `vessels_ibfk_2` FOREIGN KEY (`shipyard_id`) REFERENCES `shipyards` (`id_shipyard`),
  ADD CONSTRAINT `vessels_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
