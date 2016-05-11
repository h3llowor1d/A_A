<?php if (!defined('THINK_PATH')) exit();?><html>
<head></head>
<body>
<div class="form-box" id="login-box">
    <div class="header">会员登录</div>
    <form action="/User/login" method="post">
		第一层：
        <select>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>


        </div>
        <div class="footer">

            <button type="submit" name="submit" class="btn bg-olive btn-block">登录</button>

            <a href="/User/register" class="text-center">去注册</a>
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
</body>
</html>