<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>个人中心</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- bootstrap 3.0.2 -->
    <link href="/Public/plugins/adminLTE/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- font Awesome -->
    <link href="/Public/plugins/adminLTE/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Ionicons -->
    <link href="/Public/plugins/adminLTE/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/Public/plugins/adminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/plugins/adminLTE/css/iCheck/all.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="/Public/styles/page.css">
    <link rel="stylesheet" href="/Public/styles/main.css">
    <!-- jQuery 1.11.1 -->
    <script src="/Public/js/jquery-1.11.1.js"></script>
    <script src="/Public/plugins/bootstrap-3.3.4/js/bootstrap.min.js"></script>
    <script src="/Public/plugins/ueditor/ueditor.config.js"></script>
    <script src="/Public/plugins/ueditor/ueditor.all.js"></script>
    <script src="/Public/plugins/webuploader/webuploader.js"></script>
    <link href="/Public/plugins/webuploader/webuploader.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
<a href="/" class="logo">
    <!-- Add the class icon to your logo image or logo icon to add the margining -->
    MC'Blog
</a>
<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
<!-- Sidebar toggle button-->
<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</a>

<div class="navbar-right">
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-envelope"></i>
        <span class="label label-success">4</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 4 messages</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- start message -->
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                        </div>
                        <h4>
                            Support Team
                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <!-- end message -->
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            AdminLTE Design Team
                            <small><i class="fa fa-clock-o"></i> 2 hours</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Developers
                            <small><i class="fa fa-clock-o"></i> Today</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Sales Department
                            <small><i class="fa fa-clock-o"></i> Yesterday</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="pull-left">
                            <img src="img/avatar.png" class="img-circle" alt="user image"/>
                        </div>
                        <h4>
                            Reviewers
                            <small><i class="fa fa-clock-o"></i> 2 days</small>
                        </h4>
                        <p>Why not buy a new awesome theme?</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">See All Messages</a></li>
    </ul>
</li>
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-warning"></i>
        <span class="label label-warning">10</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 10 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-people info"></i> 5 new members joined today
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-warning danger"></i> Very long description here that may not fit into the page and may cause design problems
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users warning"></i> 5 new members joined
                    </a>
                </li>

                <li>
                    <a href="#">
                        <i class="ion ion-ios7-cart success"></i> 25 sales made
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="ion ion-ios7-person danger"></i> You changed your username
                    </a>
                </li>
            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>
<!-- Tasks: style can be found in dropdown.less -->
<li class="dropdown tasks-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-tasks"></i>
        <span class="label label-danger">9</span>
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have 9 tasks</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Design some buttons
                            <small class="pull-right">20%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">20% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Create a nice theme
                            <small class="pull-right">40%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">40% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Some task I need to do
                            <small class="pull-right">60%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
                <li><!-- Task item -->
                    <a href="#">
                        <h3>
                            Make beautiful transitions
                            <small class="pull-right">80%</small>
                        </h3>
                        <div class="progress xs">
                            <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </a>
                </li>
                <!-- end task item -->
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all tasks</a>
        </li>
    </ul>
</li>
<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="glyphicon glyphicon-user"></i>
        <span><?php echo ($userInfo['nickname']); ?><i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img src="<?php echo ($userInfo['headimg']); ?>" class="img-circle" alt="User Image"/>
            <p>
                Jane Doe - Web Developer
                <small>Member since Nov. 2012</small>
            </p>
        </li>
        <!-- Menu Body -->
        <li class="user-body">
            <div class="col-xs-4 text-center">
                <a href="#">Followers</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Sales</a>
            </div>
            <div class="col-xs-4 text-center">
                <a href="#">Friends</a>
            </div>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="/User/logout" class="btn btn-default btn-flat">退出</a>
            </div>
        </li>
    </ul>
</li>
</ul>
</div>
</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo ($userInfo["headimg"]); ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Hello,<?php echo ($userInfo["nickname"]); ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i>
                    <span>个人信息维护</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-angle-double-right"></i>修改密码</a></li>
                    <li><a href="/User/profile"><i class="fa fa-angle-double-right"></i>完善个人资料</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>文章管理</span>
                    <small class="badge bg-green">new</small>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/a/blog/list"><i class="fa fa-angle-double-right"></i>文章列表</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart-o"></i>
                    <span>照片管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i>Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>消息管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
                    <li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
                    <li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
                    <li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
                    <li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
                    <li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
                    <li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a></li>
                    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a></li>
                    <li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
                    <li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
                    <li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <div class="theme-showcase" style="width: 80%;margin: 10px;" role="main">
    <div class="panel" style="padding: 20px;">
        <div class="form-group form-group-sm" style="height: 40px;line-height: 40px;">
            <label class="col-sm-1 control-label">标题</label>
            <div class="col-sm-10">
                <input type="text" id="title" class="form-control">
            </div>
        </div>
        <div class="form-group form-group-sm" style="height: 40px;line-height: 40px;">
            <label class="col-sm-1 control-label">标签</label>
            <div id="select_tags" class="col-sm-10">
                <?php if(is_array($tagList)): $i = 0; $__LIST__ = $tagList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tagItem): $mod = ($i % 2 );++$i;?><a href="javascript:;" data-tagid="<?php echo ($tagItem["id"]); ?>" class="label margin-r-10 label-default"><?php echo ($tagItem["tagname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                <span class="label margin-r-10 label-info">新标签</span>
                <input type="hidden" name="tags" value="">
            </div>
        </div>
        <div class="form-group form-group-sm margin-t-15" style="min-height: 30px;">
            <label class="col-sm-1 control-label">配图</label>

            <div class="col-sm-11">
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                </div>
            </div>
        </div>
        <div class="form-group form-group-sm margin-t-15">
            <label class="col-sm-1 control-label">内容</label>
            <div style="clear: both;"></div>
        </div>
        <div style="margin-bottom: 30px;">
            <script id="ueditor" style="height:500px;width:1200px;" name="content"></script>
            <input type="hidden" id="imgurl" value="">
            <textarea id="desc" style="display: none;" name="desc"></textarea>
            <div class="col-md-12" style="width: 1200px;"><input type="button" id="add" class="center-block btn btn-info" value="提交"></div>
        </div>

    </div>
</div>
<script>
    $(function(){
        var uploader = WebUploader.create({
            // 选完文件后，是否自动上传。
            auto        :true,
            // swf文件路径
            swf         :'/Public/plugins/webuploader/Uploader.swf',
            // 文件接收服务端。
            server      :'/uploader/upload',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick        :'#filePicker',
            fileNumLimit:1,
            compress :false,
            // 只允许选择图片文件。
            accept      :{
                title     :'Images',
                extensions:'gif,jpg,jpeg,bmp,png',
                mimeTypes :'image/*'
            }
        });

        // 当有文件添加进来的时候
        uploader.on('fileQueued',function(file){
            var $li = $(
                            '<div id="' + file.id + '" class="file-item thumbnail1">' +
                            '<img>' +
                            '</div>'
                    ),
                    $img = $li.find('img');
            // $list为容器jQuery实例
            $("#fileList").append($li);
            $("#filePicker").remove();
            // 创建缩略图
            // 如果为非图片文件，可以不用调用此方法。
            // thumbnailWidth x thumbnailHeight 为 100 x 100
            uploader.makeThumb(file,function(error,src){
                if(error){
                    $img.replaceWith('<span>不能预览</span>');
                    return;
                }
                $img.attr('src',src);
            },200,200);
        });
        // 文件上传成功，给item添加成功class, 用样式标记上传成功。
        uploader.on('uploadSuccess',function(file,e){
            var object = JSON.parse(e._raw);
            var imgUrl = object.imgUrl;
            $("#imgurl").val(imgUrl);
            $("#imgDiv").remove();
        });
    });

    $(function(){
        var $tags = $("#select_tags");
        var $tagsA = $tags.find('a');
        var $tagsInput = $tags.find('input[name=tags]');
        var selected = new Array();
        $tagsA.on('click',function(){
            var tagid = $(this).attr('data-tagid'),
                    isSelected = $(this).hasClass('label-default'),
                    $self = $(this);
            if(isSelected){
                $self.removeClass('label-default').addClass('label-danger');
                selected.push(tagid);
            }else{
                $self.removeClass('label-danger').addClass('label-default');
                //selected.remove(tagid);
                var index = $.inArray(tagid,selected);
                if(index > -1) selected.splice(index,1);
            }
            $tagsInput.val(selected.join(','));
        });
    });


    $(function(){
        var ue = UE.getEditor('ueditor',{
            initialFrameWidth:1200,
            elementPathEnabled:false
        });

        $("#add").on('click',function(){
            var title = $.trim($("#title").val());
            if(title == ""){
                notice("标题不能为空");
                return false;
            }


            var desc = UE.getEditor('ueditor').getContentTxt();
            if(desc === ""){
                notice('内容不能为空');
                return false;
            }

            var tags = $("input[name=tags]").val(),
                img = $("#imgurl").val();
            $.post("/a/blog/add",{
                tags : tags,
                img:img,
                desc :desc,
                title :title,
                img:$("#imgurl").val(),
                content:UE.getEditor('ueditor').getContent()
            },function(data){
                if(data.status == 0){
                    notice("添加成功",true,'/a/blog/update/'+data.insertedId);
                }
            },"JSON");

            return false;
        });
    });

</script>
    </aside>
</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="notice" data-refresh="false" data-jump="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">
                    提示信息
                </h4>
            </div>
            <div class="modal-body" style="padding: 0">
                <h3 style="text-align: center">保存成功</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div> <!-- /.modal -->

<script type="text/javascript" src="/Public/js/notice.js"></script>
</body>
</html>