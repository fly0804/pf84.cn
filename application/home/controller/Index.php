<?php
namespace app\home\controller;
use app\BaseController;
/**
 * Class Index
 */
class Index extends BaseController
{
	
   	//*------------------------------------------------------ */
	//-- 初始化
	/*------------------------------------------------------ */
    public function initialize()
    {	
   		parent::initialize();
    }

    public function index(){
    	$this->assign('title','长沙微信小程序|网站建设|网页制作开发|微信公众号开发|电商系统开发');
        return $this->fetch('index');
    }

    public function product(){
    	$this->assign('title','产品列表');
        return $this->fetch('product');
    }

    public function cases(){
    	$this->assign('title','案例分享');
        return $this->fetch('cases');
    }

    public function news(){
    	$return = curl('https://3g.163.com/touch/reconstruct/article/list/BA8D4A3Rwangning/0-20.html');
    	$return = rtrim(substr($return, 9),')');
    	$list = json_decode($return,true);
    	$newlist = [];
    	foreach ($list['BA8D4A3Rwangning'] as $key => $value) {
    		$newlist[] = $value;
    	}
    	$this->assign('list',$newlist);
    	$this->assign('title','动态资讯');
        return $this->fetch('news');
    }

    public function newsDetail(){
    	$this->assign('title','动态详情');
        return $this->fetch('newsDetail');
    }

    public function about(){
    	$this->assign('title','关于我们');
        return $this->fetch('about');
    }
	
}
