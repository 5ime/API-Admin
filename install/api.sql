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
  `request` varchar(5000) NOT NULL,
  `demo` varchar(1000) NOT NULL,
  `democode` varchar(1000) DEFAULT NULL,
  `icon` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `api_info`
--

INSERT INTO `api_info` (`id`, `name`, `doc`, `miaoshu`, `url`, `request`, `demo`, `democode`, `icon`, `time`, `type`) VALUES
(1, '随机动漫图', 'img', '暂无', '/api/img/acg.php', 'https://tva1.sinaimg.cn/large/0072Vf1pgy1foxk76lzl8j31hc0u0dxk.jpg', '<img class="mdui-img-rounded" src="https://tenapi.cn/img/acg.php" style=" width: 250px;">', '&lt;img src=&quot;https://tenapi.cn/img/acg.php&quot; &gt;', 'dvr', '1586788427', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>json</code></td>\r\n<td>可选</td><td>json/http/https/img</td>\r\n<td>即返回内容</td>\r\n</tr></tbody></table>'),
(2, '抖音无水印', 'douyin', '暂无', '/api/douyin', '暂无', '移步：https://lab.5ime.cn/video/douyin 查看', '暂无', 'dvr', '1586788664', '\r\n[========]\r\n<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>url</code></td>\r\n<td>必选</td><td>	url</td>\r\n<td>需要解析的视频地址</td>\r\n</tr></tbody></table>'),
(3, 'ICO站标获取', 'ico', '暂无', '/api/ico', 'https://tenapi.cn/ico/?url=www.baidu.com', '<img src="https://tenapi.cn/ico/?url=www.baidu.com" >\r\n', '&lt;img src=&quot;https://tenapi.cn/ico/?url=www.baidu.com&quot; &gt;', 'dvr', '1586788763', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要获取ico的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(4, '网站ICP备案', 'icp', '暂无', '/api/icp', '{&quot;code&quot;:&quot;200&quot;,&quot;主办单位名称&quot;:&quot;测试&quot;,&quot;主办单位性质&quot;:&quot;个人&quot;,&quot;网站备案/许可证号&quot;:&quot;冀ICP备15023052号-8&quot;,&quot;网站名称&quot;:&quot;妖帝网&quot;,&quot;网站首页网址&quot;:&quot;www.hac.pw&quot;,&quot;审核时间&quot;:&quot;2019/9/20 7:39:55&quot;}', '暂无', '暂无', 'dvr', '1586788967', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要获取ico的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(6, '历史上的今天', 'lishi', '暂无', '/api/lishi', '罗马教皇英诺森三世去世', '暂无', '暂无', 'dvr', '1586789025', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>format</code></td>\r\n              <td>可选</td>\r\n              <td>json</td>\r\n              <td>获取全部历史上的今天</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(7, 'QQ头像获取', 'qqimg', '暂无', '/api/qqimg', 'https://q2.qlogo.cn/headimg_dl?bs=123456&dst_uin=123456&dst_uin=123456&;dst_uin=123456&spec=100&url_enc=0&referer=bu_interface&term_type=PC', '<img src="https://tenapi.cn/qqimg?qq=123456" >\r\n', '&lt;img src=&quot;https://tenapi.cn/qqimg?qq=123456&quot; &gt;', 'dvr', '1586789067', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qq</code></td>\r\n              <td>必填</td>\r\n              <td>qq</td>\r\n              <td>即需要查询的qq </td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>'),
(8, 'QQ在线状态', 'qqzx', '暂无', '/api/qqzx', '{"code":"21","msg":"电脑在线"}', '暂无', '暂无', 'dvr', '1586789103', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qq</code></td>\r\n              <td>必填</td>\r\n              <td>qq</td>\r\n              <td>即需要查询的qq</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(9, 'QQ一键加群', 'qun', '暂无', '/api/qun', '{ &quot;code&quot;: 200, &quot;data&quot;: { &quot;uid&quot;: 1005048364, &quot;idkey&quot;: &quot;89f1172d4f14799f55de984aaa4055b73f9f67b1ddbda2555d276b74ba84bbcb&quot;, &quot;url&quot;: &quot;http://wp.qq.com/wpa/qunwpa?idkey=89f1172d4f14799f55de984aaa4055b73f9f67b1ddbda2555d276b74ba84bbcb&quot; } }', '<a href="https://tenapi.cn/qun?qun=484395502" >点击加群 </a>\r\n', '&lt;a href=&quot;https://tenapi.cn/qun?qun=484395502&quot; &gt;点击加群 &lt;/a&gt;', 'dvr', '1586789167', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qun</code></td>\r\n              <td>必填</td>\r\n              <td>qun</td>\r\n              <td>即需要添加的群号</td>\r\n            </tr>\r\n            <tr>\r\n              <td><code>type</code></td>\r\n              <td>可选</td>\r\n              <td>301</td>\r\n              <td>即直接跳转</td>\r\n            </tr>\r\n          </tbody>\r\n        </table>'),
(10, '服务器信息', 'serverinfo', '暂无', '/api/serverinfo', '{&quot;msg&quot;:&quot;ok&quot;,&quot;host&quot;:&quot;www.baidu.com&quot;,&quot;ip&quot;:&quot;180.101.49.11&quot;,&quot;position&quot;:&quot;\\u6c5f\\u82cf\\u7701\\u5bbf\\u8fc1\\u5e02 \\u7535\\u4fe1&quot;}', '暂无', '暂无', 'dvr', '1586789260', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即你所需要查询的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(11, '网站标题获取', 'title', '暂无', '/api/title', '{&quot;code&quot;:&quot;200&quot;,&quot;title&quot;:&quot;Ten▪Api - Tenapi.cn&quot;}', '暂无', '暂无', 'dvr', '1586789292', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要查询的网址 </td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>'),
(12, '爱站权重获取', 'web', '暂无', '/api/web', 'https://statics.aizhan.com/images/br/10.png', '<img src="https://tenapi.cn/web/?url=www.baidu.com" >\r\n', '&lt;img src=&quot;https://tenapi.cn/web/?url=www.baidu.com&quot; &gt;', 'dvr', '1586789384', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必选</td>\r\n              <td>url</td>\r\n              <td>即需要查询权重的网址</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>'),
(13, '城市天气获取', 'wether', '暂无', '/api/wether', '{&quot;data&quot;:{&quot;yesterday&quot;:{&quot;date&quot;:&quot;27日星期六&quot;,&quot;high&quot;:&quot;高温 36℃&quot;,&quot;fx&quot;:&quot;南风&quot;,&quot;low&quot;:&quot;低温 27℃&quot;,&quot;fl&quot;:&quot;&quot;,&quot;type&quot;:&quot;多云&quot;},&quot;city&quot;:&quot;北京&quot;,&quot;forecast&quot;:[{&quot;date&quot;:&quot;28日星期天&quot;,&quot;high&quot;:&quot;高温 35℃&quot;,&quot;fengli&quot;:&quot;&quot;,&quot;low&quot;:&quot;低温 26℃&quot;,&quot;fengxiang&quot;:&quot;南风&quot;,&quot;type&quot;:&quot;多云&quot;},{&quot;date&quot;:&quot;29日星期一&quot;,&quot;high&quot;:&quot;高温 27℃&quot;,&quot;fengli&quot;:&quot;&quot;,&quot;low&quot;:&quot;低温 23℃&quot;,&quot;fengxiang&quot;:&quot;南风&quot;,&quot;type&quot;:&quot;中雨&quot;},{&quot;date&quot;:&quot;30日星期二&quot;,&quot;high&quot;:&quot;高温 34℃&quot;,&quot;fengli&quot;:&quot;&quot;,&quot;low&quot;:&quot;低温 24℃&quot;,&quot;fengxiang&quot;:&quot;西南风&quot;,&quot;type&quot;:&quot;多云&quot;},{&quot;date&quot;:&quot;31日星期三&quot;,&quot;high&quot;:&quot;高温 35℃&quot;,&quot;fengli&quot;:&quot;&quot;,&quot;low&quot;:&quot;低温 23℃&quot;,&quot;fengxiang&quot;:&quot;北风&quot;,&quot;type&quot;:&quot;多云&quot;},{&quot;date&quot;:&quot;1日星期四&quot;,&quot;high&quot;:&quot;高温 34℃&quot;,&quot;fengli&quot;:&quot;&quot;,&quot;low&quot;:&quot;低温 24℃&quot;,&quot;fengxiang&quot;:&quot;北风&quot;,&quot;type&quot;:&quot;晴&quot;}],&quot;ganmao&quot;:&quot;相对今天出现了较大幅度降温，较易发生感冒，体质较弱的朋友请注意适当防护。&quot;,&quot;wendu&quot;:&quot;25&quot;},&quot;status&quot;:1000,&quot;desc&quot;:&quot;OK&quot;}', '暂无', '暂无', 'dvr', '1586789410', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>city</code></td>\r\n              <td>必填</td>\r\n              <td>city</td>\r\n              <td>即需要查询天气的城市名称</td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>'),
(14, '随机一言', 'yiyan', '暂无', '/api/yiyan', 'request', '暂无', '暂无', 'dvr', '1586789454', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>暂无</code></td>\r\n              <td>暂无</td>\r\n              <td>暂无</td>\r\n              <td>暂无</td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>');

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
(1, 'admin', '###10966c0db3c86d0f098001f2093627d7', '1585057184');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
