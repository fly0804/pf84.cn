<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
/**
 * 驼峰命名转下划线命名
 * @param $str
 * @return string
 */
function toUnderScore($str)
{
    $dstr = preg_replace_callback('/([A-Z]+)/', function ($matchs) {
        return '_' . strtolower($matchs[0]);
    }, $str);
    return trim(preg_replace('/_{2,}/', '_', $dstr), '_');
}

/**
 * 自定义URL
*/
function _url($url,$arr,$isNotHtml=true,$domain = false){
    $url = url($url,$arr,$isNotHtml,$domain);
    if ($domain == true){
        $url = str_replace($_SERVER['SCRIPT_NAME'],'',$url);
    }
	return str_replace(array('%E3%80%90','%E3%80%91','%5B%5B','%5D%5D'),array("'+","+'",'{{','}}'),$url);
}
/**
 * 后台生成密码hash值
 * @param $password
 * @return string
 */
function _hash($password)
{
    return md5(md5($password) . 'main_salt_zpTRx');
}

/**
 * 前台生成密码hash值
 * @param $password
 * @return string
 */
function f_hash($password)
{
    return md5('@by_'.md5(md5($password).'pwd@2019'));
}
//验证手机号码
function checkMobile($phone = ''){
    $preg_phone='/^1\d{10}$/ims';
    if(preg_match($preg_phone,$phone)){
        return true;
    }
    return false;

}
/*------------------------------------------------------ */
//-- 过滤掉emoji表情
/*------------------------------------------------------ */ 
function repEmoji($str){
    $str = preg_replace_callback( '/./u',function (array $match) {
                return strlen($match[0]) >= 4 ? '' : $match[0];
            },$str);
     return $str;
}
/*------------------------------------------------------ */
//-- 获取会员信息
/*------------------------------------------------------ */ 
function userInfo($user_id,$return=true){
	static $userList;
	static $AccountModel;
	if ($user_id < 1) return $return == true ? '--' : [];
	if (!isset($AccountModel)){
		 $AccountModel = model('app\member\model\UsersModel');
	}
	if (!isset($AccountModel[$user_id])){
		$userList[$user_id] = $AccountModel->info($user_id);
	}
	if (empty($userList[$user_id])) return $return == true ? '--' : [];
	$info = $userList[$user_id];
	if ($return == true) return $info['nick_name'];
	return $info;
}
/*------------------------------------------------------ */
//-- 获取会员等级
/*------------------------------------------------------ */ 
function userLevel($integral,$returnName=true){
	static $userLevelList;	
	if (!isset($userLevelList)){
		 $Model = model('app\member\model\UsersLevelModel');	
		 $userLevelList = $Model->getRows();
	}
	$level = array();
	foreach ($userLevelList as $row){
		if ($integral >= $row['min'] && $integral <= $row['max']){
			$level = $row;		
			break;
		}elseif ($row['max'] == 0){
			$level = $row;
			break;
		}
	}
	if ($returnName == true) return $level['level_name'];
	return $level;
}
/*------------------------------------------------------ */
//-- 格式化价格
//-- @access  public
//-- @param   float   $price  价格
//-- @return  string
/*------------------------------------------------------ */
function priceFormat($price,$show_yuan = false,$type=0){    
	switch ($type){
		case 0:
			$price = number_format($price, 2, '.', '');
			break;
		case 1: // 保留不为 0 的尾数
			$price = preg_replace('/(.*)(\\.)([0-9]*?)0+$/', '\1\2\3', number_format($price, 2, '.', ''));
			if (substr($price, -1) == '.') $price = substr($price, 0, -1);
			break;
		case 2: // 不四舍五入，保留1位
			$price = substr(number_format($price, 2, '.', ''), 0, -1);
			break;
		case 3: // 直接取整
			$price = intval($price);
			break;
		case 4: // 四舍五入，保留 1 位
			$price = number_format($price, 1, '.', '');
			break;
		case 5: // 先四舍五入，不保留小数
			$price = round($price);
			break;
	}   

    if($show_yuan == false) return sprintf("%s", $price);
	else return sprintf("￥%s元", $price);
}
/**
 * 写入日志
 * @param string|array $values
 * @param string $dir
 * @return bool|int
 */
function _log($values, $dir)
{
    if (is_array($values))
        $values = print_r($values, true);
    // 日志内容
    $content = '[' . date('Y-m-d H:i:s') . ']' . PHP_EOL . $values . PHP_EOL . PHP_EOL;
    try {
        // 文件路径
        $filePath = $dir . '/logs/';
        // 路径不存在则创建
        !is_dir($filePath) && mkdir($filePath, 0755, true);
        // 写入文件
        return file_put_contents($filePath . date('Ymd') . '.log', $content, FILE_APPEND);
    } catch (\Exception $e) {
        return false;
    }
}
/**
 * curl请求指定url
 * @param $url
 * @param array $data
 * @return mixed
 */
function curl($url, $data = [])
{
    // 处理get数据
    if (!empty($data)) {
        $url = $url . '?' . http_build_query($data);
    }
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);//这个是重点。
    $result = curl_exec($curl);
    curl_close($curl);
    return $result;
}
/*------------------------------------------------------ */
//-- 模板自定义判断
//-- val 传入值
//-- dval  判断值
//-- rval 处理返回
//-- default 是否默认
/*------------------------------------------------------ */
function tplckval($val='',$dval='',$rval='',$default = false){	
	if ($val !== 0){
		if (empty($val) == true && $default === true) return $rval;
		if (empty($dval) == true) return '';
	}
	
	if (is_array($dval)) return (in_array($val,$dval))?$rval:'';
	
	if ($val === $dval) return $rval;
	
	if (strstr($dval,'=')){
		$dval = explode('=',$dval);	
		return ($val == $dval[1]) ? $rval : $default;
	}
	if (strstr($dval,'<>')){
		$dval = explode('<>',$dval);
		return ($val <> $dval[1]) ? $rval : $default;
	}
	if (strstr($dval,'>=')){
		$dval = explode('>=',$dval);
		return ($val >= $dval[1]) ? $rval : $default;
	}
	if (strstr($dval,'>')){
		$dval = explode('>',$dval);
		return ($val > $dval[1]) ? $rval : $default;
	}
	if (strstr($dval,'<=')){
		$dval = explode('<=',$dval);
		return ($val <= $dval[1]) ? $rval : $default;
	}
	if (strstr($dval,'<')){
		$dval = explode('<',$dval);
		return ($val < $dval[1]) ? $rval : $default;
	}
	
}
/*------------------------------------------------------ */
//-- 模板中调用，将GMT时间戳格式化为用户自定义时区日期
/*------------------------------------------------------ */
function dateTpl($time = '',$format = '',$return_false = false){    
	if ($format === true){ 
		$time = time();
		$format = 'Y-m-d H:i';
	}elseif (empty($time)){
		 return ($return_false == false) ? '没有记录' : '';
	}
	if (empty($format)){
		$format = 'Y-m-d H:i';
	}
    return date($format, $time);
}
/*------------------------------------------------------ */
//-- 返回一个带子级别的数组
//--@Param $rows 数组源; 设置：必要;
//--@Param $parent_id 顶级pid; 设置：不需要;
//--@Param $leve 默认层级;设置; 不需要;
//--@Param $newrows 递归子类的id; 设置：不需要;
/*------------------------------------------------------ */
function returnRows($rows,$pid = 0,$level = 1){	
	static $newrows = array();
	if ($level == 1) $newrows = array();  
	$icon = array('&nbsp;&nbsp;│ ','&nbsp;&nbsp;├─ ','&nbsp;&nbsp;└─ ');
	$now_id = 0;
	foreach ($rows as $key=>$row){
		$_pid = isset($row['pid'])?$row['pid']:0;
		if ($pid != $_pid) continue;	
		if (isset($newrows[$row['id']])) continue;						
		$children = returnChildren($rows,$row['id']);
		$row['children'] = ($children) ? $row['id'].','.join(',',$children) : $row['id'];
		$row['level'] = $level;
		if ($level > 1){
			$now_icon = '';
			for($i=1;$i<$level;$i++){
				$now_icon .= ($i == $level-1) ? $icon[1] : $icon[0];
			}
			$row['icon'] = $now_icon;
		}else{
			$row['icon'] = '';	
		}
		
		$now_id = $row['id'];
		$newrows[$now_id] = $row;
		unset($rows[$key]);		
		$nc = count($newrows);
		if ($rows){
			 $newrows = returnRows($rows,$now_id,($level+1));
		}
		if (count($newrows) > $nc){
			$end_arr = end($newrows);
			if ($end_arr['icon']) $newrows[$end_arr['id']]['icon'] = str_replace($icon[1],$icon[2],$end_arr['icon']);
		}
	}
	if ($now_id > 0) $newrows[$now_id]['icon'] = str_replace($icon[1],$icon[2],$newrows[$now_id]['icon']);
	unset($rows);
	return $newrows;
}
function returnChildren(&$rows,$pid = 0){
	$newrows = array();
	foreach ($rows as $key=>$row){  
		if ($pid != $row['pid']) continue;	
		$children = returnChildren($rows,$row['id']);
		if ($children) $row['id'] .= ','.join(',',$children);
		$newrows[] = $row['id'];
	}
	return $newrows;
}
/*------------------------------------------------------ */
//-- 返回一个带有缩进级别的数组
/*------------------------------------------------------ */
function returnRecArr(&$rows){
	$newrows = array();
	foreach ($rows as $key=>$row){
		$newrows[$row['pid']][$row['id']] = $row;
	}
	return $newrows;
}
/*------------------------------------------------------ */
//-- 将数组转换组下拉选项
//-- @param   array   $arr             所有的数组
//-- @param   int     $selected        选中项
//-- @param   boolean     $islimit     是否判断限制不可选
//-- @param   int     $level           返回等级
//-- @param   int     $kd_type           快递类型：0 快递100； 1 快递鸟
//-- @return  string
/*------------------------------------------------------ */
function arrToSel(&$rows = array(), $selected = 0, $islimit = false, $level = 0 ){
	$select = '';
	$selected = explode(',',$selected);
	foreach ($rows AS $key=>$val){
		if (is_array($val) == false){
			$selected = (in_array($key,$selected)) ? "selected='selected'" : '';
			$select .= '<option value="'.$key.'" '.$selected.'>'.$val.'</option>';
			 continue;	
		}
		if ($level > 0 && $val['level'] > $level) continue;		
		$select .= '<option ';
		if ($islimit === true && $val['children'] != $val['id'] ){
			$val['id'] = '';
			$select .=  ' style="background:#999;" ';
		}
		
		if (isset($val['status']) && $val['status'] == 0){
			$select .=  ' style="color:#CCC;" ';
		}elseif (isset($val['is_sys']) && $val['is_sys'] == 1){
			$select .=  ' style="color:#ff0000;"  ';
		}
	    $text = htmlspecialchars(strip_tags($val['name']));
		if (empty($val['dict_val']) == false){
			$select .= ' value="'.$val['ext_val'].'"  ';
			$selval = $val['ext_val'];
		}else{
			$select .= ' value="'.$val['id'].'" ';
			$selval = $val['id'];
			
		}
		$select .= (in_array($selval,$selected)) ? "selected='selected'" : '';
		$select .= ' data-text="'.$text.'" label="'.$text.'" >';		
		if (isset($val['icon'])) $select .= $val['icon'];
		$select .= $text;
		$select .= '</option>';
	}
	return $select;
}
/*------------------------------------------------------ */
//-- 判断是否json，是返回数组
/*------------------------------------------------------ */
function isJson($string) {
 $arr = json_decode($string,true);
 return (json_last_error() == JSON_ERROR_NONE) ? $arr : $string;
}
/*------------------------------------------------------ */
//-- 创建目录
/*------------------------------------------------------ */   
function makeDir($folder){
    $reval = false;
    if (!file_exists($folder)){
        /* 如果目录不存在则尝试创建该目录 */
        @umask(0);
        /* 将目录路径拆分成数组 */
        preg_match_all('/([^\/]*)\/?/i', $folder, $atmp);
        /* 如果第一个字符为/则当作物理路径处理 */
        $base = ($atmp[0][0] == '/') ? '/' : '';
        /* 遍历包含路径信息的数组 */
        foreach ($atmp[1] as $val){
            if ('' != $val){
                $base .= $val;
                if ('..' == $val || '.' == $val){
                    /* 如果目录为.或者..则直接补/继续下一个循环 */
                    $base .= '/';
                    continue;
                }
            }else{continue;}
            $base .= '/';
            if (!file_exists($base)){
                /* 尝试创建目录，如果创建失败则继续循环 */
                if (@mkdir(rtrim($base, '/'), 0777)){
                    @chmod($base, 0777);
                    $reval = true;
                }
            }
        }
    }else{
        /* 路径已经存在。返回该路径是不是一个目录 */
        $reval = is_dir($folder);
    }
    clearstatcache();
    return $reval;
}
/*------------------------------------------------------ 
 * 校验日期格式是否正确
 * @param string $date 日期
 * @param string $formats 需要检验的格式数组
 * @return boolean
------------------------------------------------------ */
function checkDateIsValid($date, $formats = array("Y-m-d H:i:s","Y-m-d H:i")){
    $unixTime = strtotime($date);
    if (!$unixTime) return false;  //strtotime转换不对，日期格式显然不对
	 //校验日期的有效性，只要满足其中一个格式就OK
	if (!is_array($formats)) $formats = explode(',',$formats);
    foreach ($formats as $format) {
    	if (date($format, $unixTime) == $date)  return true;
	}
    return false;
}
/*------------------------------------------------------ */
//-- 系统配置读取
/*------------------------------------------------------ */
function settings($key = ''){
	static $settings;
	if (!isset($settings)){
		 $settings = model('app\mainadmin\model\SettingsModel')->getRows();
	}
	if (empty($key) == false){
		return isJson($settings[$key]);		
	}
	return $settings;
}
/*------------------------------------------------------ */
//-- 生成指定长度的随机字符串(包含大写英文字母, 小写英文字母, 数字)
//-- @param int $length 需要生成的字符串的长度
//-- @return string 包含 大小写英文字母 和 数字 的随机字符串
/*------------------------------------------------------ */
function random_str($length,$isupper = false){
    //生成一个包含 大写英文字母, 小写英文字母, 数字 的数组
    $arr = $isupper ? array_merge(range('A','H'),range('J','M'),range('P','Z'),range(0,9)) : array_merge(range('A', 'Z'),range(0, 9), range('a', 'z'));
    $str = '';
    $arr_len = count($arr);
    for ($i = 0; $i < $length; $i++){
        $rand = mt_rand(0, $arr_len-1);
        $str.=$arr[$rand];
    }
    return $str;
}
/*------------------------------------------------------ */
//-- 时间转换计算
/*------------------------------------------------------ */
function timeTran($show_time) {  
    $dur = time() - $show_time;  
    if ($dur < 0) {  
        return '刚刚';  
    } 
	if ($dur < 60) {  
		return $dur . '秒前';  
	}
	if ($dur < 3600) {  
		return floor($dur / 60) . '分钟前';  
	} 
	if ($dur < 86400) {  
		return floor($dur / 3600) . '小时前';  
	} 
	if ($dur < 259200) {//3天内  
		return floor($dur / 86400) . '天前';  
	}
	return date("Y-m-d", $show_time); 
}
 /*------------------------------------------------------ */
// * 对银行卡号进行掩码处理
// * @param  string $bankCardNo 银行卡号
//* @return string             掩码后的银行卡号
/*------------------------------------------------------ */
function formatBankCardNo($bankCardNo){
	//截取银行卡号前4位
	$prefix = substr($bankCardNo,0,4);
	//截取银行卡号后4位
	$suffix = substr($bankCardNo,-4,4);
	$maskBankCardNo = $prefix." **** **** **** ".$suffix;
	return $maskBankCardNo;
}
/**
 * 获取当前页面完整URL地址
 */
function getUrl($val='',$valb='',$var=array()){
	$sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
	if($valb == 'img'){
		if (strstr($val,'http:')) return $val;	
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$val;	
	}elseif($valb == 'url'){
		$var['token'] = $GLOBALS['userinfo']['token']; 
		if (strstr($val,'http:')) return $val;	
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').url($val,$var);
	}elseif($valb == '_url'){
		$var['token'] = $GLOBALS['userinfo']['token']; 
		if (strstr($val,'http:')) return $val;	
		return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').url($val,$var);
	}
	$php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];		
	$path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
	$relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self.(isset($_SERVER['QUERY_STRING']) ? '?'.$_SERVER['QUERY_STRING'] : $path_info);
	return $sys_protocal.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '').$relate_url;
}
/**
 * 获取url 中的各个参数  类似于 pay_code=alipay&bank_code=ICBC-DEBIT
 * @param type $str
 * @return type
 */
function parseUrlParam($str){
    $data = array();
    $str = explode('?',$str);
    $str = end($str);
    $parameter = explode('&',$str);
    foreach($parameter as $val){
        $tmp = explode('=',$val);
        $data[$tmp[0]] = $tmp[1];
    }
    return $data;
}
/**
 *   实现中文字串截取无乱码的方法
 */
function getSubstr($string, $start, $length) {
      if(mb_strlen($string,'utf-8')>$length){
          $str = mb_substr($string, $start, $length,'utf-8');
          return $str.'...';
      }else{
          return $string;
      }
}

function domain_name_images($_images)
{
    return 'http://' . $_SERVER['SERVER_NAME'] . $_images;
}

function domain_name($_string)
{
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    return $sys_protocal . $_SERVER['SERVER_NAME'] . '/' . $_string;
}

/**
 * 读取配置数据
 * @param $name
 * @return mixed
 */
function getmainsettings($name)
{
    $redis_name = 'main_settings_' . $name;
    $mainsetdata = \think\facade\Cache::get($redis_name);
    if (empty($mainsetdata)) {
        $mainsetdata = Db::name('main_settings')->where(['name' => $name])->value('data');
        \think\facade\Cache::set($redis_name, $mainsetdata, 600);
    }
    return $mainsetdata;
}

/**
 * 数组分页
 * @param array $data
 * @param int $pagescount
 * @param string $order_field
 * @param string $order
 * @return array
 */
function page_array($data = [], $pagescount = 10, $order_field = "", $order = "asc")
{
    //$order SORT_DESC 倒序  SORT_ASC 正序
    $pages = input('pages',1); #判断当前页面是否为空 如果为空就表示为第一页面
    $start = ($pages - 1) * $pagescount; #计算每次分页的开始位置
    $totals = count($data);
    $countpage = ceil($totals / $pagescount); #计算总页面数
    $pagedata = [];
    if ($order_field) {
        $data = array_sort($data, $order_field, $order);
    }
    for ($i = $start; $i < ($start + $pagescount); $i++) {
        if ($data[$i]) {
            $pagedata[] = $data[$i];
        }
    }
    $return['page_count'] = $countpage;
    $return['list'] = $pagedata;
    return $return;  #返回查询数据
}

//指定数组以$keys键值排序
function array_sort($array, $keys, $type = 'asc')
{
//$array为要排序的数组,$keys为要用来排序的键名,$type默认为升序排序
    $keysvalue = $new_array = array();
    foreach ($array as $k => $v) {
        $keysvalue[$k] = $v[$keys];
    }
    if ($type == 'asc') {
        asort($keysvalue);
    } else {
        arsort($keysvalue);
    }
    reset($keysvalue);
    foreach ($keysvalue as $k => $v) {
        $new_array[$k] = $array[$k];
    }
    return $new_array;
}
function postcurldata($url, $array){
    if ($url && $array) {
        $array_string = http_build_query($array, '&');
        $curl = curl_init(); //初始化
        curl_setopt($curl, CURLOPT_URL, $url); //设置选项，包括URL
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1);
        curl_setopt($curl, CURLOPT_HEADER, false); //设定是否输出页面内容
        curl_setopt($curl, CURLOPT_TIMEOUT, 10); //设置cURL允许执行的最长秒数。
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //设定是否显示头信息
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $array_string); //把你分析的回复表单的参数分别赋值
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    } else {
        return false;
    }
}
/**
 * 导出excel
 * @param $strTable 表格内容
 * @param $filename 文件名
 */
function downloadExcel($strTable,$filename)
{
    header("Content-type: application/vnd.ms-excel");
    header("Content-Type: application/force-download");
    header("Content-Disposition: attachment; filename=".$filename."_".date('Y-m-d').".xls");
    header('Expires:0');
    header('Pragma:public');
    echo '<html><meta http-equiv="Content-Type" content="text/html; charset=utf-8" />'.$strTable.'</html>';
}
/** 
 * 由长连接生成短链接操作 
 *  
 * 算法描述：使用6个字符来表示短链接，我们使用ASCII字符中的'a'-'z','0'-'9','A'-'Z'，共计62个字符做为集合。 
 *           每个字符有62种状态，六个字符就可以表示62^6（56800235584），那么如何得到这六个字符， 
 *           具体描述如下： 
 *        1. 对传入的长URL+设置key值 进行Md5，得到一个32位的字符串(32 字符十六进制数)，即16的32次方； 
 *        2. 将这32位分成四份，每一份8个字符，将其视作16进制串与0x3fffffff(30位1)与操作, 即超过30位的忽略处理； 
 *        3. 这30位分成6段, 每5个一组，算出其整数值，然后映射到我们准备的62个字符中, 依次进行获得一个6位的短链接地址。 
 *  
 */  
function shortUrl($long_url)  
{  
    $key = 'pf84'; //自定义key值
    $base32 = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";  
      
    // 利用md5算法方式生成hash值  
    $hex = hash('md5', $long_url.$key);  
    $hexLen = strlen($hex);  
    $subHexLen = $hexLen / 8;  
      
    $output = array();  
    for( $i = 0; $i < $subHexLen; $i++ )  
    {  
        // 将这32位分成四份，每一份8个字符，将其视作16进制串与0x3fffffff(30位1)与操作  
        $subHex = substr($hex, $i*8, 8);  
        $idx = 0x3FFFFFFF & (1 * ('0x' . $subHex));  
          
        // 这30位分成6段, 每5个一组，算出其整数值，然后映射到我们准备的62个字符  
        $out = '';  
        for( $j = 0; $j < 6; $j++ )  
        {  
            $val = 0x0000003D & $idx;  
            $out .= $base32[$val];  
            $idx = $idx >> 5;  
        }  
        $output[$i] = $out;  
    }  
    return $output;  
}  


//清理缓存函数
if (!function_exists('delete_dir_file'))
{
    /**
     * 循环删除目录和文件
     * @param string $dir_name
     * @return bool
     */
    function delete_dir_file($dir_name) {
        $result = false;
        if(is_dir($dir_name)){
            if ($handle = opendir($dir_name)) {
                while (false !== ($item = readdir($handle))) {
                    if ($item != '.' && $item != '..') {
                        if (is_dir($dir_name . DS . $item)) {
                            delete_dir_file($dir_name . DS . $item);
                        } else {
                            unlink($dir_name . DS . $item);
                        }
                    }
                }
                closedir($handle);
                if (rmdir($dir_name)) {
                    $result = true;
                }
            }
        }
        return $result;
    }
}