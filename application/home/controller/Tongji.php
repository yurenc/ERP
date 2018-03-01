<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Tongji extends Common
{
    /*
    **统计报表-月销统计
     */
    public function monthtj(){
        valiPerm(Session::get('perm'),24);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.tongji'),
            'controller'    =>  request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('monthtj');
    }

    /*
    **统计报表-月销统计-数据查询
     */
    public function getMonthtj(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $year = isset($data['yearTj'])?$data['yearTj']:date('Y',time());
            $tjCdData = Db::query("select sum(number) as number ,date_format(yqshtime, '%m') as month from erp_order where category='床垫' AND isdelete=0 AND yqshtime between '".$year."-01-01' AND '".$year."-12-31' group by date_format(yqshtime, '%Y-%m');");
            $tjRtsfData = Db::query("select sum(number) as number ,date_format(yqshtime, '%m') as month from erp_order where category='软体沙发' AND isdelete=0 AND yqshtime between '".$year."-01-01' AND '".$year."-12-31' group by date_format(yqshtime, '%Y-%m');");
            $dd = getTjData($tjCdData,$tjRtsfData);
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  12,
                'year'  =>  $year,
                'max'   =>  $dd['max'],
                'data'  =>  $dd['data'],
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    /*
    **统计报表-供应商统计
     */
    public function suppliertj(){
        $this->assign([
            'nav'           =>  config('menu.tongji'),
            'controller'    =>  request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('suppliertj');
    }

    /*
    **统计报表-销量排行
     */
    public function paihangtj(){
        valiPerm(Session::get('perm'),25);//访问权限验证
        $this->assign([
            'nav'           =>  config('menu.tongji'),
            'controller'    =>  request()->controller(),
            'action'        =>  request()->action(),
        ]);
        return $this->fetch('paihangtj');
    }

    /*
    **统计报表-销量排行-查询数据
     */
    public function getPaihangtj(){
        if(Request::instance()->isPost()){
            $data = Request::instance()->post();
            $month = isset($data['monthTj'])?$data['monthTj']:date('Y-m',time());
            $category = isset($data['category'])?$data['category']:'床垫';
            $tjPhData = Db::query("select type ,SUM(number) as total from erp_order where category='".$category."' AND isdelete=0 AND yqshtime between '".$month."-01' AND '".$month."-31' group by type order by total Desc");
            $respond = [
                'code'  =>  0,
                'msg'   =>  "success",
                'count' =>  12,
                'data'  =>  $tjPhData,
            ];
            return $respond;
        }else{
            $this->error('非法请求');
        }
    }

    // 整站徽章统计
    public function getHz()
    {
        $respond = array();
        //苏州贸易部 订单统计
        $respond['sumao_order'] = Db::name('order')->where(['isdelete'=>0,'fhstatus'=>['neq',3]])->count('id');
        //苏州贸易部 发货管理
        $respond['sumao_songhuo'] = Db::name('order_fh')->where(['status'=>1,'fahuodi'=>1])->count('fhid');
        //苏州贸易部 收货管理
        $respond['sumao_shouhuo'] = Db::name('order_zc')->where(['status'=>2])->count('zcid');
        //苏州贸易部 客户确认
        $respond['sumao_kehuqueren'] = Db::name('order_fh')->where(['status'=>2])->count('fhid');

        //南通生产部 业务订单
        $respond['nansheng_yworder'] = Db::name('order')->where(['isdelete'=>0,'yhstatus'=>1])->count('id');
        //南通生产部 生产订单
        $respond['nansheng_scorder'] = Db::name('order_sc')->where(['status'=>1])->count('scid');
        //南通生产部 装车管理
        $respond['nansheng_songhuo'] =Db::name('order_zc')->where(['status'=>1])->count('zcid');
        //南通生产部 南通代发
        $respond['nansheng_daifa'] = Db::name('order_fh')->where(['status'=>1,'fahuodi'=>2])->count('fhid');

        $respond=array_filter($respond);
        return $respond;
    }
}
