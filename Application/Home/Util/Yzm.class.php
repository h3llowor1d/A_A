<?php
/**
 * Created by PhpStorm.
 * User: Mike
 * Date: 15-5-20
 * Time: 下午11:50
 */

    namespace Home\Util;


class Yzm {

    private $weishu;

    public function __construct($n=4){
        $this->weishu = $n;
    }

    function getYZM(){
        $img = imagecreatetruecolor(100,30);
        $bgcolor = imagecolorallocate($img,rand(50,200),rand(50,200),rand(50,200));
        imagefill($img,0,0,$bgcolor);
        $yzm = $this->getRandStr();
        foreach(str_split($yzm) as $i=>$v){
            $size = 5;
            $color = imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
            //$content = rand(0,9);
            //$yzm .= $content;
            $x = $i*100/$this->weishu + rand(0,5);
            $y = rand(5,10);
            imagestring($img,$size,$x,$y,$v,$color);
        }
        /*for($i=0;$i<$this->weishu;$i++){
            $size = 5;
            $color = imagecolorallocate($img,rand(0,120),rand(0,120),rand(0,120));
            $content = rand(0,9);
            $yzm .= $content;
            $x = $i*100/$this->weishu + rand(0,5);
            $y = rand(5,10);
            imagestring($img,$size,$x,$y,$content,$color);
        }*/

        header('Content-Type:image/png');
        imagepng($img);

        return $yzm;
    }

    function getRandStr(){
        $str='abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $len=strlen($str)-1;
        $randstr='';
        for($i=0;$i< $this->weishu;$i++){
            $num = mt_rand(0,$len);
            $randstr .= $str[$num];
        }
        return $randstr;
    }

} 