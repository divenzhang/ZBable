<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>后台登录</title>
 <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
<meta name="author" content="XCube" />
<!--<link rel="stylesheet" type="text/css" href="/thinkphp/Public/Assets/css/adminStyle"/>-->
 <link rel="stylesheet" TYPE="text/css" href="/thinkphp/Public/Assets/css/adminStyle.css">
<style>
body{height:100%;background:#16a085;overflow:hidden;}
canvas{z-index:-1;position:absolute;}
</style>
<script src="/thinkphp/Public/Assets/js/jquery-2.2.3.min.js"></script>
<!--<script src="/thinkphp/Public/Assets/js/verificationNumbers.js" ></script>-->
<script src="/thinkphp/Public/Assets/js/Particleground.js" ></script>
<script>
$(document).ready(function() {
  //粒子背景特效
  $('body').particleground({
    dotColor: '#5cbdaa',
    lineColor: '#5cbdaa'
  });
  //验证码
//  createCode();
  //测试提交，对接程序删除即可
//  $(".submit_btn").click(function(){
//	  location.href="javascrpt:;"/*tpa=http://***index.html*/;
//	  });
});
</script>
</head>
<body>
<dl class="admin_login">
 <dt>
  <strong>装逼首页后台</strong>
  <em>Niubable System</em>
 </dt>
 <form action="<?php echo U('Login/doLogin');?>"  method="post" onsubmit="return $.sub(this);">
  <dd class="user_icon">
   <input type="text" name="username" placeholder="账号" class="login_txtbx"/>
  </dd>
  <dd class="pwd_icon">
   <input type="password" name="password" placeholder="密码" class="login_txtbx"/>
  </dd>
  <dd class="val_icon">
   <div class="checkcode">
    <input type="text" name="code" placeholder="验证码" maxlength="4" class="login_txtbx">

    <div class="verification">
	  <img class="img_change" src="<?php echo U('Login/verify');?>" width="100" height="50">
	</div>
    <!--<canvas class="J_codeimg" id="myCanvas" onclick="createCode()">对不起，您的浏览器不支持canvas，请下载最新版浏览器!</canvas>-->
   </div>
   <input type="button" value="验证码核验" class="ver_btn" onClick="validate();">
  </dd>
  <dd>
   <input type="submit" value="立即登陆" class="submit_btn"/>
  </dd>
 </form>

 <dd>
  <p>© 2016-2017 </p>
  <p></p>
 </dd>
</dl>
</body>
<script type="text/javascript">
 jQuery(function ($) {

  $.extend({

   changeVerify: function () {
    var url = $('.img_change').attr('src');
    if (url.indexOf('?') > 0) {
     url = url.substr(0, url.indexOf('?'));
    }
    url = url + '?' + parseInt(Math.random() * 10000);
    $('.img_change').attr('src', url);
   },

   sub: function (obj) {
    var obj = $(obj);

    $.ajax({
     type: 'POST',
     url: obj.attr('action'),
     data: obj.serialize(),
     success: function (response) {
      if (response.code > 0) {
       window.location.href = response.url;
      } else {
       alert(response.msg);
      }

      $.changeVerify();
     }
    });

    return false;
   }

  });


  $('.img_change').click(function () {
   $.changeVerify();
  })
 })
</script>
</html>