<?php
/*蓝优 4.23*/
include '../black.php';

header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
!empty($_REQUEST['url']) ? $url = $_REQUEST['url'] : exit(json_encode([
    'code'=>202,
    "msg"=>"缺少参数"
],JSON_UNESCAPED_UNICODE));
$get = urlencode($url);
$api = myCurl('https://vip.video.qq.com/fcgi-bin/comm_cgi?name=short_url&need_short_url=1&url='.$get);
$b = 'QZOutputJson=(';
$c = ');';
$json = GetBetween($api,$b,$c);
$data = json_decode($json,true);
if ($data){
        $value = array(
            'code'=>200,
                'url'=>$_REQUEST['url'],
                'data'=>$data['short_url']
        );
}else{
        $value = array(
            'code'=>202,
                'msg'=>'失败'
        );
}
echo json_encode($value,JSON_UNESCAPED_UNICODE);
function myCurl($url){ //Curl GET
    $ch = curl_init();     // Curl 初始化  
    $timeout = 30;     // 超时时间：30s  
    $ua='Mozilla/5.0( Linux; Android 8.1.0; PBCM30 Build/OPM1.171019011; wv)Apple Webkit/ 537.36(KHTML, like Gecko) Version/4.0 Chrome/62.0.3202. 84 Mobile Safari/537.36';    // 伪造抓取 UA  
        $ip = mt_rand(11, 191) . "." . mt_rand(0, 240) . "." . mt_rand(1, 240) . "." . mt_rand(1, 240);
    curl_setopt($ch, CURLOPT_URL, $url);              // 设置 Curl 目标  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);      // Curl 请求有返回的值  
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);     // 设置抓取超时时间  
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);        // 跟踪重定向  
    curl_setopt($ch,CURLOPT_REFERER,$url);   // 伪造来源网址  
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip));  //伪造IP  
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);   // 伪造ua   
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); // https请求 不验证证书和hosts  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0); //强制协议为1.0
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 ); //强制使用IPV4协议解析域名
    $content = curl_exec($ch);   
    curl_close($ch);    // 结束 Curl  
    return $content;    // 函数返回内容  
}
function GetBetween($content,$start,$end) {
        $r = explode($start, $content);
        if (isset($r[1])) {
                $r = explode($end, $r[1]);
                return $r[0];
        }
        return '';
}
