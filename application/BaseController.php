<?php
namespace app;
use think\Controller;
use think\Container;
use think\facade\Session;
use think\facade\Cache;
use think\exception\HttpResponseException;
use think\Response;
use think\response\Redirect;
error_reporting(E_ERROR | E_PARSE );
/**
 * 控制器基类
 * Class BaseController
 * @package app\store\controller
 */
class BaseController extends Controller
{
	 /* @var string $route 当前控制器名称 */
    protected $controller = '';

    /* @var string $route 当前方法名称 */
    protected $action = '';

    /* @var string $route 当前路由uri */
    protected $routeUri = '';

    /* @var string $route 当前路由：分组名称 */
    protected $group = '';
    /* @var string $route 当前菜单组名 */
    protected $menus_group = '';
 	public  $returnJson = false;//是否统一返回json
    public  $Model;
    public  $main_transfer = true;//是否主层级调用
    protected function initialize() {
        $this->getRouteinfo();
    }
    //*------------------------------------------------------ */
	//-- 获取字典数据
	/*------------------------------------------------------ */
	public function getDict($key = ''){
		return \app\mainadmin\model\PubDictModel::getRows($key);
	}
    /*------------------------------------------------------ */
    //-- 退出
    /*------------------------------------------------------ */
    public function logout()
    {
        session('userId', null);
        return $this->success('退出成功.');
    }
    /*------------------------------------------------------ */
	//-- 重新额外定义模板地址
	/*------------------------------------------------------ */
    protected function fetch($template, $data = []){
		 // 全局layout
        $this->layout();
		return parent::fetch($template, $data);
    }
    /*------------------------------------------------------ */
	//-- 全局layout模板输出址
	/*------------------------------------------------------ */
    private function layout(){
        // 输出到view
        $this->assign('userInfo',$this->userInfo);//登陆会员信息
		$this->assign('setting',settings());// 系统配置
		$this->assign([
			'routeUri' => $this->routeUri,  // 当前uri
		]);
    }
    //*------------------------------------------------------ */
    //-- 获取前端登陆会员ID
    /*------------------------------------------------------ */
    public function getLoginInfo()
    {
        $userId = Session::get('userId') * 1;  
        if ($userId < 1) {
            $devtoken = input('devtoken', '', 'trim');//小程序登陆
            if (empty($devtoken) == false) {
				header('Content-type: text/json'); 
				//判断接口请求是否合法
                $timeStamp = input('timeStamp/s');
				$sign = input('sign/s');
				if (md5($devtoken.$timeStamp.config('config.apikey')) !== $sign) return $this->error('接口验证失败！');
				//if (time() - intval($timeStamp/1000) > 60) return $this->error('请求超时.'.$timeStamp);
                $userId = Cache::get('devlogin_'.$devtoken);
            }
        }
        if ($userId > 0){
            return (new \app\member\model\UsersModel)->info($userId);
        }
        return [];
    }
	 //*------------------------------------------------------ */
	 //* 获取post数据 (数组)
     //* @param $key
     //* @return mixed
	/*------------------------------------------------------ */
    protected function postData($key)
    {
        return $this->request->post($key . '/a');
    }
	/*------------------------------------------------------ */
	//-- 解析当前路由参数 （分组名称、控制器名称、方法名）
	/*------------------------------------------------------ */
    protected function getRouteinfo()
    {
		// 模块名称
		$this->module = $this->request->module();
        // 控制器名称
        $this->controller = toUnderScore($this->request->controller());
        // 方法名称
        $this->action = $this->request->action();
        // 控制器分组 (用于定义所属模块)
        $groupstr = strstr($this->controller, '.', true);
        $this->group = $groupstr !== false ? $groupstr : $this->controller;
        // 当前uri
        $this->routeUri = $this->controller . '/' . $this->action;
    }
	//*------------------------------------------------------ */
	//-- 获取分页数据
	/*------------------------------------------------------ */
	protected function getPageList(&$model,&$where = '',$field = '*',$page_size = ''){
		if (empty($page_size)){
			$page_size = input("page_size/d",0);
			if ($page_size <= 1 ){
                $session_page_size = Session::get('page_size') * 1;
                if ($session_page_size <= 1) $session_page_size = 10;
                $page_size = $session_page_size;
            }
			elseif ($page_size != $session_page_size) Session::set('page_size',$page_size);
	    }

		if (is_object($where) == false){//单表查询            
            if (empty($this->sqlOrder)){
                $sort_by = input("sort_by/s");
                if (empty($sort_by) == false){
                    $sort_by = strtoupper($sort_by);
                    if (in_array($sort_by,array('DESC','ASC')) == false){
                        $sort_by = 'DESC';
                    }
                }
                $order_by = input("order_by/s");
                //判断排序字段是否存在
                if (empty($order_by) == false){
                    if ($model->isSetField($order_by) == false){
                        $order_by = '';
                    }
                }			
				if (empty($order_by) == false){
					$this->sqlOrder = $order_by.' '.$sort_by;
				}
            }
			 if (empty($this->sqlOrder)){
				 $this->sqlOrder = '';
			 }
			return $model->getPageList(input("p/d", 1),$where,$field,$page_size,$this->sqlOrder);
		}else{//联表查询
			return $model->getJointList(input("p/d", 1),$where,$page_size);
		}

	}
	 /**
     * 操作成功跳转的快捷方法
     * @access protected
     * @param  mixed     $msg 提示信息
     * @param  string    $url 跳转的URL地址
     * @param  mixed     $data 返回的数据
     * @param  integer   $wait 跳转等待时间
     * @param  array     $header 发送的Header信息
     * @return void
     */
    protected function success($msg = '', $url = null, $data = '', $wait = 3, array $header = [])
    {
        if (is_null($url) && isset($_SERVER["HTTP_REFERER"])) {
            $url = $_SERVER["HTTP_REFERER"];        
        } elseif ('' !== $url && 'reload' !== $url) {
            $url = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : Container::get('url')->build($url);
        }

        $result = [
            'code' => 1,
            'msg'  => $msg,
            'data' => $data,
            'url'  => $url,
            'wait' => $wait,
        ];
		
        $type = $this->returnJson == true ? 'json' :$this->getResponseType();
        // 把跳转模板的渲染下沉，这样在 response_send 行为里通过getData()获得的数据是一致性的格式
        if ('html' == strtolower($type)) {
            $type = 'jump';
        }

        $response = Response::create($result, $type)->header($header)->options(['jump_template' => $this->app['config']->get('dispatch_success_tmpl')]);

        throw new HttpResponseException($response);
    }
	//直接返回json
 	protected function ajaxReturn($result = array())
    {
        header('Content-Type:application/json; charset=utf-8');
        exit(json_encode($result));
      
    }
    /**
     * 操作错误跳转的快捷方法
     * @access protected
     * @param  mixed     $msg 提示信息
     * @param  string    $url 跳转的URL地址
     * @param  mixed     $data 返回的数据
     * @param  integer   $wait 跳转等待时间
     * @param  array     $header 发送的Header信息
     * @return void
     */
    protected function error($msg = '操作失败,请重试.', $url = null, $data = '', $wait = 3, array $header = [])
    {
        $type = $this->returnJson == true ? 'json' :$this->getResponseType();
        if (is_null($url)) {
            $url = $this->app['request']->isAjax() ? '' : 'javascript:history.back(-1);';
        } elseif ('' !== $url) {
            $url = (strpos($url, '://') || 0 === strpos($url, '/')) ? $url : $this->app['url']->build($url);
        }

        $result = [
            'code' => 0,
            'msg'  => $msg,
            'data' => $data,
            'url'  => $url,
            'wait' => $wait,
        ];

        if ('html' == strtolower($type)) {
            $type = 'jump';
        }

        $response = Response::create($result, $type)->header($header)->options(['jump_template' => $this->app['config']->get('dispatch_error_tmpl')]);

        throw new HttpResponseException($response);
    }
	/*------------------------------------------------------ */
	//-- 检查更新数据是否变化
	/*------------------------------------------------------ */
    protected function checkUpData($olddata=array(),$data=array()) {
		if (empty($olddata) || empty($data)) return $this->error('操作失败:传值异常！');
		$is_ok = false;
        foreach ($data as $key=>$val){
			if ($val != $olddata[$key]){
				$is_ok = true;
				break;
			}
		}
		if ($is_ok == false) return $this->error('操作失败:数据内容没有变化，请核实！');		
		return true;
    }
	/*------------------------------------------------------ */
	//-- 记录操作日志，只提供给后台管理调用
	/*------------------------------------------------------ */
	public function _log($edit_id,$log_info,$controller = 'mainadmin',$data=''){
		$data['edit_id'] = $edit_id;
		$data['log_info'] = $log_info;
		$data['module'] = request()->path();
		$data['log_ip'] = request()->ip();
		$data['log_time'] = time();
		$data['user_id'] = defined('AUID') ? AUID : SAUID;
		$data['data'] = base64_encode(serialize($data));
        $Model = str_replace('/', '\\', "/app/$controller/model/LogSysModel");
        (new $Model)->save($data);
		return true;
	}
	/*------------------------------------------------------ */
	//-- 上传文件
	/*------------------------------------------------------ */
    protected function _upload($file, $dir = '', $thumb = array(), $save_rule='uniqid') {

        $upload = new \lib\UploadFile();

        $upload_path = config('config._upload_') . $dir ;


        if ($thumb) {
            $upload->thumb = true;
            $upload->thumbMaxWidth = $thumb['width'];
            $upload->thumbMaxHeight = $thumb['height'];
            $upload->thumbPrefix = '';
            $upload->thumbSuffix = isset($thumb['suffix']) ? $thumb['suffix'] : '_thumb';
            $upload->thumbExt = isset($thumb['ext']) ? $thumb['ext'] : '';
            $upload->thumbRemoveOrigin = isset($thumb['remove_origin']) ? true : false;
        }
        //自定义上传规则
        $upload = $this->_upload_init($upload);
        if( $save_rule!='uniqid' ){
            $upload->saveRule = $save_rule;
        }

        if ($result = $upload->uploadOne($file,$upload_path)) {
            return array('error'=>0, 'info'=>$result);
        } else {
            return array('error'=>1, 'info'=>$upload->getErrorMsg());
        }
    }
    protected function _upload_init($upload) {
        $file_type = empty($_GET['dir']) ? 'image' : trim($_GET['dir']);
        $ext_arr = array(
            'image' => array('gif', 'jpg', 'jpeg', 'png', 'bmp'),
            'flash' => array('swf', 'flv'),
            'media' => array('swf', 'flv', 'mp3', 'wav', 'wma', 'wmv', 'mid', 'avi', 'mpg', 'asf', 'rm', 'rmvb'),
            'file' => array('doc', 'docx', 'xls', 'xlsx', 'ppt', 'htm', 'html', 'txt', 'zip', 'rar', 'gz', 'bz2'),
        );
        //和总配置取交集
        
		if (empty($ext_arr[$file_type]) == false){
        	$upload->allowExts = $ext_arr[$file_type];  //文件类型限制
		}
        $upload->savePath =  config('config._upload_'). $file_type . '/';
        $upload->saveRule = 'uniqid';
        $upload->autoSub = true;
        $upload->subType = 'date';
        $upload->dateFormat = 'Ymd/';
        return $upload;
    }
}
