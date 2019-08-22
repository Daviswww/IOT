-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 06 月 26 日 05:02
-- 伺服器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `farm`
--

-- --------------------------------------------------------

--
-- 資料表結構 `farmer1`
--

CREATE TABLE `sensor` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `s0` int(5),
  `s1` int(5),
  `s2` int(5),
  `s3` int(5),
  `s4` int(5),
  `s5` int(5),
  `s6` int(5),
  `s7` int(5),
  `s8` int(5),
  `s9` int(5),
  `s10` int(5),
  `s11` int(5),
  `s12` int(5),
  `s13` int(5),
  `s14` int(5),
  `s15` int(5),
  `s16` int(5),
  `s17` int(5),
  `s18` int(5),
  `s19` int(5),
  `s20` int(5)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 傾印資料表的資料 `farmer1`
--

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `farmer1`
--
ALTER TABLE `sensor`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動增長(AUTO_INCREMENT)
--

--
-- 使用資料表自動增長(AUTO_INCREMENT) `farmer1`
--
ALTER TABLE `sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
