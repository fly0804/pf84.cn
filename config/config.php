<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    'base_url'    => 'http://www.pf84.cn/',
    'lang_switch_on'         => true,
    // 默认语言
    'default_lang'           => 'zh-cn',
    // 上传目录
	'_upload_'=> './upload/',
	'host_path'=> isset($_SERVER['SERVER_NAME'])?'https://'.$_SERVER['SERVER_NAME']:'https://www.pf84.cn',//指定域名
    // 是否开启多语言
    'lang_switch_on'         => true,
    // 默认语言
    'default_lang'           => 'zh-cn',
];
