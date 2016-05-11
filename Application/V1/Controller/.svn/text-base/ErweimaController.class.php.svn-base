<?php
namespace Home\Controller;
use Think\Controller;

class TController extends Controller {

    function indexAction(){
        $y = "女";
        $x = $y == '男'?'m': $y == '女'?'f':'n';
        echo $x;
    }

    /*
     *
     *
     *
    private $config;
	private $loginURL;
	private $http;
	public function Login()
	{
		$this->config = require('config.php');
	    $this->loginURL = 'http://www.51.la/report/0_help.asp?uname=&upass=&id='.$this->config['id'].'&t=guanlogin&pass='.$this->config['password'];
		$this->http = new Http();
		$this->loginUser();
	}
	private function loginUser()
	{
		 return  $this->http->get($this->loginURL);
	}
	public function getTxt()
	{
		$urlArr = array();
		date_default_timezone_set('PRC');
		//获取6天前的时间戳
		$day7 = mktime(0,0,0,date("m"),date("d")-6,date("Y"));
		$rt = $this->http->get('http://www.51.la/report/3_Keyword.asp?id='.$this->config['id'].'&ord=k_ci&d1='.date('Y-m-d',$day7).'&d2='.date('Y-m-d'));
		$Q = new QueryList($rt,array('txt_down_url'=>array('.bodys_zw:eq(0)>div:last>a:eq(0)','href')),'#bodys','',false);

		if(count($Q->jsonArr))
		{
			$downURL = 'http://www.51.la/report/'.$Q->jsonArr[0]['txt_down_url'];
			$txt = $this->http->get($downURL);
			$urlArr = Util::getAllURL($txt);
		}
		return $urlArr;
	}
     */
}



class member {
    var $ck = 'Dxe8SqIcmyUf';
    var $db;  //传入PDO对象
    var $mid; //会员ID

    public $scr; //cookie 安全码  $_COOKIE['scr']
    public $user;//cookie User   $_COOKIE['user']

    public $srpwd;//执行checkcookie后方可调用

    function __construct() {
        if(!empty($_COOKIE['scr'])) {
            $this->scr = $_COOKIE['scr'];
        }
        if(!empty($_COOKIE['user'])) {
            $this->user = $_COOKIE['user'];
        }
    }


    /**
     * 检测cookie
     */
    public function checkcookie() {
        $uname = $this->user;
        $hash = $this->scr;

        if(!empty($uname) && !empty($hash)) {
            if(preg_match("/[<|>|#|$|%|^|*|(|)|{|}|'|\"|;|:]/i", $uname) || preg_match("/[<|>|#|$|%|^|*|(|)|{|}|'|\"|;|:]/i", $hash)) {
                $this->mid = 0;
                return false;
            } else {
                $sql = "select username,password from users where username='$uname'";
                $rs = $this->db->query($sql);
                $row = $rs->fetch();
                $scr = $this->makescr($row['username'], $row['password']);

                if($hash == $scr) {
                    $this->srpwd = $row['password'];
                    return true;
                } else {
                    return false;
                }
            }//cookie安全
        } else {
            return false;
        }//exit
    }//function checkcookie

    /**
     * putcookie
     *
     * 登陆成功后放置cookie，包含安全码
     *
     * @param String $uname
     * @param String $pwd
     * @param Int $time
     */
    public function putcookie($uname, $pwd, $time = 604800) {
        try {
            $scrString = $this->makescr($uname, $pwd);

            if(!is_numeric($time)) {
                $time = 604800;
            }

            setcookie('user', $uname, time() + $time, '/');
            setcookie('scr', $scrString, time() + $time, '/');

            return true;
        } catch(Exception $e) {
            return false;
        }

    }//function putcookie

    /**
     * 生成安全码
     *
     * @param String $u
     * @param String $p
     */
    public function makescr($u, $p) {
        return substr(md5($u.$p.$this->ck), 3, 20);
    }

}