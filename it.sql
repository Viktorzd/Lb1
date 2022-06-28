-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 26 2022 г., 17:08
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
-- База данных: `it`
--

-- --------------------------------------------------------

--
-- Структура таблицы `actor`
--

CREATE TABLE `actor` (
  `ID_ACTOR` int(10) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `actor`
--

INSERT INTO `actor` (`ID_ACTOR`, `name`) VALUES
(1, 'Дензел Вашингтон'),
(2, 'Изабель Юппер'),
(3, 'Дэниэл Дэй-Льюис'),
(4, 'Киану Ривз'),
(5, 'Николь Кидман'),
(6, 'Сон Кан-хо');

-- --------------------------------------------------------

--
-- Структура таблицы `film`
--

CREATE TABLE `film` (
  `ID_FILM` int(10) NOT NULL,
  `name` text NOT NULL,
  `date` date NOT NULL,
  `country` text NOT NULL,
  `quality` text NOT NULL,
  `resolution` enum('640x480','1280x720','1920x1080','3840x2160') NOT NULL,
  `codec` text NOT NULL,
  `producer` text NOT NULL,
  `director` text NOT NULL,
  `carrier` enum('video','CD','DVD','BR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film`
--

INSERT INTO `film` (`ID_FILM`, `name`, `date`, `country`, `quality`, `resolution`, `codec`, `producer`, `director`, `carrier`) VALUES
(1, 'Малхолланд Драйв', '2001-01-01', 'Америка', 'SD', '640x480', 'MP4', 'Аалда Марианн', 'Байер Трой', 'DVD'),
(2, 'Любовное настроениe', '2000-01-01', 'Америка', 'HD', '1280x720', 'MPEG', 'Аалда Марианн', 'Бак Тара', 'BR'),
(3, 'Нефть', '2007-01-01', 'Америка', 'HD', '1280x720', 'HD', 'Ааронс Бонни', 'Бако Бриджит', 'CD'),
(4, 'Унесённые призраками	', '2002-01-01', 'Украина', 'Full HD', '1920x1080', 'MKV', 'Дауни Рома', 'Барабанов Борис Сергеевич', 'video');

-- --------------------------------------------------------

--
-- Структура таблицы `film_actor`
--

CREATE TABLE `film_actor` (
  `FID_ACTOR` int(10) NOT NULL,
  `FID_FILM` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_actor`
--

INSERT INTO `film_actor` (`FID_ACTOR`, `FID_FILM`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 1),
(6, 2),
(1, 3),
(2, 4),
(3, 1),
(4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `film_genre`
--

CREATE TABLE `film_genre` (
  `FID_FILM` int(10) NOT NULL,
  `FID_GENRE` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `film_genre`
--

INSERT INTO `film_genre` (`FID_FILM`, `FID_GENRE`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 5),
(1, 3),
(2, 4),
(3, 5),
(4, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `genre`
--

CREATE TABLE `genre` (
  `ID_GENRE` int(10) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `genre`
--

INSERT INTO `genre` (`ID_GENRE`, `title`) VALUES
(1, 'Боевик'),
(2, 'Вестерн'),
(3, 'Гангстерский фильм'),
(4, 'Детектив'),
(5, 'Драма');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`ID_ACTOR`);

--
-- Индексы таблицы `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`ID_FILM`);

--
-- Индексы таблицы `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`ID_GENRE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
