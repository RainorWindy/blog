<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Index extends Base{
    public function index()
    {

        $pid1 = [4,5,6];
        $pid2 = [7,8,9];
        $navi1 = Db::name("navigate")->where("navigate_id",'in',$pid1)->select();
        $navi2 = Db::name("navigate")->where("navigate_id",'in',$pid2)->select();
        $arr1 = [];
        $arr2 = [];
        foreach($navi1 as $key1 =>$val1){
            $cateID1 = $val1['navigate_id'];
            $lists1 = Db::name("table_article")->where("cid",$cateID1)->select();
            $val1['key'] = $key1+1;
            $val1['content'] = $lists1;
            array_push($arr1,$val1);
        }

        foreach($navi2 as $key2 =>$val2){
            $cateID2 = $val2['navigate_id'];
            $lists2 = Db::name("table_article")->where("cid",$cateID2)->select();
            $val2['key'] = $key2+1;
            $val2['content'] = $lists2;
            array_push($arr2,$val2);
        }
        $this->assign(['arr1'=>$arr1,'arr2'=>$arr2]);


        return $this->fetch();
    }

    public function myBlog(){
        // $myBlog = Db::name("table_article")->where('cid',10)->paginate(1);
        // $page = $myBlog->render();
        // return $this->fetch('index',['pageBlog'=>$page,'myBlog'=>$myBlog]);
        return $this->fetch();
    }
}
