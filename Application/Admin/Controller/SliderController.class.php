<?php
namespace Admin\Controller;
use Think\Controller;
class SliderController extends BaseController {

    public function __construct(){
        parent::__construct();
        layout("Public/layout");
    }

    public function indexAction(){
        $mSlider = M('slider');
        $list = $mSlider->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function addAction(){
        $this->display();
    }

    public function previewAction(){
        layout(false);
        $mSlider = M('slider');
        $list = $mSlider->where('type=1 AND imgurl <> ""')->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function changeAction(){
        $id = $_GET['id'];
        $type = $_GET['type'];

        $mSlider = M('slider');
        $r = $mSlider->where("id=".$id)->save(array('type'=>$type));
        if($r !== false){
            exit(json_encode(array("status"=>0)));
        }else{
            exit(json_encode(array("status"=>1)));
        }
    }

    public function delAction(){
        $id = $_GET['id'];
        $mSlider = M('slider');
        $r = $mSlider->where("id=".$id)->delete();
        if($r !== false){
            exit(json_encode(array("status"=>0)));
        }else{
            exit(json_encode(array("status"=>1)));
        }
    }

    public function postAction(){
        $title = $_POST['title'];
        $link = $_POST['url'];
        $imgurl = $_POST['img'];

        $mSlider = M('slider');
        $data = array(
            'title' => $title,
            'imgurl' => $imgurl,
            'url' => $link,
            'created' => time()
        );

        $r = $mSlider->data($data)->add();
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"添加成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"添加失败")));
    }

    public function updateAction(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $link = $_POST['url'];
        $mSlider = M('slider');
        $data = array(
            'title' => $title,
            'url' => $link
        );

        $r = $mSlider->where("id=".$id)->save($data);
        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"添加成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"添加失败")));
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
        die('{"jsonrpc" : "2.0", "result" : 0, "imgUrl" : "'.str_replace('\\','/',$imgUrl).'","title":"'.$title.'"}');
    }


}