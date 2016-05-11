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



    <div class="container" style="margin-top: 30px">
<H1>Bookmarks</H1>
<DL><p>
    <DT><H3 ADD_DATE="1427171448" LAST_MODIFIED="1433834764" PERSONAL_TOOLBAR_FOLDER="true">书签栏</H3>
    <DL><p>
        <DT><A HREF="http://zhanhao.tv/Public/plugins/adminLTE/" ADD_DATE="1427250054">AdminLTE</A>
        <DT><A HREF="http://eeds.zh.com/index.html?userkey=C0A80B236CF0498D952C0000000B00000000551112DB0000000831010721000143NOTRSD425C1201312QF155&langs=0&stamp=1427182306" ADD_DATE="1432091221">eeds</A>
        <DT><A HREF="http://new.zhanhao.com/index.php?userkey=C0A80B236CF0498D952C0000000B00000000551112DB0000000831010721000143NOTRSD425C1201312QF155&langs=0&stamp=1427182306" ADD_DATE="1427441554">index.php</A>
        <DT><A HREF="http://document.thinkphp.cn/manual_3_2.html#preface" ADD_DATE="1427779259">序言 - ThinkPHP3.2完全开发手册</A>
        <DT><A HREF="http://localhost:8080/tysz/adminLogin.jsp" ADD_DATE="1433297194" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACHUlEQVQ4jX2TP2hTYRTFfy+42NKSCN2KDcXBOBlTtC6FQizdtJVkcohQEwX/tCI1oEMFKQ1tjd1MSWOQgpCWUkFqxID/BjMkGhAbEdQnbg7to9QIQr7r8JKXF4keuMP7vnvOd+7hPo1WOHIuhKadBE7VTtYR9ZK3ybt/t2otiPdbijYwQnFxvf7hsN88XrgUl0IC/1EPCK1LEbdz9gBweCwOhCq/fjsBEDELSNw8Q3h0wCJs71Tccw+GK9NLGwlKyYmaA20cNGdwMoHmDZPLl0EgE4sQHh0gcnsZzRsmOJkAoKpkr8mpO1CQmY0QGPIBEF1YI5bK4j/mAaD44RsoWHlaxNXRjquzDZR9BBGC1+7xbPEq/n6PNUIuv0lgqI/Cwxvk8mVy+U1iqWxTouYIVdFRtZewwiJ6Z43cmzIA/n4PM+On+bwxje9gj+XAUXNQMkOThoAIX77/4MTYPPuOXya29ITtnQq93V3MTIyCUrpNQD1CicVHBJ9nP5n586CEbeMn0blVovOrAPR2d0GVFw2Bj+k0VTFcHW0AuDrbQUFguI9M/IJpV4HvUA8AK9kCfEqdbQojmXn1Wmy4eGtZCu+/ypaxa51tGbtyfXZFOBB6Xuc1VtkdcuLgHZrm5n8QMVB40dO2DAD0tIFiBCXGv9dYDBSDdXKzgClSQhhEKd1a53opZd7p6ZKd0vw32uEOTSFyxezSFtDTU63a/gBYoAoYVoQhCAAAAABJRU5ErkJggg==">iSec 云安公共场所管侦平台</A>
        <DT><A HREF="http://www.gbtags.com/gb/explore.htm" ADD_DATE="1427781095" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACjUlEQVQ4jUXTTWicVRTG8d+d983MmJlJZhocmxIqsUmwKBEKknTjVjeKiOBOFBeCuFSh3UvdFeyitntdieBGF4qLChqoH0WxklZCsYmRGPP9NV/vdXFDvZt7L5znnPv8z7khfjT5oaHSm/oxE0NJyIKix9EWrSmak6zepN+hXCf2o6CQh4FecS3Ea2ciEVlUDILuDtUxHn+ZJ16lPs7SlyxcYm+VcoMgUgSCXIxRKNHZDcoPRU++Fsy+TmuG3j79Q2Zeoj3LN++w/ksUBUPVqBgI8fp0obMfTMxHcxeC9lNJ1D8kZIRA0SerpvNfC9y4GO2sBJVGDPFyM5p6geeuM+imqqWMUCJGSMJYJKflBgdrfPU2f/+gZPYNnnmf3gH9A0p5EsbCg1UM/k/U2aR2kvMXyKtyk88y/HCiHkKqXK4lUdFLwqyGSP8Ige4utUdozcgNt4/9BqqjKdHyT1RGU5ASGz+SlRk7y3A72aycYPRR+QOveZU7n7PwARuLqee1cfIKO38mPiOnOTXP2VfS3juQ271P87FU+bePU9D40+m+scjOcqraPJMAbv7B/RuMz9HZkuvtp+dnQ8y/l4am30lczr3FUI044N7XdHaSrfE59lbYWpJb/53pF1m/zdIX3LycKO+tJqDD7QTy+0tUmuyvcrTJ1PPsrSq5dTW6/QlrP0cjpzkxk1rYOEVrmsVPGaongHGQEp48F935jFIWE8RbV6PySNCYiM5fDHaXqU+wucjaryx/y9y7bN+j2oyqrWDlu6jccPyZAlklOvgnqI4ln53t489TT22rtqi1OdwgDqKiG8SBklhckesaHBYqo9HgiM27HP1LpZHslOtpUjfu0t2O+vuFrOiK8cp/DMkZZmPKypIAAAAASUVORK5CYII=">发现 极客标签 | 在线编程知识分享学习平台</A>
        <DT><A HREF="http://www.iciba.com/" ADD_DATE="1428377064" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABe0lEQVQ4jY2SIXTbMBRFr3YGMpaxBXrMZYahHnOYzTpY6LBCBxp2zGbFZQ5zWAwd5rCYLTBhKWvYG1CX2pvX5Z3zj/7Xka6e9AUdJSHa7XaXSELEtUpCJJWyKrVOuB4wtFn1l6sAJglRWgAIWLGIZnzyS5rtGYBDHbFpMe+enqbopbCW48dGxUnKDtbP3YMUhuG/nVj7NkBqJNV6A0jS3f1JaZoOQj50Czfc4wFTYDI+kx9h85836AHa5dMld0YjJuMzzRHq/ek6QBIuuIn2AHjAZDRi+/CM53zGcZxBwMdu4btA+xVj0i4WCYy5RXzvvUM1/QPwW4/eAmdr8x/umJsooJGDMUKvHa2m4NdlvwtKA61Bgt4YuJnc8KddhbSecvl0PQfVy8omWYa/srl/aPBJmbVAFNDK4ZsRAiozG74C8/lfUyVzZmQQBXi3CyrzxDKOXwHPPrQ74Hjp+wb7H7rjfTtn09p6GcfkeW5MURSqqmrQyHvK89wA/AI9jfVMWsCL7wAAAABJRU5ErkJggg==">在线翻译_在线词典_金山词霸_爱词霸英语</A>
        <DT><A HREF="http://www.sucaihuo.com/js/2.html" ADD_DATE="1429003057" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC+UlEQVQ4ja2OS2+UZRhAz/O+322mM52xxdKOtgVExaDB4CUuRFtEYzQuZOMCWQgmRqMmrnRhSHVTNxoToxs1xrhQl9aNiSVWQyW4EV1A22kBKS0jyTDQ6dy+y/u4UBN/gGd/To7wH36YmPCKhfL+XMgzSRKXMULSqGNaMZn0QC2Cg2IffrG83Lj457T8K5/Yu+dgmCZfpteuBpkx2DQhqNyMVypBpnRWqqg6VAQEJE2QXP4EACcfvO/AyZGh1uoH7+nm5VW98tUXOj9U0trMjPbSnrb+WNb5HaO68ubr2l1f08bx73W+MqQnx4fVTIEJWslbWJcPRscIbhzBiYf1Q/q2jWGwtFcvQbvDwBNPYoe20lg6gxWFLMM8PDFhOvXLAaqY8g0IQrLRwBb7CSsjALQXqwTDQ0S7dqMKnR9nQcBEUWxoUlbf3KtqoNiPCGQbm3iVCq6viKrSqy5Q3HM3frEf16xz/bcFACSKfjJR60LBdNuIBb/UjwBps060fRvGD1BVOgsLFPdNYkTZOLuI3WyAKiZXOG7Cju5X44FYTJqS1a/iesrAoecgc2AcZnCY/PgYaaNB5+dTOBVUhHB8dMlj65ZHbK2LcxmLB58mMTD26iuU9z0EooDhpiNHOfvCYbzMQq8NgMnlsKXSkumsXSqI6t/rGw0GJx9l8NmjWM1w3U1EHYW995DbtZus2cDFMSKCjfIXc6O3LBsTmQP6T8C78y7Gj03hBR7txTNceO0NyDLwoHLoMAqoKKqKLfT9/jnEJmt1IwSkPMCt73+ElMr0rtRYefkl6rPf0jr9K4kRSo89TnjHbYAgTgkqlXNTU1POWMBZj+3T75DfuQPnElaPvU2vWsWmMeuffIxJHBKGVI68CE7R0E/NwJavAbxMDH07byddX6P22afE589x7btvwAIKG3Oz1D58F79QJo5TyOewQThTq57/BUBOPXD/834WP5W2WvhtQze7jssUQwYYnHXkMkNqfZqRUqqMnG5KcXpybq7L/8FfIC1T+/ywcEkAAAAASUVORK5CYII=">jQuery+Ajax+PHP无刷新分页网页特效代码,JS特效代码下载_素材火</A>
        <DT><A HREF="http://www.gbtags.com/gb/share/5017.htm" ADD_DATE="1429148350" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACjUlEQVQ4jUXTTWicVRTG8d+d983MmJlJZhocmxIqsUmwKBEKknTjVjeKiOBOFBeCuFSh3UvdFeyitntdieBGF4qLChqoH0WxklZCsYmRGPP9NV/vdXFDvZt7L5znnPv8z7khfjT5oaHSm/oxE0NJyIKix9EWrSmak6zepN+hXCf2o6CQh4FecS3Ea2ciEVlUDILuDtUxHn+ZJ16lPs7SlyxcYm+VcoMgUgSCXIxRKNHZDcoPRU++Fsy+TmuG3j79Q2Zeoj3LN++w/ksUBUPVqBgI8fp0obMfTMxHcxeC9lNJ1D8kZIRA0SerpvNfC9y4GO2sBJVGDPFyM5p6geeuM+imqqWMUCJGSMJYJKflBgdrfPU2f/+gZPYNnnmf3gH9A0p5EsbCg1UM/k/U2aR2kvMXyKtyk88y/HCiHkKqXK4lUdFLwqyGSP8Ige4utUdozcgNt4/9BqqjKdHyT1RGU5ASGz+SlRk7y3A72aycYPRR+QOveZU7n7PwARuLqee1cfIKO38mPiOnOTXP2VfS3juQ271P87FU+bePU9D40+m+scjOcqraPJMAbv7B/RuMz9HZkuvtp+dnQ8y/l4am30lczr3FUI044N7XdHaSrfE59lbYWpJb/53pF1m/zdIX3LycKO+tJqDD7QTy+0tUmuyvcrTJ1PPsrSq5dTW6/QlrP0cjpzkxk1rYOEVrmsVPGaongHGQEp48F935jFIWE8RbV6PySNCYiM5fDHaXqU+wucjaryx/y9y7bN+j2oyqrWDlu6jccPyZAlklOvgnqI4ln53t489TT22rtqi1OdwgDqKiG8SBklhckesaHBYqo9HgiM27HP1LpZHslOtpUjfu0t2O+vuFrOiK8cp/DMkZZmPKypIAAAAASUVORK5CYII=">干货！一步步实现自己的表单验证器 极客标签 | 在线编程知识分享学习平台</A>
        <DT><A HREF="http://www.zhouhua.info/" ADD_DATE="1429148371" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACw0lEQVQ4jTXPy4pcdRSF8W/tc6vqSvWFljiwRWNMGhSigpjMzExwrBMvbyFOFQO+gM9gTzIIDkR0HDUjNSAimO6o3TEqnequy6nqOuf893ZQcT3Aj/UJQqD48Itfh+eeHr7t+CUwuYPJBeBhYQaGR2R27/jB4c3P3rw2gZAAPvnpjxfNenvKsiudZWThZBJnISQocTygDSjCCU8/N4vuvRtXd+7q4x/vb9LZnf7m1u7k5LR7oWy4stWn1+vxsBOn05pn+sbWuTV+qZ1v/61ZG27ky+l4n75ey0n5W+Wgv3t6ctq9NMBe2d7UnWmwmHdcXq+o+mvcrlsuGLzx1AZlUcQ3h6N2fTi8uJzP38kRu1aUXqiOCxsDfXnc8ddsodKMg8kZJsgEv40X1LNZXN/Z1u08R1nuFn45V4TCQ7mkv8+S6qZlkGdIomK1wBmWOUezpUazGpMp3BUYFoAILR1Ouoh+JlIEROABQWCIunWeX684ai1mbYeBAAxQIDITh/NWycEkAiEFANPWefmcsbMx4LvjhUqJkBCQA0SAKegcWgJjxXqAu3N9u+DJQZ+vHs5ZpkRhRkQQQjkQYhViIiJCaIVGwOvn1wgZtx7UCKfMskjuq/9B5ABIEREgSWa4OwH0C+P3hbM/XdDLDDCSuyTxf99jgDBTtG2KlJyqKuRdYrpsmbdOJWiWDUVVhpmtoh8DFnDP29bc0Xg0jXq2wMxiNJrEbFJT5RmPRpMYj+swiaZtSSnkXWcp/MCaVN9s5vP7veF6nhWWzEgnj06TdykVZd6NRuOua9pUlXk6GY3TvF50/fX1vKnrIyvbPQF89MOfrxZlb0+WX2qaFjNRlgVniyUyo+oVnC0aAKqqwLtufzmfv3/j6rPfiwghxQdf3z0/fGL7XSuKi9G1WYIozORAco8MpLxIXdcetE3z+afXnvuHCP0Ho2eOaTjw6qIAAAAASUVORK5CYII=">Step Over | 前端技术分享</A>
        <DT><A HREF="http://v3.bootcss.com/components/" ADD_DATE="1429165041" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACMklEQVQ4jW2TzUtUURjGf3PP0TGDqLH8SDOxIdAsIoqs6BNcWYtaRBSBUEiLQCiIoEWLCIL+gEzChX0silokAxEaFC3UaGhRkUYFppkfZUkzzTj3nrfFnbkfQy+ce897OO/zPs/z3htZmFiouHUz0ZMcGmt3bCdKMMR9COGwtJXd0ro+0XnmUKeqKG+5M/z83RE752hjBH8ZHGPcvePmhTPHdvTEl5mm6Zn5uIpZG/qMMVpCXf2NnxblCFOTPxq1nXOiwctdl49S31gVopxbdPj4fpz7vYP8nk95MPaiHdUiEupWXVvB2nU1/JxbIP0nQ0mppq5hOfGmOqpWx7hyrtfnIIIWjMcraNbd7ic8S7wGhB0HNnLh6knizWsQT4r71t6BFCsURAwASlkAfP08jYj4c5E8gARMKoB0nD3IsVNtKGWxYuUy0qkM3dcfYvKgBQmWEYOIcZFFPJzxL995MzJGcmiUT6OTlC8t4+K1DsqWlCJiMPkaTwIS/mAG+ocZ6H8FgGVF6Hl0idr6VWzd1cSLp0mPtfY0Fc9f8DywlMZSEQBKShUmMDnt0g9a58bhE/vY3baZSCRCXUMVldUx0qkMyaEPHjCANlLo7pZm/y6STmWorIlRWRMDwM7ZjLx8S9+NBHMzv7xRAkTat3VlHMeJ+irCv07wcjFPZamstX1Pc6Lggz8JfxUKQmd5C1r3tiTU7Qf3BmenZuPfxmcbRYwOG/r/UEpld+7f9Pj0+eOd/wB01l5trnoCzQAAAABJRU5ErkJggg==">组件 · Bootstrap 中文文档</A>
        <DT><A HREF="http://www.jq22.com/" ADD_DATE="1429686272" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABr0lEQVQ4jYXSTUuVQRwF8N88vqQbi6jVBS9YGPRKmxvtTDGjRVDQppedEYH0DYpo27JFCUEFWSCBgSDCfXGRUFiroD5AFIREpWGlwp0WzpVH8eLZzZlzzsyZ+QebUKEHxRZ6I0cCx1CIVCKPBpjb7NmAO2RbhB6tMTtDrDE2RVdjL2wWT7O/nWs4hIU6k7OMH6R1Dy8CFyJz/xg8y+KGgCoXA88C7Xk+Ul3iXDuhjY+BYuR5P5fXAyr0ZHwK7NiqWuR+PzdnuI6HUOdEVqUIGcPNzKnr8GM6VpjIc1mkO60PNDMndBYpDjEf+ZMCBrMWepNgYZsAq/xMxkb1QobDqePkNv53Q8xX1g7sbJBZ5OQ4nQO8ikw1Mf+tMwItXM3xXzN82MttxO+cj9zD75zoTZ2+3AReaWxEyqFKKeMtbpxiFEZp66YQWDzDj/xVatwK3GXtGxvkWBrTl2WO5w3T7C7TN556T7Crxq8aY6TXnKKrg3KglHzfIp+xM7APrZHlwGtM11lZ5umGUU4hDwKXmjxkA09WGBliaf0GeVQphbWpHEQhab6gssroad7n9f8Brh55TZxLChwAAAAASUVORK5CYII=">jQuery插件库-收集最全最新最好的jQuery插件</A>
        <DT><A HREF="http://zhanhao.tv/Socket" ADD_DATE="1431481874">SocketServer</A>
        <DT><A HREF="http://www.web-tinker.com/article/20306.html" ADD_DATE="1431595508" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAjUlEQVQ4jeWRQQ2AMBAER0IlVAISkIAEJNQBUioBCUioBCRggUe3SSkHIeEHk/TRZvdurwe/oAOWNwUiMD4R9sDcvDlgre6zdCdGIJHj1kw6hU4FD4mizM4ovALeSJXkA2ADgmEealFDkM+XWKmNRf55a15zXCdD6eglaonSWeNC1fFqdeYGLMJdl4+xAwFhGddhKppOAAAAAElFTkSuQmCC">WebSocket(贰) 解析数据帧 - Web技术研究所</A>
        <DT><A HREF="http://bosonnlp.com/dev/center" ADD_DATE="1432179125" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABcUlEQVQ4jcWQsU9TURjFf+e++wCLktKWYnCQUUgHBiYXRxzcTFzAhJUFJOqqA1MTF/8U48RGQukGJA6wiCYQIsGFAWKFd+/HQCKvlbQyecZzz/nOORf+N8Ry8w7jw6+QCmCxq9oknALRdomn6yxP/xD1rTEKg3tIA7eKNtvhPJtz9KeVnsk3dtckafLeQzIKuXSzbUJ8d4MhQ8zh3Ow1x6THqYLkct0OOGk1qJbE8aEAqD4wTo4cd4vP2mdow4NGO6KeUi58JbSgXL6iQgvuFYVU+iOL9gX/e8VjVuyo2geUu+6PsUnWesHi1KFHut/xuAl8B9Lc1YCsBHqM1IdUww/UqTcWPGikfRcrLD369Ffqm9VBHo43gCmkIaRZ+kufPVC9NlvE8ZKPu0+QkhwfkCrARNtRpwuPGMvtd6DnJPRGjE3291c9vT6sbZ6dA6cYa4Rfr/kwc+bJwjw+TbFgXc1KRBZ+cpEd8Lb2Dam7/l9xCYiwcw0iXuBNAAAAAElFTkSuQmCC">开发者中心 - BosonNLP</A>
        <DT><A HREF="http://www.v2ex.com/" ADD_DATE="1432179753" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACz0lEQVQ4jWWSXWiWdRjGf9f//7w4VzYY7UNppavEHEiDnVhkhMuDPg4GeVQpqTW32QdhCEG0IBDCDixauShMiEA7EoooCjwIEzELmaHsxVpi7cNM3bt3797nea4O3LtK76P74Lp/93V/iOvit6Hb2wtJ8jgOPcirQPWGy9g/5s4PVRy+vquvOFHTq5Yc3Ehc+/CdG6J5xaJN1knkM9glo0aJDqDD5qgy9izrL54ASGqAzgdIIu4Gzdh+aS7PRpLIHTGPjTJjFWUXCyE+KPSiI08AJ/7nwKCpj25dOjtXp6C6LuTnBc1Iic0cMCKqbxeyamnWIWsbOD8KEP6dZVBN3+4t7y0+9DeiUzAK7nea9Sj3G8g3lbL6te0/7J5qG/i9WKtbADT1N9W3NGQvf1pav0rMvHXpj+ILFnXEsMXOTxeqV556trj55/qbtbPxyXeX3ACYTJNcQW0orFvWe2GmvBRj7pfUR2Bl88Dk9OnybWsklseGmN8AYLi3LPuwYUNz3ydrunqpNqRX9y2mvK5u7vKR1t6PVwf8iJ0fnhwaKNXKFq4AuDpb/SYuKnQG6dWW7QeGm06Gs+V8yURTYfreJGbPgU9V0sqX13Z+3R/UomXbgRVapNdldxtGkSz7bsMxp9ng+PAzp/6rXwA0b/uwJRYW9Vhaj1gNrBTOQLntBHFecNb296nTg1Pvbz0zDxgMrdtXdBH1muA+UOO1v/A5cnbZXAxRO4AeAJtp8Ijl3eMj574ILX3LH1PUMKYL+Nzm+Dz5il06Mv7Bpu9y+1cbY6Yg3w/cEtA7rfe09waF0I2VgnZVnL6JPD7fSVkeIgyGgMK8q1T2/jzzVuAXpEdDpcqezPmWP9OZz0JaTQUFGwMRgI0jAgvZQomtOLFv89HU2kFW3ZlcGt40BowBqP+9q3nOVxINwF8xLM441GH3e0qEn3I4Xk3nLgBMDj09CvAPUZVTIJBbAboAAAAASUVORK5CYII=">V2EX</A>
        <DT><A HREF="http://dh.woshipm.com/" ADD_DATE="1432278996" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAACWElEQVQ4jT2TzWqeVRSFn7XP+b4vQhJSG+lXIVZ7Fyo6clQvwjpzXnFQENsr0AvIxFKhEDqQIqX1pwMNCA7UIoL9AcW/KEhqirbmPWevDt63Ds5gn8HerGetpTOv7hg1Ik2LGXKnZOAKLZMiASAHVgKJXLENYQKNHy0KkZ1QpxWRbaBSALCNZPLxIhuiI0OQwohI04t48qlVTp99nuMnjpJ07M7RY+ucPvsSy61VeiQGILBFzTCRjYLY3FzjtfMvstxa5/izG2y/fYPhoXn93Asst9ZYPvcy2+/ssvfb34jEVPTWqR0PpREO3nzvFY6dPIIkIPn51j6xKDz9zBpSAcOvv9zj3Tc+HlnI1B5JOHCKjeU6kvhn/z9sszxxhLoIBBzsP2R9Y87m5iqEkQtJJ3CBNBQYegLw5ad3uX3zd2aLQIbrO9+z++EdUJCHI4G0iQgCdRQdpZAnm5pYLBYMh+bzK3e4fuEmzePyLDm6EsYpKkDznEoSE13NC1e2vyEufsveTwfIYraoI/1kOjQDmypDpWGLrALD/T8O+OvPBwwe4QIc7N0HG83GGXcIEbaxC4rKEytzvvjoNrtXfySzUSgoOhHBVzfu8tnlW6zMKmgFydimSgUrSR9y7YPv+GTnByIH0GzyOkib4jlX3/+af+89wG4QEBY6c+qSCSEq6YFq0dQRszGygCTMQMmKw1MnRodCGm00jWqRFBwa9cb0SKxChib9deqECLv/n7yOScZgPdaIY7rWSSWmoDA9xyQGBBY4C6gythOsRBRsYzUqohjEQGZSqrHgEaj0TgF6gYmnAAAAAElFTkSuQmCC">产品经理网址导航</A>
        <DT><A HREF="http://www.phper.org.cn/" ADD_DATE="1432694375" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAABmUlEQVQ4jaWTTU4bQRCFX48HmQVCsh2xTA4zkQILn4U12MnGCyTnJHABwlm4AJYMwvxowHTVl0XNxI7BUqSUVL14XfW6qvpVAtAWA6SUpC0hKSWV7xLWAwIMkk3LWXQ6KwJAqX0NSW6ibK7dpbqWikIJhLu0t6cEkrvj7uCOv73h7jiEPz/jZvjjI7a/j0nhvR4+meAEGyyXEdgm3t5iozHe6+NPT9h8jg+H+OkpdnyMlWUQnZ+jP0mAX15iVUUuOhFweIi/vOCvr9hanA0+xf3FBfL5HJtOsaOjAHd3seorfnUVCWbRlhl+c4ONx2QJGw6jBZtMApCiz+vrVUU5r2ayWGD9fsT9+B7zshwV+PTnRgXVqoKGxB4e8IMD7MtnnDA325zBL6yqsE7RzOAbXtdBkjM+m2GzWcyl+b2tv+CjETYYYHd3ANj9PbazE75YBGZGcnda1WGu1ClEq7y6lrrdUOJyKZ2dBX5yotTthvjaXWiV2IChvvIvpX+8D+vLBEQlzbm+NICUcwBluf7Y9m38Fyv+J1mSfgPjXQE+8rkbRQAAAABJRU5ErkJggg==">PHPER - php技术交流平台</A>
        <DT><A HREF="http://yansu.org/2013/12/20/book-list-of-2013.html" ADD_DATE="1432704357" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAADKklEQVQ4jU2TTWzTdRjHP7//G31faTvXQjfXsZalwsYGTo2GGJQsBBOi8WIUo2eCRw96MdF4NnrQRBOjCfHCQTnodCIaqC8FwzCb7YDNzdm5rXvp29ru//bzsCk+yfd5Ts/h+8n3K4Yu/ikB3K8/pHd5kvHxcQKBALquYxgGKysrqKqKoiiYpkk0vo/wuXfxpEcQQqBF9qi880iEty5vcfX6ddJ9KV46M0ZAV7l1ew7Tskh0RtEDHUzkfmG9Wkf5/RqkRwDQ4j6Vz3+eYi7/A45tcfPyJdRyCZDAvYMvyNjJEzz57FmG7svTaDdRvX6UQsXiwq1Fms0mJ48/imqb//sCxK7aW6S6kziOg4LEXJwBQAEQjoVhGPj9Pt7/+AK5yWmklCDBdRxMy+bGVAGz2cDn9bDZNPH0D+1YANCTB1ksb3D+6AiHe3uYyOWZXtrgmceOUphb4NubRYI+LxlLIxwKYek+dFeCAhoS9t3+jueef5rDwyP0dycJBENEwh2sbayTHT5GIpVBCkHn/b28vtXE3CzzweyviIMPoUgk/vBeMvEozc0yfqtBuqsD73ad9eJvhN0mfbEAB6J+Au42im2SiXfiqPoOAyEEd8ID5O4uUa830Ow2itXCaTUIhkJI20SxWihWC801qVRrvHetgJYavAdRi+3n+8EXuPRHHUs1kFJieL0kEnGW1yos/r0KQK64wKdOmtkTryAUDeQuRITg3OODvNg3ylcXP+P0UD/TsyUq0sCvKWRiftZMeKPo8sSpp4h5FLZsydXlNuKTmZr8aKZGl1clZChUK1WyM1/y2qljLM/PE4tFKG1Lzl/5i8bwad5+MIIEDAVezW8gXNeVU5smb37xIz21eXAlP1U8GOU7vJztYLLc4pt1H0e6IwyEJLPlCvn4w+jRxE4OilWLVFBnbM8a4sgoq7U2ybklltQBJgo3oDsLQYO+VA/+YIDjh7ys5vKUoomdMp29skrSr3Go4bDfcnCl5IFkhGw8xGw9yGimh866S9feEKbtYtoOXT6N0m7SNUfCQsMm7UiEEABEQwF0TcVOHaA3lcJeqf1XDSn/XTvzDwOzTgyL+szXAAAAAElFTkSuQmCC">2013阅读书单 | 闫肃的博客</A>
        <DT><A HREF="http://www.cnblogs.com/dudu/archive/2012/12/12/linux-postfix-mailserver.html" ADD_DATE="1432716054" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAC8ElEQVQ4jS3TXWiVdQDH8c/zPOd1s21u6YaIZFqTFlKKvUgvhGSBXUQ3KZSFoRdRV17WhSFRXRW9XAiVdJNeRJSYWdhFUlTkCyTiNFOmbTq2uenO2dl5znOefxfr9svvBz/48Y3sCwewVRCiWBRF5CkylCgk5OF/lhNVCJEgiHAwKnwSAkQRIZC1GOrn1bU8OkBHkTTn3xpfXeLL89RaRIWFfFR5P+RxLMrDAnj7MXav45dRjo4wPseiIg/0s20NpyfZcohrDZJEKJSyhdlzGZ9uYfu97DjC/jNEbcSEiI4yB4f59lnefYiXjlApi+JKm3qNHUML5Z2H2H+cpMniIr++wMTrTL7G2SvsPMz2exjqJm1QCE0Giux9gsPn+Ox3dj9OHHFilB+G+bnIzSab7mCwj4BnVvLeKIW0zlNDbUs6M5//VlJtR+7u4ZUHabaZmSfNqBbpq3L8En9e5eFlVNrEYZ41PU1j43V/XY70Jbz5DUN7efJDLlwnb1OMeOcYmz5gdJoVXXQG4mpOb7Hh8ngqzFPMWFoINIPTFzlyOpOl827NtaTzOSkzNWIUUuJyhrSpXmsoZdRv8fL6m97afEO1TbOemW/Mma01VPKWJGNR0tJKM8WMOEkZuZ7oLc/oidvKGTemc2sHpvQk3Nk959pE6uTfbZvuumlFB0srDWMT8+ImcWfEuZEu1WLLhuXT4pSzl6uajbqPnh+2ec2oH0+VfXGsS8WcfS+OWdU34/xImybJig179kzVigaX1TwyOOXkxdtdGCu7NH6bxR1NP53pdfRkn/Hp2OhkYtvGUVcnEvu+7xdasWj9rpBnuai/u+mN54Ylce7rP5Y7c6XbxK2Szkrb6v6a+1fO2Dg4aWq27OOjq12ZqCgXhWj9rhCiaOHrxZ2Zp++7bsOqadVSptWOJXFQSnKzzYIT//T67tSAmXpBpbhgabRuZzgQRbZGhCwXNVp0VYIl3alyoS1grlkwNVsyl1IuUIgXRAzBwf8A0HRRY8hq/0oAAAAASUVORK5CYII=">阿里云CentOS Linux服务器上用postfix搭建邮件服务器 - dudu - 博客园</A>
        <DT><A HREF="http://articles.slicehost.com/2008/8/6/postfix-using-telnet-to-test-postfix" ADD_DATE="1432785651">Slicehost Articles: Postfix - using Telnet to test postfix</A>
        <DT><A HREF="http://www.php100.com/cover/php/" ADD_DATE="1433145154" ICON="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAADNklEQVQ4jYWTW2yTBRzFf9/3tWu73rZ1m91o1+Eyad1YHWRqxtgyEmrMAJeRqLhsYZqQCNHog/OBEI2+QCIoRBMevESMGKMkJBIil81kVsBAF5q5EHEXtmBKVxkdtmu/uy9AcA96ns/55ST//4H/lq/SGXgJKP0f3wNZqj2hfrvF1QnQ4F87/OWea2aFy/88gNtWvsXnru0FhPsBaQXAsfuZgxc2t/QPLhVu+2Itg688Wr3Wbbc6W0BofGPLJ4crXf728dnRj+4HhBUAdmx8e7yv7bXWopJHNzQKao7SEjeiIGEvcfLZ6L7TP179oudfDUJVTXu2rd91yO+te25juK9DEARR0YrohoYgiGiGiqorqJqMz+UPCgitG8Lb3kzdnluyAEiSxbU5OtBhlWzohoqJiarJCIKIYeqYpolFtGKYBg3+qL0p2L49vTTHyNVvHBLAnVz6l5x8t72tIdaQmDnHb/MXsFudLOZSLMt/AzCbmSRXzHJ5+iwAx+MHPv89dfl9C+CrKV/9bLSuI5zNL/DdpQ+xW50kZs5jYtAR7mUucw1Vk8kuLyCrBX6a/Jat63c9dePWxHaxKfD08OGhsa82hHvrEjMjZPMLOG0eIoEnydy9ycRcnIvXTxGqfpypW0lEQaIz0kcsOtj0wc7z30tLxWzqRnpSqy0LRc4kj9la6zexs/tdJubj+Ny1bGp+kT8Xp1B1hZqy1Qx07iVa38n47EjmeHz/xw/O2N2841Sspb/HW1qJ0+ZhKp3E5/KjaDKKVkTVFSpcfjyOCmwWBwdODh1Nzo+9KgE84g2+8HL3e2811qyTFK2ArBWo8qzCKtlwlLjwOHyUOauwSFZ0Q6fU5sHvrV+TmD73qwhQ6Q48sZhP505f+XRa0YpIooSiyeiGhm5oqLqMqslgmhSVPGeTx64X9SIeZ3VEeOih3EBhoOudKz2tQ826oSGrBWRtGYfVhdViQxItfP3z/tEfEkdjgBe4I94D6EAWMPzeYCibz3Di4pGxm39NLbvt5fyRSmRPXDoSV7QiVd5A8J5/ETBXTsEWDXUdDPoe2w0QDXUdOjmcMQO+Na8DNNas2xtZ1bbv4Q39AzytRFWdNfi6AAAAAElFTkSuQmCC">PHP100教程,PHP教程</A>
        <DT><A HREF="http://www.w3cschool.cc/java/java-array.html" ADD_DATE="1433219932">Java 数组 | w3cschool菜鸟教程</A>
        <DT><A HREF="http://www.sunjianhe.com/?p=659" ADD_DATE="1433834764">Postfix Smtp认证的配置(原创) | 孙剑和de博客</A>
    </DL><p>
</DL>
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