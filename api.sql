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
-- 数据库: `sanyue`
--

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
  `request` varchar(1000) NOT NULL,
  `demo` varchar(1000) NOT NULL,
  `democode` varchar(1000) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `api_info`
--

INSERT INTO `api_info` (`id`, `name`, `doc`, `miaoshu`, `url`, `request`, `demo`, `democode`, `icon`, `time`, `type`) VALUES
(1, '随机动漫图', 'img', '萝莉二次元什么的最好了', '/api/img/acg.php', '{     "code":"200" #图片状态码     "acgurl":"https:\\/\\/ws1.sinaimg.cn\\/large\\/0072Vf1pgy1foxkfy08umj31kw0w0nng.jpg" #图片地址     "width":"2048" #图片宽     "height":"1152" #图片高 }', '<img  src="https://tenapi.cn/img/acg.php" style=" width: 250px;">', '&lt;img src=&quot;https://tenapi.cn/img/acg.php&quot; style=&quot; width: 250px;&quot;&gt;', 'dvr', '1585812403', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>json</code></td>\r\n<td>可选</td><td>json/http/https/img</td>\r\n<td>即返回内容</td>\r\n</tr></tbody></table>');

-- --------------------------------------------------------

--
-- 表的结构 `api_setup`
--

CREATE TABLE IF NOT EXISTS `api_setup` (
  `id` int(100) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `url` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `keywords` varchar(100) NOT NULL,
  `baidutongji` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `api_setup`
--

INSERT INTO `api_setup` (`id`, `title`, `url`, `description`, `keywords`, `baidutongji`) VALUES
(1, 'API', 'http://api.cn/', 'cs ', '免费api,公益Api,随机动漫api,一言api', 'd3b3b1b968a56124689d1366adeacf8f');

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
