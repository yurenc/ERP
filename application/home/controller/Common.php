<?php
namespace app\home\controller;

use think\Controller;

class Common extends Controller
{

    protected function _initialize(){
        if(!session('?uname'))
        {
            $this->redirect('login/index');
        }else{
            if((time()-session('logintime'))>(60*60*12))//设置登陆最长时间是12小时
            {
                $this->redirect('login/out');
            }
        }
        $uname = session('uname');
        $this->assign('uname',$uname);
    }

}