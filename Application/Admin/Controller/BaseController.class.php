<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {

    public function __construct(){
        session_start();

        parent::__construct();
        $this->isLogin();
        //$this->getLeftList();
        $this->setActive();
    }

    protected function isLogin(){
         if(!(isset($_SESSION['adminInfo']) && !empty($_SESSION['adminInfo']))){
             $this->error("请登录",'/Admin/Login',1);
         }else{
             $this->assign('adminInfo',$_SESSION['adminInfo']);
         }
    }

    protected function setActive(){
        $controller = CONTROLLER_NAME;
        $action = ACTION_NAME;
        $id = $_GET['id'];

        $activeArr = array(
            'controller' =>$controller,
            'action' => $action,
            'id' => $id
        );

        $this->assign('activeArr',$activeArr);
    }

    protected function getLeftList(){
        $model = M('about');
        $aboutList = $model->select();
        $this->assign("aboutList",$aboutList);

        $model = M('product');
        $productList = $model->select();
        $this->assign("productList",$productList);

        $model = M('about_type');
        $qianyi = $model->where('module=1')->order("`order`,id")->select();
        $this->assign("qianyi",$qianyi);

        $model = M('about_type');
        $joinList = $model->where('module=5')->order("`order`")->select();
        $this->assign("joinList",$joinList);

        $successList = $model->where('module=3')->order("`order`,id")->select();
        $this->assign("successList",$successList);

    }

}