<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Session;
use think\Request; 
class Index extends Controller
{
    public function _initialize()
    {
      if(!session('USER_INFO_ID')){
        return $this->error('您没有登陆',url('Login/index'));
      }
    }
    public function logout()
    {
        $_SESSION = array();
        if(isset($_COOKIE[session_name()])){
            setcookie(session_name(),'',time()-1);
        }
        session_destroy();
        $this->success('您已退出登录，请重新登录','/');
    }

    public function index()
    {
    $apicount=Db::name('info')->count();
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
        $uid=(int)input('post.uid');
        $re = Db::name('user')->where('id',$uid)->update($data);
        if ($re) {
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }
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
        $data['icon']=input('post.apiicon');
        $data['type']=input('post.type');
        $data['time']=time();
        $re = Db::name('info')->insert($data);
        if ($re) {
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    public function list()
    {
        $api=Db::name('info')->select(); 
        return view('list', [
            'api' => $api,
                ]);  
    }
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
        $data['democode']=$value;
        $data['url']=input('post.apipost');
        $data['request']=input('post.apiposts');
        $data['type']=input('post.type');
        $data['icon']=input('post.apiicon');
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
        $data['url']=input('post.url');
        $data['description']=input('post.description');
        $data['keywords']=input('post.keyword');
        $data['baidutongji']=input('post.baidutongji');
        $re = Db::name('setup')->where('id',1)->update($data);
        if ($re) {
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }
}
?>
