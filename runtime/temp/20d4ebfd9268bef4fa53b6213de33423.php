<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/web/erp/public_html/public/../application/home/view/sumao/order.html";i:1515063668;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514539775;}*/ ?>
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
  <div class="layui-col-md4" style="padding-left:5px;">
    <div class="layui-btn-group">
      <button class="layui-btn layui-btn-warm" onclick="editOrder()"><i class="layui-icon">&#xe642;</i>修改</button>
      <button class="layui-btn layui-btn-danger" onclick="delOrder()"><i class="layui-icon">&#xe640;</i>删除</button>
    </div>
    <div class="layui-form layui-input-inline" id="category">
      <input type="radio" name="category" value="床垫" title="床垫" checked lay-filter="dcategory"><br/>
      <input type="radio" name="category" value="软体沙发" title="软体沙发" lay-filter="dcategory">
    </div>
  </div>
  <div class="layui-col-md7" id="search1" style="clear:none;margin:0;width:54.1%;">
      <div class="layui-input-inline" style="width:auto;">
        <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
          <option value="usercode">用户编号</option>
          <option value="username">用户名称</option>
        </select>
      </div>
      <div class="layui-input-inline" style="">
        <input type="text" class="layui-input" name="v1" placeholder="Search for...">
      </div>+（
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="start" placeholder="下单时间段始" autocomplete="off" class="layui-input" id="xdsstart">
    </div>~
    <div class="layui-input-inline" style="width: 100px;">
      <input type="text" name="end" placeholder="下单时间段末" autocomplete="off" class="layui-input" id="xdsend">
    </div>）
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
  </div>
  <div class="layui-col-md2" style="width:12.5%;">
    <button class="layui-btn layui-btn-radius layui-btn-normal" onclick="yaohuo()">要货</button>
    <button class="layui-btn layui-btn-radius layui-btn-danger" onclick="fahuo()" style="margin-left:0;">发货</button>
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
          url: '<?php echo url('Sumao/getOrder'); ?>'
          ,where: {'category':category}
          ,height:'full-130'
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
            url: '<?php echo url('Sumao/getOrder'); ?>'
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
    url:'<?php echo url('Sumao/getOrder'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
      <th lay-data="{checkbox:true}"></th>
      <th lay-data="{field:'id', width:60, sort: true}">ID</th>
      <th lay-data="{field:'usercode', width:70, sort: true}">用户编号</th>
      <th lay-data="{field:'username', width:60, sort: true}">用户名称</th>
      <th lay-data="{field:'leibie', width:60, sort: true}">类别</th>
      <th lay-data="{field:'brand', width:60, sort: true}">品牌</th>
      <th lay-data="{field:'type', width:60, sort: true}">型号</th>
      <th lay-data="{field:'size', width:60, sort: true}">规格</th>
      <th lay-data="{field:'parma', width:80, sort: true}">布号/方向</th>
      <th lay-data="{field:'number', width:50, sort: true}">数量</th>
      <th lay-data="{field:'kucun',width:50,sort:true,templet:'#kucun'}">库存</th>
      <th lay-data="{field:'price', width:70, sort: true}">单价</th>
      <th lay-data="{field:'xiadantime', width:90, sort: true}">下单日期</th>
      <th lay-data="{field:'yqshtime', width:90, sort: true}">要求送货日期</th>
      <th lay-data="{field:'shaddress', width:90}">送货地址</th>
      <th lay-data="{field:'payment', width:90}">收款方式</th>
      <th lay-data="{field:'note', width:60}">备注</th>
      <th lay-data="{field:'duifang', width:80, sort: true}">堆放区域</th>
      <th lay-data="{field:'yhstatus', width:80, templet: '#yhss' , sort: true}">要货状态</th>
      <th lay-data="{field:'scstatus', width:80, templet: '#scss' , sort: true}">生产状态</th>
      <th lay-data="{field:'zcstatus', width:80, templet: '#zcss', sort: true}">装车状态</th>
      <th lay-data="{field:'fhstatus', width:80, templet: '#fhss', sort: true}">发货状态</th>
      <th lay-data="{field:'bhstatus', width:80, templet: '#bhss', sort: true}">备货状态</th>
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
    url: "<?php echo url('Sumao/getKucun'); ?>",
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
  function editOrder(){
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
      $("#editMsg input[name='payment']").val(yuandata.payment);
      $("#editMsg input[name='duifang']").val(yuandata.duifang);
      $("#editMsg input[name='shaddress']").val(yuandata.shaddress);
      $("#editMsg textarea[name='note']").val(yuandata.note);
    });
  }
  function delOrder(){
    layui.use('table', function(){
      var table = layui.table;
      var checkStatus = table.checkStatus('orderTable');
      if(checkStatus.data.length==1){
          layer.confirm('确认要删除该数据吗？', {icon: 3, title:'警告'}, function(index){
            var ysId = checkStatus.data[0]['id'];
            $.ajax({
              url: "<?php echo url('Sumao/delOrder'); ?>",
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
</script>

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
            <label class="layui-form-label">用户编号</label>
            <div class="layui-input-block">
              <input type="text" name="usercode" required  lay-verify="required" placeholder="请输入用户编号" autocomplete="on" class="layui-input" id="Ipt_edit_usercode" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">用户名称</label>
            <div class="layui-input-block">
              <input type="text" name="username" required  lay-verify="required" placeholder="请输入用户名称" autocomplete="on" class="layui-input" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
        <div class="layui-form-item">
          <label class="layui-form-label">类别</label>
          <div class="layui-input-block">
            <input type="text" name="leibie" required  lay-verify="required" placeholder="请输入类别" autocomplete="on" class="layui-input" disabled="true">
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
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
              <input type="text" name="brand" required  lay-verify="required" placeholder="请输入品牌" autocomplete="on" class="layui-input" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">型号</label>
            <div class="layui-input-block">
              <input type="text" name="type" required  lay-verify="required" placeholder="请输入型号" autocomplete="on" class="layui-input" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">规格</label>
            <div class="layui-input-block">
              <input type="text" name="size" required  lay-verify="required" placeholder="请输入规格" autocomplete="on" class="layui-input" disabled="true">
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
            <label class="layui-form-label">布号/方向</label>
            <div class="layui-input-block">
              <input type="text" name="parma" required  lay-verify="required" placeholder="请输入布号/方向" autocomplete="on" class="layui-input" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
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
              <input type="text" name="price" required  lay-verify="required|number" placeholder="请输入单价" autocomplete="on" class="layui-input" disabled="true">
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
              <input type="text" name="yqshtime" required  lay-verify="required" placeholder="请输入要求送货日期" autocomplete="on" class="layui-input shrq">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">收款方式</label>
            <div class="layui-input-block">
              <input type="text" name="payment" required  lay-verify="required" placeholder="请输入收款方式" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">堆放区域</label>
            <div class="layui-input-block">
              <input type="text" name="duifang" required  lay-verify="required" placeholder="请输入堆放区域" autocomplete="on" class="layui-input" disabled="true">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->

  <div class="layui-form-item">
    <label class="layui-form-label">送货地址</label>
    <div class="layui-input-block">
      <input type="text" name="shaddress" required  lay-verify="required" placeholder="请输入送货地址" autocomplete="on" class="layui-input">
    </div>
  </div>

  <div class="layui-form-item layui-form-text">
    <label class="layui-form-label">备注</label>
    <div class="layui-input-block">
      <textarea name="note" placeholder="请输入备注的内容" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name="id">
      <button class="layui-btn" lay-submit lay-filter="formEdit" id="formEdit" cishu="0">立即提交</button>
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
    //防止重复提交
    if($("#editMsg #formEdit").attr('cishu')!='0'){
      layer.msg('亲！您已经提交过了哦！');
      return false;
    }
    $.ajax({
      url: "<?php echo url('Sumao/editOrder'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $("#editMsg #formEdit").attr('cishu','1')
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
});
</script>
</div>
<!-- 以上是编辑弹窗 -->

<!-- 以下是要货的弹窗内容 -->
<style type="text/css">
#yaohuoMsg .laytable-cell-checkbox{display:none;}
</style>
<script type="text/javascript">
function yaohuo(){
  layui.use('table', function(){
    var table = layui.table;
    //获取当前时间
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#yaohuoTime").html("时间："+today);
    //
    var text =$("#yaohuo").html();
    var checkStatus = table.checkStatus('orderTable');
    //console.log(checkStatus.data)
    // 如果没有选择数据 return false；
    if(checkStatus.data.length==0){
      layer.msg("亲！求你了，好歹选一条要货数据吧！");
      return false;
    }
    //检测是否要货
    if(!jcyh(checkStatus.data)){
      return false;
    }
    var height = $(window).height()*0.9;
    //打开弹窗
    layer.open({
      type: 1
      ,title :'南通要货单'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="yaohuoMsg">'+ text +'</div>'
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
      elem: '#yaohuoMsg #yaohuoTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'yaohuoTable'
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
function jcyh(data){
  for(i=0;i<data.length;i++){
    if(data[i].yhstatus!=0){
      layer.msg("做人不能太贪婪哟！要过的就不能再要了");
      return false;
    }
    if(data[i].fhstatus!=0){
      layer.msg("抱歉，已发货的订单无法向南通要货");
      return false;
    }
  }
  return true;
}
</script>
<div id="yaohuo" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #yaohuoTitle{text-align:center;font-size:25px;line-height:25px;}
    #yaohuoTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #yaohuoMsg .layui-table-view,#yaohuoMsg .layui-table-header,#yaohuoMsg th,#yaohuoMsg td{border-color:#000;}
</style>
<div class="box">
  <p id="yaohuoTitle">南通要货单</p>
  <p id="yaohuoTime"></p>
  <table id="yaohuoTable" lay-filter="yaohuoTable" ></table>
  <div style="margin-top:15px;" class="yaohuoBtn">
    <!-- <button class="layui-btn layui-btn-normal" onclick="yaohuoPrint()">打印</button> -->
    <button class="layui-btn layui-btn-warm yaohuoSub" cishu="0" onclick="yaohuoSub()">提交</button>
  </div>
</div>
</div>
<script type="text/javascript">
function yaohuoPrint(){
  $(".yaohuoBtn").css("display","none");
  $("#yaohuoMsg").jqprint();
  $(".yaohuoBtn").css("display","block");
}
function yaohuoSub(){
  var cishu = $("#yaohuoMsg .yaohuoSub").attr('cishu');
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
      layer.confirm('确认向南通提交要货?', {icon: 3, title:'警告'}, function(index){
          $.ajax({
            url: "<?php echo url('Sumao/addYaohuo'); ?>",
            type: 'POST',
            data: {'shuju':checkStatus.data},
            success:function(res){
                layer.msg(res.msg, {time: 2000},function(){});
                console.log(res);
            }
          })
          layer.close(index);
      });
    }
  })
  var cishu = $("#yaohuoMsg .yaohuoSub").attr('cishu','1');
}
</script>
<!-- 以上是要货的弹窗内容 -->
<!-- 以下是发货的弹窗内容 -->
<style type="text/css">
#fahuoMsg .laytable-cell-checkbox{display:none;}
</style>
<script type="text/javascript">
function fahuo(){
  layui.use('table', function(){
    var table = layui.table;
    //获取当前时间
    var d = new Date();
    var today = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
    $("#fahuoTime").html("时间："+today);
    $("#uT_kaidandata").text(today);
    var checkStatus = table.checkStatus('orderTable');

    // 如果没有选择数据 return false；
    if(checkStatus.data.length==0){
      layer.msg("亲！求你了，好歹选一条要货数据吧！");
      return false;
    }
    //检测是否是否已经发货和是否是发送给同一人
    if(!jcfh(checkStatus.data)){
      return false;
    }
    //获取用户信息
    getUserInfo(checkStatus.data);
    //打开弹窗
    var text =$("#fahuo").html();
    var height = $(window).height()*0.9;
    layer.open({
      type: 1
      ,title :'发货单'
      ,offset: "auto"
      ,area: ['1050px', height+'px']
      ,tipsMore: true
      ,content: '<div style="width:1000px;margin:0 auto;" id="fahuoMsg">'+ text +'</div>'
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
      elem: '#fahuoMsg #fahuoTable'
      ,cellMinWidth:80
      ,width:960
      ,id:'fahuoTable'
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
      ,data:getTotal(checkStatus.data)
    });
    layui.use('form', function(){
        var form = layui.form;
        form.render();
    });
  })
}
function getTotal(data){
  for (var i=0;i<data.length;i++) {
    data[i].total = data[i].number*data[i].price;
  };
  return data;
}
function jcfh(data){
  var usercode = data[0].usercode;
  for(i=0;i<data.length;i++){
    // 检测是否已经发过货
    if(data[i].fhstatus!=0){
      layer.msg("亲，请不要重复发货哟！");
      return false;
    }
    // 检测南通要货是否已经完成
    if(data[i].yhstatus==1){
      layer.msg("抱歉，南通要货还未完成！");
      return false;
    }
    // 检测多条数据是否属于同一人
    if(data[i].usercode!=usercode){
      layer.msg("亲，一个发货单只能发同一人的货");
      return false;
    }
    //检测库存是否足够发货
    var kucun = getKucun(data[i].brand,data[i].type,data[i].size,data[i].parma,data[i].leibie,1)
    if(data[i].number>kucun){
      layer.msg("亲，库存数不够，无法发货！");
      return false;
    }
  }
  return true;
}
function getUserInfo(data){
    var userInfo = {};
    var getUserInfoAjax = $.ajax({
      url: "<?php echo url('Sumao/getUserInfo'); ?>",
      type: 'POST',
      async:false,
      dataType:'json',
      data: {'usercode':data[0].usercode},
      success:function success(res){
         userInfo = res;
         console.log(res);
      }
    });
    // 总计
    var total = 0;
    for (var i=0;i<data.length;i++) {
      total += data[i].number*data[i].price;
    };
    $("#uT_total").text(total);
    $("#uT_usercode").text(userInfo.id);
    $("#uT_linkman").text(userInfo.linkman);
    $("#uT_wuliu").text(userInfo.wuliu);
    $("#uT_mobile").text(userInfo.mobile);
    $("#uT_payment").text(data[0].payment);
}
</script>
<div id="fahuo" style="display:none;">
<style type="text/css">
    .box{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
    #fahuoTitle{text-align:center;font-size:25px;line-height:25px;}
    #fahuoTime{text-align:right;line-height: 30px;padding-right: 10px;}
    #fahuoMsg .layui-table-view,#fahuoMsg .layui-table-header,#fahuoMsg th,#fahuoMsg td{border-color:#000;}
    #fahuoMsg .layui-table{width:100%;}
    #fahuoMsg #userTable{width:959px;}
    #fahuoMsg #userTable th,#fahuoMsg #userTable td{text-align:center;border-color:#000;line-height: 38px;font-weight:normal;}
</style>
<div class="box">
  <p id="fahuoTitle">以马内利发货单</p>
  <p id="fahuoTime"></p>
  <table id="userTable" border="1" cellspacing="0">
      <tr>
          <th style="width:13%;">发货日期</th>
          <th style="width:13%;">暂未发货</th>
          <th style="width:13%;"></th>
          <th style="width:13%;">开单日期</th>
          <th style="width:33%;" id='uT_kaidandata'></th>
          <th style="width:15%;"></th>
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
  <table id="fahuoTable" lay-filter="fahuoTable" ></table>
  <table id="userTable" border="1" cellspacing="0">
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
  <div style="margin-top:15px;" class="fahuoBtn">
    <!-- <button class="layui-btn layui-btn-normal" onclick="fahuoPrint()">打印</button> -->
    <div class="layui-form layui-input-inline" id="fahuodi">
      <input type="radio" name="fahuodi" value="1" title="苏州发货" checked>
      <input type="radio" name="fahuodi" value="2" title="南通代发">
    </div>
    <button class="layui-btn layui-btn-warm fahuoSub" cishu="0" onclick="fahuoSub()" style="margin-left:20%;">确认提交</button>
  </div>
</div>
</div>
<script type="text/javascript">
function fahuoPrint(){
  $(".fahuoBtn").css("display","none");
  $("#fahuoMsg #userTable").css('margin-bottom','-10px');
  $("#fahuoMsg").jqprint();
  $(".fahuoBtn").css("display","block");
  $("#fahuoMsg #userTable").css('margin-bottom','0');
}
function fahuoSub(){
  var cishu = $("#fahuoMsg .fahuoSub").attr('cishu');
  //console.log(cishu);
  if(cishu!='0'){
    layer.msg("亲！你太勤劳啦！已经提交过了！");
    return false;
  }
  //获取用户信息
  var userInfo = {};
  userInfo.uid = $("#fahuoMsg #uT_usercode").text();
  userInfo.uname = $("#fahuoMsg #uT_linkman").text();
  userInfo.wuliu = $("#fahuoMsg #uT_wuliu").text();
  userInfo.mobile = $("#fahuoMsg #uT_mobile").text();
  userInfo.payment = $("#fahuoMsg #uT_payment").text();
  total = $("#fahuoMsg #uT_total").text();
  //获取发货地
  var fahuodi = $("#fahuoMsg #fahuodi input[name='fahuodi']:checked").val();

  layui.use('table', function(){
    var table = layui.table;
    var checkStatus = table.checkStatus('orderTable');
    // console.log(checkStatus.data);
    // console.log(userInfo);
    if(checkStatus.data.length!=0){
      layer.confirm('确认核实无误，这就去安排发货！', {icon: 3, title:'警告'}, function(index){
          $.ajax({
            url: "<?php echo url('Sumao/addFahuo'); ?>",
            type: 'POST',
            data: {'shuju':checkStatus.data,'userInfo':userInfo,'fahuodi':fahuodi,'total':total},
            success:function(res){
              layer.msg(res.msg, {time: 2000},function(){});
              console.log(res);
            }
          })
          layer.close(index);
      });
    }
  })
  var cishu = $("#fahuoMsg .fahuoSub").attr('cishu','1');
}
</script>
<!-- 以上是发货的弹窗内容 -->






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