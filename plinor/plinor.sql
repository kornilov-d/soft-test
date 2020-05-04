-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 30, 2020 at 01:41 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plinor`
--

-- --------------------------------------------------------

--
-- Table structure for table `hash`
--

CREATE TABLE `hash` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hash`
--

INSERT INTO `hash` (`id`, `id_user`, `hash`) VALUES
(1, 1, '50c4d32df75c5353c63951bd29fc010a'),
(2, 2, 'e75aabb43c8e0e66b595637b9c024ddc'),
(3, 4, 'c42e78d2692b224dfa1b156b5e8064b1');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_reader` int(11) NOT NULL,
  `theme` text NOT NULL,
  `content` text NOT NULL,
  `mdate` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `id_author`, `id_reader`, `theme`, `content`, `mdate`, `status`) VALUES
(2, 1, 1, '-', ' 12345          ', 1587665712, 0),
(3, 1, 4, '-', ' 123           ', 1587665822, 0),
(4, 1, 4, '-', ' 24           ', 1587665824, 0),
(5, 1, 4, '-', '  5668324          ', 1587665828, 0),
(6, 1, 4, '-', 'Привет!            ', 1587665817, 0),
(7, 4, 1, '-', '  Ну привет, коль не шутишь          ', 1587728727, 0),
(8, 4, 1, '-', '   Тест идёт         ', 1587728763, 0),
(9, 1, 12, '-', '    Поменяйте логин, а то тяжело искать.        ', 1587730457, 0),
(10, 1, 1, '-', '   Диалог с самим собой', 1587751267, 0);

-- --------------------------------------------------------

--
-- Table structure for table `oper_it`
--

CREATE TABLE `oper_it` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `time_s` date NOT NULL,
  `time_t` date NOT NULL,
  `aprov` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_tech` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `tech_return` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `technic`
--

CREATE TABLE `technic` (
  `id` int(11) NOT NULL,
  `inv_id` text NOT NULL,
  `model_full` text NOT NULL,
  `model_short` text NOT NULL,
  `serial_id` text NOT NULL,
  `model_opt` text,
  `model_cond` text,
  `stg_name` text NOT NULL,
  `model_work` int(11) NOT NULL,
  `model_reserve` int(11) NOT NULL,
  `amount` int(11) NOT NULL DEFAULT '1',
  `photo_gall` text,
  `typ` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `technic`
--

INSERT INTO `technic` (`id`, `inv_id`, `model_full`, `model_short`, `serial_id`, `model_opt`, `model_cond`, `stg_name`, `model_work`, `model_reserve`, `amount`, `photo_gall`, `typ`) VALUES
(5, '12345', 'ПМ123456789', 'Тестовый ноут', 'СН12343234', '           Тест                                                 ', '                     Второй тест                                       ', 'ПГТ Огорёво', 0, 0, 3, NULL, 3),
(6, '1234', '', 'Классный ноут', '', '', '', '', 0, 0, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text,
  `password` text,
  `r_name` text,
  `r_surname` text,
  `r_secname` text,
  `email` text,
  `mode` int(11) DEFAULT NULL,
  `avatar` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `r_name`, `r_surname`, `r_secname`, `email`, `mode`, `avatar`) VALUES
(1, 'admin', 'admin', 'Администратор', 'Бобинов', 'Владимирович', 'mailmailmail@mail.ma', 5, '/pic/big/640a321a71db1ca571e23300a217d5e7.png'),
(2, 'moder', 'moder', 'Модератор', 'Голинов', 'Владимирович', 'mailmailmail@mail.ma', 4, '0'),
(4, 'U2fh81kz288', 'P7213ityrie', 'Фридрих', 'Богомолов', 'Визирионович', '1234@pepe.tel', 1, '/pic/big/83fd5d622efe63d236408b3109fb6399.png'),
(6, 'Ui7r61ez230', 'Ptakestdrb0', 'Игорь', 'Хрисов', 'Визирионович', 'god@heaven.doors', 1, NULL),
(7, 'Ut3yh71i0bd', 'Pksf4575zkk', 'Адольф', 'Хрисов', 'Визирионович', 'gulag@1937.us', 3, NULL),
(8, 'Uei7sze5r74', 'Pen33f63r61', 'Адольф', 'Хрисов', 'Визирионович', 'gulag@1937.us', 3, NULL),
(9, 'Ute64689y59', 'P28nb62754t', 'кек', 'Сталин', 'Олегович', '1234@pepe.tel', 4, NULL),
(10, 'Uahy8s3i06y', 'Pkzb7k2ztzs', 'алибек', 'Богомолов', 'Алуийсович', 'god@heaven.doors', 4, NULL),
(11, 'U7y59ffd8z0', 'Pi5irhe0bzi', 'Игорь', 'Сталин', 'Иосифович', 'recih@mail.ger', 5, NULL),
(12, 'Uai956977ye', 'Pt2d0iyf21n', 'Боб', 'Хрисов', 'Визирионович', 'зузу@bebe.com', 3, NULL),
(13, 'Ut5ydz437t7', 'Py8shezhy43', 'Адольф', 'Богомолов', 'Визирионович', '1234@pepe.tel', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hash`
--
ALTER TABLE `hash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oper_it`
--
ALTER TABLE `oper_it`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technic`
--
ALTER TABLE `technic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hash`
--
ALTER TABLE `hash`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oper_it`
--
ALTER TABLE `oper_it`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `technic`
--
ALTER TABLE `technic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
