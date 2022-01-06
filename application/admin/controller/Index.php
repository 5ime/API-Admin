<?php
namespace app\admin\controller;

use think\config\driver\Json;
use think\Controller;
use think\Db;
use think\facade\Session;
use think\facade\App;

class Index extends Controller
{
    public function initialize()
    {
        parent::initialize();
        if (empty(Session::get('adminid')) || empty(Session::get('adminname'))) {
            return redirect((string) url('login/index'))->send();
        }
    }

    public function index()
    {
        $title = '仪表盘';
        return $this->fetch('index', [
            'title' => $title,
        ]);
    }

    public function logout()
    {
        Session::delete('adminid');
        Session::delete('adminname');
        return returnJsonData(200,'正在退出',null);
    }

    public function siteUpdate()
    {
        $title = '检测更新';
        $version = file_get_contents('https://tenapi.cn/version');
        $version = json_decode($version, true);
        if ($version['version'] > config('app_version')) {
            return returnJsonData(200,'发现新版本，请更新', $version);
        } else {
            return returnJsonData(201,'当前已是最新版本', null);
        }
    }

    public function setup()
    {
        $title = '站点设置';
        return $this->fetch('setup', ['title' => $title]);
    }

    function getSetup()
    {
        $data = Db::name('setup')->find();
        return returnJsonData(200, '获取成功', $data);
    }

    function setSetup()
    {
        $data = input('post.');
        $res = Db::name('setup')->where('id',1)->update($data);
        if ($res) {
            return returnJsonData(200, '更新成功', null);
        } else {
            return returnJsonData(201, '更新失败', null);
        }
    }

    public function getCount()
    {
        $info = Db::name('info')->count();
        $sort = Db::name('sort')->count();
        $post = Db::name('post')->count();
        $count = Db::name('info')->sum('count');
        $data = Db::name('info')->order('count desc')->limit(10)->field('id,name,count')->select();
        $data = [
            'info' => $info,
            'sort' => $sort,
            'post' => $post,
            'count' => $count,
            'top10' => $data,
        ];
        return returnJsonData(200, '获取成功', $data);
    }

    public function getNew10()
    {
        $log = Db::name('setup')->field('log')->find();
        $file = $log["log"];
        $num = 10;
        $fp = @fopen($file,"r");
        if(!$fp){
            return returnJsonData(201, '获取失败', null);
        }
        $pos = -2;
        $eof = "";
        $head = false;
        $data = array();
        while($num>0){
            while($eof != "\n"){
                if(fseek($fp, $pos, SEEK_END)==0){
                    $eof = fgetc($fp);$pos--;
                }else{
                    fseek($fp,0,SEEK_SET);$head = true;break;
                }
            }
            array_unshift($data,fgets($fp));
            if($head){ break; }$eof = "";$num--;
        }
        fclose($fp);
        $data = str_replace('"', ' ', $data);
        $data = str_replace('[', '', $data);
        $data = str_replace(']', '', $data);
        $data = str_replace('- - ', '', $data);
        $data = str_replace('  ', ' ', $data);
        $data = str_replace('?', ' ', $data);
        $data = array_map('explode', array_fill(0, count($data), ' '), $data);
        rsort($data);
        return returnJsonData(200, '获取成功', $data);
    }

    public function editUserinfo()
    {
        if(\request()->isPost()){
            $data = input('post.');
            $data = [
                'username' => $data['username'],
                'password' => hashPwd($data['password']),
                'email' => $data['email'],
            ];
            $res = Db::name('user')->where('uid', 1)->update(array_filter($data));
            if($res){
                return returnJsonData(200, '修改成功');
            }else{
                return returnJsonData(201, '修改失败');
            }
        }else{
            $info = Db::name('user')->where('uid', 1)->find();
            $data = [
                'username' => $info['username'],
                'email' => $info['email'],
                'time' => $info['time'],
            ];
            return returnJsonData(200, '获取成功', $data);
        }
    }

    public function apiSearch()
    {
        $title = '接口搜索';
        return $this->fetch('search', ['title' => $title]);
    }

    public function apiSearchlist()
    {
        $keyword = input('keyword');
        if (!empty($keyword)) {
            $data = Db::name('info')->where('name', 'like', '%' . $keyword . '%')->order('id asc')->paginate(10);
            if (count($data) > 0) {
                return returnJsonData(200, '搜索成功', $data);
            } else {
                return returnJsonData(201, '没有检索到您输入的关键字', null);
            }
        } else {
            return returnJsonData(201, '请输入关键词', null);
        }

    }

    public function black()
    {
        $title = '请求限制';
        return $this->fetch('black', ['title' => $title]);
    }

    public function postBlack()
    {
        $data = input('post.');
        if (!empty($data['value'])) {
            $data['time'] = time();
            $res = Db::name('black')->insert($data);
            if ($res) {
                $this->insertData();
                return returnJsonData(200, '添加成功', null);
            } else {
                return returnJsonData(201, '添加失败', null);
            }
        } else {
            return returnJsonData(201, '请输入限制目标', null);
        }
    }
    public function blacklist()
    {
        $data = Db::name('black')->order('id desc')->paginate(10);
        if (count($data) > 0) {
            return returnJsonData(200, '获取成功', $data);
        } else {
            return returnJsonData(201, '没有数据', null);
        }
    }

    public function blackOper()
    {
        $id = input('id');
        if(\request()->isPost()){
            $data = Db::name('black')->where('id', $id)->delete();
            if ($data) {
                $this->insertData();
                return returnJsonData(200, '删除成功', null);
            } else {
                return returnJsonData(201, '删除失败', null);
            }
        }else{
            $data = Db::name('black')->where('id', $id)->find();
            if ($data) {
                return returnJsonData(200, '获取成功', $data);
            } else {
                return returnJsonData(201, '获取失败', null);
            }
        }
    }

    public function getList()
    {
        $data = Db::name('black')->order('id asc')->paginate(10);
        if (count($data) > 0) {
            return returnJsonData(200, '获取成功', $data);
        } else {
            return returnJsonData(201, '没有数据', null);
        }
    }

    public function blackEdit()
    {
        $title = '编辑限制';
        return $this->fetch('blackEdit', ['title' => $title]);
    }

    public function blackUpdate()
    {
        $data = input('post.');
        if(!empty($data['id'])){
            $data['time'] = time();
            $res = Db::name('black')->where('id',$data['id'])->update($data);
            if($res){
                return returnJsonData(200, '更新成功',null);
            }else{
                return returnJsonData(201, '更新失败',null);
            }
        }else{
            return returnJsonData(201, '参数错误',null);
        }
    }

    public function insertData(){
        $config='black.data';
        $ilist = Db::name('black')->where('type',1)->field('value')->select();
        $rlist = Db::name('black')->where('type',0)->field('value')->select();
        $fp=fopen($config,'w');
        $data=[
            'ip'=>[$ilist],
            're'=>[$rlist]
            ];
        fwrite($fp,json_encode($data));
        fclose($fp);
    }
}
