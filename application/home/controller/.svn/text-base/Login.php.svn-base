<?php
namespace app\home\controller;
use think\Controller;
use think\Session;
use think\Db;

class Login extends Controller{
    public function index(){
        $this->assign('err', "");
        $this->view->engine->layout(false);
        return $this->fetch('index');
    }

    public function in()
    {
        $p = input('post.');
        $r = Db::name('admin')->where(array('uname'=>$p['un'],'status'=>1))->find();
        if($r){
            if($r['pwd']==md5($p['p']))
            {
                Session::set('uid',$r['id']);
                Session::set('uname',$r['uname']);
                Session::set('roleid',$r['roleid']);
                Session::set('logintime',time());
                $role_data = Db::name('role')->where(array('id'=>$r['roleid']))->find();
                Session::set('perm',$role_data['permission']);
                $this->redirect('index/index');
            }else{
                $this->assign('err', '<p style="color:red;">*密码错误！</p>');
                $this->view->engine->layout(false);
                return $this->fetch('index');
            }
        }else{
                $this->assign('err', '<p style="color:red;">*账号填写错误！</p>');
                $this->view->engine->layout(false);
                return $this->fetch('index');
        }
    }

    public function out()
    {
        session(null);
        $this->redirect('Login/index');
    }

}