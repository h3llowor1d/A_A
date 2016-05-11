<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh_CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <meta property="wb:webmaster" content="fb39ba8d682ff652" />
    <meta property="qc:admins" content="6536407651601763452753527401247410572" />
    <link rel="icon" href="/uploads/image/zh_32X32.ico">

    <title>PHP技术积累</title>

    <link href="/Public/plugins/webuploader/webuploader.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="/Public/plugins/bootstrap-3.3.4/css/bootstrap.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="/Public/plugins/bootstrap-3.3.4/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/Public/plugins/slippry/css/slippry.css" rel="stylesheet">
    <link href="/Public/plugins/jNotify/jNotify.jquery.css" rel="stylesheet">
    <link href="/Public/styles/sticky-footer.css" rel="stylesheet">
    <link href="/Public/styles/main.css" rel="stylesheet">
    <link href="/Public/styles/photo.css" rel="stylesheet">
    <link href="/Public/styles/AdminLTE.css" rel="stylesheet">
    <link href="/Public/plugins/adminLTE/css/font-awesome.css" rel="stylesheet">
    <link href="/Public/styles/page.css" rel="stylesheet">
    <link href="/Public/styles/jquery-ui/jquery-ui.css" rel="stylesheet">
    <link href="/Public/plugins/magic-master/magic.css" rel="stylesheet">


    <!-- Custom styles for this template -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- JavaScript ================================================== -->
    <script src="/Public/js/jquery-1.11.1.js"></script>
    <script src="/Public/plugins/bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script src="/Public/plugins/ueditor/ueditor.config.js"></script>
    <script src="/Public/plugins/ueditor/ueditor.all.js"></script>
    <script src="/Public/plugins/jNotify/jNotify.jquery.js"></script>
</head>

<body role="document" class="bg-zh">
<header class="header">
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand <?php if($page["controller"] == 'Index'): ?>active<?php endif; ?>" href="/">MC'Blog</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-left navbar-nav">
                    <!--<li <?php if($page["controller"] == 'Index'): ?>class="active"<?php endif; ?>><a href="/">主页</a></li>-->
                    <li class="dropdown">
                        <a href="/Blog" class="dropdown-toggle <?php if($page["controller"] == 'Blog'): ?>active<?php endif; ?> " data-toggle="dropdown" role="button" aria-expanded="false">博客<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/Blog">写一篇</a></li>
                            <li><a href="/Blog/list">热门</a></li>
                            <li class="divider"></li>
                            <li><a href="/Blog/php">PHP</a></li>
                            <li><a href="/Blog/mysql">MYSQL</a></li>
                            <li><a href="/Blog/linux">LINUX</a></li>
                            <li><a href="/Blog/js">JAVASCRIPT</a></li>
                            <!--
                            <li class="dropdown-header">Nav header</li>
                            <li><a href="#">Separated link</a></li>
                            <li><a href="#">One more separated link</a></li>-->
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="/Photo" class="dropdown-toggle <?php if($page["controller"] == 'Photo'): ?>active<?php endif; ?> " data-toggle="dropdown" role="button" aria-expanded="false">照片<span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/Photo">图片首页</a></li>
                            <li><a href="/Photo/album">相册</a></li>
                            <li><a href="/Photo/post">上传照片</a></li>
                            <li><a href="/Photo/wall">照片墙</a></li>
                        </ul>
                    </li>
                    <li><a href="/Chat" class="<?php if(($page["controller"] == 'Chat') AND ($page["action"] == 'index')): ?>active<?php endif; ?>">聊天室</a></li>
                    <li><a href="/Bookmark" class="<?php if(($page["controller"] == 'Bookmark') AND ($page["action"] == 'index')): ?>active<?php endif; ?>">实用书签</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <div class="headline text-center" id="time">

                    </div>
                    <?php if(($userinfo["nickname"] != '') AND ($userinfo["uid"] != '') ): ?><li class="avatar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" ><img src="<?php echo ($userinfo["avatar"]); ?>" ></a>

                            <div class="dropdown-menu" role="menu">
                                <dl>
                                    <dd><a href="#">个人中心</a></dd>
                                    <dd><a href="#">写几句</a></dd>
                                    <dd><a href="/User/logout">退出</a></dd>
                                </dl>
                            </div>
                        </li>

                        <?php else: ?>
                        <li><div class="label label-warning" style="display: inline;line-height: 48px ">您还未登录</div></li>
                        <li><a href="/User/register" class="nav-right <?php if(($page["controller"] == 'User') AND ($page["action"] == 'register')): ?>active<?php endif; ?>">注册</a></li>
                        <li><a href="/User/login" class="nav-right <?php if(($page["controller"] == 'User') AND ($page["action"] == 'login')): ?>active<?php endif; ?>">登录</a></li><?php endif; ?>

                </ul>
            </div>

        </div>
    </nav>

</header>
<script>
    /*$("a.dropdown-toggle").on("mouseenter", function() {
        if ($('.avatar').is(".open")) {
            return ;
        }

        $('.avatar .dropdown-menu').dropdown("toggle")
    })*/
</script>



    <div class="container theme-showcase" role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron jumbotron-zh index-header-bg">
        <h1 style="padding-left:60px;">zhanhao</h1>

    </div>
    <style>
        .main-zh{
            width:1330px ;
            padding: 10px;
        }

        .main-zh .left{
            padding: 10px;
            float: left;
            width: 69%;
            border-radius: 5px;
            background: #FFFFFF;
        }

        .main-zh .right{
            float: right;
            width: 30%;
        }

        .search{
            padding: 5px;
        }

        .main-zh .left .panel{
            height: 100%;
        }

        .artical-list{
            -webkit-padding-start:10px;
        }
        .artical-list .description{
            float: left;
            width:86%;
            height: 100%;
        }

        .artical-list li{
            height: 180px;
            margin-bottom: 10px;
        }
        .artical-list .author{
            float: right;
            width: 14%;
            height: 100%;
            text-align: center;
        }

        .author .avatar > a{
            text-decoration: none;
            font-family: "Consolas", monospace;
            font-size: 14px;
            line-height: 20px;
        }

        .author .avatar > img{
            width: 70px;
            height: auto;
        }
        .author .timestamp{
            text-align: left;
        }
        .author .timestamp span{
            height: 26px;
            white-space: nowrap;
            overflow: hidden;
            display: block;
            margin-top: 10px;
            margin-left: 10px;
            color: #807D7C;
            font-family: "Consolas", monospace;
            font-size: 14px;
            line-height: 26px;
            border-radius: 5px;
            background: #D7ECCE;
        }

        .author .timestamp span:first-child{
            text-align: center;
        }


        .content{
            height: 140px;
            overflow: hidden;
            float: left;
            width: 82%;
        }
        .panel-img{
            float:right;
            width:18%;
            height: 136px;
            overflow: hidden;
        }

        .panel-img img{
            width: 136px;
            height: auto;
        }

        a.a-title{
            cursor:pointer;
            text-decoration: none;
            color: #2197B2;
            font-weight: bold;
            font-size: 14px;
            font-family: "Consolas", monospace;
        }

        a.a-title:hover,a.a-title:active{
            color: #3EA456;
        }

        #searchTips dl{
            display: block;
            padding: 5px;
            background: darkgray;
            margin: -10px 10px 0 10px;
            border: solid 1px #fff;
            border-top: 0;
        }

    </style>

    <div class="main-zh">
        <div class="right">
            <div class="box box-success">
                <div class="box-header">
                    <i class="fa fa-warning"></i>
                    <h3 class="box-title">搜</h3>
                </div>
                <div class="box-body">
                    <form action="/search" method="get">
                        <div class="input-group input-group-sm search">
                            <input type="text"  class="form-control" name="keywords" placeholder="搜一搜">
                    <span class="input-group-btn">
                        <input class="btn btn-info btn-flat" type="submit" value="Go!" />
                    </span>
                        </div>
                    </form>
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" role="button" style="display: none">999</a>
                    <div id="searchTips" class="dropdown-menu" role="menu">
                        <dl>
                        </dl>
                    </div>
                </div>
            </div>
            <div class="box box-info">
                <div class="box-header">
                    <i class="fa fa-warning"></i>
                    <h3 class="box-title">Alerts</h3>
                </div>
                <div class="box-body">
                    <div class="alert alert-danger alert-dismissable">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Alert!</b> Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy with my whole heart.
                    </div>
                </div>
            </div>
        </div>


        <script>
            var S = {
                keywords:$("input[name='keywords']"),
                getTips:function(url,keywords){
                    $.getJSON(
                        url+'?keywords='+keywords,
                        function(data){
                            $("#searchTips dl").html("");
                            var html = "";
                            for(var i in data){
                                //<a href="#">个人中心</a>
                                html += "<dd><a href='#'>"+data[i]+"</a></dd>";
                            }
                            $("#searchTips dl").html(html);
                            $('#searchTips').dropdown();
                        }
                    );
                },
                showResult:function(data){},
                init:function(){
                    S.keywords.on('keyup change',function(){
                        var kw = $.trim(S.keywords.val());
                        if(kw == "") return;
                        S.getTips("/Search/ajaxTips",kw);
                    });
                }
            };
            S.init();
        </script>

        <div class="left">
            <ul class="artical-list">
                <?php if(is_array($aList)): $i = 0; $__LIST__ = $aList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><li class="">
                        <div class="description">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="panel-title"><a href="/read/<?php echo ($item["id"]); ?>" class="a-title"><?php echo ($item["title"]); ?></a></div>
                                </div>
                                <div class="panel-body content"><?php echo ($item["desc"]); ?></div>
                                <div class="panel-img"><img src="<?php echo ($item['img']); ?>"></div>
                            </div>
                        </div>
                        <div class="author">
                            <div class="avatar"><a href="#" title="mike"><img src="/uploads/image/avatar.jpg"></a></div>
                            <div class="timestamp">
                                <span><<?php echo ($item["nickname"]); ?>></span>
                                <span>&nbsp;浏览：<?php echo ($item["click"]); ?>111</span>
                                <span>&nbsp;评论：<?php echo ($item["comment"]); ?></span>
                            </div>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>

        </div>
    </div>

</div>



<div style="height: 20px;"></div>
<footer id="footer" class="footer navbar-inverse">
    <div class="container">
        <p class="text-muted">
            <span class="margin-r-15">Copyright @2015 Zhanhao.club </span>
            <span class="margin-r-15">Based on ThinkPHP3.2.3</span>
            <span class="margin-r-15">Bootstrap3.3.4</span>
            <span class="margin-r-15">Ueditor1.4.3</span>
            <span class="margin-r-15">jQuery1.11.1</span>
            <span class="margin-r-15 pull-right" style="color:#EEEEEE">当前在线：<?php echo ($onlineCount['allCount']); ?></span>
        </p>
    </div>
</footer>

<script>
    $(function(){
        startTime();
        $("#time").css("float","left").css('color',"wheat").css("font-size","30px").css("line-height","52px").css('margin-right',"20px");
    })

    function startTime()
    {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        var $time = $('#time');
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);

        //Check for PM and AM
        var day_or_night = (h > 11) ? "PM" : "AM";

        //Convert to 12 hours system
        if (h > 12)
            h -= 12;

        //Add time to the headline and update every 500 milliseconds
        $time.html(h + ":" + m + ":" + s + " " + day_or_night);
        setTimeout(function() {
            startTime()
        }, 500);
    }

    function checkTime(i)
    {
        if (i < 10)
        {
            i = "0" + i;
        }
        return i;
    }
</script>
</body>
</html>