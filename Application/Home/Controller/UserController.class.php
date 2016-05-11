<?php
    namespace Home\Controller;

    use Think\Controller;
    use Home\Util;

    class UserController extends BaseController {

        public function __construct() {
            parent::__construct();
            layout("User/layout");
        }

        //退出登录
        function logoutAction() {
            session('userinfo', null);//清空session
            $this->clearCookie();
            $this->success("退出成功", "/Index", 1);
        }

        //usercenter
        function ucAction() {
            $mUser = M('user');
            $uid = $this->uid;

            $sql = "SELECT COUNT(*) AS 'count' FROM db_artical WHERE u_id = $uid UNION ALL
                    SELECT COUNT(*)   FROM db_album WHERE u_id = $uid UNION ALL
                    SELECT COUNT(*)   FROM db_photo WHERE u_id = $uid";
            $result = $mUser->query($sql);
            $userInfo = $mUser->where("id=%d", $uid)->find();
            $this->assign('userInfo', $userInfo);
            $this->assign('countInfo', $result);
            $this->display();
        }

        function loginAction() {
            if(isset($_POST['submit'])) {
                $email = $_POST['email'];
                $password = md5($_POST['password']);
                $yzm = $_POST['yzm'];

                if($yzm && strtolower($yzm) !== strtolower($_SESSION['yzm'])) {
                    $this->error("验证码错误", null, 1);
                }

                //$Model->where("id=%d and username='%s' and xx='%f'",array($id,$username,$xx))->select();
                $mUser = M('user');
                //$result = $mUser->where("username = '%s' AND password = '%s'",array($username,$password))->count();
                $sql = "select * from db_user where email='".$email."' AND password='".$password."'";

                $result = $mUser->query($sql);
                if(count($result[0]) > 0) {
                    $_SESSION['userinfo'] = array(
                        'uid'      => $result[0]['id'],
                        'nickname' => $result[0]['nickname'],
                        'avatar'   => $result[0]['headimg']
                    );
                    $this->setCookies($email,$password,3600*24*10);
                    $this->success('登录成功', '/User/uc');
                } else {
                    $this->error("用户名或密码错误", null, 1);
                }
            } else {
                layout('layout');
                $this->display("User/login");
            }
        }


        //验证邮箱是否唯一
        function checkEmailAction() {
            $email = $_POST['email'];
            $mUser = M('user');

            $sql = "select count(*) count from db_user where email='".$email."'";
            $result = $mUser->query($sql);

            if($result[0]['count'] > 0) {
                $result = array(
                    'status' => 1
                );
            } else {
                $result = array(
                    'status' => 0
                );
            }

            echo json_encode($result);
        }


        function profileAction() {

            $uid = $this->uid;
            $mUser = M('user');
            $userInfo = $mUser->where('id = %d', $uid)->find();
            if(!$userInfo['headimg']) {
                $userInfo['headimg'] = "/uploads/image/avatar.jpg";
            }

            //print_r($userInfo);exit;
            $this->assign('userInfo', $userInfo);
            $this->display();
        }

        function getYZMAction() {
            $yzm = new Util\Yzm(4);
            $yanzm = $yzm->getYZM();
            $_SESSION['yzm'] = $yanzm;
        }

        function registerAction() {
            if(isset($_POST['submit'])) {
                $nickname = $_POST['nickname'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $headimg = "/uploads/image/avatar.jpg";
                $time = time();
                $yzm = $_POST['yzm'];
                $email = trim($email);
                if(empty($email)) {
                    $this->error("邮箱必须填写", null, 1);
                }

                $regEmail = '/^\w+([-.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
                $r = preg_match($regEmail, $email);
                if(!$r) {
                    $this->error("邮箱格式不正确", null, 1);
                }

                if(empty($nickname)) {
                    $this->error("昵称必须填写", null, 1);
                }
                if(mb_strlen($nickname, 'utf-8') < 4 || mb_strlen($nickname, 'utf-8') > 20) {
                    $this->error("昵称长度必须在4到20位之间", null, 1);
                }

                if(empty($password)) {
                    $this->error("密码必须填写", null, 1);
                }
                if(strlen($password) < 6 && strlen($password) < 16) {
                    $this->error("密码必须大于6位,小于16位", null, 1);
                }


                if($yzm && strtolower($yzm) !== strtolower($_SESSION['yzm'])) {
                    $this->error("验证码错误", null, 1);

                }

                //添加用户信息到数据库
                //$result=mysql_query($sqlinsert);
                $password = md5($password);
                $mUser = M('user');
                $sql = "select count(*) count from db_user where email='".$email."'";
                $result = $mUser->query($sql);

                if($result[0]['count'] > 0) {
                    $this->error('该用户已存在', null, 1);
                } else {
                    $expire = 7200; //2个小时
                    $expire = $expire + time();
                    $o = new Util\Yzm(6);
                    $activecode = md5($o->getRandStr());
                    $sqlinsert = "insert into db_user (email,nickname,password,headimg,addtime,activecode,expire)
                      values ('".$email."','".$nickname."','".$password."','".$headimg."',".$time.",'".$activecode."',".$expire.")";

                    $result = $mUser->execute($sqlinsert);

                    if($result) {
                        $id = $mUser->query("select LAST_INSERT_ID() as id");
                        $this->sendActiveEmail($email,$activecode,$id[0]['id']);
                        $this->redirect('/User/register?step2');
                    } else {
                        $this->error("注册失败");
                    }
                }

            } else {
                if(isset($_GET['step2'])){
                    $this->display("User/sendEmailSuccess");
                }

                $this->display("User/register");
            }
        }

        public function activeAction(){
            $id = !empty($_REQUEST['id']) ? $_REQUEST['id'] : -1;
            $ac = !empty($_REQUEST['code']) ? $_REQUEST['code'] : "";

            if($id == -1){
                $this->error('该用户不存在','/',1);
            }

            if($ac == ""){
                $this->error('激活码不能为空','/',1);
            }

            $mUser = M('user');
            $re = $mUser->where('id = %d',$id)->find();

            if($re['status']){
                $this->error('您已经激活过了','/',1);
            }

            if($re['expire'] < time()){
                $this->error('该链接已经过期','/',1);
                $this->display('activeFail');
                exit;
            }

            if($ac != $re['activecode']){
                $this->error('激活码不正确','/',1);
            }

            $sql = "update db_user set status = 1 where id = ".$id;
            $r = $mUser->execute($sql);
            if($r){
                $this->display('activeSuccess');
            }


        }

        private function sendActiveEmail($who,$activecode,$id){
            $mail  = new Util\Mail();
            $server = "smtp.qq.com";
            $port = 465; //587  465
            $username = "mike123go@vip.qq.com";//smtp.sina.com mike123go@vip.qq.com
            $password = "zhanhao0926";
            $subject = "激活邮件[from zhanhao.club]";
            $body = '激活链接：<br><a href="http://zhanhao.club/User/active/id/'.$id.'/code/'.$activecode.'">http://zhanhao.club/User/active/id/'.$id.'/code/'.$activecode.'</a>';
            $mail->setServer($server, $username, $password, $port, true);
            $mail->setFrom($username);
            $mail->setReceiver($who);
            $mail->setMail($subject, $body);
            $mail->sendMail();

        }

        public function sendEmailAction() {
            $mail = new Util\Mail();
            $server = "smtp.qq.com"; //smtp.qq.com
            $port = 587; //587  465
            $username = "mike123go@vip.qq.com";//smtp.sina.com mike123go@vip.qq.com
            $password = "zhanhao0926";
            $subject = "Attention This is a test text";
            $body = "from zhanhao.club <br> at ".date("Y-m-d H:i:s");
            $mail->setServer($server, $username, $password, $port,true);
            $mail->setFrom($username);
            $mail->setReceiver("1280071341@qq.com");
            $mail->setMail($subject, $body);
            $mail->sendMail();
            echo "send success";
        }

        public function sendEmail2Action() {
            $mail = new Util\Mail2();
            $server = "smtp.qq.com"; //smtp.qq.com
            $port = 465; //587  465
            $username = "mike123go@vip.qq.com";//smtp.sina.com mike123go@vip.qq.com
            $password = "zhanhao0926";
            $subject = "Attention mail2 This is a test text";
            $body = "from zhanhao.club <br> at ".date("Y-m-d H:i:s");
            $mail->setServer($server, $username, $password, $port, true);
            $mail->setFrom($username);
            $mail->setReceiver("1280071341@qq.com");
            $mail->setMail($subject, $body);
            $mail->sendMail();
        }




        public function thirdpartyAction() {
            $type = !empty($_REQUEST['type'])?$_REQUEST['type']:exit('参数错误');

            switch($type){
                case 'weibo':
                    $o = new Util\Weibo(C('WB_AKEY'), C('WB_SKEY'));
                    $code_url = $o->getAuthorizeURL(C('WB_CALLBACK_URL'));
                    header("Location:$code_url");
                    break;
                case 'qq':
                    $o = new Util\QQ(C('QQ_APPID'), C('QQ_APPKEY'));
                    $code_url = $o->getAuthorizeURL(C('QQ_CALLBACK_URL'));
                    header("Location:$code_url");
                    break;
                default:
                    exit("参数错误");
                    break;
            }
        }

        public function thirdAction() {
            $type = !empty($_REQUEST['type'])?$_REQUEST['type']:exit('参数错误');

            switch($type){
                case '1':
                    $o = new Util\Weibo(C('WB_AKEY'), C('WB_SKEY'));
                    if(isset($_REQUEST['code'])) {
                        $keys = array();
                        $keys['code'] = $_REQUEST['code'];
                        $keys['redirect_uri'] = C('WB_CALLBACK_URL');
                        try {
                            $token = $o->getAccessToken('code', $keys);
                        } catch(Exception $e) {
                        }
                    }

                    if($token){
                        $client = new Util\SaeTClientV2(C('WB_AKEY'), C('WB_SKEY'), $token['access_token']);
                        $uidArr = $client->get_uid();
                        if(isset($uidArr['uid']) && $uid = $uidArr['uid']) {
                            $mUserWeibo = M('user_third');
                            $data = $mUserWeibo->where('openid="%s"', $uid)->find();

                            if($data) {
                                $userInfo = array();
                                $userInfo['uid'] = $uid;
                                $userInfo['nickname'] = $data['nickname'];
                                $userInfo['avatar'] = $data['avatar_large'];
                                $_SESSION['userinfo'] = $userInfo;
                            } else {
                                $userInfo = $client->show_user_by_id($uid);
                                if(isset($userInfo['error'])) {
                                    print_r($userInfo);
                                    exit;
                                }

                                $data = array(
                                    'openid'           => $uid,
                                    'nickname'         => $userInfo['name'],
                                    'province'      => $userInfo['province'],
                                    'city'         => $userInfo['city'],
                                    'gender'         => $userInfo['gender'],
                                    'type'         => 'weibo',
                                    'location'     => $userInfo['location'],
                                    'description'  => $userInfo['description'],
                                    'avatar_large' => $userInfo['avatar_large'],
                                    'avatar_hd'    => $userInfo['avatar_hd'],
                                    'created_at'   => time()
                                );

                                if($mUserWeibo->data($data)->add()) {
                                    $userInfo['uid'] = $uid;
                                    $userInfo['nickname'] = $data['name'];
                                    $userInfo['avatar'] = $data['avatar_large'];
                                    $_SESSION['userinfo'] = $userInfo;
                                }
                            }
                        }

                    }
                    break;

                case "2":
                    $qq = new Util\QQ(C('QQ_APPID'), C('QQ_APPKEY'));
                    if(isset($_REQUEST['code'])) {
                        $keys = array();
                        $keys['code'] = $_REQUEST['code'];
                        $keys['redirect_uri'] = C('QQ_CALLBACK_URL');
                        try {
                            $token = $qq->getAccessToken('code', $keys);
                        } catch(\Think\Exception $e) {
                            print_r($e);
                        }
                    }

                    if($token) {
                        $client = new Util\QQ(C('QQ_APPID'), C('QQ_APPKEY'), $token['access_token']);
                        $params = array(
                            'access_token' =>$token['access_token']
                        );
                        $openidArr = $client->getOpenid('https://graph.qq.com/oauth2.0/me',$params);

                        $openid = $openidArr['openid'];
                        $mUserThird = M('user_third');
                        $data = $mUserThird->where('openid="%s"', $openid)->find();
                        if(empty($data)){
                            $params['oauth_consumer_key'] = C('QQ_APPID');
                            $params['openid'] = $openid;
                            $params['format'] = "json";
                            $userInfo = $client->getUserInfo($params);

                            if($userInfo){
                                $data = array(
                                    'openid'           => $openid,
                                    'nickname'         => $userInfo['nickname'],
                                    'province'      => $userInfo['province'],
                                    'city'         => $userInfo['city'],
                                    'type'         => 'qq',
                                    'vip' => $userInfo['vip'],
                                    'gender'         => $userInfo['gender'] !== '男'?$userInfo['gender'] == '女'?'f':'n':'m',//$y !== '男'? $y == '女'?'f':'n':'m';
                                    'location'     => $userInfo['provice']." ".$userInfo['city'],
                                    'avatar_large' => $userInfo['figureurl_qq_1'],
                                    'avatar_hd'    => $userInfo['figureurl_qq_2'],
                                    'created_at'   => time()
                                );
                                if($mUserThird->data($data)->add()){
                                    $userInfo = array(
                                        'uid' => $openid,
                                        'nickname' => $userInfo['nickname'],
                                        'avatar' => $userInfo['figureurl_qq_2'],
                                    );
                                    $_SESSION['userinfo'] = $userInfo;
                                }
                            }
                        }else{
                            $userInfo = array(
                                'uid' => $openid,
                                'nickname' => $data['nickname'],
                                'avatar' => $data['avatar_hd'],
                            );
                            $_SESSION['userinfo'] = $userInfo;
                        }
                    }
                    break;
            }

            $this->redirect("/");
        }
    }
