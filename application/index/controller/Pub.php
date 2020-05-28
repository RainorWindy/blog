<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Pub extends Base{
    public function bright_index(){
        $test = 100;
        $this->assign('test',$test);
        return $this->fetch();
    }
}