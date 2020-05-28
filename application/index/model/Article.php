<?php
namespace app\index\model;
use think\Model;

class Article extends Model{

    protected $table = "my_table_article";
    protected $resultSetType = "collection";

    //最新日志
    public function newArticle(){
        $where = array(
            'issue_status'=>1,
            'cid'=>10,
            'is_delete'=>1
        );
        $newL = $this->order('issuetime','desc')->where($where)->select()->toArray();
        return $newL;
    }

    //文章性内容按照点击排行
    public function sortByclickTime(){
        $where = array(
            'issue_status'=>1,
            'is_delete'=>1
        );
        $clickL = $this->order('clicktime','desc')->where($where)->select()->toArray();
        return $clickL;
    }

    //热门推荐（table_article全部查询）
    public function hotRemToplst(){
        $where = array(
            'issue_status'=>1,
            'rem_status'=>1,
            'is_delete'=>1
        );
        //按照更新时间排序
        $remL = $this->order('updatetime','desc')->where($where)->select()->toArray();
        return $remL;
    }
}