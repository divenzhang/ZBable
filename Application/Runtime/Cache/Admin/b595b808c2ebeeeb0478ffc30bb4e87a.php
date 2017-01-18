<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
    <!-- Set render engine for 360 browser -->
    <meta name="renderer" content="webkit">
    <!-- No Baidu Siteapp-->
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!--<link rel="icon" sizes="192x192" href="assets/i/app-icon72x72@2x.png">-->
    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Amaze UI"/>
    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileColor" content="#0e90d2">
    <link rel="stylesheet" href="/thinkphp/Public/Assets/css/amazeui.css">
    <script src="/thinkphp/Public/Assets/js/jquery-2.2.3.min.js"></script>
    <!--<![endif]-->
    <script src="/thinkphp/Public/Assets/js/ajaxfileupload.js"></script>
    <script src="/thinkphp/Public/Assets/js/modify.js"></script>
    <!--<link rel="stylesheet" href="assets/css/app.css">-->
    <style type="text/css">
        body{
            background: #ffffff;
        }
        .tab1 {
            width: 100%;
            margin-right: auto;
            margin-bottom: 0;
            margin-left: auto;
        }

        .menu {
            height: 42px;
            font-size: 14px;
            width: 100%;
            border-top-width: 1px;
            border-right-width: 1px;
            border-top-style: solid;
            border-right-style: solid;
            border-top-color: #CCC;
            border-right-color: #ccc;
        }

        .menu li {
            float: left;
            width: 25%;
            text-align: center;
            line-height: 40px;
            height: 40px;
            cursor: auto;
            color: #666;
            overflow: hidden;
            border-bottom-width: 1px;
            border-left-width: 1px;
            border-left-style: solid;
            border-bottom-color: #ccc;
            border-left-color: #ccc;
        }

        #tab1 .menu ul {
            margin: 0px;
            padding: 0px;
            list-style-type: none;
        }

        .menu li.off {
            background: #fff;
            color: #336699;
            font-weight: bold;
            border-bottom: none;
        }

        #content #tab1 .menudiv #con_one_1 #1 table tr td #u112_input {
            height: 50px;
        }


        /* modify */
        .modify-header{width:100%;text-align:center;height:30px;font-size:16px;line-height:30px;}
        .modify{width:500px;position:fixed;border:#ebebeb solid 1px;height:500px;top:30%;left:50%;display:none;background:#ffffff;box-shadow:0px 0px 20px #ddd;z-index:9999;margin-left:-250px;margin-top:-140px;}
        .modify-title{width:100%;margin:10px 0px 0px 0px;text-align:center;line-height:40px;height:40px;font-size:18px;position:relative;}
        .modify-title span{position:absolute;font-size:12px;right:-20px;top:-30px;background:#ffffff;border:#ebebeb solid 1px;width:40px;height:40px;border-radius:20px;}
        .modify-title span a{display:block;}
        .modify-input-content{margin-top:20px;}
        .modify-input {overflow:hidden;margin:0px 0px 20px 0px;}
        .modify-input label{float:left;width:90px;padding-right:10px;text-align:right;line-height:35px;height:35px;font-size:14px;}
        .modify-input input.list-input{float:left;line-height:35px;height:35px;width:350px;border:#ebebeb 1px solid;text-indent:5px;}
        .modify-button{width:50%;margin:30px auto 0px auto;line-height:40px;font-size:14px;border:#ebebeb 1px solid;text-align:center;}
        .modify-button a{display:block;}
        .modify-bg{width:100%;height:100%;position:fixed;top:0px;left:0px;background:#ebebeb;filter:alpha(opacity=30);-moz-opacity:0.3;-khtml-opacity:0.3;opacity:0.3;display:none;}
        .xf-form{
            display: inline-block;
            top: -36px;
            float: left;
            left: 90px;

        }
        .xf-select{
            display: inline-block;
            margin-left: 109px;
            margin-top: 4px;
        }

    </style>
    <script>
        function setTab(name, cursel) {
            cursel_0 = cursel;
            for (var i = 1; i <= links_len; i++) {
                var menu = document.getElementById(name + i);
                var menudiv = document.getElementById("con_" + name + "_" + i);
                if (i == cursel) {
                    menu.className = "off";
                    menudiv.style.display = "block";
                }
                else {
                    menu.className = "";
                    menudiv.style.display = "none";
                }
            }
        }
//        function Next() {
//            cursel_0++;
//            if (cursel_0 > links_len)cursel_0 = 1
//            setTab(name_0, cursel_0);
//        }
        var name_0 = 'one';
        var cursel_0 = 1;
        //循环周期，可任意更改（毫秒）
        var links_len, iIntervalId;
        onload = function () {
            var links = document.getElementById("tab1").getElementsByTagName('li')
            links_len = links.length;
            for (var i = 0; i < links_len; i++) {
                links[i].onmouseover = function () {
                    clearInterval(iIntervalId);
                }
            }
        }
    </script>
</head>
<body>
<header class="am-topbar am-topbar-inverse">
    <h1 class="am-topbar-brand">
        <a href="#">Welcome to Zhunagbi </a>
    </h1>
    <div class="am-topbar-right" style="float: right;left: 15px">
        <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm">退出</button>
    </div>
    <div class="am-topbar-right">
        <button class="am-btn am-btn-primary am-topbar-btn am-btn-sm"><?php echo session('admin.username');?></button>
    </div>
</header>
<div class="tab1" id="tab1">
    <div class="menu">
        <ul>
            <li id="one1" onclick="setTab('one',1)">首页更新</li>
            <li id="one2" onclick="setTab('one',2)">更改内容</li>
            <li id="one3" onclick="setTab('one',3)">下架内容</li>
            <li id="one4" onclick="setTab('one',4)">修改内容</li>
        </ul>
    </div>
</div>

<div class="menudiv">
    <div id="con_one_1">
        <form class="am-form" action="<?php echo U('Index/update');?>"onsubmit="return $.sub(this);" method="post">
            <fieldset>
                <legend>首页更新后台</legend>

                <div class="am-input-group am-input-group-primary">
                    <input type="text" name="name" class="am-form-field am-radius" placeholder="标题（尽量不要超5个字）"/>
                </div>
                <div class="am-input-group am-input-group-primary">
                    <input type="text" name="briefing" class="am-form-field am-radius" placeholder="副标题"/>
                </div>
                <div class="am-input-group am-input-group-primary">
                    <input type="text" name="aurl" class="am-form-field am-radius" placeholder="链接"/>
                </div>
                <div class="am-input-group am-input-group-primary">
                    <input type="text" name="imgurl" class="am-form-field am-radius" placeholder="图片链接"/>
                </div>

                <div class="am-form-group am-form-file">
                    <label for="doc-ipt-file-2">选择要上传的图标（注意要为正方形）</label>
                    <div>
                        <input type="hidden" name="image" value="" class="type" id="ico_img">
                        <button type="button" class="am-btn am-btn-default am-btn-sm">
                            <i class="am-icon-cloud-upload">选择要上传的图标</i>
                        </button>
                    </div>
                    <input type="file" name="ico"
                           onchange="uploadFile('<?php echo U('Index/image');?>', 'doc-ipt-file-2','ico_img');"
                           id="doc-ipt-file-2">
                </div>
                <div class="am-form-group">
                    <label for="doc-select-1">选择分类</label>
                    <select name="sorts" id="doc-select-1">
                        <option selected value="4">装逼</option>
                        <option value="5">搞怪</option>
                        <option value="6">证书</option>
                        <option value="7">测试</option>
                    </select>
                    <span class="am-form-caret"></span>
                </div>

                <div class="am-form-group am-form-select">
                    <label for="doc-ipt-file-2">为了确认是否上传精选必须选择一次（不带默认值）</label>
                    <select name="flag" class="">
                        <option value="1">第一行</option>
                        <option value="2">第二行</option>
                        <option value="3">第三行</option>
                    </select>
                </div>
                <div class="am-form-group am-form-select">
                    <select name="number" class="">
                        <option value="1">排序1</option>
                        <option value="2">排序2</option>
                        <option value="3">排序3</option>
                        <option value="4">排序4</option>
                    </select>
                </div>

                <p>
                    <button type="submit" class="am-btn am-btn-default">提交</button>
                </p>
            </fieldset>
        </form>
    </div>
    <div id="con_one_2" style="display:none; width: 90%; margin-left: 5%">
        <h3>第一行</h3>
        <table class="am-table am-table-striped am-table-hover am-text-nowrap am-scrollable-horizontal">
            <thead>
            <td>名字</td>
            <td>副标题</td>
            <td>链接</td>
            <td>图片链接</td>
            <td>分类序号</td>
            <td>操作</td>
            </thead>

            <?php if(is_array($indexUpdate)): $i = 0; $__LIST__ = $indexUpdate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$update): $mod = ($i % 2 );++$i;?><tr >
                    <td><?php echo ($update["name"]); ?></td>
                    <td><?php echo ($update["briefing"]); ?></td>
                    <td><?php echo ($update["aurl"]); ?></td>
                    <td><?php echo ($update["imgurl"]); ?></td>
                    <td><?php echo ($update["flag"]); ?></td>
                    <td><a class="modify-header" id="<?php echo ($update["id"]); ?>" href="javascript:void(0);">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

        <h3>第二行</h3>
        <table class="am-table am-table-striped am-table-hover">
            <thead>
            <td>名字</td>
            <td>副标题</td>
            <td>链接</td>
            <td>图片链接</td>
            <td>分类序号</td>
            <td>操作</td>
            </thead>
            <?php if(is_array($indexHot)): $i = 0; $__LIST__ = $indexHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><tr >
                    <td><?php echo ($hot["name"]); ?></td>
                    <td><?php echo ($hot["briefing"]); ?></td>
                    <td><?php echo ($hot["aurl"]); ?></td>
                    <td><?php echo ($hot["imgurl"]); ?></td>
                    <td><?php echo ($hot["flag"]); ?></td>
                    <td><a class="modify-header" id="<?php echo ($hot["id"]); ?>" href="javascript:void(0);">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <h3>第三行</h3>
        <table class="am-table am-table-striped am-table-hover am-text-nowrap am-scrollable-horizontal">
            <thead>
            <td>名字</td>
            <td>副标题</td>
            <td>链接</td>
            <td>图片链接</td>
            <td>分类序号</td>
            <td>操作</td>
            </thead>
            <?php if(is_array($index_three)): $i = 0; $__LIST__ = $index_three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?><tr >
                    <td><?php echo ($three["name"]); ?></td>
                    <td><?php echo ($three["briefing"]); ?></td>
                    <td><?php echo ($three["aurl"]); ?></td>
                    <td><?php echo ($three["imgurl"]); ?></td>
                    <td><?php echo ($three["flag"]); ?></td>
                    <td><a class="modify-header" id="<?php echo ($three["id"]); ?>" href="javascript:void(0);">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>

        <div class="modify">
            <div class="modify-title">修改首页<span><a href="javascript:void(0);" class="close-modify">关闭</a></span></div>
            <form class="am-form1" action="<?php echo U('Index/modify');?>" onsubmit="return $.sub(this);" method="post">
                <div class="modify-input-content">
                    <div class="modify-input">
                        <label>标 题：</label>
                        <input type="hidden" value="" name="btn_id" id="btn_id">
                        <input type="text" placeholder="请输入标题"  name="name" id="name" class="list-input"/>
                    </div>
                    <div class="modify-input">
                        <label>副标题：</label>
                        <input type="text" placeholder="请输入副标题" name="briefing" id="briefing" class="list-input"/>
                    </div>
                    <div class="modify-input">
                        <label>链 接：</label>
                        <input type="text" placeholder="请输入链接" name="aurl" id="aurl" class="list-input"/>
                    </div>
                    <div class="modify-input">
                        <label>图片链接：</label>
                        <input type="text" placeholder="请输入图片链接" name="imgurl" id="imgurl" class="list-input"/>
                    </div>
                    <div class="modify-input">

                        <div class="am-form-group am-form-file xf-form">
                            <label for="ico-file-2"></label>
                            <div>
                                <input type="hidden" name="new_img" value="" class="type" id="new_img">
                                <button type="button" class="am-btn am-btn-default am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i>选择要上传的图标
                                </button>
                            </div>
                            <input type="file" name="ico"
                                   onchange="uploadFile('<?php echo U('Index/image');?>', 'ico-file-2','new_img');"
                                   id="ico-file-2">
                        </div>
                        <div class="am-form-group am-form-select" style="float: right;margin-top: 4px; margin-right: 78px;">
                            <select name="flag" class="" id="flag1">
                                <option value="1">排序1</option>
                                <option value="2">排序2</option>
                                <option value="3">排序3</option>
                                <option value="4">排序4</option>
                            </select>

                        </div>
                        <div class="am-form-group am-form-select xf-select">
                            <select name="sorts" id="sorts1" class="">
                                <option value="1">第一行</option>
                                <option value="2">第二行</option>
                                <option value="3">第三行</option>
                            </select>
                        </div>

                    </div>
                </div>

                <div class="modify-button"><button type="submit">确认修改</button></div>
            </form>


        </div>
        <div class="modify-bg"></div>


    </div>
    <div id="con_one_3" style="display:none;">
        <h3>分类3</h3>
        <table class="am-table am-table-striped am-table-hover am-text-nowrap am-scrollable-horizontal">
            <thead>
            <td>标题</td>
            <td>副标题</td>
            <td>链接</td>
            <td>图片链接</td>
            <td>分类序号</td>
            <td>操作</td>
            </thead>
            <?php if(is_array($indexList)): $i = 0; $__LIST__ = $indexList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr >
                    <td><?php echo ($list["name"]); ?></td>
                    <td><?php echo ($list["briefing"]); ?></td>
                    <td><?php echo ($list["aurl"]); ?></td>
                    <td><?php echo ($list["imgurl"]); ?></td>
                    <td><?php echo ($list["flag"]); ?></td>
                    <td><a class="modify-header" id="<?php echo ($list["id"]); ?>" href="javascript:void(0);">修改</a></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
        <div class="result page"><?php echo ($page); ?></div>
    </div>
    <div id="con_one_4" style="display:none;">

    </div>
</div>




</body>
<script type="text/javascript">
    function uploadFile(url, file_id, class_id) {
        var url = url;
        var file_id = file_id;
        var file_obj = $('#' + file_id);
        var class_obj = $('#' + class_id);
        var n = $('#' + file_id).next();
        console.log(url);
        console.log(file_id);
        console.log(file_obj);
        console.log('ddd' + class_obj);

        $.ajaxFileUpload({
            url: url,
            fileElementId: file_id,
            secureuri: false,
            dataType: 'json',
            data: {fid: file_obj.attr('name'), id: file_obj.attr('id')},
            type: 'post',
            success: function (data) {
                console.log('1111:'+data);
                n.val(data.url);
//                data.url = data.url + '?' + parseInt(Math.random()*10000);
                class_obj.attr('value', data.url);
                console.log(data.url);
            }
        })
    }

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
                        alert(data.msg);
                        window.location.reload();
                    }
                });
                return false;
            }
        })


    })
</script>
</html>