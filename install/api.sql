-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 
-- 服务器版本: 5.5.53
-- PHP 版本: 7.2.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `api`
--

-- --------------------------------------------------------

--
-- 表的结构 `api_black`
--

CREATE TABLE IF NOT EXISTS `api_black` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `api_info`
--

CREATE TABLE IF NOT EXISTS `api_info` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `sort` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `demo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `count` int(11) NOT NULL,
  `info` text NOT NULL,
  `detail` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `api_info`
--

INSERT INTO `api_info` (`id`, `sort`, `name`, `type`, `desc`, `doc`, `path`, `request`, `demo`, `icon`, `time`, `count`, `info`, `detail`) VALUES
(1, 1, '服务器信息', 'GET', '', 'serverinfo', 'api/serverinfo', '', '', 'dvr', '1640776079', 0, '{"msg":"ok","host":"www.baidu.com","ip":"180.101.49.11","position":"\\u6c5f\\u82cf\\u7701\\u5bbf\\u8fc1\\u5e02 \\u7535\\u4fe1"}', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody>\n<tr><td><code>参数名</code></td>\n<td>可选</td><td>参数值</td>\n<td>填写说明</tr>\n</tbody></table>'),
(2, 1, '网站ICP备案', 'GET', '', 'icp', 'api/icp', '', '', 'desktop_mac', '1640775595', 0, '{\n  "code": 200,\n  "data": {\n    "name": "北京百度网讯科技有限公司",\n    "nature": "企业",\n    "icp": "京ICP证030173号-1",\n    "sitename": "百度",\n    "index": "baidu.com",\n    "time": "2020-08-05"\n  }\n}', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>url</code></td>\n              <td>必填</td>\n              <td>url</td>\n              <td>即需要查询的网站</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(3, 1, '抖音无水印', 'GET', '', 'douyin', 'api/douyin', '', '移步：https://lab.5ime.cn/video/douyin 查看', 'fiber_dvr', '1640775461', 0, '{\n  "code": 200,\n  "title": "大家把最近不开心的事都说出来，然后互相安慰、鼓励一下好吗????来吧~????",\n  "cover": "https://p3-dy.byteimg.com/img/tos-cn-p-0015/d7f8177f0d2a478c908c254a64a6129e~c5_300x400.jpeg?from=2563711402_large",\n  "music": "http://p1-dy.byteimg.com/obj/ies-music/1644934451995661.mp3",\n  "url": "http://v6-dy-y.ixigua.com/b94da13a838bb5e04eb58c340d27670a/5f033685/video/m/2209bd0c137bdfd4cf8abc5b4e7721f001f116386b7e00000f1907e9f8f8/?a=1128&br=1203&bt=401&cr=0&cs=0&dr=0&ds=6&er=&l=2020070621342501000806814200298435&lr=&mime_type=video_mp4&qs=0&rc=M293d3M7eHFpcDMzN2kzM0ApNWZmOzlmOzs8Nzo3M2Q5aGdxL15ucC1gXi1fLS1jLTBzcy0wMmJjNV5eLjJiNV5iNWE6Yw%3D%3D&vl=&vr="\n}', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\n<td><code>url</code></td>\n<td>必选</td><td>	url</td>\n<td>需要解析的视频地址</td>\n</tr></tbody></table>'),
(4, 3, 'QQ一键加群', 'GET', '', 'qun', 'api/qun', '', '<a href="https://tenapi.cn/qun?qun=484395502" >点击加群 </a>', 'camera', '1640776056', 0, '{   "code": 200,   "data": {     "uid": 546609030,     "idkey": "a7363b3aa40544bbe4b9f4740cf1ec7b8de014470a76e63bae703c975f2d09b5",     "url": "http://wp.qq.com/wpa/qunwpa?idkey=a7363b3aa40544bbe4b9f4740cf1ec7b8de014470a76e63bae703c975f2d09b5"   } }', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>qun</code></td>\n              <td>必填</td>\n              <td>qun</td>\n              <td>即需要添加的群号</td>\n            </tr>\n            <tr>\n              <td><code>type</code></td>\n              <td>可选</td>\n              <td>301</td>\n              <td>即直接跳转</td>\n            </tr>\n          </tbody>\n        </table>'),
(5, 3, 'QQ在线状态', 'GET', '', 'qqzx', 'api/qqzx', '', '', 'camera', '1640775989', 0, '{\n  "code": 200,\n  "msg": "电脑在线"\n}', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody>\n<tr><td><code>参数名</code></td>\n<td>可选</td><td>参数值</td>\n<td>填写说明</tr>\n</tbody></table>'),
(6, 3, 'QQ头像获取', 'GET', '', 'qqimg', 'api/qqimg', '', '<img src="https://tenapi.cn/qqimg?qq=123456" >', 'camera', '1640775938', 0, 'https://q2.qlogo.cn/headimg_dl?bs=123456&dst_uin=123456&dst_uin=123456&;dst_uin=123456&spec=100&url_enc=0&referer=bu_interface&term_type=PC', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>qq</code></td>\n              <td>必填</td>\n              <td>qq</td>\n              <td>即需要查询的qq </td>\n            </tr>\n          </tbody>\n        </table>'),
(7, 1, '历史上的今天', 'GET', '', 'lishi', 'api/lishi', '', '', 'schedule', '1640775910', 0, '罗马教皇英诺森三世去世', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>format</code></td>\n              <td>可选</td>\n              <td>json</td>\n              <td>获取全部历史上的今天</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(8, 1, 'IP签名档', 'GET', '', 'ipinfo', 'api/ipinfo', '', '<img src="https://tenapi.cn/ipinfo" >', 'location_on', '1640775881', 0, 'https://tenapi.cn/ipinfo', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\n<td><code>暂无</code></td>\n<td>暂无</td><td>暂无</td>\n<td>暂无</td>\n</tr></tbody></table>'),
(9, 1, 'ICO站标获', 'GET', '', 'ico', 'api/ico', '', '<img src="https://tenapi.cn/ico/?url=www.baidu.com" >', 'desktop_mac', '1640775496', 0, 'https://tenapi.cn/ico/?url=www.baidu.com', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>url</code></td>\n              <td>必填</td>\n              <td>url</td>\n              <td>即需要获取ico的网站</td>\n            </tr>\n          </tbody>\n        </table>'),
(10, 1, '随机动漫图', 'GET', '', 'img', 'api/img/acg.php', '', '<img src="https://tenapi.cn/img/acg.php" >', 'dvr', '1640775399', 0, 'https://tva1.sinaimg.cn/large/0072Vf1pgy1foxk76lzl8j31hc0u0dxk.jpg', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\n<td><code>json</code></td>\n<td>可选</td><td>json/http/https/img</td>\n<td>即返回内容</td>\n</tr></tbody></table>'),
(11, 1, '网站标题获取', 'GET', '', 'title', 'api/title', '', '', 'desktop_mac', '1640776107', 0, '{"code":"200","title":"Ten▪Api - Tenapi.cn"}', '<table class="mdui-table"><thead><tr>\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody>\n<tr><td><code>参数名</code></td>\n<td>可选</td><td>参数值</td>\n<td>填写说明</tr>\n</tbody></table>'),
(12, 1, '爱站权重获取', 'GET', '', 'web', 'api/web', '', '<img src="https://tenapi.cn/web/?url=www.baidu.com" >', 'pets', '1640776134', 0, 'https://statics.aizhan.com/images/br/10.png', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>url</code></td>\n              <td>必选</td>\n              <td>url</td>\n              <td>即需要查询权重的网址</td>\n            </tr>\n\n          </tbody>\n          <tbody>\n            <tr>\n              <td><code>json</code></td>\n              <td>可选</td>\n              <td>json</td>\n              <td>输出所有权重</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(13, 1, '城市天气获取', 'GET', '', 'wether', 'api/wether', '', '', 'brightness_7', '1640776159', 0, '{     "data":{         "yesterday":{             "date":"5日星期日",             "high":"高温 30℃",             "fx":"北风",             "low":"低温 23℃",             "fl":"<![CDATA[2级]]>",             "type":"雷阵雨"         },         "city":"北京",         "forecast":[             {                 "date":"6日星期一",                 "high":"高温 30℃",                 "fengli":"<![CDATA[1级]]>",                 "low":"低温 22℃",                 "fengxiang":"东风",                 "type":"多云"             },             {                 "date":"7日星期二",                 "high":"高温 33℃",                 "fengli":"<![CDATA[2级]]>",                 "low":"低温 22℃",                 "fengxiang":"东风",                 "type":"多云"             },             {                 "date":"8日星期三",                 "high":"高温 33℃",                 "fengli":"<![CDATA[2级]]>",                 "low":"低温 22℃",                 "fengxiang":"南风",                 "type":"多云"             },             {                 "date":"9日星期四",                 "high":"高温 24℃",                 "fengli":"<![CDATA[2级]]>",                 "low":"低温 21℃",                 "fengxiang":"东南风",                 "type":"中雨"             },             {                 "date":"10日星期五",                 "high":"高温 27℃",                 "fengli":"<![CDATA[2级]]>",                 "low":"低温 21℃",                 "fengxiang":"东南风",                 "type":"雷阵雨"             }         ],         "ganmao":"感冒低发期，天气舒适，请注意多吃蔬菜水果，多喝水哦。",         "wendu":"23"     },     "status":1000,     "desc":"OK" }', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>city</code></td>\n              <td>必填</td>\n              <td>city</td>\n              <td>即需要查询天气的城市名称</td>\n            </tr>\n           \n          </tbody>\n        </table>'),
(14, 1, '随机一言', 'GET', '', 'yiyan', 'api/yiyan', '', '<script src="https://tenapi.cn/yiyan/?format=js"></script>', 'border_color', '1640776185', 0, 'document.write(''桑丘，让他们管我叫疯子吧，我还疯得不够，所以得不到他们的赞许。'');', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>format</code></td>\n              <td>可选</td>\n              <td>js</td>\n              <td>返回document.write的脚本</td>\n            </tr>\n            <tr>\n              <td><code>format</code></td>\n              <td>可选</td>\n              <td>text</td>\n              <td>返回text格式(默认)</td>\n            </tr>\n            <tr>\n              <td><code>format</code></td>\n              <td>可选</td>\n              <td>json</td>\n              <td>返回json格式</td>\n            </tr>\n           \n          </tbody>\n        </table>'),
(15, 1, '皮皮虾无水印', 'GET', '', 'ppx', 'api/ppx', '', '移步: https://lab.5ime.cn/video/ 查看', 'fiber_dvr', '1640776207', 0, '{ "status": "1", "name": "标题交给你们了。", "cover": "https://p3-dy.byteimg.com/img/mosaic-legacy/2ab8400068ec7576befea~tplv-ppx-logo.jpeg", "url": "http://v3-ppx.ixigua.com/5cad973a87eee3368ce990b8f649a278/5d7bb1f9/video/m/2209830d419f99448b880185ff2034eebfc1162ecd7800000b720794d2de/?a=1319&br=347&cr=0&cs=0&dr=3&ds=1&er=&l=2019091322124401001106103039764&lr=&rc=anl4PGd0bDl4bjMzZGYzM0ApZGk1NTRpNjs5N2k4NDxnZGctYGsucWdjNDVfLS0yMS9zczMxLV82XjA0NDA0XzMuY2I6Yw%3D%3D" }', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>url</code></td>\n              <td>必填</td>\n              <td>url</td>\n              <td>需要解析的视频地址</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(16, 1, '每日Bing美', 'GET', '', 'bing', 'api/bing', '', '<img src="https://tenapi.cn/bing" >', 'dvr', '1640776223', 0, 'https://tenapi.cn/bing', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>暂无</code></td>\n              <td>暂无</td>\n              <td>暂无</td>\n              <td>暂无</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(17, 1, '垃圾分类查询', 'GET', '', 'laji', 'api/laji', '{"code":1,"msg":"查询成功！","data":"可回收垃圾"}', '', 'delete', '1640776241', 0, '', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>keyword</code></td>\n              <td>必填</td>\n              <td>keyword</td>\n              <td>即你所需要查询的垃圾</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(18, 1, '手机号归属地', 'GET', '', 'tel', 'api/tel', '', '', 'call', '1640776268', 0, '{ "code": 200, "tel": "18888888888", "local": "归属地：北京市", "duan": "号码段：1888888", "type": "卡类型：北京移动TD-SCDMA卡 (3G)", "yys": "运营商：中国移动", "bz": "通信标准：TD-SCDMA (时分同步码分多址)" }', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>tel</code></td>\n              <td>必选</td>\n              <td>tel</td>\n              <td>即需要查询的手机号</td>\n            </tr>\n\n          </tbody>\n        </table>'),
(19, 1, '申通快递查询', 'GET', '', 'st', 'api/st', '', '涉及隐私返回数据暂不放出 请自行调用查看', 'domain', '1640776292', 0, '涉及隐私返回数据暂不放出 请自行调用查看', '<table class="mdui-table">\n          <thead>\n            <tr>\n              <th>参数名称</th>\n              <th>类型</th>\n              <th>参数值</th>\n              <th>描述</th>\n            </tr>\n          </thead>\n          <tbody>\n            <tr>\n              <td><code>num</code></td>\n              <td>必填</td>\n              <td>num</td>\n              <td>即你所需要查询的订单号</td>\n            </tr>\n\n          </tbody>\n        </table>');

-- --------------------------------------------------------

--
-- 表的结构 `api_post`
--

CREATE TABLE IF NOT EXISTS `api_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sort` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `api_setup`
--

CREATE TABLE IF NOT EXISTS `api_setup` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `domain` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `desc` varchar(255) NOT NULL,
  `server` varchar(255) DEFAULT NULL,
  `baidu` varchar(255) DEFAULT NULL,
  `css` text,
  `js` text,
  `log` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `api_setup`
--

INSERT INTO `api_setup` (`id`, `title`, `domain`, `keywords`, `desc`, `server`, `baidu`, `css`, `js`, `log`) VALUES
(1, '公益API', 'http://tenapi.cn/', '免费提供API服务', '免费提供API服务', '', 'd3b3b1b968a56124689d1366adeacf8f', '', '', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `api_sort`
--

CREATE TABLE IF NOT EXISTS `api_sort` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `api_sort`
--

INSERT INTO `api_sort` (`id`, `name`, `icon`, `type`, `time`) VALUES
(1, '默认分类', 'crop_din', '0', '1639479976'),
(3, 'QQ类', 'dvr', '0', '1640775825'),
(2, '站点公告', 'dvr', '1', '1640776774');

-- --------------------------------------------------------

--
-- 表的结构 `api_user`
--

CREATE TABLE IF NOT EXISTS `api_user` (
  `uid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time` char(20) NOT NULL,
  PRIMARY KEY (`uid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `api_user`
--

INSERT INTO `api_user` (`uid`, `username`, `email`, `password`, `time`) VALUES
(1, 'admin', '123@qq.com', '###0918d318d77a701b5c3ad7aee135265c', '1639479976');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
