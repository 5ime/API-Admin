<?php
/*
Plugin Name:搜索引擎收录量
Author:iami233
Author URL:https://5ime.cn
*/

header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
error_reporting(0);
!empty($_GET['url']) ? $_GET['url'] : exit(json_encode(array(
    "msg"=>"请输入网址！"
)));
$baidu = BD_curl("https://tool.chinaz.com/baidu/?wd=".$_GET['url']);
preg_match_all("/<span class=\"col-blue02\"><a (.*?)>(.*?)<\/a><\/span>/ism", $baidu, $baidusite);
$haoso = BD_curl("https://m.so.com/s?q=site%3A".$_GET['url']);
preg_match_all('/找到相关结果<strong>(.*?)<\/strong>个/', $haoso, $haososite);
$sogou = BD_curl("https://wap.sogou.com/web/searchList.jsp?keyword=site%3A".$_GET['url']);
preg_match_all('/找到约(.*?)条结果/', $sogou, $sogousite);

$Json = array(
            "code" => 200,
            "data" => array(
            	"url" => $_GET['url'],
                "baidu" => $baidusite[2][0],
                "haoso" => $haososite[1][0],
                "sogou" => $sogousite[1][0],
            )
        );
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
function BD_curl($url, $post=0, $referer=0, $cookie=0, $header=0, $ua=0, $nobaody=0){
	$ch = curl_init();
	$ip = rand(0,255).'.'.rand(0,255).'.'.rand(0,255).'.'.rand(0,255) ;
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	//$httpheader[] = "Host: www.baidu.com";
	//$httpheader[] = "Connection: keep-alive";
	//$httpheader[] = "Upgrade-Insecure-Requests: 1";
	//$httpheader[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.87 Safari/537.36";
	$httpheader[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8";
	$httpheader[] = "Accept-Encoding: gzip, deflate, sdch, br";
	$httpheader[] = "Accept-Language: zh-CN,zh;q=0.8";
	//$httpheader[] = 'X-FORWARDED-FOR:'.$ip;
	//$httpheader[] = 'CLIENT-IP:'.$ip;
	curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
	if ($post) {
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	if ($header) {
		curl_setopt($ch, CURLOPT_HEADER, true);
	}
	if ($cookie) {
		curl_setopt($ch, CURLOPT_COOKIE, $cookie);
	}
	if($referer){
		if($referer==1){
			curl_setopt($ch, CURLOPT_REFERER, 'https://music.163.com/outchain/player?type=0&id=2250011882&auto=1');
		}else{
			curl_setopt($ch, CURLOPT_REFERER, $referer);
		}
	}
	if ($ua) {
		curl_setopt($ch, CURLOPT_USERAGENT, $ua);
	}
	else {
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 9_1 like Mac OS X) AppleWebKit/601.1.46 (KHTML, like Gecko) Version/9.0 Mobile/13B143 Safari/601.1");
	}
	if ($nobaody) {
		curl_setopt($ch, CURLOPT_NOBODY, 1);
	}
	curl_setopt($ch, CURLOPT_TIMEOUT, 3);
	curl_setopt($ch, CURLOPT_ENCODING, "gzip");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$ret = curl_exec($ch);
	//$Headers = curl_getinfo($ch);
	curl_close($ch);
	return $ret;
}