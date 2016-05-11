<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function __construct(){
        parent::__construct();
        $this->assign('adminInfo',$_SESSION['adminInfo']);
        layout("Public/layout");
    }

    public function indexAction(){
        /*$model = M('index');
        $r = $model->where("k=\"newsTitle\"" )->find();

        //echo serialize(array('title'=>'公司新闻','subtitle'=>'Company News'));exit;
        $data['title'] = is_array($r) && count($r) ? unserialize($r['v']) : array();

        $r = $model->where("k=\"newsList\"" )->find();
        $ids = is_array($r) && count($r) ? unserialize($r['v']) : array();

        if(is_array($ids) && count($ids)){
            foreach($ids as $v){
                $model = M($v['table']);
                $tmp = $model->where('id='.$v['id'])->find();
                if(is_array($tmp) && count($tmp)){
                    $tmp['table'] = $v['table'];
                    $data['list'][] = $tmp;
                }
            }
        }

        $this->assign("data",$data);*/
        $this->display();
    }



    public function postAction(){
        $model = M('index');
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $data = array(
            'title' => $title,
            'subtitle' => $subtitle
        );
        $r = $model->where('k="newsTitle"')->save(array('v'=>serialize($data)));

        if($r !== false){
            exit(json_encode(array('status'=>0,'message'=>"保存成功")));
        }

        exit(json_encode(array('status'=>1,'message'=>"保存错误")));
    }


}