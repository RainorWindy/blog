<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use app\index\model\Navigate;
use app\index\model\Article;
use app\index\model\System;
use app\index\model\Admin;
use app\index\model\Photo;
class Base extends Controller{

    public function _initialize(){
        $navi = new Navigate();
        $tableArticle = new Article();
        $systable = new System();
        $admin = new Admin();
        $phototable = new Photo();
        $naviL = $navi->getNavigateL();
        $myBlog = Db::name("table_article")->where('cid',10)->paginate(10);
        $page = $myBlog->render();

        // 最新日志
        $newAlst = $tableArticle->newArticle();
        //点击排行
        $clickL = $tableArticle->sortByclickTime();
        //热门推荐
        $remL = $tableArticle->hotRemToplst();
        //系统信息
        $sysinfo = $systable->sysinfo();
        //站长信息
        $admininfo = $admin->admininfo();
        //相册
        $photo = $phototable->newPhotolst();
        //标签
        $tags = Db::name('table_tags')->select();
        $this->assign(['tags'=>$tags,'navi'=>$naviL,'pageBlog'=>$page,'myBlog'=>$myBlog,'newAlst'=>$newAlst,'clickL'=>$clickL,'remL'=>$remL,'sysinfo'=>$sysinfo,'admininfo'=>$admininfo,'photo'=>$photo]);

    }

}