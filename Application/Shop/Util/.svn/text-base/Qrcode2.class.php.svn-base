<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/11/6
 * Time: 14:45
 */
    namespace Shop\Util;
    use Think\Controller;
    include "phpqrcode/qrlib.php";


    class Qrcode2{
        private static $png_temp_dir = "./uploads/image/qrcode/";
        private static $png_web_dir = "temp/";
        function __Construct(){
            $this->png_temp_dir = !count(C("PNG_TEMP_DIR"))?C("PNG_TEMP_DIR"):$this->png_temp_dir;
        }

        public static function make($data,$filename,$errorCorrectionLevel = "L",$matrixPointSize ="4"){
            if (!file_exists(Qrcode2::$png_temp_dir))
                mkdir(Qrcode2::$png_temp_dir);

            $filename = Qrcode2::$png_temp_dir.uniqid(md5($filename)).'.png';
            $r = \QRcode::png($data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
            $imgurl = basename($filename);

            echo "<img src='/uploads/image/qrcode/".$imgurl."'>";
        }
    }

