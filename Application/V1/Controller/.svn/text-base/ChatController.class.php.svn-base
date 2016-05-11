<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/4/24
 * Time: 16:15
 */

    namespace Home\Controller;
    use Think\Controller;

    class ChatController extends BaseController{

        public function indexAction(){
            layout(true);
            $uid = $this->uid;
            //登录用户
            if($uid){
                $mUser = M('user');
                $userList = $mUser->where("id <> %d",$uid)->select();
                $mChat = M('chat');
                //$unread = $mChat->where("to_uid = %d AND isread = 0",$uid)->order("id")->select();
                $unread = $mChat
                    ->alias("c")
                    ->field("c.*,u.nickname")
                    ->join("LEFT JOIN db_user u ON c.from_uid = u.id")
                    ->where("c.to_uid = %d AND isread = 0",$uid)
                    ->order("id")
                    ->select();
                $userInfo = $mUser->where('id = %d',$uid)->find();
                $this->assign("userList",$userList);
                $this->assign("unread",$unread);
            }else{ //游客
                $userInfo = array(
                    'id' => 0,
                    'nickname' => "游客_".$this->getRandStr(5),
                    'headimg' =>''
                );
            }
            $this->assign("userInfo",$userInfo);
            $this->display("chat");
        }


        //获取随机字符串
        function getRandStr($length){
            $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $len=strlen($str)-1;
            $randstr='';
            for($i=0;$i<$length;$i++){
                $num=mt_rand(0,$len);
                $randstr .= $str[$num];
            }
            return $randstr;
        }

        public function postAction(){
            $from_uid = $this->uid;
            $to_uid = $_REQUEST['to_uid'];
            $content = $_REQUEST['content'];
            $mChat = M('chat');
            $addtime = time();
            $data = array(
                'to_uid' => $to_uid,
                'from_uid' => $from_uid,
                'message' => $content,
                'addtime' => $addtime
            );

            $r = $mChat->add($data);
            $return = array(
                'status' => 0,
                'sendTime' => 0
            );
            if($r){
                $return['status'] = 1;
                $return['sendTime'] = $addtime;
            }

            exit(json_encode($return));
        }

        public function getAction(){
            $from_uid = $_REQUEST['to_uid'];
            $to_uid = $this->uid;
            $mChat = M('chat');
            $messages = $mChat->where("to_uid = %d AND from_uid = %d AND isread = 0",array($to_uid,$from_uid))->select();

            if($messages){
                $return['status'] = 1;
                $return['message'] = $messages;
            }else{
                $return['status'] = 0;
                $return['message'] = "";
            }
            $ids = array();
            foreach($messages as $v){
                $ids[] = $v['id'];
            }
            if($ids){
                $ids = implode(",",$ids);
                $mChat->where("id IN (%s)",$ids)->save(array('isread'=>1));
            }else{
                sleep(10);
            }
            exit(json_encode($return));
        }

    }