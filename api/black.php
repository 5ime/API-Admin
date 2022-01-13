<?php
$file = '../black.data';
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
