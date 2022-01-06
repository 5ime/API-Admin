<?php
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
function tian(){
$city=$_GET['city'];
$url="http://wthrcdn.etouch.cn/weather_mini?city=".$city;
$str = file_get_contents($url);
$result= gzdecode($str);
//end
echo $result;
}
tian();
?>