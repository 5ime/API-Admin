<?php
include '../black.php';
$path = __FILE__;
$test = explode('\\',$path);
$path = $test[count($test)-3]."/".$test[count($test)-2];
file_get_contents('http://'.$_SERVER['HTTP_HOST'].'/getCount?id='.$path);
	if(isset($_GET['url'])){
          $site='http://';
  		  $url=trim($site.$_GET['url']);
		$icourl=$url."/favicon.ico";
		//检测文件是否存在
		$icois = fopen($icourl,"r"); 
		if($icois){
			header('content-type:image/png;');
        	$icocontent = file_get_contents($icourl);
        	echo $icocontent;
		}
		else{
			header('content-type:image/png;');
        	$icocontent = file_get_contents('Images/web.png');
        	echo $icocontent;
		}
	}
?>