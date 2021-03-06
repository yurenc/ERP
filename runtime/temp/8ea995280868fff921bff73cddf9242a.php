<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/web/erp/public_html/public/../application/home/view/caigou/cgdakuan.html";i:1514427649;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514451361;}*/ ?>
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
      <li class="layui-nav-item <?php if($controller == 'System'): ?>layui-this<?php endif; ?>">
              <a href="<?php echo url('Goods/index'); ?>">数据中心</a>
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
  <div class="layui-col-md1">&nbsp;</div>
  <div class="layui-col-md9" id="search1" style="clear:none;margin:0;">
    <div class="layui-input-inline" style="width:auto;">
      <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
        <option value="zkid">id</option>
      </select>
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v1" placeholder="Search for...">
    </div>
    <button class="layui-btn layui-btn-small layui-btn-warm layui-btn-radius" style="    font-size:20px;">+</button>
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="start" placeholder="开单时间段始" autocomplete="off" class="layui-input" id="xdsstart">
    </div>-
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="end" placeholder="开单时间段末" autocomplete="off" class="layui-input" id="xdsend">
    </div>
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
    <div class="layui-form layui-input-inline">
      <label class="layui-form-label">已转款</label>
      <div class="layui-input-block">
        <input type="checkbox" id="status" name="stauts" lay-skin="switch" lay-filter="status">
      </div>
    </div>
  </div>
  <div class="layui-col-md2">
    <a href="javascript:expExcel();" class="layui-btn layui-btn-warm">导出到Excel</a>
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
    var k2 = 'addtime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var search = {}
    search.k1=k1;
    search.v1=v1;
    search.k2=k2;
    search.vds=vds;
    search.vde=vde;
    // console.log(search);
    layui.use('table', function(){
        var table = layui.table;
        table.reload('orderTable', {
          url: '<?php echo url('Caigou/getCgDkOrder'); ?>'
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
function expExcel(){
    if($("#status").is(':checked')){
      var status = 2;
    }else{
      var status = 1;
    };
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var k2 = 'addtime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
  var geturl = '?k1='+k1+'&v1='+v1+'&k2='+k2+'&vds='+vds+'&vde='+vde+'&status='+status;
  // console.log(search);
  window.open('<?php echo url('Excel/expCgOrder'); ?>'+geturl);
  // window.location.href = '<?php echo url('Excel/expCgOrder'); ?>'+geturl;
}
</script>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-130',
    url:'<?php echo url('Caigou/getCgDkOrder'); ?>',
    method:'post',
    page:true,
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{field:'zkid', width:'6%', templet: '#zcsn', sort:true}">转款ID</th>
        <!-- <th lay-data="{field:'title', width:'9%'}">标题</th> -->
        <th lay-data="{field:'supplier', width:'8%', sort:true}">供应商</th>
        <th lay-data="{field:'danhao', width:'9%', sort:true}">单号</th>
        <th lay-data="{field:'total', width:'8%'}">总计</th>
        <th lay-data="{field:'shifu', width:'8%'}">实付</th>
        <th lay-data="{field:'addtime', width:'10%'}">添加时间</th>
        <th lay-data="{field:'zktime', width:'10%'}">转款日期</th>
        <th lay-data="{field:'note', width:'8%'}">备注</th>
        <th lay-data="{field:'admin', width:'8%'}">管理员</th>
        <th lay-data="{field:'zkfs', width:'9%'}">转款方式</th>
        <th lay-data="{field:'status', width:'8%' , templet: '#ss'}">状态</th>
        <th lay-data="{fixed: 'right', width:'8%', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>
<script type="text/html" id="zcsn">
    zk-{{ d.zkid }}
</script>
<script type="text/html" id="ss">
  {{#  if(d.status==1){ }}
        <span style="color:red">未打款</span>
  {{#  } else if(d.status==2) { }}
        <span style="color:green">已打款</span>
  {{#  } }}
</script>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="xiangqing">详情</a>
</script>
<script>
    layui.use('table', function(){
        var table = layui.table;
        table.on('tool(orderTable)', function(obj){
          var data = obj.data; //获得当前行数据
          var layEvent = obj.event;
          if(layEvent === 'xiangqing'){
            // console.log(data);
            xiangqing(data);
          }
        });
    });
</script>


<!-- 以下是查看详情的弹窗内容 -->
<script type="text/javascript">
function xiangqing(data){
  if($("#status").is(':checked')){
    $(".xiangqingBtn").css("display","none");
  }
  layui.use('table', function(){
    var table = layui.table;
$.ajax({
  url: "<?php echo url('Caigou/getDkXiangqing'); ?>",
  type: 'POST',
  data: {'zkid':data.zkid},
  success:function(res){
    dXq = res.data;
    $("#xiangqingSn").html("打款单ID："+'zk-'+data.zkid);
    $("#xiangqingTime").html("合并时间："+data.addtime);
    $("#xiangqingTitle").html("采购财务打款合并单");
    $("#xiangqingAdmin").html("开单人："+data.admin);
    $("#dk_supplier").html(data.supplier);
    $("#dk_danhao").html(data.danhao);
    $("#dk_zkfs").html(data.zkfs);
    $("#dk_total").html(data.total);
    $('#xiangqing .xiangqingSub').attr('onclick','xiangqingSub('+data.zkid+')');
    var text =$("#xiangqing").html();
    var height = $(window).height()*0.9;
    //console.log(checkStatus.data)
    //打开弹窗
    layer.open({
      type: 1
      ,title :'采购财务打款合并单'
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
    $("#xiangqingMsg #dk_note").val(data.note);
    $("#xiangqingMsg #dk_shifu").val(data.shifu);
    //组合表格数据
    table.render({
      elem: '#xiangqingMsg #xiangqingTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'xiangqingTable'
      ,cols: [[
        {type:'checkbox',LAY_CHECKED:true,width:'0'}
        ,{field: 'id', title: '采购ID',width:'7%'}
        ,{field: 'supplier', title: '供应商',width:'10%'}
        ,{field: 'caigoutime', title: '采购时间',width:'14%'}
        ,{field: 'type', title: '型号',width:'10%'}
        ,{field: 'pinming', title: '品名',width:'10%'}
        ,{field: 'size', title: '规格',width:'10%'}
        ,{field: 'danwei', title: '单位',width:'10%'}
        ,{field: 'price', title: '单价',width:'10%'}
        ,{field: 'number', title: '数量',width:'10%'}
        ,{field: 'total', title: '合计',width:'9%'}
      ]] //设置表头
      ,data:dXq
    });
  }
})


  })
}
</script>
<style type="text/css">
#xiangqingMsg .laytable-cell-checkbox{display:none;}
</style>
<div id="xiangqing" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #xiangqingTitle{text-align:center;font-size:25px;line-height:25px;}
    #xiangqingMsg .layui-table-view,#xiangqingMsg .layui-table-header,#xiangqingMsg th,#xiangqingMsg td{border-color:#000;}
    #xiangqingMsg .dkTable{width:959px;}
    #xiangqingMsg .dkTable th,#xiangqingMsg .dkTable td{text-align:center;border-color:#000;line-height: 38px;height:38px;font-weight:normal;}
    #xiangqingMsg .layui-table-view .layui-table{width:100%;}
</style>
<div class="box">
  <p id="xiangqingTitle"></p>
  <p style="line-height: 30px;padding:0 10px;">
    <span id="xiangqingSn" style="float:left;"></span>
    <span id="xiangqingTime" style="float:right;"></span>
  </p>
  <table class="dkTable dkTable1" border="1" cellspacing="0">
      <tr>
          <th style="width:7%;">供应商</th>
          <th style="width:10%;" id="dk_supplier"></th>
          <th style="width:14%;">单号</th>
          <th style="width:20%;" id="dk_danhao"></th>
          <th style="width:10%;">打款方式</th>
          <th style="width:20%;" id="dk_zkfs"></th>
          <th style="width:29%;"></th>
      </tr>
  </table>
  <table id="xiangqingTable" lay-filter="xiangqingTable" ></table>
  <table class="dkTable dkTable2" border="1" cellspacing="0">
      <tr>
          <th style="width:61%;" id="dk_note_box"><input type="text" name="note" style="width:90%;height:100%;line-height:38px;border:0;" placeholder="请输入订单备注" id="dk_note"></th>
          <th style="width:10%;">实付</th>
          <th style="width:10%;" id="dk_shifu_box"><input type="text" name="shifu" style="width:90%;height:100%;line-height:38px;border:0;" placeholder="请输入实付金额" id="dk_shifu"></th>
          <th style="width:10%;">总计</th>
          <th style="width:9%;" id="dk_total"></th>
      </tr>
  </table>
  <p id="xiangqingAdmin" style="text-align:right;">转款时间：<span id="dk_zktime"></span></p>
  <div style="margin-top:15px;" class="xiangqingBtn">
    <button class="layui-btn layui-btn-normal" onclick="xiangqingPrint()">打印</button>
    <button class="layui-btn layui-btn-warm xiangqingSub" cishu="0">打款完成</button>
  </div>
</div>
</div>
<script type="text/javascript">
function xiangqingPrint(){
  $(".xiangqingBtn").css("display","none");
  $("#xiangqingMsg #dk_note_box").html($("#xiangqingMsg #dk_note").val());
  $("#xiangqingMsg #dk_shifu_box").html($("#xiangqingMsg #dk_shifu").val());
  $('#xiangqingMsg .dkTable1').css('margin-bottom','-10px');
  $('#xiangqingMsg .dkTable2').css('margin-top','-10px');
  $("#xiangqingMsg").jqprint();
  $('#xiangqingMsg .dkTable1').css('margin-bottom','0px');
  $('#xiangqingMsg .dkTable2').css('margin-top','0px');
  $(".xiangqingBtn").css("display","block");
}
function xiangqingSub(zkid){
  var cishu = $("#xiangqingMsg .xiangqingSub").attr('cishu');
  console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  var note = $("#xiangqingMsg #dk_note").val();
  var shifu = $("#xiangqingMsg #dk_shifu").val();
  if(shifu==0){
    layer.msg("抱歉！转款金额不能为0！！");
    return false;
  }
  layer.confirm('转款IID为：zk-'+zkid+'已转款完成，并确认核实无误?', {icon: 3, title:'警告'}, function(index){
      $.ajax({
        url: "<?php echo url('Caigou/completeDakuan'); ?>",
        type: 'POST',
        data: {'zkid':zkid,'note':note,'shifu':shifu},
        success:function(res){
            layer.msg(res.msg, {time: 2000},function(){});
        }
      })
      layer.close(index);
  });
  var cishu = $("#xiangqingMsg .xiangqingSub").attr('cishu','1');
}
</script>
<!-- 以上是查看详情的弹窗内容 -->







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