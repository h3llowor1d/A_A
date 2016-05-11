<?php
    namespace Home\Controller;

    use Think\Controller;

    class RegisterController extends Controller
    {

        function indexAction()
        {
            layout(true);
            if (isset($_POST['submit'])) {
                $username = $_POST['username'];
                $nickname = $_POST['nickname'];
                $password = md5($_POST['password']);
                $Email = $_POST['Email'];
                $QQ = $_POST['QQ'];
                $sex = $_POST['sex'];
                $year = $_POST['year'];
                $month = $_POST['month'];
                $day = $_POST['day'];
                $provice = $_POST['provice'];
                $city = $_POST['city'];
                $town = $_POST['town'];
                $d = array($year, $month, $day);
                $birthday = implode("-", $d);
                $a = array($provice, $city, $town);
                $area = implode(",", $a);

                $time = date('Y');
                $age =date('Y')-$year;

                $sqlinsert = "insert into db_user (nickname,username,password,Email,QQ,sex,age,addtime,birthday,area) values
              ('" . $nickname . "','" . $username . "','" . $password . "','" . $Email . "',$QQ,'" . $sex . "',$age,$time,'" . $birthday . "','" . $area . "')";

                //添加用户信息到数据库

                //返回用户信息字符集
                //$result=mysql_query($sqlinsert);
                $mUser = M('user');

                $sql = "select count(*) count from db_user where username='" . $username . "'";
                $result = $mUser->query($sql);

                //$sql = "select * from db_user where username='".$username."' AND password='".$password."'";
                if ($result[0]['count'] > 0) {
                    $this->error('该用户已存在', null, 1);
                } else {
                    $result = $mUser->execute($sqlinsert);
                    if ($result){
                        $this->success('注册成功,去登陆', 'Login');
                    } else {
                        $this->error("注册失败");
                    }
                }
            } else {
                $this->display("User/register");
            }


        }

    }