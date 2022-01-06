<?php
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
header("Access-Control-Allow-Origin: *");
$url = @$_GET['url'];
if (strstr($url,"pipix.com")) {
//获取301跳转真实地址	
function getrealurl($url){ $header = get_headers($url,1); 
if (strpos($header[0],'301') || strpos($header[0],'302')) 
{if(is_array($header['Location'])) {return $header['Location'][count($header['Location'])-1];
}else{return $header['Location'];}}else{return $url;}};
$url = getrealurl($url);
//模拟苹果手机访问
$UserAgent = 'Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1';
// 截取ID
function GetBetween($content,$start,$end) {
$r = explode($start, $content);
if (isset($r[1])) {
$r = explode($end, $r[1]);
return $r[0];
}
return '';
}
$b = 'item/';
$c = '?';
$id = GetBetween($url,$b,$c);
$d ='https://h5.pipix.com/bds/webapi/item/detail/?item_id='.$id;
//curl
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $d);
curl_setopt($curl, CURLOPT_HEADER, 0);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_ENCODING, '');
curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
$data = curl_exec($curl);
$a = $data;
curl_close($curl);
header('Content-type:text/json'); 
$Array = json_decode($a,true);
$name = $Array["data"]["item"]["video"]["text"];
$videourl= $Array["data"]["item"]["origin_video_download"]["url_list"]['0']['url'];
$cover = $Array["data"]["item"]["origin_video_download"]["cover_image"]["download_list"]["0"]['url'];
if($videourl==""){
	$status = "0";
}else{
	$status="1";
}
$Json = array('status'=>$status,'name'=>$name,'cover'=>$cover,'url'=>$videourl);
$turl=json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($turl);
} else
{
echo '请输入皮皮虾分享的地址，如：https://h5.pipix.com/s/hukXsy/';
}
?>