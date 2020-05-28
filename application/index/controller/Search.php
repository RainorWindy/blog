<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Article;
class Search extends Base{

    public function results(Request $request){
        $table = new Article();
        $keyword = $request->param('keyword');
        if($keyword){
            $list = Db::name('table_article')->alias("a")->join('navigate n',"a.cid = n.navigate_id")->where('title','like',"%".$keyword."%")->whereOr('content','like',"%".$keyword."%")->paginate(10);
            $count = Db::name("table_article")->where('title','like',"%".$keyword."%")->whereOr('content','like',"%".$keyword."%")->count();
            $page = $list->render();
            $this->assign(['keyword'=>$keyword,'list'=>$list,'page'=>$page,'count'=>$count]);
            return $this->fetch();
        }
        die("页面走丢了");
    }
}