-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 03 日 10:31
-- 服务器版本: 5.6.12
-- PHP 版本: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tongji`
--
CREATE DATABASE IF NOT EXISTS `tongji` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tongji`;

-- --------------------------------------------------------

--
-- 表的结构 `chargeamount`
--

CREATE TABLE IF NOT EXISTS `chargeamount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `typename` varchar(10) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `chargeamount`
--

INSERT INTO `chargeamount` (`id`, `typename`, `value`) VALUES
(3, '6元', 6),
(4, '12元', 12),
(5, '15元', 15),
(6, '18元', 18),
(7, '25元', 25);

-- --------------------------------------------------------

--
-- 表的结构 `gamename`
--

CREATE TABLE IF NOT EXISTS `gamename` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gamename` varchar(50) NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `gamename`
--

INSERT INTO `gamename` (`id`, `gamename`, `insertdate`) VALUES
(1, '我出人头地:笑笑', '0000-00-00 00:00:00'),
(2, '我出人头地:强强', '0000-00-00 00:00:00'),
(3, '我出人头地:笑笑', '0000-00-00 00:00:00'),
(4, '我出人头地:强强', '0000-00-00 00:00:00'),
(5, 'double陶瓷:叉烧包', '0000-00-00 00:00:00'),
(6, '刀塔传奇月卡', '0000-00-00 00:00:00'),
(7, '苹果微信玩欢乐麻将', '0000-00-00 00:00:00'),
(8, '刀塔传奇月卡', '0000-00-00 00:00:00'),
(9, '苹果微信玩欢乐麻将', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `rechargeinfo`
--

CREATE TABLE IF NOT EXISTS `rechargeinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ipadcoed` int(11) NOT NULL,
  `usrid` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `custername` varchar(20) NOT NULL COMMENT '客户名称',
  `chargetime` time NOT NULL,
  `chargeday` date NOT NULL,
  `chargecontent` varchar(200) NOT NULL COMMENT '充值内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `rechargeinfo`
--

INSERT INTO `rechargeinfo` (`id`, `ipadcoed`, `usrid`, `gameid`, `custername`, `chargetime`, `chargeday`, `chargecontent`) VALUES
(1, 1, 3, 2, '12', '00:00:09', '2014-09-02', '15'),
(2, 1, 4, 2, '12', '00:00:09', '2014-09-02', '15'),
(3, 1, 4, 2, '12', '00:00:09', '2014-09-02', '15'),
(4, 1, 4, 2, '12', '00:00:09', '2014-09-02', '15'),
(5, 1, 4, 2, '12', '09:00:21', '2014-09-02', '15'),
(6, 1, 3, 2, '123', '09:00:20', '2014-09-02', '15'),
(7, 1, 3, 9, '14', '09:00:20', '2014-09-02', '25');

-- --------------------------------------------------------

--
-- 表的结构 `usr`
--

CREATE TABLE IF NOT EXISTS `usr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(10) NOT NULL,
  `insertdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `usr`
--

INSERT INTO `usr` (`id`, `name`, `insertdate`) VALUES
(1, '425252', '2014-09-03 00:00:00'),
(2, '858', '2014-09-03 00:00:00'),
(3, 'a', '0000-00-00 00:00:00'),
(4, 'a', '2014-09-03 14:19:35'),
(5, 'b', '2014-09-03 14:22:34'),
(6, 'b', '2014-09-03 14:22:55'),
(7, 'b', '2014-09-03 14:23:33'),
(8, 'b', '2014-09-03 14:23:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
