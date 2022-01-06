<?php
include '../black.php';

$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);

header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
$content = "0.杀了个用户祭天<br>
1.升级版本号1.4>>2.0<br>
2.修复样式错误问题<br>
3.重写前端部分页面<br>
4.重构全部后端代码<br>
5.新增发布文章功能<br>
6.新增接口TOP10功能<br>
7.新增登录成功告警功能<br>
8.新增Referer和IP黑名单<br>
9.新增自定义CSS和Js功能<br>
10.后端页面改为Ajax实时渲染<br>
11.修复高并发下统计重置问题<br>
NaN.想起来在写...
";

$Json = array(
    'code' => 200,
    'version' => 1.2,
    'content' => urlencode($content),
    'download' => 'https://github.com/5ime/adpi-admin'
 );
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
