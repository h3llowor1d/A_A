<?php
namespace Home\Controller;
use Think\Controller;

class BookmarkController extends BaseController {
    public function __construct(){
        layout(true);
        parent::__construct();
    }

    function indexAction(){
        $this->display();
    }

}
