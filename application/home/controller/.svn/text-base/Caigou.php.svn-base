<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Caigou extends Common
{
    /*
    **苏州采购部-采购管理
     */
    public function cgorder(){
        valiPerm(Session::get('perm'),14);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cgorder');
    }

    /*
    **苏州采购部-采购管理-查询订单数据
     */
    public function getOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
                if(!empty($data['search']['vds'])&&!empty($data['search']['vds'])){
                    $map[$data['search']['k2']] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
                }
            }
            $map['isdelete'] = 0;
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('caigou')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('caigou')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购管理-添加订单数据
     */
    public function addOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $data['caigoutime'] = date("Y-m-d H:i:s",time());
            $data['total'] = $data['price']*$data['number'];
            Db::name('caigou')->insert($data);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **苏州采购部-采购管理-更新订单数据
     */
    public function editOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            if(isset($data['status'])&&$data['status']==2){
                $data['wctime']= date("Y-m-d H:i:s",time());
            }
            $data['total'] = $data['price']*$data['number'];
            Db::table('erp_caigou')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购管理-删除订单数据
     */
    public function delOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_caigou')->where('id',$data['id'])->update(array('isdelete'=>1));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **苏州采购部-采购管理-拆分订单
     */
    public function chaiOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $newNumber = $data['number']-$data['chainum'];
            if($newNumber<=0){
                $respond['msg'] = "拆单数量不能小于现有数量！";
                return $respond;
            }
            $addCaigouData = Db::name('caigou')->where('id',$data['id'])->find();
            $total = $addCaigouData['price']*$newNumber;
            // 更新现有的产品数量
            Db::table('erp_caigou')->where('id',$data['id'])->update(['number'=>$newNumber,'total'=>$total]);
            // 复制添加新的订单
            $d = [
                'supplier' => $addCaigouData['supplier'],
                'caigoutime' => date('Y-m-d H:i:s',time()),
                'pinming' => $addCaigouData['pinming'],
                'leibie' => $addCaigouData['leibie'],
                'type' => $addCaigouData['type'],
                'size' => $addCaigouData['size'],
                'danwei' => $addCaigouData['danwei'],
                'number' => $data['chainum'],
                'price' => $addCaigouData['price'],
                'total' => $data['chainum']*$addCaigouData['price'],
            ];
            Db::name('caigou')->insert($d);
            $respond['msg'] = "拆单成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **苏州采购部-采购管理-添加装车单
     */
    public function addZhuangche(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //添加要货订单
            $yhdata = [
                'title'     =>  '苏州材料装车单',
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname')
            ];
            Db::name('caigou_zc')->insert($yhdata);
            $zcId = Db::name('caigou_zc')->getLastInsID();
            //循环更改要货状态和要货ID
            foreach ($data['shuju'] as $key => $val) {
                Db::table('erp_caigou')->where('id',$val['id'])->update(array('zcstatus'=>1,'zcid'=>$zcId));
            }
            $respond['msg'] = "恭喜添加装车单成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购管理-合并打款单
     */
    public function addDakuan(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //添加要货订单
            $yhdata = [
                'title'     =>  '采购财务打款合并单',
                'supplier'   =>  $data['shuju'][0]['supplier'],
                'danhao'   =>  $data['danhao'],
                'zkfs'   =>  $data['zkfs'],
                'total'   =>  $data['total'],
                'note'   =>  $data['note'],
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname')
            ];
            Db::name('caigou_zk')->insert($yhdata);
            $zcId = Db::name('caigou_zk')->getLastInsID();
            //循环更改要货状态和要货ID
            foreach ($data['shuju'] as $key => $val) {
                Db::table('erp_caigou')->where('id',$val['id'])->update(array('zkid'=>$zcId));
            }
            $respond['msg'] = "恭喜合并转款订单成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-苏州物流
     */
    public function cgszwuliu(){
        valiPerm(Session::get('perm'),20);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cgszwuliu');
    }

    /*
    **苏州采购部-苏州物流-查询数据
     */
    public function getZcOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search']['v1'])){
                $map[$data['search']['k1']] = $data['search']['v1'];
            }
            if(!empty($data['search']['vds'])&&!empty($data['search']['vde'])){
                $map['addtime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
            }

            //筛选类别
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('caigou_zc')->page($data['page'],$data['limit'])->where($map)->order('zcid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('caigou_zc')->where($map)->count('zcid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-苏州物流-获取采购单详情
     */
    public function getFhXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['zcid'] = $data['zcid'];
            $d = Db::name('caigou')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-苏州物流-完成装车单
     */
    public function completeSonghuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新装车状态
            Db::table('erp_caigou_zc')->where('zcid',$data['zcid'])->update(array('status'=>2,'zhuangchetime'=>date("Y-m-d H:i:s",time())));
            //批量更新订单明细装车状态
            Db::table('erp_caigou')->where('zcid',$data['zcid'])->update(array('zcstatus'=>2));
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购打款
     */
    public function cgdakuan(){
        valiPerm(Session::get('perm'),21);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cgdakuan');
    }

/*
    **苏州采购部-采购打款-查询数据
     */
    public function getCgDkOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search']['v1'])){
                $map[$data['search']['k1']] = $data['search']['v1'];
            }
            if(!empty($data['search']['vds'])&&!empty($data['search']['vde'])){
                $map['addtime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
            }

            //筛选类别
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('caigou_zk')->page($data['page'],$data['limit'])->where($map)->order('zkid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('caigou_zk')->where($map)->count('zkid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购打款-获取采购单详情
     */
    public function getDkXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['zkid'] = $data['zkid'];
            $d = Db::name('caigou')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州采购部-采购打款-完成装车单
     */
    public function completeDakuan(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新装车状态
            Db::table('erp_caigou_zk')->where('zkid',$data['zkid'])->update(array('status'=>2,'zktime'=>date("Y-m-d H:i:s",time()),'note'=>$data['note'],'shifu'=>$data['shifu']));
            //批量更新订单明细装车状态
            Db::table('erp_caigou')->where('zkid',$data['zkid'])->update(array('zkstatus'=>1));
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通采购部-申请采购
     */
    public function cgapply(){
        valiPerm(Session::get('perm'),22);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cgapply');
    }

    /*
    **南通采购部-采购查询
     */
    public function cxorder(){
        valiPerm(Session::get('perm'),28);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cxorder');
    }

    /*
    **南通采购部-南通物流
     */
    public function cgntwuliu(){
        valiPerm(Session::get('perm'),23);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.caigou'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('cgntwuliu');
    }

    /*
    **南通采购部-南通物流-查询数据
     */
    public function getNtZcOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search']['v1'])){
                $map[$data['search']['k1']] = $data['search']['v1'];
            }
            if(!empty($data['search']['vds'])&&!empty($data['search']['vde'])){
                $map['addtime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
            }

            //筛选类别
            $map['status'] = isset($data['status'])?$data['status']:2;
            $d = Db::name('caigou_zc')->page($data['page'],$data['limit'])->where($map)->order('zcid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('caigou_zc')->where($map)->count('zcid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通采购部-南通物流-获取采购单详情
     */
    public function getNtShXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['zcid'] = $data['zcid'];
            $d = Db::name('caigou')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通采购部-南通物流-完成装车单
     */
    public function completeNtShouhuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新装车状态
            Db::table('erp_caigou_zc')->where('zcid',$data['zcid'])->update(array('status'=>3,'completetime'=>date("Y-m-d H:i:s",time())));
            //批量更新订单明细装车状态
            Db::table('erp_caigou')->where('zcid',$data['zcid'])->update(array('zcstatus'=>3));
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

}
