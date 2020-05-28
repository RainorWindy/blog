<?php
namespace app\index\model;

use think\Model;

class Navigate extends Model{

    protected $table = "my_navigate";
    protected $resultSetType = "collection";

    public function getNavigateL(){

        $list = $this->select()->toArray();

        $list = $this->getChildL($list);
        return $list;

    }

    //遍历子节点
    public function getChildL($arr,$pid=0){
        $brr = [];
        foreach($arr as $key => $val){
            if($val['pid'] == $pid){
                $val['children'] = $this->getChildL($arr,$val['navigate_id']);

                $brr[] = $val;
            }
        }
        return $brr;
    }

    // 遍历当前顶级分类下面的二级分类
    public function getSonL($nid){
        $navigate_ID = $nid;
        if($navigate_ID){
            $sonL = $this->where('pid',$navigate_ID)->select()->toArray();
            return array('code'=>5000,'data'=>$sonL);
        }else{
            return array('code'=>5008);
        }
    }
}