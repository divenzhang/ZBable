<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
  <title>装逼神器</title>
  <!-- Set render engine for 360 browser -->
  <meta name="renderer" content="webkit">
  <!-- No Baidu Siteapp-->
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="icon" type="image/png" href="assets/i/favicon.ico">
  <!-- Add to homescreen for Chrome on Android -->
  <meta name="mobile-web-app-capable" content="yes">
  <!-- Add to homescreen for Safari on iOS -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
  <!-- Tile icon for Win8 (144x144 + tile color) -->
  <meta name="msapplication-TileColor" content="#0e90d2">
  <link rel="stylesheet" href="/thinkphp/Public/assets/css/amazeui.css">
  <!--<link rel="stylesheet" href="assets/css/app.css">-->
  <link rel="stylesheet" href="/thinkphp/Public/assets/css/list-new.css">
  <link rel="stylesheet" href="/thinkphp/Public/assets/css/dropload.css">
</head>

<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器，部分功能无法支持。 请 <a
  href="http://browsehappy.com/" target="_blank">升级浏览器</a>
  以获得更好的体验！</p>
<![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<script src="/thinkphp/Public/assets/js/jquery-2.2.3.min.js"></script>
<!--<![endif]-->
<script src="/thinkphp/Public/assets/js/amazeui.js"></script>
<div class="head">
  <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='false' >
    <!--banner图片滚动-->
    <!--<div class="d5">-->
      <!--<form>-->
        <!--<input type="text" placeholder="搜索你想玩的内容..">-->
        <!--<button type="submit"></button>-->
      <!--</form>-->
    <!--</div>-->
    <div class="sim-btn sim-button"><span>关注我们</span></div>
    <ul class="am-slides">
      <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ban): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($ban["aurl"]); ?>"><img src="<?php echo ($ban["imgurl"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="top_line">
    <img src="/thinkphp/Public/images/water_45.png" alt="">
    <a href="javascript:void(0)"><span></span></a>
    <a href="hot.html"style="float: right;padding-right: 10px">更多></a>
  </div>
  <!--热门推荐-->
  <div class="top-new">
    <ul>
      <?php if(is_array($indexUpdate)): $i = 0; $__LIST__ = $indexUpdate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
          <a href="<?php echo ($vo["aurl"]); ?>">
            <img src="<?php echo ($vo["imgurl"]); ?>"><div class="top-text"><?php echo ($vo["name"]); ?></div>
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>
  <div class="top_line">
    <img src="/thinkphp/Public/images/water_47.png" alt="">
    <a href="javascript:void(0)"><span></span></a>
    <a href="list.html"style="float: right;padding-right: 10px">更多></a>
  </div>
  <div class="top-new">
    <ul id="list-ico">
      <?php if(is_array($indexHot)): $i = 0; $__LIST__ = $indexHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li id="list_info">
          <a href="<?php echo ($rank["aurl"]); ?>">
            <img src="<?php echo ($rank["imgurl"]); ?>"><div class="top-text"><?php echo ($rank["name"]); ?></div>
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>

  <div class="top_line">
    <img src="/thinkphp/Public/images/water_46.png" alt="">
    <a href="javascript:void(0)"><span></span></a>
    <a href="all_list.html" style="float: right; padding-right: 5px; text-align: center; border-radius:5px ;">再猜一次></a>
  </div>
  <div class="top-new">
    <ul>
      <?php if(is_array($indexLike)): $i = 0; $__LIST__ = $indexLike;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lk): $mod = ($i % 2 );++$i;?><li>
          <a href="<?php echo ($lk["aurl"]); ?>">
            <img src="<?php echo ($lk["imgurl"]); ?>"><div class="top-text"><?php echo ($lk["name"]); ?></div>
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
</div>
</div>
<!--菜单列表-->
<div class="tab nav_scroll">
  <a href="javascript:;" class="item cur">装逼</a>
  <a href="javascript:;" class="item">搞怪</a>
  <a href="javascript:;" class="item">证书</a>
  <a href="javascript:;" class="item">测试</a>
  <!--<a href="javascript:;" class="item">游戏</a>-->
</div>
<div class="content">
  <div class="lists"></div>
  <div class="lists"></div>
  <div class="lists"></div>
  <div class="lists"></div>
</div>
<script src="/thinkphp/Public/assets/js/jquery-2.2.3.min.js"></script>
<script src="/thinkphp/Public/assets/js/dropload.js"></script>
<!--滚东西悬浮-->
<script type="text/javascript">
  var head=$(".head").height();
  $(window).scroll(function(){
    var topScr=$(window).scrollTop();
    if (topScr>head) {
      $(".tab").addClass("fixed");
    }else{
      $(".tab").removeClass("fixed");
    }
  });
  $('.sim-btn').click(function () {
    window.location.href ='https://mp.weixin.qq.com/mp/profile_ext?action=home&__biz=MzIxOTQ5ODEyNQ==&scene=116#wechat_redirect';
  });

  var width=$('#list_info').width();
  $('#list-ico').arrt({style:"height:width"});

</script>
<script type="text/javascript">
  $(function(){
    var itemIndex = 0;
    var tab1LoadEnd = false;
    var tab2LoadEnd = false;
    var tab3LoadEnd = false;
    var tab4LoadEnd = false;
    // tab
    $('.tab .item').on('click',function(){
      var $this = $(this);
      itemIndex = $this.index();
      $this.addClass('cur').siblings('.item').removeClass('cur');
      $('.lists').eq(itemIndex).show().siblings('.lists').hide();

      // 如果选中菜单一
      if(itemIndex == '0'){
        // 如果数据没有加载完
        if(!tab1LoadEnd){
          // 解锁
          dropload.unlock();
          dropload.noData(false);
        }else{
          // 锁定
          dropload.lock('down');
          dropload.noData();
        }
        // 如果选中菜单二
      }else if(itemIndex == '1'){
        if(!tab2LoadEnd){
          // 解锁
          dropload.unlock();
          dropload.noData(false);
        }else{
          // 锁定
          dropload.lock('down');
          dropload.noData();
        }
      }else if (itemIndex == '2'){
        if(!tab3LoadEnd){
          // 解锁
          dropload.unlock();
          dropload.noData(false);
        }else{
          // 锁定
          dropload.lock('down');
          dropload.noData();
        }
      }else if (itemIndex == '3'){
        if(!tab4LoadEnd){
          // 解锁
          dropload.unlock();
          dropload.noData(false);
        }else{
          // 锁定
          dropload.lock('down');
          dropload.noData();
        }
      }
      // 重置
      dropload.resetload();
    });

    var counter = 0;
    var counter1 = 0;
    var counter2 = 0;
    var counter3 = 0;
    // 每页展示个数
    var num = 6;
    var pageStart = 0,pageEnd = 0;
    var pageStart1 = 0,pageEnd1 = 0;
    var pageStart2 = 0,pageEnd2 = 0;
    var pageStart3 = 0,pageEnd3 = 0;

    // dropload
    var dropload = $('.content').dropload({
      scrollArea : window,
      loadDownFn : function(me){
        // 加载菜单一的数据
        if(itemIndex == '0'){
          $.ajax({
            type: 'post',
            url: '/thinkphp/index.php/Niubable/Index/getListJsonInfo/',
            data:{"data":"4"},
            dataType: 'json',
            success: function(data){
              var result = '';
              counter++;
              pageEnd = num * counter;
              pageStart = pageEnd - num;

              if(pageStart <= data.length){
                for(var i = pageStart; i < pageEnd; i++){
                  result +=   '<a class="item opacity" href="'+data[i].aurl+'">'
                          +'<img src="'+data[i].imgurl+'" alt="">'
                          +'<h3>'+data[i].name+'</h3>'
                          +'<h4>'+data[i].briefing+'</h4>'
                          +'<span class="date">'+data[i].data+'万人玩过'+'</span>'
                          +'</a>';
                  if((i + 1) >= data.length){
                    // 数据加载完
                    tab1LoadEnd = true;
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    break;
                  }
                }
                // 为了测试，延迟1秒加载
                setTimeout(function(){
                  $('.lists').eq(0).append(result);
                  // 每次数据加载完，必须重置
                  me.resetload();
                },400);
              }
            },
            error: function(xhr, type){
              alert('Ajax error!');
              // 即使加载出错，也得重置
              me.resetload();
            }
          });
          // 加载菜单二的数据
        }else if(itemIndex == '1'){
          $.ajax({
            type: 'POST',
            url: '/thinkphp/index.php/Niubable/Index/getListJsonInfo/',
            data:{"data":"5"},
            dataType: 'json',
            success: function(data){
              var result0 = '';
              counter1++;
              pageEnd1 = num * counter1;
              pageStart1 = pageEnd1 - num;
              if(pageStart1 <= data.length){
                for(var i = pageStart1; i < pageEnd1; i++){
                  result0 +=   '<a class="item opacity" href="'+data[i].aurl+'">'
                          +'<img src="'+data[i].imgurl+'" alt="">'
                          +'<h3>'+data[i].name+'</h3>'
                          +'<h4>'+data[i].briefing+'</h4>'
                          +'<span class="date">'+data[i].data+'万人玩过'+'</span>'
                          +'</a>';
                  if((i + 1) >= data.length){
                    // 数据加载完
                    tab2LoadEnd = true;
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    break;
                  }
                }
                // 为了测试，延迟1秒加载
                setTimeout(function(){
                  $('.lists').eq(1).append(result0);
                  // 每次数据加载完，必须重置
                  me.resetload();
                },400);
              }
            },
            error: function(xhr, type){
              alert('Ajax error!');
              // 即使加载出错，也得重置
              me.resetload();
            }
          });
        }else if(itemIndex == '2'){
          $.ajax({
            type: 'POST',
            url: '/thinkphp/index.php/Niubable/Index/getListJsonInfo/',
            data:{"data":"6"},
            dataType: 'json',
            success: function(data){
              var result1 = '';
              counter2++;
              pageEnd2 = num * counter2;
              pageStart1 = pageEnd2 - num;
              if(pageStart2 <= data.length){
                for(var i = pageStart2; i < pageEnd2; i++){
                  result1 +=   '<a class="item opacity" href="'+data[i].aurl+'">'
                          +'<img src="'+data[i].imgurl+'" alt="">'
                          +'<h3>'+data[i].name+'</h3>'
                          +'<h4>'+data[i].briefing+'</h4>'
                          +'<span class="date">'+data[i].data+'万人玩过'+'</span>'
                          +'</a>';
                  if((i + 1) >= data.length){
                    // 数据加载完
                    tab2LoadEnd = true;
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    break;
                  }
                }
                // 为了测试，延迟1秒加载
                setTimeout(function(){
                  $('.lists').eq(2).append(result1);
                  // 每次数据加载完，必须重置
                  me.resetload();
                },400);
              }
            },
            error: function(xhr, type){
              alert('Ajax error!');
              // 即使加载出错，也得重置
              me.resetload();
            }
          });
        }else if(itemIndex == '3'){
          $.ajax({
            type: 'POST',
            url: '/thinkphp/index.php/Niubable/Index/getListJsonInfo/',
            data:{"data":"7"},
            dataType: 'json',
            success: function(data){
              var result3 = '';
              counter3++;
              pageEnd3 = num * counter3;
              pageStart3 = pageEnd3 - num;
              if(pageStart3 <= data.length){
                for(var i = pageStart3; i < pageEnd3; i++){
                  result3 +=   '<a class="item opacity" href="'+data[i].aurl+'">'
                          +'<img src="'+data[i].imgurl+'" alt="">'
                          +'<h3>'+data[i].name+'</h3>'
                          +'<h4>'+data[i].briefing+'</h4>'
                          +'<span class="date">'+data[i].data+'万人玩过'+'</span>'
                          +'</a>';
                  if((i + 1) >= data.length){
                    // 数据加载完
                    tab4LoadEnd = true;
                    // 锁定
                    me.lock();
                    // 无数据
                    me.noData();
                    break;
                  }
                }
                // 为了测试，延迟1秒加载
                setTimeout(function(){
                  $('.lists').eq(3).append(result3);
                  // 每次数据加载完，必须重置
                  me.resetload();
                },400);
              }
            },
            error: function(xhr, type){
              alert('Ajax error!');
              // 即使加载出错，也得重置
              me.resetload();
            }
          });
        }
      }
    });
  });

</script>
</body>
</html>