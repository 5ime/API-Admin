<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\index\model\Cate as CateModel;
use think\File;

class Index extends Controller
{
    public function index(){
        $info = Db::name('setup')->find();
        $api = Db::name('info')->select();
        $apicount = Db::name('info')->count();
        if(date('H') == 0){
            $file = (int)file_get_contents('api/counter.dat');
            $apinum = Db::name('setup')->column('counts');
            if ($apinum[0]>$file){
                $file += $apinum[0];
                $data['counts'] = $file;
                var_dump($data);
                $re = Db::name('setup')->where('id',1)->update($data);
            }else{
                $data['counts'] = $file;
                $re = Db::name('setup')->where('id',1)->update($data);
            }
        }
        return view('index', [
            'info' => $info,
            'api' => $api,
            'count' => $apicount,
        ]);
    }
    public function doc(){
    	$doc = input('id');
        $api = Db::name('info')->where("doc='$doc'")->find();
        $list = Db::name('info')->order('sort desc')->select();
        $info = Db::name('setup')->find();
        //echo Db::name('info')->getLastsql();die;
        if ($list) {
            $tree = $this->getTree($list,0);
        }
        if (empty($api)) {
            header("HTTP/1.0 404 Not Found");
            return $this->fetch(APP_PATH.'404.html');
        }
    	return view('doc',[
            'api'	=> $api,
            'info' => $info,
            'list' => $list,
            'lists' => $tree,
    	]);
    }
    public function getTree($list,$pid)
    {
        $tree = array();
        foreach($list as $k => $v)
        {
            if($v['pid'] == $pid)
            { 
                $v['nr'] = $this->getTree($list, $v['id']);
                $tree[] = $v;
            }
        }
        return $tree;
    }
}
