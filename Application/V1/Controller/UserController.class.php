<?php
    namespace V1\Controller;
    use Think\Controller\RestController;

    class UserController extends RestController {
        protected $allowMethod    = array('get','post','put'); // REST允许的请求类型列表
        protected $allowType      = array('html','xml','json'); // REST允许请求的资源类型列表

        /*public function indexAction() {
            switch ($this->_method){
                case 'get': // get请求处理代码
                    $mUser = M('user');
                    $list = $mUser->select();
                    $data = array(
                        'status' => 0,
                        'content' => $list,
                        'msg' => ''
                    );
                    $this->response($data,$this->_type);
                    break;
                case 'put': // put请求处理代码
                    break;
                case 'post': // post请求处理代码
                    break;
            }
        }*/

        public function list_get_html(){
            $mUser = M('user');
            $list = $mUser->limit(5)->select();
            $data = array(
                'status' => 0,
                'content' => $list,
                'msg' => ''
            );
            //$this->response($data,$this->_type);
            print_r($data);
        }

        public function list_get_xml(){
            $mUser = M('user');
            $list = $mUser->limit(5)->select();
            $data = array(
                'status' => 0,
                'content' => $list,
                'msg' => ''
            );
            $this->response($data,$this->_type);
        }

        public function list_get_json(){
            $mUser = M('user');
            $list = $mUser->limit(5)->select();
            $data = array(
                'status' => 0,
                'content' => $list,
                'msg' => '请求成功'
            );
            $this->response($data,$this->_type);
        }

        public function read_xml(){
            // 输出id为1的Info的XML数据
        }

        public function read_json(){
            // 输出id为1的Info的json数据
        }


        public function add_post(){
            $nickname = $_POST['nickname'];
            $pswd = md5($_POST['pswd']);
            $email = $_POST['email'];
            $data = array(
                'nickname' =>$nickname,
                'password' => $pswd,
                'email' => $email
            );

            $r = M('user')->data($data)->add();
            if($r){
                $this->response(array('status'=>0,'content'=>array('insertedId'=>$r),'msg'=>'增加成功'),'json');
            }else{
                $this->response(array('status'=>-1,'content'=>array('insertedId'=>$r),'msg'=>'添加失败'),'json');
            }
        }
    }
