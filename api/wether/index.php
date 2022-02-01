<?php
include '../black.php';

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