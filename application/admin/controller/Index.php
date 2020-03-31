<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Session;
use think\Request; 
class Index extends Controller
{
	//判断是否登录
    public function _initialize()
    {
      //判断有无admin_username这个session，如果没有，跳转到登陆界面
      if(!session('USER_INFO_ID')){
        return $this->error('您没有登陆',url('Login/index'));
      }
    }
    //退出登录
    public function logout()
    {
        $_SESSION = array();  //清除 SESSION 的值
        if(isset($_COOKIE[session_name()])){  //判断客户端的 cookie 文件是否存在，如果存在将其设置为过期
            setcookie(session_name(),'',time()-1);
        }
        session_destroy();  //清除服务器的 session 文件
        $this->success('您已退出登录，请重新登录','/');//返回首页
    }

    public function index()
    {
    $apicount=Db::name('info')->count();//获取api总数
      return view('index', [
        'count' => $apicount,
    ]);  
    }

    public function user()
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
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }
    //添加api
    public function add()
    {
     return $this->fetch();
    }
    public function upadd()
    {
        $demo=input('post.democode');
        $value = htmlspecialchars($demo);
        $data['name']=input('post.apiname');
        $data['doc']=input('post.apidoc');
        $data['miaoshu']=input('post.miaoshu');
        $data['demo']=input('post.diaoyong');
        $data['democode']=$value;//input('post.diaoyong');
        $data['url']=input('post.apipost');
        $data['request']=input('post.apiposts');
        $data['time']=time();
        $re = Db::name('info')->insert($data);
        if ($re) {
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    //获取api列表
    public function list()
    {
        $api=Db::name('info')->select(); 
        return view('list', [
            'api' => $api,
                ]);  
    }

    //修改api
    public function edit()
    {
        $id=(int)input('get.id');
        $api=Db::name('info')->where('id',$id)->select(); 
        $this->assign('edit',$api);
        return view('edit', [
            'api' => $api,
        ]);  
    }
    public function upedit()
    {
        $demo=input('post.democode');
        $value = htmlspecialchars($demo);
        $data['name']=input('post.apiname');
        $data['doc']=input('post.apidoc');
        $data['miaoshu']=input('post.miaoshu');
        $data['demo']=input('post.diaoyong');
        $data['democode']=$value;//input('post.diaoyong');
        $data['url']=input('post.apipost');
        $data['request']=input('post.apiposts');
        $data['type']=input('post.type');
        $data['time']=time();
        //修改的方法是update
        $id=(int)input('post.id');
        $re = Db::name('info')->where('id',$id)->update($data);
        //echo Db::name('info')->getLastsql();die;
        if ($re) {
            $this->success("修改API成功");
        }else{
            $this->error("修改API失败");
        }
    }

    //删除api
    public function apidel()
    {
        $uid=(int)input('get.id');
        $re=Db::name('info')->where('id',$uid)->delete();
        if ($re) {
            $this->success("此API已被删除");
        }else{
            $this->error("删除失败,请确认API是否存在");
        }
    }
    //站点设置
    public function site()
    {
        $api=Db::name('setup')->select(); 
        return view('site', [
            'api' => $api,
                ]);  
    }
    public function upsite()
    {
        $data['title']=input('post.title');
        $data['description']=input('post.description');
        $data['keywords']=input('post.keyword');
        $data['baidutongji']=input('post.baidutongji');
        //修改的方法是update
        $re = Db::name('setup')->where('id',1)->update($data);
        if ($re) {
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }





}
?>