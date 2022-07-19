-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июл 11 2022 г., 14:10
-- Версия сервера: 10.4.21-MariaDB
-- Версия PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `computer`
--

-- --------------------------------------------------------

--
-- Структура таблицы `computer`
--

CREATE TABLE `computer` (
  `ID_Computer` int(11) NOT NULL,
  `netname` text NOT NULL,
  `motherboard` text NOT NULL,
  `RAM_Capacity` int(11) NOT NULL,
  `HDD_Capacity` int(11) NOT NULL,
  `monitor` text NOT NULL,
  `vendor` text NOT NULL,
  `guarantee` datetime NOT NULL,
  `FID_processor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `computer`
--

INSERT INTO `computer` (`ID_Computer`, `netname`, `motherboard`, `RAM_Capacity`, `HDD_Capacity`, `monitor`, `vendor`, `guarantee`, `FID_processor`) VALUES
(1, 'User a', 'Gigabyte Z690 Aorus Pro', 8, 1000, 'Dell S2721DGFA', 'Samsung', '2018-01-19 00:00:00', 1),
(2, 'User b', 'Asus ROG Crosshair VIII Extreme', 16, 1000, 'Samsung Odyssey G7 S28AG700', 'Asus', '2018-01-01 00:00:00', 2),
(3, 'User c', 'MSI Pro B660M-A', 4, 500, 'Xiaomi Mi Display 34', 'Asus', '2018-02-19 00:00:00', 3),
(4, 'User d', 'MSI Pro B660M-A', 16, 1000, 'LG 24GN600-B Black', 'Samsung', '2018-01-19 00:00:00', 4),
(5, 'User e', 'Gigabyte A520 Aorus Elite', 32, 800, 'LG 24GN600-B Black', 'Dell', '2018-08-19 00:00:00', 5),
(6, 'User f', 'ASUS ROG Strix B660-I Gaming WIFI', 16, 500, 'Dell S2721DGFA', 'Dell', '2024-06-20 00:00:00', 6),
(7, 'User g', 'Asus TUF Gaming B550M-PLUS', 24, 500, 'LG 24GN600-B Black', 'Asus', '2020-01-25 00:00:00', 7),
(8, 'User h', 'Asus ROG Maximus XIII Hero', 32, 2000, 'Dell S2721DGFA', 'Asus', '2023-01-23 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `computer_software`
--

CREATE TABLE `computer_software` (
  `FID_Computer` int(11) NOT NULL,
  `FID_Software` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `computer_software`
--

INSERT INTO `computer_software` (`FID_Computer`, `FID_Software`) VALUES
(1, 1),
(2, 2),
(3, 4),
(4, 5),
(5, 4),
(6, 1),
(7, 2),
(8, 4),
(1, 5),
(2, 4),
(1, 3),
(2, 1),
(3, 5),
(4, 8),
(5, 9),
(6, 10),
(7, 6),
(8, 4),
(1, 8),
(2, 2),
(1, 10),
(2, 9),
(3, 8),
(4, 7),
(5, 6),
(6, 5),
(7, 4),
(8, 3),
(1, 2),
(2, 10);

-- --------------------------------------------------------

--
-- Структура таблицы `processors`
--

CREATE TABLE `processors` (
  `ID_Processor` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `processors`
--

INSERT INTO `processors` (`ID_Processor`, `name`, `frequency`) VALUES
(1, 'AMD Ryzen 9 5950X', 3600),
(2, 'Intel Core i9-10900KF Processor', 3600),
(3, 'Intel Core i9-10850K Processor', 4000),
(4, 'AMD Ryzen 7 5800X3D', 2400),
(6, 'AMD Ryzen 7 1800X', 2600),
(7, 'Intel Core i7-8700K Processor', 2800);

-- --------------------------------------------------------

--
-- Структура таблицы `software`
--

CREATE TABLE `software` (
  `ID_software` int(11) NOT NULL,
  `name` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `software`
--

INSERT INTO `software` (`ID_software`, `name`) VALUES
(1, 'Microsoft 365'),
(2, 'Minecraft'),
(3, 'VSC'),
(4, 'Visual Studio 2019'),
(5, 'PHP Storm'),
(6, 'Visual Studio 2021'),
(7, 'Spotify'),
(8, 'Google Chrome'),
(9, 'Telegram'),
(10, 'Viber');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `computer`
--
ALTER TABLE `computer`
  ADD PRIMARY KEY (`ID_Computer`);

--
-- Индексы таблицы `processors`
--
ALTER TABLE `processors`
  ADD PRIMARY KEY (`ID_Processor`);

--
-- Индексы таблицы `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`ID_software`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
