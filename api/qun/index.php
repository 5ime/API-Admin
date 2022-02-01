<?php
include '../black.php';

$qqun=$_GET['qun'];
$type =$_GET['type'];
$t=time()*1000;
if ($qqun ==''){
echo "参数不能为空";
}
if ($qqun != null) {
$url="http://wp.qq.com/wpa/g_wpa_get?guin=".$qqun."&t=".$t;
$arr = json_decode($url,true);
$ResArray=json_decode(curl_request($url,'get'),true);
//var_dump($ResArray);
//foreach ($ResArray['result']['data'] as $k => $v) 

$uid = $ResArray['result']['data'][0]['guin'];
$idkey = $ResArray['result']['data'][0]['key'];
if ($type == 301) {
	$cs='http://wp.qq.com/wpa/qunwpa?idkey='. $idkey .'';
		header("Location:{$cs}");
}
$Json = array(
            "code" => 200,
            "data" => array(
                "uid" => $uid,
                "idkey" => $idkey,
                "url" => 'http://wp.qq.com/wpa/qunwpa?idkey='. $idkey .'',
            )
        );
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;

}


//参数1：访问的URL，参数2：post数据(不填则为GET)，参数3：提交的$cookies,参数4：是否返回$cookies
 function curl_request($url,$post='',$cookie='', $returnCookie=0){
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.1; Trident/6.0)');
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_REFERER, "http://XXX");
        if($post) {
            curl_setopt($curl, CURLOPT_POST, 1);
        }
        if($cookie) {
            curl_setopt($curl, CURLOPT_COOKIE, $cookie);
        }
        curl_setopt($curl, CURLOPT_HEADER, $returnCookie);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($curl);
        if (curl_errno($curl)) {
            return curl_error($curl);
        }
        curl_close($curl);
        if($returnCookie){
            list($header, $body) = explode("\r\n\r\n", $data, 2);
            preg_match_all("/Set\-Cookie:([^;]*);/", $header, $matches);
            $info['cookie']  = substr($matches[1][0], 1);
            $info['content'] = $body;
            return $info;
        }else{
            return $data;
        }
}
