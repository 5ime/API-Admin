<?php
ini_set('display_errors', 0);
$file = '../black.data';
$test = explode('/',$_SERVER['PHP_SELF']);
$path = $test[count($test)-3]."/".$test[count($test)-2];
if(is_https()){
  wCount('https://'.$_SERVER['SERVER_NAME'].'/getCount?id='.$path);
}else{
  wCount('http://'.$_SERVER['SERVER_NAME'].'/getCount?id='.$path);
}

$data = fopen($file, 'r');
if(filesize($file) > 0){
    $data = fread($data, filesize($file));
    $data = json_decode($data,true);
    if(in_array(get_ip(),$data)){
        $Json = array(
            'code' => 201,
            'msg' => '您已被拉黑',
        );
        $Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
        echo stripslashes($Json);
        die;
    }
    if(!empty(get_referer())){
        if(in_array(get_referer(),$data)){
            $Json = array(
                'code' => 201,
                'msg' => '您已被拉黑',
            );
            $Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
            echo stripslashes($Json);
            die;
        }
    }
}
function get_referer()
{
    $referer = @$_SERVER['HTTP_REFERER'];
    $referer = str_replace('http://', '', $referer);
    $referer = str_replace('https://', '', $referer);
    $referer = str_replace('www.', '', $referer);
    $referer = str_replace('/', '', $referer);
    $referer = str_replace('.', '', $referer);
    return $referer;
}

function get_ip()
{
	if(!empty($_SERVER['HTTP_CLIENT_IP'])){
		$cip = $_SERVER['HTTP_CLIENT_IP'];
	}else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
		$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
	}else if(!empty($_SERVER["REMOTE_ADDR"])){
		$cip = $_SERVER["REMOTE_ADDR"];
	}else{
		$cip = '';
	}
	preg_match("/[\d\.]{7,15}/", $cip, $cips);
	$cip = isset($cips[0]) ? $cips[0] : 'unknown';
	unset($cips);
	return $cip;
}

function is_https() {
    if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return true;
    } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        return true;
    } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return true;
    }
        return false;
}

function wCount($url){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    $output = curl_exec($ch);
    curl_close($ch);
}