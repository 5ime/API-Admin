<?php
//读取文本
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
$str = explode("\n", file_get_contents('sinetxt.txt'));
$k = rand(0,count($str));
$sina_img = str_re($str[$k]);

$size_arr = array('large', 'mw1024', 'mw690', 'bmiddle', 'small', 'thumb180', 'thumbnail', 'square');
$size = !empty($_GET['size']) ? $_GET['size'] : 'large' ;
$server = rand(1,4);
if(!in_array($size, $size_arr)){
	$size = 'large';
}
$url = 'http://tva'.$server.'.sinaimg.cn/'.$size.'/'.$sina_img.'.jpg';
//解析JSON
$result=array("code"=>"200","acgurl"=>"$url");

$type=$_GET['return'];
switch ($type)
{   
   
//格式解析                             
case 'json':
$path = "$url";
$pathinfo = pathinfo($path);
$imageInfo = getimagesize($url);  
$result['width']="$imageInfo[0]";  
$result['height']="$imageInfo[1]";
$result['size']="$pathinfo[extension]"; 
header('Content-type:text/json');
echo json_encode($result);
break;
//不输出图片链接直接显示                             
case 'img':
$img = file_get_contents($url,true);
header("Content-Type: image/jpeg;");
echo $img;
break;
//IMG
default:
header("Location:".$result['acgurl']);
break;
//HTTPS图片输出                             
case 'https':
$url=str_replace("http","https", $result['acgurl']);
header("Location:".$url);
break;
//HTTP图片输出                             
case 'http':
header("Location:".$result['acgurl']);
break;
}
function str_re($str){
  $str = str_replace(' ', "", $str);
  $str = str_replace("\n", "", $str);
  $str = str_replace("\t", "", $str);
  $str = str_replace("\r", "", $str);
  return $str;
}
?>
