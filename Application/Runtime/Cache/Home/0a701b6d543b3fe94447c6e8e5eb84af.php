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



    <div class="container">
    <div class="jumbotron jumbotron-zh">
        <h1>相册</h1>

        <p>相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册相册</p>
        <a href="#" id="newAlbum" class="btn btn-flat btn-info" data-toggle="modal" data-target=".bs-example-modal-lg">新建相册</a>
    </div>
    <!--<div class="page-header page-header-zh">
        <ol class="breadcrumb margin-b-10">
            <li><a href="/" class="label label-default">首页</a></li>
            <li><a href="/Photo" class="label label-primary">相册</a></li>
            <li><a href="/Photo/show" class="label label-success">图片</a></li>
        </ol>
    </div>-->
    <div id="albumModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">新建相册</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>相册名称</label>
                        <input type="text" class="form-control" id="albumName" placeholder="给相册取个名字">
                    </div>
                    <div class="form-group">
                        <label>描述</label>
                        <textarea class="form-control" id="albumDesc" placeholder="描述一下你的相册"></textarea>
                    </div>
                    <div id="albumType" class="form-group">
                        <label>分类</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" id="submitModal" class="btn btn-primary">确定</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container bg-album">
    <div id="albumList" class="row margin-t-20">
        <!--<div class="col-xs-6 col-md-3 col-lg-4">
            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title text-info">相片名称1</h3>
                    <div class="box-tools pull-right">
                        <a href="javascript:;" class="label bg-aqua">点个赞</a>
                    </div>
                </div>
                <div class="box-body">
                    <img class="show-img" src="/uploads/image/demo/1.jpg">
                </div>&lt;!&ndash; /.box-body &ndash;&gt;
                <div class="box-footer">
                    <span class="text-warning">985+656</span>
                </div>
            </div>
        </div>-->


    </div>
</div>
<script src="/Public/plugins/lazyload/lazyload.js"></script>
<script>
    $(function(){
        var $albumList = $("#albumList");
        initAlbumList();
        //初始化相册列表
        function initAlbumList(){
            $.getJSON('/Photo/getAlbumList',{},function(result){
                for(var i in result){
                    var $outerDiv = $('<div class="col-xs-6 col-md-3 col-lg-4">'),
                            $box = $('<div class="box box-info">'),
                            $boxHeader = $('<div class="box-header">'),
                            $boxTitle = $('<h3 class="box-title text-info"></h3>'),
                            $boxTools = $('<div class="box-tools pull-right">'),
                            $label = $('<a href="javascript:;" class="label bg-aqua">点个赞</a>'),
                            $boxBody = $('<div class="box-body">'),
                            $img = $('<img src="/Public/plugins/lazyload/images/grey.gif" class="show-img lazy">'),
                            $boxFooter = $('<div class="box-footer box-footer-zh">'),
                            $desc = $('<span class="text-warning"></span>'),
                            $a = $("<a></a>");

                    $img.attr('original',result[i]['cover']);
                    $boxBody.append($img);
                    $boxTitle.html(result[i]['name']);
                    $boxTools.append($label);
                    $boxHeader.append($boxTitle);
                    $boxHeader.append($boxTools);
                    $desc.html(result[i]['desc']);
                    $boxFooter.append($desc);
                    $box.append($boxHeader);
                    $box.append($boxBody);
                    $box.append($boxFooter);
                    $outerDiv.append($box);
                    $a.html($outerDiv);
                    $a.attr("href","/Photo/show/id/"+result[i]['id']);
                    $albumList.append($a);
                }
                $("img.lazy").lazyload({effect: "fadeIn"});
                //console.log(result);
            });
        }

        //动态增加相册下拉框
        var $newAlbum = $("#newAlbum"),
                $albumModal = $("#albumModal");
        $newAlbum.on('click',function(){
            var $albumType = $("#albumType"),
                    $select = $("<select class='form-control'></select>");
            if($albumType.find('option').length > 0) return;
            $.getJSON("/Photo/getAlbumType",{},function(json){
                $select.html("");
                for(var i in json){
                    //console.log(new Date().getDate(),i);
                    $select.append("<option value='" + json[i]['id'] + "'>" + json[i]['name'] + "</option>");
                }
                $albumType.append($select);
            });
        });

        var $submitModal = $("#submitModal");
        $submitModal.on('click',function(){
            var albumName = $("#albumName").val(),
                    albumDesc = $("#albumDesc").val(),
                    albumType = $("#albumType select").val(),
                    params = {name:albumName,type_id:albumType,desc:albumDesc},
                    url = "/Photo/newAlbum";
            $.post(url,params,function(result){
                //新建成功处理
                if(typeof result == 'object' && result !== null && result.status === 0){
                    //关闭模态框，加载新增相册
                    $albumModal.modal('hide');
                    var $outerDiv = $('<div class="col-xs-6 col-md-3 col-lg-4">'),
                            $box = $('<div class="box box-info">'),
                            $boxHeader = $('<div class="box-header">'),
                            $boxTitle = $('<h3 class="box-title text-info"></h3>'),
                            $boxTools = $('<div class="box-tools pull-right">'),
                            $label = $('<a href="javascript:;" class="label bg-aqua">点个赞</a>'),
                            $boxBody = $('<div class="box-body">'),
                            $img = $('<img class="show-img">'),
                            $boxFooter = $('<div class="box-footer box-footer-zh">'),
                            $desc = $('<span class="text-warning"></span>'),
                            $a = $("<a></a>");

                    $img.attr('src',result.content['cover']);
                    $boxBody.append($img);
                    $boxTitle.html(result.content['name']);
                    $boxTools.append($label);
                    $boxHeader.append($boxTitle);
                    $boxHeader.append($boxTools);
                    $desc.html(result.content['desc']);
                    $boxFooter.append($desc);
                    $box.append($boxHeader);
                    $box.append($boxBody);
                    $box.append($boxFooter);
                    $outerDiv.append($box);
                    $outerDiv.fadeIn(1000);
                    $a.html($outerDiv);
                    $a.attr("href","/Photo/show/id/"+result.content['id']);
                    $albumList.append($a);

                    albumName.val("");
                    albumDesc.val("");
                }else{
                    //alert('1111');
                }
            });
        });



    });


</script>

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