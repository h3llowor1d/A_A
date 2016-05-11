<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Think;

class BookmarkController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $model = M('bookmark');
        $count = $model->alias('b')->field("b.*,t.typename")->join("__BOOKMARK_TYPE__ t ON t.id =  b.typeid","LEFT")->count();
        $page = new \Think\Page($count,10);
        $list = $model->alias('b')->field("b.*,t.typename")->join("__BOOKMARK_TYPE__ t ON t.id =  b.typeid","LEFT")->limit($page->firstRow,$page->listRows)->select();

        $this->assign('list',$list);
        $this->assign('pageHtml',$page->show());
        $this->display();
    }

    public function addAction(){
        if(IS_POST){

        }else{
            $types = M('bookmark_type')->select();
            $this->assign('types',$types);
            $this->display();
        }
    }

}