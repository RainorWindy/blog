<?php
namespace app\index\model;
use think\Model;
class Admin extends Model{

    protected $table = 'my_table_admin';
    protected $resultSetType = 'collection';

    public function admininfo(){
        $adminID = Config('super_admin_id');
        $admininfo = $this->where('admin_user_id',$adminID)->find();
        return $admininfo;
    }
}