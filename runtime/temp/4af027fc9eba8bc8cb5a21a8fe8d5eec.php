<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:71:"F:\phpstudy\WWWSCERP\public/../application/home\view\sumao\songhuo.html";i:1519815695;s:64:"F:\phpstudy\WWWSCERP\public/../application/home\view\layout.html";i:1514539775;}*/ ?>
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
  <div class="layui-col-md6" id="search1" style="clear:none;margin:0;">
    <div class="layui-input-inline" style="width:auto;">
      <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
        <option value="zcid">id</option>
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
          url: '<?php echo url('Sumao/getFhOrder'); ?>'
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
            url: '<?php echo url('Sumao/getFhOrder'); ?>'
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
    url:'<?php echo url('Sumao/getFhOrder'); ?>',
    method:'post',
    page:true,
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{field:'fhid', width:'5%', templet: '#fhsn'}">单号</th>
        <th lay-data="{field:'uid', width:'10%'}">客户编号</th>
        <th lay-data="{field:'uname', width:'10%'}">用户姓名</th>
        <th lay-data="{field:'wuliu', width:'10%'}">物流</th>
        <th lay-data="{field:'mobile', width:'10%'}">联系方式</th>
        <th lay-data="{field:'payment', width:'10%'}">支付方式</th>
        <th lay-data="{field:'addtime', width:'13%'}">添加时间</th>
        <th lay-data="{field:'note', width:'12%'}">备注</th>
        <th lay-data="{field:'admin', width:'10%'}">管理员</th>
        <th lay-data="{fixed: 'right', width:'10%', toolbar: '#barDemo'}">操作</th>
    </tr>
  </thead>
</table>
<script type="text/html" id="fhsn">
    fh-{{ d.fhid }}
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
            //console.log(data);
            xiangqing(data);
          }
        });
    });
</script>


<!-- 以下是查看详情的弹窗内容 -->
<style type="text/css">
#xiangqingMsg .laytable-cell-checkbox{display:none;}
</style>
<script type="text/javascript">
function xiangqing(data){
  layui.use('table', function(){
    var table = layui.table;
    //获取当前时间
$.ajax({
  url: "<?php echo url('Sumao/getFhXiangqing'); ?>",
  type: 'POST',
  data: {'oid':data.oid},
  success:function(res){
    dXq = res.data;
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#fahuoTime").html("时间："+today);
    $("#xiangqingTitle").html(data.title);
    $("#uT_fhsn").text('fh-'+data.fhid);
    $("#uT_fhtime").text(today);
    $("#uT_kaidandata").text(data.addtime);
    $("#uT_usercode").text(data.uid);
    $("#uT_linkman").text(data.uname);
    $("#uT_wuliu").text(data.wuliu);
    $("#uT_mobile").text(data.mobile);
    $("#uT_payment").text(data.payment);
    $("#uT_total").text(data.total);
    $('#xiangqing .xiangqingSub').attr('onclick','xiangqingSub('+data.fhid+')');
    //打开弹窗
    var text =$("#xiangqing").html();
    var height = $(window).height()*0.9;
    layer.open({
      type: 1
      ,title :'发货单'
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
        {type:'checkbox',LAY_CHECKED:true,width:'0'}
        ,{field: 'brand', title: '品牌',width:'13%'}
        ,{field: 'type', title: '型号',width:'13%'}
        ,{field: 'size', title: '规格',width:'13%'}
        ,{field: 'parma', title: '布号/方向',width:'13%'}
        ,{field: 'number', title: '数量',width:'10%'}
        ,{field: 'price', title: '单价',width:'10%'}
        ,{field: 'duifang', title: '堆放区域',width:'13%'}
        ,{field: 'total', title: '金额',width:'15%'}

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
    #xiangqingMsg #userTable,#xiangqingMsg #userTable2{width:959px;margin-top:10px;}
    #xiangqingMsg #userTable th,#xiangqingMsg #userTable td,#xiangqingMsg #userTable2 th,#xiangqingMsg #userTable2 td{text-align:center;border-color:#000;line-height: 38px;font-weight:normal;}
</style>
<div class="box">
  <p id="xiangqingTitle"></p>
  <p id="xiangqingTime"></p>
  <table id="userTable" border="1" cellspacing="0">
      <tr>
          <th style="width:13%;">发货日期</th>
          <th style="width:13%;" id='uT_fhtime'></th>
          <th style="width:13%;"></th>
          <th style="width:13%;">开单日期</th>
          <th style="width:33%;" id='uT_kaidandata'></th>
          <th style="width:15%;" id='uT_fhsn'></th>
      </tr>
      <tr>
          <td>客户编号</td>
          <td>客户名称</td>
          <td colspan="2">物流联系方式</td>
          <td>收货人地址电话</td>
          <td>收款方式</td>
      </tr>
      <tr>
          <td id='uT_usercode'></td>
          <td id='uT_linkman'></td>
          <td colspan="2" id='uT_wuliu'></td>
          <td id='uT_mobile'></td>
          <td id='uT_payment'></td>
      </tr>
  </table>
  <table id="xiangqingTable" lay-filter="xiangqingTable" ></table>
  <table id="userTable2" border="1" cellspacing="0" style="margin-top:0;">
      <tr>
          <th style="width:13%;"></th>
          <th style="width:13%;"></th>
          <th style="width:13%;"></th>
          <th style="width:13%;"></th>
          <th style="width:33%;">总计</th>
          <th style="width:15%;" id="uT_total"></th>
      </tr>
  </table>
  <p style='text-align:right;line-height:25px;'><span style="float:left;">地址：相城区澄波路458号</span>
    开户银行及账号：庞林 农行6228 4804 0068 5144 919
  </p>
  <p style="text-align:right;line-height:25px;">开单：<span style="padding:0 35px;"></span>客户签名：<span style="margin:0 35px;"></span></p>
  <div style="margin-top:15px;" class="xiangqingBtn">
    <button class="layui-btn layui-btn-normal" onclick="xiangqingPrint()">打印</button>
    <button class="layui-btn layui-btn-warm xiangqingSub" cishu="0">确认已发货</button>
  </div>
</div>
</div>
<script type="text/javascript">
function xiangqingPrint(){
  $(".xiangqingBtn").css("display","none");
  $("#xiangqingMsg #userTable").css('margin-bottom','-10px');
  $("#xiangqingMsg #userTable2").css('margin-top','-10px');
  $("#xiangqingMsg").jqprint();
  $(".xiangqingBtn").css("display","block");
  $("#xiangqingMsg #userTable").css('margin-bottom','0');
  $("#xiangqingMsg #userTable2").css('margin-top','0px');
}
function xiangqingSub(fhid){
  var cishu = $("#xiangqingMsg .xiangqingSub").attr('cishu');
  //console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  layer.confirm('这个单子我确认已经发货！', {icon: 3, title:'警告'}, function(index){
      $.ajax({
        url: "<?php echo url('Sumao/completeFahuo'); ?>",
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