<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"F:\phpstudy\WWWSCERP\public/../application/home\view\sumao\jiedan.html";i:1519736195;s:64:"F:\phpstudy\WWWSCERP\public/../application/home\view\layout.html";i:1514539775;}*/ ?>
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
    .box{width:92%;margin:0 auto;padding:20px;margin-bottom:50px;border:1px solid #e2e2e2;}
</style>
<fieldset class="layui-elem-field layui-field-title" style="margin-top: 20px;">
  <legend>添加订单</legend>
</fieldset>
<div class="box">
<form class="layui-form" action="" method="post">
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">客户编号</label>
            <div class="layui-input-block">
              <input type="text" name="usercode" required  lay-verify="required" placeholder="请输入客户编号" autocomplete="on" class="layui-input">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">客户名称</label>
            <div class="layui-input-block">
              <input type="text" name="username" required  lay-verify="required" placeholder="请输入客户名称" autocomplete="on" class="layui-input">
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
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
      <!-- 以下是表单 -->
        <div class="layui-form-item">
          <label class="layui-form-label">要货日期</label>
          <div class="layui-input-block">
            <input type="text" name="yqshtime" required  lay-verify="required" placeholder="请输入要求送货日期" autocomplete="off" class="layui-input" id="shrq">
          </div>
        </div>
      <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
      <!-- 以下是表单 -->
        <div class="layui-form-item">
          <label class="layui-form-label">送货地址</label>
          <div class="layui-input-block">
            <input type="text" name="shaddress" required  lay-verify="required" placeholder="请输入送货地址" autocomplete="on" class="layui-input">
          </div>
        </div>
      <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md4">
      <!-- 以下是表单 -->
        <div class="layui-form-item">
          <label class="layui-form-label">分类</label>
          <div class="layui-input-block" id='category' cv='床垫'>
            <input type="radio" name="category" value="床垫" title="床垫" checked lay-filter='category'>
            <input type="radio" name="category" value="软体沙发" title="软体沙发" lay-filter='category'>
          </div>
        </div>
      <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md12">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
              <input type="text" name="note" required  lay-verify="required" placeholder="请输入备注" autocomplete="off" class="layui-input" value="-">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->
<fieldset class="layui-elem-field layui-field-title" style=""></fieldset>
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md2" style="text-align:center;">
        型号
      </div>
      <div class="layui-col-md2" style="text-align:center;">
        类别
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        品牌
      </div>
      <div class="layui-col-md3" style="text-align:center;">
        规格-布号/方向
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        堆放区域
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        单价
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        数量
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="attrBox">
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md2">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="hidden" name="gid[]">
          <input type="text" name="type[]" required  lay-verify="required" placeholder="型号" autocomplete="on" class="layui-input" onchange="getType(0)">
        </div>
      </div>
      <div class="layui-col-md2">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="leibie[]" required  lay-verify="required" placeholder="类别" autocomplete="on" class="layui-input" disabled="disabled">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="brand[]" required  lay-verify="required" placeholder="品牌" autocomplete="on" class="layui-input" disabled="disabled">
        </div>
      </div>
      <div class="layui-col-md3">
        <div class="layui-input-block" style="margin-left:0px;">
            <input type="hidden" name="size[]">
            <input type="hidden" name="parma[]">
            <select name="sizeParma[]" lay-verify="required" lay-filter="changeAttr" erp-index="0">
              <option value="0">请选择规格-布号/方向</option>
            </select>
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">

          <input type="text" name="duifang[]" required  lay-verify="required" placeholder="堆放区域" autocomplete="on" class="layui-input" disabled="disabled">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="price[]" required  lay-verify="required" placeholder="单价" autocomplete="on" class="layui-input" disabled="disabled">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="number[]" required  lay-verify="required" placeholder="数量" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <a href="javascript:addAttr(0);" class="layui-btn attrBtn"><i class="layui-icon">&#xe654;</i> </a>
      </div>
    </div>
    </div>
    <!-- 以上是栅格行 -->

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
  form.on('radio(category)', function(data){
    // console.log(data.value); //被点击的radio的value值
    $("#category").attr('cv',data.value);
  });
});
// 自动加载客户信息
$(".box input[name='usercode']").blur(function(){
    var usercode = $(".box input[name='usercode']").val();
    if(usercode.length==0){return false;}
    var userInfo = getUserInfo(usercode,'');
    changeUserInfoIpt(userInfo);
})
$(".box input[name='username']").blur(function(){
    var username = $(".box input[name='username']").val();
    if(username.length==0){return false;}
    var userInfo = getUserInfo('',username);
    changeUserInfoIpt(userInfo);
})
function changeUserInfoIpt(userInfo){
  if(!userInfo.empty){
    $(".box input[name='usercode']").val(userInfo.id);
    $(".box input[name='username']").val(userInfo.nicheng);
    $(".box input[name='payment']").val(userInfo.jkfs);
    $(".box input[name='shaddress']").val(userInfo.address);
  }else{
    $(".box input[name='usercode']").val('');
    $(".box input[name='username']").val('');
    $(".box input[name='payment']").val('');
    $(".box input[name='shaddress']").val('');
    layer.msg("抱歉！暂无该客户的信息");
  }
}
function getUserInfo(usercode,username){
  if(usercode.length!=0){
    var k = 'id';
    var v = usercode;
  }
  if(username.length!=0){
    var k = 'nicheng';
    var v = username;
  }
  var result = {};
  $.ajax({
    url: "<?php echo url('Sumao/getKehuInfo'); ?>",
    type: 'POST',
    async: false,
    data: {'k':k,'v':v},
    success:function(res){
      result = res;
    }
  })
  return result;
}
//
// 自动加载产品信息
function getType(i){
  var type = $(".attrBox input[name='type[]']:eq("+i+")").val();
  var result = {};
  $.ajax({
    url: "<?php echo url('Goods/getType'); ?>",
    type: 'POST',
    async: false,
    data: {'type':type},
    success:function(res){
      result = res;
    }
  })
  // console.log(result);
  var strAttrId = "";
  for (var j=0; j<result['attr_id'].length; j++) {
    strAttrId += "<option value=\""+result.attr_id[j]+"\">"+result.size[j]+"——"+result.parma[j]+"</option>"
  };
  //获取选择的分类值
  var chooseCategory = $("#category").attr('cv');
  if(chooseCategory!=result.category){
    layer.msg('一个订单只能包含同一种分类的产品');
    result = {};
  }
  $(".attrBox input[name='gid[]']:eq("+i+")").val(result.id);
  $(".attrBox input[name='type[]']:eq("+i+")").val(result.type);
  $(".attrBox input[name='leibie[]']:eq("+i+")").val(result.leibie);
  $(".attrBox input[name='brand[]']:eq("+i+")").val(result.brand);
  $(".attrBox select[name='sizeParma[]']:eq("+i+")").html('<option value="0">请选择规格-布号/方向</option>');
  $(".attrBox select[name='sizeParma[]']:eq("+i+")").append(strAttrId);
  $(".attrBox input[name='duifang[]']:eq("+i+")").val('');
  $(".attrBox input[name='price[]']:eq("+i+")").val('');
  // 更新渲染
  layui.use('form', function(){
    var form = layui.form;
    form.render();
  });
}
function changeAttr(i){
  alert(i);
}
function addAttr(i){
  var j = i+1;
  var str = '<div class="layui-row layui-col-space5"><div class="layui-col-md2"><div class="layui-input-block" style="margin-left:0px;"><input type="hidden" name="gid[]"><input type="hidden" name="category[]"><input type="text" name="type[]" required  lay-verify="required" placeholder="型号" autocomplete="on" class="layui-input" onchange="getType('+j+')"></div></div><div class="layui-col-md2"><div class="layui-input-block" style="margin-left:0px;"><input type="text" name="leibie[]" required  lay-verify="required" placeholder="类别" autocomplete="on" class="layui-input" disabled="disabled"></div></div><div class="layui-col-md1"><div class="layui-input-block" style="margin-left:0px;"><input type="text" name="brand[]" required  lay-verify="required" placeholder="品牌" autocomplete="on" class="layui-input" disabled="disabled"></div></div><div class="layui-col-md3"><div class="layui-input-block" style="margin-left:0px;"><select name="sizeParma[]" lay-verify="required" lay-filter="changeAttr" erp-index="'+j+'"><option value="0">请选择规格-布号/方向</option></select></div></div><div class="layui-col-md1"><div class="layui-input-block" style="margin-left:0px;"><input type="hidden" name="size[]"><input type="hidden" name="parma[]"><input type="text" name="duifang[]" required  lay-verify="required" placeholder="堆放区域" autocomplete="on" class="layui-input" disabled="disabled"></div></div><div class="layui-col-md1"><div class="layui-input-block" style="margin-left:0px;"><input type="text" name="price[]" required  lay-verify="required" placeholder="单价" autocomplete="on" class="layui-input" disabled="disabled"></div></div><div class="layui-col-md1"><div class="layui-input-block" style="margin-left:0px;"><input type="text" name="number[]" required  lay-verify="required" placeholder="数量" autocomplete="on" class="layui-input"></div></div><div class="layui-col-md1"><a href="javascript:addAttr('+j+');" class="layui-btn attrBtn"><i class="layui-icon">&#xe654;</i> </a></div></div>';
  $(".box .attrBox").append(str);
  $(".box .attrBox .attrBtn").eq(i).attr('href','javascript:delAttr('+i+')');
  $(".box .attrBox .attrBtn").eq(i).addClass('layui-btn-warm');
  $(".box .attrBox .attrBtn").eq(i).html('<i class="layui-icon">&#xe640;</i>');
  // 更新渲染
  layui.use('form', function(){
    var form = layui.form;
    form.render();
  });
}
function delAttr(i){
  $(".box .attrBox .layui-row").eq(i).remove();
  var len = $(".box .attrBox .layui-row").length;
  for(j=i;j<len;j++){
      $(".box .attrBox input[name='type[]']").eq(j).attr('onchange','getType('+j+')');
      $(".box .attrBox select[name='sizeParma[]']").eq(j).attr('erp-index',j);
      if(j!=len-1){
          $(".box .attrBox .attrBtn").eq(j).attr('href','javascript:delAttr('+j+')');
      }else{
         $(".box .attrBox .attrBtn").eq(j).attr('href','javascript:addAttr('+j+')');
      }
  }
  // 更新渲染
  layui.use('form', function(){
    var form = layui.form;
    form.render();
  });
}


layui.use('form', function(){
  var form = layui.form;
  form.on('select(changeAttr)', function(data){
    var erpIndex = $(data.elem).attr('erp-index');
    var attrId = data.value
    if(attrId==0){
      return false;
    }
    var result = {};
    $.ajax({
      url: "<?php echo url('Goods/getAttr'); ?>",
      type: 'POST',
      async: false,
      data: {'attr_id':attrId},
      success:function(res){
        result = res;
      }
    })
    $(".attrBox input[name='size[]']:eq("+erpIndex+")").val(result.size);
    $(".attrBox input[name='parma[]']:eq("+erpIndex+")").val(result.parma);
    $(".attrBox input[name='duifang[]']:eq("+erpIndex+")").val(result.nandf);
    $(".attrBox input[name='price[]']:eq("+erpIndex+")").val(result.price);
  });
  //监听提交
  form.on('submit(formDemo)', function(data){
    // console.log(data.field);
    $.ajax({
      url: "<?php echo url('Sumao/addOrder'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          console.log(res);
          layer.msg(res.msg);
          $("#formReset").click();
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