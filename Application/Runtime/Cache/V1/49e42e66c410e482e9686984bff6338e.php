<?php if (!defined('THINK_PATH')) exit();?><div class="container theme-showcase" role="main">

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