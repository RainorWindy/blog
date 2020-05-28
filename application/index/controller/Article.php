<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Article extends Base{

    public function article(){

        return $this->fetch();

    }

    public function aprev(Request $request){
        $topcateID = intval($request->param('nid'));
        $cateID = intval($request->param('category_by'));
        $artID = intval($request->param('itemsid'));
        if($topcateID && $cateID && $artID){
            //获取该内容的顶级分类
            $topcate = Db::name('navigate')->where('navigate_id',$topcateID)->find();
            //获取该内容所属分类
            $cate = Db::name('navigate')->where('navigate_id',$cateID)->find();
             //获取该内容的详情
            $detail = Db::name('table_article')->where('art_id',$artID)->find();
            if($topcate && $cate && $detail){
                //获取上一篇和下一篇
                //下一篇
                $this->incrementClickTime($artID);
			    $nextone = Db::name('table_article')->where('art_id','gt',$artID)->where('topcate_id',$topcateID)->where('cid',$cateID)->find();
			    //上一篇
			    $prevone = Db::name('table_article')->order('art_id','desc')->where('art_id','lt',$artID)->where('topcate_id',$topcateID)->where('cid',$cateID)->find();
                //相关内容列表（同种类型，不是上一篇、下一篇）
                $relaList = $this->getRelaLst($artID,$prevone['art_id']?$prevone['art_id']:0,$nextone['art_id']?$nextone['art_id']:0,$cateID);
                $this->assign(['topcate'=>$topcate['navigate_name'],'cate'=>$cate['navigate_name'],'detail'=>$detail,'nextone'=>$nextone,'prevone'=>$prevone,'relaList'=>$relaList]);
                return $this->fetch();
            }else{
                die('页面已走失');
            }
        }else{
            die('页面已走丢');
        }
    }
    //查询相关内容列表
    public function getRelaLst($artID,$prevID,$nextID,$cateID){
        $idArr = array($artID,$prevID,$nextID);
        $relaList = Db::name('table_article')->where('art_id','not in',$idArr)->where('issue_status',1)->where('cid',$cateID)->select();
        return $relaList;
    }

    //浏览次数增加
    public function incrementClickTime($artID){
        Db::name('table_article')->where('art_id',$artID)->setInc('clicktime');
    }
}