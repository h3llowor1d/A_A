<?php
    return array(
        //数据库配置信息
        'DB_TYPE'             => 'mysql',
        // 数据库类型
        'DB_HOST'             => '121.42.8.45',
        // 服务器地址
        //'DB_HOST'         => '127.0.0.1', // 服务器地址
        'DB_NAME'             => 'dosomething',
        // 数据库名
        'DB_USER'             => 'root',
        // 用户名
        //'DB_PWD'          => 'zhanhao1999', // 密码
        'DB_PWD'              => 'mike1989',
        // 密码
        //'DB_PWD'          => 'zhanhao0926', // 密码
        'DB_PORT'             => 3306,
        // 端口
        'DB_PREFIX'           => 'db_',
        // 数据库表前缀
        'DB_SUFFIX'           => '',
        // 数据库表后缀
        'DB_FIELDTYPE_CHECK'  => false,
        // 是否进行字段类型检查
        'DB_FIELDS_CACHE'     => true,
        // 启用字段缓存
        'DB_CHARSET'          => 'utf8',
        // 数据库编码默认采用utf8
        'DB_DEPLOY_TYPE'      => 0,
        // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
        'DB_RW_SEPARATE'      => false,
        // 数据库读写是否分离 主从式有效
        'DB_MASTER_NUM'       => 1,
        // 读写分离后 主服务器数量
        //'DB_SLAVE_NO'           =>  '11', // 指定从服务器序号

        'ACTION_SUFFIX'       => 'Action',
        // 操作方法后缀
        'URL_HTML_SUFFIX'     => 'html',
        //'DEFAULT_MODULE'  => 'Home',  // 默认模块

        /* 模块映射 */
        'URL_MODULE_MAP'      => array('i' => 'home'),
        /* 默认设定 */
        //'DEFAULT_APP'           => '@',     // 默认项目名称，@表示当前项目
        //'DEFAULT_GROUP'         => 'i', // 默认分组
        'MODULE_ALLOW_LIST'   => array('i', 'admin', 'V1', 'shop','oauth2'),
        'DEFAULT_MODULE'      => 'i',
        // 默认模块名称
        'DEFAULT_ACTION'      => 'index',
        // 默认操作名称
        'DEFAULT_CHARSET'     => 'utf-8',
        // 默认输出编码
        'DEFAULT_TIMEZONE'    => 'Asia/Shanghai',
        // 默认时区
        'DEFAULT_AJAX_RETURN' => 'JSON',
        // 默认AJAX 数据返回格式,可选JSON XML ...
        //'DEFAULT_THEME'    => 'default', // 默认模板主题名称
        'DEFAULT_LANG'        => 'zh-cn',
        // 默认语言

        /* 项目设定 */
        'APP_DEBUG'           => false,
        // 是否开启调试模式
        'APP_DOMAIN_DEPLOY'   => false,
        // 是否使用独立域名部署项目
        'APP_PLUGIN_ON'       => false,
        // 是否开启插件机制
        'APP_FILE_CASE'       => false,
        // 是否检查文件的大小写 对Windows平台有效
        //'APP_GROUP_DEPR'        => '.',     // 模块分组之间的分割符
        //'APP_GROUP_LIST'        => 'i,admin,V1',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
        'APP_AUTOLOAD_REG'    => false,
        // 是否开启SPL_AUTOLOAD_REGISTER
        'APP_AUTOLOAD_PATH'   => 'Think.Util.',
        // __autoLoad 机制额外检测路径设置,注意搜索顺序
        'APP_CONFIG_LIST'     => array('taglibs', 'routes', 'tags', 'htmls', 'modules', 'actions'),
        // 项目额外需要加载的配置列表，默认包括：taglibs(标签库定义),routes(路由定义),tags(标签定义),(htmls)静态缓存定义, modules(扩展模块),actions(扩展操作)

        /* Cookie设置 */
        'COOKIE_EXPIRE'       => 3600,
        // Coodie有效期
        'COOKIE_DOMAIN'       => '',
        // Cookie有效域名
        'COOKIE_PATH'         => '/',
        // Cookie路径
        'COOKIE_PREFIX'       => 'mkjxg_',
        // Cookie前缀 避免冲突
        'COOKIE_SAFE'         => 'jinliufang',
        /* 分页设置 */
        'PAGE_ROLLPAGE'       => 5,
        // 分页显示页数
        'PAGE_LISTROWS'       => 20,
        // 分页每页显示记录数

        /* 路由设置 */
        'URL_ROUTER_ON'       => true,
        /* SESSION设置 */
        'SESSION_AUTO_START'  => false,
        // 是否自动开启Session
        // 内置SESSION类可用参数
        //'SESSION_NAME'          => '',      // Session名称
        //'SESSION_PATH'          => '',      // Session保存路径
        //'SESSION_CALLBACK'      => '',      // Session 对象反序列化时候的回调函数


        /* 表单令牌验证 */
        'TOKEN_ON'            => true,
        // 开启令牌验证
        'TOKEN_NAME'          => '__hash__',
        // 令牌验证的表单隐藏字段名称
        'TOKEN_TYPE'          => 'md5',
        // 令牌验证哈希规则

        'URL_MODEL'           => 1,

        'view_filter'         => array('Behavior\TokenBuildBehavior'),
        'TMPL_PARSE_STRING'   => array(
            '__PLUGINS__' => '/Public/plugins', // 更改默认的/Public 替换规则
            '__JS__'      => '/Public/js', // 增加新的JS类库路径替换规则
            '__UPLOAD__'  => '/uploads', // 增加新的上传路径替换规则
            '__ADMIN__'   => '/Public/admin', // 更改默认的/Public 替换规则
            '__STYLES__'  => '/Public/styles', // 更改默认的/Public 替换规则
        ),
        'SESSION_TYPE'        => 'db',
        'SESSION_EXPIRE'      => 50 * 60,
        //五分钟
        //微博接入
        'WB_AKEY'             => '172869451',
        'WB_SKEY'             => '02f2b70a4e45f42ff3ca40af139738ab',
        'WB_CALLBACK_URL'     => 'http://zhanhao.club/User/third/type/1',
        //QQ接入
        'QQ_APPID'            => '101224170',
        'QQ_APPKEY'           => 'ec32c690dd1b5ee5a5498dbf26dbb8e6',
        'QQ_CALLBACK_URL'     => 'http://zhanhao.club/User/third/type/2',
        //百度接入
        'Baidu_AK'            => 'DGz1CkNaLv463nKiFF2PEgf8',
        'Baidu_SK'            => 'UB1ShUXQMnDornw9yUBcxK9SNlrX714X',
        'Baidu_CALLBACK_URL'  => 'http://zhanhao.club/User/third/type/3',
        'SMS_UID'             => 'hell0wor1d',
        'SMS_PASS'            => 'mkjxg1004',


    );