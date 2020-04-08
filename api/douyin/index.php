<?php
header("Access-Control-Allow-Origin: *");
header('Content-Type:text/json;charset=utf8');
if(!array_key_exists('url',$_REQUEST) || !$_REQUEST['url']){
	return;
}
$url = @$_REQUEST['url'];
if (!strstr($url,"douyin.com")) {
	die("请输入抖音分享的地址，如：http://v.douyin.com/acM2kP/");
}
preg_match("/https:\/\/v.douyin.com\/\S+/",$url,$res);
 
function curl($url, $header, $getinfo=false)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_NOBODY, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3600);
    curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_ANY);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_ENCODING, '');
	curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
	if($getinfo){
		curl_exec($ch);
		$data = curl_getinfo($ch,CURLINFO_EFFECTIVE_URL);
	}else{
		$data = curl_exec($ch);
	}
    curl_close($ch);
    return $data;
}
 
$header = [
	'User-Agent:Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1',
 
];
 
if (!empty(strpos($url,"douyin"))) {
$content = curl($res[0],$header);
preg_match_all("/itemId: \"([0-9]+)\"|dytk: \"(.*)\"/", $content, $res, PREG_SET_ORDER);
 
if(!$res[0][1] || !$res[1][2]){
	die("获取异常,请检查链接是否正确或视频是否已删除");
}
$itemId = $res[0][1];
$dytk = $res[1][2];
 
$api = "https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids={$itemId}&dytk={$dytk}";
 
$json = curl($api, $header);
 
$arr = json_decode($json);
 
$videoinfo = $arr->item_list[0]->video;
 
$videourl = curl($videoinfo->play_addr->url_list[0], $header, true);
 
$data = [
	'title'    => $arr->item_list[0]->desc,
	'cover'      => $videoinfo->cover->url_list[0],
	'url' => $videourl, 
];
}
echo json_encode($data,500);