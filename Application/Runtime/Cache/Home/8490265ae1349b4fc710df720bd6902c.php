<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="/thinkphp/Public/assets/css/amazeui.css">
    <script src="/thinkphp/Public/assets/js/jquery-2.2.3.min.js"></script>
    <script src="/thinkphp/Public/assets/js/amazeui.min.js"></script>
    <script type="text/javascript">
        function list(id){ //user函数名 一定要和action中的第三个参数一致上面有
            var id = id;
            $.get('Test/test', {'p':id}, function(data){ //用get方法发送信息到UserAction中的user方法
                $("#list").replaceWith("<div id='list'>"+data+"</div>"); //一定要和tpl中的一致
            });
        }
    </script>
    <style type="text/css">
        .page a{
            position: relative;
            /*display: block;*/
            padding: .5em 1em;
            text-decoration: none;
            line-height: 1.2;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 0;
            margin-bottom: 5px;
            margin-right: 5px;
        }
        .page span{
            padding: .5em 1em;
            z-index: 2;
            color: #fff;
            background-color: #0e90d2;
            border-color: #0e90d2;
            cursor: default;
        }
    </style>
</head>
<body>
<div>
    <nav data-am-widget="menu" class="am-menu  am-menu-offcanvas1"



         data-am-menu-offcanvas
    >
        <a href="javascript: void(0)" class="am-menu-toggle">
            <i class="am-menu-toggle-icon am-icon-bars"></i>
        </a>

        <div class="am-offcanvas" >
            <div class="am-offcanvas-bar">

                <ul class="am-menu-nav am-avg-sm-1">
                    <li class="am-parent">
                        <a href="##" class="" >公司</a>
                        <ul class="am-menu-sub am-collapse  am-avg-sm-2 ">
                            <li class="">
                                <a href="##" class="" >公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >人物</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >趋势</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >投融资</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业人物</a>
                            </li>
                            <li class="am-menu-nav-channel"><a href="##" class="" title="公司">进入栏目 &raquo;</a></li>
                        </ul>
                    </li>
                    <li class="am-parent">
                        <a href="##" class="" >人物</a>
                        <ul class="am-menu-sub am-collapse  am-avg-sm-3 ">
                            <li class="">
                                <a href="##" class="" >公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >人物</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >趋势</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >投融资</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业人物</a>
                            </li>
                        </ul>
                    </li>
                    <li class="am-parent">
                        <a href="#c3" class="" >趋势</a>
                        <ul class="am-menu-sub am-collapse  am-avg-sm-4 ">
                            <li class="">
                                <a href="##" class="" >公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >人物</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >趋势</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >投融资</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业人物</a>
                            </li>
                            <li class="am-menu-nav-channel"><a href="#c3" class="" title="趋势">泥煤 &raquo;</a></li>
                        </ul>
                    </li>
                    <li class="am-parent">
                        <a href="##" class="" >投融资</a>
                        <ul class="am-menu-sub am-collapse  am-avg-sm-3 ">
                            <li class="">
                                <a href="##" class="" >公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >人物</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >趋势</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >投融资</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业公司</a>
                            </li>
                            <li class="">
                                <a href="##" class="" >创业人物</a>
                            </li>
                        </ul>
                    </li>
                    <li class="">
                        <a href="##" class="" >创业公司</a>
                    </li>
                    <li class="">
                        <a href="##" class="" >创业人物</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>


<div id="list"> <!--这里的list和下面js中的要一致-->

    <table  class="am-table am-table-striped am-table-hover am-text-nowrap am-scrollable-horizontal">
        <thead>
        <td>名字</td>
        <td>副标题</td>
        <td>链接</td>
        <td>图片链接</td>
        <td>分类序号</td>
        <td>操作</td>
        </thead>

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($list["name"]); ?></td>
                <td><?php echo ($list["briefing"]); ?></td>
                <td><?php echo ($list["aurl"]); ?></td>
                <td><?php echo ($list["imgurl"]); ?></td>
                <td><?php echo ($list["flag"]); ?></td>
                <td><a class="modify-header" id="<?php echo ($list["id"]); ?>" href="javascript:void(0);">修改</a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    </table>
    <ul data-am-widget="pagination" class="am-pagination am-pagination-default page">
                <?php echo ($page); ?>
          <!--分页输出-->
    </ul>

</div>

</body>
</html>