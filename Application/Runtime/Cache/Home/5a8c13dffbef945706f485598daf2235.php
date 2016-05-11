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
    <div class="jumbotron jumbotron-zh">
        <h1>详情</h1>

        <p>文章详情文章详情文章详情文章详情文章详情文章详情</p>
    </div>
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="/" class="label label-default">首页</a></li>
            <li><a href="/Blog/list" class="label label-success">文章列表</a></li>
        </ol>
    </div>
    <div id="listView">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">
                    <span class=""><?php echo ($data["title"]); ?></span>
                    <span class="margin-l-20 label label-danger label-zh">作者：<?php echo ($data["nickname"]); ?></span>
                    <span class="margin-l-10 label label-info label-zh"><?php echo ($data["username"]); ?></span>
                    <span class="margin-r-15 label label-default pull-right label-zh" >浏览：<?php echo ($data["click"]); ?></span>
                    <span class="margin-r-15 label label-warning pull-right label-zh">日期：<?php echo (date( "Y-m-d H:i:s",$data["addtime"])); ?></span>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group form-group-sm  margin-b-20">
                    <div id="select_tags" class="col-sm-10">
                        <?php if(is_array($tagList)): $i = 0; $__LIST__ = $tagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagItem): $mod = ($i % 2 );++$i;?><a href="javascript:;" data-tagid="<?php echo ($tagItem["id"]); ?>" class="label margin-r-10 label-default"><?php echo ($tagItem["tagname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
                <div class="panel-body"><?php echo (htmlspecialchars_decode($data["content"])); ?></div>
            </div>
        </div>
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2 class="title h4 mt30 mb20 post-title" id="answers-title">评论区 6条评论</h2>
                </div>

            </div>
            <div id="commentArea" class="panel-body">
                <!--<?php if(is_array($comments)): $i = 0; $__LIST__ = $comments;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <span class="margin-r-15 label label-info label-zh"><?php echo ($item["nickname"]); ?></span>
                                <span class="margin-r-15 label label-primary label-zh"><?php echo ($item["createtime"]); ?></span>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php echo ($item["content"]); ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>-->

                <div class="widget-answers">
                <article class="clearfix widget-answers__item accepted" id="a-1020000000330217">
                    <div class="post-offset">
                        <span class="no" style="">#1</span>
                        <a href="/u/shamiao"><img class="avatar" src="//sfault-avatar.b0.upaiyun.com/270/943/2709439599-1030000000321731_big64" alt=""></a>
                        <strong><a href="/u/shamiao" class="mr5">沙渺</a></strong>
                        <span class="margin-l-10 text-muted">2013年11月04日</span>
                        <div class="answer fmt mt10">
                            nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...nkkkkkkkkkkkkkkkkkkkkk...

                        </div>

                        <div class="post-opt">
                            <ul class="list-inline mb0">
                                <li><a href="javascript:void(0);" class="comments" data-id="1020000000330217" data-target="#comment-1020000000330217"> 评论</a></li>
                            </ul>
                        </div>

                        <div class="widget-comments hidden" id="comment-1020000000330217" data-id="1020000000330217">
                            <div class="widget-comments__form row">
                                <form class="col-md-10 col-xs-12">
                                    <div class="form-group mb0">
                                        <input name="id" type="hidden" value="1020000000330217">
                                        <textarea name="text" class="form-control" id="commentText-1020000000330217" data-id="1020000000330217" placeholder="添加评论"></textarea>
                                    </div>
                                </form>
                                <div class="col-md-2 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block postComment m-mt15" data-id="1020000000330217">提交评论</button>
                                    <div class="mt10"><a href="javascript:void(0);" class="toggle-comment-helper">语法提示</a></div>
                                </div>
                                <div class="col-md-10 col-xs-12 fmt comment-helper" data-rank="0" style="display:none;">
                                    <div class="alert alert-warning mb10 mt10">评论支持部分 Markdown 语法：<code>**bold**</code> <code>_italic_</code> <code>[link](http://example.com)</code> <code>&gt; 引用</code> <code>`code`</code> <code>- 列表</code>。<br>同时，被你 @ 的用户也会收到通知</div>
                                </div>

                            </div><!-- /.widget-comments__form -->
                        </div><!-- /.widget-comments -->


                    </div>
                </article><!-- /article -->


                    <article class="clearfix widget-answers__item accepted" id="a-102000000033021117">
                        <div class="post-offset">
                            <a href="/u/shamiao"><img class="avatar" src="//sfault-avatar.b0.upaiyun.com/270/943/2709439599-1030000000321731_big64" alt=""></a>
                            <strong><a href="/u/shamiao" class="mr5">沙渺</a></strong>
                            <span class="ml10 text-muted">2013年11月04日 回答</span>
                            <div class="answer fmt mt10">
                                nkkkkkkkkkkkkkkkkkkkkk...

                            </div>

                            <div class="post-opt">
                                <ul class="list-inline mb0">
                                    <li><a href="javascript:void(0);" class="comments" data-id="1020000000330217" data-target="#comment-1020000000330217"> 评论</a></li>
                                </ul>
                            </div>

                            <div class="widget-comments hidden" id="comment-10200000001330217" data-id="1020000000330217">
                                <div class="widget-comments__form row">
                                    <form class="col-md-10 col-xs-12">
                                        <div class="form-group mb0">
                                            <input name="id" type="hidden" value="1020000000330217">
                                            <textarea name="text" class="form-control" id="commentText-10200000003130217" data-id="1020000000330217" placeholder="添加评论"></textarea>
                                        </div>
                                    </form>
                                    <div class="col-md-2 col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-sm btn-block postComment m-mt15" data-id="1020000000330217">提交评论</button>

                                    </div>
                                </div><!-- /.widget-comments__form -->
                            </div><!-- /.widget-comments -->


                        </div>
                    </article><!-- /article -->

                <div class="text-center">

                </div>
                </div>

            </div>
        </div>

        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="panel-title">
                    写评论
                </div>
            </div>
            <form action=""  method="post">
                <div class="panel-body">
                    <script id="commentEditor" style="height:200px;" name="content" type="text/plain"></script>
                </div>
                <div class="panel-footer">
                    <input type="button" id="commentBtn" class="btn btn-facebook" value="提交评论">
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

<script>
    $(function(){
        $(".post-opt .comments").on('click',function(){
            //var cid = $(this).prop('data-id');
            var target = $(this).attr('data-target');
            $(target).removeClass('hidden');
        });



        var commentEditor = UE.getEditor("commentEditor",{
            toolbars:[
                ['bold', 'italic', 'underline', 'fontborder','time','date','insertcode','fontfamily','fontsize','paragraph','simpleupload','insertimage','emotion',
                    'spechars','justifyleft','justifyright','justifycenter','justifyjustify'],
                ['strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote',
                    'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
            ],
            autoHeightEnabled: false,
            autoFloatEnabled: true,
            pasteplain:false,
            elementPathEnabled:false,
            maximumWords:500,
            wordCountMsg:"已输入{#count}个字符, 还可以输入{#leave}个字符。",
            wordOverFlowMsg:"<span style=\"color:red;\">够了够了，别把数据库撑坏了！</span>"
        });

        /*commentEditor.addListener('contentChange',function(){
            var len = commentEditor.getContentLength(true);
            if(len>500){
                return false;
            }
        });*/

        $commentBtn = $("#commentBtn");
        $commentBtn.on('click',function(){
            var len = commentEditor.getContentLength(true);
            if(len>500){
                return false;
            }

            var a_id = "<?php echo ($id); ?>",
                p_id = 0,
                content = commentEditor.getContent();
            $.ajax({
                type:"POST",
                url:'/Blog/comment',
                dataType:"JSON",
                data:{
                    aid:a_id,
                    pid:p_id,
                    content:content
                },
                success:function(msg){
                    if(msg.status == -1){
                        if(confirm("您还未登陆，是否去登陆?")){
                            window.location.href = "/Login";
                        }else{
                            return false;
                        }

                        return false;
                    }

                    var comment = msg.content;
                        //var cid = comment.id;
                        //var aid = comment.article_id;
                        //var uid = comment.u_id;
                        var nickname = comment.nickname;
                        var content = comment.content;
                        //var time = comment.addtime;
                        var createtime = comment.createtime;

                    var html = "<div class=\"panel panel-danger\">" +
                                    "<div class=\"panel-heading\">" +
                            "<div class=\"panel-title\">"+
                    "<span class=\"margin-r-15 label label-info label-zh\">"+nickname+"</span>"+
                    "<span class=\"margin-r-15 label label-primary label-zh\">"+createtime+"</span>"+
                            "</div>"+
                    "</div>"+
                    "<div class=\"panel-body\">"+
                            content +
                            "</div>" +
                    "</div>";

                    //$("#commentArea").append(html); //从后面插入
                    $("#commentArea").first().prepend(html);//从前面插入
                    commentEditor.setContent("");
                },

                error:function(){
                    alert("服务器故障");
                }

            });

        })
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