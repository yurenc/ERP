<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:76:"/www/web/erp/public_html/public/../application/home/view/user/suppliers.html";i:1514427650;s:68:"/www/web/erp/public_html/public/../application/home/view/layout.html";i:1514539775;}*/ ?>
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
  <div class="layui-col-md4" style="padding-left:50px;">
    <div class="layui-btn-group">
      <button class="layui-btn" onclick="addOrder()"><i class="layui-icon">&#xe654;</i>添加</button>
      <button class="layui-btn layui-btn-warm" onclick="editOrder()"><i class="layui-icon">&#xe642;</i>编辑</button>
      <button class="layui-btn layui-btn-danger" onclick="delOrder()"><i class="layui-icon">&#xe640;</i>删除</button>
    </div>
  </div>
  <div class="layui-col-md3" id="search1">
      <div class="layui-input-inline" style="width:auto;">
        <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
          <option value="supplier">供应商</option>
          <option value="gname">商品名称</option>
        </select>
      </div>
      <div class="layui-input-inline" style="">
        <input type="text" class="layui-input" name="v1" placeholder="Search for...">
      </div>
  </div>
  <div class="layui-col-md5 layui-form-item" style="clear:none;margin:0;">
    <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
  </div>
</div>
<script type="text/javascript">
function dosearch(){
    var k1 = $("#search_select").val();
    var v1 = $("#search1 input[name='v1']").val();
    var search = {}
    if(v1.length!=0){
      search.k1=k1;
      search.v1=v1;
    }
    // console.log(search);
    if(!jQuery.isEmptyObject(search)){
      layui.use('table', function(){
          var table = layui.table;
          table.reload('orderTable', {
            url: '<?php echo url('User/getSup'); ?>'
            ,where: {'search':search}
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
</script>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-130',
    url:'<?php echo url('User/getSup'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="test" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{checkbox:true}"></th>
        <th lay-data="{field:'id', width:40}">ID</th>
        <th lay-data="{field:'supplier', width:90}">供应商</th>
        <th lay-data="{field:'mobile', width:200}">联系方式</th>
        <th lay-data="{field:'gname', width:90}">商品名称</th>
        <th lay-data="{field:'type', width:120}">型号</th>
        <th lay-data="{field:'size', width:240}">规格</th>
        <th lay-data="{field:'danwei', width:90}">单位</th>
        <th lay-data="{field:'price', width:90}">单价</th>
        <th lay-data="{field:'address', width:90}">地址</th>
        <th lay-data="{field:'note', width:90}">备注</th>
    </tr>
  </thead>
</table>

<script>
    layui.use('table', function(){
        var table = layui.table;
    });
    function addOrder(){
      var text =$("#addOrder").html();
      var height = $(window).height()*0.9;
      layer.open({
        type: 1
        ,title :'添加客户信息'
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
          layui.use('form', function(){
            var form = layui.form;
            form.render();
          });
          $("#editMsg input[name='id']").val(yuandata.id);
          $("#editMsg input[name='supplier']").val(yuandata.supplier);
          $("#editMsg input[name='mobile']").val(yuandata.mobile);
          $("#editMsg input[name='gname']").val(yuandata.gname);
          $("#editMsg input[name='type']").val(yuandata.type);
          $("#editMsg input[name='size']").val(yuandata.size);
          $("#editMsg input[name='danwei']").val(yuandata.danwei);
          $("#editMsg input[name='price']").val(yuandata.price);
          $("#editMsg textarea[name='note']").val(yuandata.note);
          $("#editMsg input[name='address']").val(yuandata.address);
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
                url: "<?php echo url('User/delSup'); ?>",
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
      <div class="layui-col-md8">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">联系方式</label>
            <div class="layui-input-block">
              <input type="text" name="mobile" required  lay-verify="required" placeholder="请输入联系方式" autocomplete="on" class="layui-input">
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
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
              <input type="text" name="gname" required  lay-verify="required" placeholder="请输入商品名称" autocomplete="on" class="layui-input">
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

    <div class="layui-form-item">
      <label class="layui-form-label">地址</label>
      <div class="layui-input-block">
        <input type="text" name="address" required  lay-verify="required" placeholder="请输入供应商地址" autocomplete="on" class="layui-input">
      </div>
    </div>

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
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
    $.ajax({
      url: "<?php echo url('User/addSup'); ?>",
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
      <div class="layui-col-md8">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">联系方式</label>
            <div class="layui-input-block">
              <input type="text" name="mobile" required  lay-verify="required" placeholder="请输入联系方式" autocomplete="on" class="layui-input">
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
            <label class="layui-form-label">商品名称</label>
            <div class="layui-input-block">
              <input type="text" name="gname" required  lay-verify="required" placeholder="请输入商品名称" autocomplete="on" class="layui-input">
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

    <div class="layui-form-item">
      <label class="layui-form-label">地址</label>
      <div class="layui-input-block">
        <input type="text" name="address" required  lay-verify="required" placeholder="请输入供应商地址" autocomplete="on" class="layui-input">
      </div>
    </div>

    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
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
    //console.log(data.field);
    if($('#editMsg #editCishu').attr('cishu')!='0'){
      layer.msg('请勿重复提交！');
      return false;
    }
    $.ajax({
      url: "<?php echo url('User/editSup'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg, {time: 2000},function(){});
          $('#editMsg #editCishu').attr('cishu','1');
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