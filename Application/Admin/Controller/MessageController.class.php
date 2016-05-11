<?php
namespace Admin\Controller;
use Think\Controller;
class MessageController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $model = M('message');
        $list = $model->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function delAction(){
        $id = $_GET['id'];
        if(empty($id)) exit(json_encode(array('status'=>1,"message"=>"ID不能为空")));
        $model = M("message");
        $r = $model->delete($id);
        if($r !== false) exit(json_encode(array('status'=>0,"message"=>"删除成功")));
    }

}