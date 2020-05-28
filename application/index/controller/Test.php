<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
class Test extends Base{

    public function index(){

        return $this->fetch();

    }

    public function test(){
        
    }

}