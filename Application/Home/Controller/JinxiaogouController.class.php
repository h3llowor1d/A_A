<?php
namespace Home\Controller;
use Think\Controller;
class JinxiaogouController extends Controller {

    public function __construct(){
        parent::__construct();
        layout(true);
		/**
		 *	银联支付 密码 老密码 
		 *  安全问题 金小狗是谁  答案 金小狗
		 *  邮箱 617667045@qq.com
		 */
    }

    public function indexAction(){
        $this->display();
    }

    public function postAction(){
        $mAlbum = M("album");
        $albums = $mAlbum->where('u_id = %d',$this->uid)->select();
       // print_r($albums);exit;
        $this->albums = $albums;
        //$this->assign('albums',$albums);
        $this->display();
		
		

    }


    public function showAction($id){
        $mAlbum = M('album');
        $mPhoto = M('photo');
        if($id){
            $album = $mAlbum->where('id = %d',$id)->select();
            $this->album = $album[0];
            $data = $mPhoto->where("album_id = %d",array($id))->select();
            $this->list = $data;
            $this->assign('title',"<".$album['0']['name'].">相册");
        }else{
            $this->error('参数错误');
        }
        $this->display("Photo/show");
    }


    //照片墙
    public function wallAction(){
        $currentPage = empty($_REQUEST['p'])? 1 :$_REQUEST['p'];
        $pageCount = 20;
        $limit1 = ($currentPage-1) * $pageCount;
        $limit2 = $limit1 + $pageCount;
        $mPhoto = M('photo');
        $data = $mPhoto->order("`like` DESC,`click` DESC,`comment` DESC,`addtime`")->limit($limit1,$limit2)->select();
        //POST方式提交
        if($_POST){
            $return = array(
                'status'=>0,
                'content'=>$data,
                'count' => count($data)
            );
            exit(json_encode($return));
        }

        $this->list = $data;
        $this->assign('title',"<照片墙>");
        $this->display();
    }

    //新建相册
    public function newAlbumAction(){
        $name = !empty($_POST['name'])?$_POST['name']:exit;
        $type_id = !empty($_POST['type_id'])?$_POST['type_id']:exit;
        $desc = $_POST['desc'];
        $u_id = 1004;
        $time = time();
        $cover = "/uploads/image/pic-none.png";//默认封面
        $data = array(
            'name' => $name,
            'type_id' => $type_id,
            'desc' => $desc,
            'addtime' => $time,
            'u_id' => $u_id,
            'cover' => $cover
        );
        $mAlbum = M('album');
        $r = $mAlbum->add($data);
        $data = array();
        if($r){
            $msg = "新建相册成功";
            $data = $mAlbum->where('id = %d',$r)->select();
        }else{
            $msg = "失败";
        }
        $this->ajaxReturn(array('status'=>0,'msg'=>$msg,'content'=>$data[0]));
    }

    //ajax获取相册分类列表
    public function getAlbumTypeAction(){
        $mType = M('type');
        $data = $mType->select();
        echo json_encode($data);
    }

    //ajax获取相册列表
    public function getAlbumListAction(){
        $mAlbum = M('album');
        $uid = 1004;
        $data = $mAlbum->where("u_id = %d",$uid)->order('addtime asc')->select();
        echo json_encode($data);
    }

    public function uploadPhotoAction(){
        $album_id = $_POST['album_id'];
        $imgUrl = $_POST['imgUrl'];
        $title = $_POST['title'];

        $desc = '';
        $thumbUrl = "";
        $data = array(
            'u_id' => $this->uid,
            'title' => $title,
            'album_id' => $album_id,
            'addtime' => time(),
            'desc' => $desc,
            'url' => $imgUrl,
            'thumbnail' => $thumbUrl,
        );
        $mPhoto = M('photo');
        $r = $mPhoto->add($data);
        if($r) $this->ajaxReturn(array('status'=>0));
    }

    //图片上传处理
    public function fileuploadAction(){

        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");

        // Support CORS
        // header("Access-Control-Allow-Origin: *");
        // other CORS headers if any...
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

            exit(); // finish preflight CORS requests here
        }
        if ( !empty($_REQUEST[ 'debug' ]) ) {
            $random = rand(0, intval($_REQUEST[ 'debug' ]) );
            if ( $random === 0 ) {
                header("HTTP/1.0 500 Internal Server Error");
                exit;
            }
        }

        // header("HTTP/1.0 500 Internal Server Error");
        // exit;
        // 5 minutes execution time
        @set_time_limit(5 * 60);
        // Uncomment this one to fake upload time
        // usleep(5000);
        // Settings
        // $targetDir = ini_get("upload_tmp_dir") . DIRECTORY_SEPARATOR . "plupload";
        $rootPath = $_SERVER["DOCUMENT_ROOT"];
        $targetDir = $rootPath. DIRECTORY_SEPARATOR .'uploads'.DIRECTORY_SEPARATOR.'tmp';
        $uploadDir = $rootPath. DIRECTORY_SEPARATOR .'uploads'.DIRECTORY_SEPARATOR.date("Y-m-d");

        $cleanupTargetDir = true; // Remove old files
        $maxFileAge = 5 * 3600; // Temp file age in seconds

        // Create target dir
        if (!$r1 = file_exists($targetDir)) {
            @mkdir($targetDir,0755,true);
        }

        // Create target dir
        if (!$r2 = file_exists($uploadDir)) {
            @mkdir($uploadDir,0755,true);
        }

        $ext = "jxg";
        if(!empty($_FILES)){
            $ext = strtolower(strrchr($_FILES["file"]["name"], '.'));
        }
        $fileName = uniqid("p_").$ext;

        $filePath = $targetDir . DIRECTORY_SEPARATOR . $fileName;
        $uploadPath = $uploadDir . DIRECTORY_SEPARATOR . $fileName;
        // Chunking might be enabled
        $chunk = isset($_REQUEST["chunk"]) ? intval($_REQUEST["chunk"]) : 0;
        $chunks = isset($_REQUEST["chunks"]) ? intval($_REQUEST["chunks"]) : 1;
        // Remove old temp files
        if ($cleanupTargetDir) {
            if (!is_dir($targetDir) || !$dir = opendir($targetDir)) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 100, "message": "Failed to open temp directory."}, "id" : "id"}');
            }
            while (($file = readdir($dir)) !== false) {
                $tmpfilePath = $targetDir . DIRECTORY_SEPARATOR . $file;
                // If temp file is current file proceed to the next
                if ($tmpfilePath == "{$filePath}_{$chunk}.part" || $tmpfilePath == "{$filePath}_{$chunk}.parttmp") {
                    continue;
                }
                // Remove temp file if it is older than the max age and is not the current file
                if (preg_match('/\.(part|parttmp)$/', $file) && (@filemtime($tmpfilePath) < time() - $maxFileAge)) {
                    @unlink($tmpfilePath);
                }
            }
            closedir($dir);
        }
        // Open temp file
        if (!$out = @fopen("{$filePath}_{$chunk}.parttmp", "wb")) {
            die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
        }
        if (!empty($_FILES)) {
            if ($_FILES["file"]["error"] || !is_uploaded_file($_FILES["file"]["tmp_name"])) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 103, "message": "Failed to move uploaded file."}, "id" : "id"}');
            }
            // Read binary input stream and append it to temp file
            if (!$in = @fopen($_FILES["file"]["tmp_name"], "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        } else {
            if (!$in = @fopen("php://input", "rb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 101, "message": "Failed to open input stream."}, "id" : "id"}');
            }
        }
        while ($buff = fread($in, 4096)) {
            fwrite($out, $buff);
        }
        @fclose($out);
        @fclose($in);
        rename("{$filePath}_{$chunk}.parttmp", "{$filePath}_{$chunk}.part");
        $index = 0;
        $done = true;
        for( $index = 0; $index < $chunks; $index++ ) {
            if ( !file_exists("{$filePath}_{$index}.part") ) {
                $done = false;
                break;
            }
        }
        if ( $done ) {
            if (!$out = @fopen($uploadPath, "wb")) {
                die('{"jsonrpc" : "2.0", "error" : {"code": 102, "message": "Failed to open output stream."}, "id" : "id"}');
            }
            if ( flock($out, LOCK_EX) ) {
                for( $index = 0; $index < $chunks; $index++ ) {
                    if (!$in = @fopen("{$filePath}_{$index}.part", "rb")) {
                        break;
                    }
                    while ($buff = fread($in, 4096)) {
                        fwrite($out, $buff);
                    }
                    @fclose($in);
                    @unlink("{$filePath}_{$index}.part");
                }
                flock($out, LOCK_UN);
            }
            @fclose($out);
        }

        $imgUrl = str_replace($rootPath,"",$uploadPath);
        $title = str_replace($ext,"",$_FILES["file"]["name"]);
        // Return Success JSON-RPC response
        die('{"jsonrpc" : "2.0", "result" : 0, "imgUrl" : "'.str_replace('\\','\\\\',$imgUrl).'","title":"'.$title.'"}');
    }


}