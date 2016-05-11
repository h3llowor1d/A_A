<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/4/30
 * Time: 16:41
 */
    /**************************** Test ***********************************/
    namespace Home\Controller;
    use Think\Controller;
    use Home\Util;
    class MailController extends BaseController{
        function indexAction(){
            $mail = new Util\Mail();

            $mail->setServer("smtp.qq.com", "mike123go@vip.qq.com", ".",587);
            //exit("setServer");
            $mail->setFrom("mike123go@vip.qq.com");
            //exit("setFrom");
            $mail->setReceiver("1280071341@qq.com");
            //exit("setReceiver");

            $mail->setMailInfo("test", "<b>test</b>");
            //exit("setMailInfo");
            $r = $mail->sendMail();
            //exit("sendMail");
            exit("done");
        }
    }


