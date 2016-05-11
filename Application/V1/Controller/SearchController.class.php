<?php
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function indexAction(){
        layout(true);
        $this->assign("title",'搜索页');

        $this->display();
    }

    public function ajaxTipsAction(){
        $keywords = $_GET['keywords'];
        if(empty($keywords)) exit(0);

        $tips = array(1,2,3);

        exit(json_encode($tips));
    }
}