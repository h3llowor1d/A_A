<?php
namespace V1\Controller;
use Think\Controller;
class BaseController extends Controller {
    protected $uid;
    private $scr; //cookie 安全码  $_COOKIE['scr']
    private $user;//cookie User   $_COOKIE['user']
    private $safe_code;
    private $cookie_pre;


    function __construct(){
        session_start();
        parent::__construct();
        $this->getCookies();
        $this->setActive();
        $this->getOnlineCount();
        $this->checkCookies();
        $this->isLogin();
    }

    private function getCookies(){
        $this->safe_code = C("COOKIE_SAFE");
        $this->cookie_pre = C("COOKIE_PREFIX");

        if(!empty($_COOKIE[$this->cookie_pre.'scr'])) {
            $this->scr = $_COOKIE[$this->cookie_pre.'scr'];
        }
        if(!empty($_COOKIE[$this->cookie_pre.'user'])) {
            $this->user = $_COOKIE[$this->cookie_pre.'user'];
        }


    }

    protected function clearCookie(){
        setcookie($this->cookie_pre."user","",time()-3600,"/");
        setcookie($this->cookie_pre."scr","",time()-3600,"/");
    }

    //不同标签是否选中
    protected function setActive(){
        $page = array(
            'controller' => CONTROLLER_NAME,
            'action' => ACTION_NAME
        );

        $this->assign('page',$page);
    }

    private function isLogin(){
        $this->uid = $_SESSION['userinfo']['uid'];//I('session.uid',0);
        if($this->uid){
            $this->assign('userinfo',$_SESSION['userinfo']);
            return;
        }else{
            $controller = strtolower(CONTROLLER_NAME); //获取当前控制器名
            $action = strtolower(ACTION_NAME); //获取当前方法名
            $ingore = array(
                array('controller' => 'login','action'=> "index"),
                array('controller' => 'blog','action'=> "list"),
                array('controller' => 'blog','action'=> "detail"),
                array('controller' => 'blog','action'=> "comment"),
                array('controller' => 'index','action'=> "index"),
                array('controller' => 'user','action'=> "logout"),
                array('controller' => 'user','action'=> "register"),
                array('controller' => 'user','action'=> "login"),
                array('controller' => 'chat','action'=> "index"),
                array('controller' => 'photo','action'=> "index"),
                array('controller' => 'photo','action'=> "wall"),
                array('controller' => 'user','action'=> "getyzm"),
                array('controller' => 'user','action'=> "sendemail"),
                array('controller' => 'user','action'=> "sendemail2"),
                array('controller' => 'user','action'=> "third"),
                array('controller' => 'user','action'=> "weibo"),
                array('controller' => 'user','action'=> "active"),
                array('controller' => 'user','action'=> "thirdparty"),
                array('controller' => 'bookmark','action'=> "index"),
            );
            $flag = false;
            foreach($ingore as $v){
                if($controller == $v['controller'] && $action == $v['action']){
                    $flag = true;
                    break;
                }
            }
            if(!$flag)
                $this->error('您未登陆或已过期，请登录','/User/login',1);
        }
    }

    private function getOnlineCount(){
        $mSession = M('session');
        $allCount = $mSession->count();
        $memberCount = $mSession->where('session_data != ""')->count();
        $visitorCount = $allCount - $memberCount;
        $this->assign('onlineCount',array(
            'allCount' => $allCount,
            'memberCount' => $memberCount,
            'visitorCount' => $visitorCount
        ));
    }

    /**
     * 检测cookie
     */
    public function checkCookies() {
        $uname = $this->user;
        $hash = $this->scr;

        //$uname
        if(!empty($uname) && !empty($hash)) {
            if(preg_match("/[<|>|#|$|%|^|*|(|)|{|}|'|\"|;|:]/i", $uname) || preg_match("/[<|>|#|$|%|^|*|(|)|{|}|'|\"|;|:]/i", $hash)) {
                $this->uid = 0;
                return false;
            } else {
                $mUser = M('user');
                $row = $mUser->where('email = "%s"',$uname)->find();
                $scr = $this->makescr($row['email'], $row['password']);
                if($hash == $scr) {
                    //$this->srpwd = $row['password'];
                    $_SESSION['userinfo'] = array(
                        'uid'      => $row['id'],
                        'nickname' => $row['nickname'],
                        'avatar'   => $row['headimg']
                    );

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
    public function setCookies($uname, $pwd, $time = 604800) {
        try {
            $scrString = $this->makescr($uname, $pwd);
            if(!is_numeric($time)) {
                $time = 604800;
            }

            setcookie($this->cookie_pre.'user', $uname, time() + $time, '/');
            setcookie($this->cookie_pre.'scr', $scrString, time() + $time, '/');
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
        return substr(md5($u.$p.$this->safe_code), 3, 20);
    }

}