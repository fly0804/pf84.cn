<?php
namespace app\api\command;

use think\facade\Cache;
use think\console\Command;
use think\console\Input;
use think\console\Output;
use think\Db;

class Weather extends Command
{
    protected function configure()
    {
        $this->setName('weather')->setDescription('Here is the remark ');
    }

    protected function execute(Input $input, Output $output)
    {
        $city = 'Bavet,Cambodia';
        $url = "https://www.msn.com/en-us/weather/today/".$city."/we-city?weadegreetype=F&tab=details&ocid=ansmsnweather";
        include_once 'extend/simple_html_dom/simple_html_dom.php';
        $html = new \simple_html_dom();
        $return = file_get_contents($url);
        $regex1="/<div class=\"weather-info\".*?>.*?<\/div>/ism"; 
        if(preg_match($regex1, $return, $matches)){ 
           $tmphtml = $matches[0];
           $html->load($tmphtml);
           $res = $html->find('div span',0);
           $inArr['city'] = $city;
           $inArr['weather'] = $res->innertext();
           $inArr['dateline'] = date('Y-m-d H:i:s',time());
           $res2 = $html->find('div ul li');
           $tmp = [];
           foreach ( $res2 as $key => $val ){
                $tmp[$key] = $val->plaintext;
           }
           $inArr['feels_like'] = ltrim(str_replace('Feels Like', '', $tmp[0]));
           $inArr['wind_nne'] = ltrim(str_replace('Wind', '', $tmp[1]));
           $inArr['barometer'] = ltrim(str_replace('Barometer', '', $tmp[2]));
           $inArr['visibility'] = ltrim(str_replace('Visibility', '', $tmp[3]));
           $inArr['humidity'] = ltrim(str_replace('Humidity', '', $tmp[4]));
           $inArr['dew_point'] = ltrim(str_replace('Dew Point', '', $tmp[5]));
           $rs = Db::name('main_weather')->data($inArr)->insert();
           if($rs){
                trace('msn的天气数据抓取成功','debug');
            }else{
                trace('msn的天气数据抓取失败','debug');
            }
        }else{ 
           trace('未抓取到msn的天气数据，html标签中未找到class为weather-info的元素','debug');
        }
    }
}