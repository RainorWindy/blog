<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Navigate;
class Share extends Base{

    public function index(Request $request){
        $nid = $request->param('nid');
        $category_by = $request->param('category_by');
        if($nid){
            // 当前仅分2级
            $navi = new Navigate();
            $res = $navi->getSonL($nid);
            if($res["code"] == "5000"){
                //查询当前分类下的内容
                if($category_by == '0' || empty($category_by)){
                    $contentL = Db::name("table_article")->where('topcate_id',$nid)->select();
                }else{
                    $contentL = Db::name("table_article")->where('cid',$category_by)->select();
                }
                $this->assign(array('sonL'=>$res['data'],'category_by'=>$category_by,'nid'=>$nid,'contentL'=>$contentL));

                return $this->fetch();
            }else{
                die('404');
            }
        }else{
            die('404');
        }
    }
}