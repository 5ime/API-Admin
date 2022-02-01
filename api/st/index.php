<?php
include '../black.php';

header('Access-Control-Allow-Origin:*');
header('Content-type: application/json');
error_reporting(0);
!empty($_GET['num'])  ? $_GET['num'] :exit(urldecode(json_encode(array("code"=>-1,"msg"=>urlencode("请输入订单号！")))));
$json = json_decode(file_get_contents("https://hdgateway.zto.com/WayBill_GetDetail?billCode=".$_GET['num']));
if ($json->message!=="快递信息查询成功"){
    $output = array("code"=>-1,"msg"=>urlencode("查询失败"));
} else {
    $arr = $json->result->logisticsRecord;
    foreach ($arr as $k=>$v){
        foreach ($v as $value){
            $arrl[]=array(
                "time"=>urlencode($value->scanDate),
                "signMan"=>urlencode($value->signMan),
                "operateUserPhone"=>urlencode($value->operateUserPhone),
                "date"=>urlencode($value->date),
                "operateUser"=>urlencode($value->operateUser),
                "scanType"=>urlencode($value->scanType),
                "stateDescription"=>urlencode($value->stateDescription)
            );
        }
    }
    $output = array(
        "code"=>1,
        "msg"=>urlencode("查询成功！"),
        "logisticsRecord"=>$arrl,
        "billPrescription"=>urlencode($json->result->billPrescription),
        "billCode"=>$json->result->billCode,
        "author"=>urlencode("Tenapi.cn")
    );
}
exit(urldecode(json_encode($output)));