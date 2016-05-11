<?php
namespace Admin\Controller;
use Think\Controller;
class ServiceController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function networkAction(){
        $model = M('network');
        $list = $model->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function updateAddressAction(){
        if(IS_POST){
            $id = $_POST['id'];
            $address = $_POST['address'];
            $telphone = $_POST['telphone'];
            $fax = $_POST['fax'];

            $data = array(
                'address' => $address,
                'telphone'=> $telphone,
                'fax' => $fax
            );

            $r = M('network')->where('id= %d',$id)->save($data);
            if($r !== false){
                $this->ajaxReturn(array('status'=>0));
            }

            $this->ajaxReturn(array('status'=>1));
        }
    }

    public function contactAction(){
        $model = M('about');
        $tdata = M('about_type')->where('module=6 AND quantity="one"')->find();
        if($tdata){
            $data = $model->field("a.*,at1.typename")->alias("a")->join("LEFT JOIN db_about_type at1 ON a.typeid = at1.id")->where('at1.id = '.$tdata['id'])->find();
        }else{
            $this->error('系统错误','/Admin',1);
        }
        $this->assign('data_exist',!empty($data)?"1":"0");
        $data['imgr'] = $data['img'];
        $data['img'] = !empty($data['img'])?$data['img']:"/Public/images/qianyi.jpg";
        $this->assign('data',$data);
        $this->assign('tdata',$tdata);
        $this->display();
    }

}