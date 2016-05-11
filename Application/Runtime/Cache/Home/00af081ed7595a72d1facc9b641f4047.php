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



    

<div class="container jumbotron-zh">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <div class="panel-title">聊天室(<span id="userNum" style="font-size: 12px;padding: 0 5px;color:lightsteelblue;  "></span>)
                <?php if($userInfo["id"] == 0): ?><span class="pull-right" style="">你是 <?php echo ($userInfo["nickname"]); ?></span><?php endif; ?>
            </div>

        </div>
        <div id="chatDiv" class="panel-body" style="min-height: 400px">
            <?php if(is_array($unread)): $i = 0; $__LIST__ = $unread;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="msgList">
                    <?php echo ($item["nickname"]); ?>:<?php echo ($item["message"]); ?> --<?php echo (date("Y-m-d H:i:s",$item["addtime"])); ?>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

        </div>
        <div class="panel-footer">
            <div class="form-group">
                <input type="hidden" id="from_uid" value="1">
                <?php if(!empty($userList)): ?><select id="to_uid" class="form-control">
                        <option value="-1">发送给所有人</option>
                        <?php if(is_array($userList)): $i = 0; $__LIST__ = $userList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["nickname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select><?php endif; ?>
                <textarea id="content" class="form-control"></textarea>
                <div class="msg-send">
                    <a href="javascript:;" id="send" class="btn btn-info pull-right">发送</a>
                </div>

            </div>

        </div>
    </div>
</div>
<script src="/Public/js/base64.js"></script>
<script type="text/javascript">
    $(function(){
        var Chat = {
            userId:"<?php echo ($userInfo["id"]); ?>",
            headImg:"<?php echo ($userInfo["headimg"]); ?>",
            message:"",
            encode:function(text){
                var b = new Base64();
                return b.encode(text);
            },
            userName:"<?php echo ($userInfo["nickname"]); ?>"
        };

        //var message = "";
        var wsServer = 'ws://127.0.0.1:8001';
        connect();

        function connect(){
            try{
                window.isConnect = false;
                window.ws = new WebSocket(wsServer);
                ws.onopen = function (evt) { onOpen(evt) };
                ws.onclose = function (evt) { onClose(evt) };
                ws.onmessage = function (evt) { onMessage(evt) };
                ws.onerror = function (evt) { onError(evt) };
            }catch (Error) {
                alert(Error);
            }
        }


        function onOpen(evt) {
            console.log("连接服务器成功");
            window.isConnect = true;
            if(Chat.userId){
                sendUid();
            }
        }
        function onClose(evt) {
            ws.close();
        }

        var i = 0;
        function onMessage(evt) {

            console.log(i++,evt);
            //var data1= decodeDataFrame(evt);
            var data = JSON.parse(evt.data);
            switch (data.type) {
                case 'msg':
                    addMsg(data.content,"other");
                        console.log(data.content);
                    break;
                case 'num' :
                    updataUserNum(data.content);
                    break;
                case 'notice':
                    addMsg(Chat.message,"self");
                    Chat.message = "";
                    break;
                case 'system':
                    addMsg(data.content,"system");
                    break;
            }

            console.log('Retrieved data from server: ' + evt.data);
        }
        function onError(evt) {
            window.isConnect = false;
            $("#userNum").html("服务器未连接");

            //console.log('Error occured: ' + evt);
        }
        function sendMsg() {
            var b = new Base64();
            if(isConnect){
                Chat.message = $('#content').val();
                var now = new Date().getTime();
                var user = $("#to_uid").val();
                if(user == undefined) user = 0;
                /*if(user == "-1" && Chat.userId){
                    var userArr = [];
                    $("#to_uid option").each(function(){
                        if($(this).val() != "-1")
                            userArr.push($(this).val());
                    });
                    user = userArr.join(",");
                }else{
                    user = 0;
                }*/
                var content = '{"type":"msg","time":'+now+',"content":"'+ b.encode(Chat.message) +'","uid":"'+user+'","username":"'+Chat.userName+'"}';
                //console.log(content);
                ws.send(content);
                $('#content').val("");
            }
        }

        function sendUid(){
            var content = '{"type":"newUser","uid":"'+Chat.userId+'"}';
            ws.send(content);
            console.log("senduid:"+content);
        }

        function addMsg(data,type) {
            var text = "";
            var b = new Base64();
            switch (type){
                case "self":
                    text = "（我）:" + data;
                    break;
                case "other":
                    text = data.username +":"+ b.decode(data.text);
                    break;
                case "system":
                    text = data.username + ":" +data.text;
                    break;
            }
            $("#chatDiv").append(text+"<br>");
        }

        function updataUserNum(msg) {
            $('#userNum').html(msg);
        }

        $("#send").on('click',function(){
            sendMsg();
        });

    })
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