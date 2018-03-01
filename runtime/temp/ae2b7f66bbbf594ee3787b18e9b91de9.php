<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"F:\phpstudy\WWWSCERP\public/../application/home\view\caigou\cxorder.html";i:1514427688;s:64:"F:\phpstudy\WWWSCERP\public/../application/home\view\layout.html";i:1514539775;}*/ ?>
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
    
<style type="text/css">
    .layui-table-cell{padding:0 3px;text-align:center;}
    .laytable-cell-checkbox{padding:0 15px;}
    .layui-elem-quote{padding:10px 0;margin-bottom:0;border-left: 1px solid #e2e2e2;border-top: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-radius:4px;}
    .layui-table-view{margin:0;}
</style>
<blockquote class="layui-elem-quote">
<div class="layui-row">
  <!-- <div class="layui-col-md3" style="padding-left:10px;">
    <div class="layui-btn-group" style="margin-top:4px;">
      <button class="layui-btn layui-btn-sm" onclick="addOrder()"><i class="layui-icon">&#xe654;</i>添加</button>
      <button class="layui-btn layui-btn-warm layui-btn-sm" onclick="editOrder()"><i class="layui-icon">&#xe642;</i>编辑</button>
      <button class="layui-btn layui-btn-danger layui-btn-sm" onclick="delOrder()"><i class="layui-icon">&#xe640;</i>删除</button>
      <button class="layui-btn layui-btn-normal layui-btn-sm" onclick="chaiOrder()"><i class="layui-icon">&#xe640;</i>拆单</button>
    </div>
  </div> -->
  <div class="layui-col-md6" id="search1" style="width:45%;">
    <div class="layui-input-inline" style="width:auto;">
      <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
        <option value="pinming">品名</option>
        <option value="supplier">供应商</option>
      </select>
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v1" placeholder="Search for..." style="width:100px;">
    </div>
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="start" placeholder="采购时间段始" autocomplete="off" class="layui-input" id="xdsstart">
    </div>
    <div class="layui-form-mid" style="float:none;margin-right:0;display:inline-block;">-</div>
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="end" placeholder="采购时间段末" autocomplete="off" class="layui-input" id="xdsend">
    </div>
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
  </div>
  <div class="layui-col-md3" style="width:30%;">
    <!-- <button class="layui-btn layui-btn-radius layui-btn-sm layui-btn-normal" onclick="zhuangche()" style="margin-left:0;">开装车单</button>
    <button class="layui-btn layui-btn-radius layui-btn-sm layui-btn-warm" onclick="dakuan()" style="margin-left:0;">合并打款</button>
    <button class="layui-btn layui-btn-radius layui-btn-sm layui-btn-danger" onclick="wancheng()" style="margin-left:0;">完成订单</button> -->
    <div class="layui-form" style="display:inline-block;width:135px;">
      <label class="layui-form-label" style="width:auto;padding:9px 5px 9px 10px;">历史订单</label>
      <div class="layui-input-block" style="margin-left:0;">
        <input type="checkbox" id="status" name="stauts" lay-skin="switch" lay-filter="status">
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
layui.use('form', function(){
  var form = layui.form;
  form.on('switch(status)', function(data){
    dosearch();
  });
});
function dosearch(){
    if($("#status").is(':checked')){
      var status = 2;
    }else{
      var status = 1;
    };
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var k2 = 'caigoutime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var search = {}
    search.k1=k1;
    search.v1=v1;
    search.k2=k2;
    search.vds=vds;
    search.vde=vde;
    console.log(search);
    layui.use('table', function(){
        var table = layui.table;
        table.reload('orderTable', {
          url: '<?php echo url('Caigou/getOrder'); ?>'
          ,where: {'search':search,'status':status}
          ,height:'full-130'
          ,done: function(res, curr, count){
            //console.log(res);
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
    url:'<?php echo url('Caigou/getOrder'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="test" id="orderTable">
  <thead>
    <tr>
        <!-- <th lay-data="{checkbox:true}"></th> -->
        <th lay-data="{field:'id', width:40}">ID</th>
        <th lay-data="{field:'supplier', width:70}">供应商</th>
        <th lay-data="{field:'caigoutime', width:90}">采购日期</th>
        <th lay-data="{field:'pinming', width:60}">品名</th>
        <th lay-data="{field:'leibie', width:60}">类别</th>
        <th lay-data="{field:'type', width:60}">型号</th>
        <th lay-data="{field:'size', width:60}">规格</th>
        <th lay-data="{field:'danwei', width:90}">单位</th>
        <th lay-data="{field:'number', width:50}">数量</th>
        <th lay-data="{field:'price', width:70}">单价</th>
        <th lay-data="{field:'total', width:70}">总价</th>
        <th lay-data="{field:'note', width:60}">备注</th>
        <th lay-data="{field:'shtime', width:90, sort:true,templet: '#shtime'}">要求送货日期</th>
        <th lay-data="{field:'fhtime', width:90, templet: '#fhtime'}">供应商发货日期</th>
        <th lay-data="{field:'dhtime', width:90, templet: '#dhtime'}">到货日期</th>
        <th lay-data="{field:'zcstatus', width:90, sort:true, templet: '#zcstatus'}">装车情况</th>
        <th lay-data="{field:'zkid', width:90, sort:true, templet: '#zkid'}">转款单ID</th>
        <th lay-data="{field:'wctime', width:90, templet: '#wctime'}"> 完成时间</th>
    </tr>
  </thead>
</table>
<script type="text/html" id="shtime">
  {{#  if(d.shtime=='0000-00-00'||d.shtime=='0100-01-01'){ }}
        <span style="color:red;">未填写</span>
  {{#  } else { }}
        {{ d.shtime }}
  {{#  } }}
</script>
<script type="text/html" id="fhtime">
  {{#  if(d.fhtime=='0000-00-00'||d.fhtime=='0100-01-01'){ }}
        <span style="color:red;">供应商未发货</span>
  {{#  } else { }}
        <span style="color:green;">{{ d.fhtime }}</span>
  {{#  } }}
</script>
<script type="text/html" id="dhtime">
  {{#  if(d.dhtime=='0000-00-00'||d.dhtime=='0100-01-01'){ }}
        <span style="color:red;">未到货</span>
  {{#  } else { }}
        <span style="color:green;">{{ d.dhtime }}</span>
  {{#  } }}
</script>
<script type="text/html" id="zcstatus">
  {{#  if(d.zcstatus==0){ }}
        <span style="color:gray;">未装车</span>
  {{#  } else if(d.zcstatus==1) { }}
        <span style="color:red;">等待装车</span>
  {{#  } else if(d.zcstatus==2) { }}
        <span style="color:orange;">苏州装车</span>
  {{#  } else if(d.zcstatus==3) { }}
        <span style="color:green;">南通收货</span>
  {{#  } }}
</script>
<script type="text/html" id="zkid">
  {{#  if(d.zkid==0){ }}
        <span style="color:red;">未合并转款单</span>
  {{#  } else { }}
        <span style="color:green;">{{ d.zkid }}</span>
  {{#  } }}
</script>
<script type="text/html" id="wctime">
  {{#  if(d.wctime=='0000-00-00 00:00:00'){ }}
        <span style="color:red;">未完成</span>
  {{#  } else { }}
        <span style="color:green;">{{ d.wctime }}</span>
  {{#  } }}
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;
    });
    function addOrder(){
      var text =$("#addOrder").html();
      var height = $(window).height()*0.9;
      layer.open({
        type: 1
        ,title :'添加采购记录'
        ,offset: "auto"
        ,area: ['1050px', height+'px']
        ,tipsMore: true
        ,content: '<div style="width:1000px;margin:0 auto;" id="addMsg">'+ text +'</div>'
        ,btn: '关闭全部'
        ,btnAlign: 'c' //按钮居中
        ,shade: 0.8//不显示遮罩
        ,yes: function(){
          layer.closeAll();
          layui.use('table', function(){
            var table = layui.table;
            table.reload('orderTable',{});
          });
        }
      });
      layui.use('form', function(){
        var form = layui.form;
        form.render();
      });
    }
    function editOrder(){
      layui.use('table', function(){
        var table = layui.table;
        var checkStatus = table.checkStatus('orderTable');
        if(checkStatus.data.length==1){
          var yuandata = checkStatus.data[0];
          if(yuandata.status!=1){
            layer.msg("抱歉历史订单不可编辑");
            return false;
          }
          if(yuandata.zcstatus!=0){
            layer.msg("抱歉已装车的不能修改");
            return false;
          }
          // if(yuandata.zkid!=0){
          //   layer.msg("抱歉已合并转款的不能修改");
          //   return false;
          // }
          var text =$("#editOrder").html();
          var height = $(window).height()*0.9;
          layer.open({
            type: 1
            ,title :'修改采购记录'
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
          layui.use('form', function(){
            var form = layui.form;
            form.render();
          });
          if(yuandata.zkid!=0){
            $("#editMsg input[name='supplier']").attr('disabled',true);
            $("#editMsg input[name='pinming']").attr('disabled',true);
            $("#editMsg input[name='leibie']").attr('disabled',true);
            $("#editMsg input[name='type']").attr('disabled',true);
            $("#editMsg input[name='size']").attr('disabled',true);
            $("#editMsg input[name='danwei']").attr('disabled',true);
            $("#editMsg input[name='number']").attr('disabled',true);
            $("#editMsg input[name='price']").attr('disabled',true);
            $("#editMsg input[name='total']").attr('disabled',true);
          }
          $("#editMsg input[name='id']").val(yuandata.id);
          $("#editMsg input[name='zkid']").val(yuandata.zkid);
          $("#editMsg input[name='supplier']").val(yuandata.supplier);
          $("#editMsg input[name='pinming']").val(yuandata.pinming);
          $("#editMsg input[name='leibie']").val(yuandata.leibie);
          $("#editMsg input[name='type']").val(yuandata.type);
          $("#editMsg input[name='size']").val(yuandata.size);
          $("#editMsg input[name='danwei']").val(yuandata.danwei);
          $("#editMsg input[name='number']").val(yuandata.number);
          $("#editMsg input[name='price']").val(yuandata.price);
          $("#editMsg input[name='total']").val(yuandata.total);
          $("#editMsg input[name='zkprice']").val(yuandata.zkprice);
          $("#editMsg textarea[name='note']").val(yuandata.note);
          $("#editMsg input[name='shtime']").val(yuandata.shtime);
          $("#editMsg input[name='fhtime']").val(yuandata.fhtime);
          $("#editMsg input[name='dhtime']").val(yuandata.dhtime);
        }else{
          layer.msg("有且只能选择一条数据进行编辑");
        }
      });
    }
    function delOrder(){
      layui.use('table', function(){
        var table = layui.table;
        var checkStatus = table.checkStatus('orderTable');
        if(checkStatus.data[0]['status']!=1){
          layer.msg("抱歉历史订单不可删除");
          return false;
        }
        var yuandata = checkStatus.data[0];
        if(yuandata.fhtime!='0000-00-00'&&yuandata.fhtime!='0100-01-01'){
          layer.msg("抱歉供应商已发货不能删除");
          return false;
        }
        if(yuandata.dhtime!='0000-00-00'&&yuandata.dhtime!='0100-01-01'){
          layer.msg("抱歉材料已到货不能删除");
          return false;
        }
        if(yuandata.zcstatus!=0){
          layer.msg("抱歉已装车的不能删除");
          return false;
        }
        if(yuandata.zkid!=0){
          layer.msg("抱歉已合并转款的不能删除");
          return false;
        }
        if(checkStatus.data.length==1){
            layer.confirm('确认要删除该数据吗？', {icon: 3, title:'警告'}, function(index){
              var ysId = checkStatus.data[0]['id'];
              $.ajax({
                url: "<?php echo url('Caigou/delOrder'); ?>",
                type: 'POST',
                data: {'id':ysId},
                success:function(res){
                    layer.msg(res.msg, {time: 2000},function(){});
                    table.reload('orderTable',{})
                    // console.log(res);
                }
              })
              layer.close(index);
            });
        }else{
          layer.msg("为保障数据安全，一次只能删除一条数据！");
        }
      });
    }
  function chaiOrder(){
    layui.use('table', function(){
      var table = layui.table;
      var checkStatus = table.checkStatus('orderTable');
      if(checkStatus.data.length==1){
        var yuandata = checkStatus.data[0];
        if(yuandata.status!=1){
          layer.msg("抱歉历史订单不可编辑");
          return false;
        }
        if(yuandata.fhtime!='0000-00-00'&&yuandata.fhtime!='0100-01-01'){
          layer.msg("抱歉供应商已发货不能拆分");
          return false;
        }
        if(yuandata.dhtime!='0000-00-00'&&yuandata.dhtime!='0100-01-01'){
          layer.msg("抱歉材料已到货不能拆分");
          return false;
        }
        if(yuandata.zcstatus!=0){
          layer.msg("抱歉已装车的不能拆分");
          return false;
        }
        if(yuandata.zkid!=0){
          layer.msg("抱歉已合并转款的不能拆分");
          return false;
        }
        var text = '<div class="layui-form-item" style="margin-top:20px;"><label class="layui-form-label">拆出数量</label><div class="layui-input-block"><input type="text" name="chainum" lay-verify="number" autocomplete="off" placeholder="请输入拆出数量" class="layui-input"></div></div><div class="layui-form-item"><div class="layui-input-block"><button class="layui-btn" onclick="chaiSub('+yuandata.id+','+yuandata.number+')" id="chaiSub" cishu="0">立即提交</button></div></div>'
        layer.open({
          type: 1
          ,title :'拆分采购记录单'
          ,offset: "auto"
          ,area: ['550px', '250px']
          ,tipsMore: true
          ,content: '<div style="width:500px;margin:0 auto;" id="chaiMsg">'+text+'</div>'
          ,btn: '关闭全部'
          ,btnAlign: 'c' //按钮居中
          ,shade: 0.8//不显示遮罩
          ,yes: function(){
            layer.closeAll();
            table.reload('orderTable',{});
          }
        });
      }else{
        layer.msg("有且只能选择一条数据进行编辑");
      }
    });
  }
  function chaiSub(id,number){
    var chainum = $("#chaiMsg input[name='chainum']").val();
    var cishu = $("#chaiMsg #chaiSub").attr('cishu');
    if(cishu!=0){
      layer.msg("请勿重复提交");
      return false;
    }
    var reg = /^[1-9]\d*$/
    if (!reg.test(chainum)) {
      layer.msg("请填入整数！");
      return false;
    }
    if(chainum>=number){
      layer.msg("拆分的数量必须小于现有的数量");
      return false;
    }
    $.ajax({
      url: "<?php echo url('Caigou/chaiOrder'); ?>",
      type: 'POST',
      data: {'id':id,'number':number,'chainum':chainum},
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $("#chaiMsg #chaiSub").attr('cishu','1');
          // console.log(res);
      }
    })
  }
</script>

<!-- 以下是添加弹窗 -->
<div id="addOrder" style="display:none;">
<style type="text/css">
    .addbox{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
</style>
<div class="addbox">
<form class="layui-form" action="" method="post">
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">供应商名称</label>
            <div class="layui-input-block">
              <input type="text" name="supplier" required  lay-verify="required" placeholder="请输入供应商名称" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">品名</label>
            <div class="layui-input-block">
              <input type="text" name="pinming" required  lay-verify="required" placeholder="请输入品名" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">类别</label>
            <div class="layui-input-block">
              <input type="text" name="leibie" required  lay-verify="required" placeholder="请输入类别" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">型号</label>
            <div class="layui-input-block">
              <input type="text" name="type" required  lay-verify="required" placeholder="请输入型号" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <div class="layui-input-block">
              <input type="text" name="size" required  lay-verify="required" placeholder="请输入规格" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">单位</label>
            <div class="layui-input-block">
              <input type="text" name="danwei" required  lay-verify="required" placeholder="请输入单位" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">数量</label>
            <div class="layui-input-block">
              <input type="text" name="number" required  lay-verify="required|number" placeholder="请输入数量" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">单价</label>
            <div class="layui-input-block">
              <input type="text" name="price" required  lay-verify="required|number" placeholder="请输入单价" autocomplete="on" class="layui-input">
            </div>
          </div>

        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">总价</label>
            <div class="layui-input-block">
              <input type="text" name="total" required  lay-verify="required|number" placeholder="请输入总价" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">送货日期</label>
            <div class="layui-input-block">
              <input type="text" name="shtime" required  lay-verify="required" placeholder="请输入要求送货日期" autocomplete="on" class="layui-input shrq">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->

        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->

        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-block">
      <textarea name="note" placeholder="请输入备注的内容" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formAdd" id="formAdd" cishu='0'>立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
</div>
<script>
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formAdd)', function(data){
    //防止重复提交
    if($("#addMsg #formAdd").attr('cishu')!='0'){
      layer.msg('亲！您已经提交过了哦！');
      return false;
    }
    // console.log(data.field);
    $.ajax({
      url: "<?php echo url('Caigou/addOrder'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $("#addMsg #formAdd").attr('cishu','1');
          // console.log(res);
      }
    })
    return false;
  });
});

layui.use('laydate', function(){
  var laydate = layui.laydate;
  laydate.render({
    elem: '#addMsg .shrq' //指定元素
  });
});
</script>
</div>
<!-- 以上是添加弹窗 -->

<!-- 以下是编辑弹窗 -->
<div id="editOrder" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
</style>
<div class="box">
<form class="layui-form" action="" method="post">
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">供应商名称</label>
            <div class="layui-input-block">
              <input type="text" name="supplier" required  lay-verify="required" placeholder="请输入供应商名称" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">品名</label>
            <div class="layui-input-block">
              <input type="text" name="pinming" required  lay-verify="required" placeholder="请输入品名" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">类别</label>
            <div class="layui-input-block">
              <input type="text" name="leibie" required  lay-verify="required" placeholder="请输入类别" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">型号</label>
            <div class="layui-input-block">
              <input type="text" name="type" required  lay-verify="required" placeholder="请输入型号" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <div class="layui-input-block">
              <input type="text" name="size" required  lay-verify="required" placeholder="请输入规格" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">单位</label>
            <div class="layui-input-block">
              <input type="text" name="danwei" required  lay-verify="required" placeholder="请输入单位" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">数量</label>
            <div class="layui-input-block">
              <input type="text" name="number" required  lay-verify="required|number" placeholder="请输入数量" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">单价</label>
            <div class="layui-input-block">
              <input type="text" name="price" required  lay-verify="required|number" placeholder="请输入单价" autocomplete="on" class="layui-input">
            </div>
          </div>

        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">总价</label>
            <div class="layui-input-block">
              <input type="text" name="total" required  lay-verify="required|number" placeholder="请输入总价" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">送货日期</label>
            <div class="layui-input-block">
              <input type="text" name="shtime" placeholder="请输入要求送货日期" autocomplete="on" class="layui-input shrq">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">发货日期</label>
            <div class="layui-input-block">
              <input type="text" name="fhtime" placeholder="请输入供应商发货日期" autocomplete="on" class="layui-input fhrq">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">到货日期</label>
            <div class="layui-input-block">
              <input type="text" name="dhtime" placeholder="请输入供应商到货日期" autocomplete="on" class="layui-input dhrq">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-block">
      <textarea name="note" placeholder="请输入备注的内容" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name="id">
      <button class="layui-btn" lay-submit lay-filter="formEdit">立即提交</button>
      <button type="reset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
</div>
<script>
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formEdit)', function(data){
    console.log(data.field);
    $.ajax({
      url: "<?php echo url('Caigou/editOrder'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          // console.log(res);
      }
    })
    return false;
  });
});

layui.use('laydate', function(){
  var laydate = layui.laydate;
  laydate.render({
    elem: '#editMsg .shrq' //指定元素
  });
  laydate.render({
    elem: '#editMsg .fhrq' //指定元素
  });
  laydate.render({
    elem: '#editMsg .dhrq' //指定元素
  });
});
</script>
</div>
<!-- 以上是编辑弹窗 -->

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
    $("#zhuangcheTitle").html("苏州材料装车单");
    var text =$("#zhuangche").html();
    var height = $(window).height()*0.9;
    //console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'材料装车单'
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
        ,{field: 'id', title: '采购ID',width:'9%'}
        ,{field: 'supplier', title: '供应商',width:'11%'}
        ,{field: 'caigoutime', title: '采购时间',width:'14%'}
        ,{field: 'type', title: '型号',width:'11%'}
        ,{field: 'pinming', title: '品名',width:'11%'}
        ,{field: 'size', title: '规格',width:'11%'}
        ,{field: 'leibie', title: '类别',width:'11%'}
        ,{field: 'danwei', title: '单位',width:'11%'}
        ,{field: 'number', title: '数量',width:'11%'}
      ]] //设置表头
      ,data:checkStatus.data
    });
  })
}
function jczc(data){
  for(i=0;i<data.length;i++){
    // 检测装车状态
    if(data[i].zcstatus!=0){
      layer.msg("亲，每个记录只能装一次车车！");
      return false;
    }
    // 检测订单状态
    if(data[i].status!=1){
      layer.msg("亲，历史订单不能再装车了哟");
      return false;
    }
    //检测发货时间和到货时间是否填写
    if(data[i].fhtime=='0000-00-00'||data[i].fhtime=='0100-01-01'){
      layer.msg("抱歉，供应商还未发货，无法装车！");
      return false;
    }
    if(data[i].dhtime=='0000-00-00'||data[i].dhtime=='0100-01-01'){
      layer.msg("抱歉，还未到货，无法装车！");
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
        url: "<?php echo url('Caigou/addZhuangche'); ?>",
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

<!-- 以下是合并打款的弹窗内容 -->
<script type="text/javascript">
function dakuan(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    // 如果没有选择数据 return false；
    if(checkStatus.data.length==0){
      layer.msg("亲！求你了，好歹选一条数据吧！");
      return false;
    }
    //检测是否已转款
    if(!jczk(checkStatus.data)){
      return false;
    }
    // 完善订单信息（总计等）
    wanshanDk(checkStatus.data);
    //获取当前时间
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#dakuanTime").html("合并时间："+today);
    $("#dakuanTitle").html("合并打款单");
    var text =$("#dakuan").html();
    var height = $(window).height()*0.9;
    //console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'合并打款单'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="dakuanMsg">'+ text +'</div>'
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
      elem: '#dakuanMsg #dakuanTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'dakuanTable'
      ,cols: [[
        {type:'checkbox',LAY_CHECKED:true,width:'0'}
        ,{field: 'id', title: '采购ID',width:'9%'}
        ,{field: 'supplier', title: '供应商',width:'11%'}
        ,{field: 'caigoutime', title: '采购时间',width:'14%'}
        ,{field: 'type', title: '型号',width:'11%'}
        ,{field: 'pinming', title: '品名',width:'11%'}
        ,{field: 'size', title: '规格',width:'11%'}
        ,{field: 'danwei', title: '单位',width:'11%'}
        ,{field: 'price', title: '单价',width:'11%'}
        ,{field: 'number', title: '数量',width:'11%'}
      ]] //设置表头
      ,data:checkStatus.data
    });
  })
}
function jczk(data){
  var supplier = data[0].supplier;
  for(i=0;i<data.length;i++){
    // 检测是否为同一供应商
    if(data[i].supplier!=supplier){
      layer.msg("抱歉！只用合并一家供应商的订单！");
      return false;
    }
    // 检测装车状态
    if(data[i].zkid!=0){
      layer.msg("亲，每个记录有且只能属于一个转款合并单！");
      return false;
    }
    // 检测是否填写供应商
    if(data[i].supplier.length==0){
      layer.msg("亲，供应商是必填项哦！");
      return false;
    }
    // 检测订单状态
    if(data[i].status!=1){
      layer.msg("物是人非事事休！");
      return false;
    }
  }
  return true;
}
function wanshanDk(data){
  $("#dk_supplier").text(data[0].supplier);
  total = 0;
  for(i=0;i<data.length;i++){
    total += data[i].number*data[i].price;
  }
  $("#dk_total").text(total);
}
</script>
<style type="text/css">
#dakuanMsg .laytable-cell-checkbox{display:none;}
</style>
<div id="dakuan" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #dakuanTitle{text-align:center;font-size:25px;line-height:25px;}
    #dakuanTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #dakuanMsg .layui-table-view,#dakuanMsg .layui-table-header,#dakuanMsg th,#dakuanMsg td{border-color:#000;}
    #dakuanMsg .dkTable{width:959px;}
    #dakuanMsg .dkTable th,#dakuanMsg .dkTable td{text-align:center;border-color:#000;line-height: 38px;height:38px;font-weight:normal;}
</style>
<div class="box">
  <p id="dakuanTitle"></p>
  <p id="dakuanTime"></p>
  <table class="dkTable" border="1" cellspacing="0">
      <tr>
          <th style="width:9%;">供应商</th>
          <th style="width:11%;" id="dk_supplier"></th>
          <th style="width:14%;">单号</th>
          <th style="width:22%;"><input type="text" name="danhao" style="width:90%;height:100%;line-height:38px;border:0;" placeholder="请输入单号" id="dk_danhao"></th>
          <th style="width:44%;"></th>
      </tr>
  </table>
  <table id="dakuanTable" lay-filter="dakuanTable" ></table>
  <table class="dkTable" border="1" cellspacing="0">
      <tr>
          <th style="width:56%;"><input type="text" name="note" style="width:90%;height:100%;line-height:38px;border:0;" placeholder="请输入订单备注" id="dk_note"></th>
          <th style="width:11%;">总计</th>
          <th style="width:11%;" id="dk_total"></th>
          <th style="width:11%;">实付</th>
          <th style="width:11%;"></th>
      </tr>
  </table>
  <p style='text-align:right;line-height:25px;'>转款时间：<span id="dk_zktime"></span></p>
  <div style="margin-top:15px;" class="dakuanBtn">
    <!-- <button class="layui-btn layui-btn-normal" onclick="dakuanPrint()">打印</button> -->
    <button class="layui-btn layui-btn-warm dakuanSub" cishu="0" onclick="dakuanSub()">提交</button>
  </div>
</div>
</div>
<script type="text/javascript">
function dakuanPrint(){
  $(".dakuanBtn").css("display","none");
  $("#dakuanMsg").jqprint();
  $(".dakuanBtn").css("display","block");
}
function dakuanSub(){
  var cishu = $("#dakuanMsg .dakuanSub").attr('cishu');
  // console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  // 判断是否填写了单号
  var danhao = $("#dakuanMsg #dk_danhao").val();
  if(danhao.length==0){
    layer.msg("忘记填写单号啦！");
    return false;
  }
  var total = $("#dakuanMsg #dk_total").text();
  var note = $("#dakuanMsg #dk_note").val();
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    console.log('danhao:'+danhao+';total:'+total+';note:'+note);
    if(checkStatus.data.length!=0){
      $.ajax({
        url: "<?php echo url('Caigou/addDakuan'); ?>",
        type: 'POST',
        data: {'shuju':checkStatus.data,'danhao':danhao,'total':total,'note':note},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
            $("#dakuanMsg .dakuanSub").attr('cishu','1');
        }
      })
    }
  })
}
</script>
<!-- 以上是合并打款的弹窗内容 -->

<!-- 以下是完成订单的内容 -->
<script type="text/javascript">
function wancheng(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    //检测能否完成
    if(!jcwc(checkStatus.data)){
      return false;
    }
    layer.open({
      title: '警告'
      ,content: '确认该记录核实无误，已经完成？'
      ,yes: function(index, layero){
        $.ajax({
          url: "<?php echo url('Caigou/editOrder'); ?>",
          type: 'POST',
          data: {'id':checkStatus.data[0].id,'status':2},
          success:function(res){
              layer.msg(res.msg, {time: 2000},function(){});
              // console.log(res);
          }
        })
        table.reload('orderTable',{});
        layer.close(index); //如果设定了yes回调，需进行手工关闭
      }
    });
  })
}
function jcwc(data){
  if(data.length!=1){
    layer.msg("为保障数据安全，一次只能处理一条数据！");
    return false;
  }
  if(data[0].zcstatus!=3){
    layer.msg("南通还未收货，无法完成该数据！");
    return false;
  }
  if(data[0].zkid==0){
    layer.msg("还未进行转款合并，无法完成该数据");
    return false;
  }
  return true;
}
</script>
<!-- 以上是完成订单的内容 -->

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