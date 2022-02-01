<?php
include '../black.php';

header('Access-Control-Allow-Origin:*');header('Content-type:application/json; charset=utf-8');error_reporting(0);function myCurl($url){
    $ch = curl_init();     // Curl 初始化
    $timeout = 30;     // 超时时间：30s
    $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
    if($ip != ""){
        $arr = explode(",",$ip);
        $ip = $arr[0];
    }else{
        $ip = $_SERVER["REMOTE_ADDR"];
    }
    $ua='Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/65.0.3325.181 Safari/537.36';
    $header = array('X-FORWARDED-FOR:'.$ip, 'CLIENT-IP:'.$ip);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_ENCODING, "");
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_USERAGENT, $ua);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;}!empty($_GET['keyword']) ? $_GET['keyword'] : exit(json_encode([
    "code"=>-1,
    "msg"=>"请输入垃圾名字！"],JSON_UNESCAPED_UNICODE));$json = json_decode(myCurl("https://quark.sm.cn/api/rest?method=sc.operation_sorting_category&app_chain_name=waste_classify&q=".$_GET['keyword']));if ($json->data->waste_type == "" || $json->data->category==null){
    $output = [
        "code"=>-1,
        "msg"=>"该垃圾暂未识别！"
    ];} else{
    $output = [
        "code"=>1,
        "msg"=>"查询成功！",
        "data"=>$json->data->waste_type    ];}exit(json_encode($output,JSON_UNESCAPED_UNICODE));