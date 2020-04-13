<?php
header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
$res = @$_GET['url'];
if(strstr($res,"."))
{
$json = file_get_contents('http://icp.chinaz.com/'.$res); //调用的站长工具
function GetBetween($content,$start,$end){
$r = explode($start, $content);
if (isset($r[1])){
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
// 获取主办单位名称
$b ='主办单位名称</span><p>';
$c ='<';
$name = GetBetween($json,$b,$c);
// 获取性质
$b ='主办单位性质</span><p><strong class="fl fwnone">';
$c ='<';
$nature = GetBetween($json,$b,$c);
// 获取备案号
$b ='网站备案/许可证号</span><p><font>';
$c ='<';
$icp = GetBetween($json,$b,$c);
// 获取网站名称
$b ='网站名称</span><p>';
$c ='<';
$sitename = GetBetween($json,$b,$c);
// 获取网站首页地址
$b ='网站首页网址</span><p class="Wzno">';
$c ='<';
$index = GetBetween($json,$b,$c);
if(strstr($index,"."))
{ }else{
echo '{"code":201,"msg":"未有此域名ICP备案记录!"}';
exit();
}
// 获取审核时间
$b ='审核时间</span><p>';
$c ='<';
$time = GetBetween($json,$b,$c);
echo '{"code":"200","主办单位名称":"'. $name.'","主办单位性质":"'. $nature.'","网站备案/许可证号":"'. $icp.'","网站名称":"'. $sitename.'","网站首页网址":"'. $index.'","审核时间":"'. $time.'"}
';
}else{
echo '{"code":202,"msg":"域名不能为空!"}';
// echo "内容不为空";
// return false;
exit();
}
?>