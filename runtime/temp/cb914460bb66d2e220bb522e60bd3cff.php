<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/www/web/erp/public_html/public/../application/home/view/nansheng/ntbeihuo.html";i:1514427688;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514539775;}*/ ?>
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
    .box{width:90%;margin:0 auto;padding:20px;margin-bottom:50px;border:1px solid #e2e2e2;}
</style>
<script type="text/javascript">
layui.use('layer', function(){
  var layer = layui.layer;
  var text =$("#xuan").html();
  layer.open({
    area: ['340px', '250px']
    ,title:'单行数据导入框'
    ,offset: 'rb'
    ,content: '<div style="width:300px;margin:0 auto;" id="xuanMsg">'+ text +'</div>'
    ,shade: 0
    ,zIndex: layer.zIndex
    ,btn: []
  });
});
function tianchong(){
  var xx = $("#xuanMsg textarea[name='xinxi']").val();
  arrXx = xx.split("\n");
  //console.log(arrXx);
  $(".box input[name='usercode']").val(arrXx[0]);
  $(".box input[name='username']").val(arrXx[1]);
  $(".box input[name='leibie']").val(arrXx[2]);
  $(".box input[name='brand']").val(arrXx[3]);
  $(".box input[name='type']").val(arrXx[4]);
  $(".box input[name='size']").val(arrXx[5]);
  $(".box input[name='parma']").val(arrXx[6]);
  $(".box input[name='number']").val(arrXx[7]);
  $(".box input[name='price']").val(arrXx[8]);
  $(".box input[name='payment']").val(arrXx[9]);
  $(".box input[name='duifang']").val(arrXx[10]);
  $(".box input[name='shaddress']").val(arrXx[11]);
}
</script>
<div id="xuan" style="display:none;">
  <div class="layui-form-item">
    <div class="layui-input-block" style="margin:0 auto;width:260px;">
      <textarea name="xinxi" placeholder="请输入复制的信息，从客户编号开始！" class="layui-textarea"></textarea>
    </div>
  </div>
  <div class="layui-form-item">
    <div class="layui-input-block" style="margin:0 auto;width:260px;">
      <button class="layui-btn" onclick="tianchong()">立即提交</button>
    </div>
  </div>
</div>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>南通备货单添加</legend>
</fieldset>
<div class="box">
<form class="layui-form" action="" method="post">
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">用户编号</label>
            <div class="layui-input-block">
              <input type="text" name="usercode" required  lay-verify="required" value="0" autocomplete="on" class="layui-input" id="Ipt_usercode" disabled=true>
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">用户名称</label>
            <div class="layui-input-block">
              <input type="text" name="username" required  lay-verify="required" value="南通备货" autocomplete="on" class="layui-input" disabled=true>
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->

        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
      <!-- 以下是表单 -->
      <div class="layui-form-item">
        <label class="layui-form-label">分类</label>
        <div class="layui-input-block">
          <input type="radio" name="category" value="床垫" title="床垫" checked>
          <input type="radio" name="category" value="软体沙发" title="软体沙发">
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
      <div class="layui-col-md4">
      <!-- 以下是表单 -->

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
              <input type="text" name="brand" required  lay-verify="required" placeholder="请输入品牌" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
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
    </div>
    <!-- 以上是栅格行 -->

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">布号/方向</label>
            <div class="layui-input-block">
              <input type="text" name="parma" required  lay-verify="required" placeholder="请输入布号/方向" autocomplete="on" class="layui-input">
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
              <input type="text" name="price" required  lay-verify="required|number" placeholder="请输入单价" autocomplete="on" class="layui-input">
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
              <input type="text" name="yqshtime" required  lay-verify="required" placeholder="请输入要求送货日期" autocomplete="off" class="layui-input" id="shrq">
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
              <input type="text" name="duifang" required  lay-verify="required" placeholder="请输入堆放区域" autocomplete="on" class="layui-input">
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
      <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
      <button type="reset" id="formReset" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
</div>

<script>
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formDemo)', function(data){
    // layer.msg(JSON.stringify(data.field));
    // console.log(data.field);
    $.ajax({
      url: "<?php echo url('Nansheng/addBeihuo'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $("#formReset").click();
          // console.log(res);
      }
    })
    return false;
  });
});

layui.use('laydate', function(){
  var laydate = layui.laydate;
  laydate.render({
    elem: '#shrq' //指定元素
  });
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