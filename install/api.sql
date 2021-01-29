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

-- --------------------------------------------------------

--
-- 表的结构 `api_info`
--

CREATE TABLE IF NOT EXISTS `api_info` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `pid` int(255) DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `doc` varchar(255) NOT NULL,
  `miaoshu` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `request` varchar(5000) CHARACTER SET utf8mb4 NOT NULL,
  `demo` varchar(255) NOT NULL,
  `democode` varchar(1000) DEFAULT NULL,
  `icon` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `type` varchar(1000) NOT NULL,
  `sort` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1017 ;

--
-- 转存表中的数据 `api_info`
--

INSERT INTO `api_info` (`id`, `pid`, `name`, `doc`, `miaoshu`, `url`, `request`, `demo`, `democode`, `icon`, `time`, `type`, `sort`) VALUES
(1, 0, '随机动漫图', 'img', '暂无', 'api/img/acg.php', 'https://tva1.sinaimg.cn/large/0072Vf1pgy1foxk76lzl8j31hc0u0dxk.jpg', '<img class="mdui-img-rounded" src="https://tenapi.cn/img/acg.php" style=" width: 250px;">', '&lt;img src=&quot;https://tenapi.cn/img/acg.php&quot; &gt;', 'photo_size_select_actual', '1587613901', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>json</code></td>\r\n<td>可选</td><td>json/http/https/img</td>\r\n<td>即返回内容</td>\r\n</tr></tbody></table>', 0),
(2, 0, '抖音无水印', 'douyin', '暂无', 'api/douyin', '暂无', '移步：https://lab.5ime.cn/video/douyin 查看', '暂无', 'fiber_dvr', '1611911056', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>url</code></td>\r\n<td>必选</td><td>	url</td>\r\n<td>需要解析的视频地址</td>\r\n</tr></tbody></table>', 0),
(3, 0, 'ICO站标获取', 'ico', '暂无', 'api/ico', 'https://tenapi.cn/ico/?url=www.baidu.com', '<img src="https://tenapi.cn/ico/?url=www.baidu.com" >\r\n', '&lt;img src=&quot;https://tenapi.cn/ico/?url=www.baidu.com&quot; &gt;', 'desktop_mac', '1611917993', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要获取ico的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(4, 0, '网站ICP备案', 'icp', '暂无', 'api/icp', '{   &quot;code&quot;: 200,   &quot;data&quot;: {     &quot;name&quot;: &quot;北京百度网讯科技有限公司&quot;,     &quot;nature&quot;: &quot;企业&quot;,     &quot;icp&quot;: &quot;京ICP证030173号-1&quot;,     &quot;sitename&quot;: &quot;百度&quot;,     &quot;index&quot;: &quot;baidu.com&quot;,     &quot;time&quot;: &quot;2020-08-05&quot;   } }', '暂无', '暂无', 'desktop_mac', '1611917981', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要查询的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(6, 0, '历史上的今天', 'lishi', '暂无', 'api/lishi', '罗马教皇英诺森三世去世', '暂无', '暂无', 'schedule', '1611918033', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>format</code></td>\r\n              <td>可选</td>\r\n              <td>json</td>\r\n              <td>获取全部历史上的今天</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(7, 23, 'QQ头像获取', 'qqimg', '暂无', 'api/qqimg', 'https://q2.qlogo.cn/headimg_dl?bs=123456&amp;dst_uin=123456&amp;dst_uin=123456&amp;;dst_uin=123456&amp;spec=100&amp;url_enc=0&amp;referer=bu_interface&amp;term_type=PC', '<img src="https://tenapi.cn/qqimg?qq=123456" >\r\n', '&lt;img src=&quot;https://tenapi.cn/qqimg?qq=123456&quot; &gt;', 'camera', '1611918078', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qq</code></td>\r\n              <td>必填</td>\r\n              <td>qq</td>\r\n              <td>即需要查询的qq </td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>', 0),
(8, 23, 'QQ在线状态', 'qqzx', '暂无', 'api/qqzx', '{   &quot;code&quot;: 200,   &quot;msg&quot;: &quot;电脑在线&quot; }', '暂无', '暂无', 'camera', '1611918149', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qq</code></td>\r\n              <td>必填</td>\r\n              <td>qq</td>\r\n              <td>即需要查询的qq</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(9, 23, 'QQ一键加群', 'qun', '暂无', 'api/qun', '{   &quot;code&quot;: 200,   &quot;data&quot;: {     &quot;uid&quot;: 546609030,     &quot;idkey&quot;: &quot;a7363b3aa40544bbe4b9f4740cf1ec7b8de014470a76e63bae703c975f2d09b5&quot;,     &quot;url&quot;: &quot;http://wp.qq.com/wpa/qunwpa?idkey=a7363b3aa40544bbe4b9f4740cf1ec7b8de014470a76e63bae703c975f2d09b5&quot;   } }', '<a href="https://tenapi.cn/qun?qun=484395502" >点击加群 </a>\r\n', '&lt;a href=&quot;https://tenapi.cn/qun?qun=484395502&quot; &gt;点击加群 &lt;/a&gt;', 'camera', '1611918180', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>qun</code></td>\r\n              <td>必填</td>\r\n              <td>qun</td>\r\n              <td>即需要添加的群号</td>\r\n            </tr>\r\n            <tr>\r\n              <td><code>type</code></td>\r\n              <td>可选</td>\r\n              <td>301</td>\r\n              <td>即直接跳转</td>\r\n            </tr>\r\n          </tbody>\r\n        </table>', 0),
(10, 0, '服务器信息', 'serverinfo', '暂无', 'api/serverinfo', '{&quot;msg&quot;:&quot;ok&quot;,&quot;host&quot;:&quot;www.baidu.com&quot;,&quot;ip&quot;:&quot;180.101.49.11&quot;,&quot;position&quot;:&quot;\\u6c5f\\u82cf\\u7701\\u5bbf\\u8fc1\\u5e02 \\u7535\\u4fe1&quot;}', '暂无', '暂无', 'dvr', '1611918231', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即你所需要查询的网站</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(11, 0, '网站标题获取', 'title', '暂无', 'api/title', '{&quot;code&quot;:&quot;200&quot;,&quot;title&quot;:&quot;Ten▪Api - Tenapi.cn&quot;}', '暂无', '暂无', 'desktop_mac', '1611918321', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>即需要查询的网址 </td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>', 0),
(12, 0, '爱站权重获取', 'web', '暂无', 'api/web', 'https://statics.aizhan.com/images/br/10.png', '<img src="https://tenapi.cn/web/?url=www.baidu.com" >\r\n', '&lt;img src=&quot;https://tenapi.cn/web/?url=www.baidu.com&quot; &gt;', 'pets', '1611918349', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必选</td>\r\n              <td>url</td>\r\n              <td>即需要查询权重的网址</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>json</code></td>\r\n              <td>可选</td>\r\n              <td>json</td>\r\n              <td>输出所有权重</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(13, 0, '城市天气获取', 'wether', '暂无', 'api/wether', '{     &quot;data&quot;:{         &quot;yesterday&quot;:{             &quot;date&quot;:&quot;5日星期日&quot;,             &quot;high&quot;:&quot;高温 30℃&quot;,             &quot;fx&quot;:&quot;北风&quot;,             &quot;low&quot;:&quot;低温 23℃&quot;,             &quot;fl&quot;:&quot;&lt;![CDATA[2级]]&gt;&quot;,             &quot;type&quot;:&quot;雷阵雨&quot;         },         &quot;city&quot;:&quot;北京&quot;,         &quot;forecast&quot;:[             {                 &quot;date&quot;:&quot;6日星期一&quot;,                 &quot;high&quot;:&quot;高温 30℃&quot;,                 &quot;fengli&quot;:&quot;&lt;![CDATA[1级]]&gt;&quot;,                 &quot;low&quot;:&quot;低温 22℃&quot;,                 &quot;fengxiang&quot;:&quot;东风&quot;,                 &quot;type&quot;:&quot;多云&quot;             },             {                 &quot;date&quot;:&quot;7日星期二&quot;,                 &quot;high&quot;:&quot;高温 33℃&quot;,                 &quot;fengli&quot;:&quot;&lt;![CDATA[2级]]&gt;&quot;,                 &quot;low&quot;:&quot;低温 22℃&quot;,                 &quot;fengxiang&quot;:&quot;东风&quot;,                 &quot;type&quot;:&quot;多云&quot;             },             {                 &quot;date&quot;:&quot;8日星期三&quot;,                 &quot;high&quot;:&quot;高温 33℃&quot;,                 &quot;fengli&quot;:&quot;&lt;![CDATA[2级]]&gt;&quot;,                 &quot;low&quot;:&quot;低温 22℃&quot;,                 &quot;fengxiang&quot;:&quot;南风&quot;,                 &quot;type&quot;:&quot;多云&quot;             },             {                 &quot;date&quot;:&quot;9日星期四&quot;,                 &quot;high&quot;:&quot;高温 24℃&quot;,                 &quot;fengli&quot;:&quot;&lt;![CDATA[2级]]&gt;&quot;,                 &quot;low&quot;:&quot;低温 21℃&quot;,                 &quot;fengxiang&quot;:&quot;东南风&quot;,                 &quot;type&quot;:&quot;中雨&quot;             },             {                 &quot;date&quot;:&quot;10日星期五&quot;,                 &quot;high&quot;:&quot;高温 27℃&quot;,                 &quot;fengli&quot;:&quot;&lt;![CDATA[2级]]&gt;&quot;,                 &quot;low&quot;:&quot;低温 21℃&quot;,                 &quot;fengxiang&quot;:&quot;东南风&quot;,                 &quot;type&quot;:&quot;雷阵雨&quot;             }         ],         &quot;ganmao&quot;:&quot;感冒低发期，天气舒适，请注意多吃蔬菜水果，多喝水哦。&quot;,         &quot;wendu&quot;:&quot;23&quot;     },     &quot;status&quot;:1000,     &quot;desc&quot;:&quot;OK&quot; }', '暂无', '暂无', 'brightness_7', '1611918469', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>city</code></td>\r\n              <td>必填</td>\r\n              <td>city</td>\r\n              <td>即需要查询天气的城市名称</td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>', 0),
(14, 0, '随机一言', 'yiyan', '暂无', 'api/yiyan', 'document.write(''桑丘，让他们管我叫疯子吧，我还疯得不够，所以得不到他们的赞许。'');', '<script src="https://tenapi.cn/yiyan/?format=js"></script>\r\n', '&lt;script src=&quot;https://tenapi.cn/yiyan/?format=js&quot;&gt;&lt;/script&gt;', 'border_color', '1611918528', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>format</code></td>\r\n              <td>可选</td>\r\n              <td>js</td>\r\n              <td>返回document.write的脚本</td>\r\n            </tr>\r\n            <tr>\r\n              <td><code>format</code></td>\r\n              <td>可选</td>\r\n              <td>text</td>\r\n              <td>返回text格式(默认)</td>\r\n            </tr>\r\n            <tr>\r\n              <td><code>format</code></td>\r\n              <td>可选</td>\r\n              <td>json</td>\r\n              <td>返回json格式</td>\r\n            </tr>\r\n           \r\n          </tbody>\r\n        </table>', 0),
(15, 0, '皮皮虾无水印', 'ppx', '暂无', 'api/ppx', '{ &quot;status&quot;: &quot;1&quot;, &quot;name&quot;: &quot;标题交给你们了。&quot;, &quot;cover&quot;: &quot;https://p3-dy.byteimg.com/img/mosaic-legacy/2ab8400068ec7576befea~tplv-ppx-logo.jpeg&quot;, &quot;url&quot;: &quot;http://v3-ppx.ixigua.com/5cad973a87eee3368ce990b8f649a278/5d7bb1f9/video/m/2209830d419f99448b880185ff2034eebfc1162ecd7800000b720794d2de/?a=1319&amp;br=347&amp;cr=0&amp;cs=0&amp;dr=3&amp;ds=1&amp;er=&amp;l=2019091322124401001106103039764&amp;lr=&amp;rc=anl4PGd0bDl4bjMzZGYzM0ApZGk1NTRpNjs5N2k4NDxnZGctYGsucWdjNDVfLS0yMS9zczMxLV82XjA0NDA0XzMuY2I6Yw%3D%3D&quot; }', '移步: https://lab.5ime.cn/video/ 查看', '暂无', 'fiber_dvr', '1611918575', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>url</code></td>\r\n              <td>必填</td>\r\n              <td>url</td>\r\n              <td>需要解析的视频地址</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(16, 0, '每日Bing美图 ', 'bing', '暂无', 'api/bing', 'https://tenapi.cn/bing', '<img src="https://tenapi.cn/bing" >', '&lt;img src=&quot;https://tenapi.cn/bing&quot; &gt;', 'filter', '1611918690', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>暂无</code></td>\r\n              <td>暂无</td>\r\n              <td>暂无</td>\r\n              <td>暂无</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(18, 0, '垃圾分类查询', 'laji', '暂无', 'api/laji', '{&quot;code&quot;:1,&quot;msg&quot;:&quot;查询成功！&quot;,&quot;data&quot;:&quot;可回收垃圾&quot;}', '暂无', '暂无', 'delete', '1611918740', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>keyword</code></td>\r\n              <td>必填</td>\r\n              <td>keyword</td>\r\n              <td>即你所需要查询的垃圾</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(19, 0, '手机号归属地', 'tel', '暂无', 'api/tel', '{ &quot;code&quot;: 200, &quot;tel&quot;: &quot;18888888888&quot;, &quot;local&quot;: &quot;归属地：北京市&quot;, &quot;duan&quot;: &quot;号码段：1888888&quot;, &quot;type&quot;: &quot;卡类型：北京移动TD-SCDMA卡 (3G)&quot;, &quot;yys&quot;: &quot;运营商：中国移动&quot;, &quot;bz&quot;: &quot;通信标准：TD-SCDMA (时分同步码分多址)&quot; }', '暂无', '暂无', 'call', '1611918767', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>tel</code></td>\r\n              <td>必选</td>\r\n              <td>tel</td>\r\n              <td>即需要查询的手机号</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(20, 0, '申通快递查询', 'st', '暂无', 'api/st', '涉及隐私返回数据暂不放出 请自行调用查看', '涉及隐私返回数据暂不放出 请自行调用查看\r\n', '暂无', 'domain', '1611918830', '<table class="mdui-table">\r\n          <thead>\r\n            <tr>\r\n              <th>参数名称</th>\r\n              <th>类型</th>\r\n              <th>参数值</th>\r\n              <th>描述</th>\r\n            </tr>\r\n          </thead>\r\n          <tbody>\r\n            <tr>\r\n              <td><code>num</code></td>\r\n              <td>必填</td>\r\n              <td>num</td>\r\n              <td>即你所需要查询的订单号</td>\r\n            </tr>\r\n\r\n          </tbody>\r\n        </table>', 0),
(5, 0, 'IP签名档', 'ipinfo', '暂无', 'api/ipinfo', '暂无', '<img src="https://tenapi.cn/ipinfo" >\r\n', '&lt;img src=&quot;https://tenapi.cn/ipinfo&quot; &gt;', 'location_on', '1611826580', '<table class="mdui-table"><thead><tr>\r\n<th>参数名称</th><th>类型</th><th>参数值</th><th>描述</th></tr></thead><tbody><tr>\r\n<td><code>暂无</code></td>\r\n<td>暂无</td><td>暂无</td>\r\n<td>暂无</td>\r\n</tr></tbody></table>', 0),
(23, 0, 'QQ类', '', '', '', '', '', NULL, 'camera', '1611913342', '', 1);

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
  `code` varchar(255) NOT NULL,
  `counts` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `api_setup`
--

INSERT INTO `api_setup` (`id`, `title`, `url`, `description`, `keywords`, `baidutongji`, `code`, `counts`) VALUES
(1, '公益API', 'http://api.cn/', '免费提供API服务', '免费提供API服务', 'd3b3b1b968a56124689d1366adeacf8f', '', 212);

-- --------------------------------------------------------

--
-- 表的结构 `api_user`
--

CREATE TABLE IF NOT EXISTS `api_user` (
  `id` int(255) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `time` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `api_user`
--

INSERT INTO `api_user` (`id`, `username`, `password`, `time`) VALUES
(1, 'admin', '###10966c0db3c86d0f098001f2093627d7', 1585057184);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
