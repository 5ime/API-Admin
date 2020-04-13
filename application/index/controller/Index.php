<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Cate as CateModel;

class Index extends Controller
{
    public function index(){
        //信息查询
        $info=Db::name('setup')->find();
        //API查询
        $api=Db::name('info')->select();
        //API数量
        $apicount=Db::name('info')->count();
        return view('index', [
            'info' => $info,
            'api' => $api,
            'count' => $apicount,
        ]);  
    }

    public function doc(){
    	$doc=input('id');
        $api=Db::name('info')->where("doc='$doc'")->find();
        $list=Db::name('info')->select();
        $info=Db::name('setup')->find();
        //echo Db::name('info')->getLastsql();die;
        if (empty($api)) {
            header("HTTP/1.0 404 Not Found"); 
            return $this->fetch(APP_PATH.'404.html');
        }
        
    	return view('doc',[
            'api'	=> $api,
            'info' => $info,
            'list' => $list,
    	]);
	}



} 