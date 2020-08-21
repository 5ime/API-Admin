<?php
/**
* Name:火山短视频
*/
header('Access-Control-Allow-Origin:*');
header('Content-Type:text/json;charset=utf8');
//请求
$url = @$_GET['url'];
if ($url != null) {
//获取301跳转真实地址	
$loc = get_headers($url, true)["Location"];
//var_dump($loc);
// 截取ID
function GetBetween($content,$start,$end) {
$r = explode($start, $content);
if (isset($r[1])) {
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}

//一次获取ID
$b = '?item_id=';
$c = '&tag=0';
$id = GetBetween($loc,$b,$c);
$json = myCurl('https://share.huoshan.com/api/item/info?item_id='.$id);
$Array = json_decode($json,true);
$video = $Array["data"]["item_info"]["url"];
$image = $Array["data"]["item_info"]["cover"];

//二次获取ID
$d = '?video_id=';
$e = '&line=0';
$video_id = GetBetween($video,$d,$e);
$videourl = myCurl('https://api-hl.huoshan.com/hotsoon/item/video/_playback/?video_id='.$video_id);
$d = 'href="';
$e = '">';
$vip = GetBetween($videourl,$d,$e);
//状态码判断
if($vip==""){
        $status = 202;
}else{
        $status= 200;
}
//数组
$api = array('code'=>$status,'url'=>$vip,'cover'=>$image);
//数组输出
echo json_encode($api,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);

} else
{
echo '请输入火山小视频分享的地址，如：https://share.huoshan.com/hotsoon/s/yBw4TLa7O88/';
}
//curl模拟get请求
function myCurl($one, $two = '', $three = ''){
        $ch = curl_init();
        $ip = mt_rand(11, 191) . "." . mt_rand(0, 240) . "." . mt_rand(1, 240) . "." . mt_rand(1, 240);
        $UserAgent='User-agent:Mozilla/5.0 (Windows NT 6.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.57 Safari/536.11';
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip));  //构造IP
        curl_setopt($ch, CURLOPT_USERAGENT, $UserAgent); // UA
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30); // 超时时间：30s
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        if (!empty($three)) {
                curl_setopt($ch, CURLOPT_REFERER, $three);
        }
        if (!empty($two)) {
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $two);
        }
        curl_setopt($ch, CURLOPT_URL, $one);
        curl_setopt($ch, CURLOPT_ENCODING, "gzip");
        $content = curl_exec($ch);
        curl_close($ch);
        return $content;
}
?>