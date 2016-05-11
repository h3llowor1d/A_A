<?php
namespace Home\Controller;
use Think\Controller;
use Home\Model;

class BlogController extends BaseController {

    private $model;

    public function __construct(){
        layout(true);
        parent::__construct();
        $this->model = M('artical');
    }

    public function indexAction(){
        layout(true);
        $mTags = M('tags');
        $tagList = $mTags->select();

        $this->tagList = $tagList;
        $this->assign('title',"写博客");
        $this->display();
    }

    public function addAction(){
        if(IS_POST){
            $title = $_REQUEST['title'];
            $tags = $_REQUEST['tags'];
            $img = $_REQUEST['img'];
            $content = htmlspecialchars($_REQUEST['content']);
            $desc = mb_substr($_REQUEST['desc'],0,236,'utf-8');
            if(mb_strlen($_REQUEST['desc'],"utf-8")>=236){
                $desc .= "...";
            }
            $uid = $this->uid;
            $model = M('artical');
            $data = array(
                'u_id' => $uid,
                'title' => $title,
                'tags' => $tags,
                'img' => $img,
                'content' => $content,
                'addtime' => time(),
                'edittime' => time(),
                'desc' => $desc
            );
            $r = $model->data($data)->add();
            if($r){
                $this->ajaxReturn(array('status'=>0,'insertedId'=>$r));
            }
        }else{
            layout('User\layout');
            $mTags = M('tags');
            $tagList = $mTags->select();
            $this->tagList = $tagList;
            $this->display();
        }
    }

    //发表文章
    public function postAction(){
        $title = $_REQUEST['title'];
        $tags = $_REQUEST['tags'];
        $content = $_REQUEST['content'];

        $desc = mb_substr($_REQUEST['desc'],0,236,'utf-8');
        if(mb_strlen($_REQUEST['desc'],"utf-8")>=236){
            $desc .= "...";
        }

        $uid = $this->uid;
        $model = M('artical');
        $data = array(
            'u_id' => $uid,
            'title' => $title,
            'tags' => $tags,
            'content' => $content,
            'addtime' => time(),
            'edittime' => time(),
            'desc' => $desc
        );

        $r = $model->data($data)->add();

        if($r){
            $this->success("发表成功","/Blog/list");
        }
    }
        /// $a = array(); $a['count'] = 11;
    //显示文章列表
    public function listAction(){
        $date = $_GET['date'];
        $key = $_GET['key'];
        $condition = array();
        if(!empty($date)){
            $start = strtotime($date);
            $end = $start + 24*60*60-1;
            $condition['a.addtime'] = array("between",$start.",".$end);
        }
        if(!empty($key)){
            $condition['a.title'] = array("like","%".$key."%");
        }
        if(!$condition){
            $condition['_logic'] = "AND";
        }

        $mBlog = D('artical');
        $result = $mBlog->findByCondition($condition);

        $this->data = $result['data'];
        $this->show = $result['show'];
        $this->assign('title',"文章列表");
        $this->display('list');
    }

    //后台部分 文章列表
    public function list2Action(){
        layout('User/layout');
        $uid = $this->uid;
        $mArtical = M('artical');
        $count = $mArtical->where('u_id=%d',$uid)->count();
        $page = new \Think\Page($count,5,array(''));
        $show = $page->show();
        $list = $mArtical->where('u_id=%d',$uid)->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('pageHtml',$show);
        $this->assign('list',$list);
        $this->display('blog');
    }

    public function phpAction(){
        $mTags = M('tags');
        $tagsInfo = $mTags->where('tagName = PHP')->find();
        $type_id = $tagsInfo['type_id'];

        $mArtical = M('artical');
        $articalList = $mArtical->where("$type_id in tags")->select();
    }

    public function detailAction($id){
        if(empty($id)){
            $this->error('参数错误!',"/Blog/list");
        }

        $data = $this->model->field("a.*,u.nickname,u.realname")->alias('a')->join("LEFT JOIN db_user u on u.id = a.u_id")->where(array('a.id'=>$id))->select();

        if(count($data)){
            $this->data = $data[0];
        }else{
            $this->error('参数错误!',"/Blog/list");
        }

        //$User->where('id=5')->setInc('score',3); // 用户的积分加3
        //$User->where('id=5')->setInc('score'); // 用户的积分加1
        //$User->where('id=5')->setDec('score',5); // 用户的积分减5
        //$User->where('id=5')->setDec('score'); // 用户的积分减1

        //点击量统计
        $this->model->execute("update db_artical set click = click + 1 where id=".$id);
        //标签处理
        $tagids = $data[0]['tags'];
        if($tagids){
            $mTags = M('tags');
            $tagList = $mTags->where("id in (".$tagids.")")->select();
        }
        //查询评论
        $sql = "SELECT c.*,u.`nickname`,FROM_UNIXTIME(c.addtime) createtime FROM db_comment  c LEFT JOIN db_user u ON c.`u_id` = u.`id` WHERE c.a_id = ".$id." ORDER BY c.addtime DESC LIMIT 10";
        $comments = $this->model->query($sql);

        $this->assign("comments",$comments);
        $this->tagList = $tagList;
        $this->id = $id;
        $this->assign('title',$data[0]['title']);
        $this->display('detail');
    }

    public function updateAction($id){
        if(IS_POST){
            $title = $_REQUEST['title'];
            $tags = $_REQUEST['tags'];
            $img = $_REQUEST['img'];
            $content = htmlspecialchars($_REQUEST['content']);
            $desc = mb_substr($_REQUEST['desc'],0,236,'utf-8');
            if(mb_strlen($_REQUEST['desc'],"utf-8")>=236){
                $desc .= "...";
            }
            $id = $_POST['id'];
            $uid = $this->uid;
            $model = M('artical');
            $data = array(
                'u_id' => $uid,
                'title' => $title,
                'tags' => $tags,
                'img' => $img,
                'content' => $content,
                'addtime' => time(),
                'edittime' => time(),
                'desc' => $desc
            );
            $r = $model->where("id=%d",$id)->save($data);
            if($r !== false){
                $this->ajaxReturn(array('status'=>0,'msg'=>'保存成功'));
            }else{
                $this->ajaxReturn(array('status'=>1,'msg'=>'保存失败'));
            }
        }else{
            layout('User/layout');
            if(empty($id)){
                $this->error('参数错误!',"/");
            }

            $data = $this->model->field("a.*,u.nickname,u.realname")->alias('a')->join("LEFT JOIN db_user u on u.id = a.u_id")->where(array('a.id'=>$id))->find();

            if($data){
                $this->data = $data;
            }else{
                $this->error('参数错误!',"/");
            }

            //标签处理
            $tagids = $data['tags'];
            if($tagids){
                $mTags = M('tags');
                $tagList = $mTags->where("id in (".$tagids.")")->select();
            }

            $this->tagList = $tagList;
            $this->id = $id;
            $this->assign('title',$data['title']);
            $this->display('update');
        }
    }

    //ajax评论处理
    public function commentAction(){
        if(!$this->uid){
            $this->ajaxReturn(array('status'=>-1,"msg"=>"用户未登录"));
        }

        $a_id = $_POST['aid'];
        $p_id = $_POST['pid'];
        $content = $_POST['content'];
        $u_id = $this->uid;

        $data = array(
            'a_id' => $a_id,
            'u_id' => $u_id,
            'p_id' => $p_id,
            'content' => $content,
            'addtime' => time()
        );

        $mComment = M('comment');
        $r = $mComment->data($data)->add();

        if($r){
            $sql = "update db_artical set comment = comment + 1 where id = $a_id";
            $this->model->execute($sql);
            //$comment = $mComment->where("id = %d",$r)->select();
            $sql = " SELECT c.*,u.`nickname`,FROM_UNIXTIME(c.addtime) createtime FROM db_comment  c LEFT JOIN db_user u ON c.`u_id` = u.`id` WHERE c.id = ".$r;
            //$this->ajaxReturn($comment[0]);
            $comment = $mComment->query($sql);
            $this->ajaxReturn(array("status"=>0,"content"=>$comment[0]));
        }
    }

}