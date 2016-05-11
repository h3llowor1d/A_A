<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends BaseController{

   function indexAction(){
       layout(true);
       if(isset($_POST['submit'])){
           $username = $_POST['username'];
           $password = $_POST['password'];
           //$Model->where("id=%d and username='%s' and xx='%f'",array($id,$username,$xx))->select();
           $mUser = M('user');
           //$result = $mUser->where("username = '%s' AND password = '%s'",array($username,$password))->count();
           $sql = "select * from db_user where username='".$username."' AND password='".$password."'";
           $result = $mUser->query($sql);
           if(count($result[0])>0){
               $_SESSION['userinfo'] = array(
                   'uid' => $result[0]['id'],
                   'nickname' => $result[0]['nickname'],
                   'headimg' => $result[0]['headimg'],
                   //'call' => $result[0]['sex'] == "男" ? "先生": "女士"
               );
               $this->success('登录成功', '/index');
           }else{
               $this->error("用户名或密码错误",null,1);
           }
       }else{
           $this->display("User/login");
       }
   }
}