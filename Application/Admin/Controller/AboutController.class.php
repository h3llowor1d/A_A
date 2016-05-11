<?php
namespace Admin\Controller;
use Think\Controller;
class AboutController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }


    public function typeAction(){
        $t = intval($_GET['t']);
        if(empty($t)) $this->error("参数错误","/Admin",1);
        $model = M('about_type');
        $list = $model->where("module=".$t)->order('`order`,id DESC')->select();
        $this->assign('list',$list);
        $this->assign('t',$t);
        $this->display();
    }

    public function addTypeAction(){
        if(!empty($_POST)){
            $typename = $_POST['typename'];
            $order = empty($_POST['order'])?1:$_POST['order'];
            $quantity = $_POST['quantity'];
            $t = $_POST['t'];
            $data = array(
                'module' => $t,
                'typename' =>$typename,
                'quantity' =>$quantity,
                'order' => $order
            );

            $r = M('about_type')->data($data)->add();
            if($r !== false){
                $this->ajaxReturn(array('status'=>0,'message'=>"添加成功"));
            }else{
                $this->ajaxReturn(array('status'=>1,'message'=>"添加失败"));
            }
        }else{
            $this->display();
        }
    }

    public function updateTypeAction(){
        if(!empty($_POST)){
            $id = $_POST['id'];
            $typename = $_POST['typename'];
            $quantity = $_POST['quantity'];
            $order = $_POST['order'];
            $data = array(
                'typename' =>$typename,
                'quantity' =>$quantity,
                'order' => $order
            );

            $r = M('about_type')->where("id=".$id)->save($data);
            if($r !== false){
                $this->ajaxReturn(array('status'=>0,'message'=>"更新成功"));
            }else{
                $this->ajaxReturn(array('status'=>1,'message'=>"更新失败"));
            }
        }else{
            $this->redirect("/Admin");
        }
    }

    public function postAction(){
        $title = $_POST['title'];
        $content = htmlspecialchars($_POST['content']);
        $img = $_POST['img'];
        $desc = mb_substr($_POST['desc'],0,300,'utf-8');
        $model = M('about');
        $data = array(
            'title' => $title,
            'desc' => $desc,
            'img' => $img,
            'content' => $content
        );

        $r = $model->data($data)->add();
        if($r !== false){
            exit(json_encode(array('status'=>0,'insertId'=>$r,'message'=>"添加成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"添加失败")));
    }

    public function updateAction(){
        $model = M('about');
        if(!empty($_POST)){
            $id = $_POST['id'];
            $img = $_POST['img'];
            if($id == 1){
                $desc = mb_substr($_POST['desc'],0,288,'utf-8');
            }else{
                $desc = mb_substr($_POST['desc'],0,300,'utf-8');
            }

            $content = htmlspecialchars($_POST['content']);

            $data = array(
                'img'=>$img,
                'desc' => $desc,
                'content' => $content
            );

            $r = $model->where('id='.$id)->save($data);
            if($r !== false){
                exit(json_encode(array('status'=>0,"message"=>"更新成功")));
            }else{
                exit(json_encode(array("status"=>1,"message"=>"更新失败")));
            }
        }
    }


    public function delAction(){
        $id = $_GET['id'];
        if(empty($id)) $this->error("/Admin/About","ID不能为空",1);
        $model = M("about");
        $r = $model->delete($id);
        if($r !== false)
            $this->redirect("/Admin/About");
    }

    public function delTypeAction(){
        $id = $_GET['id'];
        if(empty($id)) $this->error("/Admin/About","ID不能为空",1);
        $r = M('about')->where('typeid = %d',$id)->delete();
        $model = M("about_type");
        $r1 = $model->delete($id);
        if($r !== false && $r1 !== false)
            $this->ajaxReturn(array('status'=>0,'message'=>'删除成功'));

        $this->ajaxReturn(array('status'=>1,'message'=>'系统故障'));
    }

}