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
        
<div class="form-box" id="login-box">
    <div class="header bg-home">会员注册</div>
    <form action="/User/register" method="post" onsubmit="return check();" name="register">

        <div class="body bg-gray">
            <div class="form-group">
                <div class="l1">邮箱：</div><div class="l2"><input type="text" name="email" id="email" class="form-control" placeholder="email"></div>
            </div>
            <div class="form-group">
                <div class="l1">昵称：</div><div class="l2"><input type="text" name="nickname" class="form-control" placeholder="昵称"></div>
            </div>

            <div class="form-group">
                <div class="l1">密码：</div><div class="l2"><input type="password" name="password" class="form-control" placeholder="密码"></div>
            </div>
            <div class="form-group">
                <div class="l1">确认密码：</div><div class="l2"><input type="password" name="password2" class="form-control" placeholder="再次输入密码"></div>
            </div>

            <div class="form-group">
                <div class="l1">验证码：</div><div class="l21"><input name="yzm" class="form-control" type="text"></div>

                <div class="l3">
                    <img class="yzm" id="yanzm" src="/User/getYZM">
                </div>
            </div>


        </div>
        <div class="footer">
            <button type="submit" name="submit" class="btn btn-block bg-home">注册</button>

            <div class="third-party">
                <h5>第三方帐号登录</h5>
                <ul>
                    <li><a href="/User/thirdparty/type/weibo"><img class="icons" src="/Public/images/blog/weibo_64x64.png">   Weibo</a></li>
                    <li><a href="/User/thirdparty/type/qq"><img class="icons" src="/Public/images/blog/qq_56x56.jpg">   QQ</a></li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="errorMessgae"></div>
<script>

    $("input[name='email']").on('focusout',checkEmail);
    $("input[name='nickname']").on('focusout',checkNickname);
    $("input[name='password']").on('focusout',checkPassword);

    function checkEmail(){
        var val = $("#email").val();

        if (val == null || val =="")
        {
            showError("邮箱必须填写");
            //$(".errorMessgae").
            //showError(".errorMessgae","邮箱必须填写",'tinRightIn');
            return false;
        }

        var regEmail = /^\w+([-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
        var r = val.match(regEmail);
        if(!r) {
            showError("邮箱格式不正确");
            return false;
        }

        return true;
    }


    function checkNickname(){
        var val = $("input[name='nickname']").val();
        if (val == null || val == "")
        {
            showError("昵称必须填写");
            return false;
        }

        if(val.length < 4 || val.length > 10){
            showError("昵称长度必须在4到10位之间");
            return false;
        }

        return true;
    }


    function checkPassword() {

        var password = document.forms["register"]["password"].value;
        if (password == null || password == "") {
            showError("密码必须填写");
            return false;
        }
        if (password.length < 6 && password.length > 16) {
            showError("密码必须大于6位,小于16位");
            return false;
        }
        var password2 = document.forms["register"]["password2"].value;
        if (password2 == null || password2 == "") {
            showError("密码必须确认");
            return false;
        }
        if (password2 !== password) {
            showError("两次密码必须相同");
            return false;
        }
        return true;
    }

    function check() {

        if(!checkEmail()){
            return false;
        }

        if(!checkNickname()){
            return false;
        }

        if(!checkPassword()){
            return false;
        }

    }

    window.count = 0;
    function showError(text) {
            var $errDiv = $(".errorMessgae");
            $errDiv.html(text).css('opacity', 1);
            window.clearInterval(time);
        window.time = setInterval('dive()',20);
    }

    function dive(){
        var $errDiv = $(".errorMessgae");
        if(count< 100){
            count++;
            $errDiv.css('opacity', ( 1- count*0.01));
        }else{
            count = 0;
            clearInterval(time);
        }
    }

    var yanzm = document.getElementById("yanzm");

    yanzm.onclick = function () {
        this.src = "/User/getYZM?timestamp=" + new Date();
    }

</script>
<!--<script>
    (function ($) {
        $.fn.validation = function () {
            return this.each(function () {
                var $this = $(this);
                if (!$this.is(':input')) {
                    $this = $this.find(':input');
                }
                $this.off('blur.zh select.zh focus.zh')
                        .on('blur.zh select.zh', validate)
                        .on('focus.zh', clear);
            });
        };

        function validate() {
            var $this = $(this);
            var success = new $.Callbacks();
            var fail = new $.Callbacks();
            var warning = new $.Callbacks();
            var $parent = $this.closest('.form-group');
            success.add(function (value) {
                successHandler.call($this, value);
            });
            fail.add(function (value) {
                failHandler.call($this, value);
            });
            warning.add(function (value) {
                warningHandler.call($this, value);
            });
            clear.call($this);
            if ($this.is(':disabled') || $this.is('[data-validate-disable]')) {
                return;
            }
            if ($this.attr('data-validate')) {
                var conditions = ($this.attr('data-validate') || '').split(/\s+/g);
                for (var i in
                        conditions) {
                    var condition = conditions[i];
                    $parent.addClass('waiting');
                    if (!pickStrategy(condition.split(/[:,]/g), $this, success, fail, warning)) {
                        break;
                    }
                }
            }
        }

        function clear() {
            var $this = $(this);
            var $parent = $this.closest('.form-group');
            if (!$parent.attr('data-for') ||
                    $parent.attr('data-for') === $this.prop('name')) {
                $parent.attr('data-for', null).removeClass('has-error waiting has-warning')
                        .find('.help-block').text('');
            }
        }

        function successHandler() {
            var $parent = this.closest('.form-group');
            if (!$parent.is('.has-warning')) {
                clear.call(this);
            }
        }

        function failHandler(msg) {
            var $parent = this.closest('.form-group');
            $parent.removeClass('has-warning waiting').addClass('has-error').
                    attr('data-for', this.prop('name')).find('.help-block').text(msg);
        }

        function warningHandler(msg) {
            var $parent = this.closest('.form-group');
            $parent.removeClass('waiting').addClass('has-warning').
                    attr('data-for', this.prop('name')).find('.help-block').text(msg);
        }

        function pickStrategy(tokens, scope, success, fail, warning) {
            var name = tokens.shift();
            var strategy = $.validation.strategy[name];
            if (strategy) {
                return strategy.call(scope, tokens, success, fail, warning);
            }
            else {
                success.fire();
                return true;
            }
        }

        /*$.validation.strategy.min = function (condition, success, fail) {
            if (this.val() === '') {
                success.fire();
                return true;
            }
            var length = +(condition && condition[0]);
            if (length) {
                if (this.val().length >= length) {
                    success.fire();
                    return true;
                }
                else {
                    fail.fire('请至少输入' + length + '个字！');
                    return false;
                }
            }
            else {
                success.fire();
                return true;
            }
        }*/


    }(jQuery));

    $.validation.strategy = {
        'request': function (condition, success, fail) {
            if (this.is("[type=checkbox]") || this.is("[type=radio]")) {
                var name = this.attr("name");
                if (name) {
                    if ($("[name=" + name + "]:checked").length) {
                        success.fire();
                        return true;
                    }
                    else {
                        fail.fire('不能为空！');
                        return false;
                    }
                }
                else {
                    success.fire();
                    return true;
                }
            }
            else {
                if (condition && condition[0]) {
                    switch (condition[0].toLowerCase()) {
                        case 'notrim':
                            break;
                        case 'trimleft':
                            this.val(this.val().replace($.validation.constants.trimLeft, ''));
                            break;
                        case 'trimright':
                            this.val(this.val().replace($.validation.constants.trimRight, ''));
                            break;
                        default:
                            this.val(this.val().replace($.validation.constants.trim, ''));
                            break;
                    }
                }
                if ($.validation.constants.request.test(this.val())) {
                    success.fire();
                    return true;
                }
                fail.fire('不能为空！');
                return false;
            }
        },
        'min': function (condition, success, fail) {
            if (this.val() === '') {
                success.fire();
                return true;
            }
            var length = +(condition && condition[0]);
            if (length) {
                if (this.val().length >= length) {
                    success.fire();
                    return true;
                }
                else {
                    fail.fire('请至少输入' + length + '个字！');
                    return false;
                }
            }
            else {
                success.fire();
                return true;
            }
        },
        'max': function (condition, success, fail) {
            var length = +(condition && condition[0]);
            if (length) {
                if (this.val().length <= length) {
                    success.fire();
                    return true;
                }
                else {
                    fail.fire('不能超过' + length + '个字！');
                    return false;
                }
            }
            else {
                success.fire();
                return true;
            }
        },
        'number': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            condition = condition || [];
            if (!$.validation.constants.number.test(value)) {
                fail.fire('请输入数字！');
                return false;
            }
            for (var i in
                    condition) {
                var c = condition[i].toLowerCase();
                if (c === 'pure') {
                    if (!$.validation.constants.purenumber.test(value)) {
                        fail.fire('请输入0~9组成的数字！');
                        return false;
                    }
                }
                else if (/^\d+[~-]\d+$/.test(c)) {
                    var match = c.match(/\d+/g);
                    var length = value.length;
                    if (length < +match[0]) {
                        fail.fire('请至少输入' + match[0] + '位数字！');
                        return false;
                    }
                    if (length > +match[1]) {
                        fail.fire('最多只能输入' + match[1] + '位数字！');
                        return false;
                    }
                }
                else if (/^\d+$/.test(c)) {
                        if (+c !== value.length) {
                            fail.fire('请输入' + c + '位数字！');
                            return false;
                        }
                    }
                success.fire();
                return true;
            }
        },
        'mobile': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if (!$.validation.constants.mobile.test(value)) {
                fail.fire('手机号码输入有误，请检查后重新输入！');
                return false;
            }
            success.fire();
            return true;
        },
        'url': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if (!$.validation.constants.url.test(value.toLowerCase())) {
                fail.fire('请输入正确的网址！如http://www.baidu.com');
                return false;
            }
            success.fire();
            return true;
        },
        'email': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if (!$.validation.constants.email.test(value)) {
                fail.fire('电子邮箱格式错误，请检查后重新输入！');
                return false;
            }
            success.fire();
            return true;
        },
        'telephone': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if (!$.validation.constants.telephone.test(value)) {
                fail.fire('电话号码输入有误，请检查后重新输入！！');
                return false;
            }
            success.fire();
            return true;
        },
        'shenfenzheng': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            value = value.toLowerCase();
            if ($.validation.constants.shenfenzheng.test(value)) {
                var numbers = value.toLowerCase().split('');
                // 验证地区
                var aCity = {
                    11: '北京',
                    12: '天津',
                    13: '河北',
                    14: '山西',
                    15: '内蒙古',
                    21: '辽宁',
                    22: '吉林',
                    23: '黑龙江',
                    31: '上海',
                    32: '江苏',
                    33: '浙江',
                    34: '安徽',
                    35: '福建',
                    36: '江西',
                    37: '山东',
                    41: '河南',
                    42: '湖北',
                    43: '湖南',
                    44: '广东',
                    45: '广西',
                    46: '海南',
                    50: '重庆',
                    51: '四川',
                    52: '贵州',
                    53: '云南',
                    54: '西藏',
                    61: '陕西',
                    62: '甘肃',
                    63: '青海',
                    64: '宁夏',
                    65: '新疆',
                    71: '台湾',
                    81: '香港',
                    82: '澳门',
                    91: '国外'
                };
                if (!aCity[numbers[0] + numbers[1]]) {
                    fail.fire('身份证格式有误，请检查后重新输入！');
                    return false;
                }
                var wi = [7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2];
                var check = ['1', '0', 'x', '9', '8', '7', '6', '5', '4', '3', '2'];
                var _sum = 0;
                for (var i = 0; i < 17; i++) {
                    _sum += +numbers[i] * +wi[i];
                }
                if (numbers[17] != check[_sum % 11]) {
                    fail.fire('身份证格式有误，请检查后重新输入！');
                    return false;
                }
                success.fire();
                return true;
            }
            else {
                fail.fire('请输入18位身份证！');
                return false;
            }
        },
        'taibaozheng': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if (!$.validation.constants.taibaozheng.test(value)) {
                fail.fire('台胞证格式有误，请检查后重新输入！');
                return false;
            }
            success.fire();
            return true;
        },
        'zhizhao': function (condition, success, fail) {
            var value = this.val();
            if (value === '') {
                success.fire();
                return true;
            }
            if ($.validation.constants.zhizhao.test(value)) {
                var p = 10;
                var s;
                var a;
                var numbers = value.split('');
                for (var i = 0; i < 15; i++) {
                    a = +numbers[i];
                    s = (p % 11) + a;
                    p = (s % 10) * 2;
                    if (p === 0) {
                        p = 20;
                    }
                }
                if (s % 10 !== 1) {
                    fail.fire('工商营业执照输入有误，请检查后重新输入！');
                    return false;
                }
                success.fire();
                return true;
            }
            else {
                fail.fire('请输入15位工商营业执照！');
                return false;
            }
        }
    };

    $.validation.constants = {
        'request': /./,
        'trimLeft': /^\s+/,
        'trimRight': /\s+$/,
        'trim': /(^\s+)|(\s+$)/g,
        'number': /^-?\d+(,\d{3,4})*(\.\d+)?$/,
        'purenumber': /^\d+$/,
        'shenfenzheng': /^\d{17}[\dx]$/i,
        'taibaozheng': /^\d{8}(\d{2})?$/,
        'zhizhao': /^\d{15}$/,
        'mobile': /^1[345789]\d{9}$/,
        'telephone': /^\d{7,8}([ +-]\d+)?$/,
        'email': /^[a-z0-9.\-_+]+@[a-z0-9\-_]+(.[a-z0-9\-_]+)+$/i,
        'url': /^(https?:\/\/)?(([\d]{1,3}\.){3}[\d]{1,3}|([\d\w_!~*\\'()-]+\.)*([\d\w][\d\w-]{0,61})?[\d\w]\.[\w]{2,6})(:[\d]{1,4})?((\/?)|(\/[\d\w_!~*\\'().;?:@&=+$,%#-]+)+\/?)$/
    };

    $.validation('ajax_xx',function(c, s, f) {
        $.post('some_url',function(data){
            if (data.success) {
                s.fire();
            }else{
                f.fire('xxxxxxxx');
            }
        });
    });

</script>-->



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