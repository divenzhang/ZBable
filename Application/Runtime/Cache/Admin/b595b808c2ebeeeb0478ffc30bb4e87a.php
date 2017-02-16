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
        .page {
            display: inline-block;
            margin: 20px 0;
            text-align: center;
        }
        .page span.current {
            background-color: #6faed9;
            border: 1px solid #6faed9;
            color: #ffffff;
            cursor: not-allowed;
            margin: 0 2.5px;
            padding: 6px 12px;
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25);
        }
        .page a {
            background-color: #fafafa;
            border: 1px solid #e0e8eb;
            color: #2283c5;
            margin: 0 2.5px;
            padding: 6px 12px;
            position: relative;
            text-decoration: none;
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
                    <img src="/thinkphp/Public/images/avatar-mini.jpg" alt="Admin">
                    管理员
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" role="menu" aria-labelledby="navbar-dropdownmenu">
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('Admin/User/index');?>">设置</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo U('Admin/Login/logout');?>">退出登录</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<div class="wrapper">
    
     <aside class="sidebar-menu">
        <div class="separator-50"></div>

        <ul class="menu-list">
            <li <?php if(index == 'index'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="<?php echo U('Admin/index/index');?>"><i class="fa fa-home" aria-hidden="true"></i>首页</a>
            </li>
            <li class="separator-20"></li>
            <li <?php if(index == 'update'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="javascript:void(0)"><i class="fa fa-cube" aria-hidden="true"></i>首页更新</a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/Modify/index');?>">上传新内容</a></li>
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/Adjust/index');?>">调整首页</a></li>
                </ul>
            </li>
            <li <?php if(index == 'sorts'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
                <a href="javascript:void(0)"><i class="glyphicon glyphicon-th" aria-hidden="true"></i>分类管理</a>
                <ul class="sub-menu-list">
                    <li class="sub-menu-item"><a href="">排序</a></li>
                    <li class="sub-menu-item"><a href="<?php echo U('Admin/Sorts/index');?>">上首页</a></li>
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
            <li <?php if(index == 'admin'): ?>class="menu-item actived"<?php else: ?>class="menu-item"<?php endif; ?>>
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
            <li class="active">首页</li>
            <li class="active">hello</li>
        </ol>
    <div class="box">
        <div class="heading">
            <h3 class="title">提醒<a href="inbox.html" class="link-right">更多>></a></h3>
        </div>
        <div class="box-inner">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <section class="box-label-block theme">
                        <div class="symbol">
                            <i class="glyphicon glyphicon-stats" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">点击总数</h4>
                            <p><?php echo ($data["all"]); ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <section class="box-label-block cyellow">
                        <div class="symbol">
                            <i class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">昨日最高</h4>
                            <p>10</p>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <section class="box-label-block terques">
                        <div class="symbol">
                            <i class="glyphicon glyphicon-export" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">历史最高</h4>
                            <p><?php echo ($data["max"]); ?></p>
                        </div>
                    </section>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <section class="box-label-block cred">
                        <div class="symbol">
                            <i class="glyphicon glyphicon-sort-by-attributes-alt" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">表现最差</h4>
                            <p><?php echo ($data["min"]); ?></p>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="box-inner">
            <div class="alert alert-success" role="alert">新年大变脸，可能存在bug</div>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>Warning!</strong> 发现错误要提出来哟！
            </div>
            <div class="alert alert-info alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <strong>更新</strong> 管理员可以创建新账号，修改密码，首页轮播图调整
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