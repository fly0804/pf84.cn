<?php
namespace app\home\controller;
use app\BaseController;
use think\Db;
/**
 * Class Index
 */
class Tool extends BaseController
{

    public function bejson(){
        $this->assign('title','json格式化');
        return $this->fetch('bejson');
    }
	
}
