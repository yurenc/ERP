<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/www/web/erp/public_html/public/../application/home/view/nansheng/yworder.html";i:1515490882;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514539775;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>以马内利生产进销存系统</title>
  <link rel="stylesheet" href="/static/layui/css/layui.css">
  <script src="/static/layui/layui.js"></script>
  <script src="/static/js/jquery-3.1.0.js"></script>
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">以马内利生产进销存系统</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item <?php if($controller == 'Index'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('index/index'); ?>">首页</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'Sumao'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Sumao/jiedan'); ?>">苏州贸易部</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'Nansheng'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Nansheng/yworder'); ?>">南通生产部</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'Caigou'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Caigou/cgorder'); ?>">采购管理</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'User'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('User/kehu'); ?>">会员管理</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'Tongji'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Tongji/monthTj'); ?>">财务统计</a>
      </li>
      <li class="layui-nav-item <?php if($controller == 'System' or $controller == 'Goods'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Goods/goods'); ?>">数据中心</a>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
<!--       <li class="layui-nav-item" style="margin-right:20px;">
            <button class="layui-btn layui-btn-warm" id="openNote" onclick="openNote()">备忘</button>
      </li> -->
      <li class="layui-nav-item">
            <button class="layui-btn layui-btn-normal" id="ying" onclick="ying()">隐藏侧栏</button>
      </li>
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="/static/images/touxiang.jpg" class="layui-nav-img">
          <?php echo $uname; ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="javascript:;">基本资料</a></dd>
          <dd><a href="javascript:;">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo url('login/out'); ?>">退了</a></li>
    </ul>
  </div>

  <div class="layui-side layui-bg-black" style="width:180px;">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
        <ul class="layui-nav layui-nav-tree"  lay-filter="test">
          <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
          <li class="layui-nav-item layui-nav-itemed">
            <a class="" href="<?php echo $vo['url']; ?>"><?php echo $vo['name']; ?></a>
            <dl class="layui-nav-child">
              <?php if(is_array($vo['child']) || $vo['child'] instanceof \think\Collection || $vo['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
              <dd <?php if(($action == $v['action']) AND ($controller == $v['controller'])): ?>class="layui-this"<?php endif; ?>><a href="/home/<?php echo $v['controller']; ?>/<?php echo $v['action']; ?>.html" act="<?php echo $v['controller']; ?>_<?php echo $v['action']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['name']; ?></a></dd>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
  </div>

  <div class="erp_body layui-body" id="erp_layui-body" ishide="0" style="height:100%;left:180px;">
    <!-- 内容主体区域 -->
    <script language="javascript" src="/static/js/jquery.jqprint-0.3.js"></script>
<script language="javascript" src="/static/js/jquery-migrate-1.2.1.min.js"></script>
<style type="text/css">
    .layui-table-cell{padding:0 3px;text-align:center;}
    .laytable-cell-checkbox{padding:0 15px;}
    .layui-elem-quote{padding:10px 0;margin-bottom:0;border-left: 1px solid #e2e2e2;border-top: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-radius:4px;}
    .layui-table-view{margin:0;}
</style>
<blockquote class="layui-elem-quote">
<div class="layui-row">
  <div class="layui-col-md3" style="padding-left:50px;">
    <div class="layui-form layui-input-inline" id="category">
      <input type="radio" name="category" value="床垫" title="床垫" checked lay-filter="dcategory">
      <input type="radio" name="category" value="软体沙发" title="软体沙发" lay-filter="dcategory">
    </div>
  </div>
  <div class="layui-col-md6" id="search1" style="clear:none;margin:0;width:54.16%;">
      <div class="layui-input-inline" style="width:auto;">
        <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
          <option value="type">型号</option>
          <option value="username">用户名</option>
        </select>
      </div>
      <div class="layui-input-inline" style="">
        <input type="text" class="layui-input" name="v1" placeholder="Search for...">
      </div>
      <button class="layui-btn layui-btn-small layui-btn-warm layui-btn-radius" style="    font-size:20px;">+</button>
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="start" placeholder="下单时间段始" autocomplete="off" class="layui-input" id="xdsstart">
    </div>-
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="end" placeholder="下单时间段末" autocomplete="off" class="layui-input" id="xdsend">
    </div>
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
  </div>
  <div class="layui-col-md3" style="width:20.8%;">
    <button class="layui-btn layui-btn-radius layui-btn-normal" onclick="shengchan()">生产</button>
    <button class="layui-btn layui-btn-radius layui-btn-danger" onclick="zhuangche()" style="margin-left:0;">装车</button>
    <button class="layui-btn layui-btn-radius layui-btn-warm" onclick="printId()" style="margin-left:0;">打印身份证</button>
  </div>
</div>
<script type="text/javascript">
layui.use('form', function(){
  var form = layui.form;
  form.on('radio(dcategory)', function(data){
    var category = data.value
    layui.use('table', function(){
        var table = layui.table;
        table.reload('orderTable', {
          url: '<?php echo url('Nansheng/getOrder'); ?>'
          ,where: {'category':category}
          ,height:'full-130'
          ,done: function(res, curr, count){
            //console.log(res);
          }
        });
    });
  });
});
function dosearch(){
    var category = $("#category input[name='category']:checked").val();
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var k2 = 'xiadantime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var search = {}
    if(v1.length!=0){
      search.k1=k1;
      search.v1=v1;
    }
    if((vds.length!=0)&&(vde.length!=0)){
      search.k2=k2;
      search.vds=vds;
      search.vde=vde;
    }
    // console.log(search);
    if(!jQuery.isEmptyObject(search)){
      layui.use('table', function(){
          var table = layui.table;
          table.reload('orderTable', {
            url: '<?php echo url('Nansheng/getOrder'); ?>'
            ,where: {'search':search,'category':category}
            ,height:'full-130'
            ,done: function(res, curr, count){
              //console.log(res);
            }
          });
      });
    }else{
      layer.msg("亲！你得告诉我你要什么！");
    }
}
layui.use('laydate', function(){
  var laydate = layui.laydate;

  laydate.render({
    elem: '#xdsstart' //指定元素
  });

  laydate.render({
    elem: '#xdsend' //指定元素
  });
});
</script>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-130',
    url:'<?php echo url('Nansheng/getOrder'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{checkbox:true}"></th>
        <th lay-data="{field:'id', width:40}">ID</th>
        <th lay-data="{field:'username', width:60}">用户名</th>
        <th lay-data="{field:'leibie', width:60}">类别</th>
        <th lay-data="{field:'brand', width:60}">品牌</th>
        <th lay-data="{field:'type', width:80}">型号</th>
        <th lay-data="{field:'size', width:90}">规格</th>
        <th lay-data="{field:'parma', width:80}">布号/方向</th>
        <th lay-data="{field:'number', width:50}">数量</th>
        <th lay-data="{field:'kucun',width:50,templet:'#kucun'}">库存</th>
        <th lay-data="{field:'xiadantime', width:100}">客户下单时间</th>
        <th lay-data="{field:'yqshtime', width:90}">要求送货日期</th>
        <th lay-data="{field:'shaddress', width:150}">送货地址</th>
        <th lay-data="{field:'note', width:100}">备注</th>
        <th lay-data="{field:'duifang', width:80}">堆放区域</th>
        <th lay-data="{field:'scstatus', width:70, templet: '#scss' }">生产状态</th>
        <th lay-data="{field:'zcstatus', width:70, templet: '#zcss'}">装车状态</th>
        <th lay-data="{field:'bhstatus', width:80, templet: '#bhss'}">备货状态</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="kucun">
{{# d.kucun = getKucun(d.goods_sn); }}
{{# if(d.number>d.kucun){ }}
<span style="color:red;">{{ d.kucun }}</span>
{{# }else{ }}
<span style="color:green;">{{ d.kucun }}</span>
{{# } }}
</script>

<script type="text/javascript">
function getKucun(goods_sn){
  $.ajax({
    url: "<?php echo url('Nansheng/getKucun'); ?>",
    type: 'POST',
    async:false,
    dataType:'json',
    data: {'goods_sn':goods_sn},
    success:function success(res){
       kucun = res.kucun;
    }
  });
  return kucun;
}
</script>

<script type="text/html" id="scss">
  {{#  if(d.scstatus==0){ }}
        -
  {{#  } else if(d.scstatus==1) { }}
        已下单生产
  {{#  } else if(d.scstatus==2) { }}
        生产完成
  {{#  } }}
</script>

<script type="text/html" id="zcss">
  {{#  if(d.zcstatus==0){ }}
        -
  {{#  } else if(d.zcstatus==1) { }}
        等待装车
  {{#  } else if(d.zcstatus==2) { }}
        已装车
  {{#  } else if(d.zcstatus==3) { }}
        苏州签收
  {{#  } }}
</script>

<script type="text/html" id="bhss">
  {{#  if(d.bhstatus==0){ }}
        非备货
  {{#  } else if(d.bhstatus==1) { }}
    {{#  if(d.bhdi==1){ }}
          苏州备货中
    {{#  } else if(d.bhdi==2) { }}
          南通备货中
    {{#  } }}
  {{#  } else if(d.bhstatus==2) { }}
        备货完成
  {{#  } }}
</script>

<script>
    layui.use('table', function(){
        var table = layui.table;
    });
</script>

<!-- 以下是打印身份证 -->
<script type="text/javascript">
function printId(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    if(checkStatus.data.length!=1){
      layer.msg("亲！一次只能打印一张身份证哟！");return false;
    }
    addPrintContent(checkStatus.data[0]);
    var text =$("#printId").html();
    var height = $(window).height()*0.9;
    // console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'打印身份证'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="printIdMsg">'+ text +'</div>'
      ,btn: '关闭全部'
      ,btnAlign: 'c' //按钮居中
      ,shade: 0.8//不显示遮罩
      ,yes: function(){
        layer.closeAll();
      }
    });
  })
}
function addPrintContent(data){
  // 张惠妹版
  $("#zhmBrand").text(data.brand);
  $("#zhmType").text(data.type);
  $("#zhmSize").text(data.size);
  $("#zhmUsername").text(data.username);
  // 王力宏版
  $("#wlhUsername").text(data.username);
  $("#wlhType").text(data.type);
  $("#wlhSize").text(data.size);
  var d = new Date();
  var today = d.getFullYear()+"/"+(d.getMonth()+1)+"/"+d.getDate();
  $("#wlhTime").text(today);
  // 睡美人版
  $("#smrBrandModle").text(data.type);
  $("#smrClothNo").text(data.parma);
  $("#smrType").text(data.size);
  $("#smrTime").text(today);
}
layui.use('element', function(){
  var element = layui.element;
});
function IDPrint(id){
  $("#printIdMsg .IDPrint").css("display","none");
  $("#printIdMsg #"+id).css('display','block');
  var zhmSendTo = $("#printIdMsg #zhmSendTo input").val()
  $("#printIdMsg #zhmSendTo").html(zhmSendTo);
  var zhmAreacode = $("#printIdMsg #zhmAreacode input").val()
  $("#printIdMsg #zhmAreacode").html(zhmAreacode);
  $("#printIdMsg #"+id).jqprint();
  $("#printIdMsg .IDPrint").css("display","block");
  layer.closeAll();
}
</script>
<div id="printId" style="display:none;">
<div class="layui-tab layui-tab-card">
  <ul class="layui-tab-title">
    <li class="layui-this">模板(张惠妹版)</li>
    <li>模板(王力宏版)</li>
    <li>模板(睡美人版)</li>
  </ul>
  <div class="layui-tab-content">
    <!-- 模板(张惠妹版) -->
    <div id="tempZhm" class="layui-tab-item layui-show">
      <style type="text/css">
        #tempZhm table{margin-top:-20px;}
        #tempZhm table td{font-size:18px;line-height:70px;height:70px;color:#000;}
      </style>
      <table border="0" cellspacing="0" style="width:100%;">
          <tr>
            <td rowspan="7" style="width:8%;"></td>
            <td style="width:42%;" id="zhmBrand"></td>
            <td rowspan="7"></td>
          </tr>
          <tr>
            <td id="zhmType"></td>
          </tr>
          <tr>
            <td id="zhmSize"></td>
          </tr>
          <tr style="height:50px;">
            <td style="height:50px;"></td>
          </tr>
          <tr>
            <td id="zhmUsername"></td>
          </tr>
          <tr>
            <td id="zhmSendTo"><input type="text" placeholder="请在此输入‘Send To’"></td>
          </tr>
          <tr>
            <td id="zhmAreacode"><input type="text" placeholder="请在此输入‘Area code’"></td>
          </tr>
      </table>
      <button class="layui-btn layui-btn-normal IDPrint" onclick="IDPrint('tempZhm')">打印</button>
    </div>
    <!-- 模板(王力宏版) -->
    <div id="tempWlh" class="layui-tab-item">
      <style type="text/css">
        #tempWlh_table{margin-top:80px;}
        #tempWlh_table td{font-size:18px;line-height:52px;height:52px;color:#000;}
      </style>
      <table id="tempWlh_table" border="0" cellspacing="0" style="width:100%;">
          <tr>
            <td rowspan="6" style="width:8%;"></td>
            <td style="width:42%;" id="wlhUsername"></td>
            <td rowspan="6"></td>
          </tr>
          <tr>
            <td id="wlhType"></td>
          </tr>
          <tr>
            <td id="wlhSize"></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td>1件</td>
          </tr>
          <tr>
            <td id="wlhTime"></td>
          </tr>
      </table>
      <button class="layui-btn layui-btn-normal IDPrint" onclick="IDPrint('tempWlh')">打印</button>
    </div>
    <!-- 模板(睡美人版) -->
    <div id="tempSmr" class="layui-tab-item">
      <style type="text/css">
        #tempSmr_table{margin-top:60px;}
        #tempSmr_table td{font-size:18px;line-height:50px;height:50px;color:#000;}
      </style>
      <table id="tempSmr_table" border="0" cellspacing="0" style="width:100%;">
          <tr>
            <td rowspan="7" style="width:65%;"></td>
            <td style="width:35%;" id="smrBrandModle"></td>
          </tr>
          <tr>
            <td id="smrClothNo"></td>
          </tr>
          <tr>
            <td id="smrType"></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td></td>
          </tr>
          <tr>
            <td id="smrTime"></td>
          </tr>
      </table>
      <button class="layui-btn layui-btn-normal IDPrint" onclick="IDPrint('tempSmr')">打印</button>
    </div>
  </div>
</div>
</div>
<!-- 以上是打印身份证 -->

<!-- 以下是生产的弹窗内容 -->
<script type="text/javascript">
function shengchan(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    // 如果没有选择数据 return false；
    if(checkStatus.data.length==0){
      layer.msg("亲！求你了，好歹选一条数据吧！");
      return false;
    }
    //检测是否要货
    if(!jcsc(checkStatus.data)){
      layer.msg("亲，每个记录下一次订单就够啦！");
      return false;
    }
    //检测是否已装车
    if(!jczc1(checkStatus.data)){
      layer.msg("亲，已装车的产品不能下单生产啦！");
      return false;
    }
    //获取当前时间
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#shengchanTime").html("时间："+today);
    $("#shengchanTitle").html("南通"+checkStatus.data[0].category+"生产单");
    var text =$("#shengchan").html();
    var height = $(window).height()*0.9;
    //console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'南通生产单'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="shengchanMsg">'+ text +'</div>'
      ,btn: '关闭全部'
      ,btnAlign: 'c' //按钮居中
      ,shade: 0.8//不显示遮罩
      ,yes: function(){
        layer.closeAll();
        table.reload('orderTable',{});
      }
    });
    //组合表格数据
    table.render({
      elem: '#shengchanMsg #shengchanTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'shengchanTable'
      ,cols: [[
        {type:'checkbox',LAY_CHECKED:true,width:'0'}
        ,{field: 'id', title: 'ID',width:'9%'}
        ,{field: 'username', title: '客户简称',width:'13%'}
        ,{field: 'leibie', title: '类别',width:'13%'}
        ,{field: 'brand', title: '品牌',width:'13%'}
        ,{field: 'type', title: '型号',width:'13%'}
        ,{field: 'size', title: '规格',width:'13%'}
        ,{field: 'parma', title: '布号/方向',width:'13%'}
        ,{field: 'number', title: '数量',width:'13%'}
      ]] //设置表头
      ,data:checkStatus.data
    });
  })
}
function jcsc(data){
  for(i=0;i<data.length;i++){
    if(data[i].scstatus!=0){
      return false;
    }
  }
  return true;
}
function jczc1(data){
  for(i=0;i<data.length;i++){
    // 检测装车状态
    if(data[i].zcstatus!=0){
      return false;
    }
  }
  return true;
}
</script>
<style type="text/css">
#shengchanMsg .laytable-cell-checkbox{display:none;}
</style>
<div id="shengchan" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #shengchanTitle{text-align:center;font-size:25px;line-height:25px;}
    #shengchanTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #shengchanMsg .layui-table-view,#shengchanMsg .layui-table-header,#shengchanMsg th,#shengchanMsg td{border-color:#000;}
</style>
<div class="box">
  <p id="shengchanTitle"></p>
  <p id="shengchanTime"></p>
  <table id="shengchanTable" lay-filter="shengchanTable" ></table>
  <div style="margin-top:15px;" class="shengchanBtn">
    <!-- <button class="layui-btn layui-btn-normal" onclick="shengchanPrint()">打印</button> -->
    <button class="layui-btn layui-btn-warm shengchanSub" cishu="0" onclick="shengchanSub()">提交</button>
  </div>
</div>
</div>
<script type="text/javascript">
function shengchanPrint(){
  $(".shengchanBtn").css("display","none");
  $("#shengchanMsg").jqprint();
  $(".shengchanBtn").css("display","block");
}
function shengchanSub(){
  var cishu = $("#shengchanMsg .shengchanSub").attr('cishu');
  console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    console.log(checkStatus.data);
    if(checkStatus.data.length!=0){
      $.ajax({
        url: "<?php echo url('Nansheng/addShengchan'); ?>",
        type: 'POST',
        data: {'shuju':checkStatus.data},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
        }
      })
    }
  })
  var cishu = $("#shengchanMsg .shengchanSub").attr('cishu','1');
}
</script>
<!-- 以上是生产的弹窗内容 -->

<!-- 以下是装车的弹窗内容 -->
<script type="text/javascript">
function zhuangche(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    // 如果没有选择数据 return false；
    if(checkStatus.data.length==0){
      layer.msg("亲！求你了，好歹选一条数据吧！");
      return false;
    }
    //检测是否已装车
    if(!jczc(checkStatus.data)){
      return false;
    }
    //获取当前时间
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#zhuangcheTime").html("时间："+today);
    $("#zhuangcheTitle").html("南通"+checkStatus.data[0].category+"装车单");
    var text =$("#zhuangche").html();
    var height = $(window).height()*0.9;
    //console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'南通装车单'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="zhuangcheMsg">'+ text +'</div>'
      ,btn: '关闭全部'
      ,btnAlign: 'c' //按钮居中
      ,shade: 0.8//不显示遮罩
      ,yes: function(){
        layer.closeAll();
        table.reload('orderTable',{});
      }
    });
    //组合表格数据
    table.render({
      elem: '#zhuangcheMsg #zhuangcheTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'zhuangcheTable'
      ,cols: [[
        {type:'checkbox',LAY_CHECKED:true,width:'0'}
        ,{field: 'id', title: 'ID',width:'9%'}
        ,{field: 'username', title: '客户简称',width:'13%'}
        ,{field: 'leibie', title: '类别',width:'13%'}
        ,{field: 'brand', title: '品牌',width:'13%'}
        ,{field: 'type', title: '型号',width:'13%'}
        ,{field: 'size', title: '规格',width:'13%'}
        ,{field: 'parma', title: '布号/方向',width:'13%'}
        ,{field: 'number', title: '数量',width:'13%'}
      ]] //设置表头
      ,data:checkStatus.data
    });
  })
}
function jczc(data){
  for(i=0;i<data.length;i++){
    // 检测装车状态
    if(data[i].zcstatus!=0){
      layer.msg("亲，每个记录只能装一次车！");
      return false;
    }
    //检测库存是否足够发货
    var kucun = getKucun(data[i].brand,data[i].type,data[i].size,data[i].parma,data[i].leibie,2)
    if(data[i].number>kucun){
      layer.msg("亲，库存数不够不能装车，赶紧去生产吧！");
      return false;
    }
  }
  return true;
}
</script>
<style type="text/css">
#zhuangcheMsg .laytable-cell-checkbox{display:none;}
</style>
<div id="zhuangche" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #zhuangcheTitle{text-align:center;font-size:25px;line-height:25px;}
    #zhuangcheTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #zhuangcheMsg .layui-table-view,#zhuangcheMsg .layui-table-header,#zhuangcheMsg th,#zhuangcheMsg td{border-color:#000;}
</style>
<div class="box">
  <p id="zhuangcheTitle"></p>
  <p id="zhuangcheTime"></p>
  <table id="zhuangcheTable" lay-filter="zhuangcheTable" ></table>
  <div style="margin-top:15px;" class="zhuangcheBtn">
    <!-- <button class="layui-btn layui-btn-normal" onclick="zhuangchePrint()">打印</button> -->
    <button class="layui-btn layui-btn-warm zhuangcheSub" cishu="0" onclick="zhuangcheSub()">提交</button>
  </div>
</div>
</div>
<script type="text/javascript">
function zhuangchePrint(){
  $(".zhuangcheBtn").css("display","none");
  $("#zhuangcheMsg").jqprint();
  $(".zhuangcheBtn").css("display","block");
}
function zhuangcheSub(){
  var cishu = $("#zhuangcheMsg .zhuangcheSub").attr('cishu');
  console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    console.log(checkStatus.data);
    if(checkStatus.data.length!=0){
      $.ajax({
        url: "<?php echo url('Nansheng/addZhuangche'); ?>",
        type: 'POST',
        data: {'shuju':checkStatus.data},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
        }
      })
    }
  })
  var cishu = $("#zhuangcheMsg .zhuangcheSub").attr('cishu','1');
}
</script>
<!-- 以上是装车的弹窗内容 -->






  </div>

</div>
<style>
.runtest{position: relative;width:100%;}
.runtest textarea{display:block; width:300px; height: 160px; border: 10px solid #F8F8F8; border-top-width: 0; padding: 10px; line-height:20px; overflow:auto; background-color: #3F3F3F; color: #eee; font-size:12px; font-family:Courier New;}
.runtest a{position: absolute; right: 20px; bottom: 20px;}
</style>
<div id="adminNote" style="display:none;">
  <div class="runtest">
    <textarea class="site-demo-text" id="testmain"></textarea>
    <a href="javascript:;" class="layui-btn layui-btn-normal" class="btns">立即运行</a>
  </div>
</div>

<script>
function openNote(){
  layui.use('layer', function(){
    var layer = layui.layer;
    var text =$("#adminNote").html();
    layer.open({
      area: ['380px', '300px']
      ,title:'我的备忘录'
      ,offset: 'rt'
      ,content: '<div style="width:340px;margin:0 auto;" id="openAadminNote">'+ text +'</div>'
      ,shade: 0
      ,zIndex: layer.zIndex
      ,btn: []
    });
  });
}

function ying(){
    $(".layui-side").toggle("fast",function () {
          if($(".erp_body").attr('ishide')==0){
            $(".erp_body").removeClass("layui-body");
            $(".erp_body").attr('ishide','1');
            $("#ying").html("展开侧栏");
          }else{
            $(".erp_body").addClass("layui-body");
            $(".erp_body").attr('ishide','0');
            $("#ying").html("隐藏侧栏");
          }
      });
}

// 全局统计加徽章
// $.ajax({
//   url: "<?php echo url('Tongji/getHz'); ?>",
//   type: 'POST',
//   data: {},
//   success:function(res){
//       // console.log(res);
//       //苏州贸易部-订单统计
//       if(res.sumao_order!=undefined){
//         $(".layui-nav-tree a[act='Sumao_order']").append("<span class=\"layui-badge\">"+res.sumao_order+"</span>");
//       }
//       //苏州贸易部-发货管理
//       if(res.sumao_songhuo!=undefined){
//         $(".layui-nav-tree a[act='Sumao_songhuo']").append("<span class=\"layui-badge\">"+res.sumao_songhuo+"</span>");
//       }
//       //苏州贸易部-收货管理
//       if(res.sumao_shouhuo!=undefined){
//         $(".layui-nav-tree a[act='Sumao_shouhuo']").append("<span class=\"layui-badge\">"+res.sumao_shouhuo+"</span>");
//       }
//       //苏州贸易部-客户确认
//       if(res.sumao_kehuqueren!=undefined){
//         $(".layui-nav-tree a[act='Sumao_kehuqueren']").append("<span class=\"layui-badge\">"+res.sumao_kehuqueren+"</span>");
//       }

//       //南通生产部-业务订单
//       if(res.nansheng_yworder!=undefined){
//         $(".layui-nav-tree a[act='Nansheng_yworder']").append("<span class=\"layui-badge\">"+res.nansheng_yworder+"</span>");
//       }
//       //南通生产部-业务订单
//       if(res.nansheng_scorder!=undefined){
//         $(".layui-nav-tree a[act='Nansheng_scorder']").append("<span class=\"layui-badge\">"+res.nansheng_scorder+"</span>");
//       }
//       //南通生产部-业务订单
//       if(res.nansheng_songhuo!=undefined){
//         $(".layui-nav-tree a[act='Nansheng_songhuo']").append("<span class=\"layui-badge\">"+res.nansheng_songhuo+"</span>");
//       }
//       //南通生产部-业务订单
//       if(res.nansheng_daifa!=undefined){
//         $(".layui-nav-tree a[act='Nansheng_daifa']").append("<span class=\"layui-badge\">"+res.nansheng_daifa+"</span>");
//       }

//   }
// })

</script>
</body>
</html>