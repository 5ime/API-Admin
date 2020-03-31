<?php
    $counter = intval(file_get_contents("counter.dat"));  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp); 
 ?>
<?php
header('Access-Control-Allow-Origin:*');
error_reporting(E_ALL ^ E_NOTICE);// 显示除去 E_NOTICE 之外的所有错误信息
$str = explode("\n", file_get_contents('wyy.txt'));
$k = rand(0,count($str));
$randid = str_re($str[$k]);
$rand = rand(0,14);
    $file_contents = curl_get_https("https://music.163.com/api/v1/resource/comments/R_SO_4_" . $randid . "");
    $arr = json_decode($file_contents,true);
    //var_dump($arr);
$id = $randid;
$name = $arr['comments'][0]['user']['nickname'];
$content = $arr['hotComments'][$rand]['content'];
$Json = array(
            "code" => "200",
            "data" => array(
                "id" => $id,
                "name" => $name,
                "content" => $content,
            )
        );
 $Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
function str_re($str){
  $str = str_replace(' ', "", $str);
  $str = str_replace("\n", "", $str);
  $str = str_replace("\t", "", $str);
  $str = str_replace("\r", "", $str);
  return $str;
}
function curl_get_https($url){
    $curl = curl_init(); // 启动一个CURL会话
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);// TRUE 将curl_exec()获取的信息以字符串返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
    $tmpInfo = curl_exec($curl); // 返回api的json对象
    curl_close($curl);
    return $tmpInfo; // 返回json对象
}
?>