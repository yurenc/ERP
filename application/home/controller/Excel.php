<?php
namespace app\home\controller;

use app\home\controller\Common;
use think\Db;
use think\Request;
use think\Session;

class Excel extends Common
{
    // 业务接单的导出
    public function expOrder(){
        if(Request::instance()->isGet()){
            $data = Request::instance()->get();
            $map = array();
            // 搜索
            if(!empty($data['v1'])){
                $map[$data['k1']] = $data['v1'];
            }
            if(!empty($data['vds'])&&!empty($data['vde'])){
                $map['xiadantime'] = ['between time',[$data['vds'],$data['vde']]];
            }
            if(!empty($data['v3'])){
                $map[$data['k3']] = $data['v3'];
            }
            if(!empty($data['v4'])){
                $map[$data['k4']] = $data['v4'];
            }
            if(!empty($data['v5'])){
                $map[$data['k5']] = $data['v5'];
            }
            if(!empty($data['v6'])){
                $map[$data['k6']] = $data['v6'];
            }
            //筛选类别
            $map['category'] = isset($data['category'])?$data['category']:'床垫';
            //筛选回收站
            $map['isdelete'] = isset($data['isdelete'])?$data['isdelete']:0;
///////////////////
        $xlsName  = "Order";
        $xlsCell  = array(
            array('id','编号'),
            array('usercode','用户编号'),
            array('username','客户简称'),
            array('category','分类'),
            array('leibie','类别'),
            array('brand','品牌'),
            array('type','型号'),
            array('size','规格'),
            array('parma','布号/方向'),
            array('number','数量'),
            array('price','单价'),
            array('xiadantime','下单日期'),
            array('yqshtime','要求送货日期'),
            array('shaddress','送货地址'),
            array('payment','收款方式'),
            array('duifang','堆放区域'),
            array('note','备注'),
            array('yhstatus','要货状态'),
            array('scstatus','生产状态'),
            array('zcstatus','南通装车状态'),
            array('fhstatus','发货状态'),
            array('yhid','要货单号'),
            array('scid','生产单号'),
            array('zcid','装车单号'),
            array('fhid','发货单号'),
        );
        $dataOrder  = Db::name('order')->where($map)->select();
        // dump($dataOrder);exit;
        $xlsData = zhengLiOrder($dataOrder);
        exportExcel($xlsName,$xlsCell,$xlsData);
///////////////
        }else{
            $this->error('非法请求');
        }
    }

    // 采购订单的导出
    public function expCgOrder(){
        if(Request::instance()->isGet()){
            $data = Request::instance()->get();
            // 搜索
            $where = '';
            $status = isset($data['status'])?$data['status']:1;
            $where .= 'status='.$status;
            if(!empty($data['v1'])){
                $where .= ' AND '.$data['k1'].'='.$data['v1'];
            }
            if(!empty($data['vds'])&&!empty($data['vde'])){
                $where .= ' AND addtime between \''.$data['vds'].'\' AND \''.$data['vde'].'\'';
            }

///////////////////
        $xlsName  = "CgOrder";
        $xlsCell  = array(
            array('zkid','转款ID'),
            array('zksupplier','供应商'),
            array('danhao','单号'),
            array('zktotal','总计'),
            array('shifu','实付'),
            array('addtime','添加时间'),
            array('zktime','转款时间'),
            array('zknote','备注'),
            array('caigoutime','采购时间'),
            array('type','型号'),
            array('pinming','品名'),
            array('size','规格'),
            array('danwei','单位'),
            array('price','单价'),
            array('number','数量'),
        );
        $sql="SELECT * FROM (SELECT zkid,supplier as zksupplier,danhao,total as zktotal,shifu,addtime,zktime,note as zknote,status FROM erp_caigou_zk WHERE ".$where." ORDER BY danhao) as z  LEFT JOIN erp_caigou as c ON z.zkid=c.zkid";
        $dataOrder  = Db::query($sql);
        // dump($dataOrder);exit;
        $hbData = getHebin($dataOrder);
        // dump($hbData);exit;
        exportCgExcel($xlsName,$xlsCell,$dataOrder,$hbData);
///////////////
        }else{
            $this->error('非法请求');
        }
    }

    //导入的demo 未调试  ！！
    public function impUser(){
     if(isset($_FILES["import"]) && ($_FILES["import"]["error"] == 0)){
        $result = $this->importExecl($_FILES["import"]["tmp_name"]);
        if($result["error"] == 1){
          $execl_data = $result["data"][0]["Content"];
                  foreach($execl_data as $k=>$v){
                      //..这里写你的业务代码..
                  }
         }
      }
}





}
