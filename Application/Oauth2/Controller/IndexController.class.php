<?php
namespace Oauth2\Controller;
use Think\Controller;

import("Oauth2.Util.OAuth2");

class IndexController extends Controller {

    public function indexAction(){

    }

    public function authorizeAction(){
        $oauth = new \OAuth2();
        if ($_POST) {
            $oauth->finishClientAuthorization($_POST["accept"] == "Yes", $_POST);
        }

        $auth_params = $oauth->getAuthorizeParams();


        $this->assign("auth_params",$auth_params);
        $this->display();
    }

    public function backAction(){
        $code = $_REQUEST['code'];
    }

}