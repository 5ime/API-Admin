<?php
header('Access-Control-Allow-Origin:*');
header('Content-type:application/json; charset=utf-8');
!empty($_GET['url']) ? $api = $_GET['url'] : exit(json_encode([
    'code'=>202,
    "msg"=>"网址不能为空"
],JSON_UNESCAPED_UNICODE));
/*
 * 请求
 */
$json = myCurl($api);
/*
 * 判断
 */
if($json){
    echo json_encode(array('code'=>200,'dwz'=>$api,'rec'=>$json),JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
} else {
    echo json_encode(array('code'=>201,'msg'=>'短网址还原失败'),JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
}
/***
 * 万能短网址还原函数
 * @param $url 短网址
 * @return 原始网址 | 空（还原失败或非短网址）
 */
function myCurl($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0');
    curl_setopt($curl, CURLOPT_HEADER, true);
    curl_setopt($curl, CURLOPT_NOBODY, false);
    curl_setopt($curl, CURLOPT_TIMEOUT, 15);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_ENCODING, 'gzip');
    $data = curl_exec($curl);
    $curlInfo = curl_getinfo($curl);
    curl_close($curl);
    if($curlInfo['http_code'] == 301 || $curlInfo['http_code'] == 302) {
        return $curlInfo['redirect_url'];
    }
    return '';
}