<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Comment extends Controller{

    public function index(){
        $res = Db::name("comment")->select();
        $res = $this->trees($res);
        // var_dump($res);
        $this->assign('res',$res);
        return $this->fetch();
    }
    public function trees($arr,$pid=0,$level=0){
        static $array = [];

        foreach($arr as $key =>$val){
            if($val['pid'] == $pid){
                $val['level'] = $level;
                array_push($array,$val);
                unset($arr[$key]);
                $this->trees($arr,$val['comment_id'],$level+1);
            }
        }

        return $array;
    }
}