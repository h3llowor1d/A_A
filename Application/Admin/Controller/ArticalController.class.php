<?php
namespace Admin\Controller;
use Think\Controller;
class ArticalController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $model = M('artical');
        $count = $model->count();
        $pager = new \Think\Page($count,10);
        $pageHtml = $pager->show();
        $list = $model->limit($pager->firstRow,$pager->listRows)->select();
        $this->assign('list',$list);
        $this->assign('pageHtml',$pageHtml);
        $this->display('list');
    }

    public function updateAction(){
        if(empty($_POST)){
            $id = $_GET['id'];
            if(intval($id)){
                $data = M('artical')->where('id=%d',$id)->find();
                if($data){
                    $data['img'] = !empty($data['img'])?$data['img']:C('default_img');
                    $this->assign('data',$data);
                    $this->display();
                }else{
                    $this->error('数据已经被删除','/Admin',1);
                }
            }else{
                $this->error('未传入有效ID','/Admin',1);
            }
        }else{
            $id = $_POST['id'];
            $img = $_POST['img'];
            $title = $_POST['title'];
            $desc = mb_substr($_POST['desc'],0,200,'utf-8');
            $content = htmlspecialchars($_POST['content']);
            $data = array(
                'desc' =>$desc,
                'title' =>$title,
                'img' => $img,
                'content' => $content
            );
            $r = M('artical')->where('id=%d',$id)->save($data);
            if($r !== false){
                $this->ajaxReturn(array('status'=>0,'message'=>"更新成功"));
            }else{
                $this->ajaxReturn(array('status'=>1,'message'=>"更新失败"));
            }
        }
    }

    private function cache($id){
        if(empty($id)) return false;
        $data = M('artical')->field("a.*,u.nickname,u.realname")
            ->alias('a')->join("LEFT JOIN db_user u on u.id = a.u_id")->where(array('a.id'=>$id))->select();

        if(count($data)){
            $this->data = $data[0];
        }else{
            $this->error('参数错误!',"/Blog/list");
        }
    }

    public function addAction(){
        if(!empty($_POST)){
            $desc = mb_substr($_POST['desc'],0,200,'utf-8');
            $content = htmlspecialchars($_POST['content']);
            $img = $_POST['img'];
            $title = $_POST['title'];
            $t = $_POST['tid'];
            $data = array(
                'typeid' => $t,
                'desc' =>$desc,
                'title' =>$title,
                'img' => $img,
                'content' => $content,
                'created' => time()
            );

            $r = M('about')->data($data)->add();
            if($r !== false){
                $this->ajaxReturn(array('status'=>0,'message'=>"添加成功"));
            }else{
                $this->ajaxReturn(array('status'=>1,'message'=>"添加失败"));
            }
        }else{
            $t = intval($_GET['t']);
            if(empty($t)) $this->error("参数错误","/Admin",1);
            $tdata = M('about_type')->where('id='.$t)->find();
            $this->assign('tdata',$tdata);
            $this->display();
        }
    }

    public function delAction(){
        $id = intval($_GET['id']);
        if(empty($id)) $this->ajaxReturn(array('status'=>1,'message'=>'ID参数错误'));
        $model = M("about");
        $r = $model->delete($id);
        if($r !== false)
            $this->ajaxReturn(array('status'=>0,'message'=>''));
        $this->ajaxReturn(array('status'=>2,'message'=>'系统故障'));
    }

}