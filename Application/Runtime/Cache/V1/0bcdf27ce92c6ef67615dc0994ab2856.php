<?php if (!defined('THINK_PATH')) exit();?><html>
<head></head>
<body>
<div class="form-box" id="login-box">
    <div class="header">��Ա��¼</div>
    <form action="/User/login" method="post">
		��һ�㣺
        <select>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><option value="<?php echo ($item["id"]); ?>"><?php echo ($item["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
		</select>


        </div>
        <div class="footer">

            <button type="submit" name="submit" class="btn bg-olive btn-block">��¼</button>

            <a href="/User/register" class="text-center">ȥע��</a>
            <div class="third-party">
                <h5>�������ʺŵ�¼</h5>
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