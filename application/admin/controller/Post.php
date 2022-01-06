<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Session;

class Post extends Controller
{
    public function initialize()
    {
        parent::initialize();
        if (empty(Session::get('adminid')) || empty(Session::get('adminname'))) {
            return redirect((string) url('login/index'))->send();
        }
    }

    public function postAdd()
    {
        $title = '文章发布';
        return $this->fetch('postAdd', ['title' => $title]);
    }
  
    public function articleAdd()
    {
        $data = input('post.');
        if (empty($data['title'])) {
            return returnJsonData(201, '标题不能为空', null);
        }
        $sort_id = Db::name('sort')->where('name',$data['sort'])->find();
        $data['sort'] = $sort_id['id'];
        $data['time'] = time();
        $res = Db::name('post')->insert($data);     
        if($res){
            return returnJsonData(200, '发布成功', null);
        }else{
            return returnJsonData(201, '发布失败', null);
        }
    }

    public function postList()
    {
        $title = '文章列表';
        return $this->fetch('postList', ['title' => $title]);
    }

    public function getList()
    {
        $data = Db::name('post')->order('id asc')->field('id,sort,title,time')->paginate();
        $data = json_decode(json_encode($data),true);

        foreach ($data["data"] as $key => $value) {
            $sort_id = $value['sort'];
            $sort_name = Db::name('sort')->where('id',$sort_id)->field('id,name')->find();
            $data["data"][$key]["sort"] = $sort_name["name"];
        }
        
        if ($data["total"] > 0) {
            return returnJsonData(200, '获取成功', $data);
        }else{
            return returnJsonData(201, '获取失败', null);
        }
    }

    public function postEdit()
    {
        $title = '文章编辑';
        return $this->fetch('postEdit', ['title' => $title]);
    }

    public function postOper()
    {
        $id = input('id');
        if(\request()->isPost()){
            $data = Db::name('post')->where('id', $id)->delete();
            if ($data) {
                return returnJsonData(200, '删除成功', null);
            } else {
                return returnJsonData(201, '删除失败', null);
            }
        }else{
            $data = Db::name('post')->where('id', $id)->find();
            $sort_name = Db::name('sort')->where('id',$data['sort'])->field('id,name')->find();
            $data['sort'] = $sort_name['name'];
            if ($data) {
                return returnJsonData(200, '获取成功', $data);
            } else {
                return returnJsonData(201, '获取失败', null);
            }
        }
    }

    public function postUpdate()
    {
        $data = array_filter(input('post.'));
        if(!empty($data['sort'])){
            $sort_id = Db::name('sort')->where('name',$data['sort'])->find();
            $data['sort'] = $sort_id['id'];
            $data['time'] = time();
            $res = Db::name('post')->where('id',$data['id'])->update($data);
            if($res){
                return returnJsonData(200, '更新成功',null);
            }else{
                return returnJsonData(201, '更新失败',null);
            }
        }
        else{
            return returnJsonData(201, '参数错误',null);
        }
    }
}


