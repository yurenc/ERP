<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Sumao extends Common
{
    /**
     * 订单管理 添加订单入口
     */
    public function jiedan(){
        valiPerm(Session::get('perm'),1);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('jiedan');
    }

    /*
    *订单管理-添加订单-获取用户信息
     */
    public function getKehuInfo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $d = Db::name('kehu')->where([$data['k']=>$data['v']])->find();
            $respond = empty($d)?['empty'=>1]:$d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **订单管理-添加订单-添加数据
     */
    public function addOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //添加订单order_info
            Db::name('order_info')->insert([
                'usercode' => $data['usercode'],
                'username' => $data['username'],
                'xiadantime' => date("Y-m-d H:i:s",time()),
                'yqshtime' => $data['yqshtime'],
                'shaddress' => $data['shaddress'],
                'payment' => $data['payment'],
                'category' => $data['category'],
                'note' => $data['note']
            ]);
            $oid = Db::name('order_info')->getLastInsID();
            $total = 0;
            // 循环添加order_details表
            for ($i=0; $i < count($data['gid']); $i++) {
               Db::name('order_details')->insert([
                    'oid' => $oid,
                    'goods_sn' => $data['gid'][$i].'-'.$data['sizeParma'][$i],
                    'leibie' => $data['leibie'][$i],
                    'brand' => $data['brand'][$i],
                    'type' => $data['type'][$i],
                    'size' => $data['size'][$i],
                    'parma' => $data['parma'][$i],
                    'number' => $data['number'][$i],
                    'price' => $data['price'][$i],
                    'duifang' => $data['duifang'][$i]
               ]);
               $total += $data['price'][$i]*$data['number'][$i];
            }
            // 更新订单总金额
            Db::table('erp_order_info')->where('oid', $oid)->update(['total' => $total]);
            $respond['msg'] = "新增数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **订单管理-订单管理
     */
    public function order(){
        valiPerm(Session::get('perm'),2);//访问权限验证
        $map = array();
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('order');
    }

    /*
    **订单管理-订单管理-查询数据
     */
    public function getOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search']['v1'])){
                $map[$data['search']['k1']] = $data['search']['v1'];
            }
            if(!empty($data['search']['vds'])&&!empty($data['search']['vde'])){
                $map['xiadantime'] = ['between time',[$data['search']['vds'],$data['search']['vde']]];
            }
            //筛选类别
            $map['category'] = isset($data['category'])?$data['category']:'床垫';
            $map['shipping_status'] = empty($data['status'])?['in',[0,1]]:['in',[2,3]];

            $map['status'] = 1;
            $d = Db::name('order_info')->page($data['page'],$data['limit'])->where($map)->order('oid desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('order_info')->where($map)->count('oid'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }
    /*
    **订单管理-订单管理-订单详情
     */
    public function getOrderDetails(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['oid'] = $data['oid'];
            $d = Db::name('order_details')->where($map)->select();
            // 查询库存
            $temp = array();
            foreach ($d as $key => $val) {
               $arr_goods_sn = explode("-",$val['goods_sn']);
               $good_attr = Db::name('goods_attr')->where('attr_id',$arr_goods_sn[1])->find();
               $val['sunum'] = $good_attr['sunum'];
               $temp[] = $val;
            }
            $respond['data'] = $temp;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **订单管理-订单管理-更新数据
     */
    public function editOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_order')->where('id',$data['id'])->update($data);
            $respond['msg'] = "更新数据成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    **订单管理-订单管理-删除数据
     */
    public function delOrder(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_order_info')->where('oid',$data['oid'])->update(array('status'=>0));
            $respond['msg'] = "删除数据成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **订单管理-订单管理-订单发货
     */
    public function shipping(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $oid = $data['oid'];
            $goods = Db::name('order_details')->where(['oid'=>$oid,'isdelete'=>0])->select();
            $ifnokucun = 0;
            foreach($goods as $val){
                $arr_goods_sn = explode("-",$val['goods_sn']);
                $good_attr = Db::name('goods_attr')->where('attr_id',$arr_goods_sn[1])->find();
                if($good_attr['sunum']<$val['number']){
                    $ifnokucun = 1;
                }
            }
            // 如果订单中有产品库存不足
            if($ifnokucun){
                $respond['msg'] = "抱歉，该订单有产品库存不足，请先补足！";
                return $respond;exit;
            }
            //添加要货订单
            $order_info = Db::name('order_info')->where('oid',$oid)->find();
            $kehu = Db::name('kehu')->where('id',$order_info['usercode'])->find();
            $fhdata = [
                'title'     =>  '以马内利发货单',
                'oid'       =>  $oid,
                'category'  =>    $order_info['category'],
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname'),
                'uid'     =>  $order_info['usercode'],
                'uname'     =>  $order_info['username'],
                'wuliu'     =>  $kehu['wuliu'],
                'mobile'     =>  $kehu['mobile'],
                'payment'     =>  $order_info['payment'],
                'fahuodi'     =>  1,//苏州发货
                'total'     => $order_info['total']
            ];
            Db::name('order_fh')->insert($fhdata);
            // 更新订单的发货状态
            Db::table('erp_order_info')->where('oid',$oid)->update(array('shipping_status'=>2));

            $respond['msg'] = "恭喜发货开单成功！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }


    /*
    **订单管理-订单管理-添加发货单
     */
    public function addFahuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            if($data['fahuodi']==1){
                $title='以马内利发货单';
            }else{
                $title="以马内利发货单（南通代发）";
            }
            //添加要货订单
            $fhdata = [
                'title'     =>  $title,
                'category'  =>    $data['shuju'][0]['category'],
                'addtime'   =>  date("Y-m-d H:i:s",time()),
                'admin'     =>  Session::get('uname'),
                'uid'     =>  $data['userInfo']['uid'],
                'uname'     =>  $data['userInfo']['uname'],
                'wuliu'     =>  $data['userInfo']['wuliu'],
                'mobile'     =>  $data['userInfo']['mobile'],
                'payment'     =>  $data['userInfo']['payment'],
                'fahuodi'     =>  $data['fahuodi'],
                'total'     => $data['total']
            ];
            Db::name('order_fh')->insert($fhdata);
            $fhId = Db::name('order_fh')->getLastInsID();
            //循环更改要货状态和要货ID
            foreach ($data['shuju'] as $key => $val) {
                Db::table('erp_order')->where('id',$val['id'])->update(array('fhstatus'=>1,'fhid'=>$fhId));
            }
            $respond['msg'] = "恭喜成功添加发货单！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **订单管理-订单管理-获取客户信息
     */
    public function getUserInfo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['id'] = $data['usercode'];
            $d = Db::name('kehu')->where($map)->find();
            return $d;
        }else{
           $this->error('非法请求');
        }
    }

    /*
    **苏州仓库管理-出入库流水
     */
    public function sukurecord(){
        valiPerm(Session::get('perm'),3);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('sukurecord');
    }
    /*
    **苏州仓库管理-出入库流水-查询数据
     */
    public function getSukuRecord(){
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

            $map['cangku'] = 1;//苏州仓库
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
    **苏州仓库管理-库存统计
     */
    public function sukucun(){
        valiPerm(Session::get('perm'),4);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('sukucun');
    }

    public function addBeihuo(){
        $data = Request::instance()->post();
        $goods_attr = Db::name('goods_attr')->where('attr_id',$data['attr_id'])->find();
        $good = Db::name('goods')->where('id',$goods_attr['gid'])->find();
        $beihuo = [
                    'attr_id'  =>  $data['attr_id'],
                    'category'  =>  $good['category'],
                    'leibie'  =>  $good['leibie'],
                    'brand'  =>  $good['brand'],
                    'type'  =>  $good['type'],
                    'size'  =>  $goods_attr['size'],
                    'parma'  =>  $goods_attr['parma'],
                    'jianshu'  =>  $goods_attr['jianshu'],
                    'sudf'  =>  $goods_attr['sudf'],
                    'nandf'  =>  $goods_attr['nandf'],
                    'number'  =>  $data['beihuonum'],
                    'cangku'  =>  $data['ck'],
                    'addtime'  =>  date('Y-m-d H:i:s',time()),
            ];
        Db::name('beihuo')->insert($beihuo);
        $respond['msg']='备货成功';
        return $respond;
    }

    /*
    **苏州物流管理-发货管理
     */
    public function songhuo(){
        valiPerm(Session::get('perm'),5);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('songhuo');
    }

    /*
    **苏州物流管理-发货管理-查询数据
     */
    public function getFhOrder(){
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
            $map['fahuodi'] = 1;
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
    **苏州物流管理-发货管理-获取收货单详情
     */
    public function getFhXiangqing(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['oid'] = $data['oid'];
            $d = Db::name('order_details')->where($map)->select();
            $respond['data'] = $d;
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州物流管理-发货管理-完成发货单
     */
    public function completeFahuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新发货状态
            Db::table('erp_order_fh')->where('fhid',$data['fhid'])->update(array('status'=>2,'fhtime'=>date("Y-m-d H:i:s",time())));
            //同时去库存
            $fh_order = Db::name('order_fh')->where('fhid',$data['fhid'])->find();
            $d = Db::name('order_details')->where('oid',$fh_order['oid'])->select();
            // var_dump($d);
            foreach ($d as $k => $v) {
                //更新库存数
                $arr_goods_sn = explode("-",$v['goods_sn']);
                Db::table('erp_goods_attr')->where('attr_id',$arr_goods_sn[1])->setDec('sunum',$v['number']);
                //添加库存流水记录
                $cangku_log = [
                        'oid'  =>  $fh_order['oid'],
                        'uid'  =>  $fh_order['uid'],
                        'category'  =>  $fh_order['category'],
                        'leibie'  =>  $v['leibie'],
                        'brand'  =>  $v['brand'],
                        'type'  =>  $v['type'],
                        'size'  =>  $v['size'],
                        'parma'  =>  $v['parma'],
                        'duifang'  =>  $v['duifang'],
                        'cangku'  =>  1,
                        'change'  =>  0-$v['number'],
                        'addtime'  =>  date('Y-m-d H:i:s',time()),
                ];
                Db::name('cangku_log')->insert($cangku_log);
            }
            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州物流管理-收货管理
     */
    public function shouhuo(){
        valiPerm(Session::get('perm'),6);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('shouhuo');
    }

    /*
    **苏州物流管理-收货管理-查询数据
     */
    public function getShOrder(){
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
            $map['status'] = isset($data['status'])?$data['status']:2;
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
    **苏州物流管理-收货管理-获取收货单详情
     */
    public function getShXiangqing(){
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
    **苏州物流管理-收货管理-完成收货单
     */
    public function completeShouhuo(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新装车状态
            Db::table('erp_order_zc')->where('zcid',$data['zcid'])->update(array('status'=>3,'completetime'=>date('Y-m-d H:i:s',time())));
            //批量更新订单明细装车状态和要货状态
            Db::table('erp_order')->where('zcid',$data['zcid'])->setInc('zcstatus');
            Db::table('erp_order')->where('zcid',$data['zcid'])->setInc('yhstatus');
            //同时如果仓库有记录，就去库存
            $d = Db::name('order')->where('zcid',$data['zcid'])->select();
            foreach ($d as $k => $v) {
                // 如果是苏州备货，则入库后自动完成
                if($v['bhdi']==1){
                    Db::table('erp_order')->where('id',$v['id'])->update(array('bhstatus'=>2));
                }
                //检查该产品仓库里是否有库存
                $c = Db::name('cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 1))->find();
                if(empty($c)){
                    //无记录就添加新的记录
                    $cangku = [
                        'category'  =>  $v['category'],
                        'brand'     =>  $v['brand'],
                        'type'      =>  $v['type'],
                        'size'      =>  $v['size'],
                        'parma'     =>  $v['parma'],
                        'number'    =>  $v['number'],
                        'duifang'   =>  $v['duifang'],
                        'leibie'    =>  $v['leibie'],
                        'cangku'    =>  1
                    ];
                    Db::name('cangku')->insert($cangku);
                    //添加仓库流水记录
                    $cangku_log = $cangku;
                    $cangku_log['change'] = $cangku['number'];
                    $cangku_log['addtime'] = date('Y-m-d H:i:s',time());
                    Db::name('cangku_log')->insert($cangku_log);
                }else{
                    //有记录就更新库存数
                    $number = $c['number']+$v['number'];
                    Db::table('erp_cangku')->where(array('brand'=>$v['brand'],'type'=>$v['type'],'size'=>$v['size'],'parma'=>$v['parma'],'leibie'=>$v['leibie'],'cangku' => 1))->update(array('number'=>$number));
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
    **苏州物流管理-客户确认
     */
    public function kehuqueren(){
        valiPerm(Session::get('perm'),7);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.sumao'),
            'controller'    =>request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('kehuqueren');
    }

    /*
    **苏州物流管理-客户确认-查询数据
     */
    public function getKhqrOrder(){
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
            $map['status'] = isset($data['status'])?$data['status']:2;
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
    **苏州物流管理-客户确认-确认客户收货
     */
    public function completeKhqr(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            //更新发货状态
            Db::table('erp_order_fh')->where('fhid',$data['fhid'])->update(array('status'=>3,'wctime'=>date('Y-m-d H:i:s',time())));

            $respond['msg'] = "订单完成！工作之余要注意休息哟！";
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }



}
