-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 04 2018 г., 09:41
-- Версия сервера: 10.1.34-MariaDB
-- Версия PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `clients_database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `make` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) DEFAULT NULL,
  `state_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ecu_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chiptuned` tinyint(1) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `cars`
--

INSERT INTO `cars` (`id`, `make`, `model`, `year`, `state_number`, `ecu_name`, `chiptuned`, `deleted_at`, `created_at`, `updated_at`) VALUES
(12, 'ГАЗ', 'Ель', 2006, 'СА1773АI', 'Микас 7.1', 1, NULL, '2018-08-23 05:56:40', '2018-08-23 05:56:40'),
(13, 'Daewoo', 'Lanos', 2004, 'CA1078CA', NULL, 0, NULL, '2018-08-30 10:10:57', '2018-08-30 10:10:57'),
(14, 'ЛАДА', 'Приора', 2011, 'CA4234CM', 'M73', 0, NULL, '2018-08-30 10:35:31', '2018-08-31 03:54:02'),
(15, 'Skoda', 'Octavia', NULL, 'CA2537CA', NULL, 0, NULL, '2018-09-01 07:20:33', '2018-09-01 07:20:33'),
(16, 'ВАЗ', '2107', 2005, 'CA1661AC', 'Карбюратор', 0, NULL, '2018-09-03 06:05:49', '2018-09-03 06:05:49'),
(17, 'ВАЗ', '2115', 2011, 'СА2396ВЕ', 'Bosch ME17.9.7', 1, NULL, '2018-09-03 08:20:37', '2018-09-03 08:48:39'),
(18, 'Toyota', 'Corola', 2007, 'CA8022BA', NULL, 0, NULL, '2018-09-04 04:24:49', '2018-09-04 04:39:21');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_07_15_095517_create_cars_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `visits`
--

CREATE TABLE `visits` (
  `id` int(10) UNSIGNED NOT NULL,
  `odometer_reading` int(11) NOT NULL,
  `errors_petrol` text COLLATE utf8mb4_unicode_ci,
  `errors_gas` text COLLATE utf8mb4_unicode_ci,
  `work_petrol` text COLLATE utf8mb4_unicode_ci,
  `work_gas` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `car_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `visits`
--

INSERT INTO `visits` (`id`, `odometer_reading`, `errors_petrol`, `errors_gas`, `work_petrol`, `work_gas`, `notes`, `car_id`, `created_at`, `updated_at`) VALUES
(5, 708900, NULL, 'Нет массы на газовых клапанах пропан.\r\nЗагрязнён фильтр в клапане.\r\nПлохой контакт плюсовой клеммы не метановом редукторе.', NULL, 'Замена фильтра паровой фазы, пропан.\r\nЗамена проводки и клемм.', NULL, 12, '2018-08-23 09:00:00', NULL),
(6, 323593, '-', 'Жалобы на неустойчивый холостой ход', 'Замена свечей, чистка РХХ', 'ТО редуктора, замена фильтра жидкой фазы, устраниение подсоса воздуха по газ., смесителю, переделка \"массы\" ГБО, замена резинки антихлопка', 'В редукторе установлен неоригинальный клапан во второй ступени(толщина меньше чем в ремкомплекте)', 13, '2018-08-30 10:13:10', '2018-08-30 10:16:42'),
(8, 84640, '-', 'Нет газовой форсунки 2, низкое напряжение, снимался аккумулятор, слетела газовая карта', 'Закрепили корпус воздушного фильтра', 'Подрезали крышку двигателя, чтобы не сбивала фишку форсунки.', '', 14, '2018-08-30 10:37:48', '2018-08-31 03:53:28'),
(9, 174549, 'Не работает лямбда зонд', '-', '-', 'Замена редуктора(редуктор клиента), удлиннение трубки подачи газа. Замена фильта паровой фазы (тонкой очистки).', NULL, 15, '2018-09-01 07:22:29', '2018-09-01 07:22:29'),
(10, 86848, NULL, 'Не стабильно работает на газу (пробег редуктора 90000км)', NULL, 'Переборка редуктора(установка ремкомплекта), замена магистрального клапана.', NULL, 16, '2018-09-03 06:07:32', '2018-09-03 06:08:10'),
(11, 144315, 'Пропуски воспламенения 1,3,4 цилиндры в незначительном количестве', 'Неустойчивый холостой ход. Ошибка напряжения.', NULL, 'Замена фильтров жидкой и паровой фазы', NULL, 17, '2018-09-03 08:21:45', '2018-09-03 08:51:09'),
(12, 106819, NULL, 'Низкая температура газа', NULL, NULL, NULL, 18, '2018-09-04 04:26:35', '2018-09-04 04:27:35');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_number` (`state_number`(191));

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_ibfk_1` (`car_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `visits_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
