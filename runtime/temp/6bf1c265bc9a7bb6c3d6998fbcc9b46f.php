<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:73:"/www/web/erp/public_html/public/../application/home/view/user/member.html";i:1514427650;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514451361;}*/ ?>
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
    
<style type="text/css">
    .layui-table-cell{padding:0 3px;text-align:center;}
    .laytable-cell-checkbox{padding:0 15px;}
    .layui-elem-quote{padding:10px 0;margin-bottom:0;border-left: 1px solid #e2e2e2;border-top: 1px solid #e2e2e2;border-right: 1px solid #e2e2e2;border-radius:4px;}
    .layui-table-view{margin:0;}
</style>
<blockquote class="layui-elem-quote">
<div class="layui-row">
  <div class="layui-col-md4" style="padding-left:50px;">
    <div class="layui-btn-group">
      <button class="layui-btn" onclick="addOrder()"><i class="layui-icon">&#xe654;</i>添加</button>
      <button class="layui-btn layui-btn-warm" onclick="editOrder()"><i class="layui-icon">&#xe642;</i>编辑</button>
      <button class="layui-btn layui-btn-danger" onclick="delOrder()"><i class="layui-icon">&#xe640;</i>删除</button>
    </div>
  </div>
</div>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-130',
    url:'<?php echo url('User/getMember'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="test" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{checkbox:true}"></th>
        <th lay-data="{field:'id', width:'15%'}">ID</th>
        <th lay-data="{field:'name', width:'20%'}">角色</th>
        <th lay-data="{field:'uname', width:'65%'}">登录名</th>
    </tr>
  </thead>
</table>

<script>
    layui.use('table', function(){
        var table = layui.table;
        var checkStatus = table.checkStatus('orderTable');
        console.log(checkStatus.data) //获取选中行的数据
    });
    function addOrder(){
      var text =$("#addOrder").html();
      var height = $(window).height()*0.9;
      layer.open({
        type: 1
        ,title :'添加成员'
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
        var text =$("#editOrder").html();
        var table = layui.table;
        var checkStatus = table.checkStatus('orderTable');
        if(checkStatus.data.length==1){
          var yuandata = checkStatus.data[0];
          var height = $(window).height()*0.9;
          //console.log(yuandata);
          layer.open({
            type: 1
            ,title :'修改客户信息'
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
          $("#editMsg input[name='uname']").val(yuandata.uname);
          $("#editMsg input[name='pwd']").val(yuandata.pwd);
          $("#editMsg input[name='oldpwd']").val(yuandata.pwd);
          $("#editMsg .select").find("option[value='"+yuandata.roleid+"']").attr("selected",true);
          layui.use('form', function(){
            var form = layui.form;
            form.render();
          });
        }else{
          layer.msg("有且只能选择一条数据进行编辑");
        }
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
                url: "<?php echo url('User/delMember'); ?>",
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

<!-- 以下是添加弹窗 -->
<div id="addOrder" style="display:none;">
<style type="text/css">
    .addbox{width:960px;margin:0 auto;padding:20px;border:1px solid #e2e2e2;}
</style>
<div class="addbox">
<form class="layui-form" action="" method="post">

    <div class="layui-form-item">
      <label class="layui-form-label">管理员角色</label>
      <div class="layui-input-block">
      <select name="roleid" lay-verify="required">
        <option value="0">请选择管理员角色</option>
        <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">登录名</label>
      <div class="layui-input-block">
        <input type="text" name="uname" required  lay-verify="required" placeholder="请输入登录名" autocomplete="on" class="layui-input">
      </div>
    </div>

    <div class="layui-form-item">
      <label class="layui-form-label">密码</label>
      <div class="layui-input-block">
        <input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
      </div>
    </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <button class="layui-btn" lay-submit lay-filter="formAdd">立即提交</button>
      <button type="reset" id="addCishu" cishu="0" class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
</div>
<script>
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formAdd)', function(data){
    // console.log(data.field);
    if($('#addMsg #addCishu').attr('cishu')!='0'){
      layer.msg('请勿重复提交！');
      return false;
    }
    if(data.field.roleid==0){
      layer.msg('您必须为您的成员选择一个角色！！');
      return false;
    }
    $.ajax({
      url: "<?php echo url('User/addMember'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $('#addMsg #addCishu').attr('cishu','1');
          // console.log(res);
      }
    })
    return false;
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
    <div class="layui-form-item">
      <label class="layui-form-label">管理员角色</label>
      <div class="layui-input-block">
      <select class="select" name="roleid" lay-verify="required">
        <option value="0">请选择管理员角色</option>
        <?php if(is_array($role) || $role instanceof \think\Collection || $role instanceof \think\Paginator): $i = 0; $__LIST__ = $role;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <option value="<?php echo $vo['id']; ?>"><?php echo $vo['name']; ?></option>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </select>
      </div>
    </div>
    <div class="layui-form-item">
      <label class="layui-form-label">登录名</label>
      <div class="layui-input-block">
        <input type="text" name="uname" required  lay-verify="required" placeholder="请输入登录名" autocomplete="on" class="layui-input">
      </div>
    </div>

    <div class="layui-form-item">
      <label class="layui-form-label">密码</label>
      <div class="layui-input-block">
        <input type="password" name="pwd" required lay-verify="required" placeholder="请输入密码" autocomplete="off" class="layui-input">
      </div>
    </div>

  <div class="layui-form-item">
    <div class="layui-input-block">
      <input type="hidden" name="id">
      <input type="hidden" name="oldpwd">
      <button class="layui-btn" lay-submit lay-filter="formEdit">立即提交</button>
      <button type="reset" id="editCishu" cishu='0' class="layui-btn layui-btn-primary">重置</button>
    </div>
  </div>
</form>
</div>

<script>
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formEdit)', function(data){
    if($('#editMsg #editCishu').attr('cishu')!='0'){
      layer.msg('请勿重复提交！');
      return false;
    }
    if(data.field.roleid==0){
      layer.msg('您必须为您的成员选择一个角色！！');
      return false;
    }
    $.ajax({
      url: "<?php echo url('User/editMember'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $('#editMsg #editCishu').attr('cishu','1')
          //console.log(res);
      }
    })
    return false;
  });
});

</script>
</div>
<!-- 以上是编辑弹窗 -->




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