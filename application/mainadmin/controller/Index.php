<?php
namespace app\mainadmin\controller;

use app\AdminController;
use think\cache\driver\Redis;
use think\facade\Cache;

use app\member\model\UsersModel;
use app\member\model\AccountModel;
use app\member\model\RechargeLogModel;
use app\member\model\WithdrawModel;
use think\Db;
/**
 * 后台首页
 * Class Index
 * @package app\store\controller
 */
class Index extends AdminController
{
	

     public function index()
    {    
        return $this->fetch('index');
    }
    /*------------------------------------------------------ */
    //-- 清理全部缓存
    /*------------------------------------------------------ */
    public function clearCache()
    {
        $redis = new Redis();
        $keysdata = $redis->keys(config('cache.prefix') . '*');
        foreach ($keysdata as $key => $val) {
            if (stripos($val, config('cache.prefix').'devlogin') !== 0) {
                $redis->rm($val);
            }
        }
        // \think\facade\Cache::clear();
        return $this->success('清理完成.');
    }

}
