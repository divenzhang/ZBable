<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
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
    <script src="/thinkphp/Public/assets/jquery/jquery-2.2.3.min.js"></script>
    <script src="/thinkphp/Public/assets/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <span class="navbar-sidebar-toggle" data-toggle="tooltip" data-placement="right" title="" data-original-title="菜单栏收缩或展开"><i class="fa fa-bars" aria-hidden="true"></i></span>
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
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/Wechat/Index/dologin">登录</a></li>
                    <li role="presentation"><a role="menuitem" tabindex="-1" href="/thinkphp/index.php/Admin/Login/logout.html">退出登录</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
</body>
</html>