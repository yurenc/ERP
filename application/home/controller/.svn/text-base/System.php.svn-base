<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class System extends Common
{
    public function index()
    {
        $siteParam = Db::name('system')->select();
        $siteParam = array_column($siteParam,'value','key');
        $this->assign([
            'siteParam'           =>  $siteParam,
            'nav'           =>  config('menu.system'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('index');
    }

    // 更改系统参数提交
    public function changeParameter(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();

            $respond['msg'] = "哇哈哈哈！提交了也不一定生效！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **获取备忘录数据
     */
    function getAdminNote(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['id'] = Session::get('uid');
            $d = Db::name('admin')->where($map)->find();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **提交备忘录
    */
    function updateAadminNote(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['id'] = Session::get('uid');
            Db::table('erp_admin')->where($map)->update($data);
            $respond['msg'] = '修改成功';
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }
}
