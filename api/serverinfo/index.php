<?php
include '../black.php';

header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
error_reporting(0);
!empty($_GET['url']) ? $_GET['url'] : exit(json_encode(array(
    "msg"=>"请输入网址！"
)));
function span($str){
    $result = substr($str,strripos($str,"0\">")+3);
    $result = substr($result,0,strrpos($result,"</span>"));
    return $result;
}
$str = file_get_contents("http://ip.tool.chinaz.com/".$_GET['url']);
preg_match_all("/<span (.*?)>(.*?)<\/span>/ism", $str, $matches)  ;
$arr = array_unique($matches);
if (span($arr[0][7])==""){
    exit("{\"msg\":\"查询失败\"}");
}else{
    exit(json_encode(array(
        "msg"=>"ok",
        "host"=>span($arr[0][7]),
        "ip"=>span($arr[0][8]),
        "position"=>span($arr[0][10])
    )));
}