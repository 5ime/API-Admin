<?php
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
header('Access-Control-Allow-Origin:*');
 $str=file_get_contents('http://cn.bing.com/HPImageArchive.aspx?idx=0&n=1');
 if(preg_match("/<url>(.+?)<\/url>/ies",$str,$matches)){
  $imgurl='http://cn.bing.com'.$matches[1];
 }
 if($imgurl){
  header('Content-Type: image/JPEG');
  @ob_end_clean();
  @readfile($imgurl);
  @flush(); @ob_flush();
  exit();
 }else{
  exit('error');
 }
?>