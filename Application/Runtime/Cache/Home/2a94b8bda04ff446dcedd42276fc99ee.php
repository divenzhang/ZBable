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
<script src="/thinkphp/Public/assets/js/attention.js"></script>
<script type="text/javascript">
  //浮动层定位设置插件
  jQuery.fn.selectCity = function(targetId) {
//    var _seft = this;
    var targetId = $(targetId);
    this.click(function(){
      var A_top = $(this).offset().top + $(this).outerHeight(true);  //  1
      targetId.show().css({"position":"absolute","top":A_top+"px"});
      showMask();
      $('#Search').css('z-index','1100');
    });
    targetId.find("#tag_Close").click(function(){
      targetId.hide();
      hideMask();
      $('#Search').css('z-index','1');
      $('#selecttags').val("");
    });
    targetId.click(function(e){
      e.stopPropagation(); //  2
    });
    return this;
  };

  //调用浮动层
  $(function(){
    $("#selecttags").selectCity("#searchTag");
  });
  function showMask(){
    $("#mask").css("height",$(document).height());
    $("#mask").css("width",$(document).width());
    $("#mask").fadeIn(300);
  }
  //隐藏遮罩层
  function hideMask(){
    $("#mask").hide();
  }
</script>
<div class="head">
  <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='false' >
    <ul class="am-slides">
      <?php if(is_array($banner)): $i = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ban): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($ban["aurl"]); ?>"><img src="<?php echo ($ban["imgurl"]); ?>"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
  </div>

  <div class="float_ad" onClick="meDialog.tips({
  	  'title': '长按识别关注',
      'content':''
     })">
    <img src="http://wx.y1y.me/uploads/5/5G1dfQ66ef5nzgMkyez2/d/0/4/2/57e22a78a195e.gif" style="width: 90px;transform: rotate(73deg);bottom: 125px;position: relative;left: -24px;top: 0;">
    <p style=" margin:0;text-align: center;width: 100%;margin-top: -25%;font-size: 12px;font-weight: bold;color: #ff7241;">戳我<br>关注我们</p>
  </div>

  <div class="am-u-lg-6" style="display: block ;float: none;background: #ffffff;height: 0;
    padding-bottom: 15%;">
    <form action="<?php echo U('Index/search');?>" onsubmit="return $.sub(this); " method="post">
      <div class="am-input-group am-input-group-secondary" id="Search">
        <input id="selecttags" style="border-radius: 20px 0 0 20px;" type="text"name="search" class="am-form-field" placeholder="大家都在搜：星座标签">
        <span class="am-input-group-btn">
        <button style="border-radius: 0 20px 20px 0;" class="am-btn am-btn-primary" type="submit"><span class="am-icon-search"></span></button>
      </span>
      </div>
    </form>

  </div>
  <div id="searchTag" style="width: 100%;">
    <section class="search-rcmd diy-content-space" style="display: block;">
      <h5 id="search_title" class="diy-content-padded">热搜榜</h5>
      <div class="keywords-wrap" id="rel_content">
        <?php if(is_array($indexSearch)): $i = 0; $__LIST__ = $indexSearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$search_list): $mod = ($i % 2 );++$i;?><a href="<?php echo ($search_list["aurl"]); ?>" class="search-label mui-ellipsis" style="margin-bottom: 8px;"><?php echo ($search_list["name"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
      </div>
      <div style="clear: both"></div>
      <span class="search-rcmd-close" id="tag_Close"><i class="iconfont icon-close"></i>&nbsp;关闭</span>
    </section>
  </div>
  <div id="mask" class="mask"></div>
  <div class="top_line">
    <img src="/thinkphp/Public/images/title.png" alt="">
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
  <div class="top-new">
    <ul id="list-ico">
      <?php if(is_array($indexHot)): $i = 0; $__LIST__ = $indexHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$rank): $mod = ($i % 2 );++$i;?><li id="list_info">
          <a href="<?php echo ($rank["aurl"]); ?>">
            <img src="<?php echo ($rank["imgurl"]); ?>"><div class="top-text"><?php echo ($rank["name"]); ?></div>
          </a>
        </li><?php endforeach; endif; else: echo "" ;endif; ?>
    </ul>
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
  <div class="lists">

  </div>
  <div class="lists" id="list1" style="display: none;">
    <?php if(is_array($indexList1)): $i = 0; $__LIST__ = $indexList1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list1): $mod = ($i % 2 );++$i;?><a class="item opacity" href="<?php echo ($list1["aurl"]); ?>"><img src="<?php echo ($list1["imgurl"]); ?>" alt="">
        <h3><?php echo ($list1["name"]); ?></h3>
        <h4><?php echo ($list1["briefing"]); ?></h4>
        <span class="date"><?php echo ($list1["data"]); ?></span>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="lists" id="list2" style="display: none;">
    <?php if(is_array($indexList2)): $i = 0; $__LIST__ = $indexList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list2): $mod = ($i % 2 );++$i;?><a class="item opacity" href="<?php echo ($list2["aurl"]); ?>"><img src="<?php echo ($list2["imgurl"]); ?>" alt="">
        <h3><?php echo ($list2["name"]); ?></h3>
        <h4><?php echo ($list2["briefing"]); ?></h4>
        <span class="date"><?php echo ($list2["data"]); ?></span>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
  <div class="lists" id="list3" style="display: none;">
    <?php if(is_array($indexList3)): $i = 0; $__LIST__ = $indexList3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list3): $mod = ($i % 2 );++$i;?><a class="item opacity" href="<?php echo ($list3["aurl"]); ?>"><img src="<?php echo ($list3["imgurl"]); ?>" alt="">
        <h3><?php echo ($list3["name"]); ?></h3>
        <h4><?php echo ($list3["briefing"]); ?></h4>
        <span class="date"><?php echo ($list3["data"]); ?></span>
      </a><?php endforeach; endif; else: echo "" ;endif; ?>
  </div>
</div>
<script src="/thinkphp/Public/assets/js/dropload.js"></script>
<!--<script src="/thinkphp/Public/assets/js/loadinglist.js"></script>-->
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

  jQuery(function ($) {
    $.extend({
      sub: function (obj) {
        obj = $(obj);
        console.log(obj);
        $.ajax({
          url: obj.attr('action'),
          type: 'post',
          data: obj.serialize(),
          success: function (data) {
            console.log(data);
            console.log(data.results);
            var result = '';
            if(data.code ==0){
              $('#search_title').text('未搜索到，试试这些');
            }else{
              for(var i = 0; i < data.result.length; i++){
                console.log(data.result[i].aurl);
                result +=   '<a class="data_rel" href="'+data.result[i].aurl+'">'
                        +'<img src="'+data.result[i].imgurl+'" alt="">'
                        +'<h3>'+data.result[i].name+'</h3>'
                        +'<h4>'+data.result[i].briefing+'</h4>'
                        +'<span class="date">'+data.result[i].data+'万人玩过'+'</span>'
                        +'</a>';
              }
              $('#search_title').html('与'+'<strong> '+data.key+'</strong> '+' 相关的游戏');
            }
            $("#rel_content").html(result);

          }
        });
        return false;
      }
    })


  })
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
            url: '/thinkphp/index.php/Home/Index/getListJsonInfo/',
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
            url: '/thinkphp/index.php/Home/Index/getListJsonInfo/',
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
            url: '/thinkphp/index.php/Home/Index/getListJsonInfo/',
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
            url: '/thinkphp/index.php/Home/Index/getListJsonInfo/',
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