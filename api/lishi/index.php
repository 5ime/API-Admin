<?php
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
//允许跨域
header("Access-Control-Allow-Origin:*");

$month=date( 'm',time() );
$day=date( 'd',time() );
//当前年月日
$today = date('Y年m月d日');
//获取接口数据
$url="https://baike.baidu.com/cms/home/eventsOnHistory/".$month.'.json'; 
$data = httpGet($url);
$json = json_decode($data,true);
//统计当日总数
$countnum = count($json[$month][$month.$day])-1;
//获取输出数量(可以get调整)
$num = $_GET['num'] ? $_GET['num'] : $countnum;
$arr = array('code'=>'200','day'=>$today);
for ($x=0; $x<=$num; $x++) {
  $arr['content'][$x].= match_chinese(strip_tags($json[$month][$month.$day][$x]['title']));
}
//创建随机数
$rand = rand(0,$countnum);
//下面是输出类型
if($_GET['format']=='json'){
  //输出当日所有 类型为json
  header('Content-type: application/json');
  echo json_encode($arr,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
}elseif($_GET['format']=='js'){
  //以js类型输出一条
  header('Content-type: text/javascript;charset=utf-8'); 
  echo 'function briefing(){document.write("'.$arr['content'][$rand].'");}';
}else{
  //以html类型输出一条
  header("Content-Type: text/html;charset=utf-8"); 
  echo $arr['content'][$rand];
}


//下面是需要用到的封装

function httpGet($a, $b = '', $c = '', $d = ''){
//curl模拟get请求
  $e = curl_init();
  $f = mt_rand(11, 191) . "." . mt_rand(0, 240) . "." . mt_rand(1, 240) . "." . mt_rand(1, 240);
  $i[] = "CLIENT-IP:" . $f;
  $i[] = "X-FORWARDED-FOR:" . $f;
  $i[] = "User-agent:Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11";
  $i[] = "X-Requested-With: XMLHttpRequest";
  if (!empty($d)) {
    $i[] = "Cookie: " . $d;
  }
  curl_setopt($e, CURLOPT_HTTPHEADER, $i);
  curl_setopt($e, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($e, CURLOPT_TIMEOUT, 180);
  curl_setopt($e, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($e, CURLOPT_SSL_VERIFYHOST, false);
  if (!empty($c)) {
    curl_setopt($e, CURLOPT_REFERER, $c);
  }
  if (!empty($b)) {
    curl_setopt($e, CURLOPT_POST, 1);
    curl_setopt($e, CURLOPT_POSTFIELDS, $b);
  }
  curl_setopt($e, CURLOPT_URL, $a);
  curl_setopt($e, CURLOPT_ENCODING, "gzip");
  $j = curl_exec($e);
  curl_close($e);
  return $j;
}
function match_chinese($chars,$encoding='utf8')
{
//清除正则
  $pattern =($encoding=='utf8')?'/[\x{4e00}-\x{9fa5}a-zA-Z0-9]/u':'/[\x80-\xFF]/';
  preg_match_all($pattern,$chars,$result);
  $temp =join('',$result[0]);
  return $temp;
}