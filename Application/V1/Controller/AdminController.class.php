<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {


    public function __construct(){
        //parent::__construct();
        //layout(true);
    }

    public function indexAction(){
        $this->display();
    }

}