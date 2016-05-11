<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util;

class TestController extends Controller {

    function indexAction(){
        //phpinfo();exit;
        $m = new \Memcache();
        $m->connect('localhost', 11211);
        $data = 'content'; //需要缓存的数据
        $m->add('mykey', $data);
        echo $m->get('mykey'); // 输出 content
        $m->replace('mykey', 'data'); //替换内容为data
        echo $m->get('mykey');//输出 data
        $m->delete('mykey'); //删除echo $m->get('mykey'); //输出 false 因为已经删掉了哦..
    }


	function addrAction(){
		$model = M('address');
		$list = $model->where('pid=0 AND level=1')->select();
		$this->assign('list',$list);
		$this->display();
	}

    function t1Action(){
        $str = "我是詹灏";
        /*$s = String::isUtf8($str);
        var_dump($s);exit;*/
        $pinyin = Util\Pinyin::getPY($str,'all');
        echo $pinyin;
    }

    function tAction(){
        echo md5(md5("123456")."xcyQAa");
    }

}
