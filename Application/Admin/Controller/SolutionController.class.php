<?php
namespace Admin\Controller;
use Think\Controller;
class SolutionController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $model = M('solution');
        $type = empty($_GET['t']) ? 1 : intval($_GET['t']);
        if($type > 2 || $type < 1) $this->error("类型不正确");

        $list = $model->where("type = ".$type)->select();
        $this->assign('list',$list);
        $this->assign("type",$type);
        $this->display();
    }

    public function addAction(){
        $types = array(
            array('id'=>1,"name"=>"产品解决方案"),
            array('id'=>2,"name"=>"行业解决方案"),
        );
        $type = empty($_GET['t']) ? 0 : intval($_GET['t']);
        if($type > 2 || $type < 0) $this->error("类型不正确");
        $this->assign("types",$types);
        $this->assign("type",$type);
        $this->display();
    }

    public function postAction(){
        $title = $_POST['title'];
        $type = $_POST['type'];
        $img = $_POST['img'];
        $content = htmlspecialchars($_POST['content']);
        $desc = mb_substr($_POST['desc'],0,300,'utf-8');

        $model = M('solution');
        $data = array(
            'title' => $title,
            'img' => $img,
            'type' => $type,
            'desc' => $desc,
            'content' => $content,
            'created' => time()
        );

        $r = $model->data($data)->add();
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"添加成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"添加失败")));
    }

    public function updateAction(){
        $model = M('solution');
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $img = $_POST['img'];
            $title = $_POST['title'];
            $content = htmlspecialchars($_POST['content']);
            $desc = mb_substr($_POST['desc'],0,300,'utf-8');

            $data = array(
                'title' => $title,
                'img' => $img,
                'content' => $content,
                'desc' => $desc
            );

            $r = $model->where('id='.$id)->save($data);
            if($r !== false){
                exit(json_encode(array('status'=>0,"message"=>"更新成功")));
            }else{
                exit(json_encode(array("status"=>1,"message"=>"更新失败")));
            }
        }else{
            $id = $_GET['id'];
            if(!$id) $this->error("/Admin/Solution","ID不存在",1);
            $data = $model->where("id=".$id)->find();

            if(!$data){
                $this->error("/Admin/Solution","数据不存在",1);
            }
            $data['content'] = htmlspecialchars_decode($data['content']);
            $types = array(
                array('id'=>1,"name"=>"产品解决方案"),
                array('id'=>2,"name"=>"行业解决方案"),
            );
            $this->assign("data",$data);
            $this->assign("types",$types);
            $this->display();
        }

    }


    public function delAction(){
        $id = $_GET['id'];
        if(empty($id)) exit(json_encode(array('status'=>1,"message"=>"ID不能为空")));
        $model = M("solution");
        $r = $model->delete($id);
        if($r !== false) exit(json_encode(array('status'=>0,"message"=>"删除成功")));
    }

}