<?php
    namespace Admin\Controller;

    use Think\Controller;

    class LoginController extends Controller {

        public function indexAction() {

            if (isset($_POST['submit'])) {
                session_start();
                $email = $_POST['email'];
                $password = $_POST['passowrd'];

                $mAdmin = M('admin');

                $r = $mAdmin->where('username = "%s"',$email)->find();


                if($r){
                    $encrypt = $r['encrypt'];
                    $password = md5(md5($password).$encrypt);
                    $r = $mAdmin->where('username = "%s" AND password = "%s"',array($email,$password))->find();

                    //print_r($r);exit;
                    if(!$r){
                        $this->error("密码错误",null,1);
                    }
                }else{
                    $this->error("该用户不存在",null,1);
                }

                $r = $mAdmin->where('username = "%s" AND password = "%s"',array($email,$password))->find();
                if($r){
                    $_SESSION['adminInfo'] = $r;
                    //$this->redirect('/Admin');
                    $ip = $_SERVER['REMOTE_ADDR'];

                    $time = time();
                    $sql = "Update db_admin set lastloginip='".$ip."'".',lastlogintime = '.$time.' where userid = '.$r['userid'];

                    $mAdmin->execute($sql);
                    $this->success("登陆成功","/Admin",1);
                }else{
                    $this->error("xxx",null,1);
                }

            } else {
                $this->display();
            }

        }


        public function logoutAction(){
            session_start();
            session('adminInfo', null);//清空session
            $this->redirect("/Admin/Login");

        }

    }