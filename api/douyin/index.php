<?php
header('Access-Control-Allow-Origin:*');
$url = $_GET['url'];
if ($url != null) {
$res = curl($url);
preg_match('/href="(.*?)">Found/', $res, $matches);
preg_match('/itemId: "(.*?)",/', curl(str_replace('&', '&', $matches[1])), $matches);
//var_dump($matches);
$arr = json_decode(curl('https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids='. $matches[1]), true);
preg_match('/href="(.*?)">Found/', curl(str_replace('playwm', 'play', $arr['item_list'][0]["video"]["play_addr"]["url_list"][0])), $matches);
$videourl = str_replace('&', '&', $matches[1]);
$Json = array(
	'title' => $arr['item_list'][0]["share_info"]["share_title"],
	'cover' => $arr['item_list'][0]['video']["cover"]["url_list"][0],
	'url' => $videourl, 
);
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
}
else{
echo '请输入抖音分享的地址，如：https://v.douyin.com/m2mun2';
}
function curl($url)
{
    $Header=array( "User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
    $con=curl_init((string)$url);
    curl_setopt($con,CURLOPT_HEADER,False);
    curl_setopt($con,CURLOPT_SSL_VERIFYPEER,False);
    curl_setopt($con,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($con,CURLOPT_HTTPHEADER,$Header);
    curl_setopt($con,CURLOPT_TIMEOUT,5000);
    $result = curl_exec($con);
    return $result;
}
?>
