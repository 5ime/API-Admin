<?php
namespace app\admin\controller;

use think\facade\Session;
use think\captcha\Captcha;
use think\Controller;
use think\Db;

class Login extends Controller
	{
        public function index()
        {
            if(!request()->isPost())
            {
                return $this->fetch();
            }else{
                $code = removeXss(input('post.checkcode'));
                $username = removeXss(input('post.username'));
                $password = removeXss(input('post.password'));
                $server = Db::name('setup')->field('server')->find();
                $captcha = new Captcha();
                if(!$captcha->check($code))
                {
                    return returnJsonData(201,'验证码错误',null);
                }
                if(empty($username))
                {
                    return returnJsonData(201,'用户名不能为空',null);
                }
                if(empty($password))
                {
                    return returnJsonData(201,'密码不能为空',null);
                }
                $info = Db::name('user')->where('username',$username)->find();
                if(empty($info))
                {
                    return returnJsonData(201,'信息有误',null);
                }
                $pass = hashPwd($password);
                if($pass != $info['password'])
                {
                    return returnJsonData(201,'信息有误',null);
                }
                Session::set('adminid', $info['uid']);
                Session::set('adminname', $info['username']);
                if(!empty($server['server']))
                {
                    $ip = get_ip();
                    $send = "https://sctapi.ftqq.com/".$server['server'].".send?title=%E7%99%BB%E5%BD%95%E6%8F%90%E9%86%92&desp=". $ip."%E7%99%BB%E5%BD%95%E6%88%90%E5%8A%9F";
                    file_get_contents($send);
                }
                return returnJsonData(200,'正在登录',null);
            }
        }

        public function verify()
        {
            $config = ['length' => 4];
            $captcha = new Captcha($config);
            return $captcha->entry();   
        }
    }
?>
