<?php
include '../black.php';

error_reporting(E_ALL || ~E_NOTICE);     //禁止显示PHP错误信息
	$qq=$_GET['qq'];     //获取URL参数
	if($qq==''){
	}
	else{
		$url='https://q1.qlogo.cn/g?b=qq&nk='.$qq.'&s=100';
		header("Location:{$url}");
		exit;
	}
?>