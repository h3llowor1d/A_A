<?php
namespace Admin\Controller;
use Think\Controller;
class CustomerserviceController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");

        $model = M('index');
        $serviceTimeArr = $model->where("k='serviceTime'")->find();
        $serviceTimeArr = unserialize($serviceTimeArr['v']);
        $serviceTime = $serviceTimeArr[ACTION_NAME];
        $this->assign('action',ACTION_NAME);
        $this->assign('serviceTime',$serviceTime);
    }

    function indexAction(){
        $this->redirect("/Admin/Customerservice/online");
    }

    public function onlineAction(){
        $model = M('customerservice');
        $list = $model->where('type="online"')->select();
        $this->assign('list',$list);
        $this->display('index');
    }

    public function telphoneAction(){
        $model = M('customerservice');
        $list = $model->where('type="telphone"')->select();
        $this->assign('list',$list);
        $this->display('index');
    }

    public function updateServiceTimeAction(){
        $model = M('index');
        $serviceTime = $_POST['serviceTime'];
        $type = $_POST['type'];
        $serviceTimeArr = $model->where('k="serviceTime"')->find();
        $serviceTimeArr = unserialize($serviceTimeArr['v']);
        $serviceTimeArr[$type] = $serviceTime;
        $serviceTimeArr = serialize($serviceTimeArr);
        $r = $model->where('k="serviceTime"')->save(array("v"=>$serviceTimeArr));
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>'success')));
        }else{
            exit(json_encode(array('status'=>1,'message'=>'failure')));
        }
    }

    public function updateAction(){
        $model = M('customerservice');
        if(!empty($_POST)){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $number = $_POST['number'];
            $employee = $_POST['employee'];
            $data = array(
                'name'=>$name,
                'number'=>$number,
                'employee'=>$employee
            );

            $r = $model->where('id='.$id)->save($data);
            if($r !== false){
                exit(json_encode(array('status'=>0,"message"=>"更新成功")));
            }else{
                exit(json_encode(array("status"=>1,"message"=>"更新失败")));
            }
        }

    }

    public function addAction(){
        if(!empty($_POST)){
            $model = M('customerservice');
            $name = $_POST['name'];
            $type = $_POST['type'];
            $number = $_POST['number'];
            $employee = $_POST['employee'];
            $data = array(
                'name'=>$name,
                'type' =>$type,
                'number'=>$number,
                'employee'=>$employee
            );

            $r = $model->data($data)->add();
            if($r !== false){
                exit(json_encode(array('status'=>0,'insertId'=>$r,"message"=>"添加成功")));
            }else{
                exit(json_encode(array("status"=>1,"message"=>"添加失败")));
            }
        }
    }

    public function delAction(){
        $id = $_POST['id'];
        $model = M("customerservice");
        $r = $model->delete($id);
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"删除成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"系统故障，请联系管理员")));

    }

}