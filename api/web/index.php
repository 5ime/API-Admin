<?php
/**
 * 爱站权重获取
 */
include '../black.php';

header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
if(!$_GET['url']){error();}
// get过来的参数不能带有http(s)://
$url = $_GET['url'];
 
$html = httpGet("https://www.aizhan.com/seo/".$url."/");
 
preg_match_all('<img src="(.*)" alt="(.*)">',$html,$aizhan);
 
$baidupc = $aizhan[2][1] ? $aizhan[2][1] : '0';
$baidum  = $aizhan[2][2] ? $aizhan[2][2] : '0';
$sougou  = $aizhan[2][3] ? $aizhan[2][3] : '0';
$google  = $aizhan[2][4] ? $aizhan[2][4] : '0';
 
if($_GET['type']=='json'){
	echo json_encode(array('state'=>'200','host'=>$url,'data'=>array('baidupc'=>$baidupc,'baidum'=>$baidum,'sougou'=>$sougou,'google'=>$google)));
}else{
  if($_GET['type']=='baidupc'){
  	header('Location:'.$aizhan[1][1]);
  }elseif($_GET['type']=='baidum'){
  	header('Location:'.$aizhan[1][2]);
  }elseif($_GET['type']=='sougou'){
  	header('Location:'.$aizhan[1][3]);
  }elseif($_GET['type']=='google'){
  	header('Location:'.$aizhan[1][4]);
  }else{
  	header('Location:'.$aizhan[1][1]);
  }
}
 
/**
 * error
 * @return json 返回error
 */
function error(){
  $arr=array('url'=>'error');
  echoJson(json_encode($arr));
  exit();
}
/**
 * curl模拟get请求
 * @param  string $a url
 * @param  string $b post参数
 * @param  string $c 模拟来路
 * @param  string $d 模拟cookie
 * @return string    返回网站源码
 */
function httpGet($a, $b = '', $c = '', $d = ''){
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