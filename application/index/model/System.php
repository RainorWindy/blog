<?php
namespace app\index\model;
use think\Model;
class System extends Model{

    protected $table = 'my_table_system';
    protected $resultSetType = 'collection';

    public function sysinfo(){
        $sysID = Config('super_sys_id');
        $sysinfo = $this->where('sys_id',$sysID)->find();
        return $sysinfo;
    }
}