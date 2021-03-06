<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"F:\phpstudy\WWWSCERP\public/../application/home\view\goods\index.html";i:1514974412;s:64:"F:\phpstudy\WWWSCERP\public/../application/home\view\layout.html";i:1514539775;}*/ ?>
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
/*     .layui-table[lay-even] tr:nth-child(even):hover,.layui-table tbody tr:hover,.layui-table-hover{background-color:#FFB800;} */
</style>
<blockquote class="layui-elem-quote">
<div class="layui-row">
  <div class="layui-col-md4" style="padding-left:50px;">
    <div class="layui-btn-group">
      <button class="layui-btn" onclick="addGoods()"><i class="layui-icon">&#xe654;</i>添加</button>
    </div>
  </div>
  <div class="layui-col-md5" id="search1" style="clear:none;margin:0;">
      <div class="layui-input-inline" style="width:auto;">
        <select name="k1" id="search_select" style="height:38px;padding:0 3px;float: left;">
          <option value="type">型号</option>
          <option value="category">类别</option>
        </select>
      </div>
      <div class="layui-input-inline" style="">
        <input type="text" class="layui-input" name="v1" placeholder="Search for...">
      </div>
      <button class="layui-btn layui-btn-primary" type="button" onclick="dosearch()"><i class="layui-icon">&#xe615;</i> 搜索</button>
  </div>
  <div class="layui-col-md3">
    <div class="layui-form layui-input-inline" id="category">
      <input type="radio" name="category" value="床垫" title="床垫" checked lay-filter="dcategory">
      <input type="radio" name="category" value="软体沙发" title="软体沙发" lay-filter="dcategory">
    </div>
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
          url: '<?php echo url('Goods/getGoods'); ?>'
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
            url: '<?php echo url('Goods/getGoods'); ?>'
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
</script>

</blockquote>
<table class="layui-table" lay-data="{
    height:'full-130',
    url:'<?php echo url('Goods/getGoods'); ?>',
    method:'post',
    page:true,
    size: 'sm',
    even: true,
    id:'orderTable'
}" lay-filter="orderTable" id="orderTable">
  <thead>
    <tr>
        <th lay-data="{field:'id', width:'15%'}">产品编号</th>
        <th lay-data="{field:'type', width:'15%'}">型号</th>
        <th lay-data="{field:'brand', width:'15%'}">品牌</th>
        <th lay-data="{field:'leibie', width:'15%'}">类别</th>
        <th lay-data="{field:'note', width:'15%'}">备注</th>
        <th lay-data="{fixed: 'right', width:'25%', align:'center', toolbar: '#barDemo'}"></th>
    </tr>
  </thead>
</table>
<script type="text/html" id="barDemo">
  <a class="layui-btn layui-btn-primary layui-btn-xs" lay-event="detail">查看</a>
  <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
  <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">下架</a>
</script>

<script>
layui.use('table', function(){
    var table = layui.table;
    table.on('tool(orderTable)', function(obj){
        var data = obj.data;
        // 查看详情
        if(obj.event === 'detail'){
            var text =$("#xiangqing").html();
            var height = $(window).height()*0.9;
            layer.open({
              type: 1
              ,title :'产品详情'
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
                {field: 'size', title: '规格',width:'13%'}
                ,{field: 'parma', title: '布号/方向',width:'13%'}
                ,{field: 'jianshu', title: '件数',width:'12%'}
                ,{field: 'sunum', title: '苏州库存',width:'12%'}
                ,{field: 'nannum', title: '南通库存',width:'12%'}
                ,{field: 'sudf', title: '苏州堆放',width:'13%'}
                ,{field: 'nandf', title: '南通堆放',width:'13%'}
                ,{field: 'price', title: '价格',width:'12%'}
              ]] //设置表头
              ,data:getGoodsAttr(data.id)
            });
            $("#xiangqingMsg #xQ_id").text(data.id);
            $("#xiangqingMsg #xQ_type").text(data.type);
            $("#xiangqingMsg #xQ_brand").text(data.brand);
            $("#xiangqingMsg #xQ_leibie").text(data.leibie);
            $("#xiangqingMsg #xQ_note").text(data.note);
        } else if(obj.event === 'del'){
          layer.confirm('确定下架该产品吗？', function(index){
            $.ajax({
              url: "<?php echo url('Goods/delGood'); ?>",
              type: 'POST',
              data: {'id':data.id},
              success:function(res){
                  layer.msg(res.msg);
                  layui.use('table', function(){
                    var table = layui.table;
                    table.reload('orderTable',{});
                  });
                  // console.log(res);
              }
            })
            layer.close(index);
          });
        } else if(obj.event === 'edit'){
            var text =$("#editGoods").html();
            var height = $(window).height()*0.9;
            layer.open({
              type: 1
              ,title :'编辑产品'
              ,offset: "auto"
              ,area: ['1050px', height+'px']
              ,tipsMore: true
              ,content: '<div style="width:1000px;margin:0 auto;" id="editMsg">'+ text +'</div>'
              ,btn: '关闭全部'
              ,btnAlign: 'c' //按钮居中
              ,shade: 0.8//不显示遮罩
              ,yes: function(){
                layer.closeAll();
                layui.use('table', function(){
                    var table = layui.table;
                    table.reload('orderTable',{});
                })
              }
            });
            $("#editMsg input[name='gid']").val(data.id);
            $("#editMsg input[name='type']").val(data.type);
            $("#editMsg input[name='brand']").val(data.brand);
            $("#editMsg input[name='leibie']").val(data.leibie);
            $("#editMsg input[name='note']").val(data.note);
            $("#editMsg input[name='category'][value='"+data.category+"']").attr("checked",true);
            var attrData = getGoodsAttr(data.id);
            for (var i=0; i<attrData.length; i++) {
                if(i!=attrData.length-1){
                    $("#editMsg .attrBox").append("<div class=\"layui-row layui-col-space5\"><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"hidden\" name=\"attr_id[]\" value=\""+attrData[i].attr_id+"\"/><input type=\"text\" name=\"size[]\" required  lay-verify=\"required\" value=\""+attrData[i].size+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"parma[]\" required  lay-verify=\"required\" value=\""+attrData[i].parma+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"jianshu[]\" required  lay-verify=\"required\" value=\""+attrData[i].jianshu+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sunum[]\" required  lay-verify=\"required\" value=\""+attrData[i].sunum+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nannum[]\" required  lay-verify=\"required\" value=\""+attrData[i].nannum+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sudf[]\" required  lay-verify=\"required\" value=\""+attrData[i].sudf+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nandf[]\" required  lay-verify=\"required\" value=\""+attrData[i].nandf+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"price[]\" required  lay-verify=\"required\" value=\""+attrData[i].price+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><a href=\"javascript:delAttr2("+i+");\" class=\"layui-btn attrBtn layui-btn-warm\"><i class=\"layui-icon\">&#xe640;</i></a></div></div>");
                }else{
                    $("#editMsg .attrBox").append("<div class=\"layui-row layui-col-space5\"><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"hidden\" name=\"attr_id[]\" value=\""+attrData[i].attr_id+"\"/><input type=\"text\" name=\"size[]\" required  lay-verify=\"required\" value=\""+attrData[i].size+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"parma[]\" required  lay-verify=\"required\" value=\""+attrData[i].parma+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"jianshu[]\" required  lay-verify=\"required\" value=\""+attrData[i].jianshu+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sunum[]\" required  lay-verify=\"required\" value=\""+attrData[i].sunum+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nannum[]\" required  lay-verify=\"required\" value=\""+attrData[i].nannum+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sudf[]\" required  lay-verify=\"required\" value=\""+attrData[i].sudf+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nandf[]\" required  lay-verify=\"required\" value=\""+attrData[i].nandf+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"price[]\" required  lay-verify=\"required\" value=\""+attrData[i].price+"\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><a href=\"javascript:addAttr2("+i+");\" class=\"layui-btn attrBtn\"><i class=\"layui-icon\">&#xe654;</i></a></div></div>");
                }
            };
            layui.use('form', function(){
              var form = layui.form;
              form.render();
              //各种基于事件的操作，下面会有进一步介绍
            });
        }
    });
});

function getGoodsAttr(id){
    var d = {};
    $.ajax({
      url: "<?php echo url('Goods/getGoodsAttr'); ?>",
      type: 'POST',
      async:false,
      dataType:'json',
      data: {'id':id},
      success:function success(res){
        d = res.data;
      }
    });
    return d;
}
</script>

<!-- 以下是查看详情 -->
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
  <table id="userTable" border="1" cellspacing="0">
      <tr>
          <td>产品编号</td>
          <td>型号</td>
          <td>品牌</td>
          <td>类别</td>
          <td>备注</td>
      </tr>
      <tr>
          <td id='xQ_id'></td>
          <td id='xQ_type'></td>
          <td id='xQ_brand'></td>
          <td id='xQ_leibie'></td>
          <td id='xQ_note'></td>
      </tr>
  </table>
  <table id="xiangqingTable" lay-filter="xiangqingTable" ></table>
</div>
</div>
<!-- 以上是查看详情 -->

<!-- 以下是添加产品 -->
<script type="text/javascript">
function addGoods(){
    var text =$("#addGoods").html();
    var height = $(window).height()*0.9;
    layer.open({
      type: 1
      ,title :'添加产品'
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
        })
      }
    });
    layui.use('form', function(){
      var form = layui.form;
      form.render();
      //各种基于事件的操作，下面会有进一步介绍
    });
}
</script>
<div id="addGoods" style="display:none;">
<form class="layui-form" action="" method="post" style="margin:15px 0;">
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
            <label class="layui-form-label">品牌</label>
            <div class="layui-input-block">
              <input type="text" name="brand" required  lay-verify="required" placeholder="请输入品牌" autocomplete="on" class="layui-input">
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
          <label class="layui-form-label">类别</label>
          <div class="layui-input-block">
            <input type="text" name="leibie" required  lay-verify="required" placeholder="请输入类别" autocomplete="on" class="layui-input">
          </div>
        </div>
        <!-- 以上是表单 -->
      </div>
      <div class="layui-col-md8">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
              <input type="text" name="note" required  lay-verify="required" placeholder="请输入备注" autocomplete="on" class="layui-input" value="-">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md2" style="text-align:center;">
        规格
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        布号/方向
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        件数
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        苏州库存
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        南通库存
      </div>
      <div class="layui-col-md2" style="text-align:center;">
        苏州堆放区域
      </div>
      <div class="layui-col-md2" style="text-align:center;">
        南通堆放区域
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        单价
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="attrBox">
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md2">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="size[]" required  lay-verify="required" placeholder="规格" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="parma[]" required  lay-verify="required" placeholder="布号/方向" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="jianshu[]" required  lay-verify="required" placeholder="件数" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="sunum[]" required  lay-verify="required" placeholder="苏州库存" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="nannum[]" required  lay-verify="required" placeholder="南通库存" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md2">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="sudf[]" required  lay-verify="required" placeholder="苏州堆放区域" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md2">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="nandf[]" required  lay-verify="required" placeholder="南通堆放区域" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <div class="layui-input-block" style="margin-left:0px;">
          <input type="text" name="price[]" required  lay-verify="required" placeholder="单价" autocomplete="on" class="layui-input">
        </div>
      </div>
      <div class="layui-col-md1">
        <a href="javascript:addAttr(0);" class="layui-btn attrBtn"><i class="layui-icon">&#xe654;</i> </a>
      </div>
    </div>
    </div>
    <!-- 以上是栅格行 -->
    <div class="layui-form-item" style="margin-top:15px;">
        <div class="layui-input-block">
          <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
          <button type="reset" id="formReset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>

</div>
<script type="text/javascript">
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formDemo)', function(data){
    // console.log(data.field);
    $.ajax({
      url: "<?php echo url('Goods/addGood'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.msg(res.msg);
          $("#addMsg #formReset").click();
          // console.log(res);
      }
    })
    return false;
  });
});
function addAttr(i){
    var j = i+1;
    var str = "<div class=\"layui-row layui-col-space5\"><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"size[]\" required  lay-verify=\"required\" placeholder=\"规格\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"parma[]\" required  lay-verify=\"required\" placeholder=\"布号/方向\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"jianshu[]\" required  lay-verify=\"required\" placeholder=\"件数\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sunum[]\" required  lay-verify=\"required\" placeholder=\"苏州库存\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nannum[]\" required  lay-verify=\"required\" placeholder=\"南通库存\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sudf[]\" required  lay-verify=\"required\" placeholder=\"苏州堆放区域\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nandf[]\" required  lay-verify=\"required\" placeholder=\"南通堆放区域\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"price[]\" required  lay-verify=\"required\" placeholder=\"单价\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><a href=\"javascript:addAttr("+j+");\" class=\"layui-btn attrBtn\"><i class=\"layui-icon\">&#xe654;</i></a></div></div>";
    $("#addMsg .attrBox").append(str);
    $("#addMsg .attrBox .attrBtn").eq(i).attr('href','javascript:delAttr('+i+')');
    $("#addMsg .attrBox .attrBtn").eq(i).addClass('layui-btn-warm');
    $("#addMsg .attrBox .attrBtn").eq(i).html('<i class="layui-icon">&#xe640;</i>');
}
function delAttr(i){
    $("#addMsg .attrBox .layui-row").eq(i).remove();
    var len = $("#addMsg .attrBox .layui-row").length;
    for(j=i;j<len;j++){
        if(j!=len-1){
            $("#addMsg .attrBox .attrBtn").eq(j).attr('href','javascript:delAttr('+j+')');
        }else{
           $("#addMsg .attrBox .attrBtn").eq(j).attr('href','javascript:addAttr('+j+')');
        }
    }
}
</script>
<!-- 以上是添加产品 -->

<!-- 以下是编辑产品 -->
<div id="editGoods" style="display:none;">
<form class="layui-form" action="" method="post" style="margin:15px 0;">
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md4">
        <!-- 以下是表单 -->
        <div class="layui-form-item">
          <input type="hidden" name="gid">
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
            <label class="layui-form-label">型号</label>
            <div class="layui-input-block">
              <input type="text" name="type" required  lay-verify="required" placeholder="请输入型号" autocomplete="on" class="layui-input" disabled="disabled">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
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
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
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
      <div class="layui-col-md8">
        <!-- 以下是表单 -->
          <div class="layui-form-item">
            <label class="layui-form-label">备注</label>
            <div class="layui-input-block">
              <input type="text" name="note" required  lay-verify="required" placeholder="请输入备注" autocomplete="on" class="layui-input" value="-">
            </div>
          </div>
        <!-- 以上是表单 -->
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="layui-row layui-col-space5">
      <div class="layui-col-md2" style="text-align:center;">
        规格
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        布号/方向
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        件数
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        苏州库存
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        南通库存
      </div>
      <div class="layui-col-md2" style="text-align:center;">
        苏州堆放区域
      </div>
      <div class="layui-col-md2" style="text-align:center;">
        南通堆放区域
      </div>
      <div class="layui-col-md1" style="text-align:center;">
        单价
      </div>
    </div>
    <!-- 以上是栅格行 -->
    <!-- 以下是栅格行 -->
    <div class="attrBox">

    </div>
    <!-- 以上是栅格行 -->
    <div class="layui-form-item" style="margin-top:15px;">
        <div class="layui-input-block editEdit">
          <button class="layui-btn" lay-submit lay-filter="formDemo2">立即提交</button>
          <button type="reset" id="formReset" class="layui-btn layui-btn-primary">重置</button>
        </div>
    </div>
</form>
</div>
<script type="text/javascript">
layui.use('form', function(){
  var form = layui.form;

  //监听提交
  form.on('submit(formDemo2)', function(data){
    // console.log(data.field);
    $.ajax({
      url: "<?php echo url('Goods/editGood'); ?>",
      type: 'POST',
      data: data.field,
      success:function(res){
          layer.closeAll();
          layer.msg(res.msg);
          layui.use('table', function(){
            var table = layui.table;
            table.reload('orderTable',{});
          });
          // console.log(res);
      }
    })
    return false;
  });
});
function addAttr2(i){
    var j = i+1;
    var str = "<div class=\"layui-row layui-col-space5\"><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"hidden\" name=\"attr_id[]\" value=\"\"/><input type=\"text\" name=\"size[]\" required  lay-verify=\"required\" placeholder=\"规格\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"parma[]\" required  lay-verify=\"required\" placeholder=\"布号/方向\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"jianshu[]\" required  lay-verify=\"required\" placeholder=\"件数\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sunum[]\" required  lay-verify=\"required\" placeholder=\"苏州库存\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nannum[]\" required  lay-verify=\"required\" placeholder=\"南通库存\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"sudf[]\" required  lay-verify=\"required\" placeholder=\"苏州堆放区域\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md2\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"nandf[]\" required  lay-verify=\"required\" placeholder=\"南通堆放区域\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><div class=\"layui-input-block\" style=\"margin-left:0px;\"><input type=\"text\" name=\"price[]\" required  lay-verify=\"required\" placeholder=\"单价\" autocomplete=\"on\" class=\"layui-input\"></div></div><div class=\"layui-col-md1\"><a href=\"javascript:addAttr2("+j+");\" class=\"layui-btn attrBtn\"><i class=\"layui-icon\">&#xe654;</i></a></div></div>";
    $("#editMsg .attrBox").append(str);
    $("#editMsg .attrBox .attrBtn").eq(i).attr('href','javascript:delAttr2('+i+')');
    $("#editMsg .attrBox .attrBtn").eq(i).addClass('layui-btn-warm');
    $("#editMsg .attrBox .attrBtn").eq(i).html('<i class="layui-icon">&#xe640;</i>');
}
function delAttr2(i){
    var attrId = $("#editMsg .attrBox .layui-row:eq("+i+") input[name='attr_id[]']").val();
    if(attrId.length!=0){
        $("#editMsg .editEdit").append("<input type=\"hidden\" name=\"delattr[]\" value=\""+attrId+"\">");
    }
    $("#editMsg .attrBox .layui-row").eq(i).remove();
    var len = $("#editMsg .attrBox .layui-row").length;
    for(j=i;j<len;j++){
        if(j!=len-1){
            $("#editMsg .attrBox .attrBtn").eq(j).attr('href','javascript:delAttr2('+j+')');
        }else{
           $("#editMsg .attrBox .attrBtn").eq(j).attr('href','javascript:addAttr2('+j+')');
        }
    }
}
</script>
<!-- 以上是编辑产品 -->
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