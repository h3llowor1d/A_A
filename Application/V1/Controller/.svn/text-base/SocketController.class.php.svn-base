<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/4/24
 * Time: 16:15
 */


    namespace Home\Controller;
    use Think\Controller;
    use Home\Util;
    class SocketController extends Controller{
        private $host = '127.0.0.1';
        private $port = 9001;
        private $max = 10;

        public function __construct(){
            parent::__construct();
            $socket = C('socket');
            if(is_array($socket)){
                $this->host = $socket['host'];
                $this->port = $socket['port'];
                $this->max = $socket['max'];
            }
        }

        public function indexAction(){
            set_time_limit(0);
            $mSys = M('system');
            $data = array(
                'configvalue' => 1
            );

            _log('save earlier');
            $mSys->where('configkey = "socket"')->save($data);
            _log('save after');
            $ws = new Util\Socket($this->host,$this->port,$this->max);
            $ws->start_server();
        }

        public function closeAction(){
            $mSys = M('system');
            $data = array(
                'configvalue' => 0
            );
            $mSys->where("configkey='socket'")->save($data);
            $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
            $result = socket_connect($socket, $this->host, $this->port);
            socket_write($socket,"close",strlen("close"));
            echo "socket_write() : " .iconv('GBK', 'UTF-8', socket_strerror(socket_last_error()));

            echo 'close';
        }

        public static function isSocketOn(){
            if(!session('socket_on')){
                return false;
            }

            return true;
        }

    }