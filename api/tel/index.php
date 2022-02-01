<?php
include '../black.php';

header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
error_reporting(0);

if(isset($_GET['tel'])&&is_numeric($_GET['tel'])){
	$tel = $_GET['tel'];
}else{
	echo json_encode(array('code'=>'201','msg'=>'不是正确的手机号'));
	exit();
}
/*获取接口数据*/
$string = httpGet('https://shouji.supfree.net/fish.asp?cat='.$tel);
/*编码转换*/
$string = mb_convert_encoding($string,'utf-8', 'gbk');
/*正则查找*/
preg_match_all('/<p>(.*)<\/p>/',$string,$str);

$local = strip_tags($str[1][0]);
$duan = strip_tags($str[1][1]);
$type = strip_tags($str[1][2]);
$yys = strip_tags($str[1][3]);
$bz = strip_tags($str[1][5]);

if($local!=''){
	echo json_encode(array('code'=>'200','tel'=>$tel,'local'=>$local,'duan'=>$duan,'type'=>$type,'yys'=>$yys,'bz'=>$bz));
}else{
	echo json_encode(array('code'=>'202','msg'=>'该手机号无数据'));
	exit();
}

function httpGet($a, $b = '', $c = '', $d = ''){
	/*curl模拟get请求*/
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