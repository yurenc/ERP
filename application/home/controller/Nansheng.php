<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Nansheng extends Common
{
    /*
    **业务部管理-业务订单
     */
    public function yworder(){
        valiPerm(Session::get('perm'),8);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('yworder');
    }

    /*
    **业务部管理-业务订单-查询数据
     */
    public function getOrder(){
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
            $map['status'] = 1;//查询苏州发过来的要货数据

            $d = Db::name('beihuo')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            // dump($d);exit;
            // $d = Db::name('order')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('beihuo')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-业务订单-添加生产单
     */
    public function addShengchan(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //添加要货订单
            $yhdata = [
                'title'     =>  '南通'.$data['shuju'][0]['category'].'生产单',
                'category'  =>    $data['shuju'][0]['category'],
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname')
            ];
            Db::name('order_sc')->insert($yhdata);
            $scId = Db::name('order_sc')->getLastInsID();
            //循环更改要货状态和要货ID
            foreach ($data['shuju'] as $key => $val) {
                Db::table('erp_order')->where('id',$val['id'])->update(array('scstatus'=>1,'scid'=>$scId));
            }
            $respond['msg'] = "恭喜添加生产单成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-业务订单-添加装车单
     */
    public function addZhuangche(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //添加要货订单
            $yhdata = [
                'title'     =>  '南通'.$data['shuju'][0]['category'].'装车单',
                'category'  =>    $data['shuju'][0]['category'],
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname')
            ];
            Db::name('order_zc')->insert($yhdata);
            $zcId = Db::name('order_zc')->getLastInsID();
            //循环更改要货状态和要货ID
            foreach ($data['shuju'] as $key => $val) {
                Db::table('erp_order')->where('id',$val['id'])->update(array('zcstatus'=>1,'zcid'=>$zcId));
            }
            $respond['msg'] = "恭喜添加装车单成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-生产订单
     */
    public function scorder(){
        valiPerm(Session::get('perm'),9);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('scorder');
    }

    /*
    **业务部管理-生产订单-查询数据
     */
    public function getScOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
                if(isset($data['search']['k2'])){
                    $map['addtime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
                }
            }
            //筛选类别
            $map['category'] = isset($data['category'])?$data['category']:'床垫';
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('order_sc')->page($data['page'],$data['limit'])->where($map)->order('scid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('order_sc')->where($map)->count('scid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-生产订单-获取生产单详情
     */
    public function getXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['scid'] = $data['scid'];
            $d = Db::name('order')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **业务部管理-业务订单-完成生产单
     */
    public function completeShengchan(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新订单状态记录完成时间
            Db::table('erp_order_sc')->where('scid',$data['scid'])->update(array('status'=>2,'completetime'=>date("Y-m-d H:i:s",time())));
            //批量更新订单明细生产状态
            Db::table('erp_order')->where('scid',$data['scid'])->setInc('scstatus');
            //同时添加入库操作，仓库没有的添加库存
            $d = Db::name('order')->where('scid',$data['scid'])->select();
            foreach ($d as $k => $v) {
                // 如果是南通南通备货，则入库后自动完成
                // if($v['bhdi']==2){
                //     Db::table('erp_order')->where('id',$v['id'])->update(array('bhstatus'=>2));
                // }
                // 根据good_sn自动入库
                $attr_id = explode("-",$v['goods_sn']);
                Db::table('erp_goods_attr')->where('attr_id',$attr_id)->setInc('nannum',"未完");

                //检查该产品仓库里是否有库存
                $c = Db::name('cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->find();
                if(empty($c)){
                    //无记录就添加新的记录
                    $cangku = [
                        'category' => $v['category'],
                        'brand' => $v['brand'],
                        'type' => $v['type'],
                        'size' => $v['size'],
                        'parma' => $v['parma'],
                        'number' => $v['number'],
                        'duifang' => $v['duifang'],
                        'leibie'=>$v['leibie'],
                        'cangku' => 2
                    ];
                    Db::name('cangku')->insert($cangku);
                    //添加仓库流水记录
                    $cangku_log = $cangku;
                    $cangku_log['change'] = $cangku['number'];
                    $cangku_log['addtime'] = date('Y-m-d H:i:s',time());
                    Db::name('cangku_log')->insert($cangku_log);
                }else{
                    //有记录就更新库存数
                    $number = $v['number']+$c['number'];
                    Db::table('erp_cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->update(array('number'=>$number));
                    //添加仓库流水记录
                    $cangku_log = [
                        'oid'  =>  $v['id'],
                        'uid'  =>  $v['usercode'],
                        'category'  =>  $c['category'],
                        'leibie'  =>  $c['leibie'],
                        'brand'  =>  $c['brand'],
                        'type'  =>  $c['type'],
                        'size'  =>  $c['size'],
                        'parma'  =>  $c['parma'],
                        'jianshu'  =>  $c['jianshu'],
                        'number'  =>  $number,
                        'duifang'  =>  $c['duifang'],
                        'cangku'  =>  $c['cangku'],
                        'change'  =>  $v['number'],
                        'addtime'  =>  date('Y-m-d H:i:s',time()),
                    ];
                    Db::name('cangku_log')->insert($cangku_log);
                }
            }
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通仓库管理-出入库流水
     */
    public function nankurecord(){
        valiPerm(Session::get('perm'),10);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('nankurecord');
    }

    /*
    **南通仓库管理-出入库流水-查询数据
     */
    public function getNankuRecord(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(isset($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
                if(isset($data['search']['k2'])){
                    $map[$data['search']['k2']] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
                }
            }
            //筛选分类
            $map['category'] = isset($data['category'])?$data['category']:'床垫';

            $map['cangku'] = 2;//南通仓库
            $d = Db::name('cangku_log')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('cangku_log')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通仓库管理-库存统计
     */
    public function nankucun(){
        valiPerm(Session::get('perm'),11);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('nankucun');
    }

    /*
    *南通仓库管理-库存统计-添加订单检验产品是否重复
     */
    public function checkChongfu(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array('brand'=>$data['brand'],'type'=>$data['type'],'size'=>$data['size'],'parma'=>$data['parma'],'leibie'=>$data['leibie'],'cangku' => 2);
            if(isset($data['id'])){
                $map['id'] = ['neq',$data['id']];
            }
            $d = Db::name('cangku')->where($map)->find();
            $respond = empty($d)?0:1;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通仓库管理-库存统计-查询数据
     */
    public function getNanku(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(isset($data['search'])){
                if(!empty($data['search']['v1'])){
                    $map[$data['search']['k1']] = $data['search']['v1'];
                }
            }
            //筛选分类
            $map['category'] = isset($data['category'])?$data['category']:'床垫';

            $map['status'] = 1;//筛选上架中的产品
            $map['cangku'] = 2;//南通仓库
            $d = Db::name('cangku')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('cangku')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通仓库管理-库存统计-添加数据
     */
    public function addNanku(){
        if(Request::instance()->isPost()){
            if(valiPermZsg(Session::get('perm'),27)){
                $respond['msg'] = "抱歉！无操作权限";
                return $respond;
            }//访问权限验证
            $data = Request::instance()->post();
            $data['cangku'] = 2;    //添加到南通仓库
            Db::name('cangku')->insert($data);
            // 添加修改记录、
            $log = [
                'action' => '添加数据',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'cangku' => 2,
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('cangku_xglog')->insert($log);
            $respond['msg'] = "新增数据成功！";
        }else{
            $this->error('非法请求');
        }
        return $respond;
    }

    /*
    **南通仓库管理-库存统计-更新数据
     */
    public function editNanku(){
        if(Request::instance()->isPost()){
            if(valiPermZsg(Session::get('perm'),27)){
                $respond['msg'] = "抱歉！无操作权限";
                return $respond;
            }//访问权限验证
            $data = Request::instance()->post();
            Db::table('erp_cangku')->where('id',$data['id'])->update($data);
            // 添加修改记录、
            $log = [
                'action' => '更新数据',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'cangku' => 2,
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('cangku_xglog')->insert($log);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **南通仓库管理-库存统计-删除数据
     */
    public function delNanku(){
        if(Request::instance()->isPost()){
            if(valiPermZsg(Session::get('perm'),27)){
                $respond['msg'] = "抱歉！无操作权限";
                return $respond;
            }//访问权限验证
            $data = Request::instance()->post();
            Db::table('erp_cangku')->where('id',$data['id'])->update(array('status'=>0));
            // 添加修改记录、
            $log = [
                'action' => '删除数据',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'cangku' => 2,
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('cangku_xglog')->insert($log);
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **南通物流管理-发货管理
     */
    public function songhuo(){
        valiPerm(Session::get('perm'),12);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('songhuo');
    }

    /*
    **南通物流管理-发货管理-查询数据
     */
    public function getZcOrder(){
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
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('order_zc')->page($data['page'],$data['limit'])->where($map)->order('zcid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('order_zc')->where($map)->count('zcid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通物流管理-发货管理-获取生产单详情
     */
    public function getFhXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['zcid'] = $data['zcid'];
            $d = Db::name('order')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通物流管理-发货管理-完成装车单
     */
    public function completeSonghuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新装车状态
            Db::table('erp_order_zc')->where('zcid',$data['zcid'])->update(array('status'=>2,'zhuangchetime'=>date("Y-m-d H:i:s",time())));
            //批量更新订单明细装车状态
            Db::table('erp_order')->where('zcid',$data['zcid'])->setInc('zcstatus');
            //同时如果仓库有记录，就去库存
            $d = Db::name('order')->where('zcid',$data['zcid'])->select();
            foreach ($d as $k => $v) {
                //检查该产品仓库里是否有库存
                $c = Db::name('cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->find();
                if(empty($c)){

                }else{
                    //有记录就更新库存数
                    $number = $c['number']-$v['number'];
                    Db::table('erp_cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->update(array('number'=>$number));
                    //添加仓库流水记录
                    $cangku_log = [
                        'oid'  =>  $v['id'],
                        'uid'  =>  $v['usercode'],
                        'category'  =>  $c['category'],
                        'leibie'  =>  $c['leibie'],
                        'brand'  =>  $c['brand'],
                        'type'  =>  $c['type'],
                        'size'  =>  $c['size'],
                        'parma'  =>  $c['parma'],
                        'jianshu'  =>  $c['jianshu'],
                        'number'  =>  $number,
                        'duifang'  =>  $c['duifang'],
                        'cangku'  =>  $c['cangku'],
                        'change'  =>  0-$v['number'],
                        'addtime'  =>  date('Y-m-d H:i:s',time()),
                    ];
                    Db::name('cangku_log')->insert($cangku_log);
                }
            }
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通物流管理-南通代发
     */
    public function daifa(){
        valiPerm(Session::get('perm'),13);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('daifa');
    }

/*
    **南通物流管理-南通代发-查询数据
     */
    public function getDfOrder(){
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
            $map['status'] = isset($map['status'])?$map['status']:1;
            $map['fahuodi'] = 2;
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
    **南通物流管理-南通代发-获取代发单详情
     */
    public function getDfXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['fhid'] = $data['fhid'];
            $d = Db::name('order')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通物流管理-南通代发-完成代发单
     */
    public function completeDaifa(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新发货状态
            Db::table('erp_order_fh')->where('fhid',$data['fhid'])->update(array('status'=>2,'fhtime'=>date("Y-m-d H:i:s",time())));
            //批量更新订单明细装车状态
            Db::table('erp_order')->where('fhid',$data['fhid'])->setInc('fhstatus');
            //同时如果仓库有记录，就去库存
            $d = Db::name('order')->where('fhid',$data['fhid'])->select();
            foreach ($d as $k => $v) {
                //检查该产品仓库里是否有库存
                $c = Db::name('cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->find();
                if(empty($c)){

                }else{
                    //有记录就更新库存数
                    $number = $c['number']-$v['number'];
                    Db::table('erp_cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 2))->update(array('number'=>$number));
                    //添加仓库流水记录
                    $cangku_log = [
                        'oid'  =>  $v['id'],
                        'uid'  =>  $v['usercode'],
                        'category'  =>  $c['category'],
                        'leibie'  =>  $c['leibie'],
                        'brand'  =>  $c['brand'],
                        'type'  =>  $c['type'],
                        'size'  =>  $c['size'],
                        'parma'  =>  $c['parma'],
                        'jianshu'  =>  $c['jianshu'],
                        'number'  =>  $number,
                        'duifang'  =>  $c['duifang'],
                        'cangku'  =>  $c['cangku'],
                        'change'  =>  0-$v['number'],
                        'addtime'  =>  date('Y-m-d H:i:s',time()),
                    ];
                    Db::name('cangku_log')->insert($cangku_log);
                }
            }
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **南通物流管理-收货流水
     */
    public function shouhuo(){

        $this->assign([
            'nav'           =>  config('menu.nansheng'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('shouhuo');
    }




}
