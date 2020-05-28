<?php
namespace app\index\model;
use think\Model;
class Photo extends Model{

    protected $table = 'my_table_photo';
    protected $resultSetType = 'collection';

    //最新相册信息
    public function newPhotolst(){
        $where = array(
            'issue_status'=>1,
            'is_delete'=>1,
        );
        $photo = $this->order('updatetime','desc')->where($where)->select()->toArray();
        return $photo;
    }
    //查询相册信息
    public function getPhotoInfo($photoid){
        $where = array(
            'photo_id'=>$photoid,
        );
        $photoinfo = $this->where($where)->find()->toArray();
        return $photoinfo;
    }
}