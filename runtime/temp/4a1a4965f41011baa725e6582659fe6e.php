<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/web/erp/public_html/public/../application/home/view/sumao/allorder.html";i:1514427649;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514539775;}*/ ?>
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
    #category .layui-form-radio {margin:0;padding:0;line-height:18px;}
    #category .layui-form-radio i{font-size:18px;}
</style>
<blockquote class="layui-elem-quote">
<div class="layui-row">
  <div class="layui-col-md3" style="padding-left:5px;">
    <div class="layui-form layui-input-inline" id="category">
      <input type="radio" name="category" value="床垫" title="床垫" checked lay-filter="dcategory">
      <input type="radio" name="category" value="软体沙发" title="软体沙发" lay-filter="dcategory">
    </div>
  </div>
  <div class="layui-col-md9" style="clear:none;margin:0;">
    <a href="javascript:expExcel();" class="layui-btn layui-btn-warm">导出到Excel</a>
    <button class="layui-btn layui-btn-danger" onclick="jiedan()" style="">复制接单</button>
  </div>
</div>
<div class="layui-row" style="padding-top:10px;">
  <div class="layui-col-md12" id="search1" style="margin-left:5px;">
    <div class="layui-input-inline" style="width:auto;">
      <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
        <option value="usercode">用户编号</option>
        <option value="username">用户名</option>
      </select>
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v1" placeholder="Search for..." style="width:100px;">
    </div>+
    <div class="layui-input-inline" style="">
      品牌
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v3" placeholder="Search for..." style="width:100px;">
    </div>+
    <div class="layui-input-inline" style="">
      型号
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v4" placeholder="Search for..." style="width:100px;">
    </div>+
    <div class="layui-input-inline" style="">
      布号/方向
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v5" placeholder="Search for..." style="width:100px;">
    </div>+
    <div class="layui-input-inline" style="">
      价格
    </div>
    <div class="layui-input-inline" style="">
      <input type="text" class="layui-input" name="v6" placeholder="Search for..." style="width:100px;">
    </div>+
    （
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="start" placeholder="下单时间段始" autocomplete="off" class="layui-input" id="xdsstart">
    </div>~
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="end" placeholder="下单时间段末" autocomplete="off" class="layui-input" id="xdsend">
    </div>）
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
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
          url: '<?php echo url('Sumao/getAllOrder'); ?>'
          ,where: {'category':category}
          ,height:'full-180'
          ,page:{curr: 1}
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
    var v3 = $("#search1 input[name='v3']").val();
    var v4 = $("#search1 input[name='v4']").val();
    var v5 = $("#search1 input[name='v5']").val();
    var v6 = $("#search1 input[name='v6']").val();
    var k2 = 'xiadantime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var search = {}
    search.k1=k1;
    search.v1=v1;
    search.k2=k2;
    search.vds=vds;
    search.vde=vde;
    search.k3 = 'brand';
    search.v3 = v3;
    search.k4 = 'type';
    search.v4 = v4;
    search.k5 = 'parma';
    search.v5 = v5;
    search.k6 = 'price';
    search.v6 = v6;
    // console.log(search);
    if(!jQuery.isEmptyObject(search)){
      console.log(search);
      layui.use('table', function(){
        var table = layui.table;
        table.reload('orderTable', {
          url: '<?php echo url('Sumao/getAllOrder'); ?>'
          ,where: {'search':search,'category':category}
          ,height:'full-180'
          ,done: function(res, curr, count){
            console.log(res);
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
function expExcel(){
var category = $("#category input[name='category']:checked").val();
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var v3 = $("#search1 input[name='v3']").val();
    var v4 = $("#search1 input[name='v4']").val();
    var v5 = $("#search1 input[name='v5']").val();
    var v6 = $("#search1 input[name='v6']").val();
    var k2 = 'xiadantime';
    var vds = $("#xdsstart").val();
    var vde = $("#xdsend").val();
    var geturl = '?category='+category+'&k1='+k1+'&v1='+v1+'&k2='+k2+'&vds='+vds+'&vde='+vde+'&k3=brand&v3='+v3+'&k4=type&v4='+v4+'&k5=parma&v5='+v5+'&k6=price&v6='+v6;
    // console.log(search);
    window.location.href = '<?php echo url('Excel/expOrder'); ?>'+geturl;
}
function jiedan(){
  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    data = checkStatus.data
    // console.log();
    $.ajax({
      url: '<?php echo url('Sumao/addAllOrder'); ?>',
      type: 'POST',
      data: {'data':data},
      success:function(res){
        layer.msg(res.msg);
      }
    })
  })
}
</script>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-180',
    url:'<?php echo url('Sumao/getAllOrder'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{checkbox:true}"></th>
        <th lay-data="{field:'usercode', width:70, sort:true}">用户编号</th>
        <th lay-data="{field:'username', width:60, sort:true}">用户名称</th>
        <th lay-data="{field:'leibie', width:60, sort:true}">类别</th>
        <th lay-data="{field:'brand', width:60, sort:true}">品牌</th>
        <th lay-data="{field:'type', width:60, sort:true}">型号</th>
        <th lay-data="{field:'size', width:60, sort:true}">规格</th>
        <th lay-data="{field:'parma', width:80, sort:true}">布号/方向</th>
        <th lay-data="{field:'number', width:50, sort:true}">数量</th>
        <th lay-data="{field:'price', width:70, sort:true}">单价</th>
        <th lay-data="{field:'payment', width:90, sort:true}">收款方式</th>
        <th lay-data="{field:'duifang', width:80, sort:true}">堆放区域</th>
        <th lay-data="{field:'shaddress', width:150, sort:true}">送货地址</th>
        <th lay-data="{field:'xiadantime', width:90, sort:true}">下单日期</th>
        <th lay-data="{field:'yqshtime', width:90, sort:true}">要求送货日期</th>
        <th lay-data="{field:'note', width:60, sort:true}">备注</th>
        <th lay-data="{field:'id', width:40, sort:true}">ID</th>
        <th lay-data="{field:'yhstatus', width:80, templet: '#yhss', sort:true}">要货状态</th>
        <th lay-data="{field:'scstatus', width:80, templet: '#scss', sort:true}">生产状态</th>
        <th lay-data="{field:'zcstatus', width:80, templet: '#zcss', sort:true}">装车状态</th>
        <th lay-data="{field:'fhstatus', width:80, templet: '#fhss', sort:true}">发货状态</th>
    </tr>
  </thead>
</table>

<script type="text/html" id="yhss">
  {{#  if(d.yhstatus==0){ }}
        -
  {{#  } else if(d.yhstatus==1) { }}
        南通备货中
  {{#  } else if(d.yhstatus==2) { }}
        苏州到货
  {{#  } }}
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

<script type="text/html" id="fhss">
  {{#  if(d.fhstatus==0){ }}
        -
  {{#  } else if(d.fhstatus==1) { }}
        等待发货
  {{#  } else if(d.fhstatus==2) { }}
        已发货
  {{#  } else if(d.fhstatus==3) { }}
        客户签收
  {{#  } }}
</script>

<script>
    layui.use('table', function(){
        var table = layui.table;
        // table.on('checkbox(orderTable)', function(obj){
        //   console.log(obj.checked); //当前是否选中状态
        //   console.log(obj.data); //选中行的相关数据
        //   console.log(obj.type); //
        // });
    });

</script>








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