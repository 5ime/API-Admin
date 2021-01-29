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
        $apicount = Db::name('info')->count();
        $apinum = Db::name('setup')->column('counts');
        $userinfo = Db::name('user')->where('id',1)->find();
        return view('index', [
            'count' => $apicount,
            'userinfo' => $userinfo,
            'num' => $apinum[0],
        ]);  
    }
    public function upuser()
    {
        if (empty(input('post.password'))) {
            $this->error("密码禁止为空");
        }
        $data = [
            'username' => input('post.username'), 
            'password' => jmpwd(input('post.password')), 
        ];
        $re = Db::name('user')->where('id','1')->update($data);
        if ($re) {
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }
    public function add()
    {
        $data = Db::name('info')->where("sort","1")->select();
        return view('add', [
            'sort' => $data,
        ]);  
    }
    public function upadd()
    {
        $data = [
            'name' => input('post.apiname'), 
            'doc' => input('post.apidoc'), 
            'miaoshu' => input('post.miaoshu'), 
            'demo' => input('post.diaoyong'), 
            'democode' => htmlspecialchars(input('post.democode')),
            'url' => input('post.apipost'), 
            'request' => htmlspecialchars(input('post.apiposts')), 
            'icon' => input('post.apiicon'), 
            'type' => input('post.type'), 
            'pid' => input('post.sort'), 
            'time' => time(), 
        ];
        $re = Db::name('info')->insert($data);
        if ($re) {
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    public function list()
    {
        $api=Db::name('info')->order('id asc')->paginate(10); 
        $page = $api->render();
        return view('list', [
            'api' => $api,
            'page' => $page,
                ]);  
    }
    public function edit()
    {
        $id = $_GET['id'];
        $api=Db::name('info')->where('id',$id)->select(); 
        $data = Db::name('info')->where("sort","1")->select();
        $nbaxd['sort'] = $data;
        return view('edit', [
            'api' => $api,
            'sort' => $data,
        ]);  
    }
    public function upedit()
    {
        $data = [
            'name' => input('post.apiname'), 
            'doc' => input('post.apidoc'), 
            'miaoshu' => input('post.miaoshu'), 
            'demo' => input('post.diaoyong'), 
            'democode' => htmlspecialchars(input('post.democode')),
            'url' => input('post.apipost'), 
            'request' => htmlspecialchars(input('post.apiposts')), 
            'icon' => input('post.apiicon'), 
            'type' => input('post.type'), 
            'time' => time(), 
        ];
        $id = (int)input('post.id');
        $re = Db::name('info')->where('id',$id)->update($data);
        if ($re) {
            $this->success("修改API成功");
        }else{
            $this->error("修改API失败");
        }
    }
    public function apidel()
    {
        $id = $_GET['id'];
        $re=Db::name('info')->where('id',$id)->delete();
        if ($re) {
            $this->success("此API已被删除",url('Index/list'));
        }else{
            $this->error("删除失败,请确认API是否存在",url('Index/list'));
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
        $data = [
            'title' => input('post.title'), 
            'url' => input('post.url'), 
            'description' => input('post.description'), 
            'keywords' => input('post.keyword'), 
            'baidutongji' => htmlspecialchars(input('post.baidutongji')),
            'code' => input('post.code'), 
        ];
        $re = Db::name('setup')->where('id',1)->update($data);
        if ($re) {
            $this->success("修改信息成功");
        }else{
            $this->error("修改信息失败");
        }
    }
    public function search()
    {
        $where_like = ['name','like','%' . $_GET['keyword'] . '%'];
        $api = Db::name('info')->where($where_like[0],$where_like[1],$where_like[2])->select(); 
        if($api==null){
            return view('search', [
                'api' => '',
                'tips' => '抱歉，没有符合您查询条件的结果',
            ]);  
        }
        return view('search', [
            'api' => $api,
            'tips' => '查询成功',
        ]);  
    }
    public function sort()
    {
        $sort = Db::name('info')->where("sort","1")->select();
        return view('sort', [
            'sort' => $sort,
        ]);  
    }
    public function adds()
    {
        return $this->fetch();
    }
    public function upadds()
    {
        $data = [
            'name' => input('post.sortname'),
            'icon' => input('post.sorticon'),
            'sort' => '1',
            'time' => time(), 
        ];
        $re = Db::name('info')->insert($data);
        if ($re) {
            $this->success("添加成功");
        }else{
            $this->error("添加失败");
        }
    }
    public function edits()
    {
        $id = $_GET['id'];
        $sort = Db::name('info')->where('id',$id)->select(); 
        return view('edits', [
            'sort' => $sort,
        ]); 

    }
    public function upedits()
    {
        $data = [
            'name' => input('post.sortname'), 
            'icon' => input('post.sorticon'), 
            'time' => time(), 
        ];
        $id = (int)input('post.id');
        $re = Db::name('info')->where('id',$id)->update($data);
        if ($re) {
            $this->success("分类修改成功");
        }else{
            $this->error("分类修改失败");
        }
    }
    public function sortdel()
    {
        $id = $_GET['id'];
        $re=Db::name('info')->where('id',$id)->delete();
        if ($re) {
            $this->success("分类删除成功",url('Index/sort'));
        }else{
            $this->error("删除失败,请确认分类是否存在",url('Index/sort'));
        }
    }
}
?>
