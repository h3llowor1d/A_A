<?php
namespace Shop\Controller;
use Think\Controller;
use Shop\Util;

class IndexController extends Controller {
    public function indexAction(){

        Util\Qrcode2::make("http://dq.meituan.com/deal/32520025.html","www","H","6");

    }

    public function t0001Action(){
        C();
    }

}