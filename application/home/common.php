<?php
/*
**关联数组转字符串
 */
function arrToStr($data){
    $b = '';
    foreach($data as $key=>$val){
        if(is_array($val)){
            $c = '(';
            foreach($val as $k=>$v){
                $c .= $k.'=>'.$v.',';
            }
            $c .= ')';
            $b .= $key.'=>'.$c.',';
        }else{
            $b.=$key.'=>'.$val.',';
        }
    }
    return $b;
}
/*
**整理统计月销数据
 */
function getTjData($tjCdData,$tjRtsfData){
    $temp = array();
    $arr_cd = [];
    $arr_sf = [];
    $max = 0;
    for ($i=1; $i<13; $i++) {
        $t = array();
        $t['month'] = $i;
        foreach ($tjCdData as $key => $val) {
            if($val['month']==$i){
                if($val['number']>$max){
                    $max = $val['number'];
                }
                $arr_cd[$i-1] = $val['number'];
            }
        }
        foreach ($tjRtsfData as $k => $v) {
            if($v['month']==$i){
                if($v['number']>$max){
                    $max = $v['number'];
                }
                $arr_sf[$i-1] = $v['number'];
            }
        }
        $arr_cd[$i-1] = isset($arr_cd[$i-1])?$arr_cd[$i-1]:0;
        $arr_sf[$i-1] = isset($arr_sf[$i-1])?$arr_sf[$i-1]:0;
    }
    $temp['max'] = intval($max*1.5);
    $temp['data'][0] = $arr_cd;
    $temp['data'][1] = $arr_sf;
    return $temp;
}
/*
**整理统计月销数据（表格类型）
 */
function getTjDataTable($tjCdData,$tjRtsfData){
    $temp = array();
    for ($i=1; $i<13; $i++) {
        $t = array();
        $t['month'] = $i;
        foreach ($tjCdData as $key => $val) {
            if($val['month']==$i){
                $t['chuangdian'] = $val['number'];
            }
        }
        foreach ($tjRtsfData as $k => $v) {
            if($v['month']==$i){
                $t['shafa'] = $v['number'];
            }
        }
        $t['chuangdian'] = isset($t['chuangdian'])?$t['chuangdian']:0;
        $t['shafa'] = isset($t['shafa'])?$t['shafa']:0;
        $temp[] = $t;
    }
    return $temp;
}

/*
**整理批量复制订单数据
 */
function getCopyData($data){
    $temp = [];
    $t = [];
    foreach ($data as $key => $val) {
        $t['usercode'] = $val['usercode'];
        $t['username'] = $val['username'];
        $t['category'] = $val['category'];
        $t['leibie'] = $val['leibie'];
        $t['brand'] = $val['brand'];
        $t['type'] = $val['type'];
        $t['size'] = $val['size'];
        $t['parma'] = $val['parma'];
        $t['number'] = $val['number'];
        $t['price'] = $val['price'];
        $t['xiadantime'] = date('Y-m-d H:i:s',time());
        $t['yqshtime'] = date('Y-m-d H:i:s',time());
        $t['shaddress'] = $val['shaddress'];
        $t['payment'] = '';
        $t['duifang'] = $val['duifang'];
        $temp[] = $t;
    }
    return $temp;
}
/*
**验证权限函数(增删改版)
**$id:当前所属ID
**$perm:该人所拥有权限
 */
function valiPermZsg($perm,$id){
    if($perm=='all'){
        return false;
    }else{
        $arr_perm = explode(',',$perm);
        if(in_array($id,$arr_perm)){
            return false;
        }else{
            return true;
        }
    }
}
/*
**验证权限函数
**$id:当前所属ID
**$perm:该人所拥有权限
 */
function valiPerm($perm,$id){
    if($perm=='all'){
        return true;
    }else{
        $arr_perm = explode(',',$perm);
        if(in_array($id,$arr_perm)){
            return true;
        }else{
            $html  = "<script>window.onload = function(){";
            $html .= "var layBody = document.getElementById('erp_layui-body');";
            $html .= "layBody.innerHTML = '";
            $html .= "<blockquote class=\"layui-elem-quote layui-quote-nm\">";
            $html .= "抱歉！您没有访问的权限<i class=\"layui-icon\" style=\"font-size: 30px; \">&#xe69c;</i>";
            $html .= "</blockquote>";
            $html .= "';";
            $html .= "}</script>";
            echo $html;
        }
    }
}
/*
**根据订单，重新整理成用户友好的数据
 */
function zhengLiOrder($data){
    $temp = array();
    foreach($data as $k=>$v){
        $v['yhid'] = 'yh-'.$v['yhid'];
        $v['scid'] = 'sc-'.$v['scid'];
        $v['zcid'] = 'zc-'.$v['zcid'];
        $v['fhid'] = 'fh-'.$v['fhid'];
        switch ($v['yhstatus']) {
            case 0:
                $v['yhstatus'] = '-';
                break;
            case 1:
                $v['yhstatus'] = '备货中';
                break;
            case 2:
                $v['yhstatus'] = '苏州到货';
                break;
            default:
                $v['yhstatus'] = '其他';
                break;
        }
        switch ($v['scstatus']) {
            case 0:
                $v['scstatus'] = '-';
                break;
            case 1:
                $v['scstatus'] = '已下单生产';
                break;
            case 2:
                $v['scstatus'] = '生产完成';
                break;
            default:
                $v['scstatus'] = '其他';
                break;
        }
        switch ($v['zcstatus']) {
            case 0:
                $v['zcstatus'] = '-';
                break;
            case 1:
                $v['zcstatus'] = '等待装车';
                break;
            case 2:
                $v['zcstatus'] = '已装车';
                break;
            case 3:
                $v['zcstatus'] = '苏州签收';
                break;
            default:
                $v['zcstatus'] = '其他';
                break;
        }
        switch ($v['fhstatus']) {
            case 0:
                $v['fhstatus'] = '-';
                break;
            case 1:
                $v['fhstatus'] = '待发货';
                break;
            case 2:
                $v['fhstatus'] = '已发货';
                break;
            case 3:
                $v['fhstatus'] = '客户签收';
                break;
            default:
                $v['fhstatus'] = '其他';
                break;
        }
        $temp[] = $v;
    }
    return $temp;
}

/*
**采购财务导出时获取合并单元格数据
 */
function getHebin($data){
    $str = '3';
    $count = count($data);
    for ($i=0; $i < $count; $i++) {
      if(($i+1)<$count){
        if($data[($i+1)]['zkid']!=$data[$i]['zkid']){
            $str.=",".($i+3);
            $str.=";".($i+4);
        }
      }
    }
    $str .=",".($count+2);
    $arr1 = explode(";",$str);
    for($j=0;$j<count($arr1);$j++){
       $arr2[] = explode(",",$arr1[$j]);
    }
    return $arr2;
}

/**
 +----------------------------------------------------------
 * Export Excel | 2013.08.23
 * Author:HongPing <hongping626@qq.com>
 +----------------------------------------------------------
 * @param $expTitle     string File name
 +----------------------------------------------------------
 * @param $expCellName  array  Column name
 +----------------------------------------------------------
 * @param $expTableData array  Table data
 +----------------------------------------------------------
*/
function exportExcel($expTitle,$expCellName,$expTableData){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $xlsTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    vendor("PHPExcel.PHPExcel");

    \think\Loader::import('PHPExcel.PHPExcel');
    $objPHPExcel = new \PHPExcel();

    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
    for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
    }
      // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
      for($j=0;$j<$cellNum;$j++){
        $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
      }
    }

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    \think\Loader::import('PHPExcel.PHPExcel.PHPExcel_IOFactory');
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

/**
 +----------------------------------------------------------
 * Export Excel | 2013.08.23
 * Author:HongPing <hongping626@qq.com>
 +----------------------------------------------------------
 * @param $expTitle     string File name
 +----------------------------------------------------------
 * @param $expCellName  array  Column name
 +----------------------------------------------------------
 * @param $expTableData array  Table data
 +----------------------------------------------------------
*/
function exportCgExcel($expTitle,$expCellName,$expTableData,$hbData){
    $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
    $fileName = $xlsTitle.date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
    $cellNum = count($expCellName);
    $dataNum = count($expTableData);
    vendor("PHPExcel.PHPExcel");

    \think\Loader::import('PHPExcel.PHPExcel');
    $objPHPExcel = new \PHPExcel();

    $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ');

    $objPHPExcel->getActiveSheet(0)->mergeCells('A1:'.$cellName[$cellNum-1].'1');//合并单元格
    foreach($hbData as $val){
        $objPHPExcel->getActiveSheet(0)->mergeCells('A'.$val[0].':A'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('B'.$val[0].':B'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('C'.$val[0].':C'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('D'.$val[0].':D'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('E'.$val[0].':E'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('F'.$val[0].':F'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('G'.$val[0].':G'.$val[1]);
        $objPHPExcel->getActiveSheet(0)->mergeCells('H'.$val[0].':H'.$val[1]);
    }
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle.'  Export time:'.date('Y-m-d H:i:s'));
    for($i=0;$i<$cellNum;$i++){
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'2', $expCellName[$i][1]);
    }
      // Miscellaneous glyphs, UTF-8
    for($i=0;$i<$dataNum;$i++){
      for($j=0;$j<$cellNum;$j++){
        $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+3), $expTableData[$i][$expCellName[$j][0]]);
      }
    }

    header('pragma:public');
    header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
    header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
    \think\Loader::import('PHPExcel.PHPExcel.PHPExcel_IOFactory');
    $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
    $objWriter->save('php://output');
    exit;
}

/**
 +----------------------------------------------------------
 * Import Excel | 2013.08.23
 * Author:HongPing <hongping626@qq.com>
 +----------------------------------------------------------
 * @param  $file   upload file $_FILES
 +----------------------------------------------------------
 * @return array   array("error","message")
 +----------------------------------------------------------
 */
function importExecl($file){
    if(!file_exists($file)){
        return array("error"=>0,'message'=>'file not found!');
    }
    Vendor("PHPExcel.PHPExcel.IOFactory");
    $objReader = PHPExcel_IOFactory::createReader('Excel5');
    try{
        $PHPReader = $objReader->load($file);
    }catch(Exception $e){}
    if(!isset($PHPReader)) return array("error"=>0,'message'=>'read error!');
    $allWorksheets = $PHPReader->getAllSheets();
    $i = 0;
    foreach($allWorksheets as $objWorksheet){
        $sheetname=$objWorksheet->getTitle();
        $allRow = $objWorksheet->getHighestRow();//how many rows
        $highestColumn = $objWorksheet->getHighestColumn();//how many columns
        $allColumn = PHPExcel_Cell::columnIndexFromString($highestColumn);
        $array[$i]["Title"] = $sheetname;
        $array[$i]["Cols"] = $allColumn;
        $array[$i]["Rows"] = $allRow;
        $arr = array();
        $isMergeCell = array();
        foreach ($objWorksheet->getMergeCells() as $cells) {//merge cells
            foreach (PHPExcel_Cell::extractAllCellReferencesInRange($cells) as $cellReference) {
                $isMergeCell[$cellReference] = true;
            }
        }
        for($currentRow = 1 ;$currentRow<=$allRow;$currentRow++){
            $row = array();
            for($currentColumn=0;$currentColumn<$allColumn;$currentColumn++){;
                $cell =$objWorksheet->getCellByColumnAndRow($currentColumn, $currentRow);
                $afCol = PHPExcel_Cell::stringFromColumnIndex($currentColumn+1);
                $bfCol = PHPExcel_Cell::stringFromColumnIndex($currentColumn-1);
                $col = PHPExcel_Cell::stringFromColumnIndex($currentColumn);
                $address = $col.$currentRow;
                $value = $objWorksheet->getCell($address)->getValue();
                if(substr($value,0,1)=='='){
                    return array("error"=>0,'message'=>'can not use the formula!');
                    exit;
                }
                if($cell->getDataType()==PHPExcel_Cell_DataType::TYPE_NUMERIC){
                    $cellstyleformat=$cell->getParent()->getStyle( $cell->getCoordinate() )->getNumberFormat();
                    $formatcode=$cellstyleformat->getFormatCode();
                    if (preg_match('/^([$[A-Z]*-[0-9A-F]*])*[hmsdy]/i', $formatcode)) {
                        $value=gmdate("Y-m-d", PHPExcel_Shared_Date::ExcelToPHP($value));
                    }else{
                        $value=PHPExcel_Style_NumberFormat::toFormattedString($value,$formatcode);
                    }
                }
                if($isMergeCell[$col.$currentRow]&&$isMergeCell[$afCol.$currentRow]&&!empty($value)){
                    $temp = $value;
                }elseif($isMergeCell[$col.$currentRow]&&$isMergeCell[$col.($currentRow-1)]&&empty($value)){
                    $value=$arr[$currentRow-1][$currentColumn];
                }elseif($isMergeCell[$col.$currentRow]&&$isMergeCell[$bfCol.$currentRow]&&empty($value)){
                    $value=$temp;
                }
                $row[$currentColumn] = $value;
            }
            $arr[$currentRow] = $row;
        }
        $array[$i]["Content"] = $arr;
        $i++;
    }
    spl_autoload_register(array('Think','autoload'));//must, resolve ThinkPHP and PHPExcel conflicts
    unset($objWorksheet);
    unset($PHPReader);
    unset($PHPExcel);
    unlink($file);
    return array("error"=>1,"data"=>$array);
}

