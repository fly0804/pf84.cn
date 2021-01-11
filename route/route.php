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

Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('product', 'home/index/product');
Route::get('news', 'home/index/news');
Route::get('cases', 'home/index/cases');
Route::get('about', 'home/index/about');
Route::get('s', 'home/Url/shortUrl');
Route::get('u/:code', 'home/Url/longUrl');
Route::get('tool/bejson', 'home/Tool/bejson');

return [

];
