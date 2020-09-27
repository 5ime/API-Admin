<?php
$url = @$_GET['url'];
if ($url != null) {
$loc = get_headers($url, true)["location"];
$b = 'video/';
$c = '/?region';
$id = GetBetween($loc,$b,$c);

$arr = json_decode(curl('https://www.iesdouyin.com/web/api/v2/aweme/iteminfo/?item_ids='.$id), true);
//var_dump($arr);
preg_match('/href="(.*?)">Found/', curl(str_replace('playwm', 'play', $arr['item_list'][0]["video"]["play_addr"]["url_list"][0])), $matches);
$videourl = str_replace('&', '&', $matches[1]);
$Json = array(
    'title' => $arr['item_list'][0]["share_info"]["share_title"],
    'cover' => $arr['item_list'][0]['video']["origin_cover"]["url_list"][0],
    'url' => $videourl, 
);
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
}
else{
echo '请输入抖音分享的地址，如：https://v.douyin.com/m2mun2';
}
function GetBetween($content,$start,$end) {
    $r = explode($start, $content);
    if (isset($r[1])) {
    $r = explode($end, $r[1]);
    return $r[0];
    }
    return '';
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
