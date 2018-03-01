<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Goods extends Common
{
    /*
    **产品数据-产品统计
     */
    public function goods(){
        $this->assign([
            'nav'           =>  config('menu.system'),
            'controller'    =>  request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('index');
    }

    /*
    **产品数据-获取产品数据
     */
    public function getGoods(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map = array();
            // 搜索
            if(!empty($data['search']['v1'])){
                $map[$data['search']['k1']] = $data['search']['v1'];
            }
            //筛选类别
            $map['category'] = isset($data['category'])?$data['category']:'床垫';
            //筛选上架的产品
            $map['status'] = isset($data['status'])?$data['status']:1;
            $d = Db::name('goods')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('goods')->where($map)->count('id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **产品数据-获取产品属性
     */
    public function getGoodsAttr(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $map['gid'] = $data['id'];
            $d = Db::name('goods_attr')->where($map)->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::name('goods_attr')->where($map)->count('attr_id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **产品数据-添加产品
     */
    public function addGood(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            // 判断是否已经存在这个型号
            $data['type'] = trim($data['type']);
            $type = Db::name('goods')->where(['status'=>1,'type'=>$data['type']])->find();
            if(!empty($type)){
                $respond['msg'] = '抱歉，该型号产品已经存在！请勿重复添加！';
                return $respond;
            }
            // 插入数据
            Db::name('goods')->insert([
                'category' => $data['category'],
                'leibie' => $data['leibie'],
                'brand' => $data['brand'],
                'type' => $data['type'],
                'note' => $data['note']
            ]);
            $gid = Db::name('goods')->getLastInsID();
            for ($i=0; $i < count($data['size']); $i++) {
               Db::name('goods_attr')->insert([
                    'gid' => $gid,
                    'size' => $data['size'][$i],
                    'parma' => $data['parma'][$i],
                    'jianshu' => $data['jianshu'][$i],
                    'sunum' => $data['sunum'][$i],
                    'nannum' => $data['nannum'][$i],
                    'sudf' => $data['sudf'][$i],
                    'nandf' => $data['nandf'][$i],
                    'price' => $data['price'][$i],
               ]);
            }
            // 添加修改记录
            $log = [
                'action' => '添加产品',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('goods_log')->insert($log);
            $respond['msg'] = '恭喜！产品添加成功！';
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **产品数据-编辑产品
     */
    public function editGood(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            // dump($data);exit;
            Db::table('erp_goods')->where('id',$data['gid'])->update([
                'category' => $data['category'],
                'leibie' => $data['leibie'],
                'brand' => $data['brand'],
                'type' => $data['type'],
                'note' => $data['note']
            ]);
            // 批量更行属性
            for ($i=0; $i < count($data['size']); $i++) {
                if(!empty($data['attr_id'][$i])){
                    Db::table('erp_goods_attr')->where('attr_id',$data['attr_id'][$i])->update([
                        'size' => $data['size'][$i],
                        'parma' => $data['parma'][$i],
                        'jianshu' => $data['jianshu'][$i],
                        'sunum' => $data['sunum'][$i],
                        'nannum' => $data['nannum'][$i],
                        'sudf' => $data['sudf'][$i],
                        'nandf' => $data['nandf'][$i],
                        'price' => $data['price'][$i],
                    ]);
                }else{
                   Db::name('goods_attr')->insert([
                        'gid' => $data['gid'],
                        'size' => $data['size'][$i],
                        'parma' => $data['parma'][$i],
                        'jianshu' => $data['jianshu'][$i],
                        'sunum' => $data['sunum'][$i],
                        'nannum' => $data['nannum'][$i],
                        'sudf' => $data['sudf'][$i],
                        'nandf' => $data['nandf'][$i],
                        'price' => $data['price'][$i],
                   ]);
                }
            }
            // 批量删除属性
            if(isset($data['delattr'])){
                for ($i=0; $i < count($data['delattr']); $i++) {
                    Db::table('erp_goods_attr')->where('attr_id',$data['delattr'][$i])->delete();
                }
            }
            // 添加修改记录
            $log = [
                'action' => '修改产品',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('goods_log')->insert($log);
            $respond['msg'] = '恭喜！产品编辑成功！';
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **产品数据-下架产品
     */
    public function delGood(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_goods')->where('id',$data['id'])->update([
                'status' => 0,
            ]);
            $respond['msg'] = '产品下架成功！';
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **库存统计-查询数据
     */
    public function getKucun(){
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
            $map['cangku'] = 1;//苏州仓库
            $d = Db::table('erp_goods')->alias('g')->join('erp_goods_attr ga','g.id=ga.gid')->where("g.status=1 AND ga.sunum<>0 AND g.category='".$map['category']."'")->order('g.id')->page($data['page'],$data['limit'])->select();
            // $d = Db::name('cangku')->page($data['page'],$data['limit'])->where($map)->order('id desc')->select();
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  Db::table('erp_goods')->alias('g')->join('erp_goods_attr ga','g.id=ga.gid','RIGHT')->where("g.status=1 AND ga.sunum<>0 AND g.category='".$map['category']."'")->count('g.id'),
                'data'  =>  $d,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **苏州仓库管理-修改库存
     */
    public function editKucun(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            Db::table('erp_goods_attr')->where('attr_id',$data['attr_id'])->update([$data['ck']=>$data['changenum']]);
            // 添加修改记录、
            $log = [
                'action' => '修改库存',
                'content' => arrToStr($data),
                'admin' => Session::get('uname'),
                'addtime' => date('Y-m-d H:i:s',time())
            ];
            Db::name('goods_log')->insert($log);
            $respond['msg'] = "更新库存成功！";
            return $respond;
        }else{
            $this->error('非法请求a');
        }
    }

    /*
    *获取产品信息
     */
    public function getType(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $good = Db::name('goods')->where(['status'=>1,'type'=>$data['type']])->find();
            $attrs = Db::name('goods_attr')->where(['gid'=>$good['id']])->select();
            $respond = $good;
            $respond['attr_id'] = array_column($attrs, 'attr_id');
            $respond['size'] = array_column($attrs, 'size');
            $respond['parma'] = array_column($attrs, 'parma');
            $respond['jianshu'] = array_column($attrs, 'jianshu');
            $respond['sunum'] = array_column($attrs, 'sunum');
            $respond['nannum'] = array_column($attrs, 'nannum');
            $respond['sudf'] = array_column($attrs, 'sudf');
            $respond['nandf'] = array_column($attrs, 'nandf');
            $respond['price'] = array_column($attrs, 'price');
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }
    /*
    *根据属性ID，获取属性详情
     */
    public function getAttr(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $attr = Db::name('goods_attr')->where(['attr_id'=>$data['attr_id']])->find();
            return $attr;
        }else{
            $this->error('非法请求');
        }
    }

}
