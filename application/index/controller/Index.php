<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use Parsedown;

class Index extends Controller
{
    public function index()
    {
        $siteInfo = Db::name('setup')->field('title,keywords,desc,baidu,css,js')->find();
        $apiList = Db::name('info')->field('id,name,doc')->order('id asc')->select();
        $postList = Db::name('post')->field('id,title,time')->order('id desc')->limit(10)->select();
        return $this->fetch('index',[
            'site' => $siteInfo,
            'api' => $apiList,
            'post' => $postList,
        ]);
    }

    public function doc(){
    	$doc = input('id');
        $api = Db::name('info')->where("doc='$doc'")->find();
        $info = Db::name('setup')->find();
        $list = $this->getTree();
        return $this->fetch('doc',[
            'info' => $info,
            'api' => $api,
            'list' => $list
        ]);
    }

    public function getTree(){
        $cateCount = db('sort')->where('type',0)->count();
        $cates = Db::name('sort')->order('id', 'desc')->where('type',0)->select();/*查文章分类*/
        for($i=0;$i<$cateCount;$i++)
        {
            $cates[$i]['nr'] = db('info')->where(array('sort'=>$cates[$i]['id']))->select();
            $cates[$i]['count'] = db('info')->where(array('sort'=>$cates[$i]['id']))->count();
        }
        return $cates;
    }

    public function post(){
        $id = input('id');
        $post = Db::name('post')->where("id='$id'")->find();
        $sort = Db::name('sort')->where("id='$post[sort]'")->find();
        $post['sort'] = $sort['name'];
        $info = Db::name('setup')->field('title,keywords,desc,baidu,css,js')->find();
        $markdown = new Parsedown;
        $post['content'] = $markdown->text($post['content']);
        return $this->fetch('post',[
            'info' => $info,
            'post' => $post,
        ]);
    }

    public function postList(){
        $info = Db::name('setup')->field('title,keywords,desc,baidu,css,js')->find();
        $postList = Db::name('post')->field('id,title,time')->order('id desc')->select();
        return $this->fetch('postList',[
            'info' => $info,
            'post' => $postList,
        ]);
    }

    public function getCount(){
        $id = removeXss(input('id'));
        $count = Db::name('info')->where("path='$id'")->update([
            'count' => Db::raw('count+1')
        ]);
        if($count){
            return returnJsonData(200,'success',null);
        }else{
            return returnJsonData(201,'error',null);
        }
    }
}
