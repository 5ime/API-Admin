<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\facade\Session;

class Sort extends Controller
{
    public function initialize()
    {
        parent::initialize();
        if (empty(Session::get('adminid')) || empty(Session::get('adminname'))) {
            return redirect((string) url('login/index'))->send();
        }
    }

    public function sortAdd()
    {
        $title = '分类添加';
        return $this->fetch('sortAdd', ['title' => $title]);
    }

    public function getList()
    {
        $data = Db::name('sort')->order('id asc')->paginate(10);
        return returnJsonData(200, '获取成功', $data);
    }

    public function sortList()
    {
        $title = '分类列表';
        return $this->fetch('sortList', ['title' => $title]);
    }

    public function sortPostadd()
    {
        $data = input('post.');
        $data['time'] = time();
        if (empty($data['name'])) {
            return returnJsonData(201, '分类名称不能为空', null);
        }
        $res = Db::name('sort')->insert($data);
        if($res){
            return returnJsonData(200, '添加成功',null);
        }else{
            return returnJsonData(201, '添加失败',null);
        }
    }

    public function sortEdit()
    {
        $title = '分类编辑';
        return $this->fetch('sortEdit', ['title' => $title]);
    }

    public function sortUpdate()
    {
        $data = input('post.');
        if(!empty($data['id'])){
            $data['time'] = time();
            $res = Db::name('sort')->where('id',$data['id'])->update($data);
            if($res){
                return returnJsonData(200, '更新成功',null);
            }else{
                return returnJsonData(201, '更新失败',null);
            }
        }else{
            return returnJsonData(201, '参数错误',null);
        }
    }

    public function sortOper()
    {
        $id = input('id');
        if(\request()->isPost()){
            $data = Db::name('sort')->where('id', $id)->delete();
            if($id == 1 || $id == 2){
                return returnJsonData(201, '默认分类不能删除',null);
            }
            if ($data) {
                return returnJsonData(200, '删除成功', null);
            } else {
                return returnJsonData(201, '删除失败', null);
            }
        }else{
            $data = Db::name('sort')->where('id', $id)->find();
            if ($data) {
                return returnJsonData(200, '获取成功', $data);
            } else {
                return returnJsonData(201, '获取失败', null);
            }
        }
    }
}


