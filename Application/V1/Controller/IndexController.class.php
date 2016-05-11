<?php
namespace V1\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function indexAction(){
        layout(true);
        $this->assign("title",'首页');

        $mArtical = M('artical');
        $aList = $mArtical->field("a.id,a.u_id,a.title,a.img,a.sub_title,a.desc,a.tags,a.visitor,a.addtime,a.click,a.comment,u.nickname,u.realname,u.email,u.headimg")
            ->alias("a")->join("LEFT JOIN __USER__ u ON u.id = a.u_id")->order("a.addtime desc")->limit(10)->select();
        $this->assign('aList',$aList);
        $this->display();
    }

   function addrAction(){
		$model = M('address');
		$list = $model->where('pid=0 AND level=1')->select();
		$this->assign('list',$list);
		$this->display();
	}
}