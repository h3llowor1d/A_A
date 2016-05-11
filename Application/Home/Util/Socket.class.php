<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/4/24
 * Time: 16:07
 */
namespace Home\Util;
use Home\Controller;

class Socket{
    private $host = '127.0.0.1';
    private $port = 9001;
    private $maxuser = 10;
    public  $accept = array(); //连接的客户端
    private $cycle = array(); //循环连接池
    private $isHand = array();
    public static $status = 'on'; //是否关闭socket
    /*
        接受三个回调函数，分别在新用户连接、有消息到达、用户断开时触发
        function add、function send、function close
    */
    public $function = array();
    //Constructor
    function __construct($host, $port, $max) {
        $this->host = $host;
        $this->port = $port;
        $this->maxuser = $max;
    }
    //挂起socket
    public function start_server() {
        //echo json_encode(array('time'=>time(),'content'=>"hello world"));
        $this->socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        //允许使用本地地址
        socket_set_option($this->socket, SOL_SOCKET, SO_REUSEADDR, TRUE);
        socket_bind($this->socket, $this->host, $this->port);
        //最多10个人连接，超过的客户端连接会返回WSAECONNREFUSED错误
        socket_listen($this->socket, $this->maxuser);
        $i = 1;
        while(TRUE) {
            $this->quitSocket();

            $this->cycle = $this->accept;
            if(!in_array($this->socket,$this->cycle)){
                $rand = uniqid("visitor_");
                $this->cycle[$rand] = $this->socket;
            }

            $tmp = "while 2:";
            foreach($this->accept as $k=>$v){
                $tmp .= $k."-->".$v.";";
            }
            //阻塞用，有新连接时才会结束
            $except = null;
            socket_select($this->cycle, $write, $except, null);

            foreach ($this->cycle as $k => $v) {
                if($v === $this->socket) {
                    if (($accept = socket_accept($v)) < 0) {
                        continue;
                    }
                    //如果请求来自监听端口那个套接字，则创建一个新的套接字用于通信
                    $this->add_accept($accept);
                    continue;
                }
                $index = array_search($v, $this->accept);
                if ($index === NULL) {
                    continue;
                }
                if (!@socket_recv($v, $data, 1024, 0) || !$data) {//没消息的socket就跳过
                    $this->close($v);
                    continue;
                }

                if (!$this->isHand[$index]) {
                    $this->upgrade($v, $data, $index);
                    $this->send_num_to_all();//新增了连接
                    continue;
                }

                if($data){
                    $data = json_decode($this->decode($data));
                    $type = $data->type;
                    $uid = $data->uid;
                    $content = $data->content;
                    $username = $data->username;
                    switch($type){
                        case "newUser":
                            if($uid){
                                $this->add_accept($accept,$uid);
                            }
                            break;
                        case "msg":
                            //注册用户
                            if($uid == -1){
                                $this->send_to($content,3,0,$index,$username);
                            //游客
                            }else if($uid == 0){
                                $this->send_to($content,2,0,$index,$username);
                            }else{
                                $uids = explode(",",$uid);
                                $this->send_to($content,1,$uids,$index,$username);
                            }
                            break;
                        case 'system':
                            //$this->send_to($content,2,0,$index,"system");
                            //socket_close($this->socket);
                            //exit;
                            break;
                    }
                }

            }
            sleep(1);
        }
    }

    private function quitSocket(){
        $mSys = M('system');
        //$record = $mSys->where('key="socket"')->find();
        $record = $mSys->where('configkey = "socket"')->find();
        if(!$record['configvalue']){
            $res = array(
                'content' => array('text'=>'服务器已关闭',"userid"=>'-111',"username"=>"System"),
                'type' => "msg",
            );

            $res = json_encode($res);
            $res = $this->frame1($res);
            $len = strlen($res);
            foreach($this->accept as $k=>$v){
                socket_write($v,$res,$len);
            }
            socket_close($this->socket);
            echo "socket已关闭";
            exit;
        }

    }

    //发送消息 message
    private function send_to($content,$type,$to_uid,$from_uid,$from_username=""){

        $res = array(
            'content' => array('text'=>$content,"userid"=>$from_uid,"username"=>$from_username),
            'type' => "msg",
        );

        $res = json_encode($res);
        $res = $this->frame1($res);
        $len = strlen($res);
        $flag = true;

        switch($type){
            //登录用户给指定用户发送消息
            case "1":
                if(is_array($to_uid)){
                    foreach($to_uid as $v){
                        if($this->isHand[$v]){
                            socket_write($this->accept[$v], $res, $len);
                            $this->save($content,$v,$from_uid,1);
                        }else{
                            $this->save($content,$v,$from_uid);
                        }
                    }
                }
                break;
            //游客给在线用户发消息 不保存消息记录
            case "2":
                $all = $this->accept;
                unset($all[$from_uid]);//避免重复给自己发送消息
                //游客给在线所有人发消息
                foreach ($all as $key => $value) {
                    socket_write($value, $res, strlen($res));
                }
                break;
            //登录用户给所有人发消息 如果对方是登录用户则保存消息记录 否则不保存消息
            case "3":
                $all = $this->accept;
                unset($all[$from_uid]);//避免重复给自己发送消息
                //游客给在线所有人发消息
                foreach ($all as $key => $value) {
                    if(!stripos("visitor_",$key)){
                        $this->save($content,$value,$from_uid,1);
                    }
                    socket_write($value, $res, strlen($res));
                }
                break;
            case '4':
                $all = $this->accept;
                foreach ($all as $key => $value) {
                    socket_write($value, $res, strlen($res));
                }
                break;
        }

        //发送反馈信息给 发送者 告知发送消息是否成功
        $res = array(
            'content' => array('status'=> $flag,"userid"=>$from_uid),
            'type' => "notice",
        );
        $res = json_encode($res);
        $res = $this->frame($res);
        $len = strlen($res);
        socket_write($this->accept[$from_uid], $res, $len);
    }

    //增加一个初次连接的用户
    private function add_accept($accept,$uid = "") {
        $tmp = "add_accept first:";
        foreach($this->accept as $k=>$v){
            $tmp .= $k."-->".$v.";";
        }

        if($uid){
            if(is_resource($this->accept[$uid]) && $this->accept[$uid] !== $accept){
                $content = "该用户已在别处登录";
                $username = "系统提示";
                $res = array(
                    'content' => array('text'=>$content,"userid"=>"10","username"=>$username),
                    'type' => "system",
                );

                $res = json_encode($res);
                $res = $this->frame($res);
                $len = strlen($res);
                socket_write($this->accept[$uid],$res,$len);
                $tmp = "here 2 end:";
                foreach($this->accept as $k=>$v){
                    $tmp .= $k."-->".$v.";";
                }
            }

            $index = array_search($accept, $this->accept);
            if($index) {
                unset($this->accept[$index]);
                unset($this->isHand[$index]);
            }

            $this->accept[$uid] = $accept;
            $this->isHand[$uid] = true;

        }else{
            $rand = uniqid("visitor_");
            $this->accept[$rand] = $accept;
        }

        $tmp = "add_accept:";
        foreach($this->accept as $k=>$v){
            $tmp .= $k."-->".$v.";";
        }

    }
    //关闭一个连接
    private function close($accept) {
        $index = array_search($accept, $this->accept);
        if($index !== false){
            socket_close($accept);
            unset($this->accept[$index]);
            unset($this->isHand[$index]);
            $this->send_num_to_all();//减少了连接
        }
    }
    //握手
    private function upgrade($accept, $data, $index) {
        if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/",$data,$match)) {
            $key = base64_encode(sha1($match[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11', true));
            $upgrade  = "HTTP/1.1 101 Switching Protocol\r\n" .
                "Upgrade: websocket\r\n" .
                "Connection: Upgrade\r\n" .
                "Sec-WebSocket-Accept: " . $key . "\r\n\r\n";  //必须以两个回车结尾
            socket_write($accept, $upgrade, strlen($upgrade));
            $this->isHand[$index] = TRUE;
        }
    }
    //体力活
    public function frame($s){
        $a = str_split($s, 125); //把字符串分割为数组 125字符数量
        $ns = "";
        foreach ($a as $o){
            $ns .= "\x81" . chr(strlen($o)) . $o;
        }


        return $ns;
    }


    //分片发送
    public function frame1($data){
        $a = str_split($data, 125); //把字符串分割为数组 125字符数量
        $ns = "";
        $len = count($a)-1;
        foreach ($a as $k=>$o){
            if($k == 0 && $k == $len){
                $ns .= "\x81" . chr(strlen($o)) . $o;
            }else if($k == 0 && $k != $len){
                $ns .= "\x01" . chr(strlen($o)) . $o;
            }else if($k == $len){
                $ns .= "\x80" . chr(strlen($o)) . $o;
            }
        }

        return $ns;

    }


    function save($content,$uid,$from_uid,$isread=0){
        $mChat = M('chat');
        $data = array(
            'to_uid' => $uid,
            'from_uid' => $from_uid,
            'message' => $content,
            'addtime' => time(),
            'isread' => $isread
        );
        $mChat->add($data);
    }

    //体力活
    public function decode($buffer) {
        $len = $masks = $data = $decoded = null;
        $len = ord($buffer[1]) & 127;
        if ($len === 126) {
            $masks = substr($buffer, 4, 4);
            $data = substr($buffer, 8);
        }
        else if ($len === 127) {
            $masks = substr($buffer, 10, 4);
            $data = substr($buffer, 14);
        }
        else {
            $masks = substr($buffer, 2, 4);
            $data = substr($buffer, 6);
        }
        for ($index = 0; $index < strlen($data); $index++) {
            $decoded .= $data[$index] ^ $masks[$index % 4];
        }
        return $decoded;
    }


    function send_num_to_all(){
        $data = count($this->accept);
        $res = array(
            'content' => $data,
            'type' => "num",
        );
        $res = json_encode($res);
        $res = $this->frame($res);
        foreach ($this->accept as $key => $value) {
            socket_write($value, $res, strlen($res));
        }
    }

}
