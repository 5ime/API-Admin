<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use think\Session;
class Index extends Controller
{
    public function index()
    {
    	//返回视图层
        return $this->fetch();
    }
    public function sdata()
    {
    	//什么是mvc m 是model 模型层 v是view 视图层 c是控制层controll
    	//echo 1;get xssinput('post.username','')
    	echo checkusername($_POST['username']);die;
    	var_dump($_POST['username']);
    	if ($_POST['username']=='123456') {
    		echo "用户名正确";
    	}else{
    		echo "用户名错误";
    	}
    }
    public function testc(){
    	
    	echo checkusername('123456');
    }
    //数据库连接与增删改查
    //新增
    public function insertdata()
    {
        //这里需要去处理逻辑
        //把前台用户提交过来的数据去插入数据库
        $username = $_POST['username'];//input('post.username');//拿过来前面post过来的username
        $password = $_POST['password'];//拿过来前面post过来的passowrd
        //向数据库新增一条数据
        $data['username']=$username;
        $data['password']=jmpwd($password);
        $data['regtime']=time();

        $re = Db::name('user')->insert($data);//执行添加的
        if (!empty($re)) {
            $this->success('注册成功','/index');
        }else{
            $this->error("注册失败");
        }
    }
    public function logindata(){

        return $this->fetch();
    }
    //查询
    public function fromlogin(){
        //查询
        $username = $_POST['username'];//
        $password = jmpwd($_POST['password']);//
        $userinfo = Db::name('user')->where('username',$username)->find();
        //为空 就提示错误信息
        if (empty($userinfo)) {
            //就已经不再往下面运行 
            $this->error('用户名不存在，请检查');
        }
        if ($userinfo['password']==$password) {
            $this->success("登录成功");
        }else{
            $this->error("密码错误，请检查");
        }
    }
    //昨天讲了 查询和新增 然后今天讲  修改和删除
    //吃点东西  等会回来
    //修改
    public function updatauser()
    {
        $userinfo=Db::name('user')->where('id',1)->find();
        $this->assign('userinfo',$userinfo);
        return $this->fetch();
    }
    public function upuser()
    {
        if (empty(input('post.password'))) {
            $data['username']=input('post.username');
        }else{
            $data['username']=input('post.username');
            $data['password']=jmpwd(input('post.password'));
        }
        //修改的方法是update
        $uid=(int)input('post.uid');
        $re = Db::name('user')->where('id',$uid)->update($data);
        if ($re) {
            $this->success("修改成功");
        }else{
            $this->error("修改失败");
        }
    }
    //删除 delete
    public function deleteuser()
    {
        $uid=(int)input('get.uid');
        $re=Db::name('user')->where('id',$uid)->delete();
        if ($re) {
            $this->success("用户信息已被删除");
        }else{
            $this->error("删除失败");
        }
    }
} 
