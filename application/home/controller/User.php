<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class User extends Common
{
    /*
    **通讯录管理-客户统计
     */
    public function kehu(){
        valiPerm(Session::get('perm'),15);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.user'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('kehu');
    }

    /*
    **通讯录管理-客户统计-查询数据
     */
    public function getKehu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(isset($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
            }
            $map['status'] = 1;
            $d = Db::name('kehu')->page($data['page'],$data['limit'])->where($map)->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('kehu')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **通讯录管理-客户统计-添加数据
     */
    public function addKehu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            // 判断客户名称是否重复
            $data['nicheng'] = trim($data['nicheng']);
            $nicheng = Db::name('kehu')->where(['status'=>1,'nicheng'=>$data['nicheng']])->find();
            if(!empty($nicheng)){
                $respond['msg'] = '抱歉，该客户名称已存在，请勿重复添加！';
                return $respond;
            }
            // 添加客户信息
            Db::name('kehu')->insert($data);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **通讯录管理-客户统计-更新数据
     */
    public function editKehu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            // 判断客户名称是否重复
            $data['nicheng'] = trim($data['nicheng']);
            $nicheng = Db::name('kehu')->where(['id'=>['neq',$data['id']],'status'=>1,'nicheng'=>$data['nicheng']])->find();
            if(!empty($nicheng)){
                $respond['msg'] = '抱歉，该客户名称已存在！';
                return $respond;
            }
            Db::table('erp_kehu')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **通讯录管理-客户统计-删除数据
     */
    public function delkehu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_kehu')->where('id',$data['id'])->update(array('status'=>0));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **通讯录管理-供应商统计
     */
    public function suppliers(){
        valiPerm(Session::get('perm'),16);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.user'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('suppliers');
    }

    /*
    **通讯录管理-供应商统计-查询数据
     */
    public function getSup(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(isset($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
            }
            $map['status'] = 1;
            $d = Db::name('suppliers')->page($data['page'],$data['limit'])->where($map)->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('suppliers')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **通讯录管理-供应商统计-添加数据
     */
    public function addSup(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::name('suppliers')->insert($data);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **通讯录管理-供应商统计-更新数据
     */
    public function editSup(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_suppliers')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **通讯录管理-供应商统计-删除数据
     */
    public function delSup(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_suppliers')->where('id',$data['id'])->update(array('status'=>0));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-角色设置
     */
    public function role(){
        valiPerm(Session::get('perm'),17);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.user'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('role');
    }

    /*
    **管理员设置-角色设置
     */
    public function getRole(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            $map['status'] = 1;
            $d = Db::name('role')->page($data['page'],$data['limit'])->where($map)->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('role')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-角色设置-添加数据
     */
    public function addRole(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::name('role')->insert($data);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **管理员设置-角色设置-更新数据
     */
    public function editRole(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_role')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-角色设置-删除数据
     */
    public function delRole(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_role')->where('id',$data['id'])->update(array('status'=>0));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    *管理员设置-角色设置-获取栏目
     */
    public function getMenu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            $map['status'] = 1;
            $d = Db::name('menu')->where($map)->order('sort asc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('menu')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    *管理员设置-角色设置-更新角色权限
     */
    public function updatePermission(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            if($data['roleid']==1){
                $respond = [
                    'msg'=>'抱歉！超级管理员权限无法修改！'
                ];
                return $respond;
            }
            $arr_id = array_keys($data['id']);
            $str_id = implode(",",$arr_id);
            Db::table('erp_role')->where('id',$data['roleid'])->update(array('permission'=>$str_id));
            $respond = [
                'msg'=>'恭喜！权限提交成功！',
                'data'=>$str_id
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-成员设置
     */
    public function member(){
        valiPerm(Session::get('perm'),18);//访问权限验证
        $role = Db::name('role')->where('status','1')->select();
        $this->assign([
            'role'          =>  $role,
            'nav'           =>  config('menu.user'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('member');
    }

    /*
    **管理员设置-成员设置
     */
    public function getMember(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            $map['status'] = 1;
            $d = Db::name('admin')->alias('a')->join('erp_role r','a.roleid = r.id')->page($data['page'],$data['limit'])->where('a.status = 1')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('admin')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-成员设置-添加数据
     */
    public function addMember(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $data['pwd'] = md5($data['pwd']);
            Db::name('admin')->insert($data);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **管理员设置-成员设置-更新数据
     */
    public function editMember(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            if($data['oldpwd']!=$data['pwd']){
                $data['pwd'] = md5($data['pwd']);
            }
            unset($data['oldpwd']);
            Db::table('erp_admin')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **管理员设置-成员设置-删除数据
     */
    public function delMember(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_admin')->where('id',$data['id'])->update(array('status'=>0));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

}
