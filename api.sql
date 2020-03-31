-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.0.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `api`
--
CREATE DATABASE `api` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `api`;

-- --------------------------------------------------------

--
-- 表的结构 `api_info`
--

CREATE TABLE IF NOT EXISTS `api_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `doc` varchar(100) NOT NULL,
  `miaoshu` varchar(200) NOT NULL,
  `url` varchar(100) NOT NULL,
  `request` varchar(100) NOT NULL,
  `demo` varchar(100) NOT NULL,
  `democode` varchar(100) DEFAULT NULL,
  `time` varchar(50) NOT NULL,
  `type` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `api_info`
--

INSERT INTO `api_info` (`id`, `name`, `doc`, `miaoshu`, `url`, `request`, `demo`, `democode`, `time`, `type`) VALUES
(6, '随机动漫图测试', 'img', 'img', 'img', 'img', 'img', 'img', '1585298199', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>测试</code></td>\r\n<td>可选</td><td>gb2312</td>\r\n<td>即编码。不同的参数代表不同的编码</td></tr><tr>\r\n<td><code>测试</code></td>\r\n<td>必选</td><td>js</td>\r\n<td>返回document.write的脚本</td>\r\n</tr></tbody></table>'),
(7, '随机动漫图测试', 'cs', 'cs', '', '', '', '', '1585231392', ''),
(8, '测试测试随机动漫图测试', '随机动漫图测试随机动漫图测试', '随机动漫图测试随机动漫图测试随机动漫图测试', '', '', '', NULL, '1585218159', ''),
(9, '随机动漫图测试', 'qa', '我是描述', '我是请求地址', '我是请求示例', '我是调用效果', NULL, '1585226244', ''),
(10, '测试', '测试', '测试', '测试', '测试', '测试', NULL, '1585229302', '');

-- --------------------------------------------------------

--
-- 表的结构 `api_setup`
--

CREATE TABLE IF NOT EXISTS `api_setup` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `baidutongji` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `api_setup`
--

INSERT INTO `api_setup` (`id`, `title`, `description`, `keywords`, `baidutongji`) VALUES
(1, '小林API', 'cs ', 'tenapi,免费api,公益Api,随机动漫api,一言api测试测试', '123456测试测试');

-- --------------------------------------------------------

--
-- 表的结构 `api_user`
--

CREATE TABLE IF NOT EXISTS `api_user` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `regtime` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `api_user`
--

INSERT INTO `api_user` (`id`, `username`, `password`, `regtime`) VALUES
(1, '123456', '###10966c0db3c86d0f098001f2093627d7', '1585057184');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
