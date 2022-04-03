-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 03 2022 г., 09:12
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `st-fr15-00`
--

-- --------------------------------------------------------

--
-- Структура таблицы `busket`
--

CREATE TABLE `busket` (
  `busket_id` int NOT NULL,
  `busket_login` varchar(100) NOT NULL,
  `busket_good` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int NOT NULL,
  `comment_login` varchar(100) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_login`, `text`, `date`) VALUES
(2, 'qwe', 'hello it\'s me', '02.04.22 17:33:19'),
(3, 'qwe', ' sdf sdf sdf sdf sdf sdf sd', '02.04.22 17:33:09'),
(4, 'vovan21', 'dattebayo', '02.04.22 17:35:11'),
(5, 'vovan21', 'its vovan, no roberto', '02.04.22 17:34:58');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `goods_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `img` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`goods_id`, `name`, `price`, `text`, `img`, `category`) VALUES
(1, 'бургер', '20000', 'оыавл алыв алдыв даоыв алыо вла ывла ывла ылв алыв алыв алы влал ывла ывла ывл', './images/goods/goods_imageMyd31V8uxyOftVyakhRc.jpg', 'burger'),
(2, 'бургер чиз', '22000', 'ывоар ывола олы ваол ыволар оывл аоыв аолывр аолы вароыр ова ывоа ыова оыв аоыва', './images/goods/goods_imagegalQBaefwb5Yh8ptYmuB.jpg', 'burger'),
(3, 'бургер дабл', '26000', 'ы ваолы валд ывдао дылво алдыв оалды ваоы влао ылвдао оылв аолды вадлыв алыв алд', './images/goods/goods_imageEKx07pl40O4Nvs9GVrjq.jpg', 'burger'),
(4, 'хот дог', '7000', 'валпвалд плдывоаплдо ывалпо лдыв аплд ывдлапо лв аплдв алдпо вла плв аплв алп ва', './images/goods/goods_imagebrvBKLmIGSePOX7ny9fL.jpg', 'hotdog'),
(5, 'хот дог багет', '9000', 'ывлаоыв алдыоалд ывдла ыдлвао длыво адлыво адлыво адл ывдал ывлдао ывдла ывлда', './images/goods/goods_imagefVE5juwTN8r9ZnWQmJZ4.jpg', 'hotdog'),
(6, 'хот дог royal', '16000', 'sdkl fjsd fk jdksjfskld fksld fjskd fjksd jfksjd fks dkf sdkf skd fksd fksd fksd fksdkfksd fks dfks d', './images/goods/goods_image3chG3cmYCOWrD1ZU5jSO.jpg', 'hotdog'),
(7, 'пицца 4 сыра', '40000', 'ывладлывд аолдыв алдыво ал ывалдоывла ылдв аылдв алыв алды вал ывлывла ывл', './images/goods/goods_image93cfUswbBGhrwGulhJjk.jpg', 'pizza'),
(8, 'пицца пепперони', '55000', 'ывлда фывлао лыв алоы влао ылдва ылв алыв ал ывла ылва ылв алыв алыв алы вла ылва ылв алывл', './images/goods/goods_imagenyCxdu9fbNLWrLep34fM.jpg', 'pizza'),
(9, 'пицца диаболо', '60000', 'оывлдао ылдв алдыв алдыов лдао ывла ылдв алы влдао ывла лыв алыв ал ывла ывла ыв', './images/goods/goods_imagewEvSIvpfmYLyNWKJ7PDo.jpg', 'pizza');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `users_id` int NOT NULL,
  `login` varchar(75) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'guest'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`users_id`, `login`, `name`, `img`, `email`, `pass`, `role`) VALUES
(1, 'qwe', 'wer', './images/default.png', 'wer@mail.ru', '$2y$10$sbEIUC0TsXpAvz8u0VEW.etWmsKXZMKcbixxIr7gz3p9GZxXjGtze', 'guest'),
(2, 'vovan21', 'роберт', './images/users/vovan21.JPG', 'lfkslfs@mail.ru', '$2y$10$a2kLXVNFLqPVy8Ozi7HFeu5ag6in/UAdzgS3eb.oDkFadGiiRC17S', 'guest'),
(4, 'admin', 'qwe', './images/users/admin.png', 'qwe@mail.ru', '$2y$10$539RpFvC3BqQXl3JHdTw8eMwoStGSoIjYgTmZZAyYl/nBKDoBbyPO', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`busket_id`),
  ADD UNIQUE KEY `busket_good` (`busket_good`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `busket`
--
ALTER TABLE `busket`
  MODIFY `busket_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `goods_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
