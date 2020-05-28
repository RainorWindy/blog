<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Navigate;
use app\index\model\Photo as pho;
use app\index\model\Photolist;
class Life extends Base{

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
                    // 分类为11的话，查询相册表
                    if($category_by == '11'){
                        $contentL = Db::name("table_photo")->where('issue_status',1)->select();
                    }else{
                        $contentL = Db::name("table_article")->where('cid',$category_by)->where('issue_status',1)->select();
                    }
                }
                $this->assign(array('sonL'=>$res['data'],'category_by'=>$category_by,'nid'=>$nid,'contentL'=>$contentL));

                return $this->fetch();
            }else{
                die('页面走失了');
            }
        }else{
            die('页面走失了');
        }
    }

    public function showphoto(Request $request){
        $topcateID = intval($request->param('nid'));
        $cateID = intval($request->param('category_by'));
        $photoid = intval($request->param('pname'));
        if($topcateID && $cateID && $photoid){
            //获取该内容的顶级分类
            $topcate = Db::name('navigate')->where('navigate_id',$topcateID)->find();
            //获取该内容所属分类
            $cate = Db::name('navigate')->where('navigate_id',$cateID)->find();
             //获取该内容的详情
            $photolistTable = new Photolist();
            $photolist = $photolistTable->showphoto($photoid);
            //获取相册信息
            $photoTable = new pho();
            $getPhotoInfo = $photoTable->getPhotoInfo($photoid);

            if($topcate && $cate && $getPhotoInfo){
                //下一篇
                $this->incrementClickTime($photoid);
			    $nextone = $photoTable->where('photo_id','gt',$photoid)->where('topcate_id',$topcateID)->where('cid',$cateID)->find();
                //上一篇
			    $prevone = $photoTable->order('photo_id','desc')->where('photo_id','lt',$photoid)->where('topcate_id',$topcateID)->where('cid',$cateID)->find();
                //相关内容列表（同种类型，不是上一篇、下一篇）
                $relaList = $this->getRelaLst($photoid,$prevone['photo_id']?$prevone['photo_id']:0,$nextone['photo_id']?$nextone['photo_id']:0,$cateID);
                $this->assign(['relaList'=>$relaList,'nextone'=>$nextone,'prevone'=>$prevone,'topcate'=>$topcate['navigate_name'],'cate'=>$cate['navigate_name'],'photolist'=>$photolist,'photoinfo'=>$getPhotoInfo]);
                return $this->fetch();
            }else{
                die('页面走失了');
            }
        }else{
            die('页面走失了');
        }
    }

    //浏览次数增加
    public function incrementClickTime($photoid){
        Db::name('table_photo')->where('photo_id',$photoid)->setInc('clicktime');
    }

    //查询相关内容列表
    public function getRelaLst($photoid,$prevID,$nextID,$cateID){
        $idArr = array($photoid,$prevID,$nextID);
        $relaList = Db::name('table_photo')->where('photo_id','not in',$idArr)->where('issue_status',1)->where('cid',$cateID)->select();
        return $relaList;
    }
}