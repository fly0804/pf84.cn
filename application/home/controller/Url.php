<?php
namespace app\home\controller;
use app\BaseController;
use think\Db;
/**
 * Class Index
 */
class Url extends BaseController
{

    public function shortUrl(){
        $this->assign('title','短链接生成工具');
        if ($this->request->isPost()) {
            $url = input('url','');//长连接  
            if(strpos($url,'http') === false){
                $this->error('URL参数错误');
            }
            $ret = shortUrl($url); 
            $inArr['short_url_code'] = $ret[0]; 
            $inArr['long_url'] = $url; 
            $inArr['create_time'] = date('Y-m-d H:i:s',time());
            $map['short_url_code'] = $inArr['short_url_code'];
            $info =Db::name('long_short_url')->where($map) ->find();
            if(!$info){
                Db::name('long_short_url')->data($inArr)->insert();
            }
            $host = config('config.host_path');
            $host = str_replace('www.','',$host);
            $this->success('成功',null,$host.'/u/'.$inArr['short_url_code']);
        } 
        return $this->fetch('shortUrl');
    }

    public function longUrl(){
        $code = input('code','');
        $map['short_url_code'] = $code;
        $data =Db::name('long_short_url')->where($map) ->find();
        if(!$data){
            $this->error('参数错误');
        }
        $url = $data['long_url'];
        header("location:$url");
    }
	
}
