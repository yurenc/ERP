<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"/www/web/erp/public_html/public/../application/home/view/login/index.html";i:1508120264;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>以马内利ERP登录页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/static/css/login2.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h1>以马内利(国际)集团ERP登陆<sup>V2017</sup></h1>

<div class="login" style="margin-top:50px;">

    <div class="header">
        <div class="switch" id="switch"><a class="switch_btn_focus" id="switch_qlogin" href="javascript:void(0);" tabindex="7">快速登录</a>
        <div class="switch_bottom" id="switch_bottom" style="position: absolute; width: 64px; left: 0px;"></div>
        </div>
    </div>

    <div class="web_qr_login" id="web_qr_login" style="display: block; height: 235px;">

            <!--登录-->
        <div class="web_login" id="web_login">
          <div class="login-box">
            <div class="login_form">
            <?php echo $err; ?>
                <form action="<?php echo url('Login/in'); ?>" accept-charset="utf-8" id="login_form" class="loginForm" method="post">
                <div class="uinArea" id="uinArea">
                <label class="input-tips" for="u">帐号：</label>
                <div class="inputOuter" id="uArea">
                    <input type="text" id="u" name="un" class="inputstyle"/>
                </div>
                </div>
                <div class="pwdArea" id="pwdArea">
               <label class="input-tips" for="p">密码：</label>
               <div class="inputOuter" id="pArea">
                    <input type="password" id="p" name="p" class="inputstyle"/>
                </div>
                </div>

                <div style="padding-left:50px;margin-top:20px;"><input type="submit" value="登 录" style="width:150px;" class="button_blue"/></div>
              </form>
           </div>

                </div>

            </div>
            <!--登录end-->
  </div>

</div>
<div class="jianyi">Copyright ©2017 上海劲路网络科技有限公司 Powered By 博浪团队 Version 1.0.1</div>
</body></html>