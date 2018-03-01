<?php
namespace app\home\controller;

use app\home\controller\Common;

class Caiwu extends Common
{
    /*
    **财务管理-预留首页
     */
    public function index(){

        $this->assign([
            'nav'           =>  config('menu.caiwu'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('index');
    }

    /*
    **应收账目查询
    */
    public function yingshou(){
        return $this->fetch('yingshou');
    }

    /*
    **应收账目查询
    */
    public function yingfu(){
        return $this->fetch('yingfu');
    }
/*
    **业务部管理-财务收款
     */
    public function shoukuan(){
        valiPerm(Session::get('perm'),30);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('shoukuan');
    }

    /*
    **业务部管理-财务收款-查询数据
     */
    public function getSkOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(isset($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
                if(isset($data['search']['k2'])){
                    $map['addtime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
                }
            }
            //筛选类别
            $map['category'] = isset($data['category'])?$data['category']:'床垫';
            $map['skstatus'] = isset($data['skstatus'])?$data['skstatus']:0;
            $map['status'] = ['neq','0'];
            $d = Db::name('order_fh')->page($data['page'],$data['limit'])->where($map)->order('fhid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('order_fh')->where($map)->count('fhid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-财务收款-提交收款
     */
    public function completeSk(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新收款状态和金额
            Db::table('erp_order_fh')->where('fhid',$data['fhid'])->update(array('skstatus'=>1,'sktime'=>date('Y-m-d H:i:s',time()),'shoukuan'=>$data['shoukuan']));

            $respond['msg'] = "打款完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }
}
