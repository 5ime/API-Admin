<?php
header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
$url = @$_GET["url"];
$info=@file_get_contents($url);
//var_dump($info);
preg_match('/<title>(.*?)<\/title>/',$info,$title);
preg_match('/name=\"description\" content=\"(.*?)\"/',$info,$description);
preg_match('/name=\"keywords\" content=\"(.*?)\"/',$info,$keywords);
if($title == NULL){
    $Json = array(
        "code"=> 202,
        'msg' => '获取失败'
    );
}else{
    $Json = array(
        "code"=> 200,
        'data' => array(
            "title"=>@$title[1],
            "description"=>@$description[1],
            "keywords"=>@$keywords[1],
        )
    );
}
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
?>
