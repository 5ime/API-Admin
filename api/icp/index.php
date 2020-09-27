<?php
/**
 * @package 备案查询
 * @author 5ime
 * @version 1.0.0
 * @link http://github.com/5ime/api-admin/api/icp
 */
header("Access-Control-Allow-Origin:*");
header('Content-type: application/json');
$url = @$_GET['url'];
$json = file_get_contents('http://icp.chinaz.com/info?q='.$url); //调用的站长工具
//主办单位名称
preg_match_all('/<td width=\"29%\" align=\"left\" class=\"by1\">(.*?)<\/td>/', $json, $mingcheng);
//主办单位性质
preg_match_all('/<td align=\"left\" class=\"by2\">(.*?)<\/td>/', $json, $xingzhi);
//网站备案/许可证号 网站名称
preg_match_all('/<td align=\"left\" class=\"by1\" width=\"30%\">(.*?)<\/td>/', $json, $beianhao);
//网站首页
preg_match_all('/<td align=\"left\" class=\"by2\" width=\"30%\" id=\"mpage\">(.*?)<\/td>/', $json, $index);
//审核时间
preg_match_all('/<td align=\"left\" class=\"by2\" width=\"30%\">(.*?)<\/td>/', $json, $time);
//var_dump($index);
if(strpos($beianhao[1][1],'--') !== false){
    $Json = array(
        'code' => 202,
        'msg' => '未查询到备案信息',
    );
}else{
$Json = array(
        "code" => 200,
        "data" => array(
            "name" => $mingcheng[1][0],
            "nature" => $xingzhi[1][0],
            "icp" => $beianhao[1][0],
            "sitename" => $beianhao[1][1],
            "index" => $index[1][0],
            "time" => $time[1][0],
        )
    );
}
$Json = json_encode($Json,JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);
echo stripslashes($Json);
return $Json;
?>
