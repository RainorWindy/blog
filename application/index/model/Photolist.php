<?php
namespace app\index\model;
use think\Model;
class Photolist extends Model{

    protected $table = 'my_table_photolist';
    protected $resultSetType = 'collection';

    public function showPhoto($photoid){
        $where = array(
            'photo_id'=>$photoid,
        );
        $photolist = $this->where($where)->select()->toArray();
        return $photolist;
    }
}