<?php
namespace Admin\Controller;
use Think\Controller;
class NewsController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $mNews = M('news');
        $list = $mNews->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function addAction(){
        $this->display();
    }

    public function postAction(){
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $content = $_POST['content'];
        $reg = "/<img src=\"(.*?)\"/";
        $matchs = array();
        if(preg_match($reg,$content,$matchs)){
            $pic = $matchs[1];
        }else{
            $pic = "";
        }

        $mNews = M('news');
        $data = array(
            'uid' => 10001,
            'title' => $title,
            'pic' => $pic,
            'desc' => $desc,
            'content' => $content,
            'created' => time()
        );

        $r = $mNews->data($data)->add();
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"添加成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"添加失败")));
    }

    public function updateAction(){
        $mNews = M('news');
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            $content = $_POST['content'];
            $reg = "/<img src=\"(.*?)\"/";
            if(preg_match($reg,$content,$matchs)){
                $pic = $matchs[1];
            }else{
                $pic = "";
            }

            $data = array(
                'uid' => 10001,
                'title' => $title,
                'pic' => $pic,
                'desc' => $desc,
                'content' => $content
            );

            $r = $mNews->where('id='.$id)->save($data);
            if($r !== false){
                exit(json_encode(array('status'=>0,"message"=>"更新成功")));
            }else{
                exit(json_encode(array("status"=>1,"message"=>"更新失败")));
            }
        }else{
            $id = $_GET['id'];
            if(!$id) $this->error("/Admin/News","ID不存在",1);
            $data = $mNews->where("id=".$id)->find();
            if(!$data){
                $this->error("/Admin/News","数据不存在",1);
            }

            $this->assign("data",$data);
            $this->display();
        }

    }


    public function delAction(){
        $id = $_GET['id'];
        if(empty($id)) exit(json_encode(array('status'=>1,"message"=>"ID不能为空")));

        $mNews = M("news");
        //$data = $mNews->where("id=".$id)->find();
        //if(!$data) exit(json_encode(array('status'=>1,"message"=>"")));
        $r = $mNews->delete($id);
        if($r !== false) exit(json_encode(array('status'=>0,"message"=>"删除成功")));
    }

}