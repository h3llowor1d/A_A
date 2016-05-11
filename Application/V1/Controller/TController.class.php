<?php
namespace V1\Controller;
use Think\Controller;

class TController extends Controller {

    function index(){
        $this->display();
    }

    function getDistrictByPid(){
        $id = $_GET['id'];
        $model = M('district');
        $list = $model->where("upid=%d",$id)->select();
        $this->ajaxReturn($list);
    }
}
