<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Session;

class Api extends Controller
{
    public function initialize()
    {
        parent::initialize();
        if (empty(Session::get('adminid')) || empty(Session::get('adminname'))) {
            return redirect((string) url('login/index'))->send();
        }
    }

    public function apiAdd()
    {
        $title = '接口添加';
        return $this->fetch('apiAdd', ['title' => $title]);
    }

    public function apiPostadd()
    {
        $data = input('post.');
        if (empty($data['name'])) {
            return returnJsonData(201, '接口名称不能为空', null);
        }
        $sort_id = Db::name('sort')->where('name',$data['sort'])->find();
        $data['sort'] = $sort_id['id'];
        $data['time'] = time();
        $res = Db::name('info')->insert($data);
        if($res){
            return returnJsonData(200, '添加成功');
        }else{
            return returnJsonData(201, '添加失败');
        }

    }

    public function apiEdit()
    {
        $title = '接口编辑';
        $data = Db::name('sort')->where('type',0)->order('id asc')->select();
        return $this->fetch('apiEdit', [
            'title' => $title,
            'data' => $data,
        ]);
    }

    public function apiUpdate()
    {
        $data = array_filter(input('post.'));
        if(!empty($data['sort'])){
            $sort_id = Db::name('sort')->where('name',$data['sort'])->find();
            $data['sort'] = $sort_id['id'];
            $data['time'] = time();
            $res = Db::name('info')->where('id',$data['id'])->update($data);
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

    public function getList()
    {
        $data = Db::name('info')->order('id asc')->paginate(10);
        return returnJsonData(200, '获取成功', $data);
    }

    public function apiList()
    {
        $title = '接口列表';
        $data = Db::name('info')->order('id asc')->paginate(10);
        $page = $data->render();
        return $this->fetch('apiList', [
            'title' => $title,
            'page' => $page,
            'data' => $data,
        ]);
    }

    public function apiOper()
    {
        $id = input('id');
        if(\request()->isPost()){
            $data = Db::name('info')->where('id', $id)->delete();
            if ($data) {
                return returnJsonData(200, '删除成功', null);
            } else {
                return returnJsonData(201, '删除失败', null);
            }
        }else{
            $data = Db::name('info')->where('id', $id)->find();
            $sort = Db::name('sort')->where('id', $data['sort'])->find();
            $data['sort_name'] = $sort['name'];
            if ($data) {
                return returnJsonData(200, '获取成功', $data);
            } else {
                return returnJsonData(201, '获取失败', null);
            }
        }
    }
}


