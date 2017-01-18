<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin-首页</title>

    <!-- Bootstrap -->
    <link href="/thinkphp/Public/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/thinkphp/Public/assets/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/thinkphp/Public/assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/thinkphp/Public/assets/css/common.css">
    <link rel="stylesheet" href="/thinkphp/Public/assets/css/main.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .table-header {
            background-color: #4ec3ff;
            text-align: center;
            color: #FFF;
            font-size: 14px;
            line-height: 38px;
            padding-left: 12px;
            margin-bottom: 1px;
        }

        /* modify */
        .modify-header{width:100%;text-align:center;height:30px;font-size:16px;line-height:30px;}
        .modify{width:500px;position:fixed;border:#ebebeb solid 1px;height:515px;top:30%;left:50%;display:none;background:#ffffff;box-shadow:0px 0px 20px #ddd;z-index:9999;margin-left:-250px;margin-top:-140px;}
        .modify-title{width:100%;margin:10px 0px 0px 0px;text-align:center;line-height:40px;height:40px;font-size:18px;position:relative;}
        .modify-title span{position:absolute;font-size:12px;right:-20px;top:-30px;background:#ffffff;border:#ebebeb solid 1px;width:40px;height:40px;border-radius:20px;}
        .modify-title span a{display:block;}
        .modify-input-content{margin-top:20px;}
        .modify-input {overflow:hidden;margin:0px 0px 20px 0px;}
        .modify-input label{float:left;width:90px;padding-right:10px;text-align:right;line-height:35px;height:35px;font-size:14px;}
        .modify-input input.list-input{float:left;line-height:35px;height:35px;width:350px;border:#ebebeb 1px solid;text-indent:5px;}
        .modify-button{width:50%;margin:30px auto 0px auto;line-height:40px;font-size:14px;border:#ebebeb 1px solid;text-align:center;}
        .modify-button a{display:block;}
        .modify-bg{width:100%;height:100%;position:fixed;top:0;left:0;background:#ebebeb;filter:alpha(opacity=30);-moz-opacity:0.3;-khtml-opacity:0.3;opacity:0.3;display:none;}
        /*.xf-form{*/
            /*!*display: inline-block;*!*/
            /*!*top: -36px;*!*/
            /*!*float: left;*!*/
            /*!*left: 90px;*!*/

        /*}*/
        .xf-select{
            display: inline-block;
            /*margin-left: 109px;*/
            /*margin-top: 4px;*/
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-sidebar-toggle" data-toggle="tooltip" data-placement="right" title="菜单栏收缩或展开"><i class="fa fa-bars" aria-hidden="true"></i></span>
            <a class="navbar-brand" href="#">Simple Admin</a>
        </div>

        <div class="navbar-end">
            <div class="nav-notifications">
                <!--<div class="btn-group">-->
                    <!--<button type="button" class="btn btn-noti" data-toggle="dropdown">-->
                        <!--<i class="fa fa-envelope fa-lg "></i>-->
                        <!--<span class="badge badge-terques">5</span>-->
                    <!--</button>-->
                    <!--<ul class="dropdown-menu dropdown-menu-right" role="menu">-->
                        <!--<li><a href="#">Action</a></li>-->
                        <!--<li><a href="#">Another action</a></li>-->
                        <!--<li><a href="#">Something else here</a></li>-->
                        <!--<li class="divider"></li>-->
                        <!--<li><a href="#">Separated link</a></li>-->
                    <!--</ul>-->
                <!--</div>-->
                <div class="btn-group">
                    <button type="button" class="btn btn-noti" data-toggle="dropdown">
                        <i class="fa fa-bell fa-lg"></i>
                        <span class="badge badge-yellow">3</span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
                <!--<div class="btn-group">-->
                    <!--<button type="button" class="btn btn-noti" data-toggle="dropdown">-->
                        <!--<i class="fa fa-comments fa-lg"></i>-->
                        <!--<span class="badge badge-red">2</span>-->
                    <!--</button>-->
                    <!--<ul class="dropdown-menu dropdown-menu-right" role="menu">-->
                        <!--<li><a href="#">Action</a></li>-->
                        <!--<li><a href="#">Another action</a></li>-->
                        <!--<li><a href="#">Something else here</a></li>-->
                        <!--<li class="divider"></li>-->
                        <!--<li><a href="#">Separated link</a></li>-->
                    <!--</ul>-->
                <!--</div>-->
            </div>

            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="navbar-dropdownmenu" data-toggle="dropdown">
                    <img src="./images/avatar-mini.jpg" alt="Admin">
                    管理员
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="navbar-dropdownmenu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('Home/User/index');?>">设置</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('Home/Login/logout');?>">退出登录</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="wrapper">
    
     <aside class="sidebar-menu">
        <div class="separator-50"></div>

        <ul class="menu-list">
            <li <?php if(update == 'index'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="<?php echo U('Admin/index/index');?>"><i class="fa fa-home" aria-hidden="true"></i>首页</a>
            </li>
            <li class="separator-20"></li>
            <li <?php if(update == 'update'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="javascript:void(0)"><i class="fa fa-cube" aria-hidden="true"></i>首页更新</a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/Modify/index');?>">上传新内容</a></li>
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/Adjust/index');?>">调整首页</a></li>
                </ul>
            </li>
            <li <?php if(update == 'sorts'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="javascript:void(0)"><i class="glyphicon glyphicon-th" aria-hidden="true"></i>分类管理</a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="#">排序</a></li>
                    <li class="sub-menu-item"><a href="#">上首页</a></li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)"><i class="fa fa-tag" aria-hidden="true"></i>预留页面 <span class="badge">4</span></a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="#">空白页面</a></li>
                    <li class="sub-menu-item"><a href="#">登录页面</a></li>
                    <li class="sub-menu-item"><a href="#">跳转页面</a></li>
                    <li class="sub-menu-item"><a href="#">404页面</a></li>
                </ul>
            </li>
            <li <?php if(update == 'admin'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="javascript:void(0)"><i class="glyphicon glyphicon-user" aria-hidden="true"></i>管理员</a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/User/index');?>">设置</a></li>
                    <!--<li class="sub-menu-item"><a href="#"></a></li>-->
                </ul>
            </li>

            <li class="separator-30"></li>
            <li class="menu-item">
                <a href="<?php echo U('Admin/Login/logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i>安全退出</a>
            </li>

        </ul>
    </aside>



    <div class="main-container">
        <div class="padding">
            
    <ol class="breadcrumb">
        <li><a href="<?php echo U('Admin/Index/index');?>">首页</a></li>
        <li>上传更新</li>
    </ol>
    <div class="box">
        <div class="box-inner">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <?php if(is_array($one)): $i = 0; $__LIST__ = $one;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$one): $mod = ($i % 2 );++$i;?><td><?php echo ($one["name"]); ?>-<?php echo ($one["click"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tr>
                            <tr>
                                <?php if(is_array($two)): $i = 0; $__LIST__ = $two;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$two): $mod = ($i % 2 );++$i;?><td><?php echo ($two["name"]); ?>-<?php echo ($two["click"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tr>
                            <tr>
                                <?php if(is_array($three)): $i = 0; $__LIST__ = $three;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$three): $mod = ($i % 2 );++$i;?><td><?php echo ($three["name"]); ?>-<?php echo ($three["click"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="box">
        <div class="heading">
          <h3 class="title" style="width: 80%">上传新内容</h3>
            <button type="button" class="btn btn-primary btn-info" style="float: right;margin: -44px 30px 0 0;" data-toggle="modal"
                    data-target="#myModal" data="<?php echo U('Admin/User/question');?>">上传轮播图
            </button>
        </div>
        <div class="container-fluid">
            <div class="row">
                <form class="form-horizontal" action="<?php echo U('Admin/Modify/update');?>" onsubmit="return $.sub(this);" method="post" role="form" style="width: 90%;padding-top: 20px">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroupInputDefault">标题</label>
                        <div class="col-sm-6">
                            <input type="hidden" value="" name="btn_id" id="btn_id">
                            <input name="name" class="form-control" type="text" id="formGroupInputDefault" placeholder="不要超过六个字">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroupInputSmall">副标题</label>
                        <div class="col-sm-6">
                            <input name="briefing" class="form-control" type="text" id="formGroupInputSmall" placeholder="描述标题">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroupInputSmall">链接</label>
                        <div class="col-sm-6">
                            <input name="aurl" class="form-control" type="text" placeholder="游戏链接">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroupInputSmall">图片链接</label>
                        <div class="col-sm-6">
                            <input name="imgurl" class="form-control" type="text" placeholder="七牛图片则输入，上传图片忽略此栏">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ico-file-2">上传图标</label>
                        <input type="hidden" name="new_img" value="" class="type" id="new_img">
                        <div class="col-sm-10">
                            <div>
                                <button type="button" class="btn btn-success">
                                    <i class="glyphicon glyphicon-open">选择要上传的图标</i>
                                </button>
                            </div>
                            <input type="file" class=" btn-lg" style="width: 190px;height:40px; position: absolute;top:-6px;left: -4px;opacity: 0; filter:alpha(opacity=0)" name="ico" onchange="uploadFile('<?php echo U('Admin/Adjust/image');?>','ico-file-2','new_img');" id="ico-file-2">
                            <p class="help-block" style="color: #c7254e">请上传正方型的图标！</p>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">上传位置</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-md-2">
                                    <select name="sorts" class=" form-control">
                                        <option selected value="4">装逼</option>
                                        <option value="5">搞怪</option>
                                        <option value="6">证书</option>
                                        <option value="7">测试</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="flag" class=" form-control">
                                        <option selected="true" disabled="true" value="">上传首页</option>
                                        <option value="1">第一行</option>
                                        <option value="2">第二行</option>
                                        <option value="3">第三行</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <select name="number" class=" form-control">
                                        <option selected value="1">排序1</option>
                                        <option value="2">排序2</option>
                                        <option value="3">排序3</option>
                                        <option value="4">排序4</option>
                                    </select>
                                </div>

                            </div>
                            <p class="help-block" style="color: #c7254e">‘上传首页’选择行数则展示在首页，不选则显示在分类列表！</p>
                        </div>
                    </div>

                    <div>
                        <div class="col-sm-2"></div>
                        <button type="submit" class="btn btn-default btn-lg">确定更新</button>
                    </div>

                </form>
            </div>
        </div>


    </div>

    <!-- 首页轮播图弹出框Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                            class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">更改密码</h4>
                </div>
                <form class="form-horizontal" action="<?php echo U('Admin/Modify/banner');?>" onsubmit="return $.sub(this);" method="post" role="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="a_url">游戏链接</label>
                            <div class="col-sm-10">
                                <input name="a_url" class="form-control" type="text" id="a_url" placeholder="请填写游戏链接">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="img_url">图片链接</label>
                            <div class="col-sm-10">

                                <input name="img_url"  class="form-control" type="text" id="img_url" placeholder="图片地址,上传图片则忽略此栏">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="question">排序</label>
                            <div class="col-sm-10">
                                <select name="new_sorts" id="" class="form-control">
                                    <option id="question" value="1">排序1</option>
                                    <option value="2">排序2</option>
                                    <option value="3">排序3</option>
                                    <option value="4">排序4</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="ico-file-3">上传图标</label>
                        <div class="col-sm-10">
                            <input type="hidden" name="image" value="" class="type" id="banner_img">
                            <div>
                                <button type="button" class="btn btn-success">
                                    <i class="glyphicon glyphicon-open">选择要上传的图标</i>
                                </button>
                            </div>
                            <input style="width: 190px;height:40px; position: absolute;top:-6px;left: -4px;opacity: 0; filter:alpha(opacity=0)" class="btn-lg" name="banner" type="file" onchange="uploadFile('<?php echo U('Admin/Adjust/image');?>','ico-file-3','banner_img');" id="ico-file-3" >
                            <p class="help-block" style="color: #c7254e">请上传700*230图片</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                        <button type="submit" class="btn btn-primary">确定修改</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>

</div>

<!--返回顶部-->
<div class="scroll-to-top"><i class="fa fa-chevron-up fa-lg"></i></div>
<!--各个页面需要的js-->
<script src="/thinkphp/Public/assets/jquery/jquery-2.2.3.min.js"></script>
<script src="/thinkphp/Public/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/thinkphp/Public/assets/bootstrap-daterangepicker/moment.min.js"></script>
<script src="/thinkphp/Public/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="/thinkphp/Public/assets/js/main.js"></script>
<script src="/thinkphp/Public/assets/js/modify.js"></script>
<script src="/thinkphp/Public/assets/js/ajaxfileupload.js"></script>
<script src="/thinkphp/Public/assets/js/ajaxUpload.js"></script>
    <!--调整首页js-->
    <script type="text/javascript">
        $('.modbtn').click(function () {
            console.log("ffff");
            var td = $(this).parents('tr').children('td');
            $('#username').attr('value', td.eq(1).text());
            var id=td.eq(0).text();
            var url=$(this).attr('data');
            $('#question').attr('value',id);
            console.log(id+url);
            $.ajax({
                type: 'POST',
                url:url,
                data:{'id':id},
                success: function(data) {
                    $('#question').html(data.question);
                }
            });
        });
        $("#ico-file-2").change(function () {
            $("#docPath").val($(":file").val());
        });

        $("#path").change(function () {
            $("#docPath").val($(":file").val());
        });
        $(".banbtn").click(function () {
            var td = $(this).parents('tr').children('td');
            var id =$(this).attr('data');
            $("#bannerid").attr('value',id);
            $("#banner_a").attr('value',td.eq(0).text());
            var num =td.eq(2).text();
            $("#serial option[value='"+num+"']").attr('selected',true);
            console.log(id);
        });
    </script>
</body>
</html>