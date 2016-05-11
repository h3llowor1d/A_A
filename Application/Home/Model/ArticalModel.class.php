<?php
/**
 * Created by PhpStorm.
 * User: rainsoft-mc
 * Date: 2015/4/20
 * Time: 14:40
 */

namespace Home\Model;
use Think\Model;

class ArticalModel extends Model  {
    //protected $tableName = 'blog';
    //protected $tablePrefix = 'db_';

    function findByCondition($condition = array()){
        $mBlog = M('artical');
        $count = $mBlog->field("a.*,u.nickname")
            ->alias("a")
            ->join("LEFT JOIN db_user u on u.id = a.u_id")
            ->order('a.addtime desc')
            ->where($condition)
            ->count();
        $page = new \Think\Page($count,2);
        $show = $page->show();
        $data = $mBlog->field("a.*,u.nickname")
            ->alias("a")
            ->join("LEFT JOIN db_user u on u.id = a.u_id")
            ->order('a.addtime desc')
            ->where($condition)
            ->limit($page->firstRow.','.$page->listRows)->select();
        return array(
            'show' => $show,
            'data' => $data
        );
    }

} 