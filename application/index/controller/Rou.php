<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Navigate;
class Rou extends Base{

    public function index(Request $request){
        $topcate = $request->param('nid',0);
        if($topcate == 0 || empty($topcate)){
            $msg = array('code'=>50008,'msg'=>'访问出错');
            die('404');
        }else{
            $nid = $request->param('nid');
            //查询控制器
            $navi = new Navigate();
            $res = $navi->where('navigate_id',$nid)->find();
            //模块名称
            $model_name = $res['model'];
            $category_by = $request->param('category_by');
            $this->redirect("/index/".$model_name."/index",['nid'=>$nid,'category_by'=>$category_by]);
        }
    }

    //获取请求model
    public function model_response(Request $request){
        $category_by = $request->param("category_by");
        $nid = $request->param("nid");
        if($nid){
            $res = Db::name("navigate")->where('navigate_id',$nid)->find();
            $data = array(
                'model'=>$res['model'],
                'category_by'=>$category_by
            );
            return array('code'=>5000,'msg'=>$data);
        }
    }
}