<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"F:\phpstudy\WWWSCERP\public/../application/home\view\sumao\order.html";i:1519815630;s:64:"F:\phpstudy\WWWSCERP\public/../application/home\view\layout.html";i:1514539775;}*/ ?>
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
  <div class="layui-col-md9" id="search1" style="clear:none;margin:0;">
    <div class="layui-input-inline" style="width:auto;">
      <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
        <option value="usercode">客户编号</option>
        <option value="username">客户名称</option>
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
    <div class="layui-form layui-input-inline">
      <label class="layui-form-label">已发货订单</label>
      <div class="layui-input-block">
        <input type="checkbox" id="status" name="shipping_status" lay-skin="switch" lay-filter="status">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
layui.use('form', function(){
  var form = layui.form;
  form.on('radio(dcategory)', function(data){
    dosearch()
  });
  form.on('switch(status)', function(data){
    dosearch();
  });
});
function dosearch(){
    var category = $("#category input[name='category']:checked").val();
    if($("#status").is(':checked')){
      var status = 1;
    }else{
      var status = 0;
    };
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var k2 = 'xiadantime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var search = {}
    search.k1=k1;
    search.v1=v1;
    search.k2=k2;
    search.vds=vds;
    search.vde=vde;
    layui.use('table', function(){
        var table = layui.table;
        table.reload('orderTable', {
          url: '<?php echo url('Sumao/getOrder'); ?>'
          ,where: {'search':search,'category':category,'status':status}
          ,height:'full-130'
          ,done: function(res, curr, count){
            // console.log(res);
          }
        });
    });
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
    url:'<?php echo url('Sumao/getOrder'); ?>',
    method:'post',
    page:true,
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{field:'oid', width:'5%'}">订单单号</th>
        <th lay-data="{field:'usercode', width:'5%'}">客户编号</th>
        <th lay-data="{field:'username', width:'9%'}">客户名称</th>
        <th lay-data="{field:'xiadantime', width:'9%'}">下单时间</th>
        <th lay-data="{field:'yqshtime', width:'9%'}">要求送货时间</th>
        <th lay-data="{field:'shaddress', width:'13%'}">送货地址</th>
        <th lay-data="{field:'payment', width:'9%'}">支付方式</th>
        <th lay-data="{field:'total', width:'9%'}">订单总价</th>
        <th lay-data="{field:'note', width:'9%'}">备注</th>
        <th lay-data="{field:'shipping_status', width:'9%' ,templet:'#ss'}">发货状态</th>
        <th lay-data="{fixed: 'right', width:'14%', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>
<script type="text/html" id="ss">
  {{#  if(d.shipping_status==0){ }}
        <span style="color:red">待发货</span>
  {{#  } else if(d.shipping_status==1) { }}
        <span style="color:orange">部分发货</span>
  {{#  } else if(d.shipping_status==2) { }}
        <span style="color:blue">已发货</span>
  {{#  } else if(d.shipping_status==3) { }}
        <span style="color:green">回单确认</span>
  {{#  } }}
</script>
<script type="text/html" id="barDemo">
  {{#  if(d.shipping_status==0){ }}
  <div class="layui-btn-group">
    <a class="layui-btn layui-btn-xs" lay-event="shipping">发货开单</a>
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="xiangqing">详情</a>
    <!-- <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="change">修改</a> -->
    <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="delete">删除</a>
  </div>
  {{#  } else if(d.shipping_status==1) { }}
  <div class="layui-btn-group">
    <a class="layui-btn layui-btn-xs" lay-event="shipping">发货</a>
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="xiangqing">详情</a>
  </div>
  {{#  } else { }}
    <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="xiangqing">详情</a>
  {{#  } }}
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;
        table.on('tool(orderTable)', function(obj){
          var data = obj.data; //获得当前行数据
          var layEvent = obj.event;
          if(layEvent === 'shipping'){
            //console.log(data);
            shipping(data);
          }
          if(layEvent === 'xiangqing'){
            //console.log(data);
            xiangqing(data);
          }
          if(layEvent === 'change'){
            //console.log(data);
            change(data);
          }
          if(layEvent === 'delete'){
            //console.log(data);
            delOrder(data);
          }
        });
    });
</script>

<!-- 以下是发货的弹窗内容 -->
<script type="text/javascript">
  function shipping(data){
    layer.confirm('确认要安排发货嘛？', {icon: 3, title:'警告'}, function(index){
      var oId = data.oid;
      $.ajax({
        url: "<?php echo url('Sumao/shipping'); ?>",
        type: 'POST',
        data: {'oid':oId},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
            layui.use('table', function(){
              var table = layui.table;
              table.reload('orderTable',{})
              // console.log(res);
            })
        }
      })
      layer.close(index);
    });
  }
</script>
<!-- 以上是发货的弹窗内容 -->

<!-- 以下是查看详情的弹窗内容 -->
<style type="text/css">
#xiangqingMsg .laytable-cell-checkbox{display:none;}
</style>
<script type="text/javascript">
function xiangqing(data){
  if($("#status").is(':checked')){
    $(".xiangqingBtn").css("display","none");
  }
  layui.use('table', function(){
    var table = layui.table;
    //获取当前时间
$.ajax({
  url: "<?php echo url('Sumao/getOrderDetails'); ?>",
  type: 'POST',
  data: {'oid':data.oid},
  success:function(res){
    dXq = res.data;
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#fahuoTime").html("时间："+today);
    $("#xiangqingTitle").html("订单详情");
    $("#uT_oid").text('单号：'+data.oid);
    $("#uT_category").text(data.category);
    $("#uT_addtime").text(data.xiadantime);
    $("#uT_yqshtime").text(data.yqshtime);
    $("#uT_usercode").text(data.usercode);
    $("#uT_linkman").text(data.username);
    $("#uT_wuliu").text(data.wuliu);
    $("#uT_address").text(data.shaddress);
    $("#uT_payment").text(data.payment);
    $("#uT_total").text(data.total);
    $('#xiangqing .xiangqingSub').attr('onclick','xiangqingSub('+data.fhid+')');
    //打开弹窗
    var text =$("#xiangqing").html();
    var height = $(window).height()*0.9;
    layer.open({
      type: 1
      ,title :'订单详情'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="xiangqingMsg">'+ text +'</div>'
      ,btn: '关闭全部'
      ,btnAlign: 'c' //按钮居中
      ,shade: 0.8//不显示遮罩
      ,yes: function(){
        layer.closeAll();
        table.reload('orderTable',{});
      }
    });
    //组合订单表格数据
    table.render({
      elem: '#xiangqingMsg #xiangqingTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'xiangqingTable'
      ,cols: [[
        {field: 'brand', title: '品牌',width:'11%'}
        ,{field: 'type', title: '型号',width:'11%'}
        ,{field: 'size', title: '规格',width:'11%'}
        ,{field: 'parma', title: '布号/方向',width:'11%'}
        ,{field: 'duifang', title: '堆放区域',width:'11%'}
        ,{field: 'number', title: '数量',width:'8%'}
        ,{field: 'price', title: '单价',width:'9%'}
        ,{field: 'total', title: '金额',width:'10%'}
        ,{field: 'sunum', title: '库存',width:'8%',templet:'#sunum'}
        // ,{fixed: 'right', title: '操作', width:'10%', toolbar: '#beihuo'}
      ]] //设置表头
      ,data:getTotal(dXq)
    });
    layui.use('form', function(){
        var form = layui.form;
        form.render();
    });
  }
})
  })
}
function getTotal(data){
  for (var i=0;i<data.length;i++) {
    data[i].total = data[i].number*data[i].price;
  };
  return data;
}

</script>
<div id="xiangqing" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #xiangqingTitle{text-align:center;font-size:25px;line-height:25px;}
    #xiangqingTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #xiangqingMsg .layui-table-view,#xiangqingMsg .layui-table-header,#xiangqingMsg th,#xiangqingMsg td{border-color:#000;}
    #xiangqingMsg .layui-table{width:100%;}
    #xiangqingMsg #userTable{width:959px;margin-top:10px;}
    #xiangqingMsg #userTable th,#xiangqingMsg #userTable td{text-align:center;border-color:#000;line-height: 38px;font-weight:normal;}
</style>
<div class="box">
  <p id="xiangqingTitle"></p>
  <p id="xiangqingTime"></p>
  <table id="userTable" border="1" cellspacing="0">
      <tr>
          <th style="width:13%;">要求送货日期</th>
          <th style="width:13%;" id='uT_yqshtime'></th>
          <th style="width:13%;"></th>
          <th style="width:13%;">下单日期</th>
          <th style="width:33%;" id='uT_addtime'></th>
          <th style="width:15%;" id='uT_oid'></th>
      </tr>
      <tr>
          <td>客户编号</td>
          <td>客户名称</td>
          <td>订单分类</td>
          <td>收款方式</td>
          <td>收货人地址电话</td>
          <td>总计</td>
      </tr>
      <tr>
          <td id='uT_usercode'></td>
          <td id='uT_linkman'></td>
          <td id='uT_category'></td>
          <td id='uT_payment'></td>
          <td id='uT_address'></td>
          <td id='uT_total'></td>
      </tr>

  </table>
  <table id="xiangqingTable" lay-filter="xiangqingTable" ></table>
  <div style="margin-top:15px;" class="xiangqingBtn">
    <button class="layui-btn layui-btn-warm xiangqingSub" cishu="0">确认发货</button>
  </div>
</div>
</div>
<script type="text/javascript">
function xiangqingPrint(){
  $(".xiangqingBtn").css("display","none");
  $("#xiangqingMsg #userTable").css('margin-bottom','-10px');
  $("#xiangqingMsg").jqprint();
  $(".xiangqingBtn").css("display","block");
  $("#xiangqingMsg #userTable").css('margin-bottom','0');
}
function xiangqingSub(fhid){
  var cishu = $("#xiangqingMsg .xiangqingSub").attr('cishu');
  //console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  layer.confirm('我确定客户已经收到货！', {icon: 3, title:'警告'}, function(index){
      $.ajax({
        url: "<?php echo url('Sumao/completeKhqr'); ?>",
        type: 'POST',
        data: {'fhid':fhid},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
            console.log(res);
        }
      })
      layer.close(index);
  });
  var cishu = $("#xiangqingMsg .xiangqingSub").attr('cishu','1');
}
</script>
<script type="text/html" id="sunum">
  {{#  if(d.sunum<=d.number){ }}
        <span style="color:red">{{d.sunum}}</span>
  {{#  } else{ }}
        <span style="color:green">{{d.sunum}}</span>
  {{#  } }}
</script>
<script type="text/html" id="beihuo">
  {{# if($("#status").is(':checked')){ }}
  {{# }else{ }}
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="beihuo">备货</a>
  {{# } }}
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;
        table.on('tool(xiangqingTable)', function(obj){
          var data = obj.data; //获得当前行数据
          var layEvent = obj.event;
          if(layEvent === 'beihuo'){
            console.log(data);
            //xiangqing(data);
          }
        });
    });
</script>
<!-- 以上是查看详情的弹窗内容 -->

<!-- 以下是修改的弹窗内容 -->
<script type="text/javascript">
function change(){
    layui.use('table', function(){
      var text =$("#editOrder").html();
      var table = layui.table;
      var checkStatus = table.checkStatus('orderTable');
      if(checkStatus.data.length!=1){
          layer.msg("有且只能选择一条数据进行编辑");return false;
      }
      if(checkStatus.data[0].yhstatus!=0){
          layer.msg("哎！覆水难收，你已经不能修改该记录了！");return false;
      }
      var yuandata = checkStatus.data[0];
      //console.log(yuandata);
      var height = $(window).height()*0.9;
      layer.open({
        type: 1
        ,title :'修改订单'
        ,offset: "auto"
        ,area: ['1050px', height+'px']
        ,tipsMore: true
        ,content: '<div style="width:1000px;margin:0 auto;" id="editMsg">'+ text +'</div>'
        ,btn: '关闭全部'
        ,btnAlign: 'c' //按钮居中
        ,shade: 0.8//不显示遮罩
        ,yes: function(){
          layer.closeAll();
          table.reload('orderTable',{});
        }
      });
      $("#editMsg input[name='id']").val(yuandata.id);
      $("#editMsg input[name='usercode']").val(yuandata.usercode);
      $("#editMsg input[name='username']").val(yuandata.username);
      $("#editMsg input[name='leibie']").val(yuandata.leibie);
      $("#editMsg input[name='brand']").val(yuandata.brand);
      $("#editMsg input[name='type']").val(yuandata.type);
      $("#editMsg input[name='size']").val(yuandata.size);
      $("#editMsg input[name='parma']").val(yuandata.parma);
      $("#editMsg input[name='number']").val(yuandata.number);
      $("#editMsg input[name='price']").val(yuandata.price);
      $("#editMsg input[name='yqshtime']").val(yuandata.yqshtime);
      $("#editMsg input[name='payment']").val(getPayment(yuandata.payment,yuandata.usercode));
      $("#editMsg input[name='duifang']").val(yuandata.duifang);
      $("#editMsg input[name='shaddress']").val(yuandata.shaddress);
      $("#editMsg textarea[name='note']").val(yuandata.note);
      $("#editMsg input[name='bhstatus'][value='"+yuandata.bhstatus+"']").attr("checked",true);
      layui.use('form', function(){
        var form = layui.form;
        form.render();
      });
    });
  }
</script>
<div id="editOrder" style="display:none;">

</div>
<!-- 以上是修改的弹窗内容 -->

<!-- 以下是删除的弹窗内容 -->
<script type="text/javascript">
  function delOrder(data){
    layer.confirm('确认要删除该数据吗？', {icon: 3, title:'警告'}, function(index){
      var oId = data.oid;
      $.ajax({
        url: "<?php echo url('Sumao/delOrder'); ?>",
        type: 'POST',
        data: {'oid':oId},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
            layui.use('table', function(){
              var table = layui.table;
              table.reload('orderTable',{})
              // console.log(res);
            })
        }
      })
      layer.close(index);
    });
  }
</script>
<!-- 以上是删除的弹窗内容 -->



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