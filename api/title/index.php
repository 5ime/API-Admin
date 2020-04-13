<?php
if ($_GET['url']) {
    $site='http://';
    $url=trim($site.$_GET['url']);
    $info=file_get_contents($url);
    header('Content-type:text/json');
    preg_match('|<title>(.*?)<\/title>|i',$info,$m);
    if($url){ 
      $result=array("code"=>"200","title"=>$m[1]);
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}else{
      $result=array("code"=>"201","meg"=>"ERREO");
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
}else{
      $result=array("code"=>"201","meg"=>"ERREO");
      echo json_encode($result,JSON_UNESCAPED_UNICODE);
}
?>