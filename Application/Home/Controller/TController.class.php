<?php
namespace Home\Controller;
use Think\Controller;
use Org\Util;

class TController extends Controller {

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


    function t1Action(){
        $str = "我是詹灏";
        $pinyin = Util\Pinyin::getPY($str,'all');
        echo $pinyin;
    }

    function tAction(){
        if (function_exists('bcscale')) {
            bcscale(7);
        }

    }
	
	function t100Action(){
		$params = [20,3,132,22];
        $arr = range(0, 100, 2);
		print_r($arr);
    }
	
	function t101Action(){
		$array = array(0 => 100, "color" => "red");
		print_r(array_keys($array));

		$array = array("blue", "red", "green", "blue", "blue");
		print_r(array_keys($array, "blue"));
		
		$array = array("blue", "red", "green", "blue", "blue");
		print_r(array_keys($array));

		$array = array("color" => array("blue", "red", "green"),
					   "size"  => array("small", "medium", "large"));
		print_r(array_keys($array));
	}
	
    function t2Action(){
        $arr1 = array(
            'op1' => "",
            'op2' => "",
            'op3' => "",
            'op4' => "",
            'op5' => "",
        );

        $arr2 = array(
            'op2' => 'click',
            'op5' => array(
                'op6' => 'ss',
                'op7' => 'mmm'
            )
        );

        $r = $this->zbx_array_merge($arr1,$arr2);

        print_r($r);
    }
	
	function t3Action(){
		$a1 = "sss";
		$a2 = [1,2,3];
		$e1 = 1;
		$e2 = 0;
		
		$this->_ex($a1,0);
		$this->_ex($a2,0);
		$this->_ex($a1);
	}
	
	function _ex($str = "",$exit = true){
        static $cnt = 1;
        if(is_array($str) && $exit){
            print_r($str);
            echo "<br>";
            exit ("Step ".$cnt." array data above -- ".date("m-d H:i:s")." <br>");
        }elseif(is_array($str) && !$exit){
            print_r($str);
            echo "<br>";
            echo ("Step ".$cnt." array data -- ".date("m-d H:i:s")." <br>");
        }elseif($exit){
            exit ("Step ".$cnt." >> ".$str." -- ".date("m-d H:i:s")." <br>");
        }else{
            echo ("Step ".$cnt." >> ".$str." -- ".date("m-d H:i:s")." <br>");
        }

        $cnt++;
    }
	
    // preserve keys
    function zbx_array_merge() {
        $args = func_get_args();
        $result = array();
        foreach($args as &$array) {
            if (!is_array($array)) {
                return false;
            }
            foreach($array as $key => $value) {
                $result[$key] = $value;
            }
        }

        return $result;
    }



}
